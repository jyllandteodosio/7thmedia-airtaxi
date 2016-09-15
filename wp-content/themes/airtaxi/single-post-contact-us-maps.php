<?php 
/**
* Template Name: Aircraft Detail - Single Post Page
*
* The template for displaying pages
*
*
* @package 
* @subpackage 
* @since Twenty 
*/

get_header('custom'); ?>


    <?php 
        while ( have_posts() ) : the_post();
        the_title();
    ?>
    <div class='contact-maps'>
        <div class="map-coords hidden">
            <input type="hidden" id="marker-lat" value="<?php echo get_field('map')['lat']; ?>"/>
            <input type="hidden" id="marker-lng" value="<?php echo get_field('map')['lng']; ?>"/>
        </div>
        <div id="other-map" style="height: 480px; width: 640px">
        </div>
    </div>

    <?php  endwhile; // end of the loop. ?>



<?php get_footer(); ?>