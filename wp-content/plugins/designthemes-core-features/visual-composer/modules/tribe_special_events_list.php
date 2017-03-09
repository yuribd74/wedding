<?php add_action( 'vc_before_init', 'dt_sc_special_events_list_vc_map' );
function dt_sc_special_events_list_vc_map() {
	vc_map( array(
		"name" => esc_html__( "Special Events List", 'veda-core' ),
		"base" => "dt_sc_special_events_list",
		"icon" => "dt_sc_special_events_list",
		"category" => DT_VC_CATEGORY .' ( '.esc_html__('Events','veda-core').')',
		"params" => array(

			// Limit
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Limit', 'veda-core' ),
				'param_name' => 'limit',
				'description' => esc_html__( 'Enter limit', 'veda-core' )
			),

			// Categories
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Categories', 'veda-core' ),
				'param_name' => 'categories',
				'description' => esc_html__( 'Enter categories', 'veda-core' )
			),									

			// Post type
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Type','veda-core'),
				'param_name' => 'type',
				'value' => array(
					esc_html__('Type 1','veda-core') => 'type1', 
					esc_html__('Type 2','veda-core') => 'type2', 
					esc_html__('Type 3','veda-core') => 'type3', 
					esc_html__('Type 4','veda-core') => 'type4', 
					esc_html__('Type 5','veda-core') => 'type5'
				),
				'std' => 'type1'
			)			
		)
	) );
}?>