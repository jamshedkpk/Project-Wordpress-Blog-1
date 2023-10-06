<?php
/*Header Options*/
$wp_customize->add_section(
    'general_settings' ,
    array(
        'title' => __( 'General Settings', 'blogboost' ),
        'panel' => 'blogboost_option_panel',
    )
);

/*Show Preloader*/
$wp_customize->add_setting(
    'blogboost_options[show_lightbox_image]',
    array(
        'default'           => $default_options['show_lightbox_image'],
        'sanitize_callback' => 'blogboost_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'blogboost_options[show_lightbox_image]',
    array(
        'label'    => __( 'Show LightBox Image', 'blogboost' ),
        'section'  => 'general_settings',
        'type'     => 'checkbox',
    )
);


$wp_customize->add_setting(
    'blogboost_options[enable_cursor_dot_outline]',
    array(
        'default' => $default_options['enable_cursor_dot_outline'],
        'sanitize_callback' => 'blogboost_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'blogboost_options[enable_cursor_dot_outline]',
    array(
        'label' => esc_html__('Enable Cursor Dot Outline', 'blogboost'),
        'section' => 'general_settings',
        'type' => 'checkbox',
    )
);
