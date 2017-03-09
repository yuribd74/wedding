<?php
if( !class_exists('DTYogaVideosPostType') ) {

	class DTYogaVideosPostType {

		function __construct() {

			// Add Hook into the 'init()' action			
			add_action ( 'init', array ( $this, 'dt_init' ) );

			// Add Hook into the 'admin_init()' action
			add_action ( 'admin_init', array ( $this, 'dt_admin_init' ) );

			/* Alter Taxonomy to Radio Button */
			require_once plugin_dir_path ( __FILE__ ) . 'dt-alter-taxonomy-to-radio-button.php';
			if (class_exists ( 'DT_RadioButtonTaxonomy' )) {
				new DT_RadioButtonTaxonomy ('dt_yoga_video_durations');
			}

			// Admin Notice Bar
			add_action('all_admin_notices', array( $this, 'dt_video_admin_notices' ) );

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

			add_action ( 'add_meta_boxes', array ( $this, 'dt_add_yoga_video_meta_box' ) );

			add_filter ( "manage_edit-dt_yoga_videos_columns", array (
				$this,
				"dt_yoga_videos_edit_columns" 
			) );			

			add_action ( "manage_posts_custom_column", array (
				$this,
				"dt_yoga_videos_columns_display" 
			), 10, 2 );
		}

		function createPostType() {

			$postslug 		= 'dt_videos';
			$singular_name  = __('Video', 'veda-yoga');
			$plural_name    = __('Videos', 'veda-yoga');

			if( function_exists( 'veda_opts_get' ) ) :
				$postslug 		=	veda_opts_get( 'single-video-slug', 'dt_videos' );
				$singular_name  =	veda_opts_get( 'singular-video-name', __('Video', 'veda-yoga') );
				$plural_name	=	veda_opts_get( 'plural-video-name', __('Videos', 'veda-yoga') );
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
				'supports' 			  => array ( 'title', 'editor', 'thumbnail', 'excerpt', 'comments'),
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

			register_post_type ( 'dt_yoga_videos', $args );


			# Duration Taxonomy
			$tax_sname = __('Duration', 'veda-yoga');
			$tax_pname = __('Durations', 'veda-yoga');
			$taxslug = "video_duration";

			if( function_exists( 'veda_opts_get' ) ) :
				$tax_sname	  	=	veda_opts_get( 'singular-video-duration-name', __('Duration', 'veda-yoga') );
				$tax_pname		=	veda_opts_get( 'plural-video-duration-name', __('Durations', 'veda-yoga') );
				$taxslug  		=	veda_opts_get( 'video-duration-slug', 'video_duration' );
			endif;

			$labels = array(
				'name'                => $tax_pname,
				'singular_name'       => $tax_sname,
				'search_items'        => __( 'Search ', 'veda-yoga' ) . $tax_pname,
				'all_items'           => __( 'All ', 'veda-yoga' ) . $tax_pname,
				'parent_item'         => __( 'Parent ', 'veda-yoga' ) . $tax_sname,
				'parent_item_colon'   => __( 'Parent ', 'veda-yoga' ) . $tax_sname . ':',
				'edit_item'           => __( 'Edit ', 'veda-yoga' ) . $tax_sname,
				'update_item'         => __( 'Update ', 'veda-yoga' ) . $tax_sname,
				'add_new_item'        => __( 'Add New ', 'veda-yoga' ) . $tax_sname,
				'new_item_name'       => __( 'New ', 'veda-yoga') . $tax_sname . __(' Name', 'veda-yoga' ),
				'menu_name'           => $tax_pname
			);			

			register_taxonomy( 'dt_yoga_video_durations' , array('dt_yoga_videos'), array(
				'hierarchical' => true,
				'labels' => $labels,
				'show_admin_column' => false,
				'rewrite' => array( 'slug' => $taxslug ),
				'query_var' => true
			) );

			# Level Taxonomy
			$tax_sname = __('Student Level', 'veda-yoga');
			$tax_pname = __('Student Levels', 'veda-yoga');
			$taxslug = "student_level";

			if( function_exists( 'veda_opts_get' ) ) :
				$tax_sname	  	=	veda_opts_get( 'singular-level-name', __('Student Level', 'veda-yoga') );
				$tax_pname		=	veda_opts_get( 'plural-level-name', __('Student Levels', 'veda-yoga') );
				$taxslug  		=	veda_opts_get( 'level-slug', 'student_level' );
			endif;

			$labels = array(
				'name'                => $tax_pname,
				'singular_name'       => $tax_sname,
				'search_items'        => __( 'Search ', 'veda-yoga' ) . $tax_pname,
				'all_items'           => __( 'All ', 'veda-yoga' ) . $tax_pname,
				'parent_item'         => __( 'Parent ', 'veda-yoga' ) . $tax_sname,
				'parent_item_colon'   => __( 'Parent ', 'veda-yoga' ) . $tax_sname . ':',
				'edit_item'           => __( 'Edit ', 'veda-yoga' ) . $tax_sname,
				'update_item'         => __( 'Update ', 'veda-yoga' ) . $tax_sname,
				'add_new_item'        => __( 'Add New ', 'veda-yoga' ) . $tax_sname,
				'new_item_name'       => __( 'New ', 'veda-yoga') . $tax_sname . __(' Name', 'veda-yoga' ),
				'menu_name'           => $tax_pname
			);

			register_taxonomy( 'dt_yoga_student_level' , array('dt_yoga_videos','dt_yoga_programs'), array(
				'hierarchical' => true,
				'labels' => $labels,
				'show_admin_column' => false,
				'rewrite' => array( 'slug' => $taxslug ),
				'query_var' => true
			) );												
		}

		function dt_add_yoga_video_meta_box() {

			add_meta_box ( 'dt-yoga-style-metabox', __ ( 'Default Options', 'veda-yoga' ), array (
				$this,
				'dt_default_metabox' 
			), 'dt_yoga_videos', 'normal', 'default' );			
		}

		function dt_default_metabox() {
			include_once plugin_dir_path ( __FILE__ ) . 'metaboxes/dt_yoga_videos_metabox.php';
		}

		function dt_video_admin_notices() {

			if ( !is_admin() ) {
				return;
			}

			$videos =  __('Videos', 'veda-yoga');
			$durations = __('Durations', 'veda-yoga');
			
			if( function_exists('veda_opts_get') ){

				$videos =  veda_opts_get( 'plural-video-name', $videos );
				$durations = veda_opts_get( 'plural-video-duration-name', $durations);
			}

			$admin_tabs = array(
				10 => array( 'id' => 'edit-dt_yoga_videos', 'link' => 'edit.php?post_type=dt_yoga_videos', 'name' => $videos ),
				20 => array( 'id' => 'edit-dt_yoga_video_durations', 'link' => 'edit-tags.php?post_type=dt_yoga_videos&taxonomy=dt_yoga_video_durations', 'name' => $durations ),
			);

			ksort( $admin_tabs );

			$tabs = array();

			foreach ( $admin_tabs as $key => $value ) {
				array_push( $tabs, $key );
			}

			$pages = array('edit-dt_yoga_videos', 'edit-dt_yoga_video_durations' );

			$admin_tabs_on_page = array();
			foreach ( $pages as $page ) {
				$admin_tabs_on_page[$page] = $tabs;
			}

			$current_page_id = get_current_screen()->id;
			if ( !empty( $admin_tabs_on_page[$current_page_id] ) && count( $admin_tabs_on_page[$current_page_id] ) ) {
				echo '<h2 class="nav-tab-wrapper">';
					foreach ( $admin_tabs_on_page[$current_page_id] as $admin_tab_id ) {

						$class = ( $admin_tabs[$admin_tab_id]["id"] == $current_page_id ) ? "nav-tab nav-tab-active" : "nav-tab";
						echo '<a href="' . admin_url( $admin_tabs[$admin_tab_id]["link"] ) . '" class="' . $class . ' nav-tab-' . $admin_tabs[$admin_tab_id]["id"] . '">' . $admin_tabs[$admin_tab_id]["name"] . '</a>';
					}
				echo '</h2>';
			}
		}

		function dt_yoga_videos_edit_columns( $columns ) {

			$durations = __('Durations', 'veda-yoga');
			$levels = __('Student Levels', 'veda-yoga');
			$teachers = __('Teachers', 'veda-yoga');
			$styles = __('Styles', 'veda-yoga');

			if( function_exists( 'veda_opts_get' ) ) :
				$durations = veda_opts_get( 'plural-duration-name', __('Durations', 'veda-yoga') );
				$levels = veda_opts_get( 'plural-level-name', __('Student Levels', 'veda-yoga') );
				$teachers = veda_opts_get( 'plural-teacher-name', __('Teachers', 'veda-yoga') );
				$styles = veda_opts_get( 'plural-style-name', __('Styles', 'veda-yoga') );
			endif;


			$newcolumns = array(
				"cb" => "<input type=\"checkbox\" />",
				'video_image' => __("Image","veda-yoga"),
				'title' => '',
				'teacher' => $teachers,
				'style' => $styles,
				'dt_yoga_video_durations' => $durations,
				'dt_yoga_student_level' => $levels
			);

			$columns = array_merge ( $newcolumns, $columns );

			return $columns;
		}

		function dt_yoga_videos_columns_display( $columns, $id ) {

			global $post;

			switch ($columns) {

				case 'video_image':
					if( has_post_thumbnail( $id ) ) {
						echo get_the_post_thumbnail( $id, array(70,70) );
					}
				break;

				case 'teacher':

					$teachers = get_post_meta ( $id, '_teachers', TRUE );
					$teachers = is_array ( $teachers ) ? $teachers : array ();

					foreach( $teachers as $teacher ){
						echo '<a href="'.get_permalink( $teacher ).'" title="'.get_the_title( $teacher ).'">'. get_the_title( $teacher ).'</a>';
					}
				break;

				case 'style':
					$styles = get_post_meta ( $id, '_styles', TRUE );
					$styles = is_array ( $styles ) ? $styles : array ();
					foreach( $styles as $style ){
						echo '<a href="'.get_permalink( $style ).'" title="'.get_the_title( $style ).'">'. get_the_title( $style ).'</a>';
					}
				break;

				case 'dt_yoga_video_durations':
					echo get_the_term_list($id, 'dt_yoga_video_durations', '', ', ','');
				break;

				case 'dt_yoga_student_level':
					echo get_the_term_list($id, 'dt_yoga_student_level', '', ', ','');
				break;
			}
		}

		function save_post_meta( $post_id ) {

			if( key_exists ( '_inline_edit',$_POST )) :
				if ( wp_verify_nonce($_POST['_inline_edit'], 'inlineeditnonce')) return;
			endif;

			if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

			if (!current_user_can('edit_post', $post_id) ) return;

			if( key_exists( 'dt_theme_yoga_video_meta_nonce',$_POST ) ) :
				if ( ! wp_verify_nonce( $_POST['dt_theme_yoga_video_meta_nonce'], 'dt_theme_yoga_video_nonce') ) return;
			endif;

			if ( (key_exists('post_type', $_POST)) && ('dt_yoga_videos' == $_POST['post_type']) ) :

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

					if( isset( $_POST['teachers'] ) )	{
						update_post_meta ( $post_id, "_teachers", array_unique(array_filter( $_POST['teachers'] )) );
					} else {
						delete_post_meta( $post_id, "_teachers", "" );
					}					

					if( isset( $_POST['styles'] ) )	{
						update_post_meta ( $post_id, "_styles", array_unique(array_filter($_POST['styles'])) );
					}else{
						delete_post_meta( $post_id, "_styles", "" );
					}
					
					$settings['video-url'] = isset( $_POST['video-url'] ) ? $_POST['video-url'] : '';
					$settings['sub-title'] = isset( $_POST['sub-title'] ) ? $_POST['sub-title'] : '';
					$settings['is-premium-video'] = isset( $_POST['is-premium-video'] ) ? $_POST['is-premium-video'] : '';

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
			
			if (is_singular( 'dt_yoga_videos' )) {
				if (! file_exists ( get_stylesheet_directory () . '/single-dt_yoga_videos.php' )) {
					$template = plugin_dir_path ( __FILE__ ) . 'templates/single-dt_yoga_videos.php';
				}
			}
			
			return $template;
		}		
	}
}?>