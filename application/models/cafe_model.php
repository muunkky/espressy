<?php

include_once('rise/es_dev.DB.ICafe.php');
include_once('rise/es_dev.DB.IUser.php');

class Cafe_model extends CI_Model {

    private $rise_cafe;
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
        
      $this->rise_cafe= new es_devDBICafe($ConnectionResource);
      $this->rise_user= new es_devDBIUser($ConnectionResource);
      return $ConnectionResource;
    }
public function alphebetize_by_name($c1, $c2){
  return strcasecmp($c1->Name,$c2->Name);
}
public function list_regions(){
	return $this->rise_cafe->ListRegion(0);
}
public function list_chains(){
	return $this->rise_cafe->ListChain(0);
}
public function list_cities_alphabetically(){
	$cities = $this->rise_cafe->ListRegion(0);
  	usort($cities,array("Cafe_model", "alphebetize_by_name"));
	
	for($i=0;$i<count($cities);$i++){
		$cities[$i] = (object) array_merge((array)$cities[$i], array('Black_Stars'=>array()));
		$cities[$i] = (object) array_merge((array)$cities[$i], array('Zero_Stars'=>array()));
		$cities[$i] = (object) array_merge((array)$cities[$i], array('One_Star'=>array()));
		$cities[$i] = (object) array_merge((array)$cities[$i], array('Two_Stars'=>array()));
		$cities[$i] = (object) array_merge((array)$cities[$i], array('Three_Stars'=>array()));
		$cafes = $this->rise_cafe->ListCafeByRegion(0, $cities[$i]->ID);
		$stars = array();
		foreach($cafes as $c){
			$stars[$c->Rating]++;
		}
		$cities[$i]->Black_Stars = $stars[-1];
		$cities[$i]->Zero_Stars = $stars[0];
		$cities[$i]->One_Star = $stars[1];
		$cities[$i]->Two_Stars = $stars[2];
		$cities[$i]->Three_Stars = $stars[3];
		
	}
	return $cities;
}
public function list_cafes_alphabetically($date,$reviewer=false){
  $cities = $this->rise_cafe->ListRegion(0);
  usort($cities,array("Cafe_model", "alphebetize_by_name"));
  
  foreach($cities as $key=>$city){
    $city_cafes = $this->rise_cafe->ListCafeByRegion(0, $city->ID);
      
      $black_stars = array();
      $zero_stars = array();
      $one_star = array();
      $two_stars = array();
      $three_stars = array();
      
      foreach($city_cafes as $cafe){
        $cafe = (object) array_merge( (array)$cafe, array( 'Distance' => '0' ) );
        $cafe->Distance = "Unknown";
        switch($cafe->Star_Rating){
          case -1:
            $black_stars[]=$cafe;
            break;
          case 0:
            $zero_stars[]=$cafe;
      break;
      case 1:
      $one_star[]=$cafe;
      break;
      case 2:
      $two_stars[]=$cafe;
      break;
      case 3:
      $three_stars[]=$cafe;
      break;
        }
    }
    usort($black_stars,array("Cafe_model", "alphebetize_by_name"));
    usort($zero_stars,array("Cafe_model", "alphebetize_by_name"));
    usort($one_star,array("Cafe_model", "alphebetize_by_name"));
    usort($two_stars,array("Cafe_model", "alphebetize_by_name"));
    usort($three_stars,array("Cafe_model", "alphebetize_by_name"));
      $stars = array();
      $stars["black stars"] = ($black_stars);
        $stars["zero stars"] = ($zero_stars);
        $stars["one star"] = ($one_star);
        $stars["two stars"] = ($two_stars);
        $stars["three stars"] = ($three_stars);
        $city_list[$city->Name] =$stars;
    
  }
  return $city_list;
}

