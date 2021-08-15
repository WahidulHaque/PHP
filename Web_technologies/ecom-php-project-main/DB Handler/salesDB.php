<?php
require_once 'DBC.php';

function loadSaleTable()
{
	$result=array();
	$result=null;
	try
	{
		$query="SELECT * FROM `sales`;";
		$result=get($query);
		return $result;
	}
	
	catch (Exception $e)
	{
		throw $e->getMessage();
		return $result;
	}
}

function loadSales($SLID)
{
	$result=array();
	$result=null;
	try
	{
		$query="SELECT * FROM `sales` WHERE `SLID`='".$SLID."';";
		$result=get($query);
		return $result;
	}
	
	catch (Exception $e)
	{
		throw $e->getMessage();
		return $result;
	}	
}

function insertSales($PID, $QUANT, $OB_AMMOUNT, $PROFIT, $C_NAME, $C_MOB, $SOLD_BY)
{
	try
	{										
		$query = "INSERT INTO `sales`(`PID`, `QUANT`, `OB_AMMOUNT`, `PROFIT`, `C_NAME`, `C_MOB`, `SOLD_BY`, `Sell_SDate`) VALUES('".$PID."','".$QUANT."','".$OB_AMMOUNT."','".$PROFIT."','".strtoupper($C_NAME)."','".$C_MOB."','".$SOLD_BY."', current_timestamp());";

		execute($query);
		
		$returner="SELECT MAX(`SLID`), MAX(`Sell_SDate`) FROM `sales`;";
		$result=get($returner);
		return $result[0];
		
	}
	
	catch (Exception $e)
	{
		throw $e->getMessage();
		return "ERROR";
	}
}

function calc()
{
	try
	{										
		$query="SELECT COUNT(`PID`) AS TotalSale, SUM(`QUANT`) AS TotalQuant, SUM(`OB_AMMOUNT`) AS TotalAmmnt, SUM(`PROFIT`) AS TotalProfit FROM `sales`;";

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