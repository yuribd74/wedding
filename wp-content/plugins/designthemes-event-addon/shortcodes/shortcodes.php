<?php
class DTEventShortcodesDefinition {

	function __construct() {

		/* DJs */
		add_shortcode ( "dt_sc_djs", array (
			$this,
			"dt_sc_djs"
		) );

		/* DJ Club */
		add_shortcode ( "dt_sc_dj_club", array (
			$this,
			"dt_sc_dj_club"
		) );

		/* Events Grid */
		add_shortcode ( "dt_sc_addon_events_grid", array (
			$this,
			"dt_sc_addon_events_grid"
		) );

		/* Events List */
		add_shortcode ( "dt_sc_addon_events_list", array (
			$this,
			"dt_sc_addon_events_list"
		) );
	}

	/**
	 * djs
	 * @return string
	 */
	function dt_sc_djs($attrs, $content = null) {
		extract(shortcode_atts(array(
			'limit' => -1,
			'excerpt_length' => '16'
		), $attrs));

		$out = $temp = "";

		#Performing query...
		$args = array('post_type' => 'dt_djs', 'posts_per_page' => $limit);
		$the_query = new WP_Query($args);
		if($the_query->have_posts()): $i = 1;
		 while($the_query->have_posts()): $the_query->the_post();

			$temp_class = "";
			$cid = get_the_ID();
			
			if($i == 1) $temp_class = " first";
			if($i == 2) $i = 1; else $i = $i + 1;

			$out .= '<div class="column dt-sc-one-half '.esc_attr($temp_class).'">';
				$out .= '<div class="dt-sc-dj-profile">';
					$out .= '<div class="dt-sc-dj-profile-thumb">';
						if(has_post_thumbnail()):
							$attr = array('title' => get_the_title(), 'alt' => get_the_title());
							$out .= get_the_post_thumbnail($cid, 'full', $attr);
						else:
							$out .= '<img src="http://place-hold.it/273x302" alt="'.esc_attr(get_the_title()).'" title="'.esc_attr(get_the_title()).'" />';
						endif;
					$out .= '</div>';
					$out .= '<div class="dt-sc-dj-profile-details">';

						$dj_settings = get_post_meta($cid, '_custom_settings', true);
						$dj_settings = is_array ( $dj_settings ) ? $dj_settings : array();

						$out .= '<h2>'.get_the_title().'</h2>';
						if(array_key_exists('role', $dj_settings))
							$out .= '<h3>'.esc_html($dj_settings['role']).'</h3>';

						if($excerpt_length != '') $out .= veda_excerpt($excerpt_length);

						$out .= '<div class="dt-sc-dj-profile-meta">';
							if(array_key_exists('since', $dj_settings))
								$out .= '<p> <i class="fa fa-microphone"> </i>'.esc_html__('Since', 'veda-event').'<span>'.esc_html($dj_settings['since']).'</span></p>';
							if(array_key_exists('no_events', $dj_settings))
								$out .= '<p> <i class="fa fa-headphones"> </i>'.esc_html__('Event', 'veda-event').'<span>'.esc_html($dj_settings['no_events']).'</span></p>';
							if(array_key_exists('latest_audio', $dj_settings))
								$out .= '<p> <i class="fa fa-music"> </i>'.esc_html__('Latest', 'veda-event').'<span>'.esc_html($dj_settings['latest_audio']).'</span></p>';
						$out .= '</div>';
					$out .= '</div>';
				$out .= '</div>';
			$out .= '</div>';

		 endwhile;
		wp_reset_postdata();
		else:
			$out .= '<h2>'.esc_html__('Nothing Found.', 'veda-event').'</h2>';
			$out .= '<p>'.esc_html__('Apologies, but no results were found for the requested archive.', 'veda-event').'</p>';
		endif;

		return $out;
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
	 * dj club
	 * @return string
	 */
	function dt_sc_dj_club($attrs, $content = null) {
		extract(shortcode_atts(array(
			'class' => ''
		), $attrs));

		$out = '<div class="dt-sc-dj-club '.$class.'">';
			$out .= DTEventShortcodesDefinition::dtShortcodeHelper($content);
		$out .= '</div>';

		return $out;
	}

	/**
	 * events grid
	 * @return string
	 */
	function dt_sc_addon_events_grid($attrs, $content = null) {
		extract(shortcode_atts(array(
			'limit' => -1,
			'categories' => '',
			'filter' => 'yes'
		), $attrs));

		$out = "";

		if(empty($categories)) {
			$cats = get_categories('taxonomy=tribe_events_cat&hide_empty=1');
			$cats = get_terms( array('tribe_events_cat'), array('fields' => 'ids'));
		} else {
			$cats = explode(',', $categories);
		}

		if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
		elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
		else { $paged = 1; }

		#Performing query...
		$args = array('post_type' => 'tribe_events', 'paged' => $paged , 'posts_per_page' => $limit,
			'tax_query' => array( 
				array(
					'taxonomy' => 'tribe_events_cat',
					'field' => 'id',
					'terms' => $cats
		)));
		
		$the_query = new WP_Query($args);
		if($the_query->have_posts()):

			if($filter != "no"):
				$out .= '<div class="dt-sc-event-sorting">';
					$out .= '<a href="#" class="active-sort" data-filter="*">'.esc_html__("All events", "veda-event").'</a>';
					foreach($cats as $term) {
						$myterm = get_term_by('id', $term, 'tribe_events_cat');
						$out .= '<a href="#" title="'.esc_attr($myterm->name).'" data-filter=".'.esc_attr(strtolower($myterm->slug)).'">'.esc_html($myterm->name).'</a>';
					}
				$out .= '</div>';
			endif;

			$out .= '<div class="dt-sc-events-isotope">';
				while($the_query->have_posts()): $the_query->the_post();
					$PID = get_the_ID();
					$terms = wp_get_post_terms($PID, 'tribe_events_cat', array("fields" => "slugs"));

					$out .= '<div class="dt-sc-one-third column '.esc_attr( strtolower(implode(" ", $terms)) ).'">';
						$out .= '<div class="dt-sc-event-addon">';
							$out .= '<div class="dt-sc-event-addon-date">';
								$out .= tribe_get_start_date ( $PID, true, 'l' ).'<br>';
								$out .= '<p><span>'.tribe_get_start_date ( $PID, true, 'd' ).'</span>'.tribe_get_start_date ( $PID, true, 'M' ).'<br>'.tribe_get_start_date ( $PID, true, 'Y' ).'</p>';
							$out .= '</div>';
							$out .= '<div class="dt-sc-event-addon-overlay">';
								$out .= '<div class="dt-sc-event-addon-title">';
									$out .= '<div class="dt-sc-event-addon-date">';
										$out .= tribe_get_start_date ( $PID, true, 'l' ).'<br>';
										$out .= '<p><span>'.tribe_get_start_date ( $PID, true, 'd' ).'</span>'.tribe_get_start_date ( $PID, true, 'M' ).'<br>'.tribe_get_start_date ( $PID, true, 'Y' ).'</p>';
									$out .= '</div>';
									$out .= '<h2><a href="'.esc_url(get_permalink()).'">'.esc_html(get_the_title()).'</a></h2>';
								$out .= '</div>';
								$out .= '<div class="dt-sc-event-addon-detail">';
									$out .= '<ul>';
										$out .= '<li><span>'.esc_html__('Start', 'veda-event').'</span> '.tribe_get_start_time ( $PID, 'h:i a' ).'</li>';
										if(($venue = tribe_get_venue( $PID )) != '')
											$out .= '<li><span>'.esc_html__('Location', 'veda-event').'</span> '.esc_html($venue).'</li>';
										$ecost = tribe_get_formatted_cost( $PID );
										if(!empty($ecost))
											$out .= '<li class="dt-sc-event-addon-price"><span> '.esc_html__('Price', 'veda-event').'</span>'.esc_html($ecost).'</li>';
									$out .= '</ul>';
									if(!empty($ecost))
										$out .= '<a title="'.get_the_title().'" href="'.get_permalink().'" class="buy-now"><span>'.esc_html__('Buy', 'veda-event').'</span> '.esc_html__('Tickets', 'veda-event').'</a>';
									else
										$out .= '<a title="'.get_the_title().'" href="'.get_permalink().'" class="buy-now"><span>'.esc_html__('View', 'veda-event').'</span> '.esc_html__('Details', 'veda-event').'</a>';
								$out .= '</div>';
							$out .= '</div>';
							if(has_post_thumbnail()):
								$attr = array('title' => get_the_title(), 'alt' => get_the_title());
								$out .= get_the_post_thumbnail($cid, 'events-grid', $attr);
							else:
								$out .= '<img src="http://place-hold.it/375x374" alt="'.get_the_title().'" title="'.get_the_title().'" />';
							endif;
						$out .= '</div>';
					$out .= '</div>';
				endwhile;
			$out .= '</div>';

		wp_reset_postdata();
		else:
			$out .= '<h2>'.esc_html__("Nothing Found.", "veda-event").'</h2>';
			$out .= '<p>'.esc_html__("Apologies, but no results were found for the requested archive.", "veda-event").'</p>';
		endif;

		return $out;
	}

	/**
	 * events list
	 * @return string
	 */
	function dt_sc_addon_events_list($attrs, $content = null) {
		extract(shortcode_atts(array(
			'limit' => -1,
			'categories' => '',
			'excerpt_length' => '40'
		), $attrs));

		$out = "";

		if(empty($categories)) {
			$cats = get_categories('taxonomy=tribe_events_cat&hide_empty=1');
			$cats = get_terms( array('tribe_events_cat'), array('fields' => 'ids'));
		} else {
			$cats = explode(',', $categories);
		}

		#Performing query...
		$args = array('post_type' => 'tribe_events', 'posts_per_page' => $limit, 'tax_query' => array( array( 'taxonomy' => 'tribe_events_cat', 'field' => 'id', 'terms' => $cats )));
		$the_query = new WP_Query($args);
		if($the_query->have_posts()):

			while($the_query->have_posts()): $the_query->the_post();
				$PID = get_the_ID();
				$terms = wp_get_post_terms($PID, 'tribe_events_cat', array("fields" => "slugs"));
				
				$out .= '<div class="dt-sc-event-month">';
					$out .= '<div class="dt-sc-event-month-thumb">';
						if(has_post_thumbnail()):
							$attr = array('title' => get_the_title(), 'alt' => get_the_title());
							$out .= get_the_post_thumbnail($cid, 'events-list', $attr);
						else:
							$out .= '<img src="http://place-hold.it/340x230" alt="'.get_the_title().'" title="'.get_the_title().'" />';
						endif;
						$out .= '<div class="dt-sc-event-month-overlay">';
							$out .= '<div class="dt-sc-event-month-date-wrapper">';
								$out .= '<p class="dt-sc-event-month-date">'.tribe_get_start_date ( $PID, true, 'M' ).' '.tribe_get_start_date ( $PID, true, 'Y' ).'<br> <span>'.tribe_get_start_date ( $PID, true, 'd' ).'</span><br>'.tribe_get_start_date ( $PID, true, 'l' ).'</p>';
								$out .= '<p class="dt-sc-event-month-time">'.esc_html__('Start', '').'<br><span>'.tribe_get_start_time ( $PID, 'h:i' ).'</span></p>';
							$out .= '</div>';
							$out .= '<div class="dt-sc-event-read-more">';
								$out .= '<a title="'.get_the_title().'" href="'.get_permalink().'">'.esc_html__('View Detail', 'veda-event').'</a>';
							$out .= '</div>';
						$out .= '</div>';
					$out .= '</div>';
					$out .= '<div class="dt-sc-event-month-detail">';
						$out .= '<h2><a href="'.get_permalink().'">'.get_the_title().'</a></h2>';
						$out .= '<ul class="dt-sc-event-month-meta">';
							if(($venue = tribe_get_venue( $PID )) != '')
								$out .= '<li><span class="fa fa-map-marker"></span>'.$venue.', '.tribe_get_city( $PID ).', '.tribe_get_country( $PID ).'</li>';
							$out .= '<li><span class="fa fa-clock-o"></span>'.tribe_get_start_time ( $PID, 'h:i a' ).' &ndash; '.tribe_get_end_time ( $PID, 'h:i a' ).'</li>';
						$out .= '</ul>';
						if($excerpt_length != '') $out .= veda_excerpt($excerpt_length);
					$out .= '</div>';
				$out .= '</div>';

				$out .= '<div class="dt-sc-hr-invisible-xsmall"> </div>';

			endwhile;

		wp_reset_postdata();
		else:
			$out .= '<h2>'.esc_html__("Nothing Found.", "veda-event").'</h2>';
			$out .= '<p>'.esc_html__("Apologies, but no results were found for the requested archive.", "veda-event").'</p>';
		endif;

		return $out;
	}
}?>