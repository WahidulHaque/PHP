<?php
include '../Page Controllers/productListController.php';
?>

<!DOCTYPE html>
<html>
	<head> 
		<title> Product List</title>
		<script src="../Page Controllers/javascript/productListJS.js"></script>
		<link rel="stylesheet" type="text/css" href="CSS/productList.css">
	</head>
	
	<body style="background-image: url('Images/productList.jpg'); background-repeat: no-repeat; background-size: cover;">
		<div class="container">
			<form autocomplete="off" action="" method="post">
				<div class="floatRightTop">
					<table name="search&logout">
						<tr>
							<td>
								<input type="text" class="srchtf" name="srchProdTF" placeholder="Search By Product ID." value="<?php echo "$srchProdTF";echo"$srchProdTFerror";?>">
							</td>
							<td>
								<input type="submit" class="srchbtn" name="srchBTN" value="Search">
							</td>
							<td style="width:30%;"></td>
							<td> 
								<button class="savebtn" onclick="return savePDF()"> Print Table </button> 
							</td>
							<td style="width:20%;"></td>

							<td>
								<button class="advsrchbtn" name="advsrchbtn" id="advsrchbtn" formtarget="_blank">Advanced Search</button> 
							</td>
							
							<td style="width:20%;"></td>
							<td>
								<input type="submit" class="srchbtn" name="gohomebtn" value="Home">
							</td>
							<td class="col"></td>
							<td>
								<input type="submit" class="logoutbtn" name="logoutBTN" value="Logout">
							</td>
						</tr>
					</table>
					<div class="scrollit">
						<div id="printableTable">
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
								
								<tbody>
									<?php
										showTable();
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
						
				<div class="floatLeftDown">
					<table name="input" style="border-collapse: collapse;">
						<tr>
							<td class="td1"> Product ID: </td>
							<td class="td2"> 
								<input type="text" class="tf" name="pidTF" id="pidTF" placeholder="Unique" value="<?php echo "$pidTF";?>" <?php if($srchvalid==true){echo "readonly";}?>>
								<input type="hidden" class="tf" name="sid" id="sid" value="<?php echo $_COOKIE['sid'];?>" readonly>
							</td>
							<td class="td3"> <span style="color:red; font-size:15px;" id="pErr"> <?php echo "$pidTFerror";?> </span> </td>
						</tr>
		
						<tr>
							<td class="td1"> Name: </td>
							<td class="td2"> 
								<input type="text" class="tf" style="text-transform: uppercase;" name="pnameTF" id="pnameTF" placeholder="Model Name" value="<?php echo "$pnameTF";?>"> 
							</td>
							<td class="td3"> <span style="color:red; font-size:15px;" id="nErr"> <?php echo "$pnameTFerror";?> </span> </td>
						</tr>
						
						<tr>
							<td class="td1"> Type: </td>
							<td class="td2"> 
								<select name="type" id="type">
								  <option value="SELECT" <?php if($o1 == true) {echo "selected";} ?>>---SELECT---</option>
								  <option value="LAPTOP" <?php if($o2 == true) {echo "selected";} ?>>1. LAPTOP</option>
								  <option value="MONITOR" <?php if($o3 == true) {echo "selected";} ?>>2. MONITOR</option>
								  <option value="MOUSE" <?php if($o4 == true) {echo "selected";} ?>>3. MOUSE</option>
								  <option value="SPEAKER" <?php if($o5 == true) {echo "selected";} ?>>4. SPEAKER</option>
								  <option value="RAM" <?php if($o6 == true) {echo "selected";} ?>>5. RAM</option>
								  <option value="ROM" <?php if($o7 == true) {echo "selected";} ?>>6. ROM</option>
								  <option value="PROCCESOR" <?php if($o8 == true) {echo "selected";} ?>>7. PROCCESOR</option>
								  <option value="PORTABLE HDD/SSD" <?php if($o9 == true) {echo "selected";} ?>>8. PORTABLE HDD/SSD</option>
								  <option value="KEYBOARD" <?php if($o10 == true) {echo "selected";} ?>>9. KEYBOARD</option>
								  <option value="PRINTER" <?php if($o11 == true) {echo "selected";} ?>>10. PRINTER</option>
								  <option value="SOFTWARE" <?php if($o12 == true) {echo "selected";} ?>>11. SOFTWARE</option>
								</select>
							</td>
							<td class="td3"> 
								<span style="color:red; font-size:15px;" id="tErr"> <?php echo "$typeerror";?> </span> 
							</td>
						</tr>
						
						<tr>
							<td class="td1"> Quantity: </td>
							<td class="td2"> 
								<input type="number" min="0" class="tf" name="quantTF" id="quantTF" value="<?php echo "$quantTF"; ?>"> 
							</td>
							<td class="td3"> 
								<span style="color:red;font-size:15px;" id="qErr"> <?php echo "$quantTFerror";?> </span>
							</td>
						</tr>
						
						<tr>
							<td class="td1"> Buying Price: </td>
							<td class="td2"> 
								<input type="number" min="0" class="tf" name="buyPriceTF" id="buyPriceTF" value="<?php echo"$buyPriceTF"; ?>"> 
							</td>
							<td class="td3"> 
								<span style="color:red;font-size:15px;" id="bErr"> <?php echo "$buyPriceTFerror";?> </span>
							</td>
						</tr>
						
						<tr>
							<td class="td1"> Selling Price: </td>
							<td class="td2"> 
								<input type="number" min="0" class="tf" name="sellPriceTF" id="sellPriceTF" placeholder="Greater than Buying Price" value="<?php echo"$sellPriceTF"; ?>"> 
							</td>
							<td class="td3"> 
								<span style="color:red;font-size:15px;" id="sErr"> <?php echo "$sellPriceTFerror";?> </span>
							</td>
						</tr>
						
						<tr>
							<td class="td1"> Modified By: </td>
							<td class="td2"> 
								<input type="text" class="tf" name="modbyTF" placeholder="Automatically Generated." value="<?php echo $addby; ?>" readonly> 
							</td>
						</tr>
						
						<tr>
							<td class="td1"> Adding Date: </td>
							<td class="td2"> 
								<input type="text" class="tf" name="addDateTF" placeholder="Automatically Generated." value="<?php echo $adddate; ?>" readonly> 
							</td>
						</tr>
					<table>
				</div>
				
				<div>
					<table name="buttons" class="btnTB" align="middle" valign="center">
						<tr>
							<td> 
								<button class="btn" name="refreshBTN"> REFRESH </button>
							</td>
							
							<td class="col2"></td>
							
							<td> 
								<button class="btn" name="insertBTN" onclick='return validateINSERT()' <?php if($srchvalid){echo "disabled";} ?>> INSERT </button> 
							</td>
							
							<td class="col2"></td>
							
							<td> 
								<button class="btn" name="updateBTN" onclick='return validateUPDATE()' <?php if(!$srchvalid){echo "disabled";} ?>> UPDATE </button> 
							</td>
							
							<td class="col2"></td>
							
							<td> 
								<input type="hidden" id="btnNM" value="<?php echo $btnNM; ?>">
								<button class="btn" name="deleteBTN" id="deleteBTN" onclick='return validateDELETE()' <?php if(!$srchvalid){echo "disabled";}?>> <?php echo $btnNM; ?> </button>
							</td>
						</tr>
					</table>
				</div>
			</form>
		</div>
	</body>
</html>	
		
