<?php
/************************************************************************
* 
* ====== Functions File ======
*
* You can place custom functions in this file, make sure to place the 
* functions below this comment block.
*************************************************************************/
// require_once('inc/option-page.php');
// require_once('inc/term-description.php');
// add_action( 'init', 'create_post_type' );
// function create_post_type() {
// 	register_post_type( 'producto',
// 		array(
// 			'labels' => array(
// 				'name' => __( 'Productos' ),
// 				'singular_name' => __( 'Producto' )
// 				),
//       // 'taxonomies' => array('category'),
// 			'show_ui' => true,
// 			'public' => true,
// 			'has_archive' => true,
// 			'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt', 'page-attributes' )
//   // 'query_var' => true
// 			)
// 		);
// }
// add_action( 'init', 'create_categories_productos' );

// function create_categories_productos() {
// 	register_taxonomy(
// 		'tipo',
// 		'producto',
// 		array(
// 			'label' => __( 'Tipo' ),
// 			'hierarchical' => true,
// 			)
// 		);
// 	$args = array(
// 		'hierarchical'      => true,
// 		'show_ui'           => true,
// 		'show_admin_column' => true,
// 		'query_var'         => true,
// 		);
// }

// //*********************************
// // añadir extracto a las páginas
// add_action( 'init', 'my_add_excerpts_to_pages' );
// function my_add_excerpts_to_pages() {
// 	add_post_type_support( 'page', 'excerpt' );
// }


/* 
shortcodes 
*/
?>