<?php

add_action('admin_init', 'bjs_settings_upload_scripts_styles');

function bjs_settings_upload_scripts_styles(){
	global $bjs_base_plugin_url;
	
	wp_enqueue_script('media-upload');
	wp_enqueue_script('thickbox');
	
	wp_register_script('bjs-file-upload',$bjs_base_plugin_url.'/js/bjs-uploader.js');
	wp_enqueue_script('bjs-file-upload');
	
	wp_enqueue_style('thickbox');

}

?>