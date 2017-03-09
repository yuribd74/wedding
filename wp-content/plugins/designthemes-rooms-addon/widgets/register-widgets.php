<?php if( !class_exists('DTRoomWidgets')) {

	class DTRoomWidgets {

		function __construct() {

			require_once plugin_dir_path ( __FILE__ ) . 'widget-rooms-list.php';

			add_action ( 'widgets_init', array ( $this, 'dt_widgets_init' ) );
		}

		function dt_widgets_init() {
			register_widget('DT_Rooms_Widget');
		}
	}
}?>