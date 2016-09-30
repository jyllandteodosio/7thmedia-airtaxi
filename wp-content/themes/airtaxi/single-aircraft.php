<?php 
/**
* Template Name: Aircraft - Single Aircraft Page
*
* The template for displaying pages
*
*
* @package 
* @subpackage 
* @since  
*/

get_header('custom'); ?>


<div class="aircraft-detail-page">
    <?php 
        while ( have_posts() ) : the_post();
    
        $model = get_field('model');
        $capacity = get_field('capacity');
    ?>

    <div class="aircraft-name">
        <h1><?php the_field('aircraft_name'); ?>
        <strong><?php the_field('model'); ?></strong></h1>
    </div>
    
    <div class="aircraft-panel">
        <div class="aircraft-slideshow">
            <div class="aircraft-details-main aircraft-details">
              
               <ul class="detail-capacity">
                   <li><label class="detail-label">Capacity:</label></li>
                   <li>
                       <?php for($i=0;$i<$capacity;$i++): ?>
                           <span class="dashicons dashicons-admin-users"></span>
                       <?php endfor; ?>
                   </li>
                   <li>
                       <p>Up to <?php echo $capacity; ?> passengers</p>
                   </li>
               </ul><!-- detail-capacity -->
               
               <ul class="detail-about">
                   <li><label class="detail-label">About:</label></li>
                   <li><p><?php the_field('about'); ?></p></li>
               </ul><!-- detail-about -->
               
               <ul class="detail-notable">
                   <li><label class="detail-label">Notable Features:</label></li>
                   <li><p>
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
                    ?></p>
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
            <div class="aircraft-details-responsive aircraft-details">
              
               <ul class="detail-capacity">
                   <li><label class="detail-label">Capacity:</label></li>
                   <li>
                       <?php for($i=0;$i<$capacity;$i++): ?>
                           <span class="dashicons dashicons-admin-users"></span>
                       <?php endfor; ?>
                   </li>
                   <li>
                       <p>Up to <?php echo $capacity; ?> passengers</p>
                   </li>
               </ul><!-- detail-capacity -->
               
               <ul class="detail-about">
                   <li><label class="detail-label">About:</label></li>
                   <li><p><?php the_field('about'); ?></p></li>
               </ul><!-- detail-about -->
               
               <ul class="detail-notable">
                   <li><label class="detail-label">Notable Features:</label></li>
                   <li><p>
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
                    ?></p>
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
                $posts = $the_query->get_posts();
                // get aircraft gallery vectors
                if ( $the_query->have_posts() ) {
                    foreach ( $posts as $post ) {
                        $url = get_field('_gallery_link_url');
                        $alt = get_field('_wp_attachment_image_alt');
                        
                        //marks the displayed image in the gallery
                        if( $model == $alt ){
                            echo '<a href="'. $url .'" alt="' . $alt . '" class="hidden">';
                            echo '<div class="gallery-slider-item item-center" style="border: 3px solid #4ec5cd">';
                        } else {
                            echo '<a href="'. $url .'" alt="' . $alt . '">';
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



<?php get_footer('custom'); ?>