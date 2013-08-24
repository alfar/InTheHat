<?php
class Counters extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('counter_model');
		$this->load->helper("url");
		$this->view_data['nav'] = 'badges';
	}
	
	public function show($id)
	{
		$this->view_data['counter'] = $this->counter_model->get_counter($id);
		$this->view_data['users'] = $this->counter_model->get_counter_users($id);
		
		$this->show_view('counter/show');
	}
}