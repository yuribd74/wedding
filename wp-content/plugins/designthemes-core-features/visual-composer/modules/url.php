<?php add_action( 'vc_before_init', 'dt_sc_url_vc_map' );
function dt_sc_url_vc_map() {
	vc_map( array(
		"name" => esc_html__( "Link", 'veda-core' ),
		"base" => "dt_sc_url",
		"icon" => "dt_sc_url",
		"category" => DT_VC_CATEGORY,
		"params" => array(

			# Email id
			array(
				'type' => 'vc_link',
				'param_name' => 'link',
				'heading' => esc_html__( 'Link', 'veda-core' ),
			),

			# Class
      		array(
      			"type" => "textfield",
      			"heading" => esc_html__( "Extra class name", 'veda-core' ),
      			"param_name" => "class",
      			"value" => 'icon icon-linked',
      			'description' => esc_html__('Style particular element differently - add a class name and refer to it in custom CSS','veda-core')
      		)						
		)
	) );	
}?>