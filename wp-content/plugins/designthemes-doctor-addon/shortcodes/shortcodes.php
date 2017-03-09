<?php
class DTDoctorShortcodesDefinition {
	
	function __construct() {
		
		add_shortcode ( "dt_sc_doctor_item", array (
			$this,
			"dt_sc_doctor_item"
		) );

		add_shortcode("dt_sc_current_doctor_info", array(
			$this,
			"dt_sc_doctor_item"
		) );

		add_shortcode("dt_sc_current_doctor_meta", array(
			$this,
			"dt_sc_current_doctor_meta"
		) );

		add_shortcode("dt_sc_query_doctors", array(
			$this,
			"dt_sc_query_doctors"
		) );

		add_shortcode("dt_sc_doctors_with_filter", array(
			$this,
			"dt_sc_doctors_with_filter"
		) );

		// Ajax's for Doctor filtering Shortcode
		add_action( 'wp_ajax_dt_sc_filter_doctors', array(
			$this, 'dt_sc_filter_doctors'
		) );

		add_action( 'wp_ajax_nopriv_dt_sc_filter_doctors', array(
			$this, 'dt_sc_filter_doctors'
		) );			
	}
	
	function dt_sc_doctor_item( $attrs, $content = null ) {

		extract ( shortcode_atts ( array (
			'id' => '',
			'class' => '',
			'type'	=>	''
		), $attrs ) );

		$out = "";

		$hover = true;

		if( empty($id) ) {
			global $post;
			$id =  $post->ID;
			$hover = false;
		}

		$p = get_post( $id );

		if( $p->post_type === "dt_doctors" ) {

			$title = get_the_title($id);
			$permalink = get_permalink($id);
			$terms =  get_the_terms( $id, 'doctor_departments' );

			$image =  has_post_thumbnail($id) ? get_the_post_thumbnail($id,'full') : '<img src="http://placehold.it/300X367.jpg&text='.esc_html($title).'" alt="'.esc_attr($title).'" title="'.esc_attr($title).'"/>';

			$departments = '';
			if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
				$count = count( $terms );
				$i = 0;

				foreach ( $terms as $term ) {
					$i++;
					$departments .=  $term->name;

					if ( $count != $i ) {
						$departments .= ', ';
					}
				}
			}

			$settings = get_post_meta ( $id, '_custom_settings', TRUE );
			$settings = is_array ( $settings ) ? $settings : array ();

			$social = array_key_exists("social",$settings) ? $settings['social'] : '';
			if( !empty($social) ){
				$social = str_replace('[dt_sc_social', '[dt_sc_social class="rounded-square" ', $social);
				$social = do_shortcode($social);
			}

			if( empty($type) || $type == 'style-1' ) {

				$out .= '<div id="dt_doctors-'.esc_attr($id).'" class="dt-sc-doctors '.esc_attr($class).'">';
				$out .= '	<div class="dt-sc-doctors-thumb">';
				$out .= '		<a href="'.esc_url($permalink).'">';
				$out .= 			veda_wp_kses($image);
				$out .= '		</a>';
				$out .= 		$hover ? '<a href="'.esc_url($permalink).'" class="dt-sc-doctors-thumb-overlay">'.esc_html__('View Doctor Details','veda-doctor').'</a>' : '';
				$out .= '	</div>';
				$out .= '	<div class="dt-sc-doctors-details">';
								$title = array_key_exists("prefix",$settings) ? $settings['prefix'].$title : $title;
								$postfix = array_key_exists("postfix",$settings) ? $settings['postfix'] : '';

				$out .= '		<h5><a href="'.esc_url($permalink).'">'.esc_html($title).'</a></h5>';
				$out .= '		<h6>'.esc_html($departments).' - '.esc_html($postfix).'</h6>';
				$out .= 		array_key_exists("summary",$settings) ? $settings['summary'] : '';
				$out .= '		<ul class="dt-sc-doctors-meta">';
									if( array_key_exists("telno",$settings) ) {
										$out .= '<li><span>'.esc_html__('Phone:','veda-doctor').'</span>'.esc_html($settings['telno']).'</li>';
									}
									if( array_key_exists("email",$settings) ) {
										$out .= '<li><span>'.esc_html__('E-mail:','veda-doctor').'</span><a href="mailto:'.antispambot($settings['email'],1).'">'.antispambot($settings['email']).'</a></li>';
									}
				$out .= '		</ul>';
				$out .= 		$social;
				$out .= '	</div>';
				$out .= '</div>';
			} else {
				$out .= '<div class="dt-sc-team hide-social-show-on-hover">';
				$out .= '	<div class="dt-sc-team-thumb">'.veda_wp_kses($image).'</div>';
				$out .= '	<div class="dt-sc-team-details">';
				$out .= '		<h4><a href="'.esc_url($permalink).'">'.esc_html($title).'</a></h4>';
				$out .='		<h5>'.esc_html($departments).'</h5>';
				$out .= 		$social;
				$out .= '	</div>';
				$out .= '</div>';
			}
		}
		
