<?php
 /**
 * Enqueue scripts and styles.
 */
function boostify_scripts() {
	
	// Styles	
	wp_enqueue_style('bootstrap-min',get_template_directory_uri().'/assets/css/bootstrap.min.css');
	
	wp_enqueue_style('owl-carousel-min',get_template_directory_uri().'/assets/css/owl.carousel.min.css');

	wp_enqueue_style('owl-theme-default-min',get_template_directory_uri().'/assets/css/owl.theme.default.min.css');
	
	wp_enqueue_style('font-awesome',get_template_directory_uri().'/assets/css/fonts/font-awesome/css/font-awesome.min.css');
	
	
	wp_enqueue_style('boostify-editor-style',get_template_directory_uri().'/assets/css/editor-style.css');

	wp_enqueue_style('boostify-color-default', get_template_directory_uri() . '/assets/css/colors/default.css');

	wp_enqueue_style('meanmenu', get_template_directory_uri() . '/assets/css/meanmenu.min.css');

	wp_enqueue_style('boostify-widgets',get_template_directory_uri().'/assets/css/widget.css');
	
	wp_enqueue_style('boostify-typography',get_template_directory_uri().'/assets/css/typography/typography.css');
	
	wp_enqueue_style('boostify-main', get_template_directory_uri() . '/assets/css/main.css');
	
	wp_enqueue_style('boostify-media-query', get_template_directory_uri() . '/assets/css/responsive.css');
	
	wp_enqueue_style( 'boostify-style', get_stylesheet_uri() );
	
	// Scripts
	wp_enqueue_script( 'jquery' );
	
	wp_enqueue_script('popper', get_template_directory_uri() . '/assets/js/popper.min.js', array('jquery'), false, true);
	
	wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), false, true);
	
	wp_enqueue_script('owl-carousel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array('jquery'), true);
	
	wp_enqueue_script('meanmenu', get_template_directory_uri() . '/assets/js/jquery.meanmenu.min.js', array('jquery'), true);
	
	wp_enqueue_script('sticky-js', get_template_directory_uri() . '/assets/js/jquery.sticky.js', array('jquery'), true);
	
	wp_enqueue_script('jquery-ripples', get_template_directory_uri() . '/assets/js/jquery.ripples-min.js', array('jquery'),false, true);
	
	wp_enqueue_script('particles', get_template_directory_uri() . '/assets/js/particles.min.js', array('jquery'), true);
	
	wp_enqueue_script('wow-min', get_template_directory_uri() . '/assets/js/wow.min.js', array('jquery'), false, true);
	
	wp_enqueue_script('boostify-custom-js', get_template_directory_uri() . '/assets/js/custom.js', array('jquery'), false, true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'boostify_scripts' );

//Admin Enqueue for Admin
function boostify_admin_enqueue_scripts(){
	wp_enqueue_style('boostify-admin-style', get_template_directory_uri() . '/assets/css/admin.css');
	wp_enqueue_script( 'boostify-admin-script', get_template_directory_uri() . '/assets/js/boostify-admin-script.js', array( 'jquery' ), '', true );
    wp_localize_script( 'boostify-admin-script', 'boostify_ajax_object',
        array( 'ajax_url' => admin_url( 'admin-ajax.php' ) )
    );
}
add_action( 'admin_enqueue_scripts', 'boostify_admin_enqueue_scripts' );