<?php 
class es_devProxyIUser extends SoapClient
{
	public function __construct($url)
	{
		parent::__construct($url.'?WSDL', array('location'=>$url, 'uri'=>'http://es_dev.WS.IUser/'));
	}
	public function NewUser($Email)
	{
		$rv = array();
		if(!is_null($Email))
			$rv['Email'] = $Email;
		$rv = $this->__soapCall('NewUser', array('NewUser'=>((object)$rv)));
		$rv = (is_null($rv)?new stdClass():$rv->NewUserResult);
		return $rv;
	}
	public function DeleteUser($ID)
	{
		$rv = array('ID'=>$ID);
		$rv = $this->__soapCall('DeleteUser', array('DeleteUser'=>((object)$rv)));
		$rv = (is_null($rv)?new stdClass():$rv->DeleteUserResult);
		return $rv;
	}
	public function GetUser($ID)
	{
		$rv = array('ID'=>$ID);
		$rv = $this->__soapCall('GetUser', array('GetUser'=>((object)$rv)));
		$rv = (is_null($rv)?new stdClass():$rv->GetUserResult);
		return $rv;
	}
	public function SetUser($ID, $Email, $Password_Hash, $Salt, $Name, $Email_Authenticated, $Email_Authorization_Nonce)
	{
		$rv = array('ID'=>$ID, 'Email_Authenticated'=>$Email_Authenticated);
		if(!is_null($Email))
			$rv['Email'] = $Email;
		if(!is_null($Password_Hash))
			$rv['Password_Hash'] = $Password_Hash;
		if(!is_null($Salt))
			$rv['Salt'] = $Salt;
		if(!is_null($Name))
			$rv['Name'] = $Name;
		if(!is_null($Email_Authorization_Nonce))
			$rv['Email_Authorization_Nonce'] = $Email_Authorization_Nonce;
		$rv = $this->__soapCall('SetUser', array('SetUser'=>((object)$rv)));
		$rv = (is_null($rv)?new stdClass():$rv->SetUserResult);
		return $rv;
	}
	public function ListUser($maxRowsToReturn)
	{
		$rv = array('maxRowsToReturn'=>$maxRowsToReturn);
		$rv = $this->__soapCall('ListUser', array('ListUser'=>((object)$rv)));
		$rv = (is_null($rv)?new stdClass():$rv->ListUserResult);
		if(property_exists($rv, 'returnListUser'))
			$rv = $rv->returnListUser;
		if(!is_array($rv))
			$rv = (property_exists($rv, 'ID')?array($rv):array());
		return $rv;
	}
	public function ListUserByEmail($maxRowsToReturn, $Email)
	{
		$rv = array('maxRowsToReturn'=>$maxRowsToReturn);
		if(!is_null($Email))
			$rv['Email'] = $Email;
		$rv = $this->__soapCall('ListUserByEmail', array('ListUserByEmail'=>((object)$rv)));
		$rv = (is_null($rv)?new stdClass():$rv->ListUserByEmailResult);
		if(property_exists($rv, 'returnListUserByEmail'))
			$rv = $rv->returnListUserByEmail;
		if(!is_array($rv))
			$rv = (property_exists($rv, 'ID')?array($rv):array());
		return $rv;
	}
	public function SignupUser($Email, $Password_Hash, $Salt, $Name, $Email_Authenticated, $Email_Authorization_Nonce)
	{
		$rv = array('Email_Authenticated'=>$Email_Authenticated);
		if(!is_null($Email))
			$rv['Email'] = $Email;
		if(!is_null($Password_Hash))
			$rv['Password_Hash'] = $Password_Hash;
		if(!is_null($Salt))
			$rv['Salt'] = $Salt;
		if(!is_null($Name))
			$rv['Name'] = $Name;
		if(!is_null($Email_Authorization_Nonce))
			$rv['Email_Authorization_Nonce'] = $Email_Authorization_Nonce;
		$rv = $this->__soapCall('SignupUser', array('SignupUser'=>((object)$rv)));
		$rv = (is_null($rv)?new stdClass():$rv->SignupUserResult);
		return $rv;
	}
	public function NewRating($UserID, $CafeID)
	{
		$rv = array('UserID'=>$UserID, 'CafeID'=>$CafeID);
		$rv = $this->__soapCall('NewRating', array('NewRating'=>((object)$rv)));
		$rv = (is_null($rv)?new stdClass():$rv->NewRatingResult);
		return $rv;
	}
	public function DeleteRating($ID)
	{
		$rv = array('ID'=>$ID);
		$rv = $this->__soapCall('DeleteRating', array('DeleteRating'=>((object)$rv)));
		$rv = (is_null($rv)?new stdClass():$rv->DeleteRatingResult);
		return $rv;
	}
	public function GetRating($ID)
	{
		$rv = array('ID'=>$ID);
		$rv = $this->__soapCall('GetRating', array('GetRating'=>((object)$rv)));
		$rv = (is_null($rv)?new stdClass():$rv->GetRatingResult);
		return $rv;
	}
	public function SetRating($ID, $Rating, $Comments, $Date, $UserID, $CafeID, $Expired)
	{
		$rv = array('ID'=>$ID, 'Rating'=>$Rating, 'Date'=>$Date, 'UserID'=>$UserID, 'CafeID'=>$CafeID, 'Expired'=>$Expired);
		if(!is_null($Comments))
			$rv['Comments'] = $Comments;
		$rv = $this->__soapCall('SetRating', array('SetRating'=>((object)$rv)));
		$rv = (is_null($rv)?new stdClass():$rv->SetRatingResult);
		return $rv;
	}
	public function ListRating($maxRowsToReturn)
	{
		$rv = array('maxRowsToReturn'=>$maxRowsToReturn);
		$rv = $this->__soapCall('ListRating', array('ListRating'=>((object)$rv)));
		$rv = (is_null($rv)?new stdClass():$rv->ListRatingResult);
		if(property_exists($rv, 'returnListRating'))
			$rv = $rv->returnListRating;
		if(!is_array($rv))
			$rv = (property_exists($rv, 'ID')?array($rv):array());
		return $rv;
	}
	public function NewCafe($Name, $Google_Places_Id, $RegionID)
	{
		$rv = array('RegionID'=>$RegionID);
		if(!is_null($Name))
			$rv['Name'] = $Name;
		if(!is_null($Google_Places_Id))
			$rv['Google_Places_Id'] = $Google_Places_Id;
		$rv = $this->__soapCall('NewCafe', array('NewCafe'=>((object)$rv)));
		$rv = (is_null($rv)?new stdClass():$rv->NewCafeResult);
		return $rv;
	}
	public function DeleteCafe($ID)
	{
		$rv = array('ID'=>$ID);
		$rv = $this->__soapCall('DeleteCafe', array('DeleteCafe'=>((object)$rv)));
		$rv = (is_null($rv)?new stdClass():$rv->DeleteCafeResult);
		return $rv;
	}
	public function GetCafe($ID)
	{
		$rv = array('ID'=>$ID);
		$rv = $this->__soapCall('GetCafe', array('GetCafe'=>((object)$rv)));
		$rv = (is_null($rv)?new stdClass():$rv->GetCafeResult);
		return $rv;
	}
	public function SetCafe($ID, $Name, $Latitude, $Longitude, $Address, $Google_Places_Reference, $Google_Places_Id, $Star_Rating, $Monday_Open, $Monday_Close, $Tuesday_Open, $Tuesday_Close, $Wednesday_Open, $Wednesday_Close, $Thursday_Open, $Thursday_Close, $Friday_Open, $Friday_Close, $Saturday_Open, $Saturday_Close, $Sunday_Open, $Sunday_Close, $RegionID, $ChainID)
	{
		$rv = array('ID'=>$ID, 'Latitude'=>$Latitude, 'Longitude'=>$Longitude, 'Star_Rating'=>$Star_Rating, 'Monday_Open'=>$Monday_Open, 'Monday_Close'=>$Monday_Close, 'Tuesday_Open'=>$Tuesday_Open, 'Tuesday_Close'=>$Tuesday_Close, 'Wednesday_Open'=>$Wednesday_Open, 'Wednesday_Close'=>$Wednesday_Close, 'Thursday_Open'=>$Thursday_Open, 'Thursday_Close'=>$Thursday_Close, 'Friday_Open'=>$Friday_Open, 'Friday_Close'=>$Friday_Close, 'Saturday_Open'=>$Saturday_Open, 'Saturday_Close'=>$Saturday_Close, 'Sunday_Open'=>$Sunday_Open, 'Sunday_Close'=>$Sunday_Close, 'RegionID'=>$RegionID, 'ChainID'=>$ChainID);
		if(!is_null($Name))
			$rv['Name'] = $Name;
		if(!is_null($Address))
			$rv['Address'] = $Address;
		if(!is_null($Google_Places_Reference))
			$rv['Google_Places_Reference'] = $Google_Places_Reference;
		if(!is_null($Google_Places_Id))
			$rv['Google_Places_Id'] = $Google_Places_Id;
		$rv = $this->__soapCall('SetCafe', array('SetCafe'=>((object)$rv)));
		$rv = (is_null($rv)?new stdClass():$rv->SetCafeResult);
		return $rv;
	}
	public function ListCafe($maxRowsToReturn)
	{
		$rv = array('maxRowsToReturn'=>$maxRowsToReturn);
		$rv = $this->__soapCall('ListCafe', array('ListCafe'=>((object)$rv)));
		$rv = (is_null($rv)?new stdClass():$rv->ListCafeResult);
		if(property_exists($rv, 'returnListCafe'))
			$rv = $rv->returnListCafe;
		if(!is_array($rv))
			$rv = (property_exists($rv, 'ID')?array($rv):array());
		return $rv;
	}
	public function ListCafeByRegion($maxRowsToReturn, $RegionID)
	{
		$rv = array('maxRowsToReturn'=>$maxRowsToReturn, 'RegionID'=>$RegionID);
		$rv = $this->__soapCall('ListCafeByRegion', array('ListCafeByRegion'=>((object)$rv)));
		$rv = (is_null($rv)?new stdClass():$rv->ListCafeByRegionResult);
		if(property_exists($rv, 'returnListCafeByRegion'))
			$rv = $rv->returnListCafeByRegion;
		if(!is_array($rv))
			$rv = (property_exists($rv, 'ID')?array($rv):array());
		return $rv;
	}
	public function ListCafeByGoogle_Places_Id($maxRowsToReturn, $Google_Places_Id)
	{
		$rv = array('maxRowsToReturn'=>$maxRowsToReturn);
		if(!is_null($Google_Places_Id))
			$rv['Google_Places_Id'] = $Google_Places_Id;
		$rv = $this->__soapCall('ListCafeByGoogle_Places_Id', array('ListCafeByGoogle_Places_Id'=>((object)$rv)));
		$rv = (is_null($rv)?new stdClass():$rv->ListCafeByGoogle_Places_IdResult);
		if(property_exists($rv, 'returnListCafeByGoogle_Places_Id'))
			$rv = $rv->returnListCafeByGoogle_Places_Id;
		if(!is_array($rv))
			$rv = (property_exists($rv, 'ID')?array($rv):array());
		return $rv;
	}
	public function ListRatingByUser($maxRowsToReturn, $UserID)
	{
		$rv = array('maxRowsToReturn'=>$maxRowsToReturn, 'UserID'=>$UserID);
		$rv = $this->__soapCall('ListRatingByUser', array('ListRatingByUser'=>((object)$rv)));
		$rv = (is_null($rv)?new stdClass():$rv->ListRatingByUserResult);
		if(property_exists($rv, 'returnListRatingByUser'))
			$rv = $rv->returnListRatingByUser;
		if(!is_array($rv))
			$rv = (property_exists($rv, 'ID')?array($rv):array());
		return $rv;
	}
	public function ListRatingByCafe($maxRowsToReturn, $CafeID)
	{
		$rv = array('maxRowsToReturn'=>$maxRowsToReturn, 'CafeID'=>$CafeID);
		$rv = $this->__soapCall('ListRatingByCafe', array('ListRatingByCafe'=>((object)$rv)));
		$rv = (is_null($rv)?new stdClass():$rv->ListRatingByCafeResult);
		if(property_exists($rv, 'returnListRatingByCafe'))
			$rv = $rv->returnListRatingByCafe;
		if(!is_array($rv))
			$rv = (property_exists($rv, 'ID')?array($rv):array());
		return $rv;
	}
}
