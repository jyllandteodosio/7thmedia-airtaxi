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

    <div class = "acf-map" style="height: 480px; width: 640px">
        <div class = "marker" data-lat = "<?php echo get_field('map')['lat']; ?>" data-lng="<?php echo get_field('map')['lng']; ?>"></div>
    </div>

    <?php  endwhile; // end of the loop. ?>



<?php get_footer(); ?>