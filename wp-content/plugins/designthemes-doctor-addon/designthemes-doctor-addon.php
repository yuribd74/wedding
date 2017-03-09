<?php
/*
 * Plugin Name:	DesignThemes Doctor Addon
 * URI: 	http://wedesignthemes.com/plugins/designthemes-doctor-addon
 * Description: A simple wordpress plugin designed to implements <strong>doctors features of DesignThemes</strong> 
 * Version: 	1.2
 * Author: 		DesignThemes 
 * Text Domain: veda-doctor
 * Author URI:	http://themeforest.net/user/designthemes
 */
if (! class_exists ( 'DTDoctorAddon' )) {
	class DTDoctorAddon {
		
		function __construct() {
			
			add_action ( 'init', array($this, 'dtLoadPluginTextDomain') );
			
			register_activation_hook( __FILE__ , array( $this , 'dtDoctorAddonActivated' ) );
			register_deactivation_hook( __FILE__ , array( $this , 'dtDoctorAddonDeactivated' ) );
			
			// Register Doctor Custom Post Type
			require_once plugin_dir_path ( __FILE__ ) . '/custom-post-types/register-post-types.php';
			if (class_exists('DTDoctorModuleCustomPostTypes')) {
				new DTDoctorModuleCustomPostTypes();
			}
			
			// Register Shortcodes
			require_once plugin_dir_path ( __FILE__ ) . '/shortcodes/shortcodes.php';
			if(class_exists('DTDoctorShortcodesDefinition')){
				new DTDoctorShortcodesDefinition();
			}

			// Register Visual Composer
			require_once plugin_dir_path ( __FILE__ ) . '/vc/register-vc.php';
			if(class_exists('DTVCDoctorModule')){
				new DTVCDoctorModule();
			}
		}
		
		function dtLoadPluginTextDomain() {
			load_plugin_textdomain ( 'veda-doctor', false, dirname ( plugin_basename ( __FILE__ ) ) . '/languages/' );
		}
		
		public static function dtDoctorAddonActivated() {
			if( ! function_exists('veda_option') ){
				wp_die( esc_html__( 'Please make sure "Veda Theme" is activated.', 'veda-doctor' ) );
			}
		}
		
		public static function dtDoctorAddonDeactivated() {
		}				
	}
	
	new DTDoctorAddon();	
}?>