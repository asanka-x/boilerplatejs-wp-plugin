<?php
// Dashboard Widget
function bjs_db_widget() {
	//Creating a custom dashboard widget
	wp_add_dashboard_widget('dashboard_custom_feed', 'BoilerplateJS UI components', 'bjs_db_widget_display');
}

//Dashboard widget display
function bjs_db_widget_display() {
	echo "<strong>Page Title</strong></br>";

	echo '
	 <input type="text" name="menu_title" value="">
	 <select name="selected_component">
	 <option value="0">Menu</option>
	 <option value="1">Departments</option>
	 <option value="2">Counter</option>
	 </select>
	 <input type="submit" name="bjs_component_add" value="Create Page" class="button-primary" onclick="createPage()"/>
	 ';
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

<!--JavaScript function to send an AJAX request-->
<script type="text/javascript">
	function createPage(){
		var data={
			action: 'my_action',
			sender: 'bjs_widget',
			menu_item_name: document.getElementsByName('menu_title')[0].value,
			selected_component: document.getElementsByName('selected_component')[0].value
		};

		$.post(ajaxurl, data,function(response){
			console.log("Page Created");
		});
	}
</script>