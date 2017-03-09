<?php
/*
 * Plugin Name:	DesignThemes University Addon
 * URI: 	http://wedesignthemes.com/plugins/designthemes-university-addon
 * Description: A simple wordpress plugin designed to implements <strong>University addon of DesignThemes</strong> 
 * Version: 	1.1
 * Author: 		DesignThemes
 * Text Domain: veda-university
 * Author URI:	http://themeforest.net/user/designthemes
 */
if (! class_exists ( 'DTUniversityAddon' )) {
	class DTUniversityAddon {
		
		function __construct() {
			
			add_action ( 'init', array($this, 'dtLoadPluginTextDomain') );
			
			register_activation_hook( __FILE__ , array( $this , 'dtUniversityAddonActivated' ) );
			register_deactivation_hook( __FILE__ , array( $this , 'dtUniversityAddonDeactivated' ) );
			
			// Register University Custom Post Type
			require_once plugin_dir_path ( __FILE__ ) . '/custom-post-types/register-post-types.php';
			if (class_exists('DTUniversityModuleCustomPostTypes')) {
				new DTUniversityModuleCustomPostTypes();
			}
			
			// Register Shortcodes
			require_once plugin_dir_path ( __FILE__ ) . '/shortcodes/shortcodes.php';
			if(class_exists('DTUniversityModuleShortcodesDefinition')){
				new DTUniversityModuleShortcodesDefinition();
			}

			// Register Visual Composer
			require_once plugin_dir_path ( __FILE__ ) . '/vc/register-vc.php';
			if(class_exists('DTVCUniversityModule')){
				new DTVCUniversityModule();
			}
		}
		
		function dtLoadPluginTextDomain() {
			load_plugin_textdomain ( 'veda-university', false, dirname ( plugin_basename ( __FILE__ ) ) . '/languages/' );
		}
		
		public static function dtUniversityAddonActivated() {
			if( ! function_exists('veda_option') ){
				wp_die( esc_html__( 'Please make sure "Veda Theme" is activated.', 'veda-university' ) );
			}
		}
		
		public static function dtUniversityAddonDeactivated() {
		}				
	}
	
	new DTUniversityAddon();

} ?>