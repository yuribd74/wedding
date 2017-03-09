<?php if( !class_exists('DTVCYogaModule') ) {
	class DTVCYogaModule {

		function __construct() {

			add_action ( 'after_setup_theme', array ( $this, 'dt_map_yoga_shortcodes' ) , 1000 );

			add_action( 'admin_enqueue_scripts', array( $this, 'dt_yoga_vc_admin_scripts')  );
		}

		function dt_map_yoga_shortcodes() {

			$path = plugin_dir_path ( __FILE__ ).'modules/';
			$modules = array(
				'dt_sc_yoga_videos_listing' => $path.'videos_listing.php',
				'dt_sc_yoga_styles_listing' => $path.'styles_listing.php',
				'dt_sc_yoga_poses_listing' => $path.'poses_listing.php',
				'dt_sc_yoga_teachers_listing' => $path.'teachers_listing.php',

				'dt_sc_yoga_programs_listing' => $path.'programs_listing.php',
				'dt_sc_yoga_recent_programs_listing' => $path.'recent_programs_listing.php',
				'dt_sc_yoga_teacher_programs_listing' => $path.'teacher_programs_listing.php',
				'dt_sc_yoga_category_programs_listing' => $path.'category_programs_listing.php',
				'dt_sc_yoga_style_programs_listing' => $path.'style_programs_listing.php',

				'dt_sc_yoga_class' => $path.'yoga_class.php',
				'dt_sc_yoga_video_item' => $path.'video_item.php',
			);

			// Apply filters so you can easily modify the modules 100%
			$modules = apply_filters( 'vcex_builder_modules', $modules );

			if( !empty( $modules ) ){
				foreach ( $modules as $key => $val ) {
					require_once( $val );
				}
			}
		}

		function dt_yoga_vc_admin_scripts( $hook ) {

			if($hook == "post.php" || $hook == "post-new.php") {
				wp_enqueue_style( 'dt-yoga-vc-admin', plugins_url ('designthemes-yoga-addon') . '/vc/style.css', array (), false, 'all' );
			}			
		}

	}
}?>