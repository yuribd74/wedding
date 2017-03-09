<?php if( !class_exists('DTVCRoomsModule') ) {

	class DTVCRoomsModule {

		function __construct() {

			add_action ( 'after_setup_theme', array ( $this, 'dt_map_rooms_shortcodes' ) , 1000 );

			add_action( 'admin_enqueue_scripts', array( $this, 'dt_rooms_vc_admin_scripts')  );
		}

		function dt_map_rooms_shortcodes() {
			$path = plugin_dir_path ( __FILE__ ).'modules/';
			$modules = array(
				'dt_sc_room_list' => $path.'rooms_list.php',
				'dt_sc_room_image' => $path.'single_room_image.php',
				'dt_sc_room_details' => $path.'single_room_details.php',
				'dt_sc_room_meta' => $path.'single_room_meta.php',
			);

			// Apply filters so you can easily modify the modules 100%
			$modules = apply_filters( 'vcex_builder_modules', $modules );

			if( !empty( $modules ) ){
				foreach ( $modules as $key => $val ) {
					require_once( $val );
				}
			}
		}

		function dt_rooms_vc_admin_scripts( $hook ) {

			if($hook == "post.php" || $hook == "post-new.php") {
				wp_enqueue_style( 'dt-rooms-vc-admin', plugins_url ('designthemes-rooms-addon') . '/vc/style.css', array (), false, 'all' );
			}			
		}		
	}
}?>