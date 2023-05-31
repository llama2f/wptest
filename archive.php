<?php get_header(); ?>

<main id="main">
  <h1>記事一覧</h1>
  <?php
if ( have_posts() ) {
	while ( have_posts() ) {

		the_post(); ?>

  <article>
    <h2><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h2>
    <?php get_template_part('template/post_date');?>
    <?php get_template_part('template/post_category');?>
    <a href="<?php echo get_permalink(); ?>"><?php the_excerpt(); ?></a>
  </article>

  <?php }
  get_template_part('page-nav');
}
?>
</main>

<?php get_footer(); ?>