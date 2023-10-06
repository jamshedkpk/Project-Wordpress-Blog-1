<?php

$is_sticky = blogboost_get_option('enable_sticky_menu');

$enable_header_date = blogboost_get_option('enable_header_date');
$enable_header_time = blogboost_get_option('enable_header_time');

$enable_dark_mode = blogboost_get_option('enable_dark_mode');
$enable_dark_mode_switcher = blogboost_get_option('enable_dark_mode_switcher');

?>

<div class="site-header-components">
    <div class="site-header-items">



        <div class="header-individual-component branding-components">
            <?php get_template_part('template-parts/header/site-branding'); ?>
            <div class="branding-components-extras hide-on-desktop">
                <?php if ($enable_dark_mode && $enable_dark_mode_switcher) : ?>
                    <button class="theme-button theme-button-transparent theme-button-colormode" title="<?php _e('Toggle light/dark mode', 'blogboost'); ?>" aria-label="auto" aria-live="polite">
                        <span class="screen-reader-text"><?php _e('Switch color mode', 'blogboost'); ?></span>
                        <span id="colormode-switch-area">
                            <span class="mode-icon-change"></span>
                        </span>
                    </button>
                <?php endif; ?>

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

        <div class="hide-on-tablet hide-on-mobile">
            <div class="header-individual-component search-components">
                <?php get_search_form(); ?>
            </div>

            <div class="header-individual-component extras-components">
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
            </div>

            <div class="header-individual-component main-nav-components">
                <nav aria-label="<?php echo esc_attr_x('Mobile', 'menu', 'blogboost'); ?>" role="navigation">
                    <ul id="theme-offcanvas-navigation" class="theme-offcanvas-menu reset-list-style">
                        <?php
                        if (has_nav_menu('primary-menu')) {
                            ?>

                            <?php
                            wp_nav_menu(
                                array(
                                    'container' => '',
                                    'items_wrap' => '%3$s',
                                    'show_toggles' => true,
                                    'theme_location' => 'primary-menu'
                                )
                            );
                            ?>

                            <?php
                        } else {
                            wp_list_pages(
                                array(
                                    'match_menu_classes' => true,
                                    'show_sub_menu_icons' => true,
                                    'title_li' => false,
                                )
                            );
                        } ?>

                    </ul><!-- .theme-offcanvas-navigation -->
                </nav>
            </div>

            <?php if ( has_nav_menu('social-menu') ) { ?>
                <div class="header-individual-component main-search-components">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'social-menu',
                        'container_class' => 'footer-social-navigation',
                        'fallback_cb' => false,
                        'depth' => 1,
                        'menu_class' => 'theme-social-navigation theme-menu',
                        'link_before'     => '<span class="screen-reader-text">',
                        'link_after'      => '</span>',
                    ) );
                    ?>
                </div>
            <?php } ?>


            <?php
            if ( is_active_sidebar( 'blogboost-navigation-widget' ) ) { ?>
                <div class="header-individual-component main-widgets-components">
                    <?php dynamic_sidebar( 'blogboost-navigation-widget' ); ?>
                </div>
            <?php  } ?>

        </div>
    </div>
</div>