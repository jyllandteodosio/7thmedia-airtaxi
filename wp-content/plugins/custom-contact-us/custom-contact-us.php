<?php
/**
 * 
 * Plugin Name: Custom Contact Us
 * Plugin URI: http://7thmedia.com
 * Description: A brief description of the Plugin.
 * Version: 1.0
 * Author: jylland.teodosio@7thmedia.com
 * Author URI: http://7thmedia.com
 * License: GPL2
 * 
 */
?>


<?php

class Custom_Contact_Us extends WP_Widget {
    
    public function __construct() {
		$widget_ops = array( 
			'classname' => 'custom_contact_us',
			'description' => 'Custom Contact Us',
		);
		parent::__construct( 'custom_contact_us', 'Custom Contact Us', $widget_ops );
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
        $title = apply_filters('widget_title', $instance['title']);
        $text = apply_filters('widget_text', $instance['text']);
        echo $before_widget;
        
        // Display the widget
        echo '<div class="widget-text wp_widget_plugin_box">';
        
        // Check if title is set
        if ( $title ) {
            echo $before_title . $title . $after_title;
        }
        
        if ( $text ) {
            echo '<div class="contact-us  one-third first">';
            echo $text;
            echo '</div>';
        }
        
        echo '<div class="map two-thirds">
    <h1>Locations</h1>
    <div class="contact-tabs">
        <div class="contact-tab-links-container">
            <ul class="contact-tab-links">
                <li class="active one-fifth first"><a class="contact-map map-manila" href="#tab1">Manila</a></li>
                <li class="one-fifth"><a class="contact-map map-cebu" href="#tab2">Cebu</a></li>
                <li class="one-fifth"><a class="contact-map map-boracay" href="#tab3">Boracay</a></li>
                <li class="one-fifth"><a class="contact-map map-clark" href="#tab4">Clark</a></li>
                <li class="one-fifth"><a class="contact-map map-davao" href="#tab5">Davao</a></li>
            </ul>
        </div>
        <div class="contact-tab-content">
            <div id="tab1" class="tab active">
                <div class="google-map">
                tab1
                </div>
                <div class="map-details">
                    <div class="map-name">MANILA, AirTaxi.PH Hangar</div>
                    <div class="map-address">
                        <p>Asian Aerospace Center, Lima Gate, Andrews Avenue</p>
                        <p>Manila International Airport Complex</p>
                        <p>Pasay City, 1300 Philippines</p>
                    </div>
                    <div class="map-links">
                        <div class="map-links-label">Driving directions: </div>
                        <ul>
                            <li><a href="#" class="contact-map map-view">View</a></li>
                            <li><a href="#" class="contact-map map-download">Download</a></li>
                            <li><a href="#" class="contact-map map-email">Email</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div id="tab2" class="tab">
                <div class="google-map">
                tab2
                </div>
                <div class="map-details">
                    <div class="map-name">CEBU, AirTaxi.PH Hangar</div>
                    <div class="map-address">
                        <p>Asian Aerospace FBO Facility, Lots 8,9, and 21</p>
                        <p>Gen. Aviation, Mactan-Cebu International Airport</p>
                        <p>Lapu-Lapu City, 2009 Philippines</p>
                    </div>
                    <div class="map-links">
                        <div class="map-links-label">Driving directions: </div>
                        <ul>
                            <li><a href="#" class="contact-map map-view">View</a></li>
                            <li><a href="#" class="contact-map map-download">Download</a></li>
                            <li><a href="#" class="contact-map map-email">Email</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div id="tab3" class="tab">
                <div class="google-map">
                tab3
                </div>
                <div class="map-details">
                    <div class="map-name">BORACAY, AirTaxi.PH Hangar</div>
                    <div class="map-address">
                        <p>Asian Aerospace Center, Lima Gate, Andrews Avenue</p>
                        <p>Manila International Airport Complex</p>
                        <p>Pasay City, 1300 Philippines</p>
                    </div>
                    <div class="map-links">
                        <div class="map-links-label">Driving directions: </div>
                        <ul>
                            <li><a href="#" class="contact-map map-view">View</a></li>
                            <li><a href="#" class="contact-map map-download">Download</a></li>
                            <li><a href="#" class="contact-map map-email">Email</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div id="tab4" class="tab">
                <div class="google-map">
                tab4
                </div>
                <div class="map-details">
                    <div class="map-name">CLARK, AirTaxi.PH Hangar</div>
                    <div class="map-address">
                        <p>Asian Aerospace FBO Facility, Gate 8</p>
                        <p>Clark International Airport Complex</p>
                        <p>Pampanga City, 2009 Philippines</p>
                    </div>
                    <div class="map-links">
                        <div class="map-links-label">Driving directions: </div>
                        <ul>
                            <li><a href="#" class="contact-map map-view">View</a></li>
                            <li><a href="#" class="contact-map map-download">Download</a></li>
                            <li><a href="#" class="contact-map map-email">Email</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div id="tab5" class="tab">
                <div class="google-map">
                tab5
                </div>
                <div class="map-details">
                    <div class="map-name">DAVAO, AirTaxi.PH Hangar</div>
                    <div class="map-address">
                        <p>Asian Aerospace Center, Lima Gate, Andrews Avenue</p>
                        <p>Manila International Airport Complex</p>
                        <p>Pasay City, 1300 Philippines</p>
                    </div>
                    <div class="map-links">
                        <div class="map-links-label">Driving directions: </div>
                        <ul>
                            <li><a href="#" class="contact-map map-view">View</a></li>
                            <li><a href="#" class="contact-map map-download">Download</a></li>
                            <li><a href="#" class="contact-map map-email">Email</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="contact-apply">
        Want to join our team?
        <a href="#" class="contact-map map-inquire">Inquire Here</a>
    </div>
</div>';
        
        echo '</div>';
        echo $after_widget;
	}
    
	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	function form( $instance ) {	

        // Check values
        if( $instance ) {
            $title = esc_attr($instance['title']);
            $text = esc_attr($instance['text']);
        } else {
            $title = '';
            $text = '';
        }
        ?>

        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Widget Title', 'wp_widget_plugin'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('text'); ?>"><?php _e('Contact Form 7 Shortcode:', 'wp_widget_plugin'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>" type="text" value="<?php echo $text; ?>" />
        </p>
            
        <?php
	}

	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
        // Fields
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['text'] = strip_tags($new_instance['text']);
        $instance['checkbox'] = strip_tags($new_instance['checkbox']);
        return $instance;
	}

	
}

// register widget
add_action('widgets_init',
	create_function('', 'return register_widget("Custom_Contact_Us");')
);