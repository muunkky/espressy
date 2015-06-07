<?php 
include_once(dirname(__FILE__).'/es_dev.config.php');
include_once(dirname(__FILE__).'/es_dev.DB.ICafe.php');
class es_devWSICafe extends SoapServer
{
	public function __construct()
	{
		parent::__construct(dirname(__FILE__).'/es_dev.WSDL.ICafe.xml', array('cache_wsdl'=>WSDL_CACHE_NONE));
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
		$obj = new es_devDBICafe($ConnectionResource);
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
		$obj = new es_devDBICafe($ConnectionResource);
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
		$obj = new es_devDBICafe($ConnectionResource);
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
		$obj = new es_devDBICafe($ConnectionResource);
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
		$obj = new es_devDBICafe($ConnectionResource);
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
		$obj = new es_devDBICafe($ConnectionResource);
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
		$obj = new es_devDBICafe($ConnectionResource);
		$rv = $obj->ListCafeByGoogle_Places_Id($ListCafeByGoogle_Places_Id->maxRowsToReturn, $ListCafeByGoogle_Places_Id->Google_Places_Id);
		return (object)array('ListCafeByGoogle_Places_IdResult'=>$rv);
	}
	public function NewRegion($NewRegion)
	{
		$ConnectionResource = MySQLi_init();
		$ConnectionResource->options(MYSQLI_INIT_COMMAND, "SET sql_mode = 'ANSI'");
		if(!$ConnectionResource->real_connect(es_dev_Host, es_dev_Username, es_dev_Password, es_dev_Database, es_dev_Port, es_dev_Socket, MYSQLI_CLIENT_FOUND_ROWS))
			throw new Exception('Unable to connect to MySQL: '.$ConnectionResource->connect_error);
		if(!$ConnectionResource->set_charset('utf8'))
			throw new Exception('Error loading character set utf8: '.$ConnectionResource->error);
		$obj = new es_devDBICafe($ConnectionResource);
		$rv = $obj->NewRegion();
		return (object)array('NewRegionResult'=>$rv);
	}
	public function DeleteRegion($DeleteRegion)
	{
		$ConnectionResource = MySQLi_init();
		$ConnectionResource->options(MYSQLI_INIT_COMMAND, "SET sql_mode = 'ANSI'");
		if(!$ConnectionResource->real_connect(es_dev_Host, es_dev_Username, es_dev_Password, es_dev_Database, es_dev_Port, es_dev_Socket, MYSQLI_CLIENT_FOUND_ROWS))
			throw new Exception('Unable to connect to MySQL: '.$ConnectionResource->connect_error);
		if(!$ConnectionResource->set_charset('utf8'))
			throw new Exception('Error loading character set utf8: '.$ConnectionResource->error);
		$obj = new es_devDBICafe($ConnectionResource);
		$rv = $obj->DeleteRegion($DeleteRegion->ID);
		return (object)array('DeleteRegionResult'=>$rv);
	}
	public function GetRegion($GetRegion)
	{
		$ConnectionResource = MySQLi_init();
		$ConnectionResource->options(MYSQLI_INIT_COMMAND, "SET sql_mode = 'ANSI'");
		if(!$ConnectionResource->real_connect(es_dev_Host, es_dev_Username, es_dev_Password, es_dev_Database, es_dev_Port, es_dev_Socket, MYSQLI_CLIENT_FOUND_ROWS))
			throw new Exception('Unable to connect to MySQL: '.$ConnectionResource->connect_error);
		if(!$ConnectionResource->set_charset('utf8'))
			throw new Exception('Error loading character set utf8: '.$ConnectionResource->error);
		$obj = new es_devDBICafe($ConnectionResource);
		$rv = $obj->GetRegion($GetRegion->ID);
		return (object)array('GetRegionResult'=>$rv);
	}
	public function SetRegion($SetRegion)
	{
		$ConnectionResource = MySQLi_init();
		$ConnectionResource->options(MYSQLI_INIT_COMMAND, "SET sql_mode = 'ANSI'");
		if(!$ConnectionResource->real_connect(es_dev_Host, es_dev_Username, es_dev_Password, es_dev_Database, es_dev_Port, es_dev_Socket, MYSQLI_CLIENT_FOUND_ROWS))
			throw new Exception('Unable to connect to MySQL: '.$ConnectionResource->connect_error);
		if(!$ConnectionResource->set_charset('utf8'))
			throw new Exception('Error loading character set utf8: '.$ConnectionResource->error);
		$obj = new es_devDBICafe($ConnectionResource);
		$rv = $obj->SetRegion($SetRegion->ID, $SetRegion->Name, $SetRegion->Center_Latitude, $SetRegion->Center_Longitude);
		return (object)array('SetRegionResult'=>$rv);
	}
	public function ListRegion($ListRegion)
	{
		$ConnectionResource = MySQLi_init();
		$ConnectionResource->options(MYSQLI_INIT_COMMAND, "SET sql_mode = 'ANSI'");
		if(!$ConnectionResource->real_connect(es_dev_Host, es_dev_Username, es_dev_Password, es_dev_Database, es_dev_Port, es_dev_Socket, MYSQLI_CLIENT_FOUND_ROWS))
			throw new Exception('Unable to connect to MySQL: '.$ConnectionResource->connect_error);
		if(!$ConnectionResource->set_charset('utf8'))
			throw new Exception('Error loading character set utf8: '.$ConnectionResource->error);
		$obj = new es_devDBICafe($ConnectionResource);
		$rv = $obj->ListRegion($ListRegion->maxRowsToReturn);
		return (object)array('ListRegionResult'=>$rv);
	}
	public function ListCafeByChain($ListCafeByChain)
	{
		$ConnectionResource = MySQLi_init();
		$ConnectionResource->options(MYSQLI_INIT_COMMAND, "SET sql_mode = 'ANSI'");
		if(!$ConnectionResource->real_connect(es_dev_Host, es_dev_Username, es_dev_Password, es_dev_Database, es_dev_Port, es_dev_Socket, MYSQLI_CLIENT_FOUND_ROWS))
			throw new Exception('Unable to connect to MySQL: '.$ConnectionResource->connect_error);
		if(!$ConnectionResource->set_charset('utf8'))
			throw new Exception('Error loading character set utf8: '.$ConnectionResource->error);
		$obj = new es_devDBICafe($ConnectionResource);
		$rv = $obj->ListCafeByChain($ListCafeByChain->maxRowsToReturn, $ListCafeByChain->ChainID);
		return (object)array('ListCafeByChainResult'=>$rv);
	}
	public function NewChain($NewChain)
	{
		$ConnectionResource = MySQLi_init();
		$ConnectionResource->options(MYSQLI_INIT_COMMAND, "SET sql_mode = 'ANSI'");
		if(!$ConnectionResource->real_connect(es_dev_Host, es_dev_Username, es_dev_Password, es_dev_Database, es_dev_Port, es_dev_Socket, MYSQLI_CLIENT_FOUND_ROWS))
			throw new Exception('Unable to connect to MySQL: '.$ConnectionResource->connect_error);
		if(!$ConnectionResource->set_charset('utf8'))
			throw new Exception('Error loading character set utf8: '.$ConnectionResource->error);
		$obj = new es_devDBICafe($ConnectionResource);
		$rv = $obj->NewChain();
		return (object)array('NewChainResult'=>$rv);
	}
	public function DeleteChain($DeleteChain)
	{
		$ConnectionResource = MySQLi_init();
		$ConnectionResource->options(MYSQLI_INIT_COMMAND, "SET sql_mode = 'ANSI'");
		if(!$ConnectionResource->real_connect(es_dev_Host, es_dev_Username, es_dev_Password, es_dev_Database, es_dev_Port, es_dev_Socket, MYSQLI_CLIENT_FOUND_ROWS))
			throw new Exception('Unable to connect to MySQL: '.$ConnectionResource->connect_error);
		if(!$ConnectionResource->set_charset('utf8'))
			throw new Exception('Error loading character set utf8: '.$ConnectionResource->error);
		$obj = new es_devDBICafe($ConnectionResource);
		$rv = $obj->DeleteChain($DeleteChain->ID);
		return (object)array('DeleteChainResult'=>$rv);
	}
	public function GetChain($GetChain)
	{
		$ConnectionResource = MySQLi_init();
		$ConnectionResource->options(MYSQLI_INIT_COMMAND, "SET sql_mode = 'ANSI'");
		if(!$ConnectionResource->real_connect(es_dev_Host, es_dev_Username, es_dev_Password, es_dev_Database, es_dev_Port, es_dev_Socket, MYSQLI_CLIENT_FOUND_ROWS))
			throw new Exception('Unable to connect to MySQL: '.$ConnectionResource->connect_error);
		if(!$ConnectionResource->set_charset('utf8'))
			throw new Exception('Error loading character set utf8: '.$ConnectionResource->error);
		$obj = new es_devDBICafe($ConnectionResource);
		$rv = $obj->GetChain($GetChain->ID);
		return (object)array('GetChainResult'=>$rv);
	}
	public function SetChain($SetChain)
	{
		$ConnectionResource = MySQLi_init();
		$ConnectionResource->options(MYSQLI_INIT_COMMAND, "SET sql_mode = 'ANSI'");
		if(!$ConnectionResource->real_connect(es_dev_Host, es_dev_Username, es_dev_Password, es_dev_Database, es_dev_Port, es_dev_Socket, MYSQLI_CLIENT_FOUND_ROWS))
			throw new Exception('Unable to connect to MySQL: '.$ConnectionResource->connect_error);
		if(!$ConnectionResource->set_charset('utf8'))
			throw new Exception('Error loading character set utf8: '.$ConnectionResource->error);
		$obj = new es_devDBICafe($ConnectionResource);
		$rv = $obj->SetChain($SetChain->ID, $SetChain->Name);
		return (object)array('SetChainResult'=>$rv);
	}
	public function ListChain($ListChain)
	{
		$ConnectionResource = MySQLi_init();
		$ConnectionResource->options(MYSQLI_INIT_COMMAND, "SET sql_mode = 'ANSI'");
		if(!$ConnectionResource->real_connect(es_dev_Host, es_dev_Username, es_dev_Password, es_dev_Database, es_dev_Port, es_dev_Socket, MYSQLI_CLIENT_FOUND_ROWS))
			throw new Exception('Unable to connect to MySQL: '.$ConnectionResource->connect_error);
		if(!$ConnectionResource->set_charset('utf8'))
			throw new Exception('Error loading character set utf8: '.$ConnectionResource->error);
		$obj = new es_devDBICafe($ConnectionResource);
		$rv = $obj->ListChain($ListChain->maxRowsToReturn);
		return (object)array('ListChainResult'=>$rv);
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
		$es_devDBICafeServer = new es_devWSICafe();
		if((array_key_exists('CONTENT_TYPE', $_SERVER)===TRUE)&&(strpos($_SERVER['CONTENT_TYPE'], 'application/json')!==FALSE))
			$es_devDBICafeServer->json();
		else
			$es_devDBICafeServer->handle();
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
		$doc->load(dirname(__FILE__).'/es_dev.WSDL.ICafe.xml');
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
