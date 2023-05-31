 <?php
       $logo_id = get_theme_mod( 'logo_img' );
       $logo_url = esc_url(wp_get_attachment_url( $logo_id ));
       $logo_width = get_post_meta( $logo_id );             
       ?>

 <?php if ( is_home() || is_front_page()) : // トップページはh1 ?>
 <?php $header_title= '<h1 class="header-title">' . get_bloginfo( 'name' ) . '</h1>' ?>
 <?php else : //その他は通常?>
 <?php $header_title= '<div class="header-title">' . get_bloginfo( 'name' ) . '</div>' ?>
 <?php endif; ?>

 <body <?php body_class(); ?>>
   <div id="wrapper">

     <header id="header" class="sticky" role="banner">
       <a href="<?php echo home_url(); ?>/" class="header-title-link">
         <?php if(logo_use()){ //ロゴ画像使用するなら表示
             echo wp_get_attachment_image( $logo_id,array('200', '40'),"", array(
         "class" => "el_titleLogo",
         "alt" => get_bloginfo( 'name' )),
         );

         echo $header_title;
         
          }else{
            echo $header_title;
          } ?>
       </a>
       <div class="description"><?php bloginfo( 'description' ); ?></div>