<?php
require_once 'DBC.php';

$key1 = $_GET['key1'];
$key2 = $_GET['key2'];
$key3 = $_GET['key3'];
$key4 = $_GET['key4'];
$key5 = $_GET['key5'];
$key6 = $_GET['key6'];
$key7 = $_GET['key7'];
$key8 = $_GET['key8'];

$table=null;

//$query = "SELECT * FROM `employee` WHERE `E_NAME` LIKE '%$key1%' AND `DID` LIKE '%$key2%';";
$query="SELECT * FROM `product` WHERE `P_NAME` LIKE '%$key1%' AND `TYPE` LIKE '%$key8%' AND `QUANTITY` >= '$key2' AND `AVAILABILITY` LIKE '$key3%' AND `BUY_PRICE` >= '$key4' AND `SELL_PRICE` >= '$key5' AND `MOD_BY` LIKE '%$key6%' AND `Add_PDate` LIKE '%$key7%' ORDER BY `TYPE`,`PID`;";
$table=get($query);
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
?>