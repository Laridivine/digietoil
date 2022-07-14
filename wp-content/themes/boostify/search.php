<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Boostify
 */

get_header();
?>
<section id="blog-content" class="section-padding">
	<div class="container">
		<div class="row">
			<!-- Blog Content -->
			<div id="av-primary-content" class="<?php esc_attr(boostify_post_layout()); ?> mb-5 mb-lg-0">
			   <?php if( have_posts() ): ?>
				
					<?php while( have_posts() ) : the_post();
					
							get_template_part('template-parts/content/content','search'); 
							
					endwhile; 
					the_posts_navigation();
					?>
					
				<?php else: ?>
				
					<?php get_template_part('template-parts/content/content','none'); ?>
					
				<?php endif; ?>
			</div>
			<?php  get_sidebar(); ?>
		</div>
	</div>
</section>
<?php get_footer(); ?>
