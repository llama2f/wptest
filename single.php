<?php get_header(); ?>

<main id="main">

  <?php
if ( have_posts() ) {
	while ( have_posts() ) {

		the_post(); ?>

  <article>
    <header>
      <h1>投稿single.phpの<?php the_title(); ?></h1>
      <?php get_template_part('template/postdate');?>
    </header>
    <?php the_content(); ?>
    <aside><?php get_template_part( 'template/comment'); ?></aside>
  </article>


  <?php }
  get_template_part('page-nav');
}
?>
</main>

<?php get_footer(); ?>