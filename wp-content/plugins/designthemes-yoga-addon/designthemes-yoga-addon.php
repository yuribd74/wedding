<?php
/*
 * Plugin Name:	DesignThemes Yoga Addon for Veda Theme
 * URI: 	http://wedesignthemes.com/plugins/designthemes-yoga-addon
 * Description: A simple wordpress plugin designed to implements <strong>Yoga addon of Veda Theme by DesignThemes</strong> 
 * Version: 	1.0
 * Author: 		DesignThemes
 * Text Domain: veda-doctor 
 * Author URI:	http://themeforest.net/user/designthemes
 */
if (! class_exists ( 'DTYogaAddon' )) {

	class DTYogaAddon {

		function __construct() {

			add_action ( 'init', array($this, 'dtLoadPluginTextDomain') );

			register_activation_hook( __FILE__ , array( $this , 'dtYogaAddonActivated' ) );
			register_deactivation_hook( __FILE__ , array( $this , 'dtYogaAddonDeactivated' ) );

			// Register Yoga Custom Post Type
			require_once plugin_dir_path ( __FILE__ ) . '/custom-post-types/register-post-types.php';
			if (class_exists('DTYogaModuleCustomPostTypes')) {
				new DTYogaModuleCustomPostTypes();
			}

			// Register Shortcodes
			require_once plugin_dir_path ( __FILE__ ) . '/shortcodes/shortcodes.php';
			if(class_exists('DTYogaModuleShortcodesDefinition')){
				new DTYogaModuleShortcodesDefinition();
			}

			// Register Visual Composer
			require_once plugin_dir_path ( __FILE__ ) . '/vc/register-vc.php';
			if(class_exists('DTVCYogaModule')){
				new DTVCYogaModule();
			}
		}

		function dtLoadPluginTextDomain() {
			load_plugin_textdomain ( 'veda-yoga', false, dirname ( plugin_basename ( __FILE__ ) ) . '/languages/' );
		}

		public static function dtYogaAddonActivated() {
			if( ! function_exists('veda_option') ){
				wp_die( esc_html__( 'Please make sure "Veda Theme" is activated.', 'veda-yoga' ) );
			}
		}
		
		public static function dtYogaAddonDeactivated() {
		}
	}

	new DTYogaAddon();
}?>