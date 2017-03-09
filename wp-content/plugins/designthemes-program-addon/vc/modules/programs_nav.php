<?php
add_action( 'vc_before_init', 'dt_sc_program_nav_vc_map' );
function dt_sc_program_nav_vc_map() {

	$plural_name    = esc_html__('Programs', 'veda-program');
	if( function_exists( 'veda_opts_get' ) ) :
		$plural_name	=	veda_opts_get( 'plural-program-name', $plural_name );
	endif;

	vc_map( array(
		"name" => esc_html__("Programs Navigation ", "veda-program"),
		"base" => "dt_sc_programs_nav",
		"icon" => "dt_sc_programs_nav",
		"category" => $plural_name,
		"params" => array(
			# Limit
            array(
            	"type" => "textfield",
            	"heading" => esc_html__( "Limit", "veda-program" ),
            	"param_name" => "limit",
            	"value" => -1,
            	'description' => esc_html__( 'Enter number of programs to display.', 'veda-program' ),
            )
		)		
	) );
}?>