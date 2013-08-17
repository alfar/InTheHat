<?php
class Counter_model extends MY_Model {
	public function __construct() {
		$this->load->database();
	}

	public function track($counter, $user, $points = 1)
	{
		$key = array(
			'counter_id' => $counter,
			'user_id' => $user
		);
		$this->db->where($key);
		
		$track = $this->db->get('user_counters');
		if ($track->num_rows() == 0)
		{
			$value = 0;
			$new_value = $points;
			$this->db->set('value', $value, FALSE);
			$this->db->insert('user_counters', $key);
		}
		else
		{
			$row = $track->row_array();
			$value = $row['value'];
			$new_value = $value + $points;

			$this->db->where($key);
			$this->db->set('value', $new_value);
			$this->db->update('user_counters');
		}
		
		$this->db->where('counter_id', $counter);		
		$this->db->where('threshold <=', $new_value);
		$this->db->where('user_id', NULL);
		
		$this->db->join('user_badges', 'user_badges.badge_id = badge.id and user_badges.user_id = ' . $user, 'left');
		
		$badges = $this->db->get('badge');
		foreach ($badges->result_array() as $badge)
		{
			$this->db->insert('user_badges', array('badge_id' => $badge['id'], 'user_id' => $user));
			$this->feed($this->user_link($user) . ' was awarded the badge ' . anchor('/badges/show/' . $badge['id'], $badge['name']));			
		}
	}
	
	public function get_counter_id($name)
	{
		$this->db->select('id');
		$this->db->where('name', $name);
		$query = $this->db->get('counter');
		
		$row = $query->row_array();
		
		return $row['id'];
	}
	
	public function get_badge_id($name)
	{
		$this->db->select('id');
		$this->db->where('name', $name);
		$query = $this->db->get('badge');
		
		$row = $query->row_array();
		
		return $row['id'];
	}
	
	public function get_counters($user)
	{
		$this->db->select('counter.name, coalesce(user_counters.value, 0) as value', FALSE);
		$this->db->join('user_counters', 'counter.id = user_counters.counter_id and user_id = ' . $user, 'left outer');
		$query = $this->db->get('counter');
		
		return $query->result_array();
	}
	
	public function get_badges($user)
	{
		$this->db->select('badge.id, badge.name');
		$this->db->join('user_badges', 'user_badges.badge_id = badge.id');
		$this->db->where('user_badges.user_id', $user);		
		$query = $this->db->get('badge');
				
		return $query->result_array();
	}
}
