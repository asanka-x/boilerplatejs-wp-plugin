<?php
function bjs_mb_create() {
	add_meta_box('bjs_meta', 'BoilerplateJS MetaBOX', 'bjs_mb_function', 'page', 'side');
}

function bjs_mb_function() {
	echo "BoilerplateJS Meta Box :)";

	global $post;
	$postid = $post -> ID;
	echo "Post ID :" . $postid;

	$bjs_mb_page_content = get_post_meta($postid, '_bjs_mb_page_content', true);
	//$bjs_mb_page_content=get_post_meta($postid, 'post_content', true);
	//$bjs_mb_page_content = get_post_meta($page -> ID);

	echo '<p> Name: <input type="text" name="bjs_mb_page_content" value="' . $bjs_mb_page_content . '" /></p>';
	//echo '<p> Name: <input type="text" name="bjs_mb_page_content" value="' . esc_attr($bjs_mb_page_content) . '" /></p>';
	//echo $bjs_mb_page_content;

	echo '
	 <input type="text" name="cur_post_id" value="' . $postid . '" />
	 <select name="mb_selected_component">
	 <option value="0">Menu</option>
	 <option value="1">Departments</option>
	 <option value="2">Counter</option>
	 </select>
	 <input type="submit" name="bjs_mb_component_add" value="Add" class="button-primary" onclick="addComponent()"/>
	 ';

	//bjs_page_update(456, 'Testing content');
}

function bjs_page_update($post_id_t, $page_content) {
	global $post;
	$post_id = $post -> ID;
	$modified_page = array();
	$modified_page['ID'] = $post_id;
	$modified_page['post_content'] = 'Testing!!!!!!';

	$postid = wp_update_post($modified_page);
	if ($postid == 0)
		echo 'Screwed';
	else
		echo 'Cool';
}

add_action('save_post', 'bjs_mb_save_meta');

function bjs_mb_save_meta() {
	/*
	 if (isset($_POST['bjs_mb_page_content'])) {
	 update_post_meta($postid, '_bjs_mb_page_content', strip_tags($_POST['bjs_mb_page_content']));
	 }
	 */
	//bjs_page_update(456, 'Testing DDDDDDD');
}

?>

<!--JavaScript function to send an AJAX request-->
<script type="text/javascript">
	function addComponent() {
		var data = {
			action : 'my_action',
			sender : 'bjs_mb',
			post_id : document.getElementsByName('cur_post_id')[0].value,
			selected_component : document.getElementsByName('mb_selected_component')[0].value
		};

		console.log(data.action);
		console.log(data.post_id);
		console.log(data.selected_component);
		//$.post(ajaxurl, data, function(response) {
			//console.log("Page Updated");
		//});
		document.getElementsByName('content')[0].value=document.getElementsByName('content')[0].value+'<section class="main-menu"></section>';
	}
</script>
