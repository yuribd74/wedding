<?php
add_action( 'vc_before_init', 'dt_sc_university_dept_courses_vc_map' );
function dt_sc_university_dept_courses_vc_map() {

	vc_map( array(
		"name" => esc_html__("Department wise courses", "veda-university"),
		'description' => esc_html__("To show courses based on departments", "veda-university"),
		"base" => "dt_sc_university_dept_courses",
		"icon" => "dt_sc_university_dept_courses",
		"category" => esc_html__('University',"veda-university"),
		"params" => array(

			array(
          		'type' => 'textfield',
          		'heading' => esc_html__( 'Department ID', 'veda-university' ),
          		'param_name' => 'id',
			),

			array(
				'type' => 'dropdown',
				'param_name' => 'column',
				'heading' => esc_html__('Column','veda-university'),
				'admin_label' => true,
				'value' => array(
					esc_html__('Two Columns Grid','veda-university') => '2',
					esc_html__('Three Columns Grid','veda-university') => '3',
					esc_html__('Four Columns Grid','veda-university') => '4',
					esc_html__('Five Columns Grid','veda-university') => '5'
				),
				'description' => esc_html__( 'Recent courses listing display style.', 'veda-university' ),
				'std' => '3'
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
          		'heading' => esc_html__( 'Count', 'veda-university' ),
          		'param_name' => 'count',
          		'value' => 6,
				'admin_label' => true
			)			
		)		
	) );
}?>