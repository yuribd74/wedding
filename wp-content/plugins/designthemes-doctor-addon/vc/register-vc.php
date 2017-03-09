<?php if( !class_exists('DTVCDoctorModule') ) {
	class DTVCDoctorModule {

		function __construct() {

			add_action ( 'after_setup_theme', array ( $this, 'dt_map_doctors_shortcodes' ) , 1000 );

			add_action( 'admin_enqueue_scripts', array( $this, 'dt_doctor_vc_admin_scripts')  );
		}

		function dt_map_doctors_shortcodes() {

			global $pagenow;

			$path = plugin_dir_path ( __FILE__ ).'modules/';
			$modules = array(
				'dt_sc_doctor_item' => $path.'single-doctor.php',
				'dt_sc_query_doctors' => $path.'random-doctors.php',
				'dt_sc_doctors_with_filter' => $path.'doctors-with-filter.php',

				# Have to get idea to load following Shortcodes only in doctor post edit in admin panel
				'dt_sc_current_doctor_info' => $path.'current-doctor-info.php',
				'dt_sc_current_doctor_meta' => $path.'current-doctor-meta.php'
			);

			// Apply filters so you can easily modify the modules 100%
			$modules = apply_filters( 'vcex_builder_modules', $modules );

			if( !empty( $modules ) ){
				foreach ( $modules as $key => $val ) {
					require_once( $val );
				}
			}
		}

		function dt_doctor_vc_admin_scripts( $hook ) {

			if($hook == "post.php" || $hook == "post-new.php") {
				wp_enqueue_style( 'dt-doctor-vc-admin', plugins_url ('designthemes-doctor-addon') . '/vc/style.css', array (), false, 'all' );
			}			
		}		
	}
}?>