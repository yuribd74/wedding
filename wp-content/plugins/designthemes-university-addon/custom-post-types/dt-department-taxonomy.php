<?php
if( !class_exists('DTDepartmentTaxonomy') ) {

	class DTDepartmentTaxonomy {

		function __construct() {

			// Add Hook into the 'init()' action			
			add_action ( 'init', array ( $this, 'dt_init' ) );

			add_action( 'widgets_init', array( $this, 'register_sidebars' ) , 100 );
		}

		function dt_init() {

			$tax_sname = __('Department', 'veda-university');
			$tax_pname = __('Departments', 'veda-university');
			$taxslug = "university_department";

			if( function_exists( 'veda_opts_get' ) ) :
				$tax_sname	  	=	veda_opts_get( 'singular-udepartment-name', __('Department', 'veda-university') );
				$tax_pname		=	veda_opts_get( 'plural-udepartment-name', __('Departments', 'veda-university') );
				$taxslug  		=	veda_opts_get( 'udepartment-slug', 'university_department' );
			endif;

			$labels = array(
				'name'                => $tax_pname,
				'singular_name'       => $tax_sname,
				'search_items'        => __( 'Search ', 'veda-university' ) . $tax_pname,
				'all_items'           => __( 'All ', 'veda-university' ) . $tax_pname,
				'parent_item'         => __( 'Parent ', 'veda-university' ) . $tax_sname,
				'parent_item_colon'   => __( 'Parent ', 'veda-university' ) . $tax_sname . ':',
				'edit_item'           => __( 'Edit ', 'veda-university' ) . $tax_sname,
				'update_item'         => __( 'Update ', 'veda-university' ) . $tax_sname,
				'add_new_item'        => __( 'Add New ', 'veda-university' ) . $tax_sname,
				'new_item_name'       => __( 'New ', 'veda-university') . $tax_sname . __(' Name', 'veda-university' ),
				'menu_name'           => $tax_pname
			);			

			register_taxonomy ( 'departments', array('dt_faculties','dt_courses'), array(
				'hierarchical' 		  => true,
				'labels' 			  => $labels,
				'show_admin_column'   => true,
				'rewrite' 			  => array( 'slug' => $taxslug ),
				'query_var' 		  => true
			) );
		}

		function register_sidebars() {
			
			$layout = "content-full-width";
			
			if( function_exists( 'veda_opts_get' ) ) :
				$layout = veda_option('pageoptions',"udepartment-archives-page-layout");
				if( !empty( $layout) ) {
					$layout = $layout;
				}
			endif;
			
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
						'name' 			=>	esc_html__("University Department Archive | Left Sidebar",'veda-university'),
						'id'			=>	'departments-archives-sidebar-left',
						'description'   =>  esc_html__("Appears in the Left side of University Department Archive Page.","veda-university"),
						'before_widget' => 	'<aside id="%1$s" class="widget %2$s">',
						'after_widget' 	=> 	'</aside>',
						'before_title' 	=> 	$before_title,
						'after_title' 	=> 	$after_title));
				break;

				case 'with-right-sidebar':
					register_sidebar(array(
						'name' 			=>	esc_html__("University Department Archive | Right Sidebar",'veda-university'),
						'id'			=>	'departments-archives-sidebar-right',
						'description'   =>  esc_html__("Appears in the Right side of University Department Archive Page.","veda-university"),
						'before_widget' => 	'<aside id="%1$s" class="widget %2$s">',
						'after_widget' 	=> 	'</aside>',
						'before_title' 	=> 	$before_title,
						'after_title' 	=> 	$after_title));
				break;

				case 'with-both-sidebar':
					register_sidebar(array(
						'name' 			=>	esc_html__("University Department Archive | Left Sidebar",'veda-university'),
						'id'			=>	'departments-archives-sidebar-left',
						'description'   =>  esc_html__("Appears in the Left side of University Department Archive Page.","veda-university"),
						'before_widget' => 	'<aside id="%1$s" class="widget %2$s">',
						'after_widget' 	=> 	'</aside>',
						'before_title' 	=> 	$before_title,
						'after_title' 	=> 	$after_title));

					register_sidebar(array(
						'name' 			=>	esc_html__("University Department Archive | Right Sidebar",'veda-university'),
						'id'			=>	'departments-archives-sidebar-right',
						'description'   =>  esc_html__("Appears in the Right side of University Department Archive Page.","veda-university"),
						'before_widget' => 	'<aside id="%1$s" class="widget %2$s">',
						'after_widget' 	=> 	'</aside>',
						'before_title' 	=> 	$before_title,
						'after_title' 	=> 	$after_title));
				break;
			endswitch;

		}
	}
}?>