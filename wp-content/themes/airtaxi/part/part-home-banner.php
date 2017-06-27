<section class="home-banner">
    <div class="text-wrap">
        <div class="text-container">
            <span class="text"><?php echo get_field('banner_text'); ?></span>
            <span class="button-heading"><?php echo get_field('banner_button_heading'); ?></span>
            <a href="<?php echo get_field('banner_button_link'); ?>" class="button"><?php echo get_field('banner_button_title'); ?></a>
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