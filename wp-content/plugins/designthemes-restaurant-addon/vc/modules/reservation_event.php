<?php
add_action( 'vc_before_init', 'dt_sc_res_event_vc_map' );
function dt_sc_res_event_vc_map() {
	vc_map( array(
		"name" => esc_html__("Reservation Event", "veda-restaurant"),
		"base" => "dt_sc_res_event",
		"icon" => "dt_sc_res_event",
		"category" => esc_html__('Restaurant','veda-restaurant'),
		'description' => esc_html__("Show reservation event", "veda-restaurant"),
		"params" => array(

          	array(
          		'type' => 'textfield',
          		'heading' => esc_html__( 'Date', 'veda-restaurant' ),
          		'param_name' => 'date',
          		'description' => esc_html__( 'Put the event date', 'veda-restaurant' )
          	),

          	array(
          		'type' => 'textfield',
          		'heading' => esc_html__( 'Title', 'veda-restaurant' ),
          		'param_name' => 'title',
          		'description' => esc_html__( 'Put the event title', 'veda-restaurant' )
          	),

			array(
				'type' => 'attach_image',
				'heading' => esc_html__('Image','veda-restaurant'),
				'param_name' => 'image'
            ),

			array(
				'type' => 'vc_link',
				'heading' => esc_html__( 'URL (Link)', 'veda-restaurant' ),
				'param_name' => 'link'
			)
		)
	) );
}?>