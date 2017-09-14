<section class="rates-header section">
    <div class="section-wrap">
        <div class="text-container">
            <h1 class="inner-title"><?php the_title(); ?></h1>
            <div class="rates-content">
                <?php the_content(); ?>
            </div>
        </div>
    </div>
</section>

<section class="rates-tabs section">
    <div class="section-wrap">
        <?php $image = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) );?>
        <div class="tabs-wrap" style="<?php echo $image ? 'background-image: url('.$image.')' : ''; ?>;">
            <div class="tab-links-box">
                <div class="tab-links-wrap">
                    <ul>
                        <li class="tab-links tab1-link active">
                            <h2><a href="#tab1" class="tab1"><?php echo get_field('airport_transfers_tab_name'); ?></a></h2>
                        </li>
                        <li class="tab-links tab2-link">
                            <h2><a href="#tab2" class="tab2"><?php echo get_field('aerial_tours_tab_name'); ?></a></h2>
                        </li>
                        <li class="tab-links tab3-link">
                            <h2><a href="#tab3" class="tab3"><?php echo get_field('day_trips_tab_name'); ?></a></h2>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="tab-content">
                <div id="tab1" class="tab active">
                    <div class="airport-transfer-wrap">
                        <table id="airport-transfer" class="airport-transfer">
                            <thead>
                                <tr>
                                    <th>Location</th>
                                    <th>Location Type</th>
                                    <th>Flight Time</th>
                                    <?php 
                                    $aircraft_capacity = array();

                                    if(have_rows('airport_transfers_aircrafts')):
                                    while(have_rows('airport_transfers_aircrafts')): the_row(); 

                                        if(get_sub_field('aircraft')): 
                                        $post = get_sub_field('aircraft');
                                        setup_postdata($post);

                                        $capacity = get_field('capacity');
                                        
                                        //* Display user icons depending on the aircraft capacity
                                        ?>
                                        <th>
                                            <?php the_title(); ?>
                                            <br/>
                                            <?php for($i = 0; $i < $capacity; $i++): ?>
                                                <i class="fa fa-user"></i>
                                                <?php 
                                                //* If user icon displayed is half the capacity, add spacing
                                                if($i+1 == ($capacity/2)): ?>
                                                    &nbsp;&nbsp;
                                                <?php endif; ?>

                                            <?php endfor; ?>
                                        </th>

                                        <?php wp_reset_postdata(); endif; ?>
                                    <?php endwhile; endif;?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(have_rows('airport_transfers')): 
                                while(have_rows('airport_transfers')): the_row();
                                
                                //* Get term to get location (term->name) and location type (term->parent)
                                $term = get_sub_field('location');
                                ?>

                                <tr>
                                    <td><?php echo $term->name; ?></td>
                                    <td><?php echo get_term($term->parent, 'locations')->name; ?></td>
                                    <td><?php echo get_sub_field('flight_time'); ?></td>
                                    <?php 
                                    if(have_rows('aircraft_rate')): 
                                    while(have_rows('aircraft_rate')): the_row(); ?>

                                    <td>P <?php echo get_sub_field('rate'); ?></td>

                                    <?php endwhile; endif; ?>

                                </tr>
                                <?php endwhile; endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                
                <div id="tab2" class="tab">
                    <div class="aerial-tours-wrap">
                        <div class="aerial-tours">
                            <?php 
                            if(have_rows('aerial_tours')):
                            while(have_rows('aerial_tours')): the_row(); ?>

                            <div class="rates-box">

                                <div class="rates-box-row">
                                    <div class="rates-box-header">
                                        <?php echo get_sub_field('tour_name'); ?>
                                    </div>
                                </div>
                                <div class="rates-box-row">
                                    <div class="rates-box-title">
                                        <?php echo get_sub_field('tour_highlights'); ?>
                                    </div>
                                </div>
                                <div class="rates-box-duration">
                                    <?php echo get_sub_field('duration'); ?>
                                </div>

                                <table class="rates-box-list">
                                <?php
                                if( have_rows('aircraft_rates') ):
                                while ( have_rows('aircraft_rates') ) : the_row();

                                    if(get_sub_field('aircraft')):
                                    $post = get_sub_field('aircraft');
                                    $rate = get_sub_field('rate');
                                    setup_postdata($post);

                                    ?>
                                    <tr class="rates-box-item">
                                        <td>
                                            <div class="item-capacity">
                                                <?php echo get_field('capacity'); ?> PAX
                                            </div>
                                            <div class="item-aircraft">
                                                <?php echo get_field('model'); ?>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="item-price">
                                                &#8369; <?php echo $rate; ?>
                                            </div>
                                       </td>
                                   </tr>
                                    <?php wp_reset_postdata(); endif; ?>
                                <?php endwhile; endif; ?>
                                </table>
                            </div>

                            <?php endwhile; endif; ?>
                        </div>
                    </div>
                </div>
                
                <div id="tab3" class="tab"></div>
            </div>
        </div>
    </div>
</section>