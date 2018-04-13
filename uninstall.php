<?php

if (!defined('WP_UNINSTALL_PLUGIN')) {
    exit;
}


$tashi_gtm_options = array(
    'tashi_gtm_headtag',
    'tashi_gtm_bodytag',
);


foreach ($tashi_gtm_options as $op) {
    delete_option($op);
}
