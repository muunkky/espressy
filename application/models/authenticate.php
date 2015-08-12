<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Authenticate extends CI_Model {

    var $title   = '';
    var $content = '';
    var $date    = '';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function check_status()
    {
    	$authentic = $this->session->userdata('authenticated');
    	return $authentic;
    }

    function authenticate()
    {
     	$this->session->set_userdata(array('authenticated' => TRUE));   
    }
    function logout()
    {
    	$this->session->sess_destroy();
    }

}
?>