<?php
class DTAttorneyShortcodesDefinition {
	
	function __construct() {
		
		add_shortcode( "dt_sc_attorney_item", array(
			$this,
			"dt_sc_attorney_item"
		) );

		add_shortcode ( "dt_sc_attorney_listing", array (
			$this,
			"dt_sc_attorney_listing"
		) );

		// Ajax's for Attorney filtering Shortcode
		add_action( 'wp_ajax_dt_sc_filter_attorneys', array(
			$this, 'dt_sc_filter_attorneys'
		) );

		add_action( 'wp_ajax_nopriv_dt_sc_filter_attorneys', array(
			$this, 'dt_sc_filter_attorneys'
		) );

		add_shortcode("dt_sc_current_attorney_meta", array(
			$this,
			"dt_sc_current_attorney_meta"
		) );

		add_shortcode("dt_sc_current_attorney_info", array(
			$this,
			"dt_sc_current_attorney_info"
		) );

		add_shortcode("dt_sc_current_attorney_role", array(
			$this,
			"dt_sc_current_attorney_role"
		) );

		add_shortcode("dt_sc_attorney_office_locations_group", array(
			$this,
			"dt_sc_attorney_office_locations_group"
		) );

		add_shortcode("dt_sc_attorney_office_location", array(
			$this,
			"dt_sc_attorney_office_location"
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

	function dt_sc_attorney_item( $attrs, $content = null ) {

		extract ( shortcode_atts ( array (
			'id' => '',
			'class' => '',
			'type'	=>	''
		), $attrs ) );

		$out = "";

		if( empty($id) ) {
			global $post;
			$id =  $post->ID;
		}

		$p = get_post( $id );

		if( $p->post_type === "dt_attorneys" ) {

			$out .= ( $type == 'list' ) ? '<div class="dt-sc-attorney">' : '';		
			

			$title = get_the_title($id);
			$permalink = get_permalink($id);
			$terms =  get_the_terms( $id, 'attorney_departments' );

			$settings = get_post_meta ( $id, '_custom_settings', TRUE );
			$settings = is_array ( $settings ) ? $settings : array ();			

			$image =  has_post_thumbnail($id) ? get_the_post_thumbnail($id,'full') : '<img src="http://place-hold.it/300X367.jpg&text='.esc_html($title).'" alt="'.esc_attr($title).'" title="'.esc_attr($title).'"/>';

			$out .= '<div class="dt-sc-team">';
			$out .= '	<div class="dt-sc-team-thumb">';
			$out .= '		<a href="'.esc_url($permalink).'">'.veda_wp_kses($image).'</a>';
			$out .= '	</div>';
			$out .= '	<div class="dt-sc-team-details">';
			$out .= '		<h4><a href="'.esc_url($permalink).'">'.esc_html($title).'</a></h4>';

							if( $type == 'grid' && array_key_exists('role', $settings) ) {
								$out .= '<h5>'.esc_html($settings['role']).'</h5>';
							}

							if( $type == 'list' && array_key_exists('phone', $settings) ) {
								$out .= '<h5>'.esc_html($settings['phone']).'</h5>';
							}

							$social = array_key_exists("social",$settings) ? $settings['social'] : '';
							if( !empty($social) ) {
								$social = do_shortcode($social);
								$out .= $social;
							}
			$out .= '	</div>';
			$out .= '</div>';

			if( $type == 'list' ){

				$out .= '<div class="dt-sc-attorney-details">';
							if( array_key_exists('role', $settings) ) {
								$out .= '<h5>'.esc_html($settings['role']).'</h5>';
							}

							$meta_show = array_key_exists('meta_show', $settings) ? $settings['meta_show'] : array();
				$out .= '	<ul class="dt-sc-attorney-meta">';
							foreach( $settings['meta_title'] as $key => $title ) {

								if( ! array_key_exists($key, $meta_show ) ) {

									$value = $settings['meta_value'][$key];

									if( filter_var($value ,FILTER_VALIDATE_URL) ){
										$value = "<a href='".esc_url($value)."'>".esc_html($value)."</a>";
									} elseif( is_email($value) ){
										$email = sanitize_email($value);
										$value = "<a href='mailto:".antispambot($email,1)."'>".antispambot($value)."</a>";
									}

									if( !empty($value) ) {
										$out .= '<li> <span>'.esc_html($title).'</span><p>'.veda_wp_kses($value).'</p> </li>';
									}
								}
							}

							$tax_sname = veda_opts_get( 'singular-attorney-tax-name', esc_html__('Department', 'veda-attorney') );
							$out .= '<li>';
							$out .= '<span>'.esc_html($tax_sname).'</span>';
							$out .=  get_the_term_list( $the_id, 'attorney_departments', "<p>", ', ', '</p>' );
							$out .= '</li>';
				$out .= '	</ul>';
				$out .= array_key_exists("summary-title",$settings) ? '<h6>'.$settings['summary-title'].'</h6>': ''; 
				$out .= array_key_exists("summary",$settings) ? '<p>'.$settings['summary'].'</p>' :'';
				$out .= '<a class="read-more" title="" href="'.esc_attr($permalink).'">'.esc_html__('Read More','veda-attorney').' <span> &gt; </span> </a>'; 
				$out .= '</div>';
			}

			$out .= ( $type == 'list' ) ? '</div>' : '';			
			
			return $out;
		}
	}

	function dt_sc_attorney_listing( $attrs, $content = null ) {

		extract ( shortcode_atts ( array ( 'type' => '' ), $attrs ) );

		$columnclass = $column = $style = '';
		switch( $type ){

			case 'grid-2-column':
				$style = 'grid';
				$column = 2;
				$columnclass = 'column dt-sc-one-half';
			break;

			case 'grid-3-column':
				$style = 'grid';
				$column = 3;
				$columnclass = 'column dt-sc-one-third';
			break;

			case 'grid-4-column':
				$style = 'grid';
				$column = 4;
				$columnclass = 'column dt-sc-one-fourth';
			break;

			case 'list':
			default:
				$style = 'list';
				$column = 1;
				$columnclass = 'column dt-sc-one-column';
			break;						
		}


		$content = DTCoreShortcodesDefination::dtShortcodeHelper ( $content );

		$out  = '<div class="dt-sc-attorney-sorting">';
		$out .= '	<a href="#" data-filter="*">'.esc_html__('All','veda-attorney').'</a>';
					$alphabets = array( esc_html__('A','veda-attorney'), esc_html__('B','veda-attorney'), esc_html__('C','veda-attorney'), esc_html__('D','veda-attorney'),esc_html__('E','veda-attorney'),
						esc_html__('F','veda-attorney'), esc_html__('G','veda-attorney'), esc_html__('H','veda-attorney'), esc_html__('I','veda-attorney'), esc_html__('J','veda-attorney'),
						esc_html__('K','veda-attorney'), esc_html__('L','veda-attorney'), esc_html__('M','veda-attorney'), esc_html__('N','veda-attorney'), esc_html__('O','veda-attorney'),
						esc_html__('P','veda-attorney'), esc_html__('Q','veda-attorney'), esc_html__('R','veda-attorney'), esc_html__('S','veda-attorney'), esc_html__('T','veda-attorney'),
						esc_html__('U','veda-attorney'), esc_html__('V','veda-attorney'), esc_html__('W','veda-attorney'), esc_html__('X','veda-attorney'), esc_html__('Y','veda-attorney'),
						esc_html__('Z','veda-attorney') );

					foreach( $alphabets as $key => $alphabet ) {
						$class = ( $key == 0 ) ? ' class="active-sort" ':'';
						$out .= '<a href="#" '.$class.'>'.$alphabet.'</a>';
					}
		$out .= '</div>';
		$out .= '<div class="dt-sc-hr-invisible-medium"></div>';

		if( !empty($content) ) {
			$out .= '<div class="column dt-sc-three-fourth first">';
		}

		$out .= '<div class="dt-sc-attorneys-container" data-type="'.$type.'">';
			$attorneys = array( 'post_type'=>'dt_attorneys', 'posts_per_page'=>'-1', 'suppress_filters' => false, 'order_by'=> 'published');
			$attorneys['search_attorney_title'] = esc_html__('A','veda-attorney');
			add_filter( 'posts_where', array( $this, 'attorney_title_filter' ), 10, 2 );

			$wp_query = new WP_Query();
			$wp_query->query( $attorneys );
			if( $wp_query->have_posts() ) {
				$i = 1;
				while( $wp_query->have_posts() ) {
					$wp_query->the_post();
					$the_id = get_the_ID();
					$temp_class = $columnclass;

					if($i == 1){
						$temp_class .= " first";
					}

					if($i == $column) $i = 1; else $i = $i + 1;
					$out .= '<div class="'.esc_attr($temp_class).'">';
					$sc   = '[dt_sc_attorney_item id="'.$the_id.'" type="'.$style.'"/]';
					$out .= do_shortcode($sc);
					$out .= '</div>';
				}
			} else {
				$out .= '<div class="column dt-sc-one-column">';
				$out .= '<h2>'.esc_html__("Nothing Found.", "veda-attorney").'</h2>';
				$out .= '<p>'.esc_html__("Apologies, but no results were found for the request.", "veda-attorney").'</p>';
				$out .= '</div>';
			}

		$out .= '</div>';

		if( !empty($content) ) {
			$out .= '</div>';
			$out .= '<div class="column dt-sc-one-fourth">';
			$out .= $content;
			$out .= '</div>';
		}

		return $out;
	}

	function attorney_title_filter( $where, &$wp_query ){

		global $wpdb;
		if ( $search_term = $wp_query->get( 'search_attorney_title' ) ) {
			$where .= ' AND ' . $wpdb->posts . '.post_title LIKE \''. esc_sql( $wpdb->esc_like( $search_term ) ) . '%\'';
		}

		return $where;
    }

    /* Ajax call */
    function dt_sc_filter_attorneys() {

    	$out = $columnclass = $column = $style = '';

    	$data = $_REQUEST['data'];
    	$data = array_filter($data);

    	$type = array_key_exists( 'type', $data) ? $data['type'] : 'list';

		switch( $type ){

			case 'grid-2-column':
				$style = 'grid';
				$column = 2;
				$columnclass = 'column dt-sc-one-half';
			break;

			case 'grid-3-column':
				$style = 'grid';
				$column = 3;
				$columnclass = 'column dt-sc-one-third';
			break;

			case 'grid-4-column':
				$style = 'grid';
				$column = 4;
				$columnclass = 'column dt-sc-one-fourth';
			break;

			case 'list':
			default:
				$style = 'list';
				$column = 1;
				$columnclass = 'column dt-sc-one-column';
			break;						
		}

		$attorneys = array( 'post_type'=>'dt_attorneys', 'posts_per_page'=>'-1', 'suppress_filters' => false, 'order_by'=> 'published');

		if( array_key_exists('title', $data ) && ( trim($data['title']) !== '*' ) ) {

			$attorneys['search_attorney_title'] =  $data['title'];
			add_filter( 'posts_where', array( $this, 'attorney_title_filter' ), 10, 2 );
		}

		$wp_query = new WP_Query();
		$wp_query->query( $attorneys );
		if( $wp_query->have_posts() ) {
			$i = 1;
			while( $wp_query->have_posts() ) {
				$wp_query->the_post();
				$the_id = get_the_ID();
				$temp_class = $columnclass;

				if($i == 1){
					$temp_class .= " first";
				}

				if($i == $column) $i = 1; else $i = $i + 1;

				$out .= '<div class="'.esc_attr($temp_class).'">';
				$sc   = '[dt_sc_attorney_item id="'.$the_id.'" type="'.$style.'"/]';
				$out .= do_shortcode($sc);
				$out .= '</div>';
			}
		} else {
			$out .= '<div class="column dt-sc-one-column">';
			$out .= '<h2>'.esc_html__("Nothing Found.", "veda-attorney").'</h2>';
			$out .= '<p>'.esc_html__("Apologies, but no results were found for the request.", "veda-attorney").'</p>';
			$out .= '</div>';
		}

    	echo $out;
    	die();
    }
	
	function dt_sc_current_attorney_meta( $attrs, $content = null ) {

		extract ( shortcode_atts ( array (
			'id' => '',
			'class' => '',
		), $attrs ) );

		if( empty($id) ) {
			global $post;
			$id =  $post->ID;
		}

		$p = get_post( $id );
		
		if( $p->post_type === "dt_attorneys" ) {
			
			$out = '';
			$settings = get_post_meta ( $id, '_custom_settings', TRUE );
			$settings = is_array ( $settings ) ? $settings : array ();
			
			if( array_key_exists('meta_title', $settings) ) {
				
				$out .= '<ul class="dt-sc-attorney-meta">';
				
				foreach( $settings['meta_title'] as $key => $title ) {
					
					$value = $settings['meta_value'][$key];
					
					if( filter_var($value ,FILTER_VALIDATE_URL) ){
						$value = "<a href='".esc_url($value)."'>".esc_html($value)."</a>";
					} elseif( is_email($value) ){
						$email = sanitize_email($value);
						$value = "<a href='mailto:".antispambot($email,1)."'>".antispambot($value)."</a>";
					}
					
					if( !empty($value) ) {
						$out .= '<li> <span>'.esc_html($title).'</span><p>'.veda_wp_kses($value).'</p> </li>';
					}
				}
				$tax_sname = veda_opts_get( 'singular-attorney-tax-name', esc_html__('Department', 'veda-attorney') );
				$out .= '<li>';
				$out .= '<span>'.esc_html($tax_sname).'</span>';
				$out .= get_the_term_list( $the_id, 'attorney_departments', "<p>", ', ', '</p>' );
				$out .= '</li>';				
				$out .= '</ul>';
				
				return $out;
			}
		}		
	}
	
	function dt_sc_current_attorney_info( $attrs, $content = null ) {
		extract ( shortcode_atts ( array (
			'id' => '',
			'class' => '',
		), $attrs ) );

		if( empty($id) ) {
			global $post;
			$id =  $post->ID;
		}

		$p = get_post( $id );
		$out = '';
		
		if( $p->post_type === "dt_attorneys" ) {
			
			$title = get_the_title($id);			
			$permalink = get_permalink($id);
			$image =  has_post_thumbnail($id) ? get_the_post_thumbnail($id,'full') : '<img src="http://place-hold.it/300X367.jpg&text='.esc_html($title).'" alt="'.esc_attr($title).'" title="'.esc_attr($title).'"/>';
			
			$settings = get_post_meta ( $id, '_custom_settings', TRUE );
			$settings = is_array ( $settings ) ? $settings : array ();
			$social = array_key_exists("social",$settings) ? $settings['social'] : '';
			if( !empty($social) ) {
				$social = do_shortcode($social);
			}
			
			$out .= '<div class="dt-sc-team '.$class.'">';
			$out .= '	<div class="dt-sc-team-thumb">';
			$out .= '		<a href="'.esc_url($permalink).'">'.veda_wp_kses($image).'</a>';
			$out .= '	</div>';
			$out .= '	<div class="dt-sc-team-details">';
			$out .= '		<h4><a href="'.esc_url($permalink).'">'.esc_html($title).'</a></h4>';	
							 if( array_key_exists('phone', $settings) ){
								 $out .= '<h5>'.esc_html($settings['phone']).'</h5>';
							 }
			$out .= 		$social;		
			$out .= '	</div>';
			$out .= '</div>';
			
			return $out;
		}		
	}

	function dt_sc_current_attorney_role( $attrs, $content = null ) {
		extract ( shortcode_atts ( array (
			'id' => '',
			'class' => '',
		), $attrs ) );

		if( empty($id) ) {
			global $post;
			$id =  $post->ID;
		}

		$p = get_post( $id );
		$out = '';
		
		if( $p->post_type === "dt_attorneys" ) {
			
			$permalink = get_permalink($id);
			
			$settings = get_post_meta ( $id, '_custom_settings', TRUE );
			$settings = is_array ( $settings ) ? $settings : array ();
			
			if( array_key_exists('role',$settings) ) {
				return '<h5 class="dt-sc-attorney-role '.$class.'"><a href="'.esc_url($permalink).'">'.esc_html($settings['role']).'</a></h5>';
			}			
		}
	}

    function dt_sc_attorney_office_locations_group( $attrs, $content = null ) {
		extract ( shortcode_atts ( array (
			'class' => '',
		), $attrs ) );

		$out = '<ul class="dt-sc-attorney-location '.esc_attr($class).'">';
		$out .= DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
		$out .= '</ul>';
		return $out;
    }

    function dt_sc_attorney_office_location( $attrs, $content = null ){
		extract ( shortcode_atts ( array (
			'title' => '',
			'address' => '',
			'email' => '',
			'phone' => '',
			'fax' => '',
			'map' => ''
		), $attrs ) );

		$map = ( '||' === $map ) ? '' : $map;
		$map = vc_build_link( $map );
		$a_href = $map['url'];
		$a_title = $map['title'];
		$a_target = $map['target'];

		$out = '<li>';
		$out .= '<a href="#">'.esc_html($title).'</a>';
		$out .= '<div class="dt-sc-attorney-location-overlay">';
		$out .= '<p><span class="fa fa-location-arrow"></span>'.esc_html($address).'</p>';
		$out .= '<p><span class="fa fa-envelope"></span><a href="mailto:'.antispambot($email,1).'">'.antispambot($email).'</a></p>';
		$out .= '<p><span class="fa fa-phone"></span>'.esc_html($phone).'</p>';
		$out .= '<p><span class="fa fa-fax"></span>'.esc_html($fax).'</p>';
		$out .= '<p><a href="'.esc_attr($a_href).'" target="'.esc_attr($a_target).'"> <span class="fa fa-map-marker"> </span> '. esc_html($a_title).' </a></p>';
		$out .= '</div>';
		$out .= '</li>';

		return $out;
    }
}?>