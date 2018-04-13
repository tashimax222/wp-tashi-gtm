<?php

class tashi_gtm {

	public function __construct() {
		if ( is_admin() ) {
			add_action( 'admin_menu', array($this, 'tashi_gtm_admin_menu'));
			add_action( 'admin_init', array($this, 'tashi_gtm_admin_init'));
			add_action( 'admin_notices', array($this, 'tashi_gtm_admin_notices'));
		}
		add_action( 'wp_head', array($this, 'tashi_gtm_head'));
		add_action( 'tashi_gtm_body', array($this, 'tashi_gtm_body'));
	}

	// 管理画面処理メニュー登録
	public function tashi_gtm_admin_menu() {
	  add_options_page( 'GTM設定', 'GTM設定', 'administrator', 'tashi_gtm', array( &$this, 'options_page_tashi_gtm'));
	}

	//管理画面表示
	public function options_page_tashi_gtm() {
		include_once( dirname(__FILE__) . '/admin/options.php');
	}

	// 保存処理
	public function tashi_gtm_admin_init() {

		if ( isset ($_POST['tashi-gtm']) && $_POST['tashi-gtm']) {
	    if ( check_admin_referer( 'tashi-nonce-key', 'tashi-gtm')) {
				$e = new WP_Error();

				if ( $_POST['tashi_gtm_headtag']) {
	        update_option( 'tashi_gtm_headtag', $_POST['tashi_gtm_headtag']);
	      } else {
	        update_option( 'tashi_gtm_headtag', '');
	      }
				if ( $_POST['tashi_gtm_bodytag']) {
	        update_option( 'tashi_gtm_bodytag', $_POST['tashi_gtm_bodytag']);
	      } else {
	        update_option( 'tashi_gtm_bodytag', '');
	      }

				//var_dump($e);
				//成功時
				$e->add( 'error', esc_attr( __( '設定を保存しました。', 'tashi-gtm' ) ) );
				set_transient( 'post-updated', $e->get_error_messages(), 3 );
				wp_safe_redirect( menu_page_url( 'tashi_gtm', false ) );
			}
			
		}
	}

	public function tashi_gtm_admin_notices() {
		if ( $_GET['page'] == 'tashi_gtm') {
			//保存成功
	    if ( $messages = get_transient( 'post-updated' ) ) {
				?>
				<div class="updated">
				<ul>
					<?php foreach ( $messages as $message): ?>
					<li><?php echo esc_html( $message ); ?></li>
					<?php endforeach; ?>
				</ul>
				</div>
				<?php
	    }
		}
	}


	public function tashi_gtm_head() {
		$gtm_head_tag = get_option('tashi_gtm_headtag');
		echo $gtm_head_tag;
	}

	public function tashi_gtm_body() {
		$gtm_body_tag = get_option('tashi_gtm_bodytag');
		echo $gtm_body_tag;
	}

}



$tashi_gtm = new tashi_gtm();
