<?php
class DTYogaModuleShortcodesDefinition {

	function __construct() {

		// Yoga Videos
		add_shortcode( 'dt_sc_yoga_video_item', array( 
			$this,
			'dt_sc_yoga_video_item'
		) );

		add_shortcode( 'dt_sc_yoga_video_item_2', array( 
			$this,
			'dt_sc_yoga_video_item_2'
		) );

		add_shortcode( 'dt_sc_yoga_videos_listing', array(
			$this,
			'dt_sc_yoga_videos_listing'
		) );

		// Ajax's for Video filtering Shortcode
		add_action( 'wp_ajax_dt_sc_filter_yoga_videos', array(
			$this, 'dt_sc_filter_yoga_videos'
		) );

		add_action( 'wp_ajax_nopriv_dt_sc_filter_yoga_videos', array(
			$this, 'dt_sc_filter_yoga_videos'
		) );

		# Yoga Style
		add_shortcode( 'dt_sc_yoga_style_item', array(
			$this,
			'dt_sc_yoga_style_item'
		) );

		add_shortcode( 'dt_sc_yoga_styles_listing', array(
			$this,
			'dt_sc_yoga_styles_listing'
		) );

		// Ajax's for Yoga Styles filtering Shortcode
		add_action( 'wp_ajax_dt_sc_filter_yoga_styles', array(
			$this, 'dt_sc_filter_yoga_styles'
		) );

		add_action( 'wp_ajax_nopriv_dt_sc_filter_yoga_styles', array(
			$this, 'dt_sc_filter_yoga_styles'
		) );

		// Yoga Poses
		add_shortcode( 'dt_sc_yoga_pose_item', array(
			$this,
			'dt_sc_yoga_pose_item'
		) );
		 		
		add_shortcode( 'dt_sc_yoga_poses_listing', array(
			$this,
			'dt_sc_yoga_poses_listing'
		) );

		// Ajax's for Yoga Styles filtering Shortcode
		add_action( 'wp_ajax_dt_sc_filter_yoga_poses', array(
			$this, 'dt_sc_filter_yoga_poses'
		) );

		add_action( 'wp_ajax_nopriv_dt_sc_filter_yoga_poses', array(
			$this, 'dt_sc_filter_yoga_poses'
		) );

		// Yoga Teachers
		add_shortcode( 'dt_sc_yoga_teacher_item', array(
			$this,
			'dt_sc_yoga_teacher_item'
		) );
		 		
		add_shortcode( 'dt_sc_yoga_teachers_listing', array(
			$this,
			'dt_sc_yoga_teachers_listing'
		) );

		// Ajax's for Yoga Styles filtering Shortcode
		add_action( 'wp_ajax_dt_sc_filter_yoga_teachers', array(
			$this, 'dt_sc_filter_yoga_teachers'
		) );

		add_action( 'wp_ajax_nopriv_dt_sc_filter_yoga_teachers', array(
			$this, 'dt_sc_filter_yoga_teachers'
		) );

		// Yoga Programs

		add_shortcode( 'dt_sc_yoga_progrma_item', array( 
			$this,
			'dt_sc_yoga_progrma_item'
		) );
		
		add_shortcode( 'dt_sc_yoga_programs_listing', array(
			$this,
			'dt_sc_yoga_programs_listing'
		) );

		// Ajax's for Programs filtering Shortcode
		add_action( 'wp_ajax_dt_sc_filter_yoga_programs', array(
			$this, 'dt_sc_filter_yoga_programs'
		) );

		add_action( 'wp_ajax_nopriv_dt_sc_filter_yoga_programs', array(
			$this, 'dt_sc_filter_yoga_programs'
		) );

		add_shortcode( 'dt_sc_yoga_recent_programs_listing', array(
			$this,
			'dt_sc_yoga_recent_programs_listing'
		) );

		add_shortcode( 'dt_sc_yoga_teacher_programs_listing', array(
			$this,
			'dt_sc_yoga_teacher_programs_listing'
		) );

		add_shortcode( 'dt_sc_yoga_style_programs_listing', array(
			$this,
			'dt_sc_yoga_style_programs_listing'
		) );

		add_shortcode( 'dt_sc_yoga_category_programs_listing', array(
			$this,
			'dt_sc_yoga_category_programs_listing'
		) );

		// Yoga Class						
		add_shortcode( 'dt_sc_yoga_class', array(
			$this,
			'dt_sc_yoga_class'
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

	// Video

	function dt_sc_yoga_video_item( $attrs, $content = null ) {
		extract ( shortcode_atts ( array ( 'id' => '', 'style' => 'style1', 'show_date' => 'yes' ), $attrs ) );

		$out = "";

		if( !empty($id) ) {

			$p = get_post( $id );
			$title = get_the_title($id);
			$permalink = get_permalink($id);

			if( $p->post_type == "dt_yoga_videos" ) {
				
				$out .= '<div class="dt-sc-yoga-video-'.esc_attr($style).'">';

				$image =  has_post_thumbnail($id) ? get_the_post_thumbnail($id,'full', array('class' => 'alignleft' ) ) : '<img class="alignleft" src="http://place-hold.it/600x320&text='.esc_html($title).'" alt="'.esc_attr($title).'" title="'.esc_attr($title).'"/>';

				$post_settings = get_post_meta ( $id, '_custom_settings', TRUE );
				$post_settings = is_array ( $post_settings ) ? $post_settings : array ();

				$out .= veda_wp_kses($image);

				if( array_key_exists('sub-title', $post_settings) ){
					$class = ( $style == 'style1' ) ? 'dt-sc-video-subtitle' : 'dt-sc-video-subtitle-with-margin';
					$out .= '<p class="'.esc_attr( $class ).'">'.esc_html($post_settings['sub-title']).'</p>';
				}

				$heading = ( $style == 'style1' ) ? 4 : 5;
				$out .= "<h{$heading}>".esc_html( $title )."</h{$heading}>";

				if( strtolower($show_date) == "yes" ){
					$time = human_time_diff( get_the_time('U', $id ), current_time('timestamp') ) .esc_html__(' ago','veda-yoga'); 
					$out .= '<p class="dt-sc-video-date">'.$time.'</p>';
				}

				if( $style == 'style1' ){
					$out .= '<p class="dt-sc-video-excerpt">'.$p->post_excerpt.'</p>';
				}
				
				$out .= '</div>';
			}
		}	

		return $out;
	}

	function dt_sc_yoga_video_item_2( $attrs, $content = null ) {
		extract ( shortcode_atts ( array ( 'id' => '' ), $attrs ) );

		$out = "";

		if( !empty($id) ) {

			$p = get_post( $id );
			$title = get_the_title($id);
			$permalink = get_permalink($id);

			if( $p->post_type == "dt_yoga_videos" ) {

				$image =  has_post_thumbnail($id) ? get_the_post_thumbnail($id,'full') : '<img src="http://place-hold.it/600x320&text='.esc_html($title).'" alt="'.esc_attr($title).'" title="'.esc_attr($title).'"/>';

				$styles = get_post_meta ( $id, '_styles', TRUE );
				$styles = is_array ( $styles ) ? $styles : array ();

				$styles_label = esc_html__('Styles', 'veda-yoga');
				$durations_label = esc_html__('Durations', 'veda-yoga');

				if( function_exists( 'veda_opts_get' ) ) :
					$styles_label = veda_opts_get( 'plural-style-name', $styles_label );
					$durations_label = veda_opts_get( 'plural-video-duration-name', $durations_label );
				endif;

				$out .= '<div class="dt-sc-yoga-video">';
				$out .= '	<div class="dt-sc-yoga-video-wrapper">';
				$out .= 		veda_wp_kses($image);
				$out .= '		<div class="dt-sc-yoga-video-overlay">';
				$out .= '			<h6><a href="'.$permalink.'" title="'.$title.'">'.$title.'</a></h6>';
				$out .='			<p>';
									if( function_exists('veda-yoga_like_love') ) {
										$out .= veda-yoga_like_love();
									}				
				$out .= '			<a class="fa fa-share-square-o" href="'.$permalink.'"></a>';
				$out .= '			</p>';
				$out .= '		</div>';
				$out .= '	</div>';
				$out .= '	<div class="dt-sc-yoga-video-meta">';
				$out .= '		<p class="yoga-style-meta">';
				$out .= 			esc_html( $styles_label ).' : ';
									foreach( $styles as $style ) {
										$out .= '<a href="'.get_permalink( $style ).'" title="'.get_the_title( $style ).'">'. get_the_title( $style ).'</a>';
									}
				$out .= '		</p>';
				$out .= '		<p>';
				$out .= 			esc_html( $durations_label ).' : ';
				$out .= 			get_the_term_list($id, 'dt_yoga_video_durations', '', ', ','');
				$out .= '		</p>';
				$out .= '	</div>';
				$out .= '</div>';
			}
		}	

		return $out;
	}

	function dt_sc_yoga_videos_listing( $attrs, $content = null ) {

		extract ( shortcode_atts ( array ( 'column' => '3' ), $attrs ) );

		$out = $columnclass = '';

		switch( $column ) {

			default:
			case '2':
				$columnclass = 'column dt-sc-one-half';
			break;

			case '3':
				$columnclass = 'column dt-sc-one-third';
			break;

			case '4':
				$columnclass = 'column dt-sc-one-fourth';
			break;
		}


		$out .= '<div class="dt-sc-yoga-video-listing-container" data-column="'.esc_attr($column).'">';

		$out .= '	<form action="'.get_home_url().'" method="post" class="yoga-video-sorting">';
		$out .= '		<select name="yoga-style">';
		$out .= '			<option value="0">'.esc_html__('Yoga Style','veda-yoga').'</option>';		
							$styles_query = new WP_Query();
							$styles_query->query( array( 'post_type' => 'dt_yoga_styles', 'posts_per_page' => '-1', 
								'suppress_filters' => false, 'order_by' => 'name', 'order' => 'DESC') );
							if( $styles_query->have_posts() ) {
								while( $styles_query->have_posts() ) {
									$styles_query->the_post();
									$id = get_the_ID();
									$title = get_the_title();
									$out .= '<option value="'.esc_attr($id).'">'.esc_html($title).'</option>';
								}
							}		
		$out .= '		</select>';

		$out .= '		<select name="student-level">';
		$out .= '			<option value="0">'.esc_html__('Student Category','veda-yoga').'</option>';	
							$student_levels = get_categories("taxonomy=dt_yoga_student_level");
							foreach ( $student_levels as $student_level ) {
								$id = esc_attr( $student_level->term_id );
								$title = esc_html( $student_level->name );
								$out .= "<option value='{$id}'>{$title}</option>";
							}
		$out .= '		</select>';

		$out .= '		<select name="yoga-teacher">';
		$out .= '			<option value="0">'.esc_html__('Find Expert','veda-yoga').'</option>';
							$teachers_query = new WP_Query();
							$teachers_query->query( array( 'post_type' => 'dt_yoga_teachers', 'suppress_filters' => false,
								'posts_per_page' => '-1', 'order_by' => 'title', 'order' => 'DESC') );
							if( $teachers_query->have_posts() ) {
								while( $teachers_query->have_posts() ) {
									$teachers_query->the_post();
									$id = get_the_ID();
									$title = get_the_title();
									$out .= '<option value="'.esc_attr($id).'">'.esc_html($title).'</option>';
								}
							}
		$out .= '		</select>';

		$out .= '		<input type="submit" value="'.esc_html__('Submit Now','veda-yoga').'">';
		$out .= '	</form>';

		$out .= '	<div class="dt-sc-hr-invisible-medium"> </div>';
		$out .= '	<div class="dt-sc-clear"></div>';

					$videos = array(
						'post_type' => 'dt_yoga_videos',
						'posts_per_page' => get_option('posts_per_page'),
						'suppress_filters' => false,
						'order_by' => 'date',
						'order' => 'DESC');
					$wp_query = new WP_Query();
					$wp_query->query( $videos );
					if( $wp_query->have_posts() ) {

						$out .= '<div class="dt-sc-yoga-videos-container">';

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
							$out .= do_shortcode('[dt_sc_yoga_video_item_2 id="'.$the_id.'"/]');
							$out .= '</div>';
						}

						$out .= '</div>';
					}
		$out .= '</div>';

		return $out;
	}

	function dt_sc_filter_yoga_videos() {

		$columnclass = $out = '';

    	$data = $_REQUEST['data'];
    	$data = array_filter($data);

    	$column = array_key_exists('column', $data ) ? $data['column'] : 2;

		switch( $column ) {

			default:
			case '2':
				$columnclass = 'column dt-sc-one-half';
			break;

			case '3':
				$columnclass = 'column dt-sc-one-third';
			break;

			case '4':
				$columnclass = 'column dt-sc-one-fourth';
			break;
		}

		$videos = array( 'post_type'=>'dt_yoga_videos',
			'posts_per_page'=>'-1',
			'suppress_filters' => false,
			'order_by'=> 'published'
		);

		if( array_key_exists('style',$data) ) {

			$videos['meta_query'][] = array( 'key' => '_styles',
			'value'=> $data['style'],
			'compare' => 'LIKE'
			);
		}

		if( array_key_exists('level',$data) ) {

			$videos['tax_query'][] = array( 'taxonomy' => 'dt_yoga_student_level',
				'field' => 'id',
				'terms' => (int) $data['level'],
				'operator' => 'IN',);
		}

		if( array_key_exists('teacher',$data) ) {
			$videos['meta_query'][] = array( 'key' => '_teachers',
			'value'=> $data['teacher'],
			'compare' => 'LIKE'
			);			
		}				

		$wp_query = new WP_Query();
		$wp_query->query( $videos );
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
				$out .= do_shortcode('[dt_sc_yoga_video_item_2 id="'.$the_id.'"/]');
				$out .= '</div>';
			}
		} else {
			$out .= '<div class="column dt-sc-one-column">';
			$out .= '<h2>'.esc_html__("Nothing Found.", "veda-yoga").'</h2>';
			$out .= '<p>'.esc_html__("Apologies, but no results were found for the request.", "veda-yoga").'</p>';
			$out .= '</div>';			
		}    

		echo $out;
    	die();
	}

