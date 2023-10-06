<?php
/**
 * Theme Customizer
 *
 * @package Marvel_Blog
 */

function marvel_blog_customize_register( $wp_customize ) {

	// Upsell Section.
	$wp_customize->add_section(
		new Marvel_Blog_Upsell_Section(
			$wp_customize,
			'upsell_sections',
			array(
				'title'            => __( 'Marvel Blog Pro', 'marvel-blog' ),
				'button_text'      => __( 'Buy Pro', 'marvel-blog' ),
				'url'              => 'https://ascendoor.com/themes/marvel-blog-pro/',
				'background_color' => '#fc2807',
				'text_color'       => '#fff',
				'priority'         => 0,
			)
		)
	);

}
add_action( 'customize_register', 'marvel_blog_customize_register' );

function marvel_blog_custom_control_scripts() {
	// Append .min if SCRIPT_DEBUG is false.
	$min = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

	wp_enqueue_style( 'marvel-blog-custom-controls-css', get_stylesheet_directory_uri() . '/assets/css/custom-controls' . $min . '.css', array( 'elite-blog-custom-controls-css' ), '1.0.0', 'all' );
	wp_enqueue_script( 'marvel-blog-custom-controls-js', get_stylesheet_directory_uri() . '/assets/js/custom-controls' . $min . '.js', array( 'elite-blog-custom-controls-js', 'jquery', 'jquery-ui-core' ), '1.0.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'marvel_blog_custom_control_scripts' );
