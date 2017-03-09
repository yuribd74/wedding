<?php add_action( 'vc_before_init', 'dt_sc_anyclass_style_vc_map' );
function dt_sc_anyclass_style_vc_map() {

	vc_map( array(
		"name" => __( "Any Class & Style", 'veda-core' ),
		"base" => "dt_sc_anyclass_style",
		"icon" => "dt_sc_anyclass_style",
		"category" => DT_VC_CATEGORY,
		"params" => array(

			// Custom Class
      		array(
      			"type" => "textfield",
      			"heading" => esc_html__( "Custom Class", 'veda-core' ),
      			"param_name" => "class"
      		),

			// Content
			array(
				'type' => 'textarea_html',
				'heading' => esc_html__('Content','veda-core'),
				'param_name' => 'content',
      			'value' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi hendrerit elit turpis, a porttitor tellus sollicitudin at. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.'
			),

			// Additional Style
      		array(
      			"type" => "textarea",
      			"heading" => esc_html__( "Extra Styles", 'veda-core' ),
      			"param_name" => "styles"
      		)			      		      		
		)		
	) );
}?>