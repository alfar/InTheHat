<?php
class Kaizen_model extends CI_Model {
	public function __construct() {
		$this->load->database();
	}
	
	public function get_kaizen_for_ride($ride)
	{
		$this->db->select('kaizen.id, kaizen.comment, kaizen.state, kaizen.author, user.name as author_name, user.image as author_image');
		$this->db->where('ride', $ride);
		$this->db->order_by('kaizen.id', 'desc');
		$this->db->join('user', 'user.id = kaizen.author');
		$query = $this->db->get('kaizen');
		return $query->result_array();
	}
	
	public function get_kaizen_for_user($user)
	{
		$this->db->select('kaizen.id, kaizen.comment, kaizen.state, kaizen.ride, ride.name as ride_name');
		$this->db->where('kaizen.author', $user);
		$this->db->order_by('kaizen.id', 'desc');
		$this->db->join('ride', 'ride.id = kaizen.ride');
		$query = $this->db->get('kaizen');
		return $query->result_array();
	}
	
	public function get_kaizen($id)
	{
		$query = $this->db->get_where('kaizen', array('id' => $id));
		return $query->row_array();
	}
	
	public function create_kaizen($ride, $comment, $author)
	{
		$data = array(
			'ride' => $ride,
			'comment' => $comment,
			'author' => $author,
			'state' => 0
		);
		
		return $this->db->insert('kaizen', $data);
	}
	
	public function update_kaizen($id, $state)
	{
		$this->db->where('id', $id);
		$this->db->update('kaizen', array('state' => $state));
	}
}
