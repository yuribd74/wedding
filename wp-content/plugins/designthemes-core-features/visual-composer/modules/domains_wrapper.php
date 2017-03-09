<?php add_action( 'vc_before_init', 'dt_sc_domains_wrapper_vc_map' );
function dt_sc_domains_wrapper_vc_map() {

	class WPBakeryShortCode_dt_sc_domains_wrapper extends WPBakeryShortCodesContainer {
	}

	class WPBakeryShortCode_dt_sc_domain_box extends WPBakeryShortCode {
	}

	vc_map( array(
		"name" => esc_html__( "Domain wrapper", 'veda-core' ),
		"base" => "dt_sc_domains_wrapper",
		"icon" => "dt_sc_domains_wrapper",
		"category" => DT_VC_CATEGORY,
		"content_element" => true,
		"js_view" => 'VcColumnView',
		'as_parent' => array( 'only' => 'dt_sc_domain_box' ),
		'description' => esc_html__( 'Hexagon wrapper', 'veda-core' ),		
		"params" => array(

          	# Extra class name
          	array(
          		'type' => 'textfield',
          		'heading' => esc_html__( 'Extra class name', 'veda-core' ),
          		'param_name' => 'class',
          		'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS', 'veda-core' )
          	)			
		)
	) );
}?>