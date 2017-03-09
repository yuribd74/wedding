<?php
add_action( 'vc_before_init', 'dt_sc_current_model_meta_vc_map' );
function dt_sc_current_model_meta_vc_map() {

	$plural_name    = esc_html__('Models', 'veda-model');
	if( function_exists( 'veda_opts_get' ) ) :
		$plural_name	=	veda_opts_get( 'plural-model-name', $plural_name );
	endif;
	
	vc_map( array(
		"name" => esc_html__("Model Meta", "veda-model"),
		"base" => "dt_sc_current_model_meta",
		"icon" => "dt_sc_current_model_meta",
		"category" => $plural_name,
		'description' => esc_html__("Meta data of current model", "veda-model"),
		"params" => array(

			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Post ID', 'veda-model' ),
				'param_name' => 'id',
				'description' => esc_html__("Enter model post id or leave empty to get current model's. meta data",'veda-model')				
			),

          	array(
          		'type' => 'textfield',
          		'heading' => esc_html__( 'Extra class name', 'veda-model' ),
          		'param_name' => 'class',
          		'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'veda-model' )
          	)
		)
	) );
}?>