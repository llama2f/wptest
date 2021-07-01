<?php 
////////////////////////////
//wp_headの不要読み込み削除
////////////////////////////
/* DNSプリフェッチ設定の削除 */
add_filter('emoji_svg_url', '__return_false');

// 絵文字出力のためのjsを削除
remove_action('wp_head', 'print_emoji_detection_script', 7);
// wp_head関数ではないが、上のjsを削除するならcssも不要
remove_action('wp_print_styles', 'print_emoji_styles');
// 絵文字関連のdns-prefetchを削除
add_filter('emoji_svg_url', '__return_false');

/* WP5.x.xのブロックエディタ用スタイルの排除 */
wp_deregister_style('wp-block-library');
wp_deregister_style('wp-block-library-theme');

// 投稿、コメントのフィードに関するlinkタグを削除
remove_action('wp_head', 'feed_links', 2);
// カテゴリごと、タグごと、投稿者ごと、検索のフィードに関するlinkタグを削除
remove_action('wp_head', 'feed_links_extra', 3);

/* wp-json削除 */
remove_action('wp_head', 'rest_output_link_wp_head');
remove_action('wp_head', 'wp_oembed_add_discovery_links');

/* 外部投稿ツール設定削除 */
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'rsd_link');

/* WPのバージョン削除 */
remove_action('wp_head', 'wp_generator');

// link shortlinkを削除
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

// link rel EditURIを削除
remove_action('wp_head', 'rsd_link');

// link rel canonicalを削除
remove_action('wp_head', 'rel_canonical');

// link rel prevとnextを削除
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

remove_action('wp_head', 'wp_oembed_add_discovery_links');
remove_action('wp_head', 'wp_oembed_add_host_js');
remove_action('wp_head', 'rest_output_link_wp_head');
// wp_head関数ではないが、embedを停止するなら不要になる
remove_action('template_redirect', 'rest_output_link_header', 11);

//styleのバージョンを削除
function remove_wp_version($src) {
  if (strpos($src, 'ver='. get_bloginfo('version'))) $src=remove_query_arg('ver', $src);
  return $src;
}

add_filter('style_loader_src', 'remove_wp_version', 9999);
add_filter('script_loader_src', 'remove_wp_version', 9999);

////////////////////////////
//wp_footerの不要読み込み削除
////////////////////////////
//comment-repry.js削除
function comment_js_queue(){
  if ( (is_single() && comments_open() && get_option('thread_comments')) ){
    wp_enqueue_script( 'comment-reply' );
  }else{
    wp_deregister_script('comment-reply');
  }
}
add_action('wp_footer','comment_js_queue');

/////////////////////////////
//必要項目追加
/////////////////////////////

//メニュー追加
add_action( 'after_setup_theme', 'register_menu' );
function register_menu() {
  register_nav_menu( 'primary', __( 'Primary Menu', 'theme-slug' ) );
}
//メニュー位置追加
register_nav_menus( array(
   'header' => 'ヘッダーメニュー',
   'footer' => 'フッターメニュー'
) );
//メニューliのid削除

function my_nav_menu_id( $menu_id ){
$id = NULL;
return $id;
}
add_filter( 'nav_menu_item_id', 'my_nav_menu_id' );


//liのclass削除

function my_nav_menu_class( $classes, $item ){
if( $classes[0] ){
array_splice( $classes, 1 );
}else{
$classes = [];
}
if( $item -> current == true ){
$classes[] = 'current';
}
return $classes;
}
add_filter( 'nav_menu_css_class', 'my_nav_menu_class', 10, 2 );



class nav_walker extends Walker_Nav_Menu {
  // サブメニューにクラス追加
function start_lvl(&$output, $depth = 0, $args = NULL)  {
    // 深さ依存のクラス
    $indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // 深さ指定
    $display_depth = ( $depth + 1);
    $classes = array(
        'sub-menu'
        );
    $class_names = implode( ' ', $classes );
  
    // html出力
    $output .= "\n" . $indent . '<ul class="' . $class_names . '">' . "\n";
}


  // メイン・サブのクラスとリンクスタイル設定
  function start_el(&$output, $item, $depth = 0, $args = NULL, $id = 0){
    
    global $wp_query;
    $indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // 深さ指定

    // 深さ依存のクラス
    $depth_classes = array(
        ( $depth == 0 ? 'main-menu-item' : 'sub-menu-item' )
    );
    $depth_class_names = esc_attr( implode( ' ', $depth_classes ) );

    // passed classes
    $classes = empty( $item->classes ) ? array() : (array) $item->classes;
    $class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );
  
    // html出力
    $output .= $indent . '<li class="' . $depth_class_names . ' ' . $class_names . '">';

    // link attributes
    $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
    $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
    $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
    $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
    $attributes .= ' class="menu-link ' . ( $depth > 0 ? 'sub-menu-link' : 'main-menu-link' ) . '"';
  
    $item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
        $args->before,
        $attributes,
        $args->link_before,
        apply_filters( 'the_title', $item->title, $item->ID ),
        $args->link_after,
        $args->after
    );
  
    // html出力
    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );

  }
}