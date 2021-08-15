<?php
	$db = mysqli_connect("localhost", "root", "", "wt_ecom_updated");
	if ( $db ){
		// echo "Database Connected Successfully.";
	}
	else{
		die("MySQLi Connection Failed.");
	}
?>