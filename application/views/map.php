	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/leaflet.css" />
	<!--[if lte IE 8]><link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/leaflet.ie.css" /><![endif]-->

	<style>
		#map {
			width: 800px;
			height: 500px;
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
	</style>

	<div id="map"></div>
	<script src="<?php echo base_url(); ?>assets/js/ajax_request.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/leaflet.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/counties.geojson"></script>
	
	<script type="text/javascript">

		var map = L.map('map').setView([-1.28, 36.82], 6);

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
			
			ajaxrequest('<?php echo base_url(); ?>map/process', 'context', 'loading', layer.feature.properties.OBJECTID);
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
	
	<div id="loading" align='center'>
<img src='<?php echo base_url(); ?>assets/img/loader.gif'>
</div>
<script type="text/javascript">document.getElementById("loading").style.display = 'none';</script>
<div id="context">

<?php
	foreach($presidential_aspirants as $candidate){
		echo "<p>";
		echo "<h3>". $candidate['surname']." ".$candidate['other_name'];
		echo "</h3><br>Running mate:";
		echo $candidate['running_mate'];
		echo "</p>";
	}
?>

</div>

