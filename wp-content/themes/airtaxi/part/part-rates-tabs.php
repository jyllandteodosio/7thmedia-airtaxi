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
                        <li class="tab-links">
                            <h2><a href="#tab1"><?php echo get_field('airport_transfers_tab_name'); ?></a></h2>
                        </li>
                        <li class="tab-links">
                            <h2><a href="#tab2"><?php echo get_field('aerial_tours_tab_name'); ?></a></h2>
                        </li>
                        <li class="tab-links">
                            <h2><a href="#tab3"><?php echo get_field('day_trips_tab_name'); ?></a></h2>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="tab-content">
                <div id="1" class="tab active">
                    <table id="airport-transfer">
                        <thead>
                            <tr>
                                <th>Location</th>
                                <th>Flight Time</th>
                                <?php 
                                $aircraft_capacity = array();
                                
                                if(have_rows('airport_transfers_aircrafts')):
                                while(have_rows('airport_transfers_aircrafts')): the_row(); 
                                    
                                    if(get_sub_field('aircraft')): 
                                    $post = get_sub_field('aircraft');
                                    setup_postdata($post);
                                    
                                    array_push($aircraft_capacity, get_field('capacity'));
                                    ?>
                                    
                                    <th><?php the_title(); ?></th>
                                    
                                    <?php wp_reset_postdata(); endif; ?>
                                <?php endwhile; endif;?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(have_rows('airport_transfers')): 
                            $header_displayed = 0;
                            
                            while(have_rows('airport_transfers')): the_row();
                            $term = get_sub_field('location');
                            
                            //* If parent term is the same, display a parent term header
                            if( $term->parent && ($header_displayed != $term->parent) ):
                            $header_displayed = $term->parent;
                            ?>
                            <tr class="heading">
                                <th><?php echo get_term($term->parent, 'locations')->name; ?></th>
                                <th></th>
                                <?php foreach($aircraft_capacity as $capacity): ?>
                                <th><?php echo $capacity; ?></th>
                                <?php endforeach;?>
                            </tr>
                            <?php endif; ?>
                            
                            <tr>
                                <td><?php echo $term->name; ?></td>
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
                
                <div id="2" class="tab"></div>
                
                <div id="3" class="tab"></div>
            </div>
        </div>
    </div>
</section>