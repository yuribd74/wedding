<?php add_action( 'vc_before_init', 'dt_sc_image_vc_map' );
function dt_sc_image_vc_map() {

	vc_map( array(
		"name" => esc_html__( "Any Image", 'veda-core' ),
		"base" => "dt_sc_image",
		"icon" => "dt_sc_image",
		"category" => DT_VC_CATEGORY,
		"params" => array(
		
			// Image
			array(
				'type' => 'attach_image',
				'heading' => esc_html__('Image','veda-core'),
				'param_name' => 'url'
            ),

			// Link
			array(
				'type' => 'vc_link',
				'heading' => esc_html__('Link','veda-core'),
				'param_name' => 'link'
            ),            
			
			# Align
      		array(
      			'type' => 'dropdown',
      			'heading' => esc_html__( 'Alignment', 'veda-core' ),
      			'param_name' => 'align',
				'value' => array( 'None' => 'alignnone', 'Left' => 'alignleft', 'Center' => 'aligncenter', 'Right' => 'alignright' ),
				'std' => 'alignnone'
			),
			
			// Additional Style
			array(
				"type" => "textfield",
				"heading" => esc_html__( "Extra Styles", 'veda-core' ),
				"param_name" => "styles"
            ),

      		# Class
      		array(
				"type" => "textfield",
      			"heading" => esc_html__( "Extra class name", 'veda-core' ),
      			"param_name" => "class",
      			'description' => esc_html__('Style particular icon box element differently - add a class name and refer to it in custom CSS','veda-core')
      		),      		
		)
	) );
}?>