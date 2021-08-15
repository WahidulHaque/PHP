<?php
require_once 'DBC.php';

function loadTable()
{
	$result=array();
	$result=null;
	try
	{
		$query="SELECT * FROM `employee` WHERE `EmpID` != 'superuser' AND `DID` != '4' ORDER BY `DID`,`EmpID`;";
		$result=get($query);
		return $result;
	}
	
	catch (Exception $e)
	{
		throw $e->getMessage();
		return $result;
	}
}

function loadAllTable()
{
	$result=array();
	$result=null;
	try
	{
		$query="SELECT * FROM `employee` ORDER BY `DID`,`EmpID`;";
		$result=get($query);
		return $result;
	}
	
	catch (Exception $e)
	{
		throw $e->getMessage();
		return $result;
	}
}

function loadEmployee($EmpID)
{
	$result=array();
	$result=null;
	try
	{
		$query="SELECT * FROM `employee` WHERE `EmpID`='".$EmpID."';";
		$result=get($query);
		return $result;
	}
	
	catch (Exception $e)
	{
		throw $e->getMessage();
		return $result;
	}	
}

function checkContact($E_MOB, $EmpID)
{
	$result=array();
	$result=null;
	try
	{
		if($EmpID != "")
		{
			$query="SELECT * FROM `employee` WHERE `E_MOB`='".$E_MOB."' AND `EmpID` NOT LIKE '$EmpID';";
			$result=get($query);
			return $result;
		}
		
		else
		{
			$query="SELECT * FROM `employee` WHERE `E_MOB`='".$E_MOB."';";
			$result=get($query);
			return $result;
		}		
	}
	
	catch (Exception $e)
	{
		throw $e->getMessage();
		return $result;
	}	
}

function checkMail($E_MAIL, $EmpID)
{
	$result=array();
	$result=null;
	try
	{
		if($EmpID != "")
		{
			$query="SELECT * FROM `employee` WHERE `E_MAIL`='".$E_MAIL."' AND `EmpID` NOT LIKE '$EmpID';";
			$result=get($query);
			return $result;
		}
		
		else
		{
			$query="SELECT * FROM `employee` WHERE `E_MAIL`='".$E_MAIL."';";
			$result=get($query);
			return $result;
		}
		
	}
	
	catch (Exception $e)
	{
		throw $e->getMessage();
		return $result;
	}	
}

function insertEmployee($EmpID, $name, $did, $sal, $mob, $E_MAIL, $addedby)
{
	try
	{
		$query = "INSERT INTO `employee`(`EmpID`, `E_NAME`, `DID`, `SAL`, `E_MOB`, `E_MAIL`, `JOIN_DATE`, `ADDED_BY`) VALUES('".$EmpID."','".strtoupper($name)."','".$did."','".$sal."','".$mob."','".strtolower($E_MAIL)."',current_timestamp(),'".$addedby."');";

		execute($query);
	}
	
	catch (Exception $e)
	{
		throw $e->getMessage();
	}
}

function updateEmployee($EmpID, $name, $did, $sal, $mob, $E_MAIL)
{
	try
	{
		$query = "UPDATE `employee` SET `E_NAME`= '".strtoupper($name)."',`DID`= '$did',`SAL`= '$sal',`E_MOB`= '$mob', `E_MAIL`='".strtolower($E_MAIL)."' WHERE `EmpID` = '$EmpID';";

		execute($query);
	}
	
	catch (Exception $e)
	{
		throw $e->getMessage();
	}
}

function deleteEmployee($EmpID)
{
	try
	{
		$query = "UPDATE `employee` SET `DID`= '4' WHERE `EmpID` = '$EmpID';";

		execute($query);
	}
	
	catch (Exception $e)
	{
		throw $e->getMessage();
	}
}
?>