<?php if(get_field('fleet_section_background') == 'Color'): ?>

<section class="home-fleet home-section" style="background-color: <?php echo get_field('fleet_section_background_color'); ?>');">

<?php else: ?>

<section id="<?php echo get_field('fleet_section_id'); ?>" class="home-fleet home-section" style="background-image: url('<?php echo get_field('fleet_section_background_image'); ?>');">

<?php endif; ?>
   
    <div class="section-wrap">
        <h2><?php echo get_field('aircraft_section_title');?></h2>
        <span class="sub-title"><?php echo get_field('aircraft_sub_title');?></span>

        <div class="flex-container">

           <?php $fleet_count = 0; ?> 
           <?php if(have_rows('fleet')): while(have_rows('fleet')): the_row();?> 

                <?php 
                $post_object = get_sub_field('aircraft');

                if($post_object): 
                   $fleet_count++;
                   $post = $post_object;
                   setup_postdata($post);
                ?>

                <div class="flex-box aircraft-box">

                    <?php if(get_field('aircraft_vector')): $vector = get_field('aircraft_vector'); ?>

                    <div class="vector-wrap">
                        <img class="vector" src="<?php echo $vector['url']; ?>" alt="<?php echo $vector['alt']; ?>"/>
                    </div>

                    <?php endif;?>

                    <a href="<?php the_permalink(); ?>" class="aircraft-name">
                        <?php echo get_field('aircraft_name');?>
                    </a>
                    <span class="aircraft-model"><?php echo get_field('model');?></span>
                </div>

                <?php 
                    wp_reset_postdata();
                endif; 
                ?>

            <?php endwhile; endif; ?>

            <?php 
            $filler_box = 5 - ($fleet_count % 5);

            if($filler_box < 5):
                for($i = 0; $i < $filler_box; $i++):
            ?>
                <div class="flex-box filler"></div>
            <?php
                endfor;
            endif;
            ?>
        </div>
    </div>
</section>
