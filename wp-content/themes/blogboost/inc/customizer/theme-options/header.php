<?php
$wp_customize->add_setting(
    'blogboost_options[enable_header_bg_overlay]',
    array(
        'default'           => $default_options['enable_header_bg_overlay'],
        'sanitize_callback' => 'blogboost_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'blogboost_options[enable_header_bg_overlay]',
    array(
        'label'    => __( 'Enable Image Overlay', 'blogboost' ),
        'section'  => 'header_image',
        'type'     => 'checkbox',
    )
);

$wp_customize->add_setting(
    'blogboost_options[header_image_size]',
    array(
        'default'           => $default_options['header_image_size'],
        'sanitize_callback' => 'blogboost_sanitize_select',
    )
);
$wp_customize->add_control(
    'blogboost_options[header_image_size]',
    array(
        'label'       => __( 'Select Header Size', 'blogboost' ),
        'description' => __( 'Some options related to header may not show in the front-end based on header style chosen.', 'blogboost' ),

        'section'     => 'header_image',
        'type'        => 'select',
        'choices'     => array(
            'none' => __( 'Default', 'blogboost' ),
            'small' => __( 'Small', 'blogboost' ),
            'medium' => __( 'Medium', 'blogboost' ),
            'large' => __( 'Large', 'blogboost' ),
        ),
    )
);
/*Header Options*/
$wp_customize->add_section(
    'header_options' ,
    array(
        'title' => __( 'Header Options', 'blogboost' ),
        'panel' => 'blogboost_option_panel',
    )
);

$wp_customize->add_setting(
    'blogboost_section_seperator_header_1',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    new Blogboost_Seperator_Control(
        $wp_customize,
        'blogboost_section_seperator_header_1',
        array(
            'settings' => 'blogboost_section_seperator_header_1',
            'section' => 'header_options',
        )
    )
);

/* Header Style */
$wp_customize->add_setting(
    'blogboost_options[header_style]',
    array(
        'default'           => $default_options['header_style'],
        'sanitize_callback' => 'blogboost_sanitize_select',
    )
);
$wp_customize->add_control(
    'blogboost_options[header_style]',
    array(
        'label'       => __( 'Header Style', 'blogboost' ),
        'description' => __( 'Some options related to header may not show in the front-end based on header style chosen.', 'blogboost' ),

        'section'     => 'header_options',
        'type'        => 'select',
        'choices'     => array(
            'header_style_1' => __( 'Header Style 1', 'blogboost' ),
            'header_style_2' => __( 'Header Style 2', 'blogboost' ),
            'header_style_3' => __( 'Header Style 3', 'blogboost' ),
            'header_style_4' => __( 'Header Style 4', 'blogboost' ),
            'header_style_5' => __( 'Header Style 5', 'blogboost' ),
        ),
    )
);

$wp_customize->add_setting(
    'blogboost_options[enable_sticky_widget_area]',
    array(
        'default'           => $default_options['enable_sticky_widget_area'],
        'sanitize_callback' => 'blogboost_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'blogboost_options[enable_sticky_widget_area]',
    array(
        'label'    => __( 'Enable Widgets on Fixed Header Panel', 'blogboost' ),
        'section'  => 'header_options',
        'type'     => 'checkbox',
        'active_callback'  => 'blogboost_is_header_style_1'
    )
);


$wp_customize->add_setting(
    'blogboost_options[enable_fix_navigation_area]',
    array(
        'default'           => $default_options['enable_fix_navigation_area'],
        'sanitize_callback' => 'blogboost_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'blogboost_options[enable_fix_navigation_area]',
    array(
        'label'    => __( 'Enable Sticky Fixed Header Panel', 'blogboost' ),
        'section'  => 'header_options',
        'type'     => 'checkbox',
        'active_callback'  => 'blogboost_is_header_style_1'
    )
);

$wp_customize->add_setting(
    'blogboost_section_seperator_header_2',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    new Blogboost_Seperator_Control(
        $wp_customize,
        'blogboost_section_seperator_header_2',
        array(
            'settings' => 'blogboost_section_seperator_header_2',
            'section' => 'header_options',
        )
    )
);

/*Enable Sticky Menu*/
$wp_customize->add_setting(
    'blogboost_options[enable_sticky_menu]',
    array(
        'default'           => $default_options['enable_sticky_menu'],
        'sanitize_callback' => 'blogboost_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'blogboost_options[enable_sticky_menu]',
    array(
        'label'    => __( 'Enable Sticky Menu', 'blogboost' ),
        'section'  => 'header_options',
        'type'     => 'checkbox',
    )
);


$wp_customize->add_setting(
    'blogboost_section_seperator_header_4',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    new Blogboost_Seperator_Control(
        $wp_customize,
        'blogboost_section_seperator_header_4',
        array(
            'settings' => 'blogboost_section_seperator_header_4',
            'section' => 'header_options',
        )
    )
);



/*Enable Today's Date*/
$wp_customize->add_setting(
    'blogboost_options[enable_header_time]',
    array(
        'default'           => $default_options['enable_header_time'],
        'sanitize_callback' => 'blogboost_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'blogboost_options[enable_header_time]',
    array(
        'label'    => __( 'Enable Current Time', 'blogboost' ),
        'section'  => 'header_options',
        'type'     => 'checkbox',
        'active_callback'  => 'blogboost_is_top_bar_enabled'
    )
);

/*Enable Today's Date*/
$wp_customize->add_setting(
    'blogboost_options[enable_header_date]',
    array(
        'default'           => $default_options['enable_header_date'],
        'sanitize_callback' => 'blogboost_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'blogboost_options[enable_header_date]',
    array(
        'label'    => __( 'Enable Today\'s Date', 'blogboost' ),
        'section'  => 'header_options',
        'type'     => 'checkbox',
        'active_callback'  => 'blogboost_is_top_bar_enabled'
    )
);

/*Todays Date Format*/
$wp_customize->add_setting(
    'blogboost_options[todays_date_format]',
    array(
        'default'           => $default_options['todays_date_format'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'blogboost_options[todays_date_format]',
    array(
        'label'    => __( 'Today\'s Date Format', 'blogboost' ),
        'description' => sprintf( wp_kses( __( '<a href="%s" target="_blank">Date and Time Formatting Documentation</a>.', 'blogboost' ), array(  'a' => array( 'href' => array(), 'target' => array() ) ) ), esc_url( 'https://wordpress.org/support/article/formatting-date-and-time' ) ),
        'section'  => 'header_options',
        'type'     => 'text',
        'active_callback'  =>  function( $control ) {
            return (
                blogboost_is_top_bar_enabled( $control )
                &&
                blogboost_is_todays_date_enabled( $control )
            );
        }
    )
);

if(class_exists( 'WooCommerce' )){
    
    /*Enable Mini Cart Icon on header*/
    $wp_customize->add_setting(
        'blogboost_options[enable_mini_cart_header]',   
        array(
            'default'           => $default_options['enable_mini_cart_header'],
            'sanitize_callback' => 'blogboost_sanitize_checkbox',
        )
    );
    $wp_customize->add_control(
        'blogboost_options[enable_mini_cart_header]',
        array(
            'label'    => __( 'Enable Mini Cart Icon', 'blogboost' ),
            'section'  => 'header_options',
            'type'     => 'checkbox',
        )
    );

    /*Enable Myaccount Link*/
    $wp_customize->add_setting(
        'blogboost_options[enable_woo_my_account]',   
        array(
            'default'           => $default_options['enable_woo_my_account'],
            'sanitize_callback' => 'blogboost_sanitize_checkbox',
        )
    );
    $wp_customize->add_control(
        'blogboost_options[enable_woo_my_account]',
        array(
            'label'    => __( 'Enable My Account Icon', 'blogboost' ),
            'section'  => 'header_options',
            'type'     => 'checkbox',
        )
    );
}