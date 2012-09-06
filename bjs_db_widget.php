<?php
// Dashboard Widget
function bjs_db_widget() {
	//Creating a custom dashboard widget
	wp_add_dashboard_widget('dashboard_custom_feed', 'BoilerplateJS UI components', 'bjs_db_widget_display');
}

//Dashboard widget display
function bjs_db_widget_display() {
	echo "<p>Testing widget</p>";
}
?>