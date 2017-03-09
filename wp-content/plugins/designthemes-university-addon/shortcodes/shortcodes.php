<?php
class DTUniversityModuleShortcodesDefinition {

	function __construct() {

		// Course
		add_shortcode( "dt_sc_university_course_item", array(
			$this,
			"dt_sc_university_course_item"
		) );

		add_shortcode( "dt_sc_university_recent_courses", array(
			$this,
			"dt_sc_university_recent_courses"
		) );

		add_shortcode( "dt_sc_university_dept_courses", array(
			$this,
			"dt_sc_university_dept_courses"
		) );

		// Faculty
		add_shortcode( "dt_sc_university_faculty_item", array(
			$this,
			"dt_sc_university_faculty_item"
		) );

		add_shortcode ( "dt_sc_university_faculty_listing", array (
			$this,
			"dt_sc_university_faculty_listing"
		) );

		// Ajax's for Faculty filtering Shortcode
		add_action( 'wp_ajax_dt_sc_filter_university_faculty', array(
			$this, 'dt_sc_filter_university_faculty'
		) );

		add_action( 'wp_ajax_nopriv_dt_sc_filter_university_faculty', array(
			$this, 'dt_sc_filter_university_faculty'
		) );

		add_shortcode( 'dt_sc_current_faculty_info', array( 
			$this, 'dt_sc_current_faculty_info'	
		) );

		add_shortcode( 'dt_sc_current_faculty_role', array( 
			$this, 'dt_sc_current_faculty_role'	
		) );		

		add_shortcode( 'dt_sc_current_faculty_meta', array( 
			$this, 'dt_sc_current_faculty_meta'	
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

	// Courses
	function dt_sc_university_course_item( $attrs, $content = null ){
		extract ( shortcode_atts ( array (
			'id' => '', 
			'type' => '',
			'class' => ''
		), $attrs ) );

		if( !empty($id) ) {

			$p = get_post( $id );
			$title = get_the_title($id);
			$permalink = get_permalink($id);

			$settings = get_post_meta ( $id, '_custom_settings', TRUE );
			$settings = is_array ( $settings ) ? $settings : array ();						

			if( $p->post_type === "dt_courses" ) {

				$class = ( $type == 'without-image' ) ? 'no-course-thumb '.$class : $class;

				$out  = '<div class="dt-sc-course '.$class.'">';
						if( $type == 'with-image') {

							$image =  has_post_thumbnail($id) ? get_the_post_thumbnail($id,'full') : '<img src="http://place-hold.it/300x367&text='.esc_html($title).'" alt="'.esc_attr($title).'" title="'.esc_attr($title).'"/>';

							$out .= '<div class="dt-sc-course-thumb">';
							$out .= '	<a href="'.esc_url($permalink).'">'.veda_wp_kses($image).'</a>';
							$out .= '	<div class="dt-sc-course-overlay">';
							$out .= '		<a class="dt-sc-button small filled" href="'.esc_url($permalink).'">'.esc_html__('View Details','veda-university').'</a>';
							$out .= '	</div>';
							$out .= '</div>';
						}
				$out .= '	<div class="dt-sc-course-details">';
				$out .= '		<h5><a href="'.esc_url($permalink).'">'.esc_html($title).'</a></h5>';
				$out .= '		<div class="dt-sc-course-meta">';

									$custom_field_icons = veda_option("pageoptions","ucourse-custom-field-icons");
	    							$custom_field_icons = is_array($custom_field_icons) ? array_filter($custom_field_icons) : array();
	    							$custom_field_icons = array_unique( $custom_field_icons);

									$meta_show = array_key_exists('meta_show', $settings) ? $settings['meta_show'] : array();
									$i = 0;

									if( array_key_exists('meta_title', $settings) ) {

									foreach( $settings['meta_title'] as $key => $title ) {

										if( ! array_key_exists($key, $meta_show ) ) {

											$value = $settings['meta_value'][$key];

											if( filter_var($value ,FILTER_VALIDATE_URL) ) {
												$value = "<a href='".esc_url($value)."'>".esc_html($value)."</a>";
											}elseif( is_email($value) ) {
												$email = sanitize_email($value);
												$value = "<a href='mailto:".antispambot($email,1)."'>".antispambot($value)."</a>";
											}

											if( !empty($value) ) {
												$icon = $custom_field_icons[$i];
												$icon = !empty( $icon )	? '<i class="fa '.$icon.'"> </i>':'';
												$out .= '<p>'.$icon.'<span>'.esc_html($title).': </span>'.veda_wp_kses($value).'</p>';
											}
										}
										$i++;
									}
									}
				$out .= '		</div>';
				$out .= '	</div>';
				$out .= '</div>';

				return $out;
			}
		}
	}

	function dt_sc_university_recent_courses( $attrs, $content = null ) {

		extract ( shortcode_atts ( array (
			'column' => '3', 
			'type' => '',
			'count' => ''
		), $attrs ) );

		$post_per_page = isset($count) ? $count : '-1';

		$out = $columnclass = '';

		switch( $column ){

			case '2':
				$columnclass = 'column dt-sc-one-half';
			break;

			case '3':
				$columnclass = 'column dt-sc-one-third';
			break;

			case '4':
				$columnclass = 'column dt-sc-one-fourth';
			break;

			case '5':
				$columnclass = 'column dt-sc-one-fifth';
			break;
		}

		$courses = array(
			'post_type' => 'dt_courses',
			'posts_per_page' => $post_per_page,
			'suppress_filters' => false,
			'order_by' => 'date',
			'order' => 'DESC');

		$wp_query = new WP_Query();
		$wp_query->query( $courses );
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
				$sc   = '[dt_sc_university_course_item id="'.$the_id.'" type="'.$type.'"/]';
				$out .= do_shortcode($sc);
				$out .= '</div>';
			}
		} else {
			$out .= '<div class="column dt-sc-one-column">';
			$out .= '<h2>'.esc_html__("Nothing Found.", "veda-university").'</h2>';
			$out .= '<p>'.esc_html__("Apologies, but no results were found for the request.", "veda-university").'</p>';
			$out .= '</div>';
		}

		return $out;
	}

	function dt_sc_university_dept_courses( $attrs, $content = null ) {

		extract ( shortcode_atts ( array (
			'id' => '', # Department ID
			'column' => '', 
			'type' => '',
			'count' => ''
		), $attrs ) );

		$post_per_page = isset($count) ? $count : '-1';

		$out = $columnclass = '';

		switch( $column ){

			case '2':
				$columnclass = 'column dt-sc-one-half';
			break;

			default:
			case '3':
				$columnclass = 'column dt-sc-one-third';
			break;

			case '4':
				$columnclass = 'column dt-sc-one-fourth';
			break;

			case '5':
				$columnclass = 'column dt-sc-one-fifth';
			break;
		}

		$courses = array(
			'post_type' => 'dt_courses',
			'posts_per_page' => $post_per_page,
			'suppress_filters' => false,
			'order_by' => 'date',
			'order' => 'ASC');

		if( !empty($id) ){
			$ids = explode(",", $id );
			$courses['tax_query'][] = array(
				'taxonomy' => 'departments',
				'field' => 'id',
				'terms' => $ids ,
				'operator' => 'IN'
			);
		}

		$wp_query = new WP_Query();
		$wp_query->query( $courses );
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
				$sc   = '[dt_sc_university_course_item id="'.$the_id.'" type="'.$type.'"/]';
				$out .= do_shortcode($sc);
				$out .= '</div>';
			}
		} else {
			$out .= '<div class="column dt-sc-one-column">';
			$out .= '<h2>'.esc_html__("Nothing Found.", "veda-university").'</h2>';
			$out .= '<p>'.esc_html__("Apologies, but no results were found for the request.", "veda-university").'</p>';
			$out .= '</div>';
		}

