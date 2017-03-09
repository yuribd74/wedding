<?php add_action( 'vc_before_init', 'dt_sc_blockquote_vc_map' );
function dt_sc_blockquote_vc_map() {

	global $variations;

	vc_map( array(
		"name" => esc_html__( "Blockquote", 'veda-core' ),
            "base" => "dt_sc_blockquote",
		"icon" => "dt_sc_blockquote",
		"category" => DT_VC_CATEGORY,
		"params" => array(

			# Types
      		array(
      			'type' => 'dropdown',
      			'heading' => esc_html__( 'Types', 'veda-core' ),
      			'param_name' => 'type',
                        'admin_label' => true,
      			'value' => array( esc_html__('Type 1','veda-core') => 'type1', esc_html__('Type 2','veda-core') => 'type2', esc_html__('Type 3','veda-core') => 'type3',
					esc_html__('Type 4','veda-core') => 'type4' ),
      			'description' => esc_html__( 'Select blockquote type', 'veda-core' ),
      		),

			# Align
      		array(
      			'type' => 'dropdown',
      			'heading' => esc_html__( 'Align', 'veda-core' ),
      			'param_name' => 'align',
                        'admin_label' => true,
                        'value' => array( 
      				esc_html__('None','veda-core') => '',
      				esc_html__('Left','veda-core') => 'alignleft',
      				esc_html__('Center','veda-core') => 'aligncenter',
      				esc_html__('Right','veda-core') => 'alignright',
      			),
      			'description' => esc_html__( 'Select blockquote type', 'veda-core' ),
      		),

      		# Cite
      		array(
      			"type" => "textfield",
      			"heading" => esc_html__( "Cite", 'veda-core' ),
      			"param_name" => "cite"
      		),

      		# Role
      		array(
      			"type" => "textfield",
      			"heading" => esc_html__( "Role", 'veda-core' ),
      			"param_name" => "role"
      		),

      		// Content
			array(
				'type' => 'textarea_html',
				'heading' => esc_html__('Content','veda-core'),
				'param_name' => 'content',
				'value' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi hendrerit elit turpis, a porttitor tellus sollicitudin at. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.'
            ),
			
			# Variation
            array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Color', 'veda-core' ),
				'admin_label' => true,
				'param_name' => 'variation',
				'value' => $variations,
				'description' => esc_html__( 'Select Text color', 'veda-core' ),
            ),
			
			# Custom Text Color
      		array(
      			'type' => 'colorpicker',
      			'heading' => esc_html__( 'Custom text color', 'veda-core' ),
      			'param_name' => 'textcolor',
				'dependency' => array( 'element' => 'variation', 'value' =>'-' ),
      			'description' => esc_html__( 'Select text color', 'veda-core' ),
      		)
		)
	) );	
} ?>