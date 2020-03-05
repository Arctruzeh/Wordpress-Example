<?php
add_theme_support('post-thumbnails');
/*
	==========================================
	 Import
	==========================================
*/
function ajlato_resources()
{

	wp_enqueue_style('style', get_stylesheet_uri());
}

add_action('wp_enqueue_scripts', 'ajlato_resources');
/*
	==========================================
	 Allow SVG
	==========================================
*/
function cc_mime_types($mimes)
{
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');
/*
	==========================================
	 Custom Post Type - Products
	==========================================
*/
function custom_post_type_products()
{

	$labels = array(
		'name' => 'Products',
		'singular_name' => 'Products',
		'add_new' => 'Add Item',
		'all_items' => 'All Items',
		'add_new_item' => 'Add Item',
		'edit_item' => 'Edit Item',
		'new_item' => 'New Item',
		'view_item' => 'View Item',
		'search_item' => 'Search Products',
		'not_found' => 'No items found',
		'not_found_in_trash' => 'No items found in trash',
		'parent_item_colon' => 'Parent Item'
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'has_archive' => true,
		'publicly_queryable' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_icon' => 'dashicons-screenoptions',
		'supports' => array(
			'title',
			//'editor',
			//'excerpt',
			'thumbnail',
			//'revisions',
			'custom-fields',
		),
		'taxonomies' => array('category', 'post_tag'),
		'menu_position' => 5,
		'exclude_from_search' => false
	);
	register_post_type('products', $args);
}
add_action('init', 'custom_post_type_products');
/*
	==========================================
	 Custom Post Type - Videos
	==========================================
*/
function custom_post_type_videos()
{

	$labels = array(
		'name' => 'Videos',
		'singular_name' => 'Videos',
		'add_new' => 'Add Item',
		'all_items' => 'All Items',
		'add_new_item' => 'Add Item',
		'edit_item' => 'Edit Item',
		'new_item' => 'New Item',
		'view_item' => 'View Item',
		'search_item' => 'Search Videos',
		'not_found' => 'No items found',
		'not_found_in_trash' => 'No items found in trash',
		'parent_item_colon' => 'Parent Item'
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'has_archive' => true,
		'publicly_queryable' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_icon' => 'dashicons-video-alt3',
		'supports' => array(
			'title',
			//'editor',
			//'excerpt',
			'thumbnail',
			//'revisions',
			'custom-fields',
		),
		'taxonomies' => array('category', 'post_tag'),
		'menu_position' => 5,
		'exclude_from_search' => false
	);
	register_post_type('videos', $args);
}
add_action('init', 'custom_post_type_videos');
/*
	==========================================
	 Add to front page
	==========================================
*/
add_action('pre_get_posts', 'add_my_post_types_to_query');

function add_my_post_types_to_query($query)
{
	if (is_home() && $query->is_main_query())
		$query->set('post_type', array('products', 'videos'));
	return $query;
}
