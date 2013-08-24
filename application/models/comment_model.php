<?php
class Comment_model extends MY_Model {
	public function __construct() {
		$this->load->database();
	}
	
	public function count_comments($type, $id)
	{
		$this->db->where('type', $type);
		$this->db->where('object_id', $id);
		return $this->db->count_all_results('comment');
	}
	
	public function get_comments($type, $id, $limit, $start)
	{
		$this->db->select('comment.id, text, posted, author, user.name as authorName');
		$this->db->order_by('posted', 'desc');
		$this->db->where('type', $type);
		$this->db->where('object_id', $id);
		$this->db->limit($limit, $start);
		$this->db->join('user', 'user.id = comment.author');
		$query = $this->db->get('comment');
		return $query->result_array();
	}
	
	public function get_new_comments($type, $id, $latest)
	{
		$this->db->select('comment.id, text, posted, author, user.name as authorName');
		$this->db->where('type', $type);
		$this->db->where('object_id', $id);
		$this->db->where('comment.id >', $latest);
		$this->db->join('user', 'user.id = comment.author');
		$query = $this->db->get('comment');
		return $query->result_array();
	}
	
	public function create($type, $id, $text, $author)
	{
		$data = array(
			'type' => $type,
			'object_id' => $id,
			'text' => $text,
			'author' => $author
		);
		
		$this->db->insert('comment', $data);
		
		$id = $this->db->insert_id();

		return $id;
	}
}
