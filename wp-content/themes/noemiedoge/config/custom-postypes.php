<?php

add_action( 'init', function() {

	register_post_type( 'works', [
		'labels' => [
			'name' => __( 'Works', 'noemiedoge' ),
			'singular_name' => __( 'Work', 'noemiedoge' ),
			'menu_name' => __( 'Works', 'noemiedoge' ),
			'all_items' => __( 'All Works', 'noemiedoge' ),
			'add_new' => __( 'Add New', 'noemiedoge' ),
			'add_new_item' => __( 'Add New Work', 'noemiedoge' ),
			'edit_item' => __( 'Edit Work', 'noemiedoge' ),
			'new_item' => __( 'New Work', 'noemiedoge' ),
			'view_item' => __( 'View Work', 'noemiedoge' ),
			'view_items' => __( 'View Works', 'noemiedoge' ),
			'search_items' => __( 'Search Works', 'noemiedoge' ),
			'not_found' => __( 'No works found', 'noemiedoge' ),
			'not_found_in_trash' => __( 'No works found in Trash', 'noemiedoge' ),
			'parent_item_colon' => __( 'Parent Work:', 'noemiedoge' ),
			'featured_image' => __( 'Featured image for this work', 'noemiedoge' ),
			'set_featured_image' => __( 'Set featured image for this work', 'noemiedoge' ),
			'remove_featured_image' => __( 'Remove featured image for this work', 'noemiedoge' ),
			'use_featured_image' => __( 'Use as featured image for this work', 'noemiedoge' ),
			'archives' => __( 'Work archives', 'noemiedoge' ),
		],
		'public' => true,
		'menu_icon' => 'dashicons-art',
		'menu_position' => 5,
		'supports' => [ 'title', 'editor', 'thumbnail', 'excerpt' ],
		'taxonomies' => [],
		'rewrite' => [ 'slug' => 'works' ],
		'show_in_rest' => true,
		'has_archive' => false,
	] );
} );
