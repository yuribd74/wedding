<?php
class DTProgramShortcodesDefinition {

	function __construct() {

		/* Trainers */
		add_shortcode ( "dt_sc_trainers", array (
			$this,
			"dt_sc_trainers"
		) );

		/* Trainers : Type 1 */
		add_shortcode ( "dt_sc_trainers_type1", array (
			$this,
			"dt_sc_trainers_type1"
		) );

		/* Trainers : Type 2 */
		add_shortcode ( "dt_sc_trainers_type2", array (
			$this,
			"dt_sc_trainers_type2"
		) );

		/* Filterable Programs */
		add_shortcode ( "dt_sc_program_list", array (
			$this,
			"dt_sc_program_list"
		) );

		/* Program List2 */
		add_shortcode ( "dt_sc_program_list2", array (
			$this,
			"dt_sc_program_list2"
		) );

		/* Workout */
		add_shortcode ( "dt_sc_workout", array (
			$this,
			"dt_sc_workout"
		) );

		/* Process Step */
		add_shortcode ( "dt_sc_process_step", array (
			$this,
			"dt_sc_process_step"
		) );

		/* Fitness Diet */
		add_shortcode ( "dt_sc_fitness_diet", array (
			$this,
			"dt_sc_fitness_diet"
		) );

		/* Programs Nav */
		add_shortcode ( "dt_sc_programs_nav", array (
			$this,
			"dt_sc_programs_nav"
		) );

		/* Program Info */
		add_shortcode ( "dt_sc_program_info", array (
			$this,
			"dt_sc_program_info"
		) );

		/* BMI */
		add_shortcode ( "dt_sc_bmi_calc", array(
			$this,
			"dt_sc_bmi_calc"
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

	/**
	 * trainers
	 * @return string
	 */
	function dt_sc_trainers($attrs, $content = null) {
		extract(shortcode_atts(array(
			'type' => 'type1',
			'limit' => -1
		), $attrs));

		$sc = "";

		if( $type == 'type1' ) :
			$sc = '[dt_sc_trainers_type1 limit="'.$limit.'"]';
		else:
			$sc = '[dt_sc_trainers_type2 limit="'.$limit.'"]';
		endif;

		return do_shortcode( $sc );
	}

	/**
	 * trainers
	 * @return string
	 */
	function dt_sc_trainers_type1($attrs, $content = null) {
		extract(shortcode_atts(array(
			'limit' => -1
		), $attrs));

		$out = "";

		#Performing query...
		$args = array('post_type' => 'dt_trainers', 'posts_per_page' => $limit);
		$the_query = new WP_Query($args);
		if($the_query->have_posts()): $i = 1;
		 while($the_query->have_posts()): $the_query->the_post();

			$temp_class = "";

			if($i == 1) $temp_class = " first";
			if($i == 2) $i = 1; else $i = $i + 1;

			$out .= '<div class="column dt-sc-one-half '.esc_attr($temp_class).'">';
				$out .= '<div class="dt-sc-trainers">';
					$out .= '<div class="dt-sc-trainers-thumb">';
						if(has_post_thumbnail()):
							$attr = array('title' => get_the_title(), 'alt' => get_the_title());
							$out .= get_the_post_thumbnail(get_the_ID(), 'full', $attr);
						else:
							$out .= '<img src="http://place-hold.it/270x400" alt="'.esc_attr(get_the_title()).'" title="'.esc_attr(get_the_title()).'" />';
						endif;
					$out .= '</div>';

					$trainer_settings = get_post_meta(get_the_ID(), '_custom_settings', true);
					$trainer_settings = is_array ( $trainer_settings ) ? $trainer_settings : array ();

					$out .= '<div class="dt-sc-trainers-details">';
						$out .= '<div class="dt-sc-trainers-title">';
							$out .= '<h5>'.get_the_title().'</h5>';
							if(array_key_exists('role', $trainer_settings))
								$out .= '<h6>'.esc_html($trainer_settings['role']).'</h6>';
						$out .= '</div>';
						$out .= '<div class="dt-sc-trainers-meta">';
							if(array_key_exists('skills', $trainer_settings)):
								$out .= '<h6>'.esc_html__('Skills', 'veda-program').'</h6>';
								$out .= '<p>'.esc_html($trainer_settings['skills']).'</p>';
							endif;
							if(array_key_exists('qualify', $trainer_settings)):
								$out .= '<h6>'.esc_html__('Qualification', 'veda-program').'</h6>';
								$out .= '<p>'.esc_html($trainer_settings['qualify']).'</p>';
							endif;
							if(array_key_exists('experience', $trainer_settings)):
								$out .= '<h6>'.esc_html__('Experience', 'veda-program').'</h6>';
								$out .= '<p>'.esc_html($trainer_settings['experience']).'</p>';
							endif;

							if( array_key_exists('meta_title', $trainer_settings) ):
								foreach( $trainer_settings['meta_title'] as $key => $title ):
									$value = $trainer_settings['meta_value'][$key];
									if( !empty($value) ):
										$out .= '<h6>'.esc_html($title).'</h6>';
										$out .= '<p>'.esc_html($value).'</p>';
									endif;
								endforeach;
							endif;

						$out .= '</div>';
					$out .= '</div>';
					if(array_key_exists('social', $trainer_settings)):
						$social = do_shortcode($trainer_settings['social']);
						$social = str_replace('dt-sc-team-social', 'dt-sc-sociable', $social);
						$out .= $social;
					endif;
				$out .= '</div>';
			$out .= '</div>';

			if($i == 1) {
				$out .= '<div class="dt-sc-hr-invisible-xsmall"> </div>';
				$out .= '<div class="dt-sc-hr-top-5"> </div>';
			}

		 endwhile;
		wp_reset_postdata();
		else:
			$out .= '<h2>'.esc_html__('Nothing Found.', 'veda-program').'</h2>';
			$out .= '<p>'.esc_html__('Apologies, but no results were found for the requested archive.', 'veda-program').'</p>';
		endif;

		return $out;
	}

	/**
	 * trainers type2 
	 * @return string
	 */
	function dt_sc_trainers_type2($attrs, $content = null) {
		extract(shortcode_atts(array(
			'limit' => -1
		), $attrs));

		$out = "";

		#Performing query...
		$args = array('post_type' => 'dt_trainers', 'posts_per_page' => $limit);
		$the_query = new WP_Query($args);
		if($the_query->have_posts()): $i = 1;
		 while($the_query->have_posts()): $the_query->the_post();

			$temp_class = "";

			if($i == 1) $temp_class = " first";
			if($i == 4) $i = 1; else $i = $i + 1;

			$out .= '<div class="column dt-sc-one-fourth '.esc_attr($temp_class).'">';
				$out .= '<div class="dt-sc-team hide-details-show-on-hover">';
					$out .= '<div class="dt-sc-team-thumb">';
						if(has_post_thumbnail()):
							$attr = array('title' => get_the_title(), 'alt' => get_the_title());
							$out .= get_the_post_thumbnail(get_the_ID(), 'full', $attr);
						else:
							$out .= '<img src="http://place-hold.it/280x415" alt="'.esc_attr(get_the_title()).'" title="'.esc_attr(get_the_title()).'" />';
						endif;
					$out .= '</div>';
					$out .= '<div class="dt-sc-team-details">';
						$out .= '<h4>'.get_the_title().'</h4>';

						$trainer_settings = get_post_meta(get_the_ID(), '_custom_settings', true);
						$trainer_settings = is_array ( $trainer_settings ) ? $trainer_settings : array ();

						if(array_key_exists('role', $trainer_settings))
							$out .= '<h5>'.esc_html($trainer_settings['role']).'</h5>';

						if(array_key_exists('social', $trainer_settings)) $out .= do_shortcode($trainer_settings['social']);
					$out .= '</div>';
				$out .= '</div>';
			$out .= '</div>';
			
			if($i == 1) $out .= '<div class="dt-sc-hr-invisible-small"> </div>';

		 endwhile;
		wp_reset_postdata();
		else:
			$out .= '<h2>'.esc_html__('Nothing Found.', 'veda-program').'</h2>';
			$out .= '<p>'.esc_html__('Apologies, but no results were found for the requested archive.', 'veda-program').'</p>';
		endif;

		return $out;
	}

	/**
	 * program list : filterable program list
	 * @return string
	 */
	function dt_sc_program_list($attrs, $content = null) {
		extract(shortcode_atts(array(
			'limit' => -1,
			'categories' => '',
			'posts_column' => 'one-half-column', // one-third-column
			'filter' => ''
		), $attrs));

		$out = "";
		$post_layout = $posts_column;
		$div_class = "";

		#Post layout check...
		switch($post_layout) {
			case "one-half-column":
				$div_class = "dt-sc-fitness-program dt-sc-one-half column"; break;
	
			case "one-third-column":
				$div_class = "dt-sc-fitness-program dt-sc-one-third column"; break;
		}

		if(empty($categories)) {
			$cats = get_categories('taxonomy=program_entries&hide_empty=1');
			$cats = get_terms( array('program_entries'), array('fields' => 'ids'));		
		} else {
			$cats = explode(',', $categories);
		}

		if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
		elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
		else { $paged = 1; }

		#Performing query...
		$args = array('post_type' => 'dt_programs', 'paged' => $paged , 'posts_per_page' => $limit,
			'tax_query' => array( 
				array(
					'taxonomy' => 'program_entries', 
					'field' => 'id', 
					'terms' => $cats
				)));

		$the_query = new WP_Query($args);
		if($the_query->have_posts()):

			if($filter != "no"):
				$out .= '<div class="dt-sc-fitness-program-sorting">';
					$out .= '<a href="#" class="active-sort" data-filter="*">'.esc_html__("All", "veda-program").'</a>';
					foreach($cats as $term) {
						$myterm = get_term_by('id', $term, 'program_entries');
						$out .= '<a href="#" data-filter=".'.esc_attr(strtolower($myterm->slug)).'">'.esc_html($myterm->name).'</a>';
					}
                $out .= '</div>';
			endif;

			$out .= '<div class="dt-sc-fitness-program-container">';
				while($the_query->have_posts()): $the_query->the_post();
					$PID = get_the_ID();
					$terms = wp_get_post_terms($PID, 'program_entries', array("fields" => "slugs"));

					$out .= '<div class="'.esc_attr($div_class)." ".esc_attr(strtolower(implode(" ", $terms))).'">';
						$out .= '<figure>';
							$out .= '<a href="'.esc_url(get_permalink()).'" title="'.esc_attr(get_the_title()).'">';
								if(has_post_thumbnail()):
									$attr = array('title' => get_the_title(), 'alt' => get_the_title());
									$out .= get_the_post_thumbnail($PID, 'full', $attr);
								else:
									$out .= '<img src="http://place-hold.it/573x291&text='.esc_attr(get_the_title()).'" alt="'.esc_attr(get_the_title()).'" title="'.esc_attr(get_the_title()).'"/>';
								endif;
							$out .= '</a>';
							$out .= '<figcaption><a href="'.esc_url(get_permalink()).'" title="'.esc_attr(get_the_title()).'"><h4>'.esc_html(get_the_title()).'</h4></a></figcaption>';
						$out .= '</figure>';
						$out .= '<div class="dt-sc-fitness-program-details">';
							$out .= veda_excerpt(35);
							$out .= '<div class="dt-sc-fitness-program-meta">';
								$program_settings = get_post_meta($PID, '_custom_settings', true);
								$program_settings = is_array ( $program_settings ) ? $program_settings : array ();
								if(array_key_exists('levels', $program_settings))
									$out .= '<p>'.esc_html($program_settings['levels']).'</p>';
								if(array_key_exists('timing', $program_settings))
									$out .= '<p>'.esc_html($program_settings['timing']).'</p>';
								if(array_key_exists('duration', $program_settings))
									$out .= '<p>'.esc_html($program_settings['duration']).'</p>';

								if(array_key_exists('price', $program_settings))
									$out .= '<div class="dt-sc-fitness-program-price"> <sup>'.esc_html($program_settings['pre_price']).'</sup> '.esc_html($program_settings['price']).' / <sub> '.esc_html($program_settings['post_price']).' </sub> </div>';
							$out .= '</div>';
						$out .= '</div>';
					$out .= '</div>';
				endwhile;
			$out .= '</div>';
		wp_reset_postdata();
		else:
			$out .= '<h2>'.esc_html__("Nothing Found.", "veda-program").'</h2>';
			$out .= '<p>'.esc_html__("Apologies, but no results were found for the requested archive.", "veda-program").'</p>';
		endif;

		return $out;
	}

	/**
	 * program list2
	 * @return string
	 */
	function dt_sc_program_list2($attrs, $content = null) {
		extract(shortcode_atts(array(
			'limit' => -1,
			'categories' => '',
			'button_text' => esc_html__('Join Training', 'veda-program')
		), $attrs));

		global $post;
		$out = "";

		if(empty($categories)) {
			$cats = get_categories('taxonomy=program_entries&hide_empty=1');
			$cats = get_terms( array('program_entries'), array('fields' => 'ids'));		
		} else {
			$cats = explode(',', $categories);
		}

		#Performing query...
		$args = array('post_type' => 'dt_programs', 'posts_per_page' => $limit,'tax_query' => array( array( 'taxonomy' => 'program_entries', 'field' => 'id', 'terms' => $cats ) ) );
		$the_query = new WP_Query($args);
		if($the_query->have_posts()): $i = 1;
		 while($the_query->have_posts()): $the_query->the_post();

			$temp_class = "";

			if($i == 1) $temp_class = " first";
			if($i == 2) $i = 1; else $i = $i + 1;

			$out .= '<div class="column dt-sc-one-half '.esc_attr($temp_class).'">';
				$out .= '<div class="dt-sc-training">';
					$out .= '<div class="dt-sc-training-thumb"> ';
						if(has_post_thumbnail()):
							$attr = array('title' => get_the_title(), 'alt' => get_the_title());
							$out .= get_the_post_thumbnail($post->ID, 'training-list2', $attr);
						else:
							$out .= '<img src="http://place-hold.it/280x311&text='.esc_attr(get_the_title()).'" alt="'.esc_attr(get_the_title()).'" title="'.esc_attr(get_the_title()).'" />';
						endif;
						$out .= '<div class="dt-sc-training-thumb-overlay">';
							$out .= '<a class="dt-sc-button small filled" title="'.esc_attr(get_the_title()).'" href="'.esc_url(get_permalink()).'">'.esc_html($button_text).'</a>';
						$out .= '</div>';
					$out .= '</div>';
					$out .= '<div class="dt-sc-training-details">';
						$out .= '<h6>'.esc_html(get_the_title()).'</h6>';
						$program_settings = get_post_meta($post->ID, '_custom_settings', true);
						$program_settings = is_array ( $program_settings ) ? $program_settings : array ();
						$out .= '<ul>';
							if(array_key_exists('timing', $program_settings))
								$out .= '<li> <span class="pe-icon pe-stopwatch"> </span> '.esc_html($program_settings['timing']).' </li>';

								$author_id = $post->post_author;
								$out .= '<li> <span class="pe-icon pe-user"> </span> '.esc_html(get_the_author_meta( 'user_nicename' , $author_id )).' </li>';

							if(array_key_exists('duration', $program_settings))
								$out .= '<li> <span class="pe-icon pe-date"> </span> '.esc_html($program_settings['duration']).' </li>';
						$out .= '</ul>';
						$out .= veda_excerpt(20);
						$out .= '<div class="dt-sc-training-details-overlay">';
							$out .= '<h6>'.esc_html(get_the_title()).'</h6>';
							if(array_key_exists('price', $program_settings))
								$out .= '<div class="price"> <sup> '.esc_html($program_settings['pre_price']).' </sup> '.esc_html($program_settings['price']).' /<sub>'.esc_html($program_settings['post_price']).' </sub> </div>';
						$out .= '</div>';
					$out .= '</div>';
				$out .= '</div>';
			$out .= '</div>';
			if($i == 1) $out .= '<div class="dt-sc-hr-invisible-small"> </div>';

		 endwhile;
		wp_reset_postdata();
		else:
			$out .= '<h2>'.esc_html__('Nothing Found.', 'veda-program').'</h2>';
			$out .= '<p>'.esc_html__('Apologies, but no results were found for the requested archive.', 'veda-program').'</p>';
		endif;

		return $out;
	}	

	/**
	 * workout
	 * @return string
	 */
	function dt_sc_workout($attrs, $content = null) {
		extract ( shortcode_atts ( array (
			'title' => '',
			'subtitle' => '',
			'image' => '',
			'link' => '',
			'add_icon' => '',
			'iconclass' => '',
			'class' => ''
		), $attrs ) );

		if( empty( $image ) )
			$class .= ' no-workout-thumb';

		$out = '<div class="dt-sc-workouts '.esc_attr($class).'">';

			if(!empty($image)):
				$image = wpb_getImageBySize( array( 'attach_id' => $image, 'thumb_size' => 'full' ));
				$image = $image['thumbnail'];

				$out .= '<div class="dt-sc-workouts-thumb">';
					$out .= $image;
				$out .= '</div>';
			endif;

			$out .= '<div class="dt-sc-workouts-details">';
				$out .= '<h6>'.esc_html($subtitle).'</h6>';
				$out .= '<h4>'.esc_html($title).'</h4>';
				$out .= DTProgramShortcodesDefinition::dtShortcodeHelper ( $content );

				$link = ( '||' === $link ) ? '' : $link;
				$link = vc_build_link( $link );
				$a_href = $link['url'];
				$a_title = $link['title'];
				$a_target = $link['target'];

				$icon = "";
				if( $add_icon == 'true' && !empty( $iconclass ) ) {
					$icon = '<span class="'.esc_attr($iconclass).'"> </span>';
				}

				$out .= '<a class="dt-sc-button small filled" title="'.esc_attr($a_title).'" href="'.esc_url($a_href).'">'.esc_html($a_title).($icon).'</a>';
			$out .= '</div>';

		$out .= '</div>';

		return $out;
	}

	/**
	 * process step
	 * @return string
	 */
	function dt_sc_process_step($attrs, $content = null) {
		extract ( shortcode_atts ( array (
			'image' => '',
			'step' => '',
			'title' => '',
			'class' => ''
		), $attrs ) );

		$image = wpb_getImageBySize( array( 'attach_id' => $image, 'thumb_size' => 'full' ));
		$image = $image['thumbnail'];

		$image = !empty( $image ) ? $image : '<img src="http://place-hold.it/130x130"/>';

		$out = '<div class="dt-sc-process-steps '.esc_attr($class).'">';
			$out .= '<div class="dt-sc-process-thumb">';
				$out .= veda_wp_kses($image);
				$out .= '<div class="dt-sc-process-thumb-overlay">';
					$out .= '<h5>'.esc_html($step).'</h5>';
				$out .= '</div>';
			$out .= '</div>';
			$out .= '<div class="dt-sc-process-details">';
				$out .= '<h5>'.esc_html($title).'</h5>';
				$out .= DTProgramShortcodesDefinition::dtShortcodeHelper ( $content );
			$out .= '</div>';
		$out .= '</div>';

		return $out;
	}

	/**
	 * fitness diet
	 * @return string
	 */
	function dt_sc_fitness_diet($attrs, $content = null) {
		extract ( shortcode_atts ( array (
			'title' => '',
			'subtitle' => '',
			'image' => '',
		), $attrs ) );

		$image = wpb_getImageBySize( array( 'attach_id' => $image, 'thumb_size' => 'full' ));
		$image = $image['thumbnail'];

		$out = '<div class="dt-sc-fitness-diet">';
			$out .= '<div class="dt-sc-fitness-diet-thumb">';
				$out .= !empty( $image ) ? veda_wp_kses($image): '';
			$out .= '</div>';
			$out .= '<div class="dt-sc-fitness-diet-details">';
				$out .= '<h5>'.esc_html($title).'</h5>';
				$out .= '<h6>'.esc_html($subtitle).'</h6>';
				$out .= DTProgramShortcodesDefinition::dtShortcodeHelper ( $content );
			$out .= '</div>';
		$out .= '</div>';

		return $out;
	}

	/**
	 * programs nav
	 * @return string
	 */
	function dt_sc_programs_nav($attrs, $content = null) {
		extract(shortcode_atts(array(
			'limit' => -1
		), $attrs));

		global $post;
		$postID = $post->ID;
		
		$out = $temp = "";

		$args = array('post_type' => 'dt_programs', 'posts_per_page' => $limit);
		$the_query = new WP_Query($args);
		if($the_query->have_posts()):
		 $out = '<ul class="dt-sc-fitness-program-nav">';
		 while($the_query->have_posts()): $the_query->the_post();
			if($postID == get_the_ID())
				$temp = ' class="current_page_item"';

		 	$out .= '<li'.$temp.'> <a title="'.get_the_title().'" href="'.get_permalink().'">'.get_the_title().'</a> </li>';
			$temp = "";
		 endwhile;
		 $out .= '</ul>';
		wp_reset_postdata();
		else:
			$out .= '<h2>'.esc_html__("Nothing Found.", "veda-program").'</h2>';
		endif;
		
		return $out;
	}

	/**
	 * program info
	 * @return string
	 */
	function dt_sc_program_info($attrs, $content = null) {
		extract(shortcode_atts(array(
			'meta' => ''
		), $attrs));

		global $post;
		$out = "";

		$out = '<div class="dt-sc-fitness-program-short-details-wrapper">';
			if(has_post_thumbnail()):
				$attr = array('title' => get_the_title(), 'alt' => get_the_title());
				$out .= get_the_post_thumbnail($post->ID, 'full', $attr);
			else:
				$out .= '<img src="http://place-hold.it/900x445&text='.get_the_title().'" alt="'.get_the_title().'" title="'.get_the_title().'" />';
			endif;

			if($meta != 'no'):
				$out .= '<div class="dt-sc-fitness-program-short-details">';
					$program_settings = get_post_meta($post->ID, '_custom_settings', true);
					$program_settings = is_array ( $program_settings ) ? $program_settings : array ();

					if(array_key_exists('subtitle', $program_settings))
						$out .= '<h2>'.esc_html($program_settings['subtitle']).'</h2>';
					$out .= '<ul>';
						if(array_key_exists('levels', $program_settings))
							$out .= '<li> <span> '.esc_html__('Workout Levels', 'veda-program').' </span> : '.esc_html($program_settings['levels']).' </li>';
						if(array_key_exists('timing', $program_settings))
							$out .= '<li> <span> '.esc_html__('Workout Timing', 'veda-program').' </span> : '.esc_html($program_settings['timing']).' </li>';
						if(array_key_exists('duration', $program_settings))
							$out .= '<li> <span> '.esc_html__('Goal Duration', 'veda-program').' </span> : '.esc_html($program_settings['duration']).' </li>';

						if( array_key_exists('meta_title', $program_settings) ):
							foreach( $program_settings['meta_title'] as $key => $title ):
								$value = $program_settings['meta_value'][$key];
								if( !empty($value) ):
									$out .= '<li> <span> '.esc_html($title).' </span> : '.veda_wp_kses($value).' </li>';
								endif;
							endforeach;
						endif;
					$out .= '</ul>';
				$out .= '</div>';
			endif;
		$out .= '</div>';
		
		return $out;
	}

	function dt_sc_bmi_calc( $attrs, $content = null ){
		extract(shortcode_atts(array(
			'title' => '',
			'css' => ''
		), $attrs));

		$class = vc_shortcode_custom_css_class( $css );

		$out = "<div class='dt-sc-bmi-calculator ".esc_attr($class)."'>";
			$out .= '<h5>'.esc_html($title).'</h5>';
			$out .= '<form name="frmbmi" action="#" method="post">';

				$out .= '<div class="column dt-sc-one-third first group-textbox">';
					$out .= '<label>'.esc_html__('Height', 'veda-program').'<span>'.esc_html__('Ft/in', 'veda-program').'</span></label>';
					$out .= '<input name="txtfeet" placeholder="'.esc_html__('FT', 'veda-program').'" type="text" required="required">';
					$out .= '<input name="txtinches" placeholder="'.esc_html__('IN', 'veda-program').'" type="text" required="required">';
				$out .= '</div>';

				$out .= '<div class="column dt-sc-one-third">';
					$out .= '<label>'.esc_html__('Weight', 'veda-program').'<span>'.esc_html__('LBS', 'veda-program').'</span> </label>';
					$out .= '<input name="txtlbs" type="text" required="required">';
				$out .= '</div>';

				$out .= '<div class="column dt-sc-one-third">';
					$out .= '<label>'.esc_html__('Select Gender', 'veda-program').'</label>';
					$out .= '<div class="selection-box">';
						$out .= '<select>';
							$out .= '<option>'.esc_html__('Male', 'veda-program').'</option>';
							$out .= '<option>'.esc_html__('Female', 'veda-program').'</option>';
						$out .= '</select>';
					$out .= '</div>';
				$out .= '</div>';

				$out .= '<input name="subbmi" value="'.esc_html__('Calculate BMI', 'veda-program').'" type="submit">';
				$out .= '<input type="reset" value="'.esc_html__('Reset', 'veda-program').'">';
				$out .= '<div class="dt-sc-bmi-result">';
					$out .= '<div class="column dt-sc-one-third first">';
						$out .= '<label> <span>'.esc_html__('Your BMI is', 'veda-program').'</span> </label>';
					$out .= '</div>';
					$out .= '<div class="column dt-sc-one-fifth">';
						$out .= '<input name="txtbmi" placeholder="0.0" type="text" readonly>';
					$out .= '</div>';
					$out .= '<div class="column dt-sc-one-third">';
						$out .= '<a href="#tblbmicontent" class="fancyInline">'.esc_html__('View BMI Class', 'veda-program').'<span class="pe-icon pe-angle-right-circle"> </span></a>';
					$out .= '</div>';
				$out .= '</div>';

			$out .= '</form>';
			$out .= '<div id="tblbmicontent" class="tblbmi">';
				$out .= '<div class="dt-bmi-inner-content">';
					$out .= DTProgramShortcodesDefinition::dtShortcodeHelper ( $content );
				$out .= '</div>';
			$out .= '</div>';
		$out .= '</div>';

		return $out;
	}	
}?>