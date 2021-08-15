<?php
require_once 'DBC.php';

$key1 = $_GET['key1'];
$key2 = $_GET['key2'];

$table=null;

//$query = "SELECT * FROM `employee` WHERE `E_NAME` LIKE '%$key1%' AND `DID` LIKE '%$key2%';";
$query="SELECT * FROM `product` WHERE `TYPE` LIKE '%$key1%' AND `P_NAME` LIKE '%$key2%' AND `AVAILABILITY` = 'AVAILABLE' ORDER BY `PID`;";
$table=get($query);
if($table != null)
{	
	foreach($table as $data)
	{
		echo "<tr>";
		echo "<td align='middle'>".$data["PID"]."</td>";
		echo "<td>".$data["P_NAME"]."</td>";
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
	echo "<tr> <td colspan='8' align='middle'> NO DATA FOUND </td> </tr>";
}
?>