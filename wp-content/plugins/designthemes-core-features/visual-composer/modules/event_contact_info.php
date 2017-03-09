<?php add_action( 'vc_before_init', 'dt_sc_event_contact_info_vc_map' );
function dt_sc_event_contact_info_vc_map() {

	global $variations;

	vc_map( array(
		"name" => esc_html__("Event contact Info", 'veda-core'),
		"base" => "dt_sc_event_contact_info",
		"icon" => "dt_sc_event_contact_info",
		"category" => DT_VC_CATEGORY,
		"description" => esc_html__("Add event contact info",'veda-core'),
		"params" => array(

			# Main Title
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Main Title', 'veda-core' ),
				'param_name' => 'title',
			),

			# Icon Class
            array(
            	"type" => "textfield",
            	"heading" => esc_html__( "Icon", 'veda-core' ),
            	"param_name" => "icon"
            ),

			// Link
			array(
				'type' => 'vc_link',
				'heading' => esc_html__( 'URL (Link)', 'veda-core' ),
				'param_name' => 'link',
				'description' => esc_html__( 'Add link', 'veda-core' ),
			),

      		# Variation
      		array(
      			'type' => 'dropdown',
      			'heading' => esc_html__( 'Color', 'veda-core' ),
      			'admin_label' => true,
      			'param_name' => 'color',
      			'value' => $variations,      			
      			'description' => esc_html__( 'Select color', 'veda-core' ),
      		),

		)		
	) );
}?>