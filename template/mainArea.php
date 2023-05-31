<?php if ( is_active_sidebar( 'main-sidebar' ) ) : //サイドバーがある場合クラス付与 ?>
<?php $sidebar_state="sidebar_on" ?>
<?php else : ?>
<?php $sidebar_state="sidebar_off" ?>
<?php endif; ?>

<main id="main" class="<?php echo $sidebar_state ?>">