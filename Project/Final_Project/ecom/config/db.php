<?php
    $host	= "localhost";
	$dbuser = "root";
	$dbpass = "";
	$dbname	= "wt_ecom_updated";

	function dbConnection(){
		global $host;
		global $dbname;
		global $dbuser;
		global $dbpass;
        $conn = mysqli_connect($host, $dbuser, $dbpass, $dbname);

		return $conn;
	}
?>