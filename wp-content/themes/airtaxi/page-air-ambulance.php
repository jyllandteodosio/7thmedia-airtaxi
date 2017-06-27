<?php
/**
 * Template Name: Air Ambulance Page
 *
 * @author 
 * @package 
 * @subpackage 
 */

/* add_action( 'wp_enqueue_scripts', 'news_enqueue_scripts_styles' );
function news_enqueue_scripts_styles() {
    
    wp_enqueue_script( 'news', get_bloginfo( 'stylesheet_directory' ) . '/js/news.min.js', array( 'jquery' ), '1.0.0' );
    
}*/

get_header('custom');

?>

<div class="ambulance-page-title">
	<div class="ambulance-header-container">
		<h1><?php the_title(); ?></h1>
	</div>
</div>

<div class="ambulance-banner">
	<?php if( has_post_thumbnail() ): the_post_thumbnail(); endif;?>
</div>

<div class="ambulance-section-gray">
	<div class="ambulance-landing-container">
		<?php if(have_posts()):
				while(have_posts()):
					the_post();
					the_content();
				endwhile;
		else: ?>
		<p>No content</p>
		<?php endif; ?>
	</div>
</div>

<div class="emergency-section-white">
	<div class="emergency-landing-container">
		<p style="text-align: center; width: 100%;"><?php the_field('text'); ?></p>
		<div class="emergency-logos">
		<?php if(have_rows('emergency_services')):
				while(have_rows('emergency_services')): the_row();?>
					<div class="logo">
						<?php $logo = get_sub_field('logo'); ?>
						<img src="<?php echo $logo['url']; ?>" alt="<?php echo the_sub_field('name');?>">
					</div>
				<?php endwhile;
				endif; ?>
		</div>
	</div>
</div>

<?php get_footer('custom'); ?>