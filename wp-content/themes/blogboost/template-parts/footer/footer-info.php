<?php

$enable_copyright = blogboost_get_option('enable_copyright');
$enable_footer_nav = blogboost_get_option('enable_footer_nav');
$enable_footer_social_nav = blogboost_get_option('enable_footer_social_nav');
$enable_footer_credit = blogboost_get_option('enable_footer_credit');

$blog_info = get_bloginfo('name');
$description = get_bloginfo('description');

$enable_footer_site_title = blogboost_get_option('enable_footer_site_title');
$enable_footer_site_tagline = blogboost_get_option('enable_footer_site_tagline');
$enable_footer_logo = blogboost_get_option('enable_footer_logo');

if ($enable_copyright || $enable_footer_credit || $enable_footer_nav || $enable_footer_social_nav || $enable_footer_logo || $enable_footer_site_tagline || $enable_footer_site_title):
    ?>
    <div class="theme-footer-bottom">
        <div class="footer-info-upper">
            <div class="footer-bottom-left">
                <div class="site-branding">
                    <?php if (has_custom_logo() && $enable_footer_logo) : ?>
                        <div class="site-logo">
                            <?php the_custom_logo(); ?>
                        </div>
                    <?php endif; ?>
                    <?php if ($blog_info && $enable_footer_site_title) : ?>

                        <div class="site-title">
                            <a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a>
                        </div>
                    <?php endif; ?>
                    <?php if ($enable_footer_site_tagline) : ?>
                        <div class="site-description">
                            <span><?php echo $description; ?></span>
                        </div>
                    <?php endif; ?>
                </div><!-- .site-branding -->
                <?php blogboost_contact_info(); ?>
            </div>
            <div class="footer-bottom-right">
                <?php if ($enable_footer_nav): ?>
                    <div class="site-footer-menu">
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'footer-menu',
                            'container_class' => 'footer-navigation',
                            'fallback_cb' => false,
                            'depth' => 1,
                            'menu_class' => 'theme-footer-navigation theme-menu theme-footer-menu'
                        ));
                        ?>
                    </div>
                <?php endif; ?>

                <?php if ($enable_footer_social_nav): ?>
                    <div class="site-footer-menu">
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'social-menu',
                            'container_class' => 'footer-social-navigation',
                            'fallback_cb' => false,
                            'depth' => 1,
                            'menu_class' => 'theme-social-navigation theme-menu theme-footer-navigation',
                            'link_before' => '<span class="screen-reader-text">',
                            'link_after' => '</span>',
                        ));
                        ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="footer-info-lower">
            <?php if ($enable_copyright || $enable_footer_credit): ?>

                <div class="theme-author-credit">

                    <?php if ($enable_copyright): ?>
                        <div class="theme-copyright-info">
                            <?php
                            $copyright_text = blogboost_get_option('copyright_text');
                            if ($copyright_text):
                                echo wp_kses_post($copyright_text);
                            endif;
                            $active_theme = wp_get_theme();
                            $active_theme_textdomain = esc_html($active_theme->get('TextDomain'));
                            $copyright_date_format = blogboost_get_option('copyright_date_format', 'Y');
                            if ($copyright_date_format) {
                                echo ' ' . date_i18n($copyright_date_format, current_time('timestamp'));
                            }
                            printf(esc_html__(' %1$s.', 'blogboost'), $active_theme_textdomain);

                            ?>
                        </div><!-- .theme-copyright-info -->
                    <?php endif; ?>

                    <?php if ($enable_footer_credit): ?>
                    <div class="theme-credit-info">
                        <?php printf(esc_html__('Designed & Developed by %1$s', 'blogboost'), '<a href="https://themeinwp.com/" target = "_blank" rel="designer">ThemeinWP Team</a>'); ?>
                    </div>
                    <?php endif; ?><!-- .theme-credit-info -->

                </div><!-- .theme-author-credit-->

            <?php endif; ?>
        </div>
    </div><!-- .theme-footer-bottom-->

<?php
endif;