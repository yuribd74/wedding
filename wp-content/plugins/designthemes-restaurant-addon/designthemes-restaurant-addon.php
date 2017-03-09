<?php
/*
 * Plugin Name:	DesignThemes Restaurant Addon
 * URI: 	http://wedesignthemes.com/plugins/designthemes-restaurant-addon
 * Description: A simple wordpress plugin designed to implements <strong>restaurant features of DesignThemes</strong> 
 * Version: 	1.0
 * Author: 		DesignThemes
 * Text Domain: veda-restaurant 
 * Author URI:	http://themeforest.net/user/designthemes
 */
if (! class_exists ( 'DTRestaurantAddon' )) {

	class DTRestaurantAddon {

		function __construct() {

			$this->plugin_dir_path = plugin_dir_path ( __FILE__ );

			// Add Hook into the 'init()' action
			add_action ( 'init', array (
					$this, 'dtLoadPluginTextDomain'
			) );

			// Register Custom Post Types
			require_once plugin_dir_path ( __FILE__ ) . '/custom-post-types/register-post-types.php';

			if (class_exists ( 'DTRestaurantCustomPostType' )) {
				$dt_restaurant_custom_posts = new DTRestaurantCustomPostType();
			}

			// Register Shortcodes
			require_once plugin_dir_path ( __FILE__ ) . '/shortcodes/shortcodes.php';

			if (class_exists ( 'DTRestaurantShortcodesDefinition' )) {
				new DTRestaurantShortcodesDefinition ();
			}

			// Register Visual Composer
			require_once plugin_dir_path ( __FILE__ ) . '/vc/register-vc.php';
			if(class_exists('DTVCRestaurantModule')){
				new DTVCRestaurantModule();
			}
		}

		/**
		 * To load text domain
		 */
		function dtLoadPluginTextDomain() {
			load_plugin_textdomain ( 'veda-restaurant', false, dirname ( plugin_basename ( __FILE__ ) ) . '/languages/' );
		}

		/**
		 * To load plugin activate
		 */
		public static function dtRestaurantAddonActivate() {
			if( ! function_exists('veda_option') ){
				wp_die( esc_html__( 'Please make sure "Veda Theme" is activated.', 'veda-restaurant' ) );
			}
		}

		/**
		 * To load plugin deactivate
		 */
		public static function dtRestaurantAddonDectivate() {
		}
	}
}

if (class_exists ( 'DTRestaurantAddon' )) {

	register_activation_hook ( __FILE__, array (
			'DTRestaurantAddon',
			'dtRestaurantAddonActivate' 
	) );
	register_deactivation_hook ( __FILE__, array (
			'DTRestaurantAddon',
			'dtRestaurantAddonDectivate' 
	) );

	$dt_restaurant_plugin = new DTRestaurantAddon ();
}
?>