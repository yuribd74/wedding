<?php
add_action( 'vc_before_init', 'dt_sc_process_step_vc_map' );
function dt_sc_process_step_vc_map() {

	$plural_name    = esc_html__('Programs', 'veda-program');
	if( function_exists( 'veda_opts_get' ) ) :
		$plural_name	=	veda_opts_get( 'plural-program-name', $plural_name );
	endif;
	
	vc_map( array(
		"name" => esc_html__("Process step", "veda-program"),
		"base" => "dt_sc_process_step",
		"icon" => "dt_sc_process_step",
		"category" => $plural_name,
		"params" => array(

     		# Title
      		array(
      			"type" => "textfield",
      			"heading" => esc_html__( "Title", "veda-program" ),
      			"param_name" => "title",
      			"admin_label" => true
      		),

     		# Step
      		array(
      			"type" => "textfield",
      			"heading" => esc_html__( "Step", "veda-program" ),
      			"param_name" => "step",
      		),      		

			# Image url
			array(
				'type' => 'attach_image',
				'heading' => esc_html__('Image URL', 'veda-program'),
				'param_name' => 'image'
			),

			# Content
			array(
				'type' => 'textarea_html',
				'heading' => esc_html__('Content','veda-program'),
				'param_name' => 'content',
				'value' => '<p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi hendrerit elit turpis, a porttitor tellus sollicitudin at.</p>'
			),

			// Extra class name
			array(
          		'type' => 'textfield',
          		'heading' => esc_html__( 'Extra class name', 'veda-program' ),
          		'param_name' => 'class',
          		'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'veda-program' )
          	)
		)
	) );
}?>