<?php
require_once 'DBC.php';

function getLogin($LID,$PASS)
{
	$result=array();
	$result = null;
	try
	{
		$query= "SELECT * FROM `log_in` WHERE `LID`='".$LID."' AND `PASS`='".$PASS."';";
	
		$result=get($query);
		
		if($result != null)
		{
			return $result;
		}
		
		else
		{
			return $result;
		}
	}
	
	catch(Exception $e)
	{
		throw $e->getMessage();
		return $result;
	}
}

function resetPASS($LID,$NEWPASS)
{
	$query="UPDATE `log_in` SET `PASS` = '".$NEWPASS."' WHERE `log_in`.`LID` = '".$LID."';";
	
	try
	{
		execute($query);
	}
	
	catch(Exception $e)
	{
		throw $e->getMessage();
	}	
}

function insertLogin($LID, $SID, $PASS)
{
	$query = "INSERT INTO `log_in`(`LID`, `SID`, `PASS`) VALUES ('" . $LID . "','" . $SID . "','" . $PASS . "');";
	
	try
	{
		execute($query);
	}
	
	catch(Exception $e)
	{
		throw $e->getMessage();
	}	
}

function updatePass($NEWPASS,$LID,$PASS)
{
	$query="UPDATE `log_in` SET `PASS` = '".$NEWPASS."' WHERE `log_in`.`LID` = '".$LID."' AND `PASS` = '".$PASS."';";
	
	try
	{
		execute($query);
	}
	
	catch(Exception $e)
	{
		throw $e->getMessage();
	}	
}

function updateSID($LID,$SID)
{
	$query="UPDATE `log_in` SET `SID` = '".$SID."' WHERE `log_in`.`LID` = '".$LID."';";
	
	try
	{
		execute($query);
	}
	
	catch(Exception $e)
	{
		throw $e->getMessage();
	}	
}
 
?>