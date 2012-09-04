<?php

/**
 * Widget class
 */
class boilerplatejs_widget_info extends WP_Widget {
	//process new widget
	function boilerplatejs_widget_info($argument) {
		$widget_ops=array(
			'classname' => 'boilerplatejs_widget_class',
			'description' => 'Add boilerplatejs ui components'
		);
		$this->WP_Widget('boilerplatejs_widget_info','BoilerplateJS',$widget_ops);
	}
	
	//build the widget settings form
	function form($instance){
		
	}
}


?>