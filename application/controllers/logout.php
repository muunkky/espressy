<?php
if (!defined('BASEPATH'))
exit('No direct script access allowed');

class Logout extends CI_Controller {

public function index() {
//$this->load->view('welcome_message');
  $this->session->sess_destroy();
  $cookie = array(
	    'name'   => 'user',
	    'value'  => NULL,
	    'expire' => '0',
	);
	$this->input->set_cookie($cookie);
  redirect(base_url());
}

}
?>