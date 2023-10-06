<?php

$enable_dark_mode = blogboost_get_option('enable_dark_mode');
$enable_dark_mode_switcher = blogboost_get_option('enable_dark_mode_switcher');

?>

<div class="theme-mini-asidebar hide-on-mobile">
    <div class="mini-asidebar-list">

        <?php if (is_active_sidebar('blogboost-offcanvas-widget')): ?>
            <div class="mini-asidebar-items">
                <button id="theme-offcanvas-widget-button" class="theme-button theme-button-transparent theme-button-offcanvas">
                    <span class="screen-reader-text"><?php _e('Offcanvas Widget', 'blogboost'); ?></span>
                    <span class="toggle-icon"><?php blogboost_theme_svg('menu-alt'); ?></span>
                </button>
            </div>
        <?php endif; ?>

        <div class="mini-asidebar-items">
            <button id="theme-toggle-search-button" class="theme-button theme-button-transparent theme-button-search" aria-expanded="false" aria-controls="theme-header-search">
                <span class="screen-reader-text"><?php _e('Search', 'blogboost'); ?></span>
                <?php blogboost_theme_svg('search'); ?>
            </button>
        </div>


        <?php $blog_mini_cart = blogboost_get_option('enable_mini_cart_header');
        if ($blog_mini_cart && class_exists('WooCommerce')) {
            blogboost_woocommerce_cart_count();
        } ?>

        <?php
        $enable_random_post = blogboost_get_option('enable_random_post');
        if ($enable_random_post) {
            $random_post_category = blogboost_get_option('random_post_category');
            $rand_posts_arg = array(
                'posts_per_page' => 1,
                'orderby' => 'rand'
            );
            if ($random_post_category) {
                $rand_posts_arg['cat'] = absint($random_post_category);
            }
            $rand_posts = get_posts($rand_posts_arg);

            if ($rand_posts) {
                ?>
                <div class="mini-asidebar-items">
                    <a href="<?php echo esc_url(get_permalink($rand_posts[0]->ID)); ?>" class="theme-button theme-button-transparent theme-button-shuffle">
                        <span class="screen-reader-text"><?php _e('Shuffle', 'blogboost'); ?></span>
                        <?php blogboost_theme_svg('shuffle'); ?>
                    </a>
                </div>
                <?php
            }
        }
        ?>

        <?php if ($enable_dark_mode && $enable_dark_mode_switcher) : ?>
            <div class="mini-asidebar-items">
                <button class="theme-button theme-button-transparent theme-button-colormode" title="<?php _e('Toggle light/dark mode', 'blogboost'); ?>" aria-label="auto" aria-live="polite">
                    <span class="screen-reader-text"><?php _e('Switch color mode', 'blogboost'); ?></span>
                    <span id="colormode-switch-area">
                        <span class="mode-icon-change"></span>
                        <span id="mode-icon-switch"></span>
                    </span>
                </button>
            </div>
        <?php endif; ?>

        <?php if (has_nav_menu('social-menu')) { ?>
            <div class="mini-asidebar-items">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'social-menu',
                    'container_class' => 'asidebar-social-navigation',
                    'fallback_cb' => false,
                    'depth' => 1,
                    'menu_class' => 'theme-social-navigation theme-menu theme-asidebar-navigation',
                    'link_before' => '<span class="screen-reader-text">',
                    'link_after' => '</span>',
                ));
                ?>
            </div>
        <?php } ?>
    </div>
</div>