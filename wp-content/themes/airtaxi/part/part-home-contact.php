<?php if(get_field('contact_section_background') == 'Color'): ?>

<section data-id="<?php echo get_field('contact_section_id'); ?>" class="home-contact home-section section" style="background-color: <?php echo get_field('contact_background_color'); ?>');">

<?php else: ?>

<section data-id="<?php echo get_field('contact_section_id'); ?>" class="home-contact home-section section" style="background-image: url('<?php echo get_field('contact_background_image'); ?>');">

<?php endif; ?>
    <div class="section-wrap">
        <h4 class="title"><?php echo get_field('contact_section_title');?></h4>
        <div class="flex-container">

            <?php //* Contact Form Panel ?>
            <div class="flex-box contact-form-panel">

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

               <div class="flex-content"><?php echo get_field('contact_form_text'); ?></div>
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

                                    <div class="location-map-container" data-id="<?php echo $first; ?>">
                                        <div class="location-map-wrap">
                                            <input type="hidden" class="loc-lat-<?php echo $first; ?>" value="<?php echo get_field('map')['lat']; ?>"/>
                                            <input type="hidden" class="loc-long-<?php echo $first; ?>" value="<?php echo get_field('map')['lng']; ?>"/>

                                            <div id="location-map-<?php echo $first; ?>" class="location-map"></div>
                                        </div>
                                    </div>

                                    <div class="location-details-container">
                                        <h4 class="map-name map-name-pe<?php echo $first; ?>"><?php echo get_field('hangar_name'); ?></h4>
                                        <div class="map-address map-add-pe<?php echo $first; ?>"><?php echo get_field('hangar_address'); ?></div>

                                        <div class="map-links-container">
                                            <div class="map-links-label">Driving Directions: </div>

                                            <div class="map-links-wrap">
                                                <ul>
                                                    <li>
                                                    <a class="map-link map-view map-image-pe<?php echo $first; ?>"
                                                    data-url="<?php echo get_field('driving_directions')['url']; ?>" 
                                                    data-alt="<?php echo get_field('driving_directions')['alt']; ?>" 
                                                    id="pe<?php echo $first; ?>">View</a>
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
    </div>
</section>

<div class="overlay hidden">
    <div class="pop-dir hidden"></div>
    <div class="pop-email pop-default hidden">
        <div id="pop-email-close" class="pop-dir-close"></div>
        <h4>Please enter your details so we can send you <br/> the directions to our facility.</h4>
        <?php echo do_shortcode(get_field('driving_directions_form'));?>
    </div>
    <div class="pop-join hidden">
        <div id="pop-join-close" class="pop-dir-close"></div>
        <h4>Please enter your details to know <br/>how to start a career with us.</h4>
        <?php echo do_shortcode(get_field('join_our_team_form')); ?>
    </div>
</div>
