<?php
add_action( 'vc_before_init', 'dt_sc_room_details_vc_map' );
function dt_sc_room_details_vc_map() {
	vc_map( array(
		"name" => esc_html__("Single Room Details", "veda-room"),
		"base" => "dt_sc_room_details",
		"icon" => "dt_sc_room_details",
		"category" => esc_html__("Hotels","veda-room"),
		"description" => esc_html__("Use this in room post page only", "veda-room"),
		"show_settings_on_create" => false,
		"params" => array(

			array(
				'type' => 'textarea_html',
				'heading' => esc_html__('Content','veda-room'),
				'param_name' => 'content',
				'value' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi hendrerit elit turpis, a tellus sollicitudin at.</p>'
			)
		)
	) );
}?>