<?php
/**
 * Displays Banner Section
 *
 * @package Blogboost
 */
$is_banner_section = blogboost_get_option('enable_banner_section');
$enable_banner_overlay = blogboost_get_option('enable_banner_overlay');
$banner_section_cat = blogboost_get_option( 'banner_section_cat' );
$banner_section_slider_layout = blogboost_get_option( 'banner_section_slider_layout' );
$number_of_slider_post = blogboost_get_option( 'number_of_slider_post' );
$enable_banner_cat_meta = blogboost_get_option( 'enable_banner_cat_meta' );
$enable_banner_author_meta = blogboost_get_option( 'enable_banner_author_meta' );
$enable_banner_date_meta = blogboost_get_option( 'enable_banner_date_meta' );
$enable_banner_post_description = blogboost_get_option( 'enable_banner_post_description' );
$slider_post_content_alignment = blogboost_get_option( 'slider_post_content_alignment' );
$featured_image = "";
if ($banner_section_slider_layout == 'site-banner-layout-slider') {
    $banner_wrapper_class = 'wrapper';
    $banner_title_class = 'entry-title-large';
    $banner_alignment_class = 'align-self-center';
}else {
    $banner_wrapper_class = 'wrapper-fluid';
    $banner_title_class = 'entry-title-big';
    $banner_alignment_class = 'align-self-bottom';
}
$banner_overlay_class = '';
if ($enable_banner_overlay) {
    $banner_overlay_class = 'data-bg-overlay';
}
?>

<section class="site-section site-banner-section">
    <div class="theme-banner-slider swiper-container <?php echo esc_attr($banner_section_slider_layout); ?>">
        <div class="swiper-wrapper">
        <?php $banner_post_query = new WP_Query(array('post_type' => 'post', 'posts_per_page' => absint($number_of_slider_post), 'post__not_in' => get_option("sticky_posts"), 'category_name' => esc_html($banner_section_cat)));
            if( $banner_post_query->have_posts() ):
                while ($banner_post_query->have_posts()): $banner_post_query->the_post(); 
                    if (has_post_thumbnail()) {
                        $featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');
                        $featured_image = isset($featured_image[0]) ? $featured_image[0] : ''; 
                    }
                    ?>
                    <div class="swiper-slide data-bg data-bg-large <?php echo $banner_overlay_class; ?>" data-background="<?php echo esc_url($featured_image); ?>">
                        <div class="<?php echo $banner_wrapper_class;?> h-100">
                            <div class="column-row h-100">
                                <div class="column column-12 justify-content-center <?php echo $banner_alignment_class;?> <?php echo $slider_post_content_alignment; ?>">
                                    <div class="slider-content">
                                        <?php if ($enable_banner_cat_meta) { ?>
                                            <div class="entry-categories">
                                                <?php the_category(' '); ?>
                                            </div><!-- .entry-categories -->
                                        <?php } ?>

                                        <h2 class="entry-title <?php echo $banner_title_class;?>">
                                            <a href="<?php the_permalink(); ?>" tabindex="0" rel="bookmark" title="<?php the_title_attribute(); ?>">
                                                <?php the_title(); ?>
                                            </a>
                                        </h2>


                                        <?php if ($enable_banner_post_description) { ?>
                                            <div class="hidden-xs-screen">
                                                <?php the_excerpt(); ?>
                                            </div>
                                        <?php } ?>

                                        <div class="entry-footer">
                                            <?php if ($enable_banner_date_meta) { blogboost_posted_on(); } ?>
                                            <?php if ($enable_banner_author_meta) {  blogboost_posted_by();} ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php
                endwhile; 
            wp_reset_postdata();
            endif; ?>
        </div>

        <!-- Control -->

        <div class="theme-swiper-control swiper-control">
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
            <div class="swiper-pagination theme-swiper-pagination"></div>
        </div>

    </div>
</section>