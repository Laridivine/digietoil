<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Boostify
 */

get_header();
?>
<section id="page-404" class="section-padding">
	<div class="container">
		<div class="row">
				<div class="col-md-6 text-center mt-5 mt-md-0 order-2 order-md-1">	
					<div class="text-404">
						<?php esc_html_e('4','boostify'); ?>
						<i class="fa fa-smile-o"></i>
						<?php esc_html_e('4','boostify'); ?>
					</div>
				
					<h1><?php esc_html_e('Oops..','boostify'); ?></h1>
				
					<h3><?php esc_html_e('Something Went Wrong Here','boostify'); ?></h3>
				
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="boxed-btn"><?php esc_html_e('Go to Home','boostify'); ?></a>	
			   </div>
				<div class="col-md-6 order-1 order-md-2">
					<img src="<?php echo esc_url(get_template_directory_uri()."/assets/images/404-image.png"); ?>">
				</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>
