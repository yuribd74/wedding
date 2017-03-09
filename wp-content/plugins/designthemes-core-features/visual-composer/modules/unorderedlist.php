<?php add_action( 'vc_before_init', 'dt_sc_fancy_ul_vc_map' );
function dt_sc_fancy_ul_vc_map() {

	global $variations;

	vc_map( array(
		"name" => esc_html__( "Fancy Unordered List", 'veda-core' ),
		"base" => "dt_sc_fancy_ul",
		"icon" => "dt_sc_fancy_ul",
		"category" => DT_VC_CATEGORY,
		"params" => array(
			
			// Style
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Style', 'veda-core'),
				'param_name' => 'style',
				'admin_label' => true,
				'std' => 'arrow',
				'value' => array(
					'Adjust' => 'adjust', 'Arrow' => 'arrow', 'Asterisk' => 'asterisk', 'Book' => 'book', 'Cart' => 'cart', 'Check' => 'check', 'Circle Bullet' => 'circle-bullet', 'Circle Tick' => 'circletick', 'Cog' => 'cog', 'Comment' => 'comment',
					'Cross' => 'cross', 'Delete' => 'delete', 'Desktop' => 'desktop', 'Double Arrow' => 'double-arrow', 'Download' => 'download', 'Edit' => 'edit', 'External Link' => 'external-link', 'Facebook' => 'facebook', 'Folder Open' => 'folder-open',
					'Folder' => 'folder', 'Globe' => 'globe', 'Google Plus' => 'google-plus', 'Hand' => 'hand', 'Heart' => 'heart', 'Key' => 'key', 'Link' => 'link', 'Linkedin' => 'linkedin', 'Mail' => 'mail',
					'Map Marker' => 'map-marker','Minus' => 'minus','Mobile' => 'mobile','None' => '','Paper Clip' => 'paper-clip','Pencil' => 'pencil','Play' => 'play','Play2' => 'play2','Plus' => 'plus',
					'Print' => 'print', 'Pushpin' => 'pushpin', 'Quote' => 'quote', 'Reply' => 'reply', 'Rounded Arrow' => 'rounded-arrow', 'Rounded Circle Tick' => 'rounded-circle-tick', 'Rounded Cross' => 'rounded-cross', 'Rounded Info' => 'rounded-info', 'Rounded Minus' => 'rounded-minus', 
					'Rounded Plus' => 'rounded-plus', 'Rounded Question' => 'rounded-question', 'Rounded Tick Alter' => 'rounded-tick-alter', 'Rounded Tick' => 'rounded-tick', 'Rss' => 'rss', 'Search' => 'search', 'Share' => 'share', 'Star' => 'star', 'Tablet' => 'tablet',
					'Tag' => 'tag', 'Tea Mug' => 'teamug', 'Thumbs Down' => 'thumbs-down', 'Thumbs Up' => 'thumbs-up', 'Tick' => 'tick', 'Time' => 'time', 'Trash' => 'trash', 'Twitter' => 'twitter', 'Warning' => 'warning'					
				)
			),

			// Style
			array(
				'type' => 'dropdown',
				'admin_label' => true,
				'heading' => esc_html__('Variation', 'veda-core'),
				'param_name' => 'variation',
      			'value' => $variations,
			),

			// Content
			array(
				'type' => 'textarea_html',
				'heading' => esc_html__('Add Unordered List','veda-core'),
				'param_name' => 'content',
				'value' => '<ul><li>Lorem ipsum dolor sit</li><li>Praesent convallis nibh</li><li>Nullam ac sapien sit</li><li>Phasellus auctor augue</li></ul>'
			),

			// Custom Class
      		array(
      			"type" => "textfield",
      			'admin_label' => true,
      			"heading" => esc_html__( "Custom Class", 'veda-core' ),
      			"param_name" => "class"
      		)			
		)
		)	
    );
} ?>