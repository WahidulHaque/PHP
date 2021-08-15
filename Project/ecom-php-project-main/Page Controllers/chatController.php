<?php
require_once '../DB Handler/chatDB.php';
require_once '../DB Handler/employeeDB.php';
//require_once '../Pages/Attachments/rename.php';

function showUnseenTable($para)
{
	$table=loadUnseenTable($para);
	
	if($table != null)
	{
		foreach($table as $data)
		{
			echo "<tr>";
			echo "<td align='middle'>".$data["MSG_ID"]."</td>";
			echo "<td align='middle'>".$data["SENDER"]."</td>";
			echo "<td>".$data["SUB"]."</td>";
			echo "<td align='middle'>".$data["DATE"]."</td>";
			echo "</tr>";		
		}
	}
	
	else
	{
		echo "<tr> <td colspan='4' align='middle'> <span style='color:red;'> NO DATA FOUND </span> </td> </tr>";
	}
}

function showSeenTable($para)
{
	$table=loadSeenTable($para);
	
	if($table != null)
	{
		foreach($table as $data)
		{
			echo "<tr>";
			echo "<td align='middle'>".$data["MSG_ID"]."</td>";
			echo "<td align='middle'>".$data["SENDER"]."</td>";
			echo "<td>".$data["SUB"]."</td>";
			echo "<td align='middle'>".$data["DATE"]."</td>";
			echo "</tr>";		
		}
	}
	
	else
	{
		echo "<tr> <td colspan='4' align='middle'> <span style='color:red;'> NO DATA FOUND </span> </td> </tr>";
	}
}

function showSentTable($para)
{
	$table=loadSentTable($para);
	
	if($table != null)
	{
		foreach($table as $data)
		{
			echo "<tr>";
			echo "<td align='middle'>".$data["MSG_ID"]."</td>";
			echo "<td align='middle'>".$data["RECEIVER"]."</td>";
			echo "<td>".$data["SUB"]."</td>";
			echo "<td align='middle'>".$data["DATE"]."</td>";
			echo "</tr>";		
		}
	}
	
	else
	{
		echo "<tr> <td colspan='4' align='middle'> <span style='color:red;'> NO DATA FOUND </span> </td> </tr>";
	}
}

if(isset($_COOKIE['uid']) && isset($_COOKIE['sid']))
{
	$uid = $_COOKIE['uid'];
	$sid = $_COOKIE['sid'];
	
	$toTB="";
	$SsubTB="";
	$sendnoteTA="";
	$sERR=false;
	
	$loadTB="";
	$fromTB="";
	$dateTB="";
	$RsubTB="";
	$receivenoteTA="";
	
	$loadSentTB="";
	$attachment="";
	
	$attch="";
	$_FILES['name']="";
	
	if(isset($_POST['sendBTN']))
	{
		if(empty($_POST['toTB']))
		{
			$sERR=true;
		}
		else
		{
			$toTB=$_POST['toTB'];
			
			$count = loadEmployee($toTB);
			
			if($toTB == $uid)
			{
				$sERR=true;
				$toTB="Self Text Not Allowed";
			}
			
			if($count == null)
			{
				$sERR=true;
				$toTB="Invalid User";
			}
		}
		
		if(empty($_POST['SsubTB']))
		{
			$sERR=true;
		}
		
		else
		{
			$SsubTB=$_POST['SsubTB'];
		}
		
		if(!$sERR)
		{
			if( $_FILES['file']['name'] != "" )
			{
				//$now = new DateTime();
				//$newname=$now->format('Y-m-d H:i:s')."";
				$newname=rand(00000,99999);
				$attachment="Attachments/".$newname.$_FILES['file']['name'];
				//$newname.=$_FILES['file']['name'];
				$dir="C:/xampp/htdocs/Git/trunk/Pages/Attachments/$newname";
				//$dir =$dir.;
				copy ( $_FILES['file']['tmp_name'], $dir . $_FILES['file']['name'] );
				
				$sendnoteTA=$_POST["sendnoteTA"];
				sendMSG($SsubTB,$uid,$sendnoteTA,$attachment,$toTB);
			}
			else
			{
				$sendnoteTA=$_POST["sendnoteTA"];
				sendMSG($SsubTB,$uid,$sendnoteTA,$attachment,$toTB);
			}
						
		}
	}
	
	
	if(isset($_POST['openInboxBTN']))
	{
		if(empty($_POST['loadTB']))
		{

		}
		
		else
		{
			$loadTB=$_POST['loadTB'];
			$oTab=openInboxMSG($uid,$loadTB);
			
			if($oTab != null)
			{
				$fromTB=$oTab[0]["SENDER"];
				$RsubTB=$oTab[0]["SUB"];
				$receivenoteTA=$oTab[0]["TEXT"];
				$dateTB=$oTab[0]["DATE"];
				$attch=$oTab[0]["ATTACHMENT"];
				
				if($oTab[0]["STATUS"] == '0')
				{
					updateMSGSTS($_COOKIE['uid'],$loadTB);
				}
			}
			
			else
			{
				$loadTB="Invalid ID.";
			}		
		}
	}
	
	if(isset($_POST['openSBTN']))
	{
		if(empty($_POST['loadSentTB']))
		{

		}
		
		else
		{
			$loadSentTB=$_POST['loadSentTB'];
			$oTab=openSentMSG($uid,$loadSentTB);
			
			if($oTab != null)
			{
				$toTB=$oTab[0]["RECEIVER"];
				$SsubTB=$oTab[0]["SUB"];
				$sendnoteTA=$oTab[0]["TEXT"];
			}
			
			else
			{
				$loadSentTB="Invalid ID.";
			}		
		}
	}
	
}

else
{
	header("Location:index.php");
}	
?>