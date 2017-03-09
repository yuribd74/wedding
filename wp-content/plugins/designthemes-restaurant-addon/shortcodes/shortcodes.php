<?php
class DTRestaurantShortcodesDefinition {

	function __construct() {

		/* Chefs */
		add_shortcode ( "dt_sc_chefs", array (
			$this,
			"dt_sc_chefs"
		) );

		/* Chefs Type2 */
		add_shortcode ( "dt_sc_chefs_type1", array (
			$this,
			"dt_sc_chefs_type1"
		) );		

		/* Chefs Type2 */
		add_shortcode ( "dt_sc_chefs_type2", array (
			$this,
			"dt_sc_chefs_type2"
		) );

		/* Restaurant Event */
		add_shortcode ( "dt_sc_res_event", array (
			$this,
			"dt_sc_res_event"
		) );

		/* Menu Items */
		add_shortcode ( "dt_sc_menu_items", array (
			$this,
			"dt_sc_menu_items"
		) );

		/* Menu List */
		add_shortcode ( "dt_sc_menu_list", array (
			$this,
			"dt_sc_menu_list"
		) );

		/* Menu List2 */
		add_shortcode ( "dt_sc_menu_list2", array (
			$this,
			"dt_sc_menu_list2"
		) );

		/* Chef Image */
		add_shortcode ( "dt_sc_chef_image", array (
			$this,
			"dt_sc_chef_image"
		) );

		/* Chef Info */
		add_shortcode ( "dt_sc_chef_info", array (
			$this,
			"dt_sc_chef_info"
		) );
	}

	/**
	 * chefs 
	 */
	function dt_sc_chefs( $attrs, $content = null ){
		extract(shortcode_atts(array(
			'type' => 'type1',
			'limit' => -1
		), $attrs));

		$out = '';

		if( $type == 'type1' ) {

			$out = '[dt_sc_chefs_type1 limit="'.$limit.'"]';

		} elseif( $type == 'type2' ) {
			$out = '[dt_sc_chefs_type2 limit="'.$limit.'"]';
		}

		return do_shortcode( $out );
	}
	
	/**
	 * chefs type1
	 * @return string
	 */
	function dt_sc_chefs_type1($attrs, $content = null) {
		extract(shortcode_atts(array(
			'limit' => -1
		), $attrs));

		$out = $temp = "";

		#Performing query...
		$args = array('post_type' => 'dt_chefs', 'posts_per_page' => $limit);
		$the_query = new WP_Query($args);
		if($the_query->have_posts()): $i = 1;
		 while($the_query->have_posts()): $the_query->the_post();

			$temp_class = "";
			$cid = get_the_ID();
			
			if($i == 1) $temp_class = " first";
			if($i == 2) $i = 1; else $i = $i + 1;

			$out .= '<div class="column dt-sc-one-half '.esc_attr($temp_class).'">';
				$out .= '<div class="dt-sc-chef">';
					$out .= '<div class="dt-sc-chef-details">';
						$out .= '<h5><a title="'.get_the_title().'" href="'.get_permalink().'">'.get_the_title().'</a></h5>';

						$chef_settings = get_post_meta($cid, '_custom_settings', true);
						$chef_settings = is_array ( $chef_settings ) ? $chef_settings : array ();

						if(array_key_exists('role', $chef_settings))
							$out .= '<p>'.esc_html($chef_settings['role']).'</p>';

						if(array_key_exists('chef_special', $chef_settings)):
							$out .= '<h6>'.esc_html__('Specialist in', 'veda-restaurant').'</h6>';
							$out .= '<div class="dt-sc-chef-category">';
								$tarray = $chef_settings['chef_special'];
								$temp = "";
								foreach($tarray as $t):
									$lnk = get_term_link((int)$t, 'menu_entries');
									$term = get_term((int)$t, 'menu_entries');
									$temp .= ' <a title="'.$term->name.'" href="'.$lnk.'">'.$term->name.'</a>,';
								endforeach;
								$out .= substr($temp, 0, strlen($temp) - 1);
							$out .= '</div>';
						endif;
						$out .= '<a href="'.get_permalink().'" title="'.get_the_title().'" class="dt-sc-button small fully-rounded-border">'.esc_html__('View Bio', 'veda-restaurant').'</a>';
					$out .= '</div>';
					$out .= '<div class="dt-sc-chef-thumb">';
						if(has_post_thumbnail()):
							$attr = array('title' => get_the_title(), 'alt' => get_the_title());
							$out .= get_the_post_thumbnail($cid, 'chef-type1', $attr);
						else:
							$out .= '<img src="http://place-hold.it/300x274" alt="'.get_the_title().'" title="'.get_the_title().'" />';
						endif;
					$out .= '</div>';
				$out .= '</div>';
			$out .= '</div>';
	
			if($i == 1) $out .= '<div class="dt-sc-hr-invisible-xsmall"> </div>';

		 endwhile;
		wp_reset_postdata();
		else:
			$out .= '<h2>'.esc_html__('Nothing Found.', 'veda-restaurant').'</h2>';
			$out .= '<p>'.esc_html__('Apologies, but no results were found for the requested archive.', 'veda-restaurant').'</p>';
		endif;

		return $out;
	}	
	
