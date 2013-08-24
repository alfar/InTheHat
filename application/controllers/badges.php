<?php
class Badges extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('counter_model');
		$this->load->helper("url");
		$this->view_data['nav'] = 'badges';
	}
	
	public function index()
	{
		$this->view_data['badges'] = $this->counter_model->get_all_badges($this->user_id());
		
		$this->show_view('badge/index');
	}
	
	public function show($id)
	{
		$this->view_data['badge'] = $this->counter_model->get_badge($id);
		$this->view_data['users'] = $this->counter_model->get_badge_users($id);
		
		$this->show_view('badge/show');
	}
}