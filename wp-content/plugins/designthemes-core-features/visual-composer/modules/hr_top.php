<?php add_action( 'vc_before_init', 'dt_sc_hr_top_vc_map' );
function dt_sc_hr_top_vc_map() {
	vc_map( array(
		"name" => esc_html__( "Horizontal Top", 'veda-core' ),
		"base" => "dt_sc_hr_top",
		"icon" => "dt_sc_hr_top",
		"category" => DT_VC_CATEGORY,
		"params" => array(

			# Size
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Value', 'veda-core'),
				'param_name' => 'value',
				'value' => array('10px' => '10','20px' => '20','30px' => '30','40px' => '40','50px' => '50'),
				'std' => '10'
			)
		)
	) );	
}?>