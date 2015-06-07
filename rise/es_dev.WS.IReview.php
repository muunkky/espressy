<?php 
include_once(dirname(__FILE__).'/es_dev.config.php');
include_once(dirname(__FILE__).'/es_dev.DB.IReview.php');
class es_devWSIReview extends SoapServer
{
	public function __construct()
	{
		parent::__construct(dirname(__FILE__).'/es_dev.WSDL.IReview.xml', array('cache_wsdl'=>WSDL_CACHE_NONE));
		$this->setClass(__CLASS__);
	}
	public function NewCafe($NewCafe)
	{
		$ConnectionResource = MySQLi_init();
		$ConnectionResource->options(MYSQLI_INIT_COMMAND, "SET sql_mode = 'ANSI'");
		if(!$ConnectionResource->real_connect(es_dev_Host, es_dev_Username, es_dev_Password, es_dev_Database, es_dev_Port, es_dev_Socket, MYSQLI_CLIENT_FOUND_ROWS))
			throw new Exception('Unable to connect to MySQL: '.$ConnectionResource->connect_error);
		if(!$ConnectionResource->set_charset('utf8'))
			throw new Exception('Error loading character set utf8: '.$ConnectionResource->error);
		$obj = new es_devDBIReview($ConnectionResource);
		$rv = $obj->NewCafe($NewCafe->Name, $NewCafe->Google_Places_Id, $NewCafe->RegionID);
		return (object)array('NewCafeResult'=>$rv);
	}
	public function DeleteCafe($DeleteCafe)
	{
		$ConnectionResource = MySQLi_init();
		$ConnectionResource->options(MYSQLI_INIT_COMMAND, "SET sql_mode = 'ANSI'");
		if(!$ConnectionResource->real_connect(es_dev_Host, es_dev_Username, es_dev_Password, es_dev_Database, es_dev_Port, es_dev_Socket, MYSQLI_CLIENT_FOUND_ROWS))
			throw new Exception('Unable to connect to MySQL: '.$ConnectionResource->connect_error);
		if(!$ConnectionResource->set_charset('utf8'))
			throw new Exception('Error loading character set utf8: '.$ConnectionResource->error);
		$obj = new es_devDBIReview($ConnectionResource);
		$rv = $obj->DeleteCafe($DeleteCafe->ID);
		return (object)array('DeleteCafeResult'=>$rv);
	}
	public function GetCafe($GetCafe)
	{
		$ConnectionResource = MySQLi_init();
		$ConnectionResource->options(MYSQLI_INIT_COMMAND, "SET sql_mode = 'ANSI'");
		if(!$ConnectionResource->real_connect(es_dev_Host, es_dev_Username, es_dev_Password, es_dev_Database, es_dev_Port, es_dev_Socket, MYSQLI_CLIENT_FOUND_ROWS))
			throw new Exception('Unable to connect to MySQL: '.$ConnectionResource->connect_error);
		if(!$ConnectionResource->set_charset('utf8'))
			throw new Exception('Error loading character set utf8: '.$ConnectionResource->error);
		$obj = new es_devDBIReview($ConnectionResource);
		$rv = $obj->GetCafe($GetCafe->ID);
		return (object)array('GetCafeResult'=>$rv);
	}
	public function SetCafe($SetCafe)
	{
		$ConnectionResource = MySQLi_init();
		$ConnectionResource->options(MYSQLI_INIT_COMMAND, "SET sql_mode = 'ANSI'");
		if(!$ConnectionResource->real_connect(es_dev_Host, es_dev_Username, es_dev_Password, es_dev_Database, es_dev_Port, es_dev_Socket, MYSQLI_CLIENT_FOUND_ROWS))
			throw new Exception('Unable to connect to MySQL: '.$ConnectionResource->connect_error);
		if(!$ConnectionResource->set_charset('utf8'))
			throw new Exception('Error loading character set utf8: '.$ConnectionResource->error);
		if(!is_null($SetCafe->Monday_Open))
			$SetCafe->Monday_Open = date_format(new DateTime($SetCafe->Monday_Open, new DateTimeZone('UTC')), 'Y-m-d\\TH:i:s');
		if(!is_null($SetCafe->Monday_Close))
			$SetCafe->Monday_Close = date_format(new DateTime($SetCafe->Monday_Close, new DateTimeZone('UTC')), 'Y-m-d\\TH:i:s');
		if(!is_null($SetCafe->Tuesday_Open))
			$SetCafe->Tuesday_Open = date_format(new DateTime($SetCafe->Tuesday_Open, new DateTimeZone('UTC')), 'Y-m-d\\TH:i:s');
		if(!is_null($SetCafe->Tuesday_Close))
			$SetCafe->Tuesday_Close = date_format(new DateTime($SetCafe->Tuesday_Close, new DateTimeZone('UTC')), 'Y-m-d\\TH:i:s');
		if(!is_null($SetCafe->Wednesday_Open))
			$SetCafe->Wednesday_Open = date_format(new DateTime($SetCafe->Wednesday_Open, new DateTimeZone('UTC')), 'Y-m-d\\TH:i:s');
		if(!is_null($SetCafe->Wednesday_Close))
			$SetCafe->Wednesday_Close = date_format(new DateTime($SetCafe->Wednesday_Close, new DateTimeZone('UTC')), 'Y-m-d\\TH:i:s');
		if(!is_null($SetCafe->Thursday_Open))
			$SetCafe->Thursday_Open = date_format(new DateTime($SetCafe->Thursday_Open, new DateTimeZone('UTC')), 'Y-m-d\\TH:i:s');
		if(!is_null($SetCafe->Thursday_Close))
			$SetCafe->Thursday_Close = date_format(new DateTime($SetCafe->Thursday_Close, new DateTimeZone('UTC')), 'Y-m-d\\TH:i:s');
		if(!is_null($SetCafe->Friday_Open))
			$SetCafe->Friday_Open = date_format(new DateTime($SetCafe->Friday_Open, new DateTimeZone('UTC')), 'Y-m-d\\TH:i:s');
		if(!is_null($SetCafe->Friday_Close))
			$SetCafe->Friday_Close = date_format(new DateTime($SetCafe->Friday_Close, new DateTimeZone('UTC')), 'Y-m-d\\TH:i:s');
		if(!is_null($SetCafe->Saturday_Open))
			$SetCafe->Saturday_Open = date_format(new DateTime($SetCafe->Saturday_Open, new DateTimeZone('UTC')), 'Y-m-d\\TH:i:s');
		if(!is_null($SetCafe->Saturday_Close))
			$SetCafe->Saturday_Close = date_format(new DateTime($SetCafe->Saturday_Close, new DateTimeZone('UTC')), 'Y-m-d\\TH:i:s');
		if(!is_null($SetCafe->Sunday_Open))
			$SetCafe->Sunday_Open = date_format(new DateTime($SetCafe->Sunday_Open, new DateTimeZone('UTC')), 'Y-m-d\\TH:i:s');
		if(!is_null($SetCafe->Sunday_Close))
			$SetCafe->Sunday_Close = date_format(new DateTime($SetCafe->Sunday_Close, new DateTimeZone('UTC')), 'Y-m-d\\TH:i:s');
		$obj = new es_devDBIReview($ConnectionResource);
		$rv = $obj->SetCafe($SetCafe->ID, $SetCafe->Name, $SetCafe->Latitude, $SetCafe->Longitude, $SetCafe->Address, $SetCafe->Google_Places_Reference, $SetCafe->Google_Places_Id, $SetCafe->Star_Rating, $SetCafe->RegionID, $SetCafe->Monday_Open, $SetCafe->Monday_Close, $SetCafe->Tuesday_Open, $SetCafe->Tuesday_Close, $SetCafe->Wednesday_Open, $SetCafe->Wednesday_Close, $SetCafe->Thursday_Open, $SetCafe->Thursday_Close, $SetCafe->Friday_Open, $SetCafe->Friday_Close, $SetCafe->Saturday_Open, $SetCafe->Saturday_Close, $SetCafe->Sunday_Open, $SetCafe->Sunday_Close, $SetCafe->ChainID);
		return (object)array('SetCafeResult'=>$rv);
	}
	public function ListCafe($ListCafe)
	{
		$ConnectionResource = MySQLi_init();
		$ConnectionResource->options(MYSQLI_INIT_COMMAND, "SET sql_mode = 'ANSI'");
		if(!$ConnectionResource->real_connect(es_dev_Host, es_dev_Username, es_dev_Password, es_dev_Database, es_dev_Port, es_dev_Socket, MYSQLI_CLIENT_FOUND_ROWS))
			throw new Exception('Unable to connect to MySQL: '.$ConnectionResource->connect_error);
		if(!$ConnectionResource->set_charset('utf8'))
			throw new Exception('Error loading character set utf8: '.$ConnectionResource->error);
		$obj = new es_devDBIReview($ConnectionResource);
		$rv = $obj->ListCafe($ListCafe->maxRowsToReturn);
		return (object)array('ListCafeResult'=>$rv);
	}
	public function NewDevice($NewDevice)
	{
		$ConnectionResource = MySQLi_init();
		$ConnectionResource->options(MYSQLI_INIT_COMMAND, "SET sql_mode = 'ANSI'");
		if(!$ConnectionResource->real_connect(es_dev_Host, es_dev_Username, es_dev_Password, es_dev_Database, es_dev_Port, es_dev_Socket, MYSQLI_CLIENT_FOUND_ROWS))
			throw new Exception('Unable to connect to MySQL: '.$ConnectionResource->connect_error);
		if(!$ConnectionResource->set_charset('utf8'))
			throw new Exception('Error loading character set utf8: '.$ConnectionResource->error);
		$obj = new es_devDBIReview($ConnectionResource);
		$rv = $obj->NewDevice($NewDevice->UserID);
		return (object)array('NewDeviceResult'=>$rv);
	}
	public function DeleteDevice($DeleteDevice)
	{
		$ConnectionResource = MySQLi_init();
		$ConnectionResource->options(MYSQLI_INIT_COMMAND, "SET sql_mode = 'ANSI'");
		if(!$ConnectionResource->real_connect(es_dev_Host, es_dev_Username, es_dev_Password, es_dev_Database, es_dev_Port, es_dev_Socket, MYSQLI_CLIENT_FOUND_ROWS))
			throw new Exception('Unable to connect to MySQL: '.$ConnectionResource->connect_error);
		if(!$ConnectionResource->set_charset('utf8'))
			throw new Exception('Error loading character set utf8: '.$ConnectionResource->error);
		$obj = new es_devDBIReview($ConnectionResource);
		$rv = $obj->DeleteDevice($DeleteDevice->ID);
		return (object)array('DeleteDeviceResult'=>$rv);
	}
	public function GetDevice($GetDevice)
	{
		$ConnectionResource = MySQLi_init();
		$ConnectionResource->options(MYSQLI_INIT_COMMAND, "SET sql_mode = 'ANSI'");
		if(!$ConnectionResource->real_connect(es_dev_Host, es_dev_Username, es_dev_Password, es_dev_Database, es_dev_Port, es_dev_Socket, MYSQLI_CLIENT_FOUND_ROWS))
			throw new Exception('Unable to connect to MySQL: '.$ConnectionResource->connect_error);
		if(!$ConnectionResource->set_charset('utf8'))
			throw new Exception('Error loading character set utf8: '.$ConnectionResource->error);
		$obj = new es_devDBIReview($ConnectionResource);
		$rv = $obj->GetDevice($GetDevice->ID);
		return (object)array('GetDeviceResult'=>$rv);
	}
	public function SetDevice($SetDevice)
	{
		$ConnectionResource = MySQLi_init();
		$ConnectionResource->options(MYSQLI_INIT_COMMAND, "SET sql_mode = 'ANSI'");
		if(!$ConnectionResource->real_connect(es_dev_Host, es_dev_Username, es_dev_Password, es_dev_Database, es_dev_Port, es_dev_Socket, MYSQLI_CLIENT_FOUND_ROWS))
			throw new Exception('Unable to connect to MySQL: '.$ConnectionResource->connect_error);
		if(!$ConnectionResource->set_charset('utf8'))
			throw new Exception('Error loading character set utf8: '.$ConnectionResource->error);
		$obj = new es_devDBIReview($ConnectionResource);
		$rv = $obj->SetDevice($SetDevice->ID, $SetDevice->Identifier, $SetDevice->UserID);
		return (object)array('SetDeviceResult'=>$rv);
	}
	public function ListDevice($ListDevice)
	{
		$ConnectionResource = MySQLi_init();
		$ConnectionResource->options(MYSQLI_INIT_COMMAND, "SET sql_mode = 'ANSI'");
		if(!$ConnectionResource->real_connect(es_dev_Host, es_dev_Username, es_dev_Password, es_dev_Database, es_dev_Port, es_dev_Socket, MYSQLI_CLIENT_FOUND_ROWS))
			throw new Exception('Unable to connect to MySQL: '.$ConnectionResource->connect_error);
		if(!$ConnectionResource->set_charset('utf8'))
			throw new Exception('Error loading character set utf8: '.$ConnectionResource->error);
		$obj = new es_devDBIReview($ConnectionResource);
		$rv = $obj->ListDevice($ListDevice->maxRowsToReturn);
		return (object)array('ListDeviceResult'=>$rv);
	}
	public function ListDeviceByUser($ListDeviceByUser)
	{
		$ConnectionResource = MySQLi_init();
		$ConnectionResource->options(MYSQLI_INIT_COMMAND, "SET sql_mode = 'ANSI'");
		if(!$ConnectionResource->real_connect(es_dev_Host, es_dev_Username, es_dev_Password, es_dev_Database, es_dev_Port, es_dev_Socket, MYSQLI_CLIENT_FOUND_ROWS))
			throw new Exception('Unable to connect to MySQL: '.$ConnectionResource->connect_error);
		if(!$ConnectionResource->set_charset('utf8'))
			throw new Exception('Error loading character set utf8: '.$ConnectionResource->error);
		$obj = new es_devDBIReview($ConnectionResource);
		$rv = $obj->ListDeviceByUser($ListDeviceByUser->maxRowsToReturn, $ListDeviceByUser->UserID);
		return (object)array('ListDeviceByUserResult'=>$rv);
	}
	public function NewEquipment($NewEquipment)
	{
		$ConnectionResource = MySQLi_init();
		$ConnectionResource->options(MYSQLI_INIT_COMMAND, "SET sql_mode = 'ANSI'");
		if(!$ConnectionResource->real_connect(es_dev_Host, es_dev_Username, es_dev_Password, es_dev_Database, es_dev_Port, es_dev_Socket, MYSQLI_CLIENT_FOUND_ROWS))
			throw new Exception('Unable to connect to MySQL: '.$ConnectionResource->connect_error);
		if(!$ConnectionResource->set_charset('utf8'))
			throw new Exception('Error loading character set utf8: '.$ConnectionResource->error);
		$obj = new es_devDBIReview($ConnectionResource);
		$rv = $obj->NewEquipment($NewEquipment->Equipment_TypeID);
		return (object)array('NewEquipmentResult'=>$rv);
	}
	public function DeleteEquipment($DeleteEquipment)
	{
		$ConnectionResource = MySQLi_init();
		$ConnectionResource->options(MYSQLI_INIT_COMMAND, "SET sql_mode = 'ANSI'");
		if(!$ConnectionResource->real_connect(es_dev_Host, es_dev_Username, es_dev_Password, es_dev_Database, es_dev_Port, es_dev_Socket, MYSQLI_CLIENT_FOUND_ROWS))
			throw new Exception('Unable to connect to MySQL: '.$ConnectionResource->connect_error);
		if(!$ConnectionResource->set_charset('utf8'))
			throw new Exception('Error loading character set utf8: '.$ConnectionResource->error);
		$obj = new es_devDBIReview($ConnectionResource);
		$rv = $obj->DeleteEquipment($DeleteEquipment->ID);
		return (object)array('DeleteEquipmentResult'=>$rv);
	}
	public function GetEquipment($GetEquipment)
	{
		$ConnectionResource = MySQLi_init();
		$ConnectionResource->options(MYSQLI_INIT_COMMAND, "SET sql_mode = 'ANSI'");
		if(!$ConnectionResource->real_connect(es_dev_Host, es_dev_Username, es_dev_Password, es_dev_Database, es_dev_Port, es_dev_Socket, MYSQLI_CLIENT_FOUND_ROWS))
			throw new Exception('Unable to connect to MySQL: '.$ConnectionResource->connect_error);
		if(!$ConnectionResource->set_charset('utf8'))
			throw new Exception('Error loading character set utf8: '.$ConnectionResource->error);
		$obj = new es_devDBIReview($ConnectionResource);
		$rv = $obj->GetEquipment($GetEquipment->ID);
		return (object)array('GetEquipmentResult'=>$rv);
	}
	public function SetEquipment($SetEquipment)
	{
		$ConnectionResource = MySQLi_init();
		$ConnectionResource->options(MYSQLI_INIT_COMMAND, "SET sql_mode = 'ANSI'");
		if(!$ConnectionResource->real_connect(es_dev_Host, es_dev_Username, es_dev_Password, es_dev_Database, es_dev_Port, es_dev_Socket, MYSQLI_CLIENT_FOUND_ROWS))
			throw new Exception('Unable to connect to MySQL: '.$ConnectionResource->connect_error);
		if(!$ConnectionResource->set_charset('utf8'))
			throw new Exception('Error loading character set utf8: '.$ConnectionResource->error);
		$obj = new es_devDBIReview($ConnectionResource);
		$rv = $obj->SetEquipment($SetEquipment->ID, $SetEquipment->Name, $SetEquipment->Equipment_TypeID);
		return (object)array('SetEquipmentResult'=>$rv);
	}
	public function ListEquipment($ListEquipment)
	{
		$ConnectionResource = MySQLi_init();
		$ConnectionResource->options(MYSQLI_INIT_COMMAND, "SET sql_mode = 'ANSI'");
		if(!$ConnectionResource->real_connect(es_dev_Host, es_dev_Username, es_dev_Password, es_dev_Database, es_dev_Port, es_dev_Socket, MYSQLI_CLIENT_FOUND_ROWS))
			throw new Exception('Unable to connect to MySQL: '.$ConnectionResource->connect_error);
		if(!$ConnectionResource->set_charset('utf8'))
			throw new Exception('Error loading character set utf8: '.$ConnectionResource->error);
		$obj = new es_devDBIReview($ConnectionResource);
		$rv = $obj->ListEquipment($ListEquipment->maxRowsToReturn);
		return (object)array('ListEquipmentResult'=>$rv);
	}
	public function ListEquipmentByEquipment_Type($ListEquipmentByEquipment_Type)
	{
		$ConnectionResource = MySQLi_init();
		$ConnectionResource->options(MYSQLI_INIT_COMMAND, "SET sql_mode = 'ANSI'");
		if(!$ConnectionResource->real_connect(es_dev_Host, es_dev_Username, es_dev_Password, es_dev_Database, es_dev_Port, es_dev_Socket, MYSQLI_CLIENT_FOUND_ROWS))
			throw new Exception('Unable to connect to MySQL: '.$ConnectionResource->connect_error);
		if(!$ConnectionResource->set_charset('utf8'))
			throw new Exception('Error loading character set utf8: '.$ConnectionResource->error);
		$obj = new es_devDBIReview($ConnectionResource);
		$rv = $obj->ListEquipmentByEquipment_Type($ListEquipmentByEquipment_Type->maxRowsToReturn, $ListEquipmentByEquipment_Type->Equipment_TypeID);
		return (object)array('ListEquipmentByEquipment_TypeResult'=>$rv);
	}
	public function NewEquipment_Type($NewEquipment_Type)
	{
		$ConnectionResource = MySQLi_init();
		$ConnectionResource->options(MYSQLI_INIT_COMMAND, "SET sql_mode = 'ANSI'");
		if(!$ConnectionResource->real_connect(es_dev_Host, es_dev_Username, es_dev_Password, es_dev_Database, es_dev_Port, es_dev_Socket, MYSQLI_CLIENT_FOUND_ROWS))
			throw new Exception('Unable to connect to MySQL: '.$ConnectionResource->connect_error);
		if(!$ConnectionResource->set_charset('utf8'))
			throw new Exception('Error loading character set utf8: '.$ConnectionResource->error);
		$obj = new es_devDBIReview($ConnectionResource);
		$rv = $obj->NewEquipment_Type();
		return (object)array('NewEquipment_TypeResult'=>$rv);
	}
	public function DeleteEquipment_Type($DeleteEquipment_Type)
	{
		$ConnectionResource = MySQLi_init();
		$ConnectionResource->options(MYSQLI_INIT_COMMAND, "SET sql_mode = 'ANSI'");
		if(!$ConnectionResource->real_connect(es_dev_Host, es_dev_Username, es_dev_Password, es_dev_Database, es_dev_Port, es_dev_Socket, MYSQLI_CLIENT_FOUND_ROWS))
			throw new Exception('Unable to connect to MySQL: '.$ConnectionResource->connect_error);
		if(!$ConnectionResource->set_charset('utf8'))
			throw new Exception('Error loading character set utf8: '.$ConnectionResource->error);
		$obj = new es_devDBIReview($ConnectionResource);
		$rv = $obj->DeleteEquipment_Type($DeleteEquipment_Type->ID);
		return (object)array('DeleteEquipment_TypeResult'=>$rv);
	}
	public function GetEquipment_Type($GetEquipment_Type)
	{
		$ConnectionResource = MySQLi_init();
		$ConnectionResource->options(MYSQLI_INIT_COMMAND, "SET sql_mode = 'ANSI'");
		if(!$ConnectionResource->real_connect(es_dev_Host, es_dev_Username, es_dev_Password, es_dev_Database, es_dev_Port, es_dev_Socket, MYSQLI_CLIENT_FOUND_ROWS))
			throw new Exception('Unable to connect to MySQL: '.$ConnectionResource->connect_error);
		if(!$ConnectionResource->set_charset('utf8'))
			throw new Exception('Error loading character set utf8: '.$ConnectionResource->error);
		$obj = new es_devDBIReview($ConnectionResource);
		$rv = $obj->GetEquipment_Type($GetEquipment_Type->ID);
		return (object)array('GetEquipment_TypeResult'=>$rv);
	}
	public function SetEquipment_Type($SetEquipment_Type)
	{
		$ConnectionResource = MySQLi_init();
		$ConnectionResource->options(MYSQLI_INIT_COMMAND, "SET sql_mode = 'ANSI'");
		if(!$ConnectionResource->real_connect(es_dev_Host, es_dev_Username, es_dev_Password, es_dev_Database, es_dev_Port, es_dev_Socket, MYSQLI_CLIENT_FOUND_ROWS))
			throw new Exception('Unable to connect to MySQL: '.$ConnectionResource->connect_error);
		if(!$ConnectionResource->set_charset('utf8'))
			throw new Exception('Error loading character set utf8: '.$ConnectionResource->error);
		$obj = new es_devDBIReview($ConnectionResource);
		$rv = $obj->SetEquipment_Type($SetEquipment_Type->ID, $SetEquipment_Type->Name);
		return (object)array('SetEquipment_TypeResult'=>$rv);
	}
	public function ListEquipment_Type($ListEquipment_Type)
	{
		$ConnectionResource = MySQLi_init();
		$ConnectionResource->options(MYSQLI_INIT_COMMAND, "SET sql_mode = 'ANSI'");
		if(!$ConnectionResource->real_connect(es_dev_Host, es_dev_Username, es_dev_Password, es_dev_Database, es_dev_Port, es_dev_Socket, MYSQLI_CLIENT_FOUND_ROWS))
			throw new Exception('Unable to connect to MySQL: '.$ConnectionResource->connect_error);
		if(!$ConnectionResource->set_charset('utf8'))
			throw new Exception('Error loading character set utf8: '.$ConnectionResource->error);
		$obj = new es_devDBIReview($ConnectionResource);
		$rv = $obj->ListEquipment_Type($ListEquipment_Type->maxRowsToReturn);
		return (object)array('ListEquipment_TypeResult'=>$rv);
	}
	public function NewReview_Equipment($NewReview_Equipment)
	{
		$ConnectionResource = MySQLi_init();
		$ConnectionResource->options(MYSQLI_INIT_COMMAND, "SET sql_mode = 'ANSI'");
		if(!$ConnectionResource->real_connect(es_dev_Host, es_dev_Username, es_dev_Password, es_dev_Database, es_dev_Port, es_dev_Socket, MYSQLI_CLIENT_FOUND_ROWS))
			throw new Exception('Unable to connect to MySQL: '.$ConnectionResource->connect_error);
		if(!$ConnectionResource->set_charset('utf8'))
			throw new Exception('Error loading character set utf8: '.$ConnectionResource->error);
		$obj = new es_devDBIReview($ConnectionResource);
		$rv = $obj->NewReview_Equipment($NewReview_Equipment->EquipmentID);
		return (object)array('NewReview_EquipmentResult'=>$rv);
	}
	public function DeleteReview_Equipment($DeleteReview_Equipment)
	{
		$ConnectionResource = MySQLi_init();
		$ConnectionResource->options(MYSQLI_INIT_COMMAND, "SET sql_mode = 'ANSI'");
		if(!$ConnectionResource->real_connect(es_dev_Host, es_dev_Username, es_dev_Password, es_dev_Database, es_dev_Port, es_dev_Socket, MYSQLI_CLIENT_FOUND_ROWS))
			throw new Exception('Unable to connect to MySQL: '.$ConnectionResource->connect_error);
		if(!$ConnectionResource->set_charset('utf8'))
			throw new Exception('Error loading character set utf8: '.$ConnectionResource->error);
		$obj = new es_devDBIReview($ConnectionResource);
		$rv = $obj->DeleteReview_Equipment($DeleteReview_Equipment->ID);
		return (object)array('DeleteReview_EquipmentResult'=>$rv);
	}
	public function GetReview_Equipment($GetReview_Equipment)
	{
		$ConnectionResource = MySQLi_init();
		$ConnectionResource->options(MYSQLI_INIT_COMMAND, "SET sql_mode = 'ANSI'");
		if(!$ConnectionResource->real_connect(es_dev_Host, es_dev_Username, es_dev_Password, es_dev_Database, es_dev_Port, es_dev_Socket, MYSQLI_CLIENT_FOUND_ROWS))
			throw new Exception('Unable to connect to MySQL: '.$ConnectionResource->connect_error);
		if(!$ConnectionResource->set_charset('utf8'))
			throw new Exception('Error loading character set utf8: '.$ConnectionResource->error);
		$obj = new es_devDBIReview($ConnectionResource);
		$rv = $obj->GetReview_Equipment($GetReview_Equipment->ID);
		return (object)array('GetReview_EquipmentResult'=>$rv);
	}
	public function SetReview_Equipment($SetReview_Equipment)
	{
		$ConnectionResource = MySQLi_init();
		$ConnectionResource->options(MYSQLI_INIT_COMMAND, "SET sql_mode = 'ANSI'");
		if(!$ConnectionResource->real_connect(es_dev_Host, es_dev_Username, es_dev_Password, es_dev_Database, es_dev_Port, es_dev_Socket, MYSQLI_CLIENT_FOUND_ROWS))
			throw new Exception('Unable to connect to MySQL: '.$ConnectionResource->connect_error);
		if(!$ConnectionResource->set_charset('utf8'))
			throw new Exception('Error loading character set utf8: '.$ConnectionResource->error);
		$obj = new es_devDBIReview($ConnectionResource);
		$rv = $obj->SetReview_Equipment($SetReview_Equipment->ID, $SetReview_Equipment->EquipmentID, $SetReview_Equipment->Name);
		return (object)array('SetReview_EquipmentResult'=>$rv);
	}
	public function ListReview_Equipment($ListReview_Equipment)
	{
		$ConnectionResource = MySQLi_init();
		$ConnectionResource->options(MYSQLI_INIT_COMMAND, "SET sql_mode = 'ANSI'");
		if(!$ConnectionResource->real_connect(es_dev_Host, es_dev_Username, es_dev_Password, es_dev_Database, es_dev_Port, es_dev_Socket, MYSQLI_CLIENT_FOUND_ROWS))
			throw new Exception('Unable to connect to MySQL: '.$ConnectionResource->connect_error);
		if(!$ConnectionResource->set_charset('utf8'))
			throw new Exception('Error loading character set utf8: '.$ConnectionResource->error);
		$obj = new es_devDBIReview($ConnectionResource);
		$rv = $obj->ListReview_Equipment($ListReview_Equipment->maxRowsToReturn);
		return (object)array('ListReview_EquipmentResult'=>$rv);
	}
	public function ListReview_EquipmentByReview($ListReview_EquipmentByReview)
	{
		$ConnectionResource = MySQLi_init();
		$ConnectionResource->options(MYSQLI_INIT_COMMAND, "SET sql_mode = 'ANSI'");
		if(!$ConnectionResource->real_connect(es_dev_Host, es_dev_Username, es_dev_Password, es_dev_Database, es_dev_Port, es_dev_Socket, MYSQLI_CLIENT_FOUND_ROWS))
			throw new Exception('Unable to connect to MySQL: '.$ConnectionResource->connect_error);
		if(!$ConnectionResource->set_charset('utf8'))
			throw new Exception('Error loading character set utf8: '.$ConnectionResource->error);
		$obj = new es_devDBIReview($ConnectionResource);
		$rv = $obj->ListReview_EquipmentByReview($ListReview_EquipmentByReview->maxRowsToReturn);
		return (object)array('ListReview_EquipmentByReviewResult'=>$rv);
	}
	public function ListReview_EquipmentByEquipment($ListReview_EquipmentByEquipment)
	{
		$ConnectionResource = MySQLi_init();
		$ConnectionResource->options(MYSQLI_INIT_COMMAND, "SET sql_mode = 'ANSI'");
		if(!$ConnectionResource->real_connect(es_dev_Host, es_dev_Username, es_dev_Password, es_dev_Database, es_dev_Port, es_dev_Socket, MYSQLI_CLIENT_FOUND_ROWS))
			throw new Exception('Unable to connect to MySQL: '.$ConnectionResource->connect_error);
		if(!$ConnectionResource->set_charset('utf8'))
			throw new Exception('Error loading character set utf8: '.$ConnectionResource->error);
		$obj = new es_devDBIReview($ConnectionResource);
		$rv = $obj->ListReview_EquipmentByEquipment($ListReview_EquipmentByEquipment->maxRowsToReturn, $ListReview_EquipmentByEquipment->EquipmentID);
		return (object)array('ListReview_EquipmentByEquipmentResult'=>$rv);
	}
	public function NewReview_Type($NewReview_Type)
	{
		$ConnectionResource = MySQLi_init();
		$ConnectionResource->options(MYSQLI_INIT_COMMAND, "SET sql_mode = 'ANSI'");
		if(!$ConnectionResource->real_connect(es_dev_Host, es_dev_Username, es_dev_Password, es_dev_Database, es_dev_Port, es_dev_Socket, MYSQLI_CLIENT_FOUND_ROWS))
			throw new Exception('Unable to connect to MySQL: '.$ConnectionResource->connect_error);
		if(!$ConnectionResource->set_charset('utf8'))
			throw new Exception('Error loading character set utf8: '.$ConnectionResource->error);
		$obj = new es_devDBIReview($ConnectionResource);
		$rv = $obj->NewReview_Type();
		return (object)array('NewReview_TypeResult'=>$rv);
	}
	public function DeleteReview_Type($DeleteReview_Type)
	{
		$ConnectionResource = MySQLi_init();
		$ConnectionResource->options(MYSQLI_INIT_COMMAND, "SET sql_mode = 'ANSI'");
		if(!$ConnectionResource->real_connect(es_dev_Host, es_dev_Username, es_dev_Password, es_dev_Database, es_dev_Port, es_dev_Socket, MYSQLI_CLIENT_FOUND_ROWS))
			throw new Exception('Unable to connect to MySQL: '.$ConnectionResource->connect_error);
		if(!$ConnectionResource->set_charset('utf8'))
			throw new Exception('Error loading character set utf8: '.$ConnectionResource->error);
		$obj = new es_devDBIReview($ConnectionResource);
		$rv = $obj->DeleteReview_Type($DeleteReview_Type->ID);
		return (object)array('DeleteReview_TypeResult'=>$rv);
	}
	public function GetReview_Type($GetReview_Type)
	{
		$ConnectionResource = MySQLi_init();
		$ConnectionResource->options(MYSQLI_INIT_COMMAND, "SET sql_mode = 'ANSI'");
		if(!$ConnectionResource->real_connect(es_dev_Host, es_dev_Username, es_dev_Password, es_dev_Database, es_dev_Port, es_dev_Socket, MYSQLI_CLIENT_FOUND_ROWS))
			throw new Exception('Unable to connect to MySQL: '.$ConnectionResource->connect_error);
		if(!$ConnectionResource->set_charset('utf8'))
			throw new Exception('Error loading character set utf8: '.$ConnectionResource->error);
		$obj = new es_devDBIReview($ConnectionResource);
		$rv = $obj->GetReview_Type($GetReview_Type->ID);
		return (object)array('GetReview_TypeResult'=>$rv);
	}
	public function SetReview_Type($SetReview_Type)
	{
		$ConnectionResource = MySQLi_init();
		$ConnectionResource->options(MYSQLI_INIT_COMMAND, "SET sql_mode = 'ANSI'");
		if(!$ConnectionResource->real_connect(es_dev_Host, es_dev_Username, es_dev_Password, es_dev_Database, es_dev_Port, es_dev_Socket, MYSQLI_CLIENT_FOUND_ROWS))
			throw new Exception('Unable to connect to MySQL: '.$ConnectionResource->connect_error);
		if(!$ConnectionResource->set_charset('utf8'))
			throw new Exception('Error loading character set utf8: '.$ConnectionResource->error);
		$obj = new es_devDBIReview($ConnectionResource);
		$rv = $obj->SetReview_Type($SetReview_Type->ID, $SetReview_Type->Name);
		return (object)array('SetReview_TypeResult'=>$rv);
	}
	public function ListReview_Type($ListReview_Type)
	{
		$ConnectionResource = MySQLi_init();
		$ConnectionResource->options(MYSQLI_INIT_COMMAND, "SET sql_mode = 'ANSI'");
		if(!$ConnectionResource->real_connect(es_dev_Host, es_dev_Username, es_dev_Password, es_dev_Database, es_dev_Port, es_dev_Socket, MYSQLI_CLIENT_FOUND_ROWS))
			throw new Exception('Unable to connect to MySQL: '.$ConnectionResource->connect_error);
		if(!$ConnectionResource->set_charset('utf8'))
			throw new Exception('Error loading character set utf8: '.$ConnectionResource->error);
		$obj = new es_devDBIReview($ConnectionResource);
		$rv = $obj->ListReview_Type($ListReview_Type->maxRowsToReturn);
		return (object)array('ListReview_TypeResult'=>$rv);
	}
	public function NewUser($NewUser)
	{
		$ConnectionResource = MySQLi_init();
		$ConnectionResource->options(MYSQLI_INIT_COMMAND, "SET sql_mode = 'ANSI'");
		if(!$ConnectionResource->real_connect(es_dev_Host, es_dev_Username, es_dev_Password, es_dev_Database, es_dev_Port, es_dev_Socket, MYSQLI_CLIENT_FOUND_ROWS))
			throw new Exception('Unable to connect to MySQL: '.$ConnectionResource->connect_error);
		if(!$ConnectionResource->set_charset('utf8'))
			throw new Exception('Error loading character set utf8: '.$ConnectionResource->error);
		$obj = new es_devDBIReview($ConnectionResource);
		$rv = $obj->NewUser($NewUser->Email);
		return (object)array('NewUserResult'=>$rv);
	}
	public function DeleteUser($DeleteUser)
	{
		$ConnectionResource = MySQLi_init();
		$ConnectionResource->options(MYSQLI_INIT_COMMAND, "SET sql_mode = 'ANSI'");
		if(!$ConnectionResource->real_connect(es_dev_Host, es_dev_Username, es_dev_Password, es_dev_Database, es_dev_Port, es_dev_Socket, MYSQLI_CLIENT_FOUND_ROWS))
			throw new Exception('Unable to connect to MySQL: '.$ConnectionResource->connect_error);
		if(!$ConnectionResource->set_charset('utf8'))
			throw new Exception('Error loading character set utf8: '.$ConnectionResource->error);
		$obj = new es_devDBIReview($ConnectionResource);
		$rv = $obj->DeleteUser($DeleteUser->ID);
		return (object)array('DeleteUserResult'=>$rv);
	}
	public function GetUser($GetUser)
	{
		$ConnectionResource = MySQLi_init();
		$ConnectionResource->options(MYSQLI_INIT_COMMAND, "SET sql_mode = 'ANSI'");
		if(!$ConnectionResource->real_connect(es_dev_Host, es_dev_Username, es_dev_Password, es_dev_Database, es_dev_Port, es_dev_Socket, MYSQLI_CLIENT_FOUND_ROWS))
			throw new Exception('Unable to connect to MySQL: '.$ConnectionResource->connect_error);
		if(!$ConnectionResource->set_charset('utf8'))
			throw new Exception('Error loading character set utf8: '.$ConnectionResource->error);
		$obj = new es_devDBIReview($ConnectionResource);
		$rv = $obj->GetUser($GetUser->ID);
		return (object)array('GetUserResult'=>$rv);
	}
	public function SetUser($SetUser)
	{
		$ConnectionResource = MySQLi_init();
		$ConnectionResource->options(MYSQLI_INIT_COMMAND, "SET sql_mode = 'ANSI'");
		if(!$ConnectionResource->real_connect(es_dev_Host, es_dev_Username, es_dev_Password, es_dev_Database, es_dev_Port, es_dev_Socket, MYSQLI_CLIENT_FOUND_ROWS))
			throw new Exception('Unable to connect to MySQL: '.$ConnectionResource->connect_error);
		if(!$ConnectionResource->set_charset('utf8'))
			throw new Exception('Error loading character set utf8: '.$ConnectionResource->error);
		$obj = new es_devDBIReview($ConnectionResource);
		$rv = $obj->SetUser($SetUser->ID, $SetUser->Email, $SetUser->Password_Hash, $SetUser->Salt, $SetUser->Name, $SetUser->Email_Authenticated, $SetUser->Email_Authorization_Nonce);
		return (object)array('SetUserResult'=>$rv);
	}
	public function ListUser($ListUser)
	{
		$ConnectionResource = MySQLi_init();
		$ConnectionResource->options(MYSQLI_INIT_COMMAND, "SET sql_mode = 'ANSI'");
		if(!$ConnectionResource->real_connect(es_dev_Host, es_dev_Username, es_dev_Password, es_dev_Database, es_dev_Port, es_dev_Socket, MYSQLI_CLIENT_FOUND_ROWS))
			throw new Exception('Unable to connect to MySQL: '.$ConnectionResource->connect_error);
		if(!$ConnectionResource->set_charset('utf8'))
			throw new Exception('Error loading character set utf8: '.$ConnectionResource->error);
		$obj = new es_devDBIReview($ConnectionResource);
		$rv = $obj->ListUser($ListUser->maxRowsToReturn);
		return (object)array('ListUserResult'=>$rv);
	}
	public function ListUserByEmail($ListUserByEmail)
	{
		$ConnectionResource = MySQLi_init();
		$ConnectionResource->options(MYSQLI_INIT_COMMAND, "SET sql_mode = 'ANSI'");
		if(!$ConnectionResource->real_connect(es_dev_Host, es_dev_Username, es_dev_Password, es_dev_Database, es_dev_Port, es_dev_Socket, MYSQLI_CLIENT_FOUND_ROWS))
			throw new Exception('Unable to connect to MySQL: '.$ConnectionResource->connect_error);
		if(!$ConnectionResource->set_charset('utf8'))
			throw new Exception('Error loading character set utf8: '.$ConnectionResource->error);
		$obj = new es_devDBIReview($ConnectionResource);
		$rv = $obj->ListUserByEmail($ListUserByEmail->maxRowsToReturn, $ListUserByEmail->Email);
		return (object)array('ListUserByEmailResult'=>$rv);
	}
	public function ListCafeByReference($ListCafeByReference)
	{
		$ConnectionResource = MySQLi_init();
		$ConnectionResource->options(MYSQLI_INIT_COMMAND, "SET sql_mode = 'ANSI'");
		if(!$ConnectionResource->real_connect(es_dev_Host, es_dev_Username, es_dev_Password, es_dev_Database, es_dev_Port, es_dev_Socket, MYSQLI_CLIENT_FOUND_ROWS))
			throw new Exception('Unable to connect to MySQL: '.$ConnectionResource->connect_error);
		if(!$ConnectionResource->set_charset('utf8'))
			throw new Exception('Error loading character set utf8: '.$ConnectionResource->error);
		$obj = new es_devDBIReview($ConnectionResource);
		$rv = $obj->ListCafeByReference($ListCafeByReference->maxRowsToReturn, $ListCafeByReference->reference);
		return (object)array('ListCafeByReferenceResult'=>$rv);
	}
	public function ListEquipmentTypeByName($ListEquipmentTypeByName)
	{
		$ConnectionResource = MySQLi_init();
		$ConnectionResource->options(MYSQLI_INIT_COMMAND, "SET sql_mode = 'ANSI'");
		if(!$ConnectionResource->real_connect(es_dev_Host, es_dev_Username, es_dev_Password, es_dev_Database, es_dev_Port, es_dev_Socket, MYSQLI_CLIENT_FOUND_ROWS))
			throw new Exception('Unable to connect to MySQL: '.$ConnectionResource->connect_error);
		if(!$ConnectionResource->set_charset('utf8'))
			throw new Exception('Error loading character set utf8: '.$ConnectionResource->error);
		$obj = new es_devDBIReview($ConnectionResource);
		$rv = $obj->ListEquipmentTypeByName($ListEquipmentTypeByName->maxRowsToReturn, $ListEquipmentTypeByName->name);
		return (object)array('ListEquipmentTypeByNameResult'=>$rv);
	}
	public function NewBeans($NewBeans)
	{
		$ConnectionResource = MySQLi_init();
		$ConnectionResource->options(MYSQLI_INIT_COMMAND, "SET sql_mode = 'ANSI'");
		if(!$ConnectionResource->real_connect(es_dev_Host, es_dev_Username, es_dev_Password, es_dev_Database, es_dev_Port, es_dev_Socket, MYSQLI_CLIENT_FOUND_ROWS))
			throw new Exception('Unable to connect to MySQL: '.$ConnectionResource->connect_error);
		if(!$ConnectionResource->set_charset('utf8'))
			throw new Exception('Error loading character set utf8: '.$ConnectionResource->error);
		$obj = new es_devDBIReview($ConnectionResource);
		$rv = $obj->NewBeans();
		return (object)array('NewBeansResult'=>$rv);
	}
	public function DeleteBeans($DeleteBeans)
	{
		$ConnectionResource = MySQLi_init();
		$ConnectionResource->options(MYSQLI_INIT_COMMAND, "SET sql_mode = 'ANSI'");
		if(!$ConnectionResource->real_connect(es_dev_Host, es_dev_Username, es_dev_Password, es_dev_Database, es_dev_Port, es_dev_Socket, MYSQLI_CLIENT_FOUND_ROWS))
			throw new Exception('Unable to connect to MySQL: '.$ConnectionResource->connect_error);
		if(!$ConnectionResource->set_charset('utf8'))
			throw new Exception('Error loading character set utf8: '.$ConnectionResource->error);
		$obj = new es_devDBIReview($ConnectionResource);
		$rv = $obj->DeleteBeans($DeleteBeans->ID);
		return (object)array('DeleteBeansResult'=>$rv);
	}
	public function GetBeans($GetBeans)
	{
		$ConnectionResource = MySQLi_init();
		$ConnectionResource->options(MYSQLI_INIT_COMMAND, "SET sql_mode = 'ANSI'");
		if(!$ConnectionResource->real_connect(es_dev_Host, es_dev_Username, es_dev_Password, es_dev_Database, es_dev_Port, es_dev_Socket, MYSQLI_CLIENT_FOUND_ROWS))
			throw new Exception('Unable to connect to MySQL: '.$ConnectionResource->connect_error);
		if(!$ConnectionResource->set_charset('utf8'))
			throw new Exception('Error loading character set utf8: '.$ConnectionResource->error);
		$obj = new es_devDBIReview($ConnectionResource);
		$rv = $obj->GetBeans($GetBeans->ID);
		return (object)array('GetBeansResult'=>$rv);
	}
	public function SetBeans($SetBeans)
	{
		$ConnectionResource = MySQLi_init();
		$ConnectionResource->options(MYSQLI_INIT_COMMAND, "SET sql_mode = 'ANSI'");
		if(!$ConnectionResource->real_connect(es_dev_Host, es_dev_Username, es_dev_Password, es_dev_Database, es_dev_Port, es_dev_Socket, MYSQLI_CLIENT_FOUND_ROWS))
			throw new Exception('Unable to connect to MySQL: '.$ConnectionResource->connect_error);
		if(!$ConnectionResource->set_charset('utf8'))
			throw new Exception('Error loading character set utf8: '.$ConnectionResource->error);
		$obj = new es_devDBIReview($ConnectionResource);
		$rv = $obj->SetBeans($SetBeans->ID, $SetBeans->Name, $SetBeans->GrowerID, $SetBeans->RoasterID);
		return (object)array('SetBeansResult'=>$rv);
	}
	public function ListBeans($ListBeans)
	{
		$ConnectionResource = MySQLi_init();
		$ConnectionResource->options(MYSQLI_INIT_COMMAND, "SET sql_mode = 'ANSI'");
		if(!$ConnectionResource->real_connect(es_dev_Host, es_dev_Username, es_dev_Password, es_dev_Database, es_dev_Port, es_dev_Socket, MYSQLI_CLIENT_FOUND_ROWS))
			throw new Exception('Unable to connect to MySQL: '.$ConnectionResource->connect_error);
		if(!$ConnectionResource->set_charset('utf8'))
			throw new Exception('Error loading character set utf8: '.$ConnectionResource->error);
		$obj = new es_devDBIReview($ConnectionResource);
		$rv = $obj->ListBeans($ListBeans->maxRowsToReturn);
		return (object)array('ListBeansResult'=>$rv);
	}
	public function ListBeansByGrower($ListBeansByGrower)
	{
		$ConnectionResource = MySQLi_init();
		$ConnectionResource->options(MYSQLI_INIT_COMMAND, "SET sql_mode = 'ANSI'");
		if(!$ConnectionResource->real_connect(es_dev_Host, es_dev_Username, es_dev_Password, es_dev_Database, es_dev_Port, es_dev_Socket, MYSQLI_CLIENT_FOUND_ROWS))
			throw new Exception('Unable to connect to MySQL: '.$ConnectionResource->connect_error);
		if(!$ConnectionResource->set_charset('utf8'))
			throw new Exception('Error loading character set utf8: '.$ConnectionResource->error);
		$obj = new es_devDBIReview($ConnectionResource);
		$rv = $obj->ListBeansByGrower($ListBeansByGrower->maxRowsToReturn, $ListBeansByGrower->GrowerID);
		return (object)array('ListBeansByGrowerResult'=>$rv);
	}
	public function ListBeansByRoaster($ListBeansByRoaster)
	{
		$ConnectionResource = MySQLi_init();
		$ConnectionResource->options(MYSQLI_INIT_COMMAND, "SET sql_mode = 'ANSI'");
		if(!$ConnectionResource->real_connect(es_dev_Host, es_dev_Username, es_dev_Password, es_dev_Database, es_dev_Port, es_dev_Socket, MYSQLI_CLIENT_FOUND_ROWS))
			throw new Exception('Unable to connect to MySQL: '.$ConnectionResource->connect_error);
		if(!$ConnectionResource->set_charset('utf8'))
			throw new Exception('Error loading character set utf8: '.$ConnectionResource->error);
		$obj = new es_devDBIReview($ConnectionResource);
		$rv = $obj->ListBeansByRoaster($ListBeansByRoaster->maxRowsToReturn, $ListBeansByRoaster->RoasterID);
		return (object)array('ListBeansByRoasterResult'=>$rv);
	}
	public function ListCafeByGoogle_Places_Id($ListCafeByGoogle_Places_Id)
	{
		$ConnectionResource = MySQLi_init();
		$ConnectionResource->options(MYSQLI_INIT_COMMAND, "SET sql_mode = 'ANSI'");
		if(!$ConnectionResource->real_connect(es_dev_Host, es_dev_Username, es_dev_Password, es_dev_Database, es_dev_Port, es_dev_Socket, MYSQLI_CLIENT_FOUND_ROWS))
			throw new Exception('Unable to connect to MySQL: '.$ConnectionResource->connect_error);
		if(!$ConnectionResource->set_charset('utf8'))
			throw new Exception('Error loading character set utf8: '.$ConnectionResource->error);
		$obj = new es_devDBIReview($ConnectionResource);
		$rv = $obj->ListCafeByGoogle_Places_Id($ListCafeByGoogle_Places_Id->maxRowsToReturn, $ListCafeByGoogle_Places_Id->Google_Places_Id);
		return (object)array('ListCafeByGoogle_Places_IdResult'=>$rv);
	}
	public function NewGrower($NewGrower)
	{
		$ConnectionResource = MySQLi_init();
		$ConnectionResource->options(MYSQLI_INIT_COMMAND, "SET sql_mode = 'ANSI'");
		if(!$ConnectionResource->real_connect(es_dev_Host, es_dev_Username, es_dev_Password, es_dev_Database, es_dev_Port, es_dev_Socket, MYSQLI_CLIENT_FOUND_ROWS))
			throw new Exception('Unable to connect to MySQL: '.$ConnectionResource->connect_error);
		if(!$ConnectionResource->set_charset('utf8'))
			throw new Exception('Error loading character set utf8: '.$ConnectionResource->error);
		$obj = new es_devDBIReview($ConnectionResource);
		$rv = $obj->NewGrower();
		return (object)array('NewGrowerResult'=>$rv);
	}
	public function DeleteGrower($DeleteGrower)
	{
		$ConnectionResource = MySQLi_init();
		$ConnectionResource->options(MYSQLI_INIT_COMMAND, "SET sql_mode = 'ANSI'");
		if(!$ConnectionResource->real_connect(es_dev_Host, es_dev_Username, es_dev_Password, es_dev_Database, es_dev_Port, es_dev_Socket, MYSQLI_CLIENT_FOUND_ROWS))
			throw new Exception('Unable to connect to MySQL: '.$ConnectionResource->connect_error);
		if(!$ConnectionResource->set_charset('utf8'))
			throw new Exception('Error loading character set utf8: '.$ConnectionResource->error);
		$obj = new es_devDBIReview($ConnectionResource);
		$rv = $obj->DeleteGrower($DeleteGrower->ID);
		return (object)array('DeleteGrowerResult'=>$rv);
	}
	public function GetGrower($GetGrower)
	{
		$ConnectionResource = MySQLi_init();
		$ConnectionResource->options(MYSQLI_INIT_COMMAND, "SET sql_mode = 'ANSI'");
		if(!$ConnectionResource->real_connect(es_dev_Host, es_dev_Username, es_dev_Password, es_dev_Database, es_dev_Port, es_dev_Socket, MYSQLI_CLIENT_FOUND_ROWS))
			throw new Exception('Unable to connect to MySQL: '.$ConnectionResource->connect_error);
		if(!$ConnectionResource->set_charset('utf8'))
			throw new Exception('Error loading character set utf8: '.$ConnectionResource->error);
		$obj = new es_devDBIReview($ConnectionResource);
		$rv = $obj->GetGrower($GetGrower->ID);
		return (object)array('GetGrowerResult'=>$rv);
	}
	public function SetGrower($SetGrower)
	{
		$ConnectionResource = MySQLi_init();
		$ConnectionResource->options(MYSQLI_INIT_COMMAND, "SET sql_mode = 'ANSI'");
		if(!$ConnectionResource->real_connect(es_dev_Host, es_dev_Username, es_dev_Password, es_dev_Database, es_dev_Port, es_dev_Socket, MYSQLI_CLIENT_FOUND_ROWS))
			throw new Exception('Unable to connect to MySQL: '.$ConnectionResource->connect_error);
		if(!$ConnectionResource->set_charset('utf8'))
			throw new Exception('Error loading character set utf8: '.$ConnectionResource->error);
		$obj = new es_devDBIReview($ConnectionResource);
		$rv = $obj->SetGrower($SetGrower->ID, $SetGrower->Name, $SetGrower->OriginID);
		return (object)array('SetGrowerResult'=>$rv);
	}
	public function ListGrower($ListGrower)
	{
		$ConnectionResource = MySQLi_init();
		$ConnectionResource->options(MYSQLI_INIT_COMMAND, "SET sql_mode = 'ANSI'");
		if(!$ConnectionResource->real_connect(es_dev_Host, es_dev_Username, es_dev_Password, es_dev_Database, es_dev_Port, es_dev_Socket, MYSQLI_CLIENT_FOUND_ROWS))
			throw new Exception('Unable to connect to MySQL: '.$ConnectionResource->connect_error);
		if(!$ConnectionResource->set_charset('utf8'))
			throw new Exception('Error loading character set utf8: '.$ConnectionResource->error);
		$obj = new es_devDBIReview($ConnectionResource);
		$rv = $obj->ListGrower($ListGrower->maxRowsToReturn);
		return (object)array('ListGrowerResult'=>$rv);
	}
	public function ListGrowerByOrigin($ListGrowerByOrigin)
	{
		$ConnectionResource = MySQLi_init();
		$ConnectionResource->options(MYSQLI_INIT_COMMAND, "SET sql_mode = 'ANSI'");
		if(!$ConnectionResource->real_connect(es_dev_Host, es_dev_Username, es_dev_Password, es_dev_Database, es_dev_Port, es_dev_Socket, MYSQLI_CLIENT_FOUND_ROWS))
			throw new Exception('Unable to connect to MySQL: '.$ConnectionResource->connect_error);
		if(!$ConnectionResource->set_charset('utf8'))
			throw new Exception('Error loading character set utf8: '.$ConnectionResource->error);
		$obj = new es_devDBIReview($ConnectionResource);
		$rv = $obj->ListGrowerByOrigin($ListGrowerByOrigin->maxRowsToReturn, $ListGrowerByOrigin->OriginID);
		return (object)array('ListGrowerByOriginResult'=>$rv);
	}
	public function NewOrigin($NewOrigin)
	{
		$ConnectionResource = MySQLi_init();
		$ConnectionResource->options(MYSQLI_INIT_COMMAND, "SET sql_mode = 'ANSI'");
		if(!$ConnectionResource->real_connect(es_dev_Host, es_dev_Username, es_dev_Password, es_dev_Database, es_dev_Port, es_dev_Socket, MYSQLI_CLIENT_FOUND_ROWS))
			throw new Exception('Unable to connect to MySQL: '.$ConnectionResource->connect_error);
		if(!$ConnectionResource->set_charset('utf8'))
			throw new Exception('Error loading character set utf8: '.$ConnectionResource->error);
		$obj = new es_devDBIReview($ConnectionResource);
		$rv = $obj->NewOrigin();
		return (object)array('NewOriginResult'=>$rv);
	}
	public function DeleteOrigin($DeleteOrigin)
	{
		$ConnectionResource = MySQLi_init();
		$ConnectionResource->options(MYSQLI_INIT_COMMAND, "SET sql_mode = 'ANSI'");
		if(!$ConnectionResource->real_connect(es_dev_Host, es_dev_Username, es_dev_Password, es_dev_Database, es_dev_Port, es_dev_Socket, MYSQLI_CLIENT_FOUND_ROWS))
			throw new Exception('Unable to connect to MySQL: '.$ConnectionResource->connect_error);
		if(!$ConnectionResource->set_charset('utf8'))
			throw new Exception('Error loading character set utf8: '.$ConnectionResource->error);
		$obj = new es_devDBIReview($ConnectionResource);
		$rv = $obj->DeleteOrigin($DeleteOrigin->ID);
		return (object)array('DeleteOriginResult'=>$rv);
	}
	public function GetOrigin($GetOrigin)
	{
		$ConnectionResource = MySQLi_init();
		$ConnectionResource->options(MYSQLI_INIT_COMMAND, "SET sql_mode = 'ANSI'");
		if(!$ConnectionResource->real_connect(es_dev_Host, es_dev_Username, es_dev_Password, es_dev_Database, es_dev_Port, es_dev_Socket, MYSQLI_CLIENT_FOUND_ROWS))
			throw new Exception('Unable to connect to MySQL: '.$ConnectionResource->connect_error);
		if(!$ConnectionResource->set_charset('utf8'))
			throw new Exception('Error loading character set utf8: '.$ConnectionResource->error);
		$obj = new es_devDBIReview($ConnectionResource);
		$rv = $obj->GetOrigin($GetOrigin->ID);
		return (object)array('GetOriginResult'=>$rv);
	}
	public function SetOrigin($SetOrigin)
	{
		$ConnectionResource = MySQLi_init();
		$ConnectionResource->options(MYSQLI_INIT_COMMAND, "SET sql_mode = 'ANSI'");
		if(!$ConnectionResource->real_connect(es_dev_Host, es_dev_Username, es_dev_Password, es_dev_Database, es_dev_Port, es_dev_Socket, MYSQLI_CLIENT_FOUND_ROWS))
			throw new Exception('Unable to connect to MySQL: '.$ConnectionResource->connect_error);
		if(!$ConnectionResource->set_charset('utf8'))
			throw new Exception('Error loading character set utf8: '.$ConnectionResource->error);
		$obj = new es_devDBIReview($ConnectionResource);
		$rv = $obj->SetOrigin($SetOrigin->ID, $SetOrigin->Name);
		return (object)array('SetOriginResult'=>$rv);
	}
	public function ListOrigin($ListOrigin)
	{
		$ConnectionResource = MySQLi_init();
		$ConnectionResource->options(MYSQLI_INIT_COMMAND, "SET sql_mode = 'ANSI'");
		if(!$ConnectionResource->real_connect(es_dev_Host, es_dev_Username, es_dev_Password, es_dev_Database, es_dev_Port, es_dev_Socket, MYSQLI_CLIENT_FOUND_ROWS))
			throw new Exception('Unable to connect to MySQL: '.$ConnectionResource->connect_error);
		if(!$ConnectionResource->set_charset('utf8'))
			throw new Exception('Error loading character set utf8: '.$ConnectionResource->error);
		$obj = new es_devDBIReview($ConnectionResource);
		$rv = $obj->ListOrigin($ListOrigin->maxRowsToReturn);
		return (object)array('ListOriginResult'=>$rv);
	}
	public function NewRoaster($NewRoaster)
	{
		$ConnectionResource = MySQLi_init();
		$ConnectionResource->options(MYSQLI_INIT_COMMAND, "SET sql_mode = 'ANSI'");
		if(!$ConnectionResource->real_connect(es_dev_Host, es_dev_Username, es_dev_Password, es_dev_Database, es_dev_Port, es_dev_Socket, MYSQLI_CLIENT_FOUND_ROWS))
			throw new Exception('Unable to connect to MySQL: '.$ConnectionResource->connect_error);
		if(!$ConnectionResource->set_charset('utf8'))
			throw new Exception('Error loading character set utf8: '.$ConnectionResource->error);
		$obj = new es_devDBIReview($ConnectionResource);
		$rv = $obj->NewRoaster();
		return (object)array('NewRoasterResult'=>$rv);
	}
	public function DeleteRoaster($DeleteRoaster)
	{
		$ConnectionResource = MySQLi_init();
		$ConnectionResource->options(MYSQLI_INIT_COMMAND, "SET sql_mode = 'ANSI'");
		if(!$ConnectionResource->real_connect(es_dev_Host, es_dev_Username, es_dev_Password, es_dev_Database, es_dev_Port, es_dev_Socket, MYSQLI_CLIENT_FOUND_ROWS))
			throw new Exception('Unable to connect to MySQL: '.$ConnectionResource->connect_error);
		if(!$ConnectionResource->set_charset('utf8'))
			throw new Exception('Error loading character set utf8: '.$ConnectionResource->error);
		$obj = new es_devDBIReview($ConnectionResource);
		$rv = $obj->DeleteRoaster($DeleteRoaster->ID);
		return (object)array('DeleteRoasterResult'=>$rv);
	}
	public function GetRoaster($GetRoaster)
	{
		$ConnectionResource = MySQLi_init();
		$ConnectionResource->options(MYSQLI_INIT_COMMAND, "SET sql_mode = 'ANSI'");
		if(!$ConnectionResource->real_connect(es_dev_Host, es_dev_Username, es_dev_Password, es_dev_Database, es_dev_Port, es_dev_Socket, MYSQLI_CLIENT_FOUND_ROWS))
			throw new Exception('Unable to connect to MySQL: '.$ConnectionResource->connect_error);
		if(!$ConnectionResource->set_charset('utf8'))
			throw new Exception('Error loading character set utf8: '.$ConnectionResource->error);
		$obj = new es_devDBIReview($ConnectionResource);
		$rv = $obj->GetRoaster($GetRoaster->ID);
		return (object)array('GetRoasterResult'=>$rv);
	}
	public function SetRoaster($SetRoaster)
	{
		$ConnectionResource = MySQLi_init();
		$ConnectionResource->options(MYSQLI_INIT_COMMAND, "SET sql_mode = 'ANSI'");
		if(!$ConnectionResource->real_connect(es_dev_Host, es_dev_Username, es_dev_Password, es_dev_Database, es_dev_Port, es_dev_Socket, MYSQLI_CLIENT_FOUND_ROWS))
			throw new Exception('Unable to connect to MySQL: '.$ConnectionResource->connect_error);
		if(!$ConnectionResource->set_charset('utf8'))
			throw new Exception('Error loading character set utf8: '.$ConnectionResource->error);
		$obj = new es_devDBIReview($ConnectionResource);
		$rv = $obj->SetRoaster($SetRoaster->ID, $SetRoaster->Name);
		return (object)array('SetRoasterResult'=>$rv);
	}
	public function ListRoaster($ListRoaster)
	{
		$ConnectionResource = MySQLi_init();
		$ConnectionResource->options(MYSQLI_INIT_COMMAND, "SET sql_mode = 'ANSI'");
		if(!$ConnectionResource->real_connect(es_dev_Host, es_dev_Username, es_dev_Password, es_dev_Database, es_dev_Port, es_dev_Socket, MYSQLI_CLIENT_FOUND_ROWS))
			throw new Exception('Unable to connect to MySQL: '.$ConnectionResource->connect_error);
		if(!$ConnectionResource->set_charset('utf8'))
			throw new Exception('Error loading character set utf8: '.$ConnectionResource->error);
		$obj = new es_devDBIReview($ConnectionResource);
		$rv = $obj->ListRoaster($ListRoaster->maxRowsToReturn);
		return (object)array('ListRoasterResult'=>$rv);
	}
	public function ListCafesInRange($ListCafesInRange)
	{
		$ConnectionResource = MySQLi_init();
		$ConnectionResource->options(MYSQLI_INIT_COMMAND, "SET sql_mode = 'ANSI'");
		if(!$ConnectionResource->real_connect(es_dev_Host, es_dev_Username, es_dev_Password, es_dev_Database, es_dev_Port, es_dev_Socket, MYSQLI_CLIENT_FOUND_ROWS))
			throw new Exception('Unable to connect to MySQL: '.$ConnectionResource->connect_error);
		if(!$ConnectionResource->set_charset('utf8'))
			throw new Exception('Error loading character set utf8: '.$ConnectionResource->error);
		$obj = new es_devDBIReview($ConnectionResource);
		$rv = $obj->ListCafesInRange($ListCafesInRange->maxRowsToReturn, $ListCafesInRange->Upper_Latitude, $ListCafesInRange->Upper_Longitude, $ListCafesInRange->Lower_Latitude, $ListCafesInRange->Lower_Longitude);
		return (object)array('ListCafesInRangeResult'=>$rv);
	}
	public function json()
	{
		header('Cache-Control: no-cache');
		header('Expires: -1');
		header('Content-type: application/json');
		$function = ltrim($_SERVER['PATH_INFO'], '/');
		$retval = ($function.'Result');
		$rv = call_user_func(array($this, $function), json_decode(trim(file_get_contents('php://input'))));
		echo json_encode($rv->{$retval});
	}
}
try
{
	if($_SERVER['REQUEST_METHOD']=='POST')
	{
		if(method_exists('es_devInit', 'Start'))
			call_user_func(array('es_devInit', 'Start'));
		$es_devDBIReviewServer = new es_devWSIReview();
		if((array_key_exists('CONTENT_TYPE', $_SERVER)===TRUE)&&(strpos($_SERVER['CONTENT_TYPE'], 'application/json')!==FALSE))
			$es_devDBIReviewServer->json();
		else
			$es_devDBIReviewServer->handle();
	}
	else if (strtoupper($_SERVER['QUERY_STRING'])=='XSL')
	{
		header('Content-Type: text/xml');
		echo('<?xml version="1.0" encoding="utf-8"?><xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:wsdl="http://schemas.xmlsoap.org/wsdl/" xmlns:s="http://www.w3.org/2001/XMLSchema">');
		echo('<xsl:output method="html" indent="yes"/>');
		echo('<xsl:template match="/"><html><body><a href="?WSDL">WSDL</a><br /><xsl:apply-templates select="/wsdl:definitions/wsdl:portType/wsdl:operation"/></body></html></xsl:template>');
		echo('<xsl:template match="wsdl:operation"><xsl:value-of select="@name"/>(<xsl:apply-templates select="/wsdl:definitions/wsdl:types/s:schema/s:element[@name=current()/@name]/s:complexType/s:sequence/s:element"/>)<br/></xsl:template>');
		echo('<xsl:template match="s:element[1]">$<xsl:value-of select="@name"/></xsl:template>');
		echo('<xsl:template match="s:element">, $<xsl:value-of select="@name"/></xsl:template>');
		echo('</xsl:stylesheet>');
	}
	else
	{
		$doc = new DOMDocument('1.0', 'utf-8');
		$doc->load(dirname(__FILE__).'/es_dev.WSDL.IReview.xml');
		foreach ($doc->getElementsByTagName('address') as $address)
			$address->setAttribute('location', ((array_key_exists('HTTPS', $_SERVER)&&($_SERVER['HTTPS']=='on'))?'https':'http').'://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']);
		header('Content-Type: text/xml');
		if(strtoupper($_SERVER['QUERY_STRING'])!='WSDL')
		{
			$root = $doc->getElementsByTagName('definitions');
			$root = $root->item(0);
			$doc->insertBefore($doc->createProcessingInstruction('xml-stylesheet', 'type="text/xsl" href="?XSL"'), $root);
		}
		echo($doc->saveXML());
	}
}
catch(Exception $e)
{
	header($_SERVER['SERVER_PROTOCOL'].' 500');
	throw $e;
}
