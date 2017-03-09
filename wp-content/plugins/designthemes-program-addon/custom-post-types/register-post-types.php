<?php
if (! class_exists ( 'DTProgramCustomPostType' )) {

	class DTProgramCustomPostType {

		function __construct() {

			// Add Hook into the 'wp_enqueue_scripts()' action			
			add_action ( 'wp_enqueue_scripts', array ( $this, 'dt_wp_enqueue_scripts' ) );

			// Program custom post type
			require_once plugin_dir_path ( __FILE__ ) . '/dt-program-post-type.php';
			if (class_exists ( 'DTProgramPostType' )) {
				new DTProgramPostType();
			}

			// Trainer custom post type
			require_once plugin_dir_path ( __FILE__ ) . '/dt-trainer-post-type.php';
			if (class_exists ( 'DTTrainerPostType' )) {
				new DTTrainerPostType();
			}
		}
		
		/**
		 * A function hook that the WordPress core launches at 'wp_enqueue_scripts' points
		 * Works in both front and back end
		 */
		function dt_wp_enqueue_scripts() {
			
			wp_enqueue_script ( 'dt-program-addon-scripts', plugins_url ('designthemes-program-addon') . '/js/program.js', array (), false, true );
			wp_enqueue_style ( 'dt-program-addon', plugins_url ('designthemes-program-addon') . '/css/program.css', array (), false, 'all' );
		}
	}
}?>