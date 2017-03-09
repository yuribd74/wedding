<?php add_action( 'vc_before_init', 'dt_sc_pricing_table_item_vc_map' );
function dt_sc_pricing_table_item_vc_map() {
	vc_map( array( 
		"name" => esc_html__( "Pricing Box 1", 'veda-core' ),
		"base" => "dt_sc_pricing_table_item",
		"icon" => "dt_sc_pricing_table_item",
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

      		// Thumb
			array(
				'type' => 'attach_image',
				'heading' => esc_html__( 'Image', 'veda-core' ),
				'param_name' => 'thumb',
				'description' => esc_html__( 'Select image from media library', 'veda-core' ),
			),

			// Currency
      		array(
      			"type" => "textfield",
      			"heading" => esc_html__( "Currency", 'veda-core' ),
      			"param_name" => "currency",
      			"description" => esc_html__("Enter the price for this package e.g. $157.99 enter $ here",'veda-core'),
      		),

			// Price
      		array(
      			"type" => "textfield",
      			"heading" => esc_html__( "Price", 'veda-core' ),
      			"param_name" => "price",
      			"description" => esc_html__("Enter the price for this package e.g. $157.99 enter 157 here",'veda-core'),
      			),

			// Price decimal
      		array(
      			"type" => "textfield",
      			"heading" => esc_html__( "Price", 'veda-core' ),
      			"param_name" => "decimal",
      			"description" => esc_html__("Enter the price for this package e.g. $157.99 enter .99 here",'veda-core')
      		),

			// Price Unit
      		array(
      			"type" => "textfield",
      			"heading" => esc_html__( "Price Unit", 'veda-core' ),
      			"param_name" => "permonth",
      			"description" => esc_html__("Enter the price unit for this package e.g. / Month",'veda-core')
      		),

      		// Content
      		array(
      			'type' => 'textarea_html',
      			'heading' => esc_html__( 'Content', 'veda-core' ),
      			'param_name' => 'content',
				'value' => '<ul><li>Lorem ipsum dolor sit</li><li>Praesent convallis nibh</li><li>Nullam ac sapien sit</li><li>Phasellus auctor augue</li></ul>'
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