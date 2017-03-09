<?php if( !class_exists('DTVCRestaurantModule') ) {
	class DTVCRestaurantModule {

		function __construct() {

			add_action ( 'after_setup_theme', array ( $this, 'dt_map_restaurant_shortcodes' ) , 1000 );

			add_action( 'admin_enqueue_scripts', array( $this, 'dt_restaurant_vc_admin_scripts')  );
		}

		function dt_map_restaurant_shortcodes() {

			$path = plugin_dir_path ( __FILE__ ).'modules/';
			$modules = array(
				'dt_sc_chefs' => $path.'dt_sc_chefs.php',
				'dt_sc_menu_list' => $path.'dt_sc_menu_list.php',
				'dt_sc_menu_list2' => $path.'dt_sc_menu_list2.php',
				'dt_sc_menu_items' => $path.'menuitems.php',
				'dt_sc_res_event' => $path.'reservation_event.php',

				'dt_sc_chef_image' => $path.'single_chef_image.php',
				'dt_sc_chef_info' => $path.'single_chef_info.php'
			);

			// Apply filters so you can easily modify the modules 100%
			$modules = apply_filters( 'vcex_builder_modules', $modules );

			if( !empty( $modules ) ){
				foreach ( $modules as $key => $val ) {
					require_once( $val );
				}
			}
		}

		function dt_restaurant_vc_admin_scripts( $hook ) {

			if($hook == "post.php" || $hook == "post-new.php") {
				wp_enqueue_style( 'dt-restaurant-vc-admin', plugins_url ('designthemes-restaurant-addon') . '/vc/style.css', array (), false, 'all' );
			}			
		}		
	}
}?>