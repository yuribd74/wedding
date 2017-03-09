<?php add_action( 'vc_before_init', 'dt_sc_hexagon_wrapper_vc_map' );
function dt_sc_hexagon_wrapper_vc_map() {

	class WPBakeryShortCode_dt_sc_hexagon_wrapper extends WPBakeryShortCodesContainer {
	}

	class WPBakeryShortCode_dt_sc_hexagon_item extends WPBakeryShortCode {
	}

	vc_map( array(
		"name" => esc_html__( "Hexagon", 'veda-core' ),
		"base" => "dt_sc_hexagon_wrapper",
		"icon" => "dt_sc_hexagon_wrapper",
		"category" => DT_VC_CATEGORY,
		"content_element" => true,
		"js_view" => 'VcColumnView',
		'as_parent' => array( 'only' => 'dt_sc_hexagon_item' ),
		'description' => esc_html__( 'Hexagon wrapper', 'veda-core' ),
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

			# Extra Sub Title
			array(
				'type' => 'textfield',
				'param_name' => 'extratitle',
				'heading' => esc_html__( 'Extra sub title', 'veda-core' ),
				'description' => esc_html__( 'Enter extra sub title', 'veda-core' )
			),

			# Image
			array(
				'type' => 'attach_image',
				'heading' => esc_html__('Image','veda-core'),
                'param_name' => 'image'
            )												
		)
	) );
}?>