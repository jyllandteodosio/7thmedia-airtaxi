<?php
/**
 * Template Name: News Page
 *
 * @author 
 * @package 
 * @subpackage 
 */


add_action( 'genesis_meta', 'parallax_news_genesis_meta' );
/**
 * Add widget support for news page. If no widgets active, display the default loop.
 *
 */
function parallax_news_genesis_meta() {

	if ( is_active_sidebar( 'news-featured' ) || is_active_sidebar( 'news-related-post' ) || is_active_sidebar( 'news-recent-post' ) ) {

		//* Force full width content layout
		add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );

		//* Remove primary navigation
		remove_action( 'genesis_before_content_sidebar_wrap', 'genesis_do_nav' );

		//* Remove breadcrumbs
		remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs');
        
		//* Remove the default Genesis loop
		remove_action( 'genesis_loop', 'genesis_do_loop' );

		//* Add news page widgets
		add_action( 'genesis_loop', 'parallax_newspage_widgets' );

	}
}

//* Add markup for news page widgets
function parallax_newspage_widgets() {
    
    $base_url = get_site_url();
    
	genesis_widget_area( 'news-featured', array(
		'before' => '<div class="news-featured widget-area"><div class="wrap">',
		'after'  => '</div></div>',
	) );
    
    echo '<div class="news-after-entry">';
    
	genesis_widget_area( 'news-related-post', array(
		'before' => '<main class="content-2"><div class="news-related-post widget-area"><div class="wrap">',
		'after'  => '</div></div></main>',
	) );

	genesis_widget_area( 'news-recent-post', array(
		'before' => '<aside class="sidebar sidebar-primary widget-area" role="complementary" aria-label="News Sidebar"><div class="news-recent-post widget-area"><div class="wrap">',
		'after'  => '</div></div></aside>',
	) );
    
    echo '</div>'; //* .news-after-entry
    
}

genesis();

get_footer('custom');

?>


