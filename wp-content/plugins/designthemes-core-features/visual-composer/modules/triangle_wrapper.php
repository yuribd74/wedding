<?php add_action( 'vc_before_init', 'dt_sc_triangle_wrapper_vc_map' );
function dt_sc_triangle_wrapper_vc_map() {
	vc_map( array(
		"name" => esc_html__( "Triangle wrapper", 'veda-core' ),
		"base" => "dt_sc_triangle_wrapper",
		"icon" => "dt_sc_triangle_wrapper",
		"category" => DT_VC_CATEGORY,
		"params" => array(

			# Title
			array(
				'type' => 'textfield',
				'param_name' => 'title',
				'heading' => esc_html__( 'Title', 'veda-core' ),
				'description' => esc_html__( 'Enter title', 'veda-core' )
			),

			# Sub Title
			array(
				'type' => 'textfield',
				'param_name' => 'subtitle',
				'heading' => esc_html__( 'Sub title', 'veda-core' ),
				'description' => esc_html__( 'Enter sub title', 'veda-core' )
			),

			# Image
			array(
				'type' => 'attach_image',
				'heading' => esc_html__('Image','veda-core'),
                'param_name' => 'image'
            ),

            # Link
			array(
				'type' => 'vc_link',
				'heading' => esc_html__('Link','veda-core'),
                'param_name' => 'link'
            ),

			# Type
			array(
				'type' => 'dropdown',
				'param_name' => 'type',
				'heading' => esc_html__('Type','veda-core'),
				'value' => array( esc_html__('Image First','veda-core') => '', esc_html__('Details First','veda-core') => 'alter' )
			)                        						
		)
	) );	
}?>