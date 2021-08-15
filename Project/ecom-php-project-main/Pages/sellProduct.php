<?php
include '../Page Controllers/sellProductController.php';
?>

<!DOCTYPE html>
<html>
	<head>
		<title> Sell Product </title>
		<link rel="stylesheet" type="text/css" href="CSS/sellProduct.css">
		<!--<script src="../Page Controllers/javascript/advancedProductSearchOnSaleJS.js"></script>-->
		<script src="../Page Controllers/javascript/sellProductJS.js"></script>
	</head>

	<body style="background-image: url('Images/5.jpg'); background-repeat: no-repeat; background-size: cover;">
		<div class="container">
			<form autocomplete="off" action="" method="post">
				<div class="floatRightTop">
					<table name="search&logout">
						<tr>
							<td>
								<input type="text" class="srchtf" id="srchProdTypeTF" placeholder="Sort by Product Type" onkeyup="srch()">
								<input type="hidden" id="sid" value="<?php echo $_COOKIE['sid']; ?>">
							</td>

							<td>
								<input type="text" class="srchtf" id="srchProdNameTF" placeholder="Sort by Product Name" onkeyup="srch()">
							</td>

							<td>
								<span style="color:red; font-size:15px;"> </span>
							</td>

							<td style="width:50%;"></td>

							<td>
								<input type="submit" class="srchbtn" name="gohomebtn" value="Home">
							</td>

							<td class="space"></td>

							<td>
								<input type="submit" class="gobtn" name="goBTN" value="Check Sales History  >>">
							</td>

							<td class="col"></td>

							<td>
								<input type="submit" class="logoutbtn" name="logoutBTN" value="Logout">
							</td>
						</tr>
					</table>
					<div class="scrollit">
						<table name="prodTable" id="prodTable">
							<caption>Available Product List</caption>
							<thead>
								<tr>
									<th>ID.</th>
									<th>Name</th>
									<th>Type</th>
									<th>Quantity</th>
									<th>Buying Price</th>
									<th>Selling Price</th>
									<th>Modified By</th>
									<th>Adding Date</th>
								</tr>
							</thead>

							<tbody id="tab">
								<?php
								showTable();
								?>
							</tbody>
						</table>
					</div>
				</div>

				<div class="floatLeftDown">
					<table name="input" style="width: 100%;">
						<tr>
							<td class="td1"> Purchase ID: </td>
							<td class="td2">
								<input type="text" class="tf" name="puridTF" id="puridTF" value="" placeholder="Auto Generated" readonly>
								<input type="hidden" id="purchaseID" value="<?php echo "$slid";?>" readonly>
							</td>
							<td class="td3">
								<span style="color:red; font-size:15px;"> </span>
							</td>
						</tr>

						<tr>
							<td class="td1"> Product ID: </td>
							<td class="td2">
								<input type="text" class="tf" name="prodidTF" id="prodidTF" placeholder="Available Product ID" value="<?php echo "$pnameTF";?>">
								<input type="hidden" id="productID" value="<?php echo "$pnameTF";?>"readonly>
							</td>
							<td class="td3">
								<span id="prodidTFerr" style="color:red; font-size:15px;"> <?php echo $m1; ?> </span>
							</td>
						</tr>

						<tr>
							<td class="td1"> Purchase Quantity: </td>
							<td class="td2">
								<input type="number" class="tf" name="quantTF" id="quantTF" min="0" placeholder="Valid Quantity" value="<?php echo "$quantTF";?>">
								<input type="hidden" id="Quant" value="<?php echo "$quantTF";?>" readonly>
							</td>
							<td class="td3">
								<span id="quantTFerr" style="color:red; font-size:15px;"> <?php echo $m2; ?> </span>
							</td>
						</tr>

						<tr>
							<td class="td1"> Price(/unit): </td>
							<td class="td2">
								<input type="number" class="tf" name="priceTF" id="priceTF" min="0" placeholder="Without Loss" value="<?php echo "$priceTF";?>">
								<input type="hidden" id="price" value="<?php echo "$priceTF";?>" readonly>
							</td>
							<td class="td3">
								<span id="priceTFerr" style="color:red; font-size:15px;"> <?php echo $m3; ?> </span>
							</td>
						</tr>

						<tr>
							<td class="td1"> Customer Name: </td>
							<td class="td2">
								<input type="text" class="tf" style="text-transform: uppercase;" name="cusnameTF" id="cusnameTF" placeholder="Full Name" value="<?php echo "$cusnameTF";?>">
								<input type="hidden" id="cname" style="text-transform: uppercase;" value="<?php echo "$cusnameTF";?>" readonly>
							</td>
							<td class="td3">
								<span id="cusnameTFerr" style="color:red; font-size:15px;"> </span>
							</td>
						</tr>

						<tr>
							<td class="td1"> Customer Number: </td>
							<td class="td2">
								<input type="number" class="tf" name="cusmobTF" id="cusmobTF" min="0" placeholder="01XXXXXXXXX" value="<?php echo "$cusmobTF";?>">
								<input type="hidden" id="mob" value="<?php echo "$cusmobTF";?>" readonly>
							</td>
							<td class="td3">
								<span id="cusmobTFerr" style="color:red; font-size:15px;"> </span>
							</td>
						</tr>

						<tr>
							<td class="td1"> Seller ID: </td>
							<td class="td2">
								<input type="text" class="tf" name="sidTF" id="sidTF" placeholder="Auto Generated" value="<?php echo "$uid";?>" readonly>
								<input type="hidden" id="emp" value="<?php echo "$uid";?>" readonly>
							</td>
							<td class="td3">
								<span style="color:red; font-size:15px;"> </span>
							</td>
						</tr>

						<tr>
							<td class="td1"> Sell Date: </td>
							<td class="td2">
								<input type="text" class="tf" placeholder="Auto Generated" name="sellDateTF" id="sellDateTF" value="" readonly>
								<input type="hidden" id="date" value="<?php echo "$date";?>" readonly>
							</td>
						</tr>

						<tr>
							<td colspan="3" align="center" style="height:50px;">
								<button class="btn" name="sellBTN" onclick="return validate()">Sell</button>
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="submit" class="discardbtn" name="discardBTN" value="Discard">
								<br>	<br>
								<input type="submit" class="invoice" name="printInvoiceBTN" id="printInvoiceBTN" value="<?php echo $btnName; ?>" onclick="return saveFile()">
							</td>
						</tr>

					</table>
				</div>
			</form>
		</div>
	</body>
</html>
