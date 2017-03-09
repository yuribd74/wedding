<?php add_action( 'vc_before_init', 'dt_sc_portfolios_vc_map' );
function dt_sc_portfolios_vc_map() {

	$arr = array( esc_html__('Yes','veda-core') => 'yes', esc_html__('No','veda-core') => 'no' );

	vc_map( array(
		"name" => esc_html__( "Portfolio Items", 'veda-core' ),
		"base" => "dt_sc_portfolios",
		"icon" => "dt_sc_portfolios",
		"category" => DT_VC_CATEGORY,
		"params" => array(

			// Post Count
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Post Counts', 'veda-core' ),
				'param_name' => 'count',
				'description' => esc_html__( 'Enter post count', 'veda-core' ),
				'admin_label' => true
			),

			// Post column
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Columns','veda-core'),
				'param_name' => 'column',
				'value' => array(
					esc_html__('II Columns','veda-core') => 2 ,
					esc_html__('III Columns','veda-core') => 3,
					esc_html__('IV Columns','veda-core') => 4,

				),
				'std' => '3'
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
				'std' => 'type1',
				'admin_label' => true
			),

			// Allow Grid Space
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Allow Grid Space','veda-core'),
				'param_name' => 'allow_gridspace',
				'value' => $arr
			),

			// Allow Filter
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Allow Filter','veda-core'),
				'param_name' => 'allow_filter',
				'value' => $arr
			),

			// Term ID(s)
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Terms', 'veda-core' ),
				'param_name' => 'terms',
				'description' => esc_html__( 'Enter Portfolio Terms', 'veda-core' )
			),						
		)
	) );
} ?>