<?php
if (! class_exists ( 'DTProgramPostType' )) {
	class DTProgramPostType {

		/**
		 * A function constructor calls initially
		 */
		function __construct() {

			// Add Hook into the 'init()' action
			add_action ( 'init', array (
				$this,
				'dt_init'
			) );

			// Add Hook into the 'admin_init()' action
			add_action ( 'admin_init', array (
				$this,
				'dt_admin_init'
			) );

			// Add Hook into the 'template_include' filter
			add_filter ( 'template_include', array (
				$this,
				'dt_template_include'
			) );
		}

		/**
		 * A function hook that the WordPress core launches at 'init' points
		 */
		function dt_init() {
			$this->createPostType ();
			add_action ( 'save_post', array (
				$this,
				'save_post_meta' 
			) );
		}

		/**
		 * A function hook that the WordPress core launches at 'admin_init' points
		 */
		function dt_admin_init() {
			
			add_action ( 'add_meta_boxes', array (
				$this,
				'dt_add_program_meta_box' 
			) );
			
			add_filter ( "manage_edit-dt_programs_columns", array (
				$this,
				"dt_programs_edit_columns" 
			) );
			
			add_action ( "manage_posts_custom_column", array (
				$this,
				"dt_programs_columns_display" 
			), 10, 2 );
		}

		/**
		 */
		function createPostType() {
			$postslug	 	= 'dt_programs'; 					$taxslug  = 'program_entries';
			$singular_name  = __('Program', 'veda-program'); 	$plural_name  = __('Programs', 'veda-program');
			$tax_sname 		= __( 'Category','veda-program' );	$tax_pname    = __( 'Categories','veda-program' );

			if( function_exists( 'veda_opts_get' ) ) :
				$postslug 		=	veda_opts_get( 'single-program-slug', 'dt_programs' );
				$taxslug  		=	veda_opts_get( 'program-category-slug', 'program_entries' );
				$singular_name  =	veda_opts_get( 'singular-program-name', __('Program', 'veda-program') );
				$plural_name	=	veda_opts_get( 'plural-program-name', __('Programs', 'veda-program') );
				$tax_sname	  	=	veda_opts_get( 'singular-program-tax-name', __('Category', 'veda-program') );
				$tax_pname		=	veda_opts_get( 'plural-program-tax-name', __('Categories', 'veda-program') );
			endif;
			
			$labels = array (
					'name'				=> 	$plural_name,
					'all_items' 		=> 	__ ( 'All ', 'veda-program' ) . $plural_name,
					'singular_name' 	=> 	$singular_name,
					'add_new' 			=> 	__ ( 'Add New', 'veda-program' ),
					'add_new_item' 		=> 	__ ( 'Add New ', 'veda-program' ) . $singular_name,
					'edit_item' 		=> 	__ ( 'Edit ', 'veda-program' ) . $singular_name,
					'new_item' 			=> 	__ ( 'New ', 'veda-program' ) . $singular_name,
					'view_item' 		=> 	__ ( 'View ', 'veda-program' ) . $singular_name,
					'search_items' 		=>	__ ( 'Search ', 'veda-program' ) . $plural_name,
					'not_found' 		=> 	__ ( 'No ', 'veda-program' ) . $plural_name . __ ( ' found', 'veda-program' ),
					'not_found_in_trash' => __ ( 'No ', 'veda-program' ) . $plural_name . __ ( ' found in Trash', 'veda-program' ),
					'parent_item_colon' => 	__ ( 'Parent ', 'veda-program' ) . $singular_name . ':',
					'menu_name' 		=> 	$plural_name
			);
			
			$args = array (
					'labels' => $labels,
					'hierarchical' => false,
					'description' => __( 'This is custom post type ', 'veda-program' ) . $plural_name,
					'supports' => array (
						'title',
						'editor',
						'excerpt',
						'thumbnail'
					),
					
					'public' => true,
					'show_ui' => true,
					'show_in_menu' => true,
					'menu_position' => 10,
					'menu_icon' => 'dashicons-portfolio',
					
					'show_in_nav_menus' => true,
					'publicly_queryable' => true,
					'exclude_from_search' => false,
					'has_archive' => true,
					'query_var' => true,
					'can_export' => true,
					'rewrite' => array( 'slug' => $postslug ),
					'capability_type' => 'post'
			);

			register_post_type ( 'dt_programs', $args );

			$labels = array(
				'name'              => 	$tax_pname,
				'singular_name'     => 	$tax_sname,
				'search_items'      => 	__( 'Search ', 'veda-program' ) . $tax_pname,
				'all_items'         => 	__( 'All ', 'veda-program' ) . $tax_pname,
				'parent_item'       => 	__( 'Parent ', 'veda-program' ) . $tax_sname,
				'parent_item_colon' => 	__( 'Parent ', 'veda-program' ) . $tax_sname . ':',
				'edit_item'         => 	__( 'Edit ', 'veda-program' ) . $tax_sname,
				'update_item'       => 	__( 'Update ', 'veda-program' ) . $tax_sname,
				'add_new_item'      => 	__( 'Add New ', 'veda-program' ) . $tax_sname,
				'new_item_name'     => 	__( 'New ', 'veda-program') . $tax_sname . __(' Name', 'veda-program' ),
				'menu_name'         => 	$tax_pname
			);

			register_taxonomy ( 'program_entries', array (
				'dt_programs' 
			), array (
				'hierarchical' 		=> 	true,
				'labels' 			=> 	$labels,
				'show_ui'           => 	true,
				'show_admin_column' => 	true,
				'rewrite' 			=> 	array( 'slug' => $taxslug ),
				'query_var' 		=> 	true 
			) );
		}

		/**
		 */
		function dt_add_program_meta_box() {
			add_meta_box ( 'dt-program-default-metabox', __ ( 'Default Options', 'veda-program' ), array (
				$this,
				'dt_default_metabox' 
			), 'dt_programs', 'normal', 'default' );
		}
		
		/**
		 */
		function dt_default_metabox() {
			include_once plugin_dir_path ( __FILE__ ) . 'metaboxes/dt_program_default_metabox.php';
		}
		
		/**
		 *
		 * @param unknown $columns        	
		 * @return multitype:
		 */
		function dt_programs_edit_columns($columns) {
			
			$newcolumns = array (
				"cb" => "<input type=\"checkbox\" />",
				"dt_program_thumb" => __("Image", "veda-program"),
				"title" => __("Title", "veda-program"),
				"author" => __("Author", "veda-program")
			);
			$columns = array_merge ( $newcolumns, $columns );
			return $columns;
		}
		
		/**
		 *
		 * @param unknown $columns
		 * @param unknown $id
		 */
		function dt_programs_columns_display($columns, $id) {
			global $post;
			
			switch ($columns) {

				case "dt_program_thumb" :
				    $image = wp_get_attachment_image(get_post_thumbnail_id($id), array(75,75));
					if(!empty($image)):
					  	echo $image;
					endif;
				break;
			}
		}

		/**
		 */
		function save_post_meta($post_id) {

			if( key_exists ( '_inline_edit',$_POST )) :
				if ( wp_verify_nonce($_POST['_inline_edit'], 'inlineeditnonce')) return;
			endif;
			
			if( key_exists( 'dt_theme_program_meta_nonce',$_POST ) ) :
				if ( ! wp_verify_nonce( $_POST['dt_theme_program_meta_nonce'], 'dt_theme_program_nonce') ) return;
			endif;
		 
			if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
			
			if (!current_user_can('edit_post', $post_id)) :
				return;
			endif;
			
			if ( (key_exists('post_type', $_POST)) && ('dt_programs' == $_POST['post_type']) ) :

				$layout = isset($_POST['layout']) ? $_POST['layout'] : '';
				if($layout) :

					$settings = array ();
					$settings['layout'] = $layout;

					$settings['sub-title-bg'] = isset ( $_POST['sub-title-bg'] ) ? $_POST['sub-title-bg'] : "";
					$settings['sub-title-bg-repeat'] = isset ( $_POST['sub-title-bg-repeat'] ) ? $_POST['sub-title-bg-repeat'] : "";
					$settings['sub-title-opacity'] = isset ( $_POST['sub-title-opacity'] ) ? $_POST['sub-title-opacity'] : "";
					$settings['sub-title-bg-position'] = isset ( $_POST['sub-title-bg-position'] ) ? $_POST['sub-title-bg-position'] : "";
					$settings['sub-title-bg-color'] = isset ( $_POST['sub-title-bg-color'] ) ? $_POST['sub-title-bg-color'] : "";

					if($layout == 'with-both-sidebar') {
						$settings['show-standard-sidebar-left'] = isset( $_POST['show-standard-sidebar-left'] ) ? $_POST['show-standard-sidebar-left'] : '';
						$settings['show-standard-sidebar-right'] = isset( $_POST['show-standard-sidebar-right'] ) ? $_POST['show-standard-sidebar-right'] : '';
						$settings['widget-area-left'] = isset( $_POST['dttheme']['widgetareas-left'] ) ? array_unique(array_filter($_POST['dttheme']['widgetareas-left'])) : '';
						$settings['widget-area-right'] = isset( $_POST['dttheme']['widgetareas-right'] ) ? array_unique(array_filter($_POST['dttheme']['widgetareas-right'])) : '';
					} elseif($layout == 'with-left-sidebar') {
						$settings['show-standard-sidebar-left'] = isset( $_POST['show-standard-sidebar-left'] ) ? $_POST['show-standard-sidebar-left'] : '';
						$settings['widget-area-left'] =  isset($_POST['dttheme']['widgetareas-left']) ? array_unique(array_filter($_POST['dttheme']['widgetareas-left'])) : '';
					} elseif($layout == 'with-right-sidebar') {
						$settings['show-standard-sidebar-right'] = isset( $_POST['show-standard-sidebar-right'] ) ? $_POST['show-standard-sidebar-right'] : '';
						$settings['widget-area-right'] =  isset($_POST['dttheme']['widgetareas-right']) ? array_unique(array_filter($_POST['dttheme']['widgetareas-right'])) : '';
					}

					$settings ['post-layout'] = isset ( $_POST ['post-layout'] ) ? $_POST ['post-layout'] : "";
					$settings ['meta_title'] = isset ( $_POST['dttheme-meta-title'] ) ? $_POST['dttheme-meta-title'] : "";
					$settings ['meta_value'] = isset ( $_POST['dttheme-meta-value'] ) ? $_POST['dttheme-meta-value'] : "";
	
					$settings ['levels'] 	= isset ( $_POST ['_levels'] ) ? stripslashes ( $_POST ['_levels'] ) : "";
					$settings ['timing'] 	= isset ( $_POST ['_timing'] ) ? stripslashes ( $_POST ['_timing'] ) : "";
					$settings ['duration'] 	= isset ( $_POST ['_duration'] ) ? stripslashes ( $_POST ['_duration'] ) : "";
					$settings ['pre_price'] = isset ( $_POST ['_pre_price'] ) ? stripslashes ( $_POST ['_pre_price'] ) : "";
					$settings ['price'] 	= isset ( $_POST ['_price'] ) ? stripslashes ( $_POST ['_price'] ) : "";
					$settings ['post_price']= isset ( $_POST ['_post_price'] ) ? stripslashes ( $_POST ['_post_price'] ) : "";
					$settings ['subtitle']	= isset ( $_POST ['_subtitle'] ) ? stripslashes ( $_POST ['_subtitle'] ) : "";
	
					update_post_meta ( $post_id, "_custom_settings", array_filter ( $settings ) );
	
					// for default category
					$terms = wp_get_object_terms ( $post_id, 'program_entries' );
					if (empty ( $terms )) :
						wp_set_object_terms ( $post_id, 'Uncategorized', 'program_entries', true );
					endif;
				endif;
			endif;
		}

		/**
		 * To load program pages in front end
		 *
		 * @param string $template        	
		 * @return string
		 */
		function dt_template_include($template) {
			if (is_singular( 'dt_programs' )) {
				if (! file_exists ( get_stylesheet_directory () . '/single-dt_programs.php' )) {
					$template = plugin_dir_path ( __FILE__ ) . 'templates/single-dt_programs.php';
				}
			} elseif (is_tax ( 'program_entries' )) {
				if (! file_exists ( get_stylesheet_directory () . '/taxonomy-program_entries.php' )) {
					$template = plugin_dir_path ( __FILE__ ) . 'templates/taxonomy-program_entries.php';
				}
			}
			return $template;
		}
	}
}
?>