	/**
	 * chefs type2
	 * @return string
	 */
	function dt_sc_chefs_type2($attrs, $content = null) {
		extract(shortcode_atts(array(
			'limit' => -1
		), $attrs));

		$out = "";

		#Performing query...
		$args = array('post_type' => 'dt_chefs', 'posts_per_page' => $limit);
		$the_query = new WP_Query($args);
		if($the_query->have_posts()): $i = 1;
		 while($the_query->have_posts()): $the_query->the_post();

			$temp_class = "";

			if($i == 1) $temp_class = " first";
			if($i == 4) $i = 1; else $i = $i + 1;

			$out .= '<div class="column dt-sc-one-fourth '.esc_attr($temp_class).'">';
				$out .= '<div class="dt-sc-team hide-social-show-on-hover rounded">';
					$out .= '<div class="dt-sc-team-thumb">';
						if(has_post_thumbnail()):
							$attr = array('title' => get_the_title(), 'alt' => get_the_title());
							$out .= get_the_post_thumbnail(get_the_ID(), 'chef-type2', $attr);
						else:
							$out .= '<img src="http://place-hold.it/420x420" alt="'.get_the_title().'" title="'.get_the_title().'" />';
						endif;
					$out .= '</div>';
					$out .= '<div class="dt-sc-team-details">';
						$out .= '<h4>'.get_the_title().'</h4>';

						$chef_settings = get_post_meta(get_the_ID(), '_custom_settings', true);
						$chef_settings = is_array ( $chef_settings ) ? $chef_settings : array ();

						if(array_key_exists('role', $chef_settings))
							$out .= '<h5>'.esc_html($chef_settings['role']).'</h5>';

						if(array_key_exists('social', $chef_settings)) $out .= do_shortcode($chef_settings['social']);
					$out .= '</div>';
				$out .= '</div>';
			$out .= '</div>';
			
			if($i == 1) $out .= '<div class="dt-sc-hr-invisible-small"> </div>';

		 endwhile;
		wp_reset_postdata();
		else:
			$out .= '<h2>'.esc_html__('Nothing Found.', 'veda-restaurant').'</h2>';
			$out .= '<p>'.esc_html__('Apologies, but no results were found for the requested archive.', 'veda-restaurant').'</p>';
		endif;

		return $out;
	}	
	
	/**
	 * restaurant event
	 * @return string
	 */
	function dt_sc_res_event($attrs, $content = null) {
		extract ( shortcode_atts ( array (
			'date' => '',
			'title' => '',
			'image' => '',
			'link' => '',
		), $attrs ) );

		$image = wpb_getImageBySize( array( 'attach_id' => $image, 'thumb_size' => 'full' ));
		$image = $image['thumbnail'];

		$link = ( '||' === $link ) ? '' : $link;
		$link = vc_build_link( $link );
		$a_href = esc_url($link['url']);
		$a_title = esc_attr($link['title']);
		$a_target = esc_attr($link['target']);

		$out = '<div class="dt-sc-restaurant-events-list">';
			$out .= '<div class="dt-sc-restaurant-event-details">';
				$out .= '<p>'.esc_html($date).'</p>';
				$out .= '<h6>'.esc_html($title).'</h6>';
			$out .= '</div>';
			$out .= '<div class="dt-sc-restaurant-event-image">';
				$out .= veda_wp_kses($image);
				if( !empty( $a_href ) )
					$out .= "<a class='dt-sc-button medium filled fully-rounded' target='{$a_target}' title='{$a_title}' href='{$a_href}'>{$a_title}</a>";
			$out .= '</div>';			
		$out .= '</div>';

		return $out;
	}

