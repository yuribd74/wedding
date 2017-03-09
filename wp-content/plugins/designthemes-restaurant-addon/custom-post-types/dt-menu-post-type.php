<?php
if (! class_exists ( 'DTMenuPostType' )) {
	class DTMenuPostType {

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
			
			add_action ( 'edited_menu_entries', array (
					$this,
					'save_taxonomy_custom_fields' 
			) );

			add_action ( 'create_menu_entries', array (
					$this,
					'save_taxonomy_custom_fields' 
			) );
		}

		/**
		 * A function hook that the WordPress core launches at 'admin_init' points
		 */
		function dt_admin_init() {

			add_action ( 'add_meta_boxes', array (
					$this,
					'dt_add_menu_meta_box'
			) );

			add_filter ( 'manage_edit-dt_menus_columns', array (
					$this,
					'dt_menus_edit_columns'
			) );

			add_action ( 'manage_posts_custom_column', array (
					$this,
					'dt_menus_columns_display'
			), 10, 2 );

			add_action ( 'menu_entries_add_form_fields', array (
					$this,
					'add_taxonomy_custom_fields'
			) );

			add_action ( 'menu_entries_edit_form_fields', array (
					$this,
					'edit_taxonomy_custom_fields'
			) );
		}

		/**
		 Taxonomy add custom field
		 */
		function add_taxonomy_custom_fields($tag) { ?>

            <tr class="form-field">
                <th scope="row" valign="top">
                    <label for="icon_class"><?php esc_html_e('Featured Image', 'veda-restaurant'); ?></label>
                </th>
                <td>
	                <div class="image-preview-container" style="width:97%;">
                        <input type="text" name="term_meta[thumb]" id="term_meta[thumb]" style="width:60%;" class="uploadfield" />
                        <input type="button" value="<?php esc_attr_e('Upload', 'veda-restaurant'); ?>" class="upload_image_button show_preview button">&nbsp;
                        <input type="button" value="<?php esc_attr_e('Remove', 'veda-restaurant'); ?>" class="upload_image_reset button button-primary">
                        <?php veda_adminpanel_image_preview('',false,'dummy-images/post-thumb.jpg');?><br />
					</div>                        
                    <span class="description"><?php esc_html_e('The feature image of menu type.', 'veda-restaurant'); ?></span>
                    <div class="hr_invisible"></div>
                </td>
            </tr><?php
		}

		/**
		 Taxonomy edit custom field
		 */
		function edit_taxonomy_custom_fields($tag) {
			$t_id = $tag->term_id;
			$term_meta = get_option( "taxonomy_term_$t_id" ); ?>

            <tr class="form-field">
                <th scope="row" valign="top">
                     <label for="icon_class"><?php esc_html_e('Featured Image', 'veda-restaurant'); ?></label>
                </th>
                <td>
	                <div class="image-preview-container" style="width:97%;">
                    	<?php $v = isset($term_meta['thumb']) ? $term_meta['thumb'] : ''; ?>
                        <input type="text" name="term_meta[thumb]" id="term_meta[thumb]" style="width:60%;" class="uploadfield" value="<?php echo esc_attr($v);?>" />
                        <input type="button" value="<?php esc_attr_e('Upload', 'veda-restaurant'); ?>" class="upload_image_button show_preview button">&nbsp;
                        <input type="button" value="<?php esc_attr_e('Remove', 'veda-restaurant'); ?>" class="upload_image_reset button button-primary">
                        <?php veda_adminpanel_image_preview($v,false,'dummy-images/post-thumb.jpg');?><br />
					</div>                        
                    <span class="description"><?php esc_html_e('The feature image of menu type.', 'veda-restaurant'); ?></span>
                    <div class="hr_invisible"></div>
                </td>
            </tr><?php
		}

		/**
		 Taxonomy save custom field
		 */
		function save_taxonomy_custom_fields( $term_id ) {
			if ( isset( $_POST['term_meta'] ) ) {
				$t_id = $term_id;
				$term_meta = get_option( "taxonomy_term_$t_id" );
				$cat_keys = array_keys( $_POST['term_meta'] );
				foreach ( $cat_keys as $key ){
					if ( isset( $_POST['term_meta'][$key] ) ){
						$term_meta[$key] = $_POST['term_meta'][$key];
					}
				}
				//save the option array
				update_option( "taxonomy_term_$t_id", $term_meta );
			}
		}

		/**
		 */
		function createPostType() {
			$postslug	 	= 'dt_menus'; 					$taxslug  = 'menu_entries';
			$singular_name  = __('Menu', 'veda-restaurant'); 	$plural_name  = __('Menus', 'veda-restaurant');
			$tax_sname 		= __( 'Category','veda-restaurant' );	$tax_pname    = __( 'Categories','veda-restaurant' );

			if( function_exists( 'veda_opts_get' ) ) :
				$postslug 		=	veda_opts_get( 'single-menu-slug', 'dt_menus' );
				$taxslug  		=	veda_opts_get( 'menu-category-slug', 'menu_entries' );
				$singular_name  =	veda_opts_get( 'singular-menu-name', __('Menu', 'veda-restaurant') );
				$plural_name	=	veda_opts_get( 'plural-menu-name', __('Menus', 'veda-restaurant') );
				$tax_sname	  	=	veda_opts_get( 'singular-menu-tax-name', __('Category', 'veda-restaurant') );
				$tax_pname		=	veda_opts_get( 'plural-menu-tax-name', __('Categories', 'veda-restaurant') );
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
							'thumbnail'
					),

					'public' => true,
					'show_ui' => true,
					'show_in_menu' => true,
					'menu_position' => 10,
					'menu_icon' => 'dashicons-welcome-widgets-menus',
					
					'show_in_nav_menus' => true,
					'publicly_queryable' => true,
					'exclude_from_search' => false,
					'has_archive' => true,
					'query_var' => true,
					'can_export' => true,
					'rewrite' => array( 'slug' => $postslug ),
					'capability_type' => 'post'
			);

			register_post_type ( 'dt_menus', $args );

			$labels = array(
					'name'              => 	$tax_pname,
					'singular_name'     => 	$tax_sname,
					'search_items'      => 	__( 'Search ', 'veda-restaurant' ) . $tax_pname,
					'all_items'         => 	__( 'All ', 'veda-restaurant' ) . $tax_pname,
					'parent_item'       => 	__( 'Parent ', 'veda-restaurant' ) . $tax_sname,
					'parent_item_colon' => 	__( 'Parent ', 'veda-restaurant' ) . $tax_sname . ':',
					'edit_item'         => 	__( 'Edit ', 'veda-restaurant' ) . $tax_sname,
					'update_item'       => 	__( 'Update ', 'veda-restaurant' ) . $tax_sname,
					'add_new_item'      => 	__( 'Add New ', 'veda-restaurant' ) . $tax_sname,
					'new_item_name'     => 	__( 'New ', 'veda-restaurant') . $tax_sname . __(' Name', 'veda-restaurant' ),
					'menu_name'         => 	$tax_pname
			);

			register_taxonomy ( 'menu_entries', array (
					'dt_menus' 
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
		function dt_add_menu_meta_box() {
			add_meta_box ( 'dt-menu-default-metabox', __ ( 'Default Options', 'veda-restaurant' ), array (
					$this,
					'dt_default_metabox' 
			), 'dt_menus', 'normal', 'default' );
		}
		
		/**
		 */
		function dt_default_metabox() {
			include_once plugin_dir_path ( __FILE__ ) . 'metaboxes/dt_menu_default_metabox.php';
		}
		
		/**
		 *
		 * @param unknown $columns        	
		 * @return multitype:
		 */
		function dt_menus_edit_columns($columns) {
			
			$newcolumns = array (
				"cb" => "<input type=\"checkbox\" />",
				"dt_menu_thumb" => __("Image", "veda-restaurant"),
				"title" => __("Title", "veda-restaurant"),
				"type" => __("Type", "veda-restaurant")
			);
			$columns = array_merge ( $newcolumns, $columns );
			return $columns;
		}

		/**
		 *
		 * @param unknown $columns
		 * @param unknown $id
		 */
		function dt_menus_columns_display($columns, $id) {
			global $post;

			switch ($columns) {

				case "dt_menu_thumb" :
				    $image = wp_get_attachment_image(get_post_thumbnail_id($id), array(75,75));
					if(!empty($image)):
					  	echo $image;
					endif;
				break;

				case "type" :
					$settings = get_post_meta($id, '_custom_settings', true);
					$type 	  = array_key_exists("veg_type",$settings) ?  $settings['veg_type'] : '';
					switch($type):
						case "veg" :
							echo __("Veg", "veda-restaurant");
						break;
						case "non-veg" :
							echo __("Non-Veg", "veda-restaurant");
						break;
						default :
							echo "-";
					endswitch;
				break;
			}
		}

		/**
		 */
		function save_post_meta($post_id) {

			if( key_exists ( '_inline_edit',$_POST )) :
				if ( wp_verify_nonce($_POST['_inline_edit'], 'inlineeditnonce')) return;
			endif;

			if( key_exists( 'dt_theme_menu_meta_nonce',$_POST ) ) :
				if ( ! wp_verify_nonce( $_POST['dt_theme_menu_meta_nonce'], 'dt_theme_menu_nonce') ) return;
			endif;

			if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

			if (!current_user_can('edit_post', $post_id)) :
				return;
			endif;

			if ( (key_exists('post_type', $_POST)) && ('dt_menus' == $_POST['post_type']) ) :

				$settings = array ();

				$settings ['meta_title'] = isset ( $_POST['dttheme-meta-title'] ) ? $_POST['dttheme-meta-title'] : "";
				$settings ['meta_value'] = isset ( $_POST['dttheme-meta-value'] ) ? $_POST['dttheme-meta-value'] : "";

				$settings ['details'] 	= isset ( $_POST ['_details'] ) ? stripslashes ( $_POST ['_details'] ) : "";
				$settings ['price'] 	= isset ( $_POST ['_price'] ) ? stripslashes ( $_POST ['_price'] ) : "";
				$settings ['veg_type'] 	= isset ( $_POST ['_veg_type'] ) ? stripslashes ( $_POST ['_veg_type'] ) : "";

				update_post_meta ( $post_id, "_custom_settings", array_filter ( $settings ) );

				// for default category
				$terms = wp_get_object_terms ( $post_id, 'menu_entries' );
				if (empty ( $terms )) :
					wp_set_object_terms ( $post_id, 'Uncategorized', 'menu_entries', true );
				endif;
			endif;
		}

		/**
		 * To load menu pages in front end
		 *
		 * @param string $template        	
		 * @return string
		 */
		function dt_template_include($template) {
			if (is_tax ( 'menu_entries' )) {
				if (! file_exists ( get_stylesheet_directory () . '/taxonomy-menu_entries.php' )) {
					$template = plugin_dir_path ( __FILE__ ) . 'templates/taxonomy-menu_entries.php';
				}
			}
			return $template;
		}
	}
}
?>