<?php get_header(); ?>

<main id="main">

  <?php
if ( have_posts() ) {
	while ( have_posts() ) {

		the_post(); ?>

  <h2><?php the_title(); ?></h2>

  <?php the_content(); ?>

  <?php }
  get_template_part('page-nav');
}
?>
</main>

<?php get_footer(); ?>