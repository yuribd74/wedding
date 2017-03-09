<?php
/*
 * Plugin Name:	DesignThemes Model Addon
 * URI: 	http://wedesignthemes.com/plugins/designthemes-model-addon
 * Description: A simple wordpress plugin designed to implements <strong>attorney features of DesignThemes</strong> 
 * Version: 	1.0
 * Author: 		DesignThemes
 * Text Domain: veda-model 
 * Author URI:	http://themeforest.net/user/designthemes
 */
if (! class_exists ( 'DTModelAddon' )) {
	class DTModelAddon {
		
		function __construct() {
			
			add_action ( 'init', array($this, 'dtLoadPluginTextDomain') );

			register_activation_hook( __FILE__ , array( $this , 'dtModelAddonActivated' ) );
			register_deactivation_hook( __FILE__ , array( $this , 'dtModelAddonDeactivated' ) );
			
			// Register Model Custom Post Type
			require_once plugin_dir_path ( __FILE__ ) . '/custom-post-types/register-post-types.php';
			if (class_exists('DTModelModuleCustomPostTypes')) {
				new DTModelModuleCustomPostTypes();
			}
			
			// Register Shortcodes
			require_once plugin_dir_path ( __FILE__ ) . '/shortcodes/shortcodes.php';
			if(class_exists('DTModelShortcodesDefinition')){
				new DTModelShortcodesDefinition();
			}

			// Register Visual Composer
			require_once plugin_dir_path ( __FILE__ ) . '/vc/register-vc.php';
			if(class_exists('DTVCModelModule')){
				new DTVCModelModule();
			}
		}
		
		function dtLoadPluginTextDomain() {
			load_plugin_textdomain ( 'veda-model', false, dirname ( plugin_basename ( __FILE__ ) ) . '/languages/' );
		}
		
		public static function dtModelAddonActivated() {
			if( ! function_exists('veda_option') ){
				wp_die( esc_html__( 'Please make sure "Veda Theme" is activated.', 'veda-model' ) );
			}
		}
		
		public static function dtModelAddonDeactivated() {
		}				
	}
	
	new DTModelAddon();	
}?>