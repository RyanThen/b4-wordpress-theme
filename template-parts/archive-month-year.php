<?php

function wp_custom_archive($args = '') {
	global $wpdb, $wp_locale;
	
	$defaults = array(
		'limit' => '',
		'format' => 'html', 'before' => '',
		'after' => '', 'show_post_count' => false,
		'echo' => 1
	);
	
	$r = wp_parse_args( $args, $defaults );
	extract( $r, EXTR_SKIP );
	
	if ( '' != $limit ) {
		$limit = absint($limit);
		$limit = ' LIMIT '.$limit;
	}
	
	// over-ride general date format ? 0 = no: use the date format set in Options, 1 = yes: over-ride
	$archive_date_format_over_ride = 0;
	
	// options for daily archive (only if you over-ride the general date format)
	$archive_day_date_format = 'Y/m/d';
	
	// options for weekly archive (only if you over-ride the general date format)
	$archive_week_start_date_format = 'Y/m/d';
	$archive_week_end_date_format   = 'Y/m/d';
	
	if ( !$archive_date_format_over_ride ) {
		$archive_day_date_format = get_option('date_format');
		$archive_week_start_date_format = get_option('date_format');
		$archive_week_end_date_format = get_option('date_format');
	}
	
	//filters
	$where = apply_filters('customarchives_where', "WHERE post_type = 'post' AND post_status = 'publish'", $r );
	$join = apply_filters('customarchives_join', "", $r);
	
	$output = '<ul class="list-unstyled mb-0">';
	
	$query = "SELECT YEAR(post_date) AS `year`, MONTH(post_date) AS `month`, count(ID) as posts FROM $wpdb->posts $join $where GROUP BY YEAR(post_date), MONTH(post_date) ORDER BY post_date DESC $limit";
	$key = md5($query);
	$cache = wp_cache_get( 'wp_custom_archive' , 'general');
	if ( !isset( $cache[ $key ] ) ) {
		$arcresults = $wpdb->get_results($query);
		$cache[ $key ] = $arcresults;
		wp_cache_set( 'wp_custom_archive', $cache, 'general' );
	} else {
		$arcresults = $cache[ $key ];
	}
	if ( $arcresults ) {
		$afterafter = $after;
		foreach ( (array) $arcresults as $arcresult ) {
			$url = get_month_link( $arcresult->year, $arcresult->month );
			/* translators: 1: month name, 2: 4-digit year */
			$text = sprintf(__('%s'), $wp_locale->get_month($arcresult->month));
			$year_text = sprintf('<li>%d</li>', $arcresult->year);
			if ( $show_post_count )
				$after = '&nbsp;('.$arcresult->posts.')' . $afterafter;
			$output .= ( $arcresult->year != $temp_year ) ? $year_text : '';
			$output .= get_archives_link($url, $text, $format, $before, $after);
			
			$temp_year = $arcresult->year;
		}
	}
	
	$output .= '</ul>';
	
	if ( $echo )
		echo $output;
	else
		return $output;
}