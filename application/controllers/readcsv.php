<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Readcsv extends CI_Controller {

	public function __construct() {
		parent::__construct();
        $this->load->helper('debug');
        $this->load->model('files_model');

	}
	
	public function file($fn) {

		$fname = rawurldecode($fn);
		
		$path = $this->config->item('upload_url');
		$filename = $this->config->item('upload_path').$fn; 
		$export_filename = $this->config->item('upload_path').'export/'.$fn;

		$result = $this->files_model->open_file($filename, $export_filename);
		

		$data["main_content"] = 'csv_grid';
		$data["page_title"] = 'Grid';
		
		$data["export_filename"] = $export_filename;
		//$data["export_file_url"] = base_url().'upload/export/'.$fname;
		$data["export_file_url"] = base_url().'download/file/'.$fname;
		
		$data["result"] = $result;
		$this->load->view('template', $data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */