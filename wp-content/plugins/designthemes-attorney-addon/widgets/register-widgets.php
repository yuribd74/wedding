<?php if( !class_exists('DTAttorneyWidgets')) {

	class DTAttorneyWidgets {

		function __construct() {

			require_once plugin_dir_path ( __FILE__ ) . 'widget-attorneys-list.php';

			add_action ( 'widgets_init', array ( $this, 'dt_widgets_init' ) );
		}

		function dt_widgets_init() {
			register_widget('DT_Attorneys_Widget');
		}
	}
}?>