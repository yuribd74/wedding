<?php
if (! class_exists ( 'DTEventCustomPostType' )) {

	class DTEventCustomPostType {

		function __construct() {

			// Add Hook into the 'wp_enqueue_scripts()' action			
			add_action ( 'wp_enqueue_scripts', array ( $this, 'dt_wp_enqueue_scripts' ) );

			// DJs custom post type
			require_once plugin_dir_path ( __FILE__ ) . '/dt-dj-post-type.php';
			if (class_exists ( 'DTDJPostType' )) {
				new DTDJPostType();
			}
		}

		/**
		 * A function hook that the WordPress core launches at 'wp_enqueue_scripts' points
		 * Works in both front and back end
		 */
		function dt_wp_enqueue_scripts() {
			
			/* Front End CSS & jQuery */
			wp_enqueue_script ( 'dt-event-addon-scripts', plugins_url ('designthemes-event-addon') . '/js/event.js', array (), false, true );
			wp_enqueue_style ( 'dt-event-addon', plugins_url ('designthemes-event-addon') . '/css/event.css', array (), false, 'all' );
		}
	}
}?>