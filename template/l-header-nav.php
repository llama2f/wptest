<button id="btn-header-menu" aria-label="メニュー" aria-pressed="false"><svg xmlns="http://www.w3.org/2000/svg"
    viewBox="0 0 48 48">
    <g>
      <g>
        <rect class="rect" width="48" height="48" />
      </g>
      <g id="icon">
        <line class="part line01" x1="10" y1="12" x2="38" y2="12" />
        <line class="part line02" x1="10" y1="24" x2="38" y2="24" />
        <line class="part line03" x1="10" y1="36" x2="38" y2="36" />
      </g>
    </g>
  </svg></button>

<nav id="header-nav" class="bl_nav" aria-hidden="true">
  <?php //ヘッダーメニュー
          $defaults = array(
            'menu'            => '',
            'menu_class'      => 'bl_menu bl_noStyleList',
            'container'       => '',            
            //'container_id'         =>'header-nav',
            //'container_class' => 'bl_nav_wrapper',
            'depth'           => 0,
            'theme_location'  => 'header',
            'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
            'walker'          => new nav_walker()
          );
          wp_nav_menu( $defaults );
?>
</nav>