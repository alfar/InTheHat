<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Overachiever {
	public function track_counter($id) {
		$CI =& get_instance();
		//$result = json_decode(file_get_contents('http://overachiever.co/trackers/' . $id . '/record/' . $CI->view_data['userid'] . '.json'));
		return 0; $result['counter'];
	}
	
	public function award_achievement($id) {
		$CI =& get_instance();
		//$result = json_decode(file_get_contents('http://overachiever.co/achievements/' . $id . '/award/' . $CI->view_data['userid'] . '.json'));
	}

	public function unaward_achievement($id) {
		$CI =& get_instance();
		//$result = json_decode(file_get_contents('http://overachiever.co/achievements/' . $id . '/award/' . $CI->view_data['userid'] . '/delete.json'));
	}
	
	public function get_achievements($user = FALSE) {
		$CI =& get_instance();
		if ($user == FALSE)
		{
			$user = $CI->view_data['userid'];
		}
		
		//$result = json_decode(file_get_contents('http://overachiever.co/websites/10/' . $user . '.json'), TRUE);
		return array(); //$result['achievements'];
	}
}

/* End of file Overachiever.php */