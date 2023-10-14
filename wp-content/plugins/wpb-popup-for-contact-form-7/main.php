<?php
/**
 * Plugin Name:       WPB Popup for Contact Form 7
 * Plugin URI:        https://wpbean.com/plugins/
 * Description:       Shows a nice popup of the Contact Form 7 form.
 * Version:           1.5.7
 * Author:            wpbean
 * Author URI:        https://wpbean.com
 * Text Domain:       wpb-popup-for-cf7-lite
 * Domain Path:       /languages
 *
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly 



/**
 * Define constants
 */

if ( ! defined( 'WPB_PCF_FREE_VERSION' ) ) {
  define( 'WPB_PCF_FREE_VERSION', '1.5.7' );
}

if ( ! defined( 'WPB_PCF_FREE_INIT' ) ) {
  define( 'WPB_PCF_FREE_INIT', plugin_basename( __FILE__ ) );
}

if ( ! defined( 'WPB_PCF_FREE_TEXTDOMAIN' ) ) {
  define( 'WPB_PCF_FREE_TEXTDOMAIN', 'wpb-popup-for-cf7-lite' );
}

if ( !defined( 'WPB_PCF_CPT_Plugin_Path' ) ) {
    define( 'WPB_PCF_CPT_Plugin_Path', trailingslashit( plugin_dir_path( __FILE__ ) ) );
}

if ( !defined( 'WPB_PCF_CPT_Plugin_EL_Template_Path' ) ) {
    define( 'WPB_PCF_CPT_Plugin_EL_Template_Path', WPB_PCF_CPT_Plugin_Path . '/elementor/' );
}



/**
 * This version can't be activate if premium version is active
 */

if ( defined( 'WPB_PCF_PREMIUM' ) ) {
    function wpb_pcf_install_free_admin_notice() {
        ?>
	        <div class="error">
	            <p><?php esc_html_e( 'You can\'t activate the free version of the Popup for Contact Form 7 plugin while you are using the premium one.', WPB_PCF_FREE_TEXTDOMAIN ); ?></p>
	        </div>
    	<?php
    }

    add_action( 'admin_notices', 'wpb_pcf_install_free_admin_notice' );
    deactivate_plugins( plugin_basename( __FILE__ ) );
    return;
}


/* -------------------------------------------------------------------------- */
/*                                Plugin Class                                */
/* -------------------------------------------------------------------------- */

class WPB_PCF_Get_Popup_Button {

	//  Plugin version
	public $version = WPB_PCF_FREE_VERSION;

	// The plugin url
	public $plugin_url;
	
	// The plugin path
	public $plugin_path;

	// The theme directory path
	public $theme_dir_path;

