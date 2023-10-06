<?php
/**
 * Marvel Blog functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Marvel Blog
 */

if ( ! function_exists( 'marvel_blog_setup' ) ) :
	function marvel_blog_setup() {
		/*
		* Make child theme available for translation.
		* Translations can be filed in the /languages/ directory.
		*/
		load_child_theme_textdomain( 'marvel-blog', get_stylesheet_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		add_theme_support( 'title-tag' );

		add_theme_support( 'register_block_pattern' );

		add_theme_support( 'register_block_style' );

		add_theme_support( 'wp-block-styles' );

		add_theme_support( 'align-wide' );

		add_theme_support( 'responsive-embeds' );
	}
endif;
add_action( 'after_setup_theme', 'marvel_blog_setup' );

if ( ! function_exists( 'marvel_blog_enqueue_styles' ) ) :
	/**
	 * Enqueue scripts and styles.
	 */
	function marvel_blog_enqueue_styles() {

		$parenthandle = 'elite-blog-style';
		$theme        = wp_get_theme();
		// Append .min if SCRIPT_DEBUG is false.
		$min = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

		wp_enqueue_style(
			$parenthandle,
			get_template_directory_uri() . '/style.css',
			array(
				'elite-blog-slick-css',
				'elite-blog-font-awesome-css',
				'elite-blog-google-fonts',
			),
			$theme->parent()->get( 'Version' )
		);

		wp_enqueue_style(
			'marvel-blog-style',
			get_stylesheet_uri(),
			array( $parenthandle ),
			$theme->get( 'Version' )
		);

		wp_enqueue_script( 'marvel-blog-script', get_stylesheet_directory_uri() . '/assets/js/custom' . $min . '.js', array( 'jquery', 'elite-blog-custom-script' ), $theme->get( 'Version' ), true );

	}

endif;

add_action( 'wp_enqueue_scripts', 'marvel_blog_enqueue_styles' );

// Custom Controls.
require get_theme_file_path() . '/inc/custom-controls.php';

// Customizer Section.
require get_theme_file_path() . '/inc/customizer.php';

function marvel_blog_custom_header_setup() {
	add_theme_support(
		'custom-header',
		apply_filters(
			'elite_blog_custom_header_args',
			array(
				'default-image'      => '',
				'default-text-color' => 'fc2807',
				'width'              => 1000,
				'height'             => 250,
				'flex-height'        => true,
				'wp-head-callback'   => 'elite_blog_header_style',
			)
		)
	);
}
add_action( 'after_setup_theme', 'marvel_blog_custom_header_setup' );

function admin_style() {
	?>
	<style type="text/css">
		.notice.notice-info.elite-blog-demo-data {
			display: none !important;
		}
	</style>
	<?php
}
add_action( 'admin_enqueue_scripts', 'admin_style' );

/**
 * One Click Demo Import after import setup.
 */
if ( class_exists( 'OCDI_Plugin' ) ) {
	require get_theme_file_path() . '/inc/ocdi.php';
}
