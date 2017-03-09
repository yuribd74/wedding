<?php add_action( 'vc_before_init', 'dt_sc_pricing_table_minimal_item_vc_map' );
function dt_sc_pricing_table_minimal_item_vc_map() {
	vc_map( array( 
		"name" => esc_html__( "Pricing Box 2", 'veda-core' ),
            "base" => "dt_sc_pricing_table_minimal_item",
		"icon" => "dt_sc_pricing_table_minimal_item",
		"category" => DT_VC_CATEGORY,		
		"params" => array(

			// Heading
      		array(
      			"type" => "textfield",
      			"heading" => esc_html__( "Title", 'veda-core' ),
				'admin_label' => true,
      			"param_name" => "heading"
      		),

			// Sub Title
      		array(
      			"type" => "textfield",
      			"heading" => esc_html__( "Sub title", 'veda-core' ),
				'admin_label' => true,
      			"param_name" => "subtitle"
      		),

      		// selected
      		array(
      			'type' => 'checkbox',
      			'heading' => esc_html__( 'Is active?', 'veda-core' ),
				'admin_label' => true,
      			'param_name' => 'highlight',
      			'description' => esc_html__( 'If checked pricing box will be highlighted', 'veda-core' ),
      			'value' => array( esc_html__( 'Yes', 'veda-core' ) => 'yes' )
      		),

                  # Icon Type
                  array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Icon Type','veda-core'),
                        'param_name' => 'icon_type',
                        'value' => array( 
                              esc_html__('Font Awesome', 'veda-core' ) => 'fontawesome' ,
                              esc_html__('Class','veda-core') => 'css_class' ),
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

                  // Starting
                  array(
                        "type" => "textfield",
                        "heading" => esc_html__( "Text before price", 'veda-core' ),
                        "param_name" => "starting"
                  ),

			// Price
      		array(
      			"type" => "textfield",
      			"heading" => esc_html__( "Price", 'veda-core' ),
      			"param_name" => "price",
      			"description" => esc_html__("Enter the price for this package e.g. $157.99 ",'veda-core'),
      			),

			// Price Unit
      		array(
      			"type" => "textfield",
      			"heading" => esc_html__( "Price Unit", 'veda-core' ),
      			"param_name" => "permonth",
      			"description" => esc_html__("Enter the price unit for this package e.g. / Mo",'veda-core')
      		),

      		# URL
      		array(
      			'type' => 'vc_link',
      			'heading' => esc_html__( 'URL (Link)', 'veda-core' ),
      			'param_name' => 'link',
      			'description' => esc_html__( 'Add link to this package', 'veda-core' )
      		)      		      		      					      		
		)
	) );
}?>