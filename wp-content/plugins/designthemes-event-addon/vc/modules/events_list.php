<?php
add_action( 'vc_before_init', 'dt_sc_addon_events_list_vc_map' );
function dt_sc_addon_events_list_vc_map() {

	vc_map( array(
		"name" => esc_html__("DJ Events List", "veda-event"),
		"base" => "dt_sc_addon_events_list",
		"icon" => "dt_sc_addon_events_list",
		"category" => esc_html__('Night Club','veda-event'),
		'description' => esc_html__("Show DJs Events list", "veda-event"),
		"params" => array(

          	array(
          		'type' => 'textfield',
          		'heading' => esc_html__( 'Limit', 'veda-event' ),
          		'param_name' => 'limit',
          		'description' => esc_html__( 'Put number of DJs events to show', 'veda-event' )
          	),

          	array(
          		'type' => 'textfield',
          		'heading' => esc_html__( 'Categories', 'veda-event' ),
          		'param_name' => 'categories',
          		'description' => esc_html__( 'Put category id, separated by comma', 'veda-event' )
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