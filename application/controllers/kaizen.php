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
		
	public function yours()
	{
		$this->load->helper('select2');

		$this->view_data['css'] = array('css/select2.css');

		$this->view_data['title'] = 'Kaizen';
		$this->view_data['kaizen'] = $this->kaizen_model->get_kaizen_for_user($this->user_id());
		$this->view_data['nav'] = 'profile';
		
		$this->show_view('kaizen/show_yours');
	}
}