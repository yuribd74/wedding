<?php
add_action( 'vc_before_init', 'dt_sc_yoga_class_vc_map' );
function dt_sc_yoga_class_vc_map() {

	vc_map( array(
		"name" => esc_html__("Add Yoga Class", "veda-yoga"),
		'description' => esc_html__("To add a yoga class", "veda-yoga"),
		"base" => "dt_sc_yoga_class",
		"icon" => "dt_sc_yoga_class",
		"category" => esc_html__('Yoga',"veda-yoga"),
		"params" => array(

			array(
          		'type' => 'textfield',
          		'heading' => esc_html__( 'Title', 'veda-yoga' ),
          		'param_name' => 'title',
			),

			array(
          		'type' => 'textfield',
          		'heading' => esc_html__( 'Sub Title', 'veda-yoga' ),
          		'param_name' => 'subtitle',
			),

			array(
          		'type' => 'textfield',
          		'heading' => esc_html__( 'Video ID', 'veda-yoga' ),
          		'param_name' => 'video_id',
			),			
		)		
	) );
}?>