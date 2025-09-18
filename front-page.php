<?php
    /**
     * WebsiteNI Joints - Front Page Template
     * WebsiteNI Starter Theme built on JointsWP
     * Created by WebsiteNI.
     */
    
    get_header();
    ?> 
<main id="content" class="">
    <?php if (have_posts()) : ?> <?php while (have_posts()) : the_post(); ?> <?php
        // Fetch banner type
        $banner_type = get_field('banner_type');
        
        // ------------------- IMAGE SLIDER -------------------
        if ($banner_type === 'image_slider') :
            $slides = get_field('slider_images');
            if ($slides) : ?> 
    <div class="grid-container full homebanner">
        <div class="swiper bannerSwiper">
            <div class="swiper-wrapper">
                <?php foreach ($slides as $slide) :
                    // Get background image
                    $bg = !empty($slide['image']) ? esc_url($slide['image']) : '';
                    ?> 
                <div class="swiper-slide grid-container full homebanner bgcenter" style="background-image: url('
                    <?php echo $bg; ?>'); background-size: cover; background-position: center;">
                    <div class="grid-container banner-content">
                        <div class="grid-x grid-padding-x fontcolourwhite">
                            <div class="cell large-9 xxlarge-8">
                                <?php if (!empty($slide['hero_headline'])) : ?> 
                                <h1>
                                    <?php echo esc_html($slide['hero_headline']); ?> 
                                </h1>
                                <?php endif; ?>
                                <?php if (!empty($slide['hero_subtext'])) : ?> 
                                <p>
                                    <?php echo esc_html($slide['hero_subtext']); ?> 
                                </p>
                                <?php endif; ?> 
                            </div>
                            <div class="cell large-3 xxlarge-4 wni-flex wni-flex-js wni-flex-ae wni-flex-je-lg">
                                <?php if (!empty($slide['slide_buttons'])) : ?> <?php foreach ($slide['slide_buttons'] as $button) :
                                    $link = $button['button_link'];
                                    if ($link && !empty($link['url'])) : ?> <a href="
                                    <?php echo esc_url($link['url']); ?>"
                                    <?php echo !empty($link['target']) ? 'target="' . esc_attr($link['target']) . '"' : ''; ?>
                                    class="button primary right-lg"> <?php echo esc_html($link['title']); ?> </a> <?php endif;
                                    endforeach; ?> <?php endif; ?> 
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?> 
            </div>
        </div>
    </div>
    <?php endif;
        // ------------------- VIDEO BANNER -------------------
        elseif ($banner_type === 'video_banner') :
            $video_banner = get_field('video_banner'); // group field
            if ($video_banner && !empty($video_banner['video_file'])) : ?> 
    <div
        class="grid-container full videobanner bgcenter">
        <?php if (!wp_is_mobile()) : ?> 
        <video id="video-banner"
            autoplay muted loop playsinline preload="auto">
            <source src="
                <?php echo esc_url($video_banner['video_file']); ?>" type="video/mp4">
        </video>
        <?php endif; ?> 
        <div class="grid-container ">
            <div class="banner-content">
                <div class="grid-x grid-padding-x fontcolourwhite">
                    <div class="cell large-9 xxlarge-8">
                        <?php if (!empty($video_banner['hero_headline'])) : ?> 
                        <h1>
                            <?php echo esc_html($video_banner['hero_headline']); ?> 
                        </h1>
                        <?php endif; ?>
                        <?php if (!empty($video_banner['hero_subtext'])) : ?> 
                        <p>
                            <?php echo esc_html($video_banner['hero_subtext']); ?> 
                        </p>
                        <?php endif; ?> 
                    </div>
                    <div class="cell large-3 xxlarge-4 wni-flex wni-flex-js wni-flex-ae margintopsmlmb wni-flex-je-lg">
                        <?php if (!empty($video_banner['slide_buttons'])) : ?> <?php foreach ($video_banner['slide_buttons'] as $button) :
                            $link = $button['button_link'];
                            if ($link && !empty($link['url'])) : ?> <a href="
                            <?php echo esc_url($link['url']); ?>"
                            <?php echo !empty($link['target']) ? 'target="' . esc_attr($link['target']) . '"' : ''; ?>
                            class="button primary right-lg"> <?php echo esc_html($link['title']); ?> </a> <?php endif;
                            endforeach; ?> <?php endif; ?> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif;
        endif;
        ?> <?php endwhile; ?> <?php endif; ?> 
</main>
<?php get_footer(); ?>