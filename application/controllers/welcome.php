<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

  /**
   * Index Page for this controller.
   *
   * Maps to the following URL
   *     http://example.com/index.php/welcome
   *  - or -  
   *     http://example.com/index.php/welcome/index
   *  - or -
   * Since this controller is set as the default controller in 
   * config/routes.php, it's displayed at http://example.com/
   *
   * So any other public methods not prefixed with an underscore will
   * map to /index.php/welcome/<method_name>
   * @see http://codeigniter.com/user_guide/general/urls.html
   */

	public function __construct()
   {
        parent::__construct();
	}
  public function index()
  {
  	
	$this->home();
  }
  private function get_user(){
  	$user = $this->input->cookie('user');
	
	if($user){
		$user = unserialize($user);
		
		if(!array_key_exists('created', $user) || $user['created'] <= 1400437401){
			$this->reviewer_logout();
		}
		else{
			return $user;
		}
	}
  	
  }

  private function home($error_message="")
  {
  	
    $this->load->view('list/header');
	$user = $this->get_user();
	if($user){
			
		if($user['reviewer']){
			$this->load->model('cafe_model');
			
			$regions = $this->cafe_model->list_regions();
			function comp_name($a, $b) {
				return strcmp($a->Name, $b->Name);
			  }
			usort($regions,"comp_name");
			$chains = $this->cafe_model->list_chains();
			
			$this->load->view('list/body',array("reviewer"=>TRUE,"regions"=>$regions,"chains"=>$chains,"error_message"=>$error_message,"reviewer_name"=>$user['reviewer_user']->Name));
		}else{
	    	$this->load->view('list/body',array("reviewer"=>FALSE));
    	}
    }else{
    	$this->load->view('list/body',array("reviewer"=>FALSE));
    }
  		//$this->load->view('list/data',array("data"=>array("regions"=>$regions,"chains"=>$chains)));
    	$this->load->view('list/footer');
  }
	public function get_cities(){
		$lat = $this->input->post('latitude');
	    $long = $this->input->post('longitude');
		$date = $this->input->post('date');
		
		$this->session->set_userdata(array('reviewer'=>TRUE,'latitude'=>$lat,"longitude"=>$long,"date"=>$date));
	    $this->load->model('cafe_model');
	    
	    $cities = $this->cafe_model->list_cities_by_distance($lat,$long);
	    
		// if(!$lat||!$long){
		//     $cities = $this->cafe_model->list_cities_alphabetically();
		//     $error_message = $this->location_unavailable();
		// }else{
		// 	$cities = $this->cafe_model->list_cities_by_distance($lat,$long);
		// }
		$user = $this->get_user();
		if($user){
			$reviewer = $user['reviewer'];
			}else{
				$reviewer = false;
			}
		$this->load->view('list/cities',array('cities'=>$cities,"latitude"=>$lat,"longitude"=>$long,"reviewer"=>$reviewer));
		$city_output = $this->output->get_output();
		$this->output->set_output(null);
		print_r(json_encode(array("cities"=>$city_output,"error_message"=>"")));
	}
