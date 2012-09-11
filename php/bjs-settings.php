<?php

add_action('admin_init', 'bjs_settings_admin_init');

function bjs_settings_page_create(){
	add_options_page('BoilerplateJS', 'BoilerplateJS', 'manage_options', 'bjs_settings', 'bjs_options_page');
}

function bjs_options_page(){
	echo '
	<div class="wrap">
	'.screen_icon().'
	<form>
	'.settings_fields('bjs_settings_options').'
	'.do_settings_sections('bjs_settings').'
	<input name="Submit" type="submit" value="Save Changes"/>
	<input id="upload_image" type="text" size="36" name="upload_image" value="" />
	<input id="upload_image_button" type="button" value="Upload Image" />
	</form>
	</div>';
}

function bjs_settings_admin_init(){
	register_setting('bjs_settings_options','bjs_settings_options','bjs_settings_validate_options');
	add_settings_section('bjs_settings_main','BoilerplateJS Settings','bjs_settings_main_info','bjs_settings');
	add_settings_field('bjs_settings_text_string','Import UI components','bjs_settings_input','bjs_settings','bjs_settings_main');	
}

// Explanation about the section
function bjs_settings_main_info(){
	echo '<p>Set your settings here</p>';
}

// Display and fill form fields
function bjs_settings_input(){
	$options=get_option('bjs_settings_options');
	$text_string = $options['text_string'];
	echo '<input id="text_string" name="bjs_settings_options[text_string]" type="text" vlaue="{$options["text_string"]}" />';
}

function bjs_settings_validate_options($input){
	$valid=array();
	$valid['text_string']=preg_replace('/[^a-zA-Z]/', '', $input['text_string']);
	return $valid;
}
?>