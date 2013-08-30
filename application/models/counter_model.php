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
			$this->db->set('value', $new_value, FALSE);
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

	public function untrack($counter, $user, $points = 1)
	{
		$key = array(
			'counter_id' => $counter,
			'user_id' => $user
		);
		$this->db->where($key);
		
		$track = $this->db->get('user_counters');
		$row = $track->row_array();
		$value = $row['value'];
		$new_value = $value - $points;

		$this->db->where($key);
		$this->db->set('value', $new_value);
		$this->db->update('user_counters');
		
		$this->db->where('counter_id', $counter);		
		$this->db->where('threshold >', $new_value);
		
		$this->db->join('user_badges', 'user_badges.badge_id = badge.id and user_badges.user_id = ' . $user);
		
		$badges = $this->db->get('badge');
		foreach ($badges->result_array() as $badge)
		{
			$this->db->delete('user_badges', array('badge_id' => $badge['id'], 'user_id' => $user));
			$this->feed($this->user_link($user) . ' had the badge ' . anchor('/badges/show/' . $badge['id'], $badge['name']) . ' taken');			
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
	
	public function get_badge_name($id)
	{
		$this->db->select('name');
		$this->db->where('id', $id);
		$query = $this->db->get('badge');
		
		$row = $query->row_array();
		
		return $row['name'];
	}
	
	public function get_counter($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('counter');
		return $query->row_array();
	}
	
	public function get_counter_users($id)
	{
		$this->db->select('user.id, user.name, coalesce(user_counters.value, 0) as value', FALSE);
		$this->db->join('user_counters', 'user.id = user_counters.user_id and counter_id = ' . $id);
		$this->db->order_by('value desc');
		$query = $this->db->get('user');
		
		return $query->result_array();
	}
	
	public function get_counters($user)
	{
		$this->db->select('counter.id, counter.name, coalesce(user_counters.value, 0) as value', FALSE);
		$this->db->join('user_counters', 'counter.id = user_counters.counter_id and user_id = ' . $user, 'left outer');
		$query = $this->db->get('counter');
		
		return $query->result_array();
	}
	
	public function award($badge, $user)
	{		
		$this->db->insert('user_badges', array('user_id' => $user, 'badge_id' => $badge));
		
		$this->feed($this->user_link($user) . ' was awarded the badge ' . anchor('/badges/show/' . $badge, $this->get_badge_name($badge)));			
	}

	public function unaward($badge, $user)
	{		
		$this->db->delete('user_badges', array('user_id' => $user, 'badge_id' => $badge));
	}
	
	public function get_badges($user)
	{
		$this->db->select('badge.id, badge.name');
		$this->db->join('user_badges', 'user_badges.badge_id = badge.id');
		$this->db->where('user_badges.user_id', $user);		
		$this->db->order_by('badge.name');
		$query = $this->db->get('badge');
				
		return $query->result_array();
	}

	public function get_all_badges($user)
	{
		$this->db->select('badge.id, badge.name, user_badges.user_id as has_badge');
		$this->db->join('user_badges', 'user_badges.badge_id = badge.id and user_badges.user_id = ' . ($user ? $user : '0'), 'left');
		$this->db->order_by('has_badge desc, badge.name');
		$query = $this->db->get('badge');
				
		return $query->result_array();
	}
	
	public function get_badge($id)
	{
		$this->db->select('badge.id, badge.name, counter.name as counter_name, badge.threshold, badge.description');
		$this->db->where('badge.id', $id);
		$this->db->join('counter', 'counter.id = badge.counter_id', 'left');
		
		$query = $this->db->get('badge');
				
		return $query->row_array();
	}
	
	public function get_badge_users($id)
	{
		$this->db->select('user.id, user.name, user.image');
		$this->db->join('user', 'user.id = user_badges.user_id');
		$this->db->where('badge_id', $id);
		$query = $this->db->get('user_badges');
				
		return $query->result_array();
	}
}
