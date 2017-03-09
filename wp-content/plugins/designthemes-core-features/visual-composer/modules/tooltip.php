<?php add_action( 'vc_before_init', 'dt_sc_tooltip_vc_map' );
function dt_sc_tooltip_vc_map() {
	vc_map( array(
		"name" => esc_html__( "Tooltip", 'veda-core' ),
		"base" => "dt_sc_tooltip",
		"icon" => "dt_sc_tooltip",
		"category" => DT_VC_CATEGORY,
		'description' => esc_html__( 'Section for Tooltips', 'veda-core' ),
		"params" => array(

			// Type
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Type', 'veda-core'),
				'param_name' => 'type',
				'admin_label' => true,
				'value' => array(
					esc_html__('Default','veda-core') => '',
					esc_html__('Boxed','veda-core') => 'boxed',
				),
				'std' => ''
			),

			// Position
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Position', 'veda-core'),
				'param_name' => 'position',
				'admin_label' => true,
				'value' => array(
					esc_html__('Top','veda-core') => 'top',
					esc_html__('Right','veda-core') => 'right',
					esc_html__('Bottom','veda-core') => 'bottom',
					esc_html__('Left','veda-core') => 'left',
				),
				'std' => 'top'
			),

			// BG Color
			array(
				"type" => "colorpicker",
				"heading" => esc_html__( "Background Color", 'veda-core' ),
				"param_name" => "bgcolor",
				"description" => esc_html__( "Select tooltip background color", 'veda-core' ),
				'value' =>'#000000',
				'dependency' => array( 'element' => 'type', 'value' =>'boxed' )

      		),

			// Text Color
			array(
				"type" => "colorpicker",
				"heading" => esc_html__( "Text Color", 'veda-core' ),
				"param_name" => "textcolor",
				"description" => esc_html__( "Select tooltip text color", 'veda-core' ),
				"value" => '#ffffff',
				'dependency' => array( 'element' => 'type', 'value' =>'boxed' )
      		),

      		# URL
      		array(
      			'type' => 'vc_link',
      			'heading' => esc_html__( 'URL (Link)', 'veda-core' ),
      			'param_name' => 'link',
      			'description' => esc_html__( 'Add tooltip link', 'veda-core' )
      		),

      		# Content
      		array(
      			'type' => 'textarea_html',
      			'heading' => esc_html__( 'Content', 'veda-core' ),
      			'param_name' => 'content',
      			'value' => 'Lorem ipsum dolor sit amet'
      		),      		
		)
	) );
}?>