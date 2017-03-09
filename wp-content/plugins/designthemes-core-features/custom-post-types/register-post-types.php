<?php
if (! class_exists ( 'DTCoreCustomPostTypes' )) {

	/**
	 *
	 * @author iamdesigning11
	 *        
	 */
	class DTCoreCustomPostTypes {
		
		function __construct() {

			// Portfolio custom post type
			require_once plugin_dir_path ( __FILE__ ) . '/dt-portfolio-post-type.php';
			if (class_exists ( 'DTPortfolioPostType' )) {
				new DTPortfolioPostType();
			}

			// Add Hook into the 'admin_init()' action
			add_action ( 'admin_init', array (
					$this,
					'dt_admin_init'
			) );
		}
		
		/**
		 * A function hook that the WordPress core launches at 'admin_init' points
		 */
		function dt_admin_init() {
			wp_enqueue_style ( 'dt-custom-post-css', plugin_dir_url ( __FILE__ ) . 'css/styles.css' );
			wp_enqueue_script ( 'dt-metabox-script', plugin_dir_url ( __FILE__ ) . 'js/dt.metabox.js', array (), false, true );
		}
	}
}
?>