/**
 * Created by shawnotomo on 10/31/15.
 */

//THIS WILL PULL THE INPUT AND SEND IT TO BACK END
function brewerySearch(){
    var map = new google.maps.Map(document.getElementById('map-canvas'), {
        zoom: 13,
        center: {lat: -34.397, lng: 150.644}
    });
    var geocoder = new google.maps.Geocoder();
    geocodeAddress(geocoder, map);
};

function geocodeAddress(geocoder, resultsMap) {
    var lat = '';
    var lng = '';

    var address = $('#locationSearch').val();
    var radius = $('#radius').val();

    geocoder.geocode({'address': address}, function (results, status) {
        if (status === google.maps.GeocoderStatus.OK) {
            resultsMap.setCenter(results[0].geometry.location);

            var marker = new google.maps.Marker({
                map: resultsMap,
                position: results[0].geometry.location
            });
            lat = results[0].geometry.location.lat();
            lng = results[0].geometry.location.lng();

            searchDatabase(lat, lng, radius);

        } else {
            alert('Geocode was not successful for the following reason: ' + status);
        }
    });
}







//THIS FUNCTION SEARCHES THE DATABASE FOR BREWERIES BASED ON DISTANCE
 function searchDatabase(lat, lng, radius){
         $.ajax({
             url:'js/brewSearch/breweryQuery.php',
             method: 'POST',
             dataType: 'text',
             data:{
             lat: lat,
             lng: lng,
             radius: radius
         },
         success: function(response){
             console.log('Success, here is the ', response);
         },
         error: function(response){
             console.log('There is an error', response);
         }
     })
 }

