<?php
require_once '../DB Handler/loginDB.php';

if(isset($_COOKIE['uid']) && isset($_COOKIE['sid']))
{
	$uid = $_COOKIE['uid'];
	$sid = $_COOKIE['sid'];
		
	$oldpassPF="";
	$oldpassPFerror="";
	
	$newpassPF="";
	$newpassPFerror="";
	
	$confirmpassPF="";
	$confirmpassPFerror="";
	
	$temp = "";
	$msg1 = "";
	$msg2 = "";
	$msg3 = "";
	$msg4 = "";
	$rst = "";
	
	if(isset($_POST["logoutBTN"]))
	{
		setcookie("uid",$uid,time()-600);
		setcookie("sid",$sid,time()-600);
		header("Location:../index.php");
	}
	
	if(isset($_POST["gohomebtn"]))
	{
		setcookie("uid",$uid,time()+600);
		setcookie("sid",$sid,time()+600);
		header("Location:home.php");
	}
	
	if(isset($_POST["backBTN"]))
	{
		setcookie("uid",$uid,time()+600);
		setcookie("sid",$sid,time()+600);
		header("Location:aboutMe.php");
	}
	
	if(isset($_POST["ProceedBTN"]))
	{
		$haserror=false;
		
		if(empty($_POST["oldpassPF"]))
		{
			$oldpassPFerror="&#10033;";
			$haserror=true;
		}
		
		else
		{
			$oldpassPF =$_POST["oldpassPF"];
			$data=getLogin($uid,md5($oldpassPF));
			if($data != null)
			{
				if(md5($oldpassPF) != $data[0]['PASS'])
				{
					$msg1 = '&#10033;';
					$oldpassPF ="";
					$haserror=true;
				}
			}
			
			else
			{
				$msg1 = '&#10033;';
				$oldpassPF ="";
				$haserror=true;
			}
		}
		
		if(empty($_POST["newpassPF"]))
		{
			$newpassPFerror="&#10033;";
			$haserror=true;
		}
		
		else
		{	
			$newpassPF =$_POST["newpassPF"];
			if(strlen($newpassPF) < 4) 
			{
				$msg2 = '&#10033;';
				$haserror=true;
			}
		}
		
		if(empty($_POST["confirmpassPF"]))
		{
			$confirmpassPFerror="&#10033;";
			$haserror=true;
		}
		
		else
		{	
			$confirmpassPF =$_POST["confirmpassPF"];
			if(strlen($confirmpassPF) < 4) 
			{
				$msg3 = '&#10033;';
				$haserror=true;
			}
		}
		
		if(strlen($confirmpassPF)>3 && strlen($newpassPF)>3)
		{
			if($newpassPF != $confirmpassPF)
			{
				$haserror=true;
				$msg4 = '&#10033;';
			}
		}

		if(!$haserror)
		{
			updatePass(md5($confirmpassPF),$uid,md5($oldpassPF));
			setcookie("uid",$uid,time()-600);
			setcookie("sid",$sid,time()-600);
			header("Location:index.php");
		}		
	}	
}

else
{
	header("Location:../index.php");
}	
?>

<script>
	
</script>