<?PHP

class Users extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');		
		$this->view_data['nav'] = 'users';
	}

	public function index()
	{
		$this->output->set_content_type('application/json')->set_output(json_encode($this->user_model->get()));					
	}

	public function select($exclude_self = FALSE)
	{
		$query = $this->input->get('q', TRUE);
		$page = $this->input->get('p', TRUE);
		
		if ($exclude_self != FALSE)
		{
			$exclude_self = $this->view_data['userid'];
		}
		$result = $this->user_model->select($query, $exclude_self, 10, ($page - 1) * 10);

		$this->output->set_content_type('application/json')->set_output(json_encode(array('more' => count($result) == 10, 'results' => $result)));
	}

	private function tabs($id, $active)
	{
		$this->view_data['tabs'] = array(
				array('url' => 'users/profile/' . $id, 'text' => 'Profile', 'active' => $active == 'profile'),
				array('url' => 'users/stats/' . $id, 'text' => 'Stats', 'active' => $active == 'stats'),
		);
	}
		
	public function stats($id)
	{
		$this->load->model('counter_model');
		$this->tabs($id, 'stats');
		
		$this->view_data['user'] = $this->user_model->get_user($id);
		$this->view_data['counters'] = $this->counter_model->get_counters($id);
		$this->view_data['badges'] = $this->counter_model->get_badges($id);

		$this->show_view('users/stats');
	}
	
	public function profile($id)
	{
		$this->load->library('overachiever');
		$this->load->helper('select2');
		$this->tabs($id, 'profile');

		$this->view_data['user'] = $this->user_model->get_user($id);
		$this->view_data['offering'] = $this->user_model->get_user_languages($id, 1);
		$this->view_data['looking_for'] = $this->user_model->get_user_languages($id, 2);
		$this->view_data['signoffs'] = $this->user_model->get_signoffs($id);
		$this->view_data['rides'] = $this->user_model->get_rides($id);
		
		if ($this->view_data['userid'] == $id)
		{
			$this->view_data['submenu'] = array(
				'users/edit_profile' => 'Edit profile'
			);
		}

		$this->show_view('users/profile');
	}
	
	public function edit_profile()
	{
		$this->requires_login();
		
		$this->load->helper('form');
		$this->load->helper('tiny_mce');
		$this->load->helper('select2');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('name', 'Name', 'trim|xss_clean|required');
		$this->form_validation->set_rules('bio', 'Bio', 'xss_clean|required');
		
		if ($this->form_validation->run() === FALSE)
		{
			$this->view_data['css'] = array('css/select2.css');
	
			$this->view_data['user'] = $this->user_model->get_user($this->view_data['userid']);
			$this->view_data['offering'] = $this->user_model->get_user_languages($this->view_data['userid'], 1);
			$this->view_data['looking_for'] = $this->user_model->get_user_languages($this->view_data['userid'], 2);
			
			$this->show_view('users/edit_profile');	
		}
		else
		{			
			$this->user_model->update_profile($this->view_data['userid'], $this->input->post('name', TRUE), $this->input->post('bio', TRUE));
			$this->load->library('overachiever');
			$this->overachiever->award_achievement('Updated profile');
			redirect('/users/profile/' . $this->view_data['userid']);
		}
	}

	public function add_language()
	{
		$language = $this->input->post('language', TRUE);
		$level = $this->input->post('level', TRUE);
		$type = $this->input->post('type', TRUE);
		
		$this->load->library('overachiever');
			if ($type == 1)
			{
				$this->overachiever->award_achievement('An offer you can\'t refuse');
			} 
			else
			{
				$this->overachiever->award_achievement('Looking for language');
			}
		$this->output->set_content_type('application/json')->set_output(json_encode($this->user_model->add_user_language($this->view_data['userid'], $language, $level, $type)));					
	}
	
	public function update_language()
	{
		$language = $this->input->post('language', TRUE);
		$type = $this->input->post('type', TRUE);
		$level = $this->input->post('level', TRUE);
		
		$this->user_model->update_user_language($this->view_data['userid'], $language, $level, $type);
		$this->output->set_content_type('application/json')->set_output('true');					
	}

	public function remove_language()
	{
		$language = $this->input->post('language', TRUE);
		$type = $this->input->post('type', TRUE);
		
		if ($this->user_model->remove_user_language($this->view_data['userid'], $language, $type) == 0)
		{
			$this->load->library('overachiever');
			if ($type == 1)
			{
				$this->overachiever->unaward_achievement('An offer you can\'t refuse');
			} 
			else
			{
				$this->overachiever->unaward_achievement('Looking for language');
			}
		}
		
		$this->output->set_content_type('application/json')->set_output('true');					
}
}