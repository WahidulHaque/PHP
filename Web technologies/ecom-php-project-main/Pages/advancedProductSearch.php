<?php
include '../Page Controllers/advancedProductSearchController.php';
?>

<!DOCTYPE html>
<html>
	<head>
		<title> Advanced Product Search </title>
		<script src="../Page Controllers/javascript/advancedProductSearchJS.js"></script>
		<link rel="stylesheet" type="text/css" href="CSS/advancedProductSearch.css">
	</head>
	<body style="background-image: url('Images/prodSearch.jpg'); background-repeat: no-repeat; background-size: cover;">
		<form autocomplete="off" method="POST" action="">
			<div class="container">
				<div class='floatLeftDown'>
					<table style="width:calc(100%);">
						<tr>
							<td class="td1">
								<input type="text" class="tf" id="srchProdByNameTF" placeholder="Sort Table by Name" onkeyup="srch()">
							</td>
						</tr>
						
						<tr>	
							<td class="td1">
								<input type="text" class="tf" id="srchProdByTypeTF" placeholder="Sort Table by Type" onkeyup="srch()">
							</td>
						</tr>
						
						<tr>	
							<td class="td1">
								<input type="number" class="tf" id="srchProdByQuanTF" placeholder="Sort Table by Quantity" onkeyup="srch()">
							</td>
						</tr>
						
						<tr>
							<td class="td1">
								<input type="text" class="tf" id="srchProdByAvailTF" placeholder="Sort Table by Availability" onkeyup="srch()">
							</td>
						</tr>
						
						<tr>	
							<td class="td1">
								<input type="number" class="tf" id="srchProdByMinBuyPriceTF" min="0" placeholder="Sort by Min Buy Price" onkeyup="srch()">
							</td>
						</tr>
						
						<tr>	
							<td class="td1">
								<input type="number" class="tf" id="srchProdByMinSellPriceTF" placeholder="Sort by Min Sell Price" onkeyup="srch()">
							</td>
						</tr>
						
						<tr>	
							<td class="td1">
								<input type="text" class="tf" id="srchProdByAddByTF" placeholder="Sort Table by Add By" onkeyup="srch()">
							</td>
						</tr>
						
						<tr>	
							<td class="td1">
								<input type="text" class="tf" id="srchProdByAddDateTF" placeholder="Sort Table by Add Date" onkeyup="srch()">
							</td>
						</tr>
					</table>
				</div>
				
				<div class="floatRightTop">
					<table style="width:calc(100%);">
						<tr> 
							<td align="middle"> 
								<button class="printbtn" name="printbtn" id="printbtn" onclick='savePDF()'>Print Table</button> 
							</td>
						</tr>
					</table>
					<div class="scrollit">
						<div id="printableTable">
							<table name="prodTable" id="prodTable">
								<caption>Product List</caption>
								<thead>
									<tr>
										<th>ID.</th>
										<th>Name</th>
										<th>Availability</th>
										<th>Type</th>
										<th>Quantity</th>
										<th>Buying Price</th>
										<th>Selling Price</th>
										<th>Modified By</th>
										<th>Adding Date</th>
									</tr>
								</thead>
								
								<tbody id='tab'>
									<?php
										showTable();
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</form>
	</body>
</html>