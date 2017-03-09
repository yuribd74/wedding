<?php add_action( 'vc_before_init', 'dt_sc_vertical_timeline_vc_map' );
function dt_sc_vertical_timeline_vc_map() {

	class WPBakeryShortCode_dt_sc_vertical_timeline extends WPBakeryShortCodesContainer {
	}
	class WPBakeryShortCode_dt_sc_vc_timeline_entry extends WPBakeryShortCode {
	}

	vc_map( array(
		"name" => esc_html__( "Vertical timeline", 'veda-core' ),
		"base" => "dt_sc_vertical_timeline",
		"icon" => "dt_sc_vertical_timeline",
		"category" => DT_VC_CATEGORY,
		"content_element" => true,
		"js_view" => 'VcColumnView',
		'as_parent' => array( 'only' => 'dt_sc_vc_timeline_entry' ),
		'description' => esc_html__( 'Tabbed content', 'veda-core' ),		
		"params" => array(

			// Type
			array(
				'type' => 'dropdown',
				'param_name' => 'type',
      			'admin_label' => true,
				'value' => array(
					esc_html__( 'Type 1', 'veda-core' ) => 'type1',
					esc_html__( 'Type 2', 'veda-core' ) => 'type2',
					esc_html__( 'Type 3', 'veda-core' ) => 'type3',
					esc_html__( 'Type 4', 'veda-core' ) => 'type4',
					esc_html__( 'Type 5', 'veda-core' ) => 'type5',
				),
				'std' => 'type1',
				'heading' => esc_html__( 'Type', 'veda-core' ),
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
}?>