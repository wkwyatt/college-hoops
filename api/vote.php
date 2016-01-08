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

		$query = "SELECT COUNT(team) AS total FROM basketball_votes WHERE mid = ".$match['id'];
		$result = mysql_query($query);
		if(!$result){ die(print "Error with count query: ".mysql_error()); }
		$total = mysql_fetch_assoc($result);

		$query = "SELECT COUNT(team) AS team1 FROM basketball_votes WHERE team = '".$match['team1']."' AND mid = ".$match['id'];
		$result = mysql_query($query);
		if(!$result){ die(print "Error with team count query: ".mysql_error()); }
		$team1Cnt = mysql_fetch_assoc($result);

		$query = "SELECT COUNT(team) AS team2 FROM basketball_votes WHERE team = '".$match['team2']."' AND mid = ".$match['id'];
		$result = mysql_query($query);
		if(!$result){ die(print "Error with team count query: ".mysql_error()); }
		$team2Cnt = mysql_fetch_assoc($result);

		$team1Perc = ((int)$team1Cnt["team1"] / (int)$total["total"]) * 100;
		$team2Perc = ((int)$team2Cnt["team2"] / (int)$total["total"]) * 100;

		$return = [];
		array_push($return, $match);
		array_push($return, $total);
		array_push($return, $team1Perc);
		array_push($return, $team2Perc);
		print_r(json_encode($return));
		// print_r(json_encode($total));
		// print_r(json_encode($team1Perc));
		// print_r(json_encode($team2Perc));


	}
?>