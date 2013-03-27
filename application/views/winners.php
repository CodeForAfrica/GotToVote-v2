<style type="text/css">
.winner_pane{
	width:100%;
	height:60px;
}
.winner_img{
	display:inline;
	float:left;
	width:50px;
	padding:3px;
}
.winner_pane img{
	max-height:55px;
}
.winner_names{
	display:inline;
	float:left;
	padding:3px;
}
.winner_party{
	display:inline;
	float:right;
	width:50px;
	padding:3px;
}
</style>
<?php
	
	$countyinfo = $countyinfo[0];
	$voterturnout = (($countyinfo['total']/$countyinfo['REG'])*100);
	print "<h2>".ucwords(strtolower($countyinfo['EDNAME']))." County</h2>";
	print "<div class='stronghold' style='width:50px;height:50px;float:right;";
	if($countyinfo['candidate']=='2'){print "background-color:#ff0000;'";}else{print "background-color:#fd8a27;'";}
	print "'></div>";
	print "Registered voters: ".$countyinfo['REG'];
	print "<br />";
	print "Voter turnout: ".number_format($voterturnout, 2)."%<br />";
	print "Poverty rate: ".$countyinfo['poverty_rate'];
	$governor = $governor[0];
	print "<h3>Governor</h3>";
	print "<div class='winner_pane'><div class='winner_img'><img src='http://api.iebc.or.ke/images/candidate/".$governor['code'].".jpg' width='40px'></div>";
	print "<div class='winner_names'>".$governor['surname'].' '.$governor['other_name'];
	print "<br />Running mate:<br />".$governor['running_mate']."</div>";
	print "<div class='winner_party'><img src='".$governor['picture']."' width='40px'></div></div>";
	
	//show senator
	$senator = $senator[0];
	print "<h3>Senator</h3>";
	print "<div class='winner_pane'><div class='winner_img'><img src='http://api.iebc.or.ke/images/candidate/".$senator['code'].".jpg' width='40px'></div>";
	print "<div class='winner_names'>".$senator['surname'].' '.$senator['other_name']."</div>";
	print "<div class='winner_party'><img src='".$senator['picture']."' width='40px'></div></div>";
	
	//show womenrep
	$womenrep = $womenrep[0];
	print "<h3>Women Representative</h3>";
	print "<div class='winner_pane'><div class='winner_img'><img src='http://api.iebc.or.ke/images/candidate/".$womenrep['code'].".jpg' width='40px'></div>";
	print "<div class='winner_names'>".$womenrep['surname'].' '.$womenrep['other_name']."</div>";
	print "<div class='winner_party'><img src='".$womenrep['picture']."' width='40px'></div></div>";
?>