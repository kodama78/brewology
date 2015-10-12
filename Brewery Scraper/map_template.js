/**
 * Created by shawnotomo on 10/10/15.
 */
function initMap() {
    var map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: -33.8688, lng: 151.2195},
        zoom: 13
    });

    var input = document.getElementById('pac-input');

    var autocomplete = new google.maps.places.Autocomplete(input);
    autocomplete.bindTo('bounds', map);

    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

    var infowindow = new google.maps.InfoWindow();
    var marker = new google.maps.Marker({
        map: map
    });
    marker.addListener('click', function() {
        infowindow.open(map, marker);
    });

    autocomplete.addListener('place_changed', function() {
        infowindow.close();
        var place = autocomplete.getPlace();
        if (!place.geometry) {
            return;
        }

        if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
        } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);
        }

        // Set the position of the marker using the place ID and location.
        marker.setPlace({
            placeId: place.place_id,
            location: place.geometry.location
        });
        marker.setVisible(true);

        infowindow.setContent('<div><strong>' + place.name + '</strong><br>' +
            'Place ID: ' + place.place_id + '<br>' +
            place.formatted_address);
        infowindow.open(map, marker);
    });
}


//PATRICK'S PLACE FINDING TEMPLATE

function rateBeerFinder(){
    $.ajax({
        url:'rateBeer-list-pull.php',
        method: 'GET',
        dataType: 'JSON',
        cache: false,
        crossDomain: true,
        success: function(response){
            var breweryArray = response;
            var testBrewery = breweryArray[0];
            var breweryName = testBrewery.name;
            console.log(breweryName);
            var breweryCity  = testBrewery.city;
            console.log(breweryCity);
            var breweryState = testBrewery.state;
            console.log(breweryState);
            initMap(breweryName, breweryCity, breweryState);
        }
    });
}





$('#local-business').hide();

var $map;
var $service;
var $infowindow;

function initMap(name, city, state) {
    var $locale = {lat: 33.9460155, lng: -117.399528};

    setMap($locale, name, city, state);
}

function setMap($locale, name, city, state) {

    $map = new google.maps.Map(document.getElementById('map'), {
        center: $locale,
        zoom: 10.,
        scrollwheel: false,
    });

    $infowindow = new google.maps.InfoWindow();

    $service = new google.maps.places.PlacesService($map);

    $service.textSearch({
        query: name + ' ' + city + ' ' + state,

    }, callback);
}

function callback($results, $status) {
    if ($status === google.maps.places.PlacesServiceStatus.OK) {
        for (var i = 0; i < $results.length; i++) {
            createMarker($results[i]);
        }
    }
}

function breweryObject($place){
    var $request = {
        placeId: $place.place_id
    };
}

function createMarker($place) {
    var $marker = new google.maps.Marker({
//     icon: '../lib/img/global/marker-blue.png',
        map: $map,
        position: $place.geometry.location
    });

    google.maps.event.addListener($marker, 'click', function () {

        var $request = {
            placeId: $place.place_id
        };

        $service = new google.maps.places.PlacesService($map);

        $service.getDetails($request, function ($place, $status) {

            console.log($place);
            var $reviews = '';
            var $rating;
            var $stars;
            var $mostPossible = 0;

            $('#local-business').hide();
            $('#business-name').html($place.name);
            $('#business-website').html($place.website);
            $('#local-business').show();
        });
    });
}
