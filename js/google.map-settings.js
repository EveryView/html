// ==========  START GOOGLE MAP ========== //
function initialize() {
var myLatLng = new google.maps.LatLng(47.616410,-122.352301);
var roadAtlasStyles = [ { "featureType": "landscape", "elementType": "geometry.fill", "stylers": [ { "color": "#3c3e47" } ] },{ "elementType": "labels.text.fill", "stylers": [ { "color": "#FFFFFF" } ] },{ "elementType": "labels.text.stroke", "stylers": [ { "visibility": "off" } ] },{ "featureType": "road", "elementType": "geometry.fill", "stylers": [ { "color": "#50525f" } ] },{ "featureType": "road", "elementType": "geometry.stroke", "stylers": [ { "visibility": "on" }, { "color": "#808080" } ] },{ "featureType": "poi", "elementType": "labels", "stylers": [ { "visibility": "off" } ] },{ "featureType": "transit", "elementType": "labels.icon", "stylers": [ { "visibility": "off" } ] },{ "featureType": "poi", "elementType": "geometry", "stylers": [ { "color": "#808080" } ] },{ "featureType": "water", "elementType": "geometry.fill", "stylers": [ { "color": "#3071a7" }, { "saturation": -65 } ] },{ "featureType": "road", "elementType": "labels.icon", "stylers": [ { "visibility": "off" } ] },{ "featureType": "landscape", "elementType": "geometry.stroke", "stylers": [ { "color": "#bbbbbb" } ] } ];

var mapOptions = {
    zoom: 15,
    center: myLatLng,
	disableDefaultUI: true,
	scrollwheel: false,
    navigationControl: false,
    mapTypeControl: false,
    scaleControl: false,
    draggable: false,
    mapTypeControlOptions: {
    mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'roadatlas']
    }
  };

  var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);


  var marker = new google.maps.Marker({
      position: myLatLng,
      map: map,
      icon: 'img/indicator.png',
	  title: '',
  });

  var contentString = '<div style="max-width: 350px" id="content">'+
      '<div id="bodyContent">'+
    '<h5 class="color-primary"><strong>everyview</strong></h5>' +
      '<p style="font-size: 12px">2801 First Ave' +
      '<br>Seattle, WA<br>98121</p>'+
      '</div>'+
      '</div>';

  var infowindow = new google.maps.InfoWindow({
      content: contentString
  });

  google.maps.event.addListener(marker, 'click', function() {
    infowindow.open(map,marker);
  });

  var styledMapOptions = {
    name: 'US Road Atlas'
  };

  var usRoadMapType = new google.maps.StyledMapType(
      roadAtlasStyles, styledMapOptions);

  map.mapTypes.set('roadatlas', usRoadMapType);
  map.setMapTypeId('roadatlas');
}

google.maps.event.addDomListener(window, "load", initialize);
// ========== END GOOGLE MAP ========== //