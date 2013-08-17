<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Overachiever {
	public function track_counter($name) {
		$CI =& get_instance();
		$CI->load->model('counter_model');
		$id = $CI->counter_model->get_counter_id($name);
		return $CI->counter_model->track($id, $CI->view_data['userid']);
	}
	
	public function award_achievement($name) {
		$CI =& get_instance();
		$CI->load->model('counter_model');
		$id = $CI->counter_model->get_badge_id($name);
		return $CI->counter_model->award($id, $CI->view_data['userid']);
	}

	public function unaward_achievement($name) {
		$CI =& get_instance();
		$CI->load->model('counter_model');
		$id = $CI->counter_model->get_badge_id($name);
		return $CI->counter_model->unaward($id, $CI->view_data['userid']);
	}
}

/* End of file Overachiever.php */