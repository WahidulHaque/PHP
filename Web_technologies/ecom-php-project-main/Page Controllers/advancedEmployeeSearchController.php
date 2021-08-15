<?php
require_once '../DB Handler/employeeDB.php';
if((!isset($_COOKIE['uid']) && !isset($_COOKIE['sid'])) && ($_COOKIE['sid'] != 1 || $_COOKIE['sid'] != 2))
{
	header("Location:employeeList.php");
}

else
{
	$uid = $_COOKIE['uid'];
	$sid = $_COOKIE['sid'];
	
	function showTable()
	{
		$table=loadAllTable();
		
		if($table !=  null)
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
	}
}
?>