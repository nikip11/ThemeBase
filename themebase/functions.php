<?php
/*-----------------------------------------*/
/* Load Theme Opcions
/*-----------------------------------------*/
require_once dirname( __FILE__ ) . '/inc/metaboxes/class-metaboxes.php';


if ( !function_exists( 'optionsframework_init' ) ) {
	define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/' );
	require_once dirname( __FILE__ ) . '/inc/options-framework.php';
	// Loads options.php from child or parent theme
	$optionsfile = locate_template( 'options.php' );
	load_template( $optionsfile );
}

// Añadir scripts y styles
if ( !function_exists('bootstrap')) {
	function bootstrap() {
		wp_enqueue_style( 'bootstrap-css', get_stylesheet_directory_uri() . '/css/bootstrap.min.css' );
		wp_enqueue_script( 'bootstrap-js', get_stylesheet_directory_uri() . '/js/bootstrap.min.js',array('jquery'), '1.1', true);
	}
}
add_action( 'wp_enqueue_scripts', 'bootstrap' );

// Registro del menú de WordPress
require_once('inc/navwalker.php');

add_theme_support( 'nav-menus' );
if ( function_exists( 'register_nav_menus' ) ) {
	register_nav_menus(
		array(
			'main' => 'Main',
			'footer' => 'footer'
		)
	);
}

//  Main Sidebar
if(function_exists('register_sidebar'))
	register_sidebar(array(
		'id' => 'main_sidebar',
		'name' => 'Main Sidebar',
		'before_widget' => '<hr>',
		'after_widget' => '',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));

//Habilitar thumbnails
add_theme_support('post-thumbnails');
set_post_thumbnail_size(150, 150, true);

// Permitir comentarios encadenados
function enable_threaded_comments(){
	if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('get_header', 'enable_threaded_comments');

/************************************************************
Función para agregar idioma como item del menu
*************************************************************/

// add_filter('wp_nav_menu_items', 'wpml_flag_nav_menu_items', 10, 2);
function wpml_flag_nav_menu_items($items, $args) {
	global $sitepress_settings, $sitepress;
	if(function_exists('icl_get_languages')){
		$languages = $sitepress->get_ls_languages();
		foreach($languages as $l){						
			if(!$l['active'] && !$menu_locations['footer-menu']){
				?>
				<style type="text/css">
				.flag {
					background:url('<?= $l["country_flag_url"]?>') no-repeat;
					width: 20px;
					height: 10px;
					margin-top: 2px;
					display: inline-block;
				}
			</style>
			<?php
				//$idioma = '<a href="'.$l['url'].'">'.'<img src="'.$l['country_flag_url'].'" height="12" alt="'.$l['language_code'].'" width="18" /></a>';
			$idioma = '<a href="'.$l['url'].'">'.'<div class="flag"> </div> '.$l['language_code'].'</a>';
				//$idioma = '<a href="'.$l['url'].'" class="flag" > asd</a>';
		}				
	}
}

$items .= '<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-language menu-item-language-current" style="text-transform: uppercase;">';
$items .= $idioma;
$items .= '</li>';
return $items;
}
//*********************************
//Paginación de entradas
function wp_corenavi() {
	global $wp_query, $wp_rewrite;
	$pages = "";
	$max = $wp_query->max_num_pages;
	if (!$current = get_query_var('paged')) $current = 1;
	$a['base'] = str_replace(999999999, '%#%', get_pagenum_link(999999999));
	$a['total'] = $max;
	$a['current'] = $current;

    $total = 0; //1 – muestra el texto “Página N de N", 0 – para no mostrar nada
    $a['mid_size'] = 3; //cuantos enlaces a mostrar a izquierda y derecha del actual
    $a['end_size'] = 1; //cuantos enlaces mostrar al comienzo y al fin
    $a['prev_text'] = '&laquo; Anterior'; //texto para el enlace “Página siguiente"
    $a['next_text'] = 'Siguiente &raquo;'; //texto para el enlace “Página anterior"

    if ($max > 1) echo '<div class="navigation">';
    if ($total == 1 && $max > 1) $pages = '<span class="pages">Página ' . $current . ' de ' . $max . '</span>'."\r\n";
    echo $pages . paginate_links($a);
    if ($max > 1) echo '</div>';
}

function getCookies($title, $text, $link) {
	return '
	<section id="cookie">
	<div class="container">
	<div class="row">
	<div class="col-sm-2">
	<div class="cookie-title">'.$title.'</div>
	</div>
	<div class="col-sm-1"></div>
	<div class="col-sm-7">
	<div class="cookie-text">'.$text.'. Más información <a href="'.$link.'">aquí</a></div>
	</div>
	<div class="col-sm-1">
	<div class="cookie-close">
	<i class="fa fa-times " aria-hidden="true"></i>
	</div>
	</div>
	</div>
	</div>
	</section>
	';
}


if ( !function_exists('legalAge')) {
	function legalAge($text){
		return '
		<div id="legal">
		<div class="legal-content">
		<div>Logo</div>
		<div class="legal-form">
		<p>'.$text.'</p>
		<ul class="d-line">
		<li class="legal-btn" id="yes">SI</li>
		<li class="legal-btn" id="no">NO</li>
		</ul>
		</div>
		</div>
		</div>
		';
	}
}

if (of_get_option('m_mode')) {
	add_action('get_header', 'wpr_maintenace_mode');
}
function wpr_maintenace_mode() {
	if ( !current_user_can( 'edit_themes' ) || !is_user_logged_in() ) {
		include('maintenance.php');
		die();
	}
}

// añadir extracto a las páginas
add_action( 'init', 'my_add_excerpts_to_pages' );
function my_add_excerpts_to_pages() {
	add_post_type_support( 'page', 'excerpt' );
}
