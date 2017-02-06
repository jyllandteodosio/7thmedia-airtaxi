<?php
/**
 * 
 * Plugin Name: Search Airplane Rates 
 * Plugin URI: http://7thmedia.com
 * Description: A plugin for searching airplane rates
 * Version: 1.0
 * Author: 7th Media
 * Author URI: http://7thmedia.com
 * License: GPL2
 * 
 */

class Search_Airplane_Rates extends WP_Widget {
    public function __construct() {
		$widget_ops = array( 
			'classname' => 'search_airplane_rates',
			'description' => 'Search Airplane Rates ',
		);
		parent::__construct( 'search_airplane_rates', 'Search Airplane Rates ', $widget_ops );
	}

    /**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	function widget($args, $instance) {
        extract( $args );
        $origin = empty($instance['origin']) ? '' : $instance['origin'];
        $destination = empty($instance['destination']) ? '' : $instance['destination'];
        
        // these are the widget options
        echo $before_widget;
        
        // 
        
        // Display the widget
        ?>
        <div class="search-airplane-rates">
            <form role="search" method="get" id="search-airplane-rates" action="<?php echo get_bloginfo('url');?>/airplane-rates/" autocomplete="off" class="rates-search-form">
                <label for="origin">Fly from</label>
                <?php fjarrett_custom_taxonomy_dropdown( 'origin', $origin ); ?>
                <label for="origin">To</label>
                <?php fjarrett_custom_taxonomy_dropdown( 'destination', $destination ); ?>
                <input type="submit" id="rates-search-submit" value="Check Rates" class="rates-search-submit"/>
            </form>
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
        $origin = ! empty( $instance['origin'] ) ? $instance['origin'] : esc_html__( '', 'text_domain' );
        $destination = ! empty( $instance['destination'] ) ? $instance['destination'] : esc_html__( '', 'text_domain' );
        
        $args = array(
            'hide_empty' => false
        );
        $terms_origin = get_terms( 'origin', $args );
        $terms_destination = get_terms( 'destination', $args );
        
        
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('text'); ?>">Default Origin: 
                <select class='widefat' id="<?php echo $this->get_field_id('origin'); ?>"
                name="<?php echo $this->get_field_name('origin'); ?>" type="text">
                    <?php
                        foreach ( $terms_origin as $term_origin ) {
                            if($term_origin->slug == $origin) {
                                printf( '<option value="%s" selected>%s</option>', esc_attr( $term_origin->slug ), esc_html( $term_origin->name ) );
                            } else {
                                printf( '<option value="%s">%s</option>', esc_attr( $term_origin->slug ), esc_html( $term_origin->name ) );
                            }
                        }
                    ?>
                </select>
            </label>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('text'); ?>">Default Destination: 
                <select class='widefat' id="<?php echo $this->get_field_id('destination'); ?>"
                name="<?php echo $this->get_field_name('destination'); ?>" type="text">
                    <?php
                        foreach ( $terms_destination as $term_destination ) {
                            if($term_destination->slug == $origin) {
                                printf( '<option value="%s" selected>%s</option>', esc_attr( $term_destination->slug ), esc_html( $term_destination->name ) );
                            } else {
                                printf( '<option value="%s">%s</option>', esc_attr( $term_destination->slug ), esc_html( $term_destination->name ) );
                            }
                        }
                    ?>
                </select>
            </label>
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
        $instance['origin'] = $new_instance['origin'];
        $instance['destination'] = $new_instance['destination'];
        return $instance;
	}
}

// register widget
add_action('widgets_init',
	create_function('', 'return register_widget("Search_Airplane_Rates");')
);

function fjarrett_custom_taxonomy_dropdown( $taxonomy, $selected ) {
    $args = array(
        'hide_empty' => false
    );
	$terms = get_terms( $taxonomy, $args );
	if ( $terms ) {
		printf( '<select name="%s" class="postform">', esc_attr( $taxonomy ) );
		foreach ( $terms as $term ) {
            if($term->slug == $selected) {
                printf( '<option value="%s" selected>%s</option>', esc_attr( $term->slug ), esc_html( $term->name ) );
            } else {
                printf( '<option value="%s">%s</option>', esc_attr( $term->slug ), esc_html( $term->name ) );
            }
			
		}
		print( '</select>' );
	}
}

function flight_time_converter ( $decimal_hours ) {
    $formatted_hours = '';
    $hour = floor($decimal_hours);
    $minute = $decimal_hours - $hour;
    $min_con = '';
    
    if($hour == 1) {
        $formatted_hours = $hour . ' hour ';
    } else if ($hour > 1) {
        $formatted_hours = $hour . ' hours ';
    }
    
    switch ($minute) {
        case 0.10: $min_con = '5 minutes'; break;
        case 0.20: $min_con = '10 minutes'; break;
        case 0.25: $min_con = '15 minutes'; break;
        case 0.50: $min_con = '30 minutes'; break;
        case 0.75: $min_con = '45 minutes'; break;
        default: break;
    }
    
    $formatted_hours .= $min_con;
    
    return $formatted_hours;
}