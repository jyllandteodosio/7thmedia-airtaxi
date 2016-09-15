<?php
/**
 * 
 * Plugin Name: Custom Contact Us
 * Plugin URI: http://7thmedia.com
 * Description: A brief description of the Plugin.
 * Version: 1.0
 * Author: 7th Media
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
        echo '<div class="overlay hidden"><div class="pop-dir hidden"></div></div>';
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
        
        //* Get all contact-us location maps
        
        $post_args = array(
            'posts_per_page'   => 5,
            'category_name'    => 'contact-us-maps',
            'orderby'          => 'date',
            'order'            => 'ASC',
            'post_type'        => 'post',
            'post_status'      => 'publish',
            'suppress_filters' => false 
        );
        
        global $post;
        $temp = $post;
        $posts_array = get_posts( $post_args ); 
        
        echo '<div class="map two-thirds">';
        echo '<h1>Locations</h1>';
        echo '<div class="contact-tabs">';
        echo '<div class="contact-tab-links-container">';
        echo '<ul class="contact-tab-links">';
        
        $first = 0;
        
        foreach ( $posts_array as $post ) :
            setup_postdata( $post );
            $first++;
        
            if($first == 1):
            echo '<li class="active one-fifth first"><a class="contact-map map-'.strtolower(get_the_title()).'" href="#tab'.$first.'">'.get_the_title().'</a></li>';
        
            else:
            echo '<li class="one-fifth"><a class="contact-map map-'.strtolower(get_the_title()).'" href="#tab'.$first.'">'.get_the_title().'</a></li>';
            
            endif;
            
        endforeach;
        
        echo '</ul>'; // .contact-tab-links
        echo '</div>'; // .contact-tab-links-container
        
        // Tab Container
        echo '<div class="contact-tab-content">';
        
        $first = 0;
        
        foreach ( $posts_array as $post ) :
            setup_postdata( $post );
        
            $first++;
            
            //Tab Content
            if($first == 1):
            echo '<div id="tab'.$first.'" class="tab active">';
            else:
            echo '<div id="tab'.$first.'" class="tab">';
            endif;
        
            // Google Map
            echo '<div class="google-map">';
        
            echo '<div class="contact-maps" id="'.$first.'">';
        
            echo '<div class="map-coords hidden">';
            echo '<input type="hidden" id="marker-lat-'.$first.'" value="'.get_field('map')['lat'].'"/>';
            echo '<input type="hidden" id="marker-lng-'.$first.'" value="'.get_field('map')['lng'].'"/>';
            echo '</div>'; // .map-coords .hidden
        
            echo '<div id="map-'.$first.'" class="map-container" style="height: 360px; width: 720px"></div>';
            echo '</div>'; // .contact-maps
        
            echo '</div>'; // .google-map
        
            // Map Details
            echo '<div class="map-details">';
        
            // Hangar Name
            echo '<div class="map-name"><h3>'.get_field('hangar_name').'</h3></div>';
        
            // Hangar Address
            echo '<div class="map-address"><p>'.get_field('hangar_address').'</p></div>';
        
            // Hangar Driving Directions
            echo '<div class="map-links">
                    <div class="map-links-label">Driving directions: </div>
                    <ul>
                        <li><a id="p'.$first.'" class="contact-map map-view">View</a></li>
                        <li><a href="'.get_field('driving_directions')['url'].'" class="contact-map map-download" download>Download</a></li>
                        <li><a id="email-dir-'.$first.'" href="#" class="contact-map map-email">Email</a></li>
                    </ul>';
            echo '</div>'; // .map-links
            echo '</div>'; // .map-details
        
            // Driving Directions Popup
            echo '<input type="hidden" id="map-name-p'.$first.'" value="'.get_field('hangar_name').'"/>';
            echo '<input type="hidden" id="map-address-p'.$first.'" value="'.get_field('hangar_address').'"/>';
            echo '<input type="hidden" id="map-image-p'.$first.'" value="'.get_field('driving_directions')['url'].'"/>';
            echo '<input type="hidden" id="map-image-alt-p'.$first.'" value="'.get_field('driving_directions')['alt'].'"/>';
        
            echo '</div>'; // .tab
            
        endforeach;
        
        $post=$temp;
        
        echo '</div>';  // .contact-tab-content
        echo '</div>';  // .contact-tabs
        echo '</div>';  // .map .two-thirds
        
        echo '</div>'; // .widget-text .wp_widget_plugin_box
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