<?php
add_action( 'vc_before_init', 'dt_sc_chef_info_vc_map' );
function dt_sc_chef_info_vc_map() {
	vc_map( array(
		"name" => esc_html__("Single Chef Info", "veda-restaurant"),
		"base" => "dt_sc_chef_info",
		"icon" => "dt_sc_chef_info",
		"category" => esc_html__('Restaurant','veda-restaurant'),
		"description" => esc_html__("Use this in single chef post", "veda-restaurant"),
		"params" => array(
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Show Meta','veda-restaurant'),
				'param_name' => 'meta',
				'value' => array(
					esc_html__('Yes','veda-restaurant') => 'yes',
					esc_html__('No','veda-restaurant') => 'no',
				)
			)
		)
	) );
}?>