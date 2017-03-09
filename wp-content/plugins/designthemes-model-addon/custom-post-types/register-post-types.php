<?php
if( !class_exists('DTModelModuleCustomPostTypes') ) {
	
	class DTModelModuleCustomPostTypes {
		
		function __construct() {
			
			// Add Hook into the 'wp_enqueue_scripts()' action			
			add_action ( 'wp_enqueue_scripts', array ( $this, 'dt_wp_enqueue_scripts' ) );
			
			// Model custom post type
			require_once plugin_dir_path ( __FILE__ ) . '/dt-model-post-type.php';
			if( class_exists('DTModelPostType') ) {
				new DTModelPostType();
			}
		}
		
		/**
		 * A function hook that the WordPress core launches at 'wp_enqueue_scripts' points
		 * Works in both front and back end
		 */
		function dt_wp_enqueue_scripts() {
			
			/* Front End CSS & jQuery */
			wp_enqueue_script ( 'jquery' );
			wp_enqueue_script ( 'dt-model-addon-scripts', plugins_url ('designthemes-model-addon') . '/js/model.js', array (), false, true );
			
			wp_enqueue_style ( 'dt-model-addon', plugins_url ('designthemes-model-addon') . '/css/model.css', array (), false, 'all' );
		}
	}
}?>