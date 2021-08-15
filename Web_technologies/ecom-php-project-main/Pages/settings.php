<?php
include '../Page Controllers/settingsController.php';
?>

<!DOCTYPE html>
<html>
	<head>
		<title> Change Password </title>
		<script src="../Page Controllers/javascript/settingsJS.js"></script>
		<link rel="stylesheet" type="text/css" href="CSS/settings.css">
	</head>
	<body class="body">
		<div class="form">
			<form autocomplete="off" method="post" action="">
				<table>
					<tr valign="middle" style="height: 40px;">
						<td align="right"> 
							<span class="text"> Old Password: </span> 
						</td>
						
						<td align="left"> 
							<input type="password" class="tf" name="oldpassPF" id="oldpassTF" value="<?php echo "$oldpassPF";?>"> 
							<span style="color:red; font-size:15px;"> <?php echo $msg1; ?> <?php echo "$oldpassPFerror"; ?> </span>
						</td>
						
						<td align="left"> 
							<label class="container"> <span>Show</span>
								<input type="checkbox" class="" name="oldshowpassCB" onClick="showOldPass()">
								<span class="checkmark"></span>
							</label>
						</td>
					</tr>
					
					<tr valign="middle" style="height: 40px;">
						<td align="right"> 
							<span class="text"> New Password: </span> 
						</td>
						
						<td align="left"> 
							<input type="password" class="tf" name="newpassPF" id="newpassTF" value="<?php echo "$newpassPF";?>"> 
							<span style="color:red; font-size:15px;"> <?php echo $msg2; ?> <?php echo "$newpassPFerror"; ?> </span>
						</td>
						
						<td align="left"> 
							<label class="container"> <span>Show</span>
								<input type="checkbox" class="" name="newshowpassCB" onClick="showNewPass()">
								<span class="checkmark"></span>
							</label>
						</td>
					</tr>
					
					<tr valign="middle" style="height: 40px;">
						<td align="right"> 
							<span class="text"> Confirm Password: </span> 
						</td>
						
						<td align="left"> 
							<input type="password" class="tf" name="confirmpassPF" id="confirmpassTF" value="<?php echo "$confirmpassPF";?>"> 
							<span style="color:red; font-size:15px;"> <?php echo $msg3.$msg4; ?> <?php echo "$confirmpassPFerror"; ?> </span>
						</td>
						
						<td align="left"> 
							<label class="container"> <span>Show</span>
								<input type="checkbox" class="" name="confirmshowpassCB" onClick="showConfirmPass()">
								<span class="checkmark"></span>
							</label>
						</td>
					</tr>

					<tr>
						<td colspan="3" align="center" valign="middle" style="width: 40px;" > 
							<marquee class="marquee"><span>REQUIREMENT/'S': Password length must be minimum four (4). Keep your password secured.</span></marquee> 
						</td>
					</tr>
					
					<tr>
						<td colspan="3" align="center"  valign="middle" style="height: 25px;"> 
							<input type="submit" class="proceed" name="ProceedBTN" value="Proceed" onclick='return confirmation()'> 
						</td>
					</tr>
					
					<tr>
						<td colspan="3" align="center"  valign="middle" style="height: 25px;"> 
							<input type="submit" class="home" name="backBTN" value="About Me     <<"> 
							<input type="submit" class="home" name="gohomebtn" value="Home">
						</td>
					</tr>

					<tr>
						<td colspan="3" align="center"  valign="middle" style="height: 25px;"> <input type="submit" class="logout" name="logoutBTN" value="Logout"> </td>
					</tr>
				</table>
			</form>	
		</div>
	</body>
</html>