<?php

include_once(realpath($_SERVER["DOCUMENT_ROOT"]).'/rise/es_dev.DB.IUser.php');

class User_model extends CI_Model {

    private $rise_user;
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
        
      $this->rise_user = new es_devDBIUser($ConnectionResource);
      return $ConnectionResource;
    }
  function auth_link($email,$nonce){
  	$url = base_url('welcome/authenticate/')."?email=".$email."&key=".sha1($nonce);
  }
  function authenticate_password($userID, $password){
  		$user = $this->rise_user->GetUser($userID);
		$salt = $user->Salt;
		
		$this->load->helper('salt');
		$password = $this->salt_and_hash($password, $salt);
		
		if($password==$user->Password_Hash){
			return true;
		}else{
			return false;
		}
  }
  function new_rating($UserID,$CafeID,$Rating,$Comments){
  	
  	$ID = $this->rise_user->NewRating($UserID, $CafeID);
	$rev=$this->rise_user->SetRating($ID, $Rating, $Comments, gmdate("Y-m-d H:i:s"), $UserID, $CafeID,FALSE);
	return $ID;
  }
  function get_rating($ID){
  	return $this->rise_user->GetRating($ID);
  }
  function subscribe($email){
  	if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
  		return array("error_message"=>"Invalid Email");
  	}else{
	    if(!$this->email_exists($email)){
	      $id = $this->new_user($email);
			$nonce = $this->generate_password();
	      $this->rise_user->SetUser($id, $email,NULL,NULL,NULL,FALSE,$nonce);
	      $message = "This email address (".$email.") has been subscribed to alerts from Espressy.com. Please confirm that this was intended by clicking the link below.\r\n\r\n";
	     
	      $message = wordwrap($message, 70, "\r\n");
	      $message .= $this->auth_link($email,$nonce);
	      $to      = $email;
	      $subject = 'ESPRESSY: Confirm Subscription';
	      $message = 'hello';
	      $headers = 'From: no-reply@espressy.com' . "\r\n" .
	        'X-Mailer: PHP/' . phpversion();
	      
	      if(mail($to, $subject, $message, $headers)){
	        return true;
	      }else{return true;}
	    }else{return true;}
    }
  }
  function new_user($email){
       $userID = $this->rise_user->NewUser($email);
      return $userID;
    }
  function expire_rating($ratingID){
	$rating = $this->rise_user->GetRating($ratingID);
	$res = $this->rise_user->SetRating($rating->ID, $rating->Rating, $rating->Comments, $rating->Date, $rating->UserID, $rating->CafeID,true);
	if($res){
		return true;
	}else{
		return false;
	}
  }
  public function add_reviewer($email){
	$pw = $this->generate_password(4);
	$salt = sha1($this->generate_password(9,4));
	$hash = $this->salt_and_hash($pw,$salt);
	$user = $this->get_user_by_email($email);
	if(!$user){
		$userID = $this->new_user($email);
		$this->rise_user->SetUser($userID, $email, $hash, $salt, null, null, null);
	}else{
		$this->rise_user->SetUser($user->ID, $user->Email, $hash, $salt, $user->Name, $user->Email_Authenticated, $user->Email_Authorization_Nonce);
	}
	return $pw;
  }
  function signup_user($Email, $Password_Hash, $Salt_Key, $Name){
    return $this->rise_user->SignupUser($Email, $Password_Hash, $Salt_Key, $Name);  
  
  }
  function update_user($ID, $Name, $Email, $Phone, $Location, $Password_Hash, $Salt_Key){
    return $this->rise_user->SetUser($ID,$Email, $Password_Hash, $Salt_Key);
  }
  function get_current_salt_key(){
    return end(array_keys(self::$salts));
  }
  function get_salt($salt_key){
    return self::$salts[$salt_key];
  }
  function salt_and_hash($pwd,$salt){
    $hash = hash("sha256",$pwd.$salt);
    return $hash;
  }
  function get_user($ID){
  	return $this->rise_user->GetUser($ID);
  }
  function get_user_by_email($email){
    $user = $this->rise_user->ListUserByEmail(0,$email);
    if($user){
      return $user[0];
    }else{
      return false;
    }
  }
  function email_exists($email){
    $user = $this->get_user_by_email($email);
    if($user){
      return true;
    }else{
      return false;
    }
  }
  function generate_password($size=9, $power=-1) {
    $vowels = 'aeuy';
    $randconstant = '1234567890';
    if ($power >= 0) {
      $randconstant .= 'bdghjmnpqrstvz';
    }
    if ($power >= 1) {
      $randconstant .= 'BDGHJLMNPQRSTVWXZ';
    }
    if ($power >= 2) {
      $vowels .= "AEUY";
    }
    if ($power >= 3) {
      $randconstant .= '23456789';
    }
    if ($power >= 4) {
      $randconstant .= '@#$%';
    }
  
    $Randpassword = '';
	if($power>=0){
    $alt = time() % 2;
    for ($i = 0; $i < $size; $i++) {
      if ($alt == 1) {
        $Randpassword .= $randconstant[(rand() % strlen($randconstant))];
        $alt = 0;
      } else {
        $Randpassword .= $vowels[(rand() % strlen($vowels))];
        $alt = 1;
      }
    }
	}else{
		for ($i = 0; $i < $size; $i++) {
        	$Randpassword .= $randconstant[(rand() % strlen($randconstant))];
    	}
	}
    return $Randpassword;
  }
  function record_ownership($UserID, $FileID){
    $ID = $this->rise_user->NewUser_FIle_Permission($UserID, $FileID);
    $Change=TRUE;
    $Rename=TRUE;
    $Update=TRUE;
    $Delete=TRUE;
    $this->rise_user->SetUser_FIle_Permission($ID, $Change, $Rename, $Update, $Delete, $UserID, $FileID);
  }
  function is_authenticated(){
    if(!$this->session->userdata('user')){
    return false;
  }else{
    return true;
  }
  }
}
