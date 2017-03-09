<?php
add_action( 'vc_before_init', 'dt_sc_room_meta_vc_map' );
function dt_sc_room_meta_vc_map() {
	vc_map( array(
		"name" => esc_html__("Single Room Meta", "veda-room"),
		"base" => "dt_sc_room_meta",
		"icon" => "dt_sc_room_meta",
		"category" => esc_html__("Hotels","veda-room"),
		"description" => esc_html__("Use this in room post page only", "veda-room"),
		"show_settings_on_create" => false,
		"params" => array(

			array(
				'type' => 'textfield',
          		'heading' => esc_html__( 'Meta Title', 'veda-room' ),
          		'param_name' => 'meta_title',
          		'value' => 'Features'
			),

			array(
				'type' => 'dropdown',
				'param_name' => 'show_meta',
				'value' => array(
					esc_html__('Yes','veda-room') => 'yes',
					esc_html__('No','veda-room') => 'no'
				),
				'heading' => esc_html__( 'Show meta?', 'veda-room' ),
				'std' => 'yes'
			),

			array(
				'type' => 'dropdown',
				'param_name' => 'reservation',
				'value' => array(
					esc_html__('Yes','veda-room') => 'yes',
					esc_html__('No','veda-room') => 'no'
				),
				'heading' => esc_html__( 'Show reservation?', 'veda-room' ),
				'std' => 'yes'
			),			

			array(
				'type' => 'textarea_html',
				'heading' => esc_html__('Content','veda-room'),
				'param_name' => 'content',
				'value' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi hendrerit elit turpis, a tellus sollicitudin at.</p>'
			)
		)
	) );
}?>