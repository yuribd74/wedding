<?php
/*
 * Plugin Name:	DesignThemes Attorney Addon
 * URI: 	http://wedesignthemes.com/plugins/designthemes-attorney-addon
 * Description: A simple wordpress plugin designed to implements <strong>Attorney add-on features of DesignThemes</strong> 
 * Version: 	1.2
 * Author: 		DesignThemes 
 * Text Domain: veda-attorney
 * Author URI:	http://themeforest.net/user/designthemes
 */
if (! class_exists ( 'DTAttorneyAddon' )) {
	class DTAttorneyAddon {
		
		function __construct() {
			
			add_action ( 'init', array($this, 'dtLoadPluginTextDomain') );
			
			register_activation_hook( __FILE__ , array( $this , 'dtAttorneyAddonActivated' ) );
			register_deactivation_hook( __FILE__ , array( $this , 'dtAttorneyAddonDeactivated' ) );
			
			// Register Attorney Custom Post Type
			require_once plugin_dir_path ( __FILE__ ) . '/custom-post-types/register-post-types.php';
			if (class_exists('DTAttorneyModuleCustomPostTypes')) {
				new DTAttorneyModuleCustomPostTypes();
			}
			
			// Register Shortcodes
			require_once plugin_dir_path ( __FILE__ ) . '/shortcodes/shortcodes.php';
			if(class_exists('DTAttorneyShortcodesDefinition')){
				new DTAttorneyShortcodesDefinition();
			}

			// Register Widgets
			require_once plugin_dir_path ( __FILE__ ) . '/widgets/register-widgets.php';

			if (class_exists ( 'DTAttorneyWidgets' )) {
				new DTAttorneyWidgets ();
			}

			// Register Visual Composer
			require_once plugin_dir_path ( __FILE__ ) . '/vc/register-vc.php';
			if(class_exists('DTVCAttorneyModule')){
				new DTVCAttorneyModule();
			}						
		}
		
		function dtLoadPluginTextDomain() {
			load_plugin_textdomain ( 'veda-attorney', false, dirname ( plugin_basename ( __FILE__ ) ) . '/languages/' );
		}

		public static function dtAttorneyAddonActivated() {
			if( ! function_exists('veda_option') ){
				wp_die( esc_html__( 'Please make sure "Veda Theme" is activated.', 'veda-attorney' ) );
			}
		}

		public static function dtAttorneyAddonDeactivated() {
		}				
	}
	
	new DTAttorneyAddon();	
}?>