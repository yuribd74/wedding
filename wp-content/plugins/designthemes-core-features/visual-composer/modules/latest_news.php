<?php add_action( 'vc_before_init', 'dt_sc_latest_news_vc_map' );
function dt_sc_latest_news_vc_map() {
	vc_map( array(
		"name" => esc_html__( "Latest News", 'veda-core' ),
		"base" => "dt_sc_latest_news",
		"icon" => "dt_sc_latest_news",
		"category" => DT_VC_CATEGORY,
		"params" => array(

			// Post limit
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'News Limit', 'veda-core' ),
				'param_name' => 'limit',
				'description' => esc_html__( 'Enter post limit', 'veda-core' ),
				'value' => '3',
				'admin_label' => true
			),

		)
	) );
}?>