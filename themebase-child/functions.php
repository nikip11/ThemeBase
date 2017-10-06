<?php
require( TEMPLATEPATH.'/inc/metaboxes/class-metaboxes.php' );
require_once('shortcodes.php');
if ( function_exists( 'register_nav_menus' ) ) {
	register_nav_menus(
		array(
			'main' => 'Main',
			'footer' => 'footer',
			'rrss' => 'rrss'
		)
	);
}


// Custom post type
add_action( 'init', 'create_post_type' );
function create_post_type() {
	register_post_type( 'demo_post',
		array(
			'labels' => array(
				'name' => __( 'Demo custom post' ),
				'singular_name' => __( 'Demo custom' ),
			),
			'public' => true,
			'has_archive' => true,
			'menu_icon' => 'dashicons-location-alt',
			'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt', 'page-attribute')
		)
	);
}
?>