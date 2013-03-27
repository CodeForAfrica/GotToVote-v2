  	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/leaflet.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/leaflet.ie.css" /><![endif]-->
		
		<style>
		body{
			margin:0 !important;
			margin-bottom:-8px;
		}
			#map {
				/*width: inherit;*/
				/*height: 500px;*/
				min-height: 500px;
				height: 100%;
				
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
    	
    	<div id="map"></div>
  		<script type="text/javascript">
	  		<?php
	    	print 'var countyData ={
			"type": "FeatureCollection",                                                                      
			"features": [';
			$data2 = array();
			foreach($voter_turnout as $county){
				$voterturnout = (($county['VALID']/$county['REG'])*100);
				$data2[]= '{ "type": "Feature", "id": '.$county['ref'].', "properties": {"OBJECTID": '.$county['OBJECTID'].', "EDNAME": "'.$county['EDNAME'].'", "REG":'.$county['REG'].', "TURNOUT": "'.number_format($voterturnout, 2).'"}, "geometry": { "type": "'.$county['type'].'", "coordinates": [['.$county['geometry'].']]}}';	
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
				// control that shows state info on hover
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
				this._div.innerHTML = '<h4>Voter Turnout</h4>' +  (props ?
					'<b>' + props.EDNAME + '</b>: ' + commaSeparateNumber(props.REG)+'<br>Voter Turnout: '+props.TURNOUT+'%' : 'Hover over a region');
			};
	
			info.addTo(map);
			var legend = L.control({position: 'bottomright'});
	
			legend.onAdd = function (map) {
	
				var div = L.DomUtil.create('div', 'info legend'),
					grades = [0, 60, 65, 70, 80, 85, 90, 95],
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
				return d > 95 ? '#000000' :
					   d > 90 ? '#800026' :
				       d > 85  ? '#BD0026' :
				       d > 80  ? '#E31A1C' :
				       d > 75  ? '#FC4E2A' :
				       d > 70   ? '#FD8D3C' :
				       d > 65   ? '#FEB24C' :
				       d > 60   ? '#FED976' :
				                  '#FFEDA0';
			}
	
			function style(feature) {
				return {
					weight: 2,
					opacity: 1,
					color: 'white',
					dashArray: '3',
					fillOpacity: 0.7,
					fillColor: getColor(feature.properties.TURNOUT)
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
				var edType;
				
				if((layer.feature.properties.CONST_CODE)==null || (layer.feature.properties.CONST_CODE)==false){
					
					edType = 1;
				}else{
				
					edType = 2;
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

		L.control.layers(overlays, baseLayers).addTo(map);
		</script>