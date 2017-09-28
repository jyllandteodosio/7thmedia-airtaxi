<?php if(get_field('about_section_background') == 'Color'): ?>

<section id="<?php echo get_field('about_section_id'); ?>" class="home-about home-section section" style="background-color: <?php echo get_field('about_section_background_color'); ?>');">

<?php else: ?>

<section id="<?php echo get_field('about_section_id'); ?>" class="home-about home-section section" style="background: linear-gradient(rgba(31,31,31,0.7),rgba(31,31,31,0.7)), url('<?php echo get_field('about_section_background_image'); ?>');">

<?php endif; ?>
    
    <div class="section-wrap">
        <div class="flex-container">
           <div class="flex-box about-text-panel">
               <div class="about-text-wrap">
                   <div class="about-text-container">
                       <h2><?php echo get_field('about_section_title');?></h2>
                       <div class="flex-content">
                           <?php echo get_field('about_section_content');?>
                       </div>
                   </div>
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
    <div class="section-wrap">
</section>
