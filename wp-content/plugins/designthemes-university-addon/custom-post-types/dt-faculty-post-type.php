<?php
if( !class_exists('DTFacultyPostType') ) {
	class DTFacultyPostType {

		function __construct() {

			// Add Hook into the 'init()' action			
			add_action ( 'init', array ( $this, 'dt_init' ) );

			// Add Hook into the 'admin_init()' action
			add_action ( 'admin_init', array ( $this, 'dt_admin_init' ) );

			// Add Hook into the 'template_include' filter
			add_filter ( 'template_include', array ( $this, 'dt_template_include' ) );
		}

		/**
		 * A function hook that the WordPress core launches at 'init' points
		 * Works in both front and back end
		 */
		function dt_init() {
			
			$this->createPostType();

			if( is_admin() ){
				add_action ( 'save_post', array (
					$this,
					'save_post_meta' 
				) );
			}
		}

		/**
		 * A function hook that the WordPress core launches at 'admin_init' points
		 * Works in back end
		 */
		function dt_admin_init() {

			add_action ( 'add_meta_boxes', array ( $this, 'dt_add_faculty_meta_box' ) );

			add_filter ( "manage_edit-dt_faculties_columns", array (
				$this,
				"dt_faculties_edit_columns" 
			) );
			
			add_action ( "manage_posts_custom_column", array (
				$this,
				"dt_faculties_columns_display" 
			), 10, 2 );				
		}

		function createPostType() {

			$postslug 		= 'dt_faculties';
			$singular_name  = __('Faculty', 'veda-university');
			$plural_name    = __('Faculties', 'veda-university');

			if( function_exists( 'veda_opts_get' ) ) :
				$postslug 		=	veda_opts_get( 'single-ufaculty-slug', 'dt_faculties' );
				$singular_name  =	veda_opts_get( 'singular-ufaculty-name', __('Faculty', 'veda-university') );
				$plural_name	=	veda_opts_get( 'plural-ufaculty-name', __('Faculties', 'veda-university') );
			endif;

			$labels = array (
				'name'				  => 	$plural_name,
				'all_items' 		  => 	$plural_name,
				'singular_name' 	  => 	$singular_name,
				'add_new' 			  => 	__ ( 'Add New', 'veda-university' ),
				'add_new_item' 		  => 	__ ( 'Add New ', 'veda-university' ) . $singular_name,
				'edit_item' 		  => 	__ ( 'Edit ', 'veda-university' ) . $singular_name,
				'new_item' 			  => 	__ ( 'New ', 'veda-university' ) . $singular_name,
				'view_item' 		  => 	__ ( 'View ', 'veda-university' ) . $singular_name,
				'search_items' 		  =>	__ ( 'Search ', 'veda-university' ) . $plural_name,
				'not_found' 		  => 	__ ( 'No ', 'veda-university' ) . $plural_name . __ ( ' found', 'veda-university' ),
				'not_found_in_trash'  => 	__ ( 'No ', 'veda-university' ) . $plural_name . __ ( ' found in Trash', 'veda-university' ),
				'parent_item_colon'   => 	__ ( 'Parent ', 'veda-university' ) . $singular_name . ':',
				'menu_name' 		  => 	$plural_name
			);
			
			$args = array (
				'labels' 			  => $labels,
				'hierarchical' 		  => false,
				'supports' 			  => array ( 'title', 'editor', 'thumbnail'),
				'public' 			  => true,
				'show_ui' 			  => true,
				'show_in_menu' 		  => 'university_menu_slug', // refer register-post-types.php,
				'show_in_nav_menus'   => true,
				'publicly_queryable'  => true,
				'exclude_from_search' => false,
				'has_archive' 		  => true,
				'query_var' 	  	  => true,
				'can_export' 	  	  => true,
				'rewrite' 		  	  => array( 'slug' => $postslug ),
				'capability_type' 	  => 'post'
			);
			
			register_post_type ( 'dt_faculties', $args );			
		}

		function dt_add_faculty_meta_box() {

			add_meta_box ( 'dt-faculty-default-metabox', __ ( 'Default Options', 'veda-university' ), array (
				$this,
				'dt_default_metabox' 
			), 'dt_faculties', 'normal', 'default' );
		}

		function dt_default_metabox() {
			include_once plugin_dir_path ( __FILE__ ) . 'metaboxes/dt_faculty_default_metabox.php';
		}

		function dt_faculties_edit_columns( $columns ) {

			$newcolumns = array (
				"cb" 					=> "<input type=\"checkbox\" />",
				"dt_faculty_thumb" 		=> __("Image", "veda-university"),
			);

			$columns = array_merge ( $newcolumns, $columns );
			return $columns;
		}

		function dt_faculties_columns_display( $columns, $id ) {

			global $post;

			switch ($columns) {

				case 'dt_faculty_thumb':
					if( has_post_thumbnail( $post->ID ) ) {
						echo get_the_post_thumbnail( $post->ID, array(70,70) );
					}
				break;
			}
		}

		function save_post_meta( $post_id ) {

			if( key_exists ( '_inline_edit',$_POST )) :
				if ( wp_verify_nonce($_POST['_inline_edit'], 'inlineeditnonce')) return;
			endif;
			
			if( key_exists( 'dt_theme_faculty_meta_nonce',$_POST ) ) :
				if ( ! wp_verify_nonce( $_POST['dt_theme_faculty_meta_nonce'], 'dt_theme_faculty_nonce') ) return;
			endif;
		 
			if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
			
			if (!current_user_can('edit_post', $post_id) ) return;

			if ( (key_exists('post_type', $_POST)) && ('dt_faculties' == $_POST['post_type']) ) :

				$layout = isset($_POST['layout']) ? $_POST['layout'] : '';

				if($layout) {
					
					$settings = array ();
					$settings['layout'] = $layout;
					
					if($layout == 'with-both-sidebar') {
						$settings['show-standard-sidebar-left'] = isset( $_POST['show-standard-sidebar-left'] ) ? $_POST['show-standard-sidebar-left'] : '';
						$settings['show-standard-sidebar-right'] = isset( $_POST['show-standard-sidebar-right'] ) ? $_POST['show-standard-sidebar-right'] : '';
						$settings['widget-area-left'] = isset( $_POST['dttheme']['widgetareas-left'] ) ? array_unique(array_filter($_POST['dttheme']['widgetareas-left'])) : '';
						$settings['widget-area-right'] = isset( $_POST['dttheme']['widgetareas-right'] ) ? array_unique(array_filter($_POST['dttheme']['widgetareas-right'])) : '';
					} elseif($layout == 'with-left-sidebar') {
						$settings['show-standard-sidebar-left'] = isset( $_POST['show-standard-sidebar-left'] ) ? $_POST['show-standard-sidebar-left'] : '';
						$settings['widget-area-left'] =  isset($_POST['dttheme']['widgetareas-left']) ? array_unique(array_filter($_POST['dttheme']['widgetareas-left'])) : '';
					} elseif($layout == 'with-right-sidebar') {
						$settings['show-standard-sidebar-right'] = $_POST['show-standard-sidebar-right'];
						$settings['widget-area-right'] =  isset($_POST['dttheme']['widgetareas-right']) ? array_unique(array_filter($_POST['dttheme']['widgetareas-right'])) : '';
					}

					$settings ['role'] = isset ( $_POST ['role'] ) ? stripslashes ( $_POST ['role'] ) : "";
					$settings ['social'] = isset ( $_POST ['social'] ) ? stripslashes ( $_POST ['social'] ) : "";
					$settings ['phone'] = isset ( $_POST ['phone'] ) ? stripslashes ( $_POST ['phone'] ) : "";

					$settings ['meta_show'] = isset ( $_POST['dttheme-meta-show'] ) ? $_POST['dttheme-meta-show'] : "";
					$settings ['meta_title'] = isset ( $_POST['dttheme-meta-title'] ) ? $_POST['dttheme-meta-title'] : "";
					$settings ['meta_value'] = isset ( $_POST['dttheme-meta-value'] ) ? $_POST['dttheme-meta-value'] : "";

					update_post_meta ( $post_id, "_custom_settings", array_filter ( $settings ) );	
				}
			endif;
		}

		/**
		 * To load attorney pages in front end
		 *
		 * @param string $template        	
		 * @return string
		 */
		function dt_template_include($template) {
			
			if (is_singular( 'dt_faculties' )) {
				if (! file_exists ( get_stylesheet_directory () . '/single-dt_faculties.php' )) {
					$template = plugin_dir_path ( __FILE__ ) . 'templates/single-dt_faculties.php';
				}
			} elseif (is_tax ( 'departments' )) {
				if (! file_exists ( get_stylesheet_directory () . '/taxonomy-university-departments.php' )) {
					$template = plugin_dir_path ( __FILE__ ) . 'templates/taxonomy-university-departments.php';
				}
			}
			
			return $template;
		}
	}
}?>