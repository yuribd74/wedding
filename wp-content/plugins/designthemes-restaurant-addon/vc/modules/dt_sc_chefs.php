<?php
add_action( 'vc_before_init', 'dt_sc_chefs_vc_map' );
function dt_sc_chefs_vc_map() {
	vc_map( array(
		"name" => esc_html__("Chefs", "veda-restaurant"),
		"base" => "dt_sc_chefs",
		"icon" => "dt_sc_chefs",
		"category" => esc_html__('Restaurant','veda-restaurant'),
		'description' => esc_html__("Show chefs", "veda-restaurant"),
		"params" => array(

			array( 
				'type' => 'dropdown',
				'param_name' => 'type',
				'value' => array(
					esc_html__( 'Type 1', 'veda-restaurant' ) => 'type1',
					esc_html__( 'Type 2', 'veda-restaurant' ) => 'type2',
				),
      			'admin_label' => true,
      			'std' => 'type1',
				'heading' => esc_html__( 'Layout', 'veda-restaurant' ),
				'description' => esc_html__( 'Select chefs display layout.', 'veda-restaurant' )				
			),

          	array(
          		'type' => 'textfield',
          		'heading' => esc_html__( 'Limit', 'veda-restaurant' ),
          		'param_name' => 'limit',
          		'value' => -1,
          		'description' => esc_html__( 'Put number of chefs to show', 'veda-restaurant' )
          	)
		)
	) );
}?>