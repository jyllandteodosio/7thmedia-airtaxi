<?php
//* Start the engine
include_once( get_template_directory() . '/lib/init.php' );

//* Setup Theme
include_once( get_stylesheet_directory() . '/lib/theme-defaults.php' );

//* Set Localization (do not remove)
load_child_theme_textdomain( 'parallax', apply_filters( 'child_theme_textdomain', get_stylesheet_directory() . '/languages', 'parallax' ) );

//* Add Image upload to WordPress Theme Customizer
add_action( 'customize_register', 'parallax_customizer' );
function parallax_customizer(){

	require_once( get_stylesheet_directory() . '/lib/customize.php' );
	
}

//* Include Section Image CSS
include_once( get_stylesheet_directory() . '/lib/output.php' );

//* Child theme (do not remove)
define( 'CHILD_THEME_NAME', 'AirTaxi' );
define( 'CHILD_THEME_URL', '' );
define( 'CHILD_THEME_VERSION', '1.0' );

//* Enqueue scripts and styles
add_action( 'wp_enqueue_scripts', 'parallax_enqueue_scripts_styles' );
function parallax_enqueue_scripts_styles() {

	wp_enqueue_script( 'parallax-responsive-menu', get_bloginfo( 'stylesheet_directory' ) . '/js/responsive-menu.js#asyncload', array( 'jquery' ), '1.0.0' );
    
    wp_enqueue_script( 'parallax-airtaxi', get_bloginfo( 'stylesheet_directory' ) . '/js/airtaxi.min.js#asyncload', array( 'jquery' ), '1.0.0' );
    
    wp_enqueue_script( 'blImageCenter', get_bloginfo( 'stylesheet_directory' ) . '/js/jquery.blImageCenter.js#asyncload', array( 'jquery' ), '', true );
    
    wp_enqueue_style( 'main', get_bloginfo( 'stylesheet_directory' ) . '/scss/main.css', array(), CHILD_THEME_VERSION );

	wp_enqueue_style( 'dashicons' );
    
    wp_enqueue_style( 'fontawesome', get_bloginfo( 'stylesheet_directory' ) . '/font-awesome/css/font-awesome.min.css', array(), CHILD_THEME_VERSION );
    
	wp_enqueue_style( 'parallax-google-fonts', '//fonts.googleapis.com/css?family=Dancing+Script|Lato', array(), CHILD_THEME_VERSION );

}

//* Add HTML5 markup structure
add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );

//* Add viewport meta tag for mobile browsers
add_theme_support( 'genesis-responsive-viewport' );

//* Reposition the primary navigation menu
remove_action( 'genesis_after_header', 'genesis_do_nav' );
//add_action( 'genesis_header', 'genesis_do_nav' );

//* Reposition the secondary navigation menu
//remove_action( 'genesis_after_header', 'genesis_do_subnav' );
//add_action( 'genesis_footer', 'genesis_do_subnav', 7 );

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

//* Add support for additional color styles
//add_theme_support( 'genesis-style-selector', array(
//	'parallax-pro-blue'   => __( 'Parallax Pro Blue', 'parallax' ),
//	'parallax-pro-green'  => __( 'Parallax Pro Green', 'parallax' ),
//	'parallax-pro-orange' => __( 'Parallax Pro Orange', 'parallax' ),
//	'parallax-pro-pink'   => __( 'Parallax Pro Pink', 'parallax' ),
//) );

//* Unregister secondary sidebar
unregister_sidebar( 'sidebar-alt' );

//* Add support for custom header
add_theme_support( 'custom-header', array(
	'width'           => 360,
	'height'          => 70,
	'header-selector' => '.site-title a',
	'header-text'     => false,
) );

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

//remove_action( 'genesis_footer', 'genesis_footer_markup_open', 5 );
//remove_action( 'genesis_footer', 'genesis_do_footer' );
//remove_action( 'genesis_footer', 'genesis_footer_markup_close', 15 );


/**
* CUSTOM CODE====================================================
*/
/**
 * Replace "themeslug" with your theme's unique slug
 *
 * @see http://codex.wordpress.org/Theme_Review#Guidelines
 */
add_filter( 'single_template', 'themeslug_single_template' );

/**
 * Add category considerations to the templates WordPress uses for single posts
 *
 * @global obj $post The default WordPress post object. Used so we have an ID for get_post_type()
 * @param string $template The currently located template from get_single_template()
 * @return string The new locate_template() result
 */
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

    /**
     * Let WordPress figure out if the templates exist or not.
     *
     * @see http://codex.wordpress.org/Function_Reference/locate_template
     */
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

//* Register widget areas
genesis_register_sidebar( array(
	'id'          => 'home-section-0',
	'name'        => __( 'Home Section 0', 'parallax' ),
	'description' => __( 'This is the home section 0 section.', 'parallax' ),
) );
genesis_register_sidebar( array(
	'id'          => 'home-section-1',
	'name'        => __( 'Home Section 1', 'parallax' ),
	'description' => __( 'This is the home section 1 section.', 'parallax' ),
) );
genesis_register_sidebar( array(
	'id'          => 'home-section-2',
	'name'        => __( 'Home Section 2', 'parallax' ),
	'description' => __( 'This is the home section 2 section.', 'parallax' ),
) );
genesis_register_sidebar( array(
	'id'          => 'home-section-3',
	'name'        => __( 'Home Section 3', 'parallax' ),
	'description' => __( 'This is the home section 3 section.', 'parallax' ),
) );
genesis_register_sidebar( array(
	'id'          => 'home-section-4',
	'name'        => __( 'Home Section 4', 'parallax' ),
	'description' => __( 'This is the home section 4 section.', 'parallax' ),
) );
genesis_register_sidebar( array(
	'id'          => 'home-section-5',
	'name'        => __( 'Home Section 5', 'parallax' ),
	'description' => __( 'This is the home section 5 section.', 'parallax' ),
) );
genesis_register_sidebar( array(
	'id'          => 'home-section-6',
	'name'        => __( 'Home Section 6', 'parallax' ),
	'description' => __( 'This is the home section 6 section.', 'parallax' ),
) );
genesis_register_sidebar( array(
	'id'          => 'home-section-7',
	'name'        => __( 'Home Section 7', 'parallax' ),
	'description' => __( 'This is the home section 7 section.', 'parallax' ),
) );
genesis_register_sidebar( array(
	'id'          => 'home-section-8',
	'name'        => __( 'Home Section 8', 'parallax' ),
	'description' => __( 'This is the home section 8 section.', 'parallax' ),
) );


function filter_by_category( $query ) {
    if ( $query->is_archive() && $query->is_main_query() ) {
        $query->set( 'category_name', 'news' );
    }
}
add_action( 'pre_get_posts', 'filter_by_category' );

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

//* Adds async attribute to scripts
function ikreativ_async_scripts($url)
{
    if ( strpos( $url, '#asyncload') === false )
        return $url;
    else if ( is_admin() )
        return str_replace( '#asyncload', '', $url );
    else
	return str_replace( '#asyncload', '', $url )."' async='async"; 
    }
add_filter( 'clean_url', 'ikreativ_async_scripts', 11, 1 );
