<?php
add_action( 'vc_before_init', 'dt_sc_menu_items_vc_map' );
function dt_sc_menu_items_vc_map() {
	vc_map( array(
		"name" => esc_html__("Menu Items", "veda-restaurant"),
		"base" => "dt_sc_menu_items",
		"icon" => "dt_sc_menu_items",
		"category" => esc_html__('Restaurant','veda-restaurant'),
		'description' => esc_html__("Show restaurant menu items", "veda-restaurant"),
		"params" => array(

          	array(
          		'type' => 'textfield',
          		'heading' => esc_html__( 'Limit', 'veda-restaurant' ),
          		'param_name' => 'limit',
          		'value' => -1,
          		'description' => esc_html__( 'Put number of menu items to show', 'veda-restaurant' )
          	),

          	array(
          		'type' => 'textfield',
          		'heading' => esc_html__( 'Categories', 'veda-restaurant' ),
          		'param_name' => 'categories',
          		'description' => esc_html__( 'Put category id, separated by comma', 'veda-restaurant' )
          	),

			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Thumb Style','veda-restaurant'),
				'param_name' => 'style',
				'value' => array(
					esc_html__('Round','veda-restaurant') => '',
					esc_html__('Square','veda-restaurant') => 'menu-with-square-image',
					esc_html__('No Thumb','veda-restaurant') => 'no-menu-thumb'
				)
			),

			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Show Meta','veda-restaurant'),
				'param_name' => 'show_meta',
				'value' => array(
					esc_html__('Yes','veda-restaurant') => 'yes',
					esc_html__('No','veda-restaurant') => 'no',
				)
			)
		)
	) );
}?>