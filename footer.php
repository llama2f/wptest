<footer id="footer" role="contentinfo">
  <?php //フッターメニュー
          $defaults = array(
            'menu'            => '',
            'menu_class'      => 'footer-menu',
            'container'       => 'nav',
            'container_id'         =>'footer-nav',
            'container_class' => 'nav-wrapper',
            'depth'           => 0,
            'theme_location'  => 'footer',
            'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
            'walker'          => new nav_walker()
          );
          wp_nav_menu( $defaults );
?>
  <p class="copyright">コピーライト</p>
</footer>
<?php wp_footer(); ?>

<?php get_template_part( 'btn-gotop') //トップへ戻るボタン ?>

</div>
<?php //end #root ?>
</body>
</html>