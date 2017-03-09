<?php
add_action( 'vc_before_init', 'dt_sc_query_doctors_vc_map' );
function dt_sc_query_doctors_vc_map() {

	$plural_name    = esc_html__('Doctors', 'veda-doctor');
	if( function_exists( 'veda_opts_get' ) ) :
		$plural_name	=	veda_opts_get( 'plural-doctor-name', $plural_name );
	endif;

	vc_map( array(
		"name" => esc_html__("Random / Recent Doctors", "veda-doctor"),
		"base" => "dt_sc_query_doctors",
		"icon" => "dt_sc_query_doctors",
		"category" => $plural_name,
		'description' => esc_html__("To show random or recent doctors", "veda-doctor"),
		"params" => array(

			array(
				'type' => 'dropdown',
				'param_name' => 'query',
				'value' => array(
					esc_html__('Recent','veda-doctor') => 'recent',
					esc_html__('Random','veda-doctor') => 'random',
				),
				'std' => 'recent',
				'heading' => esc_html__( 'Recent / Random', 'veda-doctor' ),
      			'admin_label' => true,
				'description' => esc_html__( 'Select Recent or Random doctor display.', 'veda-doctor' )				
			),

			array( 
				'type' => 'dropdown',
				'param_name' => 'column',
				'value' => array(
					esc_html__( 'Two Columns', 'veda-doctor' ) => '2',
					esc_html__( 'Three Columns', 'veda-doctor') => '3',
					esc_html__( 'Four Columns', 'veda-doctor') => '4',
					esc_html__( 'Five Columns', 'veda-doctor') => '5',
					esc_html__( 'Six Columns', 'veda-doctor') => '6',
				),
      			'admin_label' => true,
      			'std' => 4,
				'heading' => esc_html__( 'Layout', 'veda-doctor' ),
				'description' => esc_html__( 'Select doctors display layout.', 'veda-doctor' )				
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
				'description' => esc_html__( 'Select doctor display style.', 'veda-doctor' )				
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