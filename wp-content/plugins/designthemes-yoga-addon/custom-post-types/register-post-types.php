<?php
if (!class_exists('DTYogaModuleCustomPostTypes')) {
	class DTYogaModuleCustomPostTypes {

		function __construct() {

			// Add Yoga Menu
			add_action('admin_menu', array( $this, 'dt_yoga_module_menu' ) );

			// Set Current Menu
			add_filter('parent_file', array( $this,'set_current_menu'));

			// Yoga Poses Custom Post Type
			require_once plugin_dir_path ( __FILE__ ) . 'dt-poses-post-type.php';
			if( class_exists('DTYogaPosesPostType') ) {
				new DTYogaPosesPostType();
			}			

			// Yoga Styles Custom Post Type
			require_once plugin_dir_path ( __FILE__ ) . 'dt-styles-post-type.php';
			if( class_exists('DTYogaStylesPostType') ) {
				new DTYogaStylesPostType();
			}

			// Yoga Teachers Custom Post Type
			require_once plugin_dir_path ( __FILE__ ) . 'dt-teachers-post-type.php';
			if( class_exists('DTYogaTeachersPostType') ) {
				new DTYogaTeachersPostType();
			}

			// Yoga Videos Custom Post Type
			require_once plugin_dir_path ( __FILE__ ) . 'dt-videos-post-type.php';
			if( class_exists('DTYogaVideosPostType') ) {
				new DTYogaVideosPostType();
			}
			
			// Yoga Programs Custom Post Type
			require_once plugin_dir_path ( __FILE__ ) . 'dt-programs-post-type.php';
			if( class_exists('DTYogaProgramsPostType') ) {
				new DTYogaProgramsPostType();
			}

			// Add Hook into the 'wp_enqueue_scripts()' action			
			add_action ( 'wp_enqueue_scripts', array ( $this, 'dt_wp_enqueue_scripts' ) );
		}

		function dt_yoga_module_menu() {

			$levels = esc_html__('Student Levels', 'veda-yoga');
			if( function_exists('veda_opts_get') ){
				$levels = veda_opts_get( 'plural-level-name', $levels);
			}			

			add_menu_page( esc_html__('Yoga Module','veda-yoga'), esc_html__('Yoga','veda-yoga'), 'manage_options', 'dt_yoga_module_menu_slug', '', 'dashicons-universal-access', 21 );
			add_submenu_page( 'dt_yoga_module_menu_slug', $levels,  $levels, 'edit_posts', 'edit-tags.php?taxonomy=dt_yoga_student_level','' );			
		}

		function set_current_menu(){

			global $submenu_file, $current_screen, $pagenow;

			if( $pagenow == 'edit-tags.php' && $current_screen->taxonomy == 'dt_yoga_student_level' ) {

				$submenu_file = 'edit-tags.php?taxonomy='.$current_screen->taxonomy;
				$parent_file = 'dt_yoga_module_menu_slug';
				return $parent_file;
			}


			$post_type = $current_screen->post_type;

			if( $post_type == 'dt_yoga_styles' || $post_type == 'dt_yoga_teachers' || $post_type == 'dt_yoga_programs' || $post_type == 'dt_yoga_videos'  || $post_type == 'dt_yoga_poses' ) {

				if( $pagenow == 'post.php' || $pagenow == 'post-new.php' ) {

					$submenu_file = 'edit.php?post_type='.$current_screen->post_type;
				}

				if( $pagenow == 'edit-tags.php' ) {

					$submenu_file = 'edit.php?post_type='.$current_screen->post_type;
				}

				$parent_file = 'dt_yoga_module_menu_slug';

				return $parent_file;
			}
		}

		/**
		 * A function hook that the WordPress core launches at 'wp_enqueue_scripts' points
		 * Works in both front and back end
		 */
		function dt_wp_enqueue_scripts() {
			
			/* Front End CSS & jQuery */
			wp_enqueue_script ( 'dt-yoga-addon', plugins_url ('designthemes-yoga-addon') . '/js/yoga.js', array ('jquery'), false, true );
			wp_enqueue_style ( 'dt-yoga-addon', plugins_url ('designthemes-yoga-addon') . '/css/yoga.css', array (), false, 'all' );			
		}		
	}
}?>