<?php
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function blogboost_widgets_init() {
    $sidebar_args['sidebar'] = array(
        'name'          => __( 'Sidebar', 'blogboost' ),
        'id'            => 'sidebar-1',
        'description' => __( 'The sidebar will display any widgets that are added to this region.', 'blogboost' ),
    );

    $sidebar_args['offcanvas_sidebar'] = array(
        'name'          => __( 'Offcanvas Widget', 'blogboost' ),
        'id'            => 'blogboost-offcanvas-widget',
        'description' => __( 'Any widgets that are placed in this area will be displayed on the offcanvas sidebar.', 'blogboost' ),
    );
    $enable_sticky_widget_area = blogboost_get_option( 'enable_sticky_widget_area'); 
    if ($enable_sticky_widget_area) {
        $sidebar_args['sticky_widget_area'] = array(
            'name'          => __( 'Navigation Sticky Widget', 'blogboost' ),
            'id'            => 'blogboost-navigation-widget',
            'description' => __( 'Any widgets that are placed in this area will be displayed below navigation area', 'blogboost' ),
        );
    }

    /*Get homepage sidebar option from the customizer*/
    $front_page_enable_sidebar = blogboost_get_option('front_page_enable_sidebar');
    if($front_page_enable_sidebar){
        $sidebar_args['homepage_sidebar'] = array(
            'name'        => __( 'Homepage Sidebar', 'blogboost' ),
            'id'          => 'home-page-sidebar',
            'description' => __( 'The widgets added to this region will only be visible on the sidebar of the homepage.', 'blogboost' ),
        );
    }

    $sidebar_args['above_footer'] = array(
        'name'        => __( 'Footer Fullwidth', 'blogboost' ),
        'id'          => 'fullwidth-footer-widgetarea',
        'description' => __( 'Widgets added to this region will appear above the footer.', 'blogboost' ),
    );

    /*Get the footer column from the customizer*/
    $footer_column_layout = blogboost_get_option('footer_column_layout');
    if($footer_column_layout){
        switch ($footer_column_layout) {
            case "footer_layout_1":
                $footer_column = 4;
                break;
            case "footer_layout_2":
            case "footer_layout_5":
                $footer_column = 3;
                break;
            case "footer_layout_3":
            case "footer_layout_4":
            case "footer_layout_6":
                $footer_column = 2;
                break;
            default:
                $footer_column = 4;
        }
    }else{
        $footer_column = 4;
    }

    $cols = intval( apply_filters( 'blogboost_footer_widget_columns', $footer_column ) );

    for ( $j = 1; $j <= $cols; $j++ ) {
        $footer   = sprintf( 'footer_%d', $j );

        $footer_region_name = sprintf( __( 'Footer Column %1$d', 'blogboost' ), $j );
        $footer_region_description = sprintf( __( 'Widgets added here will appear in column %1$d of the footer.', 'blogboost' ), $j );

        $sidebar_args[ $footer ] = array(
            'name'        => $footer_region_name,
            'id'          => sprintf( 'footer-%d', $j ),
            'description' => $footer_region_description,
        );
    }


    $sidebar_args = apply_filters( 'blogboost_sidebar_args', $sidebar_args );

    foreach ( $sidebar_args as $sidebar => $args ) {
        $widget_tags = array(
            'before_widget' => '<div id="%1$s" class="widget blogboost-widget %2$s"><div class="widget-content">',
            'after_widget'  => '</div></div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        );

        /**
         * Dynamically generated filter hooks. Allow changing widget wrapper and title tags. See example below.
         */
        $filter_hook = sprintf( 'blogboost_%s_widget_tags', $sidebar );
        $widget_tags = apply_filters( $filter_hook, $widget_tags );

        if ( is_array( $widget_tags ) ) {
            register_sidebar( $args + $widget_tags );
        }
    }
}
add_action( 'widgets_init', 'blogboost_widgets_init' );