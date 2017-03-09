<?php
if (! class_exists ( 'DTChefPostType' )) {
	class DTChefPostType {

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
					'dt_add_chef_meta_box'
			) );
			
			add_filter ( "manage_edit-dt_chefs_columns", array (
					$this,
					"dt_chefs_edit_columns" 
			) );
			
			add_action ( "manage_posts_custom_column", array (
					$this,
					"dt_chefs_columns_display" 
			), 10, 2 );
		}

		/**
		 * A function to register post type
		 */
		function createPostType() {
			$postslug	 	= 'dt_chefs';
			$singular_name  = __('Chef', 'veda-restaurant'); 	$plural_name  = __('Chefs', 'veda-restaurant');

			if( function_exists( 'veda_opts_get' ) ) :
				$postslug 		=	veda_opts_get( 'single-chef-slug', 'dt_chefs' );
				$singular_name  =	veda_opts_get( 'singular-chef-name', __('Chef', 'veda-restaurant') );
				$plural_name	=	veda_opts_get( 'plural-chef-name', __('Chefs', 'veda-restaurant') );
			endif;

			$labels = array (
					'name'				=> 	$plural_name,
					'all_items' 		=> 	__ ( 'All ', 'veda-restaurant' ) . $plural_name,
					'singular_name' 	=> 	$singular_name,
					'add_new' 			=> 	__ ( 'Add New', 'veda-restaurant' ),
					'add_new_item' 		=> 	__ ( 'Add New ', 'veda-restaurant' ) . $singular_name,
					'edit_item' 		=> 	__ ( 'Edit ', 'veda-restaurant' ) . $singular_name,
					'new_item' 			=> 	__ ( 'New ', 'veda-restaurant' ) . $singular_name,
					'view_item' 		=> 	__ ( 'View ', 'veda-restaurant' ) . $singular_name,
					'search_items' 		=>	__ ( 'Search ', 'veda-restaurant' ) . $plural_name,
					'not_found' 		=> 	__ ( 'No ', 'veda-restaurant' ) . $plural_name . __ ( ' found', 'veda-restaurant' ),
					'not_found_in_trash' => __ ( 'No ', 'veda-restaurant' ) . $plural_name . __ ( ' found in Trash', 'veda-restaurant' ),
					'parent_item_colon' => 	__ ( 'Parent ', 'veda-restaurant' ) . $singular_name . ':',
					'menu_name' 		=> 	$plural_name
			);
			
			$args = array (
					'labels' => $labels,
					'hierarchical' => false,
					'description' => __( 'This is custom post type ', 'veda-restaurant' ) . $plural_name,
					'supports' => array (
							'title',
							'editor',
							'thumbnail'
					),
					
					'public' => true,
					'show_ui' => true,
					'show_in_menu' => true,
					'menu_position' => 10,
					'menu_icon' => 'dashicons-businessman',
					
					'show_in_nav_menus' => true,
					'publicly_queryable' => true,
					'exclude_from_search' => false,
					'has_archive' => true,
					'query_var' => true,
					'can_export' => true,
					'rewrite' => array( 'slug' => $postslug ),
					'capability_type' => 'post'
			);

			register_post_type ( 'dt_chefs', $args );
		}

		/**
		 * A function to add metabox
		 */
		function dt_add_chef_meta_box() {
			add_meta_box ( 'dt-chef-default-metabox', __ ( 'Default Options', 'veda-restaurant' ), array (
					$this,
					'dt_default_metabox' 
			), 'dt_chefs', 'normal', 'default' );
		}
		
		/**
		 */
		function dt_default_metabox() {
			include_once plugin_dir_path ( __FILE__ ) . 'metaboxes/dt_chef_default_metabox.php';
		}
		
		/**
		 *
		 * @param unknown $columns        	
		 * @return multitype:
		 */
		function dt_chefs_edit_columns($columns) {

			$newcolumns = array (
				"cb" => "<input type=\"checkbox\" />",
				"dt_chef_thumb" => __("Image", "veda-restaurant"),
				"title" => __("Title", "veda-restaurant"),
				"author" => __("Author", "veda-restaurant")
			);
			$columns = array_merge ( $newcolumns, $columns );
			return $columns;
		}

		/**
		 *
		 * @param unknown $columns
		 * @param unknown $id
		 */
		function dt_chefs_columns_display($columns, $id) {
			global $post;

			switch ($columns) {

				case "dt_chef_thumb" :
				    $image = wp_get_attachment_image(get_post_thumbnail_id($id), array(75,75));
					if(!empty($image)):
					  	echo $image;
					endif;
				break;
			}
		}

		/**
		 * A function to save post
		 */
		function save_post_meta($post_id) {

			if( key_exists ( '_inline_edit',$_POST )) :
				if ( wp_verify_nonce($_POST['_inline_edit'], 'inlineeditnonce')) return;
			endif;
			
			if( key_exists( 'dt_theme_chef_meta_nonce',$_POST ) ) :
				if ( ! wp_verify_nonce( $_POST['dt_theme_chef_meta_nonce'], 'dt_theme_chef_nonce') ) return;
			endif;
		 
			if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

			if (!current_user_can('edit_post', $post_id)) :
				return;
			endif;

			if ( (key_exists('post_type', $_POST)) && ('dt_chefs' == $_POST['post_type']) ) :
			
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
						$settings['disable-standard-sidebar-left'] = isset( $_POST['disable-standard-sidebar-left'] ) ? $_POST['disable-standard-sidebar-left'] : '';
						$settings['disable-standard-sidebar-right'] = isset( $_POST['disable-standard-sidebar-right'] ) ? $_POST['disable-standard-sidebar-right'] : '';
						$settings['widget-area-left'] = isset( $_POST['dttheme']['widgetareas-left'] ) ? array_unique(array_filter($_POST['dttheme']['widgetareas-left'])) : '';
						$settings['widget-area-right'] = isset( $_POST['dttheme']['widgetareas-right'] ) ? array_unique(array_filter($_POST['dttheme']['widgetareas-right'])) : '';
					} elseif($layout == 'with-left-sidebar') {
						$settings['disable-standard-sidebar-left'] = isset( $_POST['disable-standard-sidebar-left'] ) ? $_POST['disable-standard-sidebar-left'] : '';
						$settings['widget-area-left'] =  isset($_POST['dttheme']['widgetareas-left']) ? array_unique(array_filter($_POST['dttheme']['widgetareas-left'])) : '';
					} elseif($layout == 'with-right-sidebar') {
						$settings['disable-standard-sidebar-right'] = $_POST['disable-standard-sidebar-right'];
						$settings['widget-area-right'] =  isset($_POST['dttheme']['widgetareas-right']) ? array_unique(array_filter($_POST['dttheme']['widgetareas-right'])) : '';
					}

					$settings ['meta_title'] = isset ( $_POST['dttheme-meta-title'] ) ? $_POST['dttheme-meta-title'] : "";
					$settings ['meta_value'] = isset ( $_POST['dttheme-meta-value'] ) ? $_POST['dttheme-meta-value'] : "";

					$settings ['role'] 			= isset ( $_POST ['_role'] ) ? stripslashes ( $_POST ['_role'] ) : "";
					$settings ['chef_special']  = isset ( $_POST ['dttheme']['menu']['cats'] ) ? $_POST['dttheme']['menu']['cats'] : "";
					$settings ['chef_likes'] 	= isset ( $_POST ['dttheme']['menu']['items'] ) ? $_POST['dttheme']['menu']['items'] : "";
					$settings ['work']			= isset ( $_POST ['_work'] ) ? stripslashes ( $_POST ['_work'] ) : "";
					$settings ['social']	 	= isset ( $_POST ['_social'] ) ? stripslashes ( $_POST ['_social'] ) : "";

					update_post_meta ( $post_id, "_custom_settings", array_filter ( $settings ) );
				endif;					
			endif;				
		}
		
		/**
		 * To load chef pages in front end
		 *
		 * @param string $template        	
		 * @return string
		 */
		function dt_template_include($template) {
			if (is_singular( 'dt_chefs' )) {
				if (! file_exists ( get_stylesheet_directory () . '/single-dt_chefs.php' )) {
					$template = plugin_dir_path ( __FILE__ ) . 'templates/single-dt_chefs.php';
				}
			}
			return $template;
		}
	}
}
?>