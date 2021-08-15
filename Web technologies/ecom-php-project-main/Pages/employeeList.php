<?php
include '../Page Controllers/employeeListController.php';
?>

<html>
	<head> 
		<title> Employee List</title>
		<script src="../Page Controllers/javascript/employeeListJS.js"></script>
		<link rel="stylesheet" type="text/css" href="CSS/employeeList.css">
	</head>
																						
	<body style="background-image: url('Images/empList.jpg'); background-repeat: no-repeat; background-size: cover;">
		<form action="" method="post">
			<div class="container">
				<div class="floatRightTop">
					<table name="search&logout">
						<tr>
						
							<td>
								<input type="hidden" id="sid" value="<?php echo $_COOKIE['sid']; ?>">
								<input type="text" class="srchtf" name="srchEmpTF" placeholder="Search by Employee ID." value="<?php echo "$srchEmpTF";?>"> 
							</td>
							<td> <span style="color:red; font-size:15px;"> <?php echo"$srchEmpTFerror";?> </span> </td>
							<td> <button class="srchbtn" name="srchBTN"> Search </button> </td>
							<td style="width:15%;"> </td>
							<td> <button class="printbtn" name="printbtn" id="printbtn" onclick='savePDF()'>Print Table</button> </td> 
							<!--<td> <input type="text" class="srchtf" placeholder="Search by Employee ID." onclick="clear()" > </td>-->
							<td style="width:15%;"> </td>
							<td> <button class="advsrchbtn" name="advsrchbtn" id="advsrchbtn" formtarget="_blank">Advanced Search</button> </td> 
							<td style="width:30%;"> </td>
							<td> <button class="srchbtn" name="gohomebtn"> Home </button> </td>
							<td class="col"> </td>
							<td> <button class="logoutbtn" name="logoutBTN"> Logout </button> </td>
						</tr>
					</table>
					<div class="scrollit">
						<div id="printableTable">
							<table name="empTable" id="empTable">
								<caption>Active Employee List</caption>
								<thead>
									<tr>
										<th>ID.</th>
										<th>Name</th>
										<th>Design. ID.</th>
										<th>Salary</th>
										<th>Mobile No</th>
										<th>E-mail</th>
										<th>Join Date</th>
										<th>Added By</th>	
									</tr>
								</thead>
								
								<tbody id='tab'>
									<?php
										showTable();
									?>
								</tbody>
								
								<!--<tfoot>
									<tr>
									  <td>Sum</td>
									  <td>$180</td>
									</tr>
								  </tfoot>-->
							</table>
						</div>
					</div>
				</div>
						
				<div class="floatLeftDown">
					<table name="input">
						<tr>
							<td class="td1"> Employee ID: </td>
							<td class="td2"> 
								<input type="text" class="tf" name="eidTF" id="eidTF" placeholder="Unique" value="<?php echo "$eidTF";?>" <?php if($srchvalid==true){echo "readonly";}?>>
								<input type="hidden" name="pass" id="pass" value="<?php echo $autopass; ?>">
							</td>
							<td class="td3">
								<span id="eidTFErr" style="color:red; font-size:15px;"> <?php echo "$eidTFerror";?> </span>
							</td>
						</tr>
						
						<tr>
							<td class="td1"> Name: </td>
							<td class="td2"> 
								<input type="text" class="tf" name="enameTF" id="enameTF" placeholder="Full Name" style="text-transform: uppercase;" value="<?php echo "$enameTF";?>">
							</td>	
							<td class="td3">
								<span id="enameTFErr" style="color:red; font-size:15px;"> <?php echo "$enameTFerror";?> </span>
							</td>
						</tr>
						
						<tr>
							<td class="td1"> Designation: </td>
							<td class="td2"> 
								<select name="design" id="design">
								  <option value="4" <?php if($o1 == true) {echo "selected";} ?>> ---SELECT--- </option>
								  <option value="1" <?php if($o2 == true) {echo "selected";} ?>> 1. ADMIN </option>
								  <option value="2" <?php if($o3 == true) {echo "selected";} ?>> 2. MANAGER </option>
								  <option value="3" <?php if($o4 == true) {echo "selected";} ?>> 3. SALESMAN </option>
								</select>
							</td>
							<td class="td3">
								<span id="designErr" style="color:red; font-size:15px;"> <?php echo "$designerror";?> </span>
							</td>
						</tr>
						
						<tr>
							<td class="td1"> Salary: </td>
							<td class="td2"> <input type="number" min="0" class="tf" name="salTF" id="salTF" value="<?php echo "$salTF";?>"> </td>
							<td class="td3"> <span id="salTFErr" style="color:red; font-size:15px;"><?php echo $msg; ?> <?php echo "$salTFerror"; ?> </span></td>
						</tr>
						
						<tr>
							<td class="td1"> Mobile No.: </td>
							<td class="td2"> <input type="number" min="0" class="tf" name="mobTF" id="mobTF" placeholder="01XXXXXXXXX" value="<?php echo "$mobTF";?>"> </td>
							<td class="td3"> <span id="mobTFErr" style="color:red; font-size:15px;"><?php echo $msg1; ?> <?php echo "$mobTFerror"; ?> </span></td>
						</tr>
						
						<tr>
							<td class="td1"> E-mail: </td>
							<td class="td2"> <input type="mail" class="tf" style="text-transform: lowercase;" name="mailTF" id="mailTF" placeholder="user@domain.com" value="<?php echo "$mailTF";?>"> </td>
							<td class="td3"> <span id="mailTFErr" style="color:red; font-size:15px;"><?php echo $msg1; ?> <?php echo "$mailTFerror"; ?> </span></td>
						</tr>
						
						<tr>
							<td class="td1"> Join Date: </td>
							<td class="td2"> <input type="text" class="tf" name="jdTF" id="jdTF" placeholder="Auto Generated" value="<?php if($srchvalid==true){echo "$jdTF";}else{echo "$jdTF";} ?>" readonly> </td>
						</tr>
						
						<tr>
							<td class="td1"> Added By: </td>
							<td class="td3"> <input type="text" class="tf" name="addedbyTF" id="addedbyTF" placeholder="Auto Generated" value="<?php if($srchvalid==true){echo "$addedbyTF";}else{echo "$uid";} ?>" readonly> </td>
						</tr>
					</table>	
				</div>
				
				<div class="">
					<table name="buttons" class="btnTB" align="middle" valign="center">
						<tr>
							<td> <button class="btn" name="refreshBTN"> REFRESH </button> </td>
							<td class="col2"></td>
							<td> <button class="btn" name="insertBTN" onclick='return validateINSERT("<?php echo $eidTF;?>","<?php echo $autopass;?>")' <?php if($srchvalid){echo "disabled";} ?>> INSERT </button> </td> 
							<td class="col2"></td>
							<td> <button class="btn" name="updateBTN" onclick='return validateUPDATE()' <?php if(!$srchvalid){echo "disabled";} ?>> UPDATE </button> </td>
							<td class="col2"></td>
							<td> <button class="btn" name="deleteBTN" onclick='return validateDELETE()' <?php if(!$srchvalid){echo "disabled";} ?>> DELETE </button> </td>
						</tr>
					</table>
				</div>
			</div>
		</form>
	</body>
</html>