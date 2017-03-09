<?php
add_action( 'vc_before_init', 'dt_sc_doctors_with_filter_vc_map' );
function dt_sc_doctors_with_filter_vc_map() {

	$plural_name    = esc_html__('Doctors', 'veda-doctor');
	if( function_exists( 'veda_opts_get' ) ) :
		$plural_name	=	veda_opts_get( 'plural-doctor-name', $plural_name );
	endif;

	vc_map( array(
		"name" => esc_html__("Filterable Doctors", "veda-doctor"),
		"base" => "dt_sc_doctors_with_filter",
		"icon" => "dt_sc_doctors_with_filter",
		"category" => $plural_name,
		'description' => esc_html__("To Show doctors with filterable option", "veda-doctor"),
		"params" => array(
			array( 
				'type' => 'dropdown',
				'param_name' => 'column',
				'value' => array(
					esc_html__( 'One Column', 'veda-doctor' ) => '1',
					esc_html__( 'Two Columns', 'veda-doctor' ) => '2',
					esc_html__( 'Three Columns', 'veda-doctor') => '3'
				),
      			'admin_label' => true,
      			'std' => 3,
				'heading' => esc_html__( 'Layout', 'veda-doctor' ),
				'description' => esc_html__( 'Select filterable doctor display layout.', 'veda-doctor' )				
			)			
		)
	) );
}?>