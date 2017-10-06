<?php
$std_name = '';
$options = array(
	'id' => 'id_prensa', // Box id
	'name' => 'Prensa', // Box name
	'post' => 'prensa', // Post type <----------------------- Post type
	'position' => 'low', // high - low
	'context' => 'normal', //normal - side
	'var' => array(
		array(
			'id' => 'link',
			'name' => 'Enlace',
			'std' => $std_name,
			'type' => 'text' // text - textarea - wysiwyg
			)
		)
	);
// $meta = new MetaBoxes($options);
