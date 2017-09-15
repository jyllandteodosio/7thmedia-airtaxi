<?php if(get_field('destination_section_background') == 'color'): ?>
<section id="<?php echo get_field('destination_section_id'); ?>" class="home-destination home-section section" style="background-color: <?php echo get_field('destination_section_background_color'); ?>');">

<?php else: ?>

<section id="<?php echo get_field('destination_section_id'); ?>" class="home-destination home-section section" style="background-image: url('<?php echo get_field('destination_section_background_image'); ?>');">

<?php endif; ?>
   
    <div class="section-wrap">
        <h2><?php echo get_field('destination_section_title');?></h2>
        <span class="sub-title"><?php echo get_field('destination_sub_title');?></span>

        <div class="flex-container">

           <?php if(have_rows('destination_packages')): while(have_rows('destination_packages')): the_row(); ?>

           <?php if(get_sub_field('destination_image')): $icon = get_sub_field('destination_image'); ?>
           <div class="flex-box" style="background-image: url('<?php echo $icon['url']?>');">
           <?php else: ?>
           <div class="flex-box">
           <?php endif; ?>

               <div class="flex-content-wrap">
                   <div class="flex-content">
                       <?php if(get_sub_field('text_overlay')): ?>
                       <span class="text-overlay"><?php echo get_sub_field('text_overlay'); ?></span>
                       <?php endif; ?>

                       <?php if(get_sub_field('text_or_button') == 'text'): ?>
                       <a href="<?php echo get_sub_field('destination_link');?>"> 
                          <h3 class="flex-title">
                              <?php echo get_sub_field('destination_name');?>
                          </h3>
                       </a>
                       <?php else: ?>
                       <h3 class="flex-title">
                          <?php echo get_sub_field('destination_name');?>
                       </h3>
                       <?php endif; ?>
                       
                       <?php if(get_sub_field('destination_details')): ?>
                       <p class="details">
                           <?php echo get_sub_field('destination_details'); ?>
                       </p>
                       <?php endif; ?>

                       <?php if(get_sub_field('text_or_button') == 'button'): ?>
                       <a href="<?php echo get_sub_field('inquire_button_link');?>" class="inquire-button">
                           <?php echo get_sub_field('inquire_button');?>
                       </a>
                       <?php endif; ?>
                   </div>
                   
               </div><!--flex-content-wrap-->

            </div><!--flex-box-->

            <?php endwhile; endif; ?>

        </div><!--flex-container-->
    </div>
    
    <div class="section-wrap airport-transfers-section">
        <h2><?php echo get_field('airport_transfers_section_title');?></h2>
        
        <div class="flex-container">
            <div class="flex-box">
                <span class="input-label"><?php echo get_field('transfer_from_text'); ?></span>
            </div>
            
            <div class="flex-box">
                <?php if(have_rows('origin_locations')): 
                $count = 0;
                ?>
                
                <select class="transfer-origin">
                    <?php 
                    while(have_rows('origin_locations')): 
                    the_row(); 
                    $count++; 
                    ?>
                    
                    <option value="<?php echo get_sub_field('location'); ?>" <?php echo ($count == 1) ? 'selected' : '';?>>
                        <?php echo get_sub_field('location'); ?>
                    </option>
                    
                    <?php endwhile; ?>
                </select>
                
                <?php endif; ?>
            </div>
            
            <div class="flex-box">
                <span class="input-label">to</span>
            </div>
            
            <div class="flex-box">
                <select class="transfer-destination">
                <?php 
                $terms = get_terms(array(
                    'taxonomy' => 'locations',
                    'hide_empty' => false,
                    'orderby' => 'ID'
                ));
                
                $selected_term = get_field('default_transfer_location');
                $selected = '';
                    
                $child_terms = array();
                $parent_terms = array();
                
                foreach($terms as $term):
                    if($term->parent):
                    array_push($child_terms, $term);
                    else:
                    array_push($parent_terms, $term);
                    endif;
                endforeach;
                    
                foreach($parent_terms as $parent): ?>
                   
                    <option value="<?php echo $parent->name; ?>" class="type"><?php echo $parent->name; ?></option>
                    
                    <?php
                    foreach($child_terms as $child):
                        if($child->term_id == $selected_term): 
                            $selected = 'selected';
                        else:
                            $selected = '';
                        endif;
                    
                        if($parent->term_id == $child->parent): ?>
                        <option value="<?php echo $child->name; ?>" <?php echo $selected;?>><?php echo $child->name; ?></option>
                        <?php endif; ?>
                        
                    <?php endforeach; ?>
                    
                <?php endforeach; ?>
                </select>
            </div>
            
            <div class="flex-box">
                <a href="<?php echo get_sub_field('find_transfers_button_text');?>" class="inquire-button">
                    <?php echo get_sub_field('find_transfers_button_text');?>
                </a>
            </div>
        </div>
    </div>
    
</section>