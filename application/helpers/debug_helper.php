<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * This helper contains a number of useful utility functions to dump out and 
 * let us inspect the internals of the system.
 * 
 * The important thing is that it's "environment safe" -- nothing will get
 * dumped out if we're on a production box.
 * 
 */
 
function say($msg) { 
	if(ENVIRONMENT == 'development') {
		echo "$msg.<br/>\n";
	}
	return $msg;
}

function dump($mixed) { 
	if(ENVIRONMENT == 'development') {
		echo '<xmp>';
		print_r($mixed);
		echo '</xmp>';
	}		
}

function sitelog($data) { 
	if(ENVIRONMENT == 'development') {
		log_message('error',$data);
	}
}

