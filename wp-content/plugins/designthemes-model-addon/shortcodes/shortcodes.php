<?php
class DTModelShortcodesDefinition {
	
	function __construct() {
		
		add_shortcode ( "dt_sc_current_model_slider", array (
			$this,
			"dt_sc_current_model_slider"
		) );

		add_shortcode ( "dt_sc_current_model_meta", array (
			$this,
			"dt_sc_current_model_meta"
		) );

		add_shortcode ( "dt_sc_related_models", array (
			$this,
			"dt_sc_related_models"
		) );

		add_shortcode ( "dt_sc_recent_models", array (
			$this,
			"dt_sc_recent_models"
		) );
		
		add_shortcode( "dt_sc_models_with_filter", array(
			$this,
			"dt_sc_models_with_filter"
		) );
		
		add_shortcode( "dt_sc_model_item", array(
			$this,
			"dt_sc_model_item"
		) );
	}

	/**
	 *
	 * @param string $content
	 * @return string
	 */
	function dtShortcodeHelper($content = null) {
		$content = do_shortcode ( shortcode_unautop ( $content ) );
		$content = preg_replace ( '#^<\/p>|^<br \/>|<p>$#', '', $content );
		$content = preg_replace ( '#<br \/>#', '', $content );
		return trim ( $content );
	}
	
	function dt_sc_current_model_slider( $attrs, $content = null ) {
		extract ( shortcode_atts ( array (
			'id' => '',
			'class' => '',
		), $attrs ) );
		
		if( empty($id) ) {
			global $post;
			$id =  $post->ID;
		}
		
		$model_settings = get_post_meta ( $id, '_custom_settings', TRUE );
		$model_settings = is_array ( $model_settings ) ? $model_settings : array ();		
		
		$out  = "<div class='dt-sc-model-single-slider-wrapper ".esc_attr($class)."'>";
		$out .= '	<ul class="dt-sc-model-single-slider">';
						$thumbnail = get_the_post_thumbnail($id,'full');
						$out .= !empty($thumbnail) ? '<li>'.$thumbnail.'</li>':'';
						if( array_key_exists("items_name",$model_settings) ) {
							foreach( $model_settings["items_name"] as $key => $item ){
								$current_item = $model_settings["items"][$key];
								
								if( "video" === $item ) {
									$out .= "<li>".wp_oembed_get( $current_item )."</li>";
								} else {
									$out .= "<li> <img src='".esc_url($current_item)."' alt='' title='' /></li>";
								}
							}
						}
		$out .= '	</ul>';
		$out .= '</div>';
		
		return $out;
	}	

	function dt_sc_current_model_meta( $attrs, $content = null ) {
		extract ( shortcode_atts ( array (
			'id' => '',
			'class' => '',
		), $attrs ) );
		
		if( empty($id) ) {
			global $post;
			$id =  $post->ID;
		}
		
		$model_settings = get_post_meta ( $id, '_custom_settings', TRUE );
		$model_settings = is_array ( $model_settings ) ? $model_settings : array ();
		
		$out  = "<div class='dt-sc-model-single-details ".esc_attr($class)."'>";
					 if( array_key_exists('meta_title', $model_settings) ) {
						 if( array_key_exists('subtitle', $model_settings) ) {
							 $out .= '<h4>'.esc_html($model_settings['subtitle']).'</h4>';
						 }
							 $out .= '<ul class="dt-sc-model-details">';
							 			foreach( $model_settings['meta_title'] as $key => $title ){
											$value = $model_settings['meta_value'][$key];
											
											if( filter_var($value ,FILTER_VALIDATE_URL) ){
												$value = "<a href='".esc_url($value)."'>".veda_wp_kses($value)."</a>";
											} elseif( is_email($value) ){
												$email = sanitize_email($value);
												$value = "<a href='mailto:".antispambot($email,1)."'>".antispambot($value)."</a>";
											}
											
											if( !empty($value) ) {
												$out .= '<li> <span>'.esc_html($title).'</span>'.veda_wp_kses($value).'</li>';
											}
										}
							 $out .= '</ul>';
					 }
		$out .= '</div>';
		return $out;
	}
	
