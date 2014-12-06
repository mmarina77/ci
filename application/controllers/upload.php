<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Upload extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('debug');
	}

	//
	public function index() {
		
		//Set the message for the first time
		$data = array('msg' => "Upload File");
		$data['upload_data'] = '';
		
		$data["page_title"] = 'Upload File';
		$data["main_content"] = 'upload';
		$this->load->view('template', $data);
	}

	public function upload_file() {
		$status = "success";
		$msg = "";
		$file_element_name = 'userfile';
		
		$file_name = date('Y_m_d').'.csv';
		
			$config['upload_path'] = $this->config->item('upload_path');
			
			// set the filter file types
			$config['allowed_types'] = $this->config->item('allowed_types');
			$config['overwrite'] = $this->config->item('overwrite');
	 
			//load the upload library
			$this->load->library('upload', $config);

			if (!$this->upload->do_upload($file_element_name)) {
				$status = 'error';
				$msg = $this->upload->display_errors('', '');
			} else {
				$data = $this->upload->data();
				$status = "success";
				$msg = "";		// File successfully uploaded
				$fullName = $config['upload_path'].$file_name;
				rename($config['upload_path'].$_FILES[$file_element_name]['name'], $fullName);
				chmod($fullName, 0777);
				
				$this->config->set_item('current_file_name', $fullName);

			}
			@unlink($_FILES[$file_element_name]['tmp_name']);
		//}
		echo json_encode(array('status' => $status, 'msg' => $msg, 'filename'=>$file_name));
	}
	public function files() {
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */