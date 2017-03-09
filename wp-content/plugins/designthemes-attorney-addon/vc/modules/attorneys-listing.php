<?php
add_action( 'vc_before_init', 'dt_sc_attorney_listing_vc_map' );
function dt_sc_attorney_listing_vc_map() {
	$plural_name    = esc_html__('Attorneys', 'veda-attorney');
	if( function_exists( 'veda_opts_get' ) ) :
		$plural_name	=	veda_opts_get( 'plural-attorney-name', $plural_name );
	endif;
	
	vc_map( array(
		"name" => esc_html__("Attorney Listing", "veda-attorney"),
		"base" => "dt_sc_attorney_listing",
		"icon" => "dt_sc_attorney_listing",
		"category" => $plural_name,
		'description' => esc_html__("Add attorney listing", "veda-attorney"),
		"params" => array(
			array( 
				'type' => 'dropdown',
				'param_name' => 'type',
				'value' => array(
					esc_html__( 'List', 'veda-attorney' ) => 'list',
					esc_html__( 'Two Columns', 'veda-attorney' ) => 'grid-2-column',
					esc_html__( 'Three Columns', 'veda-attorney') => 'grid-3-column',
					esc_html__( 'Four Columns', 'veda-attorney') => 'grid-4-column',
				),
      			'admin_label' => true,
      			'std' => 'list',
				'heading' => esc_html__( 'Layout', 'veda-attorney' ),
				'description' => esc_html__( 'Select attorneys listing display layout.', 'veda-attorney' )				
			)
		)
	) );
}?>