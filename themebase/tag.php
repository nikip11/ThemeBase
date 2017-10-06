<?php get_header(); ?>
<section class="page">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h2 class="text-center"><?php printf( __( 'Tag Archives: %s', 'themebase' ), single_tag_title( '', false ) ); ?></h2>
			</div>

			<?php if ( have_posts() ) :	while ( have_posts() ) : the_post();?>
				<?php
				$permalink = get_permalink();
				$title = get_the_title();
				$time = get_the_time('j/m/Y');
				$autor = get_the_author_link();
				$excerpt = wp_trim_words(get_the_content(), 40);

				$thumb_id = get_post_thumbnail_id();
				$thumb_url = wp_get_attachment_image_src($thumb_id,'large', true);
				$image =  $thumb_url[0];

				echo do_shortcode('[boxnews
					title="'.$title.'" 
					time="'.$time.'" 
					permalink="'.$permalink.'" 
					autor="'.$autor.'" 
					excerpt="'.$excerpt.'" 
					image="'.$image.'" 
					]');
					?>

				<?php endwhile;	endif; ?>
			</div>
		</div>
	</section>

	<?php get_footer(); ?>