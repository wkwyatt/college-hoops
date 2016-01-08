<?php

	include('../inc/db_connect.php');

	if(isset($_POST['newVote'])){
		$query = "INSERT INTO basketball_votes (mid, team) VALUES ('".$_POST['matchup']."', '".$_POST['vote']."')";
		$result = mysql_query($query);
		if(!$result){ die(print "Error with insert: ".mysql_error()); }
		print "post success";

		
	}

	if(isset($_GET['nextMatch'])){
		$query = "SELECT * FROM basketball ORDER BY RAND() LIMIT 1";
		$result = mysql_query($query);
		if(!$result){ die(print "Error with match query: ".mysql_error()); }
		$match = mysql_fetch_assoc($result);
		print_r(json_encode($match));
		print "test";
	}
?>