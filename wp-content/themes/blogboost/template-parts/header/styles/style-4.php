<?php

$is_sticky = blogboost_get_option('enable_sticky_menu');

$enable_header_date = blogboost_get_option('enable_header_date');
$enable_header_time = blogboost_get_option('enable_header_time');



?>
<div class="site-branding-center">
    <div class="wrapper">
        <div class="header-component-center">
            <?php if ($enable_header_date) :
                $date_format = blogboost_get_option('todays_date_format', 'l ,  j  F Y');
                ?>
                <div class="site-header-component header-component-date">
                    <div class="header-component-icon">
                        <?php blogboost_theme_svg('calendar'); ?>
                    </div>
                    <div class="theme-display-date">
                        <?php echo date_i18n($date_format, current_time('timestamp')); ?>
                    </div>
                </div>
            <?php endif; ?>
            <?php if ($enable_header_time) : ?>
                <div class="site-header-component header-component-time">
                    <div class="header-component-icon">
                        <?php blogboost_theme_svg('clock'); ?>
                    </div>
                    <div class="theme-display-clock"></div>
                </div>
            <?php endif; ?>
        </div>
        <?php get_template_part('template-parts/header/site-branding'); ?>
    </div>
</div>

<div class="masthead-main-navigation <?php echo ($is_sticky) ? 'has-sticky-header' : ''; ?>">
    <div class="wrapper">
        <div class="site-header-wrapper">
            <div class="site-header-center">
                <div id="site-navigation" class="main-navigation theme-primary-menu">
                    <?php
                    if (has_nav_menu('primary-menu')) {
                        ?>
                        <nav class="primary-menu-wrapper"
                             aria-label="<?php echo esc_attr_x('Primary', 'menu', 'blogboost'); ?>">
                            <ul class="primary-menu reset-list-style">
                                <?php
                                wp_nav_menu(
                                    array(
                                        'container' => '',
                                        'items_wrap' => '%3$s',
                                        'theme_location' => 'primary-menu'
                                    )
                                );
                                ?>
                            </ul>
                        </nav><!-- .primary-menu-wrapper -->
                        <?php
                    } else { ?>
                        <nav class="primary-menu-wrapper"
                             aria-label="<?php echo esc_attr_x('Primary', 'menu', 'blogboost'); ?>">
                            <ul class="primary-menu reset-list-style">
                                <?php
                                wp_list_pages(
                                    array(
                                        'match_menu_classes' => true,
                                        'show_sub_menu_icons' => true,
                                        'title_li' => false,
                                    )
                                );

                                ?>
                            </ul>
                        </nav><!-- .primary-menu-wrapper -->

                    <?php } ?>
                </div><!-- .main-navigation -->
            </div>
        </div>
    </div>

</div>