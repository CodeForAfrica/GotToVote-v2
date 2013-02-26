<?php
	print "<h1>".$countyinfo['county_name']."</h1>";
	print "registered voters: ".$countyinfo['registered_voters'];
	print "<h1>Gurbernatorial Candidates";
	foreach($gurbernatorial_aspirants as $candidate){
		print "<p>";
		print "<h5>". $candidate['surname']." ".$candidate['other_name'];
		print "</h5><br>Running mate:";
		print $candidate['running_mate'];
		print "<br>";
		print $candidate['name'];
		print "</p>";
	}
	
	print "<h1>Senatorial Candidates";
	foreach($senatorial_aspirants as $candidate){
		print "<p>";
		print "<h5>". $candidate['surname']." ".$candidate['other_name'];
		print "</h5><br>Running mate:";
		print $candidate['running_mate'];
		print "<br>";
		print $candidate['name'];
		print "</p>";
	}
	
	print "<h1>Womenrep Candidates";
	foreach($womenrep_aspirants as $candidate){
		print "<p>";
		print "<h5>". $candidate['surname']." ".$candidate['other_name'];
		print "</h5><br>Running mate:";
		print $candidate['running_mate'];
		print "<br>";
		print $candidate['name'];
		print "</p>";
	}
?>