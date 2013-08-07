<?PHP

class MY_Model extends CI_Model {
	public function get_language_id($language, $create = TRUE)
	{
		$langList = json_decode($language);
		
		if (is_array($langList)) {
			$language = $langList[0];
		}
		
		$this->db->select('id, alias_for');
		$languageQuery = $this->db->get_where('language', array('name' => $language));
		if ($languageQuery->num_rows() > 0)
		{
			$languageRow = $languageQuery->row_array();
			$languageId = $languageRow['alias_for'] > 0 ? $languageRow['alias_for'] : $languageRow['id'];
		}
		elseif ($create)
		{
			$languageData = array(
				'name' => $language
			);
			$this->db->insert('language', $languageData);
			$languageId = $this->db->insert_id();			
		}
		else
		{
			$languageId = FALSE;
		}
		
		return $languageId;
	}
	
	public function user_link($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('user');
		
		$user = $query->row_array();
		
		return anchor('/users/profile/' . $user['id'], $user['name']);
	}

	public function language_link($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('language');
		
		$language = $query->row_array();
		
		return anchor('/languages/show/' . $language['id'], $language['name']);
	}

	public function ride_link($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('ride');
		
		$ride = $query->row_array();
		
		return anchor('/rides/show/' . $ride['id'], $ride['name']);
	}
	
	public function feed($action)
	{
		$data = array(
			'action' => $action
		);
		
		$this->db->insert('feed', $data);
	}	
}
