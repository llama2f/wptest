<!DOCTYPE html>
<html lang="ja">
  <head>
    <?php $desc = get_bloginfo('description'); //説明文定義 ?>
    <?php if (is_home() || is_front_page()) { //タイトルタグ定義
        $title = get_bloginfo( 'name' );}
      elseif( is_404() ){
        $title="404" . "|"  . get_bloginfo( 'name' );}
      else{
        $title = get_the_title()  . " | " . get_bloginfo( 'name' );
    }?>
    <?php if ( is_home() || is_front_page() ) { //url定義
        $pageurl =  get_bloginfo( 'url' );}
     else {
        $pageurl = get_the_permalink(); 
    }?>

    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width" />

    <title><?php echo $title; ?></title>

    <link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>" type="text/css" media="screen" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <script type='text/javascript' src='<?php echo get_template_directory_uri(); ?>/main.js' async></script>

    <!-- 要編集 -->
    <link rel="stylesheet" href="/assets/css/print.css" media="print" />


    <!-- 要編集 -->
    <meta name="description" content="<?php echo $desc ?>" />
    <meta property="og:title" content="<?php echo $title ?>" />
    <meta property="og:description" content="<?php echo $desc ?>" />
    <meta property="og:image" content="https://mywebsite.com/image.jpg" />
    <meta property="og:image:alt" content="<?php echo $title ?>" />
    <meta property="og:locale" content="ja_JP" />
    <meta property="og:type" content="website" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta property="og:url" content="<?php echo $pageurl ?>" />
    <link rel="canonical" href="<?php echo $pageurl ?>" />
    <base href="<?php echo $pageurl ?>" />

    <!-- 要編集 -->
    <link rel="icon" href="/favicon.ico" />
    <link rel="icon" href="/favicon.svg" type="image/svg+xml" />
    <link rel="apple-touch-icon" href="/apple-touch-icon.png" />
    <link rel="manifest" href="/my.webmanifest" />

    <?php
//個別投稿で反映、コメント返信時にフォームが寄ってくる
if ( is_singular() ) {
	wp_enqueue_script( 'comment-reply' );}
?>
    <?php wp_head(); ?>
  </head>
  <!-- end head -->

  <?php get_template_part( 'header-inner') //基本のヘッダーコンテンツ ?>

  <?php get_template_part( 'l-header-nav') //ヘッダーメニュー ?>

  </header>