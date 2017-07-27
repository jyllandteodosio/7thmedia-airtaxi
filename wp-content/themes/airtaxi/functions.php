<?php
//* Start the engine
include_once( get_template_directory() . '/lib/init.php' );

//* Setup Theme
include_once( get_stylesheet_directory() . '/lib/theme-defaults.php' );

//* Set Localization (do not remove)
load_child_theme_textdomain( 'parallax', apply_filters( 'child_theme_textdomain', get_stylesheet_directory() . '/languages', 'parallax' ) );

//* Child theme (do not remove)
define( 'CHILD_THEME_NAME', 'AirTaxi' );
define( 'CHILD_THEME_URL', '' );
define( 'CHILD_THEME_VERSION', '1.0' );

//* Enqueue scripts and styles
add_action( 'wp_enqueue_scripts', 'parallax_enqueue_scripts_styles' );
function parallax_enqueue_scripts_styles() {

	wp_enqueue_script( 'parallax-responsive-menu', get_bloginfo( 'stylesheet_directory' ) . '/js/responsive-menu.js#asyncload', array( 'jquery' ), null );
    
    wp_enqueue_script( 'parallax-airtaxi', get_bloginfo( 'stylesheet_directory' ) . '/js/airtaxi.min.js#asyncload', array( 'jquery' ), null );
    
//    wp_enqueue_script( 'blImageCenter', get_bloginfo( 'stylesheet_directory' ) . '/js/jquery.blImageCenter.js#asyncload', array( 'jquery' ), null, true );
    
    wp_enqueue_style( 'main', get_bloginfo( 'stylesheet_directory' ) . '/scss/main.css', array(), null );

	wp_enqueue_style( 'dashicons' );
    
    wp_enqueue_style( 'fontawesome', get_bloginfo( 'stylesheet_directory' ) . '/font-awesome/css/font-awesome.min.css', array(), null );
    
	wp_enqueue_style( 'parallax-google-fonts', '//fonts.googleapis.com/css?family=Dancing+Script:400,700|Lato:300,400,700', array(), null );
    
    wp_dequeue_style( 'expanding-archives' );
}

//* Add HTML5 markup structure
add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );

//* Add viewport meta tag for mobile browsers
add_theme_support( 'genesis-responsive-viewport' );

//* Reposition the primary navigation menu
remove_action( 'genesis_after_header', 'genesis_do_nav' );

//* Reduce the secondary navigation menu to one level depth
add_filter( 'wp_nav_menu_args', 'parallax_secondary_menu_args' );
function parallax_secondary_menu_args( $args ){
	if( 'secondary' != $args['theme_location'] )
	return $args;
	$args['depth'] = 1;
	return $args;
}

//* Unregister layout settings
genesis_unregister_layout( 'content-sidebar-sidebar' );
genesis_unregister_layout( 'sidebar-content-sidebar' );
genesis_unregister_layout( 'sidebar-sidebar-content' );

//* Unregister secondary sidebar
unregister_sidebar( 'sidebar-alt' );

//* Add support for structural wraps
add_theme_support( 'genesis-structural-wraps', array(
	'header',
	'nav',
	'subnav',
	'footer-widgets',
	'footer',
) );

//* Modify the size of the Gravatar in the author box
add_filter( 'genesis_author_box_gravatar_size', 'parallax_author_box_gravatar' );
function parallax_author_box_gravatar( $size ) {
	return 176;
}

//* Modify the size of the Gravatar in the entry comments
add_filter( 'genesis_comment_list_args', 'parallax_comments_gravatar' );
function parallax_comments_gravatar( $args ) {
	$args['avatar_size'] = 120;
	return $args;
}
/**
* CUSTOM CODE====================================================
*/
/**
 * Replace "themeslug" with your theme's unique slug
 */
add_filter( 'single_template', 'themeslug_single_template' );
function themeslug_single_template( $template ) {
    global $post;

    $categories = get_the_category();

    if ( ! $categories )
        return $template; // no need to continue if there are no categories

    $post_type = get_post_type( $post->ID );
    $templates = array();

    foreach ( $categories as $category ) {
        $templates[] = "single-{$post_type}-{$category->slug}.php";
        $templates[] = "single-{$post_type}-{$category->term_id}.php";
    }

    // remember the default templates
    $templates[] = "single-{$post_type}.php";
    $templates[] = 'single.php';
    $templates[] = 'index.php';

    return locate_template( $templates );
}

