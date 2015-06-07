<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index() {
		//$this->load->view('welcome_message');
		
		$this->load->view('login/login_form', array('error' => ' '));
	}

	public function dologin() {
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Email', 'trim|required|callback_hash|callback_check_password[email]');

		if ($this->form_validation->run() == FALSE) {
			
			$this->load->view('login/login_form');

		} else {
			/*
			 * This executes when validation passes
			 */
			 $this->load->model('user_model', 'user');
			 $user = $this->user->get_user_by_email($this->input->post('email'));

			 if($this->session->userdata('authenticated')){
			 	$this->session->set_userdata(array('user'=>$user));
				 redirect('/review/');
			 }else{
			 	redirect('/login/');
			 }

		}
	}

	public function check_password($pwd, $email_field) {
		$email = $this->input->post("$email_field");
		$this->load->model('user_model', 'user');
		$user = $this->user->get_user_by_email($email);
		try {
			if($user){
				$this->session->set_userdata(array('user' => $user));
			}else{
				$this->form_validation->set_message('check_password', "Email not found");
				return false;
			}
		} catch(Exception $e) {
			$this->form_validation->set_message('check_password', "Email not found");
			return false;
		}
		$salt_key = $user->Salt_Key;
		try {
			$salt = $this->user->get_salt($salt_key);
			$hash = hash("sha256", $pwd . $salt);
			//echo $hash;

		} catch(Exception $e) {
			$this->form_validation->set_message('check_password', $e->message);
			return false;
		}
		if ($hash == $user->Password_Hash) {
			
			$this->session->set_userdata(array('authenticated' => '1'));
			
			return true;
		} else {
			//print_r($user);
			//echo br();
			//print_r($hash);
			$this->form_validation->set_message('check_password', "Invalid Password");
			return false;
		}
	}

	
}
?>