<?php
class Comments extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('comment_model');
	}
	
	public function index($type, $object_id) {
		$start = $this->input->post('start', TRUE);
		$limit = $this->input->post('limit', TRUE);		
		$this->output->set_content_type('application/json')->set_output(json_encode(array('comments' => $this->comment_model->get_comments($type, $object_id, $limit, $start), 'total' => $this->comment_model->count_comments($type, $object_id)), TRUE));		
	}
	
	public function create()
	{
		$this->requires_login();
		
		$this->load->library('form_validation');

		$this->form_validation->set_rules('text', 'Text', 'required');
			
		if ($this->form_validation->run() === FALSE)
		{
			$this->output->set_content_type('application/json')->set_output(json_encode(FALSE));						
		}
		else
		{
			$comment = $this->comment_model->create($this->input->post('type', TRUE), $this->input->post('object_id', TRUE), $this->input->post('text', TRUE), $this->session->userdata('id'));
			$this->load->library('overachiever');
			$this->overachiever->track_counter('Comments');
			$this->output->set_content_type('application/json')->set_output(json_encode($this->comment_model->get_new_comments($this->input->post('type', TRUE), $this->input->post('object_id', TRUE), $this->input->post('latest', TRUE)), TRUE));
		}		
	}	
}
