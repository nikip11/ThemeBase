<?php get_header(); ?>
<section id="archivo">
	<div class="container">
		<div class="row">
			<div class="col-sm-8">
				<?php $post = $posts[0];  ?>
				<?php  if (is_category()) { ?>
				<?php } elseif( is_tag() ) { ?>
				<h2>Etiqueta <?php single_tag_title(); ?></h2>
				<?php } elseif (is_day()) { ?>
				<h2>Archivo para <?php the_time('F jS Y'); ?>:</h2>
				<?php  } elseif (is_month()) { ?>
				<h2>Archivo para <?php the_time('F, Y'); ?>:</h2>
				<?php } elseif (is_year()) { ?>
				<h2>Archivo para <?php the_time('Y'); ?>:</h2>
				<?php } elseif (is_author()) { ?>
				<h2>Archivo del autor </h2>
				<?php } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
				<h2>Archivos del blog</h2>
				<?php } ?>
				<?php if (have_posts()) :  while (have_posts()) : the_post(); ?>
					<div class="row">
						<div class="col-sm-11">
							<?php
							$post_id= get_the_id();
							$title = get_the_title();
							$content = get_the_content( 'Leer más »' );
							$size = 'large';
							$attr = array('class' => 'img-responsive' );
							$thumbnail = get_the_post_thumbnail( $post_id, $size, $attr );
							?>
							<div class="noticias">
								<div class="hovereffect">
									<?= $thumbnail ?>
									<div class="overlay">
										<p class="vcenter"> 
											<a href="<?= get_the_permalink() ?>"><i class="fa fa-link fa-5x"></i></a>
										</p> 
									</div>
								</div>
								<h3><?= $title ?></h3>
								<p class="text-justify"><?= $content ?></p>
								<a href="<?= get_the_permalink() ?>" class="btn-global">Ver más</a>
							</div>
						</div>
					</div>
				<?php endwhile; else: ?>
				<p><?php _e('No hay entradas.'); ?></p>
			<?php endif; ?>
		</div>
		<div class="col-sm-4">
			<?php get_sidebar('Main sidebar'); ?>
		</div>
	</div>
</div>
</section>
<?php get_footer(); ?>