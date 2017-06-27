<?php if(get_field('destination_section_background') == 'color'): ?>
<section class="home-destination home-section" style="background: <?php echo get_field('destination_section_background_color'); ?>');">

<?php else: ?>

<section class="home-destination home-section" style="background: url('<?php echo get_field('destination_section_background_image'); ?>');">

<?php endif; ?>
   
    <h2><?php echo get_field('destination_section_title');?></h2>
    <span class="sub-title"><?php echo get_field('destination_sub_title');?></span>
    
    <div class="flex-container">
      
       <?php if(have_rows('destination_packages')): while(have_rows('destination_packages')): the_row(); ?>
         
       <div class="flex-box">
          
           <?php if(get_sub_field('destination_image')): $icon = get_sub_field('destination_image'); ?>
           <div class="flex-icon" style="background-image: url('<?php echo $icon['url']?>');"></div>
           <?php endif; ?>
           
           <?php if(get_sub_field('text_or_button') == 'text'): ?>
               
           <div class="flex-content-wrap">
              <a href="<?php echo get_sub_field('destination_link');?>"> 
                  <h3 class="flex-title">
                      <?php echo get_sub_field('destination_name');?>
                  </h3>
               </a>
               <p class="flex-content">
                   <?php echo get_sub_field('destination_details'); ?>
               </p>
           </div><!--flex-content-wrap-->
               
           <?php else: ?>
               
           <div class="flex-content-wrap">
               <h3 class="flex-title">
                   <?php echo get_sub_field('destination_name');?>
               </h3>
               <p class="flex-content">
                   <a href="<?php echo get_sub_field('inquire_button_link');?>" class="inquire-button">
                   <?php echo get_sub_field('inquire_button');?>
                   </a>
               </p>
           </div><!--flex-content-wrap-->
               
           <?php endif; ?>
           
        </div><!--flex-box-->
        
        <?php endwhile; endif; ?>
        
    </div><!--flex-container-->
</section>