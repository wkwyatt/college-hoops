$(document).ready(function() {

	$.get('api/vote.php?nextMatch=true', function(data, err) {
			/*optional stuff to do after success */
			if(status != "success"){
				console.log(status);
			}
			console.log(data);
			var nextMatch = JSON.parse(data);  // parses result into json that is readable by jquery

			var matchup = nextMatch["id"];
			var homeTeam = nextMatch["team1"];
			var awayTeam = nextMatch["team2"];
			var homeTeamImg = nextMatch["team1_pic"];
			var homeTeamLogo = nextMatch["team1_logo"];
			var awayTeamImg = nextMatch["team2_pic"];
			var awayTeamLogo = nextMatch["team2_logo"];
			console.log("===team==");
			console.log(homeTeam);
			console.log(awayTeam);
			$('#matchup').attr('matchup', matchup);
			$('#home-team').text(homeTeam);
			$('#home-img').attr('team', homeTeam);
			$('#home-img').attr('src', homeTeamImg);
			$('#home-logo').attr('src', homeTeamLogo);
			$('#away-team').text(awayTeam);
			$('#away-img').attr('team', awayTeam);
			$('#away-img').attr('src', awayTeamImg);
			$('#away-logo').attr('src', awayTeamLogo);
	});

	$('.team-vote').click(function(){
		var vote = $(this).attr('team');
		var matchup = $('#matchup').attr('matchup');

		$.ajax({
			url: 'api/vote.php',
			type: 'post',
			// dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
			data: { newVote: "true", vote: vote, matchup: matchup},
			success: function(result){
				console.log("===returned===");
				console.log(result);
				// var homeVotes = Number(obj.home_vote_perc);
				// var awayVotes = Number(obj.away_vote_perc);

				// $('#home-votes').html(homeVotes+"% of votes");
				// $('#away-votes').html(awayVotes+"% of votes");
			}
		})
		.done(function() {
			console.log("done");
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		
	});

	$('#next-match').click(function(){
		$.get('api/vote.php?nextMatch=true', function(data, err) {
			/*optional stuff to do after success */
			if(status != "success"){
				console.log(status);
			}
			var nextMatch = JSON.parse(data);  // parses result into json that is readable by jquery

			var matchup = nextMatch["id"];
			var homeTeam = nextMatch["team1"];
			var awayTeam = nextMatch["team2"];
			var homeTeamImg = nextMatch["team1_pic"];
			var homeTeamLogo = nextMatch["team1_logo"];
			var awayTeamImg = nextMatch["team2_pic"];
			var awayTeamLogo = nextMatch["team2_logo"];
			console.log("===team==");
			console.log(homeTeam);
			console.log(awayTeam);
			$('#matchup').attr('matchup', matchup);
			$('#home-team').text(homeTeam);
			$('#home-img').attr('team', homeTeam);
			$('#home-img').attr('src', homeTeamImg);
			$('#home-logo').attr('src', homeTeamLogo);
			$('#away-team').text(awayTeam);
			$('#away-img').attr('team', awayTeam);
			$('#away-img').attr('src', awayTeamImg);
			$('#away-logo').attr('src', awayTeamLogo);


			// $('#home-votes').text();
			// $('#away-votes').text();
		});
	});
});