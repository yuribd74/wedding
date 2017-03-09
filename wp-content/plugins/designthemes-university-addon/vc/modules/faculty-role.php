<?php
add_action( 'vc_before_init', 'dt_sc_current_faculty_role_vc_map' );
function dt_sc_current_faculty_role_vc_map() {

	vc_map( array(
		"name" => esc_html__("Faculty Role", "veda-university"),
		'description' => esc_html__("Role of current faculty", "veda-university"),
		"base" => "dt_sc_current_faculty_role",
		"icon" => "dt_sc_current_faculty_role",
		"category" => esc_html__('University',"veda-university"),
		'description' => esc_html__("Show current faculty Role", "veda-university"),
		"params" => array(
          	array(
          		'type' => 'textfield',
          		'heading' => esc_html__( 'Extra class name', 'veda-university' ),
          		'param_name' => 'class',
          		'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'veda-university' )
          	)			
		)
	) );
}?>