<?php
if( !class_exists('DTUniversityModuleCustomPostTypes') ) {
	
	class DTUniversityModuleCustomPostTypes {

		function __construct() {

			// Add University Menu
			add_action('admin_menu', array( $this, 'dt_university_module_menu' ));

			// Set Current Menu
			add_filter('parent_file', array( $this,'set_current_menu'));

			// Faculty custom post type
			require_once plugin_dir_path ( __FILE__ ) . 'dt-faculty-post-type.php';
			if( class_exists('DTFacultyPostType') ) {
				new DTFacultyPostType();
			}

			// Courses custom post type
			require_once plugin_dir_path ( __FILE__ ) . 'dt-course-post-type.php';
			if( class_exists('DTCoursePostType') ) {
				new DTCoursePostType();
			}

			// Department Taxonomy
			require_once plugin_dir_path ( __FILE__ ) . 'dt-department-taxonomy.php';
			if( class_exists('DTDepartmentTaxonomy') ) {
				new DTDepartmentTaxonomy();
			}

			// Add Hook into the 'wp_enqueue_scripts()' action			
			add_action ( 'wp_enqueue_scripts', array ( $this, 'dt_wp_enqueue_scripts' ) );
		}

		function dt_university_module_menu() {

			add_menu_page( esc_html__('University','veda-university'), esc_html__('University','veda-university'), 'edit_posts', 'university_menu_slug', '', 'dashicons-welcome-learn-more', 25 );

			$tax_pname = esc_html__('Departments','veda-university');
			if( function_exists( 'veda_opts_get' ) ) :
				$tax_pname 	=	veda_opts_get( 'plural-udepartment-name', esc_html__('Departments', 'veda-university') );
			endif;
			add_submenu_page( 'university_menu_slug', $tax_pname,  $tax_pname, 'edit_posts', 'edit-tags.php?taxonomy=departments&post_type=dt_courses','' );
		}

		function set_current_menu() {

			global $submenu_file, $current_screen, $pagenow;

			if( ( $current_screen->post_type == 'dt_courses' || $current_screen->post_type == 'dt_faculties' ) ) {

				if( $pagenow == 'post.php' || $pagenow == 'post-new.php' ) {
					$submenu_file = 'edit.php?post_type='.$current_screen->post_type;
				}

				if( $pagenow == 'edit-tags.php' ) {
					$submenu_file = 'edit-tags.php?taxonomy=departments&post_type='.$current_screen->post_type;
				}

				$parent_file  = 'university_menu_slug';
				
				return $parent_file;
			}			
		}

		/**
		 * A function hook that the WordPress core launches at 'wp_enqueue_scripts' points
		 * Works in both front and back end
		 */
		function dt_wp_enqueue_scripts() {
			
			/* Front End CSS & jQuery */
			wp_enqueue_script ( 'dt-university-addon', plugins_url ('designthemes-university-addon') . '/js/university.js', array ('jquery'), false, true );
			wp_enqueue_style ( 'dt-university-addon', plugins_url ('designthemes-university-addon') . '/css/university.css', array (), false, 'all' );
		}
	}
}?>