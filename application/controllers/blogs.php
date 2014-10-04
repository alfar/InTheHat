<?php
class Blogs extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('blog_model');
		$this->load->helper("url");
		$this->load->helper("form");
		$this->view_data['nav'] = 'blogs';
	}

	public function index() 
	{
		$this->view_data['blogs'] = json_encode($this->blog_model->get_blogs(10, 0));
		
		$this->view_data['title'] = 'Blog entries';

		if ($this->logged_in())
		{
			$this->view_data['submenu'] = array(
				'/blogs/create' => 'New post',
			);
		}
		
		$this->load->view('templates/header', $this->view_data);
		$this->load->view('blog/index', $this->view_data);
		$this->load->view('templates/footer', $this->view_data);		
	}
	
	public function view($id)
	{
		$this->view_data['blog'] = $this->blog_model->get_blog($id);

		$this->view_data['title'] = $this->view_data['blog']['title'];
		
		$this->load->helper('comments_helper');
	
		$this->load->view('templates/header', $this->view_data);
		$this->load->view('blog/view', $this->view_data);
		$this->load->view('templates/footer', $this->view_data);
	}
	
	public function json_index($page = 0, $user = FALSE)
	{
		if ($user !== FALSE) {
			$result = $this->blog_model->get_blogs_for_user($user, 10, $page);
		} else {
			$result = $this->blog_model->get_blogs(10, $page);
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($result));			
	}
	
	public function create()
	{
		$this->requires_login();
		
		$this->load->helper('form');
		$this->load->helper('tiny_mce');
		$this->load->library('form_validation');

		$this->view_data['title'] = 'Create blog post';

		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('text', 'Text', 'required');
			
		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('templates/header', $this->view_data);	
			$this->load->view('blog/create', $this->view_data);
			$this->load->view('templates/footer', $this->view_data);			
		}
		else
		{
			$this->blog_model->create_blog($this->input->post('title'), $this->input->post('text'), $this->session->userdata('id'));
			$this->load->library('overachiever');
			$this->overachiever->track_counter('Blog posts');
			redirect('/');
		}		
	}
}