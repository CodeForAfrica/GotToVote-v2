<div class="jumbotron" id="jumbotron">
	<h1>Kenya Decides!</h1>
	<p class="lead">The Kenya General Elections are on March 4th 2013.</p>
	
	<div class="clock">
		<!-- Days -->
		<div class="clock_days">
		    <div class="bgLayer">
		        <canvas id="canvas_days" width="122" height="122">
		            Your browser does not support the HTML5 canvas tag.
		        </canvas>
		        <p class="val">0</p>
		        <p class="type_days">Days</p>
		    </div>
		</div>
		<!-- /Days -->
		<!-- Hours -->
		<div class="clock_hours">
			<div class="bgLayer">
				<canvas id="canvas_hours" width="122" height="122">
					Your browser does not support the HTML5 canvas tag.
				</canvas>
				<p class="val">0</p>
				<p class="type_hours">Hours</p>
			</div>
		</div>
		<!-- /Hours -->
		<!-- Minutes -->
		<div class="clock_minutes">
		    <div class="bgLayer">
		        <canvas id="canvas_minutes" width="122" height="122">
		            Your browser does not support the HTML5 canvas tag.
		        </canvas>
		        <div class="text">
		            <p class="val">0</p>
		            <p class="type_minutes">Minutes</p>
		        </div>
		    </div>
		</div>
		<!-- /Minutes -->
		<!-- Seconds -->
		<div class="clock_seconds">
		    <div class="bgLayer">
		        <canvas id="canvas_seconds" width="122" height="122">
		            Your browser does not support the HTML5 canvas tag.
		        </canvas>
		        <p class="val">0</p>
		        <p class="type_seconds">Seconds</p>
		    </div>
		</div>
		<!-- /Seconds -->
	</div>
	<div class="clearfix"></div>
	<p class="lead"></p>
	
	<a class="btn btn-large btn-success" href="#" id="findlink" onclick="$('#find').scrollTop();"><i class="icon-group icon-white"></i> See The Candidates</a>
	<a class="btn btn-large btn-inverse" href="http://nimeregister.co.ke" target="_blank">
		<img src="<?php echo base_url(); ?>assets/img/logos/nimeregister.png" style="height: 20px; margin-top: -5px;" /> Nimeregister</a>
	
</div>

<a name="find" id="find"></a>

<hr style="margin: 50px 0;"/>

