<?php

	include('../inc/db_connect.php');

	if(isset($_POST['newVote'])){
		$query = "INSERT INTO basketball_votes (mid, team) VALUES ('".$_POST['matchup']."', '".$_POST['vote']."')";
		$result = mysqli_query($link, $query);
		if(!$result){ die(print "Error with insert: ".mysqli_error()); }
		print "post success";

		$query = "SELECT COUNT(team) AS total FROM basketball_votes WHERE mid = ".$_POST['matchup'];
		$result = mysqli_query($link, $query);
		if(!$result){ die(print "Error with count query: ".mysql_error()); }
		$total = $result->fetch_assoc();

		$query = "SELECT COUNT(team) AS teamUpdate FROM basketball_votes WHERE team = '".$_POST['vote']."' AND mid = ".$_POST['matchup'];
		$result = mysqli_query($link,$query);
		if(!$result){ die(print "Error with team count query: ".mysqli_error()); }
		$teamUpdate = $result->fetch_assoc();

		$teamPerc = ((int)$teamUpdate["teamUpdate"] / (int)$total["total"]) * 100;

		$return = [];
		array_push($return, $total);
		array_push($return, $teamPerc);
		print_r(json_encode($return));
		
	}

	if(isset($_GET['nextMatch'])){
		$query = "SELECT * FROM basketball ORDER BY RAND() LIMIT 1";
		$result = mysqli_query($link, $query);
		if(!$result){ die(print "Error with match query: ".mysql_error()); }
		$match = $result->fetch_assoc();

		$query = "SELECT COUNT(team) AS total FROM basketball_votes WHERE mid = ".$match['id'];
		$result = mysqli_query($link, $query);
		if(!$result){ die(print "Error with count query: ".mysql_error()); }
		$total = $result->fetch_assoc();

		$query = "SELECT COUNT(team) AS team1 FROM basketball_votes WHERE team = '".$match['team1']."' AND mid = ".$match['id'];
		$result = mysqli_query($link, $query);
		if(!$result){ die(print "Error with team count query: ".mysql_error()); }
		$team1Cnt = $result->fetch_assoc();

		$query = "SELECT COUNT(team) AS team2 FROM basketball_votes WHERE team = '".$match['team2']."' AND mid = ".$match['id'];
		$result = mysqli_query($link, $query);
		if(!$result){ die(print "Error with team count query: ".mysql_error()); }
		$team2Cnt = $result->fetch_assoc();

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