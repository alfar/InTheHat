<?php
class Ride_model extends MY_Model {
	public function __construct() {
		$this->load->database();
	}
	
	public function get($limit = FALSE, $start = 0, $language = FALSE, $user = FALSE)
	{
		if ($language !== FALSE)
		{
			$this->db->where('language', $language);
		}
		$this->db->order_by('id', 'desc');
		$this->db->select('ride.id, ride.name, language.id AS language_id, language.name AS language, ride.author, user.name AS userName, user.image as userImage');
		if ($user !== FALSE)
		{
			$this->db->select('max(user_ride.score) as signoffs');
			$this->db->join('user_ride', 'user_ride.ride = ride.id and user_ride.user = ' . $user, 'left');
			$this->db->group_by('id, name, language_id, language, author, userName, userImage');
		}
		else
		{
			$this->db->select('0 as signoffs', FALSE);
		}
		$this->db->join('user', 'user.id = ride.author');
		$this->db->join('language', 'language.id = ride.language');
		if ($limit != FALSE)
		{
			$this->db->limit($limit, $start);
		}
		$query = $this->db->get('ride');
		return $query->result_array();
	}
	
	public function get_latest()
	{
		$this->db->order_by('id', 'desc');
		$this->db->select('ride.id, ride.name, language.id as language_id, language.name AS language, ride.author, user.name AS userName, user.image as userImage');
		$this->db->join('user', 'user.id = ride.author');
		$this->db->join('language', 'language.id = ride.language');
		$this->db->limit(1, 0);
		$query = $this->db->get('ride');
		return $query->row_array();
	}

	public function search($language_id, $searchword)
	{
		if ($language_id !== FALSE)
		{
			$this->db->where('language', $language_id);
		}
		$this->db->like('ride.name', $searchword);

		$this->db->select('ride.id, ride.name, language.name AS language, ride.author, user.name AS userName, user.image as userImage');
		$this->db->join('user', 'user.id = ride.author');
		$this->db->join('language', 'language.id = ride.language');
		
		$query = $this->db->get('ride');
		return $query->result_array();
	}

	public function get_for_user($user, $limit = FALSE, $start = 0)
	{
		$this->db->order_by('id', 'desc');
		$this->db->select('ride.id, ride.name, language.name AS language, ride.author, user.name AS userName, user.image as userImage');
		$this->db->join('user', 'user.id = ride.author');
		$this->db->join('language', 'language.id = ride.language');
		if ($limit != FALSE)
		{
			$this->db->limit($limit, $start);
		}
		$query = $this->db->get_where('ride', array('author' => $user));
		return $query->result_array();
	}	
	
	public function get_ride($id)
	{
		$this->db->select('ride.id, ride.name, ride.description, language.id AS language_id, language.name AS language, ride.author, user.name AS ownerName, user.image as ownerImage');
		$this->db->join('user', 'user.id = ride.author');
		$this->db->join('language', 'language.id = ride.language');
		$query = $this->db->get_where('ride', array('ride.id' => $id));
		return $query->row_array();
	}
	
	public function create_ride($name, $description, $language, $author)
	{
		$languageId = $this->get_language_id($language);			
				
		$data = array(
			'name' => $name,
			'description' => $description,
			'language' => $languageId,
			'author' => $author
		);
		
		$this->db->insert('ride', $data);
		$id = $this->db->insert_id();
		
		$this->feed($this->user_link($author) . ' created a ride in ' . $this->language_link($languageId) . ' called ' . anchor('/rides/show/' . $id, $name));
		
		return $id;		
	}

	public function update_ride($id, $name, $description, $language, $author)
	{
		$languageId = $this->get_language_id($language);			
				
		$data = array(
			'name' => $name,
			'description' => $description,
			'language' => $languageId,
			'author' => $author
		);

		$this->feed($this->user_link($author) . ' updated a ride in ' . $this->language_link($languageId) . ' called ' . anchor('/rides/show/' . $id, $name));
		
		$this->db->where('id', $id);
		$this->db->update('ride', $data);
	}	
	
	public function create_path($name, $language, $owner)
	{
		$languageId = $this->get_language_id($language);
				
		$data = array(
			'name' => $name,
			'language' => $languageId,
			'owner' => $owner
		);

		$this->db->insert('path', $data);
		$id = $this->db->insert_id();		
		
		$this->feed($this->user_link($owner) . ' created a path in ' . $this->language_link($languageId) . ' called ' . anchor('/paths/show/' . $id, $name));

		return $id;		
	}
	
	public function get_paths()
	{
		$this->db->select('path.id, path.name, path.owner, user.name as ownerName, user.image as ownerImage, language.id as language_id, language.name as language');
		$this->db->order_by('path.id', 'desc');
		$this->db->join('language', 'language.id = path.language');
		$this->db->join('user', 'user.id = path.owner');
		$query = $this->db->get('path');
		return $query->result_array();
	}
	
