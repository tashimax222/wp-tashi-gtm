<?php
/**
* Plugin Name: WP TASHI GTM
* Plugin URI: https://github.com/tashimax222/wp-tashi-gtm
* Description: Enables Google Tag Manager.
* Version: 0.1
* Author: tashimax
* Author URI: https://tashimax.com
* Text Domain: wp-tashi-gtm
*/
foreach ( scandir( __DIR__ .'/includes' ) as $file ) {
  if ( preg_match( '#^[^._].*\.php$#u', $file ) ) {
    require __DIR__ . '/includes/' . $file;
  }
}
