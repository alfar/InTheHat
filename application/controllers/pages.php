<?php

class Pages extends MY_Controller {
	public function view($page = 'home')
	{
		if ( ! file_exists('application/views/pages/'.$page.'.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}
		
		$this->view_data['nav'] = $page;
		$this->view_data['title'] = ucfirst($page); // Capitalize the first letter
		
		$this->load->helper('url');
		$this->load->view('templates/header', $this->view_data);
		$this->load->view('pages/'.$page, $this->view_data);
		$this->load->view('templates/footer', $this->view_data);
	}
}