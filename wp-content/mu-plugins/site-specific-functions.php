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

add_image_size( 'featured-news', 1920, 800, true );

function new_subcategory_hierarchy() { 
    $category = get_queried_object();

    $parent_id = $category->category_parent;

    $templates = array();

    if ( $parent_id == 0 ) {
        // Use default values from get_category_template()
        $templates[] = "category-{$category->slug}.php";
        $templates[] = "category-{$category->term_id}.php";
        $templates[] = 'category.php';     
    } else {
        // Create replacement $templates array
        $parent = get_category( $parent_id );

        // Current first
        $templates[] = "category-{$category->slug}.php";
        $templates[] = "category-{$category->term_id}.php";

        // Parent second
        $templates[] = "category-{$parent->slug}.php";
        $templates[] = "category-{$parent->term_id}.php";
        $templates[] = 'category.php'; 
    }
    return locate_template( $templates );
}

add_filter( 'category_template', 'new_subcategory_hierarchy' );

//add thumbnail url to wp api query for people post type

add_action( 'rest_api_init', 'insert_thumbnail_url' );
function insert_thumbnail_url() {
    register_rest_field( 'post',
        'thumbnail',
        array(
            'get_callback'    => 'get_thumbnail_url',
            'update_callback' => null,
            'schema'          => null,
        )
    );
}

function get_thumbnail_url($post){
	if(has_post_thumbnail($post['id'])){
		$imgArray = wp_get_attachment_image_src( get_post_thumbnail_id( $post['id'] ), 'featured-news' );
		$imgURL = $imgArray[0];
		return $imgURL;
	}else{
		return false;	
	}
}

//custom excerpt 
function custom_excerpt_more($more) {
	return '...<br />';
}
add_filter('excerpt_more', 'custom_excerpt_more');

function custom_excerpt_length($length) {
	return 50;
}
add_filter('excerpt_length', 'custom_excerpt_length');

?>