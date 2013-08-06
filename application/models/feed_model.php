<?php
class Feed_model extends MY_Model {
	public function __construct() {
		$this->load->database();
	}
		
	public function get($limit, $start)
	{
		$this->db->order_by('time', 'desc');
		$this->db->limit($limit, $start);
		$query = $this->db->get('feed');
		return $query->result_array();
	}	
}
