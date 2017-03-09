<?php add_action( 'vc_before_init', 'dt_sc_custom_menu_vc_map' );
function dt_sc_custom_menu_vc_map() {

	vc_map( array(
		"name" => esc_html__( "Custom Menu", 'veda-core' ),
		"base" => "dt_sc_custom_menu",
		"icon" => "dt_sc_custom_menu",
		"category" => DT_VC_CATEGORY,
		"params" => array(

			# Class
      		array(
      			"type" => "textfield",
      			"heading" => esc_html__( "Extra class name", 'veda-core' ),
      			"param_name" => "class",
      			'description' => esc_html__('Style particular element differently - add a class name and refer to it in custom CSS','veda-core')
      		)
		)
	) );
} ?>