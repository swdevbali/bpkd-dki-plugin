<?php
/*
Plugin Name: Badan Pengelola Keuangan Daerah – Provinsi DKI Jakarta
Plugin URI: http://www.swdevbali.com/bpkd-dki
Description: Manajemen BPKD
Author: Eko Suprapto Wibowo
Version: 1.0.1
Author URI: http://www.swdevbali.com/bpkd-dki
*/


require_once('app/class/post-type.php');
require_once('app/class/custom-fields.php');

add_action( 'init', 'PostType::register_all_post_type');
add_action( 'admin_menu', 'CustomFields::create_meta_box');
add_action( 'save_post', 'CustomFields::save_custom_fields', 1, 2 );

