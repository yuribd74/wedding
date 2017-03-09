<?php
/*
 * Plugin Name:	DesignThemes Event Addon
 * URI: 	http://wedesignthemes.com/plugins/designthemes-event-addon
 * Description: A simple wordpress plugin designed to implements <strong>event features of DesignThemes</strong> 
 * Version: 	1.1
 * Author: 		DesignThemes
 * Text Domain: veda-event
 * Author URI:	http://themeforest.net/user/designthemes
 */
if (! class_exists ( 'DTEventAddon' )) {

	class DTEventAddon {

		function __construct() {

			$this->plugin_dir_path = plugin_dir_path ( __FILE__ );

			// Add Hook into the 'init()' action
			add_action ( 'init', array (
				$this, 'dtLoadPluginTextDomain'
			) );

			// Register Custom Post Types
			require_once plugin_dir_path ( __FILE__ ) . '/custom-post-types/register-post-types.php';

			if (class_exists ( 'DTEventCustomPostType' )) {
				$dt_event_custom_posts = new DTEventCustomPostType();
			}

			// Register Shortcodes
			require_once plugin_dir_path ( __FILE__ ) . '/shortcodes/shortcodes.php';

			if (class_exists ( 'DTEventShortcodesDefinition' )) {
				new DTEventShortcodesDefinition();
			}

			// Register Visual Composer
			require_once plugin_dir_path ( __FILE__ ) . '/vc/register-vc.php';
			if(class_exists('DTVCEventModule')){
				new DTVCEventModule();
			}			
		}

		/**
		 * To load text domain
		 */
		function dtLoadPluginTextDomain() {
			load_plugin_textdomain ( 'veda-event', false, dirname ( plugin_basename ( __FILE__ ) ) . '/languages/' );
		}

		/**
		 * To load plugin activate
		 */
		public static function dtEventAddonActivate() {
			if( ! function_exists('veda_option') ){
				wp_die( esc_html__( 'Please make sure "Veda Theme" is activated.', 'veda-event' ) );
			}
		}

		/**
		 * To load plugin deactivate
		 */
		public static function dtEventAddonDectivate() {
		}
	}
}

if (class_exists ( 'DTEventAddon' )) {

	register_activation_hook ( __FILE__, array (
		'DTEventAddon',
		'dtEventAddonActivate' 
	) );
	
	register_deactivation_hook ( __FILE__, array (
		'DTEventAddon',
		'dtEventAddonDectivate'
	) );

	$dt_event_plugin = new DTEventAddon ();
}?>