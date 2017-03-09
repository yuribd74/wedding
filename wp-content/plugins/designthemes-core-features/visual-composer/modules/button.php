<?php add_action( 'vc_before_init', 'dt_sc_button_vc_map' );
function dt_sc_button_vc_map() {

	global $variations;

	global $dt_animation_types;

	vc_map( array(
		"name" => esc_html__( "Button", 'veda-core' ),
		"base" => "dt_sc_button",
		"icon" => "dt_sc_button",
		"category" => DT_VC_CATEGORY,
		"params" => array(

			// Button Text
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Text', 'veda-core' ),
				'param_name' => 'title',
				'value' => esc_html__( 'Text on the button', 'veda-core' ),
			),

			// Button Link
			array(
				'type' => 'vc_link',
				'heading' => esc_html__( 'URL (Link)', 'veda-core' ),
				'param_name' => 'link',
				'description' => esc_html__( 'Add link to button', 'veda-core' ),
			),

			// Button Size
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Size', 'veda-core' ),
				'description' => esc_html__( 'Select button display size', 'veda-core' ),
				'param_name' => 'size',
				'value' => array(
					esc_html__( 'Small', 'veda-core' ) => 'small',
					esc_html__( 'Medium', 'veda-core' ) => 'medium',
					esc_html__( 'Large', 'veda-core' ) => 'large',
					esc_html__( 'Xlarge', 'veda-core' ) => 'xlarge',
				),
				'std' => 'small'
			),

			// Content Color			
			array(
				"type" => "colorpicker",
      			"heading" => esc_html__( "Text color", 'veda-core' ),
      			"param_name" => "textcolor",
      			"description" => esc_html__( "Select text color", 'veda-core' ),
      		),

			array(
				"type" => "textfield",
      			"heading" => esc_html__( "Text size", 'veda-core' ),
      			"param_name" => "textsize",
      			"description" => esc_html__( "Select text size ( eg: 10px or 1.5em )", 'veda-core' ),
      		),      		

      		// Custom Font
      		array(
      			'type' => 'checkbox',
				'heading' => __( 'Use theme default font family?', 'veda-core' ),
				'param_name' => 'use_theme_fonts',
				'value' => array( __( 'Yes', 'veda-core' ) => 'yes'  ),
				'std' => 'yes',
				'description' => __( 'Use font family from the theme.', 'veda-core' ),
			),

			array(
				'type' => 'google_fonts',
				'param_name' => 'google_fonts',
				'group' => __('Typography','veda-core'),
				'value' => 'font_family:Abril%20Fatface%3Aregular|font_style:400%20regular%3A400%3Anormal',
				'settings' => array(
					'fields' => array(
						'font_family_description' => __( 'Select font family.', 'veda-core' ),
						'font_style_description' => __( 'Select font styling.', 'veda-core' ),
					),
				),
				'dependency' => array(
					'element' => 'use_theme_fonts',
					'value_not_equal_to' => 'yes',
				),
			),


      		// Variation
      		array(
      			'type' => 'dropdown',
      			'heading' => esc_html__( 'Background Color', 'veda-core' ),
      			'admin_label' => true,
      			'param_name' => 'color',
      			'value' => $variations,
      			'description' => esc_html__( 'Select button background color', 'veda-core' ),
      		),

			// BG Color			
			array(
				"type" => "colorpicker",
      			"heading" => esc_html__( "Custom Background color", 'veda-core' ),
      			"param_name" => "bgcolor",
      			"description" => esc_html__( "Select button background color", 'veda-core' ),
				'dependency' => array( 'element' => 'color', 'value' =>'-' )
      		),      		      					

			// Button Style
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Style', 'veda-core' ),
				'description' => esc_html__( 'Select button display style', 'veda-core' ),
				'param_name' => 'style',
				'value' => array(
					esc_html__( 'None', 'veda-core') => '',
					esc_html__( 'Bordered', 'veda-core' ) => 'bordered',
					esc_html__( 'Filled', 'veda-core' ) => 'filled',
					esc_html__( 'Filled Rounded Corner', 'veda-core' ) => 'filled rounded-corner',
					esc_html__( 'Rounded Corner', 'veda-core' ) => 'rounded-corner',
					esc_html__( 'Rounded Border', 'veda-core' ) => 'rounded-border',
					esc_html__( 'Fully Rounded Border', 'veda-core' ) => 'fully-rounded-border',
				),				
			),

			// Icon Type
      		array(
      			'type' => 'dropdown',
      			'heading' => esc_html__('Icon Type','veda-core'),
      			'param_name' => 'icon_type',
      			'value' => array(
      				esc_html__('None', 'veda-core' ) => '',	 
      				esc_html__('Font Awesome', 'veda-core' ) => 'fontawesome' ,
      				esc_html__('Class','veda-core') => 'css_class'
      			),
      			'std' => ''
      		),

			// Icon Alignment
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Icon Alignment', 'veda-core' ),
				'description' => esc_html__( 'Select icon alignment', 'veda-core' ),
				'param_name' => 'iconalign',
				'value' => array(
					esc_html__( 'Left', 'veda-core' ) => 'icon-left with-icon',
					esc_html__( 'Right', 'veda-core' ) => 'icon-right with-icon',
				),
				'dependency' => array( 'element' => 'icon_type', 'value' => array( 'fontawesome', 'css_class' ) ),
				'std' => ''
			),

      		// Font Awesome
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Font Awesome', 'veda-core' ),
				'param_name' => 'iconclass',
				'settings' => array( 'emptyIcon' => false, 'iconsPerPage' => 4000 ),
				'dependency' => array( 'element' => 'icon_type', 'value' => 'fontawesome' ),
				'description' => esc_html__( 'Select icon from library', 'veda-core' ),
			),

			// Custom Class
            array(
            	'type' => 'textfield',
            	'heading' => esc_html__( 'Custom icon class', 'veda-core' ),
            	'param_name' => 'icon_css_class',
            	'dependency' => array( 'element' => 'icon_type', 'value' => 'css_class' )
            ),

			// Button Animation
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Animation', 'veda-core' ),
				'description' => esc_html__( 'Select button animation', 'veda-core' ),
				'param_name' => 'animation',
				'value' => $dt_animation_types
			),			

          	// Extra class name
          	array(
          		'type' => 'textfield',
          		'heading' => esc_html__( 'Extra class name', 'veda-core' ),
          		'param_name' => 'class',
          		'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS', 'veda-core' )
          	),

			// Custom CSS
			array(
				'type' => 'css_editor',
				'heading' => esc_html__( 'CSS box', 'veda-core' ),
				'param_name' => 'css',
				'group' => esc_html__( 'Design Options', 'veda-core' )
			),
		)
	) );
} ?>