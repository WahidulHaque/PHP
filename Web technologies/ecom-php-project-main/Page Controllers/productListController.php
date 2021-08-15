<?php
require_once '../DB Handler/productDB.php';

function showTable()
{
	$table=loadTable();
	
	foreach($table as $data)
	{
		echo "<tr>";
		echo "<td align='middle'>".$data["PID"]."</td>";
		echo "<td>".$data["P_NAME"]."</td>";
		echo "<td align='middle'>".$data["TYPE"]."</td>";
		echo "<td align='middle'>".$data["QUANTITY"]."</td>";
		echo "<td align='middle'>".$data["BUY_PRICE"]."</td>";
		echo "<td align='middle'>".$data["SELL_PRICE"]."</td>";
		echo "<td align='middle'>".$data["MOD_BY"]."</td>";
		echo "<td align='middle'>".$data["Add_PDate"]."</td>";
		echo "</tr>";
	}
}

if(isset($_COOKIE['uid']) && isset($_COOKIE['sid']) && ($_COOKIE['sid'] != 1 || $_COOKIE['sid'] != 2))
{
	$btnNM="DELETE";
	$uid = $_COOKIE['uid'];
	$sid = $_COOKIE['sid'];
	
	$srchProdTF="";
	$srchProdTFerror="";
	
	$pidTF="";
	$pidTFerror="";
	$pnameTF="";
	$pnameTFerror="";

	$type="";
	$o1= false;
	$o2= false;
	$o3= false;
	$o4= false;
	$o5= false;
	$o6= false;
	$o7= false;
	$o8= false;
	$o9= false;
	$o10= false;
	$o11= false;
	$o12= false;
	$typeerror="";
	$quantTF="";
	$quantTFerror="";
	$buyPriceTF="";
	$buyPriceTFerror="";
	$sellPriceTF="";
	$sellPriceTFerror="";
	$addby=$uid;
	$adddate="";
	$av="";
	
	$srchvalid=false;
	
	$insertERR=false;
	
	$updateERR=false;
	
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
	
	if(isset($_POST["advsrchbtn"]))
	{
		setcookie("uid",$uid,time()+600);
		setcookie("sid",$sid,time()+600);
		header("Location:advancedProductSearch.php");
	}
	
	if(isset($_POST["srchBTN"]))
	{
		if(empty($_POST["srchProdTF"]))
		{
			$srchProdTFerror="&#10033;"."Product ID required.";
		}
		
		else
		{
			$srchProdTF=$_POST["srchProdTF"];
			$srcID=loadProduct($srchProdTF);
			
			if($srcID != null)
			{
				$pidTF=$srcID[0]["PID"];
				$pnameTF=$srcID[0]["P_NAME"];
				$type=$srcID[0]["TYPE"];
				if($type=="LAPTOP")
				{
					$o2=true;
				}
				else if($type=="MONITOR")
				{
					$o3=true;
				}
				else if($type=="MOUSE")
				{
					$o4=true;
				}
				else if($type=="SPEAKER")
				{
					$o5=true;
				}
				else if($type=="RAM")
				{
					$o6=true;
				}
				else if($type=="ROM")
				{
					$o7=true;
				}
				else if($type=="PROCCESOR")
				{
					$o8=true;
				}
				else if($type=="PORTABLE HDD/SSD")
				{
					$o9=true;
				}
				else if($type=="KEYBOARD")
				{
					$o10=true;
				}
				else if($type=="PRINTER")
				{
					$o11=true;
				}
				else if($type=="SOFTWARE")
				{
					$o12=true;
				}
				else
				{
					$o1==true;
				}
				$quantTF=$srcID[0]["QUANTITY"];
				$buyPriceTF=$srcID[0]["BUY_PRICE"];
				$sellPriceTF=$srcID[0]["SELL_PRICE"];
				$addby=$srcID[0]["MOD_BY"];
				$adddate=$srcID[0]["Add_PDate"];
				$av=$srcID[0]["AVAILABILITY"];
				
				if($av != "AVAILABLE")
				{
					$btnNM="RE-AVAIL";
				}
				else
				{
					$btnNM="DELETE";
				}
				
				$srchvalid=true;
			}
		}
	}
	
	if(isset($_POST["insertBTN"]))
	{
		if($sid == '1' || $sid == '2')
		{
			if(empty($_POST["pidTF"]))
			{
				$pidTFerror="&#10033;";
				$insertERR=true;
			}
			
			else
			{
				$pidTF=$_POST["pidTF"];
				$reqID=loadProduct($pidTF);
				
				if($reqID==null)
				{
					$pidTF=$_POST["pidTF"];
				}
				else
				{
					$insertERR=true;
					$pidTF="";
					$pidTFerror="&#10033;";
				}
			}
			
			if(empty($_POST["pnameTF"]))
			{
				$pnameTFerror="&#10033;";
				$insertERR=true;
			}
			
			else
			{
				$pnameTF=$_POST["pnameTF"];
			}
			
			if(isset($_POST["type"]))
			{
				$type=$_POST["type"];
				if($type == "SELECT")
				{
					$o1=true;
					$typeerror="&#10033;";
					$type="";
					$insertERR=true;
				}
				
				else
				{
					$type=$_POST["type"];
					
					if($type=="LAPTOP")
					{
						$o2=true;
					}
					
					if($type=="MONITOR")
					{
						$o3=true;
					}
					
					if($type=="MOUSE")
					{
						$o4=true;
					}
					
					if($type=="SPEAKER")
					{
						$o5=true;
					}
					
					if($type=="RAM")
					{
						$o6=true;
					}
					
					if($type=="ROM")
					{
						$o7=true;
					}
					
					if($type=="PROCCESOR")
					{
						$o8=true;
					}
					
					if($type=="PORTABLE HDD/SSD")
					{
						$o9=true;
					}
					
					if($type=="KEYBOARD")
					{
						$o10=true;
					}
					
					if($type=="PRINTER")
					{
						$o11=true;
					}
					
					if($type=="SOFTWARE")
					{
						$o12=true;
					}
				}			
			}
			
			else
			{
				$typeerror="&#10033;";
				$insertERR=true;
			}
			
			if(empty($_POST['quantTF']))
			{
				$quantTFerror="&#10033;";
				$insertERR=true;
			}
			else
			{
				if(is_numeric ($_POST['quantTF'])==true && strpos( $_POST['quantTF'], "." ) == false )
				{
					$quantTF=$_POST['quantTF'];
					
					if($quantTF >= 0)
					{
						$quantTF=$_POST['quantTF'];
						$quantTFerror="";
					}
					else
					{
						$quantTF="";
						$quantTFerror="&#10033;";
						$insertERR=true;
					}	
				}
				
				else
				{
					$quantTF="";
					$quantTFerror="&#10033;";
					$insertERR=true;
				}
			}
			
			if(empty($_POST['buyPriceTF']))
			{
				$buyPriceTFerror="&#10033;";
				$insertERR=true;
			}
			else
			{
				if(is_numeric ($_POST['buyPriceTF'])==true)
				{
					$buyPriceTF=$_POST['buyPriceTF'];
					if($buyPriceTF != 0 && $buyPriceTF >= 1)
					{
						$buyPriceTF=$_POST['buyPriceTF'];
						$buyPriceTFerror="";
					}
					
					else
					{
						$buyPriceTF="";
						$buyPriceTFerror="&#10033;";
						$insertERR=true;
					}
				}
				
				else
				{
					$buyPriceTF="";
					$buyPriceTFerror="&#10033;";
					$insertERR=true;
				}
			}
			
			if(empty($_POST['sellPriceTF']))
			{
				$sellPriceTFerror="&#10033;";
				$insertERR=true;
			}
			else
			{
				if(is_numeric ($_POST['sellPriceTF'])==true)
				{
					$sellPriceTF=$_POST['sellPriceTF'];
					$sellPriceTFerror="";
					if(!empty($_POST['buyPriceTF']) && $sellPriceTF > $buyPriceTF )
					{
						$sellPriceTF=$_POST['sellPriceTF'];
						$sellPriceTFerror="";
					}
					
					else
					{
						$sellPriceTF="";
						$sellPriceTFerror="&#10033;";
						$insertERR=true;
					}
				}
				
				else
				{
					$sellPriceTF="";
					$sellPriceTFerror="&#10033;";
					$insertERR=true;
				}
			}
			
			if(!$insertERR)
			{
				insertProduct($pidTF, $pnameTF, $type, $quantTF, $buyPriceTF, $sellPriceTF, $uid);
			}
		}
		
		else{}
	}
	
	if(isset($_POST["updateBTN"]))
	{
		if($sid == '1' || $sid == '2')
		{
			if(empty($_POST["pidTF"]))
			{
				$pidTFerror="&#10033;";
				$updateERR=true;
			}
			
			else
			{
				$pidTF=$_POST["pidTF"];
			}
			
			if(empty($_POST["pnameTF"]))
			{
				$pnameTFerror="&#10033;";
				$updateERR=true;
			}
			
			else
			{
				$pnameTF=$_POST["pnameTF"];
			}
			
			if(isset($_POST["type"]))
			{
				$type=$_POST["type"];
				if($type == "SELECT")
				{
					$o1=true;
					$typeerror="&#10033;";
					$type="";
					$updateERR=true;
				}
				
				else
				{
					$type=$_POST["type"];
					
					if($type=="LAPTOP")
					{
						$o2=true;
					}
					
					if($type=="MONITOR")
					{
						$o3=true;
					}
					
					if($type=="MOUSE")
					{
						$o4=true;
					}
					
					if($type=="SPEAKER")
					{
						$o5=true;
					}
					
					if($type=="RAM")
					{
						$o6=true;
					}
					
					if($type=="ROM")
					{
						$o7=true;
					}
					
					if($type=="PROCCESOR")
					{
						$o8=true;
					}
					
					if($type=="PORTABLE HDD/SSD")
					{
						$o9=true;
					}
					
					if($type=="KEYBOARD")
					{
						$o10=true;
					}
					
					if($type=="PRINTER")
					{
						$o11=true;
					}
					
					if($type=="SOFTWARE")
					{
						$o12=true;
					}
				}			
			}
			
			else
			{
				$typeerror="&#10033;";
				$updateERR=true;
			}
			
			if(empty($_POST['quantTF']))
			{
				$quantTFerror="&#10033;";
				$updateERR=true;
			}
			else
			{
				if(is_numeric ($_POST['quantTF'])==true && strpos( $_POST['quantTF'], "." ) == false )
				{
					$quantTF=$_POST['quantTF'];
					if($quantTF >= 0)
					{
						$quantTFerror="";
					}
					
					else
					{
						$quantTF="";
						$quantTFerror="&#10033;";
						$updateERR=true;
					}	
				}
				
				else
				{
					$quantTF="";
					$quantTFerror="&#10033;";
					$updateERR=true;
				}
			}
			
			if(empty($_POST['buyPriceTF']))
			{
				$buyPriceTFerror="&#10033;";
				$updateERR=true;
			}
			else
			{
				if(is_numeric ($_POST['buyPriceTF'])==true)
				{
					$buyPriceTF=$_POST['buyPriceTF'];
					$buyPriceTFerror="";
					if($buyPriceTF != 0 && $buyPriceTF >= 1)
					{
						$buyPriceTF=$_POST['buyPriceTF'];
						$buyPriceTFerror="";
					}
					
					else
					{
						$buyPriceTF="";
						$buyPriceTFerror="&#10033;";
						$updateERR=true;
					}
				}
				
				else
				{
					$buyPriceTF="";
					$buyPriceTFerror="&#10033;";
					$updateERR=true;
				}
			}
			
			if(empty($_POST['sellPriceTF']))
			{
				$sellPriceTFerror="&#10033;";
				$updateERR=true;
			}
			else
			{
				if(is_numeric ($_POST['sellPriceTF'])==true)
				{
					$sellPriceTF=$_POST['sellPriceTF'];
					$sellPriceTFerror="";
					if(!empty($_POST['buyPriceTF']) && $sellPriceTF > $buyPriceTF )
					{
						$sellPriceTF=$_POST['sellPriceTF'];
						$sellPriceTFerror="";
					}
					
					else
					{
						$sellPriceTF="";
						$sellPriceTFerror="&#10033;";
						$updateERR=true;
					}
				}
				
				else
				{
					$sellPriceTF="";
					$sellPriceTFerror="&#10033;";
					$updateERR=true;
				}
			}
			
			if(!$updateERR)
			{
				updateProduct($pidTF, $pnameTF, $type, $quantTF, $buyPriceTF, $sellPriceTF, $uid);
			}
		}
	}
	
	if(isset($_POST["deleteBTN"]))
	{
		if(empty($_POST["pidTF"]))
		{
			$pidTFerror="&#10033;";
		}
		
		else
		{
			$pidTF=$_POST["pidTF"];
			
			if($_POST["deleteBTN"] == "DELETE")
			{
				deleteProduct($pidTF,"UNAVAILABLE");
			}
			
			else
			{
				deleteProduct($pidTF,"AVAILABLE");
			}
			
		}
	}
	
	if(isset($_POST["refreshBTN"]))
	{
		$srchProdTF="";
		$srchProdTFerror="";
		
		$pidTF="";
		$pidTFerror="";
		$pnameTF="";
		$pnameTFerror="";

		$type="";
		$o1= false;
		$o2= false;
		$o3= false;
		$o4= false;
		$o5= false;
		$o6= false;
		$o7= false;
		$o8= false;
		$o9= false;
		$o10= false;
		$o11= false;
		$o12= false;
		$typeerror="";
		$quantTF="";
		$quantTFerror="";
		$buyPriceTF="";
		$buyPriceTFerror="";
		$sellPriceTF="";
		$sellPriceTFerror="";
		$addby=$uid;
		$adddate="";
		$av="";
		
		$srchvalid=false;
		
		$insertERR=false;
		
		$updateERR=false;
	}
}

else
{
	header("Location:index.php");
}	
?>