<?php if(get_field('bridal_section_background') == 'color'): ?>

<section id="<?php echo get_field('bridal_section_id'); ?>" class="home-bridal home-section section" style="background-color: <?php echo get_field('bridal_section_background_color'); ?>');">

<?php else: ?>

<section id="<?php echo get_field('bridal_section_id'); ?>" class="home-bridal home-section section" style="background-image: url('<?php echo get_field('bridal_section_background_image'); ?>');">

<?php endif; ?>
   
    <div class="section-wrap">
        <h2><?php echo get_field('bridal_section_title');?></h2>
        <span class="sub-title"><?php echo get_field('clients_section_sub_title');?></span>

        <div class="flex-container">
            <?php if(have_rows('bridal_section_packages')): while(have_rows('bridal_section_packages')): the_row();?>
            <a href="<?php echo get_sub_field('package_link') . '?' . get_sub_field('custom_url_parameter'); ?>">
            <div class="flex-box">
              <img src="<?php echo get_sub_field('package_thumbnail'); ?>" alt="<?php echo ($client_logo) ? $client_logo['url'] : ''; ?>">
              <p class="package-name"><?php echo get_sub_field('package_name'); ?></p>
            </div>
            </a>
            <?php endwhile; endif; ?>
        </div>

        <a href="<?php echo get_field('bridal_button_link');?>" class="button"><?php echo get_field('bridal_button_title');?></a>
    </div>
</section>
