<?php
add_action( 'vc_before_init', 'dt_sc_program_list_vc_map' );
function dt_sc_program_list_vc_map() {

	$plural_name    = esc_html__('Programs', 'veda-program');
	if( function_exists( 'veda_opts_get' ) ) :
		$plural_name	=	veda_opts_get( 'plural-program-name', $plural_name );
	endif;

	vc_map( array(
		"name" => esc_html__("Filterable Programs", "veda-program"),
		"base" => "dt_sc_program_list",
		"icon" => "dt_sc_program_list",
		"category" => $plural_name,
		"params" => array(

     		# Categories
      		array(
      			"type" => "textfield",
      			"heading" => esc_html__( "Categories", "veda-program" ),
      			"param_name" => "categories",
				'description' => esc_html__( 'Enter category id or ids, seperated by comma', 'veda-program' ),
      		),

			# Posts Column
			array(
				'type' => 'dropdown',
				'param_name' => 'posts_column',
				'value' => array(
					esc_html__('Two columns','veda-program') => 'one-half-column',
					esc_html__('Three columns','veda-program') => 'one-third-column'
				),
				'heading' => esc_html__( 'Columns', 'veda-program' ),
				'std' => 'one-half-column'
			),

     		# Limit
      		array(
      			"type" => "textfield",
      			"heading" => esc_html__( "Limit", "veda-program" ),
      			"param_name" => "limit",
      			"value" => -1,
				'description' => esc_html__( 'Enter number of trainers to display.', 'veda-program' ),
      		),

			# Filter
			array(
				'type' => 'dropdown',
				'param_name' => 'filter',
				'value' => array(
					esc_html__('Yes','veda-program') => 'yes',
					esc_html__('No','veda-program') => 'no'
				),
				'heading' => esc_html__( 'Filter?', 'veda-program' ),
				'std' => 'yes'
			),      		
		)		
	) );
}?>