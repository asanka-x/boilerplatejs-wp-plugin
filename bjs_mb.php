<?php
function bjs_mb_create() {
	add_meta_box('bjs_meta', 'BoilerplateJS MetaBOX', 'bjs_mb_function', 'post', 'normal', 'high');
}

function bjs_mb_function($post) {
	echo "BoilerplateJS Meta Box :)";
	
	
}
?>
