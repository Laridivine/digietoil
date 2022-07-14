<?php
/**
 * Boostify Theme Customizer.
 *
 * @package Boostify
 */

 if ( ! class_exists( 'Boostify_Customizer' ) ) {

	/**
	 * Customizer Loader
	 *
	 * @since 1.0.0
	 */
	class Boostify_Customizer {

		/**
		 * Instance
		 *
		 * @access private
		 * @var object
		 */
		private static $instance;

		/**
		 * Initiator
		 */
		public static function get_instance() {
			if ( ! isset( self::$instance ) ) {
				self::$instance = new self;
			}
			return self::$instance;
		}

		/**
		 * Constructor
		 */
		public function __construct() {
			/**
			 * Customizer
			 */
			add_action( 'customize_preview_init',                  array( $this, 'boostify_customize_preview_js' ) );
			add_action( 'customize_register',                      array( $this, 'boostify_customizer_register' ) );
			add_action( 'after_setup_theme',                       array( $this, 'boostify_customizer_settings' ) );
		}
		
		/**
		 * Add postMessage support for site title and description for the Theme Customizer.
		 *
		 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
		 */
		function boostify_customizer_register( $wp_customize ) {
			
			$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
			$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
			$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
			$wp_customize->get_setting( 'background_color' )->transport = 'postMessage';
			$wp_customize->get_setting('custom_logo')->transport = 'refresh';
			
			/**
			 * Helper files
			 */
			require BOOSTIFY_PARENT_INC_DIR . '/custom-controls/font-control.php';
			require BOOSTIFY_PARENT_INC_DIR . '/sanitization.php';
		}
		

		/**
		 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
		 */
		function boostify_customize_preview_js() {
			wp_enqueue_script( 'boostify-customizer', BOOSTIFY_PARENT_URI . '/assets/js/customizer-preview.js', array( 'customize-preview' ), '20151215', true );
		}

		// Include customizer customizer settings.
			
		function boostify_customizer_settings() {
			 require BOOSTIFY_PARENT_INC_DIR . '/customize/boostify-header.php';
			 require BOOSTIFY_PARENT_INC_DIR . '/customize/boostify-blog.php';
			 require BOOSTIFY_PARENT_INC_DIR . '/customize/boostify-footer.php';
			 require BOOSTIFY_PARENT_INC_DIR . '/customize/boostify-general.php';
			 require BOOSTIFY_PARENT_INC_DIR . '/customize/customizer_recommended_plugin.php';
			 require BOOSTIFY_PARENT_INC_DIR . '/customize/customizer_import_data.php';
			 require BOOSTIFY_PARENT_INC_DIR . '/customize/boostify-premium.php';
		}

	}
}// End if().

/**
 *  Kicking this off by calling 'get_instance()' method
 */
Boostify_Customizer::get_instance();