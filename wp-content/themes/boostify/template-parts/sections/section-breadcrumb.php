<?php 
	$boostify_hs_breadcrumb	= get_theme_mod('hs_breadcrumb','1');
if($boostify_hs_breadcrumb == '1') {	
?>
<section id="breadcrumb-area">
	<div class="container">
		<div class="row">
			<div class="col-12 col-md-10 text-md-left text-center">
					<h2>
						<?php 
							if ( is_home() || is_front_page()):
			
								single_post_title();
								
							elseif ( is_day() ) : 
							
								printf( __( 'Daily Archives: %s', 'boostify' ), get_the_date() );
							
							elseif ( is_month() ) :
							
								printf( __( 'Monthly Archives: %s', 'boostify' ), (get_the_date( 'F Y' ) ));
								
							elseif ( is_year() ) :
							
								printf( __( 'Yearly Archives: %s', 'boostify' ), (get_the_date( 'Y' ) ) );
								
							elseif ( is_category() ) :
							
								printf( __( 'Category Archives: %s', 'boostify' ), (single_cat_title( '', false ) ));

							elseif ( is_tag() ) :
							
								printf( __( 'Tag Archives: %s', 'boostify' ), (single_tag_title( '', false ) ));
								
							elseif ( is_404() ) :

								printf( __( 'Error 404', 'boostify' ));
								
							elseif ( is_author() ) :
							
								printf( __( 'Author: %s', 'boostify' ), (get_the_author( '', false ) ));
								
							else :
									the_title();
									
							endif;
							
						?>
					</h2>
				
				<ul class="breadcrumb-nav list-inline">
					<?php if (function_exists('boostify_breadcrumbs')) boostify_breadcrumbs();?>
				</ul>
			</div>
			<div class="col-12 col-md-2 mt-md-0 mt-4 text-md-right text-center">
				<div class="about-icon">
					<i class="fa fa-link"></i>
				</div>                    
			</div>
		</div>
	</div>
	<div class="night">
		<div class="star"></div>
		<div class="star"></div>
		<div class="star"></div>
		<div class="star"></div>
		<div class="star"></div>
		<div class="star"></div>
		<div class="star"></div>
	</div>
</section>
<?php } ?>	