<?php add_action( 'vc_before_init', 'dt_sc_iconbox_vc_map' );
function dt_sc_iconbox_vc_map() {

	vc_map( array(
		"name" => esc_html__( "Icon box", 'veda-core' ),
        "base" => "dt_sc_iconbox",
		"icon" => "dt_sc_iconbox",
		"category" => DT_VC_CATEGORY,
		"params" => array(

			# Types
      		array(
      			'type' => 'dropdown',
      			'heading' => esc_html__( 'Types', 'veda-core' ),
      			'param_name' => 'type',
      			'value' => array( 
      				esc_html__('Type 1','veda-core') => 'type1',		esc_html__('Type 2','veda-core') => 'type2',		esc_html__('Type 3','veda-core') => 'type3',
      				esc_html__('Type 4','veda-core') => 'type4',		esc_html__('Type 5','veda-core') => 'type5',		esc_html__('Type 6','veda-core') => 'type6',
      				esc_html__('Type 7','veda-core') => 'type7',		esc_html__('Type 8','veda-core') => 'type8',		esc_html__('Type 9','veda-core') => 'type9',
      				esc_html__('Type 10','veda-core') => 'type10',		esc_html__('Type 11','veda-core') => 'type11',      esc_html__('Type 12','veda-core') => 'type12',
                    esc_html__('Type 13','veda-core') => 'type13',      esc_html__('Type 14','veda-core') => 'type14'
      			),
      			'description' => esc_html__( 'Select icon box type', 'veda-core' ),
      			'std' => 'type1',
      			'admin_label' => true
      		),

      		# Title
      		array(
      			"type" => "textfield",
      			"heading" => esc_html__( "Title", 'veda-core' ),
      			"param_name" => "title"
      		),

      		# Sub Title
      		array(
      			"type" => "textfield",
      			"heading" => esc_html__( "Sub Title", 'veda-core' ),
      			"param_name" => "subtitle"
      		),

      		# Icon Type
      		array(
      			'type' => 'dropdown',
      			'heading' => esc_html__('Icon Type','veda-core'),
      			'param_name' => 'icon_type',
      			'value' => array( 
                              esc_html__('Image','veda-core') => 'image',
                              esc_html__('Font Awesome', 'veda-core' ) => 'fontawesome' ,
                              esc_html__('Class','veda-core') => 'css_class',
                              esc_html__('None','veda-core') => 'none' ),
      			'std' => 'fontawesome'
      		),

      		# Font Awesome
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Font Awesome', 'veda-core' ),
				'param_name' => 'icon',
				'value' => 'fa fa-info-circle',
				'settings' => array( 'emptyIcon' => false, 'iconsPerPage' => 4000 ),
				'dependency' => array(
					'element' => 'icon_type',
					'value' => 'fontawesome',
				),
				'description' => esc_html__( 'Select icon from library', 'veda-core' ),
			),

			# Custom Icon
			array(
				'type' => 'attach_image',
				'heading' => esc_html__( 'Image', 'veda-core' ),
				'param_name' => 'iconurl',
				'description' => esc_html__( 'Select image from media library', 'veda-core' ),
				'dependency' => array( 'element' => 'icon_type', 'value' => 'image' )
			),

                  # Custom Class
                  array(
                        'type' => 'textfield',
                        'heading' => esc_html__( 'Custom class', 'veda-core' ),
                        'param_name' => 'icon_css_class',
                        'value' => '',
                        'dependency' => array(
                              'element' => 'icon_type',
                              'value' => 'css_class',
                        )
                  ),      		

      		# URL
      		array(
      			'type' => 'vc_link',
      			'heading' => esc_html__( 'URL (Link)', 'veda-core' ),
      			'param_name' => 'link',
      			'description' => esc_html__( 'Add link to icon box', 'veda-core' )
      		),

      		# Content
      		array(
      			'type' => 'textarea_html',
      			'heading' => esc_html__( 'Content', 'veda-core' ),
      			'param_name' => 'content',
      			'value' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi hendrerit elit turpis, a porttitor tellus sollicitudin at. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>'
      		),

      		# Class
      		array(
      			"type" => "textfield",
      			"heading" => esc_html__( "Extra class name", 'veda-core' ),
      			"param_name" => "class",
      			'description' => esc_html__('Style particular icon box element differently - add a class name and refer to it in custom CSS','veda-core')
      		),

                  array(
                        'type' => 'textarea',
                        'heading' => "Inline styles",
                        'param_name' => 'addstyles',
                        'description' => esc_html__( 'Enter inline styles for this iconbox', 'veda-core' )
                  )      		
		)
	) );
}?>