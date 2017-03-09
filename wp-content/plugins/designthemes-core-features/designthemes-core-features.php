<?php
/*
 * Plugin Name:	DesignThemes Core Features Plugin 
 * URI: 	http://wedesignthemes.com/plugins/designthemes-core-features 
 * Description: A simple wordpress plugin designed to implements <strong>core features of DesignThemes</strong> 
 * Version: 	1.7
 * Author: 		DesignThemes 
 * Text Domain: veda-core
 * Author URI:	http://themeforest.net/user/designthemes
 */
if (! class_exists ( 'DTCorePlugin' )) {

	/**
	 * Basic class to load Shortcodes & Custom Posts
	 *
	 * @author iamdesigning11
	 */
	class DTCorePlugin {

		function __construct() {
			
			$this->plugin_dir_path = plugin_dir_path ( __FILE__ );

			// Add Hook into the 'init()' action
			add_action ( 'init', array (
					$this, 'dtLoadPluginTextDomain'
			) );

			// Register Shortcodes
			require_once plugin_dir_path ( __FILE__ ) . '/shortcodes/register-shortcodes.php';

			if (class_exists ( 'DTCoreShortcodes' )) {
				$dt_core_shortcodes = new DTCoreShortcodes ();
			}

			// Register Custom Post Types
			require_once plugin_dir_path ( __FILE__ ) . '/custom-post-types/register-post-types.php';

			if (class_exists ( 'DTCoreCustomPostTypes' )) {
				$dt_core_custom_posts = new DTCoreCustomPostTypes ();
			}


			if( $this->dt_core_is_plugin_active('js_composer/js_composer.php') ) {

				// Register Visual Composer Modules
				require_once plugin_dir_path ( __FILE__ ) . '/visual-composer/register-vc.php';
				if (class_exists ( 'DTCoreVC' )) {
					new DTCoreVC ();
				}			
			}
		}

		function dt_core_is_plugin_active($plugin) {
			return in_array( $plugin, (array) get_option( 'active_plugins', array() ) ) || $this->dt_core_is_plugin_active_for_network( $plugin );
		}

		function dt_core_is_plugin_active_for_network( $plugin ) {
			if ( !is_multisite() )
				return false;

			$plugins = get_site_option( 'active_sitewide_plugins');
			if ( isset($plugins[$plugin]) )
				return true;

			return false;
		}				

		/**
		 * To load text domain
		 */
		function dtLoadPluginTextDomain() {
			load_plugin_textdomain ( 'veda-core', false, dirname ( plugin_basename ( __FILE__ ) ) . '/languages/' );
		}

		/**
		 */
		public static function dtCorePluginActivate() {
			if( ! function_exists('veda_option') ){
				wp_die( esc_html__( 'Please make sure "Veda Theme" is activated.', 'veda-core' ) );
			}
		}

		/**
		 */
		public static function dtCorePluginDectivate() {
		}		
	}
}

if (class_exists ( 'DTCorePlugin' )) {

	register_activation_hook ( __FILE__, array (
			'DTCorePlugin',
			'dtCorePluginActivate' 
	) );
	register_deactivation_hook ( __FILE__, array (
			'DTCorePlugin',
			'dtCorePluginDectivate' 
	) );
	
	$dt_core_plugin = new DTCorePlugin ();
}
?>