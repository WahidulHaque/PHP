<?php
require_once '../DB Handler/salesDB.php';
function showTable()
{
	$table=loadSaleTable();
	if($table != null)
	{
		foreach($table as $data)
		{
			echo "<tr>";
			echo "<td align='middle'>".$data["SLID"]."</td>";
			echo "<td align='middle'>".$data["PID"]."</td>";
			echo "<td align='middle'>".$data["QUANT"]."</td>";
			echo "<td align='middle'>".$data["OB_AMMOUNT"]."</td>";
			echo "<td align='middle'>".$data["PROFIT"]."</td>";
			echo "<td>".$data["C_NAME"]."</td>";
			echo "<td align='middle'>".$data["C_MOB"]."</td>";
			echo "<td align='middle'>".$data["SOLD_BY"]."</td>";
			echo "<td align='middle'>".$data["Sell_SDate"]."</td>";
			echo "</tr>";
		}
	}
	
	else
	{
		echo "<tr> <td colspan='9' align='middle'> <span style='color:red;'> NO DATA FOUND </span> </td> </tr>";
	}
}
function showFoot()
{
	$table=calc();
	if($table[0]["TotalSale"] != 0)
	{
		foreach($table as $data)
		{
			echo "<td align='middle'>&#931;<sub>sale</sub>=".$data["TotalSale"]."</td>";
			echo "<td align='middle'>~~</td>";
			echo "<td align='middle'>&#931;<sub>quantity</sub>=".$data["TotalQuant"]."</td>";
			echo "<td align='middle'>&#931;<sub>ammount</sub>=".$data["TotalAmmnt"]."</td>";
			echo "<td align='middle'>&#931;<sub>profit</sub>=".$data["TotalProfit"]."</td>";
			echo "<td colspan='4' align='middle'>~~</td>";
		}
	}
	
	else
	{
		echo "<td align='middle'>&#931;<sub>sale</sub>=0</td>";
		echo "<td align='middle'>~~</td>";
		echo "<td align='middle'>&#931;<sub>quantity</sub>=0</td>";
		echo "<td align='middle'>&#931;<sub>ammount</sub>=0</td>";
		echo "<td align='middle'>&#931;<sub>profit</sub>=0</td>";
		echo "<td colspan='4' align='middle'>~~</td>";
		
	}
}
if(isset($_COOKIE['uid']) && isset($_COOKIE['sid']))
{
	$uid = $_COOKIE['uid'];
	$sid = $_COOKIE['sid'];
	
	
	$srchProdTF="";
	$srchProdTFerror="";
	
	$load=array();
	$load=null;
	
	$sidTF="";
	$prodidTF="";
	$quantTF="";
	$obtamntTF="";
	$profitTF="";
	$cusnameTF="";
	$cusmobTF="";
	$empidTF="";
	$sellDateTF="";
	
	if(isset($_POST["logoutBTN"]))
	{
		setcookie("uid",$uid,time()-600);
		setcookie("sid",$sid,time()-600);
		header("Location:index.php");
	}
	
	if(isset($_POST["gohomebtn"]))
	{
		setcookie("uid",$uid,time()+600);
		setcookie("sid",$sid,time()+600);
		header("Location:home.php");
	}
	
	if(isset($_POST["goBTN"]))
	{
		setcookie("uid",$uid,time()+600);
		setcookie("sid",$sid,time()+600);
		header("Location:sellProduct.php");
	}
	
	if(isset($_POST["srchBTN"]))
	{
		if(empty($_POST["srchProdTF"]))
		{
			$srchProdTFerror="&#10033;";
		}
		else
		{
			$srchProdTF=$_POST["srchProdTF"];
			$load=loadSales($srchProdTF);
		}
		
		if($load !=null)
		{
			$sidTF=$load[0]['SLID'];
			$prodidTF=$load[0]['PID'];
			$quantTF=$load[0]['QUANT'];
			$obtamntTF=$load[0]['OB_AMMOUNT'];
			$profitTF=$load[0]['PROFIT'];
			$cusnameTF=$load[0]['C_NAME'];
			$cusmobTF=$load[0]['C_MOB'];
			$empidTF=$load[0]['SOLD_BY'];
			$sellDateTF=$load[0]['Sell_SDate'];
		}
		else
		{
			$srchProdTFerror="&#10033;";
			
			$sidTF="";
			$prodidTF="";
			$quantTF="";
			$obtamntTF="";
			$profitTF="";
			$cusnameTF="";
			$cusmobTF="";
			$empidTF="";
			$sellDateTF="";
		}
	
	}
}

else
{
	header("Location:index.php");
}	
?>