<?php

function bjs_settings_upload_scripts(){
	wp_enqueue_script('media-upload');
	wp_enqueue_script('thickbox');
	
	wp_register_script('bjs-file-upload',WP_PLUGIN_URL.'/js/bjs-uploader.js');
	wp_enqueue_script('bjs-file-upload');
}

function bjs_settings_upload_styles(){
	wp_enqueue_style('thickbox');
}

?>