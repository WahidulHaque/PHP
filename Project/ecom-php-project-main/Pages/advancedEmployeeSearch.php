<?php
include '../Page Controllers/advancedEmployeeSearchController.php';
?>

<!DOCTYPE html>
<html>
	<head>
		<title> Advanced Employee Search </title>
		<script src="../Page Controllers/javascript/advancedEmployeeSearchJS.js"></script>
		<link rel="stylesheet" type="text/css" href="CSS/advancedEmployeeSearch.css">
	</head>
	<body style="background-image: url('Images/search.jpg'); background-repeat: no-repeat; background-size: cover;">
		<form autocomplete="off" method="POST" action="">
			<div class="container">
				<div class='floatLeftDown'>
					<table style="width:calc(100%);">
						<tr>
							<td class="td1">
								<input type="text" class="tf" id="srchEmpByNameTF" placeholder="Sort Table by Name" onkeyup="srch()">
							</td>
						</tr>
						
						<tr>	
							<td class="td1">
								<input type="number" class="tf" id="srchEmpByDesignTF" placeholder="Sort Table by Designation" onkeyup="srch()">
							</td>
						</tr>
						
						<tr>	
							<td class="td1">
								<input type="number" class="tf" id="srchEmpByMinSalTF" min="0" placeholder="Sort Table by Min Salary" onkeyup="srch()">
							</td>
						</tr>
						
						<tr>	
							<td class="td1">
								<input type="number" class="tf" id="srchEmpByMobTF" placeholder="Sort Table by Contact" onkeyup="srch()">
							</td>
						</tr>
						
						<tr>	
							<td class="td1">
								<input type="text" class="tf" id="srchEmpByEmailTF" placeholder="Sort Table by E-mail" onkeyup="srch()">
							</td>
						</tr>
						
						<tr>	
							<td class="td1">
								<input type="text" class="tf" id="srchEmpByJoinDateTF" placeholder="Sort Table by Join Date" onkeyup="srch()">
							</td>
						</tr>
						
						<tr>	
							<td class="td1">
								<input type="text" class="tf" id="srchEmpByAddByTF" placeholder="Sort Table by Add By" onkeyup="srch()">
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
							<table name="empTable" id="empTable">
								<caption>Employee List</caption>
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
			</div>
		</form>
	</body>
</html>