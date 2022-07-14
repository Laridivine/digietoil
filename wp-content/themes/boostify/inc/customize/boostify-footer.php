<?php
function boostify_footer( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	// Footer Panel // 
	$wp_customize->add_panel( 
		'footer_section', 
		array(
			'priority'      => 34,
			'capability'    => 'edit_theme_options',
			'title'			=> __('Footer', 'boostify'),
		) 
	);
	
	// Footer Setting Section // 
	$wp_customize->add_section(
        'footer_copy_Section',
        array(
            'title' 		=> __('Copyright Content','boostify'),
			'panel'  		=> 'footer_section',
			'priority'      => 4,
		)
    );
	
	// footer second text // 
	$boostify_footer_copyright = esc_html__('Copyright &copy; [current_year] [site_title] | Powered by [theme_author]', 'boostify' );
	$wp_customize->add_setting(
    	'footer_second_custom',
    	array(
			'default' => $boostify_footer_copyright, 
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'boostify_sanitize_html',
		)
	);	

	$wp_customize->add_control( 
		'footer_second_custom',
		array(
		    'label'   		=> __('Copyright Text','boostify'),
		    'section'		=> 'footer_copy_Section',
			'type' 			=> 'textarea',
			'priority'      => 6,
		)  
	);	
	
	// Footer BG // 
	$wp_customize->add_section(
        'footer_background',
        array(
            'title' 		=> __('Background','boostify'),
			'panel'  		=> 'footer_section',
			'priority'      => 5,
		)
    );	
	
	// Background Image // 
    $wp_customize->add_setting( 
    	'footer_bg_img' , 
    	array(
			'default' 			=> esc_url(get_template_directory_uri() .'/assets/images/footer-bg.jpg'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'boostify_sanitize_url',	
			'priority' => 10,
		) 
	);
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize , 'footer_bg_img' ,
		array(
			'label'          => esc_html__( 'Background Image', 'boostify'),
			'section'        => 'footer_background',
		) 
	));
	
	// Image Opacity // 	
	if ( class_exists( 'Cleverfox_Customizer_Range_Slider_Control' ) ) {
		$wp_customize->add_setting(
			'footer_bg_img_opacity',
			array(
				'default'	      => '0.7',
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'boostify_sanitize_text',
				'priority' => 11,
			)
		);
		$wp_customize->add_control( 
		new Cleverfox_Customizer_Range_Slider_Control( $wp_customize, 'footer_bg_img_opacity', 
			array(
				'label'      => __( 'opacity', 'boostify' ),
				'section'  => 'footer_background',
				'input_attrs' => array(
					'min'    => 0,
					'max'    => 0.9,
					'step'   => 0.1,
					//'suffix' => 'px', //optional suffix
				),
			) ) 
		);
	}
}
add_action( 'customize_register', 'boostify_footer' );
// Footer selective refresh
function boostify_footer_partials( $wp_customize ){
	
	// footer_second_custom
	$wp_customize->selective_refresh->add_partial( 'footer_second_custom', array(
		'selector'            => '.main-footer .copyright .copy-text',
		'settings'            => 'footer_second_custom',
		'render_callback'  => 'boostify_footer_second_custom_render_callback',
	) );
}
add_action( 'customize_register', 'boostify_footer_partials' );

// footer_second_custom
function boostify_footer_second_custom_render_callback() {
	return get_theme_mod( 'footer_second_custom' );
}
