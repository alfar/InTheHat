<?php
class Dashboard extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('blog_model');
		$this->load->model('ride_model');
		$this->load->model('user_model');
		$this->load->helper("url");
		$this->load->helper("text");
	}

	public function index() 
	{
		$this->view_data['nav'] = 'dashboard';
		$this->view_data['blog'] = $this->blog_model->get_latest();
		$this->view_data['ride'] = $this->ride_model->get_latest();
		$this->view_data['profile'] = $this->user_model->get_random();
		$this->view_data['profile_offers'] = $this->user_model->get_user_languages($this->view_data['profile']['id'], 1);
		$this->view_data['profile_seeking'] = $this->user_model->get_user_languages($this->view_data['profile']['id'], 2);
		
		$this->show_view('dashboard/index');
	}
}