<?php
//
//テーマカスタマイザー設定
//
//カスタムヘッダーを有効化
$custom_header_args = array(
	// デフォルトで表示するヘッダー画像(画像のURLを入力)
	'default-image' => get_template_directory_uri() . '/images/default.jpg',
	// ヘッダー画像の横幅
	'width' => 1300,
	// ヘッダー画像の縦幅
	'height' => 600,
	// ヘッダー画像の横幅を自由に切り取れるかどうか(trueもしくはfalse)
	'flex-width' => true,
	// ヘッダー画像の縦幅を自由に切り取れるかどうか(trueもしくはfalse)
	'flex-height' => true,
	// ヘッダーテキストを表示するかどうかを指定する機能の使うかどうか(trueもしくはfalse)
	'header-text' => false,
	// ヘッダーテキストのデフォルトの色
	'default-text-color' => '000',
	// 動画ヘッダーに対応するかどうか(trueもしくはfalse)
	'video' => false,
	// adminへの画像ファイルのアップロードを許可するか(trueもしくはfalse)
	'uploads' => true,
	// ヘッダー画像をランダムにローテーションするかどうか(trueもしくはfalse)
	'random-default' => false
);
add_theme_support( 'custom-header', $custom_header_args );

// ヘッダー画像背景CSS
function header_image_css() {
    ?><style type="text/css">
.header_image_on {
  background: url(<?php header_image();
  ?>);
  background-repeat: no-repeat;
  background-position: center;
  background-size: cover;
}
</style><?php
}

add_filter('wp_head','header_image_css');

function theme_custom($wp_customize) {
  //ロゴ画像使用設定
$wp_customize->add_section( 'site_image', array (
 'title' => '画像設定',
 'priority' => 80,
));
 $wp_customize->add_setting( 'logo_use', array (
 'default' => false,
 ));
$wp_customize->add_control( 'site_image', array(
 'section' => 'site_image',
 'settings' => 'logo_use',
 'label' =>'ロゴ画像を使用する',
 'description' => 'ヘッダー・フッターのタイトルをロゴ画像で表示します。文字で表示する場合はチェックを外してください。',
 'type' => 'checkbox',
 'priority' => 20,
));
//ロゴ画像参照
 $wp_customize->add_setting( 'logo_img',array(
   'default'=> '',
   'transport'=>'refresh',
 ));
 $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'logo_img', array(
			'label' => 'ロゴ画像',
			'section' => 'site_image',
			'settings' => 'logo_img',
      'mime_type' => 'image',
			'description' => '使用する画像を設定します。',      
       'priority' => 30,
		)));
}
add_action('customize_register', 'theme_custom');
//ロゴ画像使用設定
function logo_use() {
 return get_theme_mod( 'logo_use', false );
}
//ロゴ画像参照
$logo_id = get_theme_mod( 'logo_img' );
$logo_url = esc_url(wp_get_attachment_url( $logo_id ));
function logo_img(){
	return esc_url( get_theme_mod( 'logo_img' ) );
}
//ロゴ画像サイズ取得
$logo_width = get_post_meta( $logo_id ,true);


//
//設定ページ作成
//
 add_action('admin_menu', 'option_menu');

 function option_menu() {
   add_menu_page('サイト設定管理', 'サイト設定管理', 'administrator' , 'option_menu', 'options_page');
   add_action( 'admin_init', 'register_settings' );
 }

 require ( get_template_directory() . '/option.php');
 function register_settings() {
   register_settings_detail() ;
 }

 function options_page() {
   options_page_detail() ;
 }

?>