	/**
	 * menu items
	 * @return string
	 */
	function dt_sc_menu_items($attrs, $content = null) {
		extract(shortcode_atts(array(
			'limit' => -1,
			'categories' => '',
			'style' => '',
			'show_meta' => 'yes'
		), $attrs));

		global $post;
		$out = "";

		if(empty($categories)) {
			$cats = get_categories('taxonomy=menu_entries&hide_empty=1');
			$cats = get_terms( array('menu_entries'), array('fields' => 'ids'));		
		} else {
			$cats = explode(',', $categories);
		}

		#Performing query...
		$args = array('post_type' => 'dt_menus', 'posts_per_page' => $limit,'tax_query' => array( array( 'taxonomy' => 'menu_entries', 'field' => 'id', 'terms' => $cats ) ) );
		$the_query = new WP_Query($args);
		if($the_query->have_posts()): $i = 1;
		 while($the_query->have_posts()): $the_query->the_post();

			$temp_class = "";

			if($i == 1) $temp_class = " first";
			if($i == 2) $i = 1; else $i = $i + 1;

			$out .= "<div class='dt-sc-menu type2 ".esc_attr($style)."'>";

				$menu_settings = get_post_meta($post->ID, '_custom_settings', true);
				$menu_settings = is_array ( $menu_settings ) ? $menu_settings : array ();

				if(has_post_thumbnail() && $style != 'no-menu-thumb'):
					$out .= '<figure>';
						$attr = array('title' => get_the_title(), 'alt' => get_the_title());
						$out .= get_the_post_thumbnail($post->ID, 'full', $attr);
						if(array_key_exists('veg_type', $menu_settings)):
							$vtype = $menu_settings['veg_type'];
							if($vtype == 'veg')
								$out .= '<div class="dt-sc-menu-variety"><span>'.esc_html__('Vegetarian', 'veda-restaurant').'</span></div>';
							elseif($vtype == 'non-veg')
								$out .= '<div class="dt-sc-menu-variety non-veg"><span>'.esc_html__('Non-Veg', 'veda-restaurant').'</span></div>';
						endif;
					$out .= '</figure>';
				endif;

				$out .= '<div class="dt-sc-menu-details">';
					$out .= '<h6>'.get_the_title().'</h6>';
					if(array_key_exists('price', $menu_settings))
						$out .= '<span class="dt-sc-menu-price">'.esc_html($menu_settings['price']).'</span>';
					if(array_key_exists('details', $menu_settings))
						$out .= '<p>'.esc_html($menu_settings['details']).'</p>';
					if( array_key_exists('meta_title', $menu_settings) &&  $show_meta == 'yes'):
						foreach( $menu_settings['meta_title'] as $key => $title ):
							$value = $menu_settings['meta_value'][$key];
							if( !empty($value) ):
								$out .= '<p><strong>'.esc_html($title).':</strong> '.esc_html($value).'';
							endif;
						endforeach;
					endif;
				$out .= '</div>';
			$out .= '</div>';

			$out .= '<div class="dt-sc-hr-top-10"> </div>';

		 endwhile;
		wp_reset_postdata();
		else:
			$out .= '<h2>'.esc_html__('Nothing Found.', 'veda-restaurant').'</h2>';
			$out .= '<p>'.esc_html__('Apologies, but no results were found for the requested archive.', 'veda-restaurant').'</p>';
		endif;

		return $out;
	}

