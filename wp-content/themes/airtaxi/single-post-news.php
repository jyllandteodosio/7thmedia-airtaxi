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
}

get_header('custom');

?>

<?php if (have_posts() ): while ( have_posts() ) : the_post(); ?>
   
    <div class="news-single-post">
    <?php  
        $featuredURL = wp_get_attachment_image( get_post_thumbnail_id(get_field('post_id')), 'full');
    ?>
        <?php if($featuredURL != ""): ?>
           
            <div class="news-featured-image">
                <?php echo $featuredURL; ?>
            </div>
            
        <?php endif; ?>
    
        <div class="news-single-content">
            <h1><?php the_title(); ?></h1>
            <article><?php the_content(); ?></article>
        </div><!--.news-single-content-->
        
        <?php
        
        $exclude_post = $post->ID;
        $cats = get_the_category();
        $news_cat = get_term_by($field='slug', $value='news', $taxonomy='category');
        
        foreach($cats as $c) {
            if($c->slug != 'news' && $c->parent == $news_cat->term_id) {
                $cat = $c;
            }
        }
        
        $cat_args = 'news+'.$cat->slug;

        //get next set of posts for related page
        $related_args = array(
            'post_type'     => 'post',
            'post_status'   => 'published',
            'posts_per_page'=> '3',
            'paged'         => '1',
            'category_name' => $cat_args,
            'orderby'       => 'date',
            'order'         => 'DESC',
            'post__not_in'  => array($exclude_post),
        );

        $related_query = new WP_Query( $related_args );

        ?>

        <div class="related-news">
            <div class="related-news-header">
                <p><?php echo $cat->name; ?></p>
            </div>
            <div class="related-news-container">
                <?php
                if ( $related_query->have_posts() ) : while ( $related_query->have_posts() ) : $related_query->the_post();

                setup_postdata($post);

                $rel_img = get_post_thumbnail_id($post->ID);
                $rel_img_url = wp_get_attachment_image_src($rel_img, $size='medium');

                ?>
                <div class="related-news-item" style="
                   background: 
                   linear-gradient(
                   rgba(255,255,255,0.85),
                   rgba(255,255,255,0.85)), 
                   url(<?php echo $rel_img_url[0];?>) no-repeat center center; background-size: cover">
                    <h2 class="inner-title">
                        <a href="<?php the_permalink();?>">
                            <?php echo the_title(); ?>
                        </a>
                    </h2>
                    <div class="related-news-excerpt">
                        <?php the_excerpt(); ?>
                    </div>
                </div> 
                <?php
                endwhile; endif;
                wp_reset_postdata();
                ?>
            </div>
        </div> <!-- related-news -->
        
    </div><!--.news-single-post-->
    
<?php endwhile; endif; ?>


<?php get_footer('custom'); ?>