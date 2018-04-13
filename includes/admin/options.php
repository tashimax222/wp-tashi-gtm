<div class="wrap">
<h2>Google Tag Manager 設定</h2>

<form id="tashi-gtm" method="post" action="">
<?php wp_nonce_field( 'tashi-nonce-key', 'tashi-gtm' ); ?>
<?php //settings_fields('googletagmanager'); ?>

<p class="t-tag__copy">Googleタグマネージャのスニペットタグを保存してください。</p>

<div class="t-tag__box">
  <div class="t-tag__box--ttl"><b>&lt;head&gt;</b>内のタグ</div>
  <div class="t-tag__box--txt">
  <textarea class="large-text code" name="tashi_gtm_headtag" cols="30" rows="8"><?php echo esc_textarea( get_option( 'tashi_gtm_headtag' ) ); ?></textarea>
  </div>
  <div class="t-tag__box--ttl"><b>&lt;body&gt;</b>内のタグ</div>
  <div class="t-tag__box--txt">
  <textarea class="large-text code" name="tashi_gtm_bodytag" cols="30" rows="7"><?php echo esc_textarea( get_option( 'tashi_gtm_bodytag' ) ); ?></textarea>
  </div>
</div>



<input type="hidden" name="action" value="update" />

<p class="tashi-submit">
<input type="submit" class="button button-primary" value="<?php _e('Save Changes') ?>" />
</p>

</form>
<div class="tashi_key" style="padding:20px 0 0;">
<p>以下のphpコードを<b>&lt;body&gt;</b>の直後にこのコードを貼り付けてください。</p>
<p><code><?php echo htmlspecialchars( "<?php do_action( 'tashi_gtm_body' ); ?>" ); ?></code></p>
</div>
</div>
