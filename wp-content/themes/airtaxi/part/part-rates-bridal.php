<section class="rates-header section">
    <div class="section-wrap">
        <div class="text-container">
            <h1 class="inner-title"><?php the_title(); ?></h1>
        </div>
    </div>
</section>

<section class="bridal-content section">
  <div class="section-wrap">
    <?php $image = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); ?>
    <div class="bridal-wrap" data-bg="<?php echo $image ? $image : ''; ?>" style="<?php echo $image ? 'background-image: url('.$image.')' : ''; ?>;">
      <div class="day-tours-wrap">
        <div class="day-tours">
            <?php 
            if(have_rows('bridal_packages')):
            while(have_rows('bridal_packages')): the_row(); 

            $tour_image = get_sub_field('package_image'); ?>

            <div id="<?php echo get_sub_field('package_id'); ?>" class="destinations-box">
                <div class="destinations-box-text">
                    <div class="destinations-box-row">
                        <div class="destinations-box-title">
                            <?php echo get_sub_field('package_name'); ?>
                        </div>
                    </div>
                    <div class="destinations-box-description">
                        <?php the_sub_field('tour_description'); ?>
                    </div>

                    <div class="destinations-box-rates">
                    <?php
                    if( have_rows('rates') ):
                    while( have_rows('rates') ) : the_row();

                        $rate = get_sub_field('rate');
                        $addon = get_sub_field('addon');

                        if(get_sub_field('aircraft')):
                        $post = get_sub_field('aircraft');
                        setup_postdata($post); ?>

                           <ul class="destinations-box-item">
                               <li>
                                   <div class="item-capacity">
                                       <?php echo get_field('capacity'); ?> PAX
                                   </div>  
                                   <div class="item-price">
                                       &#8369; <?php echo $rate; ?>
                                   </div>
                               </li>
                               <li>
                                   <div class="item-aircraft">
                                       <?php echo get_field('model'); ?>
                                   </div>
                               </li>
                               <li>
                                   <?php if($addon): ?>
                                   <div class="item-additional">
                                       <?php echo $addon; ?>
                                   </div>
                                   <?php endif;?>
                               </li>
                           </ul>

                        <?php wp_reset_postdata(); endif; ?>
                    <?php endwhile; endif; ?>
                    </div>

                    <div class="dest-container">
                       <div class="itinerary-title">
                           Tour Itinerary:
                       </div>
                       <table class="destinations-box-itinerary">
                           <?php
                           if( have_rows('itinerary') ):
                           while ( have_rows('itinerary') ) : the_row();
                           ?>
                           <tr>
                               <td>
                                   <div class="item-time">
                                       <?php echo get_sub_field('time'); ?>
                                   </div>
                               </td>
                               <td>
                                   <div class="item-activity">
                                       <?php the_sub_field('activity'); ?>
                                   </div>
                               </td>
                           </tr>
                           <?php endwhile; endif;
                           ?>
                       </table>
                    </div>

                    <div class="destinations-box-image">
                        <img src="<?php echo $tour_image['url']; ?>" alt="<?php echo $tour_image ? $tour_image : get_sub_field('tour_name'); ?>"/>
                    </div>
                </div>
            </div>
            <?php endwhile; else: ?>
            
            <div class="no-rates-box">
                <?php the_field('no_rates_found_notice'); ?>
            </div>
            
            <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</section>