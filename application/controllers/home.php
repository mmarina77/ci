<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('debug');
	}

	//
	public function index() {
		//Set the message for the first time
		$data = array('msg' => "Welcome");
   
		//load the view/upload.php with $data
		$data["page_title"] = 'Home page';
		$data["main_content"] = 'home';
		$this->load->view('template', $data);
	}

	public function files() {
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
