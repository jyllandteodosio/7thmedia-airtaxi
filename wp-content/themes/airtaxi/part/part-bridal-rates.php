<section class="bridal-rates section">
    <div class="section-wrap">
        <h2 class="inner-title"><?php the_field('bridal_rates_title'); ?></h1>

        <div class="box-container">
        <?php if( have_rows('bridal_rates') ) : while(have_rows('bridal_rates')) : the_row(); ?>
        	
        	<div class="box-rate">
	        	<?php
	        	if( get_sub_field('add_image') ) {
	        		$image = get_sub_field('image'); ?>

	        		<img src="<?php echo $image['sizes']['medium']; ?>" alt="<?php echo $image['title']; ?>" />
	        		<div class="box-text">
		        		<h3 class="title"><?php echo get_sub_field('title'); ?></h3>
		        		<span class="price">&#8369; <?php echo get_sub_field('price'); ?></span>
		        	</div>
	        	<?php } else { ?>
	        		<div class="box-text">
		        		<h3 class="title divider"><?php echo get_sub_field('title'); ?></h3>
		        		<table>
		        			<?php if( have_rows('prices') ) : while( have_rows('prices') ) : the_row(); ?>
		        			<tr>
		        				<td><?php echo get_sub_field('service'); ?></td>
		        				<td>&#8369; <?php echo get_sub_field('price'); ?></td>
		        			</tr>
		        			<?php endwhile; endif; ?>
		        		</table>
		        	</div>
	        	<?php } ?>
        	</div>
        <?php endwhile; endif; ?>
        </div>
    </div>
</section>

