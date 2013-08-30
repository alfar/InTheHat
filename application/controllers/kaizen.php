<?php
class Kaizen extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('ride_model');		
		$this->load->model('kaizen_model');		
		$this->view_data['nav'] = 'rides';
	}

	private function tabs($active)
	{
		$this->view_data['tabs'] = array(
				array('url' => 'kaizen/incoming', 'text' => 'Incoming', 'active' => $active == 'incoming'),
				array('url' => 'kaizen/outgoing', 'text' => 'Outgoing', 'active' => $active == 'outgoing'),
		);		
	}
		
	public function outgoing()
	{
		$this->load->helper('select2');
		
		$this->tabs('outgoing');

		$this->view_data['css'] = array('css/select2.css');

		$this->view_data['title'] = 'Your outgoing kaizen';
		$this->view_data['kaizen'] = $this->kaizen_model->get_kaizen_from_user($this->user_id());
		$this->view_data['nav'] = 'profile';
		
		$this->show_view('kaizen/show_yours');
	}

	public function incoming()
	{
		$this->load->helper('select2');

		$this->tabs('incoming');

		$this->view_data['css'] = array('css/select2.css');

		$this->view_data['title'] = 'Your incoming kaizen';
		$this->view_data['kaizen'] = $this->kaizen_model->get_kaizen_for_user($this->user_id());
		$this->view_data['nav'] = 'profile';
		
		$this->show_view('kaizen/show_yours');
	}
}