<?php
if( !class_exists('DTDoctorModuleCustomPostTypes') ) {
	
	class DTDoctorModuleCustomPostTypes {
		
		function __construct() {
			
			// Add Hook into the 'wp_enqueue_scripts()' action			
			add_action ( 'wp_enqueue_scripts', array ( $this, 'dt_wp_enqueue_scripts' ) );
			
			// Doctor custom post type
			require_once plugin_dir_path ( __FILE__ ) . '/dt-doctor-post-type.php';
			if( class_exists('DTDoctorPostType') ) {
				new DTDoctorPostType();
			}
		}
		
		/**
		 * A function hook that the WordPress core launches at 'wp_enqueue_scripts' points
		 * Works in both front and back end
		 */
		function dt_wp_enqueue_scripts() {
			
			wp_enqueue_script ( 'dt-doctor-addon', plugins_url ('designthemes-doctor-addon') . '/js/doctors.js', array ('jquery'), false, true );
			wp_enqueue_style ( 'dt-doctor-addon', plugins_url ('designthemes-doctor-addon') . '/css/doctors.css', array (), false, 'all' );
		}
	}
}?>