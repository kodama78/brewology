$(function(){
	//$('#search2').fancyInput();
	$('#directions-wrapper').perfectScrollbar();
	$('.floating-container').perfectScrollbar();

	
	$(".block-wrapper").bind("mousewheel",function(ev, delta) {
    	var scrollTop = $(this).scrollTop();
    	$(this).scrollTop(scrollTop-Math.round(delta*30));
	});

	$('#search_directions').bind('submit',function(){
		calc_route();
		return false;
    });
	$('#search').bind('focus',function(){
		$('#directions-panel').fadeOut('slow');
		return false;
    });
    $('#search-btn').bind('click',function(){
		$("#search_directions").submit(); 
		return false;
    });
    //close the directions box
    $('#directions-panel .close').bind('click',function(){
    	$('#directions-panel').fadeOut('slow');
    }); 


    //this toggles the inline content boxes
    $('.floating-box').bind('click',function(){
    	$('.floating-search').fadeOut('slow');
    	$('.floating-wrapper').queue("fx");
    	

		var el = $(this);
    	if($('.floating-wrapper').position().top > 0) {
			$('.floating-wrapper').animate(
				{ top: -600 },
				300,
				function() {
	    			// Animation complete.
	    			$('.floating-wrapper h3').html( el.find('h3').text() );
					$('.floating-wrapper p:eq(0)').html( el.data('title') );
					
					$('.floating-content').html($('#section-' + el.data('section') + ' .section-content').html());
	    		}

			);
		} else {
			$('.floating-wrapper h3').html( el.find('h3').text() );
			$('.floating-wrapper p:eq(0)').html( el.data('title') );

			$('.floating-content').html($('#section-' + el.data('section') + ' .section-content').html());
		}
		
		$('.floating-wrapper').show().animate(
			{ top: 30 },
			600
		);



		return false;
    });     
    //close the wrapper
    $('.floating-wrapper .close').bind('click',function(){
    	if($('.floating-wrapper').is(":visible")) {
			$('.floating-wrapper').animate({ top: -600 }, {duration: 1000 });
			$('.floating-search').fadeIn('slow');
		}
		return false;
    }); 

    //if the map is clicked then make sure the floating-wrapper is hidden
    $('#map_canvas').bind('click',function(){
    	if($('.floating-wrapper').is(":visible")) {
			$('.floating-wrapper').animate({ top: -600 }, {duration: 1000 });
			$('.floating-search').fadeIn('slow');
		}
		return false;
    });
	initialize_map();
});


var map;
var directionDisplay;
var directionsService = new google.maps.DirectionsService();
/**************************
*
*	Google Maps API
*
**************************/
function initialize_map() {
	if($('#map_canvas').length == 0)
		return false;
	
	var lat_lng = $('meta[name="geo.position"]').attr("content").split(";");
	var lat = parseFloat(lat_lng[0].replace(/ /g,''));
	var lng = parseFloat(lat_lng[1].replace(/ /g,''));

	var point = new google.maps.LatLng(lat, lng);
	
	var settings = {
		zoom: 12,
		center: point,
		scrollwheel: true,
		navigationControl: false,
		scaleControl: false,
		streetViewControl: false,
		draggable: true,
		mapTypeControl: false,
		mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU},
		navigationControlOptions: {style: google.maps.NavigationControlStyle.SMALL},
		mapTypeId: google.maps.MapTypeId.ROADMAP
	};
	
	$('#map_canvas').height($(window).height());
	map = new google.maps.Map(document.getElementById("map_canvas"), settings);

	/*setup the autocomplete*/
	var input = document.getElementById('search');
	var autocomplete = new google.maps.places.Autocomplete(input);
	var options = {
	  componentRestrictions: {country: 'gb'}
	};

	autocomplete = new google.maps.places.Autocomplete(input, options);
	google.maps.event.addListener(autocomplete, 'place_changed', function() {
		var place = autocomplete.getPlace();
		calc_route();
	});
	/*setup the autocomplete*/

	directionsDisplay = new google.maps.DirectionsRenderer();
	directionsDisplay.setMap(map);
	directionsDisplay.setPanel(document.getElementById("directions-result"));

	var image = new google.maps.MarkerImage(
		'css/images/icon_marker.png',
		new google.maps.Size(42,62),
		new google.maps.Point(0,0),
		new google.maps.Point(21,62)
	);
		
	var marker = new google.maps.Marker({
		draggable: false,
		raiseOnDrag: false,
		icon: image,
		map: map,
		position: point
	});
		

	var link = "link";
	var infowindow = new google.maps.InfoWindow();
	google.maps.event.addListener( marker, 'click', function() {
		// Setting the content of the InfoWindow
		var content = '<div id="info" class="span6" style="height: 85px;"><strong>We are here</strong><p style="margin:0; padding:0">34 Botley Road,MIDDLETON,<br />EH23 3UZ</a></p>' + '</div>';
		infowindow.setContent(content );
		infowindow.open(map, marker);
	});

	var default_style = [{ hue: "#F9F9F9" },{ saturation: -500 },{ gamma: 0.99 }];
	var coffee_style = [{ hue: "#F4DFB0" },{ saturation: 0 },{ gamma: 0.0 }];
	var barber_style = [{ hue: '#000000' }, { saturation: -100 }, { lightness: -100 }, { visibility: 'on' }];

	var styles =  [{
		stylers: [
		{ hue: "#F9F9F9" },
		{ saturation: -500 },
        { gamma: 0.99 }
		]
		},
		{
			featureType: "road",
			elementType: "geometry",
			stylers: [
				{ lightness: 100 },
				{ visibility: "simplified" }
			]
		},
		{
			featureType: 'water',
			elementType: 'all',
			stylers: [ 
				{ hue: '#B8CCCA' },
				{ saturation: -64 },
				{ gamma: 0.99 },
				{ lightness: 0 },
				{ visibility: 'on' }
			]
		}, {
			featureType: "road",
			elementType: "labels",
			stylers: [
				{ visibility: "off" }
			]
		}
	];
	var style1s = [{
          featureType: "administrative",
          elementType: "all",
          stylers: [ { visibility: "off" } ]
        },
        {
          featureType: "poi",
          elementType: "all",
          stylers: [ { visibility: "on" } ]
        },
        {
          featureType: "road",
          elementType: "all",
                    stylers: [
				{ lightness: 100 },
				{ visibility: "simplified" }
          ]
        },
        {
          featureType: "transit",
          elementType: "all",
          stylers: [ { visibility: "on" } ]
        },
        {
          featureType: "landscape",
          elementType: "all",
          stylers: [
            { hue: "#F9F9F9" },
            { lightness: 100 },
            { gamma: 0.01 }
          ]
        },
        {
          featureType: "water",
          elementType: "all",
          stylers: [
            { visibility: "simplified" }
          ]
        }
            ];
	map.setOptions({styles: styles});
}

function calc_route() {
	var start = $('#search').val();
	var end = $('meta[name="geo.placename"]').attr("content");
	var request = {
	    origin:start,
	    destination:end,
	    travelMode: google.maps.DirectionsTravelMode.DRIVING
	};
	$('#directions-panel').fadeOut('slow');
	directionsService.route(request, function(response, status) {
	  if (status == google.maps.DirectionsStatus.OK) {
	    directionsDisplay.setDirections(response);
	    $('#directions-panel').fadeIn('slow');
	  }
	});
}

$(window).on('resize',function(){
    if($(this).width() > 800){
        $('.block-wrapper').height($(window).height() - $(".page-footer").height() - 20 );
    } else {
    	$('.block-wrapper').height('100%');
    }
});