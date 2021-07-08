<?php get_header(); ?>

<main id="main">

  <?php
if ( have_posts() ) {
	while ( have_posts() ) {

		the_post(); ?>

  <h2>固定ページpage.phpの<?php the_title(); ?></h2>

  <?php the_content(); ?>

  <?php 
  get_template_part( 'template/comment');
  }
}
?>
</main>

<?php get_footer(); ?>