<div style="border-bottom: 1px solid #e5e5e5; padding: 30px 0 20px; background-color: #fafafa; margin-bottom: 60px;">
	<div class="container">
		<div class="row">
			<div class="span5">
				<br />
				<h1 style="font-weight: 500;">Share the Message!</h1>
				<p class="lead">Fill the form and share this peace message with your friends free!</p>
				<br />
				<ul style='list-style:none;padding:0;margin-left:0;'>
					<li style='margin-bottom:10px;'>
						<a class="btn btn-large btn-success homebtn" href="#" id="findlink" onclick="$('#find').scrollTop();"><i class="icon-group icon-white"></i> See The Candidates</a>
					</li>
					<li style='margin-bottom:10px;' class="dropdown"><a class="btn btn-large btn-success homebtn dropdown" href="#" class="dropdown-toggle" id="drop_report" role="button" data-toggle="dropdown" target='_blank'><i class="icon-bullhorn icon-white"></i> Make a Report</a>
						<ul id="menu2" class="dropdown-menu" role="menu" aria-labelledby="drop_report">
		                <li role="presentation"><a role="menuitem" tabindex="-1" href="https://uchaguzi.co.ke/reports/submit">Uchaguzi</a></li>
		                <li role="presentation"><a role="menuitem" tabindex="-1" href="http://ushahidi.voiceofmathare.org/index.php/reports/submit">Voice of Mathare</a></li>
		                <li role="presentation"><a role="menuitem" tabindex="-1" href="http://www.nscpeace.go.ke/108/report.php">Amani Kenya @ 108</a></li>
		                <li role="presentation"><a role="menuitem" tabindex="-1" href="http://www.iebc.or.ke/report-to-us/">IEBC Whistle Blowing Portal</a></li>
		                <li role="presentation"><a role="menuitem" tabindex="-1" href="http://www.sisiniamani.org/">Sisi ni Amani</a></li>
		                <li role="presentation"><a role="menuitem" tabindex="-1" href="http://www.kenyapolice.go.ke/report_a_crime.asp">Kenya Police</a></li>
		                <li role="presentation"><a role="menuitem" tabindex="-1" href="http://www.knchr-idp.org/">KNHRC</a></li>
		                </ul>	
	                </li>
	                <li style='margin-bottom:10px;'>
						<a class="btn btn-large btn-success homebtn" href="http://gottovote.code4kenya.org/" target='_blank'><i class="icon-search icon-white"></i> Registration Centers</a>
					</li>
				</ul>
			</div>
			
			<div style="text-align: right; padding-top: 30px;" class="span7">
				
				<div>
					<div class="btn-group" data-toggle="buttons-radio" style="display: inline-block;">
						<button id="btnItemSmsDetails" type="button" class="btn active" onclick="javascript:$('#smsCarousel').carousel(0);">
							<i class="icon-list-alt"></i> <b>SMS Details</b></button>
						<button id="btnItemSmsConfirm" type="button" class="btn" onclick="javascript:$('#smsCarousel').carousel(1);">
							<i class="icon-unlock"></i> <b>Confirmation Code</b></button>
					</div>
				</div>
				
				<div id="smsCarousel" class="carousel slide" style="text-align: left; margin-top: 10px;">
					
					<!-- Carousel items -->
					<div class="carousel-inner">
						<div class="active item">
							<div class="row">
								<div class="span7">
									<form id="smsDetailsForm">
										<fieldset>
											<legend>SMS Details</legend>
											<div class="row">
												<div class="span4" id="senderDetails">
													<p><b>Your Details:</b></p>
													<input class="span4" type="text" name="name" id="senderName" placeholder="Name" required onkeyup="editMsgRT();"><br />
													<input class="span4" type="email" name="email" id="senderEmail" placeholder="Email" required><br />
													<div>
														<div class="input-prepend" style="float: right;" id="senderMob">
														  	<span class="add-on">+254</span>
															<input class="span2" name="sendernumber" id="prependedInput" type="text" placeholder="722722722" required onkeyup="editMsgRT();" maxlength="9">
														</div>
													</div>
													<div class="clearfix"></div>
													<span class="help-block" style="text-align: right;">*All fields are required.</span>
													<p><b>Peace Message:</b></p>
													<textarea rows="4" class="span4" id="disabledInput" name="msgTextArea" disabled placeholder="Hi. Thank you for keeping the peace & making history along with thousands of Kenyans like you. Send this SMS free at http://bit.ly/gtvke From: [0722722722]"></textarea>
												</div>
												<div class="span3">
													<div style="text-align: right;">
														<p><b>RECIPIENTS</b></p>
														<div class="input-prepend">
														  	<span class="add-on">+254</span>
															<input id="recipient1" class="span2" id="prependedInput" type="text" name="recipient[]" placeholder="722722723" maxlength="9">
														</div>
														<div class="input-prepend">
														  	<span class="add-on">+254</span>
															<input id="recipient2" class="span2" id="prependedInput" type="text" name="recipient[]" placeholder="722722724" maxlength="9">
														</div>
														<div class="input-prepend">
														  	<span class="add-on">+254</span>
															<input id="recipient3" class="span2" id="prependedInput" type="text" name="recipient[]" placeholder="722722725" maxlength="9">
														</div>
														<div class="input-prepend">
														  	<span class="add-on">+254</span>
															<input id="recipient4" class="span2" id="prependedInput" type="text" name="recipient[]" placeholder="722722726" maxlength="9">
														</div>
														<div class="input-prepend">
														  	<span class="add-on">+254</span>
															<input id="recipient5" class="span2" id="prependedInput" type="text" name="recipient[]" placeholder="722722727" maxlength="9">
														</div>
														<div class="clearfix"></div>
														<br />
														<a id="btnSendSMS" href="javascript:sendSMS();" class="btn btn-large btn-info" ><i class="icon-spinner icon-spin" style="display: none;"></i><i class="icon-envelope-alt"></i> Send SMS</a>
													</div>
												</div>
											</div>
									  	</fieldset>
									</form>
								</div>
							</div>
						</div>
						<div class="item">
							<form>
								<fieldset>
									<legend>Confirmation Code</legend>
									<table align="center" style="text-align: center; height: 292px;"><tr><td>
										<div style="padding: 0 100px;">
											<p class="lead" style="font-weight: 500; font-size: 40px;">Thank You</p>
											<div id="divConfirmCode">
												<p class="lead" style="font-size: 17px; line-height: 20px;">Enter the confirmation code sent to you by SMS and your peace message will be on its merry way.</p>
												<input type="text" name="confirmCode" id="confirmCode" style="text-align: center;"/><br />
												<a href="javascript:confirmCode();" class="btn btn-large btn-info" id="btnConfirm"><i class="icon-spinner icon-spin" style="display: none;"></i> Confirm</a>
											</div>
											<div id="divShareSocial" style="display: none;">
												<p class="lead" style="font-size: 17px; line-height: 20px;">Success! You are amazing! You can now share the peace message on Facebook &amp; Twitter.</p>
												<p class="lead">
													<a href="javascript:void(0);" name="Share_FB" title="Share on FB | GotToVote! Ke"
													onClick='window.open("http://www.facebook.com/sharer.php?u=http%3A%2F%2Fgottovote.co.ke%2F&t=Hi.+Join+me+in+voting+peacefully+in+this+historic+elections.+Send+the+SMS+free+to+your+friends+on+http://bit.ly/gtvke","GotToVote","width=550,height=270");'><i class="icon-facebook icon-2x icon-border"></i></a>
													
													<a href="javascript:void(0);" name="Share_TW" title="Share on Twitter | GotToVote! Ke"
													onClick='window.open("http://twitter.com/intent/tweet?text=Hi.+Join+me+in+voting+peacefully+in+this+historic+elections.+Send+the+SMS+free+to+your+friends+on+http://bit.ly/gtvke+%23GotToVote", "GotToVote", "width=550,height=270");'><i class="icon-twitter icon-2x icon-border"></i></a>
													
												</p>
											</div>
										</div>
									</td></tr></table>
							  	</fieldset>
							</form>
							
							
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</div>
</div>

