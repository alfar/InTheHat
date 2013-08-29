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

		if ($type == 1)
		{
			$this->db->select('blog.title');
			$this->db->where('id', $id);
			$blog = $this->db->get('blog')->row_array();
			$this->feed($this->user_link($author) . ' commented on a blog entry titled ' . anchor('/blogs/view/' . $id, $blog['title']));
		}
		elseif ($type == 2)
		{
			$this->db->select('kaizen.ride, ride.name');
			$this->db->join('ride', 'ride.id = kaizen.ride');
			$this->db->where('kaizen.id', $id);
			$kaizen = $this->db->get('kaizen')->row_array();
			
			$this->feed($this->user_link($author) . ' commented on a kaizen entry for the ride ' . anchor('/rides/kaizen/' . $kaizen['ride'], $kaizen['name']));			
		}
		
		$id = $this->db->insert_id();

		return $id;
	}
}
