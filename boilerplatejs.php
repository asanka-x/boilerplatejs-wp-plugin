<?php
/*
 Plugin Name: BoilerplateJS
 Plugin URI: http://boilerplatejs.org/
 Description: Drop your .js and .css files in the plugin directory and this plugin takes care of the rest, with zero configuration.
 Version: 0.9.1a
 License: GPL
 Author: BoilerplateJS
 Author URI: http://boilerplatejs.org
 */

include 'bjs_mb.php';
include 'bjs_db_widget.php'; 
include 'handle-ajax.php'; //To handle ajax calls
include 'bjs-settings.php'; // To configure plugin settings
 
add_action('init', 'inc_styles_scripts_init');
// For adding styles and scripts
add_action('wp_footer', 'init_boilerplatejs', 100);
// For Entry point, main.js
add_action('wp_dashboard_setup', 'bjs_db_widget');
// For widget
add_action('add_meta_boxes', 'bjs_mb_create');
// For Meta box
add_action('wp_ajax_my_action', 'bjs_wp_ajax_my_action');     //Handling the AJAX request
add_action('admin_menu', 'bjs_settings_page_create'); // To create an admin page for configure settings

function inc_styles_scripts_init() {
	/*
	 basename(__FILE__); Returns index.php

	 */

	$inc_styles_scripts_plugin_dir = WP_PLUGIN_DIR . '/' . str_replace(basename(__FILE__), "", plugin_basename(__FILE__)) . 'libs/';
	$inc_styles_scripts_plugin_url = WP_PLUGIN_URL . '/' . str_replace(basename(__FILE__), "", plugin_basename(__FILE__)) . 'libs/';

	//Loading major javascript files (signal,requirejs & jquery)

	$major_inc_handlers = array(0 => array('handler' => 'inc-script-jquery', 'path' => 'jquery/jquery-min.js'), 1 => array('handler' => 'inc-script-knockout', 'path' => 'knockout/knockout-2.1.0pre.js'), 2 => array('handler' => 'inc-script-underscore', 'path' => 'underscore/underscore-1.3.3.js'), 3 => array('handler' => 'inc-script-signals', 'path' => 'signals/signals.min.js'), 4 => array('handler' => 'inc-script-crossroads', 'path' => 'crossroads/crossroads.min.js'), 5 => array('handler' => 'inc-script-hasher', 'path' => 'hasher/hasher.min.js'), 6 => array('handler' => 'inc-script-pubsub', 'path' => 'pubsub/pubsub-20120708.js'), 7 => array('handler' => 'inc-script-jstree', 'path' => 'jquery/jstree/jstree-1.0-rc3.js'), 8 => array('handler' => 'inc-script-flot-min', 'path' => 'flot/jquery.flot.min.js'), 9 => array('handler' => 'inc-script-flot-resize', 'path' => 'flot/jquery.flot.resize.js'), 10 => array('handler' => 'inc-script-amplifystore', 'path' => 'amplifystore/amplify.store.min.1.1.0.js'));

	for ($i = 0; $i < count($major_inc_handlers); $i++) {
		wp_register_script($major_inc_handlers[$i]['handler'], $inc_styles_scripts_plugin_url . '' . $major_inc_handlers[$i]['path']);
		wp_enqueue_script($major_inc_handlers[$i]['handler']);
	}

	//foreach (glob($inc_styles_scripts_plugin_dir.'*/*') as $inc_style_script) {
	//$inc_id = str_replace($inc_styles_scripts_plugin_dir, '', $inc_style_script);
	//if (pathinfo($inc_id, PATHINFO_EXTENSION) == 'css') {
	//wp_register_style('inc-style-' . $inc_id, $inc_styles_scripts_plugin_url . $inc_id);
	//	wp_enqueue_style('inc-style-' . $inc_id);
	//} elseif (pathinfo($inc_id, PATHINFO_EXTENSION) == 'js') {
	//wp_register_script('inc-script-' . $inc_id, $inc_styles_scripts_plugin_url . $inc_id);
	//wp_enqueue_script('inc-script-' . $inc_id);
	//}
	//	}

}

function init_boilerplatejs() {
	$inc_styles_scripts_plugin = WP_PLUGIN_URL . '/' . str_replace(basename(__FILE__), "", plugin_basename(__FILE__));
	echo "<script type=\"text/javascript\" data-main=\"" . $inc_styles_scripts_plugin . "src/main\" src=\"" . $inc_styles_scripts_plugin . "libs/require/require.js\"></script>";
}

?>