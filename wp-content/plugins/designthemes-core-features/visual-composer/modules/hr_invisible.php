<?php add_action( 'vc_before_init', 'dt_sc_hr_invisible_vc_map' );
function dt_sc_hr_invisible_vc_map() {
	vc_map( array(
		"name" => esc_html__( "Horizontal Divider", 'veda-core' ),
		"base" => "dt_sc_hr_invisible",
		"icon" => "dt_sc_hr_invisible",
		"category" => DT_VC_CATEGORY,
		"params" => array(

			# Size
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Size', 'veda-core'),
				'param_name' => 'size',
				'value' => array('Xsmall' => 'xsmall','Small' => 'small','Medium' => 'medium','Large' => 'large','Xlarge'=> 'xlarge'),
				'std' => 'medium'
			)
		)
	) );	
}?>