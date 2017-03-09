<?php
/*
 * Plugin Name:	DesignThemes Room Addon
 * URI: 	http://wedesignthemes.com/plugins/designthemes-rooms-addon
 * Description: A simple wordpress plugin designed to implements <strong>room features of DesignThemes</strong> 
 * Version: 	1.0
 * Author: 		DesignThemes
 * Text Domain: veda-room
 * Author URI:	http://themeforest.net/user/designthemes
 */
if (! class_exists ( 'DTRoomAddon' )) {

	class DTRoomAddon {

		function __construct() {

			$this->plugin_dir_path = plugin_dir_path ( __FILE__ );

			// Add Hook into the 'init()' action
			add_action ( 'init', array (
					$this, 'dtLoadPluginTextDomain'
			) );

			// Add Hook into the 'admin_menu()' action
			#add_action ( 'admin_menu', array (
			#		$this, 'dt_admin_menu'
			#) );

			// Add Hook into the 'admin_enqueue_scripts()' action
			#add_action ( 'admin_enqueue_scripts', array (
			#		$this, 'dt_admin_panel_scripts'
			#) );

			// Register Custom Post Types
			require_once plugin_dir_path ( __FILE__ ) . 'custom-post-types/register-post-types.php';

			if (class_exists ( 'DTRoomCustomPostType' )) {
				$dt_room_custom_posts = new DTRoomCustomPostType();
			}

			// Register Shortcodes
			require_once plugin_dir_path ( __FILE__ ) . 'shortcodes/shortcodes.php';

			if (class_exists ( 'DTRoomShortcodesDefinition' )) {
				new DTRoomShortcodesDefinition();
			}
			
			// Register Widgets
			require_once plugin_dir_path ( __FILE__ ) . 'widgets/register-widgets.php';

			if (class_exists ( 'DTRoomWidgets' )) {
				$dt_room_widgets = new DTRoomWidgets();
			}

			// Register Visual Composer
			require_once plugin_dir_path ( __FILE__ ) . '/vc/register-vc.php';
			if(class_exists('DTVCRoomsModule')){
				new DTVCRoomsModule();
			}			

			#require_once plugin_dir_path ( __FILE__ ) . 'roombooking/generalsettings.php';
			#require_once plugin_dir_path ( __FILE__ ) . 'roombooking/availablesettings.php';
			#require_once plugin_dir_path ( __FILE__ ) . 'roombooking/servicesettings.php';
			#require_once plugin_dir_path ( __FILE__ ) . 'roombooking/ordersettings.php';

			#require_once plugin_dir_path ( __FILE__ ) . 'roombooking/admin/core-functions.php';
			#require_once plugin_dir_path ( __FILE__ ) . 'roombooking/frontend-functions.php';
		}

		/**
		 * To load text domain
		 */
		function dtLoadPluginTextDomain() {
			load_plugin_textdomain ( 'veda-room', false, dirname ( plugin_basename ( __FILE__ ) ) . 'languages/' );
		}

		/**
		 * To load admin menu
		 */
		function dt_admin_menu() {
			if(function_exists('add_submenu_page')) {
				add_submenu_page( 'edit.php?post_type=dt_rooms', esc_html__('General Settings', 'veda-room'), esc_html__('General Settings', 'veda-room'), 'manage_options', 'generalsettings', 'veda_room_hb_general_page');
				add_submenu_page( 'edit.php?post_type=dt_rooms', esc_html__('Rooms Availability', 'veda-room'), esc_html__('Rooms Availability', 'veda-room'), 'manage_options', 'availablesettings', 'veda_room_hb_available_page');
				add_submenu_page( 'edit.php?post_type=dt_rooms', esc_html__('Additional Services', 'veda-room'), esc_html__('Additional Services', 'veda-room'), 'manage_options', 'servicesettings', 'veda_room_hb_service_page');
				add_submenu_page( 'edit.php?post_type=dt_rooms', esc_html__('Order Details', 'veda-room'), esc_html__('Order Details', 'veda-room'), 'manage_options', 'ordersettings', 'veda_room_hb_order_page');
			}
		}

		/**
		 * To load admin menu scripts
		 */
		 function dt_admin_panel_scripts() {
			$current_screen = get_current_screen();
			$template_uri = get_template_directory_uri();
			
			if($current_screen->base == 'dt_rooms_page_availablesettings') {

				wp_enqueue_style ( 'rb-flick-theme', plugin_dir_url ( __FILE__ ) . 'roombooking/css/flick/jquery-ui.min.css' );
				wp_enqueue_style ( 'rb-flick-ui-dp', plugin_dir_url ( __FILE__ ) . 'roombooking/css/ui-flick.datepick.css' );
								
				wp_enqueue_script('jquery-ui');
				wp_enqueue_script('jquery-ui-datepicker');

				wp_enqueue_script ( 'rb-multipicker', plugin_dir_url ( __FILE__ ) . 'roombooking/js/jquery-ui.multidatespicker.js', array (), false, true );
			}
			if($current_screen->base == 'dt_rooms_page_servicesettings' || $current_screen->base == 'dt_rooms_page_ordersettings') {
				wp_enqueue_style ( 'rb-table-pager', plugin_dir_url ( __FILE__ ) . 'roombooking/css/themes/blue/style.css' );
				wp_enqueue_script ( 'rb-table-sorter', plugin_dir_url ( __FILE__ ) . 'roombooking/js/jquery.tablesorter.min.js' );
				wp_enqueue_script ( 'rb-table-pager', plugin_dir_url ( __FILE__ ) . 'roombooking/js/jquery.tablesorter.pager.js' );
				wp_enqueue_script ( 'rb-quick-search', plugin_dir_url ( __FILE__ ) . 'roombooking/js/jquery.quicksearch.js' );
			}

			wp_enqueue_style ( 'rb-custom', plugin_dir_url ( __FILE__ ) . 'roombooking/css/style.css' );

			wp_enqueue_script ( 'rb-admin-js', plugin_dir_url ( __FILE__ ) . 'roombooking/js/room_scripts.js', array('jquery') );
			wp_localize_script( 'rb-admin-js', 'dtThemeAjax', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
		 }

		/**
		 * To load plugin activate
		 */
		public static function dtRoomAddonActivate() {
			if( ! function_exists('veda_option') ){
				wp_die( esc_html__( 'Please make sure "Veda Theme" is activated.', 'veda-room' ) );
			}
		}

		/**
		 * To load plugin deactivate
		 */
		public static function dtRoomAddonDectivate() {
		}
	}
}

if (class_exists ( 'DTRoomAddon' )) {

	register_activation_hook ( __FILE__, array (
			'DTRoomAddon',
			'dtRoomAddonActivate' 
	) );
	register_deactivation_hook ( __FILE__, array (
			'DTRoomAddon',
			'dtRoomAddonDectivate' 
	) );

	$dt_room_plugin = new DTRoomAddon ();
}
?>