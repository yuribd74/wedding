<?php if( !class_exists('DTVCAttorneyModule') ) {
	class DTVCAttorneyModule {

		function __construct() {

			add_action ( 'after_setup_theme', array ( $this, 'dt_map_attorney_shortcodes' ) , 1000 );

			add_action( 'admin_enqueue_scripts', array( $this, 'dt_attorney_vc_admin_scripts')  );
		}

		function dt_map_attorney_shortcodes() {

			$path = plugin_dir_path ( __FILE__ ).'modules/';
			$modules = array(
				'dt_sc_current_attorney_info' => $path.'attorney-info.php',
				'dt_sc_current_attorney_meta' => $path.'attorney-meta.php',
				'dt_sc_current_attorney_role' => $path.'attorney-role.php',
				'dt_sc_attorney_listing' => $path.'attorneys-listing.php',
				'dt_sc_attorney_office_locations' => $path.'attorneys-office-location.php',
			);

			$modules = apply_filters( 'vcex_builder_modules', $modules );

			if( !empty( $modules ) ){
				foreach ( $modules as $key => $val ) {
					require_once( $val );
				}
			}
		}

		function dt_attorney_vc_admin_scripts( $hook ) {

			if($hook == "post.php" || $hook == "post-new.php") {
				wp_enqueue_style( 'dt-attorney-vc-admin', plugins_url ('designthemes-attorney-addon') . '/vc/style.css', array (), false, 'all' );
			}			
		}
	}
}?>