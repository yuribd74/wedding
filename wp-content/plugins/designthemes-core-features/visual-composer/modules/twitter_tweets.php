<?php add_action( 'vc_before_init', 'dt_sc_twitter_tweets_vc_map' );
function dt_sc_twitter_tweets_vc_map() {

	vc_map( array( 
		"name" => esc_html__( "Twitter tweets", 'veda-core' ),
		"base" => "dt_sc_twitter_tweets",
		"icon" => "dt_sc_twitter_tweets",
		"category" => DT_VC_CATEGORY,
		"params" => array(

			# Consumer Key
			array(
				'type' => 'textfield',
				'param_name' => 'consumerkey',
				'heading' => esc_html__( 'Consumer key', 'veda-core' ),
				'description' => esc_html__( 'Enter Consumer key', 'veda-core' ),
			),

			# Consumer secret
			array(
				'type' => 'textfield',
				'param_name' => 'consumersecret',
				'heading' => esc_html__( 'Consumer secret', 'veda-core' ),
				'description' => esc_html__( 'Enter Consumer secret', 'veda-core' ),
			),

			# Access token 
			array(
				'type' => 'textfield',
				'param_name' => 'accesstoken',
				'heading' => esc_html__( 'Access token', 'veda-core' ),
				'description' => esc_html__( 'Enter Access token', 'veda-core' ),
			),

			# Access token secret
			array(
				'type' => 'textfield',
				'param_name' => 'accesstokensecret',
				'heading' => esc_html__( 'Access token secret', 'veda-core' ),
				'description' => esc_html__( 'Enter Access token secret', 'veda-core' ),
			),

			# Consumer Key
			array(
				'type' => 'textfield',
				'param_name' => 'username',
				'heading' => esc_html__( 'Twitter username', 'veda-core' ),
				'description' => esc_html__( 'Enter Twitter username', 'veda-core' ),
			),

			# Avatar
			array(
				'type' => 'dropdown',
				'param_name' => 'useravatar',
				'heading' => esc_html__('Show avatar?','veda-core'),
				'value' => array( esc_html__('Yes','veda-core') => 'yes' , esc_html__('No','veda-core') => 'no' ),
				'std' => 'no'
			)
		)		
	) );
}?>