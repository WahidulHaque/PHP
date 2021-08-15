<?php
require_once 'DBC.php';

$key1 = $_GET['key1'];
$key2 = $_GET['key2'];
$key3 = $_GET['key3'];
$key4 = $_GET['key4'];
$key5 = $_GET['key5'];
$key6 = $_GET['key6'];
$key7 = $_GET['key7'];

$table=null;

//$query = "SELECT * FROM `employee` WHERE `E_NAME` LIKE '%$key1%' AND `DID` LIKE '%$key2%';";
$query = "SELECT * FROM `employee` WHERE `E_NAME` LIKE '%$key1%' AND `DID` LIKE '%$key2%' AND `SAL` >= '$key3'  AND `E_MOB` LIKE '%$key4%' AND `E_MAIL` LIKE '%$key5%' AND `JOIN_DATE` LIKE '%$key6%' AND `ADDED_BY` LIKE '%$key7%' ORDER BY `DID`,`EmpID`;";	

$table=get($query);
if($table != null)
{	
	foreach($table as $data)
	{
		echo "<tr>";
		echo "<td align='middle'>".$data["EmpID"]."</td>";
		echo "<td>".$data["E_NAME"]."</td>";
		echo "<td align='middle'>".$data["DID"]."</td>";
		echo "<td align='middle'>".$data["SAL"]."</td>";
		echo "<td align='middle'>".$data["E_MOB"]."</td>";
		echo "<td align='middle'>".$data["E_MAIL"]."</td>";
		echo "<td align='middle'>".$data["JOIN_DATE"]."</td>";
		echo "<td align='middle'>".$data["ADDED_BY"]."</td>";
		echo "</tr>";								
	}
}

else
{
	echo "<tr> <td colspan='8' align='middle'> <span style='color:red;'> NO DATA FOUND </span> </td> </tr>";
}
?>