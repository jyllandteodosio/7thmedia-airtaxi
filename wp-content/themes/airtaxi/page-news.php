<?php
/**
 * Template Name: News Page
 *
 * @author 
 * @package 
 * @subpackage 
 */

get_header('custom');

$cats = get_field('category_order');

$news_cats = array();

foreach($cats as $cat) {
    $cat_object = get_the_category($cat['category']);
    var_dump($cat['category']);
}

print_r($news_cats);

$args = array(
    'post_type'     => 'post',
    'post_status'   => 'published',
    'posts_per_page'=> '3',
    'category_name' => 'news',
    'orderby'       => 'date',
    'order'         => 'DESC'
);

$news_query = new WP_Query( $args );

?>
<div class="news-landing-container">

    <?php
    if ( $news_query->have_posts() ) : while ( $news_query->have_posts() ) : $news_query->the_post();
    ?>
    
    <article>
        <h2><?php the_title(); ?></h2>
        <figure><?php the_post_thumbnail(); ?></figure>
        <p><?php the_advanced_excerpt(); ?></p>
    </article>
    
<!--
    <div class="related-news">
        <?php /*
            $counter = 0;
            $related_news = get_field('related_posts');
        
            if($related_news): 
                foreach($related_news as $news_object):
                    $post = $news_object['post'];
                    $counter++;
                    setup_postdata($post);
        ?>
        <div class="related-news-item" data-news-number="<?php echo $counter; ?>">
            <h3>
                <a href="<?php the_permalink();?>">
                    <?php echo the_title(); ?>
                </a>
            </h3>
            <p><?php the_advanced_excerpt(); ?></p>
        </div>
        <?php 
                endforeach; 
                wp_reset_postdata();
            endif;*/
        ?>
    </div>
-->

    <?php
    endwhile; endif;
    wp_reset_postdata();
    
    //display next page (3 items) as related posts
    
    //display new category of posts
    
    
    ?>


    

</div>    
<?php
get_footer('custom');

?>


