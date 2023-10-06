<?php
/*Add Home Page Options Panel.*/
$wp_customize->add_panel(
    'theme_home_option_panel',
    array(
        'title' => __( 'Front Page Options', 'blogboost' ),
        'description' => __( 'Contains all front page settings', 'blogboost'),
        'priority' => 50
    )
);
/**/
$wp_customize->add_section(
    'home_page_banner_option',
    array(
        'title'      => __( 'Main Banner Options', 'blogboost' ),
        'panel'      => 'theme_home_option_panel',
    )
);

/* Home Page Layout */
$wp_customize->add_setting(
    'blogboost_options[enable_banner_section]',
    array(
        'default'           => $default_options['enable_banner_section'],
        'sanitize_callback' => 'blogboost_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'blogboost_options[enable_banner_section]',
    array(
        'label'   => __( 'Enable Banner Section', 'blogboost' ),
        'section' => 'home_page_banner_option',
        'type'    => 'checkbox',
    )
);


$wp_customize->add_setting(
    'blogboost_options[banner_section_slider_layout]',
    array(
        'default'           => $default_options['banner_section_slider_layout'],
        'sanitize_callback' => 'blogboost_sanitize_radio',
    )
);
$wp_customize->add_control(
    new Blogboost_Radio_Image_Control(
        $wp_customize,
        'blogboost_options[banner_section_slider_layout]',
        array(
            'label' => __( 'Banner Slider Layout', 'blogboost' ),
            'section' => 'home_page_banner_option',
            'choices' => blogboost_get_slider_layouts()
        )
    )
);


$wp_customize->add_setting(
    'blogboost_options[number_of_slider_post]',
    array(
        'default'           => $default_options['number_of_slider_post'],
        'sanitize_callback' => 'blogboost_sanitize_select',
    )
);
$wp_customize->add_control(
    'blogboost_options[number_of_slider_post]',
    array(
        'label'       => __( 'Post In Slider', 'blogboost' ),
        'section'     => 'home_page_banner_option',
        'type'        => 'select',
        'choices'     => array(
            '3' => __( '3', 'blogboost' ),
            '4' => __( '4', 'blogboost' ),
            '5' => __( '5', 'blogboost' ),
            '6' => __( '6', 'blogboost' ),
        ),
    )
);


$wp_customize->add_setting(
    'blogboost_options[slider_post_content_alignment]',
    array(
        'default'           => $default_options['slider_post_content_alignment'],
        'sanitize_callback' => 'blogboost_sanitize_select',
    )
);
$wp_customize->add_control(
    'blogboost_options[slider_post_content_alignment]',
    array(
        'label'       => __( 'Slider Content Alignment', 'blogboost' ),
        'section'     => 'home_page_banner_option',
        'type'        => 'select',
        'choices'     => array(
            'text-right' => __( 'Align Right', 'blogboost' ),
            'text-center' => __( 'Align Center', 'blogboost' ),
            'text-left' => __( 'Align Left', 'blogboost' ),
        ),
    )
);

$wp_customize->add_setting(
    'blogboost_options[banner_section_cat]',
    array(
        'default'           => $default_options['banner_section_cat'],
        'sanitize_callback' => 'blogboost_sanitize_select',
    )
);
$wp_customize->add_control(
    'blogboost_options[banner_section_cat]',
    array(
        'label'   => __( 'Choose Banner Category', 'blogboost' ),
        'section' => 'home_page_banner_option',
            'type'        => 'select',
        'choices'     => blogboost_post_category_list(),
    )
);

$wp_customize->add_setting(
    'blogboost_options[enable_banner_post_description]',
    array(
        'default'           => $default_options['enable_banner_post_description'],
        'sanitize_callback' => 'blogboost_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'blogboost_options[enable_banner_post_description]',
    array(
        'label'   => __( 'Enable Post Description', 'blogboost' ),
        'section' => 'home_page_banner_option',
        'type'    => 'checkbox',
    )
);

$wp_customize->add_setting(
    'blogboost_options[enable_banner_cat_meta]',
    array(
        'default'           => $default_options['enable_banner_cat_meta'],
        'sanitize_callback' => 'blogboost_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'blogboost_options[enable_banner_cat_meta]',
    array(
        'label'   => __( 'Enable Category Meta', 'blogboost' ),
        'section' => 'home_page_banner_option',
        'type'    => 'checkbox',
    )
);


$wp_customize->add_setting(
    'blogboost_options[enable_banner_author_meta]',
    array(
        'default'           => $default_options['enable_banner_author_meta'],
        'sanitize_callback' => 'blogboost_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'blogboost_options[enable_banner_author_meta]',
    array(
        'label'   => __( 'Enable Author Meta', 'blogboost' ),
        'section' => 'home_page_banner_option',
        'type'    => 'checkbox',
    )
);


$wp_customize->add_setting(
    'blogboost_options[enable_banner_date_meta]',
    array(
        'default'           => $default_options['enable_banner_date_meta'],
        'sanitize_callback' => 'blogboost_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'blogboost_options[enable_banner_date_meta]',
    array(
        'label'   => __( 'Enable Date On Banner', 'blogboost' ),
        'section' => 'home_page_banner_option',
        'type'    => 'checkbox',
    )
);

$wp_customize->add_setting(
    'blogboost_options[enable_banner_overlay]',
    array(
        'default'           => $default_options['enable_banner_overlay'],
        'sanitize_callback' => 'blogboost_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'blogboost_options[enable_banner_overlay]',
    array(
        'label'   => __( 'Enable Banner Overlay', 'blogboost' ),
        'section' => 'home_page_banner_option',
        'type'    => 'checkbox',
    )
);