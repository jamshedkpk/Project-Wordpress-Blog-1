<?php

$wp_customize->add_section(
    'single_options' ,
    array(
        'title' => __( 'Single Options', 'blogboost' ),
        'panel' => 'blogboost_option_panel',
    )
);

/* Global Layout*/
$wp_customize->add_setting(
    'blogboost_options[single_sidebar_layout]',
    array(
        'default'           => $default_options['single_sidebar_layout'],
        'sanitize_callback' => 'blogboost_sanitize_radio',
    )
);
$wp_customize->add_control(
    new Blogboost_Radio_Image_Control(
        $wp_customize,
        'blogboost_options[single_sidebar_layout]',
        array(
            'label' => __( 'Single Sidebar Layout', 'blogboost' ),
            'section' => 'single_options',
            'choices' => blogboost_get_general_layouts()
        )
    )
);

// Hide Side Bar on Mobile
$wp_customize->add_setting(
    'blogboost_options[hide_single_sidebar_mobile]',
    array(
        'default'           => $default_options['hide_single_sidebar_mobile'],
        'sanitize_callback' => 'blogboost_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'blogboost_options[hide_single_sidebar_mobile]',
    array(
        'label'       => __( 'Hide Single Sidebar on Mobile', 'blogboost' ),
        'section'     => 'single_options',
        'type'        => 'checkbox',
    )
);

$wp_customize->add_setting(
    'blogboost_section_seperator_single_1',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    new Blogboost_Seperator_Control(
        $wp_customize,
        'blogboost_section_seperator_single_1',
        array(
            'settings' => 'blogboost_section_seperator_single_1',
            'section'       => 'single_options',
        )
    )
);

/* Post Meta */
$wp_customize->add_setting(
    'blogboost_options[single_post_meta]',
    array(
        'default'           => $default_options['single_post_meta'],
        'sanitize_callback' => 'blogboost_sanitize_checkbox_multiple',
    )
);
$wp_customize->add_control(
    new Blogboost_Checkbox_Multiple(
        $wp_customize,
        'blogboost_options[single_post_meta]',
        array(
            'label' => __( 'Single Post Meta', 'blogboost' ),
            'description'   => __( 'Choose the post meta you want to be displayed on post detail page', 'blogboost' ),
            'section' => 'single_options',
            'choices' => array(
                'author' => __( 'Author', 'blogboost' ),
                'date' => __( 'Date', 'blogboost' ),
                'comment' => __( 'Comment', 'blogboost' ),
                'category' => __( 'Category', 'blogboost' ),
                'tags' => __( 'Tags', 'blogboost' ),
            )
        )
    )
);



$wp_customize->add_setting(
    'blogboost_section_seperator_single_5',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    new Blogboost_Seperator_Control( 
        $wp_customize,
        'blogboost_section_seperator_single_5',
        array(
            'settings' => 'blogboost_section_seperator_single_5',
            'section'       => 'single_options',
        )
    )
);


$wp_customize->add_setting(
    'blogboost_options[show_sticky_article_navigation]',
    array(
        'default'           => $default_options['show_sticky_article_navigation'],
        'sanitize_callback' => 'blogboost_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'blogboost_options[show_sticky_article_navigation]',
    array(
        'label'    => __( 'Show Sticky Article Navigation', 'blogboost' ),
        'section'  => 'single_options',
        'type'     => 'checkbox',
    )
);

/*Show Author Info Box start
*-------------------------------*/
$wp_customize->add_setting(
    'blogboost_section_seperator_single_2',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    new Blogboost_Seperator_Control( 
        $wp_customize,
        'blogboost_section_seperator_single_2',
        array(
            'settings' => 'blogboost_section_seperator_single_2',
            'section'       => 'single_options',
        )
    )
);

$wp_customize->add_setting(
    'blogboost_options[show_author_info]',
    array(
        'default'           => $default_options['show_author_info'],
        'sanitize_callback' => 'blogboost_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'blogboost_options[show_author_info]',
    array(
        'label'    => __( 'Show Author Info Box', 'blogboost' ),
        'section'  => 'single_options',
        'type'     => 'checkbox',
    )
);

$wp_customize->add_setting(
    'blogboost_section_seperator_single_3',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    new Blogboost_Seperator_Control(
        $wp_customize,
        'blogboost_section_seperator_single_3',
        array(
            'settings' => 'blogboost_section_seperator_single_3',
            'section'       => 'single_options',
        )
    )
);

/*Show Related Posts
*-------------------------------*/
$wp_customize->add_setting(
    'blogboost_options[show_related_posts]',
    array(
        'default'           => $default_options['show_related_posts'],
        'sanitize_callback' => 'blogboost_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'blogboost_options[show_related_posts]',
    array(
        'label'    => __( 'Show Related Posts', 'blogboost' ),
        'section'  => 'single_options',
        'type'     => 'checkbox',
    )
);

/*Related Posts Text.*/
$wp_customize->add_setting(
    'blogboost_options[related_posts_text]',
    array(
        'default'           => $default_options['related_posts_text'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'blogboost_options[related_posts_text]',
    array(
        'label'    => __( 'Related Posts Text', 'blogboost' ),
        'section'  => 'single_options',
        'type'     => 'text',
        'active_callback' => 'blogboost_is_related_posts_enabled',
    )
);

/* Number of Related Posts */
$wp_customize->add_setting(
    'blogboost_options[no_of_related_posts]',
    array(
        'default'           => $default_options['no_of_related_posts'],
        'sanitize_callback' => 'absint',
    )
);
$wp_customize->add_control(
    'blogboost_options[no_of_related_posts]',
    array(
        'label'       => __( 'Number of Related Posts', 'blogboost' ),
        'section'     => 'single_options',
        'type'        => 'number',
        'active_callback' => 'blogboost_is_related_posts_enabled',
    )
);

/*Related Posts Orderby*/
$wp_customize->add_setting(
    'blogboost_options[related_posts_orderby]',
    array(
        'default'           => $default_options['related_posts_orderby'],
        'sanitize_callback' => 'blogboost_sanitize_select',
    )
);
$wp_customize->add_control(
    'blogboost_options[related_posts_orderby]',
    array(
        'label'       => __( 'Orderby', 'blogboost' ),
        'section'     => 'single_options',
        'type'        => 'select',
        'choices' => array(
            'date' => __('Date', 'blogboost'),
            'id' => __('ID', 'blogboost'),
            'title' => __('Title', 'blogboost'),
            'rand' => __('Random', 'blogboost'),
        ),
        'active_callback' => 'blogboost_is_related_posts_enabled',
    )
);

/*Related Posts Order*/
$wp_customize->add_setting(
    'blogboost_options[related_posts_order]',
    array(
        'default'           => $default_options['related_posts_order'],
        'sanitize_callback' => 'blogboost_sanitize_select',
    )
);
$wp_customize->add_control(
    'blogboost_options[related_posts_order]',
    array(
        'label'       => __( 'Order', 'blogboost' ),
        'section'     => 'single_options',
        'type'        => 'select',
        'choices' => array(
            'asc' => __('ASC', 'blogboost'),
            'desc' => __('DESC', 'blogboost'),
        ),
        'active_callback' => 'blogboost_is_related_posts_enabled',
    )
);

$wp_customize->add_setting(
    'blogboost_section_seperator_single_4',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    new Blogboost_Seperator_Control(
        $wp_customize,
        'blogboost_section_seperator_single_4',
        array(
            'settings' => 'blogboost_section_seperator_single_4',
            'section'       => 'single_options',
        )
    )
);
/*Show Author Posts
*-----------------------------------------*/
$wp_customize->add_setting(
    'blogboost_options[show_author_posts]',
    array(
        'default'           => $default_options['show_author_posts'],
        'sanitize_callback' => 'blogboost_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'blogboost_options[show_author_posts]',
    array(
        'label'    => __( 'Show Author Posts', 'blogboost' ),
        'section'  => 'single_options',
        'type'     => 'checkbox',
    )
);

/*Author Posts Text.*/
$wp_customize->add_setting(
    'blogboost_options[author_posts_text]',
    array(
        'default'           => $default_options['author_posts_text'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'blogboost_options[author_posts_text]',
    array(
        'label'    => __( 'Author Posts Text', 'blogboost' ),
        'section'  => 'single_options',
        'type'     => 'text',
        'active_callback' => 'blogboost_is_author_posts_enabled',
    )
);

/* Number of Author Posts */
$wp_customize->add_setting(
    'blogboost_options[no_of_author_posts]',
    array(
        'default'           => $default_options['no_of_author_posts'],
        'sanitize_callback' => 'absint',
    )
);
$wp_customize->add_control(
    'blogboost_options[no_of_author_posts]',
    array(
        'label'       => __( 'Number of Author Posts', 'blogboost' ),
        'section'     => 'single_options',
        'type'        => 'number',
        'active_callback' => 'blogboost_is_author_posts_enabled',
    )
);

/*Author Posts Orderby*/
$wp_customize->add_setting(
    'blogboost_options[author_posts_orderby]',
    array(
        'default'           => $default_options['author_posts_orderby'],
        'sanitize_callback' => 'blogboost_sanitize_select',
    )
);
$wp_customize->add_control(
    'blogboost_options[author_posts_orderby]',
    array(
        'label'       => __( 'Orderby', 'blogboost' ),
        'section'     => 'single_options',
        'type'        => 'select',
        'choices' => array(
            'date' => __('Date', 'blogboost'),
            'id' => __('ID', 'blogboost'),
            'title' => __('Title', 'blogboost'),
            'rand' => __('Random', 'blogboost'),
        ),
        'active_callback' => 'blogboost_is_author_posts_enabled',
    )
);

/*Author Posts Order*/
$wp_customize->add_setting(
    'blogboost_options[author_posts_order]',
    array(
        'default'           => $default_options['author_posts_order'],
        'sanitize_callback' => 'blogboost_sanitize_select',
    )
);
$wp_customize->add_control(
    'blogboost_options[author_posts_order]',
    array(
        'label'       => __( 'Order', 'blogboost' ),
        'section'     => 'single_options',
        'type'        => 'select',
        'choices' => array(
            'asc' => __('ASC', 'blogboost'),
            'desc' => __('DESC', 'blogboost'),
        ),
        'active_callback' => 'blogboost_is_author_posts_enabled',
    )
);