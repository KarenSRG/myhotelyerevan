
/* Custom JS
----------------------------------------------------------------*/
jQuery(document).ready(function ($) {
	
	/* Menu dropdown on hover
	----------------------------------------------------------------*/
	$('.nav li.dropdown').hover(function() {
		   $(this).addClass('open');
	   }, function() {
		   $(this).removeClass('open');
	   });
	$('li.dropdown').on('click', function() {
			var $el = $(this);
			if ($el.hasClass('open')) {
				var $a = $el.children('a.dropdown-toggle');
				if ($a.length && $a.attr('href')) {
					location.href = $a.attr('href');
				}
			}
		});
	   
	   
	/* client section
	----------------------------------------------------------------*/
	
	$('.owl-carousel').owlCarousel({
		loop:true,
		margin:10,
		nav:true,
		responsive:{
			0:{
				items:1
			},
			600:{
				items:3
			},
			1000:{
				items:5
			}
		}
	});

	/* video section
	----------------------------------------------------------------*/
    $(".video_lightbox .popup-video").swipebox();
	
	/* Gallery Page
	----------------------------------------------------------------*/
    $(".galleryPage").lightGallery({
		selector: '.gallerythumb'
	});
	
	/* Room Page
	----------------------------------------------------------------*/
    $(".room_section").lightGallery({
		selector: '.roomimage'
	});
	
	if( hotelone_settings.disable_automation_effect_counters != true ){
		/* Counter
		----------------------------------------------------------------*/
	    $('.counter_count').counterUp({
	        delay: 10,
	        time: 1000
	    });
	}

	var adminbarheight = function(){
        var height = 0;
        if ( $( '#wpadminbar' ).length ) {
            if ( $( '#wpadminbar' ).css('position') == 'fixed' ) {
                height = $( '#wpadminbar' ).height();
            }
        }
        return height;
    };
	
	function fullscreenSlider( no_trigger ){
        if ( $( '#hero_carousel').length > 0 ) {
            var window_h = $(window).height();
            var top = adminbarheight();
            var $header = $('.header');
            var is_transparent = $header.hasClass('is-t');
            var header_h;
            if ( is_transparent ) {
                header_h = 0;
            } else {
                //header_h = $header.height();
                var headertop_h = $('.header-top').outerHeight();
                var navbar_h = $('.navbar').outerHeight();
                header_h = headertop_h + navbar_h;
            }
            header_h += top;
            //jQuery('#hero_carousel .slide_image').css({'height':( window_h - header_h + 1) + 'px','width':'100%'});
            if (  typeof  no_trigger === "undefined" || ! no_trigger ) {
                //$document.trigger( 'hero_init' );
            }

        }
    }

    $(window).resize( function (){
        fullscreenSlider();
    });
	
    fullscreenSlider();

    $(document).on( 'header_view_changed', function(){
        fullscreenSlider();
    } );
	
});	

if( hotelone_settings.disable_animations != true ){
			new WOW().init();
		}