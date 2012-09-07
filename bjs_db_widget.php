<?php
// Dashboard Widget
function bjs_db_widget() {
	//Creating a custom dashboard widget
	wp_add_dashboard_widget('dashboard_custom_feed', 'BoilerplateJS UI components', 'bjs_db_widget_display');
}

//Dashboard widget display
function bjs_db_widget_display() {
	echo "<strong>Page Title</strong></br>";

	/*
	 <input type="text" name="menu_title" value="">
	 <select name="selected_component">
	 <option value='<section class="main-menu"></section>' <?php selected($bjs_selected_component, '<section class="main-menu"></section>'); ?>>Menu</option>
	 <option>Departments</option>
	 <option>Counter</option>
	 </select>
	 <input type="button" name="create_page" value="Create" onClick=""/>
	 */
	//Stucked here
}

//add_action('save_post', 'submit_form_data');

function submit_form_data() {
	bjs_page_create('Menu', '<section class="main-menu"></section><section class="departments"></section><section class="clickcounter"></section>');
}

function bjs_page_create($page_title, $page_content) {
	global $user_ID;
	$page = array();
	$page['post_type'] = 'page';
	//could be 'page' for example
	$page['post_content'] = $page_content;
	$page['post_parent'] = 0;
	$page['post_author'] = $user_ID;
	$page['post_status'] = 'publish';
	//draft
	$page['post_title'] = $page_title;
	$page = apply_filters('yourplugin_add_new_page', $page, 'teams');
	$postid = wp_insert_post($page);
	if ($postid == 0)
		echo 'Screwed';
	else
		echo 'Cool';
}
?>