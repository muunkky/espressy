<?php

include_once('rise/es_dev.DB.ICafe.php');

class Cafe_model extends CI_Model {

  	private $rise_cafe;
  	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    	$this->load->database();
        $this->load->helper('url');
    	/*
         * The rise object is needed to call the methods defined in the Rise Editor
         */
        $this->init_connection();
    }
    
  	private function init_connection(){
    	$ConnectionResource = MySQLi_init();
    	$ConnectionResource->options(MYSQLI_INIT_COMMAND, "SET sql_mode = 'ANSI'");
	    if(!$ConnectionResource->real_connect('mysql.espressy.com', 'muunkky', '9ehveh', 'espressy_dev', null, null, MYSQLI_CLIENT_FOUND_ROWS))
	      throw new Exception('Unable to connect to MySQL: '.$ConnectionResource->connect_error);
	    if(!$ConnectionResource->set_charset('utf8'))
	      throw new Exception('Error loading character set utf8: '.$ConnectionResource->error);
	      
	    $this->rise_cy= new es_devDBICafe($ConnectionResource);
	    return $ConnectionResource;
    }
}