public function list_cities_by_distance($lat1,$lon1){
	$city_list = array();
  $city_dist = array();
	$cities = $this->rise_cafe->ListRegion(0);
	
  	for($i=0;$i<count($cities);$i++){
      $key = $cities[$i]->Name;
      if($lat1==0&&$lon1==0){
    	  $lat2 = $cities[$i]->Center_Latitude;
  	    $lon2 = $cities[$i]->Center_Longitude;
  	    $distance = $this->get_distance($lat1,$lon1,$lat2,$lon2);
  	    $key = $distance;
      }
      $city_dist[$key] = (object) array_merge((array)$cities[$i], array('Unconfirmed'=>array()));
      $city_dist[$key] = (object) array_merge((array)$cities[$i], array('Black_Stars'=>array()));
  		$city_dist[$key] = (object) array_merge((array)$cities[$i], array('Zero_Stars'=>array()));
  		$city_dist[$key] = (object) array_merge((array)$cities[$i], array('One_Star'=>array()));
  		$city_dist[$key] = (object) array_merge((array)$cities[$i], array('Two_Stars'=>array()));
  		$city_dist[$key] = (object) array_merge((array)$cities[$i], array('Three_Stars'=>array()));
  
  		$cafes = $this->rise_cafe->ListCafeByRegion(0, $cities[$i]->ID);

  		$stars = array(-2=>0,-1=>0,0=>0,1=>0,2=>0,3=>0);
    
		foreach($cafes as $c){
			if($c->Star_Rating>=-2 && $c->Star_Rating<=3){
			  $stars[$c->Star_Rating]=$stars[$c->Star_Rating]+1;
			}else{
			  $stars[-2]=$stars[-2]+1;
			}
		}
		
		$city_dist[$key]->Unconfirmed = $stars[-2];
		$city_dist[$key]->Black_Stars = $stars[-1];
		$city_dist[$key]->Zero_Stars = $stars[0];
		$city_dist[$key]->One_Star = $stars[1];
		$city_dist[$key]->Two_Stars = $stars[2];
		$city_dist[$key]->Three_Stars = $stars[3];
	}
    ksort($city_dist);
	return $city_dist;
}
// public function list_cafes_by_distance($lat1,$lon1,$date,$reviewer=false){
//     $city_list = array();
//     $city_dist = array();
//     $cities = $this->rise_cafe->ListRegion(0);
//     $i = 0;
//     foreach ($cities as $city) {
      
//       if($lat1*$lon1!=0){
//         $lat2 = $city->Center_Latitude;
//         $lon2 = $city->Center_Longitude;
//         $distance = $this->get_distance($lat1,$lon1,$lat2,$lon2);
//       }else{
//         $distance = $i;
//         $i++;
//       }
//       $city_dist[$distance]=$city;
//     }
//     ksort($city_dist);
//     foreach($city_dist as $dist=>$city){
      
//       $city_cafes = $this->rise_cafe->ListCafeByRegion(0, $city->ID);
//       $stars = array();
//       $black_stars = array();
//       $zero_stars = array();
//       $one_star = array();
//       $two_stars = array();
//       $three_stars = array();
      
//       for($i=0;$i<count($city_cafes);$i++){
//         $city_cafes[$i] = (object) array_merge( (array)$city_cafes[$i], array( 'Distance' => '0' ) );
//         $city_cafes[$i]= (object) array_merge( (array)$city_cafes[$i], array( 'Reviews' => array() ) );
//         $city_cafes[$i]= (object) array_merge( (array)$city_cafes[$i], array( 'Hours' => '' ) );
//         $city_cafes[$i]= (object) array_merge( (array)$city_cafes[$i], array( 'Sisters' => array() ) );
//         $city_cafes[$i]->Hours = $this->getHours($city_cafes[$i],$date);
// 		if($lat1*$lon1!=0){
//           $lat2 = $city_cafes[$i]->Latitude;
//           $lon2 = $city_cafes[$i]->Longitude;
//           $city_cafes[$i]->Distance = $this->get_distance($lat1,$lon1,$lat2,$lon2);
//         }else{
//           $city_cafes[$i]->Distance = $i;
//           $i++;
//         }
//       }
      
//       foreach($city_cafes as $cafe){
    
        
//           $chain=null;
//           if($cafe->ChainID){
//             $chain = $this->rise_cafe->GetChain($cafe->ChainID);
//           }
//           if($chain){
//             $cafe->Sisters = $this->rise_cafe->ListCafeByChain(0, $chain->ID);
			  