	function dt_sc_related_models( $attrs, $content = null ){
		extract ( shortcode_atts ( array (
			'id' => '',
			'class' => '',
			'column' => '6',
			'count'	 => '6'	
		), $attrs ) );
		
		if( empty($id) ) {
			global $post;
			$id =  $post->ID;
		}
		
		$out = $columnclass = "";
		switch( $column ) {
			case '1':
				$columnclass = 'dt-sc-one-column no-space';
			break;
			case '2':
				$columnclass = 'dt-sc-one-half no-space';
			break;
			case '3':
				$columnclass = 'dt-sc-one-third no-space';
			break;
			case '4':
				$columnclass = 'dt-sc-one-fourth no-space';
			break;
			case '5':
				$columnclass = 'dt-sc-one-fifth no-space';
			break;
			case '6':
				$columnclass = 'dt-sc-one-sixth no-space';
			break;
		}
		
		$terms = wp_get_object_terms( $id, 'model_entries', array('fields' => 'ids') );
		
		$args = array(
			'post_type'				=> 'dt_models',
			'posts_per_page'		=> $count,
			'post__not_in'			=> array( $id ),
			'post_status'			=> 'publish',
			'ignore_sticky_posts'	=> true,
			'no_found_rows'			=> true,
			'tax_query'				=> array()
		);

		$args['tax_query'][] = array( 'taxonomy' => 'model_entries', 'field' => 'id', 'terms' => $terms, 'operator' => 'IN');
		
		$the_query = new WP_Query( $args );
		if( $the_query->have_posts() ) {
			$i = 1;
			$out .= "<div class='dt-sc-model-container ".esc_attr($class)."'>";
				while ( $the_query->have_posts() ){
					$the_query->the_post();
					$the_id = get_the_id();
					
					$temp_class = $columnclass;
					
					if($i == 1){
						$temp_class .= " first";
					}
					if($i == $column) $i = 1; else $i = $i + 1;					
					
					$out .= '<div id="dt_models-'.esc_attr($the_id).'" class="column dt-sc-model '.esc_attr($temp_class).'">';
					$sc   = '[dt_sc_model_item id="'.$the_id.'"/]';
					$out .= do_shortcode($sc);
					$out .= '</div>';
				}
			$out .= '</div>';
		}
		
		return $out;		
	}
	
	
	function dt_sc_recent_models( $attrs, $content = null ){
		extract ( shortcode_atts ( array (
			'column' => '6',
			'count'	 => '6',
			'class' => '',
		), $attrs ) );

		$out = $columnclass = "";
		switch( $column ) {
			case '1':
				$columnclass = 'dt-sc-one-column no-space';
			break;
			case '2':
				$columnclass = 'dt-sc-one-half no-space';
			break;
			case '3':
				$columnclass = 'dt-sc-one-third no-space';
			break;
			case '4':
				$columnclass = 'dt-sc-one-fourth no-space';
			break;
			case '5':
				$columnclass = 'dt-sc-one-fifth no-space';
			break;
			case '6':
				$columnclass = 'dt-sc-one-sixth no-space';
			break;
		}
		
		$args = array( 'orderby' => 'date', 'post_type' => 'dt_models', 'posts_per_page'=> $count, 'post_status'=> 'publish', 'ignore_sticky_posts'	=> true);
		$the_query = new WP_Query( $args );
		if( $the_query->have_posts() ) {
			$i = 1;
			$out .= "<div class='dt-sc-model-container ".esc_attr($class)."'>";
				while ( $the_query->have_posts() ){
					$the_query->the_post();
					$the_id = get_the_id();
					
					$temp_class = $columnclass;
					
					if($i == 1){
						$temp_class .= " first";
					}
					if($i == $column) $i = 1; else $i = $i + 1;					
					
					$out .= '<div id="dt_models-'.esc_attr($the_id).'" class="column dt-sc-model '.esc_attr($temp_class).'">';
					$sc   = '[dt_sc_model_item id="'.$the_id.'"/]';
					$out .= do_shortcode($sc);
					$out .= '</div>';
				}
			$out .= '</div>';
		}
		
		return $out;
	}
	
