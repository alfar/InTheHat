<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Overachiever {
	public function track_counter($name, $user = FALSE) {		
		$CI =& get_instance();
		if ($user == FALSE)
		{
			$user = $CI->view_data['userid'];
		}
		$CI->load->model('counter_model');
		$id = $CI->counter_model->get_counter_id($name);
		return $CI->counter_model->track($id, $user);
	}
	
	public function award_achievement($name, $user = FALSE) {
		$CI =& get_instance();
		if ($user == FALSE)
		{
			$user = $CI->view_data['userid'];
		}
		$CI->load->model('counter_model');
		$id = $CI->counter_model->get_badge_id($name);
		return $CI->counter_model->award($id, $user);
	}

	public function unaward_achievement($name, $user = FALSE) {
		$CI =& get_instance();
		if ($user == FALSE)
		{
			$user = $CI->view_data['userid'];
		}
		$CI->load->model('counter_model');
		$id = $CI->counter_model->get_badge_id($name);
		return $CI->counter_model->unaward($id, $user);
	}
}

/* End of file Overachiever.php */