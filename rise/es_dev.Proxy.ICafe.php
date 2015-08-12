<?php 
class es_devProxyICafe extends SoapClient
{
	public function __construct($url)
	{
		parent::__construct($url.'?WSDL', array('location'=>$url, 'uri'=>'http://es_dev.WS.ICafe/'));
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
	public function NewRegion()
	{
		$rv = array();
		$rv = $this->__soapCall('NewRegion', array('NewRegion'=>((object)$rv)));
		$rv = (is_null($rv)?new stdClass():$rv->NewRegionResult);
		return $rv;
	}
	public function DeleteRegion($ID)
	{
		$rv = array('ID'=>$ID);
		$rv = $this->__soapCall('DeleteRegion', array('DeleteRegion'=>((object)$rv)));
		$rv = (is_null($rv)?new stdClass():$rv->DeleteRegionResult);
		return $rv;
	}
	public function GetRegion($ID)
	{
		$rv = array('ID'=>$ID);
		$rv = $this->__soapCall('GetRegion', array('GetRegion'=>((object)$rv)));
		$rv = (is_null($rv)?new stdClass():$rv->GetRegionResult);
		return $rv;
	}
	public function SetRegion($ID, $Name, $Center_Latitude, $Center_Longitude)
	{
		$rv = array('ID'=>$ID, 'Center_Latitude'=>$Center_Latitude, 'Center_Longitude'=>$Center_Longitude);
		if(!is_null($Name))
			$rv['Name'] = $Name;
		$rv = $this->__soapCall('SetRegion', array('SetRegion'=>((object)$rv)));
		$rv = (is_null($rv)?new stdClass():$rv->SetRegionResult);
		return $rv;
	}
	public function ListRegion($maxRowsToReturn)
	{
		$rv = array('maxRowsToReturn'=>$maxRowsToReturn);
		$rv = $this->__soapCall('ListRegion', array('ListRegion'=>((object)$rv)));
		$rv = (is_null($rv)?new stdClass():$rv->ListRegionResult);
		if(property_exists($rv, 'returnListRegion'))
			$rv = $rv->returnListRegion;
		if(!is_array($rv))
			$rv = (property_exists($rv, 'ID')?array($rv):array());
		return $rv;
	}
	public function ListCafeByChain($maxRowsToReturn, $ChainID)
	{
		$rv = array('maxRowsToReturn'=>$maxRowsToReturn, 'ChainID'=>$ChainID);
		$rv = $this->__soapCall('ListCafeByChain', array('ListCafeByChain'=>((object)$rv)));
		$rv = (is_null($rv)?new stdClass():$rv->ListCafeByChainResult);
		if(property_exists($rv, 'returnListCafeByChain'))
			$rv = $rv->returnListCafeByChain;
		if(!is_array($rv))
			$rv = (property_exists($rv, 'ID')?array($rv):array());
		return $rv;
	}
	public function NewChain()
	{
		$rv = array();
		$rv = $this->__soapCall('NewChain', array('NewChain'=>((object)$rv)));
		$rv = (is_null($rv)?new stdClass():$rv->NewChainResult);
		return $rv;
	}
	public function DeleteChain($ID)
	{
		$rv = array('ID'=>$ID);
		$rv = $this->__soapCall('DeleteChain', array('DeleteChain'=>((object)$rv)));
		$rv = (is_null($rv)?new stdClass():$rv->DeleteChainResult);
		return $rv;
	}
	public function GetChain($ID)
	{
		$rv = array('ID'=>$ID);
		$rv = $this->__soapCall('GetChain', array('GetChain'=>((object)$rv)));
		$rv = (is_null($rv)?new stdClass():$rv->GetChainResult);
		return $rv;
	}
	public function SetChain($ID, $Name)
	{
		$rv = array('ID'=>$ID);
		if(!is_null($Name))
			$rv['Name'] = $Name;
		$rv = $this->__soapCall('SetChain', array('SetChain'=>((object)$rv)));
		$rv = (is_null($rv)?new stdClass():$rv->SetChainResult);
		return $rv;
	}
	public function ListChain($maxRowsToReturn)
	{
		$rv = array('maxRowsToReturn'=>$maxRowsToReturn);
		$rv = $this->__soapCall('ListChain', array('ListChain'=>((object)$rv)));
		$rv = (is_null($rv)?new stdClass():$rv->ListChainResult);
		if(property_exists($rv, 'returnListChain'))
			$rv = $rv->returnListChain;
		if(!is_array($rv))
			$rv = (property_exists($rv, 'ID')?array($rv):array());
		return $rv;
	}
}
