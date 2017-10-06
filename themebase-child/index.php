<?php get_header(); ?>
<section id="main">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="row">
          <?php if ( have_posts() ) :  while ( have_posts() ) : the_post();?>
          <?php endwhile; endif; ?>
        </div>
      </div>
    </div>
  </div>
</section> <!-- Fin de main -->
<?php get_footer(); ?>