<button id="btn-header-menu" aria-label="メニュー" aria-pressed="false">メニューボタン</button>

<?php //ヘッダーメニュー
          $defaults = array(
            'menu'            => '',
            'menu_class'      => 'main-menu',
            'container'       => 'nav',            
            'container_id'         =>'header-nav',
            'container_class' => 'nav-wrapper',
            'depth'           => 0,
            'theme_location'  => 'header',
            'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
            'walker'          => new nav_walker()
          );
          wp_nav_menu( $defaults );
?>