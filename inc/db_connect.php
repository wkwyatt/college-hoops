<?php

	$link = mysql_connect('127.0.0.1', 'college-hoops', 'x');
	if (!$link) {
	    die('Not connected : ' . mysql_error());
	}
	// make phpland the current db
	$db_selected = mysql_select_db('basketball', $link);
	if (!$db_selected) {
	    die ('Can\'t use phpland : ' . mysql_error());
	}

?>