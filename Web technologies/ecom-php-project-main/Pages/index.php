<?php
include '../Page Controllers/indexController.php';
?>

<!DOCTYPE html>
<html>
	<head>
		<title> Login </title>
		<script src="../Page Controllers/javascript/indexJS.js"></script>
		<link rel="stylesheet" type="text/css" href="CSS/index.css">
	</head>
	
	<body class="body">
		<div class="form">
			<form autocomplete="off" method="post" action="">
				<table>
					<tr>
						<td colspan="2" valign="top" align="center"> 
							<img src="Images/bt_logo_option.png" alt="BusinessToolLogo" style="width:160px;height:133.27px;" > 
						</td>
					</tr>
					
					<tr>
						<td colspan="2" align="middle" valign="middle">						
							<br> <marquee class="marquee"><span>Login with your Organization ID and Password.</span></marquee> 
						</td>
					</tr>
					
					<tr align="right">
						<td valign="middle">
							<img src="Images/user_field.png" style="width:30px;height:30px;">
						</td>
						
						<td align="left">
							<input type="text" class="tf" name="uidTF" id="uidTF" placeholder="User ID." value="<?php echo "$uid" ?>" required autofocus> 
						</td>
					</tr>
					
					<tr>
						<td></td>
						<td>
							<span style="color:red;"><?php echo "$err_uid"; ?></span> 
						</td>
					</tr>
					
					<tr align="right">
						<td valign="middle">
							<img src="Images/password_field.png" style="width:30px;height:30px;">
						</td>
						
						<td align="left">
							<input type="password" class="tf" name="passTF" id="passTF" placeholder="Password" value="<?php echo "$pass" ?>" required> 
						</td>
					</tr>
					
					<tr>
						<td></td>
						<td>
							<span style="color:red;"> <?php echo "$err_pass"; ?></span>
						</td>
					</tr>
					
					<tr>
						<td></td>
						<td valign="middle">
							<label class="container"> <span>Show Password</span>
								<input type="checkbox" name="showCB" onClick="showPass()">
								<span class="checkmark"></span>
							</label>
						</td>
					</tr>
					
					<tr>
						<td></td>
						<td style="height:15px;"> <span style="color:red;"> <?php echo "$err_invalid"; ?> </span></td>
					</tr>
					
					<tr valign="middle">
						<td align="center" colspan="2">
							<input type="submit" name="Login" value="Login" class="login">
						</td>
					</tr>	
					<tr valign="middle">
						<td align="center" colspan="2">
							<br> <a href="recoverPassword.php" target="_blank" class="link"> Forgotten Password? </a>
						</td>
					</tr>	
				</table>
			</form>	
		</div>
	</body>
</html>