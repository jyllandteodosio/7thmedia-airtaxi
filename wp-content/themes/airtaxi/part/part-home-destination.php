<?php if(get_field('destination_section_background') == 'color'): ?>
<section data-id="<?php echo get_field('destination_section_id'); ?>" class="home-destination home-section section" style="background-color: <?php echo get_field('destination_section_background_color'); ?>');">

<?php else: ?>

<section data-id="<?php echo get_field('destination_section_id'); ?>" class="home-destination home-section section" style="background-image: url('<?php echo get_field('destination_section_background_image'); ?>');">

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
</section>