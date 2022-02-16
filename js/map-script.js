// JavaScript Document
function initTourDetailMap() {

		var map = new google.maps.Map(document.getElementById('tour-map'), {
				center: {lat: parseFloat(PlgIntravelTourMapCfg.lat), lng: parseFloat(PlgIntravelTourMapCfg.lng)},
				zoom: parseInt(PlgIntravelTourMapCfg.zoom),
				mapTypeId: google.maps.MapTypeId.ROADMAP,
				scrollwheel: false

		});

		if(PlgIntravelTourMapCfg.markers){
				var directionsService = new google.maps.DirectionsService();
				var markers = [];
				var bounds = new google.maps.LatLngBounds();
				var line = new google.maps.Polyline({
						//path: directionResult.routes[0].overview_path,
						strokeColor: PlgIntravelTourMapCfg.polyline_color,
						strokeOpacity: parseFloat(PlgIntravelTourMapCfg.polyline_stroke_opacity),
						strokeWeight: parseInt(PlgIntravelTourMapCfg.polyline_stroke_weight)
				});

				PlgIntravelTourMapCfg.markers.forEach(function (marker_data) {
						addMarker(marker_data);
				});

				calcRoute();
				fitBounds();
		}

		$('.iw-tab-item').click(function(e){
				e.preventDefault();
				if($(this).data('hasmap') == true){
						google.maps.event.trigger(map, 'resize');
						if(markers.length){
								fitBounds();
						}
				}
		});

		function addMarker(data){
				var latlng = new google.maps.LatLng(data.lat, data.lng);
				var title = data.title ? data.title : data.address;
				if(data.marker_icon){
						var marker_size = new google.maps.Size( 40, 40 );
						var marker_icon = {
								url: PlgIntravelTourMapCfg.marker_url+data.marker_icon,
								size: marker_size,
								scaledSize: marker_size,
								origin: new google.maps.Point( 0, 0 ),
								anchor: new google.maps.Point( 20, 40 )
						};

						var marker = new google.maps.Marker({
								map: map,
								position: latlng,
								icon: marker_icon,
								animation: false
						});
				}
				else
				{
						var marker = new google.maps.Marker({
								position: latlng,
								title: title,
								map: map
						});
				}

				var infowindow = new google.maps.InfoWindow({
						content: title
				});
				marker.addListener('click', function() {
						infowindow.open(map, marker);
				});

				bounds.extend(latlng);

				markers.push(marker);
		}

		function calcRoute() {
				if(markers.length >= 2){
						var j = 0;
						var origin = [], destination = [], waypoints = [];
						markers.forEach(function(marker){
								if(j == 0){
										origin = marker.position;
								}else if(j ==(markers.length - 1)){
										destination = marker.position
								}
								else{
										var way = {
												location : marker.position,
												stopover: true
										};
										waypoints.push(way);
								}

								j++;
						});

						var request = {
								origin: origin,
								destination: destination,
								waypoints: waypoints,
								travelMode: google.maps.TravelMode['DRIVING']
						};
						directionsService.route(request, function(response, status) {
								if (status == google.maps.DirectionsStatus.OK) {
										//directionsDisplay.setDirections(response);
										createPolyline(response);
								}
						});
				}
		}

		function createPolyline(directionResult) {
				line.setPath(directionResult.routes[0].overview_path);
				line.setMap(map);
		}

		function fitBounds(){
				if(markers){
						if(markers.length == 1){
								markers.forEach(function(marker){
										if(marker.position){
												map.setCenter(marker.position);
										}
								});
						}else{
								map.fitBounds(bounds);
						}
				}
				else{
						//
				}
		}
}
		
function initDesinationDetailMap() {
		var lat = PlgIntravelDestinationMapCfg.marker.lat ? parseFloat(PlgIntravelDestinationMapCfg.marker.lat) : parseFloat(PlgIntravelDestinationMapCfg.lat);
		var lng = PlgIntravelDestinationMapCfg.marker.lng ? parseFloat(PlgIntravelDestinationMapCfg.marker.lng) : parseFloat(PlgIntravelDestinationMapCfg.lng);
		var zoom = PlgIntravelDestinationMapCfg.marker.zoom ? parseInt(PlgIntravelDestinationMapCfg.marker.zoom) :  parseFloat(PlgIntravelDestinationMapCfg.zoom);
		var latlng = new google.maps.LatLng(lat, lng);
		var map = new google.maps.Map(document.getElementById('destination-map'), {
				center: latlng,
				zoom: zoom,
				mapTypeId: google.maps.MapTypeId.ROADMAP,
				scrollwheel: false,
styles: [{"featureType":"water","elementType":"geometry","stylers":[{"color":"#e9e9e9"},{"lightness":17}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":20}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffffff"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#ffffff"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":16}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":21}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#dedede"},{"lightness":21}]},{"elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"lightness":16}]},{"elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#333333"},{"lightness":40}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#f2f2f2"},{"lightness":19}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#fefefe"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#fefefe"},{"lightness":17},{"weight":1.2}]}],

		});

		if(PlgIntravelDestinationMapCfg.marker.lat && PlgIntravelDestinationMapCfg.marker.lng){
				if(PlgIntravelDestinationMapCfg.marker_icon){
						var marker_size = new google.maps.Size( 44, 60 );
						var marker_icon = {
								url: PlgIntravelDestinationMapCfg.marker_icon,
								size: marker_size,
								scaledSize: marker_size,
								origin: new google.maps.Point( 0, 0 ),
								anchor: new google.maps.Point( 7, 27 )
						};

						var marker = new google.maps.Marker({
								map: map,
								position: latlng,
								icon: marker_icon,
								animation: false
						});

				}
				else
				{
						var marker = new google.maps.Marker({
								position: latlng,
								map: map
						});
				}
		}
}