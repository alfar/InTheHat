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
	
	public function profile($id)
	{
		$this->load->helper('tiny_mce');
		$this->load->library('overachiever');

		$this->view_data['user'] = $this->user_model->get_user($id);
		$this->view_data['achievements'] = $this->overachiever->get_achievements($id);
		$this->view_data['offering'] = $this->user_model->get_user_languages($id, 1);
		$this->view_data['looking_for'] = $this->user_model->get_user_languages($id, 2);
		
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
		$this->load->library('form_validation');

		$this->view_data['css'] = array('css/select2.css');

		$this->view_data['user'] = $this->user_model->get_user($this->view_data['userid']);
		$this->view_data['offering'] = $this->user_model->get_user_languages($this->view_data['userid'], 1);
		$this->view_data['looking_for'] = $this->user_model->get_user_languages($this->view_data['userid'], 2);
		
		$this->form_validation->set_rules('bio', 'Bio', 'required');
		
		if ($this->form_validation->run() === FALSE)
		{
			$this->show_view('users/edit_profile');	
		}
		else
		{			
			$this->user_model->update_bio($this->view_data['userid'], $this->input->post('bio', TRUE));
			$this->load->library('overachiever');
			$this->overachiever->award_achievement(16);
			redirect('/users/profile/' . $this->view_data['userid']);
		}
	}

	public function add_language()
	{
		$language = $this->input->post('language', TRUE);
		$level = $this->input->post('level', TRUE);
		$type = $this->input->post('type', TRUE);
		
		$this->load->library('overachiever');
		$this->overachiever->award_achievement(16 + $type);
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
			$this->overachiever->unaward_achievement(16 + $type);
		}
		
		$this->output->set_content_type('application/json')->set_output('true');					
}
}