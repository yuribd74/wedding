<?php add_action( 'vc_before_init', 'dt_sc_images_carousel_vc_map' );
function dt_sc_images_carousel_vc_map() {
	vc_map( array(
		"name" => esc_html__( "Images carousel", 'veda-core' ),
		"base" => "dt_sc_images_carousel",
		"icon" => "dt_sc_images_carousel",
		"category" => DT_VC_CATEGORY,
		'description' => esc_html__( 'Images carousel with images', 'veda-core' ),
		"params" => array(
			
			array(
				'type' => 'attach_images',
				'heading' => esc_html__( 'Images', 'veda-core' ),
				'param_name' => 'images',
				'description' => esc_html__( 'Select images from media library', 'veda-core' )
			)
		)	 
	) );
}?>