<?php

function dnd_files() {
	//Enqueue Styles
	wp_enqueue_style('bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css');
	wp_enqueue_style('fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css');
	wp_enqueue_style('album', get_template_directory_uri() . '/css/album.css');
	wp_enqueue_style('custom-styles', get_template_directory_uri() . '/css/custom-styles.css');
	if(is_page('blog')) {
		wp_enqueue_style('album', get_template_directory_uri() . '/css/blog.css');
	}
	
	//Enqueue Scripts
	wp_enqueue_script('jquery', '', NULL, false, true);
	wp_enqueue_script('bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js', NULL, false, true);
}
add_action('wp_enqueue_scripts', 'dnd_files');


function dnd_theme_features() {
	add_theme_support('title-tag');
	add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'dnd_theme_features');

function dnd_query_adjustments($query) {
	if (!is_admin() AND is_post_type_archive('show') AND $query->is_main_query()) {
		$today = date('Ymd');
		$query->set('meta_key', 'show_date');
		$query->set('orderby', 'meta_value');
		$query->set('order', 'ASC');
		$query->set('meta_query', array(
				array(
					'key' => 'show_date',
					'compare' => '>=',
					'value' => $today,
					'type' => 'DATETIME'
				)
			)
		);
	}
	
	// ----- Blog Home Query Adjustment
//	if (!is_admin() AND is_home() AND $query->is_main_query()) {
//		$query->set('posts_per_page', -1);
//	}
	
}
add_action('pre_get_posts', 'dnd_query_adjustments');

// Allow only one featured post on blog home
function update_featured_post() {
	
	global $posts;
	global $post;
	
	// Get other post marked as featured
	$posts = get_posts([
		// Array of posts to check
		'post_type' => 'post',
		'meta_key' => 'featured_post',
		'meta_value' => true,
		'post__not_in' => [$post->ID]
	]);
	
	// Remove previous featured posts
	if ( get_field( 'featured_post' ) ) {
		foreach( $posts as $p ) {
			update_field('featured_post', '0', $p->ID);
		}
	} return;
	
}
add_action('acf/save_post', 'update_featured_post', 20);
