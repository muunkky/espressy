<?php 
include_once(dirname(__FILE__).'/es_dev.DB.IUser.php');
include_once(dirname(__FILE__).'/es_dev.DB.ICafe.php');
class es_devDBIReview
{
	public $ConnectionResource;
	public function __construct($ConnectionResource)
	{
		$this->ConnectionResource = $ConnectionResource;
	}
	public function NewCafe($Name, $Google_Places_Id, $RegionID)
	{
		if(is_null($Name))
			throw new Exception('ArgumentNullException: Name');
		if(is_null($RegionID))
			throw new Exception('ArgumentNullException: RegionID');
		$sql_stmt = 'INSERT INTO "t_es_dev_u_Cafe"("c_u_Name", "c_u_Google Places Id", "c_r_Region") VALUES (?, ?, ?)';
		$mysqli_stmt = $this->ConnectionResource->prepare($sql_stmt);
		if($mysqli_stmt===FALSE)
			throw new Exception($sql_stmt.': prepare statement failed: '.$this->ConnectionResource->error);
		try
		{
			if(!$mysqli_stmt->bind_param('ssi', $Name, $Google_Places_Id, $RegionID))
				throw new Exception('Bind parameters failed: '.$mysqli_stmt->error);
			if(!$mysqli_stmt->execute())
				throw new Exception($sql_stmt.': '.$mysqli_stmt->error);
			$mysqli_stmt->close();
		}
		catch(Exception $e)
		{
			$mysqli_stmt->close();
			throw $e;
		}
		$sql_stmt = 'SELECT LAST_INSERT_ID()';
		$mysqli_stmt = $this->ConnectionResource->prepare($sql_stmt);
		if($mysqli_stmt===FALSE)
			throw new Exception($sql_stmt.': prepare statement failed: '.$this->ConnectionResource->error);
		try
		{
			if(!$mysqli_stmt->execute())
				throw new Exception($sql_stmt.': '.$mysqli_stmt->error);
			if((!$mysqli_stmt->store_result())||(!$mysqli_stmt->bind_result($rv)))
				throw new Exception('Unable to store or bind results of query: '.$mysqli_stmt->error);
			$mysqli_stmt->fetch();
			$rv = ((int)$rv);
			$mysqli_stmt->close();
		}
		catch(Exception $e)
		{
			$mysqli_stmt->close();
			throw $e;
		}
		return $rv;
	}
	public function DeleteCafe($ID)
	{
		if(is_null($ID))
			throw new Exception('ArgumentNullException: ID');
		$sql_stmt = 'DELETE FROM "t_es_dev_u_Cafe" WHERE "c_id" = ?';
		$mysqli_stmt = $this->ConnectionResource->prepare($sql_stmt);
		if($mysqli_stmt===FALSE)
			throw new Exception($sql_stmt.': prepare statement failed: '.$this->ConnectionResource->error);
		try
		{
			if(!$mysqli_stmt->bind_param('i', $ID))
				throw new Exception('Bind parameters failed: '.$mysqli_stmt->error);
			if(!$mysqli_stmt->execute())
				throw new Exception($sql_stmt.': '.$mysqli_stmt->error);
			$rv = ((int)$mysqli_stmt->affected_rows);
			$mysqli_stmt->close();
		}
		catch(Exception $e)
		{
			$mysqli_stmt->close();
			throw $e;
		}
		if($rv!==1)
			throw new Exception('Operation resulted in '.$rv.' row(s) being deleted');
		return $rv;
	}
	public function GetCafe($ID)
	{
		if(is_null($ID))
			throw new Exception('ArgumentNullException: ID');
		$rv = NULL;
		$sql_stmt = 'SELECT "c_id", "c_u_Name", "c_u_Latitude", "c_u_Longitude", "c_u_Address", "c_u_Google Places Reference", "c_u_Google Places Id", "c_u_Star Rating", "c_r_Region", "c_u_Monday Open", "c_u_Monday Close", "c_u_Tuesday Open", "c_u_Tuesday Close", "c_u_Wednesday Open", "c_u_Wednesday Close", "c_u_Thursday Open", "c_u_Thursday Close", "c_u_Friday Open", "c_u_Friday Close", "c_u_Saturday Open", "c_u_Saturday Close", "c_u_Sunday Open", "c_u_Sunday Close", "c_r_Chain" FROM "t_es_dev_u_Cafe" WHERE "c_id" = (?) LIMIT 2';
		$mysqli_stmt = $this->ConnectionResource->prepare($sql_stmt);
		if($mysqli_stmt===FALSE)
			throw new Exception($sql_stmt.': prepare statement failed: '.$this->ConnectionResource->error);
		try
		{
			if(!$mysqli_stmt->bind_param('i', $ID))
				throw new Exception('Bind parameters failed: '.$mysqli_stmt->error);
			if(!$mysqli_stmt->execute())
				throw new Exception($sql_stmt.': '.$mysqli_stmt->error);
			if((!$mysqli_stmt->store_result())||(!$mysqli_stmt->bind_result($ID, $Name, $Latitude, $Longitude, $Address, $Google_Places_Reference, $Google_Places_Id, $Star_Rating, $RegionID, $Monday_Open, $Monday_Close, $Tuesday_Open, $Tuesday_Close, $Wednesday_Open, $Wednesday_Close, $Thursday_Open, $Thursday_Close, $Friday_Open, $Friday_Close, $Saturday_Open, $Saturday_Close, $Sunday_Open, $Sunday_Close, $ChainID)))
				throw new Exception('Unable to store or bind results of query: '.$mysqli_stmt->error);
			while($mysqli_stmt->fetch())
			{
				if(!is_null($rv))
					throw new Exception('Operation selected more than one row');
				$rv = ((object)array('ID'=>$ID, 'Name'=>$Name, 'Latitude'=>$Latitude, 'Longitude'=>$Longitude, 'Address'=>$Address, 'Google_Places_Reference'=>$Google_Places_Reference, 'Google_Places_Id'=>$Google_Places_Id, 'Star_Rating'=>$Star_Rating, 'RegionID'=>$RegionID, 'Monday_Open'=>$Monday_Open, 'Monday_Close'=>$Monday_Close, 'Tuesday_Open'=>$Tuesday_Open, 'Tuesday_Close'=>$Tuesday_Close, 'Wednesday_Open'=>$Wednesday_Open, 'Wednesday_Close'=>$Wednesday_Close, 'Thursday_Open'=>$Thursday_Open, 'Thursday_Close'=>$Thursday_Close, 'Friday_Open'=>$Friday_Open, 'Friday_Close'=>$Friday_Close, 'Saturday_Open'=>$Saturday_Open, 'Saturday_Close'=>$Saturday_Close, 'Sunday_Open'=>$Sunday_Open, 'Sunday_Close'=>$Sunday_Close, 'ChainID'=>$ChainID));
				if(is_null($rv->ID))
					throw new Exception("Value 'null' is not allowed for 'ID'");
				if(is_null($rv->Name))
					throw new Exception("Value 'null' is not allowed for 'Name'");
				if(is_null($rv->RegionID))
					throw new Exception("Value 'null' is not allowed for 'RegionID'");
				if(!is_null($rv->Monday_Open))
					$rv->Monday_Open = date_format(new DateTime($rv->Monday_Open, new DateTimeZone('UTC')), 'Y-m-d\\TH:i:s');
				if(!is_null($rv->Monday_Close))
					$rv->Monday_Close = date_format(new DateTime($rv->Monday_Close, new DateTimeZone('UTC')), 'Y-m-d\\TH:i:s');
				if(!is_null($rv->Tuesday_Open))
					$rv->Tuesday_Open = date_format(new DateTime($rv->Tuesday_Open, new DateTimeZone('UTC')), 'Y-m-d\\TH:i:s');
				if(!is_null($rv->Tuesday_Close))
					$rv->Tuesday_Close = date_format(new DateTime($rv->Tuesday_Close, new DateTimeZone('UTC')), 'Y-m-d\\TH:i:s');
				if(!is_null($rv->Wednesday_Open))
					$rv->Wednesday_Open = date_format(new DateTime($rv->Wednesday_Open, new DateTimeZone('UTC')), 'Y-m-d\\TH:i:s');
				if(!is_null($rv->Wednesday_Close))
					$rv->Wednesday_Close = date_format(new DateTime($rv->Wednesday_Close, new DateTimeZone('UTC')), 'Y-m-d\\TH:i:s');
				if(!is_null($rv->Thursday_Open))
					$rv->Thursday_Open = date_format(new DateTime($rv->Thursday_Open, new DateTimeZone('UTC')), 'Y-m-d\\TH:i:s');
				if(!is_null($rv->Thursday_Close))
					$rv->Thursday_Close = date_format(new DateTime($rv->Thursday_Close, new DateTimeZone('UTC')), 'Y-m-d\\TH:i:s');
				if(!is_null($rv->Friday_Open))
					$rv->Friday_Open = date_format(new DateTime($rv->Friday_Open, new DateTimeZone('UTC')), 'Y-m-d\\TH:i:s');
				if(!is_null($rv->Friday_Close))
					$rv->Friday_Close = date_format(new DateTime($rv->Friday_Close, new DateTimeZone('UTC')), 'Y-m-d\\TH:i:s');
				if(!is_null($rv->Saturday_Open))
					$rv->Saturday_Open = date_format(new DateTime($rv->Saturday_Open, new DateTimeZone('UTC')), 'Y-m-d\\TH:i:s');
				if(!is_null($rv->Saturday_Close))
					$rv->Saturday_Close = date_format(new DateTime($rv->Saturday_Close, new DateTimeZone('UTC')), 'Y-m-d\\TH:i:s');
				if(!is_null($rv->Sunday_Open))
					$rv->Sunday_Open = date_format(new DateTime($rv->Sunday_Open, new DateTimeZone('UTC')), 'Y-m-d\\TH:i:s');
				if(!is_null($rv->Sunday_Close))
					$rv->Sunday_Close = date_format(new DateTime($rv->Sunday_Close, new DateTimeZone('UTC')), 'Y-m-d\\TH:i:s');
			}
			$mysqli_stmt->close();
		}
		catch(Exception $e)
		{
			$mysqli_stmt->close();
			throw $e;
		}
		if(is_null($rv))
			throw new Exception('Operation selected no rows');
		return $rv;
	}
	public function SetCafe($ID, $Name, $Latitude, $Longitude, $Address, $Google_Places_Reference, $Google_Places_Id, $Star_Rating, $RegionID, $Monday_Open, $Monday_Close, $Tuesday_Open, $Tuesday_Close, $Wednesday_Open, $Wednesday_Close, $Thursday_Open, $Thursday_Close, $Friday_Open, $Friday_Close, $Saturday_Open, $Saturday_Close, $Sunday_Open, $Sunday_Close, $ChainID)
	{
		if(is_null($ID))
			throw new Exception('ArgumentNullException: ID');
		if(is_null($Name))
			throw new Exception('ArgumentNullException: Name');
		if(is_null($RegionID))
			throw new Exception('ArgumentNullException: RegionID');
		$sql_stmt = 'UPDATE "t_es_dev_u_Cafe" SET "c_id" = (?), "c_u_Name" = (?), "c_u_Latitude" = (?), "c_u_Longitude" = (?), "c_u_Address" = (?), "c_u_Google Places Reference" = (?), "c_u_Google Places Id" = (?), "c_u_Star Rating" = (?), "c_r_Region" = (?), "c_u_Monday Open" = (?), "c_u_Monday Close" = (?), "c_u_Tuesday Open" = (?), "c_u_Tuesday Close" = (?), "c_u_Wednesday Open" = (?), "c_u_Wednesday Close" = (?), "c_u_Thursday Open" = (?), "c_u_Thursday Close" = (?), "c_u_Friday Open" = (?), "c_u_Friday Close" = (?), "c_u_Saturday Open" = (?), "c_u_Saturday Close" = (?), "c_u_Sunday Open" = (?), "c_u_Sunday Close" = (?), "c_r_Chain" = (?) WHERE ((c_id) = (?))';
		$mysqli_stmt = $this->ConnectionResource->prepare($sql_stmt);
		if($mysqli_stmt===FALSE)
			throw new Exception($sql_stmt.': prepare statement failed: '.$this->ConnectionResource->error);
		try
		{
			if(!$mysqli_stmt->bind_param('isddsssiissssssssssssssii', $ID, $Name, $Latitude, $Longitude, $Address, $Google_Places_Reference, $Google_Places_Id, $Star_Rating, $RegionID, $Monday_Open, $Monday_Close, $Tuesday_Open, $Tuesday_Close, $Wednesday_Open, $Wednesday_Close, $Thursday_Open, $Thursday_Close, $Friday_Open, $Friday_Close, $Saturday_Open, $Saturday_Close, $Sunday_Open, $Sunday_Close, $ChainID, $ID))
				throw new Exception('Bind parameters failed: '.$mysqli_stmt->error);
			if(!$mysqli_stmt->execute())
				throw new Exception($sql_stmt.': '.$mysqli_stmt->error);
			$rv = ((int)$mysqli_stmt->affected_rows);
			$mysqli_stmt->close();
		}
		catch(Exception $e)
		{
			$mysqli_stmt->close();
			throw $e;
		}
		if($rv!==1)
			throw new Exception('Operation resulted in '.$rv.' row(s) being updated');
		return $rv;
	}
	public function ListCafe($maxRowsToReturn)
	{
		$rv = array();
		$sql_stmt = ' "c_id", "c_u_Name", "c_u_Latitude", "c_u_Longitude", "c_u_Address", "c_u_Google Places Reference", "c_u_Google Places Id", "c_u_Star Rating", "c_r_Region", "c_u_Monday Open", "c_u_Monday Close", "c_u_Tuesday Open", "c_u_Tuesday Close", "c_u_Wednesday Open", "c_u_Wednesday Close", "c_u_Thursday Open", "c_u_Thursday Close", "c_u_Friday Open", "c_u_Friday Close", "c_u_Saturday Open", "c_u_Saturday Close", "c_u_Sunday Open", "c_u_Sunday Close", "c_r_Chain" FROM "t_es_dev_u_Cafe"';
		if($maxRowsToReturn&&(preg_match('/^\\s*\\d*(\\s*,\\s*\\d+)?\\s*$/', $maxRowsToReturn)==1))
			$sql_stmt = ($sql_stmt.' LIMIT '.$maxRowsToReturn);
		$sql_stmt = ('SELECT '.$sql_stmt);
		$mysqli_stmt = $this->ConnectionResource->prepare($sql_stmt);
		if($mysqli_stmt===FALSE)
			throw new Exception($sql_stmt.': prepare statement failed: '.$this->ConnectionResource->error);
		try
		{
			if(!$mysqli_stmt->execute())
				throw new Exception($sql_stmt.': '.$mysqli_stmt->error);
			if((!$mysqli_stmt->store_result())||(!$mysqli_stmt->bind_result($ID, $Name, $Latitude, $Longitude, $Address, $Google_Places_Reference, $Google_Places_Id, $Star_Rating, $RegionID, $Monday_Open, $Monday_Close, $Tuesday_Open, $Tuesday_Close, $Wednesday_Open, $Wednesday_Close, $Thursday_Open, $Thursday_Close, $Friday_Open, $Friday_Close, $Saturday_Open, $Saturday_Close, $Sunday_Open, $Sunday_Close, $ChainID)))
				throw new Exception('Unable to store or bind results of query: '.$mysqli_stmt->error);
			while($mysqli_stmt->fetch())
			{
				$row = ((object)array('ID'=>$ID, 'Name'=>$Name, 'Latitude'=>$Latitude, 'Longitude'=>$Longitude, 'Address'=>$Address, 'Google_Places_Reference'=>$Google_Places_Reference, 'Google_Places_Id'=>$Google_Places_Id, 'Star_Rating'=>$Star_Rating, 'RegionID'=>$RegionID, 'Monday_Open'=>$Monday_Open, 'Monday_Close'=>$Monday_Close, 'Tuesday_Open'=>$Tuesday_Open, 'Tuesday_Close'=>$Tuesday_Close, 'Wednesday_Open'=>$Wednesday_Open, 'Wednesday_Close'=>$Wednesday_Close, 'Thursday_Open'=>$Thursday_Open, 'Thursday_Close'=>$Thursday_Close, 'Friday_Open'=>$Friday_Open, 'Friday_Close'=>$Friday_Close, 'Saturday_Open'=>$Saturday_Open, 'Saturday_Close'=>$Saturday_Close, 'Sunday_Open'=>$Sunday_Open, 'Sunday_Close'=>$Sunday_Close, 'ChainID'=>$ChainID));
				if(is_null($row->ID))
					throw new Exception("Value 'null' is not allowed for 'ID'");
				if(is_null($row->Name))
					throw new Exception("Value 'null' is not allowed for 'Name'");
				if(is_null($row->RegionID))
					throw new Exception("Value 'null' is not allowed for 'RegionID'");
				if(!is_null($row->Monday_Open))
					$row->Monday_Open = date_format(new DateTime($row->Monday_Open, new DateTimeZone('UTC')), 'Y-m-d\\TH:i:s');
				if(!is_null($row->Monday_Close))
					$row->Monday_Close = date_format(new DateTime($row->Monday_Close, new DateTimeZone('UTC')), 'Y-m-d\\TH:i:s');
				if(!is_null($row->Tuesday_Open))
					$row->Tuesday_Open = date_format(new DateTime($row->Tuesday_Open, new DateTimeZone('UTC')), 'Y-m-d\\TH:i:s');
				if(!is_null($row->Tuesday_Close))
					$row->Tuesday_Close = date_format(new DateTime($row->Tuesday_Close, new DateTimeZone('UTC')), 'Y-m-d\\TH:i:s');
				if(!is_null($row->Wednesday_Open))
					$row->Wednesday_Open = date_format(new DateTime($row->Wednesday_Open, new DateTimeZone('UTC')), 'Y-m-d\\TH:i:s');
				if(!is_null($row->Wednesday_Close))
					$row->Wednesday_Close = date_format(new DateTime($row->Wednesday_Close, new DateTimeZone('UTC')), 'Y-m-d\\TH:i:s');
				if(!is_null($row->Thursday_Open))
					$row->Thursday_Open = date_format(new DateTime($row->Thursday_Open, new DateTimeZone('UTC')), 'Y-m-d\\TH:i:s');
				if(!is_null($row->Thursday_Close))
					$row->Thursday_Close = date_format(new DateTime($row->Thursday_Close, new DateTimeZone('UTC')), 'Y-m-d\\TH:i:s');
				if(!is_null($row->Friday_Open))
					$row->Friday_Open = date_format(new DateTime($row->Friday_Open, new DateTimeZone('UTC')), 'Y-m-d\\TH:i:s');
				if(!is_null($row->Friday_Close))
					$row->Friday_Close = date_format(new DateTime($row->Friday_Close, new DateTimeZone('UTC')), 'Y-m-d\\TH:i:s');
				if(!is_null($row->Saturday_Open))
					$row->Saturday_Open = date_format(new DateTime($row->Saturday_Open, new DateTimeZone('UTC')), 'Y-m-d\\TH:i:s');
				if(!is_null($row->Saturday_Close))
					$row->Saturday_Close = date_format(new DateTime($row->Saturday_Close, new DateTimeZone('UTC')), 'Y-m-d\\TH:i:s');
				if(!is_null($row->Sunday_Open))
					$row->Sunday_Open = date_format(new DateTime($row->Sunday_Open, new DateTimeZone('UTC')), 'Y-m-d\\TH:i:s');
				if(!is_null($row->Sunday_Close))
					$row->Sunday_Close = date_format(new DateTime($row->Sunday_Close, new DateTimeZone('UTC')), 'Y-m-d\\TH:i:s');
				$rv[] = $row;
			}
			$mysqli_stmt->close();
		}
		catch(Exception $e)
		{
			$mysqli_stmt->close();
			throw $e;
		}
		return $rv;
	}
	public function NewDevice($UserID)
	{
		if(is_null($UserID))
			throw new Exception('ArgumentNullException: UserID');
		$sql_stmt = 'INSERT INTO "t_es_dev_u_Device"("c_r_User") VALUES (?)';
		$mysqli_stmt = $this->ConnectionResource->prepare($sql_stmt);
		if($mysqli_stmt===FALSE)
			throw new Exception($sql_stmt.': prepare statement failed: '.$this->ConnectionResource->error);
		try
		{
			if(!$mysqli_stmt->bind_param('i', $UserID))
				throw new Exception('Bind parameters failed: '.$mysqli_stmt->error);
			if(!$mysqli_stmt->execute())
				throw new Exception($sql_stmt.': '.$mysqli_stmt->error);
			$mysqli_stmt->close();
		}
		catch(Exception $e)
		{
			$mysqli_stmt->close();
			throw $e;
		}
		$sql_stmt = 'SELECT LAST_INSERT_ID()';
		$mysqli_stmt = $this->ConnectionResource->prepare($sql_stmt);
		if($mysqli_stmt===FALSE)
			throw new Exception($sql_stmt.': prepare statement failed: '.$this->ConnectionResource->error);
		try
		{
			if(!$mysqli_stmt->execute())
				throw new Exception($sql_stmt.': '.$mysqli_stmt->error);
			if((!$mysqli_stmt->store_result())||(!$mysqli_stmt->bind_result($rv)))
				throw new Exception('Unable to store or bind results of query: '.$mysqli_stmt->error);
			$mysqli_stmt->fetch();
			$rv = ((int)$rv);
			$mysqli_stmt->close();
		}
		catch(Exception $e)
		{
			$mysqli_stmt->close();
			throw $e;
		}
		return $rv;
	}
	public function DeleteDevice($ID)
	{
		if(is_null($ID))
			throw new Exception('ArgumentNullException: ID');
		$sql_stmt = 'DELETE FROM "t_es_dev_u_Device" WHERE "c_id" = ?';
		$mysqli_stmt = $this->ConnectionResource->prepare($sql_stmt);
		if($mysqli_stmt===FALSE)
			throw new Exception($sql_stmt.': prepare statement failed: '.$this->ConnectionResource->error);
		try
		{
			if(!$mysqli_stmt->bind_param('i', $ID))
				throw new Exception('Bind parameters failed: '.$mysqli_stmt->error);
			if(!$mysqli_stmt->execute())
				throw new Exception($sql_stmt.': '.$mysqli_stmt->error);
			$rv = ((int)$mysqli_stmt->affected_rows);
			$mysqli_stmt->close();
		}
		catch(Exception $e)
		{
			$mysqli_stmt->close();
			throw $e;
		}
		if($rv!==1)
			throw new Exception('Operation resulted in '.$rv.' row(s) being deleted');
		return $rv;
	}
	public function GetDevice($ID)
	{
		if(is_null($ID))
			throw new Exception('ArgumentNullException: ID');
		$rv = NULL;
		$sql_stmt = 'SELECT "c_id", "c_u_Identifier", "c_r_User" FROM "t_es_dev_u_Device" WHERE "c_id" = (?) LIMIT 2';
		$mysqli_stmt = $this->ConnectionResource->prepare($sql_stmt);
		if($mysqli_stmt===FALSE)
			throw new Exception($sql_stmt.': prepare statement failed: '.$this->ConnectionResource->error);
		try
		{
			if(!$mysqli_stmt->bind_param('i', $ID))
				throw new Exception('Bind parameters failed: '.$mysqli_stmt->error);
			if(!$mysqli_stmt->execute())
				throw new Exception($sql_stmt.': '.$mysqli_stmt->error);
			if((!$mysqli_stmt->store_result())||(!$mysqli_stmt->bind_result($ID, $Identifier, $UserID)))
				throw new Exception('Unable to store or bind results of query: '.$mysqli_stmt->error);
			while($mysqli_stmt->fetch())
			{
				if(!is_null($rv))
					throw new Exception('Operation selected more than one row');
				$rv = ((object)array('ID'=>$ID, 'Identifier'=>$Identifier, 'UserID'=>$UserID));
				if(is_null($rv->ID))
					throw new Exception("Value 'null' is not allowed for 'ID'");
				if(is_null($rv->UserID))
					throw new Exception("Value 'null' is not allowed for 'UserID'");
			}
			$mysqli_stmt->close();
		}
		catch(Exception $e)
		{
			$mysqli_stmt->close();
			throw $e;
		}
		if(is_null($rv))
			throw new Exception('Operation selected no rows');
		return $rv;
	}
	public function SetDevice($ID, $Identifier, $UserID)
	{
		if(is_null($ID))
			throw new Exception('ArgumentNullException: ID');
		if(is_null($UserID))
			throw new Exception('ArgumentNullException: UserID');
		$sql_stmt = 'UPDATE "t_es_dev_u_Device" SET "c_id" = (?), "c_u_Identifier" = (?), "c_r_User" = (?) WHERE ((c_id) = (?))';
		$mysqli_stmt = $this->ConnectionResource->prepare($sql_stmt);
		if($mysqli_stmt===FALSE)
			throw new Exception($sql_stmt.': prepare statement failed: '.$this->ConnectionResource->error);
		try
		{
			if(!$mysqli_stmt->bind_param('isii', $ID, $Identifier, $UserID, $ID))
				throw new Exception('Bind parameters failed: '.$mysqli_stmt->error);
			if(!$mysqli_stmt->execute())
				throw new Exception($sql_stmt.': '.$mysqli_stmt->error);
			$rv = ((int)$mysqli_stmt->affected_rows);
			$mysqli_stmt->close();
		}
		catch(Exception $e)
		{
			$mysqli_stmt->close();
			throw $e;
		}
		if($rv!==1)
			throw new Exception('Operation resulted in '.$rv.' row(s) being updated');
		return $rv;
	}
	public function ListDevice($maxRowsToReturn)
	{
		$rv = array();
		$sql_stmt = ' "c_id", "c_u_Identifier", "c_r_User" FROM "t_es_dev_u_Device"';
		if($maxRowsToReturn&&(preg_match('/^\\s*\\d*(\\s*,\\s*\\d+)?\\s*$/', $maxRowsToReturn)==1))
			$sql_stmt = ($sql_stmt.' LIMIT '.$maxRowsToReturn);
		$sql_stmt = ('SELECT '.$sql_stmt);
		$mysqli_stmt = $this->ConnectionResource->prepare($sql_stmt);
		if($mysqli_stmt===FALSE)
			throw new Exception($sql_stmt.': prepare statement failed: '.$this->ConnectionResource->error);
		try
		{
			if(!$mysqli_stmt->execute())
				throw new Exception($sql_stmt.': '.$mysqli_stmt->error);
			if((!$mysqli_stmt->store_result())||(!$mysqli_stmt->bind_result($ID, $Identifier, $UserID)))
				throw new Exception('Unable to store or bind results of query: '.$mysqli_stmt->error);
			while($mysqli_stmt->fetch())
			{
				$row = ((object)array('ID'=>$ID, 'Identifier'=>$Identifier, 'UserID'=>$UserID));
				if(is_null($row->ID))
					throw new Exception("Value 'null' is not allowed for 'ID'");
				if(is_null($row->UserID))
					throw new Exception("Value 'null' is not allowed for 'UserID'");
				$rv[] = $row;
			}
			$mysqli_stmt->close();
		}
		catch(Exception $e)
		{
			$mysqli_stmt->close();
			throw $e;
		}
		return $rv;
	}
	public function ListDeviceByUser($maxRowsToReturn, $UserID)
	{
		if(is_null($UserID))
			throw new Exception('ArgumentNullException: UserID');
		$rv = array();
		$sql_stmt = ' "c_id", "c_u_Identifier", "c_r_User" FROM "t_es_dev_u_Device" WHERE "c_r_User"=?';
		if($maxRowsToReturn&&(preg_match('/^\\s*\\d*(\\s*,\\s*\\d+)?\\s*$/', $maxRowsToReturn)==1))
			$sql_stmt = ($sql_stmt.' LIMIT '.$maxRowsToReturn);
		$sql_stmt = ('SELECT '.$sql_stmt);
		$mysqli_stmt = $this->ConnectionResource->prepare($sql_stmt);
		if($mysqli_stmt===FALSE)
			throw new Exception($sql_stmt.': prepare statement failed: '.$this->ConnectionResource->error);
		try
		{
			if(!$mysqli_stmt->bind_param('i', $UserID))
				throw new Exception('Bind parameters failed: '.$mysqli_stmt->error);
			if(!$mysqli_stmt->execute())
				throw new Exception($sql_stmt.': '.$mysqli_stmt->error);
			if((!$mysqli_stmt->store_result())||(!$mysqli_stmt->bind_result($ID, $Identifier, $UserID)))
				throw new Exception('Unable to store or bind results of query: '.$mysqli_stmt->error);
			while($mysqli_stmt->fetch())
			{
				$row = ((object)array('ID'=>$ID, 'Identifier'=>$Identifier, 'UserID'=>$UserID));
				if(is_null($row->ID))
					throw new Exception("Value 'null' is not allowed for 'ID'");
				if(is_null($row->UserID))
					throw new Exception("Value 'null' is not allowed for 'UserID'");
				$rv[] = $row;
			}
			$mysqli_stmt->close();
		}
		catch(Exception $e)
		{
			$mysqli_stmt->close();
			throw $e;
		}
		return $rv;
	}
	public function NewEquipment($Equipment_TypeID)
	{
		if(is_null($Equipment_TypeID))
			throw new Exception('ArgumentNullException: Equipment_TypeID');
		$sql_stmt = 'INSERT INTO "t_es_dev_u_Equipment"("c_r_Equipment Type") VALUES (?)';
		$mysqli_stmt = $this->ConnectionResource->prepare($sql_stmt);
		if($mysqli_stmt===FALSE)
			throw new Exception($sql_stmt.': prepare statement failed: '.$this->ConnectionResource->error);
		try
		{
			if(!$mysqli_stmt->bind_param('i', $Equipment_TypeID))
				throw new Exception('Bind parameters failed: '.$mysqli_stmt->error);
			if(!$mysqli_stmt->execute())
				throw new Exception($sql_stmt.': '.$mysqli_stmt->error);
			$mysqli_stmt->close();
		}
		catch(Exception $e)
		{
			$mysqli_stmt->close();
			throw $e;
		}
		$sql_stmt = 'SELECT LAST_INSERT_ID()';
		$mysqli_stmt = $this->ConnectionResource->prepare($sql_stmt);
		if($mysqli_stmt===FALSE)
			throw new Exception($sql_stmt.': prepare statement failed: '.$this->ConnectionResource->error);
		try
		{
			if(!$mysqli_stmt->execute())
				throw new Exception($sql_stmt.': '.$mysqli_stmt->error);
			if((!$mysqli_stmt->store_result())||(!$mysqli_stmt->bind_result($rv)))
				throw new Exception('Unable to store or bind results of query: '.$mysqli_stmt->error);
			$mysqli_stmt->fetch();
			$rv = ((int)$rv);
			$mysqli_stmt->close();
		}
		catch(Exception $e)
		{
			$mysqli_stmt->close();
			throw $e;
		}
		return $rv;
	}
	public function DeleteEquipment($ID)
	{
		if(is_null($ID))
			throw new Exception('ArgumentNullException: ID');
		$sql_stmt = 'DELETE FROM "t_es_dev_u_Equipment" WHERE "c_id" = ?';
		$mysqli_stmt = $this->ConnectionResource->prepare($sql_stmt);
		if($mysqli_stmt===FALSE)
			throw new Exception($sql_stmt.': prepare statement failed: '.$this->ConnectionResource->error);
		try
		{
			if(!$mysqli_stmt->bind_param('i', $ID))
				throw new Exception('Bind parameters failed: '.$mysqli_stmt->error);
			if(!$mysqli_stmt->execute())
				throw new Exception($sql_stmt.': '.$mysqli_stmt->error);
			$rv = ((int)$mysqli_stmt->affected_rows);
			$mysqli_stmt->close();
		}
		catch(Exception $e)
		{
			$mysqli_stmt->close();
			throw $e;
		}
		if($rv!==1)
			throw new Exception('Operation resulted in '.$rv.' row(s) being deleted');
		return $rv;
	}
	public function GetEquipment($ID)
	{
		if(is_null($ID))
			throw new Exception('ArgumentNullException: ID');
		$rv = NULL;
		$sql_stmt = 'SELECT "c_id", "c_u_Name", "c_r_Equipment Type" FROM "t_es_dev_u_Equipment" WHERE "c_id" = (?) LIMIT 2';
		$mysqli_stmt = $this->ConnectionResource->prepare($sql_stmt);
		if($mysqli_stmt===FALSE)
			throw new Exception($sql_stmt.': prepare statement failed: '.$this->ConnectionResource->error);
		try
		{
			if(!$mysqli_stmt->bind_param('i', $ID))
				throw new Exception('Bind parameters failed: '.$mysqli_stmt->error);
			if(!$mysqli_stmt->execute())
				throw new Exception($sql_stmt.': '.$mysqli_stmt->error);
			if((!$mysqli_stmt->store_result())||(!$mysqli_stmt->bind_result($ID, $Name, $Equipment_TypeID)))
				throw new Exception('Unable to store or bind results of query: '.$mysqli_stmt->error);
			while($mysqli_stmt->fetch())
			{
				if(!is_null($rv))
					throw new Exception('Operation selected more than one row');
				$rv = ((object)array('ID'=>$ID, 'Name'=>$Name, 'Equipment_TypeID'=>$Equipment_TypeID));
				if(is_null($rv->ID))
					throw new Exception("Value 'null' is not allowed for 'ID'");
				if(is_null($rv->Equipment_TypeID))
					throw new Exception("Value 'null' is not allowed for 'Equipment_TypeID'");
			}
			$mysqli_stmt->close();
		}
		catch(Exception $e)
		{
			$mysqli_stmt->close();
			throw $e;
		}
		if(is_null($rv))
			throw new Exception('Operation selected no rows');
		return $rv;
	}
	public function SetEquipment($ID, $Name, $Equipment_TypeID)
	{
		if(is_null($ID))
			throw new Exception('ArgumentNullException: ID');
		if(is_null($Equipment_TypeID))
			throw new Exception('ArgumentNullException: Equipment_TypeID');
		$sql_stmt = 'UPDATE "t_es_dev_u_Equipment" SET "c_id" = (?), "c_u_Name" = (?), "c_r_Equipment Type" = (?) WHERE ((c_id) = (?))';
		$mysqli_stmt = $this->ConnectionResource->prepare($sql_stmt);
		if($mysqli_stmt===FALSE)
			throw new Exception($sql_stmt.': prepare statement failed: '.$this->ConnectionResource->error);
		try
		{
			if(!$mysqli_stmt->bind_param('isii', $ID, $Name, $Equipment_TypeID, $ID))
				throw new Exception('Bind parameters failed: '.$mysqli_stmt->error);
			if(!$mysqli_stmt->execute())
				throw new Exception($sql_stmt.': '.$mysqli_stmt->error);
			$rv = ((int)$mysqli_stmt->affected_rows);
			$mysqli_stmt->close();
		}
		catch(Exception $e)
		{
			$mysqli_stmt->close();
			throw $e;
		}
		if($rv!==1)
			throw new Exception('Operation resulted in '.$rv.' row(s) being updated');
		return $rv;
	}
	public function ListEquipment($maxRowsToReturn)
	{
		$rv = array();
		$sql_stmt = ' "c_id", "c_u_Name", "c_r_Equipment Type" FROM "t_es_dev_u_Equipment"';
		if($maxRowsToReturn&&(preg_match('/^\\s*\\d*(\\s*,\\s*\\d+)?\\s*$/', $maxRowsToReturn)==1))
			$sql_stmt = ($sql_stmt.' LIMIT '.$maxRowsToReturn);
		$sql_stmt = ('SELECT '.$sql_stmt);
		$mysqli_stmt = $this->ConnectionResource->prepare($sql_stmt);
		if($mysqli_stmt===FALSE)
			throw new Exception($sql_stmt.': prepare statement failed: '.$this->ConnectionResource->error);
		try
		{
			if(!$mysqli_stmt->execute())
				throw new Exception($sql_stmt.': '.$mysqli_stmt->error);
			if((!$mysqli_stmt->store_result())||(!$mysqli_stmt->bind_result($ID, $Name, $Equipment_TypeID)))
				throw new Exception('Unable to store or bind results of query: '.$mysqli_stmt->error);
			while($mysqli_stmt->fetch())
			{
				$row = ((object)array('ID'=>$ID, 'Name'=>$Name, 'Equipment_TypeID'=>$Equipment_TypeID));
				if(is_null($row->ID))
					throw new Exception("Value 'null' is not allowed for 'ID'");
				if(is_null($row->Equipment_TypeID))
					throw new Exception("Value 'null' is not allowed for 'Equipment_TypeID'");
				$rv[] = $row;
			}
			$mysqli_stmt->close();
		}
		catch(Exception $e)
		{
			$mysqli_stmt->close();
			throw $e;
		}
		return $rv;
	}
	public function ListEquipmentByEquipment_Type($maxRowsToReturn, $Equipment_TypeID)
	{
		if(is_null($Equipment_TypeID))
			throw new Exception('ArgumentNullException: Equipment_TypeID');
		$rv = array();
		$sql_stmt = ' "c_id", "c_u_Name", "c_r_Equipment Type" FROM "t_es_dev_u_Equipment" WHERE "c_r_Equipment Type"=?';
		if($maxRowsToReturn&&(preg_match('/^\\s*\\d*(\\s*,\\s*\\d+)?\\s*$/', $maxRowsToReturn)==1))
			$sql_stmt = ($sql_stmt.' LIMIT '.$maxRowsToReturn);
		$sql_stmt = ('SELECT '.$sql_stmt);
		$mysqli_stmt = $this->ConnectionResource->prepare($sql_stmt);
		if($mysqli_stmt===FALSE)
			throw new Exception($sql_stmt.': prepare statement failed: '.$this->ConnectionResource->error);
		try
		{
			if(!$mysqli_stmt->bind_param('i', $Equipment_TypeID))
				throw new Exception('Bind parameters failed: '.$mysqli_stmt->error);
			if(!$mysqli_stmt->execute())
				throw new Exception($sql_stmt.': '.$mysqli_stmt->error);
			if((!$mysqli_stmt->store_result())||(!$mysqli_stmt->bind_result($ID, $Name, $Equipment_TypeID)))
				throw new Exception('Unable to store or bind results of query: '.$mysqli_stmt->error);
			while($mysqli_stmt->fetch())
			{
				$row = ((object)array('ID'=>$ID, 'Name'=>$Name, 'Equipment_TypeID'=>$Equipment_TypeID));
				if(is_null($row->ID))
					throw new Exception("Value 'null' is not allowed for 'ID'");
				if(is_null($row->Equipment_TypeID))
					throw new Exception("Value 'null' is not allowed for 'Equipment_TypeID'");
				$rv[] = $row;
			}
			$mysqli_stmt->close();
		}
		catch(Exception $e)
		{
			$mysqli_stmt->close();
			throw $e;
		}
		return $rv;
	}
	public function NewEquipment_Type()
	{
		$sql_stmt = 'INSERT INTO "t_es_dev_u_Equipment Type"() VALUES ()';
		$mysqli_stmt = $this->ConnectionResource->prepare($sql_stmt);
		if($mysqli_stmt===FALSE)
			throw new Exception($sql_stmt.': prepare statement failed: '.$this->ConnectionResource->error);
		try
		{
			if(!$mysqli_stmt->execute())
				throw new Exception($sql_stmt.': '.$mysqli_stmt->error);
			$mysqli_stmt->close();
		}
		catch(Exception $e)
		{
			$mysqli_stmt->close();
			throw $e;
		}
		$sql_stmt = 'SELECT LAST_INSERT_ID()';
		$mysqli_stmt = $this->ConnectionResource->prepare($sql_stmt);
		if($mysqli_stmt===FALSE)
			throw new Exception($sql_stmt.': prepare statement failed: '.$this->ConnectionResource->error);
		try
		{
			if(!$mysqli_stmt->execute())
				throw new Exception($sql_stmt.': '.$mysqli_stmt->error);
			if((!$mysqli_stmt->store_result())||(!$mysqli_stmt->bind_result($rv)))
				throw new Exception('Unable to store or bind results of query: '.$mysqli_stmt->error);
			$mysqli_stmt->fetch();
			$rv = ((int)$rv);
			$mysqli_stmt->close();
		}
		catch(Exception $e)
		{
			$mysqli_stmt->close();
			throw $e;
		}
		return $rv;
	}
	public function DeleteEquipment_Type($ID)
	{
		if(is_null($ID))
			throw new Exception('ArgumentNullException: ID');
		$sql_stmt = 'DELETE FROM "t_es_dev_u_Equipment Type" WHERE "c_id" = ?';
		$mysqli_stmt = $this->ConnectionResource->prepare($sql_stmt);
		if($mysqli_stmt===FALSE)
			throw new Exception($sql_stmt.': prepare statement failed: '.$this->ConnectionResource->error);
		try
		{
			if(!$mysqli_stmt->bind_param('i', $ID))
				throw new Exception('Bind parameters failed: '.$mysqli_stmt->error);
			if(!$mysqli_stmt->execute())
				throw new Exception($sql_stmt.': '.$mysqli_stmt->error);
			$rv = ((int)$mysqli_stmt->affected_rows);
			$mysqli_stmt->close();
		}
		catch(Exception $e)
		{
			$mysqli_stmt->close();
			throw $e;
		}
		if($rv!==1)
			throw new Exception('Operation resulted in '.$rv.' row(s) being deleted');
		return $rv;
	}
	public function GetEquipment_Type($ID)
	{
		if(is_null($ID))
			throw new Exception('ArgumentNullException: ID');
		$rv = NULL;
		$sql_stmt = 'SELECT "c_id", "c_u_Name" FROM "t_es_dev_u_Equipment Type" WHERE "c_id" = (?) LIMIT 2';
		$mysqli_stmt = $this->ConnectionResource->prepare($sql_stmt);
		if($mysqli_stmt===FALSE)
			throw new Exception($sql_stmt.': prepare statement failed: '.$this->ConnectionResource->error);
		try
		{
			if(!$mysqli_stmt->bind_param('i', $ID))
				throw new Exception('Bind parameters failed: '.$mysqli_stmt->error);
			if(!$mysqli_stmt->execute())
				throw new Exception($sql_stmt.': '.$mysqli_stmt->error);
			if((!$mysqli_stmt->store_result())||(!$mysqli_stmt->bind_result($ID, $Name)))
				throw new Exception('Unable to store or bind results of query: '.$mysqli_stmt->error);
			while($mysqli_stmt->fetch())
			{
				if(!is_null($rv))
					throw new Exception('Operation selected more than one row');
				$rv = ((object)array('ID'=>$ID, 'Name'=>$Name));
				if(is_null($rv->ID))
					throw new Exception("Value 'null' is not allowed for 'ID'");
			}
			$mysqli_stmt->close();
		}
		catch(Exception $e)
		{
			$mysqli_stmt->close();
			throw $e;
		}
		if(is_null($rv))
			throw new Exception('Operation selected no rows');
		return $rv;
	}
	public function SetEquipment_Type($ID, $Name)
	{
		if(is_null($ID))
			throw new Exception('ArgumentNullException: ID');
		$sql_stmt = 'UPDATE "t_es_dev_u_Equipment Type" SET "c_id" = (?), "c_u_Name" = (?) WHERE ((c_id) = (?))';
		$mysqli_stmt = $this->ConnectionResource->prepare($sql_stmt);
		if($mysqli_stmt===FALSE)
			throw new Exception($sql_stmt.': prepare statement failed: '.$this->ConnectionResource->error);
		try
		{
			if(!$mysqli_stmt->bind_param('isi', $ID, $Name, $ID))
				throw new Exception('Bind parameters failed: '.$mysqli_stmt->error);
			if(!$mysqli_stmt->execute())
				throw new Exception($sql_stmt.': '.$mysqli_stmt->error);
			$rv = ((int)$mysqli_stmt->affected_rows);
			$mysqli_stmt->close();
		}
		catch(Exception $e)
		{
			$mysqli_stmt->close();
			throw $e;
		}
		if($rv!==1)
			throw new Exception('Operation resulted in '.$rv.' row(s) being updated');
		return $rv;
	}
	public function ListEquipment_Type($maxRowsToReturn)
	{
		$rv = array();
		$sql_stmt = ' "c_id", "c_u_Name" FROM "t_es_dev_u_Equipment Type"';
		if($maxRowsToReturn&&(preg_match('/^\\s*\\d*(\\s*,\\s*\\d+)?\\s*$/', $maxRowsToReturn)==1))
			$sql_stmt = ($sql_stmt.' LIMIT '.$maxRowsToReturn);
		$sql_stmt = ('SELECT '.$sql_stmt);
		$mysqli_stmt = $this->ConnectionResource->prepare($sql_stmt);
		if($mysqli_stmt===FALSE)
			throw new Exception($sql_stmt.': prepare statement failed: '.$this->ConnectionResource->error);
		try
		{
			if(!$mysqli_stmt->execute())
				throw new Exception($sql_stmt.': '.$mysqli_stmt->error);
			if((!$mysqli_stmt->store_result())||(!$mysqli_stmt->bind_result($ID, $Name)))
				throw new Exception('Unable to store or bind results of query: '.$mysqli_stmt->error);
			while($mysqli_stmt->fetch())
			{
				$row = ((object)array('ID'=>$ID, 'Name'=>$Name));
				if(is_null($row->ID))
					throw new Exception("Value 'null' is not allowed for 'ID'");
				$rv[] = $row;
			}
			$mysqli_stmt->close();
		}
		catch(Exception $e)
		{
			$mysqli_stmt->close();
			throw $e;
		}
		return $rv;
	}
	public function NewReview_Equipment($EquipmentID)
	{
		if(is_null($EquipmentID))
			throw new Exception('ArgumentNullException: EquipmentID');
		$sql_stmt = 'INSERT INTO "t_es_dev_u_Review Equipment"("c_r_Equipment") VALUES (?)';
		$mysqli_stmt = $this->ConnectionResource->prepare($sql_stmt);
		if($mysqli_stmt===FALSE)
			throw new Exception($sql_stmt.': prepare statement failed: '.$this->ConnectionResource->error);
		try
		{
			if(!$mysqli_stmt->bind_param('i', $EquipmentID))
				throw new Exception('Bind parameters failed: '.$mysqli_stmt->error);
			if(!$mysqli_stmt->execute())
				throw new Exception($sql_stmt.': '.$mysqli_stmt->error);
			$mysqli_stmt->close();
		}
		catch(Exception $e)
		{
			$mysqli_stmt->close();
			throw $e;
		}
		$sql_stmt = 'SELECT LAST_INSERT_ID()';
		$mysqli_stmt = $this->ConnectionResource->prepare($sql_stmt);
		if($mysqli_stmt===FALSE)
			throw new Exception($sql_stmt.': prepare statement failed: '.$this->ConnectionResource->error);
		try
		{
			if(!$mysqli_stmt->execute())
				throw new Exception($sql_stmt.': '.$mysqli_stmt->error);
			if((!$mysqli_stmt->store_result())||(!$mysqli_stmt->bind_result($rv)))
				throw new Exception('Unable to store or bind results of query: '.$mysqli_stmt->error);
			$mysqli_stmt->fetch();
			$rv = ((int)$rv);
			$mysqli_stmt->close();
		}
		catch(Exception $e)
		{
			$mysqli_stmt->close();
			throw $e;
		}
		return $rv;
	}
	public function DeleteReview_Equipment($ID)
	{
		if(is_null($ID))
			throw new Exception('ArgumentNullException: ID');
		$sql_stmt = 'DELETE FROM "t_es_dev_u_Review Equipment" WHERE "c_id" = ?';
		$mysqli_stmt = $this->ConnectionResource->prepare($sql_stmt);
		if($mysqli_stmt===FALSE)
			throw new Exception($sql_stmt.': prepare statement failed: '.$this->ConnectionResource->error);
		try
		{
			if(!$mysqli_stmt->bind_param('i', $ID))
				throw new Exception('Bind parameters failed: '.$mysqli_stmt->error);
			if(!$mysqli_stmt->execute())
				throw new Exception($sql_stmt.': '.$mysqli_stmt->error);
			$rv = ((int)$mysqli_stmt->affected_rows);
			$mysqli_stmt->close();
		}
		catch(Exception $e)
		{
			$mysqli_stmt->close();
			throw $e;
		}
		if($rv!==1)
			throw new Exception('Operation resulted in '.$rv.' row(s) being deleted');
		return $rv;
	}
	public function GetReview_Equipment($ID)
	{
		if(is_null($ID))
			throw new Exception('ArgumentNullException: ID');
		$rv = NULL;
		$sql_stmt = 'SELECT "c_id", "c_r_Equipment", "c_u_Name" FROM "t_es_dev_u_Review Equipment" WHERE "c_id" = (?) LIMIT 2';
		$mysqli_stmt = $this->ConnectionResource->prepare($sql_stmt);
		if($mysqli_stmt===FALSE)
			throw new Exception($sql_stmt.': prepare statement failed: '.$this->ConnectionResource->error);
		try
		{
			if(!$mysqli_stmt->bind_param('i', $ID))
				throw new Exception('Bind parameters failed: '.$mysqli_stmt->error);
			if(!$mysqli_stmt->execute())
				throw new Exception($sql_stmt.': '.$mysqli_stmt->error);
			if((!$mysqli_stmt->store_result())||(!$mysqli_stmt->bind_result($ID, $EquipmentID, $Name)))
				throw new Exception('Unable to store or bind results of query: '.$mysqli_stmt->error);
			while($mysqli_stmt->fetch())
			{
				if(!is_null($rv))
					throw new Exception('Operation selected more than one row');
				$rv = ((object)array('ID'=>$ID, 'EquipmentID'=>$EquipmentID, 'Name'=>$Name));
				if(is_null($rv->ID))
					throw new Exception("Value 'null' is not allowed for 'ID'");
				if(is_null($rv->EquipmentID))
					throw new Exception("Value 'null' is not allowed for 'EquipmentID'");
			}
			$mysqli_stmt->close();
		}
		catch(Exception $e)
		{
			$mysqli_stmt->close();
			throw $e;
		}
		if(is_null($rv))
			throw new Exception('Operation selected no rows');
		return $rv;
	}
	public function SetReview_Equipment($ID, $EquipmentID, $Name)
	{
		if(is_null($ID))
			throw new Exception('ArgumentNullException: ID');
		if(is_null($EquipmentID))
			throw new Exception('ArgumentNullException: EquipmentID');
		$sql_stmt = 'UPDATE "t_es_dev_u_Review Equipment" SET "c_id" = (?), "c_r_Equipment" = (?), "c_u_Name" = (?) WHERE ((c_id) = (?))';
		$mysqli_stmt = $this->ConnectionResource->prepare($sql_stmt);
		if($mysqli_stmt===FALSE)
			throw new Exception($sql_stmt.': prepare statement failed: '.$this->ConnectionResource->error);
		try
		{
			if(!$mysqli_stmt->bind_param('iisi', $ID, $EquipmentID, $Name, $ID))
				throw new Exception('Bind parameters failed: '.$mysqli_stmt->error);
			if(!$mysqli_stmt->execute())
				throw new Exception($sql_stmt.': '.$mysqli_stmt->error);
			$rv = ((int)$mysqli_stmt->affected_rows);
			$mysqli_stmt->close();
		}
		catch(Exception $e)
		{
			$mysqli_stmt->close();
			throw $e;
		}
		if($rv!==1)
			throw new Exception('Operation resulted in '.$rv.' row(s) being updated');
		return $rv;
	}
	public function ListReview_Equipment($maxRowsToReturn)
	{
		$rv = array();
		$sql_stmt = ' "c_id", "c_r_Equipment", "c_u_Name" FROM "t_es_dev_u_Review Equipment"';
		if($maxRowsToReturn&&(preg_match('/^\\s*\\d*(\\s*,\\s*\\d+)?\\s*$/', $maxRowsToReturn)==1))
			$sql_stmt = ($sql_stmt.' LIMIT '.$maxRowsToReturn);
		$sql_stmt = ('SELECT '.$sql_stmt);
		$mysqli_stmt = $this->ConnectionResource->prepare($sql_stmt);
		if($mysqli_stmt===FALSE)
			throw new Exception($sql_stmt.': prepare statement failed: '.$this->ConnectionResource->error);
		try
		{
			if(!$mysqli_stmt->execute())
				throw new Exception($sql_stmt.': '.$mysqli_stmt->error);
			if((!$mysqli_stmt->store_result())||(!$mysqli_stmt->bind_result($ID, $EquipmentID, $Name)))
				throw new Exception('Unable to store or bind results of query: '.$mysqli_stmt->error);
			while($mysqli_stmt->fetch())
			{
				$row = ((object)array('ID'=>$ID, 'EquipmentID'=>$EquipmentID, 'Name'=>$Name));
				if(is_null($row->ID))
					throw new Exception("Value 'null' is not allowed for 'ID'");
				if(is_null($row->EquipmentID))
					throw new Exception("Value 'null' is not allowed for 'EquipmentID'");
				$rv[] = $row;
			}
			$mysqli_stmt->close();
		}
		catch(Exception $e)
		{
			$mysqli_stmt->close();
			throw $e;
		}
		return $rv;
	}
	public function ListReview_EquipmentByReview($maxRowsToReturn)
	{
		$rv = array();
		$sql_stmt = ' "c_id", "c_r_Equipment", "c_u_Name" FROM "t_es_dev_u_Review Equipment"';
		if($maxRowsToReturn&&(preg_match('/^\\s*\\d*(\\s*,\\s*\\d+)?\\s*$/', $maxRowsToReturn)==1))
			$sql_stmt = ($sql_stmt.' LIMIT '.$maxRowsToReturn);
		$sql_stmt = ('SELECT '.$sql_stmt);
		$mysqli_stmt = $this->ConnectionResource->prepare($sql_stmt);
		if($mysqli_stmt===FALSE)
			throw new Exception($sql_stmt.': prepare statement failed: '.$this->ConnectionResource->error);
		try
		{
			if(!$mysqli_stmt->execute())
				throw new Exception($sql_stmt.': '.$mysqli_stmt->error);
			if((!$mysqli_stmt->store_result())||(!$mysqli_stmt->bind_result($ID, $EquipmentID, $Name)))
				throw new Exception('Unable to store or bind results of query: '.$mysqli_stmt->error);
			while($mysqli_stmt->fetch())
			{
				$row = ((object)array('ID'=>$ID, 'EquipmentID'=>$EquipmentID, 'Name'=>$Name));
				if(is_null($row->ID))
					throw new Exception("Value 'null' is not allowed for 'ID'");
				if(is_null($row->EquipmentID))
					throw new Exception("Value 'null' is not allowed for 'EquipmentID'");
				$rv[] = $row;
			}
			$mysqli_stmt->close();
		}
		catch(Exception $e)
		{
			$mysqli_stmt->close();
			throw $e;
		}
		return $rv;
	}
	public function ListReview_EquipmentByEquipment($maxRowsToReturn, $EquipmentID)
	{
		if(is_null($EquipmentID))
			throw new Exception('ArgumentNullException: EquipmentID');
		$rv = array();
		$sql_stmt = ' "c_id", "c_r_Equipment", "c_u_Name" FROM "t_es_dev_u_Review Equipment" WHERE "c_r_Equipment"=?';
		if($maxRowsToReturn&&(preg_match('/^\\s*\\d*(\\s*,\\s*\\d+)?\\s*$/', $maxRowsToReturn)==1))
			$sql_stmt = ($sql_stmt.' LIMIT '.$maxRowsToReturn);
		$sql_stmt = ('SELECT '.$sql_stmt);
		$mysqli_stmt = $this->ConnectionResource->prepare($sql_stmt);
		if($mysqli_stmt===FALSE)
			throw new Exception($sql_stmt.': prepare statement failed: '.$this->ConnectionResource->error);
		try
		{
			if(!$mysqli_stmt->bind_param('i', $EquipmentID))
				throw new Exception('Bind parameters failed: '.$mysqli_stmt->error);
			if(!$mysqli_stmt->execute())
				throw new Exception($sql_stmt.': '.$mysqli_stmt->error);
			if((!$mysqli_stmt->store_result())||(!$mysqli_stmt->bind_result($ID, $EquipmentID, $Name)))
				throw new Exception('Unable to store or bind results of query: '.$mysqli_stmt->error);
			while($mysqli_stmt->fetch())
			{
				$row = ((object)array('ID'=>$ID, 'EquipmentID'=>$EquipmentID, 'Name'=>$Name));
				if(is_null($row->ID))
					throw new Exception("Value 'null' is not allowed for 'ID'");
				if(is_null($row->EquipmentID))
					throw new Exception("Value 'null' is not allowed for 'EquipmentID'");
				$rv[] = $row;
			}
			$mysqli_stmt->close();
		}
		catch(Exception $e)
		{
			$mysqli_stmt->close();
			throw $e;
		}
		return $rv;
	}
	public function NewReview_Type()
	{
		$sql_stmt = 'INSERT INTO "t_es_dev_u_Review Type"() VALUES ()';
		$mysqli_stmt = $this->ConnectionResource->prepare($sql_stmt);
		if($mysqli_stmt===FALSE)
			throw new Exception($sql_stmt.': prepare statement failed: '.$this->ConnectionResource->error);
		try
		{
			if(!$mysqli_stmt->execute())
				throw new Exception($sql_stmt.': '.$mysqli_stmt->error);
			$mysqli_stmt->close();
		}
		catch(Exception $e)
		{
			$mysqli_stmt->close();
			throw $e;
		}
		$sql_stmt = 'SELECT LAST_INSERT_ID()';
		$mysqli_stmt = $this->ConnectionResource->prepare($sql_stmt);
		if($mysqli_stmt===FALSE)
			throw new Exception($sql_stmt.': prepare statement failed: '.$this->ConnectionResource->error);
		try
		{
			if(!$mysqli_stmt->execute())
				throw new Exception($sql_stmt.': '.$mysqli_stmt->error);
			if((!$mysqli_stmt->store_result())||(!$mysqli_stmt->bind_result($rv)))
				throw new Exception('Unable to store or bind results of query: '.$mysqli_stmt->error);
			$mysqli_stmt->fetch();
			$rv = ((int)$rv);
			$mysqli_stmt->close();
		}
		catch(Exception $e)
		{
			$mysqli_stmt->close();
			throw $e;
		}
		return $rv;
	}
	public function DeleteReview_Type($ID)
	{
		if(is_null($ID))
			throw new Exception('ArgumentNullException: ID');
		$sql_stmt = 'DELETE FROM "t_es_dev_u_Review Type" WHERE "c_id" = ?';
		$mysqli_stmt = $this->ConnectionResource->prepare($sql_stmt);
		if($mysqli_stmt===FALSE)
			throw new Exception($sql_stmt.': prepare statement failed: '.$this->ConnectionResource->error);
		try
		{
			if(!$mysqli_stmt->bind_param('i', $ID))
				throw new Exception('Bind parameters failed: '.$mysqli_stmt->error);
			if(!$mysqli_stmt->execute())
				throw new Exception($sql_stmt.': '.$mysqli_stmt->error);
			$rv = ((int)$mysqli_stmt->affected_rows);
			$mysqli_stmt->close();
		}
		catch(Exception $e)
		{
			$mysqli_stmt->close();
			throw $e;
		}
		if($rv!==1)
			throw new Exception('Operation resulted in '.$rv.' row(s) being deleted');
		return $rv;
	}
	public function GetReview_Type($ID)
	{
		if(is_null($ID))
			throw new Exception('ArgumentNullException: ID');
		$rv = NULL;
		$sql_stmt = 'SELECT "c_id", "c_u_Name" FROM "t_es_dev_u_Review Type" WHERE "c_id" = (?) LIMIT 2';
		$mysqli_stmt = $this->ConnectionResource->prepare($sql_stmt);
		if($mysqli_stmt===FALSE)
			throw new Exception($sql_stmt.': prepare statement failed: '.$this->ConnectionResource->error);
		try
		{
			if(!$mysqli_stmt->bind_param('i', $ID))
				throw new Exception('Bind parameters failed: '.$mysqli_stmt->error);
			if(!$mysqli_stmt->execute())
				throw new Exception($sql_stmt.': '.$mysqli_stmt->error);
			if((!$mysqli_stmt->store_result())||(!$mysqli_stmt->bind_result($ID, $Name)))
				throw new Exception('Unable to store or bind results of query: '.$mysqli_stmt->error);
			while($mysqli_stmt->fetch())
			{
				if(!is_null($rv))
					throw new Exception('Operation selected more than one row');
				$rv = ((object)array('ID'=>$ID, 'Name'=>$Name));
				if(is_null($rv->ID))
					throw new Exception("Value 'null' is not allowed for 'ID'");
			}
			$mysqli_stmt->close();
		}
		catch(Exception $e)
		{
			$mysqli_stmt->close();
			throw $e;
		}
		if(is_null($rv))
			throw new Exception('Operation selected no rows');
		return $rv;
	}
	public function SetReview_Type($ID, $Name)
	{
		if(is_null($ID))
			throw new Exception('ArgumentNullException: ID');
		$sql_stmt = 'UPDATE "t_es_dev_u_Review Type" SET "c_id" = (?), "c_u_Name" = (?) WHERE ((c_id) = (?))';
		$mysqli_stmt = $this->ConnectionResource->prepare($sql_stmt);
		if($mysqli_stmt===FALSE)
			throw new Exception($sql_stmt.': prepare statement failed: '.$this->ConnectionResource->error);
		try
		{
			if(!$mysqli_stmt->bind_param('isi', $ID, $Name, $ID))
				throw new Exception('Bind parameters failed: '.$mysqli_stmt->error);
			if(!$mysqli_stmt->execute())
				throw new Exception($sql_stmt.': '.$mysqli_stmt->error);
			$rv = ((int)$mysqli_stmt->affected_rows);
			$mysqli_stmt->close();
		}
		catch(Exception $e)
		{
			$mysqli_stmt->close();
			throw $e;
		}
		if($rv!==1)
			throw new Exception('Operation resulted in '.$rv.' row(s) being updated');
		return $rv;
	}
	public function ListReview_Type($maxRowsToReturn)
	{
		$rv = array();
		$sql_stmt = ' "c_id", "c_u_Name" FROM "t_es_dev_u_Review Type"';
		if($maxRowsToReturn&&(preg_match('/^\\s*\\d*(\\s*,\\s*\\d+)?\\s*$/', $maxRowsToReturn)==1))
			$sql_stmt = ($sql_stmt.' LIMIT '.$maxRowsToReturn);
		$sql_stmt = ('SELECT '.$sql_stmt);
		$mysqli_stmt = $this->ConnectionResource->prepare($sql_stmt);
		if($mysqli_stmt===FALSE)
			throw new Exception($sql_stmt.': prepare statement failed: '.$this->ConnectionResource->error);
		try
		{
			if(!$mysqli_stmt->execute())
				throw new Exception($sql_stmt.': '.$mysqli_stmt->error);
			if((!$mysqli_stmt->store_result())||(!$mysqli_stmt->bind_result($ID, $Name)))
				throw new Exception('Unable to store or bind results of query: '.$mysqli_stmt->error);
			while($mysqli_stmt->fetch())
			{
				$row = ((object)array('ID'=>$ID, 'Name'=>$Name));
				if(is_null($row->ID))
					throw new Exception("Value 'null' is not allowed for 'ID'");
				$rv[] = $row;
			}
			$mysqli_stmt->close();
		}
		catch(Exception $e)
		{
			$mysqli_stmt->close();
			throw $e;
		}
		return $rv;
	}
	public function NewUser($Email)
	{
		if(is_null($Email))
			throw new Exception('ArgumentNullException: Email');
		$sql_stmt = 'INSERT INTO "t_es_dev_u_User"("c_u_Email") VALUES (?)';
		$mysqli_stmt = $this->ConnectionResource->prepare($sql_stmt);
		if($mysqli_stmt===FALSE)
			throw new Exception($sql_stmt.': prepare statement failed: '.$this->ConnectionResource->error);
		try
		{
			if(!$mysqli_stmt->bind_param('s', $Email))
				throw new Exception('Bind parameters failed: '.$mysqli_stmt->error);
			if(!$mysqli_stmt->execute())
				throw new Exception($sql_stmt.': '.$mysqli_stmt->error);
			$mysqli_stmt->close();
		}
		catch(Exception $e)
		{
			$mysqli_stmt->close();
			throw $e;
		}
		$sql_stmt = 'SELECT LAST_INSERT_ID()';
		$mysqli_stmt = $this->ConnectionResource->prepare($sql_stmt);
		if($mysqli_stmt===FALSE)
			throw new Exception($sql_stmt.': prepare statement failed: '.$this->ConnectionResource->error);
		try
		{
			if(!$mysqli_stmt->execute())
				throw new Exception($sql_stmt.': '.$mysqli_stmt->error);
			if((!$mysqli_stmt->store_result())||(!$mysqli_stmt->bind_result($rv)))
				throw new Exception('Unable to store or bind results of query: '.$mysqli_stmt->error);
			$mysqli_stmt->fetch();
			$rv = ((int)$rv);
			$mysqli_stmt->close();
		}
		catch(Exception $e)
		{
			$mysqli_stmt->close();
			throw $e;
		}
		return $rv;
	}
	public function DeleteUser($ID)
	{
		if(is_null($ID))
			throw new Exception('ArgumentNullException: ID');
		$sql_stmt = 'DELETE FROM "t_es_dev_u_User" WHERE "c_id" = ?';
		$mysqli_stmt = $this->ConnectionResource->prepare($sql_stmt);
		if($mysqli_stmt===FALSE)
			throw new Exception($sql_stmt.': prepare statement failed: '.$this->ConnectionResource->error);
		try
		{
			if(!$mysqli_stmt->bind_param('i', $ID))
				throw new Exception('Bind parameters failed: '.$mysqli_stmt->error);
			if(!$mysqli_stmt->execute())
				throw new Exception($sql_stmt.': '.$mysqli_stmt->error);
			$rv = ((int)$mysqli_stmt->affected_rows);
			$mysqli_stmt->close();
		}
		catch(Exception $e)
		{
			$mysqli_stmt->close();
			throw $e;
		}
		if($rv!==1)
			throw new Exception('Operation resulted in '.$rv.' row(s) being deleted');
		return $rv;
	}
	public function GetUser($ID)
	{
		if(is_null($ID))
			throw new Exception('ArgumentNullException: ID');
		$rv = NULL;
		$sql_stmt = 'SELECT "c_id", "c_u_Email", "c_u_Password Hash", "c_u_Salt", "c_u_Name", "c_u_Email Authenticated", "c_u_Email Authorization Nonce" FROM "t_es_dev_u_User" WHERE "c_id" = (?) LIMIT 2';
		$mysqli_stmt = $this->ConnectionResource->prepare($sql_stmt);
		if($mysqli_stmt===FALSE)
			throw new Exception($sql_stmt.': prepare statement failed: '.$this->ConnectionResource->error);
		try
		{
			if(!$mysqli_stmt->bind_param('i', $ID))
				throw new Exception('Bind parameters failed: '.$mysqli_stmt->error);
			if(!$mysqli_stmt->execute())
				throw new Exception($sql_stmt.': '.$mysqli_stmt->error);
			if((!$mysqli_stmt->store_result())||(!$mysqli_stmt->bind_result($ID, $Email, $Password_Hash, $Salt, $Name, $Email_Authenticated, $Email_Authorization_Nonce)))
				throw new Exception('Unable to store or bind results of query: '.$mysqli_stmt->error);
			while($mysqli_stmt->fetch())
			{
				if(!is_null($rv))
					throw new Exception('Operation selected more than one row');
				$rv = ((object)array('ID'=>$ID, 'Email'=>$Email, 'Password_Hash'=>$Password_Hash, 'Salt'=>$Salt, 'Name'=>$Name, 'Email_Authenticated'=>$Email_Authenticated, 'Email_Authorization_Nonce'=>$Email_Authorization_Nonce));
				if(is_null($rv->ID))
					throw new Exception("Value 'null' is not allowed for 'ID'");
				if(is_null($rv->Email))
					throw new Exception("Value 'null' is not allowed for 'Email'");
				if(!is_null($rv->Email_Authenticated))
					$rv->Email_Authenticated = ((bool)$rv->Email_Authenticated);
			}
			$mysqli_stmt->close();
		}
		catch(Exception $e)
		{
			$mysqli_stmt->close();
			throw $e;
		}
		if(is_null($rv))
			throw new Exception('Operation selected no rows');
		return $rv;
	}
	public function SetUser($ID, $Email, $Password_Hash, $Salt, $Name, $Email_Authenticated, $Email_Authorization_Nonce)
	{
		if(is_null($ID))
			throw new Exception('ArgumentNullException: ID');
		if(is_null($Email))
			throw new Exception('ArgumentNullException: Email');
		$sql_stmt = 'UPDATE "t_es_dev_u_User" SET "c_id" = (?), "c_u_Email" = (?), "c_u_Password Hash" = (?), "c_u_Salt" = (?), "c_u_Name" = (?), "c_u_Email Authenticated" = (?), "c_u_Email Authorization Nonce" = (?) WHERE ((c_id) = (?))';
		$mysqli_stmt = $this->ConnectionResource->prepare($sql_stmt);
		if($mysqli_stmt===FALSE)
			throw new Exception($sql_stmt.': prepare statement failed: '.$this->ConnectionResource->error);
		try
		{
			if(!$mysqli_stmt->bind_param('issssisi', $ID, $Email, $Password_Hash, $Salt, $Name, $Email_Authenticated, $Email_Authorization_Nonce, $ID))
				throw new Exception('Bind parameters failed: '.$mysqli_stmt->error);
			if(!$mysqli_stmt->execute())
				throw new Exception($sql_stmt.': '.$mysqli_stmt->error);
			$rv = ((int)$mysqli_stmt->affected_rows);
			$mysqli_stmt->close();
		}
		catch(Exception $e)
		{
			$mysqli_stmt->close();
			throw $e;
		}
		if($rv!==1)
			throw new Exception('Operation resulted in '.$rv.' row(s) being updated');
		return $rv;
	}
	public function ListUser($maxRowsToReturn)
	{
		$rv = array();
		$sql_stmt = ' "c_id", "c_u_Email", "c_u_Password Hash", "c_u_Salt", "c_u_Name", "c_u_Email Authenticated", "c_u_Email Authorization Nonce" FROM "t_es_dev_u_User"';
		if($maxRowsToReturn&&(preg_match('/^\\s*\\d*(\\s*,\\s*\\d+)?\\s*$/', $maxRowsToReturn)==1))
			$sql_stmt = ($sql_stmt.' LIMIT '.$maxRowsToReturn);
		$sql_stmt = ('SELECT '.$sql_stmt);
		$mysqli_stmt = $this->ConnectionResource->prepare($sql_stmt);
		if($mysqli_stmt===FALSE)
			throw new Exception($sql_stmt.': prepare statement failed: '.$this->ConnectionResource->error);
		try
		{
			if(!$mysqli_stmt->execute())
				throw new Exception($sql_stmt.': '.$mysqli_stmt->error);
			if((!$mysqli_stmt->store_result())||(!$mysqli_stmt->bind_result($ID, $Email, $Password_Hash, $Salt, $Name, $Email_Authenticated, $Email_Authorization_Nonce)))
				throw new Exception('Unable to store or bind results of query: '.$mysqli_stmt->error);
			while($mysqli_stmt->fetch())
			{
				$row = ((object)array('ID'=>$ID, 'Email'=>$Email, 'Password_Hash'=>$Password_Hash, 'Salt'=>$Salt, 'Name'=>$Name, 'Email_Authenticated'=>$Email_Authenticated, 'Email_Authorization_Nonce'=>$Email_Authorization_Nonce));
				if(is_null($row->ID))
					throw new Exception("Value 'null' is not allowed for 'ID'");
				if(is_null($row->Email))
					throw new Exception("Value 'null' is not allowed for 'Email'");
				if(!is_null($row->Email_Authenticated))
					$row->Email_Authenticated = ((bool)$row->Email_Authenticated);
				$rv[] = $row;
			}
			$mysqli_stmt->close();
		}
		catch(Exception $e)
		{
			$mysqli_stmt->close();
			throw $e;
		}
		return $rv;
	}
	public function ListUserByEmail($maxRowsToReturn, $Email)
	{
		if(is_null($Email))
			throw new Exception('ArgumentNullException: Email');
		$rv = array();
		$sql_stmt = ' "c_id", "c_u_Email", "c_u_Password Hash", "c_u_Salt", "c_u_Name", "c_u_Email Authenticated", "c_u_Email Authorization Nonce" FROM "t_es_dev_u_User" WHERE "c_u_Email"=?';
		if($maxRowsToReturn&&(preg_match('/^\\s*\\d*(\\s*,\\s*\\d+)?\\s*$/', $maxRowsToReturn)==1))
			$sql_stmt = ($sql_stmt.' LIMIT '.$maxRowsToReturn);
		$sql_stmt = ('SELECT '.$sql_stmt);
		$mysqli_stmt = $this->ConnectionResource->prepare($sql_stmt);
		if($mysqli_stmt===FALSE)
			throw new Exception($sql_stmt.': prepare statement failed: '.$this->ConnectionResource->error);
		try
		{
			if(!$mysqli_stmt->bind_param('s', $Email))
				throw new Exception('Bind parameters failed: '.$mysqli_stmt->error);
			if(!$mysqli_stmt->execute())
				throw new Exception($sql_stmt.': '.$mysqli_stmt->error);
			if((!$mysqli_stmt->store_result())||(!$mysqli_stmt->bind_result($ID, $Email, $Password_Hash, $Salt, $Name, $Email_Authenticated, $Email_Authorization_Nonce)))
				throw new Exception('Unable to store or bind results of query: '.$mysqli_stmt->error);
			while($mysqli_stmt->fetch())
			{
				$row = ((object)array('ID'=>$ID, 'Email'=>$Email, 'Password_Hash'=>$Password_Hash, 'Salt'=>$Salt, 'Name'=>$Name, 'Email_Authenticated'=>$Email_Authenticated, 'Email_Authorization_Nonce'=>$Email_Authorization_Nonce));
				if(is_null($row->ID))
					throw new Exception("Value 'null' is not allowed for 'ID'");
				if(is_null($row->Email))
					throw new Exception("Value 'null' is not allowed for 'Email'");
				if(!is_null($row->Email_Authenticated))
					$row->Email_Authenticated = ((bool)$row->Email_Authenticated);
				$rv[] = $row;
			}
			$mysqli_stmt->close();
		}
		catch(Exception $e)
		{
			$mysqli_stmt->close();
			throw $e;
		}
		return $rv;
	}
	public function ListCafeByReference($maxRowsToReturn, $reference)
	{
		if(is_null($reference))
			throw new Exception('ArgumentNullException: reference');
		$rv = array();
		$sql_stmt = ' "c_id", "c_u_Name", "c_u_Latitude", "c_u_Longitude", "c_u_Address", "c_u_Google Places Reference", "c_u_Google Places Id", "c_u_Star Rating", "c_r_Region", "c_u_Monday Open", "c_u_Monday Close", "c_u_Tuesday Open", "c_u_Tuesday Close", "c_u_Wednesday Open", "c_u_Wednesday Close", "c_u_Thursday Open", "c_u_Thursday Close", "c_u_Friday Open", "c_u_Friday Close", "c_u_Saturday Open", "c_u_Saturday Close", "c_u_Sunday Open", "c_u_Sunday Close", "c_r_Chain" FROM "t_es_dev_u_Cafe" WHERE "c_u_Google Places Reference"=?';
		if($maxRowsToReturn&&(preg_match('/^\\s*\\d*(\\s*,\\s*\\d+)?\\s*$/', $maxRowsToReturn)==1))
			$sql_stmt = ($sql_stmt.' LIMIT '.$maxRowsToReturn);
		$sql_stmt = ('SELECT '.$sql_stmt);
		$mysqli_stmt = $this->ConnectionResource->prepare($sql_stmt);
		if($mysqli_stmt===FALSE)
			throw new Exception($sql_stmt.': prepare statement failed: '.$this->ConnectionResource->error);
		try
		{
			if(!$mysqli_stmt->bind_param('s', $reference))
				throw new Exception('Bind parameters failed: '.$mysqli_stmt->error);
			if(!$mysqli_stmt->execute())
				throw new Exception($sql_stmt.': '.$mysqli_stmt->error);
			if((!$mysqli_stmt->store_result())||(!$mysqli_stmt->bind_result($ID, $Name, $Latitude, $Longitude, $Address, $Google_Places_Reference, $Google_Places_Id, $Star_Rating, $RegionID, $Monday_Open, $Monday_Close, $Tuesday_Open, $Tuesday_Close, $Wednesday_Open, $Wednesday_Close, $Thursday_Open, $Thursday_Close, $Friday_Open, $Friday_Close, $Saturday_Open, $Saturday_Close, $Sunday_Open, $Sunday_Close, $ChainID)))
				throw new Exception('Unable to store or bind results of query: '.$mysqli_stmt->error);
			while($mysqli_stmt->fetch())
			{
				$row = ((object)array('ID'=>$ID, 'Name'=>$Name, 'Latitude'=>$Latitude, 'Longitude'=>$Longitude, 'Address'=>$Address, 'Google_Places_Reference'=>$Google_Places_Reference, 'Google_Places_Id'=>$Google_Places_Id, 'Star_Rating'=>$Star_Rating, 'RegionID'=>$RegionID, 'Monday_Open'=>$Monday_Open, 'Monday_Close'=>$Monday_Close, 'Tuesday_Open'=>$Tuesday_Open, 'Tuesday_Close'=>$Tuesday_Close, 'Wednesday_Open'=>$Wednesday_Open, 'Wednesday_Close'=>$Wednesday_Close, 'Thursday_Open'=>$Thursday_Open, 'Thursday_Close'=>$Thursday_Close, 'Friday_Open'=>$Friday_Open, 'Friday_Close'=>$Friday_Close, 'Saturday_Open'=>$Saturday_Open, 'Saturday_Close'=>$Saturday_Close, 'Sunday_Open'=>$Sunday_Open, 'Sunday_Close'=>$Sunday_Close, 'ChainID'=>$ChainID));
				if(is_null($row->ID))
					throw new Exception("Value 'null' is not allowed for 'ID'");
				if(is_null($row->Name))
					throw new Exception("Value 'null' is not allowed for 'Name'");
				if(is_null($row->RegionID))
					throw new Exception("Value 'null' is not allowed for 'RegionID'");
				if(!is_null($row->Monday_Open))
					$row->Monday_Open = date_format(new DateTime($row->Monday_Open, new DateTimeZone('UTC')), 'Y-m-d\\TH:i:s');
				if(!is_null($row->Monday_Close))
					$row->Monday_Close = date_format(new DateTime($row->Monday_Close, new DateTimeZone('UTC')), 'Y-m-d\\TH:i:s');
				if(!is_null($row->Tuesday_Open))
					$row->Tuesday_Open = date_format(new DateTime($row->Tuesday_Open, new DateTimeZone('UTC')), 'Y-m-d\\TH:i:s');
				if(!is_null($row->Tuesday_Close))
					$row->Tuesday_Close = date_format(new DateTime($row->Tuesday_Close, new DateTimeZone('UTC')), 'Y-m-d\\TH:i:s');
				if(!is_null($row->Wednesday_Open))
					$row->Wednesday_Open = date_format(new DateTime($row->Wednesday_Open, new DateTimeZone('UTC')), 'Y-m-d\\TH:i:s');
				if(!is_null($row->Wednesday_Close))
					$row->Wednesday_Close = date_format(new DateTime($row->Wednesday_Close, new DateTimeZone('UTC')), 'Y-m-d\\TH:i:s');
				if(!is_null($row->Thursday_Open))
					$row->Thursday_Open = date_format(new DateTime($row->Thursday_Open, new DateTimeZone('UTC')), 'Y-m-d\\TH:i:s');
				if(!is_null($row->Thursday_Close))
					$row->Thursday_Close = date_format(new DateTime($row->Thursday_Close, new DateTimeZone('UTC')), 'Y-m-d\\TH:i:s');
				if(!is_null($row->Friday_Open))
					$row->Friday_Open = date_format(new DateTime($row->Friday_Open, new DateTimeZone('UTC')), 'Y-m-d\\TH:i:s');
				if(!is_null($row->Friday_Close))
					$row->Friday_Close = date_format(new DateTime($row->Friday_Close, new DateTimeZone('UTC')), 'Y-m-d\\TH:i:s');
				if(!is_null($row->Saturday_Open))
					$row->Saturday_Open = date_format(new DateTime($row->Saturday_Open, new DateTimeZone('UTC')), 'Y-m-d\\TH:i:s');
				if(!is_null($row->Saturday_Close))
					$row->Saturday_Close = date_format(new DateTime($row->Saturday_Close, new DateTimeZone('UTC')), 'Y-m-d\\TH:i:s');
				if(!is_null($row->Sunday_Open))
					$row->Sunday_Open = date_format(new DateTime($row->Sunday_Open, new DateTimeZone('UTC')), 'Y-m-d\\TH:i:s');
				if(!is_null($row->Sunday_Close))
					$row->Sunday_Close = date_format(new DateTime($row->Sunday_Close, new DateTimeZone('UTC')), 'Y-m-d\\TH:i:s');
				$rv[] = $row;
			}
			$mysqli_stmt->close();
		}
		catch(Exception $e)
		{
			$mysqli_stmt->close();
			throw $e;
		}
		return $rv;
	}
	public function ListEquipmentTypeByName($maxRowsToReturn, $name)
	{
		if(is_null($name))
			throw new Exception('ArgumentNullException: name');
		$rv = array();
		$sql_stmt = ' "c_id", "c_u_Name" FROM "t_es_dev_u_Equipment Type" WHERE ?="c_u_Name"';
		if($maxRowsToReturn&&(preg_match('/^\\s*\\d*(\\s*,\\s*\\d+)?\\s*$/', $maxRowsToReturn)==1))
			$sql_stmt = ($sql_stmt.' LIMIT '.$maxRowsToReturn);
		$sql_stmt = ('SELECT '.$sql_stmt);
		$mysqli_stmt = $this->ConnectionResource->prepare($sql_stmt);
		if($mysqli_stmt===FALSE)
			throw new Exception($sql_stmt.': prepare statement failed: '.$this->ConnectionResource->error);
		try
		{
			if(!$mysqli_stmt->bind_param('s', $name))
				throw new Exception('Bind parameters failed: '.$mysqli_stmt->error);
			if(!$mysqli_stmt->execute())
				throw new Exception($sql_stmt.': '.$mysqli_stmt->error);
			if((!$mysqli_stmt->store_result())||(!$mysqli_stmt->bind_result($ID, $Name)))
				throw new Exception('Unable to store or bind results of query: '.$mysqli_stmt->error);
			while($mysqli_stmt->fetch())
			{
				$row = ((object)array('ID'=>$ID, 'Name'=>$Name));
				if(is_null($row->ID))
					throw new Exception("Value 'null' is not allowed for 'ID'");
				$rv[] = $row;
			}
			$mysqli_stmt->close();
		}
		catch(Exception $e)
		{
			$mysqli_stmt->close();
			throw $e;
		}
		return $rv;
	}
	public function NewBeans()
	{
		$sql_stmt = 'INSERT INTO "t_es_dev_u_Beans"() VALUES ()';
		$mysqli_stmt = $this->ConnectionResource->prepare($sql_stmt);
		if($mysqli_stmt===FALSE)
			throw new Exception($sql_stmt.': prepare statement failed: '.$this->ConnectionResource->error);
		try
		{
			if(!$mysqli_stmt->execute())
				throw new Exception($sql_stmt.': '.$mysqli_stmt->error);
			$mysqli_stmt->close();
		}
		catch(Exception $e)
		{
			$mysqli_stmt->close();
			throw $e;
		}
		$sql_stmt = 'SELECT LAST_INSERT_ID()';
		$mysqli_stmt = $this->ConnectionResource->prepare($sql_stmt);
		if($mysqli_stmt===FALSE)
			throw new Exception($sql_stmt.': prepare statement failed: '.$this->ConnectionResource->error);
		try
		{
			if(!$mysqli_stmt->execute())
				throw new Exception($sql_stmt.': '.$mysqli_stmt->error);
			if((!$mysqli_stmt->store_result())||(!$mysqli_stmt->bind_result($rv)))
				throw new Exception('Unable to store or bind results of query: '.$mysqli_stmt->error);
			$mysqli_stmt->fetch();
			$rv = ((int)$rv);
			$mysqli_stmt->close();
		}
		catch(Exception $e)
		{
			$mysqli_stmt->close();
			throw $e;
		}
		return $rv;
	}
	public function DeleteBeans($ID)
	{
		if(is_null($ID))
			throw new Exception('ArgumentNullException: ID');
		$sql_stmt = 'DELETE FROM "t_es_dev_u_Beans" WHERE "c_id" = ?';
		$mysqli_stmt = $this->ConnectionResource->prepare($sql_stmt);
		if($mysqli_stmt===FALSE)
			throw new Exception($sql_stmt.': prepare statement failed: '.$this->ConnectionResource->error);
		try
		{
			if(!$mysqli_stmt->bind_param('i', $ID))
				throw new Exception('Bind parameters failed: '.$mysqli_stmt->error);
			if(!$mysqli_stmt->execute())
				throw new Exception($sql_stmt.': '.$mysqli_stmt->error);
			$rv = ((int)$mysqli_stmt->affected_rows);
			$mysqli_stmt->close();
		}
		catch(Exception $e)
		{
			$mysqli_stmt->close();
			throw $e;
		}
		if($rv!==1)
			throw new Exception('Operation resulted in '.$rv.' row(s) being deleted');
		return $rv;
	}
	public function GetBeans($ID)
	{
		if(is_null($ID))
			throw new Exception('ArgumentNullException: ID');
		$rv = NULL;
		$sql_stmt = 'SELECT "c_id", "c_u_Name", "c_r_Grower", "c_r_Roaster" FROM "t_es_dev_u_Beans" WHERE "c_id" = (?) LIMIT 2';
		$mysqli_stmt = $this->ConnectionResource->prepare($sql_stmt);
		if($mysqli_stmt===FALSE)
			throw new Exception($sql_stmt.': prepare statement failed: '.$this->ConnectionResource->error);
		try
		{
			if(!$mysqli_stmt->bind_param('i', $ID))
				throw new Exception('Bind parameters failed: '.$mysqli_stmt->error);
			if(!$mysqli_stmt->execute())
				throw new Exception($sql_stmt.': '.$mysqli_stmt->error);
			if((!$mysqli_stmt->store_result())||(!$mysqli_stmt->bind_result($ID, $Name, $GrowerID, $RoasterID)))
				throw new Exception('Unable to store or bind results of query: '.$mysqli_stmt->error);
			while($mysqli_stmt->fetch())
			{
				if(!is_null($rv))
					throw new Exception('Operation selected more than one row');
				$rv = ((object)array('ID'=>$ID, 'Name'=>$Name, 'GrowerID'=>$GrowerID, 'RoasterID'=>$RoasterID));
				if(is_null($rv->ID))
					throw new Exception("Value 'null' is not allowed for 'ID'");
			}
			$mysqli_stmt->close();
		}
		catch(Exception $e)
		{
			$mysqli_stmt->close();
			throw $e;
		}
		if(is_null($rv))
			throw new Exception('Operation selected no rows');
		return $rv;
	}
	public function SetBeans($ID, $Name, $GrowerID, $RoasterID)
	{
		if(is_null($ID))
			throw new Exception('ArgumentNullException: ID');
		$sql_stmt = 'UPDATE "t_es_dev_u_Beans" SET "c_id" = (?), "c_u_Name" = (?), "c_r_Grower" = (?), "c_r_Roaster" = (?) WHERE ((c_id) = (?))';
		$mysqli_stmt = $this->ConnectionResource->prepare($sql_stmt);
		if($mysqli_stmt===FALSE)
			throw new Exception($sql_stmt.': prepare statement failed: '.$this->ConnectionResource->error);
		try
		{
			if(!$mysqli_stmt->bind_param('isiii', $ID, $Name, $GrowerID, $RoasterID, $ID))
				throw new Exception('Bind parameters failed: '.$mysqli_stmt->error);
			if(!$mysqli_stmt->execute())
				throw new Exception($sql_stmt.': '.$mysqli_stmt->error);
			$rv = ((int)$mysqli_stmt->affected_rows);
			$mysqli_stmt->close();
		}
		catch(Exception $e)
		{
			$mysqli_stmt->close();
			throw $e;
		}
		if($rv!==1)
			throw new Exception('Operation resulted in '.$rv.' row(s) being updated');
		return $rv;
	}
	public function ListBeans($maxRowsToReturn)
	{
		$rv = array();
		$sql_stmt = ' "c_id", "c_u_Name", "c_r_Grower", "c_r_Roaster" FROM "t_es_dev_u_Beans"';
		if($maxRowsToReturn&&(preg_match('/^\\s*\\d*(\\s*,\\s*\\d+)?\\s*$/', $maxRowsToReturn)==1))
			$sql_stmt = ($sql_stmt.' LIMIT '.$maxRowsToReturn);
		$sql_stmt = ('SELECT '.$sql_stmt);
		$mysqli_stmt = $this->ConnectionResource->prepare($sql_stmt);
		if($mysqli_stmt===FALSE)
			throw new Exception($sql_stmt.': prepare statement failed: '.$this->ConnectionResource->error);
		try
		{
			if(!$mysqli_stmt->execute())
				throw new Exception($sql_stmt.': '.$mysqli_stmt->error);
			if((!$mysqli_stmt->store_result())||(!$mysqli_stmt->bind_result($ID, $Name, $GrowerID, $RoasterID)))
				throw new Exception('Unable to store or bind results of query: '.$mysqli_stmt->error);
			while($mysqli_stmt->fetch())
			{
				$row = ((object)array('ID'=>$ID, 'Name'=>$Name, 'GrowerID'=>$GrowerID, 'RoasterID'=>$RoasterID));
				if(is_null($row->ID))
					throw new Exception("Value 'null' is not allowed for 'ID'");
				$rv[] = $row;
			}
			$mysqli_stmt->close();
		}
		catch(Exception $e)
		{
			$mysqli_stmt->close();
			throw $e;
		}
		return $rv;
	}
	public function ListBeansByGrower($maxRowsToReturn, $GrowerID)
	{
		$rv = array();
		$sql_stmt = ' "c_id", "c_u_Name", "c_r_Grower", "c_r_Roaster" FROM "t_es_dev_u_Beans" WHERE "c_r_Grower"=?';
		if($maxRowsToReturn&&(preg_match('/^\\s*\\d*(\\s*,\\s*\\d+)?\\s*$/', $maxRowsToReturn)==1))
			$sql_stmt = ($sql_stmt.' LIMIT '.$maxRowsToReturn);
		$sql_stmt = ('SELECT '.$sql_stmt);
		$mysqli_stmt = $this->ConnectionResource->prepare($sql_stmt);
		if($mysqli_stmt===FALSE)
			throw new Exception($sql_stmt.': prepare statement failed: '.$this->ConnectionResource->error);
		try
		{
			if(!$mysqli_stmt->bind_param('i', $GrowerID))
				throw new Exception('Bind parameters failed: '.$mysqli_stmt->error);
			if(!$mysqli_stmt->execute())
				throw new Exception($sql_stmt.': '.$mysqli_stmt->error);
			if((!$mysqli_stmt->store_result())||(!$mysqli_stmt->bind_result($ID, $Name, $GrowerID, $RoasterID)))
				throw new Exception('Unable to store or bind results of query: '.$mysqli_stmt->error);
			while($mysqli_stmt->fetch())
			{
				$row = ((object)array('ID'=>$ID, 'Name'=>$Name, 'GrowerID'=>$GrowerID, 'RoasterID'=>$RoasterID));
				if(is_null($row->ID))
					throw new Exception("Value 'null' is not allowed for 'ID'");
				$rv[] = $row;
			}
			$mysqli_stmt->close();
		}
		catch(Exception $e)
		{
			$mysqli_stmt->close();
			throw $e;
		}
		return $rv;
	}
	public function ListBeansByRoaster($maxRowsToReturn, $RoasterID)
	{
		$rv = array();
		$sql_stmt = ' "c_id", "c_u_Name", "c_r_Grower", "c_r_Roaster" FROM "t_es_dev_u_Beans" WHERE "c_r_Roaster"=?';
		if($maxRowsToReturn&&(preg_match('/^\\s*\\d*(\\s*,\\s*\\d+)?\\s*$/', $maxRowsToReturn)==1))
			$sql_stmt = ($sql_stmt.' LIMIT '.$maxRowsToReturn);
		$sql_stmt = ('SELECT '.$sql_stmt);
		$mysqli_stmt = $this->ConnectionResource->prepare($sql_stmt);
		if($mysqli_stmt===FALSE)
			throw new Exception($sql_stmt.': prepare statement failed: '.$this->ConnectionResource->error);
		try
		{
			if(!$mysqli_stmt->bind_param('i', $RoasterID))
				throw new Exception('Bind parameters failed: '.$mysqli_stmt->error);
			if(!$mysqli_stmt->execute())
				throw new Exception($sql_stmt.': '.$mysqli_stmt->error);
			if((!$mysqli_stmt->store_result())||(!$mysqli_stmt->bind_result($ID, $Name, $GrowerID, $RoasterID)))
				throw new Exception('Unable to store or bind results of query: '.$mysqli_stmt->error);
			while($mysqli_stmt->fetch())
			{
				$row = ((object)array('ID'=>$ID, 'Name'=>$Name, 'GrowerID'=>$GrowerID, 'RoasterID'=>$RoasterID));
				if(is_null($row->ID))
					throw new Exception("Value 'null' is not allowed for 'ID'");
				$rv[] = $row;
			}
			$mysqli_stmt->close();
		}
		catch(Exception $e)
		{
			$mysqli_stmt->close();
			throw $e;
		}
		return $rv;
	}
	public function ListCafeByGoogle_Places_Id($maxRowsToReturn, $Google_Places_Id)
	{
		$rv = array();
		$sql_stmt = ' "c_id", "c_u_Name", "c_u_Latitude", "c_u_Longitude", "c_u_Address", "c_u_Google Places Reference", "c_u_Google Places Id", "c_u_Star Rating", "c_r_Region", "c_u_Monday Open", "c_u_Monday Close", "c_u_Tuesday Open", "c_u_Tuesday Close", "c_u_Wednesday Open", "c_u_Wednesday Close", "c_u_Thursday Open", "c_u_Thursday Close", "c_u_Friday Open", "c_u_Friday Close", "c_u_Saturday Open", "c_u_Saturday Close", "c_u_Sunday Open", "c_u_Sunday Close", "c_r_Chain" FROM "t_es_dev_u_Cafe" WHERE "c_u_Google Places Id"=?';
		if($maxRowsToReturn&&(preg_match('/^\\s*\\d*(\\s*,\\s*\\d+)?\\s*$/', $maxRowsToReturn)==1))
			$sql_stmt = ($sql_stmt.' LIMIT '.$maxRowsToReturn);
		$sql_stmt = ('SELECT '.$sql_stmt);
		$mysqli_stmt = $this->ConnectionResource->prepare($sql_stmt);
		if($mysqli_stmt===FALSE)
			throw new Exception($sql_stmt.': prepare statement failed: '.$this->ConnectionResource->error);
		try
		{
			if(!$mysqli_stmt->bind_param('s', $Google_Places_Id))
				throw new Exception('Bind parameters failed: '.$mysqli_stmt->error);
			if(!$mysqli_stmt->execute())
				throw new Exception($sql_stmt.': '.$mysqli_stmt->error);
			if((!$mysqli_stmt->store_result())||(!$mysqli_stmt->bind_result($ID, $Name, $Latitude, $Longitude, $Address, $Google_Places_Reference, $Google_Places_Id, $Star_Rating, $RegionID, $Monday_Open, $Monday_Close, $Tuesday_Open, $Tuesday_Close, $Wednesday_Open, $Wednesday_Close, $Thursday_Open, $Thursday_Close, $Friday_Open, $Friday_Close, $Saturday_Open, $Saturday_Close, $Sunday_Open, $Sunday_Close, $ChainID)))
				throw new Exception('Unable to store or bind results of query: '.$mysqli_stmt->error);
			while($mysqli_stmt->fetch())
			{
				$row = ((object)array('ID'=>$ID, 'Name'=>$Name, 'Latitude'=>$Latitude, 'Longitude'=>$Longitude, 'Address'=>$Address, 'Google_Places_Reference'=>$Google_Places_Reference, 'Google_Places_Id'=>$Google_Places_Id, 'Star_Rating'=>$Star_Rating, 'RegionID'=>$RegionID, 'Monday_Open'=>$Monday_Open, 'Monday_Close'=>$Monday_Close, 'Tuesday_Open'=>$Tuesday_Open, 'Tuesday_Close'=>$Tuesday_Close, 'Wednesday_Open'=>$Wednesday_Open, 'Wednesday_Close'=>$Wednesday_Close, 'Thursday_Open'=>$Thursday_Open, 'Thursday_Close'=>$Thursday_Close, 'Friday_Open'=>$Friday_Open, 'Friday_Close'=>$Friday_Close, 'Saturday_Open'=>$Saturday_Open, 'Saturday_Close'=>$Saturday_Close, 'Sunday_Open'=>$Sunday_Open, 'Sunday_Close'=>$Sunday_Close, 'ChainID'=>$ChainID));
				if(is_null($row->ID))
					throw new Exception("Value 'null' is not allowed for 'ID'");
				if(is_null($row->Name))
					throw new Exception("Value 'null' is not allowed for 'Name'");
				if(is_null($row->RegionID))
					throw new Exception("Value 'null' is not allowed for 'RegionID'");
				if(!is_null($row->Monday_Open))
					$row->Monday_Open = date_format(new DateTime($row->Monday_Open, new DateTimeZone('UTC')), 'Y-m-d\\TH:i:s');
				if(!is_null($row->Monday_Close))
					$row->Monday_Close = date_format(new DateTime($row->Monday_Close, new DateTimeZone('UTC')), 'Y-m-d\\TH:i:s');
				if(!is_null($row->Tuesday_Open))
					$row->Tuesday_Open = date_format(new DateTime($row->Tuesday_Open, new DateTimeZone('UTC')), 'Y-m-d\\TH:i:s');
				if(!is_null($row->Tuesday_Close))
					$row->Tuesday_Close = date_format(new DateTime($row->Tuesday_Close, new DateTimeZone('UTC')), 'Y-m-d\\TH:i:s');
				if(!is_null($row->Wednesday_Open))
					$row->Wednesday_Open = date_format(new DateTime($row->Wednesday_Open, new DateTimeZone('UTC')), 'Y-m-d\\TH:i:s');
				if(!is_null($row->Wednesday_Close))
					$row->Wednesday_Close = date_format(new DateTime($row->Wednesday_Close, new DateTimeZone('UTC')), 'Y-m-d\\TH:i:s');
				if(!is_null($row->Thursday_Open))
					$row->Thursday_Open = date_format(new DateTime($row->Thursday_Open, new DateTimeZone('UTC')), 'Y-m-d\\TH:i:s');
				if(!is_null($row->Thursday_Close))
					$row->Thursday_Close = date_format(new DateTime($row->Thursday_Close, new DateTimeZone('UTC')), 'Y-m-d\\TH:i:s');
				if(!is_null($row->Friday_Open))
					$row->Friday_Open = date_format(new DateTime($row->Friday_Open, new DateTimeZone('UTC')), 'Y-m-d\\TH:i:s');
				if(!is_null($row->Friday_Close))
					$row->Friday_Close = date_format(new DateTime($row->Friday_Close, new DateTimeZone('UTC')), 'Y-m-d\\TH:i:s');
				if(!is_null($row->Saturday_Open))
					$row->Saturday_Open = date_format(new DateTime($row->Saturday_Open, new DateTimeZone('UTC')), 'Y-m-d\\TH:i:s');
				if(!is_null($row->Saturday_Close))
					$row->Saturday_Close = date_format(new DateTime($row->Saturday_Close, new DateTimeZone('UTC')), 'Y-m-d\\TH:i:s');
				if(!is_null($row->Sunday_Open))
					$row->Sunday_Open = date_format(new DateTime($row->Sunday_Open, new DateTimeZone('UTC')), 'Y-m-d\\TH:i:s');
				if(!is_null($row->Sunday_Close))
					$row->Sunday_Close = date_format(new DateTime($row->Sunday_Close, new DateTimeZone('UTC')), 'Y-m-d\\TH:i:s');
				$rv[] = $row;
			}
			$mysqli_stmt->close();
		}
		catch(Exception $e)
		{
			$mysqli_stmt->close();
			throw $e;
		}
		return $rv;
	}
	public function NewGrower()
	{
		$sql_stmt = 'INSERT INTO "t_es_dev_u_Grower"() VALUES ()';
		$mysqli_stmt = $this->ConnectionResource->prepare($sql_stmt);
		if($mysqli_stmt===FALSE)
			throw new Exception($sql_stmt.': prepare statement failed: '.$this->ConnectionResource->error);
		try
		{
			if(!$mysqli_stmt->execute())
				throw new Exception($sql_stmt.': '.$mysqli_stmt->error);
			$mysqli_stmt->close();
		}
		catch(Exception $e)
		{
			$mysqli_stmt->close();
			throw $e;
		}
		$sql_stmt = 'SELECT LAST_INSERT_ID()';
		$mysqli_stmt = $this->ConnectionResource->prepare($sql_stmt);
		if($mysqli_stmt===FALSE)
			throw new Exception($sql_stmt.': prepare statement failed: '.$this->ConnectionResource->error);
		try
		{
			if(!$mysqli_stmt->execute())
				throw new Exception($sql_stmt.': '.$mysqli_stmt->error);
			if((!$mysqli_stmt->store_result())||(!$mysqli_stmt->bind_result($rv)))
				throw new Exception('Unable to store or bind results of query: '.$mysqli_stmt->error);
			$mysqli_stmt->fetch();
			$rv = ((int)$rv);
			$mysqli_stmt->close();
		}
		catch(Exception $e)
		{
			$mysqli_stmt->close();
			throw $e;
		}
		return $rv;
	}
	public function DeleteGrower($ID)
	{
		if(is_null($ID))
			throw new Exception('ArgumentNullException: ID');
		$sql_stmt = 'DELETE FROM "t_es_dev_u_Grower" WHERE "c_id" = ?';
		$mysqli_stmt = $this->ConnectionResource->prepare($sql_stmt);
		if($mysqli_stmt===FALSE)
			throw new Exception($sql_stmt.': prepare statement failed: '.$this->ConnectionResource->error);
		try
		{
			if(!$mysqli_stmt->bind_param('i', $ID))
				throw new Exception('Bind parameters failed: '.$mysqli_stmt->error);
			if(!$mysqli_stmt->execute())
				throw new Exception($sql_stmt.': '.$mysqli_stmt->error);
			$rv = ((int)$mysqli_stmt->affected_rows);
			$mysqli_stmt->close();
		}
		catch(Exception $e)
		{
			$mysqli_stmt->close();
			throw $e;
		}
		if($rv!==1)
			throw new Exception('Operation resulted in '.$rv.' row(s) being deleted');
		return $rv;
	}
	public function GetGrower($ID)
	{
		if(is_null($ID))
			throw new Exception('ArgumentNullException: ID');
		$rv = NULL;
		$sql_stmt = 'SELECT "c_id", "c_u_Name", "c_r_Origin" FROM "t_es_dev_u_Grower" WHERE "c_id" = (?) LIMIT 2';
		$mysqli_stmt = $this->ConnectionResource->prepare($sql_stmt);
		if($mysqli_stmt===FALSE)
			throw new Exception($sql_stmt.': prepare statement failed: '.$this->ConnectionResource->error);
		try
		{
			if(!$mysqli_stmt->bind_param('i', $ID))
				throw new Exception('Bind parameters failed: '.$mysqli_stmt->error);
			if(!$mysqli_stmt->execute())
				throw new Exception($sql_stmt.': '.$mysqli_stmt->error);
			if((!$mysqli_stmt->store_result())||(!$mysqli_stmt->bind_result($ID, $Name, $OriginID)))
				throw new Exception('Unable to store or bind results of query: '.$mysqli_stmt->error);
			while($mysqli_stmt->fetch())
			{
				if(!is_null($rv))
					throw new Exception('Operation selected more than one row');
				$rv = ((object)array('ID'=>$ID, 'Name'=>$Name, 'OriginID'=>$OriginID));
				if(is_null($rv->ID))
					throw new Exception("Value 'null' is not allowed for 'ID'");
			}
			$mysqli_stmt->close();
		}
		catch(Exception $e)
		{
			$mysqli_stmt->close();
			throw $e;
		}
		if(is_null($rv))
			throw new Exception('Operation selected no rows');
		return $rv;
	}
	public function SetGrower($ID, $Name, $OriginID)
	{
		if(is_null($ID))
			throw new Exception('ArgumentNullException: ID');
		$sql_stmt = 'UPDATE "t_es_dev_u_Grower" SET "c_id" = (?), "c_u_Name" = (?), "c_r_Origin" = (?) WHERE ((c_id) = (?))';
		$mysqli_stmt = $this->ConnectionResource->prepare($sql_stmt);
		if($mysqli_stmt===FALSE)
			throw new Exception($sql_stmt.': prepare statement failed: '.$this->ConnectionResource->error);
		try
		{
			if(!$mysqli_stmt->bind_param('isii', $ID, $Name, $OriginID, $ID))
				throw new Exception('Bind parameters failed: '.$mysqli_stmt->error);
			if(!$mysqli_stmt->execute())
				throw new Exception($sql_stmt.': '.$mysqli_stmt->error);
			$rv = ((int)$mysqli_stmt->affected_rows);
			$mysqli_stmt->close();
		}
		catch(Exception $e)
		{
			$mysqli_stmt->close();
			throw $e;
		}
		if($rv!==1)
			throw new Exception('Operation resulted in '.$rv.' row(s) being updated');
		return $rv;
	}
	public function ListGrower($maxRowsToReturn)
	{
		$rv = array();
		$sql_stmt = ' "c_id", "c_u_Name", "c_r_Origin" FROM "t_es_dev_u_Grower"';
		if($maxRowsToReturn&&(preg_match('/^\\s*\\d*(\\s*,\\s*\\d+)?\\s*$/', $maxRowsToReturn)==1))
			$sql_stmt = ($sql_stmt.' LIMIT '.$maxRowsToReturn);
		$sql_stmt = ('SELECT '.$sql_stmt);
		$mysqli_stmt = $this->ConnectionResource->prepare($sql_stmt);
		if($mysqli_stmt===FALSE)
			throw new Exception($sql_stmt.': prepare statement failed: '.$this->ConnectionResource->error);
		try
		{
			if(!$mysqli_stmt->execute())
				throw new Exception($sql_stmt.': '.$mysqli_stmt->error);
			if((!$mysqli_stmt->store_result())||(!$mysqli_stmt->bind_result($ID, $Name, $OriginID)))
				throw new Exception('Unable to store or bind results of query: '.$mysqli_stmt->error);
			while($mysqli_stmt->fetch())
			{
				$row = ((object)array('ID'=>$ID, 'Name'=>$Name, 'OriginID'=>$OriginID));
				if(is_null($row->ID))
					throw new Exception("Value 'null' is not allowed for 'ID'");
				$rv[] = $row;
			}
			$mysqli_stmt->close();
		}
		catch(Exception $e)
		{
			$mysqli_stmt->close();
			throw $e;
		}
		return $rv;
	}
	public function ListGrowerByOrigin($maxRowsToReturn, $OriginID)
	{
		$rv = array();
		$sql_stmt = ' "c_id", "c_u_Name", "c_r_Origin" FROM "t_es_dev_u_Grower" WHERE "c_r_Origin"=?';
		if($maxRowsToReturn&&(preg_match('/^\\s*\\d*(\\s*,\\s*\\d+)?\\s*$/', $maxRowsToReturn)==1))
			$sql_stmt = ($sql_stmt.' LIMIT '.$maxRowsToReturn);
		$sql_stmt = ('SELECT '.$sql_stmt);
		$mysqli_stmt = $this->ConnectionResource->prepare($sql_stmt);
		if($mysqli_stmt===FALSE)
			throw new Exception($sql_stmt.': prepare statement failed: '.$this->ConnectionResource->error);
		try
		{
			if(!$mysqli_stmt->bind_param('i', $OriginID))
				throw new Exception('Bind parameters failed: '.$mysqli_stmt->error);
			if(!$mysqli_stmt->execute())
				throw new Exception($sql_stmt.': '.$mysqli_stmt->error);
			if((!$mysqli_stmt->store_result())||(!$mysqli_stmt->bind_result($ID, $Name, $OriginID)))
				throw new Exception('Unable to store or bind results of query: '.$mysqli_stmt->error);
			while($mysqli_stmt->fetch())
			{
				$row = ((object)array('ID'=>$ID, 'Name'=>$Name, 'OriginID'=>$OriginID));
				if(is_null($row->ID))
					throw new Exception("Value 'null' is not allowed for 'ID'");
				$rv[] = $row;
			}
			$mysqli_stmt->close();
		}
		catch(Exception $e)
		{
			$mysqli_stmt->close();
			throw $e;
		}
		return $rv;
	}
	public function NewOrigin()
	{
		$sql_stmt = 'INSERT INTO "t_es_dev_u_Origin"() VALUES ()';
		$mysqli_stmt = $this->ConnectionResource->prepare($sql_stmt);
		if($mysqli_stmt===FALSE)
			throw new Exception($sql_stmt.': prepare statement failed: '.$this->ConnectionResource->error);
		try
		{
			if(!$mysqli_stmt->execute())
				throw new Exception($sql_stmt.': '.$mysqli_stmt->error);
			$mysqli_stmt->close();
		}
		catch(Exception $e)
		{
			$mysqli_stmt->close();
			throw $e;
		}
		$sql_stmt = 'SELECT LAST_INSERT_ID()';
		$mysqli_stmt = $this->ConnectionResource->prepare($sql_stmt);
		if($mysqli_stmt===FALSE)
			throw new Exception($sql_stmt.': prepare statement failed: '.$this->ConnectionResource->error);
		try
		{
			if(!$mysqli_stmt->execute())
				throw new Exception($sql_stmt.': '.$mysqli_stmt->error);
			if((!$mysqli_stmt->store_result())||(!$mysqli_stmt->bind_result($rv)))
				throw new Exception('Unable to store or bind results of query: '.$mysqli_stmt->error);
			$mysqli_stmt->fetch();
			$rv = ((int)$rv);
			$mysqli_stmt->close();
		}
		catch(Exception $e)
		{
			$mysqli_stmt->close();
			throw $e;
		}
		return $rv;
	}
	public function DeleteOrigin($ID)
	{
		if(is_null($ID))
			throw new Exception('ArgumentNullException: ID');
		$sql_stmt = 'DELETE FROM "t_es_dev_u_Origin" WHERE "c_id" = ?';
		$mysqli_stmt = $this->ConnectionResource->prepare($sql_stmt);
		if($mysqli_stmt===FALSE)
			throw new Exception($sql_stmt.': prepare statement failed: '.$this->ConnectionResource->error);
		try
		{
			if(!$mysqli_stmt->bind_param('i', $ID))
				throw new Exception('Bind parameters failed: '.$mysqli_stmt->error);
			if(!$mysqli_stmt->execute())
				throw new Exception($sql_stmt.': '.$mysqli_stmt->error);
			$rv = ((int)$mysqli_stmt->affected_rows);
			$mysqli_stmt->close();
		}
		catch(Exception $e)
		{
			$mysqli_stmt->close();
			throw $e;
		}
		if($rv!==1)
			throw new Exception('Operation resulted in '.$rv.' row(s) being deleted');
		return $rv;
	}
	public function GetOrigin($ID)
	{
		if(is_null($ID))
			throw new Exception('ArgumentNullException: ID');
		$rv = NULL;
		$sql_stmt = 'SELECT "c_id", "c_u_Name" FROM "t_es_dev_u_Origin" WHERE "c_id" = (?) LIMIT 2';
		$mysqli_stmt = $this->ConnectionResource->prepare($sql_stmt);
		if($mysqli_stmt===FALSE)
			throw new Exception($sql_stmt.': prepare statement failed: '.$this->ConnectionResource->error);
		try
		{
			if(!$mysqli_stmt->bind_param('i', $ID))
				throw new Exception('Bind parameters failed: '.$mysqli_stmt->error);
			if(!$mysqli_stmt->execute())
				throw new Exception($sql_stmt.': '.$mysqli_stmt->error);
			if((!$mysqli_stmt->store_result())||(!$mysqli_stmt->bind_result($ID, $Name)))
				throw new Exception('Unable to store or bind results of query: '.$mysqli_stmt->error);
			while($mysqli_stmt->fetch())
			{
				if(!is_null($rv))
					throw new Exception('Operation selected more than one row');
				$rv = ((object)array('ID'=>$ID, 'Name'=>$Name));
				if(is_null($rv->ID))
					throw new Exception("Value 'null' is not allowed for 'ID'");
			}
			$mysqli_stmt->close();
		}
		catch(Exception $e)
		{
			$mysqli_stmt->close();
			throw $e;
		}
		if(is_null($rv))
			throw new Exception('Operation selected no rows');
		return $rv;
	}
	public function SetOrigin($ID, $Name)
	{
		if(is_null($ID))
			throw new Exception('ArgumentNullException: ID');
		$sql_stmt = 'UPDATE "t_es_dev_u_Origin" SET "c_id" = (?), "c_u_Name" = (?) WHERE ((c_id) = (?))';
		$mysqli_stmt = $this->ConnectionResource->prepare($sql_stmt);
		if($mysqli_stmt===FALSE)
			throw new Exception($sql_stmt.': prepare statement failed: '.$this->ConnectionResource->error);
		try
		{
			if(!$mysqli_stmt->bind_param('isi', $ID, $Name, $ID))
				throw new Exception('Bind parameters failed: '.$mysqli_stmt->error);
			if(!$mysqli_stmt->execute())
				throw new Exception($sql_stmt.': '.$mysqli_stmt->error);
			$rv = ((int)$mysqli_stmt->affected_rows);
			$mysqli_stmt->close();
		}
		catch(Exception $e)
		{
			$mysqli_stmt->close();
			throw $e;
		}
		if($rv!==1)
			throw new Exception('Operation resulted in '.$rv.' row(s) being updated');
		return $rv;
	}
	public function ListOrigin($maxRowsToReturn)
	{
		$rv = array();
		$sql_stmt = ' "c_id", "c_u_Name" FROM "t_es_dev_u_Origin"';
		$sql_stmt.=' ORDER BY "c_u_Name"';
		if($maxRowsToReturn&&(preg_match('/^\\s*\\d*(\\s*,\\s*\\d+)?\\s*$/', $maxRowsToReturn)==1))
			$sql_stmt = ($sql_stmt.' LIMIT '.$maxRowsToReturn);
		$sql_stmt = ('SELECT '.$sql_stmt);
		$mysqli_stmt = $this->ConnectionResource->prepare($sql_stmt);
		if($mysqli_stmt===FALSE)
			throw new Exception($sql_stmt.': prepare statement failed: '.$this->ConnectionResource->error);
		try
		{
			if(!$mysqli_stmt->execute())
				throw new Exception($sql_stmt.': '.$mysqli_stmt->error);
			if((!$mysqli_stmt->store_result())||(!$mysqli_stmt->bind_result($ID, $Name)))
				throw new Exception('Unable to store or bind results of query: '.$mysqli_stmt->error);
			while($mysqli_stmt->fetch())
			{
				$row = ((object)array('ID'=>$ID, 'Name'=>$Name));
				if(is_null($row->ID))
					throw new Exception("Value 'null' is not allowed for 'ID'");
				$rv[] = $row;
			}
			$mysqli_stmt->close();
		}
		catch(Exception $e)
		{
			$mysqli_stmt->close();
			throw $e;
		}
		return $rv;
	}
	public function NewRoaster()
	{
		$sql_stmt = 'INSERT INTO "t_es_dev_u_Roaster"() VALUES ()';
		$mysqli_stmt = $this->ConnectionResource->prepare($sql_stmt);
		if($mysqli_stmt===FALSE)
			throw new Exception($sql_stmt.': prepare statement failed: '.$this->ConnectionResource->error);
		try
		{
			if(!$mysqli_stmt->execute())
				throw new Exception($sql_stmt.': '.$mysqli_stmt->error);
			$mysqli_stmt->close();
		}
		catch(Exception $e)
		{
			$mysqli_stmt->close();
			throw $e;
		}
		$sql_stmt = 'SELECT LAST_INSERT_ID()';
		$mysqli_stmt = $this->ConnectionResource->prepare($sql_stmt);
		if($mysqli_stmt===FALSE)
			throw new Exception($sql_stmt.': prepare statement failed: '.$this->ConnectionResource->error);
		try
		{
			if(!$mysqli_stmt->execute())
				throw new Exception($sql_stmt.': '.$mysqli_stmt->error);
			if((!$mysqli_stmt->store_result())||(!$mysqli_stmt->bind_result($rv)))
				throw new Exception('Unable to store or bind results of query: '.$mysqli_stmt->error);
			$mysqli_stmt->fetch();
			$rv = ((int)$rv);
			$mysqli_stmt->close();
		}
		catch(Exception $e)
		{
			$mysqli_stmt->close();
			throw $e;
		}
		return $rv;
	}
	public function DeleteRoaster($ID)
	{
		if(is_null($ID))
			throw new Exception('ArgumentNullException: ID');
		$sql_stmt = 'DELETE FROM "t_es_dev_u_Roaster" WHERE "c_id" = ?';
		$mysqli_stmt = $this->ConnectionResource->prepare($sql_stmt);
		if($mysqli_stmt===FALSE)
			throw new Exception($sql_stmt.': prepare statement failed: '.$this->ConnectionResource->error);
		try
		{
			if(!$mysqli_stmt->bind_param('i', $ID))
				throw new Exception('Bind parameters failed: '.$mysqli_stmt->error);
			if(!$mysqli_stmt->execute())
				throw new Exception($sql_stmt.': '.$mysqli_stmt->error);
			$rv = ((int)$mysqli_stmt->affected_rows);
			$mysqli_stmt->close();
		}
		catch(Exception $e)
		{
			$mysqli_stmt->close();
			throw $e;
		}
		if($rv!==1)
			throw new Exception('Operation resulted in '.$rv.' row(s) being deleted');
		return $rv;
	}
	public function GetRoaster($ID)
	{
		if(is_null($ID))
			throw new Exception('ArgumentNullException: ID');
		$rv = NULL;
		$sql_stmt = 'SELECT "c_id", "c_u_Name" FROM "t_es_dev_u_Roaster" WHERE "c_id" = (?) LIMIT 2';
		$mysqli_stmt = $this->ConnectionResource->prepare($sql_stmt);
		if($mysqli_stmt===FALSE)
			throw new Exception($sql_stmt.': prepare statement failed: '.$this->ConnectionResource->error);
		try
		{
			if(!$mysqli_stmt->bind_param('i', $ID))
				throw new Exception('Bind parameters failed: '.$mysqli_stmt->error);
			if(!$mysqli_stmt->execute())
				throw new Exception($sql_stmt.': '.$mysqli_stmt->error);
			if((!$mysqli_stmt->store_result())||(!$mysqli_stmt->bind_result($ID, $Name)))
				throw new Exception('Unable to store or bind results of query: '.$mysqli_stmt->error);
			while($mysqli_stmt->fetch())
			{
				if(!is_null($rv))
					throw new Exception('Operation selected more than one row');
				$rv = ((object)array('ID'=>$ID, 'Name'=>$Name));
				if(is_null($rv->ID))
					throw new Exception("Value 'null' is not allowed for 'ID'");
			}
			$mysqli_stmt->close();
		}
		catch(Exception $e)
		{
			$mysqli_stmt->close();
			throw $e;
		}
		if(is_null($rv))
			throw new Exception('Operation selected no rows');
		return $rv;
	}
	public function SetRoaster($ID, $Name)
	{
		if(is_null($ID))
			throw new Exception('ArgumentNullException: ID');
		$sql_stmt = 'UPDATE "t_es_dev_u_Roaster" SET "c_id" = (?), "c_u_Name" = (?) WHERE ((c_id) = (?))';
		$mysqli_stmt = $this->ConnectionResource->prepare($sql_stmt);
		if($mysqli_stmt===FALSE)
			throw new Exception($sql_stmt.': prepare statement failed: '.$this->ConnectionResource->error);
		try
		{
			if(!$mysqli_stmt->bind_param('isi', $ID, $Name, $ID))
				throw new Exception('Bind parameters failed: '.$mysqli_stmt->error);
			if(!$mysqli_stmt->execute())
				throw new Exception($sql_stmt.': '.$mysqli_stmt->error);
			$rv = ((int)$mysqli_stmt->affected_rows);
			$mysqli_stmt->close();
		}
		catch(Exception $e)
		{
			$mysqli_stmt->close();
			throw $e;
		}
		if($rv!==1)
			throw new Exception('Operation resulted in '.$rv.' row(s) being updated');
		return $rv;
	}
	public function ListRoaster($maxRowsToReturn)
	{
		$rv = array();
		$sql_stmt = ' "c_id", "c_u_Name" FROM "t_es_dev_u_Roaster"';
		if($maxRowsToReturn&&(preg_match('/^\\s*\\d*(\\s*,\\s*\\d+)?\\s*$/', $maxRowsToReturn)==1))
			$sql_stmt = ($sql_stmt.' LIMIT '.$maxRowsToReturn);
		$sql_stmt = ('SELECT '.$sql_stmt);
		$mysqli_stmt = $this->ConnectionResource->prepare($sql_stmt);
		if($mysqli_stmt===FALSE)
			throw new Exception($sql_stmt.': prepare statement failed: '.$this->ConnectionResource->error);
		try
		{
			if(!$mysqli_stmt->execute())
				throw new Exception($sql_stmt.': '.$mysqli_stmt->error);
			if((!$mysqli_stmt->store_result())||(!$mysqli_stmt->bind_result($ID, $Name)))
				throw new Exception('Unable to store or bind results of query: '.$mysqli_stmt->error);
			while($mysqli_stmt->fetch())
			{
				$row = ((object)array('ID'=>$ID, 'Name'=>$Name));
				if(is_null($row->ID))
					throw new Exception("Value 'null' is not allowed for 'ID'");
				$rv[] = $row;
			}
			$mysqli_stmt->close();
		}
		catch(Exception $e)
		{
			$mysqli_stmt->close();
			throw $e;
		}
		return $rv;
	}
	public function ListCafesInRange($maxRowsToReturn, $Upper_Latitude, $Upper_Longitude, $Lower_Latitude, $Lower_Longitude)
	{
		if(is_null($Upper_Latitude))
			throw new Exception('ArgumentNullException: Upper_Latitude');
		if(is_null($Upper_Longitude))
			throw new Exception('ArgumentNullException: Upper_Longitude');
		if(is_null($Lower_Latitude))
			throw new Exception('ArgumentNullException: Lower_Latitude');
		if(is_null($Lower_Longitude))
			throw new Exception('ArgumentNullException: Lower_Longitude');
		$rv = array();
		$sql_stmt = ' "c_id", "c_u_Name", "c_u_Latitude", "c_u_Longitude", "c_u_Address", "c_u_Google Places Reference", "c_u_Google Places Id", "c_u_Star Rating", "c_r_Region", "c_u_Monday Open", "c_u_Monday Close", "c_u_Tuesday Open", "c_u_Tuesday Close", "c_u_Wednesday Open", "c_u_Wednesday Close", "c_u_Thursday Open", "c_u_Thursday Close", "c_u_Friday Open", "c_u_Friday Close", "c_u_Saturday Open", "c_u_Saturday Close", "c_u_Sunday Open", "c_u_Sunday Close", "c_r_Chain" FROM "t_es_dev_u_Cafe" WHERE "c_u_Latitude"<=? and "c_u_Latitude">=? and "c_u_Longitude"<=? and "c_u_Longitude">=?';
		$sql_stmt.=' ORDER BY "c_u_Name"';
		if($maxRowsToReturn&&(preg_match('/^\\s*\\d*(\\s*,\\s*\\d+)?\\s*$/', $maxRowsToReturn)==1))
			$sql_stmt = ($sql_stmt.' LIMIT '.$maxRowsToReturn);
		$sql_stmt = ('SELECT '.$sql_stmt);
		$mysqli_stmt = $this->ConnectionResource->prepare($sql_stmt);
		if($mysqli_stmt===FALSE)
			throw new Exception($sql_stmt.': prepare statement failed: '.$this->ConnectionResource->error);
		try
		{
			if(!$mysqli_stmt->bind_param('dddd', $Upper_Latitude, $Lower_Latitude, $Upper_Longitude, $Lower_Longitude))
				throw new Exception('Bind parameters failed: '.$mysqli_stmt->error);
			if(!$mysqli_stmt->execute())
				throw new Exception($sql_stmt.': '.$mysqli_stmt->error);
			if((!$mysqli_stmt->store_result())||(!$mysqli_stmt->bind_result($ID, $Name, $Latitude, $Longitude, $Address, $Google_Places_Reference, $Google_Places_Id, $Star_Rating, $RegionID, $Monday_Open, $Monday_Close, $Tuesday_Open, $Tuesday_Close, $Wednesday_Open, $Wednesday_Close, $Thursday_Open, $Thursday_Close, $Friday_Open, $Friday_Close, $Saturday_Open, $Saturday_Close, $Sunday_Open, $Sunday_Close, $ChainID)))
				throw new Exception('Unable to store or bind results of query: '.$mysqli_stmt->error);
			while($mysqli_stmt->fetch())
			{
				$row = ((object)array('ID'=>$ID, 'Name'=>$Name, 'Latitude'=>$Latitude, 'Longitude'=>$Longitude, 'Address'=>$Address, 'Google_Places_Reference'=>$Google_Places_Reference, 'Google_Places_Id'=>$Google_Places_Id, 'Star_Rating'=>$Star_Rating, 'RegionID'=>$RegionID, 'Monday_Open'=>$Monday_Open, 'Monday_Close'=>$Monday_Close, 'Tuesday_Open'=>$Tuesday_Open, 'Tuesday_Close'=>$Tuesday_Close, 'Wednesday_Open'=>$Wednesday_Open, 'Wednesday_Close'=>$Wednesday_Close, 'Thursday_Open'=>$Thursday_Open, 'Thursday_Close'=>$Thursday_Close, 'Friday_Open'=>$Friday_Open, 'Friday_Close'=>$Friday_Close, 'Saturday_Open'=>$Saturday_Open, 'Saturday_Close'=>$Saturday_Close, 'Sunday_Open'=>$Sunday_Open, 'Sunday_Close'=>$Sunday_Close, 'ChainID'=>$ChainID));
				if(is_null($row->ID))
					throw new Exception("Value 'null' is not allowed for 'ID'");
				if(is_null($row->Name))
					throw new Exception("Value 'null' is not allowed for 'Name'");
				if(is_null($row->RegionID))
					throw new Exception("Value 'null' is not allowed for 'RegionID'");
				if(!is_null($row->Monday_Open))
					$row->Monday_Open = date_format(new DateTime($row->Monday_Open, new DateTimeZone('UTC')), 'Y-m-d\\TH:i:s');
				if(!is_null($row->Monday_Close))
					$row->Monday_Close = date_format(new DateTime($row->Monday_Close, new DateTimeZone('UTC')), 'Y-m-d\\TH:i:s');
				if(!is_null($row->Tuesday_Open))
					$row->Tuesday_Open = date_format(new DateTime($row->Tuesday_Open, new DateTimeZone('UTC')), 'Y-m-d\\TH:i:s');
				if(!is_null($row->Tuesday_Close))
					$row->Tuesday_Close = date_format(new DateTime($row->Tuesday_Close, new DateTimeZone('UTC')), 'Y-m-d\\TH:i:s');
				if(!is_null($row->Wednesday_Open))
					$row->Wednesday_Open = date_format(new DateTime($row->Wednesday_Open, new DateTimeZone('UTC')), 'Y-m-d\\TH:i:s');
				if(!is_null($row->Wednesday_Close))
					$row->Wednesday_Close = date_format(new DateTime($row->Wednesday_Close, new DateTimeZone('UTC')), 'Y-m-d\\TH:i:s');
				if(!is_null($row->Thursday_Open))
					$row->Thursday_Open = date_format(new DateTime($row->Thursday_Open, new DateTimeZone('UTC')), 'Y-m-d\\TH:i:s');
				if(!is_null($row->Thursday_Close))
					$row->Thursday_Close = date_format(new DateTime($row->Thursday_Close, new DateTimeZone('UTC')), 'Y-m-d\\TH:i:s');
				if(!is_null($row->Friday_Open))
					$row->Friday_Open = date_format(new DateTime($row->Friday_Open, new DateTimeZone('UTC')), 'Y-m-d\\TH:i:s');
				if(!is_null($row->Friday_Close))
					$row->Friday_Close = date_format(new DateTime($row->Friday_Close, new DateTimeZone('UTC')), 'Y-m-d\\TH:i:s');
				if(!is_null($row->Saturday_Open))
					$row->Saturday_Open = date_format(new DateTime($row->Saturday_Open, new DateTimeZone('UTC')), 'Y-m-d\\TH:i:s');
				if(!is_null($row->Saturday_Close))
					$row->Saturday_Close = date_format(new DateTime($row->Saturday_Close, new DateTimeZone('UTC')), 'Y-m-d\\TH:i:s');
				if(!is_null($row->Sunday_Open))
					$row->Sunday_Open = date_format(new DateTime($row->Sunday_Open, new DateTimeZone('UTC')), 'Y-m-d\\TH:i:s');
				if(!is_null($row->Sunday_Close))
					$row->Sunday_Close = date_format(new DateTime($row->Sunday_Close, new DateTimeZone('UTC')), 'Y-m-d\\TH:i:s');
				$rv[] = $row;
			}
			$mysqli_stmt->close();
		}
		catch(Exception $e)
		{
			$mysqli_stmt->close();
			throw $e;
		}
		return $rv;
	}
}
