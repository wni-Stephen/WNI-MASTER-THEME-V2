/**
 * WebsiteNI Starter Theme
 * Built on JointsWP.
 * Created by WebsiteNI.
 */

(function($) {

	$(document).ready(function() {
		afterPageLoad();
	});


	function afterPageLoad() {

		/**
		 * Responsive video embeds.
		 */
		$('iframe[src*="youtube.com"], iframe[src*="vimeo.com"]').each(function() {

			if ($(this).parent().hasClass('responsive-embed')) {
				return;
			}

			if ($(this).innerWidth() / $(this).innerHeight() > 1.5) {

				$(this).wrap(
					'<div class="widescreen responsive-embed"></div>'
				);

			} else {

				$(this).wrap(
					'<div class="responsive-embed"></div>'
				);
			}
		});


		/**
		 * Remove empty paragraphs generated inside
		 * Foundation components.
		 */
		$('.accordion p:empty, .orbit p:empty').remove();


		/**
		 * Mobile navigation.
		 */
		$('.hamburger').on('click', function() {

			const $button = $(this);
			const $navigation = $('.navigation-overlay');

			const isOpen = !$button.hasClass(
				'is-active'
			);


			$button.toggleClass(
				'is-active',
				isOpen
			);


			$button.attr(
				'aria-expanded',
				isOpen ? 'true' : 'false'
			);


			$navigation.toggleClass(
				'is-active',
				isOpen
			);


			$navigation.attr(
				'aria-hidden',
				isOpen ? 'false' : 'true'
			);


			$('.wrapper').toggleClass(
				'hamburger-is-active',
				isOpen
			);
		});


		/**
		 * Close mobile navigation.
		 */
		$('.navigation-overlay .close').on(
			'click',
			function(event) {

				event.preventDefault();


				$('.navigation-overlay')
					.removeClass('is-active')
					.attr(
						'aria-hidden',
						'true'
					);


				$('.wrapper').removeClass(
					'hamburger-is-active'
				);


				$('.hamburger')
					.removeClass('is-active')
					.attr(
						'aria-expanded',
						'false'
					);


				/**
				 * Reset open submenus when the
				 * main navigation closes.
				 */
				$('.submenu-toggle').attr(
					'aria-expanded',
					'false'
				);


				$('.navigation-overlay .sub-menu')
					.removeClass(
						'sub-menu-is-active'
					)
					.attr(
						'aria-hidden',
						'true'
					);
			}
		);


		/**
		 * Close mobile navigation with Escape.
		 */
		$(document).on(
			'keydown',
			function(event) {

				if (
					event.key === 'Escape'
					&& $('.navigation-overlay').hasClass(
						'is-active'
					)
				) {

					$('.navigation-overlay .close').trigger(
						'click'
					);


					$('.hamburger').trigger(
						'focus'
					);
				}
			}
		);


		/**
		 * Mobile navigation submenus.
		 *
		 * Parent links remain clickable.
		 * A separate button controls each submenu.
		 */
		const $mobileNavigation = $(
			'.navigation-overlay'
		);


		$mobileNavigation
			.find('li.menu-item-has-children')
			.each(function(index) {

				const $item = $(this);

				const $link = $item
					.children('a')
					.first();

				const $submenu = $item
					.children('.sub-menu')
					.first();


				if (!$submenu.length) {
					return;
				}


				const submenuId = (
					'mobile-submenu-' + index
				);


				$submenu
					.attr(
						'id',
						submenuId
					)
					.attr(
						'aria-hidden',
						'true'
					);


				const linkText = $.trim(
					$link.text()
				);


				const $toggle = $('<button>', {
					type: 'button',
					class: 'submenu-toggle',
					'aria-expanded': 'false',
					'aria-controls': submenuId,
					'aria-label':
						'Toggle submenu for ' + linkText
				});


				$link.after(
					$toggle
				);
			});


		/**
		 * Open / close mobile submenus.
		 */
		$mobileNavigation.on(
			'click',
			'.submenu-toggle',
			function() {

				const $button = $(this);

				const $submenu = $button
					.siblings('.sub-menu')
					.first();

				const isOpen = (
					$button.attr('aria-expanded')
					=== 'true'
				);


				$button.attr(
					'aria-expanded',
					isOpen ? 'false' : 'true'
				);


				$submenu
					.toggleClass(
						'sub-menu-is-active',
						!isOpen
					)
					.attr(
						'aria-hidden',
						isOpen ? 'true' : 'false'
					);
			}
		);


		/**
		 * Search.
		 */
		$('.search-open').on(
			'click',
			function(event) {

				event.preventDefault();


				$('.wrapper').addClass(
					'search-is-active'
				);


				setTimeout(function() {

					$('.search-input').trigger(
						'focus'
					);

				}, 500);
			}
		);


		$('.search-close').on(
			'click',
			function(event) {

				event.preventDefault();


				$('.wrapper').removeClass(
					'search-is-active'
				);
			}
		);


		/**
		 * Magnific Popup image gallery.
		 */
		if ($.fn.magnificPopup) {

			$('.mfp_gallery_image').magnificPopup({
				type: 'image',

				image: {
					titleSrc: 'name'
				},

				gallery: {
					enabled: true
				}
			});


			/**
			 * Magnific Popup inline content.
			 */
			$('.mfp-instance').magnificPopup({
				preloader: false,
				mainClass: 'mfp-fade',
				type: 'inline',
				removalDelay: 250,
				fixedContentPos: true
			});
		}


		/**
		 * Convert editable SVG images into inline SVG.
		 *
		 * Usage:
		 * <img class="editsvg" src="icon.svg" alt="">
		 */
		$('img.editsvg[src$=".svg"]').each(function() {

			var $img = $(this);
			var imgID = $img.attr('id');
			var imgClass = $img.attr('class');
			var imgURL = $img.attr('src');


			$.get(
				imgURL,
				function(data) {

					var $svg = $(data).find(
						'svg'
					);


					if (
						typeof imgID !== 'undefined'
					) {

						$svg.attr(
							'id',
							imgID
						);
					}


					if (
						typeof imgClass !== 'undefined'
					) {

						$svg.attr(
							'class',
							imgClass
							+ ' replaced-svg'
						);
					}


					$svg.removeAttr(
						'xmlns:a'
					);


					$img.replaceWith(
						$svg
					);
				},
				'xml'
			);
		});


		/**
		 * Optional GSAP smooth scrolling.
		 *
		 * Initialise before ScrollTrigger
		 * entrance animations.
		 */
		initSmoothScroll();


		/**
		 * GSAP scroll animations.
		 */
		initAnimations();
	}


	/**
	 * Optional GSAP ScrollSmoother.
	 *
	 * Enable by adding the "smooth-scroll"
	 * class to the body.
	 */
	function initSmoothScroll() {

	if (
		!window.gsap
		|| !window.ScrollTrigger
		|| !window.ScrollSmoother
	) {
		return;
	}

	if (
		window.matchMedia(
			'(prefers-reduced-motion: reduce)'
		).matches
	) {
		return;
	}

	gsap.registerPlugin(
		ScrollTrigger,
		ScrollSmoother
	);

	ScrollSmoother.create({
		wrapper: '#smooth-wrapper',
		content: '#smooth-content',
		smooth: 1.3,
		effects: true,
		normalizeScroll: true
	});
}

	/**
	 * Reusable GSAP scroll animations.
	 *
	 * Usage:
	 *
	 * class="fade-up"
	 * class="fade-in"
	 * class="fade-left"
	 * class="fade-right"
	 * class="scale-in"
	 *
	 * Optional:
	 *
	 * data-animate-delay="0.2"
	 * data-animate-duration="1"
	 * data-animate-start="top 80%"
	 */
	function initAnimations() {

		const gsap = window.gsap;
		const ScrollTrigger = window.ScrollTrigger;


		if (
			!gsap
			|| !ScrollTrigger
		) {
			return;
		}


		/**
		 * Respect reduced-motion preferences.
		 */
		const prefersReducedMotion = window.matchMedia(
			'(prefers-reduced-motion: reduce)'
		).matches;


		if (prefersReducedMotion) {
			return;
		}


		/**
		 * Available animation presets.
		 */
		const animations = {

			'fade-up': {
				opacity: 0,
				y: 40
			},

			'fade-in': {
				opacity: 0
			},

			'fade-left': {
				opacity: 0,
				x: -40
			},

			'fade-right': {
				opacity: 0,
				x: 40
			},

			'scale-in': {
				opacity: 0,
				scale: 0.95
			}
		};


		/**
		 * Build selector from animation classes.
		 */
		const selectors = Object.keys(
			animations
		)
			.map(function(animation) {
				return '.' + animation;
			})
			.join(', ');


		const elements = document.querySelectorAll(
			selectors
		);


		if (!elements.length) {
			return;
		}


		gsap.registerPlugin(
			ScrollTrigger
		);


		elements.forEach(function(element) {

			let animationName = null;


			/**
			 * Find animation class.
			 */
			Object.keys(animations).some(
				function(animation) {

					if (
						element.classList.contains(
							animation
						)
					) {

						animationName = animation;

						return true;
					}

					return false;
				}
			);


			if (!animationName) {
				return;
			}


			const animation = animations[
				animationName
			];


			const duration = parseFloat(
				element.dataset.animateDuration
			);


			const delay = parseFloat(
				element.dataset.animateDelay
			);


			const start = (
				element.dataset.animateStart
				|| 'top 85%'
			);


			gsap.from(
				element,
				{
					...animation,

					duration:
						Number.isFinite(duration)
							? duration
							: 0.8,

					delay:
						Number.isFinite(delay)
							? delay
							: 0,

					ease: 'power2.out',

					scrollTrigger: {
						trigger: element,
						start: start,
						once: true
					}
				}
			);
		});
	}

})(jQuery);