<?php if( !class_exists('DTVCModelModule') ) {
	class DTVCModelModule {

		function __construct() {

			add_action ( 'after_setup_theme', array ( $this, 'dt_map_models_shortcodes' ) , 1000 );

			add_action( 'admin_enqueue_scripts', array( $this, 'dt_model_vc_admin_scripts')  );
		}

		function dt_map_models_shortcodes() {

			$path = plugin_dir_path ( __FILE__ ).'modules/';
			$modules = array(
				'dt_sc_model_item' => $path.'single-model.php',
				'dt_sc_models_with_filter' => $path.'models-with-filter.php',
				'dt_sc_recent_models' => $path.'recent-models.php',
				'dt_sc_related_models' => $path.'related-models.php',

				'dt_sc_current_model_meta' => $path.'current-model-meta.php',
				'dt_sc_current_model_slider' => $path.'current-model-slider.php',
			);

			// Apply filters so you can easily modify the modules 100%
			$modules = apply_filters( 'vcex_builder_modules', $modules );

			if( !empty( $modules ) ){
				foreach ( $modules as $key => $val ) {
					require_once( $val );
				}
			}
		}

		function dt_model_vc_admin_scripts( $hook ) {

			if($hook == "post.php" || $hook == "post-new.php") {
				wp_enqueue_style( 'dt-model-vc-admin', plugins_url ('designthemes-model-addon') . '/vc/style.css', array (), false, 'all' );
			}			
		}		
	}
}?>