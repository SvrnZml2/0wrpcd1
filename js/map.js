  function initMap() {
	map = new google.maps.Map(document.getElementById('map'), {
	  center: {lat: 47.675855, lng: -2.765641},
	  zoom: 15
	})
	marker = new google.maps.Marker({position: map.center,map: map,icon: "../images/logos/icon.png"});
	
	marker.setAnimation(google.maps.Animation.BOUNCE); //Animation des marqueurs
	//Stop animation marqueurs
	// setTimeout(function () {
	// 		marker.setAnimation(null);
	// }, 5200);

	}
	
	