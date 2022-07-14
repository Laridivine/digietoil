<?php if ( get_header_image() ) : ?>
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" id="custom-header" rel="home">
		<img src="<?php esc_url(header_image()); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="<?php echo esc_attr(get_bloginfo( 'title' )); ?>">
	</a>	
<?php endif;  ?>

    <header class="main-header"> 
        <!--===// Start:  Header Top
        =================================-->   
		<?php do_action('boostify_above_header'); ?>
        <!--===// End:  Header Top
        =================================-->

        <div class="navbar-area <?php echo boostify_sticky_menu(); ?>">
            <!--===// Start: Top Navbar
            =================================-->
            <div id="top-navbar" class="top-navbar">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-2 col-md-12 col-6 py-lg-0 py-md-3 py-0 text-lg-left text-md-center text-left">
                            <div class="main-logo logo">
                                <?php
									if(has_custom_logo())
									{	
										the_custom_logo();
									}
									else { 
									?>
									<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
										<h4 class="site-title">
											<?php 
												echo esc_html(get_bloginfo('name'));
											?>
										</h4>
									</a>	
								<?php 						
									}
								?>
								<?php
									$boostify_description = get_bloginfo( 'description');
									if ($boostify_description) : ?>
										<p class="site-description"><?php echo esc_html($boostify_description); ?></p>
								<?php endif; ?>
                            </div>
                        </div>
                        <div class="col-lg-10 col-md-12 col-6 text-lg-right text-md-center text-right">
							<?php 
								$boostify_hs_contact_info	= get_theme_mod('hs_contact_info','1'); 
								$boostify_hdr_nav_ct_infos	= get_theme_mod('hdr_nav_ct_infos');
								if ($boostify_hs_contact_info == '1') {
							?>
								<div class="header-info py-lg-0 pb-md-3 pb-0 d-md-inline-block d-none">
									<?php
										if ( ! empty( $boostify_hdr_nav_ct_infos ) ) {
										$boostify_hdr_nav_ct_infos = json_decode( $boostify_hdr_nav_ct_infos );
										foreach ( $boostify_hdr_nav_ct_infos as $contact_item ) {
											$title = ! empty( $contact_item->title ) ? apply_filters( 'boostify_translate_single_string', $contact_item->title, 'Header section' ) : '';
											$subtitle = ! empty( $contact_item->subtitle ) ? apply_filters( 'boostify_translate_single_string', $contact_item->subtitle, 'Header section' ) : '';
											$icon = ! empty( $contact_item->icon_value ) ? apply_filters( 'boostify_translate_single_string', $contact_item->icon_value, 'Header section' ) : '';
											$link = ! empty( $contact_item->link ) ? apply_filters( 'boostify_translate_single_string', $contact_item->link, 'Header section' ) : '';
									?>
										<aside class="widget widget-contact">
											<div class="contact-area">
												<?php if ( ! empty( $icon ) ) {?>
													<div class="contact-icon">
														<div class="contact-corn"><i class="fa <?php echo esc_attr( $icon ); ?>"></i></div>
													</div>
												<?php } ?>
												<?php if ( ! empty( $title )  || ! empty( $subtitle )) {?>
													<div class="contact-info">
														<h6><a href="<?php echo esc_url( $link ); ?>"><?php echo esc_html( $title ); ?></a></h6>
														<p><?php echo esc_html( $subtitle ); ?></p>
													</div>
												<?php } ?>	
											</div>
										</aside>
									<?php }} ?>
								</div>
							<?php } ?>
                            <div class="cart-search py-lg-0 pb-md-3 pb-0">
                                <ul>
									<?php 
										$boostify_hs_search	= get_theme_mod('hide_show_search','1'); 
										if ($boostify_hs_search == '1') {
									?>
                                    <li>
                                        <a href="#" class="searchBtn search__open">
                                            <i>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 300 300" preserveAspectRatio="none">
                                                    <path d="M118 20c54 0 98 44 98 98s-44 98-98 98-98-44-98-98 44-98 98-98m0-20C52.8 0 0 52.8 0 118s52.8 118 118 118 118-52.8 118-118S183.2 0 118 0z"/>
                                                    <path class="st0 st_transform" d="M189 118c0-39.2-31.8-71-71-71" fill="none" stroke="inherit" stroke-width="20" stroke-miterlimit="10"/>
                                                    <path class="st0 line" fill="none" stroke="inherit" stroke-width="20" stroke-miterlimit="10" d="M192 192l83 83"/>
                                                </svg>
                                            </i>
                                        </a>
                                    </li>
									<?php } ?>
                                </ul>
                            </div>
                        </div>
                        <!-- Start Mobile Menu -->
                        <div class="mobile-menu-area d-md-none">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mobile-menu">
                                        <nav class="mobile-menu-active">
                                            <?php 
												wp_nav_menu( 
													array(  
														'theme_location' => 'primary_menu',
														'container'  => '',
														'menu_class' => 'menu-wrap',
														'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
														'walker' => new WP_Bootstrap_Navwalker()
														 ) 
													);
											?>       
                                        </nav>                                
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Mobile Menu -->
                    </div>
                </div>
            </div>
            <!--===// End: Top Navbar
            =================================-->
            
            <!--===// Start:  Navbar
            =================================-->
            <div class="navbar-navigation d-md-block d-none">
                <div class="container d-none d-md-block">
                    <div class="row">
					<?php 
						$boostify_hs_nav_btn 	= get_theme_mod( 'hide_show_nav_btn','1');
						if($boostify_hs_nav_btn != '1') {
					?>
						<div class="col-lg-12 col-md-12">
					<?php }else{ ?>	
                        <div class="col-lg-9 col-md-12">
					<?php } ?>	
                            <nav class="navbar-pc">
                                <?php 
									wp_nav_menu( 
										array(  
											'theme_location' => 'primary_menu',
											'container'  => '',
											'menu_class' => 'menu-wrap',
											'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
											'walker' => new WP_Bootstrap_Navwalker()
											 ) 
										);
								?>       
                            </nav>
                        </div>
						<?php if($boostify_hs_nav_btn == '1') { ?>
							<div class="col-lg-3 d-lg-block d-none text-right">
								<?php 
									$boostify_nav_btn_icon 		= get_theme_mod( 'nav_btn_icon','fa-book');
									$boostify_nav_btn_lbl 		= get_theme_mod( 'nav_btn_lbl');
									$boostify_nav_btn_link 		= get_theme_mod( 'nav_btn_link');
								?>
								<a href="<?php echo esc_url($boostify_nav_btn_link);?>" class="boxed-btn book-now"><i class="fa <?php echo esc_attr($boostify_nav_btn_icon);?> mr-2"></i><?php echo esc_html($boostify_nav_btn_lbl);?></a>	
							</div>
						<?php } ?>
                    </div>
                </div>
            </div>
            <!--===// End: Navbar
            =================================-->
        </div>

        <!-- Start Search -->
        <div class="search__area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="search__inner">
                            <div class="search__close__btn">
                                <button id="close-btn" class="searchBtn search__close__btn_icon"><i class="fa fa-close"></i></button>
                            </div>
                            <form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get" class="">
                                <input type="search" name="s" value="" placeholder="<?php echo esc_attr_e('Search','boostify'); ?>" class="search-field sb-field" aria-label="<?php echo esc_attr_e('Search','boostify'); ?>">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Search -->
    </header>	
<?php
if ( !is_page_template( 'templates/template-homepage.php' ) ) {
boostify_breadcrumbs_style();  
}
?>	