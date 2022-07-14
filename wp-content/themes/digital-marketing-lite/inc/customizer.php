<?php
/**
 * digital-marketing-lite: Customizer
 *
 * @subpackage digital-marketing-lite
 * @since 1.0
 */

function digital_marketing_lite_customize_register( $wp_customize ) {

	$wp_customize->add_setting('digital_marketing_lite_logo_padding',array(
		'sanitize_callback'	=> 'esc_html'
	));
	$wp_customize->add_control('digital_marketing_lite_logo_padding',array(
		'label' => __('Logo Padding','digital-marketing-lite'),
		'section' => 'title_tagline'
	));

	$wp_customize->add_setting('digital_marketing_lite_logo_top_padding',array(
		'default' => '',
		'sanitize_callback'	=> 'digital_marketing_lite_sanitize_float'
	));
	$wp_customize->add_control('digital_marketing_lite_logo_top_padding',array(
		'type' => 'number',
		'description' => __('Top','digital-marketing-lite'),
		'section' => 'title_tagline',
	));

	$wp_customize->add_setting('digital_marketing_lite_logo_bottom_padding',array(
		'default' => '',
		'sanitize_callback'	=> 'digital_marketing_lite_sanitize_float'
	));
	$wp_customize->add_control('digital_marketing_lite_logo_bottom_padding',array(
		'type' => 'number',
		'description' => __('Bottom','digital-marketing-lite'),
		'section' => 'title_tagline',
	));

	$wp_customize->add_setting('digital_marketing_lite_logo_left_padding',array(
		'default' => '',
		'sanitize_callback'	=> 'digital_marketing_lite_sanitize_float'
	));
	$wp_customize->add_control('digital_marketing_lite_logo_left_padding',array(
		'type' => 'number',
		'description' => __('Left','digital-marketing-lite'),
		'section' => 'title_tagline',
	));

	$wp_customize->add_setting('digital_marketing_lite_logo_right_padding',array(
		'default' => '',
		'sanitize_callback'	=> 'digital_marketing_lite_sanitize_float'
	));
	$wp_customize->add_control('digital_marketing_lite_logo_right_padding',array(
		'type' => 'number',
		'description' => __('Right','digital-marketing-lite'),
		'section' => 'title_tagline',
	));

	$wp_customize->add_setting('digital_marketing_lite_show_site_title',array(
		'default' => true,
		'sanitize_callback'	=> 'digital_marketing_lite_sanitize_checkbox'
	));
	$wp_customize->add_control('digital_marketing_lite_show_site_title',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Site Title','digital-marketing-lite'),
		'section' => 'title_tagline'
	));

	$wp_customize->add_setting('digital_marketing_lite_site_title_font_size',array(
		'default' => '',
		'sanitize_callback'	=> 'digital_marketing_lite_sanitize_float'
	));
	$wp_customize->add_control('digital_marketing_lite_site_title_font_size',array(
		'type' => 'number',
		'label' => __('Site Title Font Size','digital-marketing-lite'),
		'section' => 'title_tagline',
	));

	$wp_customize->add_setting('digital_marketing_lite_show_tagline',array(
		'default' => true,
		'sanitize_callback'	=> 'digital_marketing_lite_sanitize_checkbox'
	));
	$wp_customize->add_control('digital_marketing_lite_show_tagline',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Site Tagline','digital-marketing-lite'),
		'section' => 'title_tagline'
	));

	$wp_customize->add_setting('digital_marketing_lite_site_tagline_font_size',array(
		'default' => '',
		'sanitize_callback'	=> 'digital_marketing_lite_sanitize_float'
	));
	$wp_customize->add_control('digital_marketing_lite_site_tagline_font_size',array(
		'type' => 'number',
		'label' => __('Site Tagline Font Size','digital-marketing-lite'),
		'section' => 'title_tagline',
	));

	$wp_customize->add_panel( 'digital_marketing_lite_panel_id', array(
		'priority' => 10,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Theme Settings', 'digital-marketing-lite' ),
		'description' => __( 'Description of what this panel does.', 'digital-marketing-lite' ),
	) );

	$wp_customize->add_section( 'digital_marketing_lite_theme_options_section', array(
    	'title'      => __( 'General Settings', 'digital-marketing-lite' ),
		'priority'   => 30,
		'panel' => 'digital_marketing_lite_panel_id'
	) );

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('digital_marketing_lite_theme_options',array(
		'default' => 'Right Sidebar',
		'sanitize_callback' => 'digital_marketing_lite_sanitize_choices'	        
	));

	$wp_customize->add_control('digital_marketing_lite_theme_options',array(
		'type' => 'radio',
		'label' => __('Do you want this section','digital-marketing-lite'),
		'section' => 'digital_marketing_lite_theme_options_section',
		'choices' => array(
		   'Left Sidebar' => __('Left Sidebar','digital-marketing-lite'),
		   'Right Sidebar' => __('Right Sidebar','digital-marketing-lite'),
		   'One Column' => __('One Column','digital-marketing-lite'),
		   'Three Columns' => __('Three Columns','digital-marketing-lite'),
		   'Four Columns' => __('Four Columns','digital-marketing-lite'),
		   'Grid Layout' => __('Grid Layout','digital-marketing-lite')
		),
	));

	// Top Bar
	$wp_customize->add_section( 'digital_marketing_lite_top_bar', array(
    	'title'      => __( 'Top Bar', 'digital-marketing-lite' ),
		'priority'   => null,
		'panel' => 'digital_marketing_lite_panel_id'
	) );

	$wp_customize->add_setting('digital_marketing_lite_email_address',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_email'
	));	
	$wp_customize->add_control('digital_marketing_lite_email_address',array(
		'label'	=> __('Add Email Address','digital-marketing-lite'),
		'section'=> 'digital_marketing_lite_top_bar',
		'setting'=> 'digital_marketing_lite_email_address',
		'type'=> 'text'
	));

	$wp_customize->add_setting('digital_marketing_lite_phone_number',array(
		'default'=> '',
		'sanitize_callback'	=> 'digital_marketing_lite_sanitize_phone_number'
	));	
	$wp_customize->add_control('digital_marketing_lite_phone_number',array(
		'label'	=> __('Add Phone Number','digital-marketing-lite'),
		'section'=> 'digital_marketing_lite_top_bar',
		'setting'=> 'digital_marketing_lite_phone_number',
		'type'=> 'text'
	));

	//home page slider
	$wp_customize->add_section( 'digital_marketing_lite_slider_section' , array(
    	'title'     => __( 'Slider Settings', 'digital-marketing-lite' ),
		'priority'  => null,
		'panel' => 'digital_marketing_lite_panel_id'
	) );

	$wp_customize->add_setting('digital_marketing_lite_slider_hide_show',array(
		'default' => false,
		'sanitize_callback' => 'digital_marketing_lite_sanitize_checkbox'
	));
	$wp_customize->add_control('digital_marketing_lite_slider_hide_show',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide slider','digital-marketing-lite'),
		'description' => __('Image Size ( 1400px x 660 )','digital-marketing-lite'),
		'section' => 'digital_marketing_lite_slider_section',
	));

	for ( $count = 1; $count <= 4; $count++ ) {
		$wp_customize->add_setting( 'digital_marketing_lite_slider' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'digital_marketing_lite_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'digital_marketing_lite_slider' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'digital-marketing-lite' ),
			'section'  => 'digital_marketing_lite_slider_section',
			'type'     => 'dropdown-pages'
		) );
	}

	//Abut Us
	$wp_customize->add_section('digital_marketing_lite_about_us',array(
		'title'	=> __('About Us','digital-marketing-lite'),
		'description'	=> __('Add content here.','digital-marketing-lite'),
		'panel' => 'digital_marketing_lite_panel_id',
	));

	$args =  array('numberposts' => 0);
	$post_list = get_posts($args);
	$i = 0;
	$psts[]='Select';  
	foreach($post_list as $post){
		$psts[$post->post_title] = $post->post_title;
	}

	$wp_customize->add_setting('digital_marketing_lite_post',array(
		'sanitize_callback' => 'digital_marketing_lite_sanitize_choices',
	));
	$wp_customize->add_control('digital_marketing_lite_post',array(
		'type'    => 'select',
		'choices' => $psts,
		'label' => __('Select post','digital-marketing-lite'),
		'section' => 'digital_marketing_lite_about_us',
	));

	$wp_customize->add_setting('digital_marketing_lite_about_section_padding',array(
       'default' => '',
       'sanitize_callback'	=> 'digital_marketing_lite_sanitize_float'
    ));
    $wp_customize->add_control('digital_marketing_lite_about_section_padding',array(
       'type' => 'number',
       'label' => __('Section Top Bottom Padding','digital-marketing-lite'),
       'section' => 'digital_marketing_lite_about_us',
    ));
	
	//Footer
    $wp_customize->add_section( 'digital_marketing_lite_footer', array(
    	'title'      => __( 'Footer Text', 'digital-marketing-lite' ),
		'priority'   => null,
		'panel' => 'digital_marketing_lite_panel_id'
	) );

	$wp_customize->add_setting('digital_marketing_lite_show_back_totop',array(
 		'default' => true,
   	'sanitize_callback'	=> 'digital_marketing_lite_sanitize_checkbox'
	));
	$wp_customize->add_control('digital_marketing_lite_show_back_totop',array(
   	'type' => 'checkbox',
   	'label' => __('Show / Hide Back to Top','digital-marketing-lite'),
   	'section' => 'digital_marketing_lite_footer'
	));

 	$wp_customize->add_setting('digital_marketing_lite_footer_copy',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('digital_marketing_lite_footer_copy',array(
		'label'	=> __('Footer Text','digital-marketing-lite'),
		'section'	=> 'digital_marketing_lite_footer',
		'setting'	=> 'digital_marketing_lite_footer_copy',
		'type'		=> 'text'
	));

	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport  = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'digital_marketing_lite_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'digital_marketing_lite_customize_partial_blogdescription',
	) );
}
add_action( 'customize_register', 'digital_marketing_lite_customize_register' );

