<?php
/**
 * 
 * Plugin Name: Custom Featured News 
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

class Custom_Featured_News extends WP_Widget {
    
    public function __construct() {
		$widget_ops = array( 
			'classname' => 'custom_featured_news',
			'description' => 'Custom Featured News',
		);
		parent::__construct( 'custom_featured_news', 'Custom Featured News', $widget_ops );
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
        echo $before_widget;
        
        // Display the widget
        echo '<div class="widget-text wp_widget_plugin_box">';
        
        //* Get latest featured post with category news + featured news
        $post_args = array(
            'posts_per_page'   => 1,
            'category_name'    => 'news+featured-news',
            'orderby'          => 'date',
            'order'            => 'DESC',
            'post_type'        => 'post',
            'post_status'      => 'publish',
            'suppress_filters' => false 
        );
        
        global $post;
        $temp = $post;
        $posts_array = get_posts( $post_args ); 
        
        foreach ( $posts_array as $post ) :
            setup_postdata( $post );
        
            $featuredURL = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'large');
            
            echo '<div class="featured-news" style="background: linear-gradient(
            rgba(31, 31, 31, 0.6), 
            rgba(31, 31, 31, 0.6)
            ), url('.$featuredURL.');
            background-size: cover">';
        
            echo '<article>';
        
            echo '<h4>Featured Post</h4>';
            echo '<h1>'.$post->post_title.'</h1>';
        
            echo the_advanced_excerpt();
        
            echo '</article>';
    
            echo '</div>'; // .featured-news
        
        endforeach;
        
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
        } else {
            $title = '';
        }
        ?>

        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Widget Title', 'wp_widget_plugin'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
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
        return $instance;
	}

	
}

// register widget
add_action('widgets_init',
	create_function('', 'return register_widget("Custom_Featured_News");')
);