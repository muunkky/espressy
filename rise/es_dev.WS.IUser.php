<?php 
include_once(dirname(__FILE__).'/es_dev.config.php');
include_once(dirname(__FILE__).'/es_dev.DB.IUser.php');
class es_devWSIUser extends SoapServer
{
	public function __construct()
	{
		parent::__construct(dirname(__FILE__).'/es_dev.WSDL.IUser.xml', array('cache_wsdl'=>WSDL_CACHE_NONE));
		$this->setClass(__CLASS__);
	}
	public function NewUser($NewUser)
	{
		$ConnectionResource = MySQLi_init();
		$ConnectionResource->options(MYSQLI_INIT_COMMAND, "SET sql_mode = 'ANSI'");
		if(!$ConnectionResource->real_connect(es_dev_Host, es_dev_Username, es_dev_Password, es_dev_Database, es_dev_Port, es_dev_Socket, MYSQLI_CLIENT_FOUND_ROWS))
			throw new Exception('Unable to connect to MySQL: '.$ConnectionResource->connect_error);
		if(!$ConnectionResource->set_charset('utf8'))
			throw new Exception('Error loading character set utf8: '.$ConnectionResource->error);
		$obj = new es_devDBIUser($ConnectionResource);
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
		$obj = new es_devDBIUser($ConnectionResource);
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
		$obj = new es_devDBIUser($ConnectionResource);
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
		$obj = new es_devDBIUser($ConnectionResource);
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
		$obj = new es_devDBIUser($ConnectionResource);
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
		$obj = new es_devDBIUser($ConnectionResource);
		$rv = $obj->ListUserByEmail($ListUserByEmail->maxRowsToReturn, $ListUserByEmail->Email);
		return (object)array('ListUserByEmailResult'=>$rv);
	}
	public function SignupUser($SignupUser)
	{
		$ConnectionResource = MySQLi_init();
		$ConnectionResource->options(MYSQLI_INIT_COMMAND, "SET sql_mode = 'ANSI'");
		if(!$ConnectionResource->real_connect(es_dev_Host, es_dev_Username, es_dev_Password, es_dev_Database, es_dev_Port, es_dev_Socket, MYSQLI_CLIENT_FOUND_ROWS))
			throw new Exception('Unable to connect to MySQL: '.$ConnectionResource->connect_error);
		if(!$ConnectionResource->set_charset('utf8'))
			throw new Exception('Error loading character set utf8: '.$ConnectionResource->error);
		$obj = new es_devDBIUser($ConnectionResource);
		$rv = $obj->SignupUser($SignupUser->Email, $SignupUser->Password_Hash, $SignupUser->Salt, $SignupUser->Name, $SignupUser->Email_Authenticated, $SignupUser->Email_Authorization_Nonce);
		return (object)array('SignupUserResult'=>$rv);
	}
	public function NewRating($NewRating)
	{
		$ConnectionResource = MySQLi_init();
		$ConnectionResource->options(MYSQLI_INIT_COMMAND, "SET sql_mode = 'ANSI'");
		if(!$ConnectionResource->real_connect(es_dev_Host, es_dev_Username, es_dev_Password, es_dev_Database, es_dev_Port, es_dev_Socket, MYSQLI_CLIENT_FOUND_ROWS))
			throw new Exception('Unable to connect to MySQL: '.$ConnectionResource->connect_error);
		if(!$ConnectionResource->set_charset('utf8'))
			throw new Exception('Error loading character set utf8: '.$ConnectionResource->error);
		$obj = new es_devDBIUser($ConnectionResource);
		$rv = $obj->NewRating($NewRating->UserID, $NewRating->CafeID);
		return (object)array('NewRatingResult'=>$rv);
	}
	public function DeleteRating($DeleteRating)
	{
		$ConnectionResource = MySQLi_init();
		$ConnectionResource->options(MYSQLI_INIT_COMMAND, "SET sql_mode = 'ANSI'");
		if(!$ConnectionResource->real_connect(es_dev_Host, es_dev_Username, es_dev_Password, es_dev_Database, es_dev_Port, es_dev_Socket, MYSQLI_CLIENT_FOUND_ROWS))
			throw new Exception('Unable to connect to MySQL: '.$ConnectionResource->connect_error);
		if(!$ConnectionResource->set_charset('utf8'))
			throw new Exception('Error loading character set utf8: '.$ConnectionResource->error);
		$obj = new es_devDBIUser($ConnectionResource);
		$rv = $obj->DeleteRating($DeleteRating->ID);
		return (object)array('DeleteRatingResult'=>$rv);
	}
	public function GetRating($GetRating)
	{
		$ConnectionResource = MySQLi_init();
		$ConnectionResource->options(MYSQLI_INIT_COMMAND, "SET sql_mode = 'ANSI'");
		if(!$ConnectionResource->real_connect(es_dev_Host, es_dev_Username, es_dev_Password, es_dev_Database, es_dev_Port, es_dev_Socket, MYSQLI_CLIENT_FOUND_ROWS))
			throw new Exception('Unable to connect to MySQL: '.$ConnectionResource->connect_error);
		if(!$ConnectionResource->set_charset('utf8'))
			throw new Exception('Error loading character set utf8: '.$ConnectionResource->error);
		$obj = new es_devDBIUser($ConnectionResource);
		$rv = $obj->GetRating($GetRating->ID);
		return (object)array('GetRatingResult'=>$rv);
	}
	public function SetRating($SetRating)
	{
		$ConnectionResource = MySQLi_init();
		$ConnectionResource->options(MYSQLI_INIT_COMMAND, "SET sql_mode = 'ANSI'");
		if(!$ConnectionResource->real_connect(es_dev_Host, es_dev_Username, es_dev_Password, es_dev_Database, es_dev_Port, es_dev_Socket, MYSQLI_CLIENT_FOUND_ROWS))
			throw new Exception('Unable to connect to MySQL: '.$ConnectionResource->connect_error);
		if(!$ConnectionResource->set_charset('utf8'))
			throw new Exception('Error loading character set utf8: '.$ConnectionResource->error);
		if(!is_null($SetRating->Date))
			$SetRating->Date = date_format(new DateTime($SetRating->Date, new DateTimeZone('UTC')), 'Y-m-d\\TH:i:s');
		$obj = new es_devDBIUser($ConnectionResource);
		$rv = $obj->SetRating($SetRating->ID, $SetRating->Rating, $SetRating->Comments, $SetRating->Date, $SetRating->UserID, $SetRating->CafeID, $SetRating->Expired);
		return (object)array('SetRatingResult'=>$rv);
	}
	public function ListRating($ListRating)
	{
		$ConnectionResource = MySQLi_init();
		$ConnectionResource->options(MYSQLI_INIT_COMMAND, "SET sql_mode = 'ANSI'");
		if(!$ConnectionResource->real_connect(es_dev_Host, es_dev_Username, es_dev_Password, es_dev_Database, es_dev_Port, es_dev_Socket, MYSQLI_CLIENT_FOUND_ROWS))
			throw new Exception('Unable to connect to MySQL: '.$ConnectionResource->connect_error);
		if(!$ConnectionResource->set_charset('utf8'))
			throw new Exception('Error loading character set utf8: '.$ConnectionResource->error);
		$obj = new es_devDBIUser($ConnectionResource);
		$rv = $obj->ListRating($ListRating->maxRowsToReturn);
		return (object)array('ListRatingResult'=>$rv);
	}
	public function NewCafe($NewCafe)
	{
		$ConnectionResource = MySQLi_init();
		$ConnectionResource->options(MYSQLI_INIT_COMMAND, "SET sql_mode = 'ANSI'");
		if(!$ConnectionResource->real_connect(es_dev_Host, es_dev_Username, es_dev_Password, es_dev_Database, es_dev_Port, es_dev_Socket, MYSQLI_CLIENT_FOUND_ROWS))
			throw new Exception('Unable to connect to MySQL: '.$ConnectionResource->connect_error);
		if(!$ConnectionResource->set_charset('utf8'))
			throw new Exception('Error loading character set utf8: '.$ConnectionResource->error);
		$obj = new es_devDBIUser($ConnectionResource);
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
		$obj = new es_devDBIUser($ConnectionResource);
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
		$obj = new es_devDBIUser($ConnectionResource);
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
		$obj = new es_devDBIUser($ConnectionResource);
		$rv = $obj->SetCafe($SetCafe->ID, $SetCafe->Name, $SetCafe->Latitude, $SetCafe->Longitude, $SetCafe->Address, $SetCafe->Google_Places_Reference, $SetCafe->Google_Places_Id, $SetCafe->Star_Rating, $SetCafe->Monday_Open, $SetCafe->Monday_Close, $SetCafe->Tuesday_Open, $SetCafe->Tuesday_Close, $SetCafe->Wednesday_Open, $SetCafe->Wednesday_Close, $SetCafe->Thursday_Open, $SetCafe->Thursday_Close, $SetCafe->Friday_Open, $SetCafe->Friday_Close, $SetCafe->Saturday_Open, $SetCafe->Saturday_Close, $SetCafe->Sunday_Open, $SetCafe->Sunday_Close, $SetCafe->RegionID, $SetCafe->ChainID);
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
		$obj = new es_devDBIUser($ConnectionResource);
		$rv = $obj->ListCafe($ListCafe->maxRowsToReturn);
		return (object)array('ListCafeResult'=>$rv);
	}
	public function ListCafeByRegion($ListCafeByRegion)
	{
		$ConnectionResource = MySQLi_init();
		$ConnectionResource->options(MYSQLI_INIT_COMMAND, "SET sql_mode = 'ANSI'");
		if(!$ConnectionResource->real_connect(es_dev_Host, es_dev_Username, es_dev_Password, es_dev_Database, es_dev_Port, es_dev_Socket, MYSQLI_CLIENT_FOUND_ROWS))
			throw new Exception('Unable to connect to MySQL: '.$ConnectionResource->connect_error);
		if(!$ConnectionResource->set_charset('utf8'))
			throw new Exception('Error loading character set utf8: '.$ConnectionResource->error);
		$obj = new es_devDBIUser($ConnectionResource);
		$rv = $obj->ListCafeByRegion($ListCafeByRegion->maxRowsToReturn, $ListCafeByRegion->RegionID);
		return (object)array('ListCafeByRegionResult'=>$rv);
	}
	public function ListCafeByGoogle_Places_Id($ListCafeByGoogle_Places_Id)
	{
		$ConnectionResource = MySQLi_init();
		$ConnectionResource->options(MYSQLI_INIT_COMMAND, "SET sql_mode = 'ANSI'");
		if(!$ConnectionResource->real_connect(es_dev_Host, es_dev_Username, es_dev_Password, es_dev_Database, es_dev_Port, es_dev_Socket, MYSQLI_CLIENT_FOUND_ROWS))
			throw new Exception('Unable to connect to MySQL: '.$ConnectionResource->connect_error);
		if(!$ConnectionResource->set_charset('utf8'))
			throw new Exception('Error loading character set utf8: '.$ConnectionResource->error);
		$obj = new es_devDBIUser($ConnectionResource);
		$rv = $obj->ListCafeByGoogle_Places_Id($ListCafeByGoogle_Places_Id->maxRowsToReturn, $ListCafeByGoogle_Places_Id->Google_Places_Id);
		return (object)array('ListCafeByGoogle_Places_IdResult'=>$rv);
	}
	public function ListRatingByUser($ListRatingByUser)
	{
		$ConnectionResource = MySQLi_init();
		$ConnectionResource->options(MYSQLI_INIT_COMMAND, "SET sql_mode = 'ANSI'");
		if(!$ConnectionResource->real_connect(es_dev_Host, es_dev_Username, es_dev_Password, es_dev_Database, es_dev_Port, es_dev_Socket, MYSQLI_CLIENT_FOUND_ROWS))
			throw new Exception('Unable to connect to MySQL: '.$ConnectionResource->connect_error);
		if(!$ConnectionResource->set_charset('utf8'))
			throw new Exception('Error loading character set utf8: '.$ConnectionResource->error);
		$obj = new es_devDBIUser($ConnectionResource);
		$rv = $obj->ListRatingByUser($ListRatingByUser->maxRowsToReturn, $ListRatingByUser->UserID);
		return (object)array('ListRatingByUserResult'=>$rv);
	}
	public function ListRatingByCafe($ListRatingByCafe)
	{
		$ConnectionResource = MySQLi_init();
		$ConnectionResource->options(MYSQLI_INIT_COMMAND, "SET sql_mode = 'ANSI'");
		if(!$ConnectionResource->real_connect(es_dev_Host, es_dev_Username, es_dev_Password, es_dev_Database, es_dev_Port, es_dev_Socket, MYSQLI_CLIENT_FOUND_ROWS))
			throw new Exception('Unable to connect to MySQL: '.$ConnectionResource->connect_error);
		if(!$ConnectionResource->set_charset('utf8'))
			throw new Exception('Error loading character set utf8: '.$ConnectionResource->error);
		$obj = new es_devDBIUser($ConnectionResource);
		$rv = $obj->ListRatingByCafe($ListRatingByCafe->maxRowsToReturn, $ListRatingByCafe->CafeID);
		return (object)array('ListRatingByCafeResult'=>$rv);
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
		$es_devDBIUserServer = new es_devWSIUser();
		if((array_key_exists('CONTENT_TYPE', $_SERVER)===TRUE)&&(strpos($_SERVER['CONTENT_TYPE'], 'application/json')!==FALSE))
			$es_devDBIUserServer->json();
		else
			$es_devDBIUserServer->handle();
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
		$doc->load(dirname(__FILE__).'/es_dev.WSDL.IUser.xml');
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
