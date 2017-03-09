<?php
add_action( 'vc_before_init', 'dt_sc_chef_image_vc_map' );
function dt_sc_chef_image_vc_map() {
	vc_map( array(
		"name" => esc_html__("Single Chef Image", "veda-restaurant"),
		"base" => "dt_sc_chef_image",
		"icon" => "dt_sc_chef_image",
		"category" => esc_html__('Restaurant','veda-restaurant'),
		"description" => esc_html__("Use this in single chef post", "veda-restaurant"),
		"show_settings_on_create" => false,
		"params" => array()
	) );
}?>