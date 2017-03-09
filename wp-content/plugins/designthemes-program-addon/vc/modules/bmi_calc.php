<?php
add_action( 'vc_before_init', 'dt_sc_bmi_calc_vc_map' );
function dt_sc_bmi_calc_vc_map() {

	$plural_name    = esc_html__('Programs', 'veda-program');
	if( function_exists( 'veda_opts_get' ) ) :
		$plural_name	=	veda_opts_get( 'plural-program-name', $plural_name );
	endif;
	
	vc_map( array(
		"name" => esc_html__("BMI Calculator", "veda-program"),
		"base" => "dt_sc_bmi_calc",
		"icon" => "dt_sc_bmi_calc",
		"category" => $plural_name,
		'description' => esc_html__("Add simple BMI calculator", "veda-program"),
		"params" => array(

     		# Title
      		array(
      			"type" => "textfield",
      			"heading" => esc_html__( "Title", "veda-program" ),
      			"param_name" => "title",
      			"admin_label" => true
      		),

      		# CSS
      		array(
      			'type' => 'css_editor',
      			'heading' => esc_html__( 'CSS box', 'veda-program' ),
      			'param_name' => 'css',
      			'group' => esc_html__( 'Design Options', 'veda-program' ),
      		),

			# Content
			array(
				'type' => 'textarea_html',
				'heading' => esc_html__('Content','veda-program'),
				'param_name' => 'content',
				'value' => '<table><tbody>
					<tr><th>BMI</th><th>Classification</th></tr>
					<tr><td>&lt; 18.5</td><td>Underweight</td></tr>
					<tr><td>18.5 &ndash; 24.9</td><td>Normal Weight</td></tr>
					<tr><td>25.0 &ndash; 29.9</td><td>Overweight</td></tr>
					<tr><td>30.0 &ndash; 34.9</td><td>Class I Obesity</td></tr>
					<tr><td>35.0 &ndash; 39.9</td><td>Class II Obesity</td></tr>
					<tr><td>&ge; 40.0</td><td>&nbsp;&nbsp;Class III Obesity&nbsp;&nbsp;</td></tr></tbody></table>'
			)      					
		)
	) );
}?>