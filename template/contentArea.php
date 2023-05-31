<article <?php post_class("ly_article"); ?>>

  <header class="bl_mainHeader">

    <?php if(is_front_page()){ //トップページならh2(サイト名がh1)、それ以外ならh1
          the_title( '<h2 class="el_postTitle">', '</h2>' );
        }elseif(is_single()){
          the_title( '<h1 class="el_postTitle">', '</h1>' );
        }else{
          the_title( '<h1 class="el_postTitle">', '</h1>' );
        }
        ?>

    <?php if(is_single()){ //記事なら日付・タグ・カテゴリ表示
          get_template_part('template/post_date');
          get_template_part( 'template/post_category' );
          if(has_tag()){ get_template_part( 'template/post_tags' );}
        }else{
        }
        ?>
  </header>

  <?php the_content(); //コンテンツ表示 ?>

  <aside>
    <?php get_template_part( 'template/comment'); ?>
  </aside>

</article>