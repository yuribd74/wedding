<?php add_action( 'vc_before_init', 'dt_sc_popular_content_vc_map' );
function dt_sc_popular_content_vc_map() {
	vc_map( array(
		"name" => esc_html__( "Popular content", 'veda-core' ),
		"base" => "dt_sc_popular_content",
		"icon" => "dt_sc_popular_content",
		"category" => DT_VC_CATEGORY,
		"params" => array(

			# Title
			array(
				'type' => 'textfield',
				'param_name' => 'title',
				'heading' => esc_html__( 'Title', 'veda-core' ),
				'description' => esc_html__( 'Enter title', 'veda-core' )
			),

			# Image
			array(
				'type' => 'attach_image',
				'heading' => esc_html__('Image','veda-core'),
                'param_name' => 'image'
            ),

			# Duration
			array(
				'type' => 'textfield',
				'param_name' => 'duration',
				'heading' => esc_html__( 'Duration', 'veda-core' ),
				'description' => esc_html__( 'Enter duration', 'veda-core' )
			),

			# Price
			array(
				'type' => 'textfield',
				'param_name' => 'price',
				'heading' => esc_html__( 'Price', 'veda-core' ),
				'description' => esc_html__( 'Enter price', 'veda-core' )
			),

			# Content
			array(
				'type' => 'textarea_html',
				'heading' => esc_html__('Add content','veda-core'),
				'param_name' => 'content',
				'value' => ''
			)
		)
	) );
}?>