	/**
	 * menu list
	 * @return string
	 */
	function dt_sc_menu_list($attrs, $content = null) {
		extract(shortcode_atts(array(
			'limit' => -1,
			'categories' => '',
			'posts_column' => 'one-half-column', // one-third-column
			'filter' => 'yes',
			'show_filter_image' => 'yes',
			'menu_style' => 'round-thumb'
		), $attrs));

		$out = "";
		$post_layout = $posts_column;
		$div_class = "";

		#Post layout check...
		switch($post_layout) {
			case "one-half-column":
				$div_class = "dt-sc-menu type2 dt-sc-one-half column"; break;
	
			case "one-third-column":
				$div_class = "dt-sc-menu type2 dt-sc-one-third column"; break;
		}

		#Menu style check...
		switch($menu_style) {
			case "square-thumb":
				$div_class .= " menu-with-square-image"; break;

			case "no-thumb":
				$div_class .= " no-menu-thumb"; break;

			case "round-thumb":
			default:
				$div_class .= "";
		}

		if(empty($categories)) {
			$cats = get_categories('taxonomy=menu_entries&hide_empty=1');
			$cats = get_terms( array('menu_entries'), array('fields' => 'ids'));
		} else {
			$cats = explode(',', $categories);
		}

		if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
		elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
		else { $paged = 1; }

		#Performing query...
		$args = array('post_type' => 'dt_menus', 'paged' => $paged , 'posts_per_page' => $limit,
																					   'tax_query' => array( 
																							array( 
																									'taxonomy' => 'menu_entries', 
																									'field' => 'id', 
																									'terms' => $cats
																							)));
		$the_query = new WP_Query($args);
		if($the_query->have_posts()):

			if($filter != "no"):
				$out .= '<div class="dt-sc-menu-sorting type2">';
					foreach($cats as $term) {
						$myterm = get_term_by('id', $term, 'menu_entries');
						$out .= '<a href="#" title="'.esc_attr($myterm->name).'" data-filter=".'.esc_attr(strtolower($myterm->slug)).'">';
							if($show_filter_image != "no"):
								$t_id = $myterm->term_id;
								$term_meta = get_option( "taxonomy_term_$t_id" );
								$v = isset($term_meta['thumb']) ? $term_meta['thumb'] : '';
								$out .= '<span class="dt-sc-menu-sorting-image"> <img alt="'.esc_attr($myterm->name).'" src="'.esc_url($v).'"> </span>';
							endif;
							$out .= '<span>'.esc_html($myterm->name).'</span>';
						$out .= '</a>';
					}
				$out .= '</div>';
			endif;

			$out .= '<div class="dt-sc-menu-container">';
				while($the_query->have_posts()): $the_query->the_post();
					$PID = get_the_ID();
					$terms = wp_get_post_terms($PID, 'menu_entries', array("fields" => "slugs"));

					$t_class = '';
					if(!has_post_thumbnail()) $t_class .= ' no-menu-thumb';
					
					$f_class = $div_class." ".strtolower(implode(" ", $terms)).$t_class;

					$out .= '<div class="'.esc_attr($f_class).'">';

						$menu_settings = get_post_meta($PID, '_custom_settings', true);
						$menu_settings = is_array ( $menu_settings ) ? $menu_settings : array ();

						if(has_post_thumbnail() && $menu_style != 'no-thumb'):
							$out .= '<figure>';
								$attr = array('title' => get_the_title(), 'alt' => get_the_title());
								$out .= get_the_post_thumbnail($PID, 'menu-type2', $attr);
								if(array_key_exists('veg_type', $menu_settings)):
									$vtype = $menu_settings['veg_type'];
									if($vtype == 'veg')
										$out .= '<div class="dt-sc-menu-variety"><span>'.esc_html__('Vegetarian', 'veda-restaurant').'</span></div>';
									elseif($vtype == 'non-veg')
										$out .= '<div class="dt-sc-menu-variety non-veg"><span>'.esc_html__('Non-Veg', 'veda-restaurant').'</span></div>';
								endif;
							$out .= '</figure>';
						endif;

						$out .= '<div class="dt-sc-menu-details">';
							$out .= '<h6>'.get_the_title().'</h6>';
							if(array_key_exists('price', $menu_settings))
								$out .= '<span class="dt-sc-menu-price">'.esc_html($menu_settings['price']).'</span>';
							if(array_key_exists('details', $menu_settings))
								$out .= '<p>'.esc_html($menu_settings['details']).'</p>';
						$out .= '</div>';

					$out .= '</div>';
				endwhile;
			$out .= '</div>';
		wp_reset_postdata();
		else:
			$out .= '<h2>'.esc_html__("Nothing Found.", "veda-restaurant").'</h2>';
			$out .= '<p>'.esc_html__("Apologies, but no results were found for the requested archive.", "veda-restaurant").'</p>';
		endif;

		return $out;
	}

