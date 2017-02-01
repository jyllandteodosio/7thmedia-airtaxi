<?php
/**
 * Template Name: Airplane Rates Page
 *
 * @author 
 * @package 
 * @subpackage 
 */

add_action( 'wp_enqueue_scripts', 'airplane_rates_enqueue_scripts_styles' );
function airplane_rates_enqueue_scripts_styles() {
    
    wp_enqueue_script( 'airplane-rates', get_bloginfo( 'stylesheet_directory' ) . '/js/airplane-rates.min.js', array( 'jquery' ), '1.0.0' );
}

get_header('custom');

//display page title here
?>

<div class="overlay hidden">
    <div class="pop-email pop-default hidden">
        <div id="pop-email-close" class="pop-dir-close"></div>
        <h4>Please enter your details so we can send you <br/> more information about our rates.</h4>
        <?php the_field('contact_form'); ?>
    </div>
</div>

<div class="airplane-rates widget-title widgettitle"><h1><?php the_title();?></h1></div>
<?php
$origin = get_term_by('slug', $_GET['origin'], 'origin');
$destination = get_term_by('slug', $_GET['destination'], 'destination');
$background_image = get_the_post_thumbnail_url(get_the_id(),'full');
$disclaimer = get_field('disclaimer');

//display search bar here
?>
<div class="wrap">
    <div class="rates-search-bar">
        <div class="search-airplane-rates">
            <form role="search" method="get" id="search-airplane-rates" action="<?php echo get_bloginfo('url');?>/airplane-rates/" autocomplete="off" class="rates-search-form">
                <label for="origin">Fly from</label>
                <?php fjarrett_custom_taxonomy_dropdown( 'origin', $_GET['origin'] ); ?>
                <label for="origin">To</label>
                <?php fjarrett_custom_taxonomy_dropdown( 'destination', $_GET['destination'] ); ?>
                <input type="submit" id="rates-search-submit" value="Check Rates" class="rates-search-submit"/>
            </form>
        </div>
    </div>
</div>
<div class="results-header">
    <h2>Showing airplane rates from <strong><?php echo $origin->name; ?></strong> to <strong><?php echo $destination->name; ?></strong></h2>
</div>
<div class="results-background" style="background:url(<?php echo $background_image; ?>); background-size: cover">  
    <div class="results-wrapper" style="background: rgba(78,197,205,0.4);">
        <div class="wrap">
            <?php
            //get search results
            $rates_origin_args = array(
                'post_type'		=> 'airplane_rates',
                'post_status'   => 'publish',
                'meta_query'    => array(
                    'relation' => 'AND',
                    array (
                        'key'   => 'origin',
                        'value' => $origin->term_id
                    ),
                    array (
                        'key'   => 'destination',
                        'value' => $destination->term_id
                    )
                ),
            );

            $origin_airport = get_field('airport_location', 'origin_' . $origin->term_id);
            $destination_airport = get_field('airport_location', 'destination_' . $destination->term_id);
            
            $rates_origin_query = new WP_Query( $rates_origin_args );

            //display search results
            if ( $rates_origin_query->have_posts() ) : 
                while ( $rates_origin_query->have_posts() ) : 
                $rates_origin_query->the_post();
                $aircraft = get_field('aircraft');
            //    print_r($aircraft);

//                the_title();
                ?>
                <div class="ap-box">
                    <div class="ap-title">
                        <h3><?php echo $aircraft->post_title; ?></h3>
                    </div>
                    <div class="ap-image">
                        <?php echo get_the_post_thumbnail($aircraft->ID, 'large'); ?>
                    </div>
                    <div class="ap-details">
                        <table class="ap-details-table">
                            <tbody>
                                <tr>
                                    <td><span class="ap-capacity-label">Capacity</span></td>
                                    <td><span class="ap-capacity"><?php echo get_field('capacity', $aircraft->ID); ?> Passengers</span></td>
                                </tr>
                                <tr>
                                    <td><span class="ap-flight-label">Flight time per way</span></td>
                                    <td><span class="ap-flight"><?php the_field('flight_time_per_way'); ?></span></td>
                                </tr>
                                <tr>
                                    <td><span class="ap-from-label">From</span></td>
                                    <td><span class="ap-from"><?php echo $origin->name; ?></span></td>
                                </tr>
                                <tr>
                                    <td><span class="ap-to-label">To</span></td>
                                    <td><span class="ap-to"><?php echo $destination->name; ?></span></td>
                                </tr>
                                <tr>
                                    <td><span class="ap-price-label">Rate</span></td>
                                    <td>
                                        <span class="ap-price">
                                            <?php if(get_field('add_rate') == 'Yes'): ?>
                                                <button class="ap-inquire">&#8369; <?php echo get_field('rate'); ?></button>
                                            <?php else : ?>
                                                <button class="ap-inquire">Inquire</button>
                                            <?php endif; ?>
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <?php
            endwhile; endif;
            wp_reset_query();
            ?>
        </div>
        <div class="ap-disclaimer">
            <?php echo $disclaimer; ?>
        </div>
    </div>
</div>
<?php
get_footer('custom');