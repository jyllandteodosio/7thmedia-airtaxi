<section data-id="" class="home-banner section">
    <div class="text-wrap">
        <div class="text-container">
            <span class="text"><?php echo get_field('banner_text'); ?></span>
            <?php if(have_rows('banner_buttons')): ?>
                <div class="buttons-container">
                    <?php while(have_rows('banner_buttons')): the_row(); ?>
                    <a href="<?php echo get_sub_field('button_link'); ?>" class="button"><?php echo get_sub_field('button_title'); ?></a>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class='video-wrap'>
    <?php
    $video_url = get_field('banner_video');
    $placeholder_image = get_field('banner_placeholder_image');
    $fallback_image = $placeholder_image;

    if($video_url && $placeholder_image && $fallback_image):

    echo "<div class='video' data-src='".$fallback_image."' data-video='".$video_url."' data-placeholder='".$placeholder_image."'></div>";

    endif;
    ?>
    </div>
</section>