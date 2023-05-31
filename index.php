<?php get_header(); ?>

<main id="main">

  <?php
if ( have_posts() ) {
	while ( have_posts() ) {

		the_post(); ?>

  <?php get_template_part( 'template/contentArea' ) ?>

  <?php }
  get_template_part('page-nav');
}
?>
</main>

<?php get_footer(); ?>