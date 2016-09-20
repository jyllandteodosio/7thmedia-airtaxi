<?php
/*
	Plugin Name: Website Specific Functions Plugin
	Description: This plugin holds all the custom functions that are added to the site instead of using the theme specific functions.php file. This will serve functionality even if the site uses another theme. Please consider checking all assets and dependencies in case that a function listed here have a pre-requisit complementary plugin. 
	Version: 1.0
	Author: 7th Media Design Studios
*/

if( function_exists('acf_set_options_page_title') )

{

	acf_set_options_page_title('General Site Settings');

}





if( function_exists('acf_add_options_sub_page') )

{

    acf_add_options_sub_page( 'Footer Details' );

}



add_action('wp_logout','redirect_after_logout');

function redirect_after_logout(){

  wp_redirect(get_bloginfo('home').'/trade-access');

  exit();

}

?>