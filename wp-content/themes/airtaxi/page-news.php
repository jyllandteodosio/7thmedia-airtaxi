<?php
/**
 * Template Name: News Page
 *
 * @author 
 * @package 
 * @subpackage 
 */

add_action( 'wp_enqueue_scripts', 'news_enqueue_scripts_styles' );
function news_enqueue_scripts_styles() {
    
    wp_enqueue_script( 'news', get_bloginfo( 'stylesheet_directory' ) . '/js/airtaxi/news.js', array( 'jquery' ), null );
    
}

get_header('custom');

?>
<div class="news-page-title">
   <div class="news-header-container">
       <h1>AirTaxi.PH News</h1>
       <?php include('searchform-dynamic.php'); ?>
   </div>
</div>
<div class="news-landing-container">

<?php

//get order of news categories
$cats = get_field('category_order');
$cat_count = 0;

foreach($cats as $c) :
    $cat_count++;
    $cat = get_category($c['category']);
    $cat_link = get_category_link($cat);
    $cat_args = 'news+'.$cat->slug;
    
    $args = array(
        'post_type'     => 'post',
        'post_status'   => 'published',
        'category_name' => $cat_args,
        'posts_per_page'=> '3',
        'paged'         => '1',
        'orderby'       => 'date',
        'order'         => 'DESC'
    );
    
    ?>
    
    <div class="related-news-header top">
        <p><?php echo $cat->name; ?></p>
    </div>
    
    <?php

    $news_query = new WP_Query( $args );
    $news_item_count = 0;

    if ( $news_query->have_posts() ) : while ( $news_query->have_posts() ) : $news_query->the_post();
    
    setup_postdata($post);
    
    $news_item_count++;
    $news_row = '';
    if($news_item_count == 2) {
        $news_row = 'row-gray';
    } else {
        $news_row = '';
    }
?>    
    <div class="news-landing-item <?php echo $news_row; ?>" data-news-id="<?php echo $post->ID; ?>">
        <article>
            <div class="news-title-container">
                <h2 class="news-landing-title"><?php the_title(); ?></h2>
            </div>
            
            <?php if(get_post_thumbnail_id($post->ID)): ?>
            
            <a href="<?php the_permalink(); ?>" class="news-item-image">
                <figure>
                <?php 
                    $image_obj = wp_get_attachment_image(get_post_thumbnail_id($post->ID), $size='featured-news');
                    echo $image_obj;
                ?>
                </figure>
            </a>
            
            <?php endif; ?>
            
            <div class="news-landing-excerpt"><?php the_excerpt(); ?>
                <a href="<?php the_permalink(); ?>" class="read-more">Read More</a>
            </div>
            
            <div class="news-landing-content"></div>
        </article>
    </div>
    <?php
    endwhile; endif;
    wp_reset_postdata();
    
    
    //get next set of posts for related page
    $related_args = array(
        'post_type'     => 'post',
        'post_status'   => 'published',
        'category_name' => $cat_args,
        'posts_per_page'=> '3',
        'paged'         => '2',
        'orderby'       => 'date',
        'order'         => 'DESC'
    );
    
    $related_query = new WP_Query( $related_args );
    
    ?>

    <div class="related-news" data-news-cat="<?php echo $c['category']; ?>">
        <div class="related-news-header bottom">
            <p>Other articles about AirTaxi.PH</p>
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
                <h3 class="inner-title">
                    <a href="<?php the_permalink();?>">
                        <?php echo the_title(); ?>
                    </a>
                </h3>
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

    <div class="news-load-more">
        <a href="<?php echo $cat_link; ?>" class="news-load-link button">View More Posts</a>
    </div>    
<?php 
endforeach; 
    
?>

</div><!-- news-landing-container -->
   
<?php get_footer('custom'); ?>


