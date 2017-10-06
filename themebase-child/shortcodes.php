<?php
/************************************************************************
shortcode: [boton text="ver Blog" link="#"]
------------------------------------------------------------------------
text: 
link:
target:
type:
*/
function func_boton( $atts ) {
	$atts = shortcode_atts( array(
		'text' => 'ver más',
		'link' => '#',
		'target' => '_self',
		'type' => 1
	), $atts );
	$type = ($atts['type'] == 1 ) ? 'btn-global' : 'btn-global2' ;
	$response = '<a href="'. $atts['link'] .'" target="'. $atts['target'] .'" class="'. $type .' center-block">'. $atts['text'] .'</a>';
	return $response;
}
add_shortcode( 'button','func_boton' );

/************************************************************************
shortcode: [title title=$title align=$align subtitle=$subtitle]
------------------------------------------------------------------------
title
align
subtitle
*/
function func_title( $atts ) {
	$atts = shortcode_atts( array(
		'title' => 'titulo',
		'subtitle' => 'subtitulo',
		'align' => 'center'
	), $atts );
	$response = '
	<div class="text-'.$atts['align'].'">
	<h1 class="title">'.$atts['title'].'</h1>
	<div class="subtitle">'.$atts['subtitle'].'</div>
	</div>
	';
	return $response;
}
add_shortcode( 'title','func_title' );

/************************************************************************
shortcode: [youtube][/youtube]
------------------------------------------------------------------------
*/
function func_youtube( $atts = array(), $content = '' ) {
	$atts = shortcode_atts( array(
		'id' => 'value',
	), $atts, 'youtube' );
	$response = '';
	return '
		<div class="embed-responsive embed-responsive-16by9">
		  <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/'.$content.'"></iframe>
		</div>
	';
}
add_shortcode( 'youtube', 'func_youtube' );

