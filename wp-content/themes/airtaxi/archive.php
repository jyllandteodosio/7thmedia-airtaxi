<?php

get_header('custom');

?>
<div class="archive-page">
    <h2>Archives</h2>
    <div class="archive-list two-thirds first">
        <h3><?php the_archive_title(); ?></h3>
        <?php
            
        if(have_posts()): while(have_posts()): the_post();

        ?>
        
        <div class="archive-item">
            <h4>
                <a href="<?php the_permalink(); ?>" title="<?php echo get_the_title(); ?>"><?php echo get_the_title(); ?></a>
            </h4>
            <div class="archive-item-content">
                <?php echo get_the_excerpt(); ?>
            </div>
            <a href="<?php the_permalink(); ?>" title="<?php echo get_the_title(); ?>" class="read-more">Read More</a>
        </div><!-- archive-item -->
        
        <?php endwhile;endif; ?>
    </div><!-- archive-list -->
    
    <div class="archive-sidebar one-third">
        <?php
            if (is_active_sidebar('search-results-sidebar')) :
                dynamic_sidebar('search-results-sidebar');
            endif;
        ?>
    </div>
</div><!-- archive-page -->


<?php

get_footer('custom');

?>