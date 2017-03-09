<?php
/*
 * Plugin Name:	DesignThemes Program Addon
 * URI: 	http://wedesignthemes.com/plugins/designthemes-program-addon
 * Description: A simple wordpress plugin designed to implements <strong>program features of DesignThemes</strong> 
 * Version: 	1.0
 * Author: 		DesignThemes
 * Text Domain: veda-program
 * Author URI:	http://themeforest.net/user/designthemes
 */
if (! class_exists ( 'DTProgramAddon' )) {

	class DTProgramAddon {

		function __construct() {

			$this->plugin_dir_path = plugin_dir_path ( __FILE__ );

			// Add Hook into the 'init()' action
			add_action ( 'init', array (
					$this, 'dtLoadPluginTextDomain'
			) );

			// Register Custom Post Types
			require_once plugin_dir_path ( __FILE__ ) . '/custom-post-types/register-post-types.php';

			if (class_exists ( 'DTProgramCustomPostType' )) {
				$dt_program_custom_posts = new DTProgramCustomPostType();
			}

			// Register Shortcodes
			require_once plugin_dir_path ( __FILE__ ) . '/shortcodes/shortcodes.php';

			if (class_exists ( 'DTProgramShortcodesDefinition' )) {
				new DTProgramShortcodesDefinition ();
			}
			
			// Register Widgets
			require_once plugin_dir_path ( __FILE__ ) . '/widgets/register-widgets.php';

			if (class_exists ( 'DTProgramWidgets' )) {
				$dt_program_widgets = new DTProgramWidgets ();
			}

			// Register Visual Composer
			require_once plugin_dir_path ( __FILE__ ) . '/vc/register-vc.php';
			if(class_exists('DTVCProgramModule')){
				new DTVCProgramModule();
			}			
		}

		/**
		 * To load text domain
		 */
		function dtLoadPluginTextDomain() {
			load_plugin_textdomain ( 'veda-program', false, dirname ( plugin_basename ( __FILE__ ) ) . '/languages/' );
		}

		/**
		 * To load plugin activate
		 */
		public static function dtProgramAddonActivate() {
			if( ! function_exists('veda_option') ){
				wp_die( esc_html__( 'Please make sure "Veda Theme" is activated.', 'veda-program' ) );
			}
		}

		/**
		 * To load plugin deactivate
		 */
		public static function dtProgramAddonDectivate() {
		}
	}
}

if (class_exists ( 'DTProgramAddon' )) {

	register_activation_hook ( __FILE__, array (
			'DTProgramAddon',
			'dtProgramAddonActivate' 
	) );
	register_deactivation_hook ( __FILE__, array (
			'DTProgramAddon',
			'dtProgramAddonDectivate' 
	) );

	$dt_program_plugin = new DTProgramAddon ();
}
?>