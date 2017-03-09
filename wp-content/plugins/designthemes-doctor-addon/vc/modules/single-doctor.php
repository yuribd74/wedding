<?php
add_action( 'vc_before_init', 'dt_sc_doctor_item_vc_map' );
function dt_sc_doctor_item_vc_map() {

	$plural_name    = esc_html__('Doctors', 'veda-doctor');
	if( function_exists( 'veda_opts_get' ) ) :
		$plural_name	=	veda_opts_get( 'plural-doctor-name', $plural_name );
	endif;

	vc_map( array(
		"name" => esc_html__("Doctor", "veda-doctor"),
		"base" => "dt_sc_doctor_item",
		"icon" => "dt_sc_doctor_item",
		"category" => $plural_name,
		'description' => esc_html__("Add a single doctor", "veda-doctor"),
		"params" => array(

			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Post ID', 'veda-doctor' ),
				'param_name' => 'id',
				'description' => esc_html__('Enter doctor post id','veda-doctor')				
			),

			array( 
				'type' => 'dropdown',
				'param_name' => 'type',
				'value' => array(
					esc_html__( 'Style 1', 'veda-doctor' ) => 'style-1',
					esc_html__( 'Style 2', 'veda-doctor' ) => 'style-2',
				),
      			'admin_label' => true,
				'heading' => esc_html__( 'Style', 'veda-doctor' ),
				'description' => esc_html__( 'Select single doctor display style.', 'veda-doctor' )				
			),

          	array(
          		'type' => 'textfield',
          		'heading' => esc_html__( 'Extra class name', 'veda-doctor' ),
          		'param_name' => 'class',
          		'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'veda-doctor' )
          	)
		)
	) );
}?>