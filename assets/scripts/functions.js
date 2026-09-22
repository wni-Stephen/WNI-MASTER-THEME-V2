/**
 * WebsiteNI Starter Theme
 * Built on JointsWP.
 * Created by WebsiteNI.
 */

(function($) {

	$(document).ready(function() {
		initThemeFunctions();
	});


	function initThemeFunctions() {

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

			const isOpen = !$button.hasClass('is-active');

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
		$('.navigation-overlay .close').on('click', function(event) {

			event.preventDefault();

			$('.navigation-overlay')
				.removeClass('is-active')
				.attr('aria-hidden', 'true');

			$('.wrapper').removeClass(
				'hamburger-is-active'
			);

			$('.hamburger')
				.removeClass('is-active')
				.attr('aria-expanded', 'false');
		});


		/**
		 * Close mobile navigation with Escape key.
		 */
		$(document).on('keydown', function(event) {

			if (
				event.key === 'Escape'
				&& $('.navigation-overlay').hasClass('is-active')
			) {

				$('.navigation-overlay .close').trigger(
					'click'
				);

				$('.hamburger').trigger(
					'focus'
				);
			}
		});


		/**
		 * Mobile navigation submenus.
		 */
		$('.navigation-overlay li.menu-item-has-children > a').on(
			'click',
			function(event) {

				event.preventDefault();

				$(this).toggleClass(
					'is-active'
				);

				$(this)
					.next('.sub-menu')
					.toggleClass(
						'sub-menu-is-active'
					);
			}
		);


		/**
		 * Search.
		 */
		$('.search-open').on('click', function(event) {

			event.preventDefault();

			$('.wrapper').addClass(
				'search-is-active'
			);

			setTimeout(function() {

				$('.search-input').trigger(
					'focus'
				);

			}, 500);
		});


		$('.search-close').on('click', function(event) {

			event.preventDefault();

			$('.wrapper').removeClass(
				'search-is-active'
			);
		});


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
							imgClass + ' replaced-svg'
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
	}

})(jQuery);