<?php 
	include('inc/db_connect.php'); 
?>

<!DOCTYPE html>
<html>
<head>
	<title>College Hoops Voting</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="js/script.js"></script>
</head>
<body>
	<h1>Who Wins?</h1>
	<div id="matchup" matchup="">
		<div class="team home">
			<img id="home-img" class="team-img team-vote" team="" src="">
			<img id="home-logo" class="school-logo" src="">
			<h3 id="home-team"></h3>
			<h3 id="home-votes"></h3>
		</div>
		<div class="team away">
			<img id="away-img" class="team-img team-vote" team="" src="">
			<img id="away-logo" class="school-logo" src="">
			<h3 id="away-team"></h3>
			<h3 id="away-votes"></h3>
		</div>
	</div>
	<button id="next-match">Next</button>
</body>
</html>