<div style="text-align: center;">
	
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/leaflet.css" />
	<!--[if lte IE 8]><link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/leaflet.ie.css" /><![endif]-->
	
	<style>
		#map {
			/*width: inherit;*/
			/*height: 500px;*/
			min-height: 500px;
			height: 100%;
			border-radius: 10px !important;
		}
		
				.info {
					padding: 6px 8px;
					font: 14px/16px Arial, Helvetica, sans-serif;
					background: white;
					background: rgba(255,255,255,0.8);
					box-shadow: 0 0 15px rgba(0,0,0,0.2);
					border-radius: 5px;
				}
				.info h4 {
					margin: 0 0 5px;
					color: #777;
				}
		
				.legend {
					text-align: left;
					line-height: 18px;
					color: #555;
				}
				.legend i {
					width: 18px;
					height: 18px;
					float: left;
					margin-right: 8px;
					opacity: 0.7;
		}
		
		#content p{
			margin-bottom: 0;
		}
	</style>
	
	
	<div class="row" style="display: inline-block; text-align: left; margin-bottom: 20px;">
		<div class="span5">
			<h1><i class="icon-group"></i> The Candidates</h1>
			<br />
			<p style="text-indent: 50px; text-align: justify;">￼The Constitution empowers the people to exercise sovereign power directly through elections. Power is also exercised at both the central and county Governments on behalf of the people. For leaders to genuinely exercise power on behalf of the people, they must be elected democratically in free and fair elections. Elections enable the people the right to exercise freedom to make political choices.</p>
			<p class="lead">Select a county from the map and see the candidates from Governor, Senator and Women Representative.</p>
			
		</div>
		<div class="span7">
			<div id="map"></div>
		</div>
	</div>

	<div id="loading" align='center'>
		<img src='<?php echo base_url(); ?>assets/img/loader.gif'>
	</div>
	<script type="text/javascript">document.getElementById("loading").style.display = 'none';</script>
	
	<div id="context" style="text-align: left;">
		
		<h2>Presidential Candidates</h2>
		<div class="row">
				<?php
					$i = 1; 
					foreach($presidential_aspirants as $candidate){ ?>
					<div class="span4">
						<p><b><?php echo $candidate['surname']." ".$candidate['other_name']; ?></b></p>
						<small><?php echo $candidate['name']; ?></small>
						<p><b>Running Mate: </b> <?php echo $candidate['running_mate']; ?></p>
					
				<?php 
						if ($i==3 || $i==6) {
							echo '<hr /></div>';
							echo '</div><div class="row" style="display: inline-block;">';
						} else {
							if ($i==8) {
								echo '</div>';
							} else {
								echo '<hr /></div>';
							}
						}
						$i++;
					} ?>
		</div>
	
	</div>
	
	
	<script src="<?php echo base_url(); ?>assets/js/ajax_request.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/leaflet.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/counties_small.geojson"></script>
	
	<script type="text/javascript">

		var map = L.map('map').setView([-0.06592, 38.10059], 6);

		var cloudmade = L.tileLayer('http://{s}.tile.cloudmade.com/{key}/{styleId}/256/{z}/{x}/{y}.png', {
			attribution: 'Map data &copy; 2011 OpenStreetMap contributors, Imagery &copy; 2011 CloudMade',
			key: 'BC9A493B41014CAABB98F0471D759707',
			styleId: 22677
		}).addTo(map);


		// control that shows state info on hover
		var info = L.control();

		info.onAdd = function (map) {
			this._div = L.DomUtil.create('div', 'info');
			this.update();
			return this._div;
		};

		info.update = function (props) {
			this._div.innerHTML = '<h4>Voter Registration per County</h4>' +  (props ?
				'<b>' + props.COUNTY_NAM + '</b>: ' + props.REG : 'Hover over a county');
		};

		info.addTo(map);


		// get color depending on population density value
		function getColor(d) {
			return d > 1000000 ? '#000000' :
				   d > 500000 ? '#800026' :
			       d > 300000  ? '#BD0026' :
			       d > 250000  ? '#E31A1C' :
			       d > 200000  ? '#FC4E2A' :
			       d > 150000   ? '#FD8D3C' :
			       d > 120000   ? '#FEB24C' :
			       d > 100000   ? '#FED976' :
			                  '#FFEDA0';
		}

		function style(feature) {
			return {
				weight: 2,
				opacity: 1,
				color: 'white',
				dashArray: '3',
				fillOpacity: 0.7,
				fillColor: getColor(feature.properties.REG)
			};
		}

		function highlightFeature(e) {
			var layer = e.target;

			layer.setStyle({
				weight: 5,
				color: '#666',
				dashArray: '',
				fillOpacity: 0.7
			});

			if (!L.Browser.ie && !L.Browser.opera) {
				layer.bringToFront();
			}

			info.update(layer.feature.properties);
		}

		var geojson;

		function resetHighlight(e) {
			geojson.resetStyle(e.target);
			info.update();
		}

		function zoomToFeature(e) {
			map.fitBounds(e.target.getBounds());
			var layer = e.target;
			
			ajaxrequest('<?php echo base_url(); ?>home/process', 'context', 'loading', layer.feature.properties.OBJECTID_1);
		}

		function onEachFeature(feature, layer) {
			layer.on({
				mouseover: highlightFeature,
				mouseout: resetHighlight,
				click: zoomToFeature
			});
		}

		geojson = L.geoJson(countyData,{
			style: style,
			onEachFeature: onEachFeature
		}).addTo(map);

		map.attributionControl.addAttribution('Electoral data &copy; <a href="http://iebc.or.ke/">IEBC</a>');


		var legend = L.control({position: 'bottomright'});

		legend.onAdd = function (map) {

			var div = L.DomUtil.create('div', 'info legend'),
				grades = [0, 100000, 120000, 150000, 200000, 250000, 300000, 500000, 1000000],
				labels = [],
				from, to;

			for (var i = 0; i < grades.length; i++) {
				from = grades[i];
				to = grades[i + 1];

				labels.push(
					'<i style="background:' + getColor(from + 1) + '"></i> ' +
					from + (to ? '&ndash;' + to : '+'));
			}

			div.innerHTML = labels.join('<br>');
			return div;
		};

		legend.addTo(map);

	</script>
	
	
