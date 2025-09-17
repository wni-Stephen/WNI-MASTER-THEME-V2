<footer class="footer bg-primary">

    <!-- Main Footer Content -->
    <div class="grid-container">
        <div class="grid-x grid-padding-x ptoplrg">

            <!-- Company Logo -->
            <div class="cell small-6 large-3 wni-flex wni-flex-justify-start wni-flex-align-center">
                <a class="company-logo" href="<?php echo esc_url(home_url('/')); ?>"
                   title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/header/companylogo.svg"
                         alt="<?php bloginfo('name'); ?>" />
                </a>
            </div>

        </div>

        <!-- Contact Details -->
        <div class="grid-x grid-padding-x pbottommed">
            <div class="cell small-12 medium-4">
                <div class="footer-contact wni-flex wni-gap-default">
					<?php /* ?>
                    <?php if ( get_field('company_address', 'options') ): ?>
                        <p><?php the_field('company_address', 'options'); ?></p>
                    <?php endif; ?>

                    <?php if ( get_field('company_email', 'options') ): ?>
                        <p>Email: <a href="mailto:<?php the_field('company_email', 'options'); ?>"><?php the_field('company_email', 'options'); ?></a></p>
                    <?php endif; ?>

                    <?php if ( get_field('company_phone', 'options') ): ?>
                        <p>Phone: <a href="tel:<?php the_field('company_phone', 'options'); ?>"><?php the_field('company_phone', 'options'); ?></a></p>
                    <?php endif; ?>
										<?php */ ?>

                </div>
            </div>
        </div>
        </div>

        <!-- Sub Footer -->
        <div class=" grid-container full sub-footer bg-secondary ptopxsml pbottomxsml">
			<div class="grid-container">
            <div class="grid-x grid-padding-x align-justify align-middle">

                <!-- Left side -->
                <div class="cell auto text-left">
                    &copy; <?php echo date('Y'); ?> Company Name |
                    <a href="<?php echo site_url('/privacy-policy'); ?>">Privacy Policy</a> |
                    <a href="<?php echo site_url('/terms-and-conditions'); ?>">Terms & Conditions</a>
                </div>

                <!-- Right side -->
                <div class="cell shrink text-left medium-text-right">
                    Created by <a href="https://www.websiteni.com" target="_blank" rel="noopener">WebsiteNI</a>
                </div>
				</div>
            </div>
        </div>

</footer>

<?php get_search_form(); ?>
<?php wp_footer(); ?>
</body>
</html>