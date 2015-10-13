function rateBeerFinder(){
    $.ajax({
        url:'rateBeer-list-pull.php',
        method: 'GET',
        dataType: 'JSON',
        cache: false,
        crossDomain: true,
        success: function(response){
            var breweryArray = response;
            console.log(response);
            for(var i = 0; i < breweryArray.length; i++){
                var brewery = breweryArray[i];

                var breweryName = brewery.name;

                var breweryCity  = brewery.city;

                var breweryState = brewery.state;

                initMap(breweryName, breweryCity, breweryState);
            }
        }
    });
}



$('#local-business').hide();

var $map;
var $service;
var $infowindow;

function initMap(name, city, state) {
    var $locale = {lat: 42.588545, lng: -72.60014999999999};

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
            breweryObject($results[i]);
        }
    }
}

function breweryObject($place){
    var $request = {
        placeId: $place.place_id
    };

    $service = new google.maps.places.PlacesService($map);

    $service.getDetails($request, function ($place, $status) {

        var brewery_google = $place;
        console.log(brewery_google);
        var brewery_name = brewery_google.name;
        console.log(brewery_name);
        var brewery_street_number = brewery_google.address_components[0].long_name;
        console.log(brewery_street_number);
        var brewery_street_name = brewery_google.address_components[1].long_name;
        console.log(brewery_street_name);
        var brewery_city = brewery_google.address_components[2].long_name;
        console.log(brewery_city);
        var brewery_state = brewery_google.address_components[3].long_name;
        console.log(brewery_state);
        var brewery_country = brewery_google.address_components[4].long_name;
        console.log(brewery_country);
        var brewery_zip = brewery_google.address_components[5].long_name;
        console.log(brewery_zip);
        var brewery_latitude = $place.geometry.location.lat();
        console.log(brewery_latitude);
        var brewery_longitude = $place.geometry.location.lng();
        console.log(brewery_longitude);
        var brewery_phone_num = brewery_google.formatted_phone_number;
        console.log(brewery_phone_num);
        var brewery_google_id = brewery_google.id;
        console.log(brewery_google_id);
        var brewery_international_phone_number = brewery_google.international_phone_number;
        console.log(brewery_international_phone_number);
        var brewery_hours = brewery_google.opening_hours.weekday_text;
        console.log(brewery_hours);
        var brewery_place_id = brewery_google.place_id;
        console.log(brewery_place_id);
        var brewery_rating = brewery_google.rating;
        console.log(brewery_rating);
        var brewery_types = brewery_google.types;
        console.log(brewery_types);
        var brewery_google_plus = brewery_google.url;
        console.log(brewery_google_plus);
        var brewery_website = brewery_google.website;
        console.log(brewery_website);
        var $reviews = '';
        var $rating;
        var $stars;
        var $mostPossible = 0;

        sendBreweryGoogle(brewery_google);
        $('#local-business').hide();
        $('#business-name').html($place.name);
        $('#business-website').html($place.website);
        $('#local-business').show();
    });
}

function sendBreweryGoogle(brewery_google) {
    $.ajax({
        url:'google-brewery-scrape.php',
        method: 'POST',
        dataType: 'JSON',
        data: {
             brewery_name : brewery_google.name,
             brewery_street_number : brewery_google.address_components[0].long_name,
             brewery_street_name : brewery_google.address_components[1].long_name,
             brewery_city : brewery_google.address_components[2].long_name,
             brewery_state : brewery_google.address_components[3].long_name,
             brewery_country : brewery_google.address_components[4].long_name,
             brewery_zip : brewery_google.address_components[5].long_name,
             brewery_latitude : brewery_google.geometry.location.lat(),
             brewery_longitude : brewery_google.geometry.location.lng(),
             brewery_phone_num : brewery_google.formatted_phone_number,
             brewery_google_id : brewery_google.id,
             brewery_international_phone_number : brewery_google.international_phone_number,
             brewery_hours : brewery_google.opening_hours.weekday_text,
             brewery_place_id : brewery_google.place_id,
             brewery_rating : brewery_google.rating,
             brewery_types : brewery_google.types,
             brewery_google_plus : brewery_google.url,
             brewery_website : brewery_google.website
        },
        success: function(response){
            console.log(response);
        }
    });
}

//function createMarker($place) {
//    var $marker = new google.maps.Marker({
////     icon: '../lib/img/global/marker-blue.png',
//        map: $map,
//        position: $place.geometry.location
//    });
//
//    google.maps.event.addListener($marker, 'click', function () {
//
//        var $request = {
//            placeId: $place.place_id
//        };
//
//        $service = new google.maps.places.PlacesService($map);
//
//        $service.getDetails($request, function ($place, $status) {
//
//            console.log($place);
//            var $reviews = '';
//            var $rating;
//            var $stars;
//            var $mostPossible = 0;
//
//            $('#local-business').hide();
//            $('#business-name').html($place.name);
//            $('#business-website').html($place.website);
//            $('#local-business').show();
//        });
//    });
//}