	// Initializes the WPB_PCF_Get_Popup_Button() class
	public static function init(){
		static $instance = false;

		if( ! $instance ) {
			$instance = new WPB_PCF_Get_Popup_Button();

			add_action( 'plugins_loaded', [ $instance, 'plugin_init' ] );
			add_action( 'activated_plugin', [ $instance, 'activation_redirect' ] );
			add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), [ $instance, 'plugin_action_links' ] );
            register_activation_hook( __FILE__, [ $instance, 'activate' ] );
            register_deactivation_hook( plugin_basename( __FILE__ ), [ $instance, 'plugin_deactivation' ] );
		}

		return $instance;
	}

	//Initialize the plugin
	function plugin_init(){
		$this->file_includes();
		$this->init_classes();

		// Localize our plugin
		add_action( 'init', [ $this, 'localization_setup' ] );

		// Loads frontend scripts and styles
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_scripts' ] );

		add_action( 'admin_notices', [ $this, 'admin_notices' ] );

		add_action( 'admin_notices', [ $this, 'pro_discount_admin_notice' ] );

		add_action( 'admin_init', [ $this, 'pro_discount_admin_notice_dismissed' ] );
	}

	/**
	 * Pro version discount
	 */


	function pro_discount_admin_notice() {
	    $user_id = get_current_user_id();
	    if ( !get_user_meta( $user_id, 'wpb_pcf_pro_discount_dismissed' ) ){
	        printf('<div class="wpb-pcf-discount-notice updated" style="padding: 30px 20px;border-left-color: #27ae60;border-left-width: 5px;margin-top: 20px;"><p style="font-size: 18px;line-height: 32px">%s <a target="_blank" href="%s">%s</a>! %s <b>%s</b></p><a href="%s">%s</a></div>', esc_html__( 'Get a 10% exclusive discount on the premium version of the', WPB_PCF_FREE_TEXTDOMAIN ), 'https://wpbean.com/downloads/popup-for-contact-form-7-pro/?utm_content=Popup+for+Contact+Form+7+Pro&utm_campaign=adminlink&utm_medium=discount-notie&utm_source=FreeVersion', esc_html__( 'Popup for Contact Form 7', WPB_PCF_FREE_TEXTDOMAIN ), esc_html__( 'Use discount code - ', WPB_PCF_FREE_TEXTDOMAIN ), '10PERCENTOFF', esc_url( add_query_arg( 'wpb-pcf-pro-discount-admin-notice-dismissed', 'true' ) ), esc_html__( 'Dismiss', WPB_PCF_FREE_TEXTDOMAIN ));
	    }
	}


	function pro_discount_admin_notice_dismissed() {
	    $user_id = get_current_user_id();
	    if ( isset( $_GET['wpb-pcf-pro-discount-admin-notice-dismissed'] ) ){
	      add_user_meta( $user_id, 'wpb_pcf_pro_discount_dismissed', 'true', true );
	    }
	}

	/**
	 * Plugin Deactivation
	 */

	function plugin_deactivation() {
	  $user_id = get_current_user_id();
	  if ( get_user_meta( $user_id, 'wpb_pcf_pro_discount_dismissed' ) ){
	  	delete_user_meta( $user_id, 'wpb_pcf_pro_discount_dismissed' );
	  }

	  flush_rewrite_rules();
	}





	// The plugin activation function
	public function activate(){
		update_option( 'wpb_pcf_installed', time() );
		update_option( 'wpb_pcf_lite_version', $this->version );
	}

	// The plugin activation redirect
	function activation_redirect( $plugin ) {
	    if( $plugin == plugin_basename( __FILE__ ) && defined( 'WPCF7_PLUGIN' ) ) {
	        exit( wp_redirect( admin_url( 'admin.php?page=wpb-popup-for-cf7' ) ) );
	    }
	}

	function plugin_action_links( $links ) {
		if(defined( 'WPCF7_PLUGIN' )){
			$links[] = '<a href="'. admin_url( 'admin.php?page=wpb-popup-for-cf7' ) .'">'. esc_html__('Settings', WPB_PCF_FREE_TEXTDOMAIN) .'</a>';
		}
		$links[] = '<a target="_blank" href="https://docs.wpbean.com/?p=1192">'. esc_html__('Documentation', WPB_PCF_FREE_TEXTDOMAIN) .'</a>';
		$links[] = '<a target="_blank" style="    color: #93003c;text-shadow: 1px 1px 1px #eee;font-weight: 700;" href="https://wpbean.com/downloads/popup-for-contact-form-7-pro/?utm_content=Popup+for+Contact+Form+7+Pro&utm_campaign=adminlink&utm_medium=action-link&utm_source=FreeVersion">'. esc_html__('Get Pro', WPB_PCF_FREE_TEXTDOMAIN) .'</a>';
		return $links;
	}


	// Load the required files
	function file_includes() {
		include_once dirname( __FILE__ ) . '/includes/functions.php';
		include_once dirname( __FILE__ ) . '/includes/admin/class.menu-meta.php';

		if ( is_admin() ) {
			include_once dirname( __FILE__ ) . '/includes/admin/class.settings-api.php';
			include_once dirname( __FILE__ ) . '/includes/admin/class.settings-config.php';
		} else {
			include_once dirname( __FILE__ ) . '/includes/class.shortcode.php';
		}
		
		if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
            include_once dirname( __FILE__ ) . '/includes/class.ajax.php';
        }

		if ( defined( 'ELEMENTOR_VERSION' ) ) {
			include_once dirname( __FILE__ ) . '/includes/elementor.php';
		}
	}

	// Initialize the classes
    public function init_classes() {
		
		new WPB_PCF_Menu_Meta();

		if ( is_admin() ) {
            new WPB_PCF_Plugin_Settings();
        }else{
			new WPB_PCF_Shortcode_Handler();
		}

		if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
            new WPB_PCF_Ajax();
        }
	}

	// Initialize plugin for localization
    public function localization_setup() {
        load_plugin_textdomain( WPB_PCF_FREE_TEXTDOMAIN, false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
	}
	
	// Loads frontend scripts and styles
    public function enqueue_scripts() {
		wp_enqueue_style( 'wpb-pcf-sweetalert2', plugins_url( 'assets/css/sweetalert2.min.css', __FILE__ ), array(), '11.4.8' );
		wp_enqueue_style( 'wpb-pcf-styles', plugins_url( 'assets/css/frontend.css', __FILE__ ), array(), '1.0' );
        wp_enqueue_script( 'wpb-pcf-sweetalert2', plugins_url( 'assets/js/sweetalert2.all.min.js', __FILE__ ), array( 'jquery' ), '11.4.8', true );
		wp_enqueue_script( 'wpb-pcf-scripts', plugins_url( 'assets/js/frontend.js', __FILE__ ), array( 'jquery', 'wp-util' ), '1.0', true );
		wp_localize_script( 'wpb-pcf-scripts', 'WPB_PCF_Vars', array(
            'ajaxurl'	=> admin_url( 'admin-ajax.php' ),
            'nonce'		=> wp_create_nonce( 'wpb-pcf-button-ajax' ),
		) );
		

		$btn_color       		= wpb_pcf_get_option( 'btn_color', 'wpb_pcf_btn_settings', '#ffffff' );
		$bg_color       		= wpb_pcf_get_option( 'btn_bg_color', 'wpb_pcf_btn_settings', '#17a2b8' );
		$btn_hover_color       	= wpb_pcf_get_option( 'btn_hover_color', 'wpb_pcf_btn_settings', '#ffffff' );
		$btn_bg_hover_color     = wpb_pcf_get_option( 'btn_bg_hover_color', 'wpb_pcf_btn_settings', '#138496' );
		$custom_css = "
		.wpb-pcf-btn-default,
		.wpb-pcf-form-style-true input[type=submit],
		.wpb-pcf-form-style-true input[type=button],
		.wpb-pcf-form-style-true input[type=submit],
		.wpb-pcf-form-style-true input[type=button]{
			color: {$btn_color}!important;
			background: {$bg_color}!important;
		}
		.wpb-pcf-btn-default:hover, .wpb-pcf-btn-default:focus,
		.wpb-pcf-form-style-true input[type=submit]:hover, .wpb-pcf-form-style-true input[type=submit]:focus,
		.wpb-pcf-form-style-true input[type=button]:hover, .wpb-pcf-form-style-true input[type=button]:focus,
		.wpb-pcf-form-style-true input[type=submit]:hover,
		.wpb-pcf-form-style-true input[type=button]:hover,
		.wpb-pcf-form-style-true input[type=submit]:focus,
		.wpb-pcf-form-style-true input[type=button]:focus {
			color: {$btn_hover_color}!important;
			background: {$btn_bg_hover_color}!important;
		}";
				
		wp_add_inline_style( 'wpb-pcf-styles', $custom_css );
	}

	// plugin admin notices
    public function admin_notices() {

		$cf7_form_id = wpb_pcf_get_option( 'cf7_form_id', 'wpb_pcf_form_settings' );

		$action = 'install-plugin';
		$slug 	= 'contact-form-7';
		$install_cf7 = wp_nonce_url(
			add_query_arg(
			    array(
			        'action' => $action,
			        'plugin' => $slug
			    ),
			    admin_url( 'update.php' )
			),
			$action.'_'.$slug
		);

		if ( ! defined( 'WPCF7_PLUGIN' ) ) {
			?>
			<div class="notice notice-error is-dismissible">
				<p><b><?php esc_html_e( 'Popup for Contact Form 7', WPB_PCF_FREE_TEXTDOMAIN ); ?></b><?php esc_html_e( ' required ', WPB_PCF_FREE_TEXTDOMAIN ); ?><b><a href="https://wordpress.org/plugins/contact-form-7" target="_blank"><?php esc_html_e( 'Contact Form 7', WPB_PCF_FREE_TEXTDOMAIN ); ?></a></b><?php esc_html_e( ' plugin to work with.', WPB_PCF_FREE_TEXTDOMAIN ); ?> <b><a href="<?php echo esc_url($install_cf7)?>">Click here</a></b> to install the <b><?php esc_html_e( 'Contact Form 7', WPB_PCF_FREE_TEXTDOMAIN ); ?></b> Plugin.</p>
			</div>
			<?php
		}

		if ( ! $cf7_form_id && defined( 'WPCF7_PLUGIN' ) ) {
			?>
			<div class="notice notice-error is-dismissible">
				<p><?php esc_html_e('The Popup for Contact Form 7 needs a form to show. Please select a form', WPB_PCF_FREE_TEXTDOMAIN); ?> <a href="<?php echo esc_url( admin_url('admin.php?page=wpb-popup-for-cf7') ); ?>"><?php esc_html_e('here', WPB_PCF_FREE_TEXTDOMAIN); ?></a>.</p>
			</div>
			<?php
		}
	}
}


/* -------------------------------------------------------------------------- */
/*                            Initialize the plugin                           */
/* -------------------------------------------------------------------------- */

function wpb_pcf_get_popup_button() {
    return WPB_PCF_Get_Popup_Button::init();
}

// kick it off
wpb_pcf_get_popup_button();