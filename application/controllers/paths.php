<?php
class Paths extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('ride_model');	
		$this->view_data['nav'] = 'paths';
	}

	public function index()
	{		
		$this->view_data['paths'] = $this->ride_model->get_paths();
		if ($this->logged_in())
		{
			$this->view_data['submenu'] = array(
				'/paths/create' => 'New path'
			);
		}
		
		$this->show_view('paths/index');
	}
	
	public function show($id)
	{
		$path = $this->ride_model->get_path($id);		
		$this->view_data['path'] = $path;
		$this->view_data['rides'] = $this->ride_model->get_path_rides($id);

		if ($this->view_data['userid'] == $path['owner']) {
			$this->view_data['submenu'] = array(
				'paths/add_rides/'. $path['id'] => 'Edit path'
			);			
		}
		
		$this->show_view('paths/show');
	}
	
	public function create()
	{
		$this->requires_login();
		$this->load->helper('form');
		$this->load->helper('tiny_mce');
		$this->load->library('form_validation');

		$this->view_data['css'] = array('css/select2.css');
		$this->view_data['title'] = 'Create ride';
		
		$this->form_validation->set_rules('name', 'Name', 'required');
		
		if ($this->form_validation->run() === FALSE)
		{
			$this->show_view('paths/create');	
		}
		else
		{
			$this->load->model('ride_model');		
			$id = $this->ride_model->create_path($this->input->post('name'), $this->input->post('language'), $this->session->userdata('id'));
			redirect('/paths/show/' . $id);
		}
	}
	
	public function add_rides($path)
	{
		$this->requires_login();

		$this->view_data['path'] = $this->ride_model->get_path($path);
		$this->view_data['rides'] = $this->ride_model->get_path_rides($path);
		
		$this->show_view('paths/add_rides');
	}
	
	public function move_ride()
	{
		$this->requires_login();
		
		$path = $this->input->post('path', TRUE);
		$ride = $this->input->post('ride', TRUE);
		$move_before = $this->input->post('move_before', TRUE);
		
		if ($ride != $move_before)
		{
			$this->load->model('ride_model');
			$this->ride_model->move_path_ride($path, $ride, $move_before);			
		}
		
		$this->output->set_content_type('application/json')->set_output(json_encode(TRUE));
	}
	
	public function remove_ride()
	{
		$this->requires_login();

		$path = $this->input->post('path', TRUE);
		$ride = $this->input->post('ride', TRUE);

		$this->load->model('ride_model');
		$this->ride_model->remove_path_ride($path, $ride);
		
		$this->output->set_content_type('application/json')->set_output(json_encode(TRUE));
	}

	public function insert_ride()
	{
		$this->requires_login();
		
		$path = $this->input->post('path', TRUE);
		$ride = $this->input->post('ride', TRUE);
		$before = $this->input->post('before', TRUE);
		
		$this->load->model('ride_model');
		$this->ride_model->insert_path_ride($path, $ride, $before);
		
		$this->output->set_content_type('application/json')->set_output(json_encode(TRUE));
	}

}