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
                    <p>Email: <a
                        href="mailto:<?php the_field('company_email', 'options'); ?>"><?php the_field('company_email', 'options'); ?></a>
                    </p>
                    <?php endif; ?>
                    <?php if ( get_field('company_phone', 'options') ): ?>
                    <p>Phone: <a
                        href="tel:<?php the_field('company_phone', 'options'); ?>"><?php the_field('company_phone', 'options'); ?></a>
                    </p>
                    <?php endif; ?>
                    <?php */ ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Sub Footer -->
    <div class="grid-container full sub-footer bg-secondary ptopxsml pbottomxsml">
        <div class="grid-container">
            <div class="grid-x grid-padding-x ">
                <!-- Left: Company + Privacy + Terms -->
                <div class="cell small-12 medium-auto footer-left ">
                    <!-- Mobile: Company Name on top -->
                    <div class="cell small-12 hide-for-large">
                        <p>Company Name mobile</p>
                    </div>
                    <!-- Links row -->
                    <div class="cell small-12  wni-flex">
                        <span class="show-for-large ">&copy; <?php echo date('Y'); ?> Company Name </span>
                        <a class="" href="<?php echo site_url('/privacy-policy'); ?>">Privacy Policy</a>
                        <a class="" href="<?php echo site_url('/terms-and-conditions'); ?>">Terms & Conditions</a>
                        <p class="hide-for-large">Created by <a href="https://www.websiteni.com" target="_blank" rel="noopener">WebsiteNI</a></p>
                    </div>
                </div>
                <!-- Right: Created by (desktop only) -->
                <div class="cell small-12 medium-shrink footer-right text-left medium-text-right show-for-large">
                    Created by <a href="https://www.websiteni.com" target="_blank" rel="noopener">WebsiteNI</a>
                </div>
            </div>
        </div>
    </div>
</footer>
<?php get_search_form(); ?>
</div>
</div>
<?php wp_footer(); ?>
</body>
</html>