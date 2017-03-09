<?php add_action( 'vc_before_init', 'dt_sc_align_vc_map' );
function dt_sc_align_vc_map() {

	vc_map( array( 

		"name" => esc_html__( "Content Alignment", 'veda-core' ),
		"base" => "dt_sc_align",
		"icon" => "dt_sc_align",
		"category" => DT_VC_CATEGORY,
		"params" => array(

			// Align
			array(
				'type' => 'dropdown',
				'admin_label' => true,
				'heading' => esc_html__('Alignment', 'veda-core'),
				'param_name' => 'align',
				'value' => array( 'Left' => 'left', 'Center' => 'center', 'Right' => 'right' ),
				'std' => 'center'
			),

			// Content
			array(
				'type' => 'textarea_html',
				'heading' => esc_html__('Content','veda-core'),
				'param_name' => 'content',
      			'value' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi hendrerit elit turpis, a porttitor tellus sollicitudin at. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.'
			),

			// Custom Class
      		array(
      			"type" => "textfield",
      			'admin_label' => true,
      			"heading" => esc_html__( "Custom Class", 'veda-core' ),
      			"param_name" => "class"
      		),

			// Additional Style
      		array(
      			"type" => "textfield",
      			"heading" => esc_html__( "Extra Styles", 'veda-core' ),
      			"param_name" => "styles"
      		),

      		// CSS
			array(
				'type' => 'css_editor',
				'heading' => esc_html__( 'Design', 'veda-core' ),
				'param_name' => 'css',
				'group' => esc_html__( 'CSS', 'veda-core' ),
			),			
		)
	) );
}?>