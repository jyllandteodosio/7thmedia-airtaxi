<?php 
/**
* Template Name: 
*
* The template for displaying pages
*
*
* @package 
* @subpackage 
* @since Twenty 
*/

get_header('custom'); ?>


<div class="aircraft-detail-page">
    <?php 
        while ( have_posts() ) : the_post();
    
        $model = get_field('model');
        $capacity = get_field('capacity');
    ?>

    <div class="aircraft-name">
        <?php the_title(); ?> 
        <strong><?php the_field('model'); ?></strong>
    </div>
    
    <div class="aircraft-panel">
        <div class="aircraft-slideshow">
            <div class="aircraft-details">
              
               <ul class="detail-capacity">
                   <li class="detail-label">Capacity:</li>
                   <li>
                   <?php for($i=0;$i<$capacity;$i++): ?>
                       <span class="dashicons dashicons-admin-users"></span>
                   <?php endfor; ?>
                   </li>
                   <li>Up to <?php echo $capacity; ?> passengers</li>
               </ul><!-- detail-capacity -->
               
               <ul class="detail-about">
                   <li class="detail-label">About:</li>
                   <li><?php the_field('about'); ?></li>
               </ul><!-- detail-about -->
               
               <ul class="detail-notable">
                   <li class="detail-label">Notable Features:</li>
                   <li>
                   <?php 
                       // check if the repeater field has rows of data
                        if( have_rows('notable_features') ):
                            // loop through the rows of data
                            while ( have_rows('notable_features') ) : the_row();
                                // display a sub field value
                                the_sub_field('feature_item');
                                echo "<br/>";
                            endwhile;
                        endif;
                    ?>
                   </li>
               </ul><!-- detail-notable -->
               
               <ul class="detail-best">
                   <li class="detail-label">Best For:</li>
                   <li>
                    <?php 
                       // check if the repeater field has rows of data
                        if( have_rows('best_for') ):
                            // loop through the rows of data
                            while ( have_rows('best_for') ) : the_row();
                                // display a sub field value
                                the_sub_field('best_for_item');
                                echo "<br/>";
                            endwhile;
                        endif;
                    ?>
                   </li>
               </ul><!-- detail-best -->
               
            </div><!-- aircraft-details -->
            <?php the_content(); ?>
        </div><!-- aircraft-slideshow -->
    </div><!-- aircraft-panel -->
</div><!-- aircraft-detail-page -->


<div class="aircraft-fleet-gallery">
   <div class="gallery-label">Fleet Gallery</div>
   <div class="gallery-container">
       <div class="gallery-slider">
            <?php
                $args = array(
                    'post_type'   => 'attachment',
                    'post_status' => 'any',
                    'posts_per_page' => '-1',
                    'tax_query'   => array(
                        array(
                            'taxonomy' => 'media_category', // your taxonomy
                            'field'    => 'id',
                            'terms'    => 9 // term id (id of the media category)
                        )
                    )
                );
                $the_query = new WP_Query( $args );
                // get aircraft gallery vectors
                if ( $the_query->have_posts() ) {
                    while ( $the_query->have_posts() ) {
                        $url = get_field('_gallery_link_url');
                        
                        echo '<a href="'. $url .'" alt="' . $model . '">';
                        
                        //marks the displayed image in the gallery
                        if(get_field('_wp_attachment_image_alt') == $model){
                            echo '<div class="gallery-slider-item item-center">';
                        } else {
                            echo '<div class="gallery-slider-item">';
                        }
                        
                        $the_query->the_post();  
                        
                        ?>
                        
                        <div class="gallery-image-container">
                        
                        <?php 
                        // displays image
                        echo wp_get_attachment_image( get_the_ID(), 'medium' ); 
                        ?>
                        
                        </div><!-- gallery-image-container -->

                        <?php
                        // displays image caption
                        echo the_excerpt();
                        
                        echo '</div></a>'; //gallery-slider-item
                    }
                } else {
                    // no attachments found
                }

                wp_reset_postdata();
            ?>
       </div><!-- gallery-slider -->
   </div><!-- gallery-container -->
</div><!-- aircraft-fleet-gallery -->


    <?php endwhile; // end of the loop. ?>



<?php get_footer(); ?>