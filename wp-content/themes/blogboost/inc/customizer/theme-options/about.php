<?php
/**/
$wp_customize->add_section(
    'home_page_about_option',
    array(
        'title'      => __( 'About Section Options', 'blogboost' ),
        'panel'      => 'theme_home_option_panel',
    )
);

$wp_customize->add_setting(
    'blogboost_options[enable_about_section]',
    array(
        'default'           => $default_options['enable_about_section'],
        'sanitize_callback' => 'blogboost_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'blogboost_options[enable_about_section]',
    array(
        'label'   => __( 'Enable About Section', 'blogboost' ),
        'section' => 'home_page_about_option',
        'type'    => 'checkbox',
    )
);

$wp_customize->add_setting(
    'blogboost_options[about_post_title]',
    array(
        'default'           => $default_options['about_post_title'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'blogboost_options[about_post_title]',
    array(
        'label'    => __( 'About Posts Title', 'blogboost' ),
        'section'  => 'home_page_about_option',
        'type'     => 'text',
    )
);

$wp_customize->add_setting( 'select_about_page', array(
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'blogboost_sanitize_dropdown_pages',
) );

$wp_customize->add_control( 'select_about_page', array(
    'input_attrs'       => array(
        'style'           => 'width: 50px;'
        ),
    'label'             => __( 'Select About Page', 'blogboost' ) ,
    'section'           => 'home_page_about_option',
    'type'              => 'dropdown-pages',
    )
);

$wp_customize->add_setting(
    'blogboost_options[upload_about_image]',
    array(
        'default'           => '',
        'sanitize_callback' => 'blogboost_sanitize_image',
    )
);
$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'blogboost_options[upload_about_image]',
        array(
            'label'           => __( 'Upload Your Signature', 'blogboost' ),
            'section'         => 'home_page_about_option',
        )
    )
);

$wp_customize->add_setting(
    'blogboost_options[facebook_url]',
    array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    )
);
$wp_customize->add_control(
    'blogboost_options[facebook_url]',
    array(
        'label'           => __( 'Facebook URL:', 'blogboost' ),
        'section'         => 'home_page_about_option',
        'type'            => 'text',
        'description'     => __( 'Leave empty if you don\'t want the have a this link', 'blogboost' ),
    )
);


$wp_customize->add_setting(
    'blogboost_options[twiter_url]',
    array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    )
);
$wp_customize->add_control(
    'blogboost_options[twiter_url]',
    array(
        'label'           => __( 'Twiter URL:', 'blogboost' ),
        'section'         => 'home_page_about_option',
        'type'            => 'text',
        'description'     => __( 'Leave empty if you don\'t want the have a this link', 'blogboost' ),
    )
);

$wp_customize->add_setting(
    'blogboost_options[instagram_url]',
    array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    )
);
$wp_customize->add_control(
    'blogboost_options[instagram_url]',
    array(
        'label'           => __( 'Instagram URL:', 'blogboost' ),
        'section'         => 'home_page_about_option',
        'type'            => 'text',
        'description'     => __( 'Leave empty if you don\'t want the have a this link', 'blogboost' ),
    )
);
