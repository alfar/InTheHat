<?php
class Sessions extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('session_model');
		$this->view_data['nav'] = 'sessions';
	}

	public function index() 
	{
		$this->view_data['sessions'] = $this->session_model->get_tables(10, 0);

		if ($this->logged_in())
		{
			$this->view_data['submenu'] = array(
				'/sessions/create' => 'New session'
			);
		}

		$this->show_view('session/index');
	}
		
	public function show($table)
	{
		$this->view_data['table'] = $this->session_model->get_table($table);

		if ($this->logged_in())
		{
			$this->session_model->join_table($this->view_data['userid'], $table);
			if ($this->view_data['userid'] == $this->view_data['table']['owner'])
			{
				$this->view_data['mode'] = 'owner';
			}
			else
			{
				$this->view_data['mode'] = 'player';
			}
		}
		else
		{
			$this->view_data['mode'] = 'guest';
		}
		
		$this->view_data['css'] = array('css/session.css');
		$this->view_data['objects'] = $this->session_model->get_objects($table);

		$this->load->model('image_model');
		$this->view_data['image_folders'] = $this->image_model->get_folders(0);
		
		$this->view_data['object_types'] = array(array('name' => 'Sten'), array('name' => 'Rød pen'), array('name' => 'Sort pen'), array('name' => 'Pind')); //)$this->session_model->get_object_types($table);
		$this->view_data['players'] = $this->session_model->get_participants($table);
		$this->view_data['last_log_id'] = $this->session_model->get_last_log_id($table);
		
		$this->show_view('session/table', $this->view_data);
	}
	
	public function leave($table)
	{
		if ($this->logged_in())
		{
			$this->session_model->leave_table($this->view_data['userid'], $table);
			$this->output->set_content_type('application/json')->set_output('true');					
		}
		else
		{
			$this->output->set_content_type('application/json')->set_output('false');					
		}
	}
	
	public function take_seat()
	{
		$table = $this->input->post('table', TRUE);
		$seat = $this->input->post('seat', TRUE);		
		
		$this->session_model->take_seat($this->view_data['userid'], $table, $seat);
		$this->output->set_content_type('application/json')->set_output('true');					
	}
	
	public function create_object()
	{
		$this->requires_login();
		
		$table = $this->input->post('table', TRUE);
		$label = $this->input->post('label', TRUE);
		$x = $this->input->post('x', TRUE);
		$y = $this->input->post('y', TRUE);
		$image = $this->input->post('image', TRUE);
		
		$this->session_model->create_object($table, $label, $x, $y, $image);		
		$this->output->set_content_type('application/json')->set_output('true');					
	}
	
	public function move_object()
	{
		$this->requires_login();
		
		$id = $this->input->post('id', TRUE);
		$x = $this->input->post('x', TRUE);
		$y = $this->input->post('y', TRUE);
		
		$this->session_model->move_object($id, $x, $y);
		$this->output->set_content_type('application/json')->set_output('true');					
	}
	
	public function activate_object()
	{
		$this->requires_login();
		
		$id = $this->input->post('id', TRUE);
		$this->session_model->activate_object($id);
		$this->output->set_content_type('application/json')->set_output('true');					
	}
	
	public function destroy_object()
	{
		$this->requires_login();
		
		$id = $this->input->post('id', TRUE);
		$this->session_model->destroy_object($id);
		$this->output->set_content_type('application/json')->set_output('true');					
	}
	
	public function rolling_log()
	{
		$table = $this->input->get('id', TRUE);
		$last_log_id = $this->input->get('last_log_id', TRUE);

		$result = FALSE;
		$repeats = 20;
		
		while ($repeats > 0)
		{
			$repeats--;
			$result = $this->session_model->get_rolling_log($table, $last_log_id);
			if ($result == FALSE)
			{
				usleep(1000000);
			}
			else
			{
				$repeats = 0;
			}
		}		
		
		$this->output->set_content_type('application/json')->set_output(json_encode($result));					
	}

	public function set_background()
	{
		$table = $this->input->post('table', TRUE);
		$image = $this->input->post('image', TRUE);		
		
		$this->session_model->set_background($table, $image);
		$this->output->set_content_type('application/json')->set_output('true');					
	}
	
	public function create()
	{
		$this->requires_login();
		$this->load->helper('form');
		$this->load->helper('select2');
		$this->load->library('form_validation');
		
		$this->view_data['css'] = array('css/select2.css');
		$this->view_data['title'] = 'Create session';

		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('language', 'Language', 'required');
		
		if ($this->form_validation->run() === FALSE)
		{		
			$this->show_view('session/create');
		}
		else
		{
			$table = $this->session_model->create_table($this->input->post('name', TRUE), $this->view_data['userid'], $this->input->post('language', TRUE));
			
			redirect('sessions/show/' . $table);
		}		
	}
}