<?php

add_action( 'wp_enqueue_scripts', 'category_news_enqueue_scripts_styles' );
function category_news_enqueue_scripts_styles() {
    
    wp_enqueue_script( 'news', get_bloginfo( 'stylesheet_directory' ) . '/js/news.min.js', array( 'jquery' ), null );
    
}

get_header('custom');

//get order of news categories
$cats = get_the_category();
$cat = array();

foreach($cats as $c) {
    if($c->slug != 'news') {
        $cat = $c;
    }
}

?>
<div class="news-page-title">
   <div class="news-header-container">
       <h1>Blog Article</h1>
       <?php include('searchform-dynamic.php'); ?>
   </div>
</div>

<div class="news-landing-container">
<?php
$cat_args = $cat->slug;

$args = array(
    'post_type'     => 'post',
    'post_status'   => 'published',
    'category_name' => 'blog-article',
    'posts_per_page'=> '6',
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
    if(($news_item_count % 2) == 0) {
        $news_row = 'row-gray';
    } else {
        $news_row = '';
    }
    
?>
    <div class="news-landing-item" data-news-id="<?php echo $post->ID; ?>">
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
            <div class="news-landing-excerpt"><?php the_excerpt(); ?>
                <a href="<?php the_permalink(); ?>" class="read-more">Read More</a>
            </div>
            <div class="news-landing-content"></div>
        </article>
    </div>
    <?php
    endwhile; endif;
    wp_reset_postdata();
    
    if($news_query->found_posts > 6):
    ?>
    
    <div class="news-load-more">
        <button type="button" class="news-load-btn" data-next-page="2" data-news-cat="<?php echo $cat->term_id; ?>">View More Posts</button>
    </div>
    
    <?php endif; ?>

</div><!-- news-landing-container -->
   
<?php get_footer('custom'); ?>


