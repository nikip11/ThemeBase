<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 */
function optionsframework_option_name() {

	$optionsframework_settings = get_option('optionsframework');
	$optionsframework_settings['id'] = $themename;
	update_option('optionsframework', $optionsframework_settings);
	return 'options-framework-theme';
}
function optionsframework_options() {
	$option_maintenance = '
	<h1 style="text-align: center;"><i class="fa fa-cogs fa-5x"></i></h1>
	<h1 style="text-align: center;">Modo Mantenimiento</h1>
	<p style="text-align: center;">Pronto volverémos</p>
	';
	$option_textcookie = 'Utilizamos de terceros para mejorar la experiencia de navegación, y ofrecer contenidos de interés. Al continuar con la navegación entendemos que se acepta nuestra <a href="aviso-legal/">política de cookies</a>';
	$option_titlecookie = 'Política de cookies';

	$options = array();
	$options[] = array(
		'name' => __( 'Basic Settings', 'theme-textdomain' ),
		'type' => 'heading'
		);
	$options[] = array(
		'name' => __( 'Mantenimiento', 'theme-textdomain' ),
		'desc' => __( 'Activa el modo de mantenimiento', 'theme-textdomain' ),
		'id' => 'm_mode',
		'std' => FALSE,
		'type' => 'checkbox'
		);
	$wp_editor_settings = array(
		'wpautop' => true, // Default
		'textarea_rows' => 5,
		'tinymce' => array( 'plugins' => 'wordpress,wplink' )
		);
	$options[] = array(
		'name' => __( 'Mantenimiento', 'theme-textdomain' ),
		'desc' => __( 'Texto para el modo de mantenimiento.', 'theme-textdomain' ),
		'id' => 'text_m_mode',
		'type' => 'editor',
		'std' => $option_maintenance,
		'settings' => $wp_editor_settings
		);
	$options[] = array(
		'name' => __( 'Cookies', 'theme-textdomain' ),
		'type' => 'heading'
		);
	$options[] = array(
		'name' => __( 'Título Cookies', 'theme-textdomain' ),
		'desc' => __( 'Título para la cookies.', 'theme-textdomain' ),
		'id' => 'title_cookies',
		'std' => $option_titlecookie,
		'type' => 'text'
		);
	$options[] = array(
		'name' => __( 'Cookies', 'theme-textdomain' ),
		'desc' => __( 'Cookies description.', 'theme-textdomain' ),
		'id' => 'text_cookies',
		'std' => $option_textcookie,
		'type' => 'textarea'
		);
	return $options;
}