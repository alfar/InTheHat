<?php
class Blog_model extends MY_Model {
	public function __construct() {
		$this->load->database();
	}
	
	public function count_blogs()
	{
		return $this->db->count_all('blog');
	}
	
	public function get_blogs($limit, $start)
	{
		$this->db->select('blog.*, user.name, user.image, count(comment.id) as comments');
		$this->db->order_by('posted', 'desc');
		$this->db->limit($limit, $start);
		$this->db->join('user', 'user.id = blog.author');
		$this->db->join('comment', 'comment.object_id = blog.id and `comment`.`type` = 1', 'left');
		$this->db->group_by('blog.id, blog.title, blog.text, blog.author, blog.posted, user.name, user.image');
		$query = $this->db->get('blog');
		return $query->result_array();
	}
	
	public function get_latest()
	{
		$this->db->select('blog.*, user.name, user.id as userId, user.image as userImage');
		$this->db->order_by('posted', 'desc');
		$this->db->limit(1, 0);
		$this->db->join('user', 'user.id = blog.author');
		$query = $this->db->get('blog');
		return $query->row_array();		
	}

	public function get_blogs_for_user($user, $limit, $start)
	{
		$this->db->order_by('posted', 'desc');
		$this->db->limit($limit, $start);
		$this->db->join('user', 'user.id = blog.author');
		$query = $this->db->get_where('blog', array('author' => $user));
		return $query->result_array();
	}
	
	public function get_blog($id)
	{
		$query = $this->db->get_where('blog', array('id' => $id));
		return $query->row_array();
	}
	
	public function create_blog($title, $text, $author)
	{
		$slug = url_title($title, 'dash', TRUE);
		
		$data = array(
			'title' => $title,
			'slug' => $slug,
			'text' => $text,
			'author' => $author
		);
		
		$this->db->insert('blog', $data);
		
		$id = $this->db->insert_id();
		
		$this->feed($this->user_link($author) . ' created a blog entry titled ' . anchor('/blogs/view/' . $id, $title));
		
		return $id;
	}
}
