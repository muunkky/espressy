<?php
if (!defined('BASEPATH'))
exit('No direct script access allowed');

class Signup extends CI_Controller {
public $salt_key = '';
public $user_name = '';
public function __construct()
       {
            parent::__construct();
            // Your own constructor code
            $this->load->model('user_model', 'user');
       }
public function index() {
//$this->load->view('welcome_message');

	$this->load->view('signup/signup_form', array('error' => ' '));
}

public function dosignup() {
		$this->load->library('form_validation');
		$this->form_validation->set_message('email_permitted','The email is not permitted');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|strtolower|callback_email_permitted');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|matches[confirm_password]|callback_hash_password');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|min_length[8]|callback_hash_password');
		
		if ($this->form_validation->run() == FALSE) {

			$this->load->view('signup/signup_form');

		} else {
			/*
			 * This executes when validation passes
			 */
			 $Email = $this->input->post('email');
			 $Password_Hash = $this->input->post('password');
			 $Salt_Key = $this->salt_key;
			 $Name = $this->user_name;
			 $user=$this->user->signup_user($Email, $Password_Hash, $Salt_Key, $Name);
$this->session->set_userdata(array('user'=>$user));
			 redirect('/review/');
		}
	}
public function hash_password($pwd){
	$this->load->model('user_model', 'user');
	$this->salt_key = $this->user->get_current_salt_key();
	$salt = $this->user->get_salt($this->salt_key);
	$hash = $this->user->salt_and_hash($pwd,$this->salt_key);
	return $hash;
}
public function email_permitted($email){

	$this->config->load('users',TRUE);
	$emails = $this->config->item('permitted_emails','users');
	if(array_key_exists($email,$emails)){
		$this->user_name = $emails[$email];
		return TRUE;	
	}else{
		return FALSE;
	}
}
}
?>