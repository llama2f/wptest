<footer id="footer" role="contentinfo">

  <?php get_template_part( 'template/sns_share') //SNS ?>

  <?php //フッターメニュー
          $defaults = array(
            'menu'            => '',
            'menu_class'      => 'bl_footerMenuWrapper bl_noStyleList bl_columnGrid',
            'container'       => 'nav',
            'container_id'         =>'footer-nav',
            'container_class' => 'bl_nav',  
            'depth'           => 0,
            'theme_location'  => 'footer',
            'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
            'walker'          => new nav_walker()
          );
          wp_nav_menu( $defaults );
?>



  <p class="el_copyright">Copyright © <?php echo date( 'Y' ); ?> <a
      href="<?php echo get_bloginfo( 'url' ); ?>"><?php echo get_bloginfo( 'name' ); ?></a> All Rights Reserved.</p>

</footer>

<?php wp_footer(); ?>

<?php get_template_part( '/template/btn-gotop') //トップへ戻るボタン ?>

</div>
<?php //end #root ?>
<script type='text/javascript' src='<?php echo get_template_directory_uri(); ?>/main.js' async></script>

<?php //get_template_part( 'google_fonts') GoogleFonts読み込み ?>

</body>
</html>