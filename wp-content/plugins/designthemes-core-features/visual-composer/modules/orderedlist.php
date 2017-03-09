<?php add_action( 'vc_before_init', 'dt_sc_fancy_ol_vc_map' );
function dt_sc_fancy_ol_vc_map() {

	global $variations;

	vc_map( array(
		"name" => esc_html__( "Fancy Ordered List", 'veda-core' ),
		"base" => "dt_sc_fancy_ol",
		"icon" => "dt_sc_fancy_ol",
		"category" => DT_VC_CATEGORY,
		"params" => array(

			// Style
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Style', 'veda-core'),
				'param_name' => 'style',
				'admin_label' => true,
				'value' => array(
					'Decimal' => 'decimal',
					'Decimal With Leading Zero' => 'decimal-leading-zero',
					'Lower Alpha' => 'lower-alpha',
					'Lower Roman' => 'lower-roman',
					'Upper Alpha' => 'upper-alpha',
					'Upper Roman' => 'upper-roman',
				)
			),

			// Style
			array(
				'type' => 'dropdown',
				'admin_label' => true,
				'heading' => esc_html__('Variation', 'veda-core'),
				'param_name' => 'variation',
      			'value' => $variations,
      		),

			// Content
			array(
				'type' => 'textarea_html',
				'heading' => esc_html__('Add Unordered List','veda-core'),
				'param_name' => 'content',
				'value' => '<ol><li>Lorem ipsum dolor sit</li><li>Praesent convallis nibh</li><li>Nullam ac sapien sit</li><li>Phasellus auctor augue</li></ol>'
			),

			// Custom Class
      		array(
      			"type" => "textfield",
      			'admin_label' => true,
      			"heading" => esc_html__( "Custom Class", 'veda-core' ),
      			"param_name" => "class"
      		)			
		)
	) );
} ?>