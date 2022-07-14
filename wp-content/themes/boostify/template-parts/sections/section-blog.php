<?php  
	$boostify_hs_blog			= get_theme_mod('hs_blog','1');
	$boostify_blog_title		= get_theme_mod('blog_title');
	$boostify_blog_desc			= get_theme_mod('blog_description');
	$boostify_blog_display_num 	= get_theme_mod('blog_display_num','4');
	if($boostify_hs_blog == '1'){
?>
<section id="recent-blog" class="section-padding home-blog">
	<div class="container">
		<?php if ( ! empty( $boostify_blog_title )  || ! empty( $boostify_blog_desc )) : ?>
			<div class="row">
				<div class="col-lg-6 offset-lg-3">                    
					<div class="section-header text-center">
						<?php if ( ! empty( $boostify_blog_title ) ) : ?>
							<h2><?php echo wp_kses_post($boostify_blog_title); ?></h2>
						<?php endif; ?>	
						
						<?php if ( ! empty( $boostify_blog_desc ) ) : ?>		
							<p><?php echo wp_kses_post($boostify_blog_desc); ?></p>    
						<?php endif; ?>	
					</div>
				</div>
			</div>
		<?php endif; ?>
		<div class="row">
			<?php 	
				$boostify_blog_args = array( 'post_type' => 'post', 'posts_per_page' => $boostify_blog_display_num,'post__not_in'=>get_option("sticky_posts")) ; 	
					$boostify_wp_query = new WP_Query($boostify_blog_args);
					if($boostify_wp_query)
					{	
					while($boostify_wp_query->have_posts()):$boostify_wp_query->the_post(); ?>
					<div class="col-lg-6 mb-4">
						<?php get_template_part('template-parts/content/content','page'); ?>
					</div>
			<?php endwhile; } wp_reset_postdata(); ?>
		</div>
	</div>
</section>
<?php } ?>