<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<?php 
$post_id = get_the_id();
$url = get_the_permalink();
$titulo = get_the_title();
$keywords = "";
$description = get_the_excerpt();
$image = wp_get_attachment_url( get_post_thumbnail_id($post_id) );
?>
<head>
	<?php wp_head(); ?>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<title><?= get_bloginfo('name') ?> | Mantenimiento </title>
	<!-- Fuentes -->
	<link href='https://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css'>
	<!-- for Google -->
	<meta name="description" content="<?= $description ?>" />
	<meta name="keywords" content="<?= $keywords ?>" />
	<!-- for Facebook -->          
	<meta property="og:title" content="<?= $titulo ?>" />
	<meta property="og:type" content="web" />
	<meta property="og:image" content="<?= $image ?>" />
	<meta property="og:url" content="<?= $url ?>" />
	<meta property="og:description" content="<?= $description ?>" />
	<!-- for Twitter -->          
	<meta name="twitter:card" content="summary" />
	<meta name="twitter:title" content="<?= $titulo ?>" />
	<meta name="twitter:description" content="<?= $description ?>" />
	<meta name="twitter:image" content="<?= $image ?>" />
	<!-- Definir viewport para dispositivos web móviles -->
	<meta name="viewport" content="width=device-width, minimum-scale=1">
	<link rel="shortcut icon" href="<?= get_template_directory_uri(); ?>/favicon.ico" />
	<link rel="stylesheet" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<!-- jQuery -->
	<script src="<?= get_template_directory_uri(); ?>/js/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<!-- Bootstrap CSS -->
	<link href="<?= get_template_directory_uri(); ?>/css/bootstrap.min.css" rel="stylesheet">
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
	<link rel="stylesheet" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
</head>
<body>
	<section  class="maintenance">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="content-maintenance">
						<?php echo of_get_option('text_m_mode'); ?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- jQuery -->
	<script src="//code.jquery.com/jquery.js"></script>
	<!-- Bootstrap JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<?php wp_footer(); ?>
	<!-- Bootstrap JavaScript -->
	<script src="<?= get_template_directory_uri(); ?>/js/bootstrap.min.js"></script>
	<script src="<?= get_template_directory_uri(); ?>/js/script.js"></script>
</body>
</html>