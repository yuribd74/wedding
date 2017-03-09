<?php add_action( 'vc_before_init', 'dt_sc_fw_tm_vc_map' );
function dt_sc_fw_tm_vc_map() {

	class WPBakeryShortCode_dt_sc_fw_tm_wrapper extends WPBakeryShortCodesContainer {
	}
	
	vc_map( array(
		"name" => esc_html__( "Fullwidth Testimonial carousel", 'veda-core' ),
		"base" => "dt_sc_fw_tm_wrapper",
		"icon" => "dt_sc_fw_tm_wrapper",
		"category" => DT_VC_CATEGORY,
		"content_element" => true,
		"js_view" => 'VcColumnView',
		'as_parent' => array( 'only' => 'dt_sc_tm_carousel_item' ),
		'description' => esc_html__( 'Full width Testimonial carousel wrapper', 'veda-core' ),
		"params" => array(

			# Title
      		array(
      			"type" => "textfield",
      			"heading" => esc_html__( "Title", 'veda-core' ),
      			"param_name" => "title",
      			'description' => esc_html__('Enter title','veda-core')
      		),

			# Class
      		array(
      			"type" => "textfield",
      			"heading" => esc_html__( "Extra class name", 'veda-core' ),
      			"param_name" => "class",
      			'description' => esc_html__('Style particular element differently - add a class name and refer to it in custom CSS','veda-core')
      		)			

		)
	) );
}