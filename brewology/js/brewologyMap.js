/**
 * Created by shawnotomo on 10/27/15.
 */
//THIS CREATES AND INITALIZES THE MAP FROM THE GOOGLE API
//function initialize() {
//    var center = new google.maps.LatLng(32.718102,-117.169411);
//    var mapProp = {
//        center:center,
//        zoom:5,
//        mapTypeId:google.maps.MapTypeId.ROADMAP
//    };
//    var map=new google.maps.Map(document.getElementById("map-canvas"),mapProp);
//
//
//    //THIS CREATES A MARKER TO PLACE ON THE MAP
//    var marker=new google.maps.Marker({
//        position:center,
//
//    });
//
//    marker.setMap(map);
//
//    //This creates an info box for the marker
//
//    var infowindow = new google.maps.InfoWindow({
//       content: "Hello World!"
//    });
//
//    google.maps.event.addListener(marker, 'mouseover', function(){
//       infowindow.open(map, marker);
//    });
//}
//google.maps.event.addDomListener(window, 'load', initialize);
var lat = -33.8688;
var lng = 151.2195;



function initialize() {
    var map = new google.maps.Map(document.getElementById('map-canvas'), {
        center: {lat: lat, lng: lng},
        zoom: 13,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    // Create the search box and link it to the UI element.
    var input = document.getElementById('locationSearch');
    var searchBox = new google.maps.places.SearchBox(input);

    // Bias the SearchBox results towards current map's viewport.
    map.addListener('bounds_changed', function() {
        searchBox.setBounds(map.getBounds());
    });

    var markers = [];
    // Listen for the event fired when the user selects a prediction and retrieve
    // more details for that place.
    searchBox.addListener('places_changed', function() {
        var places = searchBox.getPlaces();
        var geocoder = new google.maps.Geocoder();
        geocodeAddress(geocoder, map);

        if (places.length == 0) {
            return;
        }

        // Clear out the old markers.
        markers.forEach(function(marker) {
            marker.setMap(null);
        });
        markers = [];

        // For each place, get the icon, name and location.
        var bounds = new google.maps.LatLngBounds();
        places.forEach(function(place) {
            var icon = {
                url: place.icon,
                size: new google.maps.Size(71, 71),
                origin: new google.maps.Point(0, 0),
                anchor: new google.maps.Point(17, 34),
                scaledSize: new google.maps.Size(25, 25)
            };

            // Create a marker for each place.
            markers.push(new google.maps.Marker({
                map: map,
                icon: icon,
                title: place.name,
                position: place.geometry.location
            }));

            if (place.geometry.viewport) {
                // Only geocodes have viewport.
                bounds.union(place.geometry.viewport);
            } else {
                bounds.extend(place.geometry.location);
            }
        });
        map.fitBounds(bounds);
    });

}

function geocodeAddress(geocoder, resultsMap) {

    var address = $('#locationSearch').val();
    var radius = $('#radius').val();

    geocoder.geocode({'address': address}, function(results, status) {
        if (status === google.maps.GeocoderStatus.OK) {
            resultsMap.setCenter(results[0].geometry.location);

            var marker = new google.maps.Marker({
                map: resultsMap,
                position: results[0].geometry.location
            });
            lat = results[0].geometry.location.lat();

            lng = results[0].geometry.location.lng();



        } else {
            alert('Geocode was not successful for the following reason: ' + status);
        }
    });
};

//THIS FUNCTION SEARCHES THE DATABASE FOR BREWERIES BASED ON DISTANCE
function searchDatabase(){
    var latitude = lat;

    var longitude = lng;

    var radius = $('#radius').val();

    $.ajax({
        url:'js/brewSearch/breweryQuery.php',
        method: 'POST',
        dataType: 'JSON',
        data:{
            lat: latitude,
            lng: longitude,
            radius: radius
        },
        success: function(response){
            var breweriesArray = response;
            makeMarkers(latitude, longitude, radius, breweriesArray);

        },
        error: function(response){
            console.log('There is an error', response);
        }
    });
}

function makeMarkers(latitude, longitude, radius, breweryArray){

    var zoom = 11;
    switch(radius) {
        case '10':
            zoom = 11;
            break;
        case '25':
            zoom = 10;
            break;
        case '50':
            zoom = 9;
            break;
        case '100':
            zoom = 8;
            break;
        default:
        zoom = 11;
    }
    console.log('zoom is ', zoom);
    var map = new google.maps.Map(document.getElementById('map-canvas'), {
        center: {lat: latitude, lng: longitude},
        zoom: zoom,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    });
    for (var i = 0; i < breweryArray.length; i++){
        var breweryLat = Number(breweryArray[i].latitude);
        var breweryLong = Number(breweryArray[i].longitude);
        var breweryName = breweryArray[i].name;



        //This creates a marker and infobox for the marker
        (function(){
            var marker = new google.maps.Marker({
                position: {lat: breweryLat, lng: breweryLong},
                map: map,
                title: breweryName
            });

            marker.setMap(map);

            var infowindow = new google.maps.InfoWindow({
                content: breweryName
            });

            google.maps.event.addListener(marker, 'mouseover', function(){
                infowindow.open(map, marker);
            });
            google.maps.event.addListener(marker, 'mouseout', function(){
                infowindow.close(map, marker);
            });
        })();

    }
}