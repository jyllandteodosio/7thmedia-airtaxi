<?php
/**
 * Plugin Functions
 *
 * @package   expanding-archives
 * @copyright Copyright (c) 2016, Nose Graze Ltd.
 * @license   GPL2+
 */

/**
 * Get Months
 *
 * @since 1.0.5
 * @return array
 */
function expanding_archives_get_months() {
	global $wpdb;
    
//    $months1 = $wpdb->get_results( "SELECT DISTINCT 
//        MONTH( post_date ) AS month , 
//        YEAR( post_date ) AS year, 
//        COUNT( id ) as post_count 
//        FROM $wpdb->posts p
//        JOIN $wpdb->term_relationships tr ON (p.ID = tr.object_ID)
//        JOIN $wpdb->term_taxonomy tt ON (tr.term_taxonomy_id = tt.term_taxonomy_id)
//        JOIN $wpdb->terms t ON (tt.term_id = t.term_id)
//        WHERE p.post_status = 'publish' 
//        and p.post_date <= now( ) 
//        and p.post_type = 'post' 
//        and tt.taxonomy = 'category'
//        and t.term_id = 30
//        GROUP BY month , year 
//        ORDER BY post_date DESC" );
//        
//        var_dump($months1);
//        exit();
    
    $cat = get_cat_ID('news');

	if ( false === ( $months = get_transient( 'expanding_archives_months' ) ) ) {
		$months = $wpdb->get_results( "SELECT DISTINCT 
        MONTH( post_date ) AS month , 
        YEAR( post_date ) AS year, 
        COUNT( id ) as post_count 
        FROM $wpdb->posts p
        JOIN $wpdb->term_relationships tr ON (p.ID = tr.object_ID)
        JOIN $wpdb->term_taxonomy tt ON (tr.term_taxonomy_id = tt.term_taxonomy_id)
        JOIN $wpdb->terms t ON (tt.term_id = t.term_id)
        WHERE p.post_status = 'publish' 
        and p.post_date <= now( ) 
        and p.post_type = 'post' 
        and tt.taxonomy = 'category'
        and t.term_id = $cat
        GROUP BY month , year 
        ORDER BY post_date DESC" );
        
		set_transient( 'expanding_archives_months', $months, DAY_IN_SECONDS );
	}

	return apply_filters( 'expanding-archives/months', $months );
}