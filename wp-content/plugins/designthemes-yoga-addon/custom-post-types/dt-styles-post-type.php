<?php
if( !class_exists('DTYogaStylesPostType') ) {

	class DTYogaStylesPostType {

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

			add_action ( 'add_meta_boxes', array ( $this, 'dt_add_yoga_style_meta_box' ) );
		}

		function createPostType() {

			$postslug 		= 'dt_styles';
			$singular_name  = __('Style', 'veda-yoga');
			$plural_name    = __('Styles', 'veda-yoga');

			if( function_exists( 'veda_opts_get' ) ) :
				$postslug 		=	veda_opts_get( 'single-style-slug', 'dt_styles' );
				$singular_name  =	veda_opts_get( 'singular-style-name', __('Style', 'veda-yoga') );
				$plural_name	=	veda_opts_get( 'plural-style-name', __('Styles', 'veda-yoga') );
			endif;

			$labels = array (
				'name'				  => 	$plural_name,
				'all_items' 		  => 	$plural_name,
				'singular_name' 	  => 	$singular_name,
				'add_new' 			  => 	__ ( 'Add New', 'veda-yoga' ),
				'add_new_item' 		  => 	__ ( 'Add New ', 'veda-yoga' ) . $singular_name,
				'edit_item' 		  => 	__ ( 'Edit ', 'veda-yoga' ) . $singular_name,
				'new_item' 			  => 	__ ( 'New ', 'veda-yoga' ) . $singular_name,
				'view_item' 		  => 	__ ( 'View ', 'veda-yoga' ) . $singular_name,
				'search_items' 		  =>	__ ( 'Search ', 'veda-yoga' ) . $plural_name,
				'not_found' 		  => 	__ ( 'No ', 'veda-yoga' ) . $plural_name . __ ( ' found', 'veda-yoga' ),
				'not_found_in_trash'  => 	__ ( 'No ', 'veda-yoga' ) . $plural_name . __ ( ' found in Trash', 'veda-yoga' ),
				'parent_item_colon'   => 	__ ( 'Parent ', 'veda-yoga' ) . $singular_name . ':',
				'menu_name' 		  => 	$plural_name
			);

			$args = array (
				'labels' 			  => $labels,
				'hierarchical' 		  => false,
				'supports' 			  => array ( 'title', 'editor', 'thumbnail'),
				'public' 			  => true,
				'show_ui' 			  => true,
				'show_in_menu' 		  => 'dt_yoga_module_menu_slug', // refer register-post-types.php,
				'show_in_nav_menus'   => true,
				'publicly_queryable'  => true,
				'exclude_from_search' => false,
				'has_archive' 		  => true,
				'query_var' 	  	  => true,
				'can_export' 	  	  => true,
				'rewrite' 		  	  => array( 'slug' => $postslug ),
				'capability_type' 	  => 'post'
			);

			register_post_type ( 'dt_yoga_styles', $args );
		}

		function dt_add_yoga_style_meta_box() {

			add_meta_box ( 'dt-yoga-style-metabox', __ ( 'Default Options', 'veda-yoga' ), array (
				$this,
				'dt_default_metabox' 
			), 'dt_yoga_styles', 'normal', 'default' );			
		}

		function dt_default_metabox() {
			include_once plugin_dir_path ( __FILE__ ) . 'metaboxes/dt_yoga_styles_metabox.php';
		}

		function save_post_meta( $post_id ) {

			if( key_exists ( '_inline_edit',$_POST )) :
				if ( wp_verify_nonce($_POST['_inline_edit'], 'inlineeditnonce')) return;
			endif;

			if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

			if (!current_user_can('edit_post', $post_id) ) return;

			if( key_exists( 'dt_theme_yoga_style_meta_nonce',$_POST ) ) :
				if ( ! wp_verify_nonce( $_POST['dt_theme_yoga_style_meta_nonce'], 'dt_theme_yoga_style_nonce') ) return;
			endif;

			if ( (key_exists('post_type', $_POST)) && ('dt_yoga_styles' == $_POST['post_type']) ) :

				$layout = isset($_POST['layout']) ? $_POST['layout'] : '';
				if($layout) {
					$settings = array();
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
			
			if (is_singular( 'dt_yoga_styles' )) {
				if (! file_exists ( get_stylesheet_directory () . '/single-dt_yoga_styles.php' )) {
					$template = plugin_dir_path ( __FILE__ ) . 'templates/single-dt_yoga_styles.php';
				}
			}
			
			return $template;
		}
	}
}?>