function digital_marketing_lite_customize_partial_blogname() {
	bloginfo( 'name' );
}

function digital_marketing_lite_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

function digital_marketing_lite_is_static_front_page() {
	return ( is_front_page() && ! is_home() );
}

function digital_marketing_lite_is_view_with_layout_option() {
	// This option is available on all pages. It's also available on archives when there isn't a sidebar.
	return ( is_page() || ( is_archive() && ! is_active_sidebar( 'sidebar-1' ) ) );
}

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Digital_Marketing_Lite_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'Digital_Marketing_Lite_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new Digital_Marketing_Lite_Customize_Section_Pro(
				$manager,
				'digital_marketing_lite_example_1',
				array(
					'priority' => 9,
					'title'    => esc_html__( 'Digital Marketing Pro ', 'digital-marketing-lite' ),
					'pro_text' => esc_html__( 'Go Pro','digital-marketing-lite' ),
					'pro_url'  => esc_url( 'https://www.luzuk.com/products/digital-marketing-wordpress-theme/' ),
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'digital-marketing-lite-customize-controls', trailingslashit( esc_url(get_template_directory_uri()) ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'digital-marketing-lite-customize-controls', trailingslashit( esc_url(get_template_directory_uri()) ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
Digital_Marketing_Lite_Customize::get_instance();