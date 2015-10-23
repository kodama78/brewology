var breweryArray = null;
var breweryID = null;
var breweryNameAlert=null;

function rateBeerFinder(){
    $.ajax({
        url:'rateBeer-list-pull.php',
        method: 'GET',
        dataType: 'JSON',
        cache: false,
        crossDomain: true,
        success: function(response){
            breweryArray = response;
            initNextMap(breweryArray);

        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('An error occurred on line 16...' + jqXHR + ' and the error is '+ errorThrown);

            $('#result').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
            console.log('jqXHR:');
            console.log(jqXHR);
            console.log('textStatus:');
            console.log(textStatus);
            console.log('errorThrown:');
            console.log(errorThrown);
        }
    });
}

function initNextMap(breweryArray) {
    if (breweryArray.length !== 1) {
        console.log('all done!');
        return;
    }
    var brewery = breweryArray.pop();

    var breweryName = brewery.name;
    breweryNameAlert = brewery.name;

    var breweryCity  = brewery.city;

    var breweryState = brewery.state;

    breweryID = brewery.id;

    initMap(breweryName, breweryCity, breweryState);


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

    $service.getDetails($request, function ($place, $status, $id) {
        if($place == undefined || $place == null){
            //deleteRateBeerBrewery();
            return;
            alert('ATTENTION NEEDED!')

        }
        else {


            brewery_google = $place;
            console.log('This is the brewery object from google ', brewery_google);

            //var brewery_street_number = brewery_google.address_components[0].long_name;
            //console.log(brewery_street_number);
            //var brewery_street_name = brewery_google.address_components[1].long_name;
            //console.log(brewery_street_name);
            //var brewery_city = brewery_google.address_components[2].long_name;
            //console.log(brewery_city);
            //var brewery_state = brewery_google.address_components[3].long_name;
            //console.log(brewery_state);
            //var brewery_country = brewery_google.address_components[4].long_name;
            //console.log(brewery_country);
            //var brewery_zip = '';
            //if(brewery_google.address_components[5] != undefined){
            //    brewery_zip = brewery_google.address_components[5].long_name
            //}
            //var brewery_zip = brewery_google.address_components[5].long_name;
            //console.log('the brewery zip is ', brewery_zip);
            //var brewery_latitude = $place.geometry.location.lat();
            //console.log(brewery_latitude);
            //var brewery_longitude = $place.geometry.location.lng();
            //console.log(brewery_longitude);
            //var brewery_phone_num = brewery_google.formatted_phone_number;
            //console.log(brewery_phone_num);
            //var brewery_google_id = brewery_google.id;
            //console.log(brewery_google_id);
            //var brewery_international_phone_number = brewery_google.international_phone_number;
            //console.log(brewery_international_phone_number);
            //var brewery_hours = brewery_google.opening_hours.weekday_text;
            //console.log(brewery_hours);
            //var brewery_place_id = brewery_google.place_id;
            //console.log(brewery_place_id);
            //var brewery_rating = brewery_google.rating;
            //console.log(brewery_rating);
            //var brewery_types = brewery_google.types;
            //console.log(brewery_types);
            //var brewery_google_plus = brewery_google.url;
            //console.log(brewery_google_plus);
            //var brewery_website = brewery_google.website;
            //console.log(brewery_website);
            var $reviews = '';
            var $rating;
            var $stars;
            var $mostPossible = 0;

            $.when(sendBreweryGoogle(brewery_google)).then($.when(updateRateBeerList()).then(
                setInterval(function () {
                    rateBeerFinder();
                }, 6000)
            ));



            $('#local-business').hide();
            $('#business-name').html($place.name);
            $('#business-website').html($place.website);
            $('#local-business').show();
        }
    });
}
function deleteRateBeerBrewery(){
    $.ajax({
       url: 'rateBeer-delete.php',
        method: 'POST',
        dataType: 'TEXT',
        data:{
          id: breweryID
        },
        success: function(response){
            console.log('Delete brewery response is ', response);
            setInterval(function(){
                rateBeerFinder();
            }, 2000);
        },
        error: function(response){
            return;
        }
    });
}
function sendBreweryGoogle(brewery_google) {

    var brewery_name = ''
    if(brewery_name != undefined){
        brewery_name = brewery_google.name;
    }

    var brewery_street_number = '';
    if(brewery_google.address_components[0] != undefined){
        brewery_street_number = brewery_google.address_components[0].long_name;
    }

    var brewery_street_name = '';
    if(brewery_google.address_components[1] != undefined){
        brewery_street_name= brewery_google.address_components[1].long_name;
    }

    var brewery_city = '';
    if(brewery_google.address_components[2] != undefined){
        brewery_city = brewery_google.address_components[2].long_name;
    }

    var brewery_state = '';
    if(brewery_google.address_components[3] != undefined){
        brewery_state = brewery_google.address_components[3].long_name;
    }

    var brewery_country = '';
    if(brewery_google.address_components[4] != undefined){
        brewery_country = brewery_google.address_components[4].long_name;
    }

    var brewery_zip = '';
    if(brewery_google.address_components[5] != undefined){
        brewery_zip = brewery_google.address_components[5].long_name;
    }

    var brewery_latitude = '';
    if(brewery_google.geometry.location.lat() != undefined){
        brewery_latitude = brewery_google.geometry.location.lat();
    }

    var brewery_longitude = '';
    if(brewery_google.geometry.location.lat() != undefined){
        brewery_longitude = brewery_google.geometry.location.lng();
    }

    var brewery_phone_num = '';
    if(brewery_google.formatted_phone_number != undefined){
        brewery_phone_num = brewery_google.formatted_phone_number;
    }

    var brewery_international_phone_number = '';
    if(brewery_google.international_phone_number != undefined){
        brewery_international_phone_number = brewery_google.international_phone_number;
    }

    var brewery_hours = '';
    if(brewery_google.opening_hours != undefined){
        brewery_hours = brewery_google.opening_hours.weekday_text;
    }

    var brewery_place_id = '';
    if(brewery_google.place_id != undefined){
        brewery_place_id = brewery_google.place_id;
    }

    var brewery_rating = '';
    if(brewery_google.rating != undefined){
        brewery_rating = brewery_google.rating;
    }

    var brewery_types = '';
    if(brewery_google.types != undefined){
        brewery_types = brewery_google.types;
    }

    var brewery_google_plus = '';
    if(brewery_google.url != undefined){
        brewery_google_plus = brewery_google.url;
    }

    var brewery_website = '';
    if(brewery_google.website != undefined){
        brewery_website = brewery_google.website;
    }

    $.ajax({
        url:'google-brew-test.php',
        method: 'POST',
        dataType: 'JSON',
        data: {
             brewery_name : brewery_name,
             brewery_street_number : brewery_street_number,
             brewery_street_name : brewery_street_name,
             brewery_city : brewery_city,
             brewery_state : brewery_state,
             brewery_country : brewery_country,
             brewery_zip : brewery_zip,
             brewery_latitude : brewery_latitude,
             brewery_longitude : brewery_longitude,
             brewery_phone_num : brewery_phone_num,
             brewery_google_id : brewery_google.id,
             brewery_international_phone_number : brewery_international_phone_number,
             brewery_hours : brewery_hours,
             brewery_place_id : brewery_place_id,
             brewery_rating : brewery_rating,
             brewery_types : brewery_types,
             brewery_google_plus : brewery_google_plus,
             brewery_website : brewery_website
        },
        success: function(response){
            console.log(response);
        }
    });
}
function updateRateBeerList(){
    var id = breweryID;

    $.ajax({
       url: 'update-ratebeer-verified.php',
        method: 'POST',
        dataType: 'TEXT',
        data:{
            id: id
        },
        success: function(response){
            console.log('Brewery has been verified! Response is ', response);
            breweryArray = null;
            breweryID = null;
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
