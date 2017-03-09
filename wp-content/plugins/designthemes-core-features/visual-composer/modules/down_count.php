<?php add_action( 'vc_before_init', 'dt_sc_down_count_vc_map' );
function dt_sc_down_count_vc_map() {

	vc_map( array(
		"name" => esc_html__( "Coming Soon ( Counter )", 'veda-core' ),
		"base" => "dt_sc_down_count",
		"icon" => "dt_sc_down_count",
		"category" => DT_VC_CATEGORY,
		"params" => array(

			// Custom Class
      		array(
      			"type" => "textfield",
      			'admin_label' => true,
      			"heading" => esc_html__( "Custom Class", 'veda-core' ),
      			"param_name" => "class"
      		),			
		)		
	) );
}