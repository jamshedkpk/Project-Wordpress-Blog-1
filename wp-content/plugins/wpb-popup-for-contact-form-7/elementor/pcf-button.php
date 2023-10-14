<?php
namespace WPB_PCF_Elementor_Addons\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class PCF_Button extends Widget_Base {

	/**
	 * Retrieve the widget name.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'pcf-button';
	}

	/**
	 * Retrieve the widget title.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Contact Form 7 Popup', WPB_PCF_FREE_TEXTDOMAIN );
	}

	/**
	 * Retrieve the widget icon.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-lightbox';
	}

    /**
	 * Whether the reload preview is required or not.
	 *
	 * Used to determine whether the reload preview is required.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return bool Whether the reload preview is required.
	 */
	public function is_reload_preview_required() {
		return true;
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * Note that currently Elementor supports only one category.
	 * When multiple categories passed, Elementor uses the first one.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'general' ];
	}

	/**
	 * Register the widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function register_controls() {
		$this->start_controls_section(
			'section_content',
			[
				'label' => esc_html__( 'Content', WPB_PCF_FREE_TEXTDOMAIN ),
			]
		);

        $this->add_control(
            'form_id',
            [   
                'label'       => esc_html__( 'Select a CF7 Form', WPB_PCF_FREE_TEXTDOMAIN ),
                'description' => esc_html__( 'Select a Contact Form 7 form for popup.', WPB_PCF_FREE_TEXTDOMAIN ),
                'type'        => Controls_Manager::SELECT2,
                'label_block' => true,
                'options'     => wp_list_pluck(get_posts(array( 'post_type' => 'wpcf7_contact_form', 'numberposts' => -1 )), 'post_title', 'ID'),
            ]
        );

		$this->add_control(
			'btn_text',
			[
				'label'       => esc_html__( 'Button Text', WPB_PCF_FREE_TEXTDOMAIN ),
				'description' => esc_html__( 'You can add your own text for the button.', WPB_PCF_FREE_TEXTDOMAIN ),
				'type'        => Controls_Manager::TEXT,
				'default'     => esc_html__( 'Contact Us', WPB_PCF_FREE_TEXTDOMAIN ),
			]
		);

        $this->add_control(
			'btn_size',
			[
				'label'       => esc_html__( 'Button Size', WPB_PCF_FREE_TEXTDOMAIN ),
				'description' => esc_html__( 'Select button size. Default: Medium.', WPB_PCF_FREE_TEXTDOMAIN ),
				'type'        => \Elementor\Controls_Manager::SELECT,
				'default'     => 'medium',
				'options'     => [
					'small'  => esc_html__( 'Small', WPB_PCF_FREE_TEXTDOMAIN ),
					'medium' => esc_html__( 'Medium', WPB_PCF_FREE_TEXTDOMAIN ),
					'large'  => esc_html__( 'Large', WPB_PCF_FREE_TEXTDOMAIN ),
				],
			]
		);

        $this->add_control(
			'form_style',
			[
				'label'        => esc_html__( 'Form Style', WPB_PCF_FREE_TEXTDOMAIN ),
				'description'  => esc_html__( 'Check this to enable the form style.', WPB_PCF_FREE_TEXTDOMAIN ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'default'      => 'yes',
			]
		);

        $this->add_control(
			'allow_outside_click',
			[
				'label'        => esc_html__( 'Outside Click', WPB_PCF_FREE_TEXTDOMAIN ),
				'description'  => esc_html__( 'If checked, the user can dismiss the popup by clicking outside it.', WPB_PCF_FREE_TEXTDOMAIN ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'default'      => 'yes',
			]
		);

        $this->add_control(
			'width',
			[
				'label'      => esc_html__( 'Width', WPB_PCF_FREE_TEXTDOMAIN ),
				'type'       => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 5000,
						'step' => 5,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 500,
				],
			]
		);

        $this->add_control(
			'_btn_css_classes',
			[
				'label'   => esc_html__( 'Button CSS Classes', WPB_PCF_FREE_TEXTDOMAIN ),
				'type'    => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'prefix_class' => '',
				'title'        => esc_html__( 'Add your custom class WITHOUT the dot. e.g: my-class', WPB_PCF_FREE_TEXTDOMAIN ),
			]
		);

		$this->end_controls_section();
	}

	/**
	 * Render the widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function render() {
        global $post;
		$settings = $this->get_settings_for_display();

        $this->add_render_attribute( 'pcf_button', 'class', 'wpb-pcf-form-fire' );
        $this->add_render_attribute( 'pcf_button', 'class', 'wpb-pcf-btn' );
        $this->add_render_attribute( 'pcf_button', 'class', 'wpb-pcf-btn-default' );

        if ( ! empty( $settings['btn_size'] ) ) {
			$this->add_render_attribute( 'pcf_button', 'class', 'wpb-pcf-btn-' . $settings['btn_size'] );
		}

        if ( ! empty( $settings['_btn_css_classes'] ) ) {
			$this->add_render_attribute( 'pcf_button', 'class', $settings['_btn_css_classes'] );
		}

        if ( ! empty( $settings['form_id'] ) ) {
			$this->add_render_attribute( 'pcf_button', 'data-id', $settings['form_id'] );
		}

        if( $post ){
            $this->add_render_attribute( 'pcf_button', 'data-post_id', $post->ID );
        }

        if( $settings['form_style'] ){
            $this->add_render_attribute( 'pcf_button', 'data-form_style', $settings['form_style'] == 'yes' ? '1' : '' );
        }

        if( $settings['allow_outside_click'] ){
            $this->add_render_attribute( 'pcf_button', 'data-allow_outside_click', $settings['allow_outside_click'] == 'yes' ? '1' : '' );
        }

        if( $settings['width']['size'] ){
            $this->add_render_attribute( 'pcf_button', 'data-width', $settings['width']['size'] . $settings['width']['unit'] );
        }

		if ( defined( 'WPCF7_PLUGIN' ) ) {
            if( $settings['form_id'] ){
                echo apply_filters( 'wpb_pcf_button_html', 
                    sprintf( 
                        '<button %s>%s</button>', 
                        $this->get_render_attribute_string( 'pcf_button' ),
                        esc_html( $settings['btn_text'] ) 
                    ), 
                    $settings
                );
            }else{
                printf( '<div class="wpb-pcf-alert wpb-pcf-alert-inline wpb-pcf-alert-error">%s</div>', esc_html__( 'Form id required.', WPB_PCF_FREE_TEXTDOMAIN ) );
            }
        }else{
            printf( '<div class="wpb-pcf-alert wpb-pcf-alert-inline wpb-pcf-alert-error">%s</div>', esc_html__( 'Popup for Contact Form 7 required the Contact Form 7 plugin to work with.', WPB_PCF_FREE_TEXTDOMAIN ) );
        }
	}
}