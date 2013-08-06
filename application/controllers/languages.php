<?php
class Languages extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('language_model');
		$this->load->helper("url");
		$this->view_data['nav'] = 'languages';
	}
	
	public function autocomplete()
	{
		$query = $this->input->get('query', TRUE);
		
		$this->output->set_content_type('application/json')->set_output(json_encode(array('query' => $query, 'suggestions' => $this->language_model->autocomplete($query))));
	}

	public function flexbox()
	{
		$query = $this->input->get('q', TRUE);
		$page = $this->input->get('p', TRUE);
		$result = $this->language_model->get($query, FALSE, 10, ($page - 1) * 10);
		
		$this->output->set_content_type('application/json')->set_output(json_encode(array('more' => count($result) == 10, 'results' => $result)));
	}

	public function magicsuggest()
	{
		$query = $this->input->get('query', TRUE);
		
		$this->output->set_content_type('text/plain')->set_output(json_encode($this->language_model->get($query)));
	}
	
	public function show($id)
	{
		$this->load->model('ride_model');
		
		$this->view_data['language'] = $this->language_model->get_language($id);
		$this->view_data['offering'] = $this->language_model->get_language_users($id, 1);
		$this->view_data['seeking'] = $this->language_model->get_language_users($id, 2);
		$this->view_data['paths'] = $this->language_model->get_paths($id);
		$this->view_data['rides'] = $this->language_model->get_rides($id, $this->view_data['userid']);
		
		$this->show_view('language/show');
	}
}