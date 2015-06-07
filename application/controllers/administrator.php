<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Administrator extends CI_Controller {
    private $pw = "YjIa43GhNnc2urVUkKQFNwHWHOA0u1YmPQ8Q6jc5EdMzYhIs4M9vvgXcQI47q7U";

    public function __construct()
    {
        parent::__construct();
    
  }
  public function index(){
    $this->load->view('admin/add_reviewer');
  }
  public function add_reviewer(){
    
    $email = strtolower($this->input->post('reviewer_email'));
    if($this->pw == $this->input->post('password')){
    $this->load->model("user_model");
    $pin = $this->user_model->add_reviewer($email);
    $this->load->view('admin/add_reviewer',array('email'=>$email,'pin'=>$pin));
    }else{
      $this->load->view('admin/add_reviewer',array('email'=>"Invalid PW",'pin'=>""));
    }
  }

}
