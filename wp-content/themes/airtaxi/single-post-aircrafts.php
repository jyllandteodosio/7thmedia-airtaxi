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
    <?php while ( have_posts() ) : the_post(); ?>
    <?php $model = get_field('model')?>

<!--Aircraft name-->
    <h1>
        <?php the_title(); ?> 
        <strong><?php the_field('model'); ?></strong>
    </h1>
<!--Aircraft panel-->
    <div class="aircraft-panel">
        <div class="aircraft-details">
           <ul>
               <li><?php the_field('capacity'); ?></li>
               <li><?php the_field('about'); ?></li>
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
           </ul>
        </div>
        <div class="aircraft-slideshow">
            <?php the_content(); ?>
        </div>
    </div>
</div>


<?php // aircraft fleet gallery ?>
<div class="aircraft-fleet-gallery">
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
                $the_query->the_post();
                
                // displays image
                echo wp_get_attachment_image( get_the_ID(), 'medium' );
                
                // displays image caption
                echo the_excerpt();
                
                // gets image alt (same as image model, for marking which item is displayed)
                echo the_field('_wp_attachment_image_alt');
                
                // gets image URL 
                echo the_field('_gallery_link_url');
                
                // marks the displayed image in the gallery
                if(get_field('_wp_attachment_image_alt') == $model){
                }
            }
        } else {
            // no attachments found
        }

        wp_reset_postdata();
    ?>
</div>


    <?php endwhile; // end of the loop. ?>



<?php get_footer(); ?>