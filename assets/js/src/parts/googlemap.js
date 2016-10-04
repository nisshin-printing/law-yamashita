require('//maps.googleapis.com/maps/api/js?key=AIzaSyAN4kMQJOMnCR-Y0GR8QylbjAZiHLGm2UE');
{
	if (document.getElementById('section-map')) {
		let latlng1 = new google.maps.LatLng(34.399869, 132.4645053),
			latlng2 = new google.maps.LatLng(34.3951325, 132.461194),
			opts1 = {
				zoom: 17,
				center: latlng1,
				mapTypeId: google.maps.MapTypeId.ROADMAP,
				scrollwheel: false
			},
			opts2 = {
				zoom: 17,
				center: latlng2,
				mapTypeId: google.maps.MapTypeId.ROADMAP,
				scrollwheel: false
			},
			map1 = new google.maps.Map(document.getElementById('section-map'), opts1),
			map2 = new google.maps.Map(document.getElementById('bicycle-map'), opts2);
		let icon1 = new google.maps.MarkerImage('../wp-content/themes/law-yamashita/assets/img/map-logo.png',
												new google.maps.Size(64, 86),
												new google.maps.Point(0, 0));
		let markerOptions1 = {
			position: latlng1,
			map: map1,
			icon: icon1,
			title: '山下江法律事務所'
		},
			iwopts2 = {
				position: latlng2,
				map: map2,
				content: '<a class="external-links no-ani" href="http://www.city.hiroshima.lg.jp/www/contents/1393215813133/index.html#kamiyatyou" title="市営基町駐輪場の詳細" target="_blank">市営の基町駐輪場（有料）</a>'
			},
			marker1 = new google.maps.Marker(markerOptions1),
			infoWindow = new google.maps.InfoWindow(iwopts2);
	}
}