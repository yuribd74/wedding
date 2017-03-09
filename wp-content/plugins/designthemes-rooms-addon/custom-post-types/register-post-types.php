<?php
if (! class_exists ( 'DTRoomCustomPostType' )) {

	class DTRoomCustomPostType {

		function __construct() {

			// Add Hook into the 'wp_enqueue_scripts()' action
			add_action ( 'wp_enqueue_scripts', array ( $this, 'dt_wp_enqueue_scripts' ) );

			// Room custom post type
			require_once plugin_dir_path ( __FILE__ ) . '/dt-room-post-type.php';
			if (class_exists ( 'DTRoomPostType' )) {
				new DTRoomPostType();
			}
		}

		/**
		 * A function hook that the WordPress core launches at 'wp_enqueue_scripts' points
		 * Works in both front and back end
		 */
		function dt_wp_enqueue_scripts() {
			
			/* Front End CSS & jQuery */
			wp_enqueue_script ('jquery-ui-datepicker');
			wp_enqueue_script ( 'dt-rooms-addon-jvalidate', plugins_url ('designthemes-rooms-addon') . '/js/jquery.validate.min.js', array (), false, true );
			wp_enqueue_script ( 'dt-rooms-addon-scripts', plugins_url ('designthemes-rooms-addon') . '/js/hotel.js', array (), false, true );
			wp_enqueue_style ( 'dt-rooms-addon', plugins_url ('designthemes-rooms-addon') . '/css/hotel.css', array (), false, 'all' );
		}
	}
}
?>