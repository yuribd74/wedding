<?php
/*
 * Plugin Name:	Veda Demo Importer
 * URI: 	http://wedesignthemes.com/plugins/veda-demo-importer
 * Description: A simple wordpress plugin designed to import demo contents for <strong>VEDA</strong> theme 
 * Version: 	1.9
 * Author: 		DesignThemes 
 * Text Domain: veda-importer
 * Author URI:	http://themeforest.net/user/designthemes
 */
if (! class_exists ( 'DTVedaImporter' )) {
	class DTVedaImporter {

		function __construct() {

			add_action('wp_ajax_veda_ajax_importer',  array( $this, 'veda_ajax_importer' ) );
			
			register_activation_hook( __FILE__ , array( $this , 'dtDemoAddonActivated' ) );
			register_deactivation_hook( __FILE__ , array( $this , 'dtDemoAddonDeactivated' ) );
		}

		function veda_ajax_importer() {
			require_once plugin_dir_path ( __FILE__ ) . 'importer/import.php';
			die();
		}
		
		public static function dtDemoAddonActivated() {
			if( ! function_exists('veda_option') ){
				wp_die( esc_html__( 'Please make sure "Veda Theme" is activated.', 'veda-importer' ) );
			}
		}
		
		public static function dtDemoAddonDeactivated() {
		}
	}

	new DTVedaImporter();
}