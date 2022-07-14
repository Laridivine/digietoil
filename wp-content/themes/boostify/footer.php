<footer id="footer-widgets" class="main-footer">
	<?php do_action('boostify_above_footer'); ?>
	<div class="container">
		<?php if ( is_active_sidebar( 'boostify-footer-widget-area' ) ) { ?>
			<div class="row widgets-mb">
				<?php  dynamic_sidebar( 'boostify-footer-widget-area' ); ?>
			</div>
		<?php } ?>
		<hr class="copyright-hr">
		<div class="row copyright">
			<?php 
				$footer_second_custom 	= get_theme_mod('footer_second_custom','Copyright &copy; [current_year] [site_title] | Powered by [theme_author]');
				if(!empty($footer_second_custom)):
			?>	
			
			<div class="col-md-12 col-12 text-center copyright-text">
				<?php 	
					$boostify_copyright_allowed_tags = array(
						'[current_year]' => date_i18n('Y'),
						'[site_title]'   => get_bloginfo('name'),
						'[theme_author]' => sprintf(__('<a href="#">Boostify WordPress Theme</a>', 'boostify')),
					);
				?>
				<p class="copy-text">
					<?php
						echo apply_filters('boostify_footer_copyright', wp_kses_post(boostify_str_replace_assoc($boostify_copyright_allowed_tags, $footer_second_custom)));
					?>
				</p>
			</div>
			<?php 
			endif;
				$hs_scroller 	= get_theme_mod('hs_scroller','1');	
				if($hs_scroller == '1') :
			?>
				<a href="#" class="scrollup">
					<span class="top-icon-front"><i class="fa fa-angle-up"></i></span>
					<span class="top-icon-back"><i class="fa fa-angle-up"></i></span>
				</a>
			<?php endif; ?>
		</div>
	</div>
</footer>
	 
</div>
</div>
<?php wp_footer(); ?>
</body>
</html>
