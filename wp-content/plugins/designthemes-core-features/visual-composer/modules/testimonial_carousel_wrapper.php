<?php add_action( 'vc_before_init', 'dt_sc_tm_carousel_wrapper_vc_map' );
function dt_sc_tm_carousel_wrapper_vc_map() {

	class WPBakeryShortCode_dt_sc_tm_carousel_wrapper extends WPBakeryShortCodesContainer {
	}

	class WPBakeryShortCode_dt_sc_tm_carousel_item extends WPBakeryShortCode {
	}

	vc_map( array(
		"name" => esc_html__( "Testimonial carousel", 'veda-core' ),
		"base" => "dt_sc_tm_carousel_wrapper",
		"icon" => "dt_sc_tm_carousel_wrapper",
		"category" => DT_VC_CATEGORY,
		"content_element" => true,
		"js_view" => 'VcColumnView',
		'as_parent' => array( 'only' => 'dt_sc_tm_carousel_item' ),
		'description' => esc_html__( 'Testimonial carousel wrapper', 'veda-core' ),
		"params" => array(

			# Type
			array(
				'type' => 'dropdown',
				'param_name' => 'type',
				'value' => array(
					esc_html__('Type 1','veda-core') => 'type1',
					esc_html__('Type 2','veda-core') => 'type2',
					esc_html__('Type 3','veda-core') => 'type3',
					esc_html__('Type 4','veda-core') => 'type4',
					esc_html__('Type 5','veda-core') => 'type5',
					esc_html__('Type 6','veda-core') => 'type6',
					esc_html__('Type 7','veda-core') => 'type7',
					esc_html__('Type 8','veda-core') => 'type8'					
				),
				'heading' => esc_html__( 'Type', 'veda-core' ),
				'description' => esc_html__( 'Select testimonial carousel display type', 'veda-core' ),
				'std' => 'type2',
				'admin_label' => true
			),

			# Animation
			array(
				'type' => 'dropdown',
				'param_name' => 'animation',
				'value' => array(
					esc_html__('Scroll','veda-core') => 'scroll',
					esc_html__('Cross Fade','veda-core') => 'crossfade',
					esc_html__('Cover','veda-core') => 'cover'
				),
				'heading' => esc_html__( 'Animation', 'veda-core' ),
				'description' => esc_html__( 'Select testimonial carousel animation', 'veda-core' ),
				'std' => 'scroll',
				'admin_label' => true
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
}?>