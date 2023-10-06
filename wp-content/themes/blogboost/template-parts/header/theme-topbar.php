<?php
/**
 * Displays the Topbar
 *
 * @package Blogboost
 */

$hide_topbar_on_mobile = blogboost_get_option('hide_topbar_on_mobile');

$enable_topbar_nav = blogboost_get_option('enable_topbar_nav');
$enable_topbar_social_icons = blogboost_get_option('enable_topbar_social_icons');

$enable_dark_mode = blogboost_get_option('enable_dark_mode');
$enable_dark_mode_switcher = blogboost_get_option('enable_dark_mode_switcher');

$enable_search = blogboost_get_option('enable_search_on_header');

?>
<div id="theme-topbar" class="site-topbar theme-site-topbar <?php echo ($hide_topbar_on_mobile) ? 'hide-on-mobile': '';?>">
    <div class="wrapper">
        <div class="site-topbar-wrapper">

            <div class="site-topbar-item site-topbar-left">
                <?php if (is_active_sidebar('blogboost-offcanvas-widget')): ?>

                    <button id="theme-offcanvas-widget-button" class="theme-button theme-button-transparent theme-button-offcanvas">
                        <span class="screen-reader-text"><?php _e('Offcanvas Widget', 'blogboost'); ?></span>
                        <span class="toggle-icon"><?php blogboost_theme_svg('menu-alt'); ?></span>
                    </button>

                <?php endif; ?>

                <?php
                if ($enable_topbar_social_icons) :
                    wp_nav_menu(
                        array(
                            'theme_location' => 'social-menu',
                            'container_class' => 'site-header-component topbar-component-social-navigation hidden-xs-screen',
                            'fallback_cb' => false,
                            'depth' => 1,
                            'menu_class' => 'theme-social-navigation theme-menu theme-topbar-navigation',
                            'link_before' => '<span class="screen-reader-text">',
                            'link_after' => '</span>',
                        )
                    );
                endif;
                ?>
            </div>

            <div class="site-topbar-item site-topbar-center hide-on-tablet hide-on-mobile">
                <?php
                if ($enable_topbar_nav) :
                    wp_nav_menu(
                        array(
                            'theme_location' => 'top-menu',
                            'container_class' => 'site-header-component topbar-component-top-navigation hidden-sm-screen hidden-xs-screen',
                            'fallback_cb' => false,
                            'depth' => 2,
                            'menu_class' => 'theme-top-navigation theme-menu theme-topbar-navigation',
                        )
                    );
                endif;
                ?>
            </div>

            <div class="site-topbar-item site-topbar-right">
                <?php if ($enable_dark_mode && $enable_dark_mode_switcher) : ?>
                    <button class="theme-button theme-button-transparent theme-button-colormode" title="<?php _e('Toggle light/dark mode', 'blogboost'); ?>" aria-label="auto" aria-live="polite">
                        <span class="screen-reader-text"><?php _e('Switch color mode', 'blogboost'); ?></span>
                        <span id="colormode-switch-area">
                            <span id="mode-icon-switch"></span>
                            <span class="mode-icon-change"></span>
                        </span>
                    </button>
                <?php endif; ?>

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
                        <a href="<?php echo esc_url(get_permalink($rand_posts[0]->ID)); ?>"
                           class="theme-button theme-button-transparent theme-button-shuffle">
                            <span class="screen-reader-text"><?php _e('Shuffle', 'blogboost'); ?></span>
                            <?php blogboost_theme_svg('shuffle'); ?>
                        </a>
                        <?php
                    }
                }
                ?>

                <button id="theme-toggle-offcanvas-button" class="hide-on-desktop theme-button theme-button-transparent theme-button-offcanvas" aria-expanded="false" aria-controls="theme-offcanvas-navigation">
                    <span class="screen-reader-text"><?php _e('Menu', 'blogboost'); ?></span>
                    <span class="toggle-icon"><?php blogboost_theme_svg('menu'); ?></span>
                </button>

                <button id="theme-toggle-search-button" class="theme-button theme-button-transparent theme-button-search" aria-expanded="false" aria-controls="theme-header-search">
                    <span class="screen-reader-text"><?php _e('Search', 'blogboost'); ?></span>
                    <?php blogboost_theme_svg('search'); ?>
                </button>
            </div>

        </div>
    </div>
</div>
