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
    //* Home JS
    wp_enqueue_script( 'home-js', get_stylesheet_directory_uri() . '/js/home.js');
    
    //* Video Banner JS
	wp_enqueue_script( 'video-banner', get_stylesheet_directory_uri() . '/js/videobanner.js', '', '', true);
    
    //* jVector Map JS
    wp_enqueue_script( 'jvectormap', get_stylesheet_directory_uri() . '/js/jvectormap/jquery-jvectormap-2.0.3.min.js', array( 'jquery' ), '2.0.3' );
    wp_enqueue_script( 'jvectormap-ph', get_stylesheet_directory_uri() . '/js/jvectormap/jquery-jvectormap-ph-custom.js', array( 'jquery' ), '1.0.0');
	wp_enqueue_script( 'svg-map', get_stylesheet_directory_uri() . '/js/svgmap.js', '', '', true);
    
    //* jVector Map CSS
    wp_enqueue_style( 'jvectormap-css', get_stylesheet_directory_uri() . '/js/jvectormap/jquery-jvectormap-2.0.3.css', array(),  '2.0.3' );
    
    //* Swiper JS
    wp_enqueue_script( 'swiper-custom', get_stylesheet_directory_uri() . '/js/custom/swiper.js');
    wp_enqueue_script( 'swiper', get_stylesheet_directory_uri() . '/js/swiper.min.js');
    
    //* Swiper CSS
    wp_enqueue_style( 'swiper', get_stylesheet_directory_uri() . '/css/vendor/swiper.min.css' );
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
	get_template_part('part/part', 'home-contact');
    get_footer('custom');
}

genesis();