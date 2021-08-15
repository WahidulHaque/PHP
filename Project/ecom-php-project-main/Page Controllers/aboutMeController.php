<?php
require_once '../DB Handler/employeeDB.php';
require_once '../DB Handler/chatDB.php';

$EmpID="";
$Name="";
$Design="";
$Salary="";
$Mob="";
$mail="";
$Jdate="";
$Addedby="";

if(isset($_COOKIE['uid']) && isset($_COOKIE['sid']))
{
	$uid = $_COOKIE['uid'];
	$sid = $_COOKIE['sid'];
	
	$tab=calc($uid);
	$no= $tab[0]["TotalMsg"];
	
	$data=loadEmployee($uid);
	
	$EmpID=$data[0]["EmpID"];
	$Name=$data[0]["E_NAME"];
	$Design=$data[0]["DID"];
	$Salary=$data[0]["SAL"];
	$Mob=$data[0]["E_MOB"];
	$mail=$data[0]["E_MAIL"];
	$Jdate=$data[0]["JOIN_DATE"];
	$Addedby=$data[0]["ADDED_BY"];
	
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
	
	if(isset($_POST["msgBTN"]))
	{
		setcookie("uid",$uid,time()+600);
		setcookie("sid",$sid,time()+600);
		header("Location:chatBox.php");
	}
	
	if(isset($_POST["settingBTN"]))
	{
		setcookie("uid",$uid,time()+600);
		setcookie("sid",$sid,time()+600);
		header("Location:settings.php");
	}
}

else
{
	header("Location:index.php");
}	
?>