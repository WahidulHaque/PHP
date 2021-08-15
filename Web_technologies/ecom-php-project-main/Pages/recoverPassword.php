<?php
include '../Page Controllers/recoverPasswordController.php';
?>

<!DOCTYPE html>
<html>
	<head>
		<title> Recover Password </title>
		<script src="../Page Controllers/javascript/recoverPassJS.js"></script>
		<link rel="stylesheet" type="text/css" href="CSS/recoverPassword.css">
	</head>
	
	<body class="body">
		<div class="form">
			<form autocomplete="off" action="" method="post">
				<h1 align="center"> <span class="blinking">Recover Password</span> </h1>
				<table align="center" valign="middle">
					<tr>
						<td> <span class="text"> User ID. </span> </td>
						<td> 
							<input type="text" name="UID" class="tf" placeholder="Official ID" value="<?php echo $LID; ?>" required> 
						</td>
						<td>
							<span style="color: red;"> <?php echo $UIDmsg; ?> </span>
						</td>
					</tr>
					
					<tr>
						<td> <span class="text"> User Name: </span> </td>
						<td> <input type="text" name="UNAME" class="tf" style="text-transform: uppercase;" placeholder="Full Name" value="<?php echo $UNAME; ?>" required> </td>
						<td> </td>
					</tr>
					
					<tr>
						<td> <span class="text"> Designation: </span> </td>
						<td> 
							<input type="text" list="desg" name="UDEGN" class="tf" style="text-transform: uppercase;" placeholder="Designation(ADMIN/MANAGER/SALESMAN)" value="<?php echo $UDEGN; ?>" required> 
							<datalist id="desg">
								<option value="ADMIN">
								<option value="MANAGER">
								<option value="SALESMAN">
							 </datalist>
						</td>
						<td> </td>
					</tr>
					
					<tr>
						<td> <span class="text"> User Contact No. </span> </td>
						<td> <input type="number" min="0" name="UCON" class="tf" placeholder="Official Contact Number" value="<?php echo $UCON; ?>" required> </td>
					</tr>
					
					<tr>
						<td> <span class="text"> User E-mail: </span> </td>
						<td> <input type="email" name="UEMAIL" class="tf" style="text-transform: lowercase;" placeholder="Official E-mail" value="<?php echo $UEMAIL; ?>" required> </td>
						<td> </td>
					</tr>
					
					<tr>
						<td> <span class="text"> User Salary: </span> </td>
						<td> <input type="number" min="0" name="USAL" class="tf" placeholder="Salary" value="<?php echo $USAL; ?>" required> </td>
						<td> </td>
					</tr>
					
					<tr>
						<td> 
							<span class="text"> Solve( </span>
							<span class="text"> <?php echo $A; ?> </span>
							<input type="hidden" name="A" value="<?php echo $A; ?>">
							<span class="text"> + </span>
							<span class="text"> <?php echo $B; ?> </span> 
							<input type="hidden" name="B" value="<?php echo $B; ?>">
							<input type="hidden" name="C" value="<?php echo $B+$A; ?>">
							<span class="text"> ): </span>
						</td>
						
						<td> 
							<input type="number" name="RES" class="tf" placeholder="Result" value="<?php echo $RES; ?>" required> 
						</td>
						
						<td> 
							<span style="color: red;"> <?php echo $RESmsg; ?> </span> 
						</td>
					</tr>
	
					<tr>
						<td> <span class="text"> NEW PASSWORD: </span> </td>
						<td> <input type="text" name="PASS" class="tf" placeholder="System Generated Temporary Password" value="<?php echo $NEWPASS; ?>" readonly> </td>
						<td> </td>
					</tr>
					
					<tr>
						<td colspan="3" align="center"> <span class="info"> <?php echo $info; ?> <span> </td>
					</tr>
					
					<tr>
						<td colspan="3" align="center"> <button name="send" id="send" class="Request" onclick='return confirmation()'> Request Recovery </button> </td>
					</tr>
				</table>
			</form>
		</div>
	</body>
</html>