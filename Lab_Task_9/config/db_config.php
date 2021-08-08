<?php
	$db = mysqli_connect("localhost", "root", "", "wt_ecom");
	if ( $db ){
		// echo "Database Connected Successfully.";
	}
	else{
		die("MySQLi Connection Failed.");
	}
	global $db;
?>