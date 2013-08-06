<?php
class Session_model extends MY_Model {
	public function __construct() {
		$this->load->database();
	}

	public function create_table($name, $owner, $language)
	{
		$languageId = $this->get_language_id($language);			
				
		$data = array(
			'name' => $name,
			'language' => $languageId,
			'owner' => $owner
		);
		
		$this->db->insert('session_table', $data);				
		$id = $this->db->insert_id();
		
		$this->feed($this->user_link($owner) . ' created a session in called ' . anchor('/sessions/show/' . $id, $name));
		
		return $id;
	}

	public function get_tables($limit, $start)
	{
		$this->db->order_by('session_table.id', 'desc');
		$this->db->limit($limit, $start);
		$this->db->join('user', 'user.id = session_table.owner');
		$this->db->join('language', 'language.id = session_table.language');
		$this->db->select('session_table.*, language.id as language_id, language.name as language, user.id as ownerId, user.name as ownerName, user.image as ownerImage');
		$query = $this->db->get('session_table');
		return $query->result_array();
	}
	
	public function get_table($id)
	{
		$this->db->join('user', 'user.id = session_table.owner');
		$this->db->join('image', 'image.id = session_table.image', 'left');
		$this->db->select('session_table.*, user.id as ownerId, user.name as ownerName, user.image as ownerImage, image.path as background');
		$query = $this->db->get_where('session_table', array('session_table.id' => $id));
		return $query->row_array();
	}
	
	public function get_objects($table)
	{
		$this->db->select('session_object.*, image.path');		
		$this->db->join('image', 'image.id = session_object.image', 'left');
		$query = $this->db->get_where('session_object', array('tableId' => $table));
		return $query->result_array();
	}
	
	public function join_table($user, $table)
	{
		$this->db->where(array('userId' => $user, 'tableId' => $table));
				
		if ($this->db->count_all_results('session_participant') == 0)
		{
			$data = array(
				'userId' => $user,
				'tableId' => $table,
				'seat' => 0
			);
			
			$this->db->insert('session_participant', $data);
			
			$data = array(
				'objectId' => $user,
				'tableId' => $table,
				'action' => 5
			);				
			
			$this->db->insert('session_log', $data);
		}

		$this->feed($this->user_link($user) . ' visited a ' . anchor('/sessions/show/' . $table, 'session'));		
	}
	
	public function take_seat($user, $table, $seat)
	{
		$this->db->where(array(
			'userId' => $user,
			'tableId' => $table
		));
		$this->db->update('session_participant', array(
			'seat' => $seat
		));

		$data = array(
			'objectId' => $user,
			'tableId' => $table,
			'action' => 7,
			'toX' => $seat
		);
		
		$this->db->insert('session_log', $data);
	}
	
	public function leave_table($user, $table)
	{
		$this->db->where(array(
			'userId' => $user,
			'tableId' => $table
		));
		$this->db->delete('session_participant');

		$data = array(
			'objectId' => $user,
			'tableId' => $table,
			'action' => 6
		);
		
		$this->db->insert('session_log', $data);
	}
	
	public function get_participants($table)
	{
		$this->db->select('user.id as id, user.name as name, user.image as image, seat');
		$this->db->where('tableId', $table);
		$this->db->join('user', 'user.id = session_participant.userId');
		$query = $this->db->get('session_participant');
		
		return $query->result_array();
	}
	
	public function get_last_log_id($table)
	{
		$this->db->select_max('id');
		$this->db->where('tableId', $table);
		$query = $this->db->get('session_log');			
		if ($query->num_rows() > 0)
		{
			$row = $query->row_array();
			return $row['id'];
		}
		else
		{
			return 0;
		}
	}
	
	public function get_rolling_log($table, $last_log_id)
	{
		$this->db->select('session_log.*, user.name, user.image as userImage, image.path');
		$this->db->where('tableId', $table);
		$this->db->where('session_log.id >', $last_log_id);
		$this->db->join('user', 'user.id = session_log.objectid and session_log.action = 5', 'left');
		$this->db->join('image', 'image.id = session_log.imageId', 'left');
		$query = $this->db->get('session_log');
		
		if ($query->num_rows() == 0)
		{
			return FALSE;
		}
		
		return $query->result_array();
	}

	public function create_object($table, $label, $x, $y, $image = 0)
	{
		$data = array(
			'tableId' => $table,
			'label' => $label,
			'x' => $x,
			'y' => $y,
			'image' => $image
		);
		
		$this->db->insert('session_object', $data);
		
		$id = $this->db->insert_id();

		$this->db->query('insert into session_log (tableId, objectId, action, toX, toY, label, imageId) select tableId, id, 4, x, y, label, image from session_object where id = ?', array($id));
	}

	public function activate_object($id)
	{
		$this->db->query('insert into session_log (tableId, objectId, action) select tableId, id, 2 from session_object where id = ?', array($id));
	}

	public function destroy_object($id)
	{
		$this->db->query('insert into session_log (tableId, objectId, action) select tableId, id, 3 from session_object where id = ?', array($id));
		$this->db->where('id', $id);
		$this->db->delete('session_object');
	}
	
	public function move_object($id, $x, $y)
	{

		$this->db->query('insert into session_log (tableId, objectId, action, fromX, fromY, toX, toY) select tableId, id, 1, x, y, ?, ? from session_object where id = ?', array($x, $y, $id));

		$data = array(
			'x' => $x,
			'y' => $y
		);
		
		$this->db->where('id', $id);
		$this->db->update('session_object', $data);

	}
	
	public function set_background($id, $image)
	{
		$this->db->query('insert into session_log (tableId, action, imageId) values (?, 8, ?)', array($id, $image));

		$data = array(
			'image' => $image
		);
		
		$this->db->where('id', $id);
		
		$this->db->update('session_table', $data);		
	}
}