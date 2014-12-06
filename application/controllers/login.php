<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	
	//
	public function index()
	{
		
		
		$data["main_content"] = 'login_form_view';
		$data["page_title"] = 'Login';
		$this->load->view('template', $data);
	}
	
	public function validate_credentials() {

		$this->load->model('user_model');
		$query = $this->user_model->validate();
		if($query) {	// if the user's credentials validated
			$data = array(
				'email' => $this->input->post('email'),
				'is_logged_in' => true
			);
			// set $config['encryption_key'] = 'ci_lesson' in the config.php
			$this->session->set_userdata($data);
			redirect('site/user_view');
			//redirect('user/index');
		} else {
			$this->index();
		}
	}

	public function signup() {
		$data["main_content"] = 'signup_form_view';
		$this->load->view('template', $data);
	}
	

	public function create_account() {

		$this->load->library('form_validation');

		// field name, error message, validation rules
		$this->form_validation->set_rules('fname', 'First name', 'trim|required');
		$this->form_validation->set_rules('lname', 'Last name', 'trim|required');
		$this->form_validation->set_rules('email', 'Email address', 'trim|required|valid_email');
		
		$this->form_validation->set_rules('uname', 'Username', 'trim|required|min_length[4]');
		
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
		$this->form_validation->set_rules('password2', 'Password Confirmation', 'trim|required|matches[password]');
		$this->form_validation->set_rules('bday', 'Bday', 'trim|required');
		
		if($this->form_validation->run() == FALSE) {
			$this->signup();
		} else {
		
			$this->load->model('user_model');
			if($query = $this->user_model->create_account()) {
				$data["main_content"] = 'signup_successful';
				$this->load->view('template', $data);
			} else {
				//$data["main_content"] = 'signup_form_view';
				//$this->load->view('signup_form_view');
				$this->load->view('template', array('main_content'=>'signup_form_view'));
			}
			
		}

	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
