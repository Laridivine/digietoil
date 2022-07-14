<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Boostify
 */

get_header(); 
?>
<section id="blog-content" class="section-padding full-post">
        <div class="container">
            <div class="row">
                <!-- Blog Content -->
				<div id="av-primary-content" class="<?php esc_attr(boostify_post_layout()); ?> mb-5 mb-lg-0">
					<?php if( have_posts() ): ?>
						<?php while( have_posts() ): the_post(); ?>
							<?php get_template_part('template-parts/content/content','page-2'); ?>
						<?php endwhile; ?>
					<?php endif; ?>
                    <?php comments_template( '', true ); // show comments  ?>
                </div>
                <?php get_sidebar();  ?>
            </div>
        </div>
    </section>
<?php get_footer(); ?>
