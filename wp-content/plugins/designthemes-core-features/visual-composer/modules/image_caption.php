<?php add_action( 'vc_before_init', 'dt_sc_image_caption_vc_map' );
function dt_sc_image_caption_vc_map() {

	vc_map( array(
		"name" => esc_html__("Image Caption", 'veda-core'),
		"base" => "dt_sc_image_caption",
		"icon" => "dt_sc_image_caption",
		"category" => DT_VC_CATEGORY,
		"description" => esc_html__("Add different types of image caption",'veda-core'),
		"params" => array(

			# Type
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Type', 'veda-core'),
				'param_name' => 'type',
				'value' => array( esc_html__('Type 1','veda-core') => '',
					esc_html__('Type 2','veda-core') => 'type2',
					esc_html__('Type 3','veda-core') => 'type3',
					esc_html__('Type 4','veda-core') => 'type4',
					esc_html__('Type 5','veda-core') => 'type5',
					esc_html__('Type 6','veda-core') => 'type6',
					esc_html__('Type 7','veda-core') => 'type7',
					esc_html__('Type 8','veda-core') => 'type8',
					esc_html__('Type 9','veda-core') => 'type9',
				),
			),			

      		# Title
      		array(
      			"type" => "textfield",
      			"heading" => esc_html__( "Title", 'veda-core' ),
      			"param_name" => "title",
      		),

      		# Sub Title
      		array(
      			"type" => "textfield",
      			"heading" => esc_html__( "Sub Title", 'veda-core' ),
      			"param_name" => "subtitle",
      		), 

			# Image url
			array(
				'type' => 'attach_image',
				'heading' => esc_html__('Image URL', 'veda-core'),
				'param_name' => 'image',
			),

			# Image Position
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Image Position', 'veda-core'),
				'param_name' => 'imgpos',
				'value' => array( esc_html__('Default','veda-core') => '', esc_html__('Below Content','veda-core') => 'bottom' )
			),

			# Icon Type
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Icon Type', 'veda-core'),
				'param_name' => 'icon_type',
				'value' => array( esc_html__('Icon class','veda-core') => 'icon_class', esc_html__('Image','veda-core') => 'icon_url' )
			),

			# Icon Class
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Icon Class', 'veda-core'),
				'param_name' => 'icon',
				'dependency' => array('element' => 'icon_type','value' => 'icon_class')
			),

			# Icon url
			array(
				'type' => 'attach_image',
				'heading' => esc_html__('Image URL', 'veda-core'),
				'param_name' => 'iconurl',
				'dependency' => array('element' => 'icon_type','value' => 'icon_url')
			),

			# Content
			array(
				'type' => 'textarea_html',
				'heading' => esc_html__('Content','veda-core'),
				'param_name' => 'content',
				'value' => '<p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi hendrerit elit turpis, a porttitor tellus sollicitudin at. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>'
			),			

			# Extra Class
      		array(
      			"type" => "textfield",
      			"heading" => esc_html__( "Extra class name", 'veda-core' ),
      			"param_name" => "class",
      			'description' => esc_html__('Style particular icon box element differently - add a class name and refer to it in custom CSS','veda-core')
      		)
		)
	) );
} ?>