<?php if( !class_exists('DTVCProgramModule') ) {
	class DTVCProgramModule {

		function __construct() {

			add_action ( 'after_setup_theme', array ( $this, 'dt_map_program_shortcodes' ) , 1000 );

			add_action( 'admin_enqueue_scripts', array( $this, 'dt_program_vc_admin_scripts')  );
		}

		function dt_map_program_shortcodes() {

			$path = plugin_dir_path ( __FILE__ ).'modules/';
			$modules = array(

				'dt_sc_trainers' => $path.'trainers.php',
				'dt_sc_program_list' => $path.'filterable_program_list.php',
				'dt_sc_program_list2' => $path.'program_list.php',
				'dt_sc_workout' => $path.'workout.php',
				'dt_sc_process_step' => $path.'process_step.php',
				'dt_sc_fitness_diet' => $path.'diet.php',
				'dt_sc_programs_nav' => $path.'programs_nav.php',
				'dt_sc_program_info' => $path.'single_program_info.php',
				'dt_sc_bmi_calc' => $path.'bmi_calc.php',
			);

			// Apply filters so you can easily modify the modules 100%
			$modules = apply_filters( 'vcex_builder_modules', $modules );

			if( !empty( $modules ) ){
				foreach ( $modules as $key => $val ) {
					require_once( $val );
				}
			}
		}

		function dt_program_vc_admin_scripts( $hook ) {

			if($hook == "post.php" || $hook == "post-new.php") {
				wp_enqueue_style( 'dt-program-vc-admin', plugins_url ('designthemes-program-addon') . '/vc/style.css', array (), false, 'all' );
			}			
		}

	}
}