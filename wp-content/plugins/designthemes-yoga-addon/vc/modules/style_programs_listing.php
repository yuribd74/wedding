<?php
add_action( 'vc_before_init', 'dt_sc_yoga_style_programs_listing_vc_map' );
function dt_sc_yoga_style_programs_listing_vc_map() {

	vc_map( array(
		"name" => esc_html__("Style wise programs", "veda-yoga"),
		'description' => esc_html__("To show programs based on style", "veda-yoga"),
		"base" => "dt_sc_yoga_style_programs_listing",
		"icon" => "dt_sc_yoga_style_programs_listing",
		"category" => esc_html__('Yoga',"veda-yoga"),
		"params" => array(

			array(
          		'type' => 'textfield',
          		'heading' => esc_html__( 'Style ID', 'veda-yoga' ),
          		'param_name' => 'style',
			),			

			array(
				'type' => 'dropdown',
				'param_name' => 'column',
				'heading' => esc_html__('Style','veda-yoga'),
				'admin_label' => true,
				'value' => array(
					esc_html__('Two Columns Grid','veda-yoga') => '2',
					esc_html__('Three Columns Grid','veda-yoga') => '3',
					esc_html__('Four Columns Grid','veda-yoga') => '4'
				),
				'description' => esc_html__( 'Programs display style.', 'veda-yoga' ),
				'std' => '3'
			),

			array(
          		'type' => 'textfield',
          		'heading' => esc_html__( 'Count', 'veda-yoga' ),
          		'param_name' => 'count',
          		'value' => 6,
				'admin_label' => true
			)								
		)		
	) );
}?>