<?php
add_action( 'vc_before_init', 'dt_sc_room_image_vc_map' );
function dt_sc_room_image_vc_map() {
	vc_map( array(
		"name" => esc_html__("Single Room Image", "veda-room"),
		"base" => "dt_sc_room_image",
		"icon" => "dt_sc_room_image",
		"category" => esc_html__("Hotels","veda-room"),
		"description" => esc_html__("Use this in room post page only", "veda-room"),
		"show_settings_on_create" => false,
		"params" => array()
	) );
}?>