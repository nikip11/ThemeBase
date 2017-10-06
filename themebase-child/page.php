<?php get_header(); ?>
<section id="main">
	<?php if ( have_posts() ) :  while ( have_posts() ) : the_post();?>
		<?php
		// $thumb_id = get_post_thumbnail_id();
		// $thumb_url = wp_get_attachment_image_src($thumb_id,'large', true);
		// $image =  $thumb_url[0];
		// echo do_shortcode('[title title='.get_the_title().' align="center" subtitle=""]');
		the_content();
		?>
	<?php endwhile; endif; ?>
</section> <!-- Fin de main -->
<?php get_footer(); ?>