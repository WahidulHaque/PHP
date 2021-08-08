<?php
	$db = mysqli_connect("localhost", "root", "", "lab_6");
	if ( $db ){
		// echo "Database Connected Successfully.";
	}
	else{
		die("MySQLi Connection Failed.");
	}
?>