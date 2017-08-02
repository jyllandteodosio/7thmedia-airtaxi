<section id="call-us" class="home-call home-section section" style="background-color: <?php echo get_field('call_us_section_background_color'); ?>;">
    <div class="section-wrap">
        <div class="flex-container">

           <?php if(have_rows('call_us_items')): while(have_rows('call_us_items')): the_row();?> 

           <div class="flex-box">
               <span class="icon"><?php echo get_sub_field('icon'); ?></span>

               <?php if(get_sub_field('type') == 'phone'): ?>

                   <a href="tel:<?php echo get_sub_field('text'); ?>" title="phone">
                   <?php echo get_sub_field('text'); ?>
                   </a>

               <?php elseif(get_sub_field('type') == 'email'): ?>

                   <a href="mailto:<?php echo get_sub_field('text'); ?>" title="email">
                   <?php echo get_sub_field('text'); ?>
                   </a>

               <?php elseif(get_sub_field('type') == 'text'): ?>

                   <span class="text">
                   <?php echo get_sub_field('text'); ?>
                   </span>

               <?php endif; ?>
            </div>

            <?php endwhile; endif; ?>
        </div>
    </div>
</section>