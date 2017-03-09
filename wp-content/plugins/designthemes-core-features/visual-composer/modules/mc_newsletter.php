<?php add_action( 'vc_before_init', 'dt_sc_mc_newsletter_vc_map' );
function dt_sc_mc_newsletter_vc_map() {
	vc_map( array(
		"name" => esc_html__("Mailchimp Newsletter", 'veda-core'),
		"base" => "dt_sc_mc_newsletter",
		"icon" => "dt_sc_mc_newsletter",
		"category" => DT_VC_CATEGORY,
		"description" => esc_html__("Add mailchimp newsletter signup form",'veda-core'),
		"params" => array(

			# Type
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Type','veda-core'),
				'param_name' => 'type',
				'value' => array(
					esc_html__('Default','veda-core') => '',
					esc_html__('Type 2','veda-core') => 'type2',
					esc_html__('Type 3','veda-core') => 'type3',
					esc_html__('Type 4','veda-core') => 'type4',
					esc_html__('Type 5','veda-core') => 'type5',
					esc_html__('Type 6','veda-core') => 'type6',
					esc_html__('Type 7','veda-core') => 'type7'
				),
			),

			# Main Title
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Main Title', 'veda-core' ),
				'param_name' => 'title',
			),

			# Sub Title
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Sub Title', 'veda-core' ),
				'param_name' => 'subtitle',
			),

			# Tooltip
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Tooltip', 'veda-core' ),
				'param_name' => 'tooltip',
			),

			# List id
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'List ID', 'veda-core' ),
				'param_name' => 'listid',
			),

			# Name
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Name Field', 'veda-core' ),
				'param_name' => 'name',
				'value' => esc_html__('Your Name', 'veda-core')
			),

			# Email
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Email Field', 'veda-core' ),
				'param_name' => 'email',
				'value' => esc_html__('Your Email Address', 'veda-core')
			),

			# Button
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Button Field', 'veda-core' ),
				'param_name' => 'button',
				'value' => esc_html__('Subscribe Now', 'veda-core')
			),

			# Show Name
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Show Name Field', 'veda-core' ),
				'param_name' => 'show_name',
				'value' => array( esc_html__('Yes','veda-core') => 'true', esc_html__('No','veda-core') => 'false' ),
				'std' => 'false'
			),

			# Content - type = Decoration , Triangle
			array(
				'type' => 'textarea_html',
				'heading' => esc_html__( 'Content', 'veda-core' ),
				'param_name' => 'content',
				'value' => '<br><p>Sign-up to get the latest offers and news and stay updated.</p><i>Note: We do not spam</i><br>',
			),			

			# Extra class name
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Extra class name', 'veda-core' ),
				'param_name' => 'class',
				'description' => esc_html__( 'Style particular element differently - add a class name and refer to it in custom CSS', 'veda-core' )
      		)
		)
	) );	
}?>