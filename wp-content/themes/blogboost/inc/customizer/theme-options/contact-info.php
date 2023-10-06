<?php
$wp_customize->add_section(
	'contact_info_setting',
	array(
		'title' => __( 'Contact Info Options', 'blogboost' ),
        'panel' => 'blogboost_option_panel',
	)
);

$wp_customize->add_setting(
    'blogboost_options[whats_app_number]',
    array(
        'default'           => $default_options['whats_app_number'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'blogboost_options[whats_app_number]',
    array(
        'label'    => __( 'Whats App Number', 'blogboost' ),
        'section'  => 'contact_info_setting',
        'type'     => 'text',
    )
);

$wp_customize->add_setting(
    'blogboost_options[telephone_number]',
    array(
        'default'           => $default_options['telephone_number'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'blogboost_options[telephone_number]',
    array(
        'label'    => __( 'Telephone Number', 'blogboost' ),
        'section'  => 'contact_info_setting',
        'type'     => 'text',
    )
);

$wp_customize->add_setting(
    'blogboost_options[email_address]',
    array(
        'default'           => $default_options['email_address'],
        'sanitize_callback' => 'sanitize_email',
    )
);
$wp_customize->add_control(
    'blogboost_options[email_address]',
    array(
        'label'    => __( 'Email Address', 'blogboost' ),
        'section'  => 'contact_info_setting',
        'type'     => 'email',
    )
);
