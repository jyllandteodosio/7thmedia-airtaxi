<?php
/**
 * Template Name: Membership Page
 *
 * @author 
 * @package 
 * @subpackage 
 */

add_action( 'wp_enqueue_scripts', 'membership_enqueue_scripts_styles' );
function membership_enqueue_scripts_styles() {
    
    wp_enqueue_script( 'membership', get_bloginfo( 'stylesheet_directory' ) . '/js/membership.min.js', array( 'jquery' ), '1.0.0' );
    
    wp_enqueue_style( 'wpsm-comptable-styles' );
    wp_enqueue_style( 'dashicons', get_bloginfo( 'stylesheet_directory' ) . '/scss/dashicons.css', array(), '1.0.0' );
}

get_header('custom');
$title = get_the_title();

$count = 0;
$bg_image = '';
$bg_color = 'transparent';

if(have_rows('section')) : while(have_rows('section')) : the_row();

    if( get_sub_field('section_background') == 'image' ):
    $bg_image = get_sub_field('background_image');
    elseif( get_sub_field('section_background') == 'color' ):
    $bg_color = get_sub_field('background_color');
    endif;

    $count++; 

    if( $count == 1 ): ?>
        <div id="<?php the_sub_field('section_id');?>" class="m-panel-title">
            <h1><?php echo $title; ?></h1>
        </div>
        <div class="m-panel" style="background-image: url('<?php echo $bg_image; ?>');background-color: <?php echo $bg_color; ?>;">

    <?php else: ?>
        <div id="<?php the_sub_field('section_id');?>" class="m-panel" style="background-image: url('<?php echo $bg_image; ?>');background-color: <?php echo $bg_color; ?>;">

    <?php endif; ?>
            <div class="m-panel-content">
                <h2 class="m-panel-header">
                    <?php the_sub_field('section_title'); ?>
                </h2>
                <div class="m-panel-table">
                    <?php the_sub_field('content'); ?>
                </div>
            </div>
        </div>

<?php endwhile; endif; ?>

<?php get_footer('custom'); ?>