	/**
	 * menu list2
	 * @return string
	 */
	function dt_sc_menu_list2($attrs, $content = null) {
		extract(shortcode_atts(array(
			'limit' => -1,
			'categories' => '',
			'filter' => 'yes',
			'show_filter_image' => 'yes'
		), $attrs));

		$out = "";

		if(empty($categories)) {
			$cats = get_categories('taxonomy=menu_entries&hide_empty=1');
			$cats = get_terms( array('menu_entries'), array('fields' => 'ids'));
		} else {
			$cats = explode(',', $categories);
		}

		if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
		elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
		else { $paged = 1; }

		#Performing query...
		$args = array('post_type' => 'dt_menus', 'paged' => $paged , 'posts_per_page' => $limit,
		
																					   'tax_query' => array( 
																							array( 
																									'taxonomy' => 'menu_entries', 
																									'field' => 'id', 
																									'terms' => $cats
																							)));
		$the_query = new WP_Query($args);
		if($the_query->have_posts()):

			if($filter != "no"):
				$out .= '<div class="dt-sc-menu-sorting">';
					foreach($cats as $term) {
						$myterm = get_term_by('id', $term, 'menu_entries');
						$out .= '<a href="#" title="'.esc_attr($myterm->name).'" data-filter=".'.esc_attr(strtolower($myterm->slug)).'">';
							if($show_filter_image != "no"):
								$t_id = $myterm->term_id;
								$term_meta = get_option( "taxonomy_term_$t_id" );
								$v = isset($term_meta['thumb']) ? $term_meta['thumb'] : '';
								$out .= '<img alt="'.esc_attr($myterm->name).'" src="'.esc_url($v).'">';
							endif;
							$out .= '<span>'.esc_html($myterm->name).'</span>';
						$out .= '</a>';
					}
				$out .= '</div>';
			endif;

			$out .= '<div class="dt-sc-menu-container">'; $i = 1;
				while($the_query->have_posts()): $the_query->the_post();
					$PID = get_the_ID();
					$terms = wp_get_post_terms($PID, 'menu_entries', array("fields" => "slugs"));

					$out .= '<div class="dt-sc-one-half dt-sc-menu column '.esc_attr( strtolower(implode(" ", $terms)) ).'">';

						$menu_settings = get_post_meta($PID, '_custom_settings', true);
						$menu_settings = is_array ( $menu_settings ) ? $menu_settings : array ();

						$out .= '<figure>';
							if(has_post_thumbnail()):
								$attr = array('title' => get_the_title(), 'alt' => get_the_title());
								$out .= get_the_post_thumbnail($PID, 'full', $attr);
							else:
								$out .= '<img src="http://place-hold.it/574x262" alt="'.get_the_title().'" title="'.get_the_title().'" />';
							endif;

							$out .= '<div class="image-overlay-wrapper">';
								$out .= '<div class="image-overlay">';
									$out .= '<h6>'.get_the_title().'</h6>';
									if(array_key_exists('details', $menu_settings))
										$out .= '<p>'.esc_html($menu_settings['details']).'</p>';
									$out .= get_the_term_list( $PID, 'menu_entries', '<div class="menu-categories">', '', '</div>' );
									if(array_key_exists('price', $menu_settings))
										$out .= '<span class="price">'.esc_html($menu_settings['price']).'</span>';
								$out .= '</div>';
							$out .= '</div>';
						$out .= '</figure>';

					$out .= '</div>';
				endwhile;
			$out .= '</div>';
		wp_reset_postdata();
		else:
			$out .= '<h2>'.esc_html__("Nothing Found.", "veda-restaurant").'</h2>';
			$out .= '<p>'.esc_html__("Apologies, but no results were found for the requested archive.", "veda-restaurant").'</p>';
		endif;

		return $out;
	}

