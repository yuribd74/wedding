<?php
if (! class_exists ( 'DTDJPostType' )) {
	class DTDJPostType {

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
					'dt_add_dj_meta_box'
			) );
			
			add_filter ( "manage_edit-dt_djs_columns", array (
					$this,
					"dt_djs_edit_columns" 
			) );
			
			add_action ( "manage_posts_custom_column", array (
					$this,
					"dt_djs_columns_display" 
			), 10, 2 );
		}

		/**
		 * A function to register post type
		 */
		function createPostType() {
			$postslug	 	= 'dt_djs';
			$singular_name  = __('DJ', 'veda-event'); 	$plural_name  = __('DJs', 'veda-event');

			if( function_exists( 'veda_opts_get' ) ) :
				$postslug 		=	veda_opts_get( 'single-dj-slug', 'dt_djs' );
				$singular_name  =	veda_opts_get( 'singular-dj-name', __('DJ', 'veda-event') );
				$plural_name	=	veda_opts_get( 'plural-dj-name', __('DJs', 'veda-event') );
			endif;

			$labels = array (
					'name'				=> 	$plural_name,
					'all_items' 		=> 	__ ( 'All ', 'veda-event' ) . $plural_name,
					'singular_name' 	=> 	$singular_name,
					'add_new' 			=> 	__ ( 'Add New', 'veda-event' ),
					'add_new_item' 		=> 	__ ( 'Add New ', 'veda-event' ) . $singular_name,
					'edit_item' 		=> 	__ ( 'Edit ', 'veda-event' ) . $singular_name,
					'new_item' 			=> 	__ ( 'New ', 'veda-event' ) . $singular_name,
					'view_item' 		=> 	__ ( 'View ', 'veda-event' ) . $singular_name,
					'search_items' 		=>	__ ( 'Search ', 'veda-event' ) . $plural_name,
					'not_found' 		=> 	__ ( 'No ', 'veda-event' ) . $plural_name . __ ( ' found', 'veda-event' ),
					'not_found_in_trash' => __ ( 'No ', 'veda-event' ) . $plural_name . __ ( ' found in Trash', 'veda-event' ),
					'parent_item_colon' => 	__ ( 'Parent ', 'veda-event' ) . $singular_name . ':',
					'menu_name' 		=> 	$plural_name
			);
			
			$args = array (
					'labels' => $labels,
					'hierarchical' => false,
					'description' => __( 'This is custom post type ', 'veda-event' ) . $plural_name,
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

			register_post_type ( 'dt_djs', $args );
		}

		/**
		 * A function to add metabox
		 */
		function dt_add_dj_meta_box() {
			add_meta_box ( 'dt-dj-default-metabox', __ ( 'Default Options', 'veda-event' ), array (
				$this,
				'dt_default_metabox' 
			), 'dt_djs', 'normal', 'default' );
		}
		
		/**
		 */
		function dt_default_metabox() {
			include_once plugin_dir_path ( __FILE__ ) . 'metaboxes/dt_dj_default_metabox.php';
		}
		
		/**
		 *
		 * @param unknown $columns        	
		 * @return multitype:
		 */
		function dt_djs_edit_columns($columns) {

			$newcolumns = array (
				"cb" => "<input type=\"checkbox\" />",
				"dt_dj_thumb" => __("Image", "veda-event"),
				"title" => __("Title", "veda-event"),
				"author" => __("Author", "veda-event")
			);
			$columns = array_merge ( $newcolumns, $columns );
			return $columns;
		}

		/**
		 *
		 * @param unknown $columns
		 * @param unknown $id
		 */
		function dt_djs_columns_display($columns, $id) {
			global $post;

			switch ($columns) {

				case "dt_dj_thumb" :
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

			if( key_exists( 'dt_theme_dj_meta_nonce',$_POST ) ) :
				if ( ! wp_verify_nonce( $_POST['dt_theme_dj_meta_nonce'], 'dt_theme_dj_nonce') ) return;
			endif;

			if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

			if (!current_user_can('edit_post', $post_id)) :
				return;
			endif;

			if ( (key_exists('post_type', $_POST)) && ('dt_djs' == $_POST['post_type']) ) :

				$settings = array ();

				$settings ['meta_title'] = isset ( $_POST['dttheme-meta-title'] ) ? $_POST['dttheme-meta-title'] : "";
				$settings ['meta_value'] = isset ( $_POST['dttheme-meta-value'] ) ? $_POST['dttheme-meta-value'] : "";
	
				$settings ['role'] 			= isset ( $_POST ['_role'] ) ? stripslashes ( $_POST ['_role'] ) : "";
				$settings ['since']			= isset ( $_POST ['_since'] ) ? stripslashes ( $_POST ['_since'] ) : "";
				$settings ['no_events'] 	= isset ( $_POST ['_no_events'] ) ? stripslashes ( $_POST ['_no_events'] ) : "";
				$settings ['latest_audio']	= isset ( $_POST ['_latest_audio'] ) ? stripslashes ( $_POST ['_latest_audio'] ) : "";

				update_post_meta ( $post_id, "_custom_settings", array_filter ( $settings ) );
			endif;
		}
	}
}
?>