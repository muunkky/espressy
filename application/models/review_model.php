<?php

include_once('rise/es_dev.DB.IReview.php');

class Review_model extends CI_Model {

private $rise_review;

function __construct()
{
// Call the Model constructor
parent::__construct();
$this->load->database();
$this->load->helper('url');
$this->load->helper('debug');
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

$this->rise_review = new es_devDBIReview($ConnectionResource);
return $ConnectionResource;
}
function nearby_url(){
	$url=GOOGLE_NEARBY_URL."&key=".GOOGLE_BROWSER_API_KEY.'&rankby=distance&sensor=true&keyword=coffee';
}
private function _add_cafe($Google_Places_Reference, $Google_Places_Id,$Name, $Latitude, $Longitude, $Address){

	$new_cafe_id = $this->rise_review->NewCafe($Name,$Latitude,$Longitude,$Address,$Google_Places_Reference,$Google_Places_Id);
	$new_cafe = $this->rise_review->GetCafe($new_cafe_id);
	return $new_cafe;
}
function new_cafe($Name, $Latitude, $Longitude){
	$url = "https://maps.googleapis.com/maps/api/place/add/json?sensor=true&key=".GOOGLE_BROWSER_API_KEY;	
	$data = array('location' => array('lat'=>$Latitude,'lng'=>$Longitude), 'accuracy' => 15, 'name'=>$Name,'types'=>array('cafe'),'language'=>'en');
	$ch = curl_init();
	$post_values = json_encode( $data );
	$post_values = '{
	  "location": {
		"lat": '.$Latitude.',
		"lng": '.$Longitude.'
	  },
	  "accuracy": 15,
	  "name": "'.$Name.'",
	  "types": ["cafe"],
	  "language": "en"
	}';

	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $post_values);

	$json = curl_exec($ch);
	$data = json_decode($json);
	if(!curl_errno($ch))
	{
		curl_close($ch);
		if($data->result = "OK"){
			/*
			 * OK, so now we have our new google place
			 * let's add it to the cafe table so we can
			 * find it again.
			 */
			$details = $this->get_cafe_by_reference($data->reference);

			return $this->_add_cafe($details->google_places_reference, $details->google_places_id, $details->name, $details->latitude, $details->longitude, $details->address);
		}else{
			return new Exception($data->status);
		}
	}
}

function new_review($Review_TypeID, $UserID, $CafeID,$Rating,$Comments, $Review_Date){
	$review_id = $this->rise_review->NewReview($Review_TypeID, $UserID, $CafeID);
	$this->rise_review->SetReview($review_id, $Rating, $Comments, $Review_Date, $Review_TypeID, $UserID, $CafeID);
	return $this->rise_review->GetReview($review_id);
}
function get_review($review_id){
	return $this->rise_review->GetReview($review_id);
}
private function _get_place_details($reference){
	$url = "https://maps.googleapis.com/maps/api/place/details/json?sensor=true&key=".GOOGLE_BROWSER_API_KEY."&reference=".$reference;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		
		$data = curl_exec($ch);
		$result = json_decode($data);

		$results = $result->result;

		curl_close($ch);
		if(isset($results->name)){
			$Name=$results->name;
			$Latitude=$results->geometry->location->lat;
			$Longitude=$results->geometry->location->lng;
			$Address = '';
			$id = $results->id;
			if(isset($results->formatted_address)){
				$Address=$results->formatted_address;
			}else{
				$url = "https://maps.googleapis.com/maps/api/geocode/json?sensor=true&latlng=".$Latitude.",".$Longitude;//."&key=".GOOGLE_BROWSER_API_KEY;//."&reference=".$reference;
				
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, $url);
				curl_setopt($ch, CURLOPT_POST, 1);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				//curl_setopt($ch, CURLOPT_POSTFIELDS, $post_values);
				$data = curl_exec($ch);
				$result = json_decode($data);
				
				$results = $result->results[0];

				$Address = $results->formatted_address;
			}
			
			return $this->arrayToObject(array(
						'Name'						=>	$Name,
						'Latitude'					=>	$Latitude,
						'Longitude'					=>	$Longitude,
						'Address'					=>	$Address,
						'Google_Places_Id'			=>	$id,
						'Google_Places_Reference'	=>	$reference
					));
		}else{
			return null;	
		}
}
function arrayToObject($array) {
    if(!is_array($array)) {
        return $array;
    }
    
    $object = new stdClass();
    if (is_array($array) && count($array) > 0) {
      foreach ($array as $name=>$value) {
         $name = strtolower(trim($name));
         if (!empty($name)) {
            $object->$name = $this->arrayToObject($value);
         }
      }
      return $object;
    }
    else {
      return FALSE;
    }
}
function get_cafe_by_reference($reference){
	$cafe =$this->rise_review->ListCafeByReference(1, $reference);
			
	if(isset($cafe[0])){
		return $cafe[0];
	}else{
		$cafe = $this->_get_place_details($reference);
		
		return $this->_add_cafe($cafe->google_places_reference, $cafe->google_places_id, $cafe->name, $cafe->latitude, $cafe->longitude, $cafe->address);
	}
}
function list_users(){
	return $this->rise_review->ListUser(0);
}
function list_review_types(){
	return $this->rise_review->ListReview_Type(0);
}
function list_equipment_types(){
	return $this->rise_review->ListEquipment_Type(0);
}
function add_review_equipment($ReviewID, $EquipmentID){
	return $this->rise_review->NewReview_Equipment($ReviewID, $EquipmentID);
}
function list_review_equipment_by_type($ReviewID){
	$result=array();
	$equipment = $this->rise_review->ListReview_EquipmentByReview(0, $ReviewID);
	foreach ($equipment as $req) {
		$eq = $this->rise_review->GetEquipment($req->EquipmentID);
		$type = $this->rise_review->GetEquipment_Type($eq->Equipment_TypeID);
		$result[$type->Name]=$eq->Name;
	}
	
	return $result;
}
function list_equipment_by_type(){
	$result = array();
	$eq_types = $this->rise_review->ListEquipment_Type(0);
	foreach ($eq_types as $et) {
		$type = $et->Name;
		$eq_list = array();
		$eqs = $this->rise_review->ListEquipmentByEquipment_Type(0, $et->ID);
		foreach ($eqs as $eq) {
			$eq_list[$eq->ID]=$eq->Name;
		}
		$result[$type]=$eq_list;
	}
	return $result;
}
function get_review_type($ID){
	return $this->rise_review->GetReview_Type($ID);
}
function get_last_review($userID,$cafeID){
	$review = $this->rise_review->ListReviewByUserAndCafe(1,$userID,$cafeID);
	return $review;
}
function list_review_by_user_and_cafe($userID,$cafeID){
	$reviews = $this->rise_review->ListReviewByUserAndCafe(0,$userID,$cafeID);
	return $reviews;
}
function list_cafes_by_distance($maxRows, $lat,$lng,$distance_m){
	
	$deltaLng  = $distance_m / ((M_PI/180.0) * 6378100 * cos($lat));
	//$deltaLng = $distance_m / ( 40075160.0 * cos(deg2rad($lat)) / 360.0);
	$deltaLat = $distance_m / 111000.0;
	$cafes = $this->rise_review->ListCafesInRange($maxRows, $lat+$deltaLat, $lng+$deltaLng, $lat-$deltaLat, $lng-$deltaLng);
	return $cafes;
}
}
