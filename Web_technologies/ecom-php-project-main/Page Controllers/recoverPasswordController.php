<?php
require_once '../DB Handler/loginDB.php';
require_once '../DB Handler/employeeDB.php';

$recover=true;
$NEWPASS="";
$A=rand(10,56);
$B=rand(22,97);
$RES="";
$RESmsg="";
$UIDmsg="";
$info="";
$userINFO=null;

$LID="";
$UNAME="";
$UDEGN="";
$SID="";
$UCON="";
$UEMAIL="";
$USAL="";
if(isset($_POST['send']))
{
	if(!empty($_POST['UID']))
	{
		$LID=$_POST['UID'];
		$userINFO=loadEmployee($LID);
		if($userINFO != null)
		{
			$LID=$_POST['UID'];
			$UIDmsg="&#10004;";
		}
		else
		{
			$info="Invalid User. Check your ID again.";
			$UIDmsg="&#10008";
			$recover=false;
		}
	}
	else
	{
		$recover=false;
	}
	
	if(!empty($_POST['UNAME']))
	{
		$UNAME=$_POST['UNAME'];
	}
	else
	{
		$recover=false;
	}
	
	if(!empty($_POST['UDEGN']))
	{
		$UDEGN=strtoupper($_POST['UDEGN']);
		if($UDEGN == "ADMIN")
		{
			$SID="1";
		}
		else if($UDEGN == "MANAGER")
		{
			$SID="2";
		}
		else if($UDEGN == "SALESMAN")
		{
			$SID="3";
		}
		else
		{
			$SID="4";
		}
	}
	else
	{
		$recover=false;
	}
	
	if(!empty($_POST['UCON']))
	{
		$UCON=$_POST['UCON'];
	}
	else
	{
		$recover=false;
	}
	
	if(!empty($_POST['USAL']))
	{
		$USAL=$_POST['USAL'];
	}
	else
	{
		$recover=false;
	}
	
	if(!empty($_POST['UEMAIL']))
	{
		$UEMAIL=$_POST['UEMAIL'];
	}
	else
	{
		$recover=false;
	}
	
	if(!empty($_POST['RES']))
	{
		$RES=$_POST['RES'];
		$c = $_POST['C'];
		
		if($RES == $c)
		{
			$RES="";
			$RESmsg="&#10004;";
			
		}
		else
		{
			$RES="";
			$RESmsg="&#10008";
			$recover=false;
		}
	}
	else
	{
		$recover=false;
	}
	
	
	if($recover == true)
	{				
		if($LID==$userINFO[0]["EmpID"] && strtoupper($UNAME)==$userINFO[0]["E_NAME"] && $SID==$userINFO[0]["DID"] && $UCON==$userINFO[0]["E_MOB"] && $USAL==$userINFO[0]["SAL"])
		{
			$permitted_chars = 'abcdefghijklmnopqrstuvwxyz.*#';
			$addChar=substr(str_shuffle($permitted_chars), 0, 3);
			$NEWPASS="temp".rand(1111,9999).$addChar;
			resetPASS($LID,md5($NEWPASS));
			$info="Change password on next login and stay secured.";
		}
		
		else
		{
			$info="Information Mismatched. Try again or contact with ADMIN.";
		}
	}	
}
?>

