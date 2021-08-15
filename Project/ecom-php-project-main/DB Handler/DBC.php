<?php
$serverName="localhost";
$userName="root";
$password="";
$dbName="btweb";

function execute($query)
{
	global $serverName,$userName,$password,$dbName;
	$conn=mysqli_connect($serverName,$userName,$password,$dbName);
	mysqli_query($conn,$query);
	mysqli_close($conn);
}

function get($query)
{
	$data=array();
	global $serverName,$userName,$password,$dbName;
	try
	{
		$conn=mysqli_connect($serverName,$userName,$password,$dbName);
		$result=mysqli_query($conn,$query);
		if(mysqli_num_rows($result) > 0)
		{
			while($row=mysqli_fetch_assoc($result))
			{
				$entity=array();
				foreach($row as $k=>$v)
				{
					$entity[$k]=$row[$k];
				}
				$data[]=$entity;

			}
		}
		return $data;
		mysqli_close($conn);
	}

	catch (Exception $e)
	{
		throw $e->getMessage();
		return $data;
		mysqli_close($conn);
	}
}
?>
