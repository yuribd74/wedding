<?php
add_action( 'vc_before_init', 'dt_sc_yoga_video_item_vc_map' );
function dt_sc_yoga_video_item_vc_map() {

	vc_map( array(
		"name" => esc_html__("Video", "veda-yoga"),
		'description' => esc_html__("To show a video", "veda-yoga"),
		"base" => "dt_sc_yoga_video_item",
		"icon" => "dt_sc_yoga_video_item",
		"category" => esc_html__('Yoga',"veda-yoga"),
		"params" => array(

			array(
          		'type' => 'textfield',
          		'heading' => esc_html__( 'Video ID', 'veda-yoga' ),
          		'param_name' => 'id',
			),

			array(
				'type' => 'dropdown',
				'param_name' => 'style',
				'heading' => esc_html__('Style','veda-yoga'),
				'admin_label' => true,
				'value' => array(
					esc_html__('Style 1','veda-yoga') => 'style1',
					esc_html__('Style 2','veda-yoga') => 'style2',
				),
				'description' => esc_html__( 'Yoga poses display style.', 'veda-yoga' ),
				'std' => 'style1'
			),

			array(
				'type' => 'dropdown',
				'param_name' => 'show_date',
				'heading' => esc_html__('Show Date?','veda-yoga'),
				'admin_label' => true,
				'value' => array(
					esc_html__('Yes','veda-yoga') => 'yes',
					esc_html__('No','veda-yoga') => 'no',
				),
				'std' => 'yes'
			)			
		)		
	) );
}?>