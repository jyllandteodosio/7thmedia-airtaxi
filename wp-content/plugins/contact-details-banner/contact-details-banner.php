<?php
/**
 * 
 * Plugin Name: Contact Details Banner 
 * Plugin URI: http://7thmedia.com
 * Description: Adds a banner containing the contact details
 * Version: 1.0
 * Author: 7th Media
 * Author URI: http://7thmedia.com
 * License: GPL2
 * 
 */
?>


<?php

class Contact_Details_Banner extends WP_Widget {
    
    public function __construct() {
		$widget_ops = array( 
			'classname' => 'contact_details_banner',
			'description' => 'Contact Details Banner',
		);
		parent::__construct( 'contact_details_banner', 'Contact Details Banner', $widget_ops );
	}

    /**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	function widget($args, $instance) {
        extract( $args );
        // these are the widget options
        echo $before_widget;
        ?>
        <div class="call-now"><?php echo get_field('contact_details_label', 'option'); ?>
            <?php
            if ( have_rows('contact_item', 'option') ): while( have_rows('contact_item', 'option') ): the_row();
                if( get_sub_field('contact_type') == 'telephone' ):
                ?>
                    <div class="call-tel">
                        <i class="fa fa-phone fa-lg"></i>
                        <a href="tel:<?php echo get_sub_field('telephone_number'); ?>"><?php echo get_sub_field('telephone_number'); ?></a>
                    </div>
                <?php
                elseif( get_sub_field('contact_type') == 'mobile' ):
                ?>
                    <div class="call-mob">
                        <i class="fa fa-mobile-phone fa-lg"></i>
                    <a href="tel:<?php echo get_sub_field('mobile_number'); ?>"><?php echo get_sub_field('mobile_number'); ?></a>
                    </div>
                <?php
                elseif( get_sub_field('contact_type') == 'email' ):
                ?>
                    <div class="call-mob">
                        <i class="fa fa-envelope fa-lg"></i>	
                        <a href="mailto:<?php echo get_sub_field('email_address'); ?>"><?php echo get_sub_field('email_address'); ?></a>
                    </div>
                <?php
                endif;
            endwhile; endif;
            ?>
        </div>
        <?php
        echo $after_widget;
	}
    
	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	function form( $instance ) {
	}

	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 */
	function update( $new_instance, $old_instance ) {
	}

	
}

// register widget
add_action('widgets_init',
	create_function('', 'return register_widget("Contact_Details_Banner");')
);