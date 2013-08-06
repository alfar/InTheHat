<?PHP

class MY_Controller extends CI_Controller {

  public $view_data = array();

  public function __construct()
  {
		parent::__construct();
		$this->view_data['userid'] = $this->session->userdata('id');
  }
  
  public function requires_login()
  {
  	if ( $this->session->userdata('id') === FALSE )
  	{
  		$this->load->helper('url');
  		redirect('/');
  	}
  }
  
  public function logged_in()
  {
  	return $this->session->userdata('id') !== FALSE;
  }
  
  public function user_id()
  {
  	return $this->session->userdata('id');
  }
  
  public function show_view($path)
  {
		$this->load->view('templates/header', $this->view_data);
		$this->load->view($path, $this->view_data);
		$this->load->view('templates/footer', $this->view_data);		  	
  }
} 