<?php
add_action( 'vc_before_init', 'dt_sc_dj_club_vc_map' );
function dt_sc_dj_club_vc_map() {

	vc_map( array(
		"name" => esc_html__("DJ Club", "veda-event"),
		"base" => "dt_sc_dj_club",
		"icon" => "dt_sc_dj_club",
		"category" => esc_html__('Night Club','veda-event'),
		'description' => esc_html__("Add DJ Club", "veda-event"),
		"params" => array(

			array(
				'type' => 'textarea_html',
				'heading' => esc_html__('Content','veda-event'),
				'param_name' => 'content',
				'value' => '<h3>Dakota Jhonson </h3><h4>Chief Executive Officer</h4><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod</p>'				
			),

          	array(
          		'type' => 'textfield',
          		'heading' => esc_html__( 'Extra class name', 'veda-event' ),
          		'param_name' => 'class',
          		'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'veda-event' )
          	)						
		)
	) );
}?>