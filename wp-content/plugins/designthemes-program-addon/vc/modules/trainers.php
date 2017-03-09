<?php
add_action( 'vc_before_init', 'dt_sc_trainers_vc_map' );
function dt_sc_trainers_vc_map() {

	$plural_name    = esc_html__('Programs', 'veda-program');
	if( function_exists( 'veda_opts_get' ) ) :
		$plural_name	=	veda_opts_get( 'plural-program-name', $plural_name );
	endif;

	vc_map( array(
		"name" => esc_html__("Trainers", "veda-program"),
		"base" => "dt_sc_trainers",
		"icon" => "dt_sc_trainers",
		"category" => $plural_name,
		"params" => array(

			# Type
			array(
				'type' => 'dropdown',
				'param_name' => 'type',
				'value' => array(
					esc_html__(' Type 1','veda-program') => 'type1',
					esc_html__(' Type 2','veda-program') => 'type2'
				),
				'heading' => esc_html__( 'Type', 'veda-program' ),
				'description' => esc_html__( 'Select trainers display type.', 'veda-program' ),
				'std' => 'type1'
			),

     		# Limit
      		array(
      			"type" => "textfield",
      			"heading" => esc_html__( "Limit", "veda-program" ),
      			"param_name" => "limit",
      			"value" => -1,
				'description' => esc_html__( 'Enter number of trainers to display.', 'veda-program' ),
      		)						
		)
	) );
}?>