  <body <?php body_class(); ?>>
    <div id="root">

      <header id="header" role="banner">
        <?php if ( is_home() || is_front_page()) : // トップページはh1 ?><h1 class="header-title"><a
            href="<?php echo home_url(); ?>/"><?php bloginfo( 'name' ); ?></a></h1>
        <?php else : //その他は通常?>
        <div class="header-title"><a href="<?php echo home_url(); ?>/"><?php bloginfo( 'name' ); ?></a></div>
        <?php endif; ?>

        <div class="description"><?php bloginfo( 'description' ); ?></div>