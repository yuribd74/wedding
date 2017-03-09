<?php
add_action( 'vc_before_init', 'dt_sc_room_list_vc_map' );
function dt_sc_room_list_vc_map() {
	vc_map( array(
		"name" => esc_html__("Rooms list", "veda-room"),
		"base" => "dt_sc_room_list",
		"icon" => "dt_sc_room_list",
		"category" => esc_html__("Hotels","veda-room"),
		"description" => esc_html__("Show rooms list", "veda-room"),
		"params" => array(

			array(
				'type' => 'textfield',
          		'heading' => esc_html__( 'Limit', 'veda-room' ),
          		'param_name' => 'limit',
          		'value' => -1
			),

			array(
				'type' => 'textfield',
          		'heading' => esc_html__( 'Categories', 'veda-room' ),
          		'param_name' => 'categories',
          		'description' => esc_html__('Put category id, separated by comma', 'veda-room')
			),

			array(
				'type' => 'dropdown',
				'param_name' => 'posts_column',
				'heading' => esc_html__('Column','veda-room'),
				'admin_label' => true,
				'value' => array(
					esc_html__('Thumbs','veda-room') => 'thumb',
					esc_html__('Two Columns Grid','veda-room') => 'one-half-column',
					esc_html__('Three Columns Grid','veda-room') => 'one-third-column',
					esc_html__('Four Columns Grid','veda-room') => 'one-fourth-column'
				),
				'description' => esc_html__( 'Rooms listing display style.', 'veda-room' ),
				'std' => 'thumb'
			),

			array(
				'type' => 'dropdown',
				'param_name' => 'allow_excerpt',
				'heading' => esc_html__('Allow Excerpt','veda-room'),
				'value' => array(
					esc_html__('Yes','veda-room') => 'yes',
					esc_html__('No','veda-room') => 'no',
				),
				'std' => 'yes'
			),

          	array(
          		'type' => 'textfield',
          		'heading' => esc_html__( 'Excerpt Length', 'veda-room' ),
          		'param_name' => 'excerpt_length',
          		'description' => esc_html__( 'Put excerpt length to show', 'veda-room' ),
          		'value' => 40,
          		'dependency' => array( 'element' => 'allow_excerpt', 'value' => array('yes') )
          	),			

			array(
				'type' => 'dropdown',
				'param_name' => 'filter',
				'value' => array(
					esc_html__('Yes','veda-room') => 'yes',
					esc_html__('No','veda-room') => 'no'
				),
				'heading' => esc_html__( 'Filter?', 'veda-room' ),
				'std' => 'yes'
			),

			array(
				'type' => 'dropdown',
				'param_name' => 'allow_fields',
				'value' => array(
					esc_html__('Yes','veda-room') => 'yes',
					esc_html__('No','veda-room') => 'no'
				),
				'heading' => esc_html__( 'Fields?', 'veda-room' ),
				'std' => 'yes'
			)
		)
	) );
}?>