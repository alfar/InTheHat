<?php
class Images extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('image_model');
		$this->view_data['nav'] = 'images';
	}
	
	public function index($folder = 0)
	{
		$this->requires_login();
		$this->view_data['folder_id'] = $folder;
		$this->view_data['parent_folder_id'] = $this->image_model->get_parent_id($folder);
		$this->view_data['current'] = $this->image_model->get_folder($folder);
		$this->view_data['folders'] = $this->image_model->get_folders($folder);
		$this->view_data['images'] = $this->image_model->get($folder);

		if ($this->logged_in())
		{
			$this->view_data['submenu'] = array(
				'/images/upload/' . $folder => 'Upload',
				'/images/create_folder/' . $folder => 'New folder'
			);
		}

		$this->show_view('images/index');
	}
	
	public function upload($folder)
	{
		$this->requires_login();
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('label', 'Label', 'required');
		$this->view_data['error'] = '';
		$this->view_data['folder_id'] = $folder;
		
		if ($this->form_validation->run() === FALSE)
		{		
			$this->show_view('images/upload');
		}
		else
		{
			$config['upload_path'] = './images/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']	= '200';
			$config['max_width']  = '800';
			$config['max_height']  = '600';

			$this->load->library('upload', $config);
	
			if ( ! $this->upload->do_upload('image'))
			{
				$this->view_data['error'] = $this->upload->display_errors();
	
				$this->show_view('images/upload');
			}
			else
			{
				$data = $this->upload->data();
				$this->image_model->upload_image($folder, $this->input->post('label', TRUE), $data['file_name']);
				redirect('/images/index/' . $folder);
			}		
		}
	}
	
	public function create_folder($folder)
	{
		$this->requires_login();
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$this->view_data['folder_id'] = $folder;

		$this->form_validation->set_rules('name', 'Name', 'required');
		if ($this->form_validation->run() === FALSE)
		{		
			$this->show_view('images/create_folder');
		}
		else
		{
			$this->image_model->create_folder($folder, $this->input->post('name', TRUE));
			
			redirect('images/index/' . $folder);
		}
	}
	
	public function browse()
	{
		$this->requires_login();
		$folder = $this->input->post('id', TRUE);
				
		$this->output->set_content_type('application/json')->set_output(json_encode(array('folderId' => $folder, 'folders' => $this->image_model->get_folders($folder), 'images' => $this->image_model->get($folder))));
	}
}