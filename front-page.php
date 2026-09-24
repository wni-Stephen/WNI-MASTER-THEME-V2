<?php
/**
 * WebsiteNI Starter Theme
 * Front page animation test.
 */

defined('ABSPATH') || exit;

get_header();
?>

<main id="content" class="content">

	<section class="paddingtopxlrg paddingbottomxlrg">
		<div class="grid-container">

			<div class="grid-x grid-padding-x align-center">
				<div class="cell small-12 large-8 text-center">

					<p class="fade-in">
						WebsiteNI Starter Theme V3
					</p>

					<h1 class="fade-up">
						GSAP & ScrollSmoother Test
					</h1>

					<p class="fade-up" data-delay="0.2">
						Scroll down the page to test the reusable animation classes,
						ScrollTrigger behaviour and smooth scrolling.
					</p>

					<a class="button fade-up" href="#animation-tests" data-smooth-scroll data-animate-delay="0.4">
						View Animation Tests
					</a>

				</div>
			</div>

		</div>
	</section>


	<section id="animation-tests" class="paddingtopxlrg paddingbottomxlrg bg-primary">
		<div class="grid-container">

			<div class="grid-x grid-padding-x">
				<div class="cell small-12 medium-6">

					<div class="fade-left">

						<h2>
							Fade Left
						</h2>

						<p>
							This block should animate into view from the left when
							it enters the viewport.
						</p>

					</div>

				</div>

				<div class="cell small-12 medium-6">

					<div class="fade-right">

						<h2>
							Fade Right
						</h2>

						<p>
							This block should animate into view from the right.
						</p>

					</div>

				</div>
			</div>

		</div>
	</section>


	<section class="paddingtopxlrg paddingbottomxlrg">
		<div class="grid-container">

			<div class="grid-x grid-padding-x align-center">
				<div class="cell small-12 large-8 text-center">

					<div class="fade-in">

						<h2>
							Fade In
						</h2>

						<p>
							This section should fade into view without directional
							movement.
						</p>

					</div>

				</div>
			</div>

		</div>
	</section>


	<section class="paddingtopxlrg paddingbottomxlrg bg-secondary">
		<div class="grid-container">

			<div class="grid-x grid-padding-x align-center">
				<div class="cell small-12 medium-8 large-6">

					<div class="scale-in">

						<h2>
							Scale In
						</h2>

						<p>
							This block should scale and fade into position as it
							enters the viewport.
						</p>

					</div>

				</div>
			</div>

		</div>
	</section>


	<section class="paddingtopxlrg paddingbottomxlrg">
		<div class="grid-container">

			<div class="grid-x grid-padding-x animation-stagger" data-animate-stagger="0.2">

				<div class="cell small-12 medium-4">
					<div class="fade-up">
						<h3>Item One</h3>
						<p>This should animate first.</p>
					</div>
				</div>

				<div class="cell small-12 medium-4">
					<div class="fade-up">
						<h3>Item Two</h3>
						<p>This should animate second.</p>
					</div>
				</div>

				<div class="cell small-12 medium-4">
					<div class="fade-up">
						<h3>Item Three</h3>
						<p>This should animate third.</p>
					</div>
				</div>

			</div>

		</div>
	</section>


	<section class="paddingtopxlrg paddingbottomxlrg bg-primary">
		<div class="grid-container">

			<div class="grid-x grid-padding-x align-center">
				<div class="cell small-12 large-8 text-center">

					<div class="fade-up" data-duration="1.5">

						<h2>
							Custom Duration
						</h2>

						<p>
							This animation uses a longer duration so it should be
							noticeably slower than the default animations.
						</p>

					</div>

				</div>
			</div>

		</div>
	</section>


	<section class="paddingtopxlrg paddingbottomxlrg">
		<div class="grid-container">

			<div class="grid-x grid-padding-x align-center">
				<div class="cell small-12 large-8 text-center">

					<div class="fade-up" data-start="top 90%">

						<h2>
							Custom Trigger Start
						</h2>

						<p>
							This block tests the custom ScrollTrigger start value.
						</p>

					</div>

				</div>
			</div>

		</div>
	</section>


	<section class="paddingtopxlrg paddingbottomxlrg bg-secondary">
		<div class="grid-container">

			<div class="grid-x grid-padding-x align-center">
				<div class="cell small-12 large-8 text-center">

					<h2 class="fade-up">
						End of Test Page
					</h2>

					<p class="fade-up" data-delay="0.2">
						Scroll back through the page and confirm animations do not
						replay if they are configured to run once.
					</p>

				</div>
			</div>

		</div>
	</section>

</main>

<?php get_footer(); ?>