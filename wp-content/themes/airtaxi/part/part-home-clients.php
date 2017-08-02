<?php if(get_field('clients_section_background_color')): ?>

<section id="<?php echo get_field('clients_section_id'); ?>" class="home-clients home-section section" style="background-color: <?php echo get_field('clients_section_background_color'); ?>');">

<?php endif; ?>
   
    <div class="section-wrap">
        <h2><?php echo get_field('clients_section_title');?></h2>
        <span class="sub-title"><?php echo get_field('clients_section_sub_title');?></span>

        <div class="flex-container">
            <?php if(have_rows('clients_boxes')): while(have_rows('clients_boxes')): the_row();?>
            <div class="flex-box">
               <?php $client_logo = get_sub_field('client_logo'); ?>
               <img src="<?php echo $client_logo['url']?>" alt="<?php echo ($client_logo) ? $client_logo['url'] : ''; ?>">
            </div>
            <?php endwhile; endif; ?>
        </div>
    </div>
</section>
