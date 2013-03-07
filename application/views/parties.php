<div class="container">
	<h2>Parties Comparison</h2>
	
	<div style="text-align: center;">
		<div class="btn-group" style="display: inline-block; text-align: left;">
			<a class="btn dropdown-toggle" data-toggle="dropdown" href="#" id="party_dd_party_1">Select Party <span class="caret"></span></a>
			<ul class="dropdown-menu" style="height: 220px; overflow: hidden; overflow-y: auto;">
				<?php
					foreach ($parties as $party) {
						echo '<li><a href="javascript:compare_parties(\'party_1\', '.$party['id'].',\''.$party['abr'].'\', \''.$party['name'].'\', \''.$party['picture'].'\' )">';
						echo $party['abr'];
						echo '<span style="float:right"><img src="'.$party['picture'].'" style="height:26px;" /></span></a></li>';
					}
				?>
				
			</ul>
		</div>
		
		<p style="display: inline-block;"> | </p>
		
		<div class="btn-group" style="display: inline-block; text-align: left;">
			<a class="btn dropdown-toggle" data-toggle="dropdown" href="#" id="party_dd_party_2">Select Party <span class="caret"></span></a>
			<ul class="dropdown-menu" style="height: 220px; overflow: hidden; overflow-y: auto;">
				<?php
					foreach ($parties as $party) {
						echo '<li><a href="javascript:compare_parties(\'party_2\', '.$party['id'].',\''.$party['abr'].'\', \''.$party['name'].'\', \''.$party['picture'].'\' )">';
						echo $party['abr'];
						echo '<span style="float:right"><img src="'.$party['picture'].'" style="height:26px;" /></span></a></li>';
					}
				?>
				
			</ul>
		</div>
	</div>
	
	<div style="text-align: center;">
		<h3>Candidates comparison</h3>
		<div id="chart_div" style="width: 900px; height: 500px;"></div>
	</div>
	
</div>

<!-- Script -->

<script type="text/javascript" src="https://www.google.com/jsapi"></script>

<script type="text/javascript">

	var base_url = "<?php echo base_url(); ?>";
	
	var party_1_id;
	var party_2_id;
	var party_1_abr;
	var party_2_abr;
	var party_1_result;
	var party_2_result;
	
	function compare_parties(party_select, party_id, party_abr, party_name, party_pic) {
		var dd_default = 'Select Party <span class="caret"></span>';
		
		$('#party_dd_'+party_select).html('<img src="'+party_pic+'" style="height:20px;" /> '+party_name+' <span class="caret"></span>');
		
		if (party_select == 'party_1') {
			party_1_id = party_id;
			party_1_abr = party_abr;
		}
		if (party_select == 'party_2') {
			party_2_id = party_id;
			party_2_abr = party_abr;
		}
		
		//Check if both selected
		if ($('#party_dd_party_1').html() == dd_default || $('#party_dd_party_2').html() == dd_default) {
			return;
		}
		
		//Party 1 candidates
		$.ajax( {
			type: "GET",
			url: base_url+"parties/getCandidates/?party_id="+party_1_id,
			success: function( response ) {
				console.log( response );
				party_1_result = JSON.parse(response);
				
				//Party 2 candidates
				$.ajax( {
					type: "GET",
					url: base_url+"parties/getCandidates/?party_id="+party_2_id,
					success: function( response ) {
						console.log( response );
						party_2_result = JSON.parse(response);
						
						google.load("visualization", "1", {'callback':drawChart, packages:["corechart"]});
						
						function drawChart() {
							var data = google.visualization.arrayToDataTable([
								['Candidature', party_1_abr, party_2_abr],
								['Presidential', party_1_result['president']['count'], party_2_result['president']['count']],
								['Governor', party_1_result['governor']['count'], party_2_result['governor']['count']]
							]);
							
							var options = {
								title: 'Candidates Comparison',
								vAxis: {title: 'Candidature'},
								hAxis: {title: 'No of Candidates'}
							};
							
							var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
							chart.draw(data, options);
						}
						
					}
				} );
				
			}
		} );
		
		
	}
	
	function get_candidates(party_id, party_abr, party_name, party_pic) {
		var party_details;
				
		$.ajax( {
			type: "GET",
			url: base_url+"parties/getCandidates/?party_id="+party_id,
			success: function( response ) {
				console.log( response );
				var result = JSON.parse(response);
				
			}
		} );
	}
</script>