	// Styles
	function dt_sc_yoga_style_item( $attrs, $content = null ) {

		extract ( shortcode_atts ( array ( 'id' => '' ), $attrs ) );

		$out = "";
		if( !empty($id) ) {

			$p = get_post( $id );
			$title = get_the_title($id);
			$permalink = get_permalink($id);

			if( $p->post_type == "dt_yoga_styles" ) {

				$image =  has_post_thumbnail($id) ? get_the_post_thumbnail($id,'full', array('class' => 'alignleft' ) ) : '<img class="alignleft" src="http://place-hold.it/600x320&text='.esc_html($title).'" alt="'.esc_attr($title).'" title="'.esc_attr($title).'"/>';

				$out .= '<div class="dt-sc-yoga-style">';
				$out .= '	<div class="dt-sc-yoga-style-thumb">';
				$out .= '		<a href="'.esc_url($permalink).'">'.veda_wp_kses($image).'</a>';
				$out .= '		<div class="dt-sc-yoga-style-overlay">';
				$out .= '		<a class="dt-sc-button" href="'.esc_url($permalink).'">'.esc_html__('View Details','veda-yoga').'<span class="fa fa-angle-right"> </span></a>';
				$out .= '		</div>';
				$out .= '	</div>';
				$out .= '	<div class="dt-sc-yoga-style-details">';
				$out .= '		<h5><a href="'.esc_url($permalink).'">'.$title.'</a></h5>';
				$out .= '	</div>';
				$out .= '</div>';
			}

			return $out;
		}
	}

