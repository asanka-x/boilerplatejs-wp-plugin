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
	
	echo '<input type="submit" name="Save" value="Save Options" class="button-primary" />';
	}

add_action('save_post', 'bjs_mb_save_meta');
//add_filter('the_content', 'bjs_mb_add_content');

function bjs_mb_save_meta($postid) {

	if (isset($_POST['bjs_mb_page_content'])) {
		update_post_meta($postid, '_bjs_mb_page_content', strip_tags($_POST['bjs_mb_page_content']));
	}
/*
	$bjs_content = array();
	$bjs_content['ID'] = $postid;
	$bjs_content['post_content'] = '<section class="main-menu"></section>';

	wp_update_post($bjs_content);
*/	
}

function bjs_mb_add_content($content){
	$content='<section class="main-menu"></section>';
	//$content=$_POST['bjs_mb_page_content'];
	return $content;
}
?>
