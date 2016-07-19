<?php get_header(); ?>
<section id="main">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
       <?php if (have_posts()) :  while (have_posts()) : the_post(); ?>
         
        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <small>Publicado el <?php the_time('j/m/Y') ?> por <?php the_author_posts_link() ?>  </small>
          <?php
          if ( has_post_thumbnail() ) { 
            echo '<div class="thumbnail">';
            the_post_thumbnail();
            echo '</div>';
          }
          ?>
        <?php the_excerpt(); ?>
        
      <?php endwhile; else: ?>
      <p><?php _e('No hay entradas .'); ?></p>
    <?php endif; ?>
  </div>
</div>
</div>
</section> <!-- Fin de main -->
<?php get_footer(); ?>