<?php
/**
 * Flexible Content Layout: Content
 */

defined('ABSPATH') || exit;

$heading = get_sub_field('heading');
$content = get_sub_field('content');

if (!$heading && !$content) {
	return;
}
?>

<section class="content-block paddingtopmed paddingbottommed">

	<div class="grid-container">

		<div class="grid-x grid-margin-x">

			<div class="cell small-12 large-8 large-offset-2">

				<?php if ($heading) : ?>

					<h2>
						<?php echo esc_html($heading); ?>
					</h2>

				<?php endif; ?>

				<?php if ($content) : ?>

					<div class="content-block__content">
						<?php echo wp_kses_post($content); ?>
					</div>

				<?php endif; ?>

			</div>

		</div>

	</div>

</section>