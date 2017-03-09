<?php add_action( 'vc_before_init', 'dt_sc_progress_bar_vc_map' );
function dt_sc_progress_bar_vc_map() {
	vc_map( array(
		"name" => esc_html__( "Progress Bar", 'veda-core' ),
		"base" => "dt_sc_progress_bar",
		"icon" => "dt_sc_progress_bar",
		"category" => DT_VC_CATEGORY,
		"params" => array(

			// Type
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Type', 'veda-core'),
				'param_name' => 'type',
				'admin_label' => true,
				'value' => array(
					esc_html__('Standard','veda-core') => 'standard',
					esc_html__('Striped','veda-core') => 'progress-striped',
					esc_html__('Active Striped','veda-core') => 'progress-striped-active'					
				),
				'std' => 'progress-striped'
			),

			// Style
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Style', 'veda-core'),
				'param_name' => 'style',
				'value' => array(
					esc_html__('Style 1','veda-core') => '',
					esc_html__('Style 2','veda-core') => 'style2',
				),
			),

			// Label			
			array(
				"type" => "textfield",
      			'admin_label' => true,
      			"heading" => esc_html__( "Label", 'veda-core' ),
      			"param_name" => "text",
      			"description" => esc_html__( "Enter text used as title of bar", 'veda-core' ),
      		),

			// Value			
			array(
				"type" => "textfield",
      			'admin_label' => true,
      			"heading" => esc_html__( "Value", 'veda-core' ),
      			"param_name" => "value",
      			"description" => esc_html__( "Enter value of bar e.g. 70% enter 70 only", 'veda-core' ),
      		),

			// Colorpicker			
			array(
				"type" => "colorpicker",
      			"heading" => esc_html__( "Color", 'veda-core' ),
      			"param_name" => "color",
      			"description" => esc_html__( "Select bar background color", 'veda-core' ),
      		),      				
		)
	) );
}?>