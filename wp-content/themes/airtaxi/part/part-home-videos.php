<?php if(get_field('videos_section_background') == 'Color'): ?>

<section id="<?php echo get_field('videos_section_id'); ?>" class="home-videos home-section section" style="background-color: <?php echo get_field('videos_section_background_color'); ?>');">

<?php else: ?>

<section id="<?php echo get_field('videos_section_id'); ?>" class="home-videos home-section section" style="background-image: url('<?php echo get_field('videos_section_background_image'); ?>');">

<?php endif; ?>
   
    <div class="section-wrap">
        <div class="flex-container">
            <?php if(have_rows('videos_boxes')): while(have_rows('videos_boxes')): the_row();?>
            
            <?php 
            $youtube_URL = get_sub_field('youtube_video_url');
            parse_str( parse_url( $youtube_URL, PHP_URL_QUERY ), $youtube_ID );
            ?>
            
            <div class="flex-box vid-box" data-bg="https://img.youtube.com/vi/<?php echo $youtube_ID['v'];?>/hqdefault.jpg">
               <div class="play-icon">
                   <a href="http://www.youtube.com/watch?v=<?php echo $youtube_ID['v'];?>" class="mpopup_iframe">
                       <img src="<?php echo get_field('youtube_play_icon');?>"/>
                   </a>
               </div>
            </div>
            
            <?php endwhile; endif; ?>
            
            <div class="flex-box visit-box">
               <div class="play-icon">
                   <?php $channel_icon = get_field('youtube_channel_logo'); ?>
                   <div class="channel">
                       <p><?php echo get_field('visit_youtube_text'); ?></p>
                       <a href="<?php echo get_field('youtube_channel_link'); ?>" target="_blank">
                           <img src="<?php echo $channel_icon['url'];?>" alt="<?php echo ($channel_icon['alt']) ? $channel_icon['alt'] : '';?>"/>
                       </a>
                   </div>
               </div>
            </div>
            
        </div>
    </div>
</section>
