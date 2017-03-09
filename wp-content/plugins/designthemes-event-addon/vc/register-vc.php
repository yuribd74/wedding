<?php if( !class_exists('DTVCEventModule') ) {
	class DTVCEventModule {

		function __construct() {

			add_action ( 'after_setup_theme', array ( $this, 'dt_map_events_shortcodes' ) , 1000 );

			add_action( 'admin_enqueue_scripts', array( $this, 'dt_event_vc_admin_scripts')  );
		}

		function dt_map_events_shortcodes() {

			$path = plugin_dir_path ( __FILE__ ).'modules/';
			$modules = array(

				'dt_sc_djs' => $path.'djs.php',
				'dt_sc_addon_events_grid' => $path.'events_grid.php',
				'dt_sc_addon_events_list' => $path.'events_list.php',
				'dt_sc_dj_club' => $path.'dj_club.php'
			);

			// Apply filters so you can easily modify the modules 100%
			$modules = apply_filters( 'vcex_builder_modules', $modules );

			if( !empty( $modules ) ){
				foreach ( $modules as $key => $val ) {
					require_once( $val );
				}
			}
		}

		function dt_event_vc_admin_scripts( $hook ) {

			if($hook == "post.php" || $hook == "post-new.php") {
				wp_enqueue_style( 'dt-event-vc-admin', plugins_url ('designthemes-event-addon') . '/vc/style.css', array (), false, 'all' );
			}			
		}

	}
}?>