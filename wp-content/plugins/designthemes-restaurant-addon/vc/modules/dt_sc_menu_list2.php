<?php
add_action( 'vc_before_init', 'dt_sc_menu_list2_vc_map' );
function dt_sc_menu_list2_vc_map() {
	vc_map( array(
		"name" => esc_html__("Menu list 2", "veda-restaurant"),
		"base" => "dt_sc_menu_list2",
		"icon" => "dt_sc_menu_list2",
		"category" => esc_html__('Restaurant','veda-restaurant'),
		'description' => esc_html__("Show restaurant menu list", "veda-restaurant"),
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
				'heading' => esc_html__('Allow Filter','veda-restaurant'),
				'param_name' => 'filter',
				'value' => array(
					esc_html__('Yes','veda-restaurant') => 'yes',
					esc_html__('No','veda-restaurant') => 'no',
				)
			),

			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Show Filter Image','veda-restaurant'),
				'param_name' => 'show_filter_image',
				'value' => array(
					esc_html__('Yes','veda-restaurant') => 'yes',
					esc_html__('No','veda-restaurant') => 'no',
				)
			)
		)
	) );
}?>