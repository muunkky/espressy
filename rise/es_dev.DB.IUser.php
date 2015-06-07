<?php 
include_once(dirname(__FILE__).'/es_dev.DB.IReview.php');
include_once(dirname(__FILE__).'/es_dev.DB.ICafe.php');
class es_devDBIUser
{
	public $ConnectionResource;
	public function __construct($ConnectionResource)
	{
		$this->ConnectionResource = $ConnectionResource;
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
	public function SignupUser($Email, $Password_Hash, $Salt, $Name, $Email_Authenticated, $Email_Authorization_Nonce)
	{
		if(is_null($Email))
			throw new Exception('ArgumentNullException: Email');
		$rvl = array();
		$crv = ((object)array('ID'=>0, 'Email'=>NULL, 'Password_Hash'=>NULL, 'Salt'=>NULL, 'Name'=>NULL));
		$crvUsed = FALSE;
		$prvNewUser = $this->NewUser($Email);
		$prvGetUser = $this->GetUser($prvNewUser);
		$prvSetUser = $this->SetUser($prvGetUser->ID, $Email, $Password_Hash, $Salt, $Name, $Email_Authenticated, $Email_Authorization_Nonce);
		$prvGetUser1 = $this->GetUser($prvGetUser->ID);
		$crv->ID = $prvGetUser1->ID;
		$crv->Email = $prvGetUser1->Email;
		$crv->Password_Hash = $prvGetUser1->Password_Hash;
		$crv->Salt = $prvGetUser1->Salt;
		$crv->Name = $prvGetUser1->Name;
		$crvUsed = TRUE;
		if($crvUsed)
			$rvl[] = $crv;
		if(count($rvl))
			$rv = $rvl[0];
		else
			$rv = ((object)array('ID'=>0, 'Email'=>NULL, 'Password_Hash'=>NULL, 'Salt'=>NULL, 'Name'=>NULL));
		return $rv;
	}
	public function NewRating($UserID, $CafeID)
	{
		if(is_null($UserID))
			throw new Exception('ArgumentNullException: UserID');
		if(is_null($CafeID))
			throw new Exception('ArgumentNullException: CafeID');
		$sql_stmt = 'INSERT INTO "t_es_dev_u_Rating"("c_r_User", "c_r_Cafe", "c_u_Expired") VALUES (?, ?, 0)';
		$mysqli_stmt = $this->ConnectionResource->prepare($sql_stmt);
		if($mysqli_stmt===FALSE)
			throw new Exception($sql_stmt.': prepare statement failed: '.$this->ConnectionResource->error);
		try
		{
			if(!$mysqli_stmt->bind_param('ii', $UserID, $CafeID))
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
	public function DeleteRating($ID)
	{
		if(is_null($ID))
			throw new Exception('ArgumentNullException: ID');
		$sql_stmt = 'DELETE FROM "t_es_dev_u_Rating" WHERE "c_id" = ?';
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
	public function GetRating($ID)
	{
		if(is_null($ID))
			throw new Exception('ArgumentNullException: ID');
		$rv = NULL;
		$sql_stmt = 'SELECT "c_id", "c_u_Rating", "c_u_Comments", "c_u_Date", "c_r_User", "c_r_Cafe", "c_u_Expired" FROM "t_es_dev_u_Rating" WHERE "c_id" = (?) LIMIT 2';
		$mysqli_stmt = $this->ConnectionResource->prepare($sql_stmt);
		if($mysqli_stmt===FALSE)
			throw new Exception($sql_stmt.': prepare statement failed: '.$this->ConnectionResource->error);
		try
		{
			if(!$mysqli_stmt->bind_param('i', $ID))
				throw new Exception('Bind parameters failed: '.$mysqli_stmt->error);
			if(!$mysqli_stmt->execute())
				throw new Exception($sql_stmt.': '.$mysqli_stmt->error);
			if((!$mysqli_stmt->store_result())||(!$mysqli_stmt->bind_result($ID, $Rating, $Comments, $Date, $UserID, $CafeID, $Expired)))
				throw new Exception('Unable to store or bind results of query: '.$mysqli_stmt->error);
			while($mysqli_stmt->fetch())
			{
				if(!is_null($rv))
					throw new Exception('Operation selected more than one row');
				$rv = ((object)array('ID'=>$ID, 'Rating'=>$Rating, 'Comments'=>$Comments, 'Date'=>$Date, 'UserID'=>$UserID, 'CafeID'=>$CafeID, 'Expired'=>$Expired));
				if(is_null($rv->ID))
					throw new Exception("Value 'null' is not allowed for 'ID'");
				if(!is_null($rv->Date))
					$rv->Date = date_format(new DateTime($rv->Date, new DateTimeZone('UTC')), 'Y-m-d\\TH:i:s');
				if(is_null($rv->UserID))
					throw new Exception("Value 'null' is not allowed for 'UserID'");
				if(is_null($rv->CafeID))
					throw new Exception("Value 'null' is not allowed for 'CafeID'");
				if(!is_null($rv->Expired))
					$rv->Expired = ((bool)$rv->Expired);
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
	public function SetRating($ID, $Rating, $Comments, $Date, $UserID, $CafeID, $Expired)
	{
		if(is_null($ID))
			throw new Exception('ArgumentNullException: ID');
		if(is_null($UserID))
			throw new Exception('ArgumentNullException: UserID');
		if(is_null($CafeID))
			throw new Exception('ArgumentNullException: CafeID');
		$sql_stmt = 'UPDATE "t_es_dev_u_Rating" SET "c_id" = (?), "c_u_Rating" = (?), "c_u_Comments" = (?), "c_u_Date" = (?), "c_r_User" = (?), "c_r_Cafe" = (?), "c_u_Expired" = (?) WHERE ((c_id) = (?))';
		$mysqli_stmt = $this->ConnectionResource->prepare($sql_stmt);
		if($mysqli_stmt===FALSE)
			throw new Exception($sql_stmt.': prepare statement failed: '.$this->ConnectionResource->error);
		try
		{
			if(!$mysqli_stmt->bind_param('iissiiii', $ID, $Rating, $Comments, $Date, $UserID, $CafeID, $Expired, $ID))
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
	public function ListRating($maxRowsToReturn)
	{
		$rv = array();
		$sql_stmt = ' "c_id", "c_u_Rating", "c_u_Comments", "c_u_Date", "c_r_User", "c_r_Cafe", "c_u_Expired" FROM "t_es_dev_u_Rating"';
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
			if((!$mysqli_stmt->store_result())||(!$mysqli_stmt->bind_result($ID, $Rating, $Comments, $Date, $UserID, $CafeID, $Expired)))
				throw new Exception('Unable to store or bind results of query: '.$mysqli_stmt->error);
			while($mysqli_stmt->fetch())
			{
				$row = ((object)array('ID'=>$ID, 'Rating'=>$Rating, 'Comments'=>$Comments, 'Date'=>$Date, 'UserID'=>$UserID, 'CafeID'=>$CafeID, 'Expired'=>$Expired));
				if(is_null($row->ID))
					throw new Exception("Value 'null' is not allowed for 'ID'");
				if(!is_null($row->Date))
					$row->Date = date_format(new DateTime($row->Date, new DateTimeZone('UTC')), 'Y-m-d\\TH:i:s');
				if(is_null($row->UserID))
					throw new Exception("Value 'null' is not allowed for 'UserID'");
				if(is_null($row->CafeID))
					throw new Exception("Value 'null' is not allowed for 'CafeID'");
				if(!is_null($row->Expired))
					$row->Expired = ((bool)$row->Expired);
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
		$sql_stmt = 'SELECT "c_id", "c_u_Name", "c_u_Latitude", "c_u_Longitude", "c_u_Address", "c_u_Google Places Reference", "c_u_Google Places Id", "c_u_Star Rating", "c_u_Monday Open", "c_u_Monday Close", "c_u_Tuesday Open", "c_u_Tuesday Close", "c_u_Wednesday Open", "c_u_Wednesday Close", "c_u_Thursday Open", "c_u_Thursday Close", "c_u_Friday Open", "c_u_Friday Close", "c_u_Saturday Open", "c_u_Saturday Close", "c_u_Sunday Open", "c_u_Sunday Close", "c_r_Region", "c_r_Chain" FROM "t_es_dev_u_Cafe" WHERE "c_id" = (?) LIMIT 2';
		$mysqli_stmt = $this->ConnectionResource->prepare($sql_stmt);
		if($mysqli_stmt===FALSE)
			throw new Exception($sql_stmt.': prepare statement failed: '.$this->ConnectionResource->error);
		try
		{
			if(!$mysqli_stmt->bind_param('i', $ID))
				throw new Exception('Bind parameters failed: '.$mysqli_stmt->error);
			if(!$mysqli_stmt->execute())
				throw new Exception($sql_stmt.': '.$mysqli_stmt->error);
			if((!$mysqli_stmt->store_result())||(!$mysqli_stmt->bind_result($ID, $Name, $Latitude, $Longitude, $Address, $Google_Places_Reference, $Google_Places_Id, $Star_Rating, $Monday_Open, $Monday_Close, $Tuesday_Open, $Tuesday_Close, $Wednesday_Open, $Wednesday_Close, $Thursday_Open, $Thursday_Close, $Friday_Open, $Friday_Close, $Saturday_Open, $Saturday_Close, $Sunday_Open, $Sunday_Close, $RegionID, $ChainID)))
				throw new Exception('Unable to store or bind results of query: '.$mysqli_stmt->error);
			while($mysqli_stmt->fetch())
			{
				if(!is_null($rv))
					throw new Exception('Operation selected more than one row');
				$rv = ((object)array('ID'=>$ID, 'Name'=>$Name, 'Latitude'=>$Latitude, 'Longitude'=>$Longitude, 'Address'=>$Address, 'Google_Places_Reference'=>$Google_Places_Reference, 'Google_Places_Id'=>$Google_Places_Id, 'Star_Rating'=>$Star_Rating, 'Monday_Open'=>$Monday_Open, 'Monday_Close'=>$Monday_Close, 'Tuesday_Open'=>$Tuesday_Open, 'Tuesday_Close'=>$Tuesday_Close, 'Wednesday_Open'=>$Wednesday_Open, 'Wednesday_Close'=>$Wednesday_Close, 'Thursday_Open'=>$Thursday_Open, 'Thursday_Close'=>$Thursday_Close, 'Friday_Open'=>$Friday_Open, 'Friday_Close'=>$Friday_Close, 'Saturday_Open'=>$Saturday_Open, 'Saturday_Close'=>$Saturday_Close, 'Sunday_Open'=>$Sunday_Open, 'Sunday_Close'=>$Sunday_Close, 'RegionID'=>$RegionID, 'ChainID'=>$ChainID));
				if(is_null($rv->ID))
					throw new Exception("Value 'null' is not allowed for 'ID'");
				if(is_null($rv->Name))
					throw new Exception("Value 'null' is not allowed for 'Name'");
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
				if(is_null($rv->RegionID))
					throw new Exception("Value 'null' is not allowed for 'RegionID'");
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
	public function SetCafe($ID, $Name, $Latitude, $Longitude, $Address, $Google_Places_Reference, $Google_Places_Id, $Star_Rating, $Monday_Open, $Monday_Close, $Tuesday_Open, $Tuesday_Close, $Wednesday_Open, $Wednesday_Close, $Thursday_Open, $Thursday_Close, $Friday_Open, $Friday_Close, $Saturday_Open, $Saturday_Close, $Sunday_Open, $Sunday_Close, $RegionID, $ChainID)
	{
		if(is_null($ID))
			throw new Exception('ArgumentNullException: ID');
		if(is_null($Name))
			throw new Exception('ArgumentNullException: Name');
		if(is_null($RegionID))
			throw new Exception('ArgumentNullException: RegionID');
		$sql_stmt = 'UPDATE "t_es_dev_u_Cafe" SET "c_id" = (?), "c_u_Name" = (?), "c_u_Latitude" = (?), "c_u_Longitude" = (?), "c_u_Address" = (?), "c_u_Google Places Reference" = (?), "c_u_Google Places Id" = (?), "c_u_Star Rating" = (?), "c_u_Monday Open" = (?), "c_u_Monday Close" = (?), "c_u_Tuesday Open" = (?), "c_u_Tuesday Close" = (?), "c_u_Wednesday Open" = (?), "c_u_Wednesday Close" = (?), "c_u_Thursday Open" = (?), "c_u_Thursday Close" = (?), "c_u_Friday Open" = (?), "c_u_Friday Close" = (?), "c_u_Saturday Open" = (?), "c_u_Saturday Close" = (?), "c_u_Sunday Open" = (?), "c_u_Sunday Close" = (?), "c_r_Region" = (?), "c_r_Chain" = (?) WHERE ((c_id) = (?))';
		$mysqli_stmt = $this->ConnectionResource->prepare($sql_stmt);
		if($mysqli_stmt===FALSE)
			throw new Exception($sql_stmt.': prepare statement failed: '.$this->ConnectionResource->error);
		try
		{
			if(!$mysqli_stmt->bind_param('isddsssissssssssssssssiii', $ID, $Name, $Latitude, $Longitude, $Address, $Google_Places_Reference, $Google_Places_Id, $Star_Rating, $Monday_Open, $Monday_Close, $Tuesday_Open, $Tuesday_Close, $Wednesday_Open, $Wednesday_Close, $Thursday_Open, $Thursday_Close, $Friday_Open, $Friday_Close, $Saturday_Open, $Saturday_Close, $Sunday_Open, $Sunday_Close, $RegionID, $ChainID, $ID))
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
		$sql_stmt = ' "c_id", "c_u_Name", "c_u_Latitude", "c_u_Longitude", "c_u_Address", "c_u_Google Places Reference", "c_u_Google Places Id", "c_u_Star Rating", "c_u_Monday Open", "c_u_Monday Close", "c_u_Tuesday Open", "c_u_Tuesday Close", "c_u_Wednesday Open", "c_u_Wednesday Close", "c_u_Thursday Open", "c_u_Thursday Close", "c_u_Friday Open", "c_u_Friday Close", "c_u_Saturday Open", "c_u_Saturday Close", "c_u_Sunday Open", "c_u_Sunday Close", "c_r_Region", "c_r_Chain" FROM "t_es_dev_u_Cafe"';
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
	public function ListCafeByRegion($maxRowsToReturn, $RegionID)
	{
		if(is_null($RegionID))
			throw new Exception('ArgumentNullException: RegionID');
		$rv = array();
		$sql_stmt = ' "c_id", "c_u_Name", "c_u_Latitude", "c_u_Longitude", "c_u_Address", "c_u_Google Places Reference", "c_u_Google Places Id", "c_u_Star Rating", "c_u_Monday Open", "c_u_Monday Close", "c_u_Tuesday Open", "c_u_Tuesday Close", "c_u_Wednesday Open", "c_u_Wednesday Close", "c_u_Thursday Open", "c_u_Thursday Close", "c_u_Friday Open", "c_u_Friday Close", "c_u_Saturday Open", "c_u_Saturday Close", "c_u_Sunday Open", "c_u_Sunday Close", "c_r_Region", "c_r_Chain" FROM "t_es_dev_u_Cafe" WHERE "c_r_Region"=?';
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
	public function ListCafeByGoogle_Places_Id($maxRowsToReturn, $Google_Places_Id)
	{
		$rv = array();
		$sql_stmt = ' "c_id", "c_u_Name", "c_u_Latitude", "c_u_Longitude", "c_u_Address", "c_u_Google Places Reference", "c_u_Google Places Id", "c_u_Star Rating", "c_u_Monday Open", "c_u_Monday Close", "c_u_Tuesday Open", "c_u_Tuesday Close", "c_u_Wednesday Open", "c_u_Wednesday Close", "c_u_Thursday Open", "c_u_Thursday Close", "c_u_Friday Open", "c_u_Friday Close", "c_u_Saturday Open", "c_u_Saturday Close", "c_u_Sunday Open", "c_u_Sunday Close", "c_r_Region", "c_r_Chain" FROM "t_es_dev_u_Cafe" WHERE "c_u_Google Places Id"=?';
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
	public function ListRatingByUser($maxRowsToReturn, $UserID)
	{
		if(is_null($UserID))
			throw new Exception('ArgumentNullException: UserID');
		$rv = array();
		$sql_stmt = ' "c_id", "c_u_Rating", "c_u_Comments", "c_u_Date", "c_r_User", "c_r_Cafe", "c_u_Expired" FROM "t_es_dev_u_Rating" WHERE "c_r_User"=?';
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
			if((!$mysqli_stmt->store_result())||(!$mysqli_stmt->bind_result($ID, $Rating, $Comments, $Date, $UserID, $CafeID, $Expired)))
				throw new Exception('Unable to store or bind results of query: '.$mysqli_stmt->error);
			while($mysqli_stmt->fetch())
			{
				$row = ((object)array('ID'=>$ID, 'Rating'=>$Rating, 'Comments'=>$Comments, 'Date'=>$Date, 'UserID'=>$UserID, 'CafeID'=>$CafeID, 'Expired'=>$Expired));
				if(is_null($row->ID))
					throw new Exception("Value 'null' is not allowed for 'ID'");
				if(!is_null($row->Date))
					$row->Date = date_format(new DateTime($row->Date, new DateTimeZone('UTC')), 'Y-m-d\\TH:i:s');
				if(is_null($row->UserID))
					throw new Exception("Value 'null' is not allowed for 'UserID'");
				if(is_null($row->CafeID))
					throw new Exception("Value 'null' is not allowed for 'CafeID'");
				if(!is_null($row->Expired))
					$row->Expired = ((bool)$row->Expired);
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
	public function ListRatingByCafe($maxRowsToReturn, $CafeID)
	{
		if(is_null($CafeID))
			throw new Exception('ArgumentNullException: CafeID');
		$rv = array();
		$sql_stmt = ' "c_id", "c_u_Rating", "c_u_Comments", "c_u_Date", "c_r_User", "c_r_Cafe", "c_u_Expired" FROM "t_es_dev_u_Rating" WHERE "c_r_Cafe"=? and "c_u_Expired"=0';
		$sql_stmt.=' ORDER BY "c_id" desc ';
		if($maxRowsToReturn&&(preg_match('/^\\s*\\d*(\\s*,\\s*\\d+)?\\s*$/', $maxRowsToReturn)==1))
			$sql_stmt = ($sql_stmt.' LIMIT '.$maxRowsToReturn);
		$sql_stmt = ('SELECT '.$sql_stmt);
		$mysqli_stmt = $this->ConnectionResource->prepare($sql_stmt);
		if($mysqli_stmt===FALSE)
			throw new Exception($sql_stmt.': prepare statement failed: '.$this->ConnectionResource->error);
		try
		{
			if(!$mysqli_stmt->bind_param('i', $CafeID))
				throw new Exception('Bind parameters failed: '.$mysqli_stmt->error);
			if(!$mysqli_stmt->execute())
				throw new Exception($sql_stmt.': '.$mysqli_stmt->error);
			if((!$mysqli_stmt->store_result())||(!$mysqli_stmt->bind_result($ID, $Rating, $Comments, $Date, $UserID, $CafeID, $Expired)))
				throw new Exception('Unable to store or bind results of query: '.$mysqli_stmt->error);
			while($mysqli_stmt->fetch())
			{
				$row = ((object)array('ID'=>$ID, 'Rating'=>$Rating, 'Comments'=>$Comments, 'Date'=>$Date, 'UserID'=>$UserID, 'CafeID'=>$CafeID, 'Expired'=>$Expired));
				if(is_null($row->ID))
					throw new Exception("Value 'null' is not allowed for 'ID'");
				if(!is_null($row->Date))
					$row->Date = date_format(new DateTime($row->Date, new DateTimeZone('UTC')), 'Y-m-d\\TH:i:s');
				if(is_null($row->UserID))
					throw new Exception("Value 'null' is not allowed for 'UserID'");
				if(is_null($row->CafeID))
					throw new Exception("Value 'null' is not allowed for 'CafeID'");
				if(!is_null($row->Expired))
					$row->Expired = ((bool)$row->Expired);
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
