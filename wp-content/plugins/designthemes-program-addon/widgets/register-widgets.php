<?php if( !class_exists('DTProgramWidgets')) {

	class DTProgramWidgets {

		function __construct() {

			require_once plugin_dir_path ( __FILE__ ) . 'widget-programs-list.php';

			add_action ( 'widgets_init', array ( $this, 'dt_widgets_init' ) );
		}

		function dt_widgets_init() {
			register_widget('DT_Programs_Widget');
		}
	}
}?>