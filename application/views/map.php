<div class="container">
	
	<a name="find" id="find"></a>
	<div style="text-align: center;">	
		<div class="row" style="display: inline-block; text-align: left; margin-bottom: 20px;">
			
			<div class="span5">
				<div id="loading" align='center'>
					<img src='<?php echo base_url(); ?>assets/img/loader.gif'>
				</div>
				<div id="showwinners">
				<h1><i class="icon-group"></i> The Candidates</h1>
				<br />
				<p class="lead">Select a county from the map and see the candidates from Governor, Senator and Women Representative.</p>
				<p style="text-indent: 50px; text-align: justify;">￼The Constitution empowers the people to exercise sovereign power directly through elections. Power is also exercised at both the central and county Governments on behalf of the people. For leaders to genuinely exercise power on behalf of the people, they must be elected democratically in free and fair elections. Elections enable the people the right to exercise freedom to make political choices.</p>
				</div>
			</div>
			<div class="span7">
			<script type="text/javascript">
				function show_votereg(){
					document.getElementById('results_map').style.display = 'none';
					document.getElementById('votereg_map').style.display = 'block';
				}
				function show_results(){
					document.getElementById('results_map').style.display = 'block';
					document.getElementById('votereg_map').style.display = 'none';
				}
				
			</script>
			<div style="text-align:center">
			<div class="btn-group" data-toggle="buttons-radio" style="display: inline-block;margin-bottom:5px;text-align:center">
			<button type="button" class="btn active" onclick="show_results();">
			<i class="icon-check"></i> <b>Election Results</b></button>
			<button type="button" class="btn" onclick="show_votereg();">
			<i class="icon-signal"></i> <b>Voter Turnout</b></button>
			</div></div>
			<div id="mapscript" style="border: 1px solid #e5e5e5;">
			<div id="votereg_map">
				<iframe src="http://localhost/ElectionsToolkit/Voter_turnout" frameborder="0" scrolling="no" style="min-height:500px;width:100%;padding:0;margin:0;"></iframe>
			</div>
			<script type="text/javascript">document.getElementById("votereg_map").style.display='none';</script>
			<div id="results_map">
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
		<script src="<?php echo base_url(); ?>assets/js/ajax_request.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/leaflet.js"></script>
		<script src="http://maps.google.com/maps/api/js?v=3.2&sensor=false"></script>
    	<script src="<?php echo base_url(); ?>assets/js/leaflet-google.js"></script>
    	
    	
    				
		<div id="map"></div>	
 		<script type="text/javascript">
		<?php
		print 'var countyData ={
		"type": "FeatureCollection",                                                                      
		"features": [';
		$data2 = array();
		/*foreach($cordarea as $county){
			$voterturnout = (($county['total']/$county['REG'])*100);
			$arr = array();
			$arr['type'] = "Feature";
			$arr['id'] = $county['ref'];
			$arr['properties']['OBJECTID'] = $county['OBJECTID'];
			$arr['properties']['WINNER'] = '8';
			$arr['properties']['EDNAME']=$county['EDNAME'];
			$arr['properties']['REG'] = $county['REG'];
			$arr['properties']['TURNOUT'] = number_format($voterturnout, 2).'%';
			$arr['properties']['POVERTY'] = $county['poverty_rate'];
			$arr['geometry']['type'] = $county['type'];
			$arr['geometry']['coordinates'] = '[['.$county['geometry'].']]';
			$data2[] = json_encode($arr, true);	
		}*/
		foreach($cordarea as $county){
			$voterturnout = (($county['total']/$county['REG'])*100);
			$data2[]= '{ "type": "Feature", "id": '.$county['ref'].', "properties": {"OBJECTID": '.$county['OBJECTID'].', "WINNER":8, "EDNAME": "'.$county['EDNAME'].'", "REG":'.$county['REG'].', "TURNOUT": "'.number_format($voterturnout, 2).'%", "POVERTY":"'.$county['poverty_rate'].'"}, "geometry": { "type": "'.$county['type'].'", "coordinates": [['.$county['geometry'].']]}}';	
		}
		foreach($jubileearea as $county){
			$voterturnout = (($county['total']/$county['REG'])*100);
			$data2[]= '{ "type": "Feature", "id": '.$county['ref'].', "properties": {"OBJECTID": '.$county['OBJECTID'].', "WINNER":2, "EDNAME": "'.$county['EDNAME'].'", "REG":'.$county['REG'].', "TURNOUT": "'.number_format($voterturnout, 2).'%", "POVERTY":"'.$county['poverty_rate'].'"}, "geometry": { "type": "'.$county['type'].'", "coordinates": [['.$county['geometry'].']]}}';	
		}
		
		$data2 = implode(',', $data2);
		print $data2;
		print ']}';
		?>
		</script>

		<script type="text/javascript">
		
			var map = L.map('map').setView([-1.24, 38.8], 6);
			
			var cloudmade = L.tileLayer('http://{s}.tile.cloudmade.com/{key}/{styleId}/256/{z}/{x}/{y}.png', {
				attribution: 'Map data &copy; 2011 OpenStreetMap contributors, Imagery &copy; 2011 CloudMade',
				key: 'BC9A493B41014CAABB98F0471D759707',
				styleId: 22677
			}).addTo(map);
			
			//add information pane 
		
			var info = L.control();
	
			info.onAdd = function (map) {
				this._div = L.DomUtil.create('div', 'info');
				this.update();
				return this._div;
			};
		
			function commaSeparateNumber(val){
	    	while (/(\d+)(\d{3})/.test(val.toString())){
	      	val = val.toString().replace(/(\d+)(\d{3})/, '$1'+','+'$2');
	    	}
	    	return val;
	  		}
		
			info.update = function (props) {
				this._div.innerHTML = '<h4>County Information</h4>' +  (props ?
					'<b>' + props.EDNAME + '</b><br />Registered voters: ' + commaSeparateNumber(props.REG)+'<br>Voter Turnout: '+props.TURNOUT+'<br>Poverty Rate: '+props.POVERTY : 'Hover over a region');
			};
	
			info.addTo(map);
	
		// get color depending on population density value
		function getColor(d) {
			return d == 2 ? '#ff0000' : 
			       d == 8   ? '#fd8a27' :
			                  '#FFEDA0';
		}

		function style(feature) {
			return {
				weight: 2,
				opacity: 1,
				color: 'white',
				dashArray: '3',
				fillOpacity: 0.7,
				fillColor: getColor(feature.properties.WINNER)
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
				var ed_id = layer.feature.properties.OBJECTID;
				var edType = 1;
				
				
				ajaxrequest('<?php echo base_url(); ?>home/process', '<?php echo base_url(); ?>home/winners', ed_id, edType);
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
		
		var legend = L.control({position: 'bottomright'});
	
		legend.onAdd = function (map) {
	
				var div = L.DomUtil.create('div', 'info legend');
	
				div.innerHTML ="Winning party<br /><table><tr><td style='background-color:#ff0000'>&nbsp;&nbsp;&nbsp;</td><td>Jubilee</td></tr><tr><td style='background-color:#fd8a27'>&nbsp;&nbsp;&nbsp;</td><td>Coord</td></tr></table>";
				
				return div;
			};
	
			legend.addTo(map);
			L.control.layers(overlays).addTo(map);

	</script>
	</div>
	<div style="text-align:center">
		<a href="<?php echo base_url();?>assets/dataset.csv"><button class="btn"><i class="icon-download"></i>Download Dataset</button></a>
	</div>
	</div>
			</div>
		</div>
		<script type="text/javascript">document.getElementById("loading").style.display = 'none';</script>
		<div id="context" style="text-align: left;">
			<h2>Presidential Candidates</h2>
			<div class="row">
					<?php
						$i = 1; 
						foreach($presidential_aspirants as $candidate){ ?>
						<div class="span4"<?php if($candidate['winner']=='1'){print'style="background:#d7d7d7;"';}?>>
							<img src='<?php echo $candidate['picture'];?>' style='max-height:40px;float:right;'>
							<p><b><?php echo $candidate['surname']." ".$candidate['other_name']; ?></b><?php if($candidate['winner']=='1'){print'(Winner!)';}?></p>
							<small> <?php echo $candidate['name']; ?></small>
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
	</div>
</div>