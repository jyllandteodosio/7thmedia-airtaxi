<?php
/**
 * Template Name: Rates
 *
 * @author 
 * @package 
 * @subpackage 
 */

get_header('custom');
$page_title = strtolower(get_the_title());

$feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );

$disclaimer_1 = get_category_by_slug('drop-off-rates')->description;
$disclaimer_2 = get_category_by_slug('aerial-tours')->description;

?>

<div class="rates-panel">
    <div class="rates-panel-title">
        <h1><?php the_title(); ?></h1>
    </div>
    <div class="rates-panel-tabs">
<!--        <div class="tabs" style="background-image: url('<?php echo $feat_image;?>')">-->
        <div class="tabs">
            <div class="tab-links-container">
                <ul class="tab-links">
                    <li class="active one-third first"><a class="drop-off" href="#tab1">Drop-off or Pick-up</a></li>
                    <li class="one-third"><a class="aerial-tours" href="#tab2">Aerial Tours</a></li>
                    <li class="one-third"><a class="destinations" href="#tab3">Destination Tour Packages</a></li>
                </ul>
            </div>
            <div class="tab-content">
                <div id="tab1" class="tab active">
                    <div class="drop-off-tab">
                        <?php
                        //* Get all drop off rates posts under location
                        $args = array(
                            'posts_per_page'   => -1,
                            'category_name'    => $page_title.'-rates+drop-off-rates',
                            'orderby'          => 'date',
                            'order'            => 'ASC',
                            'post_type'        => 'post',
                            'post_status'      => 'publish',
                            'suppress_filters' => true 
                        );
                        $posts_array = get_posts( $args ); 


                        foreach ( $posts_array as $post ) :
                        ?>
                        <div class="rates-box">
                            <div class="rates-box-title">
                                <?php echo get_field('locations'); ?>
                            </div>
                            <div class="rates-box-duration">
                                <?php echo get_field('duration'); ?>
                            </div>
                            <table class="rates-box-list">
                            <?php
                            if( have_rows('rates') ):
                                // loop through the rows of data
                                while ( have_rows('rates') ) : the_row();
                                    // display a sub field value
                            ?>
                               <tr class="rates-box-item">
                                   <td>
                                       <div class="item-capacity">
                                           <?php the_sub_field('capacity'); ?> PAX
                                       </div>
                                       <div class="item-aircraft">
                                           <?php the_sub_field('aircraft_model'); ?>
                                       </div>
                                   </td>
                                   <td>
                                       <div class="item-price">
                                           P <?php the_sub_field('price'); ?>
                                       </div>
                                   </td>
                               </tr>
                            <?php
                                endwhile;
                            endif;
                            ?>
                           </table>
                        </div>
                        <?php
                        endforeach;
                        ?>
                    </div>
                    <?php if( $disclaimer_1 ): ?>
                    <div class="tab-disclaimer">
                        <?php echo $disclaimer_1; ?>
                    </div>
                    <?php endif;?>            
                </div>

                <div id="tab2" class="tab">
                   <div class="aerial-tours-tab">
                        <?php
                        //* Get all aerial tour rates posts under location
                        $args = array(
                            'posts_per_page'   => -1,
                            'category_name'    => $page_title.'-rates+aerial-tours',
                            'orderby'          => 'date',
                            'order'            => 'ASC',
                            'post_type'        => 'post',
                            'post_status'      => 'publish',
                            'suppress_filters' => true 
                        );
                        $posts_array = get_posts( $args ); 


                        foreach ( $posts_array as $post ) :
                        ?>
                        <div class="rates-box">
                            <div class="rates-box-row">
                                <div class="rates-box-header">
                                    <?php echo get_field('tour_name'); ?>
                                </div>
                            </div>
                            <div class="rates-box-row">
                                <div class="rates-box-title">
                                    <?php echo get_field('route'); ?>
                                </div>
                            </div>
                            <div class="rates-box-duration">
                                <?php echo get_field('duration'); ?>
                            </div>
                            <table class="rates-box-list">
                            <?php
                            if( have_rows('rates') ):
                                // loop through the rows of data
                                while ( have_rows('rates') ) : the_row();
                                    // display a sub field value
                            ?>
                               <tr class="rates-box-item">
                                   <td>
                                       <div class="item-capacity">
                                           <?php the_sub_field('capacity'); ?> PAX
                                       </div>
                                       <div class="item-aircraft">
                                           <?php the_sub_field('aircraft_model'); ?>
                                       </div>
                                   </td>
                                   <td>
                                       <div class="item-price">
                                           P <?php the_sub_field('price'); ?>
                                       </div>
                                   </td>
                               </tr>
                            <?php
                                endwhile;
                            endif;
                            ?>
                           </table>
                        </div>
                        <?php
                        endforeach;
                        ?>
                    </div>
                    <?php if( $disclaimer_2 ): ?>
                    <div class="tab-disclaimer">
                        <?php echo $disclaimer_2; ?>
                    </div>
                    <?php endif;?>  
                </div>

                <div id="tab3" class="tab">
                   <div class="destinations-tab">
                        <?php
                        //* Get all destination tour packages rates posts under location
                        $args = array(
                            'posts_per_page'   => -1,
                            'category_name'    => $page_title.'-rates+destination-tour-packages',
                            'orderby'          => 'date',
                            'order'            => 'ASC',
                            'post_type'        => 'post',
                            'post_status'      => 'publish',
                            'suppress_filters' => true 
                        );
                        $posts_array = get_posts( $args ); 


                        foreach ( $posts_array as $post ) :
                        ?>
                        <div class="destinations-box">
<!--
                            
-->
                            <div class="destinations-box-text">
                                <div class="destinations-box-row">
                                    <div class="destinations-box-title">
                                        <?php echo get_field('tour_package_name'); ?>
                                    </div>
                                </div>
                                <div class="destinations-box-description">
                                    <?php echo get_field('tour_description'); ?>
                                </div>
                                <div class="destinations-box-rates">
                                <?php
                                if( have_rows('rates') ):
                                    // loop through the rows of data
                                    while ( have_rows('rates') ) : the_row();
                                        // display a sub field value
                                ?>
                                   <ul class="destinations-box-item">
                                       <li>
                                           <div class="item-capacity">
                                               <?php the_sub_field('capacity'); ?> PAX
                                           </div>  
                                           <div class="item-price">
                                               P <?php the_sub_field('price'); ?>
                                           </div>
                                       </li>
                                       <li>
                                           <div class="item-aircraft">
                                               <?php the_sub_field('aircraft_model'); ?>
                                           </div>
                                       </li>
                                       <li>
                                           <?php if(get_sub_field('additional_price')): ?>
                                           <div class="item-additional">
                                               <?php the_sub_field('additional_price'); ?>
                                           </div>
                                           <?php endif;?>
                                       </li>
                                   </ul>
                                <?php
                                    endwhile;
                                endif;
                                ?>
                               </div>
                               <div class="dest-container">
                                   <div class="itinerary-title">
                                       Tour Itinerary:
                                   </div>
                                   <table class="destinations-box-itinerary">
                                       <?php
                                       if( have_rows('tour_itinerary') ):
                                       // loop through the rows of data
                                           while ( have_rows('tour_itinerary') ) : the_row();
                                           // display a sub field value
                                       ?>
                                       <tr>
                                           <td>
                                               <div class="item-time">
                                                   <?php the_sub_field('time'); ?>
                                               </div>
                                           </td>
                                           <td>
                                               <div class="item-activity">
                                                   <?php the_sub_field('activity'); ?>
                                               </div>
                                           </td>
                                       </tr>
                                       <?php
                                            endwhile;
                                       endif;
                                       ?>
                                   </table>
                                   <div class="destination-box-notes">
                                       <?php echo get_field('notes'); ?>
                                   </div>
                               </div>
                               <div class="destinations-box-image">
                                    <img src="<?php echo get_field('tour_image'); ?>"/>
                                </div>
                            </div>
                        </div>
                        <?php
                        endforeach;
                        ?>
                    </div>
                    <?php if( $disclaimer_1 ): ?>
                    <div class="tab-disclaimer">
                        <?php echo $disclaimer_1; ?>
                    </div>
                    <?php endif;?>  
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
    get_template_part( 'page-rates-links' );
    get_footer(); 
?>
