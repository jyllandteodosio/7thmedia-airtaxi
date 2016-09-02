<?php
/**
 * This file adds the .
 *
 * @author 
 * @package 
 * @subpackage 
 */

//get_header('custom');

add_action( 'genesis_meta', 'parallax_home_genesis_meta' );
/**
 * Add widget support for homepage. If no widgets active, display the default loop.
 *
 */
function parallax_home_genesis_meta() {

		//* Add homepage widgets
		add_action( 'genesis_loop', 'parallax_membership_widgets' );
}

//* Add markup for homepage widgets
function parallax_membership_widgets() {

	genesis_widget_area( 'membership-section-0', array(
		'before' => '<div id="membership-section-0" class="home-odd home-section-0 widget-area"><div class="wrap">',
		'after'  => '</div></div>',
	) );

	genesis_widget_area( 'membership-section-1', array(
		'before' => '<div id="membership-section-1" class="home-odd home-section-1 widget-area"><div class="wrap">',
		'after'  => '</div></div>',
	) );

}

genesis();

