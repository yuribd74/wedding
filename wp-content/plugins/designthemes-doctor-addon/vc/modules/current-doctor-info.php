<?php
add_action( 'vc_before_init', 'dt_sc_current_doctor_info_vc_map' );
function dt_sc_current_doctor_info_vc_map() {

	$plural_name    = esc_html__('Doctors', 'veda-doctor');
	if( function_exists( 'veda_opts_get' ) ) :
		$plural_name	=	veda_opts_get( 'plural-doctor-name', $plural_name );
	endif;

	vc_map( array(
		"name" => esc_html__("Doctor Info", "veda-doctor"),
		"base" => "dt_sc_current_doctor_info",
		"icon" => "dt_sc_current_doctor_info",
		"category" => $plural_name,
		'description' => esc_html__("Information of current doctor", "veda-doctor"),
		"params" => array(

          	array(
          		'type' => 'textfield',
          		'heading' => esc_html__( 'Extra class name', 'veda-doctor' ),
          		'param_name' => 'class',
          		'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'veda-doctor' )
          	)
		)
	) );
}?>