//* Add support for 3-column footer widgets
add_theme_support( 'genesis-footer-widgets', 1 );

//* Add support for after entry widget
add_theme_support( 'genesis-after-entry-widget-area' );

//* Relocate after entry widget
remove_action( 'genesis_after_entry', 'genesis_after_entry_widget_area' );
add_action( 'genesis_after_entry', 'genesis_after_entry_widget_area', 5 );

//* Changed widget title markup from h4 to h2
add_filter( 'genesis_register_sidebar_defaults', 'custom_register_sidebar_defaults' );

function custom_register_sidebar_defaults( $defaults ) {
	$defaults['before_title'] = '<h2 class="widget-title widgettitle">';
	$defaults['after_title'] = '</h2>';
	return $defaults;
}

//* Search Results Page Widget Areas
function archive_widgets_init() {

    register_sidebar( array(
        'name'          => 'Search Results Sidebar',
        'id'            => 'search-results-sidebar',
        'before_widget' => '<div class="search-sidebar-container">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ) );

}
add_action( 'widgets_init', 'archive_widgets_init' );

function custom_header_attribute() {
    //* Set what goes inside the wrapping tags
	$inside = sprintf( '<a href="%s">%s</a>', trailingslashit( home_url() ), get_bloginfo( 'name' ) );
	$wrap = 'p';

	//* Build the title
	$title  = genesis_html5() ? sprintf( "<{$wrap} %s title='%s'>", genesis_attr( 'site-title' ), "AirTaxi.PH - Premier Helicopter and Jet Charter Services in the Philippines" ) : sprintf( '<%s id="title">%s</%s>', $wrap, $inside, $wrap );
	$title .= genesis_html5() ? "{$inside}</{$wrap}>" : '';
    
    //* Echo (filtered)
	echo apply_filters( 'genesis_seo_title', $title, $inside, $wrap );
}

//* Adds async to core WP scripts
add_filter( 'script_loader_tag', 'wsds_async_scripts', 10, 3 );
function wsds_async_scripts( $tag, $handle, $src ) {

	// The handles of the enqueued scripts we want to async
	$async_scripts = array( 
		'jquery',
        'magnific-popup',
        'wpmp',
        'html5shiv',
        'wp-gallery-custom-links-js',
	);

    if ( in_array( $handle, $async_scripts ) ) {
        return '<script src="' . $src . '" async="async" type="text/javascript"></script>' . "\n";
    }
    return $tag;
} 

//* Adds defer to core WP scripts
add_filter( 'script_loader_tag', 'wsds_defer_scripts', 10, 3 );
function wsds_defer_scripts( $tag, $handle, $src ) {

	// The handles of the enqueued scripts we want to defer
	$defer_scripts = array( 
		'jquery',
		'jquery-migrate',
		'jquery-cycle',
		'jquery-metadata',
		'jquery-touchwipe',
		'fullpage',
		'meteorslides-script',
        'contact-form-7',
	);

    if ( in_array( $handle, $defer_scripts ) ) {
        return '<script src="' . $src . '" defer="defer" type="text/javascript"></script>' . "\n";
    }
    return $tag;
} 

//* Adds async attribute to scripts
function ikreativ_async_scripts($url) {
    if ( strpos( $url, '#asyncload') === false )
        return $url;
    else if ( is_admin() )
        return str_replace( '#asyncload', '', $url );
    else
	return str_replace( '#asyncload', '', $url )."' async='async"; 
}
add_filter( 'clean_url', 'ikreativ_async_scripts', 11, 1 );

//* Adds defer attribute to scripts
function ikreativ_defer_scripts($url) {
    if ( strpos( $url, '#deferload') === false )
        return $url;
    else if ( is_admin() )
        return str_replace( '#deferload', '', $url );
    else
	return str_replace( '#deferload', '', $url )."' defer='defer"; 
}
add_filter( 'clean_url', 'ikreativ_defer_scripts', 11, 1 );

remove_action( 'genesis_site_title', 'genesis_seo_site_title' );
add_action( 'genesis_site_title', 'custom_header_attribute' );
