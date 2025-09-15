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
		$('.navigation-overlay .primary-menu').prepend('<a class="close" href="#"><img src="/site/wp-content/themes/websiteni-joints/assets/images/header/close.svg"/></a>');

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
		// if (localStorage.getItem('popState') != 'shown') {
		// 	$('.cookie-policy').delay(2500).fadeIn();
		// 	localStorage.setItem('popState', 'shown');
		// }

		// $('.cookie-policy, .cookie-policy-close').click(function(event) {
		// 	$('.cookie-policy').fadeOut();
		// });

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

		// var $searchForm				=	$('.search-form');
		// var $searchInput 			=	$('.search-input');
		// var $searchVoiceTrigger		=	$('.search-voice-trigger');
		// var $searchTerms				=	$('.search-terms');

		// window.SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;

		// if (window.SpeechRecognition) {
		// 	var speechRecognition = new SpeechRecognition();

		// 	speechRecognition.interimResults = true;
		// 	speechRecognition.addEventListener('result', _transcriptHandler);

		// 	speechRecognition.onerror = function(event) {
		// 		console.log(event.error);

		// 		if (event.error == 'no-speech') {
		// 			$searchVoiceTrigger.removeClass('is-active');
		// 			$searchInput.attr('placeholder', 'Search...');
		// 		}
		// 	}
		// } else {
		// 	$searchVoiceTrigger.remove();
		// }

		// $searchVoiceTrigger.on('click touch', listenStart);

		// function listenStart(event) {
		// 	event.preventDefault();

		// 	$searchInput.attr('placeholder', 'Listening...');
		// 	$searchVoiceTrigger.addClass('is-active');

		// 	recognition.start();
		// }

		// function _parseTranscript(event) {
		// 	return Array.from(event.results).map(result => result[0]).map(result => result.transcript).join('')
		// }

		// function _transcriptHandler(event) {
		// 	var speechOutput = _parseTranscript(event);

		// 	$searchInput.val(speechOutput);

		// 	if (event.results[0].isFinal) {
		// 		$searchForm.submit();
		// 	}
		// }

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

		/* Wow. */
		var wow = new WOW({mobile: false});

		wow.init();
	}

	/* AJAX (Page Transition). */
	// function blacklist() {
	// 	$('a').each(function() {
	// 		if (this.href.indexOf('/wp-admin/') !== -1 || this.href.indexOf('/wp-login.php') !== -1) {
	// 			$(this).addClass('blacklist');
	// 		}
	// 	});
	// }

	// $(function() {
	// 	var settings = {
	// 		anchors: 'a',
	// 		blacklist: '.blacklist, a.bx-pager-link, form',
	// 		scroll: false,
	// 		onStart: {
	// 			duration: 0,
	// 			render: function($container) {
	// 				$container.addClass('animation-class');
	// 				$('.hamburger').removeClass('is-active');
	// 				$('.wrapper').removeClass('hamburger-is-active');

	// 				if ('scrollPosition' in history) {
	// 					history.scrollPosition = 'manual';
	// 				}
	// 			}
	// 		},
	// 		onReady: {
	// 			duration: 0,
	// 			render: function($container, $newContent) {
	// 				$container.html($newContent);

	// 				$('html, body').animate({
	// 					scrollTop: 0
	// 				}, 0);

	// 				var $hash = $(window.location.hash);

	// 				if ($hash.length !== 0) {
	// 					var offsetTop = $hash.offset().top;
	// 					$('html, body').animate({
	// 						scrollTop: (offsetTop - 50),
	// 					}, {
	// 						duration: 400
	// 					});
	// 				}
	// 			}
	// 		},
	// 		onAfter: function($container) {
	// 			afterPageLoad();
	// 			blacklist();

	// 			$container.removeClass('animation-class');
	// 		}
	// 	};

	// 	$('#wrapper').smoothState(settings);
	// });
}) (jQuery);