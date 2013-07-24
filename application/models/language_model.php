<?php
class Language_model extends CI_Model {
	public function __construct() {
		$this->load->database();
	}
	
	public function get($q = FALSE, $create_new = TRUE, $limit = FALSE, $start = FALSE)
	{
		if ($q != FALSE)
		{
			$this->db->like('name', $q, 'after');
		}
		
		if ($limit != FALSE)
		{
			$this->db->limit($limit, $start);
		}
		
		$this->db->select('id, name');
		$this->db->order_by('name');
		$query = $this->db->get('language');
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		else
		{
			if ($create_new === TRUE) {
				return array(array('id' => 0, 'name' => $q));
			}
			else
			{
				return array();
			}
		}
	}
	
	public function get_language($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('language');
		return $query->row_array();
	}
	
	public function get_language_users($id, $type)
	{
		$this->db->where('language', $id);
		$this->db->where('type', $type);
		$this->db->join('user', 'user.id = user_languages.user');
		
		$query  = $this->db->get('user_languages');

		return $query->result_array();		
	}
	
	public function get_rides($language)
	{
		$this->db->where('language', $language);
		$this->db->select('ride.id, ride.name, ride.author, user.name AS userName, user.image as userImage');
		$this->db->join('user', 'user.id = ride.author');
		$query = $this->db->get('ride');
		return $query->result_array();
	}

	public function get_paths($language)
	{
		$this->db->where('language', $language);
		$this->db->select('path.id, path.name, path.owner, user.name as ownerName, user.image as ownerImage');
		$this->db->order_by('path.id', 'desc');
		$this->db->join('user', 'user.id = path.owner');
		$query = $this->db->get('path');
		return $query->result_array();
	}
		
	public function autocomplete($query)
	{
		$this->db->select('name');
		$this->db->like('name', $query, 'after');
		$query = $this->db->get('language');
		
		$result = array();
		foreach ($query->result_array() as $row) 
		{
			$result[] = $row['name'];
		}
		
		return $result;
	}	
}