	public function get_path($id)
	{
		$this->db->select('path.id, path.name, path.owner, user.name as ownerName, user.image as ownerImage, language.id as language_id, language.name as language');
		$this->db->where('path.id', $id);
		$this->db->join('language', 'language.id = path.language');
		$this->db->join('user', 'user.id = path.owner');
		$query = $this->db->get('path');
		return $query->row_array();
	}
	
	public function get_path_rides($path, $user = FALSE)
	{
		$this->db->select('path_ride.next_ride, ride.*');
		$this->db->where('path_ride.path', $path);
		$this->db->join('ride', 'ride.id = path_ride.ride');

		if ($user !== FALSE)
		{
			$this->db->select('max(user_ride.score) as signoffs');
			$this->db->join('user_ride', 'user_ride.ride = ride.id and user_ride.user = ' . $user, 'left');
			$this->db->group_by('next_ride, id, name, language, author');
		}
		else
		{
			$this->db->select('0 as signoffs', FALSE);
		}

		$query = $this->db->get('path_ride');
		$results = array();
		$output = array();
		foreach($query->result_array() as $ride)
		{
			$results[$ride['next_ride']] = $ride;
		}
		$current = 0;
		
		while (array_key_exists($current, $results))
		{
			array_unshift($output, $results[$current]);
			$current = $results[$current]['id'];
		}
		
		return $output;
	}
	
	public function get_previous_ride($ride, $path)
	{
		$this->db->select('ride.*');
		$this->db->where('path_ride.path', $path);
		$this->db->where('path_ride.next_ride', $ride);
		$this->db->join('ride', 'ride.id = path_ride.ride');
		$query = $this->db->get('path_ride');
		if ($query->num_rows() == 0)
		{
			return FALSE;
		}
		return $query->row_array();
	}

	public function get_next_ride($ride, $path)
	{
		$this->db->select('ride.*');
		$this->db->where('path_ride.path', $path);
		$this->db->where('path_ride.ride', $ride);
		$this->db->join('ride', 'ride.id = path_ride.next_ride');
		$query = $this->db->get('path_ride');
		if ($query->num_rows() == 0)
		{
			return FALSE;
		}
		return $query->row_array();
	}	

	public function remove_path_ride($path, $ride)
	{
		$next = $this->get_next_ride($ride, $path);
		
		if ($next != FALSE)
		{
			$next_id = $next['id'];
		}
		else
		{
			$next_id = 0;
		}

		$data = array(
			'next_ride' => $next_id
		);
		$this->db->where(array(
			'path' => $path,
			'next_ride' => $ride
		));					
		$this->db->update('path_ride', $data);		

		$this->db->where(array(
			'path' => $path,
			'ride' => $ride
		));
		
		$this->db->delete('path_ride');					
	}
	
	public function move_path_ride($path, $ride, $move_before)
	{
		$next = $this->get_next_ride($ride, $path);
		
		if ($next != FALSE)
		{
			$next_id = $next['id'];
		}
		else
		{
			$next_id = 0;
		}

		$data = array(
			'next_ride' => $next_id
		);
		$this->db->where(array(
			'path' => $path,
			'next_ride' => $ride
		));					
		$this->db->update('path_ride', $data);		
				
		$data = array(
			'next_ride' => $ride,
		);
		$this->db->where(array(
			'path' => $path,
			'next_ride' => $move_before
		));					
		$this->db->update('path_ride', $data);		

		$data = array(
			'next_ride' => $move_before,
		);
		$this->db->where(array(
			'path' => $path,
			'ride' => $ride
		));			
		$this->db->update('path_ride', $data);				
	}

	public function insert_path_ride($path, $ride, $before)
	{
		$data = array(
			'next_ride' => $ride,
		);
		$this->db->where(array(
			'path' => $path,
			'next_ride' => $before
		));					
		$this->db->update('path_ride', $data);		
		
		$data = array(
			'ride' => $ride,
			'path' => $path,
			'next_ride' => $before
		);
		
		$this->db->insert('path_ride', $data);
	}
	
	public function signoff($ride, $user, $signee, $score, $comment)
	{
		$data = array(
			'ride' => $ride,
			'user' => $user,
			'signee' => $signee
		);
		
		if ($this->db->where($data)->count_all_results('user_ride') > 0)
		{
			$this->db->where($data);
			$update = array(
				'score' => $score,
				'comment' => $comment
			);
			
			$this->db->update('user_ride', $update);
		}
		else
		{
			$data['score'] = $score;
			$data['comment'] = $comment;
			$this->db->insert('user_ride', $data);
		}

		$this->feed($this->user_link($signee) . ' signed off on the ride ' . $this->ride_link($ride) . ' for ' . $this->user_link($user));		
	}
	
	public function get_signoffs($ride)
	{
		$this->db->order_by('user.name, signee.name', 'ASC');
		$this->db->where('ride', $ride);
		$this->db->join('user', 'user.id = user_ride.user');
		$this->db->join('user signee', 'signee.id = user_ride.signee');		
		$this->db->select('user.id as user_id, user.name as user_name, signee.id as signee_id, signee.name as signee_name, user_ride.score, user_ride.comment');
		$query = $this->db->get('user_ride');
		
		return $query->result_array();
	}
}