public function get_city_stars(){
	$RegionID = $this->input->post("cityID");
	
	$latitude = $this->session->userdata("latitude");
	$longitude = $this->session->userdata("longitude");
	$date = $this->session->userdata("date");
	$user = $this->get_user();
	if($user){
		$reviewer = $user['reviewer'];
	}else{
		$reviewer = false;
	}
	$this->load->model('cafe_model');
	//print_r_pre(array("latitude"=>$latitude,"longitude"=>$longitude,"date"=>$date,"reviewer"=>$reviewer,"regionid"=>$RegionID));
	//exit;
	$cafes = $this->cafe_model->get_city_cafes_by_distance($latitude, $longitude, $RegionID,$date);

	$this->load->view("list/city_stars",array("city_cafes"=>$cafes,"reviewer"=>$reviewer));
}
 // public function cafe_list(){
  	
 //   $lat = $this->input->post('latitude');
 //   $long = $this->input->post('longitude');
	// $date = $this->input->post('date');
	// $user = $this->get_user();
	// if($user){
	// 	$reviewer = $user['reviewer'];
	// }else{
	// 	$reviewer = false;
	// }
	
 //   $this->load->model('cafe_model');
 // if(!$lat||!$long){
 //   $cafes = $this->cafe_model->list_cafes_alphabetically($date,$reviewer);
 //   $error_message = $this->location_unavailable();
 // }else{
 // 	if(!is_null($reviewer)){
 //     $cafes = $this->cafe_model->list_cafes_by_distance($lat,$long,$date,$reviewer);
	// 	}else{
	// 		$cafes = $this->cafe_model->list_cafes_by_distance($lat,$long,$date);
	// 	}
 //   $error_message = "";
 // }
 // //$this->load->view('list/cafes',array('cafes'=>$cafes,"reviewer"=>$reviewer));
 // $cafe_list = $this->output->get_output();
 // $this->output->set_output(null);
 // print_r(json_encode(array("cafe_list"=>$cafe_list,"error_message"=>$error_message)));
 // }
  public function location_unavailable(){
    $this->load->view('list/location_unavailable');
  $message = $this->output->get_output();
  $this->output->set_output(null);
  return $message;
  }
  public function reviewer_logout(){
  	$this->session->sess_destroy();
  	$cookie = array(
	    'name'   => 'user',
	    'value'  => NULL,
	    'expire' => '0',
	);
	$this->input->set_cookie($cookie);
  }
  public function reviewer_login(){
    $email=$this->input->post("reviewer_email");
    $pin=$this->input->post("reviewer_password");
    $this->load->model('user_model');
    $user = $this->user_model->get_user_by_email($email);
    if($this->user_model->authenticate_password($user->ID, $pin)){
    	
    	$value = serialize(array(
												'reviewer'			=>	TRUE,
												'reviewer_email'	=>	$email,
												'reviewer_user'		=>	$user,
												'created'			=> time()));
    	
    	$cookie = array(
		    'name'   => 'user',
		    'value'  => $value,
		    'expire' => '3153600',
		    
		);

		$this->input->set_cookie($cookie);
		redirect(base_url());
    }else{
      
      $this->home("Reviewer Login Failed");
    }
  }
  public function remove_review(){
  	$review_id=$this->input->post("review_id");
	$this->load->model('user_model');
	$res = $this->user_model->expire_rating($review_id);
	if($res){
		header('Content-type: application/json');
		print_r(json_encode(array("review_id"=>$review_id,"status"=>'success')));
	}else{
		header('Content-type: application/json');
		print_r(json_encode(array("status"=>'error')));
	}
  }
  public function submit_review(){
  	
    $cafe_id=$this->input->post("cafe_id");
    $rating=$this->input->post("rating");
    $comments=$this->input->post("comments",true);
    $this->load->model('user_model');
	$user = $this->get_user();
	if($user){
		$reviewer = $user['reviewer'];
	}else{
		$reviewer = false;
	}
	if($user){
		$user = $user["reviewer_user"];
	    $review = $this->user_model->new_rating($user->ID,$cafe_id,$rating,$comments);
		$this->load->model('cafe_model');
		$this->cafe_model->update_rating($cafe_id,$rating);
	    if($review){
	    	$this->cafe_model->submit_review($cafe_id,$rating,$comments,$user->Name,$user->Email);
			$review_view = $this->get_review($review);
	      print_r(json_encode(array("cafe_id"=>$cafe_id,"success"=>true,"message"=>"Thanks for your input!","review"=>$review_view)));
	    }else{
	      print_r(json_encode(array("cafe_id"=>$cafe_id,"success"=>false,"message"=>"There was an error!")));
	    }
    }else{
    	print_r(json_encode(array("cafe_id"=>$cafe_id,"success"=>false,"message"=>"There was an error!")));
    }
  }
  public function submit(){
    
	$name = $this->input->post("cafe_name");
	$region = $this->input->post("cafe_region");
	$new_region = $this->input->post("cafe_region_new");
	$address = $this->input->post("cafe_address");
	$latitude = $this->input->post("cafe_latitude");
	$longitude = $this->input->post("cafe_longitude");
	$rating = $this->input->post("cafe_rating");
	$cafe_rating_comments = $this->input->post("cafe_rating_comments");
	$chain = $this->input->post("cafe_chain");
	$new_chain = $this->input->post("cafe_chain_new");
	$mon_open = $this->input->post("cafe_mon_open");
	$tue_open = $this->input->post("cafe_tue_open");
	$wed_open = $this->input->post("cafe_wed_open");
	$thu_open = $this->input->post("cafe_thu_open");
	$fri_open = $this->input->post("cafe_fri_open");
	$sat_open = $this->input->post("cafe_sat_open");
	$sun_open = $this->input->post("cafe_sun_open");
	$mon_close = $this->input->post("cafe_mon_close");
	$tue_close = $this->input->post("cafe_tue_close");
	$wed_close = $this->input->post("cafe_wed_close");
	$thu_close = $this->input->post("cafe_thu_close");
	$fri_close = $this->input->post("cafe_fri_close");
	$sat_close = $this->input->post("cafe_sat_close");
	$sun_close = $this->input->post("cafe_sun_close");
	
	$hours= array(
					"mon_open"	=>	$mon_open,
					"tue_open"	=>	$tue_open,
					"wed_open"	=>	$wed_open,
					"thu_open"	=>	$thu_open,
					"fri_open"	=>	$fri_open,
					"sat_open"	=>	$sat_open,
					"sun_open"	=>	$sun_open,
					"mon_close"	=>	$mon_close,
					"tue_close"	=>	$tue_close,
					"wed_close"	=>	$wed_close,
					"thu_close"	=>	$thu_close,
					"fri_close"	=>	$fri_close,
					"sat_close"	=>	$sat_close,
					"sun_close"	=>	$sun_close,
					);
	
    $this->load->model('cafe_model');
	$user = $this->get_user();
	$email = $user["reviewer_email"];
  
  if($chain=="NEW"||$chain=="New Chain"){
  	$chain = $this->cafe_model->new_chain($new_chain);
  }
  if($region=="NEW"||$region=="New Region"){
  	$region = $this->cafe_model->new_region($new_region,$latitude,$longitude);
  	mail("cameronrout@gmail.com","New Region", $user["name"]." has added a new region called: ".$new_region,'From: "Espressy" <no-reply@espressy.com>'); 
  }
  $res = $this->cafe_model->submit($email,$name,$region,$address,$latitude,$longitude,$rating,$cafe_rating_comments,$hours,$chain);
            print_r($res);
  }
  
  public function update(){
  $id = $this->input->post("cafe_id");
	$name = $this->input->post("cafe_name");
	$region = $this->input->post("cafe_region");
	$address = $this->input->post("cafe_address");
	$latitude = $this->input->post("cafe_latitude");
	$longitude = $this->input->post("cafe_longitude");
	$rating = $this->input->post("cafe_rating");
	$cafe_rating_comments = $this->input->post("cafe_rating_comments");
	$chain = $this->input->post("cafe_chain");
	$mon_open = $this->input->post("cafe_mon_open");
	$tue_open = $this->input->post("cafe_tue_open");
	$wed_open = $this->input->post("cafe_wed_open");
	$thu_open = $this->input->post("cafe_thu_open");
	$fri_open = $this->input->post("cafe_fri_open");
	$sat_open = $this->input->post("cafe_sat_open");
	$sun_open = $this->input->post("cafe_sun_open");
	$mon_close = $this->input->post("cafe_mon_close");
	$tue_close = $this->input->post("cafe_tue_close");
	$wed_close = $this->input->post("cafe_wed_close");
	$thu_close = $this->input->post("cafe_thu_close");
	$fri_close = $this->input->post("cafe_fri_close");
	$sat_close = $this->input->post("cafe_sat_close");
	$sun_close = $this->input->post("cafe_sun_close");
	
	$hours= array(
					"mon_open"	=>	$mon_open,
					"tue_open"	=>	$tue_open,
					"wed_open"	=>	$wed_open,
					"thu_open"	=>	$thu_open,
					"fri_open"	=>	$fri_open,
					"sat_open"	=>	$sat_open,
					"sun_open"	=>	$sun_open,
					"mon_close"	=>	$mon_close,
					"tue_close"	=>	$tue_close,
					"wed_close"	=>	$wed_close,
					"thu_close"	=>	$thu_close,
					"fri_close"	=>	$fri_close,
					"sat_close"	=>	$sat_close,
					"sun_close"	=>	$sun_close,
					);
	
    $this->load->model('cafe_model');

      $res = $this->cafe_model->update($id,$name,$region,$address,$latitude,$longitude,$hours,$chain);
      print_r($res);
  }
  
  public function subscribe(){
    $email=$this->input->post("email");
    $this->load->model('user_model');
    $res = $this->user_model->subscribe($email);
    print_r(json_encode(array("subscribed"=>$res)));
  }
  public function get_review($review){
  	$r = $this->user_model->get_rating($review);
	$user = $this->user_model->get_user($r->UserID);
	
	
	$r = (object) array_merge( (array)$r, array( 'User_Name' => $user->Name ) );
  	$this->load->view('list/cafe_review_item',array('r'=>$r));
	$message = $this->output->get_output();
	$this->output->set_output(null);
	return $message;
  }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */