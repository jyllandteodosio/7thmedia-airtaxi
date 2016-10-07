<?php
/**
 * Template Name: Rates Links
 *
 * @author 
 * @package 
 * @subpackage 
 */
?>
<div class="rates-links-panel">
    <div class="rates-links-title">
        <h1>Helicopter Rates</h1>
    </div>
    <div class="rates-links-box">
        <div class="rates-table">
            <?php
            //* Get all rates links posts
            $args = array(
                'posts_per_page'   => -1,
                'category_name'    => 'rates-links',
                'orderby'          => 'date',
                'order'            => 'ASC',
                'post_type'        => 'post',
                'post_status'      => 'publish',
                'suppress_filters' => true
            );
            
            $posts_array = get_posts( $args );
            $counter = 0;
            
            foreach ( $posts_array as $post ) :
                $counter++;
            
                if( $counter == 1 ):
                    echo '<div class="one-fourth first">';
                elseif( $counter == 4 ):
                    echo '<div class="one-fourth rates-more">';
                else:
                    echo '<div class="one-fourth">';
                endif;
            
                echo '<h2>'.get_field( 'location' ).'</h2>';
                echo '<ul>';
                
                $list_bool = get_field( 'list_item' );
            
                if( $list_bool == "Links" ):
                    if( have_rows('links') ):
                        while ( have_rows('links') ) : the_row();
                            echo '<li><a href="'.get_sub_field('drop-off_or_pick-up').'?selectedTab=drop-off"><div class="rates-table-link">Drop off or Pick Up</div></a></li>';
                            echo '<li><a href="'.get_sub_field('aerial_tours').'?selectedTab=aerial-tours"><div class="rates-table-link">Aerial Tours</div></a></li>';
                            echo '<li><a href="'.get_sub_field('destination_tours_and_packages').'?selectedTab=destination-tours"><div class="rates-table-link">Destination Tour Packages</div></a></li>';
                        endwhile;
                    else:
                    endif;
                else:
                    if( have_rows('text') ):
                        while ( have_rows('text') ) : the_row();
                            echo '<li>'.get_sub_field('and_more_text').'</li>';
                            echo '<li class="rates-inquire"><a href="'.get_sub_field('inquire_here_link').'">Inquire Here</a></li>';
                        endwhile;
                    else:
                    endif;
                endif;
                echo '</ul>';
                echo '</div>'; // .one-fourth
            
            endforeach;
           ?>
          
<!--
           <div class="one-fourth first">
               <h2>Manila</h2>
               <ul>
                   <li><a href="http://localhost/Projects/airtaxi/manila/"><div class="rates-table-link">Drop off or Pick Up</div></a></li>
                   <li><a href="http://localhost/Projects/airtaxi/manila/"><div class="rates-table-link">Aerial Tours</div></a></li>
                   <li><a href="http://localhost/Projects/airtaxi/manila/"><div class="rates-table-link">Destination Tour Packages</div></a></li>
               </ul>
           </div>
           <div class="one-fourth">
               <h2>Cebu</h2>
               <ul>
                   <li><a href="http://localhost/Projects/airtaxi/cebu/"><div class="rates-table-link">Drop off or Pick Up</div></a></li>
                   <li><a href="http://localhost/Projects/airtaxi/cebu/"><div class="rates-table-link">Aerial Tours</div></a></li>
                   <li><a href="http://localhost/Projects/airtaxi/cebu/"><div class="rates-table-link">Destination Tour Packages</div></a></li>
               </ul>
           </div>
           <div class="one-fourth">
               <h2>Boracay</h2>
               <ul>
                   <li><a href="http://localhost/Projects/airtaxi/boracay/"><div class="rates-table-link">Drop off or Pick Up</div></a></li>
                   <li><a href="http://localhost/Projects/airtaxi/boracay/"><div class="rates-table-link">Aerial Tours</div></a></li>
                   <li><a href="http://localhost/Projects/airtaxi/boracay/"><div class="rates-table-link">Destination Tour Packages</div></a></li>
               </ul>
           </div>
           <div class="one-fourth rates-more">
               <h2>and more!</h2>
               <ul>
                   <li>Other locations
                       available
                       upon request.
                    </li>
                   <li class="rates-inquire"><a href="http://localhost/Projects/airtaxi/#home-section-6">Inquire Here</a></li>
               </ul>
           </div>
-->
       </div>
   </div>
</div>