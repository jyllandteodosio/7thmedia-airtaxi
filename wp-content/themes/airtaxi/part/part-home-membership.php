<?php if(get_field('membership_section_background') == 'Color'): ?>

<section id="<?php echo get_field('membership_section_id'); ?>" class="home-membership home-section section" style="background-color: <?php echo get_field('membership_section_background_color'); ?>');">

<?php else: ?>

<section id="<?php echo get_field('membership_section_id'); ?>" class="home-membership home-section section" style="background-image: url('<?php echo get_field('membership_section_background_image'); ?>');">

<?php endif; ?>
   
    <div class="section-wrap">
        <h2><?php echo get_field('membership_section_title');?></h2>
        <span class="sub-title"><?php echo get_field('membership_section_sub_title');?></span>

        <div class="flex-container">

           <?php if(have_rows('membership_boxes')): while(have_rows('membership_boxes')): the_row();?> 

           <div class="flex-box">

               <?php if(get_sub_field('title')): ?>
               <h3 class="flex-title"><?php echo get_sub_field('title');?></h3>
               <?php endif; ?>

               <?php if(get_sub_field('icon')): $icon = get_sub_field('icon'); ?>
               <img class="flex-icon" src="<?php echo $icon['url']?>" alt="<?php echo $icon['alt']?>"/>
               <?php endif; ?>
               
               <?php if(get_sub_field('text')): ?>
               <p class="flex-content"><?php echo get_sub_field('text');?></p>
               <?php endif; ?>
               
               <a href="<?php echo get_field('membership_button_link');?>" class="button"><?php echo get_field('membership_button_title');?></a>
            </div>

            <?php endwhile; endif; ?>
        </div>
    </div>
</section>