	function dt_sc_yoga_styles_listing( $attrs, $content = null ) {

		extract ( shortcode_atts ( array ( 'column' => '3' ), $attrs ) );

		$content = DTCoreShortcodesDefination::dtShortcodeHelper ( $content );

		$out = $columnclass = '';

		switch( $column ) {

			default:
			case '2':
				$columnclass = 'column dt-sc-one-half';
			break;

			case '3':
				$columnclass = 'column dt-sc-one-third';
			break;

			case '4':
				$columnclass = 'column dt-sc-one-fourth';
			break;
		}

		if( !empty($content) ) {
			$data = 'data-content = "yes" ';
		}

		$out  = '<div class="dt-sc-yoga-style-sorting" '.$data.'>';
		$out .= '	<a href="#" data-filter="*">'.esc_html__('All','veda-yoga').'</a>';
					$alphabets = array( esc_html__('A','veda-yoga'), esc_html__('B','veda-yoga'), esc_html__('C','veda-yoga'), esc_html__('D','veda-yoga'),
					 esc_html__('E','veda-yoga'), esc_html__('F','veda-yoga'), esc_html__('G','veda-yoga'), esc_html__('H','veda-yoga'), esc_html__('I','veda-yoga'),
					 esc_html__('J','veda-yoga'), esc_html__('K','veda-yoga'), esc_html__('L','veda-yoga'), esc_html__('M','veda-yoga'), esc_html__('N','veda-yoga'),
					 esc_html__('O','veda-yoga'), esc_html__('P','veda-yoga'), esc_html__('Q','veda-yoga'), esc_html__('R','veda-yoga'), esc_html__('S','veda-yoga'),
					 esc_html__('T','veda-yoga'), esc_html__('U','veda-yoga'), esc_html__('V','veda-yoga'), esc_html__('W','veda-yoga'), esc_html__('X','veda-yoga'),
					 esc_html__('Y','veda-yoga'), esc_html__('Z','veda-yoga') );

					foreach( $alphabets as $key => $alphabet ) {
						$class = ( $key == 0 ) ? ' class="active-sort" ':'';
						$out .= '<a href="#" '.$class.'>'.$alphabet.'</a>';
					}
		$out .= '</div>';

		if( !empty($content) ) {
			$out .= '<div class="column dt-sc-three-fourth dt-sc-yoga-style-listing first">';
		}

		$out .= '<div class="dt-sc-yoga-style-listing-container" data-column="'.esc_attr($column).'">';

				$yoga_styles = array( 'post_type'=>'dt_yoga_styles', 'posts_per_page'=>'-1',
					'suppress_filters' => false, 'order_by'=> 'title', 'order' => 'ASC');

				$yoga_styles['search_yoga_style_title'] = esc_html__('A','veda-yoga');
				add_filter( 'posts_where', array( $this, 'yoga_styles_title_filter' ), 10, 2 );

				$wp_query = new WP_Query();
				$wp_query->query( $yoga_styles );
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
						$out .= do_shortcode('[dt_sc_yoga_style_item id="'.$the_id.'"/]');
						$out .= '</div>';
					}
				} else {
					$out .= '<div class="column dt-sc-one-column">';
					$out .= '<h2>'.esc_html__("Nothing Found.", "veda-yoga").'</h2>';
					$out .= '<p>'.esc_html__("Apologies, but no results were found for the request.", "veda-yoga").'</p>';
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

	function dt_sc_filter_yoga_styles() {

		$columnclass = $column = $out = '';

    	$data = $_REQUEST['data'];
    	$data = array_filter($data);

    	$column = array_key_exists( 'column', $data) ? $data['column'] : '2';

		switch( $column ) {
			default:
			case '2':
				$columnclass = 'column dt-sc-one-half';
			break;

			case '3':
				$columnclass = 'column dt-sc-one-third';
			break;

			case '4':
				$columnclass = 'column dt-sc-one-fourth';
			break;
		}

		$yoga_styles = array( 'post_type'=>'dt_yoga_styles', 'posts_per_page'=>'-1',
			'suppress_filters' => false, 'order_by'=> 'title', 'order' => 'ASC');

		if( array_key_exists('title', $data ) && ( trim($data['title']) !== '*' ) ) {

			$yoga_styles['search_yoga_style_title'] = $data['title'];
			add_filter( 'posts_where', array( $this, 'yoga_styles_title_filter' ), 10, 2 );
		}

		$wp_query = new WP_Query();
		$wp_query->query( $yoga_styles );
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
				$out .= do_shortcode('[dt_sc_yoga_style_item id="'.$the_id.'"/]');
				$out .= '</div>';
			}
		} else {
			$out .= '<div class="column dt-sc-one-column">';
			$out .= '<h2>'.esc_html__("Nothing Found.", "veda-yoga").'</h2>';
			$out .= '<p>'.esc_html__("Apologies, but no results were found for the request.", "veda-yoga").'</p>';
			$out .= '</div>';
		}
		echo $out;
		die();
	}

	function yoga_styles_title_filter( $where, &$wp_query ) {

		global $wpdb;
		if ( $search_term = $wp_query->get( 'search_yoga_style_title' ) ) {
			$where .= ' AND ' . $wpdb->posts . '.post_title LIKE \''. esc_sql( $wpdb->esc_like( $search_term ) ) . '%\'';
		}

		return $where;		
	}

	// Poses
	function dt_sc_yoga_pose_item( $attrs, $content = null ) {

		extract ( shortcode_atts ( array ( 'id' => '' ), $attrs ) );

		$out = "";
		if( !empty($id) ) {

			$p = get_post( $id );
			$title = get_the_title($id);
			$permalink = get_permalink($id);

			if( $p->post_type == "dt_yoga_poses" ) {

				$image =  has_post_thumbnail($id) ? get_the_post_thumbnail($id,'full', array('class' => 'alignleft' ) ) : '<img class="alignleft" src="http://place-hold.it/600x320&text='.esc_html($title).'" alt="'.esc_attr($title).'" title="'.esc_attr($title).'"/>';

				$out .= '<div class="dt-sc-yoga-pose">';
				$out .= '	<div class="dt-sc-yoga-pose-thumb">';
				$out .= '		<a href="'.esc_url($permalink).'">'.veda_wp_kses($image).'</a>';
				$out .= '		<div class="dt-sc-yoga-pose-overlay">';
				$out .= '		<a class="dt-sc-button" href="'.esc_url($permalink).'">'.esc_html__('View Details','veda-yoga').'<span class="fa fa-angle-right"> </span></a>';
				$out .= '		</div>';
				$out .= '	</div>';
				$out .= '	<div class="dt-sc-yoga-pose-details">';
				$out .= '		<h5><a href="'.esc_url($permalink).'">'.$title.'</a></h5>';
				$out .= '	</div>';
				$out .= '</div>';
			}

			return $out;
		}		
	}

	function dt_sc_yoga_poses_listing( $attrs, $content = null ) {

		extract ( shortcode_atts ( array ( 'column' => '3' ), $attrs ) );

		$content = DTCoreShortcodesDefination::dtShortcodeHelper ( $content );

		$out = $columnclass = '';

		switch( $column ) {

			default:
			case '2':
				$columnclass = 'column dt-sc-one-half';
			break;

			case '3':
				$columnclass = 'column dt-sc-one-third';
			break;

			case '4':
				$columnclass = 'column dt-sc-one-fourth';
			break;
		}

		if( !empty($content) ) {
			$data = 'data-content = "yes" ';
		}

		$out  = '<div class="dt-sc-yoga-poses-sorting" '.$data.'>';
		$out .= '	<a href="#" data-filter="*">'.esc_html__('All','veda-yoga').'</a>';
					$alphabets = array( esc_html__('A','veda-yoga'), esc_html__('B','veda-yoga'), esc_html__('C','veda-yoga'), esc_html__('D','veda-yoga'),
					 esc_html__('E','veda-yoga'), esc_html__('F','veda-yoga'), esc_html__('G','veda-yoga'), esc_html__('H','veda-yoga'), esc_html__('I','veda-yoga'),
					 esc_html__('J','veda-yoga'), esc_html__('K','veda-yoga'), esc_html__('L','veda-yoga'), esc_html__('M','veda-yoga'), esc_html__('N','veda-yoga'),
					 esc_html__('O','veda-yoga'), esc_html__('P','veda-yoga'), esc_html__('Q','veda-yoga'), esc_html__('R','veda-yoga'), esc_html__('S','veda-yoga'),
					 esc_html__('T','veda-yoga'), esc_html__('U','veda-yoga'), esc_html__('V','veda-yoga'), esc_html__('W','veda-yoga'), esc_html__('X','veda-yoga'),
					 esc_html__('Y','veda-yoga'), esc_html__('Z','veda-yoga') );

					foreach( $alphabets as $key => $alphabet ) {
						$class = ( $key == 0 ) ? ' class="active-sort" ':'';
						$out .= '<a href="#" '.$class.'>'.$alphabet.'</a>';
					}
		$out .= '</div>';

		if( !empty($content) ) {
			$out .= '<div class="column dt-sc-three-fourth dt-sc-yoga-poses-listing first">';
		}

		$out .= '<div class="dt-sc-yoga-poses-listing-container" data-column="'.esc_attr($column).'">';

			$yoga_poses = array( 'post_type'=>'dt_yoga_poses', 'posts_per_page'=>'-1',
				'suppress_filters' => false, 'order_by'=> 'title', 'order' => 'ASC');

			$yoga_poses['search_yoga_pose_title'] = esc_html__('A','veda-yoga');
			add_filter( 'posts_where', array( $this, 'yoga_poses_title_filter' ), 10, 2 );

			$wp_query = new WP_Query();
			$wp_query->query( $yoga_poses );
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
					$out .= do_shortcode('[dt_sc_yoga_pose_item id="'.$the_id.'"/]');
					$out .= '</div>';
				}
			} else {
				$out .= '<div class="column dt-sc-one-column">';
				$out .= '<h2>'.esc_html__("Nothing Found.", "veda-yoga").'</h2>';
				$out .= '<p>'.esc_html__("Apologies, but no results were found for the request.", "veda-yoga").'</p>';
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

	function dt_sc_filter_yoga_poses() {

		$columnclass = $column = $out = '';

    	$data = $_REQUEST['data'];
    	$data = array_filter($data);

    	$column = array_key_exists( 'column', $data) ? $data['column'] : '2';

		switch( $column ) {
			default:
			case '2':
				$columnclass = 'column dt-sc-one-half';
			break;

			case '3':
				$columnclass = 'column dt-sc-one-third';
			break;

			case '4':
				$columnclass = 'column dt-sc-one-fourth';
			break;
		}

		$yoga_poses = array( 'post_type'=>'dt_yoga_poses', 'posts_per_page'=>'-1',
			'suppress_filters' => false, 'order_by'=> 'title', 'order' => 'ASC');

		if( array_key_exists('title', $data ) && ( trim($data['title']) !== '*' ) ) {

			$yoga_poses['search_yoga_pose_title'] = $data['title'];
			add_filter( 'posts_where', array( $this, 'yoga_poses_title_filter' ), 10, 2 );
		}

		$wp_query = new WP_Query();
		$wp_query->query( $yoga_poses );
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
				$out .= do_shortcode('[dt_sc_yoga_pose_item id="'.$the_id.'"/]');
				$out .= '</div>';
			}
		} else {
			$out .= '<div class="column dt-sc-one-column">';
			$out .= '<h2>'.esc_html__("Nothing Found.", "veda-yoga").'</h2>';
			$out .= '<p>'.esc_html__("Apologies, but no results were found for the request.", "veda-yoga").'</p>';
			$out .= '</div>';
		}
		echo $out;
		die();
	}	

	function yoga_poses_title_filter( $where, &$wp_query ) {

		global $wpdb;
		if ( $search_term = $wp_query->get( 'search_yoga_pose_title' ) ) {
			$where .= ' AND ' . $wpdb->posts . '.post_title LIKE \''. esc_sql( $wpdb->esc_like( $search_term ) ) . '%\'';
		}

		return $where;		
	}

	// Teachers
	function dt_sc_yoga_teacher_item( $attrs, $content = null ) {

		extract ( shortcode_atts ( array ( 'id' => '' ), $attrs ) );

		$out = "";
		if( !empty($id) ) {

			$p = get_post( $id );
			$title = get_the_title($id);
			$permalink = get_permalink($id);

			if( $p->post_type == "dt_yoga_teachers" ) {

				$image =  has_post_thumbnail($id) ? get_the_post_thumbnail($id,'full') : '<img class="alignleft" src="http://place-hold.it/600x320&text='.esc_html($title).'" alt="'.esc_attr($title).'" title="'.esc_attr($title).'"/>';

				$out .= '<div class="dt-sc-yoga-teacher">';
				$out .= '	<div class="dt-sc-yoga-teacher-thumb">';
				$out .= '		<a href="'.esc_url($permalink).'">'.veda_wp_kses($image).'</a>';
				$out .= '		<div class="dt-sc-yoga-teacher-overlay">';
				$out .= '		<a class="dt-sc-button" href="'.esc_url($permalink).'">'.esc_html__('View Details','veda-yoga').'<span class="fa fa-angle-right"> </span></a>';
				$out .= '		</div>';
				$out .= '	</div>';
				$out .= '	<div class="dt-sc-yoga-teacher-details">';
				$out .= '		<h5><a href="'.esc_url($permalink).'">'.$title.'</a></h5>';
				$out .= '	</div>';
				$out .= '</div>';
			}

			return $out;
		}		
	}

	function dt_sc_yoga_teachers_listing( $attrs, $content = null ) {

		extract ( shortcode_atts ( array ( 'column' => '3' ), $attrs ) );

		$content = DTCoreShortcodesDefination::dtShortcodeHelper ( $content );

		$out = $columnclass = '';

		switch( $column ) {

			default:
			case '2':
				$columnclass = 'column dt-sc-one-half';
			break;

			case '3':
				$columnclass = 'column dt-sc-one-third';
			break;

			case '4':
				$columnclass = 'column dt-sc-one-fourth';
			break;
		}

		if( !empty($content) ) {
			$data = 'data-content = "yes" ';
		}

		$out  = '<div class="dt-sc-yoga-teachers-sorting" '.$data.'>';
		$out .= '	<a href="#" data-filter="*">'.esc_html__('All','veda-yoga').'</a>';
					$alphabets = array( esc_html__('A','veda-yoga'), esc_html__('B','veda-yoga'), esc_html__('C','veda-yoga'), esc_html__('D','veda-yoga'),
					 esc_html__('E','veda-yoga'), esc_html__('F','veda-yoga'), esc_html__('G','veda-yoga'), esc_html__('H','veda-yoga'), esc_html__('I','veda-yoga'),
					 esc_html__('J','veda-yoga'), esc_html__('K','veda-yoga'), esc_html__('L','veda-yoga'), esc_html__('M','veda-yoga'), esc_html__('N','veda-yoga'),
					 esc_html__('O','veda-yoga'), esc_html__('P','veda-yoga'), esc_html__('Q','veda-yoga'), esc_html__('R','veda-yoga'), esc_html__('S','veda-yoga'),
					 esc_html__('T','veda-yoga'), esc_html__('U','veda-yoga'), esc_html__('V','veda-yoga'), esc_html__('W','veda-yoga'), esc_html__('X','veda-yoga'),
					 esc_html__('Y','veda-yoga'), esc_html__('Z','veda-yoga') );

					foreach( $alphabets as $key => $alphabet ) {
						$class = ( $key == 0 ) ? ' class="active-sort" ':'';
						$out .= '<a href="#" '.$class.'>'.$alphabet.'</a>';
					}
		$out .= '</div>';

		if( !empty($content) ) {
			$out .= '<div class="column dt-sc-three-fourth dt-sc-yoga-teachers-listing first">';
		}

		$out .= '<div class="dt-sc-yoga-teachers-listing-container" data-column="'.esc_attr($column).'">';

			$yoga_teachers = array( 'post_type'=>'dt_yoga_teachers', 'posts_per_page'=>'-1',
				'suppress_filters' => false, 'order_by'=> 'title', 'order' => 'ASC');

			$yoga_teachers['search_yoga_teacher_title'] = esc_html__('A','veda-yoga');
			add_filter( 'posts_where', array( $this, 'yoga_teachers_title_filter' ), 10, 2 );

			$wp_query = new WP_Query();
			$wp_query->query( $yoga_teachers );
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
					$out .= do_shortcode('[dt_sc_yoga_teacher_item id="'.$the_id.'"/]');
					$out .= '</div>';
				}
			} else {
				$out .= '<div class="column dt-sc-one-column">';
				$out .= '<h2>'.esc_html__("Nothing Found.", "veda-yoga").'</h2>';
				$out .= '<p>'.esc_html__("Apologies, but no results were found for the request.", "veda-yoga").'</p>';
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

	function dt_sc_filter_yoga_teachers() {

		$columnclass = $column = $out = '';

    	$data = $_REQUEST['data'];
    	$data = array_filter($data);

    	$column = array_key_exists( 'column', $data) ? $data['column'] : '2';

		switch( $column ) {
			default:
			case '2':
				$columnclass = 'column dt-sc-one-half';
			break;

			case '3':
				$columnclass = 'column dt-sc-one-third';
			break;

			case '4':
				$columnclass = 'column dt-sc-one-fourth';
			break;
		}

		$yoga_teachers = array( 'post_type'=>'dt_yoga_teachers', 'posts_per_page'=>'-1',
			'suppress_filters' => false, 'order_by'=> 'title', 'order' => 'ASC');

		if( array_key_exists('title', $data ) && ( trim($data['title']) !== '*' ) ) {

			$yoga_teachers['search_yoga_teacher_title'] = $data['title'];
			add_filter( 'posts_where', array( $this, 'yoga_teachers_title_filter' ), 10, 2 );
		}

		$wp_query = new WP_Query();
		$wp_query->query( $yoga_teachers );
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
				$out .= do_shortcode('[dt_sc_yoga_teacher_item id="'.$the_id.'"/]');
				$out .= '</div>';
			}
		} else {
			$out .= '<div class="column dt-sc-one-column">';
			$out .= '<h2>'.esc_html__("Nothing Found.", "veda-yoga").'</h2>';
			$out .= '<p>'.esc_html__("Apologies, but no results were found for the request.", "veda-yoga").'</p>';
			$out .= '</div>';
		}
		echo $out;
		die();
	}	

	function yoga_teachers_title_filter( $where, &$wp_query ) {

		global $wpdb;
		if ( $search_term = $wp_query->get( 'search_yoga_teacher_title' ) ) {
			$where .= ' AND ' . $wpdb->posts . '.post_title LIKE \''. esc_sql( $wpdb->esc_like( $search_term ) ) . '%\'';
		}

		return $where;		
	}

	// Yoga Program
	
	function dt_sc_yoga_progrma_item( $attrs, $content = null ) {
		extract ( shortcode_atts ( array ( 'id' => '' ), $attrs ) );

		$out = "";
		if( !empty($id) ) {

			$p = get_post( $id );
			$title = get_the_title($id);
			$permalink = get_permalink($id);

			$post_settings = get_post_meta ( $id, '_custom_settings', TRUE );
			$post_settings = is_array ( $post_settings ) ? $post_settings : array ();


			if( $p->post_type == "dt_yoga_programs" ) {

				$image =  has_post_thumbnail($id) ? get_the_post_thumbnail($id,'full') : '<img src="http://place-hold.it/600x320&text='.esc_html($title).'" alt="'.esc_attr($title).'" title="'.esc_attr($title).'"/>';				
				$out .= '<div class="dt-sc-yoga-program">';
				$out .= '	<div class="dt-sc-yoga-program-thumb">';
				$out .= 		veda_wp_kses($image);
				$out .= '		<div class="dt-sc-yoga-program-thumb-overlay">';
				$out .= '			<a class="dt-sc-button small filled" href="'.$permalink.'">'.esc_html__(' View Details','veda-yoga').'</a>';
				$out .= '		</div>';
				$out .= '	</div>';
				$out .= '	<div class="dt-sc-yoga-program-details">';
				$out .= 		get_the_term_list( $id, 'dt_yoga_program_categories', '<h6>',', ', '</h6>');
				$out .= '		<h5><a href="'.$permalink.'">'.$title.'</a></h5>';

								if( array_key_exists('duration', $post_settings) ) {
									$out .= '<div class="dt-sc-yoga-program-meta">';
									$out .= '	<p>'.esc_html__(' Program Duration:','veda-yoga').' '.$post_settings['duration'].'</p>';
									$out .= '</div>';				
								}

				$out .= '	</div>';				
				$out .= '</div>';

				return $out;
			}
		}
	}

	function dt_sc_yoga_programs_listing( $attrs, $content = null ) {

		extract ( shortcode_atts ( array ( 'column' => '3' ), $attrs ) );

		$out = $columnclass = '';

		switch( $column ) {

			default:
			case '2':
				$columnclass = 'column dt-sc-one-half';
			break;

			case '3':
				$columnclass = 'column dt-sc-one-third';
			break;

			case '4':
				$columnclass = 'column dt-sc-one-fourth';
			break;
		}

		$out .= '<div class="dt-sc-yoga-program-listing-container" data-column="'.esc_attr($column).'">';
		$out .= '	<form action="'.get_home_url().'" method="post" class="yoga-program-sorting">';

		$out .= '		<select name="yoga-style">';
		$out .= '			<option value="0">'.esc_html__('Yoga Style','veda-yoga').'</option>';		
							$styles_query = new WP_Query();
							$styles_query->query( array( 'post_type' => 'dt_yoga_styles', 'posts_per_page' => '-1', 
								'suppress_filters' => false, 'order_by' => 'name', 'order' => 'DESC') );
							if( $styles_query->have_posts() ) {
								while( $styles_query->have_posts() ) {
									$styles_query->the_post();
									$id = get_the_ID();
									$title = get_the_title();
									$out .= '<option value="'.esc_attr($id).'">'.esc_html($title).'</option>';
								}
							}		
		$out .= '		</select>';

		$out .= '		<select name="student-level">';
		$out .= '			<option value="0">'.esc_html__('Student Category','veda-yoga').'</option>';	
							$student_levels = get_categories("taxonomy=dt_yoga_student_level");
							foreach ( $student_levels as $student_level ) {
								$id = esc_attr( $student_level->term_id );
								$title = esc_html( $student_level->name );
								$out .= "<option value='{$id}'>{$title}</option>";
							}
		$out .= '		</select>';

		$out .= '		<select name="yoga-program-category">';
		$out .= '			<option value="0">'.esc_html__('Category','veda-yoga').'</option>';	
							$program_categories = get_categories("taxonomy=dt_yoga_program_categories");
							foreach ( $program_categories as $program_category ) {
								$id = esc_attr( $program_category->term_id );
								$title = esc_html( $program_category->name );
								$out .= "<option value='{$id}'>{$title}</option>";
							}
		$out .= '		</select>';		

		$out .= '		<select name="yoga-teacher">';
		$out .= '			<option value="0">'.esc_html__('Find Expert','veda-yoga').'</option>';
							$teachers_query = new WP_Query();
							$teachers_query->query( array( 'post_type' => 'dt_yoga_teachers', 'suppress_filters' => false,
								'posts_per_page' => '-1', 'order_by' => 'title', 'order' => 'DESC') );
							if( $teachers_query->have_posts() ) {
								while( $teachers_query->have_posts() ) {
									$teachers_query->the_post();
									$id = get_the_ID();
									$title = get_the_title();
									$out .= '<option value="'.esc_attr($id).'">'.esc_html($title).'</option>';
								}
							}
		$out .= '		</select>';

		$out .= '		<input type="submit" value="'.esc_attr__('Submit Now','veda-yoga').'">';
		$out .= '	</form>';

		$out .= '	<div class="dt-sc-hr-invisible-medium"> </div>';
		$out .= '	<div class="dt-sc-clear"></div>';

			$programs = array( 'post_type' => 'dt_yoga_programs', 'posts_per_page' => get_option('posts_per_page'),
				'suppress_filters' => false, 'order_by' => 'date', 'order' => 'DESC');
			$wp_query = new WP_Query();
			$wp_query->query( $programs );
			if( $wp_query->have_posts() ) {

				$i = 1;

				$out .= '<div class="dt-sc-yoga-programs-container">';
				while( $wp_query->have_posts() ) {

					$wp_query->the_post();
					$the_id = get_the_ID();
					$temp_class = $columnclass;

					if($i == 1){
						$temp_class .= " first";
					}

					if($i == $column) $i = 1; else $i = $i + 1;

					$out .= '<div class="'.esc_attr($temp_class).'">';
					$out .= do_shortcode('[dt_sc_yoga_progrma_item id="'.$the_id.'"/]');
					$out .= '</div>';
				}
				$out .= '</div>';
			} else {
				$out .= '<div class="column dt-sc-one-column">';
				$out .= '<h2>'.esc_html__("Nothing Found.", "veda-yoga").'</h2>';
				$out .= '<p>'.esc_html__("Apologies, but no results were found for the request.", "veda-yoga").'</p>';
				$out .= '</div>';
			}
		$out .= '</div>';
		return $out;
	}

	function dt_sc_filter_yoga_programs() {

		$columnclass = $out = '';

    	$data = $_REQUEST['data'];
    	$data = array_filter($data);

    	$column = array_key_exists('column', $data ) ? $data['column'] : 2;

		switch( $column ) {

			default:
			case '2':
				$columnclass = 'column dt-sc-one-half';
			break;

			case '3':
				$columnclass = 'column dt-sc-one-third';
			break;

			case '4':
				$columnclass = 'column dt-sc-one-fourth';
			break;
		}

		$programs = array( 'post_type' => 'dt_yoga_programs', 'posts_per_page' => '-1',
			'suppress_filters' => false, 'order_by' => 'date', 'order' => 'DESC');

		if( array_key_exists('style',$data) ) {

			$programs['meta_query'][] = array( 'key' => '_styles',
			'value'=> $data['style'],
			'compare' => 'LIKE'
			);
		}

		if( array_key_exists('teacher',$data) ) {

			$programs['meta_query'][] = array( 'key' => '_teachers',
			'value'=> $data['teacher'],
			'compare' => 'LIKE'
			);			
		}

		if( array_key_exists('level',$data) ) {

			$programs['tax_query'][] = array( 'taxonomy' => 'dt_yoga_student_level',
				'field' => 'id',
				'terms' => (int) $data['level'],
				'operator' => 'IN');
		}

		if( array_key_exists('category',$data) ) {

			$programs['tax_query'][] = array( 'taxonomy' => 'dt_yoga_program_categories',
				'field' => 'id',
				'terms' => (int) $data['category'],
				'operator' => 'IN');
		}

		$wp_query = new WP_Query();
		$wp_query->query( $programs );
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
				$out .= do_shortcode('[dt_sc_yoga_progrma_item id="'.$the_id.'"/]');
				$out .= '</div>';
			}
		} else {

			$out .= '<div class="column dt-sc-one-column">';
			$out .= '<h2>'.esc_html__("Nothing Found.", "veda-yoga").'</h2>';
			$out .= '<p>'.esc_html__("Apologies, but no results were found for the request.", "veda-yoga").'</p>';
			$out .= '</div>';			
		}
		echo $out;
		die();
	}

	function dt_sc_yoga_recent_programs_listing( $attrs, $content = null ) {
		extract ( shortcode_atts ( array ( 'column' => '3', 'count' => '6' ), $attrs ) );

		$out = $columnclass = '';

		switch( $column ) {

			default:
			case '2':
				$columnclass = 'column dt-sc-one-half';
			break;

			case '3':
				$columnclass = 'column dt-sc-one-third';
			break;

			case '4':
				$columnclass = 'column dt-sc-one-fourth';
			break;
		}

		$posts_per_page = ( $count > 0 || $count == '-1') ? $count : get_option('posts_per_page');

		$programs = array( 'post_type' => 'dt_yoga_programs', 'posts_per_page' => $posts_per_page,
			'suppress_filters' => false, 'order_by' => 'date', 'order' => 'DESC');

		$wp_query = new WP_Query();
		$wp_query->query( $programs );
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
				$out .= do_shortcode('[dt_sc_yoga_progrma_item id="'.$the_id.'"/]');
				$out .= '</div>';
			}
		} else {
			$out .= '<div class="column dt-sc-one-column">';
			$out .= '<h2>'.esc_html__("Nothing Found.", "veda-yoga").'</h2>';
			$out .= '<p>'.esc_html__("Apologies, but no results were found for the request.", "veda-yoga").'</p>';
			$out .= '</div>';
		}

		return $out;
	}

	function dt_sc_yoga_teacher_programs_listing( $attrs, $content = null ) {
		extract ( shortcode_atts ( array ( 'column' => '3', 'count' => '6', 'teacher'=>'' ), $attrs ) );

		$out = $columnclass = "";

		if( !empty($teacher) ) {

			switch( $column ) {

				default:
				case '2':
					$columnclass = 'column dt-sc-one-half';
				break;

				case '3':
					$columnclass = 'column dt-sc-one-third';
				break;

				case '4':
					$columnclass = 'column dt-sc-one-fourth';
				break;
			}

			$posts_per_page = ( $count > 0 || $count == '-1' ) ? $count : get_option('posts_per_page');

			$programs = array( 'post_type' => 'dt_yoga_programs', 'posts_per_page' => $posts_per_page,
				'suppress_filters' => false, 'order_by' => 'date', 'order' => 'DESC');

			$programs['meta_query'][] = array( 'key' => '_teachers',
				'value'=> $teacher,
				'compare' => 'LIKE'
			);

			$wp_query = new WP_Query();
			$wp_query->query( $programs );
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
					$out .= do_shortcode('[dt_sc_yoga_progrma_item id="'.$the_id.'"/]');
					$out .= '</div>';
				}
			} else {
				$out .= '<div class="column dt-sc-one-column">';
				$out .= '<h2>'.esc_html__("Nothing Found.", "veda-yoga").'</h2>';
				$out .= '<p>'.esc_html__("Apologies, but no results were found for the request.", "veda-yoga").'</p>';
				$out .= '</div>';				
			}
		} else {
			$out .= '<div class="column dt-sc-one-column">';
			$out .= '<h2>'.esc_html__("Nothing Found.", "veda-yoga").'</h2>';
			$out .= '<p>'.esc_html__("Apologies, but no results were found for the request.", "veda-yoga").'</p>';
			$out .= '</div>';
		}	
		return $out;	
	}

	function dt_sc_yoga_style_programs_listing( $attrs, $content = null ) {
		extract ( shortcode_atts ( array ( 'column' => '3', 'count' => '6', 'style'=>'' ), $attrs ) );

		$out = $columnclass = "";

		if( !empty($style) ) {

			switch( $column ) {

				default:
				case '2':
					$columnclass = 'column dt-sc-one-half';
				break;

				case '3':
					$columnclass = 'column dt-sc-one-third';
				break;

				case '4':
					$columnclass = 'column dt-sc-one-fourth';
				break;
			}

			$posts_per_page = ( $count > 0 || $count == '-1' ) ? $count : get_option('posts_per_page');

			$programs = array( 'post_type' => 'dt_yoga_programs', 'posts_per_page' => $posts_per_page,
				'suppress_filters' => false, 'order_by' => 'date', 'order' => 'DESC');

			$programs['meta_query'][] = array( 'key' => '_styles', 'value'=> $style, 'compare' => 'LIKE');

			$wp_query = new WP_Query();
			$wp_query->query( $programs );
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
					$out .= do_shortcode('[dt_sc_yoga_progrma_item id="'.$the_id.'"/]');
					$out .= '</div>';
				}
			} else {
				$out .= '<div class="column dt-sc-one-column">';
				$out .= '<h2>'.esc_html__("Nothing Found.", "veda-yoga").'</h2>';
				$out .= '<p>'.esc_html__("Apologies, but no results were found for the request.", "veda-yoga").'</p>';
				$out .= '</div>';				
			}
		} else {
			$out .= '<div class="column dt-sc-one-column">';
			$out .= '<h2>'.esc_html__("Nothing Found.", "veda-yoga").'</h2>';
			$out .= '<p>'.esc_html__("Apologies, but no results were found for the request.", "veda-yoga").'</p>';
			$out .= '</div>';
		}	
		return $out;	
	}

	function dt_sc_yoga_category_programs_listing( $attrs, $content = null ) {
		extract ( shortcode_atts ( array ( 'column' => '3', 'count' => '6', 'category'=>'' ), $attrs ) );

		$out = $columnclass = "";

		if( !empty($category) ) {

			switch( $column ) {

				default:
				case '2':
					$columnclass = 'column dt-sc-one-half';
				break;

				case '3':
					$columnclass = 'column dt-sc-one-third';
				break;

				case '4':
					$columnclass = 'column dt-sc-one-fourth';
				break;
			}

			$posts_per_page = ( $count > 0 || $count == '-1' ) ? $count : get_option('posts_per_page');

			$programs = array( 'post_type' => 'dt_yoga_programs', 'posts_per_page' => $posts_per_page,
				'suppress_filters' => false, 'order_by' => 'date', 'order' => 'DESC');

			$programs['tax_query'][] = array( 'taxonomy' => 'dt_yoga_program_categories',
				'field' => 'id',
				'terms' => (int) $category,
				'operator' => 'IN'
			);

			$wp_query = new WP_Query();
			$wp_query->query( $programs );
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
					$out .= do_shortcode('[dt_sc_yoga_progrma_item id="'.$the_id.'"/]');
					$out .= '</div>';
				}
			} else {
				$out .= '<div class="column dt-sc-one-column">';
				$out .= '<h2>'.esc_html__("Nothing Found.", "veda-yoga").'</h2>';
				$out .= '<p>'.esc_html__("Apologies, but no results were found for the request.", "veda-yoga").'</p>';
				$out .= '</div>';				
			}
		} else {
			$out .= '<div class="column dt-sc-one-column">';
			$out .= '<h2>'.esc_html__("Nothing Found.", "veda-yoga").'</h2>';
			$out .= '<p>'.esc_html__("Apologies, but no results were found for the request.", "veda-yoga").'</p>';
			$out .= '</div>';
		}	
		return $out;	
	}

	function dt_sc_yoga_class( $attrs, $content = null ) {

		extract ( shortcode_atts ( array ( 'video_id' => '', 'title' => '', 'subtitle'=>'' ), $attrs ) );

		$out = "";

		if( !empty($video_id) ) {

			$p = get_post( $video_id );

			if( $p->post_type == "dt_yoga_videos" ) {

				$vtitle = get_the_title($video_id);
				$permalink = get_permalink($video_id);
				$image =  has_post_thumbnail($video_id) ? get_the_post_thumbnail($video_id,'full') : '<img src="http://place-hold.it/1170x700&text='.esc_html($vtitle).'" alt="'.esc_attr($vtitle).'" title="'.esc_attr($vtitle).'"/>';				


				$post_settings = get_post_meta ( $video_id, '_custom_settings', TRUE );
				$post_settings = is_array ( $post_settings ) ? $post_settings : array ();


				$teachers = get_post_meta( $video_id ,'_teachers', TRUE );
				$teachers = is_array ( $teachers ) ? $teachers : array ();
				$teacher = '';
				if( !empty($teachers) ) {

					$teachers_label =  esc_html__('Teachers', 'veda-yoga');
					if( function_exists( 'veda_opts_get' ) ) {
						$teachers_label = veda_opts_get( 'plural-teacher-name', $teachers_label );
					}

					$teacher .= '<li class="yoga-teacher">';
					$teacher .= esc_html( $teachers_label ).' : ';
					foreach( $teachers as $cteacher ) {
						$teacher .= '<a href="'.get_permalink( $cteacher ).'" title="'.get_the_title( $cteacher ).'">'. get_the_title( $cteacher ).'</a>';
					}
					$teacher .= '</li>';
				}

				$level = wp_get_object_terms( $video_id , 'dt_yoga_student_level');
				if( !empty( $level ) ) {

					$levels_label = esc_html__('Student Levels', 'veda-yoga');
					if( function_exists( 'veda_opts_get' ) ) {
						$levels_label = veda_opts_get( 'plural-level-name', $levels_label  );
					}

					$level = '<li>';
					$level .= esc_html( $levels_label ).' : ';
					$level .= get_the_term_list($video_id, 'dt_yoga_student_level', '', ', ','');
					$level .= '</li>';
				}

				$duration = wp_get_object_terms( $video_id , 'dt_yoga_video_durations');
				if( !empty( $duration) ) {

					$durations_label = esc_html__('Durations', 'veda-yoga');
					if( function_exists( 'veda_opts_get' ) ) {
						$durations_label = veda_opts_get( 'plural-video-duration-name', $durations_label );
					}

					$duration = '<li>';
					$duration .= esc_html( $durations_label ).' : ';
					$duration .= get_the_term_list($video_id, 'dt_yoga_video_durations', '', ', ','');
					$duration .= '</li>';					
				}

				$styles = get_post_meta( $video_id ,'_styles', TRUE );
				$styles = is_array ( $styles ) ? $styles : array ();
				$style = '';
				if( !empty($styles) ){
					$styles_label =  esc_html__('styles', 'veda-yoga');
					if( function_exists( 'veda_opts_get' ) ) {
						$styles_label = veda_opts_get( 'plural-style-name', $styles_label );
					}

					$style .= '<li class="yoga-style">';
					$style .= esc_html( $styles_label ).' : ';
					foreach( $styles as $cstyle ) {
						$style .= '<a href="'.get_permalink( $cstyle ).'" title="'.get_the_title( $cstyle ).'">'. get_the_title( $cstyle ).'</a>';
					}
					$style .= '</li>';				
				}

				$out .= '<div class="dt-sc-toggle-frame type2">';
				$out .= "<h5 class='dt-sc-toggle'><a href='#'>{$title}</a></h5>";
				$out .= '<div class="dt-sc-toggle-content" style="display: none;">';
				$out .= '<div class="block">';

				$out .= '	<div class="dt-sc-yoga-video-container">';
							if( array_key_exists('is-premium-video', $post_settings) ) {
								$text = trim(stripslashes(veda_option('pageoptions','premium-video-text')));
								$out .= '<div class="dt-sc-yoga-premium-video-overlay">';
								$out .= '	<div class="dt-sc-yoga-premium-video-overlay-message">'.do_shortcode($text).'</div>';
								$out .= '</div>';								
							}
				$out .= 	$image;
				$out .= '	</div>';
				$out .= '	<div class="dt-sc-yoga-detail-container">';
				$out .= '		<div class="column dt-sc-four-sixth first">';
				$out .= '			<h5><a href="'.$permalink.'">'.$vtitle.'</a></h5>';
				$out .= 			$p->post_excerpt;
				$out .= '		</div>';
				$out .= '		<div class="column dt-sc-two-sixth">';
				$out .= 			!empty( $subtitle ) ? '<h6>'.$subtitle.'</h6>' : '';
				$out .= '			<ul>'.$teacher.$level.$duration.$style.'</ul>';
				$out .= '		</div>';				
				$out .= '	</div>';
				$out .= '</div>';
				$out .= '</div>';
				$out .= '</div>';
			}
		}
		return $out;
	}		
}?>