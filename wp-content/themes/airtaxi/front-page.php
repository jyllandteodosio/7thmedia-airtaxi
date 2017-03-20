<?php
/**
 * Template Name: Front Page
 *
 * This file adds the Home Page to the Parallax Pro Theme.
 *
 * @author 
 * @package Parallax
 * @subpackage Customizations
 */

add_action( 'genesis_meta', 'parallax_home_genesis_meta' );
/**
 * Add widget support for homepage. If no widgets active, display the default loop.
 *
 */
function parallax_home_genesis_meta() {

	if ( is_active_sidebar( 'home-section-0' ) || is_active_sidebar( 'home-section-1' ) || is_active_sidebar( 'home-section-2' ) || is_active_sidebar( 'home-section-3' ) || is_active_sidebar( 'home-section-4' ) || is_active_sidebar( 'home-section-5' ) || is_active_sidebar( 'home-section-6' ) || is_active_sidebar( 'home-section-7' ) || is_active_sidebar( 'home-section-8' ) ) {

		//* Enqueue parallax script
		add_action( 'wp_enqueue_scripts', 'parallax_enqueue_parallax_script' );
		function parallax_enqueue_parallax_script() {

			if ( ! wp_is_mobile() ) {
				wp_enqueue_script( 'parallax-script', get_bloginfo( 'stylesheet_directory' ) . '/js/parallax.js#asyncload', array( 'jquery' ), '1.0.0' );
			}
            
            wp_enqueue_script( 'front-page', get_bloginfo( 'stylesheet_directory' ) . '/js/front-page.min.js#asyncload', array( 'jquery' ), '1.0.0' );
            
            wp_enqueue_script( 'front-page-2', get_bloginfo( 'stylesheet_directory' ) . '/js/front-page-2.min.js#deferload', array( 'jquery' ), '1.0.0' );
            
            wp_enqueue_script( 'jvectormap', get_bloginfo( 'stylesheet_directory' ) . '/js/jvectormap/jquery-jvectormap-2.0.3.min.js#deferload', array( 'jquery' ), '2.0.3' );
    
            wp_enqueue_script( 'jvectormap-ph', get_bloginfo( 'stylesheet_directory' ) . '/js/jvectormap/jquery-jvectormap-ph-custom.js#deferload', array( 'jquery' ), '1.0.0');

            wp_enqueue_script( 'google-map', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyDVwnNpcIWP1hUr4mGUsCL1tHo12FLFOOs#deferload', array(), '3', true );

            wp_enqueue_script( 'google-map-init', get_stylesheet_directory_uri() . '/js/maps/google-maps.js#deferload', array('google-map', 'jquery'), '0.1', true );

            wp_enqueue_script( 'fullpage-scrolloverflow', get_bloginfo( 'stylesheet_directory' ) . '/js/fullpage/vendors/scrolloverflow.min.js#asyncload', array( 'jquery' ), '1.0.0' );

            wp_enqueue_script( 'fullpage', get_bloginfo( 'stylesheet_directory' ) . '/js/fullpage/jquery.fullPage.js', array( 'jquery' ), '1.0.0' );
            
            wp_enqueue_style( 'jvectormap-css', get_bloginfo( 'stylesheet_directory' ) . '/js/jvectormap/jquery-jvectormap-2.0.3.css', array(),  '2.0.3' );
    
            wp_enqueue_style( 'fullpage-css', get_bloginfo( 'stylesheet_directory' ) . '/js/fullpage/jquery.fullPage.css', array(), CHILD_THEME_VERSION );
            
            wp_dequeue_style( 'wpsm-comptable-styles' );
            wp_dequeue_style( 'contact-form-7' );
            wp_dequeue_style( 'dashicons' );
            wp_dequeue_style( 'accordion_archives' );
            
		}

		//* Add parallax-home body class
		add_filter( 'body_class', 'parallax_body_class' );
		function parallax_body_class( $classes ) {
		
   			$classes[] = 'parallax-home';
  			return $classes;
  			
		}

		//* Force full width content layout
		add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );

		//* Remove primary navigation
		remove_action( 'genesis_before_content_sidebar_wrap', 'genesis_do_nav' );

		//* Remove breadcrumbs
		remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs');

		//* Remove the default Genesis loop
		remove_action( 'genesis_loop', 'genesis_do_loop' );

		//* Add homepage widgets
		add_action( 'genesis_loop', 'parallax_homepage_widgets' );

	}
}

//* Add markup for homepage widgets
function parallax_homepage_widgets() {
    
    $base_url = get_site_url();
    $image = get_field('footer_logo', 'option');
    
    echo '<div class="sections">';
    
	genesis_widget_area( 'home-section-0', array(
		'before' => '<div class="home-odd home-section-0 widget-area section fp-auto-height"><div class="wrap">',
		'after'  => '</div></div>',
	) );

	genesis_widget_area( 'home-section-1', array(
		'before' => '<div class="home-even home-section-1 widget-area section fp-auto-height"><div class="wrap">',
		'after'  => '</div></div>',
	) );

	genesis_widget_area( 'home-section-2', array(
		'before' => '<div class="home-odd home-section-2 widget-area section fp-auto-height"><div class="base-locations-wrap"><div class="wrap">',
		'after'  => '</div></div></div>',
	) );

	genesis_widget_area( 'home-section-3', array(
		'before' => '<div class="home-even home-section-3 widget-area section fp-auto-height"><div class="fleet-gallery"><div class="wrap">',
		'after'  => '</div></div></div>',
	) );

	genesis_widget_area( 'home-section-4', array(
		'before' => '<div class="home-odd home-section-4 widget-area section fp-auto-height" ><div class="wrap">',
		'after'  => '</div></div>',
	) );
    
    genesis_widget_area( 'home-section-5', array(
		'before' => '<div class="home-even home-section-5 widget-area section fp-auto-height"><div class="wrap">',
		'after'  => '</div></div>',
	) );
    
    genesis_widget_area( 'home-section-6', array(
		'before' => '<div class="home-odd home-section-6 widget-area section fp-auto-height"><div class="wrap">',
		'after'  => '</div></div>',
	) );
    
    genesis_widget_area( 'home-section-7', array(
		'before' => '<div class="home-even home-section-7 widget-area section fp-auto-height"><div class="contact-us-wrap"><div class="wrap">',
		'after'  => '</div></div></div>',
	) );
    
    genesis_widget_area( 'home-section-8', array(
		'before' => '<div id="footer" class="home-odd home-section-8 widget-area section fp-auto-height"><div class="wrap"><footer><div class="footer-container"><div class="footer-logo left"><img width="200px" src="'.$image['url'].'" alt="AirTaxi.PH"/><small>© Copyright 2017. All Rights Reserved. Web Design and Development by <a href="http://7thmedia.com/" title="7th Media Digital Studio Inc." target="_blank">7th Media</a></small></div><div class="footer-links right">',
		'after'  => '</div></div></footer></div></div>',
	) );
    
    echo '</div>'; //* .sections

}


genesis();

