<?php
require_once '../DB Handler/productDB.php';
require_once '../DB Handler/salesDB.php';

$srchProdTF = "";
function showTable()
{
	$table=array();
	$table=null;
	
	if(empty($_POST["srchProdTF"]))
	{
		$table=loadTable();
		
		if($table != null)
		{
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
		
		else
		{
			echo "<tr> <td colspan='8' align='middle'> NO DATA FOUND </td> </tr>";
		}
	}
	
	else if(!empty($_POST["srchProdTF"]))
	{
		$srchProdTF = $_POST["srchProdTF"];
		
		$table=loadTableByType($srchProdTF);
		if($table != null)
		{
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
		
		else
		{
			echo "<tr> <td colspan='8' align='middle'> NO DATA FOUND </td> </tr>";
		}
	}
	
	else
	{
		echo "<tr> <td colspan='8'> NO DATA FOUND </td> </tr>";
	}
}

if(isset($_COOKIE['uid']) && isset($_COOKIE['sid']))
{
	$uid = $_COOKIE['uid'];
	$sid = $_COOKIE['sid'];
	
	$pidTF="";
	$pnameTF="";
	
	$slid="";
	
	$quantTF="";
	
	$priceTF="";
	
	$cusnameTF="";
	
	$cusmobTF="";
	
	$sidTF="";
	$date="";
	
	$check=array();
	$check=null;
	//$pQ="";
	//$pS="";
	//$pBP="";
	//$pBS="";
	
	$m1="";
	$m2="";
	$m3="";
	
	$btnName = "Invoice Not Ready";
	
	$inERR=false;
	
	
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
	
	if(isset($_POST["goBTN"]))
	{
		setcookie("uid",$uid,time()+600);
		setcookie("sid",$sid,time()+600);
		header("Location:salesHistory.php");
	}
	
	if(isset($_POST["sellBTN"]))
	{
		if(empty($_POST["prodidTF"]))
		{
			$inERR=true;
		}
		
		else
		{
			$pnameTF=$_POST["prodidTF"];
			
			$check=loadProduct($pnameTF);
			
			if($check == null)
			{
				$inERR=true;
				$m1="&#10033;";
			}
			
			else
			{
				if($check[0]['AVAILABILITY'] != 'AVAILABLE')
				{
					$inERR=true;
					$m1="&#10033;";
				}
			}
		}
		
		if(empty($_POST["quantTF"]))
		{
			$inERR=true;
		}
		
		else
		{
			$quantTF =$_POST["quantTF"];
			if(!is_numeric($quantTF)) 
			{
				$inERR=true;
				$m2="&#10033;";
			} 
				
			else
			{
				if($check != null)
				{
					if($quantTF<1 || $quantTF > $check[0]['QUANTITY'])
					{
						$inERR=true;
						$m2="&#10033;";
					}
				}
			}
		}
		
		if(empty($_POST["priceTF"]))
		{
			$inERR=true;
		}
		
		else
		{
			
			$priceTF =$_POST["priceTF"];
			if(!is_numeric($priceTF)) 
			{
				$inERR=true;
				$m3="&#10033;";
			} 
				
			else
			{
				if($check != null)
				{
					if($priceTF <= $check[0]['BUY_PRICE'] || $priceTF > $check[0]['SELL_PRICE'])
					{
						$inERR=true;
						$m3="&#10033;";
					}
				}
			}
		}
		
		if(empty($_POST["cusnameTF"]))
		{
			$inERR=true;
		}
		
		else
		{
			$cusnameTF=$_POST["cusnameTF"];
		}
		
		
		if(empty($_POST["cusmobTF"]))
		{
			$inERR=true;
		}
		
		else
		{
			
			$cusmobTF =$_POST["cusmobTF"];
			if(!is_numeric($cusmobTF)) 
			{
				$inERR=true;
			} 	
		}
		
		if(!$inERR)
		{
			$a="DONE";
			$OB_AMMOUNT=$priceTF*$quantTF;
			$PROFIT=$OB_AMMOUNT-($quantTF*$check[0]['BUY_PRICE']);
			
			$upq=$check[0]['QUANTITY']-$quantTF;
			
			$task=insertSales($pnameTF, $quantTF, $OB_AMMOUNT, $PROFIT, $cusnameTF, $cusmobTF, $uid);
			$slid=$task['MAX(`SLID`)'];
			$date=$task['MAX(`Sell_SDate`)'];
			
			if($upq == 0)
			{
				updateOnSell($pnameTF, $upq, "UNAVAILABLE");
			}
			
			else
			{
				updateOnSell($pnameTF, $upq, "");
			}				
			
			$btnName = "Print Invoice";
		}
	}
}

else
{
	header("Location:index.php");
}	
?>