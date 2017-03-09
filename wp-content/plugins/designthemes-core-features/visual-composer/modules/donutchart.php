<?php add_action( 'vc_before_init', 'dt_sc_donutchart_vc_map' );
function dt_sc_donutchart_vc_map() {
	vc_map( array(
		"name" => esc_html__( "Donut chart", 'veda-core' ),
		"base" => "dt_sc_donutchart",
		"icon" => "dt_sc_donutchart",
		"category" => DT_VC_CATEGORY,
		"params" => array(

			// Label			
			array(
				"type" => "textfield",
      			'admin_label' => true,
      			"heading" => esc_html__( "Label", 'veda-core' ),
      			"param_name" => "title",
      			"description" => esc_html__( "Enter text used as title of donut chart", 'veda-core' ),
      		),

			// Size
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Size', 'veda-core'),
				'param_name' => 'size',
				'admin_label' => true,
				'value' => array(
					esc_html__('Small','veda-core') => 'small',
					esc_html__('Medium','veda-core') => 'medium',
					esc_html__('Large','veda-core') => 'large'					
				),
				'std' => 'medium'
			),

			// Datasize
			array(
				"type" => "textfield",
      			"heading" => esc_html__( "Data size", 'veda-core' ),
      			"param_name" => "datasize",
      			'value' => 100,
      			"description" => esc_html__( "Enter data size", 'veda-core' ),
      		),

			// Datasize
			array(
				"type" => "textfield",
      			"heading" => esc_html__( "Data size", 'veda-core' ),
      			"param_name" => "datapercent",
      			'value' => 60,
      			"description" => esc_html__( "Enter data percentage eg: 70% , give 70 only", 'veda-core' ),
      		),

			// BG Color			
			array(
				"type" => "colorpicker",
      			"heading" => esc_html__( "Background color", 'veda-core' ),
      			"param_name" => "bgcolor",
      			"description" => esc_html__( "Select chart background color", 'veda-core' ),
      			'value' => '#79deff'
      		),

			// FG Color			
			array(
				"type" => "colorpicker",
      			"heading" => esc_html__( "Foreground color", 'veda-core' ),
      			"param_name" => "fgcolor",
      			"description" => esc_html__( "Select chart foreground color", 'veda-core' ),
      			'value' => '#666666'
      		)      		      		      					
		)
	) );
}?>