<?php
/**
 * Custom header implementation
 */

function digital_marketing_lite_custom_header_setup() {

	add_theme_support( 'custom-header', apply_filters( 'digital_marketing_lite_custom_header_args', array(

		'default-text-color'     => 'fff',
		'header-text' 			 =>	false,
		'width'                  => 1280,
		'height'                 => 75,
		'wp-head-callback'       => 'digital_marketing_lite_header_style',
	) ) );
}

add_action( 'after_setup_theme', 'digital_marketing_lite_custom_header_setup' );

if ( ! function_exists( 'digital_marketing_lite_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see digital_marketing_lite_custom_header_setup().
 */
add_action( 'wp_enqueue_scripts', 'digital_marketing_lite_header_style' );
function digital_marketing_lite_header_style() {
	//Check if user has defined any header image.
	if ( get_header_image() ) :
	$custom_css = "
        .top-header {
			background-image:url('".esc_url(get_header_image())."');
			background-position: center top;
		}";
	   	wp_add_inline_style( 'digital-marketing-lite-basic-style', $custom_css );
	endif;
}
endif; // digital_marketing_lite_header_style