<?php
/*Preloader Options*/
$wp_customize->add_section(
    'preloader_options' ,
    array(
        'title' => __( 'Preloader Options', 'blogboost' ),
        'panel' => 'blogboost_option_panel',
    )
);

/*Show Preloader*/
$wp_customize->add_setting(
    'blogboost_options[show_preloader]',
    array(
        'default'           => $default_options['show_preloader'],
        'sanitize_callback' => 'blogboost_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'blogboost_options[show_preloader]',
    array(
        'label'    => __( 'Show Preloader', 'blogboost' ),
        'section'  => 'preloader_options',
        'type'     => 'checkbox',
    )
);

$wp_customize->add_setting(
    'blogboost_options[preloader_style]',
    array(
        'default'           => $default_options['preloader_style'],
        'sanitize_callback' => 'blogboost_sanitize_select',
    )
);
$wp_customize->add_control(
    'blogboost_options[preloader_style]',
    array(
        'label'       => __( 'Preloader Style', 'blogboost' ),
        'section'     => 'preloader_options',
        'type'        => 'select',
        'choices'     => array(
            'theme-preloader-spinner-1' => __( 'Style 1', 'blogboost' ),
            'theme-preloader-spinner-2' => __( 'Style 2', 'blogboost' ),
            'theme-preloader-spinner-3' => __( 'Style 3', 'blogboost' ),
            'theme-preloader-spinner-4' => __( 'Style 4', 'blogboost' ),
        ),
        'active_callback' => 'blogboost_is_show_preloader',

    )
);
