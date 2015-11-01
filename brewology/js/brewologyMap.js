/**
 * Created by shawnotomo on 10/27/15.
 */
//THIS CREATES AND INITALIZES THE MAP FROM THE GOOGLE API
function initialize() {
    var center = new google.maps.LatLng(41.508742,20.120850);
    var mapProp = {
        center:center,
        zoom:5,
        mapTypeId:google.maps.MapTypeId.ROADMAP
    };
    var map=new google.maps.Map(document.getElementById("map-canvas"),mapProp);


    //THIS CREATES A MARKER TO PLACE ON THE MAP
    var marker=new google.maps.Marker({
        position:center,

    });

    marker.setMap(map);

    var infowindow = new google.maps.InfoWindow({
       content: "Hello World!"
    });

    google.maps.event.addListener(marker, 'mouseover', function(){
       infowindow.open(map, marker);
    });
}
google.maps.event.addDomListener(window, 'load', initialize);


