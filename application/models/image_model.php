<?php
class Image_model extends CI_Model {
	public function __construct() {
		$this->load->database();
	}

	public function upload_image($folder, $label, $path)
	{
		$data = array(
			'folderId' => $folder,
			'label' => $label,
			'path' => $path
		);
		
		return $this->db->insert('image', $data);
	}

	public function get($folder, $limit = FALSE, $start = 0)
	{
		$this->db->select('id, label, path');
		$this->db->order_by('label');
		if ($limit != FALSE)
		{
			$this->db->limit($limit, $start);
		}
		$this->db->where('folderId', $folder);
		$query = $this->db->get('image');		

		return $query->result_array();
	}
	
	public function create_folder($folder, $name)
	{
		$data = array(
			'name' => $name,
			'folderId' => $folder
		);
		
		return $this->db->insert('image_folder', $data);
	}
	
	public function get_folders($folder)
	{
		$this->db->select('id, name');
		$this->db->order_by('name');
		$this->db->where('folderId', $folder);
		$query = $this->db->get('image_folder');		

		return $query->result_array();
	}

	public function get_folder($folder)
	{
		$this->db->select('name');
		$this->db->where('id', $folder);
		$query = $this->db->get('image_folder');

		return $query->row_array();
	}
		
	public function get_parent_id($folder)
	{
		$this->db->select('folderId');
		$this->db->where('id', $folder);
		$query = $this->db->get('image_folder');
		if ($query->num_rows() == 0)
		{
			return 0;
		}
		else
		{
			$row = $query->row_array();
			return $row['folderId'];
		}
	}
}
