<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Blogboost
 */

?>
<?php 
if (class_exists('WooCommerce')  && (is_home() || is_front_page()) && !is_paged()) {
    get_template_part('template-parts/front-page/shop-section');
}
?>

<?php 
$enable_footer_recommended_post_section = blogboost_get_option('enable_footer_recommended_post_section');
if ($enable_footer_recommended_post_section) {
    get_template_part( 'template-parts/footer/footer-recommended-post' );
}

 ?>
<?php get_template_part( 'template-parts/footer/footer-widgets-full' ); ?>

<?php do_action( 'blogboost_shop_section_action' ); ?>

</div>  <!-- main-page-wrapper -->
</div><!--site-content-area-->

<?php
$is_sticky_footer = blogboost_get_option('enable_footer_sticky');
$enable_footer_sticky = blogboost_get_option('enable_footer_sticky');
if($enable_footer_sticky){
    ?>
    <div class="sticky-footer-spacer"></div>
    <?php
}
?>
<footer id="colophon" class="site-footer" <?php echo ($is_sticky_footer) ? 'data-sticky-footer="true"': '';?>>
    <div class="wrapper">
        <?php get_template_part( 'template-parts/footer/footer-widgets' ); ?>
        <?php get_template_part( 'template-parts/footer/footer-info' ); ?>
    </div>

    <?php
    $enable_scroll_to_top = blogboost_get_option('enable_scroll_to_top');
    if($enable_scroll_to_top){
        ?>
        <a id="theme-scroll-to-start" href="javascript:void(0)">
            <span class="screen-reader-text"><?php _e('Scroll to top', 'blogboost'); ?></span>
            <?php blogboost_theme_svg('arrow-up-alt');?>
        </a>
        <?php
    }
    ?>
    <?php
    $enable_cursor_dot_outline = blogboost_get_option('enable_cursor_dot_outline');
    if($enable_cursor_dot_outline){ ?>
        <!-- Custom cursor -->
        <div class="cursor-dot-outline"></div>
        <div class="cursor-dot"></div>
        <!-- .Custom cursor -->
    <?php } ?>
</footer><!-- #colophon -->

<?php do_action( 'blogboost_after_footer' ); ?>



<?php get_template_part('template-parts/header/components/header-offcanvas-widget'); ?>
<?php get_template_part('template-parts/header/components/header-offcanvas'); ?>
<?php get_template_part('template-parts/header/components/header-search'); ?>

</div><!-- #page -->

<?php do_action( 'blogboost_after_site' ); ?>

<?php wp_footer(); ?>

</body>
</html>
