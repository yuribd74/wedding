<?php
add_action( 'vc_before_init', 'dt_sc_attorney_office_locations_group_vc_map' );
function dt_sc_attorney_office_locations_group_vc_map() {

	class WPBakeryShortCode_dt_sc_attorney_office_locations_group extends WPBakeryShortCodesContainer {
	}
	class WPBakeryShortCode_dt_sc_attorney_office_location extends WPBakeryShortCode {
	}	

	$plural_name    = esc_html__('Attorneys', 'veda-attorney');
	if( function_exists( 'veda_opts_get' ) ) :
		$plural_name	=	veda_opts_get( 'plural-attorney-name', $plural_name );
	endif;

	# Group	
	vc_map( array(
		"name" => esc_html__("Locations", "veda-attorney"),
		"base" => "dt_sc_attorney_office_locations_group",
		"icon" => "dt_sc_attorney_office_locations_group",
		"category" => $plural_name,
		"content_element" => true,
		"js_view" => 'VcColumnView',
		"as_parent" => array( "only" => "dt_sc_attorney_office_location" ),
		"description" => esc_html__("Add office locations", "veda-attorney"),
		"params" => array(

			# Class
      		array(
      			"type" => "textfield",
      			"heading" => esc_html__( "Extra class name", "veda-attorney" ),
      			"param_name" => "class",
      			'description' => esc_html__('Style particular element differently - add a class name and refer to it in custom CSS.','veda-attorney')
      		)
		)
	) );

	# Location
	vc_map( array(
		"name" => esc_html__("Location","veda-attorney"),
		"base" => "dt_sc_attorney_office_location",
		"icon" => "dt_sc_attorney_office_locations_group",
		"category" => $plural_name,
		"as_child" => array( 'only' => 'dt_sc_attorney_office_locations_group' ),
		"description" => esc_html__("Add office location", "veda-attorney"),
		"params" => array(

			# Title
      		array(
      			"type" => "textfield",
      			"heading" => esc_html__( "Title", "veda-attorney" ),
      			"param_name" => "title",
      			"admin_label" => true
      		),

			# Address
      		array(
      			"type" => "textfield",
      			"heading" => esc_html__( "Address", "veda-attorney" ),
      			"param_name" => "address"
      		),

			# Email ID
      		array(
      			"type" => "textfield",
      			"heading" => esc_html__( "Email ID", "veda-attorney" ),
      			"param_name" => "email"
      		),

			# Phone
      		array(
      			"type" => "textfield",
      			"heading" => esc_html__( "Phone", "veda-attorney" ),
      			"param_name" => "phone"
      		),

			# Fax
      		array(
      			"type" => "textfield",
      			"heading" => esc_html__( "Fax", "veda-attorney" ),
      			"param_name" => "fax"
      		), 

			# Map
      		array(
      			"type" => "vc_link",
      			"heading" => esc_html__( "View on Map", "veda-attorney" ),
      			"param_name" => "map"
      		)      		     		
		)
	));
}?>