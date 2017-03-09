<?php
add_action( 'vc_before_init', 'dt_sc_addon_events_grid_vc_map' );
function dt_sc_addon_events_grid_vc_map() {

	vc_map( array(
		"name" => esc_html__("DJ Events Grid", "veda-event"),
		"base" => "dt_sc_addon_events_grid",
		"icon" => "dt_sc_addon_events_grid",
		"category" => esc_html__('Night Club','veda-event'),
		'description' => esc_html__("Show DJs Events grid", "veda-event"),
		"params" => array(

          	array(
          		'type' => 'textfield',
          		'heading' => esc_html__( 'Limit', 'veda-event' ),
          		'param_name' => 'limit',
          		'description' => esc_html__( 'Put number of DJs events to show', 'veda-event' )
          	),

          	array(
          		'type' => 'textfield',
          		'heading' => esc_html__( 'Categories', 'veda-event' ),
          		'param_name' => 'categories',
          		'description' => esc_html__( 'Put category id, separated by comma', 'veda-event' )
          	),

			array( 
				'type' => 'dropdown',
				'param_name' => 'filter',
				'value' => array(
					esc_html__( 'Yes', 'veda-event' ) => 'yes',
					esc_html__( 'No', 'veda-event' ) => 'no',
				),
      			'admin_label' => true,
      			'std' => 'yes',
				'heading' => esc_html__( 'Layout', 'veda-event' ),
				'description' => esc_html__( 'Select filterable doctor display layout.', 'veda-event' )				
			)          	          				
		)
	) );
}?>