	/**
	 * chef image
	 * @return string
	 */
	function dt_sc_chef_image($attrs, $content = null) {

		global $post;
		$out = "";

		$out = '<div class="dt-sc-chef-single-image">';
			if(has_post_thumbnail()):
				$attr = array('title' => get_the_title(), 'alt' => get_the_title());
				$out .= get_the_post_thumbnail($post->ID, 'full', $attr);
			else:
				$out .= '<img src="http://place-hold.it/470x552" alt="'.get_the_title().'" title="'.get_the_title().'" />';
			endif;
			$out .= '<div class="dt-sc-chef-single-image-overlay">';
				$chef_settings = get_post_meta($post->ID, '_custom_settings', true);
				$chef_settings = is_array ( $chef_settings ) ? $chef_settings : array ();
				if(array_key_exists('chef_special', $chef_settings)):			
					$out .= '<div class="dt-sc-chef-single-special">';
						$out .= '<h6>'.esc_html__('Specialist in', 'veda-restaurant').'</h6>';
						$out .= '<p>';
							$tarray = $chef_settings['chef_special'];
							$temp = "";
							foreach($tarray as $t):
								$lnk = get_term_link((int)$t, 'menu_entries');
								$term = get_term((int)$t, 'menu_entries');
								$temp .= '<a title="'.esc_attr($term->name).'" href="'.esc_url($lnk).'">'.esc_html($term->name).'</a>';
							endforeach;
							$out .= $temp;
					$out .= '</div>';
				endif;
				if(array_key_exists('social', $chef_settings)):
					$social = do_shortcode( $chef_settings['social'] );	
					$social = str_replace('dt-sc-team-social', 'dt-sc-sociable', $social);
					$out .= $social;
				endif;	
			$out .= '</div>';
		$out .= '</div>';
		
		return $out;
	}

	/**
	 * chef info
	 * @return string
	 */
	function dt_sc_chef_info($attrs, $content = null) {
		extract(shortcode_atts(array(
			'meta' => 'yes'
		), $attrs));

		global $post;
		$postID = $post->ID;
		$out = "";

		$out = '<div class="dt-sc-chef-single-details">';
			$out .= '<h3>'.get_the_title($postID).'</h3>';

			$chef_settings = get_post_meta($postID, '_custom_settings', true);
			$chef_settings = is_array ( $chef_settings ) ? $chef_settings : array ();

			if(array_key_exists('role', $chef_settings))
				$out .= '<p class="chef-role"> <strong>'.esc_html($chef_settings['role']).'</strong> </p>';

			if(array_key_exists('work', $chef_settings)):
				$out .= '<div class="dt-sc-hr-invisible-xsmall"> </div>';
				$out .= '<h3>'.esc_html__('WORK &amp; EDUCATION', 'veda-restaurant').'</h3>';
				$out .= '<p class="chef-work">'.do_shortcode($chef_settings['work']).'</p>';
			endif;

			if( array_key_exists('meta_title', $chef_settings) && $meta != 'no' ):
				$out .= '<div class="dt-sc-hr-invisible-xsmall"> </div>';
				foreach( $chef_settings['meta_title'] as $key => $title ):
					$value = $chef_settings['meta_value'][$key];
					if( !empty($value) ):
						$out .= '<h6>'.esc_html($title).'</h6>';
						$out .= '<p>'.esc_html($value).'</p>';
					endif;
				endforeach;
			endif;

			if(array_key_exists('chef_likes', $chef_settings)):
				$out .= '<div class="dt-sc-hr-invisible-xsmall"> </div>';
				$out .= '<h3>'.esc_html__('MY LIKES', 'veda-restaurant').'</h3>';
				$tarray = $chef_settings['chef_likes'];
				$temp = "";
				foreach($tarray as $t):
					$out .= '<div class="dt-sc-chef-single-likes">';
						$out .= '<h6>'.get_the_title($t).'</h6>';
						$out .= get_the_term_list( $t, 'menu_entries', "<p>", ' / ', '</p>' );
					$out .= '</div>';
				endforeach;
			endif;
		$out .= '</div>';

		return $out;
	}

}?>