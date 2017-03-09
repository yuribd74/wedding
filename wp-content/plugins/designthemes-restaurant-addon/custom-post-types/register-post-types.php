<?php
if (! class_exists ( 'DTRestaurantCustomPostType' )) {

	class DTRestaurantCustomPostType {

		function __construct() {

			// Add Hook into the 'wp_enqueue_scripts()' action			
			add_action ( 'wp_enqueue_scripts', array ( $this, 'dt_wp_enqueue_scripts' ) );

			// Menu custom post type
			require_once plugin_dir_path ( __FILE__ ) . '/dt-menu-post-type.php';
			if (class_exists ( 'DTMenuPostType' )) {
				new DTMenuPostType();
			}

			// Chef custom post type
			require_once plugin_dir_path ( __FILE__ ) . '/dt-chef-post-type.php';
			if (class_exists ( 'DTChefPostType' )) {
				new DTChefPostType();
			}
		}
		
		/**
		 * A function hook that the WordPress core launches at 'wp_enqueue_scripts' points
		 * Works in both front and back end
		 */
		function dt_wp_enqueue_scripts() {
			wp_enqueue_script ( 'dt-restaurant-addon-scripts', plugins_url ('designthemes-restaurant-addon') . '/js/restaurant.js', array (), false, true );
			wp_enqueue_style ( 'dt-restaurant-addon', plugins_url ('designthemes-restaurant-addon') . '/css/restaurant.css', array (), false, 'all' );
		}
	}
}?>