		return $out;
	}

	// Faculty
	function dt_sc_university_faculty_item( $attrs, $content = null ){
		extract ( shortcode_atts ( array (
			'id' => '', 
			'class' => ''
		), $attrs ) );

		if( empty($id) ) {
			global $post;
			$id =  $post->ID;
		}

		$p = get_post( $id );

		if( $p->post_type === "dt_faculties" ) {

			$title = get_the_title($id);
			$permalink = get_permalink($id);

			$settings = get_post_meta ( $id, '_custom_settings', TRUE );
			$settings = is_array ( $settings ) ? $settings : array ();			

			$image =  has_post_thumbnail($id) ? get_the_post_thumbnail($id,'full') : '<img src="http://place-hold.it/300x367&text='.esc_html($title).'" alt="'.esc_attr($title).'" title="'.esc_attr($title).'"/>';


			$out .= '<div class="dt-sc-faculty">';
			$out .= '	<div class="dt-sc-faculty-thumb">';
			$out .= '		<a href="'.esc_url($permalink).'">'.veda_wp_kses($image).'</a>';
			$out .= '		<a href="'.esc_url($permalink).'" class="dt-sc-faculty-thumb-overlay">';
			$out .= '			<span><i class="pe-icon pe-note2"> </i>'.esc_html__('View Detail','veda-university').'</span></a>';			
			$out .= '	</div>';
			$out .= '	<div class="dt-sc-faculty-details">';
			$out .= '		<h5>'.esc_html($title).'</h5>';
			$out .= '		<h6>';
			$out .= 			array_key_exists('role', $settings ) ? $settings['role'].' - '.get_the_term_list( $the_id, 'departments', '', ', ', '' ):'';
			$out .= '		</h6>';

							$meta_show = array_key_exists('meta_show', $settings) ? $settings['meta_show'] : array();
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

										$out .= '<div class="faculty-meta"> <span>'.esc_html($title).'</span><p>'.veda_wp_kses($value).'</p> </div>';
									}									
								}
							}

							$social = array_key_exists("social",$settings) ? $settings['social'] : '';
							if( !empty($social) ) {
								$social = do_shortcode($social);
								$social = str_replace('dt-sc-team-social', 'dt-sc-sociable', $social);
								$out .= $social;
							}

			$out .= '	</div>';
			$out .= '</div>';
		}

		return $out;
	}

	function dt_sc_university_faculty_listing( $attrs, $content = null ) {

		extract ( shortcode_atts ( array ( 'type' => '' ), $attrs ) );

		$columnclass = $column = $style = '';

		switch( $type ){

			case '2':
				$column = 2;
				$columnclass = 'column dt-sc-one-half';
			break;

			default:
			case '3':
				$column = 3;
				$columnclass = 'column dt-sc-one-third';
			break;

			case '4':
				$column = 4;
				$columnclass = 'column dt-sc-one-fourth';
			break;					
		}

		$content = DTCoreShortcodesDefination::dtShortcodeHelper ( $content );

		$out  = '<div class="dt-sc-faculty-sorting">';
		$out .= '	<a href="#" data-filter="*">'.esc_html__('All','veda-university').'</a>';
					$alphabets = array( esc_html__('A','veda-university'), esc_html__('B','veda-university'), esc_html__('C','veda-university'), esc_html__('D','veda-university'),
					 esc_html__('E','veda-university'), esc_html__('F','veda-university'), esc_html__('G','veda-university'), esc_html__('H','veda-university'),
					 esc_html__('I','veda-university'), esc_html__('J','veda-university'), esc_html__('K','veda-university'), esc_html__('L','veda-university'),
					 esc_html__('M','veda-university'), esc_html__('N','veda-university'), esc_html__('O','veda-university'), esc_html__('P','veda-university'),
					 esc_html__('Q','veda-university'), esc_html__('R','veda-university'), esc_html__('S','veda-university'), esc_html__('T','veda-university'),
					 esc_html__('U','veda-university'), esc_html__('V','veda-university'), esc_html__('W','veda-university'), esc_html__('X','veda-university'),
					 esc_html__('Y','veda-university'), esc_html__('Z','veda-university') );

					foreach( $alphabets as $key => $alphabet ) {
						$class = ( $key == 0 ) ? ' class="active-sort" ':'';
						$out .= '<a href="#" '.$class.'>'.$alphabet.'</a>';
					}
		$out .= '</div>';

		if( !empty($content) ) {
			$out .= '<div class="column dt-sc-three-fourth first">';
		}

		$out .= '<div class="dt-sc-faculty-container" data-type="'.esc_attr($type).'">';
			$faculties = array( 'post_type'=>'dt_faculties', 'posts_per_page'=>'-1', 'suppress_filters' => false, 'order_by'=> 'published');
			$faculties['search_faculty_title'] = esc_html__('A','veda-university');
			add_filter( 'posts_where', array( $this, 'university_faculty_title_filter' ), 10, 2 );

			$wp_query = new WP_Query();
			$wp_query->query( $faculties );
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
					$sc   = '[dt_sc_university_faculty_item id="'.$the_id.'"/]';
					$out .= do_shortcode($sc);
					$out .= '</div>';					
				}
			} else {
				$out .= '<div class="column dt-sc-one-column">';
				$out .= '<h2>'.esc_html__("Nothing Found.", "veda-university").'</h2>';
				$out .= '<p>'.esc_html__("Apologies, but no results were found for the request.", "veda-university").'</p>';
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

	function dt_sc_filter_university_faculty( ) {

		$columnclass = $column = $out = '';

    	$data = $_REQUEST['data'];
    	$data = array_filter($data);

    	$type = array_key_exists( 'type', $data) ? $data['type'] : '3';

		switch( $type ){

			case '2':
				$column = 2;
				$columnclass = 'column dt-sc-one-half';
			break;

			default:
			case '3':
				$column = 3;
				$columnclass = 'column dt-sc-one-third';
			break;

			case '4':
				$column = 4;
				$columnclass = 'column dt-sc-one-fourth';
			break;					
		}

		$faculties = array( 'post_type'=>'dt_faculties', 'posts_per_page'=>'-1', 'suppress_filters' => false, 'order_by'=> 'published');

		if( array_key_exists('title', $data ) && ( trim($data['title']) !== '*' ) ) {

			$faculties['search_faculty_title'] =  $data['title'];
			add_filter( 'posts_where', array( $this, 'university_faculty_title_filter' ), 10, 2 );
		}

		$wp_query = new WP_Query();
		$wp_query->query( $faculties );
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
				$sc   = '[dt_sc_university_faculty_item id="'.$the_id.'"/]';
				$out .= do_shortcode($sc);
				$out .= '</div>';					
			}
		} else {
			$out .= '<div class="column dt-sc-one-column">';
			$out .= '<h2>'.esc_html__("Nothing Found.", "veda-university").'</h2>';
			$out .= '<p>'.esc_html__("Apologies, but no results were found for the request.", "veda-university").'</p>';
			$out .= '</div>';
		}

    	echo $out;
    	die();
	}

	function university_faculty_title_filter( $where, &$wp_query ){

		global $wpdb;
		if ( $search_term = $wp_query->get( 'search_faculty_title' ) ) {
			$where .= ' AND ' . $wpdb->posts . '.post_title LIKE \''. esc_sql( $wpdb->esc_like( $search_term ) ) . '%\'';
		}

		return $where;
    }

    function dt_sc_current_faculty_info( $attrs, $content = null ) {
		extract ( shortcode_atts ( array (
			'class' => ''
		), $attrs ) );

		global $post;
		$id =  $post->ID;

		$p = get_post( $id );

		$out = '';

		if( $p->post_type === "dt_faculties" ) {

			$title = get_the_title($id);			
			$permalink = get_permalink($id);
			$image =  has_post_thumbnail($id) ? get_the_post_thumbnail($id,'full') : '<img src="http://place-hold.it/300x367&text='.esc_html($title).'" alt="'.esc_attr($title).'" title="'.esc_attr($title).'"/>';

			$settings = get_post_meta ( $id, '_custom_settings', TRUE );
			$settings = is_array ( $settings ) ? $settings : array ();

			$out .= '<div class="dt-sc-faculty '.esc_attr($class).'">';
			$out .= '	<div class="dt-sc-faculty-thumb">';
			$out .= '		<a href="'.esc_url($permalink).'">'.veda_wp_kses($image).'</a>';
			$out .= '	</div>';
			$out .= '	<div class="dt-sc-faculty-details">';
			$out .= '		<h5><a href="'.esc_url($permalink).'">'.esc_html($title).'</a></h5>';
							 if( array_key_exists('phone', $settings) ) {
							 	$out .= '<h6>'.esc_html($settings['phone']).'</h6>';	
							 }

							 $social = array_key_exists("social",$settings) ? $settings['social'] : '';
							 if( !empty($social) ) {
							 	$social = do_shortcode($social);
							 	$social = str_replace('dt-sc-team-social', 'dt-sc-sociable', $social);
							 	$out .= $social;
							 }
			$out .= '	</div>';
			$out .= '</div>';

			return $out;
		}
    }

    function dt_sc_current_faculty_role( $attrs, $content = null) {
		extract ( shortcode_atts ( array (
			'class' => '',
		), $attrs ) );

		global $post;
		$id =  $post->ID;

		$p = get_post( $id );
		$out = '';
		
		if( $p->post_type === "dt_faculties" ) {
			
			$permalink = get_permalink($id);
			
			$settings = get_post_meta ( $id, '_custom_settings', TRUE );
			$settings = is_array ( $settings ) ? $settings : array ();
			
			if( array_key_exists('role',$settings) ) {
				return '<h5 class="dt-sc-faculty-role '.$class.'"><a href="'.esc_url($permalink).'">'.$settings['role'].'</a>'.get_the_term_list( $post->ID, 'departments', " - ", ', ', '' ).'</h5>';
			}			
		}
    }

    function dt_sc_current_faculty_meta( $attrs, $content = null ) {
		extract ( shortcode_atts ( array (
			'class' => ''
		), $attrs ) );

		global $post;
		$id =  $post->ID;

		$p = get_post( $id );

		$out = '';

		if( $p->post_type === "dt_faculties" ) {

			$out = '';
			$settings = get_post_meta ( $id, '_custom_settings', TRUE );
			$settings = is_array ( $settings ) ? $settings : array ();

			if( array_key_exists('meta_title', $settings) ) {
				
				$out .= '<ul class="dt-sc-faculty-single-meta">';
				
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
				$tax_sname = veda_opts_get( 'singular-udepartment-name', esc_html__('Department', 'veda-attorney') );
				$out .= '<li>';
				$out .= '<span>'.esc_html($tax_sname).'</span>';
				$out .= get_the_term_list( $the_id, 'departments', "<p>", ', ', '</p>' );
				$out .= '</li>';				
				$out .= '</ul>';
				
				return $out;
			}
		}		
    }    
}?>