</div>

<hr style="margin-top: 90px;"/>

<div class="social-icons">
	<h3>Share GotToVote.co.ke</h3>
	<p> 
	<a href="javascript:void(0);" name="Share_TW" title="Share on Twitter | GotToVote! Ke"
	onClick='window.open("http://twitter.com/intent/tweet?text=Kenya+decides%21+Share+the+peace+message+and+find+your+candidates+on+http%3A%2F%2Fgottovote.co.ke+%23GotToVote","GotToVote","width=550,height=270");'><img src="<?php echo base_url(); ?>assets/img/social/twitter.png" alt="Share on Twitter" /></a>
	<a href="javascript:void(0);" name="Share_FB" title="Share on FB | GotToVote! Ke"
	onClick='window.open("http://www.facebook.com/sharer.php?u=http%3A%2F%2Fgottovote.co.ke%2F&t=Kenya+decides%21+Share+the+peace+message+and+find+your+candidates+on+GotToVote.","GotToVote","width=550,height=270");'><img src="<?php echo base_url(); ?>assets/img/social/facebook.png" alt="Share on Facebook" /></a>
	<a href="https://plus.google.com/share?url=gottovote.co.ke" onclick="javascript:window.open(this.href,
	  '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><img src="<?php echo base_url(); ?>assets/img/social/googleplus.png" alt="Share on Google Plus" /></a>
	</p>
</div>

<table align="center" style="text-align: center; width: 90%;"><tr><td>
	<a class="twitter-timeline" href="https://twitter.com/search?q=%23GotToVote" data-widget-id="280061031194181635">Tweets about "#GotToVote"</a>
	<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
</td></tr></table>


<!-- Scripts -->

<!-- Countdown Timer -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jbclock.js"></script>
<script type="text/javascript">
	var startD = Date.parse("Dec 18 2012 18:00:00 GMT+0300 (EAT)")/1000;
	var endD = Date.parse("Mar 4 2013 08:00:00 GMT+0300 (EAT)")/1000;
	
	var nowD = Date.parse(new Date())/1000;
	var testD = new Date();
	
	$(document).ready(function(){
	    JBCountDown({
	        secondsColor : "#FFF",
	        secondsGlow  : "none",
	        
	        minutesColor : "#39b54a",
	        minutesGlow  : "none",
	        
	        hoursColor   : "#ec3535",
	        hoursGlow    : "none",
	        
	        daysColor    : "#333",
	        daysGlow     : "none",
	        
	        startDate   : startD,
	        endDate     : endD,
	        now         : nowD,
	        seconds     : "00"
	    });
	});
</script>

<script type="text/javascript">
	$('#smsCarousel').carousel({
	  interval: false
	})
</script>

<!-- Scroll -->
<script type="text/javascript">
	function goToByScroll(id){
	      // Remove "link" from the ID
	    id = id.replace("link", "");
	      // Scroll
	    $('html,body').animate({
	        scrollTop: $("#"+id).offset().top},
	        'slow');
	}
	
	$("#findlink").click(function(e) { 
	      // Prevent a page reload when a link is pressed
	    e.preventDefault(); 
	      // Call the scroll function
	    goToByScroll($(this).attr("id"));           
	});
	$("#smslink").click(function(e) { 
	      // Prevent a page reload when a link is pressed
	    e.preventDefault(); 
	      // Call the scroll function
	    goToByScroll($(this).attr("id"));           
	});
</script>

<!-- Find Registration Centre -->
<script type="text/javascript">
 	function showMap() {
 		$('#iebcMap').fadeOut('slow');
 		$('#iebcMap').html('<iframe src="http://vote.iebc.or.ke/gadget/" width="100%" height="552" frameborder="0" scrolling="No" rightmargin="0" bottommargin="0" topmargin="0" leftmargin="0" marginwidth="0" allowtransparency="allowtransparency" border="0" marginheight="0"></iframe>');
 		$('#iebcMap').fadeIn('slow');
 	}
</script>