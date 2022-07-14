<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Boostify
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class('blog-post blog-post-single'); ?>>                     
	<?php if ( has_post_thumbnail() ) { ?>
		<div class="post-thumb">
			<?php  the_post_thumbnail(); ?>
		</div>
	<?php } ?>
	<div class="post-content">
		<?php     
			if ( is_single() ) :
			
			the_title('<h5 class="post-title">', '</h5>' );
			
			else:
			
			the_title( sprintf( '<h5 class="post-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h5>' );
			
			endif; 
			
			the_content( 
					sprintf( 
						__( 'Read More', 'boostify' ), 
						'<span class="screen-reader-text">  '.esc_html(get_the_title()).'</span>' 
					) 
				);
		?> 
	</div>
</article>