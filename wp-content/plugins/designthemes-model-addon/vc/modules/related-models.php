<?php
add_action( 'vc_before_init', 'dt_sc_related_models_vc_map' );
function dt_sc_related_models_vc_map() {

	$plural_name    = esc_html__('Models', 'veda-model');
	if( function_exists( 'veda_opts_get' ) ) :
		$plural_name	=	veda_opts_get( 'plural-model-name', $plural_name );
	endif;
	
	vc_map( array(
		"name" => esc_html__("Related Models", "veda-model"),
		"base" => "dt_sc_related_models",
		"icon" => "dt_sc_related_models",
		"category" => $plural_name,
		'description' => esc_html__("To show related models", "veda-model"),
		"params" => array(

			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Post ID', 'veda-model' ),
				'param_name' => 'id',
				'description' => esc_html__('Enter model post id or leave empty to get related models based on current model.','veda-model')				
			),

			array( 
				'type' => 'dropdown',
				'param_name' => 'column',
				'value' => array(
					esc_html__( 'One Column', 'veda-model' ) => '1',
					esc_html__( 'Two Columns', 'veda-model' ) => '2',
					esc_html__( 'Three Columns', 'veda-model') => '3',
					esc_html__( 'Four Columns', 'veda-model') => '4',
					esc_html__( 'Five Columns', 'veda-model') => '5',
					esc_html__( 'Six Columns', 'veda-model') => '6'
				),
      			'admin_label' => true,
      			'std' => 6,
				'heading' => esc_html__( 'Layout', 'veda-model' ),
				'description' => esc_html__( 'Select related models display layout.', 'veda-model' )				
			),

			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Post counts', 'veda-model' ),
				'param_name' => 'count',
				'value' => '6',
				'description' => esc_html__('Enter number of models to show','veda-model')				
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