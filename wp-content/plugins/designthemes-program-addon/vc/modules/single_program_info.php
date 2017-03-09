<?php
add_action( 'vc_before_init', 'dt_sc_program_info_vc_map' );
function dt_sc_program_info_vc_map() {

	$plural_name    = esc_html__('Programs', 'veda-program');
	if( function_exists( 'veda_opts_get' ) ) :
		$plural_name	=	veda_opts_get( 'plural-program-name', $plural_name );
	endif;

	vc_map( array(
		"name" => esc_html__("Single Program Meta", "veda-program"),
		"base" => "dt_sc_program_info",
		"icon" => "dt_sc_program_info",
		"category" => $plural_name,
		"params" => array(
			# Filter
			array(
				'type' => 'dropdown',
				'param_name' => 'meta',
				'value' => array(
					esc_html__('Yes','veda-program') => 'yes',
					esc_html__('No','veda-program') => 'no'
				),
				'heading' => esc_html__( 'Show meta?', 'veda-program' ),
				'std' => 'yes'
			)
		)		
	) );
}?>