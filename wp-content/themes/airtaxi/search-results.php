<?php 

$search_term = $_GET['s'];

?>

<div class="search-results-page">
    <div class="search-results-container two-thirds first">
        <h2>Results for '<?php echo $search_term; ?>'</h2>
        <div class="search-results-search">
            <?php include('searchform-dynamic.php'); ?>
        </div>
        <div class="search-results-list">
            <?php 
                if($search_term):
                    global $wp_query;
                    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

                    $args = array( 
                        'post_type'      => 'post',
                        'category_name'  => 'news',
                        'posts_per_page' => 5,
                        'paged'          => $paged,
                        's'              => $search_term
                    );

                    $query = new WP_Query( $args );
            
                    $original_query = $wp_query;
                    $wp_query = $query;
                    
                    $counter = $query->post_count;
                    $totalPosts = $query->found_posts;
                    $suffix = $counter > 1 ? 's' : '';

                    if($query->have_posts()) : 

                        while($query->have_posts()) : $query->the_post();
                        ?>
                        
                        <div class="search-results-item">
                            <h3>
                                <a href="<?php the_permalink(); ?>" title="<?php echo get_the_title(); ?>"><?php echo get_the_title(); ?></a>
                            </h3>
                            <div class="result-content">
                                <?php echo get_the_excerpt(); ?>
                            </div>
                            <a href="<?php the_permalink(); ?>" title="<?php echo get_the_title(); ?>" class="read-more">
                                Read More
                            </a>
                        </div>    
                            
                        <?php 
                            endwhile; 
                            wp_reset_postdata();
                        ?>
                        
                        <div class="search-results-pager">
                            <?php if(get_previous_posts_link()): ?>
                                <span class="prev-link">
                                    <?php previous_posts_link(); ?> 
                                </span>
                            <?php endif; ?>
                            <?php if(get_next_posts_link()): ?>
                                <span class="next-link">
                                    <?php next_posts_link(); ?> 
                                </span>
                            <?php endif; ?>
                        </div>
                        
                    <?php 
                    endif; //$query->have_posts()
                    $wp_query = $original_query;
                endif; //($search_term)
                    ?>
        </div><!--.search-results-list-->
    </div><!--.search-results-container-->
    <div class="search-sidebar one-third">
        <?php
            if (is_active_sidebar('search-results-sidebar')) :
                dynamic_sidebar('search-results-sidebar');
            endif;
        ?>
    </div>
</div>


    