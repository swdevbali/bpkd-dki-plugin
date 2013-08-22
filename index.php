<?php
/*
Plugin Name: Badan Pengelola Keuangan Daerah – Provinsi DKI Jakarta
Plugin URI: http://www.swdevbali.com/bpkd-dki
Description: Manajemen BPKD
Author: Eko Suprapto Wibowo
Version: 1.0.1
Author URI: http://www.swdevbali.com/bpkd-dki
*/
//menu items
add_action('admin_menu','swdev_bendaharas_modifymenu');
function swdev_bendaharas_modifymenu() {
	
	//this is the main item for the menu
	add_menu_page('Bendahara', //page title
	'Bendahara', //menu title
	'manage_options', //capabilities
	'swdev_bendahara_list', //menu slug
	swdev_bendahara_list //function
	);
	
	//this is a submenu
	add_submenu_page('swdev_bendahara_list', //parent slug
	'Tambahkan Bendahara', //page title
	'Tambahkan', //menu title
	'manage_options', //capability
	'swdev_bendahara_create', //menu slug
	'swdev_bendahara_create'); //function
	
	//this submenu is HIDDEN, however, we need to add it anyways
	add_submenu_page(null, //parent slug
	'Update Bendahara', //page title
	'Update', //menu title
	'manage_options', //capability
	'swdev_bendahara_update', //menu slug
	'swdev_bendahara_update'); //function
}
define('ROOTDIR', plugin_dir_path(__FILE__));
require_once(ROOTDIR . 'bendahara-list.php');
require_once(ROOTDIR . 'bendahara-create.php');
require_once(ROOTDIR . 'bendahara-update.php');
