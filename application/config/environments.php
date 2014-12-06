<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| Application config
| -------------------------------------------------------------------------
| This file lets you determine whether or not various sections of Profiler
| data are displayed when the Profiler is enabled.
| Please see the user guide for info:
|
|
*/

$dir = str_replace("\\", "/", __DIR__);
$dir = substr($dir, 0, strpos($dir, '/application/')+1);
//define('APP_PATH','D:/data/www/ci/');
define('APP_PATH',$dir);

define('APP_URL', $this->config["base_url"]);

//var_dump($this->config["base_url"]);
switch (ENVIRONMENT) {
	case 'development':
		// upload settings
		$config['upload_path'] = APP_PATH.'uploads/';
		$config['upload_url'] = APP_URL.'uploads/';
		$config['allowed_types'] = '*';		// "gif|jpg|png|jpeg|pdf|doc|xml"
		$config['overwrite'] = TRUE;
		$config['current_file_name'] = '';
	break;
    default:
        exit('The application environment is not set correctly.');
}


/* End of file environments.php */
/* Location: ./application/config/environments.php */