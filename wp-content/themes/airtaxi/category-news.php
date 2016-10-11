<?php
/**
 * Template Name: News Page
 *
 * @author 
 * @package 
 * @subpackage 
 */

get_header('custom');

//get order of news categories
$cat = $wp_query->get_queried_object();

?>
<div class="news-page-title">
    <h1><?php echo $cat->name; ?></h1>
</div>

<div class="news-landing-container">
<?php
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

$news_query = new WP_Query( $args );
$news_item_count = 0;

if ( $news_query->have_posts() ) : while ( $news_query->have_posts() ) : $news_query->the_post();

    setup_postdata($post);

    $news_item_count++;
    $news_row = '';
    if(($news_item_count % 2) == 1) {
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
            <a href="<?php the_permalink(); ?>" class="news-item-image">
                <figure>
                <?php 
                    $image_obj = wp_get_attachment_image(get_post_thumbnail_id($post->ID), $size='featured-news');
                    echo $image_obj;
                ?>
                </figure>
            </a>
            <div class="news-landing-excerpt"><?php the_advanced_excerpt(); ?></div>
            <div class="news-landing-content"></div>
        </article>
    </div>
    <?php
    endwhile; endif;
    wp_reset_postdata();
    
    if($news_query->found_posts > 3):
    ?>
    
    <div class="news-load-more">
        <button type="button" class="news-load-btn">View More Posts</button>
    </div>    
    
    <?php endif; ?>

</div><!-- news-landing-container -->
   
<?php get_footer('custom'); ?>


