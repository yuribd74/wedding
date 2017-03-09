<?php
add_action( 'vc_before_init', 'dt_sc_fitness_diet_vc_map' );
function dt_sc_fitness_diet_vc_map() {

	$plural_name    = esc_html__('Programs', 'veda-program');
	if( function_exists( 'veda_opts_get' ) ) :
		$plural_name	=	veda_opts_get( 'plural-program-name', $plural_name );
	endif;
	
	vc_map( array(
		"name" => esc_html__("Diet", "veda-program"),
		"base" => "dt_sc_fitness_diet",
		"icon" => "dt_sc_fitness_diet",
		"category" => $plural_name,
		'description' => esc_html__("Add diet plan", "veda-program"),
		"params" => array(

     		# Title
      		array(
      			"type" => "textfield",
      			"heading" => esc_html__( "Title", "veda-program" ),
      			"param_name" => "title",
      			"admin_label" => true
      		),

      		# Sub Title
      		array(
      			"type" => "textfield",
      			"heading" => esc_html__( "Sub Title", "veda-program" ),
      			"param_name" => "subtitle",
      			"admin_label" => true
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
				'value' => '<p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi hendrerit elit turpis, a porttitor tellus sollicitudin at. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>'
			)						
		)
	) );
}?>