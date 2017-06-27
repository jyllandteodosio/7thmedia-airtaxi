<?php if(get_field('contact_section_background') == 'Color'): ?>

<section class="home-contact home-section" style="background-color: <?php echo get_field('contact_background_color'); ?>');">

<?php else: ?>

<section class="home-contact home-section" style="background-image: url('<?php echo get_field('contact_background_image'); ?>');">

<?php endif; ?>
    <h4><?php echo get_field('contact_section_title');?></h4>
    <div class="flex-container">
      
        <?php //* Contact Form Panel ?>
        <div class="flex-box about-text-panel">
          
           <h4><?php echo get_field('contact_form_heading');?></h4>
           
           <div class="contact-numbers">
               <div class="contact-num-wrap">
                  
                   <?php if(have_rows('contact_form_number')): while(have_rows('contact_form_number')): the_row(); ?>
                      
                       <div class="contact-num">
                           <span class="contact-icon"><?php echo get_sub_field('icon'); ?></span>
                           <a href="tel:<?php echo get_sub_field('number'); ?>" title="phone">
                           <?php echo get_sub_field('number'); ?>
                           </a>
                       </div>
                       
                   <?php endwhile; endif; ?>
                   
               </div>
           </div>
           
           <p class="flex-content"><?php echo get_field('contact_form_text'); ?></p>
           <div class="contact-form-wrap">
               <?php echo do_shortcode(get_field('contact_form_shortcode'));?>
           </div>
        </div><?php //* .about-text-panel ?>
        
        <?php //* Locations Panel ?>
        <div class="flex-box locations-text-panel">
            <h4><?php echo get_field('locations_heading');?></h4>
            
            <?php //* Locations Tab ?>
            <div class="locations-tab">
                <div class="tab-links-wrap">
                    <ul class="tab-links flex-links-wrap">
                        <?php
                        $first = 0;
                        
                        global $post;
                        
                        if(have_rows('locations')): while(have_rows('locations')): the_row();
                        
                            $post_object = get_sub_field('location');
                        
                            if($post_object): 
                                $first++;
                                $post = $post_object;
                                setup_postdata($post); 
                        
                                if($first == 1): ?>
                                <li class="active flex-link-item">
                                
                                <?php else: ?>
                                <li class="flex-link-item">
                                
                                <?php endif; ?>
                                   
                                    <a class="flex-link" href="#tab<?php echo $first; ?>"><?php echo get_the_title(); ?></a>
                                </li>
                                
                                <?php 
                                wp_reset_postdata();
                            endif;
                        endwhile; endif; ?>
                    </ul>
                </div><?php //* .tab-links-wrap ?>
                
                <div class="tab-content-wrap">
                    <?php 
                    $first = 0;
                        
                    global $post;
                    
                    if(have_rows('locations')): while(have_rows('locations')): the_row();
                        $post_object_content = get_sub_field('location');
                        
                        if($post_object_content): 
                            $first++;
                            $post = $post_object_content;
                            setup_postdata($post); 
                    
                            if($first == 1): ?>
                            <div id="tab<?php echo $first; ?>" class="tab active">
                            <?php else: ?>
                            <div id="tab<?php echo $first; ?>" class="tab">
                            <?php endif; ?>
                            
                                <div class="location-map-container">
                                    <div class="location-map-wrap">
                                        <input type="hidden" class="loc-lat-<?php echo $first; ?>" value="<?php echo get_field('map')['lat']; ?>"/>
                                        <input type="hidden" class="loc-long-<?php echo $first; ?>" value="<?php echo get_field('map')['lng']; ?>"/>
                                        
                                        <div class="location-map-<?php echo $first; ?>"></div>
                                    </div>
                                </div>
                                
                                <div class="location-details-container">
                                    <h4 class="map-name"><?php echo get_field('hangar_name'); ?></h4>
                                    <div class="map-address"><?php echo get_field('hangar_address'); ?></div>
                                    
                                    <div class="map-links-container">
                                        <div class="map-links-label">Driving Directions: </div>
                                        
                                        <div class="map-links-wrap">
                                            <ul>
                                                <li>
                                                <a class="map-link map-view" 
                                                data-url="<?php echo get_field('driving_directions')['url']; ?>" 
                                                data-alt="<?php echo get_field('driving_directions')['alt']; ?>" 
                                                id="p<?php echo $first; ?>">View</a>
                                                </li>
                                                
                                                <li>
                                                <a class="map-link map-download" 
                                                href="<?php echo get_field('driving_directions')['url']; ?>" 
                                                download>Download</a>
                                                </li>
                                                
                                                <li><a class="map-link map-email" id="e<?php echo $first; ?>">Email</a></li>
                                            </ul>
                                        </div><?php //* .map-links-wrap ?>
                                        
                                    </div><?php //* .map-links-container ?>
                                    
                                </div><?php //* .location-details-container ?>
                                
                            </div><?php //* #tab ?>
                            
                            <?php wp_reset_postdata();?>
                        <?php endif; //* if($post_object)?>
                        
                    <?php endwhile; endif; ?>
                </div><?php //* .tab-content-wrap ?>
            </div><?php //* .locations-tab ?>
            
            <div class="join-us-panel">
                <h4><?php echo get_field('join_our_team_heading');?></h4>
                <button type="button" class="map-inquire">Inquire Now</button>
            </div>
        </div><?php //* .locations-text-panel ?>
    </div><?php //* .flex-container ?>
    
</section>
