<?php 
include_once(dirname(__FILE__).'/es_dev.DB.IReview.php');
include_once(dirname(__FILE__).'/es_dev.DB.IUser.php');
class es_devDBICafe
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
	public function ListCafeByRegion($maxRowsToReturn, $RegionID)
	{
		if(is_null($RegionID))
			throw new Exception('ArgumentNullException: RegionID');
		$rv = array();
		$sql_stmt = ' "c_id", "c_u_Name", "c_u_Latitude", "c_u_Longitude", "c_u_Address", "c_u_Google Places Reference", "c_u_Google Places Id", "c_u_Star Rating", "c_r_Region", "c_u_Monday Open", "c_u_Monday Close", "c_u_Tuesday Open", "c_u_Tuesday Close", "c_u_Wednesday Open", "c_u_Wednesday Close", "c_u_Thursday Open", "c_u_Thursday Close", "c_u_Friday Open", "c_u_Friday Close", "c_u_Saturday Open", "c_u_Saturday Close", "c_u_Sunday Open", "c_u_Sunday Close", "c_r_Chain" FROM "t_es_dev_u_Cafe" WHERE "c_r_Region"=?';
		if($maxRowsToReturn&&(preg_match('/^\\s*\\d*(\\s*,\\s*\\d+)?\\s*$/', $maxRowsToReturn)==1))
			$sql_stmt = ($sql_stmt.' LIMIT '.$maxRowsToReturn);
		$sql_stmt = ('SELECT '.$sql_stmt);
		$mysqli_stmt = $this->ConnectionResource->prepare($sql_stmt);
		if($mysqli_stmt===FALSE)
			throw new Exception($sql_stmt.': prepare statement failed: '.$this->ConnectionResource->error);
		try
		{
			if(!$mysqli_stmt->bind_param('i', $RegionID))
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
	public function NewRegion()
	{
		$sql_stmt = 'INSERT INTO "t_es_dev_u_Region"() VALUES ()';
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
	public function DeleteRegion($ID)
	{
		if(is_null($ID))
			throw new Exception('ArgumentNullException: ID');
		$sql_stmt = 'DELETE FROM "t_es_dev_u_Region" WHERE "c_id" = ?';
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
	public function GetRegion($ID)
	{
		if(is_null($ID))
			throw new Exception('ArgumentNullException: ID');
		$rv = NULL;
		$sql_stmt = 'SELECT "c_id", "c_u_Name", "c_u_Center Latitude", "c_u_Center Longitude" FROM "t_es_dev_u_Region" WHERE "c_id" = (?) LIMIT 2';
		$mysqli_stmt = $this->ConnectionResource->prepare($sql_stmt);
		if($mysqli_stmt===FALSE)
			throw new Exception($sql_stmt.': prepare statement failed: '.$this->ConnectionResource->error);
		try
		{
			if(!$mysqli_stmt->bind_param('i', $ID))
				throw new Exception('Bind parameters failed: '.$mysqli_stmt->error);
			if(!$mysqli_stmt->execute())
				throw new Exception($sql_stmt.': '.$mysqli_stmt->error);
			if((!$mysqli_stmt->store_result())||(!$mysqli_stmt->bind_result($ID, $Name, $Center_Latitude, $Center_Longitude)))
				throw new Exception('Unable to store or bind results of query: '.$mysqli_stmt->error);
			while($mysqli_stmt->fetch())
			{
				if(!is_null($rv))
					throw new Exception('Operation selected more than one row');
				$rv = ((object)array('ID'=>$ID, 'Name'=>$Name, 'Center_Latitude'=>$Center_Latitude, 'Center_Longitude'=>$Center_Longitude));
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
	public function SetRegion($ID, $Name, $Center_Latitude, $Center_Longitude)
	{
		if(is_null($ID))
			throw new Exception('ArgumentNullException: ID');
		$sql_stmt = 'UPDATE "t_es_dev_u_Region" SET "c_id" = (?), "c_u_Name" = (?), "c_u_Center Latitude" = (?), "c_u_Center Longitude" = (?) WHERE ((c_id) = (?))';
		$mysqli_stmt = $this->ConnectionResource->prepare($sql_stmt);
		if($mysqli_stmt===FALSE)
			throw new Exception($sql_stmt.': prepare statement failed: '.$this->ConnectionResource->error);
		try
		{
			if(!$mysqli_stmt->bind_param('isddi', $ID, $Name, $Center_Latitude, $Center_Longitude, $ID))
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
	public function ListRegion($maxRowsToReturn)
	{
		$rv = array();
		$sql_stmt = ' "c_id", "c_u_Name", "c_u_Center Latitude", "c_u_Center Longitude" FROM "t_es_dev_u_Region"';
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
			if((!$mysqli_stmt->store_result())||(!$mysqli_stmt->bind_result($ID, $Name, $Center_Latitude, $Center_Longitude)))
				throw new Exception('Unable to store or bind results of query: '.$mysqli_stmt->error);
			while($mysqli_stmt->fetch())
			{
				$row = ((object)array('ID'=>$ID, 'Name'=>$Name, 'Center_Latitude'=>$Center_Latitude, 'Center_Longitude'=>$Center_Longitude));
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
	public function ListCafeByChain($maxRowsToReturn, $ChainID)
	{
		$rv = array();
		$sql_stmt = ' "c_id", "c_u_Name", "c_u_Latitude", "c_u_Longitude", "c_u_Address", "c_u_Google Places Reference", "c_u_Google Places Id", "c_u_Star Rating", "c_u_Monday Open", "c_u_Monday Close", "c_u_Tuesday Open", "c_u_Tuesday Close", "c_u_Wednesday Open", "c_u_Wednesday Close", "c_u_Thursday Open", "c_u_Thursday Close", "c_u_Friday Open", "c_u_Friday Close", "c_u_Saturday Open", "c_u_Saturday Close", "c_u_Sunday Open", "c_u_Sunday Close", "c_r_Region", "c_r_Chain" FROM "t_es_dev_u_Cafe" WHERE "c_r_Chain"=?';
		if($maxRowsToReturn&&(preg_match('/^\\s*\\d*(\\s*,\\s*\\d+)?\\s*$/', $maxRowsToReturn)==1))
			$sql_stmt = ($sql_stmt.' LIMIT '.$maxRowsToReturn);
		$sql_stmt = ('SELECT '.$sql_stmt);
		$mysqli_stmt = $this->ConnectionResource->prepare($sql_stmt);
		if($mysqli_stmt===FALSE)
			throw new Exception($sql_stmt.': prepare statement failed: '.$this->ConnectionResource->error);
		try
		{
			if(!$mysqli_stmt->bind_param('i', $ChainID))
				throw new Exception('Bind parameters failed: '.$mysqli_stmt->error);
			if(!$mysqli_stmt->execute())
				throw new Exception($sql_stmt.': '.$mysqli_stmt->error);
			if((!$mysqli_stmt->store_result())||(!$mysqli_stmt->bind_result($ID, $Name, $Latitude, $Longitude, $Address, $Google_Places_Reference, $Google_Places_Id, $Star_Rating, $Monday_Open, $Monday_Close, $Tuesday_Open, $Tuesday_Close, $Wednesday_Open, $Wednesday_Close, $Thursday_Open, $Thursday_Close, $Friday_Open, $Friday_Close, $Saturday_Open, $Saturday_Close, $Sunday_Open, $Sunday_Close, $RegionID, $ChainID)))
				throw new Exception('Unable to store or bind results of query: '.$mysqli_stmt->error);
			while($mysqli_stmt->fetch())
			{
				$row = ((object)array('ID'=>$ID, 'Name'=>$Name, 'Latitude'=>$Latitude, 'Longitude'=>$Longitude, 'Address'=>$Address, 'Google_Places_Reference'=>$Google_Places_Reference, 'Google_Places_Id'=>$Google_Places_Id, 'Star_Rating'=>$Star_Rating, 'Monday_Open'=>$Monday_Open, 'Monday_Close'=>$Monday_Close, 'Tuesday_Open'=>$Tuesday_Open, 'Tuesday_Close'=>$Tuesday_Close, 'Wednesday_Open'=>$Wednesday_Open, 'Wednesday_Close'=>$Wednesday_Close, 'Thursday_Open'=>$Thursday_Open, 'Thursday_Close'=>$Thursday_Close, 'Friday_Open'=>$Friday_Open, 'Friday_Close'=>$Friday_Close, 'Saturday_Open'=>$Saturday_Open, 'Saturday_Close'=>$Saturday_Close, 'Sunday_Open'=>$Sunday_Open, 'Sunday_Close'=>$Sunday_Close, 'RegionID'=>$RegionID, 'ChainID'=>$ChainID));
				if(is_null($row->ID))
					throw new Exception("Value 'null' is not allowed for 'ID'");
				if(is_null($row->Name))
					throw new Exception("Value 'null' is not allowed for 'Name'");
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
				if(is_null($row->RegionID))
					throw new Exception("Value 'null' is not allowed for 'RegionID'");
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
	public function NewChain()
	{
		$sql_stmt = 'INSERT INTO "t_es_dev_u_Chain"() VALUES ()';
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
	public function DeleteChain($ID)
	{
		if(is_null($ID))
			throw new Exception('ArgumentNullException: ID');
		$sql_stmt = 'DELETE FROM "t_es_dev_u_Chain" WHERE "c_id" = ?';
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
	public function GetChain($ID)
	{
		if(is_null($ID))
			throw new Exception('ArgumentNullException: ID');
		$rv = NULL;
		$sql_stmt = 'SELECT "c_id", "c_u_Name" FROM "t_es_dev_u_Chain" WHERE "c_id" = (?) LIMIT 2';
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
	public function SetChain($ID, $Name)
	{
		if(is_null($ID))
			throw new Exception('ArgumentNullException: ID');
		$sql_stmt = 'UPDATE "t_es_dev_u_Chain" SET "c_id" = (?), "c_u_Name" = (?) WHERE ((c_id) = (?))';
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
	public function ListChain($maxRowsToReturn)
	{
		$rv = array();
		$sql_stmt = ' "c_id", "c_u_Name" FROM "t_es_dev_u_Chain"';
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
}
