<?php
/**
 * Template Name: Rates Page - New
 *
 * @author 
 * @package Parallax
 * @subpackage Customizations
 */

add_action( 'wp_enqueue_scripts', 'rates_scripts' );
function rates_scripts() {
    
    //* Rates JS
    wp_enqueue_script( 'rates-js', get_stylesheet_directory_uri() . '/js/rates.js#asyncload', array('jquery'), null, true );
    
    //* Datatables CSS
    wp_enqueue_style( 'datatables-css', 'https://cdn.datatables.net/v/dt/dt-1.10.15/r-2.1.1/datatables.min.css', array(), null, 'all');
    
    //* Datatables JS
    wp_enqueue_script( 'datatables-js', 'https://cdn.datatables.net/v/dt/dt-1.10.15/r-2.1.1/datatables.min.js', array('jquery'), null, true );
    
    
}

remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
remove_action( 'genesis_entry_content', 'genesis_do_post_content' );
remove_action( 'genesis_loop', 'genesis_do_loop' );

add_action('genesis_loop', 'rates_content');
function rates_content(){
    echo '<div class="sections">';
	get_template_part('part/part', 'rates-tabs');
    get_footer('custom');
    echo '</div>';
}

genesis();