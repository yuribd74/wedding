<?php
add_action( 'vc_before_init', 'dt_sc_university_faculty_listing_vc_map' );
function dt_sc_university_faculty_listing_vc_map() {

	vc_map( array(
		"name" => esc_html__("Faculties", "veda-university"),
		'description' => esc_html__("To show list of faculties", "veda-university"),
		"base" => "dt_sc_university_faculty_listing",
		"icon" => "dt_sc_university_faculty_listing",
		"category" => esc_html__('University',"veda-university"),
		"params" => array(

			# Type
			array(
				'type' => 'dropdown',
				'param_name' => 'type',
				'heading' => esc_html__('Column','veda-university'),
				'admin_label' => true,
				'value' => array(
					esc_html__('Two Columns Grid','veda-university') => '2',
					esc_html__('Three Columns Grid','veda-university') => '3',
					esc_html__('Four Columns Grid','veda-university') => '4'
				),
				'description' => esc_html__( 'Faculty listing display style.', 'veda-university' ),
				'std' => '3'
			)			
		)		
	) );
}?>