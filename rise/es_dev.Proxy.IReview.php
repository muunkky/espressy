<?php 
class es_devProxyIReview extends SoapClient
{
	public function __construct($url)
	{
		parent::__construct($url.'?WSDL', array('location'=>$url, 'uri'=>'http://es_dev.WS.IReview/'));
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
	public function SetCafe($ID, $Name, $Latitude, $Longitude, $Address, $Google_Places_Reference, $Google_Places_Id, $Star_Rating, $RegionID, $Monday_Open, $Monday_Close, $Tuesday_Open, $Tuesday_Close, $Wednesday_Open, $Wednesday_Close, $Thursday_Open, $Thursday_Close, $Friday_Open, $Friday_Close, $Saturday_Open, $Saturday_Close, $Sunday_Open, $Sunday_Close, $ChainID)
	{
		$rv = array('ID'=>$ID, 'Latitude'=>$Latitude, 'Longitude'=>$Longitude, 'Star_Rating'=>$Star_Rating, 'RegionID'=>$RegionID, 'Monday_Open'=>$Monday_Open, 'Monday_Close'=>$Monday_Close, 'Tuesday_Open'=>$Tuesday_Open, 'Tuesday_Close'=>$Tuesday_Close, 'Wednesday_Open'=>$Wednesday_Open, 'Wednesday_Close'=>$Wednesday_Close, 'Thursday_Open'=>$Thursday_Open, 'Thursday_Close'=>$Thursday_Close, 'Friday_Open'=>$Friday_Open, 'Friday_Close'=>$Friday_Close, 'Saturday_Open'=>$Saturday_Open, 'Saturday_Close'=>$Saturday_Close, 'Sunday_Open'=>$Sunday_Open, 'Sunday_Close'=>$Sunday_Close, 'ChainID'=>$ChainID);
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
	public function NewDevice($UserID)
	{
		$rv = array('UserID'=>$UserID);
		$rv = $this->__soapCall('NewDevice', array('NewDevice'=>((object)$rv)));
		$rv = (is_null($rv)?new stdClass():$rv->NewDeviceResult);
		return $rv;
	}
	public function DeleteDevice($ID)
	{
		$rv = array('ID'=>$ID);
		$rv = $this->__soapCall('DeleteDevice', array('DeleteDevice'=>((object)$rv)));
		$rv = (is_null($rv)?new stdClass():$rv->DeleteDeviceResult);
		return $rv;
	}
	public function GetDevice($ID)
	{
		$rv = array('ID'=>$ID);
		$rv = $this->__soapCall('GetDevice', array('GetDevice'=>((object)$rv)));
		$rv = (is_null($rv)?new stdClass():$rv->GetDeviceResult);
		return $rv;
	}
	public function SetDevice($ID, $Identifier, $UserID)
	{
		$rv = array('ID'=>$ID, 'UserID'=>$UserID);
		if(!is_null($Identifier))
			$rv['Identifier'] = $Identifier;
		$rv = $this->__soapCall('SetDevice', array('SetDevice'=>((object)$rv)));
		$rv = (is_null($rv)?new stdClass():$rv->SetDeviceResult);
		return $rv;
	}
	public function ListDevice($maxRowsToReturn)
	{
		$rv = array('maxRowsToReturn'=>$maxRowsToReturn);
		$rv = $this->__soapCall('ListDevice', array('ListDevice'=>((object)$rv)));
		$rv = (is_null($rv)?new stdClass():$rv->ListDeviceResult);
		if(property_exists($rv, 'returnListDevice'))
			$rv = $rv->returnListDevice;
		if(!is_array($rv))
			$rv = (property_exists($rv, 'ID')?array($rv):array());
		return $rv;
	}
	public function ListDeviceByUser($maxRowsToReturn, $UserID)
	{
		$rv = array('maxRowsToReturn'=>$maxRowsToReturn, 'UserID'=>$UserID);
		$rv = $this->__soapCall('ListDeviceByUser', array('ListDeviceByUser'=>((object)$rv)));
		$rv = (is_null($rv)?new stdClass():$rv->ListDeviceByUserResult);
		if(property_exists($rv, 'returnListDeviceByUser'))
			$rv = $rv->returnListDeviceByUser;
		if(!is_array($rv))
			$rv = (property_exists($rv, 'ID')?array($rv):array());
		return $rv;
	}
	public function NewEquipment($Equipment_TypeID)
	{
		$rv = array('Equipment_TypeID'=>$Equipment_TypeID);
		$rv = $this->__soapCall('NewEquipment', array('NewEquipment'=>((object)$rv)));
		$rv = (is_null($rv)?new stdClass():$rv->NewEquipmentResult);
		return $rv;
	}
	public function DeleteEquipment($ID)
	{
		$rv = array('ID'=>$ID);
		$rv = $this->__soapCall('DeleteEquipment', array('DeleteEquipment'=>((object)$rv)));
		$rv = (is_null($rv)?new stdClass():$rv->DeleteEquipmentResult);
		return $rv;
	}
	public function GetEquipment($ID)
	{
		$rv = array('ID'=>$ID);
		$rv = $this->__soapCall('GetEquipment', array('GetEquipment'=>((object)$rv)));
		$rv = (is_null($rv)?new stdClass():$rv->GetEquipmentResult);
		return $rv;
	}
	public function SetEquipment($ID, $Name, $Equipment_TypeID)
	{
		$rv = array('ID'=>$ID, 'Equipment_TypeID'=>$Equipment_TypeID);
		if(!is_null($Name))
			$rv['Name'] = $Name;
		$rv = $this->__soapCall('SetEquipment', array('SetEquipment'=>((object)$rv)));
		$rv = (is_null($rv)?new stdClass():$rv->SetEquipmentResult);
		return $rv;
	}
	public function ListEquipment($maxRowsToReturn)
	{
		$rv = array('maxRowsToReturn'=>$maxRowsToReturn);
		$rv = $this->__soapCall('ListEquipment', array('ListEquipment'=>((object)$rv)));
		$rv = (is_null($rv)?new stdClass():$rv->ListEquipmentResult);
		if(property_exists($rv, 'returnListEquipment'))
			$rv = $rv->returnListEquipment;
		if(!is_array($rv))
			$rv = (property_exists($rv, 'ID')?array($rv):array());
		return $rv;
	}
	public function ListEquipmentByEquipment_Type($maxRowsToReturn, $Equipment_TypeID)
	{
		$rv = array('maxRowsToReturn'=>$maxRowsToReturn, 'Equipment_TypeID'=>$Equipment_TypeID);
		$rv = $this->__soapCall('ListEquipmentByEquipment_Type', array('ListEquipmentByEquipment_Type'=>((object)$rv)));
		$rv = (is_null($rv)?new stdClass():$rv->ListEquipmentByEquipment_TypeResult);
		if(property_exists($rv, 'returnListEquipmentByEquipment_Type'))
			$rv = $rv->returnListEquipmentByEquipment_Type;
		if(!is_array($rv))
			$rv = (property_exists($rv, 'ID')?array($rv):array());
		return $rv;
	}
	public function NewEquipment_Type()
	{
		$rv = array();
		$rv = $this->__soapCall('NewEquipment_Type', array('NewEquipment_Type'=>((object)$rv)));
		$rv = (is_null($rv)?new stdClass():$rv->NewEquipment_TypeResult);
		return $rv;
	}
	public function DeleteEquipment_Type($ID)
	{
		$rv = array('ID'=>$ID);
		$rv = $this->__soapCall('DeleteEquipment_Type', array('DeleteEquipment_Type'=>((object)$rv)));
		$rv = (is_null($rv)?new stdClass():$rv->DeleteEquipment_TypeResult);
		return $rv;
	}
	public function GetEquipment_Type($ID)
	{
		$rv = array('ID'=>$ID);
		$rv = $this->__soapCall('GetEquipment_Type', array('GetEquipment_Type'=>((object)$rv)));
		$rv = (is_null($rv)?new stdClass():$rv->GetEquipment_TypeResult);
		return $rv;
	}
	public function SetEquipment_Type($ID, $Name)
	{
		$rv = array('ID'=>$ID);
		if(!is_null($Name))
			$rv['Name'] = $Name;
		$rv = $this->__soapCall('SetEquipment_Type', array('SetEquipment_Type'=>((object)$rv)));
		$rv = (is_null($rv)?new stdClass():$rv->SetEquipment_TypeResult);
		return $rv;
	}
	public function ListEquipment_Type($maxRowsToReturn)
	{
		$rv = array('maxRowsToReturn'=>$maxRowsToReturn);
		$rv = $this->__soapCall('ListEquipment_Type', array('ListEquipment_Type'=>((object)$rv)));
		$rv = (is_null($rv)?new stdClass():$rv->ListEquipment_TypeResult);
		if(property_exists($rv, 'returnListEquipment_Type'))
			$rv = $rv->returnListEquipment_Type;
		if(!is_array($rv))
			$rv = (property_exists($rv, 'ID')?array($rv):array());
		return $rv;
	}
	public function NewReview_Equipment($EquipmentID)
	{
		$rv = array('EquipmentID'=>$EquipmentID);
		$rv = $this->__soapCall('NewReview_Equipment', array('NewReview_Equipment'=>((object)$rv)));
		$rv = (is_null($rv)?new stdClass():$rv->NewReview_EquipmentResult);
		return $rv;
	}
	public function DeleteReview_Equipment($ID)
	{
		$rv = array('ID'=>$ID);
		$rv = $this->__soapCall('DeleteReview_Equipment', array('DeleteReview_Equipment'=>((object)$rv)));
		$rv = (is_null($rv)?new stdClass():$rv->DeleteReview_EquipmentResult);
		return $rv;
	}
	public function GetReview_Equipment($ID)
	{
		$rv = array('ID'=>$ID);
		$rv = $this->__soapCall('GetReview_Equipment', array('GetReview_Equipment'=>((object)$rv)));
		$rv = (is_null($rv)?new stdClass():$rv->GetReview_EquipmentResult);
		return $rv;
	}
	public function SetReview_Equipment($ID, $EquipmentID, $Name)
	{
		$rv = array('ID'=>$ID, 'EquipmentID'=>$EquipmentID);
		if(!is_null($Name))
			$rv['Name'] = $Name;
		$rv = $this->__soapCall('SetReview_Equipment', array('SetReview_Equipment'=>((object)$rv)));
		$rv = (is_null($rv)?new stdClass():$rv->SetReview_EquipmentResult);
		return $rv;
	}
	public function ListReview_Equipment($maxRowsToReturn)
	{
		$rv = array('maxRowsToReturn'=>$maxRowsToReturn);
		$rv = $this->__soapCall('ListReview_Equipment', array('ListReview_Equipment'=>((object)$rv)));
		$rv = (is_null($rv)?new stdClass():$rv->ListReview_EquipmentResult);
		if(property_exists($rv, 'returnListReview_Equipment'))
			$rv = $rv->returnListReview_Equipment;
		if(!is_array($rv))
			$rv = (property_exists($rv, 'ID')?array($rv):array());
		return $rv;
	}
	public function ListReview_EquipmentByReview($maxRowsToReturn)
	{
		$rv = array('maxRowsToReturn'=>$maxRowsToReturn);
		$rv = $this->__soapCall('ListReview_EquipmentByReview', array('ListReview_EquipmentByReview'=>((object)$rv)));
		$rv = (is_null($rv)?new stdClass():$rv->ListReview_EquipmentByReviewResult);
		if(property_exists($rv, 'returnListReview_EquipmentByReview'))
			$rv = $rv->returnListReview_EquipmentByReview;
		if(!is_array($rv))
			$rv = (property_exists($rv, 'ID')?array($rv):array());
		return $rv;
	}
	public function ListReview_EquipmentByEquipment($maxRowsToReturn, $EquipmentID)
	{
		$rv = array('maxRowsToReturn'=>$maxRowsToReturn, 'EquipmentID'=>$EquipmentID);
		$rv = $this->__soapCall('ListReview_EquipmentByEquipment', array('ListReview_EquipmentByEquipment'=>((object)$rv)));
		$rv = (is_null($rv)?new stdClass():$rv->ListReview_EquipmentByEquipmentResult);
		if(property_exists($rv, 'returnListReview_EquipmentByEquipment'))
			$rv = $rv->returnListReview_EquipmentByEquipment;
		if(!is_array($rv))
			$rv = (property_exists($rv, 'ID')?array($rv):array());
		return $rv;
	}
	public function NewReview_Type()
	{
		$rv = array();
		$rv = $this->__soapCall('NewReview_Type', array('NewReview_Type'=>((object)$rv)));
		$rv = (is_null($rv)?new stdClass():$rv->NewReview_TypeResult);
		return $rv;
	}
	public function DeleteReview_Type($ID)
	{
		$rv = array('ID'=>$ID);
		$rv = $this->__soapCall('DeleteReview_Type', array('DeleteReview_Type'=>((object)$rv)));
		$rv = (is_null($rv)?new stdClass():$rv->DeleteReview_TypeResult);
		return $rv;
	}
	public function GetReview_Type($ID)
	{
		$rv = array('ID'=>$ID);
		$rv = $this->__soapCall('GetReview_Type', array('GetReview_Type'=>((object)$rv)));
		$rv = (is_null($rv)?new stdClass():$rv->GetReview_TypeResult);
		return $rv;
	}
	public function SetReview_Type($ID, $Name)
	{
		$rv = array('ID'=>$ID);
		if(!is_null($Name))
			$rv['Name'] = $Name;
		$rv = $this->__soapCall('SetReview_Type', array('SetReview_Type'=>((object)$rv)));
		$rv = (is_null($rv)?new stdClass():$rv->SetReview_TypeResult);
		return $rv;
	}
	public function ListReview_Type($maxRowsToReturn)
	{
		$rv = array('maxRowsToReturn'=>$maxRowsToReturn);
		$rv = $this->__soapCall('ListReview_Type', array('ListReview_Type'=>((object)$rv)));
		$rv = (is_null($rv)?new stdClass():$rv->ListReview_TypeResult);
		if(property_exists($rv, 'returnListReview_Type'))
			$rv = $rv->returnListReview_Type;
		if(!is_array($rv))
			$rv = (property_exists($rv, 'ID')?array($rv):array());
		return $rv;
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
	public function ListCafeByReference($maxRowsToReturn, $reference)
	{
		$rv = array('maxRowsToReturn'=>$maxRowsToReturn);
		if(!is_null($reference))
			$rv['reference'] = $reference;
		$rv = $this->__soapCall('ListCafeByReference', array('ListCafeByReference'=>((object)$rv)));
		$rv = (is_null($rv)?new stdClass():$rv->ListCafeByReferenceResult);
		if(property_exists($rv, 'returnListCafeByReference'))
			$rv = $rv->returnListCafeByReference;
		if(!is_array($rv))
			$rv = (property_exists($rv, 'ID')?array($rv):array());
		return $rv;
	}
	public function ListEquipmentTypeByName($maxRowsToReturn, $name)
	{
		$rv = array('maxRowsToReturn'=>$maxRowsToReturn);
		if(!is_null($name))
			$rv['name'] = $name;
		$rv = $this->__soapCall('ListEquipmentTypeByName', array('ListEquipmentTypeByName'=>((object)$rv)));
		$rv = (is_null($rv)?new stdClass():$rv->ListEquipmentTypeByNameResult);
		if(property_exists($rv, 'returnListEquipmentTypeByName'))
			$rv = $rv->returnListEquipmentTypeByName;
		if(!is_array($rv))
			$rv = (property_exists($rv, 'ID')?array($rv):array());
		return $rv;
	}
	public function NewBeans()
	{
		$rv = array();
		$rv = $this->__soapCall('NewBeans', array('NewBeans'=>((object)$rv)));
		$rv = (is_null($rv)?new stdClass():$rv->NewBeansResult);
		return $rv;
	}
	public function DeleteBeans($ID)
	{
		$rv = array('ID'=>$ID);
		$rv = $this->__soapCall('DeleteBeans', array('DeleteBeans'=>((object)$rv)));
		$rv = (is_null($rv)?new stdClass():$rv->DeleteBeansResult);
		return $rv;
	}
	public function GetBeans($ID)
	{
		$rv = array('ID'=>$ID);
		$rv = $this->__soapCall('GetBeans', array('GetBeans'=>((object)$rv)));
		$rv = (is_null($rv)?new stdClass():$rv->GetBeansResult);
		return $rv;
	}
	public function SetBeans($ID, $Name, $GrowerID, $RoasterID)
	{
		$rv = array('ID'=>$ID, 'GrowerID'=>$GrowerID, 'RoasterID'=>$RoasterID);
		if(!is_null($Name))
			$rv['Name'] = $Name;
		$rv = $this->__soapCall('SetBeans', array('SetBeans'=>((object)$rv)));
		$rv = (is_null($rv)?new stdClass():$rv->SetBeansResult);
		return $rv;
	}
	public function ListBeans($maxRowsToReturn)
	{
		$rv = array('maxRowsToReturn'=>$maxRowsToReturn);
		$rv = $this->__soapCall('ListBeans', array('ListBeans'=>((object)$rv)));
		$rv = (is_null($rv)?new stdClass():$rv->ListBeansResult);
		if(property_exists($rv, 'returnListBeans'))
			$rv = $rv->returnListBeans;
		if(!is_array($rv))
			$rv = (property_exists($rv, 'ID')?array($rv):array());
		return $rv;
	}
	public function ListBeansByGrower($maxRowsToReturn, $GrowerID)
	{
		$rv = array('maxRowsToReturn'=>$maxRowsToReturn, 'GrowerID'=>$GrowerID);
		$rv = $this->__soapCall('ListBeansByGrower', array('ListBeansByGrower'=>((object)$rv)));
		$rv = (is_null($rv)?new stdClass():$rv->ListBeansByGrowerResult);
		if(property_exists($rv, 'returnListBeansByGrower'))
			$rv = $rv->returnListBeansByGrower;
		if(!is_array($rv))
			$rv = (property_exists($rv, 'ID')?array($rv):array());
		return $rv;
	}
	public function ListBeansByRoaster($maxRowsToReturn, $RoasterID)
	{
		$rv = array('maxRowsToReturn'=>$maxRowsToReturn, 'RoasterID'=>$RoasterID);
		$rv = $this->__soapCall('ListBeansByRoaster', array('ListBeansByRoaster'=>((object)$rv)));
		$rv = (is_null($rv)?new stdClass():$rv->ListBeansByRoasterResult);
		if(property_exists($rv, 'returnListBeansByRoaster'))
			$rv = $rv->returnListBeansByRoaster;
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
	public function NewGrower()
	{
		$rv = array();
		$rv = $this->__soapCall('NewGrower', array('NewGrower'=>((object)$rv)));
		$rv = (is_null($rv)?new stdClass():$rv->NewGrowerResult);
		return $rv;
	}
	public function DeleteGrower($ID)
	{
		$rv = array('ID'=>$ID);
		$rv = $this->__soapCall('DeleteGrower', array('DeleteGrower'=>((object)$rv)));
		$rv = (is_null($rv)?new stdClass():$rv->DeleteGrowerResult);
		return $rv;
	}
	public function GetGrower($ID)
	{
		$rv = array('ID'=>$ID);
		$rv = $this->__soapCall('GetGrower', array('GetGrower'=>((object)$rv)));
		$rv = (is_null($rv)?new stdClass():$rv->GetGrowerResult);
		return $rv;
	}
	public function SetGrower($ID, $Name, $OriginID)
	{
		$rv = array('ID'=>$ID, 'OriginID'=>$OriginID);
		if(!is_null($Name))
			$rv['Name'] = $Name;
		$rv = $this->__soapCall('SetGrower', array('SetGrower'=>((object)$rv)));
		$rv = (is_null($rv)?new stdClass():$rv->SetGrowerResult);
		return $rv;
	}
	public function ListGrower($maxRowsToReturn)
	{
		$rv = array('maxRowsToReturn'=>$maxRowsToReturn);
		$rv = $this->__soapCall('ListGrower', array('ListGrower'=>((object)$rv)));
		$rv = (is_null($rv)?new stdClass():$rv->ListGrowerResult);
		if(property_exists($rv, 'returnListGrower'))
			$rv = $rv->returnListGrower;
		if(!is_array($rv))
			$rv = (property_exists($rv, 'ID')?array($rv):array());
		return $rv;
	}
	public function ListGrowerByOrigin($maxRowsToReturn, $OriginID)
	{
		$rv = array('maxRowsToReturn'=>$maxRowsToReturn, 'OriginID'=>$OriginID);
		$rv = $this->__soapCall('ListGrowerByOrigin', array('ListGrowerByOrigin'=>((object)$rv)));
		$rv = (is_null($rv)?new stdClass():$rv->ListGrowerByOriginResult);
		if(property_exists($rv, 'returnListGrowerByOrigin'))
			$rv = $rv->returnListGrowerByOrigin;
		if(!is_array($rv))
			$rv = (property_exists($rv, 'ID')?array($rv):array());
		return $rv;
	}
	public function NewOrigin()
	{
		$rv = array();
		$rv = $this->__soapCall('NewOrigin', array('NewOrigin'=>((object)$rv)));
		$rv = (is_null($rv)?new stdClass():$rv->NewOriginResult);
		return $rv;
	}
	public function DeleteOrigin($ID)
	{
		$rv = array('ID'=>$ID);
		$rv = $this->__soapCall('DeleteOrigin', array('DeleteOrigin'=>((object)$rv)));
		$rv = (is_null($rv)?new stdClass():$rv->DeleteOriginResult);
		return $rv;
	}
	public function GetOrigin($ID)
	{
		$rv = array('ID'=>$ID);
		$rv = $this->__soapCall('GetOrigin', array('GetOrigin'=>((object)$rv)));
		$rv = (is_null($rv)?new stdClass():$rv->GetOriginResult);
		return $rv;
	}
	public function SetOrigin($ID, $Name)
	{
		$rv = array('ID'=>$ID);
		if(!is_null($Name))
			$rv['Name'] = $Name;
		$rv = $this->__soapCall('SetOrigin', array('SetOrigin'=>((object)$rv)));
		$rv = (is_null($rv)?new stdClass():$rv->SetOriginResult);
		return $rv;
	}
	public function ListOrigin($maxRowsToReturn)
	{
		$rv = array('maxRowsToReturn'=>$maxRowsToReturn);
		$rv = $this->__soapCall('ListOrigin', array('ListOrigin'=>((object)$rv)));
		$rv = (is_null($rv)?new stdClass():$rv->ListOriginResult);
		if(property_exists($rv, 'returnListOrigin'))
			$rv = $rv->returnListOrigin;
		if(!is_array($rv))
			$rv = (property_exists($rv, 'ID')?array($rv):array());
		return $rv;
	}
	public function NewRoaster()
	{
		$rv = array();
		$rv = $this->__soapCall('NewRoaster', array('NewRoaster'=>((object)$rv)));
		$rv = (is_null($rv)?new stdClass():$rv->NewRoasterResult);
		return $rv;
	}
	public function DeleteRoaster($ID)
	{
		$rv = array('ID'=>$ID);
		$rv = $this->__soapCall('DeleteRoaster', array('DeleteRoaster'=>((object)$rv)));
		$rv = (is_null($rv)?new stdClass():$rv->DeleteRoasterResult);
		return $rv;
	}
	public function GetRoaster($ID)
	{
		$rv = array('ID'=>$ID);
		$rv = $this->__soapCall('GetRoaster', array('GetRoaster'=>((object)$rv)));
		$rv = (is_null($rv)?new stdClass():$rv->GetRoasterResult);
		return $rv;
	}
	public function SetRoaster($ID, $Name)
	{
		$rv = array('ID'=>$ID);
		if(!is_null($Name))
			$rv['Name'] = $Name;
		$rv = $this->__soapCall('SetRoaster', array('SetRoaster'=>((object)$rv)));
		$rv = (is_null($rv)?new stdClass():$rv->SetRoasterResult);
		return $rv;
	}
	public function ListRoaster($maxRowsToReturn)
	{
		$rv = array('maxRowsToReturn'=>$maxRowsToReturn);
		$rv = $this->__soapCall('ListRoaster', array('ListRoaster'=>((object)$rv)));
		$rv = (is_null($rv)?new stdClass():$rv->ListRoasterResult);
		if(property_exists($rv, 'returnListRoaster'))
			$rv = $rv->returnListRoaster;
		if(!is_array($rv))
			$rv = (property_exists($rv, 'ID')?array($rv):array());
		return $rv;
	}
	public function ListCafesInRange($maxRowsToReturn, $Upper_Latitude, $Upper_Longitude, $Lower_Latitude, $Lower_Longitude)
	{
		$rv = array('maxRowsToReturn'=>$maxRowsToReturn, 'Upper_Latitude'=>$Upper_Latitude, 'Upper_Longitude'=>$Upper_Longitude, 'Lower_Latitude'=>$Lower_Latitude, 'Lower_Longitude'=>$Lower_Longitude);
		$rv = $this->__soapCall('ListCafesInRange', array('ListCafesInRange'=>((object)$rv)));
		$rv = (is_null($rv)?new stdClass():$rv->ListCafesInRangeResult);
		if(property_exists($rv, 'returnListCafesInRange'))
			$rv = $rv->returnListCafesInRange;
		if(!is_array($rv))
			$rv = (property_exists($rv, 'ID')?array($rv):array());
		return $rv;
	}
}
