<?php get_header(); ?>

<?php get_template_part( 'template/mainArea' ) ?>

<?php
if ( have_posts() ) {
	while ( have_posts() ) {
		the_post(); ?>

<?php get_template_part( 'template/contentArea' ) ?>
<aside class="sidebar"><?php dynamic_sidebar('main-sidebar'); ?></aside>
<?php }
  get_template_part('page-nav');
}
?>
</main>

<?php get_footer(); ?>