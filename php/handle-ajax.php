<?php

function bjs_wp_ajax_my_action() {
	$ui_component_tags = array('0' => '<section class="main-menu"></section>', '1' => '<section class="departments"></section>', '2' => '<section class="clickcounter"></section>');
	switch ($_POST['sender']) {

		case 'bjs_widget' :
			bjs_page_create($_POST['menu_item_name'], $ui_component_tags[$_POST['selected_component']]);

			$response = json_encode(array('success' => true));
			break;

		case 'bjs_mb' :

			bjs_page_update($_POST['post_id'], $ui_component_tags[$_POST['selected_component']]); 
			
			$response = json_encode(array('success' => true));
			break;

		default :
			break;
	}

	die();
}
?>