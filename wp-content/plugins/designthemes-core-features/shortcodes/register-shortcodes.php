<?php
if (! class_exists ( 'DTCoreShortcodes' )) {
	
	/**
	 * Used to "Loades Core Shortcodes & Add button to tinymce"
	 *
	 * @author iamdesigning11
	 */
	class DTCoreShortcodes {
		
		/**
		 * Constructor for DTCoreShortcodes
		 */
		function __construct() {
			
			require_once plugin_dir_path ( __FILE__ ) . 'shortcodes.php';
			
			add_action( 'wp_enqueue_scripts', array(
				$this,
				'dt_wp_enqueue_scripts'
			) );
			
			add_action('wp_ajax_dt_ajax_mc_subscribe', array (
				$this,
				'dt_ajax_mc_subscribe'
			) );

			add_action('wp_ajax_nopriv_dt_ajax_mc_subscribe', array (
				$this,
				'dt_ajax_mc_subscribe'
			) );

			add_filter( 'widget_text', 'do_shortcode' );
		}
		
		function dt_wp_enqueue_scripts() {
			/* Front End CSS & jQuery */
			wp_enqueue_style ( 'dt-animation-css', plugin_dir_url ( __FILE__ ) . 'css/animations.css' );
			wp_enqueue_style ( 'dt-sc-css', plugin_dir_url ( __FILE__ ) . 'css/shortcodes.css' );

			wp_enqueue_script ( 'jquery' );
			wp_enqueue_script ( 'dt-sc-tabs', plugin_dir_url ( __FILE__ ) . 'js/jquery.tabs.min.js', array (), false, true );
			wp_enqueue_script ( 'dt-sc-tiptip', plugin_dir_url ( __FILE__ ) . 'js/jquery.tipTip.minified.js', array (), false, true );
			wp_enqueue_script ( 'dt-sc-inview', plugin_dir_url ( __FILE__ ) . 'js/jquery.inview.js', array (), false, true );
			wp_enqueue_script ( 'dt-sc-animatenum', plugin_dir_url ( __FILE__ ) . 'js/jquery.animateNumber.min.js', array (), false, true );
			wp_enqueue_script ( 'dt-sc-donutchart', plugin_dir_url ( __FILE__ ) . 'js/jquery.donutchart.js', array (), false, true );
			wp_enqueue_script ( 'dt-sc-script', plugin_dir_url ( __FILE__ ) . 'js/shortcodes.js', array (), false, true );
		}
		
		
		function dt_ajax_mc_subscribe() {

			if( isset( $_REQUEST['mc_email']) ):

				// getting api key
				require_once(VEDA_CORE_PLUGIN."/apis/mailchimp/MCAPI.class.php");

				$mcapi = new MCAPI( veda_option('layout', 'mailchimp-key') );
				if(isset($_REQUEST['mc_name']))
					$merge_vars = Array( 'FNAME' =>$_REQUEST['mc_name'], 'EMAIL' => $_REQUEST['mc_email'] );
				else
					$merge_vars = Array( 'EMAIL' => $_REQUEST['mc_email'] );

				if($mcapi->listSubscribe($_REQUEST['mc_listid'], $_REQUEST['mc_email'], $merge_vars ) ):
					echo '<span class="dt-mc-success">'.esc_html__('Success!&nbsp; Check your inbox or spam folder for a message containing a confirmation link.', 'veda-core').'</span>';
				else:
					echo '<span class="dt-mc-error"><b>'.esc_html__('Error:', 'veda-core').'</b>&nbsp; ' . $mcapi->errorMessage.'</span>';
				endif;

			endif;
		}
	}
}
?>