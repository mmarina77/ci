<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Files_Model extends CI_Model {
 
	public function __construct() {
		parent::__construct();
	}

	public function open_file($filename, $new_filename) {
	
	        $this->load->library('csv_class');
		
		$list = $this->csv_class->readCSV($filename);
		$data = $this->csv_class->calculate($list);
		
		$this->csv_class->save_file($new_filename);
		return $data;
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
