<?php 

	$digital_marketing_lite_custom_style = '';

	// Logo Size
	$digital_marketing_lite_logo_top_padding = get_theme_mod('digital_marketing_lite_logo_top_padding');
	$digital_marketing_lite_logo_bottom_padding = get_theme_mod('digital_marketing_lite_logo_bottom_padding');
	$digital_marketing_lite_logo_left_padding = get_theme_mod('digital_marketing_lite_logo_left_padding');
	$digital_marketing_lite_logo_right_padding = get_theme_mod('digital_marketing_lite_logo_right_padding');

	if( $digital_marketing_lite_logo_top_padding != '' || $digital_marketing_lite_logo_bottom_padding != '' || $digital_marketing_lite_logo_left_padding != '' || $digital_marketing_lite_logo_right_padding != ''){
		$digital_marketing_lite_custom_style .=' .logo {';
			$digital_marketing_lite_custom_style .=' padding-top: '.esc_attr($digital_marketing_lite_logo_top_padding).'px; padding-bottom: '.esc_attr($digital_marketing_lite_logo_bottom_padding).'px; padding-left: '.esc_attr($digital_marketing_lite_logo_left_padding).'px; padding-right: '.esc_attr($digital_marketing_lite_logo_right_padding).'px;';
		$digital_marketing_lite_custom_style .=' }';
	}

	// service section padding
	$digital_marketing_lite_about_section_padding = get_theme_mod('digital_marketing_lite_about_section_padding');

	if( $digital_marketing_lite_about_section_padding != ''){
		$digital_marketing_lite_custom_style .=' #about_us {';
			$digital_marketing_lite_custom_style .=' padding-top: '.esc_attr($digital_marketing_lite_about_section_padding).'px; padding-bottom: '.esc_attr($digital_marketing_lite_about_section_padding).'px;';
		$digital_marketing_lite_custom_style .=' }';
	}

	// Site Title Font Size
	$digital_marketing_lite_site_title_font_size = get_theme_mod('digital_marketing_lite_site_title_font_size');
	if( $digital_marketing_lite_site_title_font_size != ''){
		$digital_marketing_lite_custom_style .=' .logo h1.site-title, .logo p.site-title {';
			$digital_marketing_lite_custom_style .=' font-size: '.esc_attr($digital_marketing_lite_site_title_font_size).'px;';
		$digital_marketing_lite_custom_style .=' }';
	}

	// Site Tagline Font Size
	$digital_marketing_lite_site_tagline_font_size = get_theme_mod('digital_marketing_lite_site_tagline_font_size');
	if( $digital_marketing_lite_site_tagline_font_size != ''){
		$digital_marketing_lite_custom_style .=' .logo p.site-description {';
			$digital_marketing_lite_custom_style .=' font-size: '.esc_attr($digital_marketing_lite_site_tagline_font_size).'px;';
		$digital_marketing_lite_custom_style .=' }';
	}