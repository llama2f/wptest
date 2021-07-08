<?php
  /**
  * webmemo Optional Setting
  */

  function register_settings_detail() {
    register_setting( 'settings-group', 'opt_url_1' );
  }

  function options_page_detail() {
    echo "<h1>SETTING </h1>";
 ?>

<style>
.form-table tr {}
</style>
<div class="admin_optional">
  <form method="post" action="options.php">
    <?php settings_fields( 'settings-group' ); ?>
    <?php do_settings_sections( 'settings-group' ); ?>
    <table class="form-table">
      <th scope="row">設定</th>
      <tr>
        <td>
          <span>▼シングルページ上部に表示する文字をいれてください。</span></br>
          <textarea id="slideshow_1" name="opt_url_1" cols="160"
            rows="7"><?php echo esc_attr( get_option('opt_url_1') ); ?></textarea>
        </td>
      </tr>
    </table>
    <?php submit_button(); ?>
  </form>
</div>
<?php
  }
  ?>