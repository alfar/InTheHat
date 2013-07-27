<?php
class User_model extends MY_Model {
	public function __construct() {
		$this->load->database();
	}
	
	public function get()
	{
		$this->db->order_by('id', 'desc');
		$query = $this->db->get('user');
		return $query->result_array();
	}

	public function select($query = FALSE, $limit = FALSE, $start = FALSE)
	{
		if ($query != FALSE)
		{
			$this->db->like('name', $query, 'after');
		}
		
		if ($limit != FALSE)
		{
			$this->db->limit($limit, $start);
		}
		
		$this->db->select('id, name');
		$this->db->order_by('name', 'asc');
		$query = $this->db->get('user');
		return $query->result_array();
	}
	
	public function get_random()
	{
		$this->db->order_by('RAND()');
		$this->db->limit(1, 0);
		$query = $this->db->get('user');
		return $query->row_array();		
	}
	
	public function get_userid($provider, $uid)
	{
		$this->db->select('id');
		$query = $this->db->get_where('user', array('provider' => $provider, 'uid' => $uid));
		if ($query->num_rows() == 0)
		{
			return FALSE;
		}
		$row = $query->row_array();
		return $row['id'];
	}

	public function update_user($provider, $uid, $name, $email, $image)
	{		
		$data = array(
			'name' => $name,
			'email' => $email,
			'image' => $image
		);
		
		$id = $this->get_userid($provider, $uid);
		
		if ($id !== FALSE)
		{
			$this->db->where(array('id' => $id));
			$this->db->update('user', $data);
		}
		
		return $id;
	}
		
	public function create_user($provider, $uid, $name, $email, $image)
	{		
		$data = array(
			'provider' => $provider,
			'uid' => $uid,
			'name' => $name,
			'email' => $email,
			'image' => $image
		);
		
		$this->db->insert('user', $data);
		return $this->db->insert_id();
	}
	
	public function get_user($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('user');
		
		return $query->row_array();
	}
	
	public function get_user_languages($id, $type)
	{
		$this->db->where('user', $id);
		$this->db->where('type', $type);
		$this->db->join('language', 'language.id = user_languages.language');
		
		$query  = $this->db->get('user_languages');

		return $query->result_array();		
	}
	
	public function remove_user_language($user, $language, $type)
	{
		$this->db->where('user', $user);
		$this->db->where('language', $language);
		$this->db->where('type', $type);
		$this->db->delete('user_languages');
		
		$this->db->where('user', $user);
		$this->db->where('type', $type);
		return $this->db->count_all_results('user_languages');
	}

	public function update_user_language($user, $language, $level, $type)
	{
		$this->db->where('user', $user);
		$this->db->where('language', $language);
		$this->db->where('type', $type);
		
		$data = array(
			'level' => $level
		);
		
		$this->db->update('user_languages', $data);
	}

	private function language_levels()
	{
		static $data = array(
			'1' => 'Tarzan at a party',
			'2' => 'Getting to the party',
			'3' => 'What happened at the party?',
			'4' => 'What if parties were illegal?'
		);
		
		return $data;
	}
	
	private function language_level_name($level)
	{
		$data = $this->language_levels();
		return $data[$level];
	}
	
	public function add_user_language($user, $language, $level, $type)
	{
		$languageId = $this->get_language_id($language);

		$data = array(
			'user' => $user,
			'language' => $languageId,
			'level' => $level,
			'type' => $type
		);
		
		$this->db->insert('user_languages', $data);
		
		return array('language' => $languageId, 'name' => $language, 'level' => $level, 'levelname' => $this->language_level_name($level));
	}
	
	public function update_bio($id, $bio)
	{
		$data = array(
			'bio' => $bio
		);
		
		$this->db->where('id', $id);
		$this->db->update('user', $data);
	}
}
