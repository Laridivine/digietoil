<?php
class boostify_import_dummy_data {

	private static $instance;

	public static function init( ) {
		if ( ! isset( self::$instance ) && ! ( self::$instance instanceof boostify_import_dummy_data ) ) {
			self::$instance = new boostify_import_dummy_data;
			self::$instance->boostify_setup_actions();
		}

	}

	/**
	 * Setup the class props based on the config array.
	 */
	

	/**
	 * Setup the actions used for this class.
	 */
	public function boostify_setup_actions() {

		// Enqueue scripts
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'boostify_import_customize_scripts' ), 0 );

	}
	
	

	public function boostify_import_customize_scripts() {

	wp_enqueue_script( 'boostify-import-customizer-js', get_template_directory_uri() . '/assets/js/boostify-import-customizer.js', array( 'customize-controls' ) );
	}
}

$boostify_import_customizers = array(

		'import_data' => array(
			'recommended' => true,
			
		),
);
boostify_import_dummy_data::init( apply_filters( 'boostify_import_customizer', $boostify_import_customizers ) );