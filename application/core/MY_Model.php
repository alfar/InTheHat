<?PHP

class MY_Model extends CI_Model {
	public function get_language_id($language, $create = TRUE)
	{
		$langList = json_decode($language);
		
		if (is_array($langList)) {
			$language = $langList[0];
		}
		
		$this->db->select('id');
		$languageQuery = $this->db->get_where('language', array('name' => $language));
		if ($languageQuery->num_rows() > 0)
		{
			$languageRow = $languageQuery->row_array();
			$languageId = $languageRow['id'];
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
	
}
