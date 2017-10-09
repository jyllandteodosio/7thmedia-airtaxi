<section id="<?php echo get_field('transfers_section_id'); ?>" class="home-transfers home-section section" style="background-color: <?php echo get_field('transfers_section_background_color'); ?>');">

    <div class="section-wrap airport-transfers-section">
        <h2><?php echo get_field('airport_transfers_section_title');?></h2>
        
        <div class="flex-container">
            <form enctype="text/plain" role="search" method="get" id="airport-transfer-search" action="" autocomplete="off" class="airport-transfer-search">
            
                <div class="flex-box">
                    <span class="input-label"><?php echo str_replace(' ', '&nbsp;', get_field('transfer_from_text')); ?></span>
                </div>

                <div class="flex-box transfer-field">
                    <?php if(have_rows('origin_locations')): 
                    $count = 0;
                    ?>

                    <div class="transfer-origin">
                        <div class="dropdown-field">
                            <input type="text" class="selected origin-input" value="" readonly/>
                            <i class="fa fa-caret-down"></i>
                        </div>

                        <div class="dropdown-box">
                            <ul class="origin-dropdown">
                            <?php 
                            while(have_rows('origin_locations')): 
                            the_row(); 
                            $count++; 
                                
                            if($count == 1) {
                                $airport = get_sub_field('location');
                            }
                                
                            $location = get_term(get_sub_field('location'), 'airports');
                            ?>

                            <li data-value="<?php echo $location->name; ?>" data-id="<?php echo get_sub_field('location'); ?>" data-url="<?php echo get_sub_field('results_page'); ?>" class="<?php echo ($count == 1) ? 'selected' : '';?>">
                                <?php echo $location->name; ?>
                            </li>

                            <?php endwhile; ?>
                            </ul>
                        </div>
                    </div>

                    <?php endif; ?>
                </div>

                <div class="flex-box">
                    <span class="input-label">to</span>
                </div>

                <div class="flex-box transfer-field">
                    <div class="transfer-destination">
                        <div class="dropdown-field">
                            <?php $selected = get_term(get_field('default_transfer_location'), 'locations')->name; ?>
                            <input readonly name="destination-input" type="text" class="selected destination-input" value="<?php echo $selected; ?>"/>
                            <i class="fa fa-caret-down"></i>
                        </div>

                        <div class="dropdown-box">
                            <ul class="destination-dropdown">
                            <?php 
                            $terms = get_terms(array(
                                'taxonomy' => 'locations',
                                'hide_empty' => false,
                                'orderby' => 'ID'
                            ));

                            $child_terms = array();
                            $parent_terms = array();

                            foreach($terms as $term):
                                $term_origin = get_field('airport_origin', 'locations_'.$term->term_id);
                                
                                if($term->parent) {
                                    if($term_origin[0] == $airport) {
                                        array_push($child_terms, $term);
                                    }
                                } else {
                                    array_push($parent_terms, $term);
                                }
                            endforeach;

                            foreach($parent_terms as $parent): ?>
                                <li label="<?php echo $parent->name; ?>" class="type"><?php echo $parent->name; ?></li>

                                <?php
                                foreach($child_terms as $child):

                                    if($parent->term_id == $child->parent): ?>
                                    <li data-value="<?php echo $child->name; ?>" data-id="<?php echo $child->term_id; ?>" class=""><?php echo $child->name; ?></li>
                                    <?php endif; ?>

                                <?php endforeach; ?>

                            <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="flex-box transfer-button">
                    <input type="submit" href="#" class="inquire-button" value="<?php echo get_field('find_transfers_button_text');?>">
                </div>
            </form>
        </div>
    </div>
    
</section>
