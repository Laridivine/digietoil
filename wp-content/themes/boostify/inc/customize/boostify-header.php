<?php
function boostify_header_settings( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Header Settings Panel
	=========================================*/
	$wp_customize->add_panel( 
		'header_section', 
		array(
			'priority'      => 2,
			'capability'    => 'edit_theme_options',
			'title'			=> __('Header', 'boostify'),
		) 
	);	
	
	/*=========================================
	Boostify Site Identity
	=========================================*/
	$wp_customize->add_section(
        'title_tagline',
        array(
        	'priority'      => 1,
            'title' 		=> __('Site Identity','boostify'),
			'panel'  		=> 'header_section',
		)
    );
	
	/*=========================================
	Header Navigation
	=========================================*/	
	$wp_customize->add_section(
        'header_navigation',
        array(
        	'priority'      => 4,
            'title' 		=> __('Header Navigation','boostify'),
			'panel'  		=> 'header_section',
		)
    );
	
	// Search
	$wp_customize->add_setting(
		'hdr_nav_ct_info'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'boostify_sanitize_text',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'hdr_nav_ct_info',
		array(
			'type' => 'hidden',
			'label' => __('Contact Info','boostify'),
			'section' => 'header_navigation',
		)
	);
	$wp_customize->add_setting( 
		'hs_contact_info' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'boostify_sanitize_checkbox',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'hs_contact_info', 
		array(
			'label'	      => esc_html__( 'Hide/Show', 'boostify' ),
			'section'     => 'header_navigation',
			'type'        => 'checkbox'
		) 
	);	
	
	/**
	 * Customizer Repeater for add Contact
	 */
		$wp_customize->add_setting( 'hdr_nav_ct_infos', 
			array(
			 'sanitize_callback' => 'boostify_repeater_sanitize',
			 'transport'         => $selective_refresh,
			 'priority' => 3,
			)
		);
		
		$wp_customize->add_control( 
			new Boostify_Repeater( $wp_customize, 
				'hdr_nav_ct_infos', 
					array(
						'label'   => esc_html__('Contact Info','boostify'),
						'section' => 'header_navigation',
						'add_field_label'                   => esc_html__( 'Add New', 'boostify' ),
						'item_name'                         => esc_html__( 'Contact Info', 'boostify' ),
						'customizer_repeater_icon_control' => true,
						'customizer_repeater_title_control' => true,
						'customizer_repeater_subtitle_control' => true,
						'customizer_repeater_link_control' => true,
					) 
				) 
			);
			
	
	// Search
	$wp_customize->add_setting(
		'hdr_nav_search'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'boostify_sanitize_text',
			'priority' => 6,
		)
	);

	$wp_customize->add_control(
	'hdr_nav_search',
		array(
			'type' => 'hidden',
			'label' => __('Search','boostify'),
			'section' => 'header_navigation',
		)
	);
	$wp_customize->add_setting( 
		'hide_show_search' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'boostify_sanitize_checkbox',
			'priority' => 7,
		) 
	);
	
	$wp_customize->add_control(
	'hide_show_search', 
		array(
			'label'	      => esc_html__( 'Hide/Show', 'boostify' ),
			'section'     => 'header_navigation',
			'type'        => 'checkbox'
		) 
	);	
	
	// Button
	$wp_customize->add_setting(
		'hdr_nav_btn'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'boostify_sanitize_text',
			'priority' => 10,
		)
	);

	$wp_customize->add_control(
	'hdr_nav_btn',
		array(
			'type' => 'hidden',
			'label' => __('Button','boostify'),
			'section' => 'header_navigation',
		)
	);
	$wp_customize->add_setting( 
		'hide_show_nav_btn' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'boostify_sanitize_checkbox',
			'priority' => 11,
		) 
	);
	
	$wp_customize->add_control(
	'hide_show_nav_btn', 
		array(
			'label'	      => esc_html__( 'Hide/Show', 'boostify' ),
			'section'     => 'header_navigation',
			'type'        => 'checkbox'
		) 
	);	
	
	// icon // 
	$wp_customize->add_setting(
    	'nav_btn_icon',
    	array(
	        'default' => 'fa-book',
			'sanitize_callback' => 'sanitize_text_field',
			'capability' => 'edit_theme_options',
			'priority' => 11,
		)
	);	

	$wp_customize->add_control(new Boostify_Icon_Picker_Control($wp_customize, 
		'nav_btn_icon',
		array(
		    'label'   		=> __('Icon','boostify'),
		    'section' 		=> 'header_navigation',
			'iconset' => 'fa',
			
		))  
	);	
	
	// Button Label // 
	$wp_customize->add_setting(
    	'nav_btn_lbl',
    	array(
			'sanitize_callback' => 'boostify_sanitize_text',
			'capability' => 'edit_theme_options',
			'priority' => 12,
		)
	);	

	$wp_customize->add_control( 
		'nav_btn_lbl',
		array(
		    'label'   		=> __('Button Label','boostify'),
		    'section' 		=> 'header_navigation',
			'type'		 =>	'text'
		)  
	);
	
	// Button Link // 
	$wp_customize->add_setting(
    	'nav_btn_link',
    	array(
			'sanitize_callback' => 'boostify_sanitize_url',
			'capability' => 'edit_theme_options',
			'priority' => 13,
		)
	);	

	$wp_customize->add_control( 
		'nav_btn_link',
		array(
		    'label'   		=> __('Button Link','boostify'),
		    'section' 		=> 'header_navigation',
			'type'		 =>	'text'
		)  
	);
	
	/*=========================================
	Sticky Header
	=========================================*/	
	$wp_customize->add_section(
        'sticky_header_set',
        array(
        	'priority'      => 4,
            'title' 		=> __('Sticky Header','boostify'),
			'panel'  		=> 'header_section',
		)
    );
	
	// Heading
	$wp_customize->add_setting(
		'sticky_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'boostify_sanitize_text',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'sticky_head',
		array(
			'type' => 'hidden',
			'label' => __('Sticky Header','boostify'),
			'section' => 'sticky_header_set',
		)
	);
	$wp_customize->add_setting( 
		'hide_show_sticky' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'boostify_sanitize_checkbox',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'hide_show_sticky', 
		array(
			'label'	      => esc_html__( 'Hide/Show', 'boostify' ),
			'section'     => 'sticky_header_set',
			'type'        => 'checkbox'
		) 
	);	
}
add_action( 'customize_register', 'boostify_header_settings' );

// Header selective refresh
function boostify_header_partials( $wp_customize ){
	
	// hdr_nav_ct_infos
	$wp_customize->selective_refresh->add_partial( 'hdr_nav_ct_infos', array(
		'selector'            => '.header-info',
	) );
	
	}

add_action( 'customize_register', 'boostify_header_partials' );
