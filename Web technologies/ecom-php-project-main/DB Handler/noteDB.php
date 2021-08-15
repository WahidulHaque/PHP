<?php
require_once 'DBC.php';

function loadTable($owner)
{
	$result=array();
	$result=null;
	try
	{
		$query = "SELECT `NoteID`, `NoteName`, `OwnerID` FROM `note` WHERE `OwnerID`='".$owner."' ORDER BY `NoteID`;";
		$result=get($query);
		return $result;
	}
	
	catch (Exception $e)
	{
		throw $e->getMessage();
		return $result;
	}
}

function uploadNote($NoteName, $OwnerTD, $Text)
{
	$query = "INSERT INTO `note`(`NoteName`, `OwnerID`, `Text`) VALUES ('".$NoteName."','".$OwnerTD."','".$Text."');";
	
	try
	{
		execute($query);
	}
	
	catch(Exception $e)
	{
		throw $e->getMessage();
	}	
}

function updateNote($NoteID, $NoteName, $Text, $OwnerID)
{
	$query = "UPDATE `note` SET `NoteName`='$NoteName',`Text`='$Text' WHERE `NoteID`='$NoteID' AND `OwnerID`='$OwnerID';";
	
	try
	{
		execute($query);
	}
	
	catch(Exception $e)
	{
		throw $e->getMessage();
	}	
}

function downloadNote($NID, $OwnerTD)
{
	$query = "SELECT * FROM `note` WHERE `NoteID` like '".$NID."' AND `OwnerID` like '".$OwnerTD."';";
	
	try
	{
		$result=get($query);
		return $result;
	}
	
	catch (Exception $e)
	{
		throw $e->getMessage();
		return $result;
	}
}

function deleteNote($NoteID, $OwnerID)
{
	$query = "DELETE FROM `note` WHERE `NoteID`='$NoteID' AND `OwnerID`='$OwnerID';";
	
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