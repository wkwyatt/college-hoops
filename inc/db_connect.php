<?php

	$link = mysqli_connect('127.0.0.1', 'college-hoops', 'x');
	if (!$link) {
	    die('Not connected : ' . mysql_error());
	}
	// make phpland the current db
	$db_selected = mysqli_select_db( $link, 'basketball');
	if (!$db_selected) {
	    die ('Can\'t use phpland : ' . mysqli_error());
	}

	// require_once 'meekrodb.class.php';
	// DB::$user = 'college-hoops';
	// DB::$password = 'x';
	// DB::$dbName = 'basketball';
?>