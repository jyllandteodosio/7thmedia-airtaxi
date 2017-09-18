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
add_image_size( 'airplane-rates', 550, 240, true );


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

remove_filter( 'map_meta_cap', 'flamingo_map_meta_cap' );
function mycustom_flamingo_map_meta_cap( $caps, $cap, $user_id, $args ) {
    $meta_caps = array(
        'flamingo_edit_contacts' => 'edit_posts',
        'flamingo_edit_contact' => 'edit_posts',
        'flamingo_delete_contact' => 'edit_posts',
        'flamingo_edit_inbound_messages' => 'publish_posts',
        'flamingo_delete_inbound_message' => 'publish_posts',
        'flamingo_delete_inbound_messages' => 'publish_posts',
        'flamingo_spam_inbound_message' => 'publish_posts',
        'flamingo_unspam_inbound_message' => 'publish_posts' );

    $caps = array_diff( $caps, array_keys( $meta_caps ) );

    if ( isset( $meta_caps[$cap] ) )
        $caps[] = $meta_caps[$cap];

    return $caps;
}
add_filter( 'map_meta_cap', 'mycustom_flamingo_map_meta_cap', 9, 4 );

//* Add ACF to Taxonomy Query on WP REST API
function rest_prepare_locations( $response, $object ) {
    if ( $object instanceof WP_Term ) {
        $response->data['acf'] = get_fields( $object->taxonomy . '_' . $object->term_id );
    }

    return $response;
}

add_filter( 'rest_prepare_locations', 'rest_prepare_locations', 10, 2 );


?>