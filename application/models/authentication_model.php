<?php
class Authentication_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    $this->load->database();
    $this->load->helper('security');
    //$this->_initialize_data();
    }

  
  /*********************************************
   * Functions below this line are not being used
   * They are just there so I can steal them. The
   * functions above have been put into use somewhere
   * in the code.
   */
  function Authenticate($userID, $password){
    
    /*
	 
	 if (!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $username_or_email)){ 
      $isemail = false;
    }else{
      $isemail = true;
    }
	
	*/
    $user = $this->rise
    
    $this->load->helper('salt');
    $password = ($this->input->post('password'));
    $password = salted_hash($password,$user['salt']);
    switch($isemail){
      case true:
        $this->db->where(array('email' => $username_or_email,'password'=>$password));
        break;
      case false:
        $this->db->where(array('username' => $username_or_email,'password'=>$password));
        break;
    }
    
    $query = $this->db->get('user');
    if($query->num_rows() >0){
      $row = $query->row_array();
      if($row['confirmed']==1){
        $row['password']=null;
        $this->session->set_userdata('authenticated', TRUE);
        $row['artists']=$this->_get_artists_by_user($row['id']);
        $this->session->unset_userdata('user');
        $this->session->set_userdata('user',$row);
        $return['success']=TRUE;
        $return['message']=NULL;
        return $return;
      }
      else{
        return array('success'=>FALSE,'error_message'=>'Login FAIL: You aren\'t confirmed yet. You have to go to your email inbox and click the link there so that we know you\'re a human');  
      }
    }
    else{
      return array('success'=>FALSE,'error_message'=>'Login FAIL: we couldn\'t find you in the database. Either your password was wrong, you haven\'t signed up, you made a typo... or we just kinda suck at making login forms.');
    }
    
  }
  function _get_artists_by_user($user_id)
  {
    $query = $this->db->get_where('artist',array('user_id'=>$user_id));
    $artists = array();
    if($query->num_rows()>0){
      foreach($query->result_array() as $artist){
        $artists[]=$artist;
      }
    }
    return $artists;
  }
  function _get_user_by_username_or_email($username_or_email){
    $this->db->where('username="'.$username_or_email.'" OR email="'.$username_or_email.'"',NULL,FALSE);
    $query = $this->db->get('user');
    if($query->num_rows() > 0){
      $user = $query->row_array();
      return $user;
    }
  }
  function _get_user($user_id){
    $query = $this->db->get_where('user',array('id'=>$user_id));
    $user = $query->row_array();
    $user['artists'] = $this->_get_artists_by_user($user_id);
    $user['password']=null;
    $this->session->unset_userdata('user');
    $this->session->set_userdata('user',$user);
    return $user;
  }
  
  function Signup(){
    $this->load->helper('string');
    $this->load->helper('salt');
    $username = $this->input->post('username');
    $password = ($this->input->post('password'));
    $password = salted_hash($password);
    $salt = current_hash();
    $email = $this->input->post('email');
    $artist = $this->input->post('artist');
    if($artist=='artist'){
      $artist=1;
    }else{
      $artist=0;
    }
    $confirmation_code = random_string('alnum',10);
    $website=$this->_get_website_by_name($this->config->item('website_name'));
    if(count($website)==1){
      $website = $website[0];
    }
    $array = array('website_id'=>$website['id'],'username' => $username, 'email' => $email, 'password' => $password, 'confirmation_code'=>$confirmation_code, 'isartist'=>$artist, 'salt'=>$salt);          
    
    $this->db->where('username="'.$username.'" OR email="'.$email.'"',NULL,FALSE);
    $query = $this->db->get('user');
    
    if($query->num_rows() == 0){
      $this->db->set($array);
      $this->db->insert('user');
      $id=$this->db->insert_id();
      if($id != null){
        $query->free_result();
        $query=$this->db->get_where('user',array('id'=>$id));
        $return=$query->row_array();
        $this->_add_artist($return['id']);
        $return['success']=TRUE;
        $return['message']='Signup successful, check your email for that annoying email that websites send you so that you can prove you\'re human';
        return $return;
      }
      else{
        return array('success'=>FALSE,'error_message'=>'Our database is totally messed. Something went wrong and we can\'t add you.');
      }
      
    }
    else{
      $row=$query->row();
      if($row->email==$email){
        return array('success'=>FALSE,'error_message'=>'Email Already Registered');
      }
      elseif($row->username==$username){
        return array('success'=>FALSE,'error_message'=>'username taken');
      }
    }
  }
  function _get_website_by_name($name){
    $query = $this->db->get_where('website',array('name'=>$name));
    if($query->num_rows()>0){
      return $query->result_array();
    }
  }
  function update_user(){
    $firstname = $this->input->post('firstname');
    $lastname = $this->input->post('lastname');
    $new_password = $this->input->post('new_password');
    
    switch($this->input->post('artist')){
      case 'artist':
        $isartist = '1';
        break;
      case 'not_artist':
        $isartist='0';
        break;
    }
    $user = $this->session->userdata('user');
    $data = array('first_name'=>$firstname,'last_name'=>$lastname,'isartist'=>$isartist);
    if($new_password!=null){
      $data['password'] = $new_password;
    }
    $id=$user['id'];
    $changesmade=FALSE;
    $this->db->where(array('id'=>$id));
    $this->db->update('user',$data);
    if($this->db->affected_rows()>0){
      $changesmade=TRUE;
    }
    if($isartist=='1'){
      $artists = $this->_get_artists_by_user($id);
      if(count($artists)==0){
        $changesmade=$this->_add_artist($id);
      }else{
        foreach($artists as $artist){
          $input_id = 'stagename_'.$artist['id'];
          $stagename = $this->input->post($input_id);
          $data = array(
                'stage_name'=>$stagename
                );
          $this->db->where(array('id'=>$artist['id']));
          $this->db->update('artist',$data);
          if($this->db->affected_rows()>0){
            $changesmade=TRUE;
          }
        }
      }
    }      
    if($changesmade==TRUE){
      $user = $this->_get_user($user['id']);
      $this->session->unset_userdata('user');
      $this->session->set_userdata('user',$user);
      $return['success']=TRUE;
      $return['message']='Profile successfully changed';
      return $return;
    }
    else{
      return array('success'=>FALSE,'error_message'=>'No Changes Made.');
    }
  }
  function _add_artist($user){
    $this->db->set(array('user_id'=>$user['id'],'stage_name'=>$user['first_name']." ".$user['last_name']));
    $this->db->insert('artist');
    if($this->db->affected_rows()>0){
      return TRUE;
    }else{
      return FALSE;
    }
  }
  function confirm($confirmation_code,$username){
    $query = $this->db->get_where('user',array('username'=>$username,'confirmation_code'=>$confirmation_code));
    if($query->num_rows()>0){
      $row=$query->row_array();
      $this->db->update('user',array('confirmed'=>'1'),array('id'=>$row['id']));
      return array('success'=>true,'message'=>''.$username.', your email has been confirmed. Thanks a bunch.');
    }
    else{
      return array('success'=>false,'error_message'=>'Something went wrong, we couldn\'t validate your email address... sorry');
    }
  }
  function _initialize_data(){
    $CI =& get_instance();
    $user=$this->get_active_user();
    //$this->authentication_model->_check_authentication('/index.php/home/login','muunkky');
    $CI->initializer->initialize_data();
  }
  function _check_authentication($redirect_URI='/index.php/',$username=NULL){
    $this->load->helper('url');
    $authenticated = $this->session->userdata('authenticated');
    $user = $this->session->userdata('user');
    if($username!=NULL){
      if($user['username']!=$username){
        $authenticated=0;
      }
    }
    if($authenticated==1){
      return TRUE;
    }
    else{
      redirect($redirect_URI);
    }
  }
  function password_check($pwd){
    $user=$this->get_active_user();
    $query = $this->db->get_where('user',array('password'=>$pwd));
    if($query->num_rows() > 0){
      $row= $query->row_array();
      if($user['username']==$row['username']){
        return TRUE;
      }
    }
    return FALSE;
  }
}
?><?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

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
    	$authentic = $this->session->userdata('authentic');
    	return $authentic;
    }

    function authenticate()
    {
     	$this->session->set_userdata(array('authentic' => TRUE));   
    }
    function logout()
    {
    	$this->session->sess_destroy();
    }

}
?>