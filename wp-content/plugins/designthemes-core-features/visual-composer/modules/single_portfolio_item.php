<?php add_action( 'vc_before_init', 'dt_sc_portfolio_item_vc_map' );
function dt_sc_portfolio_item_vc_map() {
	vc_map( array(
		"name" => esc_html__( "Single Portfolio Item", 'veda-core' ),
		"base" => "dt_sc_portfolio_item",
		"icon" => "dt_sc_portfolio_item",
		"category" => DT_VC_CATEGORY,
		"params" => array(

			// Post ID
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'ID', 'veda-core' ),
				'param_name' => 'id',
				'description' => esc_html__( 'Enter post ID', 'veda-core' ),
				'admin_label' => true
			),

			// Post style
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Style','veda-core'),
				'param_name' => 'style',
				'value' => array(
					esc_html__('Modern Title','veda-core') => 'type1', 
					esc_html__('Title & Icons Overlay','veda-core') => 'type2', 
					esc_html__('Title Overlay','veda-core') => 'type3', 
					esc_html__('Icons Only','veda-core') => 'type4', 
					esc_html__('Classic','veda-core') => 'type5', 
					esc_html__('Minimal Icons','veda-core') => 'type6', 
					esc_html__('Presentation','veda-core') => 'type7', 
					esc_html__('Girly','veda-core') => 'type8', 
					esc_html__('Art','veda-core') => 'type9' 
				),
				'std' => 'type1'
			)
		)
	) );
}?>