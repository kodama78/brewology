var teslaThemes = {

	init: function () {
		this.module();
	},
	
	module: function () {
		this.menuToggle();
		this.priceSlider();
		this.inputHasValue();
		this.numbersOnly();
		this.selectBox();
		this.googleMaps();
		this.owlInit();
		this.marqueeInit();
		this.nrFilters();
		this.propertiesFilters();
		this.gridType();
		this.isotopeInit();
		this.tabsInit();
		this.accordion();
		this.shareBlock();
		this.loginPopup();
		this.userDropdown();
		this.bxSliderInit();
		this.featuredVideo();
		this.lightBox();
		this.addNewLocation();
		this.stickySidebar();
	},

	// Theme Custom Functions
	menuToggle: function () {
		var toggle = jQuery('header .menu-toggle'),
			mainNav = jQuery('header nav');

		toggle.on('click', function () {
			toggle.toggleClass('active');
			mainNav.toggleClass('visible');

			return false;
		});

		jQuery(document).on('click', function () {
			mainNav.removeClass('visible');
			toggle.removeClass('active');
		});

		mainNav.on('click', function (e) {
			e.stopPropagation();
		});

		jQuery('header nav').css({
			'top': (jQuery('header').outerHeight())
		});

		jQuery(window).on('resize', function () {
			jQuery('header nav').css({
				'top': (jQuery('header').outerHeight())
			});
		});
	},

	priceSlider: function () {
		var price_slider = jQuery('.price-box');

		price_slider.each(function () {
			var object = jQuery(this),
				slider = object.find('.price-slider'),
				data_step = Number(slider.attr('data-step')),
				data_min = Number(slider.attr('data-min')),
				data_max = Number(slider.attr('data-max')),
				data_start = Number(slider.attr('data-start')),
				data_stop = Number(slider.attr('data-stop')),
				price_box = object.find('p.caption');

			slider.noUiSlider({
				start: [data_start, data_stop],
				connect: true,
				step: data_step,	
				range: {
					'min': data_min,
					'max': data_max
				},
				format: {
					to: function ( value ) {
						return value + '';
					},
					from: function ( value ) {
						return value.replace('', '');
					}
				}
			});

			/* Set Default Limits */
			price_box.find('.min').text(data_start);
			price_box.find('.max').text(data_stop);

			/* Update Limits */
			slider.on('slide', function (event, value) {
				price_box.find('.min').text(value[0]);
				price_box.find('.max').text(value[1]);

			});
		});
	},

	inputHasValue: function () {
		jQuery('.js-input').on('focusout', function () {
			var text_val = jQuery(this).val();
			if (text_val === "") {
				jQuery(this).removeClass('has-value');
			} else {
				jQuery(this).addClass('has-value');
			}
		});
	},

	numbersOnly: function () {
		jQuery(".nr-only").keypress(function (e) {
			if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
				return false;
			}
		});
	},

	selectBox: function () {
		jQuery('.select-box').each(function (index) {
			var selectBox = jQuery(this),
				current = index;

			selectBox.find('input').on('click', function () {
				selectBox.find('ul').slideToggle(150);
				selectBox.toggleClass('open');

				jQuery('.select-box').each(function (index) {
					if (index != current) {
						jQuery(this).find('ul').slideUp(150);
						jQuery(this).removeClass('open');
					}
				});
			});

			selectBox.find('ul li').on('click', function () {
				selectBox.find('input').attr('value', jQuery(this).text());
				selectBox.find('ul').slideToggle(150);
				selectBox.toggleClass('open');
				selectBox.find('input').addClass('has-value');
			});

			jQuery(document).on('click', function () {
				selectBox.removeClass('open');
				selectBox.find('ul').slideUp(150);
			});

			selectBox.on('click', function (e) {
				e.stopPropagation();
			});
		});
	},

	googleMaps: function () {
		if (jQuery('#map-canvas').length) {
			// Get the locations array
			var locations;
			/*jQuery.getJSON('ajax/locations.js', function(data) {
				locations = data.locations;
			});*/

			jQuery.ajax({
				url: 'ajax/locations.js',
				dataType: 'json',
				success: function (result) {
					locations = result.locations;
					jQuery('body').trigger('loadGoogleMap');
				},
				error: function (xhr, status, error) {
					console.log(xhr);
					console.log(status);
					console.log(error);
				}
			});

			// Activate Map Loader
			jQuery('.properties-map .map-loader').addClass('visible');

			// Hide Map Loader
			jQuery(window).on('load', function () {
				setTimeout(function () {
					jQuery('.properties-map .map-loader').removeClass('visible');
				}, 1000);
			});

			var propertyPopup = {
				"container" : jQuery('.property-popup'), 
				"close" : jQuery('.property-popup .close-popup'), 
				"loader": jQuery('.property-popup .popup-loader'),
				"coverLink" : jQuery('.property-popup .popup-cover a'),
				"coverImage" : jQuery('.property-popup .popup-cover img'),
				"title" : jQuery('.property-popup .popup-body h2 a'),
				"link" : jQuery('.property-popup .popup-body .propery-page'),
				"address" : jQuery('.property-popup .popup-body p'),
				"price" : jQuery('.property-popup .popup-body .price'),
			};

			var infobox = new InfoBox({
					content: document.getElementById('property-popup'),
					closeBoxURL: ""
				});

			// Single or Multiple
			jQuery('body').on('loadGoogleMap', function () {
				var single = document.getElementById("map-canvas").hasAttribute('data-property-id');

				if (single) {
					var propertyId = jQuery('#map-canvas').attr('data-property-id');

					// Single Property on Map
					var mapLatLng = new google.maps.LatLng(locations[propertyId].location[0], locations[propertyId].location[1]),
						mapOtions = {
							scrollwheel: false,
							zoom: 14,
							center: mapLatLng,
							styles: [{"featureType":"administrative","elementType":"all","stylers":[{"visibility":"on"},{"saturation":-150},{"lightness":10}]},{"featureType":"road","elementType":"all","stylers":[{"visibility":"on"},{"saturation":-150},{"lightness":10}]},{"featureType":"water","elementType":"all","stylers":[{"visibility":"on"},{"saturation":-40},{"lightness":10}]},{"featureType":"landscape.man_made","elementType":"all","stylers":[{"visibility":"simplified"},{"saturation":-100},{"lightness":10}]},{"featureType":"landscape.natural","elementType":"all","stylers":[{"visibility":"simplified"},{"saturation":-100},{"lightness":20}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"},{"saturation":-150},{"lightness":20}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"},{"saturation":-150},{"lightness":20}]}]
						},

						map = new google.maps.Map(document.getElementById('map-canvas'), mapOtions);
					var pin;

					if (locations[propertyId].type == 1) {
						pin = 'img/pin-house.png';
					} else {
						pin = 'img/pin-apartment.png';
					}

					var marker = new google.maps.Marker({
						position: mapLatLng,
						map: map,
						icon: pin
					});
				} else {
					// Multiple Properties on Map

					// Initializing Google Maps
					var mapLatLng = new google.maps.LatLng(42.5722437,-71.9915749),
						mapOtions = {
							scrollwheel: false,
							zoom: 14,
							center: mapLatLng,
							styles: [{"featureType":"administrative","elementType":"all","stylers":[{"visibility":"on"},{"saturation":-150},{"lightness":10}]},{"featureType":"road","elementType":"all","stylers":[{"visibility":"on"},{"saturation":-150},{"lightness":10}]},{"featureType":"water","elementType":"all","stylers":[{"visibility":"on"},{"saturation":-40},{"lightness":10}]},{"featureType":"landscape.man_made","elementType":"all","stylers":[{"visibility":"simplified"},{"saturation":-100},{"lightness":10}]},{"featureType":"landscape.natural","elementType":"all","stylers":[{"visibility":"simplified"},{"saturation":-100},{"lightness":20}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"},{"saturation":-150},{"lightness":20}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"},{"saturation":-150},{"lightness":20}]}]
						},

					map = new google.maps.Map(document.getElementById('map-canvas'), mapOtions);
			
					// Adding Map Markers
				
					var markers = [];

					jQuery.each(locations, function (i, val) {
						var pos = new google.maps.LatLng(val.location[0], val.location[1]),
							pin;

						if (val.type == 1) {
							pin = 'img/pin-house.png';
						} else {
							pin = 'img/pin-apartment.png';
						}

						markers[i] = new google.maps.Marker({
							position: pos,
							map: map,
							icon: pin,
							customId: i,
							customName: val.name,
							customPrice: val.price,
							customAdress: val.address,
							customCover: val.cuver,
							customUrl: val.url
						});

						// Open Property Popup
						google.maps.event.addListener(markers[i], 'click', function() {
							infobox.open(map, this);

							propertyPopup.container.addClass('active');

							propertyPopup.loader.addClass('visible');
							setTimeout(function () {
								propertyPopup.title.text(val.name);
								propertyPopup.address.text(val.address);
								propertyPopup.price.text(val.price);
								propertyPopup.coverImage.attr('src', val.cover);
								propertyPopup.link.attr('href', val.url);
								propertyPopup.coverLink.attr('href', val.url);
								propertyPopup.title.attr('href', val.url);
							}, 120);
							setTimeout(function () {
								propertyPopup.loader.removeClass('visible');
							}, 700);
						});

						// Close Property Popup
						propertyPopup.close.on('click', function () {
							propertyPopup.container.removeClass('active');
						});

						// Update Map
						jQuery('.update-properties').on('click', function (e) {
							e.preventDefault();
							var mapLoader = jQuery('.properties-map .map-loader');
							
							// Close Popups
							propertyPopup.container.removeClass('active');

							// Show Loader
							mapLoader.addClass('visible');

							// Remove Loader
							setTimeout(function () {
								mapLoader.removeClass('visible');
							}, 1000);
						});
					});
				}
			});
		}
	},

	owlInit: function () {
		// Most Viewed Item Carousel
		jQuery('.most-viewed-carousel').owlCarousel({
			navigation: true,
			pagination: false,
			items: 3,
			touchDrag: false,
			mouseDrag: false,
			responsive: true,
			navigationText: [
				"<i class='fa fa-angle-left'></i>",
				"<i class='fa fa-angle-right'></i>"
			]
		});

		// Agents Carousel
		jQuery('.agents-carousel').owlCarousel({
			navigation: true,
			pagination: false,
			singleItem: true,
			mouseDrag: false,
			touchDrag: false,
			responsive: true,
			navigationText: [
				"<i class='fa fa-angle-left'></i>",
				"<i class='fa fa-angle-right'></i>"
			]
		});
	},

	marqueeInit: function () {
		jQuery('.hot-offer .hot-offer-slider').marquee({
			speed: 7000,
			pauseOnHover: true
		});
	},

	propertiesFilters: function () {
		var propertiesContainer = jQuery('.properties-filters'),
			globalHeader = jQuery('.properties-filters .global-header a'),
			mainBody = jQuery('.properties-filters .main-body'),
			advancedFiltersHeader = jQuery('.advanced-filters .filters-header a'),
			advancedFilters = jQuery('.advanced-filters'),
			advancedFiltersBody = jQuery('.advanced-filters .filters-body');

		globalHeader.on('click', function (e) {
			e.preventDefault();
			mainBody.slideToggle(250);

			propertiesContainer.toggleClass('open');
		});

		advancedFiltersHeader.on('click', function (e) {
			e.preventDefault();
			advancedFiltersBody.slideToggle(200);

			advancedFilters.toggleClass('open');
		});
	},

	nrFilters: function () {
		jQuery('.nr-filter').each(function () {
			var input = jQuery(this).find('input'),
				substract = jQuery(this).find('.substract'),
				add = jQuery(this).find('.add');

			add.on('click', function () {
				input.val(Math.max(1, parseInt(input.val()) + 1));
			});

			substract.on('click', function () {
				input.val(Math.max(1, parseInt(input.val()) - 1));
			});
		});
	},

	gridType: function () {
		var gridTypeContainer = jQuery('.grid-type'),
			optionGrid = jQuery('.grid-type .option-grid'),
			optionList = jQuery('.grid-type .option-list'),
			ajax = jQuery('.ajax-target');

		function showLoader () {
			var loader = jQuery('.properties-loader');

			loader.addClass('visible');

			setTimeout(function () {
				loader.removeClass('visible');
			}, 1000);
		}

		optionList.on('click', function () {
			if (!gridTypeContainer.find('.type-slider').hasClass('option-list')) {
				gridTypeContainer.find('.type-slider').addClass('option-list').removeClass('option-grid');
				showLoader();
				setTimeout(function () {
					ajax.load('ajax/list-properties.html');
				}, 200);
			}
		});

		optionGrid.on('click', function () {
			if (!gridTypeContainer.find('.type-slider').hasClass('option-grid')) {
				gridTypeContainer.find('.type-slider').addClass('option-grid').removeClass('option-list');
				showLoader();
				setTimeout(function () {
					ajax.load('ajax/grid-properties.html');
				}, 200);
			}
		});

		gridTypeContainer.find('.type-slider').on('click', function () {
			var slider = jQuery(this);

			slider.toggleClass('left');

			showLoader();

			if (slider.hasClass('left')) {
				slider.addClass('option-grid').removeClass('option-list');
				setTimeout(function () {
					ajax.load('ajax/grid-properties.html');
				}, 200);
			} else {
				slider.addClass('option-list').removeClass('option-grid');
				setTimeout(function () {
					ajax.load('ajax/list-properties.html');
				}, 200);
			}
		});

		// Filter Properties 
		var updateProperties = jQuery('.properties-filters .action a');

		updateProperties.on('click', function (e) {
			e.preventDefault();

			showLoader();

			jQuery('html, body').animate({
				scrollTop: jQuery('.properties-section').position().top - 120}, 500, 'swing'
			);
		});
	},

	isotopeInit: function () {
		var container = jQuery('.isotope-container');

		container.imagesLoaded(function () {
			container.isotope({
				itemSelector: '.isotope-item'
			});
		});
	},

	tabsInit: function () {
		// Simple Tabs
		jQuery('.tabs').tabs({
			hide: { effect: "blind", duration: 300 },
			show: { effect: "blind", duration: 450 }
		});

		// User account tabs
		jQuery('.user-account-tabs').tabs({
			show: {
				duration: 800
			},
			beforeActivate: function (event, ui) {
				var loader = jQuery(this).find('.main-loader');
					loader.addClass('visible');

				setTimeout(function () {
					loader.removeClass('visible');
				}, 550);
			}
		});
	},

	accordion: function () {
		if (jQuery('.tabs').length) {
			var month = jQuery('.tabs .month');

			month.each(function () {
				var currentMonth = jQuery(this),
					paragraph = currentMonth.find('p'),
					list = currentMonth.find('ul');

				paragraph.on('click', function () {
					currentMonth.toggleClass('open');
					list.slideToggle(150);
					
					setTimeout(function () {
						jQuery('.isotope-container').isotope('reloadItems').isotope();
					}, 150);
				});
			});
		}

		var accordion = jQuery('.accordion-group .accordion');

		accordion.each(function (i, val) {
			var heading = jQuery(val).find('.heading'),
				body = jQuery(val).find('.body'),
				current = i;

			heading.on('click', function () {
				if (heading.hasClass('open')) {
					body.slideUp(200);
				} else {
					body.slideDown(200);
				}
				setTimeout(function () {
					jQuery(heading).toggleClass('open');	
				}, 200);
			});
		});
	},

	shareBlock: function () {
		var shareBlock = jQuery('.share-block ul')
			shareBlockItems = jQuery('.share-block ul li'),
			middle = Math.ceil(shareBlockItems.length / 2);

		jQuery(".share-block ul li:nth-child("+ middle +")").after('<li class="items-holder"><i class="fa fa-share-alt"></i></li>')

		var itemsHolder = jQuery('.share-block ul .items-holder');

		itemsHolder.on('click', function () {
			shareBlock.toggleClass('expanded');
		});
	},

	loginPopup: function () {
		function scrollTop () {
			jQuery('html, body').animate({
	            scrollTop: 0
	        }, 800);
		}

		var loginLink = jQuery('header .right-block p a.login'),
			registerLink = jQuery('header .right-block p a.register'),
			loginPopup = jQuery('.login-form-popup'),
			loginForm = jQuery('#login-popup'),
			insideRegisterLink = jQuery('#login-popup .register-link'), 
			registerBtn = jQuery('#login-popup .register-link .register-btn');

		// Show Login Form
		loginLink.on('click', function (e) {
			e.preventDefault();
			
			jQuery('#login-popup').find('#login-form').show();
			jQuery('#login-popup').find('#register-form').hide();

			insideRegisterLink.show();

			scrollTop();

			if (jQuery(window).scrollTop() > 50) {
				setTimeout(function () {
					loginPopup.addClass('visible');
				}, 800);
			} else {
				loginPopup.addClass('visible');
			}
			return false;
		});

		// Show Register Form
		registerLink.on('click', function (e) {
			e.preventDefault();
			
			jQuery('#login-popup').find('#login-form').hide();
			jQuery('#login-popup').find('#register-form').show();

			insideRegisterLink.hide();

			scrollTop();

			if (jQuery(window).scrollTop() > 50) {
				setTimeout(function () {
					loginPopup.addClass('visible');
				}, 800);
			} else {
				loginPopup.addClass('visible');
			}
			return false;
		});

		// Close Popup
		jQuery(document).on('click', function () {
			loginPopup.removeClass('visible');
		});

		// Stop Propagation
		loginForm.on('click', function (e) {
			e.stopPropagation();
		});

		// Show Register Form 
		registerBtn.on('click', function (e) {
			e.preventDefault();

			jQuery('#login-popup').find('#login-form').hide();
			jQuery('#login-popup').find('#register-form').show();

			insideRegisterLink.hide();
		});
	},

	userDropdown: function () {
		var drowpDown = jQuery('.account-options'),
			toggle = jQuery('.account-options .main-info');

		toggle.on('click', function () {
			drowpDown.find('.list').toggleClass('visible');
			return false;
		});

		jQuery(document).on('click', function () {
			drowpDown.find('.list').removeClass('visible');
		});

		drowpDown.on('click', function (e) {
			e.stopPropagation();
		});

		jQuery('.profile').on('click', function (e) {
			e.preventDefault();

			jQuery('.user-account-tabs').tabs({active: 0});
		});

		jQuery('.submit-new').on('click', function (e) {
			e.preventDefault();

			jQuery('.user-account-tabs').tabs({active: 1});
		});

		jQuery('.properties').on('click', function (e) {
			e.preventDefault();

			jQuery('.user-account-tabs').tabs({active: 2});
		});
	},

	bxSliderInit: function () {
		// Cover Photos Init
		jQuery('.cover-photos .slides').bxSlider({
			pagerCustom: '.thumbnail-carousel .slides'
		});

		// Init Thumbnail Carousel 
		var sw = 65,
			sm = 5,
			ms = Math.floor(jQuery('.thumbnail-carousel .slides').width() / (sw + sm));

		jQuery('.thumbnail-carousel .slides').bxSlider({
			pager: false,
			slideWidth: sw,
			slideMargin: sm,
			maxSlides: ms > 1 ? ms : 1,
			speed: 250,
			easing: 'ease-in-out',
			moveSlides: 1,
			responsive: true,
			infiniteLoop: true,
			pager: false,
			controls: true,
			nextText: '+'
		});

		// Blog post Slide
		jQuery('.blog-post-slider ul').bxSlider({
			speed: 250,
			responsive: true,
			infiniteLoop: true,
			pager: false,
			controls: true,
			prevText: '<i class="fa fa-angle-left"></i>',
			nextText: '<i class="fa fa-angle-right"></i>'
		});
	},

	featuredVideo: function () {
		var featuredVideoWrapper = jQuery('.featured-video'),
			featuredVideo = jQuery('.featured-video .embed-responsive iframe'),
			featuredVideoCover = jQuery('.featured-video .cover'),
			playBtn = jQuery('.featured-video .start-media');

		playBtn.on('click', function () {
			featuredVideo[0].src += "&autoplay=1";
  			jQuery(this).unbind('click');

  			setTimeout(function () {
  				featuredVideoCover.removeClass('visible');
  			}, 500);
		});
	},

	lightBox: function () {
		lightbox.option({
			positionFromTop: 180,
			fadeDuration: 500
		})
	},

	addNewLocation: function () {
		var geocoder;
		var map;
		var address;
		var markersArray = [];

		function initialize() {
			var latlng = new google.maps.LatLng(-34.397, 150.644);
			var mapOptions = {
				zoom: 10,
				center: latlng,
				styles: [{"featureType":"administrative","elementType":"all","stylers":[{"visibility":"on"},{"saturation":-150},{"lightness":10}]},{"featureType":"road","elementType":"all","stylers":[{"visibility":"on"},{"saturation":-150},{"lightness":10}]},{"featureType":"water","elementType":"all","stylers":[{"visibility":"on"},{"saturation":-40},{"lightness":10}]},{"featureType":"landscape.man_made","elementType":"all","stylers":[{"visibility":"simplified"},{"saturation":-100},{"lightness":10}]},{"featureType":"landscape.natural","elementType":"all","stylers":[{"visibility":"simplified"},{"saturation":-100},{"lightness":20}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"},{"saturation":-150},{"lightness":20}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"},{"saturation":-150},{"lightness":20}]}]
			}
			map = new google.maps.Map(document.getElementById('location-map'), mapOptions);
		}

		function updateMap () {
			geocoder = new google.maps.Geocoder();
			geocoder.geocode( { 'address': address}, function(results, status) {

				if (status == google.maps.GeocoderStatus.OK) {
					map.setCenter(results[0].geometry.location);
				}
			});
		}

		function placeMarker (location) {
            // first remove all markers if there are any
            deleteOverlays();

            var marker = new google.maps.Marker({
                position: location, 
                map: map,
                icon: 'img/pin-house.png'
            });

            // add marker in markers array
            markersArray.push(marker);

            //map.setCenter(location);
        }

        // Deletes all markers in the array by removing references to them
        function deleteOverlays() {
            if (markersArray) {
                for (i in markersArray) {
                    markersArray[i].setMap(null);
                }
            markersArray.length = 0;
            }
        }

        if (jQuery('#location-map').length) {
			jQuery('.user-account-tabs').on('tabsactivate', function(event, ui) {
				google.maps.event.trigger(map, 'resize');
			});

			google.maps.event.addDomListener(window, 'load', initialize);

			// updateMap();
			jQuery('.coutry-select ul li').on('click', function () {
				address = jQuery('.coutry-select input').val();
				updateMap();
			});

			jQuery('.city-select ul li').on('click', function () {
				address += ', ' + jQuery('.city-select input').val();
				updateMap();
			});

			// Set marker on click
	        jQuery(window).on('load', function () {
	        	// add a click event handler to the map object
	            google.maps.event.addListener(map, "click", function (event) {
	                // place a marker
	                placeMarker(event.latLng);
	            });
	        });
		}
	},

	stickySidebar: function () {
		jQuery('.sidebar-wrapper').theiaStickySidebar();
	}
};

(function () {
	'use strict';

	jQuery(document).ready(function(){
		teslaThemes.init();

		if (jQuery('#front-page').length) {
			jQuery('body').addClass('load-page');

			setTimeout(function () {
				jQuery('body').addClass('dom-ready');
			}, 2300);
		} else {
			setTimeout(function () {
				jQuery('body').addClass('dom-ready');
			}, 300);
		}
	});
}());