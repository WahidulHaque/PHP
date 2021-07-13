<?php
	$DB_HOST        = "localhost";
    $DB_USER        = "root";
    $DB_PASSWORD    = "";
    $DB_NAME        = "lab_5";

	$db = mysqli_connect($DB_HOST,$DB_USER,$DB_PASSWORD,$DB_NAME);

	if ( $db ){
		echo "Database Connected" . "<br>";
	}
	else {
		die("MySQL Connection Faild." . mysqli_error($db));
	}

?>