<?php
class Rides extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('ride_model');		
		$this->view_data['nav'] = 'rides';
	}
	
	public function index($language = FALSE) 
	{
		if ($language !== FALSE)
		{
			$this->load->model('language_model');
			$lang = $this->language_model->get_language($language);
			$this->view_data['current_language'] = $lang['name'];
		}
		else
		{
			$this->view_data['current_language'] = 'All languages';
		}
		
		$this->view_data['rides'] = json_encode($this->ride_model->get(10, 0, $language, $this->view_data['userid']));
		
		$this->view_data['css'] = array('css/select2.css');
		$this->view_data['title'] = 'Rides';
		$this->load->helper('tiny_mce');
		$this->load->helper('select2');

		if ($this->logged_in())
		{
			$this->view_data['submenu'] = array(
				'/rides/create' => 'New ride',
			);
		}
		
		$this->show_view('rides/index');
	}

	public function search()
	{
		$language_id = $this->input->post('language_id', TRUE);
		$searchword = $this->input->post('searchword', TRUE);
		
		if ($language_id === FALSE)
		{
			$language_id = $this->ride_model->get_language_id($this->input->post('language', TRUE), FALSE);
		}
		
		$this->output->set_content_type('application/json')->set_output(json_encode($this->ride_model->search($language_id, $searchword)));
	}

	private function tabs($id, $active)
	{
		$this->view_data['tabs'] = array(
				array('url' => 'rides/show/' . $id, 'text' => 'Description', 'active' => $active == 'description'),
				array('url' => 'rides/signoffs/' . $id, 'text' => 'Sign offs', 'active' => $active == 'signoff'),
				array('url' => 'rides/kaizen/' . $id, 'text' => 'Kaizen', 'active' => $active == 'kaizen')
		);		
	}
	
	public function show($id, $path = FALSE)
	{
		$ride = $this->ride_model->get_ride($id);
		$this->view_data['ride'] = $ride;
		$this->view_data['path'] = $path;

		if ($this->view_data['userid'] == $ride['author'])
		{
			$this->view_data['submenu'] = array(
				'rides/edit/' . $ride['id'] . ($path !== FALSE ? '/' . $path : '') => 'Edit ride',
			);
		}
		else
		{
		}
		
		$this->tabs($id, 'description');
						
		if ($path !== FALSE)
		{
			$my_path = $this->ride_model->get_path($path);
			$this->view_data['path_name'] = $my_path['name'];
			$this->view_data['previous_ride'] = $this->ride_model->get_previous_ride($id, $path);
			$this->view_data['next_ride'] = $this->ride_model->get_next_ride($id, $path);		
		}
		
		$this->show_view('rides/show');
	}
	
	public function create()
	{
		$this->load->helper('form');
		$this->load->helper('tiny_mce');
		$this->load->helper('select2');
		$this->load->library('form_validation');

		$this->view_data['css'] = array('css/select2.css');
		$this->view_data['title'] = 'Create ride';
		
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('description', 'Description', 'required');
		
		if ($this->form_validation->run() === FALSE)
		{
			$this->show_view('rides/create');	
		}
		else
		{
			$id = $this->ride_model->create_ride($this->input->post('name'), $this->input->post('description'), $this->input->post('language'), $this->session->userdata('id'));
			$this->load->library('overachiever');
			$this->overachiever->track_counter(5);
			redirect('/rides/show/' . $id);
		}
	}
	
	public function edit($id, $path = FALSE)
	{
		$this->requires_login();
		
		$this->load->helper('form');
		$this->load->helper('tiny_mce');
		$this->load->helper('select2');
		$this->load->library('form_validation');


		$this->view_data['css'] = array('css/select2.css');
		$this->view_data['title'] = 'Edit ride';
		$this->view_data['ride'] = $this->ride_model->get_ride($id);
		$this->view_data['path'] = $path;
		$this->tabs($id, 'description');
		
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('description', 'Description', 'required');
		
		if ($this->form_validation->run() === FALSE)
		{
			$this->show_view('rides/edit');	
		}
		else
		{
			$this->ride_model->update_ride($id, $this->input->post('name'), $this->input->post('description'), $this->input->post('language'), $this->session->userdata('id'));
			redirect('/rides/show/' . $id . ($path !== FALSE ? '/' . $path : ''));
		}		
	}
	
	public function signoff($id)
	{
		$this->requires_login();
	
		$this->view_data['css'] = array('css/select2.css');

		$this->load->helper('form');
		$this->load->helper('tiny_mce');
		$this->load->helper('select2');
		$this->load->library('form_validation');

		$this->tabs($id, 'signoff');

		$this->view_data['title'] = 'Sign off';
		$ride = $this->ride_model->get_ride($id);

		if ($this->view_data['userid'] == $ride['author'])
		{
			$this->view_data['ride'] = $ride;

			$this->form_validation->set_rules('user', 'User', 'required');
			$this->form_validation->set_rules('score', 'Score', 'required');
			$this->form_validation->set_rules('comment', 'Comment', 'required');
			
			if ($this->form_validation->run() === FALSE)
			{
				$this->show_view('rides/signoff');	
			}
			else
			{
				$this->ride_model->signoff($id, $this->input->post('user', TRUE), $this->view_data['userid'], $this->input->post('score', TRUE), $this->input->post('comment', TRUE));
				redirect('/rides/signoffs/' . $id);
			}		
		}
		else
		{
			redirect('/rides/signoffs/' . $id);
		}
	}
	
	public function signoffs($id)
	{
		if ($this->logged_in())
		{
			$this->view_data['submenu'] = array(
				'rides/signoff/' . $id => 'Sign off',
			);
		}
				
		$this->tabs($id, 'signoff');

		$this->view_data['ride'] = $this->ride_model->get_ride($id);
		$this->view_data['signoffs'] = $this->ride_model->get_signoffs($id);
		$this->view_data['levels'] = array('Low', 'Medium', 'High');
		$this->show_view('rides/signoffs');	
	}

	public function kaizen($id)
	{
		$this->load->helper('select2');
		$this->load->model('kaizen_model');

		$this->view_data['css'] = array('css/select2.css');

		$this->view_data['title'] = 'Kaizen';
		$this->view_data['ride'] = $this->ride_model->get_ride($id);
		$this->view_data['kaizen'] = $this->kaizen_model->get_kaizen_for_ride($id);

		$this->tabs($id, 'kaizen');

		if ($this->logged_in())
		{
			$this->view_data['submenu'] = array(
				'rides/create_kaizen/' . $id => 'Create kaizen'
			);
		}
				
		$this->show_view('kaizen/show');
	}

	public function create_kaizen($ride)
	{
		$this->requires_login();

		$this->load->helper('form');
		$this->load->helper('tiny_mce');
		$this->load->library('form_validation');
		
		$this->view_data['ride'] = $ride;
		$this->view_data['title'] = 'Kaizen';
		$this->tabs($ride, 'kaizen');
		
		$this->form_validation->set_rules('comment', 'Comment', 'required');
		
		if ($this->form_validation->run() === FALSE)
		{
			$this->show_view('kaizen/create');	
		}
		else
		{
			$this->load->model('kaizen_model');
			$this->kaizen_model->create_kaizen($ride, $this->input->post('comment'), $this->session->userdata('id'));
			redirect('/rides/kaizen/' . $ride);
		}		
	}
	
	public function update_kaizen()
	{
		$id = $this->input->post('id', TRUE);
		$state = $this->input->post('state', TRUE);
		
		$this->load->model('kaizen_model');
		$this->kaizen_model->update_kaizen($id, $state);
		
		$this->output->set_content_type('application/json')->set_output('true');					
	}}