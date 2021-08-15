<?php
require_once '../DB Handler/productDB.php';
if((!isset($_COOKIE['uid']) && !isset($_COOKIE['sid'])) && ($_COOKIE['sid'] != 1 || $_COOKIE['sid'] != 2))
{
	header("Location:sellProduct.php");
}

else
{
	$uid = $_COOKIE['uid'];
	$sid = $_COOKIE['sid'];
	
	function showTable()
	{
		$table=loadAllTable();
		
		if($table != null)
		{
			foreach($table as $data)
			{
				echo "<tr>";
				echo "<td align='middle'>".$data["PID"]."</td>";
				echo "<td>".$data["P_NAME"]."</td>";
				echo "<td>".$data["AVAILABILITY"]."</td>";
				echo "<td align='middle'>".$data["TYPE"]."</td>";
				echo "<td align='middle'>".$data["QUANTITY"]."</td>";
				echo "<td align='middle'>".$data["BUY_PRICE"]."</td>";
				echo "<td align='middle'>".$data["SELL_PRICE"]."</td>";
				echo "<td align='middle'>".$data["MOD_BY"]."</td>";
				echo "<td align='middle'>".$data["Add_PDate"]."</td>";
				echo "</tr>";
			}
		}
		
		else
		{
			echo "<tr> <td colspan='9' align='middle'> <span style='color:red;'> NO DATA FOUND </span> </td> </tr>";
		}
	
	}
}
?>