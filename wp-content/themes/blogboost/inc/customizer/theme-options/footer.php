<?php
$widgets_link = admin_url( 'widgets.php' );

/*Add footer theme option*/
$wp_customize->add_section(
    'footer_options' ,
    array(
        'title' => __( 'Footer Options', 'blogboost' ),
        'panel' => 'blogboost_option_panel',
    )
);

/* Footer Background Color*/
$wp_customize->add_setting(
    'blogboost_options[footer_bg_color]',
    array(
        'default' => $default_options['footer_bg_color'],
        'sanitize_callback' => 'sanitize_hex_color',
    )
);

$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'blogboost_options[footer_bg_color]',
        array(
            'label' => __('Footer Background Color', 'blogboost'),
            'section' => 'footer_options',
            'type' => 'color',
        )
    )
);

/*Enable Sticky Menu*/
$wp_customize->add_setting(
    'blogboost_options[enable_footer_sticky]',
    array(
        'default'           => $default_options['enable_footer_sticky'],
        'sanitize_callback' => 'blogboost_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'blogboost_options[enable_footer_sticky]',
    array(
        'label'    => __( 'Enable Sticky Footer', 'blogboost' ),
        'section'  => 'footer_options',
        'type'     => 'checkbox',
    )
);

$wp_customize->add_setting(
    'blogboost_section_seperator_footer_1',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    new Blogboost_Seperator_Control(
        $wp_customize,
        'blogboost_section_seperator_footer_1',
        array(
            'settings' => 'blogboost_section_seperator_footer_1',
            'section' => 'footer_options',
        )
    )
);

/*Option to choose footer column layout*/
$wp_customize->add_setting(
    'blogboost_options[footer_column_layout]',
    array(
        'default'           => $default_options['footer_column_layout'],
        'sanitize_callback' => 'blogboost_sanitize_radio',
    )
);

$wp_customize->add_control(
    new Blogboost_Radio_Image_Control(
        $wp_customize,
        'blogboost_options[footer_column_layout]',
        array(
            'label'       => __( 'Footer Column Layout', 'blogboost' ),
            'description' => sprintf( __( 'Footer widgetareas used will vary based on the footer column layout chosen. Head over to  <a href="%s" target="_blank">widgets</a> to see which footer widgetareas are used if you change the layout.', 'blogboost' ), $widgets_link ),
            'section'     => 'footer_options',
            'choices' => blogboost_get_footer_layouts()
        )
    )
);

$wp_customize->add_setting(
    'blogboost_section_seperator_footer_2',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    new Blogboost_Seperator_Control(
        $wp_customize,
        'blogboost_section_seperator_footer_2',
        array(
            'settings' => 'blogboost_section_seperator_footer_2',
            'section' => 'footer_options',
        )
    )
);
/**/

/*Enable Sticky Menu*/
$wp_customize->add_setting(
    'blogboost_options[enable_footer_logo]',
    array(
        'default'           => $default_options['enable_footer_logo'],
        'sanitize_callback' => 'blogboost_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'blogboost_options[enable_footer_logo]',
    array(
        'label'    => __( 'Enable Logo on Footer', 'blogboost' ),
        'section'  => 'footer_options',
        'type'     => 'checkbox',
    )
);


$wp_customize->add_setting(
    'blogboost_options[enable_footer_site_title]',
    array(
        'default'           => $default_options['enable_footer_site_title'],
        'sanitize_callback' => 'blogboost_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'blogboost_options[enable_footer_site_title]',
    array(
        'label'    => __( 'Enable Site Title on Footer', 'blogboost' ),
        'section'  => 'footer_options',
        'type'     => 'checkbox',
    )
);

$wp_customize->add_setting(
    'blogboost_options[enable_footer_site_tagline]',
    array(
        'default'           => $default_options['enable_footer_site_tagline'],
        'sanitize_callback' => 'blogboost_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'blogboost_options[enable_footer_site_tagline]',
    array(
        'label'    => __( 'Enable Site Tagline on Footer', 'blogboost' ),
        'section'  => 'footer_options',
        'type'     => 'checkbox',
    )
);

/*Copyright Text.*/
$wp_customize->add_setting(
    'blogboost_options[copyright_text]',
    array(
        'default'           => $default_options['copyright_text'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'blogboost_options[copyright_text]',
    array(
        'label'    => __( 'Copyright Text', 'blogboost' ),
        'section'  => 'footer_options',
        'type'     => 'text',
    )
);

/*Todays Date Format*/
$wp_customize->add_setting(
    'blogboost_options[copyright_date_format]',
    array(
        'default'           => $default_options['copyright_date_format'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'blogboost_options[copyright_date_format]',
    array(
        'label'    => __( 'Todays Date Format', 'blogboost' ),
        'description' => sprintf( wp_kses( __( '<a href="%s" target="_blank">Date and Time Formatting Documentation</a>.', 'blogboost' ), array(  'a' => array( 'href' => array(), 'target' => array() ) ) ), esc_url( 'https://wordpress.org/support/article/formatting-date-and-time' ) ),
        'section'  => 'footer_options',
        'type'     => 'text',
    )
);

/*Enable footer credit*/
$wp_customize->add_setting(
    'blogboost_section_seperator_footer_3',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    new Blogboost_Seperator_Control(
        $wp_customize,
        'blogboost_section_seperator_footer_3',
        array(
            'settings' => 'blogboost_section_seperator_footer_3',
            'section' => 'footer_options',
        )
    )
);
/*Enable Footer Nav*/
$wp_customize->add_setting(
    'blogboost_options[enable_footer_nav]',
    array(
        'default'           => $default_options['enable_footer_nav'],
        'sanitize_callback' => 'blogboost_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'blogboost_options[enable_footer_nav]',
    array(
        'label'    => __( 'Show Footer Nav Menu', 'blogboost' ),
        'description' => sprintf( __( 'You can add/edit footer nav menu from <a href="%s">here</a>.', 'blogboost' ), "javascript:wp.customize.control( 'nav_menu_locations[footer-menu]' ).focus();" ),
        'section'  => 'footer_options',
        'type'     => 'checkbox',
    )
);

/*Enable Footer Social Nav*/
$wp_customize->add_setting(
    'blogboost_options[enable_footer_social_nav]',
    array(
        'default'           => $default_options['enable_footer_social_nav'],
        'sanitize_callback' => 'blogboost_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'blogboost_options[enable_footer_social_nav]',
    array(
        'label'    => __( 'Show Social Nav Menu in Footer', 'blogboost' ),
        'description' => sprintf( __( 'You can add/edit social nav menu from <a href="%s">here</a>.', 'blogboost' ), "javascript:wp.customize.control( 'nav_menu_locations[social-menu]' ).focus();" ),
        'section'  => 'footer_options',
        'type'     => 'checkbox',
    )
);

/*Enable scroll to top*/
$wp_customize->add_setting(
    'blogboost_options[enable_scroll_to_top]',
    array(
        'default'           => $default_options['enable_scroll_to_top'],
        'sanitize_callback' => 'blogboost_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'blogboost_options[enable_scroll_to_top]',
    array(
        'label'    => __( 'Show Scroll to top', 'blogboost' ),
        'section'  => 'footer_options',
        'type'     => 'checkbox',
    )
);

$wp_customize->add_setting(
    'blogboost_section_seperator_footer_4',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    new Blogboost_Seperator_Control(
        $wp_customize,
        'blogboost_section_seperator_footer_4',
        array(
            'settings' => 'blogboost_section_seperator_footer_4',
            'section' => 'footer_options',
        )
    )
);

$wp_customize->add_setting(
    'blogboost_premium_notice',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);
$wp_customize->add_control(
    new Blogboost_Premium_Notice_Control( 
        $wp_customize,
        'blogboost_premium_notice',
        array(
            'label'      => esc_html__( 'Footer Option', 'blogboost' ),
            'settings' => 'blogboost_premium_notice',
            'section'       => 'footer_options',
        )
    )
);