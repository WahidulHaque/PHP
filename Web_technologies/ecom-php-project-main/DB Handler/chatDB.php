<?php
require_once 'DBC.php';

function loadUnseenTable($uid)
{
	$result=array();
	$result=null;
	try
	{
		$query="SELECT * FROM `chat` WHERE `RECEIVER` = '$uid' AND `STATUS` = '0';";
		$result=get($query);
		return $result;
	}
	
	catch (Exception $e)
	{
		throw $e->getMessage();
		return $result;
	}
}

function loadSeenTable($uid)
{
	$result=array();
	$result=null;
	try
	{
		$query="SELECT * FROM `chat` WHERE `RECEIVER` = '$uid' AND `STATUS` = '1';";
		$result=get($query);
		return $result;
	}
	
	catch (Exception $e)
	{
		throw $e->getMessage();
		return $result;
	}
}

function loadSentTable($uid)
{
	$result=array();
	$result=null;
	try
	{
		$query="SELECT * FROM `chat` WHERE `SENDER` = '$uid';";
		$result=get($query);
		return $result;
	}
	
	catch (Exception $e)
	{
		throw $e->getMessage();
		return $result;
	}
}

function sendMSG($SUB, $SENDER, $TEXT, $ATTACHMENT, $RECEIVER)
{
	try
	{
		$query = "INSERT INTO `chat`(`DATE`, `SUB`, `SENDER`, `TEXT`, `ATTACHMENT`, `RECEIVER`, `STATUS`) VALUES(current_timestamp(),'".$SUB."','".$SENDER."','".$TEXT."','".$ATTACHMENT."','".$RECEIVER."','0');";

		execute($query);
	}
	
	catch (Exception $e)
	{
		throw $e->getMessage();
	}
}

function openInboxMSG($uid,$MSG_ID)
{
	$result=array();
	$result=null;
	try
	{
		$query="SELECT * FROM `chat` WHERE `RECEIVER` = '$uid' AND `MSG_ID` = '$MSG_ID';";
		$result=get($query);
		return $result;
	}
	
	catch (Exception $e)
	{
		throw $e->getMessage();
		return $result;
	}
}

function openSentMSG($uid,$MSG_ID)
{
	$result=array();
	$result=null;
	try
	{
		$query="SELECT * FROM `chat` WHERE `SENDER` = '$uid' AND `MSG_ID` = '$MSG_ID';";
		$result=get($query);
		return $result;
	}
	
	catch (Exception $e)
	{
		throw $e->getMessage();
		return $result;
	}
}

function updateMSGSTS($uid,$MSG_ID)
{
	try
	{
		$query="UPDATE `chat` SET `STATUS` = '1' WHERE `RECEIVER` = '$uid' AND `MSG_ID` = '$MSG_ID' AND `STATUS` = '0';";
		execute($query);
	}
	
	catch (Exception $e)
	{
		throw $e->getMessage();
	}
}

function deleteMSGS($uid,$MSG_ID)
{
	try
	{
		$query="DELETE `chat` WHERE `SENDER` = '$uid' AND `MSG_ID` = '$MSG_ID';";
		execute($query);
	}
	
	catch (Exception $e)
	{
		throw $e->getMessage();
	}
}

function calc($uid)
{
	try
	{										
		$query="SELECT COUNT(`MSG_ID`) AS TotalMsg FROM `chat` WHERE `RECEIVER` = '$uid' AND `STATUS` = '0';";

		$result=get($query);
		return $result;
	}
	
	catch (Exception $e)
	{
		throw $e->getMessage();
		return $result;
	}	
}

?>

