<?php 
/**
* Template Name: News - Single Post Page
*
* The template for displaying pages
*
*
* @package 
* @subpackage 
* @since  
*/


add_action( 'genesis_meta', 'single_news_genesis_meta' );

/**
 * Add widget support for single news post page. If no widgets active, display the default loop.
 *
 */
function single_news_genesis_meta() {
    
    //* single-news body class
    add_filter( 'body_class', 'news_body_class' );
    function news_body_class( $classes ) {

        $classes[] = 'single-news';
        return $classes;

    }

	if ( is_active_sidebar( 'news-related-post' ) || is_active_sidebar( 'news-recent-post' ) ) {
        
		//* Force full width content layout
		add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );

		//* Remove primary navigation
		remove_action( 'genesis_before_content_sidebar_wrap', 'genesis_do_nav' );

		//* Remove breadcrumbs
		remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs');
        
		//* Remove the default Genesis loop
		remove_action( 'genesis_loop', 'genesis_do_loop' );
        
		//* Add news page widgets
		add_action( 'genesis_loop', 'single_newspage_widgets' );

	}
}

//* Add markup for news page widgets
function single_newspage_widgets() {
    
    while ( have_posts() ) : the_post();
    
    echo '<div class="news-single-post">';
    
    $featuredURL = wp_get_attachment_url( get_post_thumbnail_id(get_field('post_id')), 'large');
    
    if($featuredURL != ""):
    echo '<div class="news-featured-image" style="background: url('.$featuredURL.');
                                                background-repeat: no-repeat;
                                                background-size: cover;
                                                background-position: center center">';
    echo '</div>'; // .news-featured-image
    endif;
    
    echo '<div class="news-single-content">';
    echo '<h1>'.get_the_title().'</h1>';
    echo '<article>'.apply_filters('the_content', get_the_content()).'</article>';
//    echo '<h4>Posted '.get_the_date().'</h4>';
    echo '</div>'; // .news-single-content

    echo '</div>'; // .news-single-post

    endwhile; 
    
    echo '<div class="news-single-after">';
    
    
	genesis_widget_area( 'news-related-post', array(
		'before' => '<main class="content-2"><div class="news-related-post widget-area"><div class="wrap">',
		'after'  => '</div></div></main>',
	) );

	genesis_widget_area( 'news-recent-post', array(
		'before' => '<aside class="sidebar sidebar-primary widget-area" role="complementary" aria-label="News Sidebar"><div class="news-recent-post widget-area"><div class="wrap">',
		'after'  => '</div></div></aside>',
	) );
    
    echo '</div>'; // .news-single-after
    
}

genesis();

get_footer();

?>