//             for($i=0;$i<count($cafe->Sisters);$i++){
//               $cafe->Sisters[$i]= (object) array_merge( (array)$cafe->Sisters[$i], array( 'Hours' => '' ) );
//               $cafe->Sisters[$i]->Hours = $this->getHours($cafe->Sisters[$i],$date);
//       			  $cafe->Sisters[$i] = (object) array_merge( (array)$cafe->Sisters[$i], array( 'Distance' => '0' ) );
//       			  if($lat1*$lon1!=0){
//   		          $lat2 = $cafe->Sisters[$i]->Latitude;
//   		          $lon2 = $cafe->Sisters[$i]->Longitude;
//   		          $cafe->Sisters[$i]->Distance = $this->get_distance($lat1,$lon1,$lat2,$lon2);
//   		        }else{
//   		          $cafe->Sisters[$i]->Distance = $i;
//   		          $i++;
// 		          }
//               foreach($this->rise_user->ListRatingByCafe(0,$cafe->Sisters[$i]->ID) as $r){
//                 $r = (object) array_merge( (array)$r, array( 'Address' => "" ) );
//                 $r->Address = $cafe->Sisters[$i]->Address;
//                 if($reviewer){
//                 $cafe->Reviews[] = $r;
//                 }
//               }
//             }
//           }else{
//             if($reviewer){
//               $cafe->Reviews[] = $this->rise_user->ListRatingByCafe(0,$cafe->ID);
//             }
//           }
        
        
//         switch($cafe->Star_Rating){
//           case -1:
//             $black_stars[]=$cafe;
//             break;
//           case 0:
//             $zero_stars[]=$cafe;
//           break;
//           case 1:
//           $one_star[]=$cafe;
//           break;
//           case 2:
//           $two_stars[]=$cafe;
//           break;
//           case 3:
//           $three_stars[]=$cafe;
//           break;
//         }
//       }
     
//       $this->sortByDistance($black_stars);
//       $this->sortByDistance($zero_stars);
//       $this->sortByDistance($one_star);
//       $this->sortByDistance($two_stars);
//       $this->sortByDistance($three_stars);
      
//     $this->removeDupes($black_stars);
//     $this->removeDupes($zero_stars);
//     $this->removeDupes($one_star);
//     $this->removeDupes($two_stars);
//     $this->removeDupes($three_stars);
    
//       $stars["black stars"] = ($black_stars);
//       $stars["zero stars"] = ($zero_stars);
//       $stars["one star"] = ($one_star);
//       $stars["two stars"] = ($two_stars);
//       $stars["three stars"] = ($three_stars);
      
//       $city_list[$city->Name] =$stars;
//     }
//     return $city_list;
    
