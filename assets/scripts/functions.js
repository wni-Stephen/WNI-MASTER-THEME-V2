/**
* WebsiteNI Joints
* WebsiteNI Starter Theme built on JointsWP; http://jointswp.com/.
* Created by WebsiteNI.
*/
(function($) {
	$(document).ready(function() {
		afterPageLoad();
		//blacklist();
	});

	function afterPageLoad() {

		  // Initialize all your animations
        if (window.initAnimations) {
            initAnimations();
        }

		 // --- GSAP Smooth Scroll ---
        if (typeof gsap !== 'undefined' && typeof ScrollSmoother !== 'undefined') {
            gsap.registerPlugin(ScrollSmoother);

            if (ScrollSmoother.isSupported()) {
                ScrollSmoother.create({
                    wrapper: '.wrapper',         // outer container
                    content: '.wrapper-inner',   // inner content container
                    smooth: 1.2,                 // smoothness factor
                    effects: true                // enable data-speed / data-lag effects
                });
            }
		}
		

		  // First Swiper - banner-swiper
				if ($('.bannerSwiper').length) {
					var swiper1 = new Swiper('.bannerSwiper', {
						slidesPerView: 1,
						spaceBetween: 20,
						loop: true,
						 effect: 'fade', // Add fade effect
							fadeEffect: {
								crossFade: true // Smooth crossfade
							},
						pagination: {
							el: '.bannerSwiper .swiper-pagination',
							clickable: true,
						},
						navigation: {
							nextEl: '.bannerSwiper .swiper-button-next',
							prevEl: '.bannerSwiper .swiper-button-prev',
						},
						autoplay:false
					});
    }

					// Second Swiper - mySwiper-2
					// if ($('.mySwiper-2').length) {
					//     var swiper2 = new Swiper('.mySwiper-2', {
					//         slidesPerView: 3,
					//         spaceBetween: 30,
					//         loop: false,
					//         pagination: {
					//             el: '.mySwiper-2 .swiper-pagination',
					//             clickable: true,
					//         },
					//         navigation: {
					//             nextEl: '.mySwiper-2 .swiper-button-next',
					//             prevEl: '.mySwiper-2 .swiper-button-prev',
					//         },
					//         breakpoints: {
					//             640: {
					//                 slidesPerView: 2,
					//                 spaceBetween: 20,
					//             },
					//             1024: {
					//                 slidesPerView: 3,
					//                 spaceBetween: 30,
					//             },
					//         },
					//     });
					// }


		/* Make WordPress, Foundation and AJAX (Page Transition) play nice together. */
		var body = $('body'), _window = $(window);

		$('.accordion').foundation();

		$('.accordion p:empty, .orbit p:empty').remove();

		$('iframe[src*="youtube.com"], iframe[src*="vimeo.com"]').each(function() {
			if ($(this).innerWidth() / $(this).innerHeight() > 1.5) {
				$(this).wrap("<div class='widescreen responsive-embed'/>");
			} else {
				$(this).wrap("<div class='responsive-embed'/>");
			}
		});

		/* Hamburger. */
		// $('.hamburger').on('click', function() {
		// 	$(this).toggleClass('is-active');
		// 	$('.navigation-overlay').toggleClass('is-active');
		// 	$('.wrapper').toggleClass('hamburger-is-active');
		// });
		$('.navigation-overlay .primary-menu').prepend('<a class="close" href="#"><img src="/site/wp-content/themes/websiteni-joints/assets/images/header/close.svg" alt="Close menu"/></a>');

		$('.navigation-overlay .close').click(function() {
			$('.navigation-overlay').removeClass('is-active');
			$('.wrapper').removeClass('hamburger-is-active');
			$('.hamburger').removeClass('is-active');
		});

		$('.hamburger').on('click', function() {
			$(this).toggleClass('is-active');
			$('.navigation-overlay').toggleClass('is-active');
			$('.wrapper').toggleClass('hamburger-is-active');
		});

		$('li.menu-item-has-children a').on('click', function() {
			$(this).toggleClass('is-active');
			$(this).next('.sub-menu').toggleClass('sub-menu-is-active');
		});

		/* Cookie Policy. */
		if (localStorage.getItem('popState') != 'shown') {
			$('.cookie-policy').delay(2500).fadeIn();
			localStorage.setItem('popState', 'shown');
		}

		$('.cookie-policy, .cookie-policy-close').click(function(event) {
			$('.cookie-policy').fadeOut();
		});

		/* Search (including Voice Search). */
		$('.search-open').on('click', function() {
			$('.wrapper').addClass('search-is-active');

			setTimeout(function() {
    			$('.search-input').focus();
    		}, 500);
		});

		$('.search-close').on('click', function() {
			$('.wrapper').removeClass('search-is-active');
		});


		$('.mfp_gallery_image').magnificPopup({
			type: 'image',
			image: {
				titleSrc: 'name' 
			},
			gallery: {
				enabled:true
			}
		});

		$(function(){
		    activate('img[src*=".svg"]');

		    function activate(string){		    	
		        jQuery(string).each(function(){
		            var $img = jQuery(this);
		            var imgID = $img.attr('id');
		            var imgClass = $img.attr('class');
		            var imgURL = $img.attr('src');
				
				if ($(this).hasClass("editsvg")) {

		            jQuery.get(imgURL, function(data) {
		                // Get the SVG tag, ignore the rest
		                var $svg = jQuery(data).find('svg');

		                // Add replaced image's ID to the new SVG
		                if(typeof imgID !== 'undefined') {
		                    $svg = $svg.attr('id', imgID);
		                }
		                // Add replaced image's classes to the new SVG
		                if(typeof imgClass !== 'undefined') {
		                    $svg = $svg.attr('class', imgClass+' replaced-svg');
		                }

		                // Remove any invalid XML tags as per http://validator.w3.org
		                $svg = $svg.removeAttr('xmlns:a');

		                // Replace image with new SVG
		                $img.replaceWith($svg);

		            }, 'xml');
		        }
		        });
		    }
		});

		/* Magnific Popup. */
		$('.mfp-instance').magnificPopup({
			preloader: false,
			mainClass: 'mfp-fade',
			type: 'inline',
			removalDelay: 250,
			fixedContentPos: true
		});

		// /* Wow. */
		// var wow = new WOW({mobile: false});

		// wow.init();
	}

	
}) (jQuery);