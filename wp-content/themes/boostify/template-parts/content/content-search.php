<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Boostify
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class('blog-post'); ?>>
	<?php if ( has_post_thumbnail() ) { ?>
		<div class="post-thumb">
			<?php  the_post_thumbnail(); ?>
		</div>
	<?php } ?>
	<span class="post-date"><i class="fa fa-calendar"></i> <?php echo esc_html(get_the_date('M j Y')); ?></span>
	<div class="post-content">
		<ul class="meta-info list-inline">
			<li class="posted-by"><i class="fa fa-user"></i> <?php echo esc_html_e('By','boostify'); ?> <a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) ));?>"><?php esc_html(the_author()); ?></a></li>
			<?php if(has_tag()){ ?>
				<li class="tags"><i class="fa fa-tag"></i><a href="<?php esc_url(the_permalink()); ?>"><?php the_tags(''); ?></a></li>
			<?php } ?>
		</ul>                            
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