	function dt_sc_models_with_filter( $attrs, $content = null ){
		extract ( shortcode_atts ( array (
			'title'  => '',
			'column' => '6',
			'count'	 => '6',			
		), $attrs ) );

		switch( $column ) {
			case '1':
				$columnclass = 'column dt-sc-model dt-sc-one-column no-space';
			break;
			case '2':
				$columnclass = 'column dt-sc-model dt-sc-one-half no-space';
			break;
			case '3':
				$columnclass = 'column dt-sc-model dt-sc-one-third no-space';
			break;
			case '4':
				$columnclass = 'column dt-sc-model dt-sc-one-fourth no-space';
			break;
			case '5':
				$columnclass = 'column dt-sc-model dt-sc-one-fifth no-space';
			break;
			case '6':
				$columnclass = 'column dt-sc-model dt-sc-one-sixth no-space';
			break;
		}
		
		$sorting  = '<div class="dt-sc-model-sorting">';
		$sorting .= '<a href="#" class="active-sort" title="" data-filter=".all-sort">'.esc_html__('All','veda-model').'</a>';
					$categories = get_categories('taxonomy=model_entries&hide_empty=1');
					foreach( $categories as $category ){
						$sorting .= '<a href="#" data-filter=".'.esc_attr($category->category_nicename).'-sort">'.esc_html($category->cat_name).'</a>';
					}
		$sorting .= '</div>';

		
		$out  = '<div class="section-wrapper dt-sc-model-sorter">';
		$out .= '	<div class="container">';
		
					if( empty($title) ){
						$out .= '<div class="column dt-sc-one-column no-space">';
						$out .= $sorting;
						$out .= '</div>';
					} else {
						$out .= '<div class="column dt-sc-three-sixth no-space">';
						$out .= '	<div class="dt-sc-clear"> </div>';
						$out .= '	<h2>'.esc_html($title).'</h2>';
						$out .= '	<div class="dt-sc-double-border-separator"> </div>';
						$out .= '	<div class="dt-sc-hr-invisible-xsmall"> </div>';
						$out .= '	<div class="dt-sc-clear"> </div>';
						$out .= '</div>';
						$out .= '<div class="column dt-sc-three-sixth no-space">';
						$out .= 	$sorting;
						$out .= '</div>';
					}
		$out .= '	</div>';
		$out .= '</div>';
		
		$out .= '<div class="section-wrapper fullwidth-section dt-sc-model-sorting-elements">';
		$out .= '	<div class="container">';
		$out .= '		<div class="dt-sc-model-container">';
						
						$args = array( 'orderby' => 'date', 'post_type' => 'dt_models', 'posts_per_page'=> $count, 'post_status'=> 'publish', 'ignore_sticky_posts'	=> true);
						$the_query = new WP_Query( $args );
						if( $the_query->have_posts() ) {
							$i = 1;
							while( $the_query->have_posts() ) {
								$the_query->the_post();
								$the_id = get_the_id();
								
								$temp_class = $columnclass;
								
								if($i == 1){
									$temp_class .= " first";
								}
								
								if($i == $column) $i = 1; else $i = $i + 1;	
								
								$item_categories = get_the_terms( $the_id, 'model_entries' );
								if(is_object($item_categories) || is_array($item_categories)) {
									$temp_class .= " all-sort ";
									foreach ($item_categories as $category) {
										$temp_class .=" ".$category->slug.'-sort ';
									}
								}
								
								$sc   = '[dt_sc_model_item id="'.$the_id.'" class="'.$temp_class.'"/]';
								$out .= do_shortcode($sc);							
							}
						}
		$out .= '		</div>';
		$out .= '	</div>';
		$out .= '</div>';
		return $out;
	}
	
	function dt_sc_model_item( $attrs, $content = null ){

		extract ( shortcode_atts ( array (
			'id' => '',
			'class' => '',
		), $attrs ) );
		
		$out = "";
		if( !empty($id) ){
			$p = get_post( $id );
			if( $p->post_type === "dt_models" ) {
				
				$title = get_the_title($id);
				$permalink = get_permalink($id);
				
				$model_settings = get_post_meta ( $id, '_custom_settings', TRUE );
				$model_settings = is_array ( $model_settings ) ? $model_settings : array ();
				
				$out .= '<div id="dt_models-'.esc_attr($id).'" class="dt-sc-model '.esc_attr($class).'">';
				
				$out .= '<figure>';
					if( has_post_thumbnail($id) ){
						$out .= '<a href="'.esc_url($permalink).'">'.get_the_post_thumbnail($id,'full').'</a>';
					} else if( array_key_exists("items_name",$model_settings) ) {
						$image = "";
						$item =  $model_settings['items_name'][0];
						if( "video" === $item ) {
							$x = array_diff( $model_settings['items_name'] , array("video") );
							$image = $model_settings['items'][key($x)];
						} else {
							$image = $model_settings['items'][0];
						}
						
						$out .=  !empty($image) ? '<a href="'.esc_url($permalink).'"><img src="'.esc_url($image).'" alt="'.esc_attr($title).'" title="'.esc_attr($title).'"/></a>' : '';
					} else {
						$out .= '<a href="'.esc_url($permalink).'"><img src="http://place-hold.it/1170x902&text='.esc_html($title).'" alt="'.esc_attr($title).'" title="'.esc_attr($title).'"/></a>';						
					}
					
				$out .= '<figcaption>';
				$out .= '	<h3><a href="'.esc_url($permalink).'">'.esc_html($title).'</a></h3>';
							if( array_key_exists('meta_title', $model_settings) ){
								$data = array_splice($model_settings['meta_title'],0,2);
								$out .= '<h4>';
								$i = 1;
									foreach( $data as $key => $title ){
										$value = $model_settings['meta_value'][$key];
										if( !empty($value) ) {
											if( filter_var($value ,FILTER_VALIDATE_URL) ){
												$value = "<a href='".esc_url($value)."'>".esc_html($value)."</a>";
											} elseif( is_email($value) ){
												$email = sanitize_email($value);
												$value = "<a href='mailto:".antispambot($email,1)."'>".antispambot($value)."</a>";
											}
											
											$out .= $title.':'.$value;
											if( $i == 1 ) {
												$out .= ' / ';
											}
										}
										$i++;
									}
								$out .= '</h4>';
							}
				$out .= '</figcaption>';

				$out .= '</figure>';
				$out .= '</div>';
			}
		}
		
		return $out;
	}		
}
new DTModelShortcodesDefinition();
?>