<?php
if(isset($_COOKIE['uid']) && isset($_COOKIE['sid']))
{
	$uid = $_COOKIE['uid'];
	$sid = $_COOKIE['sid'];
	
	if(isset($_POST["employeeBTN_x"]) || isset($_POST["employeeBTN_y"]))
	{
		setcookie("uid",$uid,time()+600);
		setcookie("sid",$sid,time()+600);
		header("Location:employeeList.php");
	}	
	
	if(isset($_POST["productBTN_x"]) || isset($_POST["productBTN_y"]))
	{
		setcookie("uid",$uid,time()+600);
		setcookie("sid",$sid,time()+600);
		header("Location:productList.php");
	}	
	
	if(isset($_POST["sellBTN_x"]) || isset($_POST["sellBTN_y"]))
	{
		setcookie("uid",$uid,time()+600);
		setcookie("sid",$sid,time()+600);
		header("Location:sellProduct.php");
	}	
	
	if(isset($_POST["takenoteBTN_x"]) || isset($_POST["takenoteBTN_y"]))
	{
		setcookie("uid",$uid,time()+600);
		setcookie("sid",$sid,time()+600);
		header("Location:takenote.php");
	}
	
	if(isset($_POST["aboutmeBTN_x"]) || isset($_POST["aboutmeBTN_y"]))
	{
		setcookie("uid",$uid,time()+600);
		setcookie("sid",$sid,time()+600);
		header("Location:aboutMe.php");
	}
	
	if(isset($_POST["learnmoreBTN_x"]) || isset($_POST["learnmoreBTN_y"]))
	{
		setcookie("uid",$uid,time()+600);
		setcookie("sid",$sid,time()+600);
		header("Location:learnMore.php");
	}
	
	if(isset($_POST["logoutBTN"]))
	{
		setcookie("uid",$uid,time()-600);
		setcookie("sid",$sid,time()-600);
		header("Location:../index.php");
	}
}

else
{
	header("Location:../index.php");
}	

?>