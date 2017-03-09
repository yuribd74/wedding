<?php
if( !class_exists('DTModelPostType') ) {
	class DTModelPostType {
		
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
			
			wp_enqueue_script ( 'jquery-ui-sortable' );
			
			add_action ( 'add_meta_boxes', array ( $this, 
				'dt_add_model_meta_box' 
			) );
			
			add_filter ( "manage_edit-dt_models_columns", array (
				$this,
				"dt_models_edit_columns" 
			) );
			
			add_action ( "manage_posts_custom_column", array (
				$this,
				"dt_models_columns_display" 
			), 10, 2 );
		}
		
		function createPostType() {
			
			$portslug 		= 'dt_models';
			$taxslug  		= 'model_entries';
			$singular_name  = __('Model', 'veda-model');
			$plural_name    = __('Models', 'veda-model');
			$tax_sname 		= __('Category','veda-model');
			$tax_pname      = __('Categories','veda-model');
			
			if( function_exists( 'veda_opts_get' ) ) :
				$postslug 		=	veda_opts_get( 'single-model-slug', 'dt_models' );
				$taxslug  		=	veda_opts_get( 'model-category-slug', 'model_entries' );
				$singular_name  =	veda_opts_get( 'singular-model-name', __('Model', 'veda-model') );
				$plural_name	=	veda_opts_get( 'plural-model-name', __('Models', 'veda-model') );
				$tax_sname	  	=	veda_opts_get( 'singular-model-tax-name', __('Category', 'veda-model') );
				$tax_pname		=	veda_opts_get( 'plural-model-tax-name', __('Categories', 'veda-model') );
			endif;

			$labels = array (
				'name'				  => 	$plural_name,
				'all_items' 		  => 	__ ( 'All ', 'veda-model' ) . $plural_name,
				'singular_name' 	  => 	$singular_name,
				'add_new' 			  => 	__ ( 'Add New', 'veda-model' ),
				'add_new_item' 		  => 	__ ( 'Add New ', 'veda-model' ) . $singular_name,
				'edit_item' 		  => 	__ ( 'Edit ', 'veda-model' ) . $singular_name,
				'new_item' 			  => 	__ ( 'New ', 'veda-model' ) . $singular_name,
				'view_item' 		  => 	__ ( 'View ', 'veda-model' ) . $singular_name,
				'search_items' 		  =>	__ ( 'Search ', 'veda-model' ) . $plural_name,
				'not_found' 		  => 	__ ( 'No ', 'veda-model' ) . $plural_name . __ ( ' found', 'veda-model' ),
				'not_found_in_trash'  => __ ( 'No ', 'veda-model' ) . $plural_name . __ ( ' found in Trash', 'veda-model' ),
				'parent_item_colon'   => 	__ ( 'Parent ', 'veda-model' ) . $singular_name . ':',
				'menu_name' 		  => 	$plural_name
			);
			
			$args = array (
				'labels' 			  => $labels,
				'hierarchical' 		  => false,
				'description' 		  => __( 'This is custom post type ', 'veda-model' ) . $plural_name,
				'supports' 			  => array ( 'title', 'editor', 'comments', 'thumbnail'),
				'public' 			  => true,
				'show_ui' 			  => true,
				'show_in_menu' 		  => true,
				'menu_position' 	  => 10,
				'menu_icon' 		  => 'dashicons-businessman',
				'show_in_nav_menus'   => true,
				'publicly_queryable'  => true,
				'exclude_from_search' => false,
				'has_archive' 		  => true,
				'query_var' 	  	  => true,
				'can_export' 	  	  => true,
				'rewrite' 		  	  => array( 'slug' => $postslug ),
				'capability_type' 	  => 'post'
			);
			
			register_post_type ( 'dt_models', $args );

			$labels = array(
				'name'                => $tax_pname,
				'singular_name'       => $tax_sname,
				'search_items'        => __( 'Search ', 'veda-model' ) . $tax_pname,
				'all_items'           => __( 'All ', 'veda-model' ) . $tax_pname,
				'parent_item'         => __( 'Parent ', 'veda-model' ) . $tax_sname,
				'parent_item_colon'   => __( 'Parent ', 'veda-model' ) . $tax_sname . ':',
				'edit_item'           => __( 'Edit ', 'veda-model' ) . $tax_sname,
				'update_item'         => __( 'Update ', 'veda-model' ) . $tax_sname,
				'add_new_item'        => __( 'Add New ', 'veda-model' ) . $tax_sname,
				'new_item_name'       => __( 'New ', 'veda-model') . $tax_sname . __(' Name', 'veda-model' ),
				'menu_name'           => $tax_pname
			);
			
			register_taxonomy ( 'model_entries', array('dt_models'), array(
				'hierarchical' 		  => true,
				'labels' 			  => $labels,
				'show_ui'             => true,
				'show_admin_column'   => true,
				'rewrite' 			  => array( 'slug' => $taxslug ),
				'query_var' 		  => true 
			));
		}
		
		function dt_add_model_meta_box() {
			add_meta_box ( 'dt-model-default-metabox', __ ( 'Default Options', 'veda-model' ), array (
				$this,
				'dt_default_metabox' 
			), 'dt_models', 'normal', 'default' );
		}
		
		function dt_default_metabox() {
			include_once plugin_dir_path ( __FILE__ ) . 'metaboxes/dt_models_default_metabox.php';
		}
		
		function dt_models_edit_columns( $columns ) {
			
			$newcolumns = array (
				"cb" 					=> "<input type=\"checkbox\"/>",
				"dt_model_thumb" 	=> __("Image", "veda-model"),
				"title" 				=> __("Name", "veda-model")
			);
			$columns = array_merge ( $newcolumns, $columns );
			return $columns;
		}

		function dt_models_columns_display( $columns, $id ) {
			global $post;
			
			switch ($columns) {
				
				case "dt_model_thumb" :
				
				    $image = wp_get_attachment_image(get_post_thumbnail_id($id), array(75,75));
					if(!empty($image)):
					  	echo $image;
				    else:
						$post_settings = get_post_meta ( $post->ID, '_custom_settings', TRUE );
						$post_settings = is_array ( $post_settings ) ? $post_settings : array ();
					
						if( array_key_exists("items_thumbnail", $post_settings)) {
							$item = $post_settings ['items_thumbnail'] [0];
							$name = $post_settings ['items_name'] [0];
						
							if( "video" === $name ) {
								echo '<span class="dt-video"></span>';
							}else{
								echo "<img src='{$item}' height='75px' width='75px' />";
							}
						}
					endif;
				break;
			}			
		}
		
		function save_post_meta( $post_id ){
			if( key_exists ( '_inline_edit',$_POST )) :
				if ( wp_verify_nonce($_POST['_inline_edit'], 'inlineeditnonce')) return;
			endif;
			
			if( key_exists( 'dt_theme_model_meta_nonce',$_POST ) ) :
				if ( ! wp_verify_nonce( $_POST['dt_theme_model_meta_nonce'], 'dt_theme_model_nonce') ) return;
			endif;
		 
			if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
			
			if (!current_user_can('edit_post', $post_id)) return;

			if ( (key_exists('post_type', $_POST)) && ('dt_models' == $_POST['post_type']) ) :
			
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
						$settings['show-standard-sidebar-right'] = $_POST['show-standard-sidebar-right'];
						$settings['widget-area-right'] =  isset($_POST['dttheme']['widgetareas-right']) ? array_unique(array_filter($_POST['dttheme']['widgetareas-right'])) : '';
					}
					
					$settings ['items'] = isset ( $_POST ['items'] ) ? $_POST ['items'] : "";
					$settings ['items_thumbnail'] = isset ( $_POST ['items_thumbnail'] ) ? $_POST ['items_thumbnail'] : "";
					$settings ['items_name'] = isset ( $_POST ['items_name'] ) ? $_POST ['items_name'] : "";
					
					$settings ['social'] = isset ( $_POST ['_social'] ) ? stripslashes ( $_POST ['_social'] ) : "";
					$settings ['subtitle'] = isset ( $_POST ['_subtitle'] ) ? stripslashes ( $_POST ['_subtitle'] ) : "";
					
					$settings ['meta_title'] = isset ( $_POST['dttheme-meta-title'] ) ? $_POST['dttheme-meta-title'] : "";
					$settings ['meta_value'] = isset ( $_POST['dttheme-meta-value'] ) ? $_POST['dttheme-meta-value'] : "";
					
					update_post_meta ( $post_id, "_custom_settings", array_filter ( $settings ) );
					
					// for default category
					$terms = wp_get_object_terms ( $post_id, 'model_entries' );
					if (empty ( $terms )) :
						wp_set_object_terms ( $post_id, 'Uncategorized', 'model_entries', true );
					endif;
				endif;
			endif;
		}

		/**
		 * To load model pages in front end
		 *
		 * @param string $template        	
		 * @return string
		 */
		function dt_template_include($template) {
			
			if ( is_singular('dt_models') ) {
				if (! file_exists ( get_stylesheet_directory () . '/single-dt_models.php' )) {
					$template = plugin_dir_path ( __FILE__ ) . 'templates/single-dt_models.php';
				}
			} elseif (is_tax ('model_entries')) {
				if (! file_exists ( get_stylesheet_directory () . '/taxonomy-model_entries.php' )) {
					$template = plugin_dir_path ( __FILE__ ) . 'templates/taxonomy-model_entries.php';
				}
			}
			return $template;
		}
	}
}?>