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
            
            wp_enqueue_script( 'front-page', get_bloginfo( 'stylesheet_directory' ) . '/js/front-page.min.js#asyncload', array( 'jquery' ), null );
            
            wp_enqueue_script( 'front-page-2', get_bloginfo( 'stylesheet_directory' ) . '/js/front-page-2.min.js#deferload', array( 'jquery' ), null );
            
            wp_enqueue_script( 'jvectormap', get_bloginfo( 'stylesheet_directory' ) . '/js/jvectormap/jquery-jvectormap-2.0.3.min.js#deferload', array( 'jquery' ), null );
    
            wp_enqueue_script( 'jvectormap-ph', get_bloginfo( 'stylesheet_directory' ) . '/js/jvectormap/jquery-jvectormap-ph-custom.js#deferload', array( 'jquery' ), null);

            wp_enqueue_script( 'google-map', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyDVwnNpcIWP1hUr4mGUsCL1tHo12FLFOOs#deferload', array(), null, true );

            wp_enqueue_script( 'google-map-init', get_stylesheet_directory_uri() . '/js/maps/google-maps.js#deferload', array('google-map', 'jquery'), null, true );

            wp_enqueue_script( 'fullpage-scrolloverflow', get_bloginfo( 'stylesheet_directory' ) . '/js/fullpage/vendors/scrolloverflow.min.js#asyncload', array( 'jquery' ), null );

            wp_enqueue_script( 'fullpage', get_bloginfo( 'stylesheet_directory' ) . '/js/fullpage/jquery.fullPage.js', array( 'jquery' ), null );
            
            wp_enqueue_style( 'jvectormap-css', get_bloginfo( 'stylesheet_directory' ) . '/js/jvectormap/jquery-jvectormap-2.0.3.css', array(),  null );
    
//            wp_enqueue_style( 'fullpage-css', get_bloginfo( 'stylesheet_directory' ) . '/js/fullpage/jquery.fullPage.css', array(), CHILD_THEME_VERSION );
            
            wp_dequeue_style( 'wpsm-comptable-styles' );
            wp_dequeue_style( 'contact-form-7' );
            wp_dequeue_style( 'dashicons' );
            wp_dequeue_style( 'accordion_archives' );
            wp_dequeue_style( 'meteor-slides' );
            
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
    
    ?>
    <style type="text/css" title="meteor-slides-front">
        div.meteor-slides{clear:both;float:none;height:auto!important;line-height:0;margin:0;max-width:100%;overflow:visible!important;padding:0;position:relative;z-index:1}div.meteor-slides.meteor-left{clear:none;float:left;margin:0 20px 20px 0}div.meteor-slides.meteor-right{clear:none;float:right;margin:0 0 20px 20px}div.meteor-slides.meteor-center{margin:0 auto}div.meteor-slides.navboth,div.meteor-slides.navpaged{margin-bottom:20px}.meteor-slides .meteor-clip{line-height:0;margin:0;overflow:hidden;padding:0;position:relative;width:100%}.meteor-slides .meteor-shim,.meteor-slides .mslide img{border:0;height:auto!important;max-width:100%;width:auto\9}.meteor-slides .meteor-shim{margin:0;padding:0}.meteor-slides a:focus{outline:0}.meteor-slides .mslide{display:none;height:auto!important;margin:0;max-width:100%;padding:0}.single-slide .mslide{display:block}.meteor-slides .mslide a{border:0;margin:0;padding:0}.meteor-slides .mslide img{box-shadow:none!important;display:block;margin:auto!important;padding:0!important}.meteor-slides .mslide img[src$='.png']{-ms-filter:"progid:DXImageTransform.Microsoft.gradient(startColorstr=#00FFFFFF,endColorstr=#00FFFFFF)";filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#00FFFFFF, endColorstr=#00FFFFFF);zoom:1}.meteor-slides ul.meteor-nav{display:none;list-style:none;height:auto;margin:0!important;padding:0}.meteor-slides.navhover ul.meteor-nav{display:inline}ul.meteor-nav li{display:inline;height:auto;list-style:none;margin:0;padding:0}.meteor-slides .meteor-buttons a,.meteor-slides .meteor-nav a{border:none;box-shadow:none;display:block;outline:0;text-indent:-9999px;transition:all 0s ease 0s}.meteor-nav .prev a{left:0;background:url(../images/prev.png) center right no-repeat}.meteor-slides .meteor-nav a{position:absolute;width:27px;height:100%;z-index:998}.meteor-nav .prev a:hover{background:url(../images/prev.png) center left no-repeat}.meteor-nav .next a{right:0;background:url(../images/next.png) center left no-repeat}.meteor-nav .next a:hover{background:url(../images/next.png) center right no-repeat}* html .meteor-nav .prev a{background:url(../images/prev.gif) center right no-repeat}* html .meteor-nav .prev a:hover{background:url(../images/prev.gif) center left no-repeat}* html .meteor-nav .next a{background:url(../images/next.gif) center left no-repeat}* html .meteor-nav .next a:hover{background:url(../images/next.gif) center right no-repeat}.meteor-slides .meteor-buttons{bottom:-15px;box-sizing:initial;height:9px;left:0;margin:0;padding:6px 0 0;position:absolute;width:100%;z-index:999}header#branding .meteor-buttons{left:5px}.meteor-slides .meteor-buttons a{background:url(../images/buttons.png) bottom left no-repeat;float:left;width:9px;height:9px;margin:0 3px 0 0!important}.meteor-buttons a.activeSlide,.meteor-buttons a:hover{background:url(../images/buttons.png) bottom right no-repeat}* html .meteor-buttons a{background:url(../images/buttons.gif) bottom left no-repeat}* html .meteor-buttons a.activeSlide,* html .meteor-buttons a:hover{background:url(../images/buttons.gif) bottom right no-repeat}
    </style>
    <style type="text/css" title="fullpage-front">
        .fp-auto-height.fp-section,
        .fp-auto-height .fp-slide,
        .fp-auto-height .fp-tableCell{
            height: auto !important;
        }

        .fp-responsive .fp-auto-height-responsive.fp-section,
        .fp-responsive .fp-auto-height-responsive .fp-slide,
        .fp-responsive .fp-auto-height-responsive .fp-tableCell {
            height: auto !important;
        }
    </style>
    <?php
    
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

