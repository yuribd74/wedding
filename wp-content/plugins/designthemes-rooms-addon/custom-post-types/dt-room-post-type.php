<?php
if (! class_exists ( 'DTRoomPostType' )) {
	class DTRoomPostType {

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
			wp_enqueue_script ( 'jquery-ui-sortable' );
			
			add_action ( 'add_meta_boxes', array (
					$this,
					'dt_add_room_meta_box' 
			) );
			
			add_filter ( "manage_edit-dt_rooms_columns", array (
					$this,
					"dt_rooms_edit_columns" 
			) );
			
			add_action ( "manage_posts_custom_column", array (
					$this,
					"dt_rooms_columns_display" 
			), 10, 2 );
		}

		/**
		 */
		function createPostType() {
			$postslug	 	= 'dt_rooms'; 					$taxslug  = 'room_entries';
			$singular_name  = __('Room', 'veda-room'); 	$plural_name  = __('Rooms', 'veda-room');
			$tax_sname 		= __( 'Category','veda-room' );	$tax_pname    = __( 'Categories','veda-room' );

			if( function_exists( 'veda_opts_get' ) ) :
				$postslug 		=	veda_opts_get( 'single-room-slug', 'dt_rooms' );
				$taxslug  		=	veda_opts_get( 'room-category-slug', 'room_entries' );
				$singular_name  =	veda_opts_get( 'singular-room-name', __('Room', 'veda-room') );
				$plural_name	=	veda_opts_get( 'plural-room-name', __('Rooms', 'veda-room') );
				$tax_sname	  	=	veda_opts_get( 'singular-room-tax-name', __('Category', 'veda-room') );
				$tax_pname		=	veda_opts_get( 'plural-room-tax-name', __('Categories', 'veda-room') );
			endif;

			$labels = array (
					'name'				=> 	$plural_name,
					'all_items' 		=> 	__ ( 'All ', 'veda-room' ) . $plural_name,
					'singular_name' 	=> 	$singular_name,
					'add_new' 			=> 	__ ( 'Add New', 'veda-room' ),
					'add_new_item' 		=> 	__ ( 'Add New ', 'veda-room' ) . $singular_name,
					'edit_item' 		=> 	__ ( 'Edit ', 'veda-room' ) . $singular_name,
					'new_item' 			=> 	__ ( 'New ', 'veda-room' ) . $singular_name,
					'view_item' 		=> 	__ ( 'View ', 'veda-room' ) . $singular_name,
					'search_items' 		=>	__ ( 'Search ', 'veda-room' ) . $plural_name,
					'not_found' 		=> 	__ ( 'No ', 'veda-room' ) . $plural_name . __ ( ' found', 'veda-room' ),
					'not_found_in_trash' => __ ( 'No ', 'veda-room' ) . $plural_name . __ ( ' found in Trash', 'veda-room' ),
					'parent_item_colon' => 	__ ( 'Parent ', 'veda-room' ) . $singular_name . ':',
					'menu_name' 		=> 	$plural_name
			);
			
			$args = array (
					'labels' => $labels,
					'hierarchical' => false,
					'description' => __( 'This is custom post type ', 'veda-room' ) . $plural_name,
					'supports' => array (
							'title',
							'editor',
							'comments',
							'thumbnail',
							'excerpt'
					),
					
					'public' => true,
					'show_ui' => true,
					'show_in_menu' => true,
					'menu_position' => 10,
					'menu_icon' => 'dashicons-store',
					
					'show_in_nav_menus' => true,
					'publicly_queryable' => true,
					'exclude_from_search' => false,
					'has_archive' => true,
					'query_var' => true,
					'can_export' => true,
					'rewrite' => array( 'slug' => $postslug ),
					'capability_type' => 'post'
			);

			register_post_type ( 'dt_rooms', $args );

			$labels = array(
					'name'              => 	$tax_pname,
					'singular_name'     => 	$tax_sname,
					'search_items'      => 	__( 'Search ', 'veda-room' ) . $tax_pname,
					'all_items'         => 	__( 'All ', 'veda-room' ) . $tax_pname,
					'parent_item'       => 	__( 'Parent ', 'veda-room' ) . $tax_sname,
					'parent_item_colon' => 	__( 'Parent ', 'veda-room' ) . $tax_sname . ':',
					'edit_item'         => 	__( 'Edit ', 'veda-room' ) . $tax_sname,
					'update_item'       => 	__( 'Update ', 'veda-room' ) . $tax_sname,
					'add_new_item'      => 	__( 'Add New ', 'veda-room' ) . $tax_sname,
					'new_item_name'     => 	__( 'New ', 'veda-room') . $tax_sname . __(' Name', 'veda-room' ),
					'menu_name'         => 	$tax_pname
			);

			register_taxonomy ( 'room_entries', array (
					'dt_rooms' 
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
		function dt_add_room_meta_box() {
			add_meta_box ( 'dt-room-default-metabox', __ ( 'Default Options', 'veda-room' ), array (
					$this,
					'dt_default_metabox' 
			), 'dt_rooms', 'normal', 'default' );
		}
		
		/**
		 */
		function dt_default_metabox() {
			include_once plugin_dir_path ( __FILE__ ) . 'metaboxes/dt_room_default_metabox.php';
		}
		
		/**
		 *
		 * @param unknown $columns        	
		 * @return multitype:
		 */
		function dt_rooms_edit_columns($columns) {
			
			$newcolumns = array (
				"cb" => "<input type=\"checkbox\" />",
				"dt_room_thumb" => __("Image", "veda-room"),
				"title" => __("Title", "veda-room"),
				"author" => __("Author", "veda-room")
			);
			$columns = array_merge ( $newcolumns, $columns );
			return $columns;
		}

		/**
		 *
		 * @param unknown $columns
		 * @param unknown $id
		 */
		function dt_rooms_columns_display($columns, $id) {
			global $post;
			
			switch ($columns) {
				case "dt_room_thumb" :
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

		/**
		 */
		function save_post_meta($post_id) {

			if( key_exists ( '_inline_edit',$_POST )) :
				if ( wp_verify_nonce($_POST['_inline_edit'], 'inlineeditnonce')) return;
			endif;

			if( key_exists( 'dt_theme_room_meta_nonce',$_POST ) ) :
				if ( ! wp_verify_nonce( $_POST['dt_theme_room_meta_nonce'], 'dt_theme_room_nonce') ) return;
			endif;

			if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
			
			if (!current_user_can('edit_post', $post_id)) :
				return;
			endif;

			if ( (key_exists('post_type', $_POST)) && ('dt_rooms' == $_POST['post_type']) ) :

				$layout = isset($_POST['layout']) ? $_POST['layout'] : '';
				if($layout) :
	
					$settings = array ();
					$settings['layout'] = $layout;
	
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

					$settings ['items'] = isset ( $_POST ['items'] ) ? $_POST ['items'] : "";
					$settings ['items_thumbnail'] = isset ( $_POST ['items_thumbnail'] ) ? $_POST ['items_thumbnail'] : "";
					$settings ['items_name'] = isset ( $_POST ['items_name'] ) ? $_POST ['items_name'] : "";
	
					$settings ['meta_title'] = isset ( $_POST['dttheme-meta-title'] ) ? $_POST['dttheme-meta-title'] : "";
					$settings ['meta_class'] = isset ( $_POST['dttheme-meta-class'] ) ? $_POST['dttheme-meta-class'] : "";
					$settings ['meta_value'] = isset ( $_POST['dttheme-meta-value'] ) ? $_POST['dttheme-meta-value'] : "";
	
					$settings ['no_beds'] 	= isset ( $_POST ['_no_beds'] ) ? stripslashes ( $_POST ['_no_beds'] ) : "";
					$settings ['no_peoples'] 	= isset ( $_POST ['_no_peoples'] ) ? stripslashes ( $_POST ['_no_peoples'] ) : "";
					$settings ['room_size'] 	= isset ( $_POST ['_room_size'] ) ? stripslashes ( $_POST ['_room_size'] ) : "";
					$settings ['ac_nonac'] 	= isset ( $_POST ['_ac_nonac'] ) ? stripslashes ( $_POST ['_ac_nonac'] ) : "";
					$settings ['price'] 	= isset ( $_POST ['_price'] ) ? stripslashes ( $_POST ['_price'] ) : "";
					$settings ['offer'] 	= isset ( $_POST ['_offer'] ) ? stripslashes ( $_POST ['_offer'] ) : "";

					update_post_meta ( $post_id, "_custom_settings", array_filter ( $settings ) );

					// for default category
					$terms = wp_get_object_terms ( $post_id, 'room_entries' );
					if (empty ( $terms )) :
						wp_set_object_terms ( $post_id, 'Uncategorized', 'room_entries', true );
					endif;

				endif;
			endif;
		}

		/**
		 * To load room pages in front end
		 *
		 * @param string $template        	
		 * @return string
		 */
		function dt_template_include($template) {
			if (is_singular( 'dt_rooms' )) {
				if (! file_exists ( get_stylesheet_directory () . '/single-dt_rooms.php' )) {
					$template = plugin_dir_path ( __FILE__ ) . 'templates/single-dt_rooms.php';
				}
			} elseif (is_tax ( 'room_entries' )) {
				if (! file_exists ( get_stylesheet_directory () . '/taxonomy-room_entries.php' )) {
					$template = plugin_dir_path ( __FILE__ ) . 'templates/taxonomy-room_entries.php';
				}
			}
			return $template;
		}
	}
}
?>