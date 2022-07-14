<?php
/**
 * Template Name: Custom Home
 */

get_header(); ?>

<?php do_action( 'digital_marketing_lite_above_slider' ); ?>

<?php if( get_theme_mod('digital_marketing_lite_slider_hide_show',false) != false){ ?>
	<section id="slider">
	  	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel"> 
		    <?php $digital_marketing_lite_slider_pages = array();
		      	for ( $count = 1; $count <= 4; $count++ ) {
			        $mod = intval( get_theme_mod( 'digital_marketing_lite_slider' . $count ));
			        if ( 'page-none-selected' != $mod ) {
			          	$digital_marketing_lite_slider_pages[] = $mod;
			        }
		      	}
		      	if( !empty($digital_marketing_lite_slider_pages) ) :
		        $args = array(
		          	'post_type' => 'page',
		          	'post__in' => $digital_marketing_lite_slider_pages,
		          	'orderby' => 'post__in'
		        );
		        $query = new WP_Query( $args );
		        if ( $query->have_posts() ) :
		          $i = 1;
		    ?>     
		    <div class="carousel-inner" role="listbox">
		      	<?php  while ( $query->have_posts() ) : $query->the_post(); ?>
		        <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
		          	<a href="<?php echo esc_url( get_permalink() );?>"><?php the_post_thumbnail(); ?></a>
		          	<div class="carousel-caption">
			            <div class="inner_carousel">
			              	<h1><?php the_title(); ?></h1>
			              	<hr>
			              	<p><?php $excerpt = get_the_excerpt(); echo esc_html( digital_marketing_lite_string_limit_words( $excerpt,25 ) ); ?></p>
			            </div>
			            <div class="read-btn">
		            		<a href="<?php the_permalink(); ?>" class="" title="<?php esc_attr_e( 'READ MORE', 'digital-marketing-lite' ); ?>"><?php esc_html_e('READ MORE','digital-marketing-lite'); ?></a>
				       	</div>
		          	</div>
		        </div>
		      	<?php $i++; endwhile; 
		      	wp_reset_postdata();?>
		    </div>
		    <?php else : ?>
		    <div class="no-postfound"></div>
		      <?php endif;
		    endif;?>
		    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
	      		<span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
		    </a>
		    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
	      		<span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
		    </a>
	  	</div>  
	  	<div class="clearfix"></div>
	</section>
<?php }?>

<?php do_action('digital_marketing_lite_below_slider'); ?>

<?php if( get_theme_mod('digital_marketing_lite_post') != ''){ ?>
	<section id="about_us">
	 	<div class="container">
		<?php
	        $digital_marketing_lite_postData =  get_theme_mod('digital_marketing_lite_post');
	        if($digital_marketing_lite_postData){
	          	$args = array( 'name' => esc_html($digital_marketing_lite_postData ,'digital-marketing-lite'));
	          	$query = new WP_Query( $args );
	          	if ( $query->have_posts() ) :
		            while ( $query->have_posts() ) : $query->the_post(); ?>
			            <div class="row m-0">
			            	<div class="col-lg-7 col-md-6">
			                    <h2><?php esc_html(the_title()); ?></h2>
			                    <p><?php the_excerpt(); ?></p>
			                    <div class="more-btn">
		                      		<a href="<?php the_title(); ?>"><?php esc_html_e('View More','digital-marketing-lite'); ?></a>
			                    </div>
			                </div>
			              	<div class="col-lg-5 col-md-6">
			              		<div class="image-box">
			                  		<?php if(has_post_thumbnail()) { ?><?php the_post_thumbnail(); ?><?php } ?>
			               		</div>
			            	</div>
			            </div>
		            <?php endwhile; 
		            wp_reset_postdata();?>
	            <?php else : ?>
	              <div class="no-postfound"></div>
	            <?php
	        endif;} ?>   
	 	</div>
	</section>
<?php }?> 

<?php do_action('digital_marketing_lite_below_about_section'); ?>

<div class="container lz-content">
  	<?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
    <?php endwhile; // end of the loop. ?>
</div>

<?php get_footer(); ?>