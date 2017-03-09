<?php add_action( 'vc_before_init', 'dt_sc_phone_no_vc_map' );
function dt_sc_phone_no_vc_map() {
	vc_map( array(
		"name" => esc_html__( "Phone Number", 'veda-core' ),
		"base" => "dt_sc_phone_no",
		"icon" => "dt_sc_phone_no",
		"category" => DT_VC_CATEGORY,
		"params" => array(

			# Email id
			array(
				'type' => 'textfield',
				'param_name' => 'text',
				'heading' => esc_html__( 'Phone No', 'veda-core' ),
      			'admin_label' => true,
			),

			# Class
      		array(
      			"type" => "textfield",
      			"heading" => esc_html__( "Extra class name", 'veda-core' ),
      			"param_name" => "class",
      			"value" => 'icon icon-phone2',
      			'description' => esc_html__('Style particular element differently - add a class name and refer to it in custom CSS','veda-core')
      		)						
		)
	) );	
}?>