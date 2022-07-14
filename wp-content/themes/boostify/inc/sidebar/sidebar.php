<?php	
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package boostify
 */

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */

function boostify_widgets_init() {
	
	register_sidebar( array(
		'name' => __( 'Sidebar Widget Area', 'boostify' ),
		'id' => 'boostify-sidebar-primary',
		'description' => __( 'The Primary Widget Area', 'boostify' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h5 class="widget-title">',
		'after_title' => '</h5><hr>',
	) );
	register_sidebar( array(
		'name' => __( 'Footer Widget Area', 'boostify' ),
		'id' => 'boostify-footer-widget-area',
		'description' => __( 'The Footer Widget Area', 'boostify' ),
		'before_widget' => '<div class="col-lg-3 col-md-6 mb-lg-0 mb-4"><aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside></div>',
		'before_title' => '<h5 class="widget-title">',
		'after_title' => '</h5><hr>',
	) );	
}
add_action( 'widgets_init', 'boostify_widgets_init' );