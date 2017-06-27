<?php if(get_field('about_section_background') == 'Color'): ?>

<section class="home-about home-section" style="background-color: <?php echo get_field('about_section_background_color'); ?>');">

<?php else: ?>

<section class="home-about home-section" style="background-image: url('<?php echo get_field('about_section_background_image'); ?>');">

<?php endif; ?>
    
    <div class="flex-container">
       <div class="flex-box about-text-panel">
          
           <h2><?php echo get_field('about_section_title');?></h2>
           <div class="flex-content">
               <?php echo get_field('about_section_content');?>
               
               <div class="client-logos swiper-container">
                   <div class="swiper-wrapper">

                   <?php if(have_rows('client_logos')): while(have_rows('client_logos')): the_row(); ?>
                       <?php if(get_sub_field('logo')): $logo = get_sub_field('logo'); ?>

                           <div class="logo swiper-slide">
                               <img src="<?php echo $logo['url']?>" alt="<?php echo $logo['alt']?>" />
                           </div>

                       <?php endif; ?>
                   <?php endwhile; endif; ?>
                   
                   </div>
                   <div class="swiper-pagination"></div>

               </div>
               <?php echo get_field('section_content_after');?>
           </div>
           
        </div>
        
        <div class="map-markers">
            <?php if(have_rows('base_locations_items')): while(have_rows('base_locations_items')): the_row(); ?>
            
            <div class="marker" 
               data-image="<?php echo get_sub_field('marker_image'); ?>"
               data-name="<?php echo get_sub_field('marker_name'); ?>"
               data-lat="<?php echo get_sub_field('latitude'); ?>"
               data-long="<?php echo get_sub_field('longitude'); ?>">
            </div>
            
            <?php endwhile; endif; ?>
        </div>
        
        <div class="flex-box about-map-panel">
          
           <div class="about-map-container">
               <div class="about-map">
               </div>
           </div>
           
           <div class="map-title">
               <h3><?php echo get_field('base_locations_title');?></h3>
               <span class="flex-content"><?php echo get_field('base_locations_sub_title');?></span>
           </div>
           
        </div>
    </div>
    
</section>
