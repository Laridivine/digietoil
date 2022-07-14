<form  class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text"><?php esc_html_e( 'Search for:', 'boostify' ); ?></span>
		<input type="search" class="search-field" placeholder="<?php esc_attr_e( 'Search', 'boostify' ); ?>" value="" name="s">
	</label>
	<button type="submit" class="search-submit" value="Search">
		<i class="fa fa-search"></i>
	</button>
</form>