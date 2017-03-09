<?php add_action( 'vc_before_init', 'dt_sc_search_form_vc_map' );
function dt_sc_search_form_vc_map() {
	vc_map( array(
		"name" => esc_html__( "Search Form", 'veda-core' ),
		"base" => "dt_sc_search_form",
		"icon" => "dt_sc_search_form",
		"category" => DT_VC_CATEGORY,
		"show_settings_on_create" => false
	) );	
}?>