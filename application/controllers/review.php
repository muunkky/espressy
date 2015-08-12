<?php
if (!defined('BASEPATH'))
exit('No direct script access allowed');

class Review extends CI_Controller {
public function __construct()
{
	parent::__construct();
	$this->load->model('review_model');
	$this->load->model('user_model','user');
}
private function _check_user(){
	if(!$this->user->is_authenticated())
	{	
		$this->session->sess_destroy();
		redirect('/login');
		exit;
	}
}
public function index() {
	$this->_check_user();
	$user = $this->session->userdata('user');
	$this->session->unset_userdata('cafe');
	if(isset($user->Name)){
		$name = $user->Name;
	}else{
		$name = "";
	}
	
	$data=array('nearby_url'=> $this->review_model->nearby_url(),
					'name'	=>	$name
					);
	$this->load->view('review/review_form',$data);
}
public function submit(){
	$reference = $this->session->userdata('reference');
	$cafe = $this->review_model->get_cafe_by_reference($reference);
	if(!isset($cafe)){
		$cafe = $this->review_model->new_cafe($reference);
	}
	$user = $this->session->userdata('user');
	$review_type = $this->input->post('review_type');
	$rating = $this->input->post('rating');
	$comments = $this->input->post('comments');
	$review_date =date("Y-m-d H:i:s", time());

	$review = $this->review_model->new_review($review_type, $user->ID, $cafe->ID, $rating,$comments, $review_date);
	if($review){
		$equipment_types = $this->review_model->list_equipment_types();
		foreach ($equipment_types as $type) {
			$eq=$this->input->post(url_title($type->Name));
			if($eq){
				$this->review_model->add_review_equipment($review->ID,$eq);
			}
		}
		if($this->_email_review($review->ID)){
			$error = $this->session->userdata('email_error');
			$this->load->view('review/review_success',array('error'=>$error));
		}
	}else{
		$data=array('error'=>'Could not save review');
		$this->load->view('review/cafe_form',$data);
	}
}
	public function add(){
		$this->_check_user();
		$name = $this->input->post('add_name');
		$lat = $this->input->post('hidden_lat');
		$lng = $this->input->post('hidden_lng');
		$submit = $this->input->post('add_place');
		if($lat && $lng && $name && $submit=='Add New Place'){

			$cafe = $this->review_model->new_cafe($name,$lat,$lng);
			$this->session->unset_userdata('cafe');
			$this->session->unset_userdata('reference');
			if(!is_null($cafe))
			{
				$this->session->set_userdata(array('cafe'=>$cafe));	
				redirect('/review/cafe');
			}
		}
		redirect('/review');
	}
public function getLocalPlaces(){
	$maxRows = $this->input->post('maxRows');
	$lat = $this->input->post('lat');
	$lng = $this->input->post('lng');
	$distance_m = $this->input->post('radius_m');
	$json = $this->input->post('json');
	$cafes = $this->review_model->list_cafes_by_distance($maxRows, $lat,$lng,$distance_m);
	if($json){
		$cafes_json = json_encode($cafes);
		echo $cafes_json;
	}else{
		return arrayToObject($cafes);
	}
}
private function _remove_keys($array){
	$assocKeys = array();
	$keys = array_keys($array);
	foreach ($keys as $key) {
		$assocKeys[$key]=true;
	}
	return array_diff_key($array, $assocKeys);
}
private function _email_review($review_id){
	$config['protocol'] = 'sendmail';
	$config['mailpath'] = '/usr/sbin/sendmail';
	$config['charset'] = 'iso-8859-1';
	$config['wordwrap'] = TRUE;
	$config['mailtype'] = 'html';
	$eq = $this->review_model->list_review_equipment_by_type($review_id);
	$user = $this->session->userdata('user');
	$review = $this->review_model->get_review($review_id);
	$cafe=$this->session->userdata('cafe');
	if(isset($user->Email)){
		$users = $this->review_model->list_users();
		$to_emails = array_map(function($var){return $var->Email ; } ,$users);
		//$to_emails = $this->_remove_keys($to_emails);
		$tostring = '';
		foreach($to_emails as $e){
			$tostring.=$e.',';
		}
		$from_email = $user->Email;
		$this->load->library('email');
		$this->email->initialize($config);
		$this->email->from('postmaster@espressy.com', "Espressy Reviews");
		$this->email->reply_to($user->Email,$user->Name);
		$this->email->to($tostring); 

		switch ($review->Rating) {
		    case 1:
		        $rating = "Not Worthy";
		        break;
		    case 2:
		        $rating = "Has Potential";
		        break;
		    case 3:
		        $rating = "Worthy";
		        break;
		}
		$review_type = $this->review_model->get_review_type($review->Review_TypeID);
		$subject = "Espressy: ".$user->Name." Reviewed ".$cafe->Name;
		$this->email->subject($subject);
		$message = <<<EOD
<html>
<h1>Hello everyone!</h1>

<b>$user->Name</b> has just reviewed a cafe: <em>$cafe->Name</em>
Here's what they had to say!
<div style="width:100%; background-color: #cccccc">
Rating: $rating
Review Type: $review_type->Name
</div>
<h3>
Comments: $review->Comments
</h3>
EOD;
		foreach($eq as $type=>$e){
			if($e!="Select"){
				$message .= $type.': '.$e."\r\n";
			}
		}
		$this->email->message($message);	
		$this->session->unset_userdata('email_error');
		if(! $this->email->send()){
			$this->session->set_userdata(array('email_error'=>$this->email->print_debugger()));
			return false;
		}else{
			return true;
		}
	}
	return false;
}
public function cafe(){
	$this->_check_user();
	$reference='';
	$cafe=NULL;
	$name = '';
	$address = '';
	$website = '';
	$rating = '';
	$phone = '';
	$latitude = '';
	$longitude = '';
	$cafe = $this->session->userdata('cafe');

	if(isset($cafe->ID)){
		$address= $cafe->Address;
		$name = $cafe->Name;
		$latitude = $cafe->Latitude;
		$longitude = $cafe->Longitude;
		$reference = $cafe->Google_Places_Reference;
	}else{
		$reference = $this->input->post('places');
		$name = $this->input->post('hidden_name');
		$address = $this->input->post('hidden_address');
		$website = $this->input->post('hidden_website');
		$rating = $this->input->post('hidden_rating');
		$phone = $this->input->post('hidden_phone');
		$latitude = $this->input->post('hidden_latitude');
		$longitude = $this->input->post('hidden_longitude');
		$cafe = $this->review_model->get_cafe_by_reference($reference);
	
		$this->session->set_userdata(array('cafe'=>$cafe));
	}
	if($reference == ''){
		redirect('/review');
	}
	$equipment_by_type = $this->review_model->list_equipment_by_type();
	$user = $this->session->userdata('user');
	$last_review=NULL;
	$last_review_equipment_by_type=NULL;

	if(!is_null($cafe)){
		$last_review = $this->review_model->get_last_review($user->ID,$cafe->ID);
		$last_review_equipment_by_type = $this->review_model->list_review_equipment_by_type($last_review);
	}
	
	if(!isset($last_review_equipment_by_type['Espresso Machine'])){
		$last_review_equipment_by_type['Espresso Machine']="Select";
	}
	if(!isset($last_review_equipment_by_type['Grinder'])){
		$last_review_equipment_by_type['Grinder']="Select";
	}
	if(!isset($last_review_equipment_by_type['Drip Coffee'])){
		$last_review_equipment_by_type['Drip Coffee']="Select";
	}
	$review_type_obj = $this->review_model->list_review_types();
	foreach( $review_type_obj as $rt){
		$review_types[$rt->ID] = $rt->Name;
	}
	
	$data = array('name'=>	$name,
			'address'	=>	$address,
			'website'	=>	$website,
			'rating'	=>	$rating,
			'phone'		=>	$phone,
			'reference'	=>	$reference,
			'cafe'		=>	$cafe,
			'review_types'	=>	$review_types,
			'equipment_by_type'	=> $equipment_by_type,
			'selected_equipment_by_type'	=> $last_review_equipment_by_type,
			'last_review'	=>	$last_review
			);
	
	$this->load->view('review/cafe_form',$data);
}
}
?>