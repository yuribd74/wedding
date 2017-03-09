<?php
if( !class_exists('DTAttorneyModuleCustomPostTypes') ) {
	
	class DTAttorneyModuleCustomPostTypes {
		
		function __construct() {
			
			// Add Hook into the 'wp_enqueue_scripts()' action			
			add_action ( 'wp_enqueue_scripts', array ( $this, 'dt_wp_enqueue_scripts' ) );
			
			// Attorney custom post type
			require_once plugin_dir_path ( __FILE__ ) . '/dt-attorney-post-type.php';
			if( class_exists('DTAttorneyPostType') ) {
				new DTAttorneyPostType();
			}
		}
		
		/**
		 * A function hook that the WordPress core launches at 'wp_enqueue_scripts' points
		 * Works in both front and back end
		 */
		function dt_wp_enqueue_scripts() {
			
			/* Front End CSS & jQuery */
			wp_enqueue_script ( 'dt-attorney-addon', plugins_url ('designthemes-attorney-addon') . '/js/attorney.js', array ('jquery'), false, true );
			wp_enqueue_style ( 'dt-attorney-addon', plugins_url ('designthemes-attorney-addon') . '/css/attorney.css', array (), false, 'all' );
		}
	}
}?>