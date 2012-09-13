<?php

include "bjs-settings-uploader.php";

add_action('admin_init', 'bjs_settings_admin_init');

function bjs_settings_page_create() {
	add_options_page('BoilerplateJS', 'BoilerplateJS', 'manage_options', 'bjs_settings', 'bjs_options_page');
}

function bjs_options_page() {
	global $bjs_wp_upload_dir;
	echo '
	<div class="wrap">
	' . screen_icon() . '
	<form action="options.php" method="post">
	' . settings_fields('bjs_settings_options') . '
	' . do_settings_sections('bjs_settings') . '
	<input name="Submit" type="submit" value="Save Changes"/>
	<input id="upload_image" type="text" size="36" name="upload_image" value="" />
	<input id="upload_image_button" type="button" value="Upload Image" />
	<p>' . $bjs_wp_upload_dir . '</p>
	</form>
	</div>';
/*
	//Testing read xml file
	$doc = new DOMDocument();
	$doc -> load($bjs_wp_upload_dir.'/2012/09/components.txt');

	$employees = $doc -> getElementsByTagName("component");
	foreach ($employees as $employee) {
		$names = $employee -> getElementsByTagName("name");
		$name = $names -> item(0) -> nodeValue;

		$ages = $employee -> getElementsByTagName("tag");
		$age = $ages -> item(0) -> nodeValue;

		$salaries = $employee -> getElementsByTagName("class");
		$salary = $salaries -> item(0) -> nodeValue;

		echo "<b>$name - $age - $salary\n</b><br>";
	}
 */
}

function bjs_settings_admin_init() {
	register_setting('bjs_settings_options', 'bjs_settings_options', 'bjs_settings_validate_options');
	add_settings_section('bjs_settings_main', 'BoilerplateJS Settings', 'bjs_settings_main_info', 'bjs_settings');
	add_settings_field('bjs_settings_text_string', 'Import UI components', 'bjs_settings_input', 'bjs_settings', 'bjs_settings_main');
}

// Explanation about the section
function bjs_settings_main_info() {
	echo '<p>Set your settings here</p>';
}

// Display and fill form fields
function bjs_settings_input() {
	$options = get_option('bjs_settings_options');
	$text_string = $options['text_string'];
	echo '<p>'.$text_string.'</p>';
	echo '<input id="text_string" name="bjs_settings_options[text_string]" type="text" vlaue="'.$text_string.'" />';
}

function bjs_settings_validate_options($input) {
	$valid = array();
	$valid['text_string'] = preg_replace('/[^a-zA-Z]/', '', $input['text_string']);
	return $valid;
}
?>