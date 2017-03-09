<?php add_action( 'vc_before_init', 'dt_sc_tm_carousel_item_vc_map' );
function dt_sc_tm_carousel_item_vc_map() {
	vc_map( array(
		"name" => esc_html__( "Testimonial item", 'veda-core' ),
		"base" => "dt_sc_tm_carousel_item",
		"icon" => "dt_sc_tm_carousel_item",
		"category" => DT_VC_CATEGORY,
		'as_child' => array( 'only' => 'dt_sc_tm_carousel_wrapper' ),
		'description' => esc_html__( 'Item for testimonial carousel', 'veda-core' ),
		"params" => array(

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
				'description' => esc_html__( 'Enter name', 'veda-core' ),
				'admin_label' => true
			),

			# Role
			array(
				'type' => 'textfield',
				'param_name' => 'role',
				'heading' => esc_html__( 'Role', 'veda-core' ),
				'description' => esc_html__( 'Enter role', 'veda-core' ),
				'admin_label' => true				
			),

      		// Content
            array(
            	'type' => 'textarea_html',
            	'heading' => esc_html__('Content','veda-core'),
            	'param_name' => 'content',
            	'value' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi hendrerit elit turpis, a porttitor tellus sollicitudin at.Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.'
            )
		)
	) );
}?>