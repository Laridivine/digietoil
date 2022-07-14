<?php
/**
Template Name: Fullwidth Page
**/

get_header();
?>
<section class="section-padding">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 mb-5 mb-lg-0">
				<?php 		
					the_post(); the_content(); 
					
					if( $post->comment_status == 'open' ) { 
						 comments_template( '', true ); // show comments 
					}
				?>
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>

