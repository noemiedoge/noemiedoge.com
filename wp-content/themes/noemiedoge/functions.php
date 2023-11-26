<?php

require_once __DIR__ . '/config/custom-postypes.php';

add_action( 'after_setup_theme', function () {
	load_theme_textdomain( 'noemiedoge', get_template_directory() . '/languages' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'html5', array( 'search-form', 'navigation-widgets' ) );
	add_theme_support( 'woocommerce' );
	global $content_width;
	if ( ! isset( $content_width ) ) {
		$content_width = 1920;
	}
	register_nav_menus( array( 'main-menu' => esc_html__( 'Main Menu', 'noemiedoge' ) ) );
} );


add_action( 'wp_enqueue_scripts', function () {
	$version = wp_get_theme()['Version'];
	wp_enqueue_style( 'noemiedoge-style', get_stylesheet_uri(), [], $version );
} );

add_filter( 'document_title_separator', function ( $sep ) {
	$sep = esc_html( '|' );

	return $sep;
} );

add_filter( 'the_title', function ( $title ) {
	if ( $title == '' ) {
		return esc_html( '...' );
	} else {
		return wp_kses_post( $title );
	}
} );


function noemiedoge_schema_type() {
	$schema = 'https://schema.org/';
	if ( is_single() ) {
		$type = "Article";
	} elseif ( is_author() ) {
		$type = 'ProfilePage';
	} elseif ( is_search() ) {
		$type = 'SearchResultsPage';
	} else {
		$type = 'WebPage';
	}
	echo 'itemscope itemtype="' . esc_url( $schema ) . esc_attr( $type ) . '"';
}

add_filter( 'nav_menu_link_attributes', function ( $atts ) {
	$atts['itemprop'] = 'url';

	return $atts;
}, 10 );

add_action( 'wp_body_open', function () {
	echo '<a href="#content" class="skip-link screen-reader-text">' . esc_html__( 'Skip to the content',
			'noemiedoge' ) . '</a>';
}, 5 );


add_filter( 'the_content_more_link', function () {
	if ( ! is_admin() ) {
		return ' <a href="' . esc_url( get_permalink() ) . '" class="more-link">' . sprintf( __( '...%s',
				'noemiedoge' ),
				'<span class="screen-reader-text">  ' . esc_html( get_the_title() ) . '</span>' ) . '</a>';
	}
} );

add_filter( 'excerpt_more', function ( $more ) {
	if ( ! is_admin() ) {
		global $post;

		return ' <a href="' . esc_url( get_permalink( $post->ID ) ) . '" class="more-link">' . sprintf( __( '...%s', 'noemiedoge' ), '<span class="screen-reader-text">  ' . esc_html( get_the_title() ) . '</span>' ) . '</a>';
	}
} );

add_filter( 'big_image_size_threshold', '__return_false' );
add_filter( 'intermediate_image_sizes_advanced', function ( $sizes ) {
	unset( $sizes['medium_large'] );
	unset( $sizes['1536x1536'] );
	unset( $sizes['2048x2048'] );

	return $sizes;
} );

add_action( 'widgets_init', function () {
	register_sidebar( array(
		'name' => esc_html__( 'Sidebar Widget Area', 'noemiedoge' ),
		'id' => 'primary-widget-area',
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
} );

function gallery_wrapper( $block_content, $block ) {
	if ( $block['blockName'] === 'core/gallery' ) {
		// Wrap the gallery block content in a div
		$block_content = '<div class="gallery_wrapper">' . $block_content . '</div>';
	}
	return $block_content;
}

add_filter( 'render_block', 'gallery_wrapper', 10, 2 );