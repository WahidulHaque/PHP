<?php
include '../Page Controllers/salesHistoryController.php';
?>

<!DOCTYPE html>
<html>
	<head> 
		<title> Sales History </title>
		<link rel="stylesheet" type="text/css" href="CSS/salesHistory.css">
		<script src="../Page Controllers/javascript/saleHistoryJS.js"></script>
	</head>
	
	<body style="background-image: url('Images/abc.jpg'); background-repeat: no-repeat; background-size: cover;">
		<div class="container">
			<form autocomplete="off" action="" method="post">
				<div class="floatRightTop">
					<table name="search&logout">
						<tr>
							<td>
								<input type="text" class="srchtf" name="srchProdTF" placeholder="Search by Sales ID." value="<?php echo "$srchProdTF";?>">
							</td>
							
							<td> 
								<span style="color:red; font-size:15px;"> <?php echo "$srchProdTFerror";?> </span> 
							</td>
							
							<td>
								<input type="submit" class="srchbtn" name="srchBTN" value="Search">
							</td>
							
							<td style="width:05%;"></td>
							
							<td>
								<input type="text" class="srchtf2" id="srchHistDateTF" placeholder="Sort by Date" onkeyup="srch()">
							</td>
							
							<td>
								<input type="text" class="srchtf2" id="srchHistCusNameTF" placeholder="Sort by Cus Name" onkeyup="srch()">
							</td>
							
							<td style="width:05%;"></td>
							
							<td align="middle"> 
								<button class="printbtn" name="printbtn" id="printbtn" onclick='savePDF()'>Print Table</button> 
							</td>
							
							<td style="width:10%;"></td>
							
							<td>
								<input type="submit" class="srchbtn" name="gohomebtn" value="Home">
							</td>
							
							<td style="width:10%;"></td>
							
							<td>
								<input type="submit" class="gobtn" name="goBTN" value="Back To Sell <<">
							</td>
							
							<td class="col"></td>
							
							<td>
								<input type="submit" class="logoutbtn" name="logoutBTN" value="Logout">
							</td>
						</tr>
					</table>
					<div class="scrollit">
						<div id="printableTable">
							<table name="salesTable" id="salesTable">
								<caption>Sales History</caption>
								<thead>
									<tr>
										<th>Sales ID.</th>
										<th>Product ID</th>
										<th>Selling Quantity</th>
										<th>Obtained Ammount</th>
										<th>Total Profit</th>
										<th>Customer Name</th>
										<th>Customer Contact</th>
										<th>Sold By</th>
										<th>Date</th>
									</tr>
								</thead>
								
								<tbody id='tab'>
									<?php
									showTable();
									?>
								</tbody>
								
								<tfoot>
									<!--<td align="middle">&#931;=2</td>
									<td></td>
									<td align="middle">&#931;=2</td>
									<td align="middle">&#931;=2</td>
									<td align="middle">&#931;=2</td>
									<td colspan="4"></td>-->
									<?php
									showFoot();
									?>
								</tfoot>
							</table>
						</div>
					</div>
				</div>
						
				<div class="floatLeftDown">
					<table name="input" style="width: calc(100%);">
						<tr>
							<td class="td1"> Sales ID: </td>
							<td class="td2"> 
								<input type="text" class="tf" name="sidTF" value="<?php echo $sidTF; ?>" readonly> 
							</td>
						</tr>
						
						<tr>
							<td class="td1"> Product ID: </td>
							<td class="td2">
								<input type="text" class="tf" name="prodidTF" value="<?php echo $prodidTF; ?>"  readonly> 
							</td>
						</tr>
						
						<tr>
							<td class="td1"> Selling Quantity: </td>
							<td class="td2"> 
								<input type="number" class="tf" name="quantTF" value="<?php echo $quantTF; ?>"  readonly> 
							</td>
						</tr>
						
						<tr>
							<td class="td1"> Obtained Ammount: </td>
							<td class="td2"> 
								<input type="number" class="tf" name="obtamntTF" value="<?php echo $obtamntTF; ?>"  readonly> 
							</td>
						</tr>
						
						<tr>
							<td class="td1"> Total Profit: </td>
							<td class="td2"> <input type="number" class="tf" name="profitTF" value="<?php echo $profitTF; ?>"  readonly> </td>
						</tr>
						
						<tr>
							<td class="td1"> Customer Name: </td>
							<td class="td2"> <input type="text" class="tf" name="cusnameTF" value="<?php echo $cusnameTF; ?>"  readonly> </td>
						</tr>
						
						<tr>
							<td class="td1"> Customer Contact: </td>
							<td class="td2"> <input type="number" class="tf" name="cusmobTF" value="<?php echo $cusmobTF; ?>"  readonly> </td>
						</tr>
						
						<tr>
							<td class="td1"> Sold By: </td>
							<td class="td2"> 
								<input type="text" class="tf" name="empidTF" value="<?php echo $empidTF; ?>"  readonly> 
							</td>
						</tr>
						
						<tr>
							<td class="td1"> Date: </td>
							<td class="td2"> <input type="text" class="tf" name="sellDateTF" value="<?php echo $sellDateTF; ?>"  readonly> </td>
						</tr>
					</table>
				
					<div align='middle' style="padding-top:5%;"> <input type="submit" class="btn" name="refreshBTN" value="Refresh"> </div>
				</div>
			</form>
		</div>
	</body>
</html>	
		
