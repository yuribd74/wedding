<?php
add_action( 'vc_before_init', 'dt_sc_djs_vc_map' );
function dt_sc_djs_vc_map() {

	vc_map( array(
		"name" => esc_html__("DJs", "veda-event"),
		"base" => "dt_sc_djs",
		"icon" => "dt_sc_djs",
		"category" => esc_html__('Night Club','veda-event'),
		'description' => esc_html__("Add DJs", "veda-event"),
		"params" => array(

          	array(
          		'type' => 'textfield',
          		'heading' => esc_html__( 'Limit', 'veda-event' ),
          		'param_name' => 'limit',
          		'description' => esc_html__( 'Put number of DJs to show', 'veda-event' )
          	),

          	array(
          		'type' => 'textfield',
          		'heading' => esc_html__( 'Excerpt Length', 'veda-event' ),
          		'param_name' => 'excerpt_length',
          		'description' => esc_html__( 'Put excerpt length to show', 'veda-event' )
          	)          							
		)
	) );
}?>