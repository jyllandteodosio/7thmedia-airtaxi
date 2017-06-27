<?php if(get_field('about_section_background') == 'Color'): ?>

<section class="home-about home-section" style="background: <?php echo get_field('about_section_background_color'); ?>');">

<?php else: ?>

<section class="home-about home-section" style="background-image: url('<?php echo get_field('about_section_background_image'); ?>');">

<?php endif; ?>
    
    <div class="flex-container">
       <div class="flex-box about-text-panel">
          
           <h2><?php echo get_field('about_section_title');?></h2>
           <p class="flex-content"><?php echo get_field('about_section_content');?></p>
           
        </div>
        
        <div class="flex-box about-map-panel">
           <div class="about-map-container">
               <div class="about-map">
               </div>
           </div>
           <h3><?php echo get_field('base_locations_title');?></h3>
           <span class="flex-content"><?php echo get_field('base_locations_sub_title');?></span>
           
        </div>
    </div>
    
</section>
