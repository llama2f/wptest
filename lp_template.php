<?php
/*
Template Name: LP用(ヘッダーフッター横幅なし)
*/
?>

<?php get_header(); ?>

<main id="main">

  <?php
if ( have_posts() ) {
	while ( have_posts() ) {

		the_post(); ?>

  <h2>LP用固定ページpage.phpの<?php the_title(); ?></h2>

  <?php the_content(); ?>

  <?php }
}
?>
</main>

<?php get_footer(); ?>