		return $out;
	}

	function dt_sc_current_doctor_meta( $attrs, $content = null ) {
		extract ( shortcode_atts ( array (
			'id' => '',
			'class' => '',
		), $attrs ) );

		if( empty($id) ) {
			global $post;
			$id =  $post->ID;
		}

		$p = get_post( $id );

		if( $p->post_type === "dt_doctors" ) {

			$out = '';
			$settings = get_post_meta ( $id, '_custom_settings', TRUE );
			$settings = is_array ( $settings ) ? $settings : array ();

			if( array_key_exists('meta_title', $settings) ) {

				$out .= '<ul class="dt-sc-doctors-single-meta">';
					foreach( $settings['meta_title'] as $key => $title ){
						$value = $settings['meta_value'][$key];

						if( filter_var($value ,FILTER_VALIDATE_URL) ){
							$value = "<a href='".esc_url($value)."'>".esc_html($value)."</a>";
						} elseif( is_email($value) ){
							$email = sanitize_email($value);
							$value = "<a href='mailto:".antispambot($email,1)."'>".antispambot($value)."</a>";
						}

						if( !empty($value) ) {
							$out .= '<li> <span>'.esc_html($title).'</span><p>'.veda_wp_kses($value).'</p></li>';
						}
					}
				$out .= '</ul>';
			}

			return $out;
		}
	}

	function dt_sc_query_doctors( $attrs, $content = null ){
		extract ( shortcode_atts ( array (
			'query' => '',
			'column' =>	'',
			'type'	=>	'',
			'class' => '',
		), $attrs ) );

		$columnclass = '';

		switch( $column ) {

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

			case '6':
				$columnclass = 'column dt-sc-one-sixth';
			break;			
		}

		if( empty($query) || $query == 'recent' ) {
			$args = array( 'post_type'=>'dt_doctors', 'posts_per_page'=>$column, 'post_status'=>'publish', 'orderby'=>'date' );
		} elseif( $query == 'random' ) {
			$args = array( 'post_type'=>'dt_doctors', 'posts_per_page'=>$column, 'post_status'=>'publish', 'orderby'=>'rand' );
		}

		$the_query = new WP_Query( $args );
		if( $the_query->have_posts() ) {
			$i = 1;
			$out .= "<div class='".esc_attr($class)."'>";
			while ( $the_query->have_posts() ) {

				$the_query->the_post();
				$the_id = get_the_id();

				$temp_class = $columnclass;

				if($i == 1){
					$temp_class .= " first";
				}

				if($i == $column) $i = 1; else $i = $i + 1;

				$out .= '<div class="'.esc_attr($temp_class).'">';
				$sc   = '[dt_sc_doctor_item id="'.$the_id.'" type="'.$type.'" class="'.$class.'"/]';
				$out .= do_shortcode($sc);
				$out .= '</div>';
			}
			$out .= "</div>";
			return $out;
		}
	}

	function dt_sc_doctors_with_filter( $attrs, $content = null ){

		extract ( shortcode_atts ( array (
			'column' =>	'',
		), $attrs ) );

		$columnclass = '';

		switch( $column ) {

			case '1':
				$columnclass = 'column dt-sc-one-column';
			break;

			case '2':
				$columnclass = 'column dt-sc-one-half';
			break;

			case '3':
				$columnclass = 'column dt-sc-one-third';
			break;
		}



		$out  = '<div class="dt-sc-doctors-filter">';
		$out .= '	<div class="column dt-sc-one-fourth first">';
		$out .= '		<div class="selection-box">';
		$out .= '			<select name="department-filter">';
		$out .= '				<option value="0">'.esc_html__('All','veda-doctor').'</option>';
								$terms = get_terms('doctor_departments', array( 'fields' => 'id=>name'));
								foreach ( $terms as $id => $term ) {
									$out .= '<option value="'.esc_attr($id).'">'.esc_html($term).'</option>';
								}
		$out .= '			</select>';
		$out .= '		</div>';
		$out .= '	</div>';
		$out .='	<div class="column dt-sc-three-fourth">';
		$out .= '		<div class="dt-sc-doctors-sorting">';
							$out .= '<a href="#"> * </a>';
							$alphabets = array( esc_html__('A','veda-doctor'), esc_html__('B','veda-doctor'), esc_html__('C','veda-doctor'), esc_html__('D','veda-doctor'), esc_html__('E','veda-doctor'),
								esc_html__('F','veda-doctor'), esc_html__('G','veda-doctor'), esc_html__('H','veda-doctor'), esc_html__('I','veda-doctor'), esc_html__('J','veda-doctor'),
								esc_html__('K','veda-doctor'), esc_html__('L','veda-doctor'), esc_html__('M','veda-doctor'), esc_html__('N','veda-doctor'), esc_html__('O','veda-doctor'),
								esc_html__('P','veda-doctor'), esc_html__('Q','veda-doctor'), esc_html__('R','veda-doctor'), esc_html__('S','veda-doctor'), esc_html__('T','veda-doctor'),
								esc_html__('U','veda-doctor'), esc_html__('V','veda-doctor'), esc_html__('W','veda-doctor'), esc_html__('X','veda-doctor'), esc_html__('Y','veda-doctor'),
								esc_html__('Z','veda-doctor') );
							foreach( $alphabets as $key => $alphabet ) {
								$class = ( $key == 0 ) ? ' class="active-sort" ':'';
								$out .= '<a href="#" '.$class.'>'.$alphabet.'</a>';
							}
		$out .= '		</div>';
		$out .= '	</div>';
		$out .= '</div>';
		$out .= '<div class="dt-sc-doctors-container" data-column="'.esc_attr($column).'">';

					$wp_query = new WP_Query();

					$doctors = array(
						'post_type'=>'dt_doctors',
						'posts_per_page'=>'-1',
						'suppress_filters' => false,
						'order_by'=> 'published');

					$doctors['search_doctor_title'] = esc_html__('A','veda-doctor');
					add_filter( 'posts_where', array( $this, 'doctor_title_filter' ), 10, 2 );


					$wp_query->query( $doctors );

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
							$sc   = '[dt_sc_doctor_item id="'.$the_id.'" type=""/]';
							$out .= do_shortcode($sc);
							$out .= '</div>';
						}
					} else {
						$out .= '<div class="column dt-sc-one-column">';
						$out .= '<h2>'.esc_html__("Nothing Found.", "veda-doctor").'</h2>';
						$out .= '<p>'.esc_html__("Apologies, but no results were found for the request.", "veda-doctor").'</p>';
						$out .= '</div>';
					}
		$out .= '</div>';

		return $out;
	}

	function doctor_title_filter( $where, &$wp_query ){

		global $wpdb;
		if ( $search_term = $wp_query->get( 'search_doctor_title' ) ) {						
			$where .= ' AND ' . $wpdb->posts . '.post_title LIKE \''. esc_sql( $wpdb->esc_like( $search_term ) ) . '%\'';
		}

		return $where;
    }

    /* Ajax call */
    function dt_sc_filter_doctors() {

    	$out = $columnclass = '';

    	$data = $_REQUEST['data'];
    	$data = array_filter($data);

    	$column = array_key_exists( 'column', $data ) ? $data['column'] : '2';
    	switch( $column ) {

			case '1':
				$columnclass = 'column dt-sc-one-column';
			break;

			case '2':
				$columnclass = 'column dt-sc-one-half';
			break;

			case '3':
				$columnclass = 'column dt-sc-one-third';
			break;
		}


    	$wp_query = new WP_Query();
   		$doctors = array(
   			'post_type'=>'dt_doctors',
   			'posts_per_page'=>'-1',
   			'suppress_filters' => false,
   			'order_by'=> 'published');

    	if( array_key_exists('tax', $data ) ) {

    		$doctors['tax_query'][] = array( 'taxonomy' => 'doctor_departments',
    			'field' => 'id',
    			'terms' => (int) $data['tax'],
    			'operator' => 'IN');
    	}

    	if( array_key_exists('title', $data ) && ( trim($data['title']) !== '*' ) ) {

    		$doctors['search_doctor_title'] = $data['title'];
    		add_filter( 'posts_where', array( $this, 'doctor_title_filter' ), 10, 2 );
    	}

    	$wp_query->query( $doctors );
    	if( $wp_query->have_posts() ) {

    		$i = 1;

   			while( $wp_query->have_posts() ) {

   				$wp_query->the_post();
   				$the_id = get_the_ID();

   				$temp_class = $columnclass;
   				if($i == 1) {
   					$temp_class .= " first";
				}

				if($i == $column) $i = 1; else $i = $i + 1;
				$out .= '<div class="'.esc_attr($temp_class).'">';
   				$sc   = '[dt_sc_doctor_item id="'.$the_id.'" type=""/]';
   				$out .= do_shortcode($sc);
   				$out .= '</div>';
    		}
    	} else {
    		$out .= '<div class="column dt-sc-one-column">';
    		$out .= '<h2>'.esc_html__("Nothing Found.", "veda-doctor").'</h2>';
    		$out .= '<p>'.esc_html__("Apologies, but no results were found for the request.", "veda-doctor").'</p>';
    		$out .= '</div>';
    	}

    	echo $out;
    	die();
    } 	
}?>