<div style="width:1025px;margin:auto;">
	<iframe src="http://vote.iebc.or.ke/results/" width="1024px" height="655" frameborder="0"></iframe>
</div>

<div class="container">
	
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
				<p class="lead">Select a county from the map and see the candidates from Governor, Senator and Women Representative.</p>
				<p style="text-indent: 50px; text-align: justify;">￼The Constitution empowers the people to exercise sovereign power directly through elections. Power is also exercised at both the central and county Governments on behalf of the people. For leaders to genuinely exercise power on behalf of the people, they must be elected democratically in free and fair elections. Elections enable the people the right to exercise freedom to make political choices.</p>
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
		<script src="http://maps.google.com/maps/api/js?v=3.2&sensor=false"></script>
    	<script src="<?php echo base_url(); ?>assets/js/leaflet-google.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/counties_small.geojson"></script>
			<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/const_small.geojson"></script>
		<script type="text/javascript">
	
			var map = L.map('map').setView([-1.24, 38.8], 6);
			var googleLayer = new L.Google('ROADMAP');
			map.addLayer(googleLayer);
				// control that shows state info on hover
			var info = L.control();
	
			info.onAdd = function (map) {
				this._div = L.DomUtil.create('div', 'info');
				this.update();
				return this._div;
			};
	
			info.update = function (props) {
				this._div.innerHTML = '<h4>Voter Registration</h4>' +  (props ?
					'<b>' + props.EDNAME + '</b>: ' + props.REG : 'Hover over a region');
			};
	
			info.addTo(map);
		var legend = L.control({position: 'bottomright'});
	
			legend.onAdd = function (map) {
	
				var div = L.DomUtil.create('div', 'info legend'),
					grades = [0, 10000, 25000, 50000, 100000, 300000, 500000, 1000000],
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
			// get color depending on population density value
			function getColor(d) {
				return d > 1000000 ? '#000000' :
					   d > 500000 ? '#800026' :
				       d > 300000  ? '#BD0026' :
				       d > 100000  ? '#E31A1C' :
				       d > 50000  ? '#FC4E2A' :
				       d > 25000   ? '#FD8D3C' :
				       d > 10000   ? '#FEB24C' :
				       d > 0   ? '#FED976' :
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
			var consituencies;
			
			function resetHighlight(e) {
				geojson.resetStyle(e.target);
				info.update();
			}
	
			function zoomToFeature(e) {
				map.fitBounds(e.target.getBounds());
				var layer = e.target;
				var ed_id;
				var edType;
				if((layer.feature.properties.OBJECTID_1)==null || (layer.feature.properties.OBJECTID_1)==false){
					ed_id = layer.feature.properties.OBJECTID;
					edType = 2;
				}else{
					ed_id = layer.feature.properties.OBJECTID_1;
					edType = 1;
				}
				ajaxrequest('<?php echo base_url(); ?>home/process', 'context', 'loading', ed_id, edType);
			}
	
			function onEachFeature(feature, layer) {
				layer.on({
					mouseover: highlightFeature,
					mouseout: resetHighlight,
					click: zoomToFeature
				});
			}
	
		geojson = L.geoJson(countyData, {
			style: style,
			onEachFeature: onEachFeature
		}).addTo(map);
	
		consituencies = L.geoJson(constData, {
			style: style,
			onEachFeature: onEachFeature
		});
		
		var overlays = {
			"Constituencies": consituencies,
			"Counties": geojson
		};
		
		L.control.layers(overlays).addTo(map);
		</script>
	

	</div>
</div>


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

<!-- SMS script -->
<script type="text/javascript">
	var base_url = "<?php echo base_url(); ?>";
</script>
<script src="<? echo base_url(); ?>assets/js/sms.js" type="text/javascript"></script>

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
