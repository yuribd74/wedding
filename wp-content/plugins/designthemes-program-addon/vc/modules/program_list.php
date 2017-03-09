<?php
add_action( 'vc_before_init', 'dt_sc_program_list2_vc_map' );
function dt_sc_program_list2_vc_map() {

	$plural_name    = esc_html__('Programs', 'veda-program');
	if( function_exists( 'veda_opts_get' ) ) :
		$plural_name	=	veda_opts_get( 'plural-program-name', $plural_name );
	endif;

	vc_map( array(
		"name" => esc_html__("Programs List", "veda-program"),
		"base" => "dt_sc_program_list2",
		"icon" => "dt_sc_program_list2",
		"category" => $plural_name,
		"params" => array(

           		# Categories
            	array(
					"type" => "textfield",
					"heading" => esc_html__( "Categories", "veda-program" ),
					"param_name" => "categories",
					"description" => esc_html__( 'Enter category id or ids, seperated by comma', 'veda-program' ),
            	),

           		# Limit
            	array(
					"type" => "textfield",
					"heading" => esc_html__( "Limit", "veda-program" ),
					"param_name" => "limit",
					"value" => -1,
					"description" => esc_html__( 'Enter number of programs to display.', 'veda-program' ),
            	),
				
				# Button Text
            	array(
					"type" => "textfield",
					"heading" => esc_html__( "Button Text", "veda-program" ),
					"param_name" => "button_text",
					"value" => esc_html__('Join Training', 'veda-program'),
					"description" => esc_html__( 'Enter button text.', 'veda-program' ),
            	)      		
	     )		
	) );
}?>