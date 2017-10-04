<?php $pageID = get_option('page_on_front'); ?>

<?php if(get_field('destination_section_background', $pageID) == 'color'): ?>
<section id="<?php echo get_field('destination_section_id', $pageID); ?>" class="home-destination home-section section" style="background-color: <?php echo get_field('destination_section_background_color', $pageID); ?>');">

<?php else: ?>

<section id="<?php echo get_field('destination_section_id', $pageID); ?>" class="home-destination home-section section" style="background-image: url('<?php echo get_field('destination_section_background_image', $pageID); ?>');">

<?php endif; ?>
    <div class="section-wrap">
        <h2><?php echo get_field('destination_section_title', $pageID);?></h2>
        <span class="sub-title"><?php echo get_field('destination_sub_title', $pageID);?></span>

        <div class="flex-container">

           <?php if(have_rows('destination_packages', $pageID)): while(have_rows('destination_packages', $pageID)): the_row(); ?>

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
                       <a href="<?php echo get_sub_field('destination_link'); echo  get_sub_field('custom_url_parameter') ? '?' . get_sub_field('custom_url_parameter') : '';?>">      
                          <h3 class="flex-title">
                              <?php echo get_sub_field('destination_name');?>
                          </h3>
						   <?php if(get_sub_field('destination_details')): ?>
						   <p class="details">
							   <?php echo get_sub_field('destination_details'); ?>
						   </p>
						   <?php endif; ?>
                       </a>
                       <?php else: ?>
                       <h3 class="flex-title">
                          <?php echo get_sub_field('destination_name');?>
                       </h3>

                       <?php if(get_sub_field('destination_details')): ?>
                       <p class="details">
                           <?php echo get_sub_field('destination_details'); ?>
                       </p>
                       <?php endif; ?>

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
</section>
