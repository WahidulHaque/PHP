<?php
require_once 'DBC.php';

function loadTableByType($type)
{
	$result=array();
	$result=null;
	try
	{
		$query="SELECT * FROM `product` WHERE `TYPE` LIKE '%".$type."%' AND `AVAILABILITY` = 'AVAILABLE' ORDER BY `PID`;";
		$result=get($query);
		return $result;
	}
	
	catch (Exception $e)
	{
		throw $e->getMessage();
		return $result;
	}
}

function loadTable()
{
	$result=array();
	$result=null;
	try
	{
		$query="SELECT * FROM `product` WHERE `AVAILABILITY` = 'AVAILABLE' ORDER BY `TYPE`,`PID`;";
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
		$query="SELECT * FROM `product` ORDER BY `TYPE`,`PID`;";
		$result=get($query);
		return $result;
	}
	
	catch (Exception $e)
	{
		throw $e->getMessage();
		return $result;
	}
}

function loadProduct($PID)
{
	$result=array();
	$result=null;
	try
	{
		$query="SELECT * FROM `product` WHERE `PID`='".$PID."';";
		$result=get($query);
		return $result;
	}
	
	catch (Exception $e)
	{
		throw $e->getMessage();
		return $result;
	}	
}

function insertProduct($PID, $name, $type, $quant, $buy, $sell, $mod_by)
{
	try
	{
		$query = "INSERT INTO `product`(`PID`, `P_NAME`, `TYPE`, `AVAILABILITY`, `QUANTITY`, `BUY_PRICE`, `SELL_PRICE`, `MOD_BY`, `Add_PDate`) VALUES('".$PID."','".strtoupper($name)."','".$type."', 'AVAILABLE','".$quant."','".$buy."','".$sell."','".$mod_by."', current_timestamp());";

		execute($query);
	}
	
	catch (Exception $e)
	{
		throw $e->getMessage();
	}
}

function updateProduct($PID, $name, $type, $quantity, $bp, $sp, $mdb)
{
	try
	{
		$query = "UPDATE `product` SET `P_NAME`= '".strtoupper($name)."',`TYPE`= '$type',`QUANTITY`= '$quantity',`BUY_PRICE`= '$bp', `SELL_PRICE`='$sp', `MOD_BY`='$mdb' WHERE `PID` = '$PID';";

		execute($query);
	}
	
	catch (Exception $e)
	{
		throw $e->getMessage();
	}
}

function updateOnSell($PID, $quantity, $AV)
{
	try
	{
		if($AV == "")
		{
			$query = "UPDATE `product` SET `QUANTITY`= '$quantity' WHERE `PID` = '$PID';";

			execute($query);
		}
		
		else
		{
			$query = "UPDATE `product` SET `QUANTITY`= '$quantity', `AVAILABILITY` = '$AV' WHERE `PID` = '$PID';";

			execute($query);
		}
	}
	
	catch (Exception $e)
	{
		throw $e->getMessage();
	}
}

function deleteProduct($PID, $AV)
{
	try
	{
		$query = "UPDATE `product` SET `AVAILABILITY`= '$AV' WHERE `PID` = '$PID';";

		execute($query);
	}
	
	catch (Exception $e)
	{
		throw $e->getMessage();
	}
}
?>