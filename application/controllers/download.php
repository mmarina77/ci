<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Download extends CI_Controller {

	function index(){
	}
	
	function file($fn){
		
		$this->load->helper('download');
		
		//$fname = rawurldecode($fn);
		
		$path = $this->config->item('upload_url');
		$filename = $this->config->item('upload_path').'export/'.$fn;
	
		
		$data = file_get_contents($filename);	//'path/file.xls'
		force_download($fn, $data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */