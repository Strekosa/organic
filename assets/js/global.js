;
(function( $ ) {

	function debounce( callback, time ) {
		var timeout;

		return function() {
			var context = this;
			var args = arguments;
			if ( timeout ) {
				clearTimeout( timeout );
			}
			timeout = setTimeout( function() {
				timeout = null;
				callback.apply( context, args );
			}, time );
		}
	}

	function handleFirstTab(e) {
		var key = e.key || e.keyCode;
		if ( key === 'Tab' || key === '9' ) {
			$( 'body' ).removeClass( 'no-outline' );

			window.removeEventListener('keydown', handleFirstTab);
			window.addEventListener('mousedown', handleMouseDownOnce);
		}
	}

	function handleMouseDownOnce() {
		$( 'body' ).addClass( 'no-outline' );

		window.removeEventListener('mousedown', handleMouseDownOnce);
		window.addEventListener('keydown', handleFirstTab);
	}

	window.addEventListener('keydown', handleFirstTab);
	window.addEventListener('mousedown', handleMouseDownOnce);

	// Fit slide video background to video holder
	// function resizeVideo() {
	// 	var $holder = $( '.videoHolder' );
	// 	$holder.each( function() {
	// 		var $that = $( this );
	// 		var ratio = $that.data( 'ratio' ) ? $that.data( 'ratio' ) : '16:9',
	// 			width = parseFloat( ratio.split( ':' )[0] ),
	// 			height = parseFloat( ratio.split( ':' )[1] );
	// 		$that.find( '.video' ).each( function() {
	// 			if ( $that.width() / width > $that.height() / height ) {
	// 				$( this ).css( { 'width': '100%', 'height': 'auto' } );
	// 			} else {
	// 				$( this ).css( { 'width': $that.height() * width / height, 'height': '100%' } );
	// 			}
	// 		} );
	// 	} );
	// }

	function resizeVideo() {
		//var $video = $('.video');
		var $trailer = $('.videoHolder');
		$trailer.find('.video').each(function () {
			if ($trailer.width() / 16 > $trailer.height() / 9) {
				$(this).css({'width': '100%', 'height': 'auto'});
			} else {
				$(this).css({'width': 'auto', 'height': '100%'});
			}
		});
		$trailer.find('.responsive-embed').each(function () {
			if ($trailer.width() / 16 > $trailer.height() / 9) {
				$(this).css({'width': '100%', 'height': 'auto'});
			} else {
				$(this).css({'width': $trailer.height() * 16 / 9, 'height': '100%'});
			}
		});
	}

	// Init Jquery UI select
	function initJUIselect(elem) {
		var $field = $( elem );
		var $gfield = $field.closest( ".gfield" );
		var args = {
			change: function( e, ui ) {
				$( this ).trigger( "change" );
			}
		}
		if ( $gfield.length ) {
			args.appendTo = $gfield;
		}
		$field.selectmenu( args ).on('change',function() {
			$(this).selectmenu('refresh');
		});
	}

	function resizeSelect( elem ) {
		$( "select" ).each( function() {
			if ( typeof $( this ).selectmenu( "instance" ) !== "undefined" ) {
				$( this ).selectmenu( "refresh" );
			}
		} );
	}

	// Scripts which runs after DOM load
	var scrollOut;
	$( document ).ready(function() {

		// Init LazyLoad
		var lazyLoadInstance = new LazyLoad({
			elements_selector: 'img[data-lazy-src],.pre-lazyload',
			data_src: "lazy-src",
			data_srcset: "lazy-srcset",
			data_sizes: "lazy-sizes",
			skip_invisible: false,
			class_loading: "lazyloading",
			class_loaded: "lazyloaded",
		});
		// Add tracking on adding any new nodes to body to update lazyload for the new images (AJAX for example)
		window.addEventListener('LazyLoad::Initialized', function (e) {
			// Get the instance and puts it in the lazyLoadInstance variable
			if (window.MutationObserver) {
				var observer = new MutationObserver(function(mutations) {
					mutations.forEach(function(mutation) {
						mutation.addedNodes.forEach(function(node) {
							if (typeof node.getElementsByTagName !== 'function') {
								return;
							}
							imgs = node.getElementsByTagName('img');
							if ( 0 === imgs.length ) {
								return;
							}
							lazyLoadInstance.update();
						} );
					} );
				} );
				var b      = document.getElementsByTagName("body")[0];
				var config = { childList: true, subtree: true };
				observer.observe(b, config);
			}
		}, false);

		/**
		 * Load images in Elementor Popup on shown
		 */
		$( document ).on( 'elementor/popup/show', function( e, popupId, popupDocument ) {
			lazyLoadInstance.update();
		} );

		// Update LazyLoad images before Slide change
		$( '.slick-slider' ).on( 'beforeChange', function() {
			lazyLoadInstance.update();
		} );

		// Detect element appearance in viewport
		scrollOut = ScrollOut( {
			offset: function() {
				return window.innerHeight - 200;
			},
			once: true,
			onShown: function( element ) {
				if ( $( element ).is( '.ease-order' ) ) {
					$( element ).find( '.ease-order__item' ).each( function( i ) {
						var $this = $( this );
						$( this ).attr( 'data-scroll', '' );
						window.setTimeout( function() {
							$this.attr( 'data-scroll', 'in' );
						}, 300 * i );
					} );
				}
			}
		} );

		// Init parallax
		/*$('.jarallax').jarallax({
			speed: 0.5,
		});

		$('.jarallax-inline').jarallax({
			speed: 0.5,
			keepImg: true,
			onInit : function() { lazyLoadInstance.update(); }
		});*/

		// IE Object-fit cover polyfill
		if ( $( '.of-cover, .stretched-img' ).length ) {
			objectFitImages( '.of-cover, .stretched-img' );
		}

		//Remove placeholder on click
		$( 'input,textarea' ).each( function() {
			$( this ).data( 'holder', $( this ).attr( 'placeholder' ) );

			$( this ).on( 'focusin', function() {
				$( this ).attr( 'placeholder', '' );
			} );

			$( this ).on( 'focusout', function() {
				$( this ).attr( 'placeholder', $( this ).data( 'holder' ) );
			} );
		} );




		// Init Jquery UI select
		$( "select" ).not( "#billing_state, #shipping_state, #billing_country, #shipping_country, [class*='woocommerce'], #product_cat" ).each( function() {
			initJUIselect(this);
		} );



		$(document).on('gform_post_render', function(event, form_id, current_page){
			$('#gform_' + form_id).find('select').each( function() {
				initJUIselect(this)
			} );
		});

        //ToTop button
		var btn = $('#toTop');
		jQuery(window).scroll(function() {
			if ($(window).scrollTop() > 300) {
				btn.addClass('show');
			} else {
				btn.removeClass('show');
			}
		});

		btn.on('click', function(e) {
			e.preventDefault();
			$('html, body').animate({scrollTop:0}, '600');
		});



		$('.top-slider').slick({
			infinite: true,
			slidesToShow: 1,
			slidesToScroll: 1,
			dots: false,

		});

		$('.brand-slider').slick({
			infinite: true,
			slidesToShow: 4,
			slidesToScroll: 1,
			arrows: false,
			dots: false,
			responsive: [
				{
					breakpoint: 1024,
					settings: {
						slidesToShow: 3,
						slidesToScroll: 1,

					}
				},
				{
					breakpoint: 800,
					settings: {
						slidesToShow: 2,
						slidesToScroll: 1,
					}
				},
				{
					breakpoint: 550,
					settings: {
						slidesToShow: 1,
						slidesToScroll: 1,
					}
				},
			]
		});





		$('.accordion-list > li > .answer').hide();

		$('.accordion-list > li').click(function() {
			if ($(this).hasClass("active")) {
				$(this).removeClass("active").find(".answer").slideUp();
			} else {
				$(".accordion-list > li.active .answer").slideUp();
				$(".accordion-list > li.active").removeClass("active");
				$(this).addClass("active").find(".answer").slideDown();
			}
			return false;
		});



		let accordionButtons = document.getElementsByClassName('accordion-item__button');


		for (let i = 0; i < accordionButtons.length; i++) {
			accordionButtons[i].addEventListener('click', function() {
				this.classList.toggle('active');
				let accordionContent = this.nextElementSibling;

				if (accordionContent.style.maxHeight) {
					accordionContent.style.maxHeight = null;
				}
				else {
					accordionContent.style.maxHeight = accordionContent.scrollHeight + "px";
				}
			});
		}

		//Make elements equal height
		$( '.matchHeight' ).matchHeight();

		//Counter
		var scrollCounter = true;
		function beginCount() {

			if ($('.score').length) {
				var elementTop = $(".score").offset().top;
				var elementBottom = elementTop + $(".score").outerHeight();

				var viewportTop = $(window).scrollTop();
				var viewportBottom = viewportTop + $(window).height();

				var isOnViewPort = elementBottom > viewportTop && elementTop < viewportBottom;

				if (scrollCounter === true && isOnViewPort) {
					$('.count__value span:first-of-type').each(function () {
						$(this).prop('Counter',0).animate({
							Counter: $(this).text()
						}, {
							duration: 500,
							easing: 'swing',
							step: function (now) {
								$(this).text(Math.ceil(now));
							}
						});
					});
					scrollCounter = false;
				}
			}
		}


		// Add fancybox to images
		$( '.gallery-item' ).find('a[href$="jpg"], a[href$="png"], a[href$="gif"]').attr( 'rel', 'gallery' ).attr( 'data-fancybox', 'gallery' );
		$( 'a[rel*="album"], .fancybox, a[href$="jpg"], a[href$="png"], a[href$="gif"]' ).fancybox( {
			minHeight: 0,
			helpers: {
				overlay: {
					locked: false
				}
			}
		} );

		/**
		 * Scroll to Gravity Form confirmation message after form submit
		 */
		$( document ).on( 'gform_confirmation_loaded', function( event, formId ) {
			var $target = $( '#gform_confirmation_wrapper_' + formId );
			if ( $target.length ) {
				$( 'html, body' ).animate( {
					scrollTop: $target.offset().top - 50,
				}, 500 );
				return false;
			}
		} );

		/**
		 * Hide gravity forms required field message on data input
		 */
		$( 'body' ).on( 'change keyup', '.gfield input, .gfield textarea, .gfield select', function() {
			var $field = $( this ).closest( '.gfield' );
			if ( $field.hasClass( 'gfield_error' ) && $( this ).val().length ) {
				$field.find( '.validation_message' ).hide();
			} else if ( $field.hasClass( 'gfield_error' ) && !$( this ).val().length ) {
				$field.find( '.validation_message' ).show();
			}
		} );

		/**
		 * Add `is-active` class to menu-icon button on Responsive menu toggle
		 * And remove it on breakpoint change
		 */
		$( window ).on( 'toggled.zf.responsiveToggle', function() {
			$( '.menu-icon' ).toggleClass( 'is-active' );
		} ).on( 'changed.zf.mediaquery', function( e, value ) {
			$( '.menu-icon' ).removeClass( 'is-active' );
		} );

		$(window).on('scroll', function(e) {
			beginCount();
		});

		/**
		 * Close responsive menu on orientation change
		 */
		$( window ).on( 'orientationchange', function() {
			setTimeout( function() {
				if ( $( '.menu-icon' ).hasClass( 'is-active' ) && window.innerWidth < 641 ) {
					$( '[data-responsive-toggle="main-menu"]' ).foundation( 'toggleMenu' )
				}
			}, 200 );
		} );

		resizeVideo();

		/*
		*  This function will render each map when the document is ready (page has loaded)
		*/

		$('.acf-map').each(function(){
			render_map( $(this) );
		});

	} );


	// Scripts which runs after all elements load

	$( window ).on( 'load', function() {

		if ( typeof scrollOut !== 'undefined' ) {
			scrollOut.update();
		}

		//jQuery code goes here
		if ( $( '.preloader' ).length ) {
			$( '.preloader' ).addClass( 'preloader--hidden' );
		}

	} );

	// Scripts which runs at window resize
	var resizeSelectCallback = debounce( resizeSelect, 200 );
	$( window ).on( 'resize', function() {

		//jQuery code goes here

		resizeVideo();
		resizeSelectCallback();
		
	} );

	// Scripts which runs on scrolling

	$( window ).on( 'scroll', function() {

		//jQuery code goes here

	} );

	/*
	 *  This function will render a Google Map onto the selected jQuery element
	 */

	function render_map( $el ) {
		// var
		var $markers = $el.find( '.marker' );
		// var styles = []; // Uncomment for map styling

		// vars
		var args = {
			zoom: 16,
			center: new google.maps.LatLng( 0, 0 ),
			mapTypeId: google.maps.MapTypeId.ROADMAP,
			scrollwheel: false,
			// styles : styles // Uncomment for map styling
		};

		// create map
		var map = new google.maps.Map( $el[0], args );

		// add a markers reference
		map.markers = [];

		// add markers
		$markers.each( function() {
			add_marker( $( this ), map );
		} );

		// center map
		center_map( map );
	}

	/*
	 *  This function will add a marker to the selected Google Map
	 */

	var infowindow;

	function add_marker( $marker, map ) {
		// var
		var latlng = new google.maps.LatLng( $marker.attr( 'data-lat' ), $marker.attr( 'data-lng' ) );

		// create marker
		var marker = new google.maps.Marker( {
			position: latlng,
			map: map,
			//icon: $marker.data('marker-icon') //uncomment if you use custom marker
		} );

		// add to array
		map.markers.push( marker );

		// if marker contains HTML, add it to an infoWindow
		if ( $.trim( $marker.html() ) ) {
			// create info window
			infowindow = new google.maps.InfoWindow();

			// show info window when marker is clicked
			google.maps.event.addListener( marker, 'click', function() {
				// Close previously opened infowindow, fill with new content and open it
				infowindow.close();
				infowindow.setContent( $marker.html() );
				infowindow.open( map, marker );
			} );
		}
	}

	/*
	*  This function will center the map, showing all markers attached to this map
	*/

	function center_map( map ) {
		// vars
		var bounds = new google.maps.LatLngBounds();

		// loop through all markers and create bounds
		$.each( map.markers, function( i, marker ) {
			var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );
			bounds.extend( latlng );
		} );

		// only 1 marker?
		if ( map.markers.length == 1 ) {
			// set center of map
			map.setCenter( bounds.getCenter() );
		} else {
			// fit to bounds
			map.fitBounds( bounds );
		}
	}

}( jQuery ));
