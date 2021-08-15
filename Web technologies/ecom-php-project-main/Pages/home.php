<?php
include '../Page Controllers/homeController.php';
?>

<!DOCTYPE html>
<html>
	<head>
		<title> Home </title>
		<script src="../Page Controllers/javascript/homeJS.js"></script>
		<link rel="stylesheet" type="text/css" href="CSS/home.css">
	</head>
	
	<body style="background-image: url('Images/home1.gif'); background-repeat: no-repeat; background-position:center top; background-size: 15% 20%;">
		<div class="form">
			<form autocomplete="off" action="" method="post">
				<input type="hidden" id="sid" value="<?php echo $_COOKIE['sid']; ?>">
				<table align="middle" valign="center">
					<tr>
						<td align="middle"> <input type="image" src="Images\employee_list_option.png" alt="employee_list" class="button" name="employeeBTN" onclick="return access()"> </td>
						<td class="col"></td>
						<td align="middle"> <input type="image" src="Images\product_list_option.png" alt="product_list" class="button" name="productBTN" onclick="return access()"> </td>
						<td class="col"></td>
						<td align="middle"> <input type="image" src="Images\sell_product_opt.png" alt="sell_product" class="button" name="sellBTN"> </td>
						<td class="col"></td>
						<td align="middle"> <input type="image" src="Images\note_option.png" alt="note_option" class="button" name="takenoteBTN"> </td>
						<td class="col"></td>
						<td align="middle"> <input type="image" src="Images\user_opt.png" alt="about_me" class="button" name="aboutmeBTN"> </td>
						<td class="col"></td>
					</tr>	
					
					<tr>
						<td class="text" valign="bottom" align="middle"><span>Manage Employees</span> </td>
						<td></td>
						<td class="text" valign="bottom" align="middle"><span>Manage Products</span> </td>
						<td></td>
						<td class="text" valign="bottom" align="middle"><span>Sell Products</span> </td>
						<td></td>
						<td class="text" valign="bottom" align="middle"><span>Take Notes</span> </td>
						<td></td>
						<td class="text" valign="bottom" align="middle"><span>About <?php echo "$uid";  ?></span> </td>
						<td></td>
					</tr>
					
					<tr>
						<td colspan="11" style="height:150px"></td>
					</tr>
					
					<tr>
						<td align="center" align="bottom" colspan="11"> <input type="submit" class="logout" name="logoutBTN" value="Logout"> </td>
					</tr>
				</table>
			</form>
		</div>	
	</body>
</html>
