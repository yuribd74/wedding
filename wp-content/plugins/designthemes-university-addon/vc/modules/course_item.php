<?php
add_action( 'vc_before_init', 'dt_sc_university_course_item_vc_map' );
function dt_sc_university_course_item_vc_map() {

	vc_map( array(
		"name" => esc_html__("Course", "veda-university"),
		'description' => esc_html__("To add a single course", "veda-university"),
		"base" => "dt_sc_university_course_item",
		"icon" => "dt_sc_university_course_item",
		"category" => esc_html__('University',"veda-university"),
		"params" => array(

			array(
          		'type' => 'textfield',
          		'heading' => esc_html__( 'Course ID', 'veda-university' ),
          		'param_name' => 'id',
			),

			array(
				'type' => 'dropdown',
				'param_name' => 'type',
				'heading' => esc_html__('Style','veda-university'),
				'admin_label' => true,
				'value' => array(
					esc_html__('With Image','veda-university') => 'with-image',
					esc_html__('Without Image','veda-university') => 'without-image',
				),
				'description' => esc_html__( 'Course display style.', 'veda-university' ),
				'std' => 'without-image'
			),			

			array(
          		'type' => 'textfield',
          		'heading' => esc_html__( 'Extra class name', 'veda-university' ),
          		'param_name' => 'class',
          		'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'veda-university' )
          	)			
		)		
	) );
}?>