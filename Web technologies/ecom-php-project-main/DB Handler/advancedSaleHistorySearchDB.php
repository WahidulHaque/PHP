<?php
require_once 'DBC.php';

$key1 = $_GET['key1'];
$key2 = $_GET['key2'];

$table=null;

//$query = "SELECT * FROM `employee` WHERE `E_NAME` LIKE '%$key1%' AND `DID` LIKE '%$key2%';";
$query="SELECT * FROM `sales` WHERE `Sell_SDate` LIKE '%$key1%' AND `C_NAME` LIKE '%$key2%' ORDER BY `SLID`;";
$table=get($query);
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
?>