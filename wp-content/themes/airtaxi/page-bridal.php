<?php
/**
 * Template Name: Bridal Packages Page
 *
 * @author 
 * @package Parallax
 * @subpackage Customizations
 */

add_action( 'wp_enqueue_scripts', 'bridal_scripts' );
function bridal_scripts() {
    
    //* Rates JS
    wp_enqueue_script( 'rates-js', get_stylesheet_directory_uri() . '/js/rates.js#asyncload', array('jquery'), null, true );
    
    //* Datatables CSS
    wp_enqueue_style( 'datatables-css', 'https://cdn.datatables.net/v/dt/dt-1.10.15/r-2.1.1/datatables.min.css', array(), null, 'all');
    
    //* Datatables JS
    wp_enqueue_script( 'datatables-js', 'https://cdn.datatables.net/v/dt/dt-1.10.15/r-2.1.1/datatables.min.js', array('jquery'), null, true );
    
    //* Slick JS
    wp_enqueue_script( 'slick-js', get_stylesheet_directory_uri() . '/js/slick/slick.min.js', array( 'jquery' ), null );
    
    //* Slick CSS
    wp_enqueue_style( 'slick', get_stylesheet_directory_uri() . '/js/slick/slick.css', array(),  null );
    wp_enqueue_style( 'slick-theme', get_stylesheet_directory_uri() . '/js/slick/slick-theme.css', array(),  null );
    
}

remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
remove_action( 'genesis_entry_content', 'genesis_do_post_content' );
remove_action( 'genesis_loop', 'genesis_do_loop' );

add_action('genesis_loop', 'bridal_content');
function bridal_content(){
    echo '<div class="sections">';
	get_template_part('part/part', 'rates-bridal');
    get_footer('custom');
    echo '</div>';
}

genesis();