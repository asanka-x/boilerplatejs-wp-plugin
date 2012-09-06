<?php
function bjs_mb_create() {
	add_meta_box('bjs_meta', 'BoilerplateJS MetaBOX', 'bjs_mb_function', 'page', 'side');
}

function bjs_mb_function($post) {
	echo "BoilerplateJS Meta Box :)";

	//$bjs_mb_page_content=get_post_meta($post->ID, '_bjs_mb_page_content', true);
	//$bjs_mb_page_content=get_post_meta($post->ID, '_wp_page_template', true);
	$bjs_mb_page_content = get_post_meta($post -> ID);

	//echo '<p> Name: <input type="text" name="bjs_mb_page_content" value="'.esc_attr($bjs_mb_page_content).'" /></p>';
	echo '<p> Name: <input type="text" name="bjs_mb_page_content" value="' . esc_attr(print_r($bjs_mb_page_content)) . '" /></p>';

	

}

add_action('save_post', 'bjs_mb_save_meta');

function bjs_mb_save_meta($post_id) {
	if (isset($_POST['bjs_mb_page_content'])) {
		update_post_meta($post_id, '_bjs_mb_page_content', strip_tags($_POST['bjs_mb_page_content']));
	}
}
?>
