<?php
$wp_customize->add_section(
    'home_page_shop_option',
    array(
        'title'      => __( 'Shop  Section Options', 'blogboost' ),
        'panel'      => 'theme_home_option_panel',
    )
);

/* Home Page Layout */
$wp_customize->add_setting(
    'blogboost_options[enable_shop_section]',
    array(
        'default'           => $default_options['enable_shop_section'],
        'sanitize_callback' => 'blogboost_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'blogboost_options[enable_shop_section]',
    array(
        'label'   => __( 'Enable Shop Section', 'blogboost' ),
        'section' => 'home_page_shop_option',
        'type'    => 'checkbox',
    )
);

$wp_customize->add_setting(
    'blogboost_options[shop_post_title]',
    array(
        'default'           => $default_options['shop_post_title'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'blogboost_options[shop_post_title]',
    array(
        'label'    => __( 'Shop Post Title', 'blogboost' ),
        'section'  => 'home_page_shop_option',
        'type'     => 'text',
    )
);

$wp_customize->add_setting(
    'blogboost_options[shop_post_description]',
    array(
        'default'           => $default_options['shop_post_description'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'blogboost_options[shop_post_description]',
    array(
        'label'    => __( 'Shop Post Description', 'blogboost' ),
        'section'  => 'home_page_shop_option',
        'type'     => 'textarea',
    )
);

$wp_customize->add_setting(
    'blogboost_options[shop_select_product_from]',
    array(
        'default'           => $default_options['shop_select_product_from'],
        'sanitize_callback' => 'blogboost_sanitize_select',
    )
);
$wp_customize->add_control(
    'blogboost_options[shop_select_product_from]',
    array(
        'label'       => __( 'Select Product From', 'blogboost' ),
        'section'     => 'home_page_shop_option',
        'type'        => 'select',
        'choices' => array(
            'custom'            => __('Custom Select', 'blogboost'),
            'recent-products'   => __('Recent Products', 'blogboost'),
            'popular-products'  => __('Popular Products', 'blogboost'),
            'sale-products'     => __('Sale Products', 'blogboost'),
        )
    )
);


$wp_customize->add_setting(
    'blogboost_options[select_product_category]',
    array(
        'default'           => $default_options['select_product_category'],
        'sanitize_callback' => 'blogboost_sanitize_select',
    )
);
$wp_customize->add_control(
    'blogboost_options[select_product_category]',
    array(
        'label'   => __( 'Select Product Category', 'blogboost' ),
        'section' => 'home_page_shop_option',
        'type'        => 'select',
        'choices'     => blogboost_woocommerce_product_cat(),
        'active_callback' => 'blogboost_shop_select_product_from'
    )
);

$wp_customize->add_setting(
    'blogboost_options[shop_number_of_column]',
    array(
        'default'           => $default_options['shop_number_of_column'],
        'sanitize_callback' => 'blogboost_sanitize_select',
    )
);
$wp_customize->add_control(
    'blogboost_options[shop_number_of_column]',
    array(
        'label'       => __( 'Select Number Of Column', 'blogboost' ),
        'section'     => 'home_page_shop_option',
        'type'        => 'select',
        'choices' => array(
            '2'  => __('2', 'blogboost'),
            '3'  => __('3', 'blogboost'),
            '4'  => __('4', 'blogboost'),
        )
    )
);

$wp_customize->add_setting(
    'blogboost_options[shop_number_of_product]',
    array(
        'default'           => $default_options['shop_number_of_product'],
        'sanitize_callback' => 'blogboost_sanitize_select',
    )
);
$wp_customize->add_control(
    'blogboost_options[shop_number_of_product]',
    array(
        'label'       => __( 'Select Number Of Product', 'blogboost' ),
        'section'     => 'home_page_shop_option',
        'type'        => 'select',
        'choices' => array(
            '2'  => __('2', 'blogboost'),
            '3'  => __('3', 'blogboost'),
            '4'  => __('4', 'blogboost'),
            '5'  => __('5', 'blogboost'),
            '6'  => __('6', 'blogboost'),
            '7'  => __('7', 'blogboost'),
            '8'  => __('8', 'blogboost'),
            '9'  => __('9', 'blogboost'),
            '10'  => __('10', 'blogboost'),
            '11'  => __('11', 'blogboost'),
            '12'  => __('12', 'blogboost'),
        )
    )
);

$wp_customize->add_setting(
    'blogboost_options[shop_post_button_text]',
    array(
        'default'           => $default_options['shop_post_button_text'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'blogboost_options[shop_post_button_text]',
    array(
        'label'    => __( 'Shop section Button Text', 'blogboost' ),
        'section'  => 'home_page_shop_option',
        'type'     => 'text',
    )
);
$wp_customize->add_setting(
    'blogboost_options[shop_post_button_url]',
    array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    )
);
$wp_customize->add_control(
    'blogboost_options[shop_post_button_url]',
    array(
        'label'           => __( 'Button Link', 'blogboost' ),
        'section'         => 'home_page_shop_option',
        'type'            => 'text',
        'description'     => __( 'Leave empty if you don\'t want the image to have a link', 'blogboost' ),
    )
);