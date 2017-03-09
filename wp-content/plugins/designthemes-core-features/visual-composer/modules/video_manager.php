<?php add_action( 'vc_before_init', 'dt_sc_video_manager_vc_map' );
function dt_sc_video_manager_vc_map() {

	class WPBakeryShortCode_dt_sc_video_manager extends WPBakeryShortCodesContainer {
	}

	class WPBakeryShortCode_dt_sc_video_item extends WPBakeryShortCode {
	}
	
	// Video Manager
	vc_map( array(
		"name" => esc_html__( "Video Manager", 'veda-core' ),
		"base" => "dt_sc_video_manager",
		"icon" => "dt_sc_video_manager",
		"category" => DT_VC_CATEGORY,
		"content_element" => true,
		"js_view" => 'VcColumnView',
		'as_parent' => array( 'only' => 'dt_sc_video_item' ),
		'description' => esc_html__( 'Show videos', 'veda-core' ),
		'show_settings_on_create' => false,
		"params" => array()
	) );
	
	// Video Item
	vc_map( array(
		"name" => esc_html__( "Video", 'veda-core' ),
		"base" => "dt_sc_video_item",
		"icon" => "dt_sc_video_manager",
		"category" => DT_VC_CATEGORY,
		'as_child' => array( 'only' => 'dt_sc_video_manager' ),
		'description' => esc_html__( 'Add video', 'veda-core' ),
		"params" => array(
		
			# Title
			array(
				'type' => 'textfield',
				'param_name' => 'title',
				'heading' => esc_html__( 'Title', 'veda-core' ),
				'description' => esc_html__( 'Enter title', 'veda-core' ),
			),

			# Sub Title
			array(
				'type' => 'textfield',
				'param_name' => 'subtitle',
				'heading' => esc_html__( 'Sub Title', 'veda-core' ),
				'description' => esc_html__( 'Enter sub title', 'veda-core' ),
			),

			// Image
			array(
				'type' => 'attach_image',
				'heading' => esc_html__('Image','veda-core'),
				'param_name' => 'image'
            ),

			# Video Link
			array(
				'type' => 'textfield',
				'param_name' => 'link',
				'heading' => esc_html__( 'Video link', 'veda-core' ),
				'description' => esc_html__( 'Enter link to video ( Eg: http://vimeo.com/18439821 )', 'veda-core' ),
				'admin_label' => true				
			)
		)
	) );
}?>