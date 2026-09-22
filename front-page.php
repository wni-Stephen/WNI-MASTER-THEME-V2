<?php
/**
 * Foundation 6.9 Test Page
 *
 * Temporary front-page template for testing the WebsiteNI starter theme.
 */

get_header();
?>

<main id="content" class="content">

	<div class="grid-container paddingtopmed paddingbottommed">

		<h1>Foundation 6.9 Test Page</h1>

		<p>
			Temporary page for checking the WebsiteNI starter theme after
			upgrading Foundation.
		</p>

		<hr>


		<!-- =========================================================
		     1. GRID / CONTAINER WIDTH
		     ========================================================= -->
	<!-- =========================================================
	     SCROLLSMOOTHER BACKGROUND IMAGE TEST
	     ========================================================= -->

	<section
		style="
			min-height: 100vh;
			background-image: url('https://picsum.photos/1600/1000?random=101');
			background-size: cover;
			background-position: center;
			display: flex;
			align-items: center;
		"
	>
		<div class="grid-container">
			<div class="grid-x grid-padding-x">
				<div class="cell small-12">
					<div
						style="
							background: rgba(0, 0, 0, 0.55);
							color: #fff;
							padding: 40px;
							max-width: 600px;
						"
					>
						<h2 style="color:#fff;">
							Scroll Test One
						</h2>

						<p>
							Scroll through these large image sections to test
							GSAP ScrollSmoother.
						</p>
					</div>
				</div>
			</div>
		</div>
	</section>


	<section
		style="
			min-height: 100vh;
			background-image: url('https://picsum.photos/1600/1000?random=102');
			background-size: cover;
			background-position: center;
			display: flex;
			align-items: center;
		"
	>
		<div class="grid-container">
			<div class="grid-x grid-padding-x">
				<div class="cell small-12">
					<div
						style="
							background: rgba(0, 0, 0, 0.55);
							color: #fff;
							padding: 40px;
							max-width: 600px;
						"
					>
						<h2 style="color:#fff;">
							Scroll Test Two
						</h2>

						<p>
							This should make any smoothing, lag or snapping
							very obvious.
						</p>
					</div>
				</div>
			</div>
		</div>
	</section>


	<section
		style="
			min-height: 100vh;
			background-image: url('https://picsum.photos/1600/1000?random=103');
			background-size: cover;
			background-position: center;
			display: flex;
			align-items: center;
		"
	>
		<div class="grid-container">
			<div class="grid-x grid-padding-x">
				<div class="cell small-12">
					<div
						style="
							background: rgba(0, 0, 0, 0.55);
							color: #fff;
							padding: 40px;
							max-width: 600px;
						"
					>
						<h2 style="color:#fff;">
							Scroll Test Three
						</h2>

						<p>
							Keep scrolling and see how quickly the content
							catches up after you stop.
						</p>
					</div>
				</div>
			</div>
		</div>
	</section>


	<section
		style="
			min-height: 100vh;
			background-image: url('https://picsum.photos/1600/1000?random=104');
			background-size: cover;
			background-position: center;
			display: flex;
			align-items: center;
		"
	>
		<div class="grid-container">
			<div class="grid-x grid-padding-x">
				<div class="cell small-12">
					<div
						style="
							background: rgba(0, 0, 0, 0.55);
							color: #fff;
							padding: 40px;
							max-width: 600px;
						"
					>
						<h2 style="color:#fff;">
							Scroll Test Four
						</h2>

						<p>
							The large image transitions make ScrollSmoother
							much easier to judge than normal page content.
						</p>
					</div>
				</div>
			</div>
		</div>
	</section>


	<section
		style="
			min-height: 100vh;
			background-image: url('https://picsum.photos/1600/1000?random=105');
			background-size: cover;
			background-position: center;
			display: flex;
			align-items: center;
		"
	>
		<div class="grid-container">
			<div class="grid-x grid-padding-x">
				<div class="cell small-12">
					<div
						style="
							background: rgba(0, 0, 0, 0.55);
							color: #fff;
							padding: 40px;
							max-width: 600px;
						"
					>
						<h2 style="color:#fff;">
							Scroll Test Five
						</h2>

						<p>
							End of ScrollSmoother test.
						</p>
					</div>
				</div>
			</div>
		</div>
	</section>

	</div>

</main>

<?php
get_footer();