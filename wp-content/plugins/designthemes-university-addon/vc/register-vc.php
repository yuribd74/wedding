<?php if( !class_exists('DTVCUniversityModule') ) {
	class DTVCUniversityModule {

		function __construct() {

			add_action ( 'after_setup_theme', array ( $this, 'dt_map_university_shortcodes' ) , 1000 );

			add_action( 'admin_enqueue_scripts', array( $this, 'dt_university_vc_admin_scripts')  );
		}

		function dt_map_university_shortcodes() {

			$path = plugin_dir_path ( __FILE__ ).'modules/';
			$modules = array(
				'dt_sc_current_faculty_info' => $path.'faculty-info.php',
				'dt_sc_current_faculty_role' => $path.'faculty-role.php',
				'dt_sc_current_faculty_meta' => $path.'faculty-meta.php',
				'faculty_listing' => $path.'faculty_listing.php',
				'course_item' => $path.'course_item.php',
				'recent_courses' => $path.'recent_courses.php',
				'dept_courses' => $path.'dept_wise_courses.php',
			);

			// Apply filters so you can easily modify the modules 100%
			$modules = apply_filters( 'vcex_builder_modules', $modules );

			if( !empty( $modules ) ){
				foreach ( $modules as $key => $val ) {
					require_once( $val );
				}
			}
		}

		function dt_university_vc_admin_scripts( $hook ) {

			if($hook == "post.php" || $hook == "post-new.php") {
				wp_enqueue_style( 'dt-university-vc-admin', plugins_url ('designthemes-university-addon') . '/vc/style.css', array (), false, 'all' );
			}			
		}
		
	}
}?>