<?php
/**
 * Template Name: Front Page - New
 *
 * This file adds the Home Page to the Parallax Pro Theme.
 *
 * @author 
 * @package Parallax
 * @subpackage Customizations
 */

add_action( 'wp_enqueue_scripts', 'home_scripts' );
function home_scripts() {
	wp_enqueue_script( 'video-banner', get_stylesheet_directory_uri() . '/js/videobanner.js', '', '', true);
    
    wp_enqueue_script( 'jvectormap', get_stylesheet_directory_uri() . '/js/jvectormap/jquery-jvectormap-2.0.3.min.js', array( 'jquery' ), '2.0.3' );
    wp_enqueue_script( 'jvectormap-ph', get_stylesheet_directory_uri() . '/js/jvectormap/jquery-jvectormap-ph-custom.js', array( 'jquery' ), '1.0.0');
	wp_enqueue_script( 'svg-map', get_stylesheet_directory_uri() . '/js/svgmap.js', '', '', true);
    
    wp_enqueue_style( 'jvectormap-css', get_stylesheet_directory_uri() . '/js/jvectormap/jquery-jvectormap-2.0.3.css', array(),  '2.0.3' );
}

remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
remove_action( 'genesis_entry_content', 'genesis_do_post_content' );
remove_action( 'genesis_loop', 'genesis_do_loop' );

add_action('genesis_loop', 'home_banner');
function home_banner(){
	get_template_part('part/part', 'home-banner');
	get_template_part('part/part', 'home-membership');
	get_template_part('part/part', 'home-destination');
	get_template_part('part/part', 'home-call');
	get_template_part('part/part', 'home-fleet');
	get_template_part('part/part', 'home-text');
	get_template_part('part/part', 'home-about');
}

//add_action('genesis_before_footer', 'contact_us');
//function contact_us(){
//	echo '<div id="contact-us" class="section-contact-us">';
//		echo '<div class="banner-divider"></div>';
//		echo '<div class="contact-us-container">';
//			get_template_part('part/part', 'contact-us-banner');
//			//echo do_shortcode('[contact-form-7 id="197" title="Contact Form - ENG"]');
//			get_template_part('part/part', 'google-map-script');
//		echo '</div>';
//	echo '</div>';
//}

//add_action('genesis_before_footer', 'homepage_script');
//function homepage_script(){
//	get_template_part('part/script', 'homepage');
//}

genesis();