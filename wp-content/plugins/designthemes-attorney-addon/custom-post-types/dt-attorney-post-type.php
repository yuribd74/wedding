<?php
if( !class_exists('DTAttorneyPostType') ) {
	class DTAttorneyPostType {
		
		function __construct() {
			
			// Add Hook into the 'init()' action			
			add_action ( 'init', array ( $this, 'dt_init' ) );
			
			// Add Hook into the 'admin_init()' action
			add_action ( 'admin_init', array ( $this, 'dt_admin_init' ) );

			// Add Hook into the 'template_include' filter
			add_filter ( 'template_include', array ( $this, 'dt_template_include' ) );

			add_action( 'widgets_init', array( $this, 'register_sidebars' ) , 100 );
		}

		/**
		 * A function hook that the WordPress core launches at 'init' points
		 * Works in both front and back end
		 */
		function dt_init() {

			$this->createPostType();

			if( is_admin() ){
				/* Back End */
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
				'dt_add_attorney_meta_box' 
			) );
			
			add_filter ( "manage_edit-dt_attorney_columns", array (
				$this,
				"dt_attorneys_edit_columns" 
			) );
			
			add_action ( "manage_posts_custom_column", array (
				$this,
				"dt_attorneys_columns_display" 
			), 10, 2 );			
		}
		
		function createPostType() {
			
			$portslug 		= 'dt_attorneys';
			$taxslug  		= 'attorney_departments';
			$singular_name  = __('Attorney', 'veda-attorney');
			$plural_name    = __('Attorneys', 'veda-attorney');
			$tax_sname 		= __('Department','veda-attorney');
			$tax_pname      = __('Departments','veda-attorney');
			
			if( function_exists( 'veda_opts_get' ) ) :
				$postslug 		=	veda_opts_get( 'single-attorney-slug', 'dt_attorneys' );
				$taxslug  		=	veda_opts_get( 'attorney-department-slug', 'attorney_departments' );
				$singular_name  =	veda_opts_get( 'singular-attorney-name', __('Attorney', 'veda-attorney') );
				$plural_name	=	veda_opts_get( 'plural-attorney-name', __('Attorneys', 'veda-attorney') );
				$tax_sname	  	=	veda_opts_get( 'singular-attorney-tax-name', __('Department', 'veda-attorney') );
				$tax_pname		=	veda_opts_get( 'plural-attorney-tax-name', __('Departments', 'veda-attorney') );
			endif;

			$labels = array (
				'name'				  => 	$plural_name,
				'all_items' 		  => 	__ ( 'All ', 'veda-attorney' ) . $plural_name,
				'singular_name' 	  => 	$singular_name,
				'add_new' 			  => 	__ ( 'Add New', 'veda-attorney' ),
				'add_new_item' 		  => 	__ ( 'Add New ', 'veda-attorney' ) . $singular_name,
				'edit_item' 		  => 	__ ( 'Edit ', 'veda-attorney' ) . $singular_name,
				'new_item' 			  => 	__ ( 'New ', 'veda-attorney' ) . $singular_name,
				'view_item' 		  => 	__ ( 'View ', 'veda-attorney' ) . $singular_name,
				'search_items' 		  =>	__ ( 'Search ', 'veda-attorney' ) . $plural_name,
				'not_found' 		  => 	__ ( 'No ', 'veda-attorney' ) . $plural_name . __ ( ' found', 'veda-attorney' ),
				'not_found_in_trash'  => 	__ ( 'No ', 'veda-attorney' ) . $plural_name . __ ( ' found in Trash', 'veda-attorney' ),
				'parent_item_colon'   => 	__ ( 'Parent ', 'veda-attorney' ) . $singular_name . ':',
				'menu_name' 		  => 	$plural_name
			);
			
			$args = array (
				'labels' 			  => $labels,
				'hierarchical' 		  => false,
				'description' 		  => __( 'This is custom post type ', 'veda-attorney' ) . $plural_name,
				'supports' 			  => array ( 'title', 'editor', 'thumbnail'),
				'public' 			  => true,
				'show_ui' 			  => true,
				'show_in_menu' 		  => true,
				'menu_position' 	  => 10,
				'menu_icon' 		  => 'dashicons-admin-users',
				'show_in_nav_menus'   => true,
				'publicly_queryable'  => true,
				'exclude_from_search' => false,
				'has_archive' 		  => true,
				'query_var' 	  	  => true,
				'can_export' 	  	  => true,
				'rewrite' 		  	  => array( 'slug' => $postslug ),
				'capability_type' 	  => 'post'
			);
			
			register_post_type ( 'dt_attorneys', $args );

			$labels = array(
				'name'                => $tax_pname,
				'singular_name'       => $tax_sname,
				'search_items'        => __( 'Search ', 'veda-attorney' ) . $tax_pname,
				'all_items'           => __( 'All ', 'veda-attorney' ) . $tax_pname,
				'parent_item'         => __( 'Parent ', 'veda-attorney' ) . $tax_sname,
				'parent_item_colon'   => __( 'Parent ', 'veda-attorney' ) . $tax_sname . ':',
				'edit_item'           => __( 'Edit ', 'veda-attorney' ) . $tax_sname,
				'update_item'         => __( 'Update ', 'veda-attorney' ) . $tax_sname,
				'add_new_item'        => __( 'Add New ', 'veda-attorney' ) . $tax_sname,
				'new_item_name'       => __( 'New ', 'veda-attorney') . $tax_sname . __(' Name', 'veda-attorney' ),
				'menu_name'           => $tax_pname
			);
			
			register_taxonomy ( 'attorney_departments', array('dt_attorneys'), array(
				'hierarchical' 		  => true,
				'labels' 			  => $labels,
				'show_ui'             => true,
				'show_admin_column'   => true,
				'rewrite' 			  => array( 'slug' => $taxslug ),
				'query_var' 		  => true 
			));			
		}
		
		function dt_add_attorney_meta_box() {
			add_meta_box ( 'dt-attorney-default-metabox', __ ( 'Default Options', 'veda-attorney' ), array (
				$this,
				'dt_default_metabox' 
			), 'dt_attorneys', 'normal', 'default' );
		}

		function dt_default_metabox() {
			include_once plugin_dir_path ( __FILE__ ) . 'metaboxes/dt_attorneys_default_metabox.php';
		}

		function dt_attorneys_edit_columns( $columns ) {

			$newcolumns = array (
				"cb" 					=> "<input type=\"checkbox\"/>",
				"dt_attorney_thumb" 	=> __("Image", "veda-attorney"),
				"title" 				=> __("Title", "veda-attorney"),
				"author" 				=> __("Author", "veda-attorney")
			);
			$columns = array_merge ( $newcolumns, $columns );
			return $columns;			
		}
		
		function dt_attorneys_columns_display( $columns, $id ) {
			global $post;
			
			switch ($columns) {
				
				case "dt_attorney_thumb" :
				
				    $image = wp_get_attachment_image(get_post_thumbnail_id($id), array(75,75));
					if(!empty($image)):
					  	echo $image;
					endif;
				break;
			}			
		}
		
		function save_post_meta( $post_id ){
			if( key_exists ( '_inline_edit',$_POST )) :
				if ( wp_verify_nonce($_POST['_inline_edit'], 'inlineeditnonce')) return;
			endif;
			
			if( key_exists( 'dt_theme_attorney_meta_nonce',$_POST ) ) :
				if ( ! wp_verify_nonce( $_POST['dt_theme_attorney_meta_nonce'], 'dt_theme_attorney_nonce') ) return;
			endif;
		 
			if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
			
			if (!current_user_can('edit_post', $post_id) ) return;
			
			if ( (key_exists('post_type', $_POST)) && ('dt_attorneys' == $_POST['post_type']) ) :
			
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
					
					$settings ['summary-title'] = isset ( $_POST ['summary-title'] ) ? stripslashes ( $_POST ['summary-title'] ) : "";
					$settings ['summary'] = isset ( $_POST ['summary'] ) ? stripslashes ( $_POST ['summary'] ) : "";
					$settings ['social'] = isset ( $_POST ['social'] ) ? stripslashes ( $_POST ['social'] ) : "";
					$settings ['phone'] = isset ( $_POST ['phone'] ) ? stripslashes ( $_POST ['phone'] ) : "";
					$settings ['role'] = isset ( $_POST ['role'] ) ? stripslashes ( $_POST ['role'] ) : "";
					
					$settings ['meta_show'] = isset ( $_POST['dttheme-meta-show'] ) ? $_POST['dttheme-meta-show'] : "";
					$settings ['meta_title'] = isset ( $_POST['dttheme-meta-title'] ) ? $_POST['dttheme-meta-title'] : "";
					$settings ['meta_value'] = isset ( $_POST['dttheme-meta-value'] ) ? $_POST['dttheme-meta-value'] : "";
					
					update_post_meta ( $post_id, "_custom_settings", array_filter ( $settings ) );
					
					// for default category
					$terms = wp_get_object_terms ( $post_id, 'attorney_departments' );
					if (empty ( $terms )) :
						wp_set_object_terms ( $post_id, 'General', 'attorney_departments', true );
					endif;
				endif;
			endif;
		}

		/**
		 * To load attorney pages in front end
		 *
		 * @param string $template        	
		 * @return string
		 */
		function dt_template_include($template) {
			if (is_singular( 'dt_attorneys' )) {
				if (! file_exists ( get_stylesheet_directory () . '/single-dt_attorneys.php' )) {
					$template = plugin_dir_path ( __FILE__ ) . 'templates/single-dt_attorneys.php';
				}
			} elseif (is_tax ( 'attorney_departments' )) {
				if (! file_exists ( get_stylesheet_directory () . '/taxonomy-attorney_departments.php' )) {
					$template = plugin_dir_path ( __FILE__ ) . 'templates/taxonomy-attorney_departments.php';
				}
			}
			return $template;
		}

		function register_sidebars() {
			
			$layout = "";			
			if( function_exists('veda_option') ) {
				$layout = veda_option('pageoptions',"attorneys-archives-page-layout");
			}
			
			$layout = !empty($layout) ? $layout : "content-full-width";
			$wtstyle = veda_opts_get('wtitle-style', '');
		
			$before_title = '<h3 class="widgettitle">';
			$after_title = '</h3>';
		
			if( $wtstyle == 'type17' ):
				$before_title = ' <div class="mz-title"> <div class="mz-title-content"> <h3 class="widgettitle">';
				$after_title  = '</h3> </div> </div>';
			elseif( $wtstyle == 'type18' ):
				$before_title = ' <div class="mz-stripe-title"> <div class="mz-stripe-title-content"> <h3 class="widgettitle">';
				$after_title  = '</h3> </div> </div>';
			endif;

			switch($layout) :
				case 'with-left-sidebar':
					register_sidebar(array(
						'name' 			=>	esc_html__("Attorneys Archive | Left Sidebar",'veda-attorney'),
						'id'			=>	'attorney_departments-archives-sidebar-left',
						'description'   =>  esc_html__("Appears in the Left side of Attorneys Archive Page.","veda-attorney"),
						'before_widget' => 	'<aside id="%1$s" class="widget %2$s">',
						'after_widget' 	=> 	'</aside>',
						'before_title' 	=> 	$before_title,
						'after_title' 	=> 	$after_title));
				break;

				case 'with-right-sidebar':
					register_sidebar(array(
						'name' 			=>	esc_html__("Attorneys Archive | Right Sidebar",'veda-attorney'),
						'id'			=>	'attorney_departments-archives-sidebar-right',
						'description'   =>  esc_html__("Appears in the Right side of Attorneys Archive Page.","veda-attorney"),
						'before_widget' => 	'<aside id="%1$s" class="widget %2$s">',
						'after_widget' 	=> 	'</aside>',
						'before_title' 	=> 	$before_title,
						'after_title' 	=> 	$after_title));
				break;

				case 'with-both-sidebar':
					register_sidebar(array(
						'name' 			=>	esc_html__("Attorneys Archive | Left Sidebar",'veda-attorney'),
						'id'			=>	'attorney_departments-archives-sidebar-left',
						'description'   =>  esc_html__("Appears in the Left side of Attorneys Archive Page.","veda-attorney"),
						'before_widget' => 	'<aside id="%1$s" class="widget %2$s">',
						'after_widget' 	=> 	'</aside>',
						'before_title' 	=> 	$before_title,
						'after_title' 	=> 	$after_title));

					register_sidebar(array(
						'name' 			=>	esc_html__("Attorneys Archive | Right Sidebar",'veda-attorney'),
						'id'			=>	'attorney_departments-archives-sidebar-right',
						'description'   =>  esc_html__("Appears in the Right side of Attorneys Archive Page.","veda-attorney"),
						'before_widget' => 	'<aside id="%1$s" class="widget %2$s">',
						'after_widget' 	=> 	'</aside>',
						'before_title' 	=> 	$before_title,
						'after_title' 	=> 	$after_title));
				break;
			endswitch;
		}
	}
}?>