<?php
/*
Template Name: LP用(ヘッダーフッター横幅なし)
*/
?>

<?php get_header(); ?>

<main id="main" class="lp">
  <article>
    <?php
if ( have_posts() ) {
	while ( have_posts() ) {

		the_post(); ?>

    <?php if ( get_header_image() ) :  //ヘッダー画像があるときcss追加 ?>
    <div class="firstView header_image_on">
      <?php else : ?>
      <div class="firstView">
        <?php endif; ?>
        <h2 class="copy">LPページのみほん</h2>
        <div class="entry">
          <span class="entry-desc">ボタンサンプル</span>
          <a href="#" class="entry-btn el_btn">
            <p>無料サンプルを見る</p>
          </a>
        </div>

      </div>

      <?php get_template_part( 'lp-data' ) //ページ内容読み込み ?>
      <?php remove_filter ('the_content', 'wpautop'); ?>
      <?php the_content(); ?>

      <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12530.71114539344!2d140.8765065301896!3d38.26377844628064!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x5f8a282ef1ff4d5d%3A0x6c2640893bd2705b!2z5LuZ5Y-w5biC5b255omA!5e0!3m2!1sja!2sjp!4v1653445252571!5m2!1sja!2sjp"
        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"></iframe>

      <?php }
}
?>
  </article>
</main>

<?php get_footer(); ?>