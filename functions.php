<?php

function origami_paper_setup(){
	// Create the primary menu area
	register_nav_menu( 'paper-top-menu', __( 'Top Bar Menu', 'origami-paper' ) );
}
add_action('after_setup_theme', 'origami_paper_setup');

function origami_paper_enqueue_scripts(){
	wp_enqueue_style('origami-original', get_template_directory_uri().'/style.css');
}
add_action('wp_enqueue_scripts', 'origami_paper_enqueue_scripts', 9);

function origami_paper_filter_background($background){
	$background['default-image'] = get_stylesheet_directory_uri().'/images/background.png';
	$background['default-color'] = 'd3a268';
	return $background;
}
add_filter('origami_custom_background', 'origami_paper_filter_background');

function origami_paper_render_tape(){
	?><div id="origami-tape"></div><?php
}
add_action('origami_top_page_container', 'origami_paper_render_tape');

function origami_paper_top_menu(){
	wp_nav_menu(array(
		'theme_location' => 'paper-top-menu',
		'menu_id' => 'origami-top-menu',
		'depth' => 1,d
		'fallback_cb' => false,
	));
}
add_action('origami_top', 'origami_paper_top_menu');

/**
 * This just displays the Google web fonts. Overwrites the function in Origami parent theme.
 */
function origami_enqueue_google_webfonts(){
	wp_enqueue_style('google-webfonts', 'http://fonts.googleapis.com/css?family=Lato');
}

/**
 * We need to change some customizer values if Origami Premium is installed
 */
function origami_paper_premium_filter_customizer($settings){
	$settings['origami_fonts']['title_font']['default'] = 'Lato';
	$settings['origami_fonts']['heading_font']['default'] = 'Lato';
	unset($settings['origami_page']['border_color']);

	$settings['origami_menu']['border_color']['default'] = '#e1d8cf';
	$settings['origami_menu']['background_color']['default'] = '#f7f3ee';
	$settings['origami_menu']['text_color']['default'] = '#54514c';

	return $settings;
}
add_filter('origami_siteorigin_theme_customizer_settings', 'origami_paper_premium_filter_customizer');