//   }
	function update_rating($cafe_id,$rating){
		$cafe = $this->rise_cafe->GetCafe($cafe_id);
		$this->rise_cafe->SetCafe($cafe->ID, $cafe->Name, $cafe->Latitude, $cafe->Longitude, $cafe->Address, $cafe->Google_Places_Reference, $cafe->Google_Places_Id, $rating, $cafe->RegionID, $cafe->Monday_Open, $cafe->Monday_Close, $cafe->Tuesday_Open, $cafe->Tuesday_Close, $cafe->Wednesday_Open, $cafe->Wednesday_Close, $cafe->Thursday_Open, $cafe->Thursday_Close, $cafe->Friday_Open, $cafe->Friday_Close, $cafe->Saturday_Open, $cafe->Saturday_Close, $cafe->Sunday_Open, $cafe->Sunday_Close, $cafe->ChainID);
	}
  function get_city_cafes_by_distance($lat, $lon,$RegionID,$date,$categorize_by_stars=FALSE){
  	$lat1 = deg2rad($lat);
  	$lon1 = deg2rad($lon);
		$city_cafes = array();

    	$res = $this->db->query("SELECT t_es_dev_u_Cafe.c_id as ID, ( 6371 *2 * ATAN2( SQRT( SIN( (
  		( RADIANS(t_es_dev_u_Cafe.c_u_Latitude) -$lat1 ) /2 ) * SIN( ( RADIANS(t_es_dev_u_Cafe.c_u_Latitude) -$lat1 ) /2 ) + COS( ( $lat1 ) ) * COS( ( $lat1 ) ) * SIN( (
  		RADIANS(t_es_dev_u_Cafe.c_u_Longitude) - $lon1
  		) /2 ) * SIN( (
  		RADIANS(t_es_dev_u_Cafe.c_u_Longitude) - $lon1
  		) /2 ) ) ) , SQRT( 1 - ( SIN( ( RADIANS(t_es_dev_u_Cafe.c_u_Latitude) -$lat1 ) /2 ) * SIN( ( RADIANS(t_es_dev_u_Cafe.c_u_Latitude) -$lat1 ) /2 ) + COS( ( $lat1 ) ) * COS( ( $lat1 ) ) * SIN( (
  		RADIANS(t_es_dev_u_Cafe.c_u_Longitude) - $lon1
  		) /2 ) * SIN( (
  		RADIANS(t_es_dev_u_Cafe.c_u_Longitude) - $lon1
  		) /2 ) ) ) )
  		)
  		AS Distance
  		FROM t_es_dev_u_Cafe WHERE t_es_dev_u_Cafe.c_r_Region = $RegionID
  		ORDER BY Distance");
	  
		
		foreach($res->result() as $c){
			$cafe = $this->rise_cafe->GetCafe($c->ID);
			$cafe = (object) array_merge( (array)$cafe, array( 'Distance' => '0' ) );
			
	  	$cafe->Distance = $c->Distance;
	  	
			$cafe= (object) array_merge( (array)$cafe, array( 'Hours' => '' ) );
			$cafe->Hours = $this->getHours($cafe, $date);
			$cafe = (object) array_merge( (array)$cafe, array( 'Reviews' => array() ) );
			$cafe->Reviews = $this->rise_user->ListRatingByCafe(0, $cafe->ID);
			foreach($cafe->Reviews as &$review){
				$user = $this->rise_user->GetUser($review->UserID);
				$name = $user->Name;
				$review = (object) array_merge((array)$review,array('User_Name'=>$name));
			}
			$cafe = (object) array_merge( (array)$cafe, array( 'Sisters' => array() ) );
			
			if(!is_null($cafe->ChainID)){
				foreach($this->rise_cafe->ListCafeByChain(0, $cafe->ChainID) as $sister){
					if($sister->ID!=$cafe->ID){
						$sister= (object) array_merge( (array)$sister, array( 'Hours' => '' ) );
              			$sister->Hours = $this->getHours($sister,$date);
              			$sister = (object) array_merge( (array)$sister, array( 'Distance' => '0' ) );
						$sister->Distance = $this->get_distance($lat, $lon, $sister->Latitude, $sister->Longitude);
						$cafe->Sisters[] = $sister;
					}
				}
				
			}
			if($categorize_by_stars){
				// if(!is_null($cafe->ChainID)){
				// 	if(!isset($city_chains[$cafe->Star_Rating]) || !in_array($cafe->ChainID, $city_chains[$cafe->Star_Rating])){
				// 		$city_chains[$cafe->Star_Rating][] = $cafe->ChainID;
				// 		$city_cafes[$cafe->Star_Rating][$cafe->ID] = $cafe;
				// 	}
				// }else{
				// 	$city_cafes[$cafe->Star_Rating][$cafe->ID] = $cafe;
				// }
			}else{
				if(!is_null($cafe->ChainID)){
					if(!isset($city_chains) || !in_array($cafe->ChainID, $city_chains)){
						$city_chains[] = $cafe->ChainID;
						$city_cafes[$cafe->ID] = $cafe;
					}
				}else{
					$city_cafes[$cafe->ID] = $cafe;
				}
			}

		}
		
		return($city_cafes);
		
  }
  function get_distance($lat1,$lon1,$lat2,$lon2){
  	
        $R = 6371; // Radius of the earth in km
        $dLat = deg2rad($lat2-$lat1);  // deg2rad below
        $dLon = deg2rad($lon2-$lon1); 
        $a = sin($dLat/2) * sin($dLat/2) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * sin($dLon/2) * sin($dLon/2); 
        $c = 2 * atan2(sqrt($a), sqrt(1-$a)); 
        $distance = $R * $c; // Distance in km
        return $distance;
  }
  
  function deg2rad($deg) {
    return $deg * (pi()/180);
  }
  function removeDupes( &$array ){
    $newArray = array();
  foreach($array as $cafe){    
    if(array_key_exists($cafe->Name,$newArray)){
      if($cafe->Distance < $newArray[$cafe->Name]->Distance){
        $newArray[$cafe->Name]=$cafe;
      }
    }else{
      $newArray[$cafe->Name] = $cafe;
    }
  }
  $array = array_values($newArray);
  }
  function submit_review($cafe_id,$rating,$comments,$user_name,$user_email){
  	return true;
	exit;
  	$cafe = $this->rise_cafe->GetCafe($cafe_id);
	$region = $this->rise_cafe->GetRegion($cafe->RegionID);
	$subject = "$rating Star Cafe in $region->Name: $cafe->Name by $user_name";
	$message = <<<EOD
$cafe->Name
$region->Name
$rating Stars
by $user_name

$comments
EOD;
	$headers = 'From: no-reply@espressy.com' . "\r\n" .
          'X-Mailer: PHP/' . phpversion();
	$to = array("cameronrout@gmail.com","jonasbe@gmail.com","jbeyford@gmail.com");
	foreach($to as $email){
		//if($email != $user_email){
			if(mail($email, $subject, $message, $headers)){
	          return "<div class='alert alert-success'>Thank you for your submission.</div>";
	        }else{return "<div class='alert alert-warning'>Email Failed.</div>";;}
		//}
	}
  }
  function submit($email,$name,$region,$address,$latitude,$longitude,$rating,$comments,$hours,$chain){
    
    $cafeID = $this->rise_cafe->NewCafe($name, NULL, $region);
    $cafe = $this->rise_cafe->GetCafe($cafeID);
    $this->update($cafeID,$name,$region,$address,$latitude,$longitude,$hours,$chain);
    $cafe = $this->rise_cafe->GetCafe($cafeID);
    
    $users = $this->rise_user->ListUserByEmail(0,$email);
    $user = $users[0];
    $ratingID =$this->rise_user->NewRating($user->ID,$cafeID);
    $res = $this->rise_user->SetRating($ratingID, $rating, $comments, date("Y-m-d H:i:s"), $user->ID, $cafeID, false);
    
    return $this->rise_cafe->SetCafe($cafeID,$cafe->Name,$cafe->Latitude,$cafe->Longitude, $cafe->Address, $cafe->Google_Places_Reference, $cafe->Google_Places_Id, $rating, $cafe->RegionID,
                              $cafe->Monday_Open,
                              $cafe->Monday_Close,
                              $cafe->Tuesday_Open,
                              $cafe->Tuesday_Close,
                              $cafe->Wednesday_Open,
                              $cafe->Wednesday_Close,
                              $cafe->Thursday_Open,
                              $cafe->Thursday_Close,
                              $cafe->Friday_Open,
                              $cafe->Friday_Close,
                              $cafe->Saturday_Open,
                              $cafe->Saturday_Close,
                              $cafe->Sunday_Open,
                              $cafe->Sunday_Close,
                              $cafe->ChainID);
  }
  function update($cafeID, $name,$region,$address,$latitude,$longitude,$hours,$chain){
    
	$newCafe = $this->rise_cafe->GetCafe($cafeID);
	if($chain=="NULL"){
		$chain = NULL;
	}

	$this->rise_cafe->SetCafe(	$newCafe->ID, 
								$name, 
								$latitude, 
								$longitude, 
								$address, 
								$newCafe->Google_Places_Reference, 
								$newCafe->Google_Places_Id, 
								$newCafe->Star_Rating, $region, 
								date("Y-m-d H:i:s", strtotime($hours["mon_open"])),
								date("Y-m-d H:i:s", strtotime($hours["mon_close"])),
								date("Y-m-d H:i:s", strtotime($hours["tue_open"])),
								date("Y-m-d H:i:s", strtotime($hours["tue_close"])),
								date("Y-m-d H:i:s", strtotime($hours["wed_open"])),
								date("Y-m-d H:i:s", strtotime($hours["wed_close"])),
								date("Y-m-d H:i:s", strtotime($hours["thu_open"])),
								date("Y-m-d H:i:s", strtotime($hours["thu_close"])),
								date("Y-m-d H:i:s", strtotime($hours["fri_open"])),
								date("Y-m-d H:i:s", strtotime($hours["fri_close"])),
								date("Y-m-d H:i:s", strtotime($hours["sat_open"])),
								date("Y-m-d H:i:s", strtotime($hours["sat_close"])),
								date("Y-m-d H:i:s", strtotime($hours["sun_open"])),
								date("Y-m-d H:i:s", strtotime($hours["sun_close"])),
								$chain);

	return "<div class='alert alert-success'>Thank you for your update.</div>";
  }
  function getHours($cafe,$date){
    $date = trim(strstr($date, '(', true));
  $jsDateTS = strtotime($date);
    $weekday = date('D', $jsDateTS );
    switch($weekday){
      case "Mon":
        $open = $cafe->Monday_Open;
        $close = $cafe->Monday_Close;
        break;
      case "Tue":
        $open = $cafe->Tuesday_Open;
        $close = $cafe->Tuesday_Close;
        break;
      case "Wed":
        $open = $cafe->Wednesday_Open;
        $close = $cafe->Wednesday_Close;
        break;
      case "Thu":
        $open = $cafe->Thursday_Open;
        $close = $cafe->Thursday_Close;
        break;
      case "Fri":
        $open = $cafe->Friday_Open;
        $close = $cafe->Friday_Close;
        break;
      case "Sat":
        $open = $cafe->Saturday_Open;
        $close = $cafe->Saturday_Close;
        break;
      case "Sun":
        $open = $cafe->Sunday_Open;
        $close = $cafe->Sunday_Close;
        break;
    }
    
    if(strcasecmp($open, $close)==0){
      return $weekday.": Closed";
    }else{
      return $weekday.": ".date("g".(date("i",strtotime($open))!="00"?':i':'')." a",strtotime($open))." to ".date("g".(date("i",strtotime($close))!="00"?':i':'')." a",strtotime($close));
    }
  }
  function new_chain($name){
    $chainID = $this->rise_cafe->NewChain();
    $this->rise_cafe->SetChain($chainID,$name);
    return $chainID;
  }
  function new_region($name,$lat,$long){
    $regionID = $this->rise_cafe->NewRegion(); 
    $this->rise_cafe->SetRegion($regionID,$name,$lat,$long);
    return $regionID;
  }
  function sortByDistance( &$array )
  {
    
    if(count($array)>0){
       $cur = 1;
       $stack[1]['l'] = 0;
       $stack[1]['r'] = count($array)-1;
      
       do
       {
        $l = $stack[$cur]['l'];
        $r = $stack[$cur]['r'];
        $cur--;
      
        do
        {
         $i = $l;
         $j = $r;
         $tmp = $array[(int)( ($l+$r)/2 )];
      
         // partion the array in two parts.
         // left from $tmp are with smaller values,
         // right from $tmp are with bigger ones
         do
         {
          while( $array[$i]->Distance < $tmp->Distance )
           $i++;
      
          while( $tmp->Distance < $array[$j]->Distance )
           $j--;
      
          // swap elements from the two sides
          if( $i <= $j)
          {
           $w = $array[$i];
           $array[$i] = $array[$j];
           $array[$j] = $w;
      
           $i++;
           $j--;
          }
      
         }while( $i <= $j );
      
       if( $i < $r )
         {
          $cur++;
          $stack[$cur]['l'] = $i;
          $stack[$cur]['r'] = $r;
         }
         $r = $j;
      
        }while( $l < $r );
      
       }while( $cur != 0 );
      
      
      }
  }
}