<?php
/* ************/
// require_once('inc/option-page.php');

// Registro del menú de WordPress
require_once('inc/navwalker.php');
add_theme_support( 'nav-menus' );
if ( function_exists( 'register_nav_menus' ) ) {
	register_nav_menus(
		array(
			'main' => 'Main'
			)
		);
}

//  Main Sidebar
if(function_exists('register_sidebar'))
	register_sidebar(array(
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
 *
 *	Función para agregar idioma como item del menu
 *
 ***********************************************************/

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
// Crear tamaño imagen personalizado
if ( ! current_theme_supports('post-thumbnails') ) {
	add_theme_support( 'post-thumbnails' );
}
add_image_size( 'pimage', 560, 300, true );

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

?>