<?php add_action( 'vc_before_init', 'dt_sc_testimonial_vc_map' );
function dt_sc_testimonial_vc_map() {
	vc_map( array(
		"name" => esc_html__( "Testimonial", 'veda-core' ),
		"base" => "dt_sc_testimonial",
		"icon" => "dt_sc_testimonial",
		"category" => DT_VC_CATEGORY,
		"params" => array(

			# Type
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Type', 'veda-core' ),
				'description' => esc_html__( 'Select testimonial type', 'veda-core' ),
				'param_name' => 'type',
				'value' => array(
					esc_html__('Type 1','veda-core') => 'type1',
					esc_html__('Type 2','veda-core') => 'type2',
					esc_html__('Type 3','veda-core') => 'type3',
					esc_html__('Type 4','veda-core') => 'type4',
					esc_html__('Type 5','veda-core') => 'type5',
					esc_html__('Type 6','veda-core') => 'type6',
					esc_html__('Type 7','veda-core') => 'type7',
					esc_html__('Type 8','veda-core') => 'type8'
				),
				'std' => 'type1'
			),

			# Image
			array(
				'type' => 'attach_image',
				'heading' => esc_html__('Image','veda-core'),
                'param_name' => 'image'
            ),

			# Name
			array(
				'type' => 'textfield',
				'param_name' => 'name',
				'heading' => esc_html__( 'Name', 'veda-core' ),
				'description' => esc_html__( 'Enter name', 'veda-core' )
			),

			# Role
			array(
				'type' => 'textfield',
				'param_name' => 'role',
				'heading' => esc_html__( 'Role', 'veda-core' ),
				'description' => esc_html__( 'Enter role', 'veda-core' )
			),

      		// Content
            array(
            	'type' => 'textarea_html',
            	'heading' => esc_html__('Content','veda-core'),
            	'param_name' => 'content',
            	'value' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi hendrerit elit turpis, a porttitor tellus sollicitudin at.Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.'
            ),

      		# Class
      		array(
      			"type" => "textfield",
      			"heading" => esc_html__( "Extra class name", 'veda-core' ),
      			"param_name" => "class",
      			'description' => esc_html__('Style particular icon box element differently - add a class name and refer to it in custom CSS','veda-core')
      		)						
		)
	) );
} ?>