<?php
class DTCoreShortcodesDefination {
	
	function __construct() {

		/* Tabs Shortcode */
		add_shortcode ( "dt_sc_tabs", array (
			$this,
			"dt_sc_tabs"
		) );
		
		/* Tab Content for VC */
		add_shortcode("dt_sc_tab", array(
			$this,
			'dt_sc_tab'
		) );

		/* Accordion Shortcode */
		add_shortcode ( "dt_sc_accordion", array (
			$this,
			"dt_sc_accordion"
		) );

		/* Toggle Shortcode */
		add_shortcode ( "dt_sc_toggle", array (
			$this,
			"dt_sc_toggle"
		) );

		/* Toggle Framed Shortcode */
		add_shortcode ( "dt_sc_toggle_framed", array (
			$this,
			"dt_sc_toggle_framed"
		) );

		/* Toggle Group Shortcode */
		add_shortcode ( "dt_sc_toggle_group", array (
			$this,
			"dt_sc_toggle_group"
		) );

		/* Separator */
		add_shortcode("dt_sc_separator", array(
			$this,
			"dt_sc_separator"
		) );

		/* Alignment */
		add_shortcode ( "dt_sc_align", array (
			$this,
			"dt_sc_align"
		) );

		/* Any Class & Styles */
		add_shortcode ( "dt_sc_anyclass_style", array (
			$this,
			"dt_sc_anyclass_style"
		) );

		/* Button */
		add_shortcode ( "dt_sc_button", array (
			$this,
			"dt_sc_button"
		) );

		/* Titled Box Shortcode */
		add_shortcode ( "dt_sc_titled_box", array (
			$this,
			"dt_sc_titled_box"
		) );

		/* Donutchart */
		add_shortcode ( "dt_sc_donutchart", array (
			$this,
			"dt_sc_donutchart"
		) );

		/* Progress Bar Shortcode */
		add_shortcode ( "dt_sc_progress_bar", array (
			$this,
			"dt_sc_progress_bar"
		) );

		/* Pricing Table Item */
		add_shortcode ( "dt_sc_pricing_table_item", array (
			$this,
			"dt_sc_pricing_table_item"
		) );

		/* Pricing Table Minimal Item */
		add_shortcode ( "dt_sc_pricing_table_minimal_item", array (
			$this,
			"dt_sc_pricing_table_minimal_item"
		) );

		/* Pricing Table Type2 Item */
		add_shortcode ( "dt_sc_pricing_table_type2_item", array (
			$this,
			"dt_sc_pricing_table_type2_item"
		) );

		/* Icon Box */
		add_shortcode ( "dt_sc_iconbox", array (
			$this,
			"dt_sc_iconbox"
		) );

		/* Dropcap */
		add_shortcode ( "dt_sc_dropcap", array (
			$this,
			"dt_sc_dropcap"
		) );

		/* Blockquote */
		add_shortcode ( "dt_sc_blockquote", array (
			$this,
			"dt_sc_blockquote"
		) );

		/* Colored Button Shortcode */
		add_shortcode ( "dt_sc_colored_button", array (
			$this,
			"dt_sc_colored_button"
		) );

		/* Ordered List Shortcode */
		add_shortcode ( "dt_sc_fancy_ol", array (
			$this,
			"dt_sc_fancy_ol"
		) );

		/* Unordered List Shortcode */
		add_shortcode ( "dt_sc_fancy_ul", array (
			$this,
			"dt_sc_fancy_ul"
		) );

		/* Tooltip Shortcode */
		add_shortcode ( "dt_sc_tooltip", array (
			$this,
			"dt_sc_tooltip"
		) );

		/* Simple Heading */																					
		add_shortcode( "dt_sc_simple_heading", array(
			$this,
			"dt_sc_simple_heading"
		) );

		/* Horizontal Invisible */
		add_shortcode ( "dt_sc_hr_invisible", array (
			$this,
			"dt_sc_hr_invisible"
		) );

		/* Horizontal Top */
		add_shortcode ( "dt_sc_hr_top", array (
			$this,
			"dt_sc_hr_top"
		) );

		/* Horizontal Custom */
		add_shortcode ( "dt_sc_hr_custom", array (
			$this,
			"dt_sc_hr_custom"
		) );
		
		/* Horizontal SVG */
		add_shortcode ( "dt_sc_hr_svg", array (
			$this,
			"dt_sc_hr_svg"
		) );

		/* Phone No */
		add_shortcode ( "dt_sc_phone_no", array (
			$this,
			"dt_sc_phone_no"
		) );

		/* Email Address */
		add_shortcode ( "dt_sc_email", array (
			$this,
			"dt_sc_email"
		) );
		
		/* URL */
		add_shortcode ( "dt_sc_url", array (
			$this,
			"dt_sc_url"
		) );

		/* Search Form */
		add_shortcode ( "dt_sc_search_form", array (
			$this,
			"dt_sc_search_form"
		) );

		/* Woo Cart */
		add_shortcode ( "dt_sc_woo_cart", array (
			$this,
			"dt_sc_woo_cart"
		) );

		/* Icon */
		add_shortcode ( "dt_sc_icon", array (
			$this,
			"dt_sc_icon"
		) );

		/* Image */
		add_shortcode ( "dt_sc_image", array (
			$this,
			"dt_sc_image"
		) );

		/* Unique */

		/* Contact Info Shortcode */
		add_shortcode ( "dt_sc_contact_info", array (
			$this,
			"dt_sc_contact_info"
		) );

		/* Number Count Shortcode */
		add_shortcode ( "dt_sc_number_counter", array (
			$this,
			"dt_sc_number_counter"
		) );

		/* Image Caption Shortcode */
		add_shortcode ( "dt_sc_image_caption", array (
			$this,
			"dt_sc_image_caption"
		) );

		/* Image Flip Shortcode */
		add_shortcode ( "dt_sc_image_flip", array (
			$this,
			"dt_sc_image_flip"
		) );

		/* Event caption */
		add_shortcode ( "dt_sc_event_caption", array (
			$this,
			"dt_sc_event_caption"
		) );

		/* event contact info */
		add_shortcode ( "dt_sc_event_contact_info", array (
			$this,
			"dt_sc_event_contact_info"
		) );

		/* Mailchimp Newsletter */
		add_shortcode ( "dt_sc_mc_newsletter", array (
			$this,
			"dt_sc_mc_newsletter"
		) );

		/* Team Shortcode */
		add_shortcode ( "dt_sc_team", array (
			$this,
			"dt_sc_team"
		) );

		/* Speakers Shortcode */
		add_shortcode ( "dt_sc_speaker", array (
			$this,
			"dt_sc_speaker"
		) );

		/* Testimonial Individual */
		add_shortcode ( "dt_sc_testimonial", array (
			$this,
			"dt_sc_testimonial"
		) );

		/* Testimonial Carousel Wrapper */
		add_shortcode ( "dt_sc_tm_carousel_wrapper", array (
			$this,
			"dt_sc_tm_carousel_wrapper"
		) );

		/* Fullwidth Testimonial Carousel Wrapper */
		add_shortcode ( "dt_sc_fw_tm_wrapper", array (
			$this,
			"dt_sc_fw_tm_wrapper"
		) );
		
		/* Testimonial Carousel Item */
		add_shortcode ( "dt_sc_tm_carousel_item", array (
			$this,
			"dt_sc_tm_carousel_item"
		) );
		
		/* Partners Carousel */
		add_shortcode ( "dt_sc_partners_carousel", array (
			$this,
			"dt_sc_partners_carousel"
		) );

		/* Images Carousel */
		add_shortcode ( "dt_sc_images_carousel", array (
			$this,
			"dt_sc_images_carousel"
		) );

		/* Hexagon Wrapper */
		add_shortcode ( "dt_sc_hexagon_wrapper", array (
			$this,
			"dt_sc_hexagon_wrapper"
		) );

		/* Hexagon Item */
		add_shortcode ( "dt_sc_hexagon_item", array (
			$this,
			"dt_sc_hexagon_item"
		) );

		/* Hexagon single item */
		add_shortcode("dt_sc_single_hexagon", array(
			$this,
			"dt_sc_single_hexagon"
		) );

		/* Twitter Tweets */
		add_shortcode ( "dt_sc_twitter_tweets", array (
			$this,
			"dt_sc_twitter_tweets"
		) );

		/* triangle wrapper */
		add_shortcode ( "dt_sc_triangle_wrapper", array (
			$this,
			"dt_sc_triangle_wrapper"
		) );

		/* popular content */
		add_shortcode ( "dt_sc_popular_content", array (
			$this,
			"dt_sc_popular_content"
		) );

		/* Domain wrapper*/
		add_shortcode ( "dt_sc_domains_wrapper", array (
			$this,
			"dt_sc_domains_wrapper"
		));

		add_shortcode ( "dt_sc_domain_box", array (
			$this,
			"dt_sc_domain_box"
		));

		/* Single Post */
		add_shortcode("dt_sc_post", array(
			$this,
			"dt_sc_post"
		) );

		/* Recent Post */
		add_shortcode("dt_sc_recent_post", array(
			$this,
			"dt_sc_recent_post"
		) );

		/* Recent Post by Category */
		add_shortcode("dt_sc_recent_cat_post", array(
			$this,
			"dt_sc_recent_post"
		) );

		/* Latest News */
		add_shortcode("dt_sc_latest_news", array(
			$this,
			"dt_sc_latest_news"
		) );

		/* Related Post */
		add_shortcode("dt_sc_blog_related_post", array(
			$this,
			"dt_sc_blog_related_post"
		) );		

		/* Single Portfolio Item */
		add_shortcode("dt_sc_portfolio_item", array(
			$this,
			"dt_sc_portfolio_item"
		) );

		/* Related Portfolio */
		add_shortcode("dt_sc_portfolio_related_post", array(
			$this,
			"dt_sc_portfolio_related_post"
		) );						

		add_shortcode("dt_sc_portfolios", array(
			$this,
			"dt_sc_portfolios"
		) );

		add_shortcode("dt_sc_infinite_portfolios", array(
			$this,
			"dt_sc_infinite_portfolios"
		) );

		add_action( 'wp_ajax_dt_ajax_infinite_portfolios', array( $this, 'dt_ajax_infinite_portfolios' ) );

		add_action( 'wp_ajax_nopriv_dt_ajax_infinite_portfolios', array( $this, 'dt_ajax_infinite_portfolios' ) );		

		/* Tribe event lists*/
		add_shortcode ( "dt_sc_events_list", array (
			$this,
			"dt_sc_events_list"
		));

		add_shortcode( "dt_sc_special_events_list", array(
			$this,
			"dt_sc_special_events_list"
		) );		

		/* Map Overlay */
		add_shortcode ( "dt_sc_map_overlay", array (
			$this,
			"dt_sc_map_overlay"
		));

		add_shortcode ( "dt_sc_map", array (
			$this,
			"dt_sc_map"
		));		

		/* Coming Soon */
		add_shortcode ( "dt_sc_down_count", array (
			$this,
			"dt_sc_down_count"
		));

		/* Horizontal Timeline */
		add_shortcode( "dt_sc_horizontal_timeline", array(
			$this,
			"dt_sc_horizontal_timeline"
		) );

		/* Horizontal Timeline Entry */
		add_shortcode( "dt_sc_hr_timeline_entry", array(
			$this,
			"dt_sc_hr_timeline_entry"
		) );

		/* Vertical Timeline */
		add_shortcode( "dt_sc_vertical_timeline", array(
			$this,
			"dt_sc_vertical_timeline"
		) );

		/* Vertical Timeline Entry */
		add_shortcode( "dt_sc_vc_timeline_entry", array(
			$this,
			"dt_sc_vc_timeline_entry"
		) );

		/* BR Tag */
		add_shortcode ( "dt_sc_br", array (
			$this,
			"dt_sc_br"
		) );

		/* Custom Menu */
		add_shortcode ( "dt_sc_custom_menu", array (
			$this,
			"dt_sc_custom_menu"
		) );

		/* Sociable : From admin options panel */
		add_shortcode ( "dt_sc_sociable", array (
			$this,
			"dt_sc_sociable"
		) );

		/* Social Shortcode */
		add_shortcode ( "dt_sc_social", array (
			$this,
			"dt_sc_social"
		) );
		
		/* Video Manager */
		add_shortcode ( "dt_sc_video_manager", array (
			$this,
			"dt_sc_video_manager"
		) );

		/* Video Manager */
		add_shortcode ( "dt_sc_video_item", array (
			$this,
			"dt_sc_video_item"
		) );

		/* Video Manager */
		add_shortcode ( "dt_sc_video_first_item", array (
			$this,
			"dt_sc_video_first_item"
		) );
		
		/* VC Grid Template Variables */
		add_shortcode('dt_sc_gitem_post_format', array(
			$this,
			'dt_sc_gitem_post_format'
		) );

		add_shortcode('dt_sc_gitem_post_tag', array(
			$this,
			'dt_sc_gitem_post_tag'
		) );

		add_shortcode('dt_sc_gitem_post_comment', array(
			$this,
			'dt_sc_gitem_post_comment'
		) );

		add_shortcode( 'dt_sc_gitem_post_category', array(
			$this,
			'dt_sc_gitem_post_category'
		) );		
	}

	/**
	 *
	 * @param string $content
	 * @return string
	 */
	static function dtShortcodeHelper($content = null) {
		$content = do_shortcode ( shortcode_unautop ( $content ) );
		$content = preg_replace ( '#^<\/p>|^<br \/>|<p>$#', '', $content );
		$content = preg_replace ( '#<br \/>#', '', $content );
		return trim ( $content );
	}

	/**
	 * tabs wrapper
	 * @return string
	 */
	function dt_sc_tabs($attrs, $content = null) {
		extract ( shortcode_atts ( array (
				'type' => 'horizontal',
				'style' => 'default',
				'class' => '' 
		), $attrs ) );
		
		preg_match_all( '/dt_sc_tab([^\]]+)/i', $content, $matches, PREG_OFFSET_CAPTURE );
		$tab_titles = array();
		if ( isset( $matches[1] ) ) {
			$tab_titles = $matches[1];
		}
		
		$tabs_nav = '';
		if($style == 'default')
			$tabs_nav .= "<ul class='dt-sc-tabs-{$type}'>";
		else
			$tabs_nav .= "<ul class='dt-sc-tabs-{$type}-frame'>";
			
			foreach ( $tab_titles as $tab ) {
				
				$tab_atts = shortcode_parse_atts( $tab[0] );

				$icon = "";

				if( isset($tab_atts['icon_type']) && $tab_atts['icon_type'] === 'fontawesome' ) {
					$icon = isset( $tab_atts['icon'] ) ? $tab_atts['icon'] : '';
				} elseif( isset($tab_atts['icon_type']) && $tab_atts['icon_type'] === 'custom' ){
					$icon = isset( $tab_atts['icon_class'] ) ? $tab_atts['icon_class'] : '';
				}

				$icon = !empty( $icon ) ? "<span class='".$icon."'></span>" : "";
				$subtitle = !empty( $tab_atts['sub_title'] ) ? DTCoreShortcodesDefination::dtShortcodeHelper ( $tab_atts['sub_title'] ) : '';

				$tabs_nav .= '<li><a href="javascript:void(0);">'.$icon.$tab_atts['title'].'</a>'.$subtitle.'</li>';
			}
			
			$tabs_nav .= '</ul>';

		if($style != 'default') $style = '-frame';
		else $style = '';
		
		$a = '[dt_sc_tab class="dt-sc-tabs-'.$type.$style.'-content" ';
		$content = str_replace( '[dt_sc_tab',$a, $content);
		$out = do_shortcode( $content );
		
		return "<div class='dt-sc-tabs-{$type}{$style}-container {$class}'>{$tabs_nav}{$out}</div>";		
	}
	
	#For VC fix
	function dt_sc_tab( $attrs, $content = null ){
		extract ( shortcode_atts ( array (
				'class' => '' 
		), $attrs ) );	
		
		$content = do_shortcode( $content );
		
		return "<div class='$class'>".$content."</div>";	
	}

	/**
	 * toggle
	 * @return string
	 */
	function dt_sc_toggle($attrs, $content = null) {
		extract ( shortcode_atts ( array (
			'title' => '' 
		), $attrs ) );

		$out = "<h5 class='dt-sc-toggle'><a href='#'>{$title}</a></h5>";
		$out .= '<div class="dt-sc-toggle-content" style="display: none;">';
		$out .= '<div class="block">';
		$out .= DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
		$out .= '</div>';
		$out .= '</div>';
		return $out;
	}

	/**
	 * toggle framed
	 * @return string
	 */
	function dt_sc_toggle_framed($attrs, $content = null) {
		extract ( shortcode_atts ( array (
			'title' => '' 
		), $attrs ) );
		
		$out = '<div class="dt-sc-toggle-frame">';
		$out .= "	<h5 class='dt-sc-toggle'><a href='#'>{$title}</a></h5>";
		$out .= '	<div class="dt-sc-toggle-content" style="display: none;">';
		$out .= '		<div class="block">';
		$out .= DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
		$out .= '		</div>';
		$out .= '	</div>';
		$out .= '</div>';
		return $out;
	}

	/**
	 * toggle group
	 * @return string
	 */
	function dt_sc_toggle_group($attrs, $content = null) {
		extract ( shortcode_atts ( array (
			'class' => '',
			'style' => 'default', #VC
			'type' => '', #VC
		), $attrs ) );
				
		
		if( $style == 'frame' ){
			
			$content = str_replace("dt_sc_toggle","dt_sc_toggle_framed", $content );
		}
		
		$out = DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
		
		$out = "<div class='dt-sc-toggle-group-set {$type} {$class}'>{$out}</div>";
		return $out;
	}

	/**
	 * accordion group
	 * @return string
	 */
	function dt_sc_accordion($attrs, $content = null) {
		extract ( shortcode_atts ( array (
			'class' => '' ,
			'style' => 'default', #VC
			'default_accordion_type' => '', #VC
			'framed_accordion_type' => '', #VC
		), $attrs ) );
		
		
		if( $style == 'frame' ){
			
			$content = str_replace("dt_sc_accordion_tab","dt_sc_toggle_framed", $content );
			$type = $framed_accordion_type;
		} else {

			$content = str_replace("dt_sc_accordion_tab","dt_sc_toggle", $content );
			$type = $default_accordion_type;			
		}

		$out = DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
		
		$out = str_replace ( "<h5 class='dt-sc-toggle", "<h5 class='dt-sc-toggle-accordion ", $out );
		$out = "<div class='dt-sc-toggle-frame-set {$type} {$class}'>{$out}</div>";
		return $out;
	}

	function dt_sc_separator($attrs, $content = null) {
		extract ( shortcode_atts ( array (
			'style' => 'horizontal',
			'horizontal_type' => 'small',
			'vertical_type' => 'small',
			'class' => ''
		), $attrs ) );

		$separator = "";

		if( $style == 'horizontal' ) {
			$separator = $horizontal_type;

		} else if( $style == 'vertical' ){

			$vertical_type = ( $vertical_type == 'small' ) ? '-small' : '';

			$separator = 'vertical'.$vertical_type;
		}

		$out = "<div class='dt-sc-{$separator}-separator {$class}'></div>";
		return $out;
	}

	/**
	 * anyclass style
	 * @return string
	 */
	function dt_sc_anyclass_style($attrs, $content = null) {
		extract ( shortcode_atts ( array (
			'class' => '',
			'styles' => ''
		), $attrs ) );

		$styles = !empty($styles) ? "style='{$styles}'" : '';

		$out = "<div class='{$class}' {$styles}>";
			$out .= DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
		$out .= "</div>";

		return $out;
	}

	/**
	 * alignment
	 * @return string
	 */
	function dt_sc_align($attrs, $content = null) {
		
		extract ( shortcode_atts ( array (
			'align' => 'center',
			'class' => '',
			'styles' => '',
			'css' => '' #VC
		), $attrs ) );
		
		$css = vc_shortcode_custom_css_class($css); # VC		
		
		$styles = !empty($styles) ? "style='{$styles}'" : '';		

		$out = "<div class='align{$align} {$css} {$class}' {$styles}>";
			$out .= DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
		$out .= "</div>";

		return $out;
	}	

	/**
	 * button
	 * @return string
	 */
	function dt_sc_button($attrs, $content = null) {
		extract ( shortcode_atts ( array (
			'title' => 'Text on the button', #VC
			'link' => '',
			'size' => 'small',
			'style' => '', #'filled', # Button Style
			
			'textsize' => '',
			'textcolor' => '',
			'color' => '',
			'bgcolor' => '',
			
			'icon_type' => '', #VC
			'iconalign' => '', 
			'iconclass' => '',
			'icon_css_class' => '',
			
			'animation' => '',
			'class' =>'',

			'css' => '',

			'use_theme_fonts' =>  'yes',
			'google_fonts' => '',
		), $attrs ) );

		$content = $title;

		$size = ($size == 'xlarge') ? ' xlarge' : $size;
		$size = ($size == 'large') ? ' large' : $size;
		$size = ($size == 'medium') ? ' medium' : $size;
		$size = ($size == 'small') ? ' small' : $size;
		
		$color = (($color) && (empty ( $bgcolor ))) ? ' ' . $color : '';

		$inline_styles = array ();
		if ($bgcolor)
			$inline_styles [] = 'background-color:' . $bgcolor . ';border-color:' . $bgcolor . ';';

		if ($textcolor)
			$inline_styles [] = 'color:' . $textcolor . ';';

		if ($textsize)
			$inline_styles [] = 'font-size:' . $textsize . ';';		
		
		$iconspan = $iconspan_left = $iconspan_right = "";
		if( !empty( $icon_type ) ) {

			$icon = "";

			if( $icon_type == 'fontawesome' )
				$icon = $iconclass;

			if( $icon_type == 'css_class' )
				$icon = $icon_css_class;

			if( !empty( $icon ) )
				$iconspan =  "<span class='{$icon}'> </span>";
				
			if($iconalign == 'icon-left with-icon') {
				$iconspan_left = $iconspan;
			} else {
				$iconspan_right = $iconspan;
			}				
		} 
		
		//parse link by vc
		$link = ( '||' === $link ) ? '' : $link;
		$link = vc_build_link( $link );
		$a_href = $link['url'];
		$a_title = $link['title'];
		$a_target = !empty($link['target']) ? $link['target'] : '_self';
		
		if(preg_match('#^{{#', $a_href) === 1) {
			$a_href =  str_replace ( '{{', '[', $a_href );
			$a_href =  str_replace ( '}}', '/]', $a_href );
			$a_href = do_shortcode($a_href);
		}else {
			$a_href = esc_url ( $a_href );
		}

		$css = vc_shortcode_custom_css_class($css); # VC
		
		if(empty($a_href)){
			$a_href = '#';
		}

		if( empty( $use_theme_fonts ) && ( !empty( $google_fonts ) ) ) {

			$settings = get_option( 'wpb_js_google_fonts_subsets' );
			if ( is_array( $settings ) && ! empty( $settings ) ) {
				$subsets = '&subset=' . implode( ',', $settings );
			} else {
				$subsets = '';
			}

			$result = '';
			$params_pairs = explode( '|', $google_fonts );
			if ( ! empty( $params_pairs ) ) {
				foreach ( $params_pairs as $pair ) {
					$param = preg_split( '/\:/', $pair );
					if ( ! empty( $param[0] ) && isset( $param[1] ) ) {
						$result[ $param[0] ] = rawurldecode( $param[1] );
					}
				}
			}

			if( isset( $result['font_family'] ) ) {
				wp_enqueue_style( 'dt_google_fonts_' . vc_build_safe_css_class( $result['font_family'] ), '//fonts.googleapis.com/css?family=' . $result['font_family'] . $subsets );
			}

			$font_family = explode( ':',$result['font_family'] );
			$fonts_styles = explode( ':',$result['font_style'] );

			$inline_styles[] = 'font-family:'.$font_family[0].';';
			$inline_styles[] = 'font-weight:'.$fonts_styles[1].';';
			$inline_styles[] = 'font-style:'.$fonts_styles[2].';';
		}

		$inline_style = join ( '', array_unique ( $inline_styles ) );
		$inline_style = ! empty ( $inline_style ) ? ' style="' . $inline_style . '"' : '';

		$out = "<a href='{$a_href}' target='{$a_target}' title='{$a_title}' class='dt-sc-button {$css} {$size} {$iconalign} {$color} {$style} {$animation} {$class}' {$inline_style}>{$iconspan_left} {$content} {$iconspan_right}</a>";

		return $out;
	}

	/**
	 * titled box
	 * @return string
	 */
	function dt_sc_titled_box($attrs, $content = null) {
		
		extract ( shortcode_atts ( array (
			'type'	=> 'titled-box',
			'title' => 'Lorem ipsum dolor sit amet',
			'icon_type' => 'fontawesome', #VC
			'icon' => 'fa fa-info-circle', #VC
			'icon_css_class' => '', #VC
			'textcolor' => '',
			'bgcolor' => '',
			'variation' => '',
			'class' => ''
		), $attrs ) );
		
		
		$type = "dt-sc-$type";
		$variation = ( ( $variation ) && ( empty( $bgcolor ) ) ) ? ' ' . $variation : '';
		$content = DTCoreShortcodesDefination::dtShortcodeHelper( $content );
		$content = strip_tags($content);
		
		$icon = ( $icon_type == 'fontawesome' ) ? $icon : $icon_css_class;
		
		$styles = array();
		if($bgcolor) $styles[] = 'background-color:' . $bgcolor . ';border-color:' . $bgcolor . ';';
		if($textcolor) $styles[] = 'color:' . $textcolor . ';';
		$style = join('', array_unique( $styles ) );
		$style = !empty( $style ) ? ' style="' . $style . '"': '' ;
		
		
		if($type == 'dt-sc-titled-box') :
			$icon = ( empty($icon) ) ? "" : "<span class='{$icon}'></span>";
			$title = "<h6 class='{$type}-title' {$style}> {$icon} {$title}</h6>";
			$out = "<div class='{$type} {$variation} {$class}'>";
			$out .= $title;
			$out .=	"<div class='{$type}-content'>{$content}</div>";
			$out .= "</div>";
		else :
			$out = "<div class='{$type} {$class}'>{$content}</div>";
		endif;

		return $out;
	}

	/**
	 * donutchart
	 * @return string
	 */
	function dt_sc_donutchart($attrs, $content = null, $shortcodename = "") {
		extract ( shortcode_atts ( array (
			'title' => '',
			'size' => 'medium',
			'datasize' => '',
			'datapercent' => '',
			'bgcolor' => '#79deff',
			'fgcolor' => '#666666'
		), $attrs ) );

		$size = 'dt-sc-donutchart-'.$size;

		$out = "<div class='{$size}'>";
			$out .= "<div class='dt-sc-donutchart' data-size='{$datasize}' data-percent='{$datapercent}' data-bgcolor='{$bgcolor}' data-fgcolor='{$fgcolor}'></div>";
			if($title != '')
				$out .= "<h5 class='dt-sc-donutchart-title'>{$title}</h5>";
		$out .= '</div>';

		return $out;
	}

	/**
	 * progress bar
	 * @return string
	 */
	function dt_sc_progress_bar($attrs, $content = null) {
		extract ( shortcode_atts ( array (
			'type' => 'progress-striped',
			'value' => '55',
			'color' => '',
			'text' => '', #VC
			'style' => ''
		), $attrs ) );

		if( $type === 'standard' ){
			$type = "dt-sc-standard";
		}elseif( $type === 'progress-striped' ){
			$type = "dt-sc-progress-striped";
		}elseif( $type === 'progress-striped-active' ){
			$type = "dt-sc-progress-striped active";
		}

		$color = ! empty ( $color ) ? "style='background-color:$color;'" : "";

		if($style == 'style2'):
			$out = '<div class="dt-sc-progress-wrapper">';
				$out .= '<div class="dt-sc-bar-title">'.$text.'</div>';
				$out .= '<div class="dt-sc-progress '.$type.'">';
					$out .= '<div class="dt-sc-bar" '.$color.' data-value="'.$value.'">';
						$out .= '<div class="dt-sc-bar-text"><span> '.$value.'% </span></div>';
					$out .= '</div>';
				$out .= '</div>';
			$out .= '</div>';	
		else:
			$out = '<div class="dt-sc-progress '.$type.'">';
				$out .= '<div class="dt-sc-bar" '.$color.' data-value="'.$value.'">';
					$out .= '<div class="dt-sc-bar-text">'.$text.' <span> '.$value.'% </span></div>';
				$out .= '</div>';
			$out .= '</div>';			
		endif;

		return $out;
	}

	/**
	 * pricing table item
	 * @return string
	 */
	function dt_sc_pricing_table_item($attrs, $content = null) {
		extract ( shortcode_atts ( array (
			'heading' => '',
			'subtitle' => '',
			'thumb' => '',
			'currency' => '',
			'price' => '',
			'decimal' => '',
			'permonth' => '',
			'highlight' => '',
			'link' => '',			
		), $attrs ) );

		$selected = ( strtolower($highlight) == "yes" ) ? 'selected' : '';

		$out = "<div class='dt-sc-pr-tb-col $selected'>";
			$out .= '<div class="dt-sc-tb-header">';
				$out .= '<div class="dt-sc-tb-title">';
					$out .= "<h5>{$heading}</h5>";
					if($subtitle)
						$out .= "<p>{$subtitle}</p>";						
				$out .= '</div>';
				$out .= '<div class="dt-sc-price">';
					$out .= "<h6> <sup>{$currency}</sup>{$price}";
					if($decimal)
						$out .= "<sup>{$decimal}</sup>";
					if($permonth)
						$out .= "<span> {$permonth} </span>";
					$out .="</h6>";
				$out .= '</div>';
			$out .= '</div>';

			if($thumb):
				$image = wpb_getImageBySize( array( 'attach_id' => $thumb, 'thumb_size' => 'full' ));
				$out .= '<div class="dt-sc-tb-thumb">';
				$out .= $image['thumbnail'];
				$out .= '</div>';
			endif;

			$content = DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
			$content = str_replace ( '<ul>', '<ul class="dt-sc-tb-content">', $content );
			$content = str_replace ( '<ol>', '<ul class="dt-sc-tb-content">', $content );
			$content = str_replace ( '</ol>', '</ul>', $content );

			$out .= $content;
			
			$link = ( '||' === $link ) ? '' : $link;
			//parse link by vc					
			$link = vc_build_link( $link );
			$a_href = $link['url'];
			$a_title = $link['title'];
			$a_target = $link['target'];			
			
			if( !empty($a_href) ) :			
				$out .= '<div class="dt-sc-buy-now">';					
					$out .= "<a class='dt-sc-button' target='{$a_target}' href='".esc_url($a_href)."'>{$a_title}</a>";					
				$out .= '</div>';
			endif;
				
		$out .= '</div>';

		return $out;
	}

	/**
	 * pricing table minimal item
	 * @return string
	 */
	function dt_sc_pricing_table_minimal_item($attrs, $content = null) {
		
		extract ( shortcode_atts ( array (
			'heading' => '',
			'subtitle' => '',
			'icon_type' => 'fontawesome', #VC
			'icon' => 'fa fa-info-circle', #VC
			'icon_css_class' => '', #VC
			'starting' => '',
			'price' => '',
			'permonth' => '', #VC
			'highlight' => '',
			'link' => '',
		), $attrs ) );

		$selected = ( strtolower($highlight) == "yes" ) ? 'selected' : '';
		
		$icon =  $icon_type == 'fontawesome' ? $icon : $icon_css_class;
		
		$out = "<div class='dt-sc-pr-tb-col minimal $selected'>";
		
			$out .= '<div class="dt-sc-tb-header">';
				$out .= '<div class="icon-wrapper">';
					$out .= "<span class='{$icon}'> </span>";
				$out .= '</div>';

				$out .= '<div class="dt-sc-tb-title">';
					$out .= "<h5>{$heading}</h5>";
					if($subtitle)
						$out .= "<p>{$subtitle}</p>";
				$out .= '</div>';
				$out .= '<div class="dt-sc-price">';
					$out .= "<p>{$starting}</p>";
					$out .= "<h6> {$price} <span> {$permonth} </span> </h6>";
				$out .= '</div>';
			$out .= '</div>';
			
			$link = ( '||' === $link ) ? '' : $link;
			//parse link by vc					
			$link = vc_build_link( $link );
			$a_href = $link['url'];
			$a_title = $link['title'];
			$a_target = $link['target'];
			
			if( !empty($a_href) ) :	
				$out .= '<div class="dt-sc-buy-now">';
				$out .= "<a class='dt-sc-button' target='{$a_target}' href='".esc_url($a_href)."'>{$a_title}</a>";
				$out .= '</div>';
			endif;
			
		$out .= '</div>';

		return $out;
	}

	/**
	 * pricing table type2 item
	 * @return string
	 */
	function dt_sc_pricing_table_type2_item($attrs, $content = null) {
		
		extract ( shortcode_atts ( array (
			'number' => '',
			'month' => '',
			'plan' => '',
			'currency' => '',
			'price' => '',
			'highlight' => '', #VC
			'link' =>'' #VC
		), $attrs ) );

		$selected = ( strtolower($highlight) == "yes" ) ? 'selected' : '';

		$out = "<div class='dt-sc-pr-tb-col type2 $selected'>";
			$out .= '<div class="dt-sc-tb-header">';
				$out .= '<div class="dt-sc-tb-title">';
					$out .= "<h5> <span>{$number}</span>{$month}<br>{$plan}</h5>";
				$out .= '</div>';
				$out .= '<div class="dt-sc-price">';
					$out .= "<h6> <sup>{$currency}</sup>{$price}</h6>";
				$out .= '</div>';
			$out .= '</div>';

			$content = DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
			$content = str_replace ( '<ul>', '<ul class="dt-sc-tb-content">', $content );
			$content = str_replace ( '<ol>', '<ul class="dt-sc-tb-content">', $content );
			$content = str_replace ( '</ol>', '</ul>', $content );

			$out .= $content;

			$link = ( '||' === $link ) ? '' : $link;
			//parse link by vc					
			$link = vc_build_link( $link );
			$a_href = $link['url'];
			$a_title = $link['title'];
			$a_target = $link['target'];
			
			if( !empty($a_href) ):
				$out .= '<div class="dt-sc-buy-now">';
					$out .= "<a class='dt-sc-button' target='{$a_target}' href='".esc_url($a_href)."'>{$a_title}</a>";
				$out .= '</div>';			
			endif;
		$out .= '</div>';

		return $out;
	}

	/**
	 * iconbox
	 * @return string
	 */
	function dt_sc_iconbox($attrs, $content = null) {
		
		extract ( shortcode_atts ( array (
			'type' => 'type1', #VC
			'title' => '',
			'subtitle' => '',
			'icon_type' => 'icon', #VC
			'icon' => 'fa fa-info-circle', #VC
			'icon_css_class' => '', #VC
			'iconurl' => '',		
			'link' => '',			
			'class' => '',
			'addstyles' => '' # VC
		), $attrs ) );
		
		
		//parse link
		$link = ( '||' === $link ) ? '' : $link;
		$link = vc_build_link( $link );
		$a_href = $link['url'];
		$a_title = $link['title'];
		$a_target = $link['target'];

		if($icon_type == 'css_class' ) {
			$icon = $icon_css_class;
		}

		$class = ( $icon_type == 'none' ) ? $class.' no-icon' : $class;

		$style = !empty( $addstyles ) ? " style='".esc_attr( $addstyles )."'" : "";
		
		$class .= ( $type == 'type9' ) ? " dt-sc-icon-box-type9 " : '';
		

		$out = "<div class='dt-sc-icon-box {$type} {$class}'{$style}>";
		
			if( !empty($icon) && ( $icon_type == "icon" || $icon_type == "css_class" ) ):
				$out .= '<div class="icon-wrapper">';
				$out .= "<span class='{$icon}'> </span>";
				$out .= '</div>';
			endif;
			
			if( !empty($iconurl) && ( $icon_type == 'image' ) ):
			
				$image = wpb_getImageBySize( array( 'attach_id' => $iconurl, 'thumb_size' => 'full' ));
				$out .= '<div class="icon-wrapper">';
				if( $type == 'type3')
					$out .= '<span>';

					$out .= $image['thumbnail'];

				if( $type == 'type3')
					$out .= '</span>';

				$out .= '</div>';
			endif;
		

			$out .= '<div class="icon-content">';
				if(!empty($subtitle))
					$out .= "<h5>{$subtitle}</h5>";

				if(!empty($title) && !empty($a_href))
					$out .= "<h4><a href='{$a_href}' title='{$a_title}' target='{$a_target}'>{$title}</a></h4>";
				elseif(!empty($title))
					$out .= "<h4>{$title}</h4>";
					$out .= DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
			$out .= '</div>';

			if(!empty($icon) && ($type == 'type1'))
				$out .= "<span class='{$icon} large-icon'> </span>";

		$out .= '</div>';

		return $out;
	}

	/**
	 * dropcap
	 * @return string
	 */
	function dt_sc_dropcap($attrs, $content = null, $shortcodename = "") {
		extract ( shortcode_atts ( array (
			'type' => 'default', #VC
			'variation' => '',
			'bgcolor' => '',
			'textcolor' => ''
		), $attrs ) );

		$type = 'dt-sc-dropcap-'. $type;

		$bgcolor = ( $type == 'dt-sc-dropcap-default') ? "" : $bgcolor;
		$variation = ( ( $variation ) && ( empty( $bgcolor ) ) ) ? ' ' . $variation : '';

		$styles = array();
		if($bgcolor) $styles[] = 'background-color:' . $bgcolor . ';';
		if($textcolor) $styles[] = 'color:' . $textcolor . ';border-color:' . $textcolor . ';';;
		$style = join('', array_unique( $styles ) );
		$style = !empty( $style ) ? ' style="' . $style . '"': '' ;

		$content = DTCoreShortcodesDefination::dtShortcodeHelper ( $content );

		$out = "<span class='dt-sc-dropcap $type {$variation}' {$style}>{$content}</span>";
		return $out;
	}

	/**
	 * blockquote
	 * @return string
	 */
	function dt_sc_blockquote($attrs, $content = null) {
		
		extract ( shortcode_atts ( array (
			'type' => 'type1',
			'align' => '',
			'variation' => '',
			'textcolor' => '',
			'cite'=> '',
			'role' =>''
		), $attrs ) );

		$class = array();
		if( $align )
			$class[] = ' ' . $align;
		if( $variation )
			$class[] = ' ' . $variation;		
		
		$content = DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
		$content = strip_tags($content);
		$content = ! empty ( $content ) ? "<q>{$content}</q>" : '';

		$cite = ! empty ( $cite ) ? '&ndash; ' .$cite : '';
		$role = ! empty ( $role ) ? ' <span>' . $role . '</span>' : '';

		$cite = !empty( $cite ) ? "<cite>$cite$role</cite>" : '';

		$style = ( $textcolor ) ? ' style="color:' . $textcolor . ';"' : '';
		$class = join( '', array_unique( $class ) );

		$out = "<blockquote class='{$type} {$class}' {$style}>{$content}{$cite}</blockquote>";
		return $out;
	}

	/**
	 * colored button
	 * @return string
	 */
	function dt_sc_colored_button($attrs, $content = null) {
		
		extract ( shortcode_atts ( array (
			'title' => '',
			'subtitle' => '',
			'color' => '',
			'link' => '', #VC
			'icon_type' => 'fontawesome', #VC
			'icon' => 'fa fa-info-circle', #VC
			'icon_css_class' => '', #VC			
			'class' =>''
		), $attrs ) );

		//parse link by vc
		$link = ( '||' === $link ) ? '' : $link;
		$link = vc_build_link( $link );
		$a_href = $link['url'];
		$a_title = $link['title'];
		$a_target = $link['target'];

		if(preg_match('#^{{#', $a_href) === 1) {
			$a_href =  str_replace ( '{{', '[', $a_href );
			$a_href =  str_replace ( '}}', '/]', $a_href );
			$a_href = do_shortcode($a_href);
		}else {
			$a_href = esc_url ( $a_href );
		}

		$icon_class = ( $icon_type == 'fontawesome' ) ? $icon : $icon_css_class;
		$iconspan = !empty($icon_class) ? "<span class='{$icon_class}'> </span>" : '';

		$out = "<a class='dt-sc-colored-big-buttons with-left-icon {$color} {$class}' target='{$a_target}' title='{$a_title}' href='{$a_href}'> {$iconspan} {$title} <br> <strong>{$subtitle}</strong> </a>";

		return $out;
	}

	/**
	 * fancy order list
	 * @return string
	 */
	function dt_sc_fancy_ol($attrs, $content = null) {
		extract ( shortcode_atts ( array (
			'style' => 'decimal',
			'variation' => '',
			'class' => ''
		), $attrs ) );

		$style = ($style) ? trim ( $style ) : 'decimal';
		$class = ($class) ? trim ( $class ) : '';
		$variation = ($variation) ? ' ' . trim ( $variation ) : '';
		$content = DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
		$content = str_replace ( '<ol>', "<ol class='dt-sc-fancy-list {$variation} {$class} {$style}'>", $content );
		$content = str_replace ( '<li>', '<li><span>', $content );
		$content = str_replace ( '</li>', '</span></li>', $content );

		return $content;
	}

	/**
	 * fancy unorder list
	 * @return string
	 */
	function dt_sc_fancy_ul($attrs, $content = null) {
		extract ( shortcode_atts ( array (
			'style' => 'arrow',
			'variation' => '',
			'class' => ''
		), $attrs ) );

		$style = ($style) ? trim ( $style ) : '';
		$class = ($class) ? trim ( $class ) : '';
		$variation = ($variation) ? ' ' . trim ( $variation ) : '';
		$content = DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
		$content = str_replace ( '<ul>', "<ul class='dt-sc-fancy-list {$variation} {$class} {$style}'>", $content );

		return $content;
	}

	/**
	 *
	 * @param array $attrs        	
	 * @param string $content        	
	 * @return string
	 */
	function dt_sc_tooltip($attrs, $content = null) {
		extract ( shortcode_atts ( array (
			'type'	=> '',
			'position' => 'top',
			'bgcolor' => '#000000',
			'textcolor' => '#ffffff',
			'link' => ''
		), $attrs ) );

		$content = DTCoreShortcodesDefination::dtShortcodeHelper( $content );

		//parse link by vc
		$link = ( '||' === $link ) ? '' : $link;
		$link = vc_build_link( $link );
		$a_href = $link['url'];
		$a_title = $link['title'];
		$a_target = $link['target'];

		$class = ( $type == "boxed" ) ? "dt-sc-boxed-tooltip" : "";
		$class .= " dt-sc-tooltip-".$position;		

		$styles = array();
		if($bgcolor) $styles[] = 'background-color:' . $bgcolor . ';border-color:' . $bgcolor . ';';
		if($textcolor) $styles[] = 'color:' . $textcolor . ';';
		
		$style = join('', array_unique( $styles ) );
		$style = !empty( $style ) ? ' style="' . $style . '"': '' ;
		$style = ( $type == "boxed" ) ? $style : "";

		$out = "<a href='{$a_href}' title='{$a_title}' target='{$a_target}' class='{$class}' {$style}>{$content}</a>";
		return $out;
	}

	function dt_sc_simple_heading( $attrs, $content = null ){
		extract ( shortcode_atts ( array (
			'type' => 'two-border',
			'tag' => 'h2',
			'text' => 'Lorem ipsum dolor',
			'subtag' => 'h3',
			'subtext' => 'Lorem ipsum dolor',
			'extra_text' => 'Lorem ipsum dolor', # Used only if type = stripe
			'extra_text_tag' => 'h5', # Used only if type = stripe
			'icon' => 'icon icon-compactcamera', # Used only type = with-icon-link
			'link' => '', # Used only type = with-icon-link
			'class' => ''
		), $attrs ) );

		$out = "";
		if( $type == 'simple' ) {
			$class = !empty( $class ) ? ' class="'.$class.'"' : '';
			$out .= "<{$tag}{$class}>{$text}</{$tag}>";
		} elseif( $type == 'two-border') {
			$out  = "<div class='dt-sc-title with-two-border {$class}'>";
			$out .= "<{$tag}>{$text}</{$tag}>";
			$out .= "</div>";
		} elseif( $type == 'two-color') {
			$out  = "<div class='dt-sc-title with-two-color-bg {$class}'>";
			$out .= "<{$tag}>{$text}</{$tag}>";
			$out .= "</div>";
		} elseif( $type == "split" ) {			
			$out  = "<div class='dt-sc-title mz-title {$class}'>";
			$out .= "<div class='mz-title-content'><{$tag}>{$text}</{$tag}></div>";
			$out .= "</div>";
		} elseif( $type == "mz-stripe" ) {			
			$out  = "<div class='dt-sc-title mz-stripe-title {$class}'>";
			$out .= "<div class='mz-stripe-title-content'><{$tag}>{$text}</{$tag}></div>";
			$out .= "</div>";						
		} elseif( $type == 'ribbon') {
			$out = "<{$tag} class='dt-sc-ribbon-title {$class}'>{$text}</{$tag}>";
		} elseif( $type == 'two-border-with-subtitle' ){
			$out = "<div class='dt-sc-title with-two-border with-sub-title {$class}'>";
			$out .= "<{$tag}>{$text}</{$tag}>";
			$out .= "<{$subtag}>{$subtext}</{$subtag}>";
			$out .= "</div>";			
		} elseif( $type == 'script' ) {
			$out = "<div class='dt-sc-title script-with-sub-title {$class}'>";
			$out .= "<{$tag}>{$text}</{$tag}>";
			$out .= "<{$subtag}>{$subtext}</{$subtag}>";
			$out .= "</div>";
		} elseif( $type == 'stripe') {
			$out = "<div class='dt-sc-title with-two-color-stripe {$class}'>";
			$out .= "<{$subtag}>{$subtext}</{$subtag}>";
			$out .= "<{$tag}>{$text}</{$tag}>";
			$out .= "<{$extra_text_tag}>{$extra_text}</{$extra_text_tag}>";
			$out .= "</div>";
		} elseif( $type == 'with-icon-link' ) {

			//parse link by vc
			$link = ( '||' === $link ) ? '' : $link;
			$link = vc_build_link( $link );
			$a_href = $link['url'];
			$a_title = $link['title'];
			$a_target = $link['target'];

			$out  = "<div class='dt-sc-title with-boxed dt-sc-photography-style {$class}'>";
			$out .= "<{$tag}>";
			$out .= ( !empty($a_href) ) ? "<a href='{$a_href}' title='{$a_title}' target='{$a_target}'>" : "";
			$out .= "<span class='{$icon}'> </span>{$text}";
			$out .= "</{$tag}>";
			$out .= ( !empty($a_href) ) ? "</a>" : "";
			$out .= "</div>";
		} elseif( $type == 'decoration' ) {
			$out = "<div class='dt-sc-title with-right-border-decor {$class}'>";
			$out .= "<{$tag}>{$text}</{$tag}>";
			$out .= '<p>'.DTCoreShortcodesDefination::dtShortcodeHelper ( $content ).'</p>';
			$out .= "</div>";
		} elseif( $type == 'triangle' ) {
			$out = '<div class="dt-sc-triangle-title">';
			$out .= "<{$tag}>{$text}</{$tag}>";
			$out .= '<p>'.DTCoreShortcodesDefination::dtShortcodeHelper ( $content ).'</p>';
			$out .= "</div>";
		}
		return $out;
	}

	/**
	 * horizontal invisible
	 * @return string
	 */
	function dt_sc_hr_invisible($attrs, $content = null) {
		extract ( shortcode_atts ( array (
			'size'  =>  'medium',
			'class' =>  ''
		), $attrs ) );

		$out = "<div class='dt-sc-hr-invisible-{$size} {$class}'> </div>";

		return $out;
	}

	/**
	 * horizontal top
	 * @return string
	 */
	function dt_sc_hr_top($attrs, $content = null) {
		extract ( shortcode_atts ( array (
			'value'  =>  '10',
			'class' =>  ''
		), $attrs ) );

		$out = "<div class='dt-sc-hr-top-{$value} {$class}'> </div>";

		return $out;
	}

	/**
	 * horizontal custom
	 * @return string
	 */
	function dt_sc_hr_custom($attrs, $content = null) {
		extract ( shortcode_atts ( array (
			'type'  =>  'clear',
			'class' =>  ''
		), $attrs ) );

		$out = "<div class='dt-sc-{$type} {$class}'> </div>";

		return $out;
	}

	/**
	 * hr stamp divider
	 * @return string
	 */
	function dt_sc_hr_svg($attrs, $content = null, $shortcodename = "") {
		extract ( shortcode_atts ( array (
			'type' => 'stamp-divider-down',
			'fillcolor' => '#ffffff',
			'strokecolor' => '#ffffff'
		), $attrs ) );

		$out = "<svg class='dt-sc-{$type}' xmlns='http://www.w3.org/2000/svg' version='1.1' width='100%' height='150' viewBox='0 0 400 260' preserveAspectRatio='none'>
                <path style='fill:{$fillcolor}; stroke:{$strokecolor}' d='M0 0 Q 2.5 40 5 0 Q 7.5 40 10 0 Q 12.5 40 15 0 Q 17.5 40 20 0 Q 22.5 40 25 0 Q 27.5 40 30 0 Q 32.5 40 35 0
                         Q 37.5 40 40 0 Q 42.5 40 45 0 Q 47.5 40 50 0 Q 52.5 40 55 0 Q 57.5 40 60 0 Q 62.5 40 65 0 Q 67.5 40 70 0 Q 72.5 40 75 0 Q 77.5 40 80 0 Q 82.5 40 85 0
                         Q 87.5 40 90 0 Q 92.5 40 95 0 Q 97.5 40 100 0 Q 102.5 40 105 0 Q 107.5 40 110 0 Q 112.5 40 115 0 Q 117.5 40 120 0 Q 122.5 40 125 0 Q 127.5 40 130 0
                         Q 132.5 40 135 0 Q 137.5 40 140 0 Q 142.5 40 145 0 Q 147.5 40 150 0 Q 152.5 40 155 0 Q 157.5 40 160 0 Q 162.5 40 165 0 Q 167.5 40 170 0 Q 172.5 40 175 0
                         Q 177.5 40 180 0 Q 182.5 40 185 0 Q 187.5 40 190 0 Q 192.5 40 195 0 Q 197.5 40 200 0 Q 202.5 40 205 0 Q 207.5 40 210 0 Q 212.5 40 215 0 Q 217.5 40 220 0
                         Q 222.5 40 225 0 Q 227.5 40 230 0 Q 232.5 40 235 0 Q 237.5 40 240 0 Q 242.5 40 245 0 Q 247.5 40 250 0 Q 252.5 40 255 0 Q 257.5 40 260 0 Q 262.5 40 265 0
                         Q 267.5 40 270 0 Q 272.5 40 275 0 Q 277.5 40 280 0 Q 282.5 40 285 0 Q 287.5 40 290 0 Q 292.5 40 295 0 Q 297.5 40 300 0 Q 302.5 40 305 0 Q 307.5 40 310 0
                         Q 312.5 40 315 0 Q 317.5 40 320 0 Q 322.5 40 325 0 Q 327.5 40 330 0 Q 332.5 40 335 0 Q 337.5 40 340 0 Q 342.5 40 345 0 Q 347.5 40 350 0 Q 352.5 40 355 0
                         Q 357.5 40 360 0 Q 362.5 40 365 0 Q 367.5 40 370 0 Q 372.5 40 375 0 Q 377.5 40 380 0 Q 382.5 40 385 0 Q 387.5 40 390 0 Q 392.5 40 395 0 Q 397.5 40 400 0 Z'>
                </path>
            </svg>";

		return $out;
	}
	
	/**
	 * email address
	 * @return string
	 */
	function dt_sc_email($attrs, $content = null) {
		extract ( shortcode_atts ( array (
			'text' => '',
			'class' => 'icon icon-mail'
		), $attrs ) );

		$out = "<div class='text-with-icon'>";
			$out .= "<span class='{$class}'> </span>";
			$out .= "<a href='mailto:{$text}'> {$text} </a>";
		$out .= "</div>";

		return $out;
	}

	/**
	 * phone no
	 * @return string
	 */
	function dt_sc_phone_no($attrs, $content = null) {
		extract ( shortcode_atts ( array (
			'text' => '',
			'class' => 'icon icon-phone2'
		), $attrs ) );
		
		$out = "<div class='text-with-icon'>";
			$out .= "<span class='{$class}'> </span>";
			$out .= $text;
		$out .= "</div>";

		return $out;
	}

	/**
	 * url
	 * @return string
	 */
	function dt_sc_url($attrs, $content = null) {
		extract ( shortcode_atts ( array (
			'link' => '',
			'class'  =>  'icon icon-linked'
		), $attrs ) );

		$link = ( '||' === $link ) ? '' : $link;
		$link = vc_build_link( $link );
		$a_href = $link['url'];
		$a_title = $link['title'];
		$a_target = $link['target'];

		if( !empty($a_href) ):
			$out  = "<div class='text-with-icon'>";
			$out .= "<span class='{$class}'> </span>";
			$out .= "<a title='".esc_attr($a_title)."' target='".esc_attr($a_target)."' href='".esc_url($a_href)."'>{$a_title}</a>";
			$out .= "</div>";
			return $out;
		endif;		
	}

	/**
	 * search form
	 * @return string
	 */
	function dt_sc_search_form($attrs, $content = null) {

		$out = get_search_form(false);		
		return $out;
	}

	/**
	 * woocommerce cart
	 * @return string
	 */
	function dt_sc_woo_cart($attrs, $content = null) {

		if( function_exists("is_woocommerce")) :
		    $out = '<a class="cart-info" href="'.WC()->cart->get_cart_url().'" title="'.esc_attr__( 'View Shopping Cart', 'veda-core' ).'">';
		        $count = WC()->cart->cart_contents_count;
		        $out .= '<p class="cart-icon"> <span> '.$count.' </span> </p>';
		        $out .= '<p class="cart-total"> '.WC()->cart->get_cart_total().' </p>';
		    $out .= '</a>';
		else:
			$out .= '<p>'.esc_html__('Kindly install & activate woocommerce plugin and check it.', 'veda-core').'</p>';
		endif;

		return $out;
	}

	/**
	 * icon
	 * @return string
	 */
	function dt_sc_icon( $attrs, $content = null ) {

		extract ( shortcode_atts ( array (
			'icon' => '',
			'styles' => '',
			'link' => '',
			'class' => ''
		), $attrs ) );

		$styles = !empty($styles) ? "style='{$styles}'" : '';

		$out = "<span class='{$icon}' {$styles}> </span>";

		$link = ( '||' === $link ) ? '' : $link;
		$link = vc_build_link( $link );
		$a_href = $link['url'];
		$a_title = $link['title'];
		$a_target = $link['target'];

		if( !empty($a_href) ):
			$out = "<a title='".esc_attr($a_title)."' target='".esc_attr($a_target)."' href='".esc_url($a_href)."' class='".esc_attr($class)."'>{$out}</a>";
		endif;

		return $out;
	}

	function dt_sc_image( $attrs, $content = null ) {
		extract ( shortcode_atts ( array (
			'url' => '',
			'align' => 'alignnone',
			'class' => '',
			'styles' => '',
			'link' => '',
		), $attrs ) );

		$image = wpb_getImageBySize( array('attach_id' => $url, 'thumb_size' => 'full') );
		$url = $image['thumbnail'];

		if( !empty( $url ) ):
			if( !empty($class) ):
				$url = str_replace(' class="', ' class="'.$class.' ', $url);
			endif;

			if( !empty($styles) ):
				$url = str_replace('<img', '<img style="'.$styles.'" ', $url);
			endif;

			if( !empty($align) ):
				$url = str_replace(' class="', ' class="'.$align.' ', $url);
			endif;

			//parse link by vc
			$link = ( '||' === $link ) ? '' : $link;
			$link = vc_build_link( $link );
			$a_href = $link['url'];
			$a_title = $link['title'];
			$a_target = !empty( $link['target'] ) ? trim($link['target']) : '_self';
			if( strlen( $link['url'] ) > 0 ) {
				return '<a href="'.$a_href.'" title="'.$a_title.'" target="'.$a_target.'">'.$url.'</a>';
			} else {
				return $url;				
			}
		endif;
	}

	/**
	 * contact info
	 * @return string
	 */
	function dt_sc_contact_info($attrs, $content = null) {
		extract ( shortcode_atts ( array (
			'type' 	 =>	 '',
			'icon' 	 =>  '',
			'title'  =>  '',
			'link'	=>	 '',
			'class'  =>  ''
		), $attrs ) );

		$out = "<div class='dt-sc-contact-info {$type} {$class}'>";

			if( $type == 'type5') {
				//parse link by vc
				$link = ( '||' === $link ) ? '' : $link;
				$link = vc_build_link( $link );
				$a_href = $link['url'];
				$a_title = $link['title'];
				$a_target = $link['target'];

				if( !empty($icon) ) {
					$out .= "<a class='dt-sc-contact-icon' title='{$a_title}' href='{$a_href}' target='{$a_target}'><span class='{$icon}'> </span></a>";
				}

				if(!empty($title)) {
					$out .= "<h6><a title='{$title}' href='{$a_href}'>{$title}</a></h6>";
				}
			} else {
				if( !empty($icon) ) {
					$out .= "<span class='{$icon}'> </span>";
				}

				if(!empty($title)) {
					$out .= "<h6>{$title}</h6>";
				}
			}
		$out .= DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
		$out .= "</div>";

		return $out;
	}

	/**
	 * number counter
	 * @return string
	 */
	function dt_sc_number_counter($attrs, $content = null) {
		extract ( shortcode_atts ( array (
			'type'  =>	'type1',
			'icon_type' => 'icon_class',
			'icon'  =>  '',
			'iconurl'  =>  '',
			'iconcolor'  =>  '',
			'value'  =>  '',
			'append'  =>  '',
			'title'  =>  '',
			'class'  =>  '',
		), $attrs ) );

		$append = !empty($append) ? "data-append='{$append}'" : '';
		$out = "<div class='dt-sc-counter {$type} {$iconcolor} {$class}'>";
			$out .= "<div class='dt-sc-couter-icon-holder'>";
				if(!empty($icon) || !empty($iconurl)):
					$out .= "<div class='icon-wrapper'>";
						if(!empty($icon) && $icon_type == 'icon_class' ):
							$out .= "<span class='{$icon}'> </span>";
						elseif(!empty($iconurl) && $icon_type == 'icon_url' ):
							$image = wpb_getImageBySize( array( 'attach_id' => $iconurl, 'thumb_size' => 'full' ));
							$image = $image['thumbnail'];
							$out .= '<span>'.$image.'</span>';
						endif;
					$out .= "</div>";
				endif;
				$out .= "<div class='dt-sc-counter-number' data-value='{$value}' {$append}>{$value}</div>";
			$out .= "</div>";
			$out .= "<h4>{$title}</h4>";
		$out .= "</div>";
		return $out;		
	}

	/**
	 * image caption
	 * @return string
	 */
	function dt_sc_image_caption($attrs, $content = null) {
		extract ( shortcode_atts ( array (
			'type'  =>  '',
			'title'  =>  '',
			'subtitle'  =>  '',
			'image'  =>  '',
			'icon'  =>  '',
			'iconurl'  =>  '',
			'imgpos'  =>  '',
			'class'  =>  ''
		), $attrs ) );


		$image = wpb_getImageBySize( array( 'attach_id' => $image, 'thumb_size' => 'full' ));

		$out = "<div class='dt-sc-image-caption {$type} {$class}'>";

			$html_1 = "<div class='dt-sc-image-wrapper'>";
				if(!empty($image))
					$html_1 .= $image['thumbnail'];

				if(!empty($icon) || !empty($iconurl)):
					$html_1 .= "<div class='icon-wrapper'>";
						if(!empty($icon)):
							$html_1 .= "<span class='{$icon}'> </span>";
						elseif(!empty($iconurl)):
							$image = wpb_getImageBySize( array( 'attach_id' => $iconurl, 'thumb_size' => 'full' ));
							$html_1 .= $image['thumbnail'];
						endif;	
					$html_1 .= "</div>";
				endif;
				
				if($type == 'type9'):
					$html_1 .= '<div class="dt-sc-image-overlay">';
						$html_1 .= DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
					$html_1 .= '</div>';
				endif;
			$html_1 .= "</div>";

			$html_2 = "<div class='dt-sc-image-content'>";
				$html_2 .= "<div class='dt-sc-image-title'>";
					$html_2 .= "<h3>{$title}</h3>";
					if(!empty($subtitle))
						$html_2 .= "<h6>{$subtitle}</h6>";
				$html_2 .= "</div>";
				if($type != 'type9'):
					$html_2 .= DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
				endif;	
			$html_2 .= "</div>";

			if($imgpos == "bottom")
				$out .= $html_2 . $html_1;
			else
				$out .= $html_1 . $html_2;
		$out .= "</div>";

		return $out;
	}

	/**
	 * image flip
	 * @return string
	 */
	function dt_sc_image_flip($attrs, $content = null) {
		extract ( shortcode_atts ( array (
			'image1'  =>  '',
			'image2'  =>  '',
			'link'  =>'',
		), $attrs ) );

		//parse link by vc
		$link = ( '||' === $link ) ? '' : $link;
		$link = vc_build_link( $link );
		$a_href = $link['url'];
		$a_title = $link['title'];
		$a_target = !empty($link['target']) ? $link['target'] : '_self';

		$image1 = wpb_getImageBySize( array( 'attach_id' => $image1, 'thumb_size' => 'full' ));
		$image2 = wpb_getImageBySize( array( 'attach_id' => $image2, 'thumb_size' => 'full' ));

		$out = "<div class='dt-sc-image-flip'>";
		$out .= !empty( $a_href ) ? "<a href='{$a_href}' title='{$a_title}' target='{$a_target}'>" : "";
		$out .= !empty( $image1['thumbnail'] ) ? $image1['thumbnail'] : '';
		$out .= !empty( $image2['thumbnail'] ) ? $image2['thumbnail'] : '';
		$out .= !empty( $a_href ) ? "</a>" : "";
		$out .= "</div>";
		return $out;
	}

	/**
	 * event caption
	 * @return string
	 */
	function dt_sc_event_caption($attrs, $content = null, $shortcodename = "") {
		extract ( shortcode_atts ( array (
			'title' => '',
			'image' => '',
			'subtitle1' => '',
			'subtitle2' => ''
		), $attrs ) );

		$image = wpb_getImageBySize( array( 'attach_id' => $image, 'thumb_size' => 'full' ));

		$out = '<div class="dt-sc-event-image-caption">';
			$out .= '<div class="dt-sc-image-content">';
				$out .= "<h3>{$title}</h3>";
				$out .= DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
			$out .= '</div>';
			$out .= '<div class="dt-sc-image-wrapper">';
				$out .= !empty( $image['thumbnail'] ) ? $image['thumbnail'] : '<img src="http://place-hold.it/320x340"/>';
				$out .= '<div class="overlay-text">';
					$out .= "<h3><span>{$subtitle1}</span>{$subtitle2}</h3>";
				$out .= '</div>';
			$out .= '</div>';
		$out .= '</div>';

		return $out;
	}

	/**
	 * event contact info
	 * @return string
	 */
	function dt_sc_event_contact_info($attrs, $content = null, $shortcodename = "") {

		extract ( shortcode_atts ( array (
			'title' => '',
			'icon' => '',
			'color' => '',
			'link' => '',
		), $attrs ) );

		//parse link by vc
		$link = ( '||' === $link ) ? '' : $link;
		$link = vc_build_link( $link );
		$a_href = $link['url'];
		$a_title = $link['title'];
		$a_target = $link['target'];		

		$out = "<div class='dt-sc-contact-info type5 {$color}'>";
			$out .= "<a class='dt-sc-contact-icon' href='{$a_href}' title='{$a_title}' target='{$a_target}'> <span class='{$icon}'> </span> </a>";
			$out .= "<h6><a href='{$a_href}' title='{$a_title}' target='{$a_target}'>{$title}</a></h6>";
		$out .= '</div>';

		return $out;
	}

	/**
	 * mailchimp newsletter
	 * @return string
	 */
	function dt_sc_mc_newsletter($attrs, $content = null) {
		extract ( shortcode_atts ( array (
			'type' => '',
			'title' => '',
			'subtitle' => '',
			'tooltip' => '',
			'listid' => '',
			'name' => esc_html__('Your Name', 'veda-core'),
			'email' => esc_html__('Your Email Address', 'veda-core'),
			'button' => esc_html__('Subscribe Now', 'veda-core'),
			'show_name' => '',
			'class' => ''
		), $attrs ) );

		$out = "<div class='dt-sc-newsletter-section {$type} {$class}'>";
			if(!empty($subtitle))
				$out .= "<i>{$subtitle}</i>";
		
			if(!empty($title))
				$out .= "<h2>{$title}</h2>";

			if(!empty($content))
				$out .= DTCoreShortcodesDefination::dtShortcodeHelper ( $content );

			$out .= '<form class="dt-sc-subscribe-frm" action="#" method="post">';

				if($show_name == 'true')
					$out .= "<input type='text' name='mc_name' placeholder='{$name}'>";
				$out .= "<input type='email' name='mc_email' required='required' placeholder='{$email}'>";
				$out .= "<input type='submit' name='mc_submit' value='{$button}'>";
				$out .= "<input type='hidden' name='mc_listid' value='{$listid}'>";
			$out .= '</form>';

			if(!empty($tooltip))
				$out .= "<div class='newsletter-tooltip'>{$tooltip}</div>";

			$out .= '<div class="dt_ajax_subscribe_msg"></div>';
		$out .= '</div>';

		return $out;
	}

	/**
	 * team
	 * @return string
	 */
	function dt_sc_team($attrs, $content = null) {
		extract ( shortcode_atts ( array (
			'name'	=> '',
			'role' => '',
			'image' => '',
			'teamstyle' => '',
			'socialstyle' => '',
			'facebook' => '',
			'twitter' => '',
			'google' => '',
			'linkedin' => '',
			'class' => ''
		), $attrs ) );

		$sociables = array('fa-dribbble' => 'dribble', 'fa-flickr' => 'flickr', 'fa-github' => 'github', 'fa-pinterest' => 'pinterest','fa-twitter' => 'twitter', 'fa-youtube' => 'youtube', 'fa-android' => 'android', 'fa-dropbox' => 'dropbox', 'fa-instagram' => 'instagram', 'fa-windows' => 'windows', 'fa-apple' => 'apple', 'fa-facebook' => 'facebook', 'fa-google-plus' => 'google', 'fa-linkedin' => 'linkedin', 'fa-skype' => 'skype', 'fa-tumblr' => 'tumblr', 'fa-vimeo-square' => 'vimeo');

		$image = wpb_getImageBySize( array( 'attach_id' => $image, 'thumb_size' => 'full' ));
		$image = $image['thumbnail'];

		$out = "<div class='dt-sc-team {$teamstyle} {$class}'>";

			$out .= "<div class='dt-sc-team-thumb'>";
				$out .= !empty( $image ) ? $image : '';

				if($teamstyle == 'type2'):
					$out .= "<div class='dt-sc-team-thumb-overlay'>";
						$s = "";
						foreach ( $sociables as $key => $value ) {
							if(is_array($attrs) && array_key_exists($value, $attrs) && $attrs[$value] != '')
								$s .= '<li><a class="fa '.$key.'" href="'.$attrs[$value].'" title="'.ucfirst($value).'"></a></li>';
						}
						$s = ! empty ( $s ) ? "<ul class='dt-sc-team-social {$socialstyle}'>$s</ul>" : "";
						$out .= $s;
					$out .= "</div>";
				endif;

			$out .= "</div>";

			$out .= "<div class='dt-sc-team-details'>";
				$out .= "<h4>{$name}</h4>";
				$out .= "<h5>{$role}</h5>";

				if($teamstyle != 'type2'):
					$s = "";
					foreach ( $sociables as $key => $value ) {
						if(is_array($attrs) && array_key_exists($value, $attrs) && $attrs[$value] != '')
							$s .= '<li><a class="fa '.$key.'" href="'.$attrs[$value].'" title="'.ucfirst($value).'"></a></li>';
					}
					$s = ! empty ( $s ) ? "<ul class='dt-sc-team-social {$socialstyle}'>$s</ul>" : "";
					$out .= $s;
				endif;

				$content = DTCoreShortcodesDefination::dtShortcodeHelper( $content );
				$out .= $content;
			$out .= "</div>";

		$out .= "</div>";

		return $out;
	}

	/**
	 * speaker
	 * @return string
	 */
	function dt_sc_speaker($attrs, $content = null) {
		extract ( shortcode_atts ( array (
			'name' => '',
			'role' => '',
			'image' => '',
			'facebook' => '',
			'twitter' => '',
			'google' => '',
			'linkedin' => '',
			'class' => ''
		), $attrs ) );

		$image = wpb_getImageBySize( array( 'attach_id' => $image, 'thumb_size' => 'full' ));
		$image = $image['thumbnail'];

		$out = '<div class="dt-sc-keynote-speakers '.$class.'">';
			$out .= '<div class="dt-sc-speakers-thumb">';
				$out .= '<div class="dt-sc-speakers-thumb-holder">';
				$out .= !empty( $image ) ? $image : '';
				
					$out .= '<div class="dt-sc-speakers-thumb-overlay">';
					
						$sociables = array('fa-dribbble' => 'dribble', 'fa-flickr' => 'flickr', 'fa-github' => 'github', 'fa-pinterest' => 'pinterest','fa-twitter' => 'twitter', 'fa-youtube' => 'youtube', 'fa-android' => 'android', 'fa-dropbox' => 'dropbox', 'fa-instagram' => 'instagram', 'fa-windows' => 'windows', 'fa-apple' => 'apple', 'fa-facebook' => 'facebook', 'fa-google-plus' => 'google', 'fa-linkedin' => 'linkedin', 'fa-skype' => 'skype', 'fa-tumblr' => 'tumblr', 'fa-vimeo-square' => 'vimeo', 'fa-behance' => 'behance');
	
						$s = "";
						foreach ( $sociables as $key => $value ) {
							if(is_array($attrs) && array_key_exists($value, $attrs) && $attrs[$value] != '')
								$s .= '<li><a class="fa '.$key.'" href="'.$attrs[$value].'" title="'.ucfirst($value).'"></a></li>';
						}
						$s = ! empty ( $s ) ? "<ul class='dt-sc-team-social hexagon-border'>$s</ul>" : "";
						$out .= $s;
						
					$out .= '</div>';
				$out .= '</div>';
				$out .= "<h4>{$name}</h4>";
				$out .= "<h5>{$role}</h5>";
			$out .= '</div>';
			$out .= '<div class="dt-sc-speakers-details">';
				$out .= DTCoreShortcodesDefination::dtShortcodeHelper( $content );
			$out .= '</div>';
		$out .= '</div>';

		return $out;
	}

	/**
	 * tetimonials
	 * @return string
	 */
	function dt_sc_testimonial($attrs, $content = null) {
		extract ( shortcode_atts ( array (
			'type' => 'type1',
			'image' => '',
			'name' => '',
			'role' => '',
			'class' => ''
		), $attrs ) );

		$image = wpb_getImageBySize( array( 'attach_id' => $image, 'thumb_size' => 'full' ));
		$image = $image['thumbnail'];
		$image = !empty( $image ) ? $image : '';

		$out = '<div class="dt-sc-testimonial-wrapper">';
			$out .= "<div class='dt-sc-testimonial {$type} {$class}'>";
				$img = ""; $con = "";

				$img = '<div class="dt-sc-testimonial-author">';
					if(!empty($image))
						$img .= "<span>".$image."</span>";
					if((!empty($name) || !empty($role)) && $type != 'type7' ):
						$img .= '<cite>';
							if(!empty($name))
								$img .= $name;
							if(!empty($role))
								$img .= "<small>{$role}</small>";
						$img .= '</cite>';
					endif;
				$img .= '</div>';
	
				$con = '<div class="dt-sc-testimonial-quote">';
					$con .= '<blockquote>';
						$con .= '<q>'.DTCoreShortcodesDefination::dtShortcodeHelper ( strip_tags($content) ).'</q>';
						if((!empty($name) || !empty($role)) && $type == 'type7' ):
							$con .= '<cite>';
								if(!empty($name))
									$con .= $name;
								if(!empty($role))
									$con .= "<small>{$role}</small>";
							$con .= '</cite>';
						endif;
					$con .= '</blockquote>';
				$con .= '</div>';

				if($type == 'type1' || $type == 'type3' || $type == 'type6' || $type == 'type7' || $type == 'type8')
					$out .= $img.$con;
				else
					$out .= $con.$img;

			$out .= '</div>';
        $out .= '</div>';

		return $out;		
	}

	/**
	 * tetimonials carousel wrapper
	 * @return string
	 */
	function dt_sc_tm_carousel_wrapper($attrs, $content = null) {
		extract ( shortcode_atts ( array (
			'type' => 'type2',
			'animation' => 'scroll',
			'class' => ''
		), $attrs ) );


		$content = str_replace('[dt_sc_tm_carousel_item', '[dt_sc_tm_carousel_item type="'.$type.'"', $content );
		$content = DTCoreShortcodesDefination::dtShortcodeHelper ( $content );

		$out = "<div class='dt-sc-testimonial-wrapper carousel_items {$type} {$class}' data-animation='{$animation}'>";
			$out .= '<ul class="dt-sc-testimonial-carousel">';
			$out .= $content;
			$out .= '</ul>';
			$out .= '<div class="carousel-arrows">';
			$out .= '	<a href="#" class="testimonial-prev"> </a>';
			$out .= '	<a href="#" class="testimonial-next"> </a>';
			$out .= '</div>';
		$out .= '</div>';

		return $out;
	}

	/**
	 * fullwidth tetimonials carousel wrapper
	 * @return string
	 */
	function dt_sc_fw_tm_wrapper($attrs, $content = null) {
		extract ( shortcode_atts ( array (
			'title' => '',
			'class' => ''
		), $attrs ) );
		
		preg_match_all( '/\[dt_sc_tm_carousel_item (.*?)\](.*?)\[\/dt_sc_tm_carousel_item\]/', $content, $matches);
		# $matches[1] = testimonial attrs
		# $matches[2] = testimonial content

		# To get attributes
		$authors = array();		
		foreach( $matches[1] as $a ) {
			array_push( $authors , shortcode_parse_atts($a) );
		}
		
		$out = '<div class="dt-sc-special-testimonial-container '.$class.'">';
		
		$out .= '<div class="wpb_column vc_column_container vc_col-sm-6 dt-sc-highlight extend-bg-fullwidth-left extend-bg-color-skin">';
		$out .= '	<div class="vc_column-inner">';
		$out .= '		<div class="wpb_wrapper">';
		$out .= '			<div class="alignright">';
		$out .= 				!empty($title) ? '<h2>'.$title.'</h2>' : '';
		$out .= '				<div class="dt-sc-hr-invisible-xsmall"> </div>';
		$out .= '				<div class="dt-sc-clear"></div>';
		$out .= '				<div class="dt-sc-testimonial-special-wrapper">';
		$out .= '					<ul class="dt-sc-testimonial-special">';
							foreach( $matches[2] as $key => $content ) {
								
								$name = isset( $authors[$key]['name'] ) ? $authors[$key]['name'] : '';
								$role = isset( $authors[$key]['role'] ) ? '<small>'.$authors[$key]['role'].'</small>' : '';
								
								$out .= '<li class="dt-sc-testimonial-wrapper">';
								$out .= '	<div class="dt-sc-testimonial special-testimonial-carousel">';
								$out .= '		<div class="dt-sc-testimonial-quote"><blockquote><q>'.$content.'</q></blockquote></div>';
								$out .= '		<div class="dt-sc-testimonial-author">';
								$out .=	'			<cite>'.$name.$role.'</cite>';
								$out .= '		</div>';
								$out .= '	</div>';
								$out .= '</li>';
							}
		$out .= '			</ul>';
		$out .= '				</div>';		
		$out .= '			</div>';
		$out .= '		</div>';
		$out .= '	</div>';
		$out .= '</div>';

		$out .= '<div class="wpb_column vc_column_container vc_col-sm-6">';
		$out .= '	<div class="vc_column-inner">';
		$out .= '		<div class="wpb_wrapper">';
		$out .= '			<ul class="dt-sc-testimonial-images">';
								foreach( $matches[1] as $attributes ){
									
									$a = shortcode_parse_atts($attributes);
									
									$image = wpb_getImageBySize( array( 'attach_id' => $a['image'], 'thumb_size' => 'full' ));
									$image = $image['thumbnail'];
									$image = !empty( $image ) ? $image : '<img src="http://place-hold.it/320x340"/>';
									
									$out .= '<li><div><a href="">'.$image.'</a></div></li>';
								}
		$out .= '			</ul>';
		$out .= '		</div>';
		$out .= '	</div>';
		$out .= '</div>';
		
		$out .= '</div>';
		
		return $out;		
	}

	/**
	 * tetimonial carousel item
	 * @return string
	 */
	function dt_sc_tm_carousel_item($attrs, $content = null) {
		extract ( shortcode_atts ( array (
			'type' => '',
			'name' => '',
			'role' => '',
			'image' => '',
			'class' => ''
		), $attrs ) );

		$image = wpb_getImageBySize( array( 'attach_id' => $image, 'thumb_size' => 'full' ));
		$image = $image['thumbnail'];
		$image = !empty( $image ) ? $image : '';

		$out = '<li>';
			$out .= "<div class='dt-sc-testimonial {$type} {$class}'>";
				$img = ""; $con = "";

				$img = '<div class="dt-sc-testimonial-author">';
					if(!empty($image))
						$img .= "<span>".$image."</span>";
					if((!empty($name) || !empty($role)) && $type != 'type7' ):
						$img .= '<cite>';
							if(!empty($name))
								$img .= $name;
							if(!empty($role))
								$img .= "<small>{$role}</small>";
						$img .= '</cite>';
					endif;
				$img .= '</div>';
	
				$con = '<div class="dt-sc-testimonial-quote">';
					$con .= '<blockquote>';
						$con .= '<q>'.DTCoreShortcodesDefination::dtShortcodeHelper ( strip_tags($content) ).'</q>';
						if((!empty($name) || !empty($role)) && $type == 'type7' ):
							$con .= '<cite>';
								if(!empty($name))
									$con .= $name;
								if(!empty($role))
									$con .= "<small>{$role}</small>";
							$con .= '</cite>';
						endif;
					$con .= '</blockquote>';
				$con .= '</div>';

				if($type == 'type1' || $type == 'type3' || $type == 'type6' || $type == 'type7' || $type == 'type8')
					$out .= $img.$con;
				else
					$out .= $con.$img;

			$out .= '</div>';
        $out .= '</li>';

		return $out;
	}

	/**
	 * partners carousel
	 * @return string
	 */
	function dt_sc_partners_carousel($attrs, $content = null) {
		extract ( shortcode_atts ( array (
			'images' => '',
			'scroll' => '3',
			'visible' => '3',
		), $attrs ) );

		if( !empty($images) ) :

			$images = explode( ',', $images );

			$out = '<div class="dt-sc-partners-carousel-wrapper" data-scroll="'.esc_attr($scroll).'" data-visible="'.esc_attr($visible).'">';

				$out .= "<ul class='dt-sc-partners-carousel'>";
							foreach ( $images as $attach_id ):
								if ( $attach_id > 0 ) :
									$post_thumbnail = wpb_getImageBySize( array( 'attach_id' => $attach_id, 'thumb_size' =>'full' ) );
									$out .= '<li>'.$post_thumbnail['thumbnail'].'</li>';
								endif;
							endforeach;
				$out .= '</ul>';

				$out .= '<div class="carousel-arrows">';
					$out .= '<a href="" class="partners-prev"> </a>';
					$out .= '<a href="" class="partners-next"> </a>';
				$out .= '</div>';
			$out .= '</div>';

			return $out;
		endif;
	}

	/**
	 * images carousel
	 * @return string
	 */
	function dt_sc_images_carousel($attrs, $content = null) {
		extract ( shortcode_atts ( array (
			'images' => '',
		), $attrs ) );

		if( !empty($images) ) :

			$images = explode( ',', $images );

			$out = '<div class="dt-sc-images-wrapper">';

				$out .= "<ul class='dt-sc-images-carousel'>";
							foreach ( $images as $attach_id ):
								if ( $attach_id > 0 ) :
									$post_thumbnail = wpb_getImageBySize( array( 'attach_id' => $attach_id, 'thumb_size' =>'full' ) );
									$out .= '<li>'.$post_thumbnail['thumbnail'].'</li>';
								endif;
							endforeach;
				$out .= '</ul>';

				$out .= '<div class="carousel-arrows">';
					$out .= '<a href="" class="images-prev"> </a>';
					$out .= '<a href="" class="images-next"> </a>';
				$out .= '</div>';
			$out .= '</div>';

			return $out;
		endif;
	}

	/**
	 * hexagon wrapper
	 * @return string
	 */
	function dt_sc_hexagon_wrapper($attrs, $content = null) {
		extract ( shortcode_atts ( array (
			'image' => '',
			'title' => '',
			'subtitle' => '',
			'extratitle' => ''
		), $attrs ) );

		$image = wpb_getImageBySize( array( 'attach_id' => $image, 'thumb_size' => 'full' ));
		$image = $image['thumbnail'];


		$out = '<div class="dt-sc-hexagon-shape">';
			$out .= '<div class="dt-sc-hexagon-image">';
				$out .= '<span>';
					if( !empty($image) ):
						$out .= $image;
					endif;
				$out .= '</span>';
				$out .= '<div class="dt-sc-hexagon-image-overlay">';
					$out .= "<h3>{$title}</h3>";
					$out .= "<h2>{$subtitle}</h2>";
					$out .= "<h3>{$extratitle}</h3>";
				$out .= "</div>";
			$out .= "</div>";

			$out .= '<ul class="dt-sc-hexagons">';
				$out .= do_shortcode(DTCoreShortcodesDefination::dtShortcodeHelper ( $content ));
			$out .= '</ul>';
		$out .= '</div>';

		return $out;
	}

	/**
	 * hexagon item
	 * @return string
	 */
	function dt_sc_hexagon_item($attrs, $content = null) {
		extract ( shortcode_atts ( array (
			'icon' => '',
			'title' => ''
		), $attrs ) );

		$out = '<li>';
			$out .= "<span class='{$icon}'> </span>";
			$out .= "<div class='dt-sc-hexagon-overlay'> <p>{$title}</p> </div>";
		$out .= '</li>';

		return $out;
	}

	function dt_sc_single_hexagon( $attrs, $content = null ){
		extract ( shortcode_atts ( array (
			'icon_type' => 'fontawesome', #VC
			'iconclass' => 'fa fa-home',
			'icon_css_class' => '',
			'title' => '',
			'class' => ''
		), $attrs ) );

		$icon = ( $icon_type == 'fontawesome' ) ? $iconclass : $icon_css_class;

		$out = "<div class='dt-sc-single-hexagon {$class}'>";
			$out .= "<span class='{$icon}'> </span>";
			$out .= "<div class='dt-sc-single-hexagon-overlay'> <p>{$title}</p> </div>";
		$out .= '</div>';
		return $out;
	}

	/**
	 * twitter tweets
	 * @return string
	 */
	function dt_sc_twitter_tweets($attrs, $content = null) {
		extract ( shortcode_atts ( array (
			'consumerkey' => '',
			'consumersecret' => '',
			'accesstoken' => '',
			'accesstokensecret' => '',
			'username' => '',
			'useravatar' => 'no'
		), $attrs ) );

		$out = '';

		if($username && $consumerkey && $consumersecret && $accesstoken && $accesstokensecret) {
			$transName = 'list_tweets';
			$cacheTime = 10;

			require_once(VEDA_CORE_PLUGIN."/apis/twitteroauth/twitteroauth.php");

			$twitterConnection = new TwitterOAuth($consumerkey, $consumersecret, $accesstoken, $accesstokensecret );
			$twitterData = $twitterConnection->get('statuses/user_timeline',array('screen_name' => $username, 'count' => 5,'exclude_replies' => true));

			if($twitterConnection->http_code != 200)
				$twitterData = get_transient($transName);

			set_transient($transName, $twitterData, 60 * 10);
			$twitter = get_transient($transName);

			$out .= '<div class="dt-sc-twitter-feeds">';
				$out .= '<div class="dt-sc-twitter-icon"> <span class="fa fa-twitter"> </span> </div>';

				if($twitter && is_array($twitter)) {
					$out .= '<div class="dt-sc-twitter-carousel-wrapper">';
						$out .= '<ul class="dt-sc-twitter-carousel">';

							foreach( $twitter as $tweet ):
								$latestTweet = $tweet->text;
								$latestTweet = preg_replace('/http:\/\/([a-z0-9_\.\-\+\&\!\#\~\/\,]+)/i', '<a href="http://$1" target="_blank">http://$1</a>', $latestTweet);
								$latestTweet = preg_replace('/@([a-z0-9_]+)/i', '<a href="http://twitter.com/$1" target="_blank">@$1</a>', $latestTweet);

								$twitterTime = strtotime($tweet->created_at);
								$twitterTime = !empty($tweet->utc_offset) ? $twitterTime+($tweet->utc_offset ) : $twitterTime;
								$timeAgo = date_i18n(  get_option('date_format'), $twitterTime );

								$out .= '<li class="dt-sc-tweet">';
									if( $useravatar == 'yes' )
										$out .= '<span class="tweet-thumb"><a href="http://twitter.com/'.$username.'" title=""><img src="'.$tweet->user->profile_image_url.'" alt="thumb" /></a></span>';
										$out .= '<span class="tweet-text">'.$latestTweet.'</span>';
										$out .= "<span class='tweet-time'>{$timeAgo}</span>";
								$out .= '</li>';
							endforeach;

						$out .= '</ul>';
					$out .= '</div>';
				} else {
					$out .= '<div class="no-tweets">'.esc_html__('No Twitter Tweets found.','veda-core').'</div>';
				}
			$out .= '</div>';
		} else {
			$out .= '<div class="no-tweets">'.esc_html__('Invalid Twitter Authentication keys.','veda-core').'</div>';
		}

		return $out;
	}

	/**
	 * triangle wrapper
	 * @return string
	 */
	function dt_sc_triangle_wrapper($attrs, $content = null, $shortcodename = "") {
		extract ( shortcode_atts ( array (
			'title' => '',
			'subtitle' => '',
			'image' => '',
			'link' => '',
			'type' => ''
		), $attrs ) );

		$image = wpb_getImageBySize( array( 'attach_id' => $image, 'thumb_size' => 'full' ));
		$image = $image['thumbnail'];

		//parse link by vc
		$link = ( '||' === $link ) ? '' : $link;
		$link = vc_build_link( $link );
		$a_href = $link['url'];
		$a_title = $link['title'];
		$a_target = $link['target'];


		$out = "<div class='dt-sc-triangle-wrapper {$type}'>";

			$img = '<div class="dt-sc-triangle-img">';
				$img .= '<div class="dt-sc-triangle-img-crop">';
				$img .= "<a href='".$a_href."' title='".$a_title."' target='".$a_target."'>".$image."</a>";
				$img .= '</div>';
			$img .= '</div>';

			$text = '<div class="dt-sc-triangle-content">';
				$text .= "<h4>{$title}</h4>";
				$text .= "<h5>{$subtitle}</h5>";
			$text .= '</div>';

			if($type == 'alter')
				$out .= $text . $img;
			else
				$out .= $img . $text;

		$out .= '</div>';

		return $out;
	}

	/**
	 * popular content box
	 * @return string
	 */
	function dt_sc_popular_content($attrs, $content = null, $shortcodename = "") {
		extract ( shortcode_atts ( array (
			'image' => '',
			'title' => '',
			'duration' => '',
			'price' => ''
		), $attrs ) );

		$image = wpb_getImageBySize( array( 'attach_id' => $image, 'thumb_size' => 'full' ));
		$image = $image['thumbnail'];		

		$out = '<div class="dt-sc-popular-procedures">';
			if(!empty($image))
				$out .= "<div class='image'>".$image."</div>";
			
			$out .= '<div class="details">';
				$out .= "<h3>{$title}</h3>";
				$out .= "<span class='duration'>{$duration}</span>";
				$out .= "<span class='price'>{$price}</span>";
				$out .= DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
			$out .= '</div>';
		$out .= '</div>';

		return $out;
	}

	/**
	 * domain wrapper
	 * @return string
	 */
	function dt_sc_domains_wrapper( $attrs, $content = null ){
		extract( shortcode_atts( array( 
			'class' => ''
		) , $attrs ) );

		$out = "<ul class='available-domains {$class}'>";
			$out .= DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
		$out .= "</ul>";

		return $out;
	}

	/**
	 * domian box
	 * @return string
	 */
	function dt_sc_domain_box( $attrs, $content = null ){
		extract( shortcode_atts( array( 
			'domain' => '',
			'icon' => '',
			'title' => '',
			'price' => '',
			'link' =>'', 
			'class' => ''
		) , $attrs ) );

		//parse link by vc
		$link = ( '||' === $link ) ? '' : $link;
		$link = vc_build_link( $link );
		$a_href = $link['url'];
		$a_title = $link['title'];
		$a_target = $link['target'];


		$out = '<li class="'.$class.'">';
			if(!empty($domain))
				$out .= '<div class="tdl">'.$domain.'</div>';

			if(!empty($icon))
				$out .= '<span class="'.$icon.'"></span>';

			if(!empty($title))
				$out .= '<p>'.$title.'</p>';

			if(!empty($price))
				$out .= '<span class="price">'.$price.'</span>';

			$out .= '<a class="dt-sc-button" title="'.$a_title.'" href="'.$a_href.'" target="'.$a_target.'">'.$a_title.'</a>';
		$out .= '</li>';

		return $out;
	}

	function dt_sc_post( $attrs, $content = null ){
		extract( shortcode_atts( array( 
			'id' => 1,
			'style' => '',
			'allow_excerpt' => "yes",
			'excerpt_length' => 40,
			'show_post_format' => "yes",
			'show_author' => "yes",
			'show_date' => "yes",
			'show_comment' => "yes",
			'show_category' => "yes",
			'show_tag' => "yes"
		) , $attrs ) );

		$hide_post_format = strtolower( $show_post_format )  == "yes" ? "" : "hidden";
		$hide_author_meta = strtolower( $show_author == "yes" ) ? "" : "hidden";
		$hide_date_meta = strtolower( $show_date == "yes" ) ? "" : "hidden";
		$hide_comment_meta = strtolower( $show_comment == "yes" ) ? "" : "hidden";
		$hide_category_meta = strtolower( $show_category == "yes" ) ? "" : "hidden";
		$hide_tag_meta = strtolower( $show_tag == "yes" ) ? "" : "hidden";

		$out = "";
		$args = array(
			'post_type' => 'post',
			'p'	=> $id,
			'post_status' => 'publish'
		);

		$the_query = new WP_Query( $args );

		if( $the_query->have_posts() ):
			while( $the_query->have_posts() ):

				$the_query->the_post();

				$title = get_the_title( $id );
				$format = get_post_format(  $id );
				$format_link = 	get_post_format_link( $format );
				$link = get_permalink( $id );

				$post_meta = get_post_meta($id ,'_dt_post_settings',TRUE);
				$post_meta = is_array($post_meta) ? $post_meta : array();

				$post_classes = get_post_class( array('blog-entry',$style) , $id );
				$post_classes = implode(' ',$post_classes );

				$out .= '<article id="post-'.esc_attr($id).'" class="'.esc_attr($post_classes).'">';
					#Featured Image
					if( $format == "image" || empty($format) ) :
						if( has_post_thumbnail() ) :
							$out .= '<div class="entry-thumb">';
							$out .= '	<a href="'.esc_url($link).'">'.get_the_post_thumbnail( $id, 'full' ).'</a>';
							$out .= '	<div class="entry-format '.esc_attr($hide_post_format).'">';
							$out .= '		<a class="ico-format" href="'.esc_url(get_post_format_link( $format )).'"></a>';
							$out .= '	</div>';
							$out .= '</div>';
						endif;
					elseif( $format === "gallery" ) :
						if( array_key_exists("items", $post_meta) ) :
							$out .= '<div class="entry-thumb">';
							$out .= '	<ul class="entry-gallery-post-slider">';
											foreach ( $post_meta['items'] as $item ) {
												$out .= "<li><img src='". esc_url($item)."' alt=''/></li>";
											}
							$out .= '	</ul>';
							$out .= '	<div class="entry-format '.esc_attr($hide_post_format).'">';
							$out .= '		<a class="ico-format" href="'.esc_url(get_post_format_link( $format )).'"></a>';
							$out .= '	</div>';
							$out .= '</div>';
						elseif( has_post_thumbnail() ):	
							$out .= '<div class="entry-thumb">';
							$out .= '	<a href="'.esc_url($link).'">'.get_the_post_thumbnail( $id, 'full' ).'</a>';
							$out .= '	<div class="entry-format '.esc_attr($hide_post_format).'">';
							$out .= '		<a class="ico-format" href="'.esc_url(get_post_format_link( $format )).'"></a>';
							$out .= '	</div>';
							$out .= '</div>';
						endif;
					elseif( $format === "video" ) :
						if( array_key_exists('oembed-url', $post_meta) || array_key_exists('self-hosted-url', $post_meta) ) :
							$out .= '<div class="entry-thumb">';
							$out .= '	<div class="dt-video-wrap">';
											if( array_key_exists('oembed-url', $post_meta) ) :
												$out .= wp_oembed_get($post_meta['oembed-url']);
											elseif( array_key_exists('self-hosted-url', $post_meta) ) :
												$out .= wp_video_shortcode( array('src' => $post_meta['self-hosted-url']) );
											endif;
							$out .='	</div>';
							$out .= '	<div class="entry-format '.esc_attr($hide_post_format).'">';
							$out .= '		<a class="ico-format" href="'.esc_url(get_post_format_link( $format )).'"></a>';
							$out .= '	</div>';
							$out .= '</div>';
						elseif( has_post_thumbnail() ):	
							$out .= '<div class="entry-thumb">';
							$out .= '	<a href="'.esc_url($link).'">'.get_the_post_thumbnail( $id, 'full' ).'</a>';
							$out .= '	<div class="entry-format '.esc_attr($hide_post_format).'">';
							$out .= '		<a class="ico-format" href="'.esc_url(get_post_format_link( $format )).'"></a>';
							$out .= '	</div>';
							$out .= '</div>';
						endif;
					elseif( $format === "audio" ) :
						if( array_key_exists('oembed-url', $post_meta) || array_key_exists('self-hosted-url', $post_meta) ) :
							$out .= '<div class="entry-thumb">';
								if( array_key_exists('oembed-url', $post_meta) ) :
									$out .= wp_oembed_get($post_meta['oembed-url']);
								elseif( array_key_exists('self-hosted-url', $post_meta) ) :
									$out .= wp_audio_shortcode( array('src' => $post_meta['self-hosted-url']) );
								endif;
							$out .= '	<div class="entry-format '.esc_attr($hide_post_format).'">';
							$out .= '		<a class="ico-format" href="'.esc_url(get_post_format_link( $format )).'"></a>';
							$out .= '	</div>';
							$out .= '</div>';										
						elseif( has_post_thumbnail() ):	
							$out .= '<div class="entry-thumb">';
							$out .= '	<a href="'.esc_url($link).'">'.get_the_post_thumbnail( $id, 'full' ).'</a>';
							$out .= '	<div class="entry-format '.esc_attr($hide_post_format).'">';
							$out .= '		<a class="ico-format" href="'.esc_url(get_post_format_link( $format )).'"></a>';
							$out .= '	</div>';
							$out .= '</div>';
						endif;
					else:
						if( has_post_thumbnail() ) :
							$out .= '<div class="entry-thumb">';
							$out .= '	<a href="'.esc_url($link).'">'.get_the_post_thumbnail( $id, 'full' ).'</a>';
							$out .= '	<div class="entry-format '.esc_attr($hide_post_format).'">';
							$out .= '		<a class="ico-format" href="'.esc_url(get_post_format_link( $format )).'"></a>';
							$out .= '	</div>';
							$out .= '</div>';
						endif;
					endif;
					#Featured Image
					
					#Content
					if( $style == "entry-date-left") :

						$tclass = ( ($hide_date_meta == "hidden" ) && ($hide_comment_meta == "hidden" ) ) ? "hidden" : ""; 
						$out .= '<div class="entry-details '.esc_attr($tclass).'">';

						$out .= '	<div class="entry-date">';
						$out .= '		<div class="'.esc_attr($hide_date_meta).'">';
						$out .= 			get_the_date('d').'<span>'.get_the_date('M').'</span>';
						$out .= '		</div>';

						$out .= '		<div class="comments '.esc_attr($hide_comment_meta).'">';
											$commenttext = "";

											if((wp_count_comments($id)->approved) == 0):
												$commenttext = '0 ';
											else:
												$commenttext = wp_count_comments($id)->approved;
											endif;

											$out .= '<a class="comments" href="'.esc_url($link).'/#respond">';
											$out .= '	<i class="pe-icon pe-chat"></i>'.esc_html($commenttext);
											$out .= '</a>';
						$out .= '		</div>';
						$out .= '	</div>';

						$out .= '	<div class="entry-title">';
						$out .= '		<h4><a href="'.esc_url($link).'">'.esc_html($title).'</a></h4>';	
						$out .= '	</div>';

									if( strtolower($allow_excerpt) == 'yes' ):
										$out .= '<div class="entry-body">'.veda_excerpt($excerpt_length).'</div>';
									endif;

						$tclass = ( ($hide_author_meta == "hidden" ) && ($hide_tag_meta == "hidden" ) && ($hide_category_meta == "hidden" ) ) ? "hidden" : "";

						$out .= '	<div class="entry-meta-data '.esc_attr($tclass).'">';
						$out .= '		<p class="author '.esc_attr( $hide_author_meta ).'">';
						$out .= '			<i class="pe-icon pe-user"> </i>';
						$out .= '			<a href="'.get_author_posts_url(get_the_author_meta('ID')).'">'.get_the_author().'</a>';
						$out .= '		</p>';

										$tags = wp_get_post_tags($id);
										if( !empty($tags) ):
											$count = count($tags);
											$out .= '<p class="tags '.esc_attr($hide_tag_meta).'">';
											$out .= '	<i class="pe-icon pe-ticket"> </i>';
														foreach( $tags as $key => $term ) {
															$out .= '<a href="'.get_term_link( $term->slug ,'post_tag').'">'.esc_html( $term->name ).'</a>';
															$key += 1;

															if( $key !== $count ){
																$out .= ', ';
															}
														}
											$out .= '</p>';
										endif;

										$cats = wp_get_object_terms($id,'category');
										if( !empty($cats) ):
											$count = count($cats);
											$out .= '<p class="category '.esc_attr($hide_category_meta).'">';
											$out .= '	<i class="pe-icon pe-network"> </i>';	
														foreach( $cats as $key => $term ) {
															$out .= '<a href="'.get_term_link( $term->slug ,'category').'">'.esc_html( $term->name ).'</a>';
															$key += 1;

															if( $key !== $count ){
																$out .= ', ';
															}
														}
											$out .= '</p>';
										endif;	
						$out .= '	</div>';

									$content = stripslashes( $content );
									$sc = DTCoreShortcodesDefination::dtShortcodeHelper ( $content );	
									$sc = str_replace("href='#'",'href="'.$link.'"',$sc);
									$out .= $sc;

						$out .= '</div>';
					elseif( $style == "entry-date-author-left"):

                        $tclass = ( ($hide_date_meta == "hidden" ) && ($hide_comment_meta == "hidden" ) && ($hide_author_meta == "hidden" ) ) ? "hidden" : "";
						$out .= '<div class="entry-date-author '.esc_attr($tclass).'">';
						$out .= '	<div class="entry-date '.esc_attr($hide_date_meta).'">';
						$out .= 		 get_the_date('d').'<span>'.get_the_date('M').'</span>';
						$out .= '	</div>';
						$out .= '	<div class="entry-author '.esc_attr( $hide_author_meta ).'">';
						$out .=			 get_avatar(get_the_author_meta('ID'), 72 );
						$out .= '			<a href="'.get_author_posts_url(get_the_author_meta('ID')).'">'.get_the_author().'</a>';									
						$out .= '	</div>';
						$out .= '	<div class="comments '.esc_attr($hide_comment_meta).'">';

										$commenttext = "";
										if((wp_count_comments($id)->approved) == 0):
											$commenttext = '0 ';
										else:
											$commenttext = wp_count_comments($id)->approved;
										endif;

										$out .= '<a class="comments" href="'.esc_url($link).'/#respond">';
										$out .= '	<i class="pe-icon pe-comment"></i>'.esc_html($commenttext);
										$out .= '</a>';
						$out .= '	</div>';
						$out .= '</div>';

						$out .= '<div class="entry-details">';

						$out .= '	<div class="entry-title">';
						$out .= '		<h4><a href="'.esc_url($link).'">'.esc_html($title).'</a></h4>';	
						$out .= '	</div>';

									if( strtolower($allow_excerpt) == 'yes' ):
										$out .= '<div class="entry-body">'.veda_excerpt($excerpt_length).'</div>';
									endif;

						$tclass = ( ($hide_tag_meta == "hidden" ) && ($hide_category_meta == "hidden" ) ) ? "hidden" : ""; 
						$out .= '	<div class="entry-meta-data '.esc_attr($tclass).'">';

										$tags = wp_get_post_tags($id);
										if( !empty($tags) ):
											$count = count($tags);

											$out .= '<p class="tags '.esc_attr($hide_tag_meta).'">';
											$out .= '	<i class="pe-icon pe-ticket"> </i>';
															foreach( $tags as $key => $term ) {
																$out .= '<a href="'.get_term_link( $term->slug ,'post_tag').'">'.esc_html( $term->name ).'</a>';
																$key += 1;

																if( $key !== $count ){
																	$out .= ', ';
																}
															}
											$out .= '</p>';
										endif;

										$cats = wp_get_object_terms($id,'category');
										if( !empty($cats) ):
											$count = count($cats);

											$out .= '<p class="category '.esc_attr($hide_category_meta).'">';
											$out .= '	<i class="pe-icon pe-network"> </i>';	
															foreach( $cats as $key => $term ) {
																$out .= '<a href="'.get_term_link( $term->slug ,'category').'">'.esc_html( $term->name ).'</a>';
																$key += 1;

																if( $key !== $count ){
																	$out .= ', ';
																}
															}
											$out .= '</p>';
										endif;	
						$out .= '	</div>';

									$content = stripslashes( $content );
									$sc = DTCoreShortcodesDefination::dtShortcodeHelper ( $content );	
									$sc = str_replace("href='#'",'href="'.$link.'"',$sc);
									$out .= $sc;
						$out .= '</div>';
					else:

						$tclass = ( ($hide_date_meta == "hidden" ) && ($hide_comment_meta == "hidden" ) && ($hide_author_meta == "hidden" ) ) ? "hidden" : "";
						$out .= '<div class="entry-details">';
						$out .= '	<div class="entry-meta '.esc_attr($tclass).'">';
						$out .= '		<div class="date '.esc_attr($hide_date_meta).'">';
						$out .= 			esc_html__('Posted on','veda-core').get_the_date(' d M Y');
						$out .= '		</div>';
						$out .= '		<div class="comments '.esc_attr($hide_comment_meta).'">';
											$commenttext = "";
											if((wp_count_comments($id)->approved) == 0):
												$commenttext = '0 ';
											else:
												$commenttext = wp_count_comments($id)->approved;
											endif;
											$out .= '/ <a class="comments" href="'.esc_url($link).'/#respond">';
											$out .= '	<i class="pe-icon pe-chat"></i> '.esc_html($commenttext).' '.esc_html__('Comments','veda-core');
											$out .= '</a>';
						$out .= '		</div>';
						$out .= '		<div class="author '.esc_attr( $hide_author_meta ).'">';
						$out .= '			/ <i class="pe-icon pe-user"> </i>';
						$out .= '			<a href="'.get_author_posts_url(get_the_author_meta('ID')).'">'.get_the_author().'</a>';
						$out .= '		</div>';
						$out .= '	</div>';

						$out .= '	<div class="entry-title">';
						$out .= '		<h4><a href="'.esc_url($link).'">'.esc_html($title).'</a></h4>';	
						$out .= '	</div>';

									if( strtolower($allow_excerpt) == 'yes' ):
										$out .= '<div class="entry-body">'.veda_excerpt($excerpt_length).'</div>';
									endif;


									$tclass = ( ($hide_tag_meta == "hidden" ) && ($hide_category_meta == "hidden" ) ) ? "hidden" : "";
						$out .= '	<div class="entry-meta-data '.esc_attr($tclass).'">';
										$tags = wp_get_post_tags($id);

										if( !empty($tags) ):
											$count = count($tags);
											$out .= '<p class="tags '.esc_attr($hide_tag_meta).'">';
											$out .= '	<i class="pe-icon pe-ticket"> </i>';

														foreach( $tags as $key => $term ) {
															$out .= '<a href="'.get_term_link( $term->slug ,'post_tag').'">'.esc_html( $term->name ).'</a>';
															$key += 1;
															if( $key !== $count ){
																$out .= ', ';
															}
														}
											$out .= '</p>';
										endif;

										$cats = wp_get_object_terms($id,'category');
										if( !empty($cats) ):
											$count = count($cats);
											$out .= '<p class="category '.esc_attr($hide_category_meta).'">';
											$out .= '	<i class="pe-icon pe-network"> </i>';	
															foreach( $cats as $key => $term ) {
																$out .= '<a href="'.get_term_link( $term->slug ,'category').'">'.esc_html( $term->name ).'</a>';
																$key += 1;
																if( $key !== $count ){
																	$out .= ', ';
																}
															}
											$out .= '</p>';
										endif;	
						$out .= '	</div>';

									$content = stripslashes( $content );
									$sc = DTCoreShortcodesDefination::dtShortcodeHelper ( $content );	
									$sc = str_replace("href='#'",'href="'.$link.'"',$sc);
									$out .= $sc;
						$out .= '</div>';					
					endif;
					#Content								
				$out .= '</article>';
			endwhile;
		endif;
		wp_reset_postdata($the_query);
		return $out;
	}

	function dt_sc_recent_post( $attrs, $content = null ){

		global $post;
		$tpl_default_settings = get_post_meta( $post->ID, '_tpl_default_settings', TRUE );
		$tpl_default_settings = is_array( $tpl_default_settings ) ? $tpl_default_settings  : array();
		$page_layout  = array_key_exists( "layout", $tpl_default_settings ) ? $tpl_default_settings['layout'] : "content-full-width";
		$show_sidebar = false;
		$container_class = $post_class = $out = "";

		if( $page_layout == "content-full-width" ) {
			$show_sidebar = false;
		} else {
			$show_sidebar = true;
		}

		extract( shortcode_atts( array( 
			'count' => 3,
			'column' => 3,
			'category' => '',
			'style' => '',
			'allow_excerpt' => "yes",
			'excerpt_length' => 40,
			'show_post_format' => "yes",
			'show_author' => "yes",
			'show_date' => "yes",
			'show_comment' => "yes",
			'show_category' => "yes",
			'show_tag' => "yes"
		) , $attrs ) );

		switch( $column ) :
			default:
			case '1':
				$post_class = $show_sidebar ? "column dt-sc-one-column with-sidebar blog-fullwidth" : "column dt-sc-one-column blog-fullwidth";
				$column = 1;
			break;
			
			case '2':
				$post_class = $show_sidebar ? "column dt-sc-one-half with-sidebar" : "column dt-sc-one-half";
				$column = 2;
				$container_class = "apply-isotope";
			break;

			case '3':
				$post_class = $show_sidebar ? "column dt-sc-one-third with-sidebar" : "column dt-sc-one-third";
				$column = 3;
				$container_class = "apply-isotope";
			break;
		endswitch;

		$args = array( 'posts_per_page' => $count, 'orderby' => 'date' );
		$warning = esc_html__('No Posts Found','veda-core');
		
		if( !empty($category) ){
			$args = array( 'posts_per_page' => $count, 'orderby' => 'date', 'cat' => $category );
			$warning = esc_html__('No Posts Found in Category ','veda-core').$category;
		}

		$rposts = new WP_Query( $args );
		if ( $rposts->have_posts() ) :
			$i = 1;

			$out .= "<div class='tpl-blog-holder ".esc_attr( $container_class )."'>";

			while( $rposts->have_posts() ):
				$rposts->the_post();
				$the_id = get_the_ID();


				$temp_class = "";
				
				if($i == 1) $temp_class = $post_class." first"; else $temp_class = $post_class;
				if($i == $column) $i = 1; else $i = $i + 1;

				$out .= "<div class='".esc_attr( $temp_class )."'>";
							$sc = '[dt_sc_post id="'.$the_id.'" style="'.$style.'" allow_excerpt="'.$allow_excerpt.'" excerpt_length="'.$excerpt_length.'" show_post_format="'.$show_post_format.'" show_author="'.$show_author.'" show_date="'.$show_date.'" show_comment="'.$show_comment.'" show_category="'.$show_category.'" show_tag="'.$show_tag.'"]';
							$sc .= $content;							
							$sc .= '[/dt_sc_post]';
				$out .= do_shortcode($sc);
				$out .= '</div>';
			endwhile;
			$out .= '</div>';
		else:
			$out = "<div class='dt-sc-warning-box'>{$warning}</div>";
		endif;
		return $out;
	}

	function dt_sc_latest_news( $attrs, $content = null ){
		extract( shortcode_atts( array(
			'limit' => '3'
		), $attrs ) );

		global $post;
		$out = '';

		$args = array('post_type' => 'post', 'posts_per_page' => $limit, 'ignore_sticky_posts' => 1);
		$the_query = new WP_Query($args);
		
		if($the_query->have_posts()): $i = 1;
		 while($the_query->have_posts()): $the_query->the_post();

			$lastcls = ($i == $limit) ? 'last' : '';

			$out .= "<div class='blog-entry blog-thumb-style entry-date-left {$lastcls}'>";
				$out .= '<div class="entry-thumb">';
					$out .= get_the_post_thumbnail( get_the_ID(), 'blog-thumb' );
				$out .= '</div>';
				$out .= '<div class="entry-details">';
					$out .= '<div class="entry-date">'.get_the_date('d').'<span>'.get_the_date('M').'</span> </div>';
					$out .= '<div class="entry-title">';
						$out .= '<h4> <a title="'.get_the_title().'" href="'.get_permalink().'">'.get_the_title().'</a> </h4>';
					$out .= '</div>';
					$out .= '<div class="entry-body">';
						$out .= veda_excerpt(13);
					$out .= '</div>';
				$out .= '</div>';
			$out .= '</div>';
			$i = $i + 1;
		 endwhile;
		endif;
		
		wp_reset_postdata();

		return $out;
	}

	/* Related posts shortcode in post single */
	function dt_sc_blog_related_post( $attrs, $content = null ){
		extract( shortcode_atts( array(
			'id' => '',
			'post_class' => '',
			'post_style' => '',
		), $attrs ) );

		$cats = wp_get_post_categories($id);

		$args = array(
			'category__in'			=> $cats,
			'ignore_sticky_posts'	=> true,
			'no_found_rows'			=> true,
			'post__not_in'			=> array( $id ),
			'posts_per_page'		=> 3,
			'post_status'			=> 'publish');

		$hide_post_format = veda_option('pageoptions','post-format-meta'); 
		$hide_post_format = isset( $hide_post_format )? "yes" : "";
	
		$hide_author_meta = veda_option('pageoptions','post-author-meta');
		$hide_author_meta = isset( $hide_author_meta ) ? "yes" : "";
	
		$hide_date_meta = veda_option('pageoptions','post-date-meta');
		$hide_date_meta = isset( $hide_date_meta ) ? "yes" : "";	

		$hide_comment_meta = veda_option('pageoptions','post-comment-meta');
		$hide_comment_meta = isset( $hide_comment_meta ) ? "yes" : "";

		$hide_category_meta = veda_option('pageoptions','post-category-meta');
		$hide_category_meta = isset( $hide_category_meta ) ? "yes" : "";
	
		$hide_tag_meta = veda_option('pageoptions','post-tag-meta');
		$hide_tag_meta = isset( $hide_tag_meta ) ? "yes" : "";

		$allow_excerpt = veda_option('pageoptions','post-archives-enable-excerpt');
		$allow_excerpt = isset( $allow_excerpt ) ? "yes" : "no";
		$excerpt_length = veda_option('pageoptions','post-archives-excerpt');
	
		$allow_read_more = veda_option('pageoptions','post-archives-enable-readmore');
		$allow_read_more = isset( $allow_read_more ) ? "yes" : "no";
		$read_more = veda_option('pageoptions','post-archives-readmore');

		$out = '';

		$the_query = new WP_Query( $args );
		if( $the_query->have_posts() ) {
			$i = 1;

			$out .= '<div class="dt-sc-hr-invisible-small"></div>';
			$out .= '<div class="dt-sc-clear"></div>';
			$out .= '<section class="related-post">';
			$out .= 	'<h4>'.esc_html__('Related posts','veda-core').'</h4>';

			while ( $the_query->have_posts() ){
				$the_query->the_post();

				$temp_class = "";
				if($i == 1) $temp_class = $post_class." first"; else $temp_class = $post_class;
				if($i == 3 ) $i = 1; else $i = $i + 1;

				$the_id = get_the_id();
				$out .= '<div class="'.esc_attr($temp_class).'">';
							$sc = '[dt_sc_post id="'.$the_id.'" style="'.$post_style.'" allow_excerpt="'.$allow_excerpt.'" excerpt_length="'.$excerpt_length.'" show_post_format="'.$hide_post_format.'" show_author="'.$hide_author_meta.'" show_date="'.$hide_date_meta.'" show_comment="'.$hide_comment_meta.'" show_category="'.$hide_category_meta.'" show_tag="'.$hide_tag_meta.'"]';
							$sc .= $read_more;							
							$sc .= '[/dt_sc_post]';
				$out .= do_shortcode($sc);
				$out .= '</div>';
			}
			$out .= '</section>';
		}

		return $out;
	}	

	function dt_sc_portfolio_item( $attrs, $content = null ){

		global $post;
		$tpl_default_settings = get_post_meta( $post->ID, '_tpl_default_settings', TRUE );
		$tpl_default_settings = is_array( $tpl_default_settings ) ? $tpl_default_settings  : array();
		$page_layout  = array_key_exists( "layout", $tpl_default_settings ) ? $tpl_default_settings['layout'] : "content-full-width";
		$show_sidebar = false;

		if( $page_layout == "content-full-width" ) {
			$show_sidebar = false;
		} else {
			$show_sidebar = true;
		}

		$post_class = $show_sidebar ? "portfolio with-sidebar " : "portfolio ";

		extract( shortcode_atts( array( 
			'id' => 1,
			'style' => 'type1'
		) , $attrs ) );

		$post_class .= $style;
		
		$out = "";
		if( !empty( $id ) ){
			$p = get_post( $id );
			
			if( $p->post_type === "dt_portfolios" ) {

				$title = get_the_title($id);
				$permalink = get_permalink($id);
				$portfolio_item_meta = get_post_meta($id,'_portfolio_settings',TRUE);
				$portfolio_item_meta = is_array($portfolio_item_meta) ? $portfolio_item_meta  : array();
				$items = false;
				
				// setting up image
				if( array_key_exists('items_name', $portfolio_item_meta) ) {
					
					$items = true;
					$item =  $portfolio_item_meta['items_name'][0];
					$popup = $portfolio_item_meta['items'][0];
					
					if( "video" === $item ) {
						$x = array_diff( $portfolio_item_meta['items_name'] , array("video") );
						if( !empty($x) ) {
							$image = $portfolio_item_meta['items'][key($x)];
						} else {
							$image = 'http://place-hold.it/1170X902.jpg&text=Video';
	                    }								
					} else {
						if( sizeof($portfolio_item_meta['items']) > 1 ){
							$popup = $portfolio_item_meta['items'][1];
						}
						
						$image = $portfolio_item_meta['items'][0];
					}
				}
				
				if( has_post_thumbnail( $id ) ){
					$image = wp_get_attachment_image_src(get_post_thumbnail_id( $id ), 'full', false);
					$image = $popup = $image[0];
					
					if( !$items ){
						$popup = $image;
					}
				}elseif( $items ) {
					$image = $image;
					$popup = $popup;
				}else{
					$image = $popup = 'http://place-hold.it/1170X902.jpg&text='.$title;
				}				
				// setting up image end
				
				$out .= '<div id="dt_portfolios-'.esc_attr($id).'" class="'.esc_attr($post_class).'">';
				$out .= '	<figure>';
				$out .= '		<img src="'.esc_url($image).'" alt="'.esc_attr($title).'" title="'.esc_attr($title).'"/>';
				$out .= '		<div class="image-overlay">';
									if($style == "type3" ):
										$out .= '<div class="links">';
										$out .= 	'<a title="'.esc_attr($title).'" href="'.esc_url($permalink).'">'.esc_html($title).'</a>';
										$out .= '</div>';
									elseif( $style == "type4" || $style == "type6" ):
										$out .= '<div class="links">';
										$out .= 	'<a title="'.esc_attr($title).'" href="'.esc_url($permalink).'"><span class="icon icon-linked"> </span></a>';
										$out .= 	'<a title="'.esc_attr($title).'" data-gal="prettyPhoto[gallery]" href="'.esc_url($popup).'">';
										$out .= 	'	<span class="icon icon-search"> </span> </a>';
										$out .= '</div>';
									elseif( $style == "type1" || $style == "type2" || $style == "type5" || $style == "type7" || $style == "type8"):
										$out .= '<div class="links">';
										$out .= 	'<a title="'.esc_attr($title).'" href="'.esc_url($permalink).'"><span class="icon icon-linked"> </span></a>';
										$out .= 	'<a title="'.esc_attr($title).'" data-gal="prettyPhoto[gallery]" href="'.esc_url($popup).'">';
										$out .= 	'	<span class="icon icon-search"> </span> </a>';
										$out .= '</div>';
										$out .= '<div class="image-overlay-details">';
										$out .= '	<h2><a title="'.esc_attr($title).'" href="'.esc_url($permalink).'">'.esc_html($title).'</a></h2>';										
													if( $style != "type2" ):
														if( $style == "type7" ):
															$out .= get_the_term_list( $id, 'portfolio_entries', "<p class='categories'>", ' ', '</p>' );
														else:
															$out .= get_the_term_list( $id, 'portfolio_entries', "<p class='categories'>", ', ', '</p>' );
														endif;
													endif;
										$out .= '</div>';
									elseif( $style == "type9" ):
										$out .= '<div class="links">';
										$out .= 	'<a title="'.esc_attr($title).'" data-gal="prettyPhoto[gallery]" href="'.esc_url($popup).'">';
										$out .= 	'	<span class="pe-icon pe-plus"> </span></a>';
										$out .= '</div>';
									endif;
				$out .= '		</div>';
				$out .= '	</figure>';
				$out .= '</div>';
			}
		}
		wp_reset_postdata();
		return $out;
	}

	function dt_sc_portfolio_related_post( $attrs, $content = null ){
		extract( shortcode_atts( array(
			'id' => '',
			'post_class' => '',
			'post_style' => '',
		), $attrs ) );

		$terms = wp_get_object_terms( get_the_ID() ,'portfolio_entries' ,array('fields' => 'ids') );

		$args = array(
			'post_type'				=> 'dt_portfolios',
			'posts_per_page'		=> 3,
			'post__not_in'			=> array( $id ),
			'post_status'			=> 'publish',
			'ignore_sticky_posts'	=> true,
			'no_found_rows'			=> true,
			'tax_query'				=> array()
		);
		
		$args['tax_query'][] = array( 'taxonomy' => 'portfolio_entries',
			'field' => 'id',
			'terms' => $terms ,
			'operator' => 'IN');

		$out = '';

		$the_query = new WP_Query( $args );
		if( $the_query->have_posts() ) {
			$i = 1;
			
			while ( $the_query->have_posts() ){
				$the_query->the_post();

				$temp_class = "";
				if($i == 1) $temp_class = $post_class." first"; else $temp_class = $post_class;
				if($i == 3 ) $i = 1; else $i = $i + 1;
				
				$class = $temp_class.' '.$post_style;
				
				$the_id = get_the_id();
				$out .= '<div class="'.esc_attr($class).'">';
				$sc   = '[dt_sc_portfolio_item id="'.$the_id.'" style="'.$post_style.'"/]';
				$out .= do_shortcode($sc);
				$out .= '</div>';
			}
		}
		
		return $out;			
	}

	function dt_sc_portfolios( $attrs, $content = null ){

		global $post;
		$tpl_default_settings = get_post_meta( $post->ID, '_tpl_default_settings', TRUE );
		$tpl_default_settings = is_array( $tpl_default_settings ) ? $tpl_default_settings  : array();
		$page_layout  = array_key_exists( "layout", $tpl_default_settings ) ? $tpl_default_settings['layout'] : "content-full-width";
		$show_sidebar = false;
		$container_class = $post_class = $out = "";

		if( $page_layout == "content-full-width" ) {
			$show_sidebar = false;
		} else {
			$show_sidebar = true;
		}

		extract( shortcode_atts( array(
			'count' => '',
			'column' => '3',
			'style' => 'type1',
			'allow_gridspace' => 'yes',
			'allow_filter' => 'yes',
			'terms' => ''
		), $attrs ) );

		switch( $column ) {

			case '2':
				$post_class = $show_sidebar ? " portfolio column dt-sc-one-half with-sidebar" : " portfolio column dt-sc-one-half";
			break;

			case '3':
				$post_class = $show_sidebar ? " portfolio column dt-sc-one-third with-sidebar" : " portfolio column dt-sc-one-third";
			break;

			case '4':
				$post_class = $show_sidebar ? " portfolio column dt-sc-one-fourth with-sidebar" : " portfolio column dt-sc-one-fourth";
			break;
		}

		$categories = isset($terms) ? array_filter( explode(",",$terms) ) : array();
		$post_per_page = isset($count) ? $count : '-1';

		$paged = 1;
		if ( get_query_var('paged') ) { 
			$paged = get_query_var('paged');
		} elseif ( get_query_var('page') ) {
			$paged = get_query_var('page');
		}

		#Query arg
		$args = array();
		if( empty($categories) ):
			$args = array( 'paged' => $paged ,'posts_per_page' => $post_per_page,'post_type' => 'dt_portfolios');
		else:
			$args = array(
				'paged' => $paged,
				'posts_per_page' => $post_per_page,
				'post_type' => 'dt_portfolios',
				'orderby' => 'ID',
				'order' => 'ASC',
				'tax_query' => array( 
					array(
						'taxonomy' => 'portfolio_entries',
						'field' => 'id',
						'operator' => 'IN',
						'terms' => $categories
					)
				)
			);
		endif;
		#Query arg
		
		/* Filter Option */
		if(empty($categories)):
			$categories = get_categories('taxonomy=portfolio_entries&hide_empty=1');
		else:
			$c = array('taxonomy'=>'portfolio_entries','hide_empty'=>1,'include'=>$categories);
			$categories = get_categories($c);
		endif;

		$allow_filter = strtolower( $allow_filter );

		if( (sizeof($categories) > 1) && ( $allow_filter == "yes" ) ) :
			$post_class .= " all-sort";
			$out .= '<div class="dt-sc-portfolio-sorting '.esc_attr($style).'">';
			$out .= '	<a href="#" class="active-sort" title="" data-filter=".all-sort">'.esc_html__('All','veda-core').'</a>';
						foreach( $categories as $category ) :
							$out .= '<a href="#" data-filter=".'.esc_attr($category->category_nicename).'-sort">'.esc_html($category->cat_name).'</a>';
						endforeach;
			$out .= '</div>';
		endif;
		/* Filter Option */

		$allow_gridspace = ( strtolower($allow_gridspace) == "yes" ) ? "with-space" : "no-space";

		$the_query = new WP_Query($args);
		if($the_query->have_posts()):
			$i = 1;

			$out .= '<div class="dt-sc-portfolio-container '.esc_attr($allow_gridspace).'">';
				while( $the_query->have_posts() ):
					$the_query->the_post();
					$the_id = get_the_ID();
					$title = get_the_title($the_id);
					$permalink = get_permalink($the_id);

					$temp_class = $style.' '.$allow_gridspace;
					if($i == 1) $temp_class .= $post_class." first"; else $temp_class .= $post_class;
					if($i == $column) $i = 1; else $i = $i + 1;

					if( $allow_filter == "yes" ):
						$item_categories = get_the_terms( $the_id, 'portfolio_entries' );
						if(is_object($item_categories) || is_array($item_categories)):
							foreach ($item_categories as $category):
								$temp_class .=" ".$category->slug.'-sort ';
							endforeach;
						endif;
					endif;

					#setting up images					
					$portfolio_item_meta = get_post_meta($the_id,'_portfolio_settings',TRUE);
					$portfolio_item_meta = is_array($portfolio_item_meta) ? $portfolio_item_meta  : array();
					$items = false;
					
					if( array_key_exists('items_name', $portfolio_item_meta) ) {
						
						$items = true;
						$item =  $portfolio_item_meta['items_name'][0];
						$popup = $portfolio_item_meta['items'][0];
						
						if( "video" === $item ) {
							$x = array_diff( $portfolio_item_meta['items_name'] , array("video") );
							if( !empty($x) ) {
								$image = $portfolio_item_meta['items'][key($x)];
							} else {
								$image = 'http://place-hold.it/1170X902.jpg&text=Video';
							}
						} else {
							if( sizeof($portfolio_item_meta['items']) > 1 ){
								$popup = $portfolio_item_meta['items'][0];
							}
							
							$image = $portfolio_item_meta['items'][0];
						}
					}
				
					if( has_post_thumbnail( $the_id ) ){
						$image = wp_get_attachment_image_src(get_post_thumbnail_id( $the_id ), 'full', false);
						$image = $popup = $image[0];
						
						if( !$items ){
							$popup = $image;
						} 
					}elseif( $items ) {
						$image = $image;
						$popup = $popup;
					}else{
						$image = $popup = 'http://place-hold.it/1170X902.jpg&text='.$title;
					}				
					// setting up image end
					
					$out .= '<div id="dt_portfolios-'.esc_attr($the_id).'" class="'.esc_attr(trim($temp_class)).'">';
					$out .= '	<figure>';
					$out .= '		<img src="'.esc_url($image).'" alt="'.esc_attr($title).'" title="'.esc_attr($title).'"/>';
					$out .= '		<div class="image-overlay">';
										if($style == "type3" ):
											$out .= '<div class="links">';
											$out .= 	'<a title="'.esc_attr($title).'" href="'.esc_url($permalink).'">'.esc_html($title).'</a>';
											$out .= '</div>';
										elseif( $style == "type4" || $style == "type6" ):
											$out .= '<div class="links">';
											$out .= 	'<a title="'.esc_attr($title).'" href="'.esc_url($permalink).'"><span class="icon icon-linked"> </span></a>';
											$out .= 	'<a title="'.esc_attr($title).'" data-gal="prettyPhoto[gallery]" href="'.esc_url($popup).'">';
											$out .= 	'	<span class="icon icon-search"> </span> </a>';
											$out .= '</div>';
										elseif( $style == "type1" || $style == "type2" || $style == "type5" || $style == "type7" || $style == "type8"):
											$out .= '<div class="links">';
											$out .= 	'<a title="'.esc_attr($title).'" href="'.esc_url($permalink).'"><span class="icon icon-linked"> </span></a>';
											$out .= 	'<a title="'.esc_attr($title).'" data-gal="prettyPhoto[gallery]" href="'.esc_url($popup).'">';
											$out .= 	'	<span class="icon icon-search"> </span> </a>';
											$out .= '</div>';
											$out .= '<div class="image-overlay-details">';
											$out .= '	<h2><a title="'.esc_attr($title).'" href="'.esc_url($permalink).'">'.esc_html($title).'</a></h2>';
														if( $style != "type2" ):
															if( $style == "type7" ):
																$out .= get_the_term_list( $the_id, 'portfolio_entries', "<p class='categories'>", ' ', '</p>' );
															else:
																$out .= get_the_term_list( $the_id, 'portfolio_entries', "<p class='categories'>", ', ', '</p>' );
															endif;
														endif;																									
											$out .= '</div>';
										elseif( $style == "type9" ):
											$out .= '<div class="links">';
											$out .= 	'<a title="'.esc_attr($title).'" data-gal="prettyPhoto[gallery]" href="'.esc_url($popup).'">';
											$out .= 	'	<span class="pe-icon pe-plus"> </span></a>';
											$out .= '</div>';
										endif;
					$out .= '		</div>';
					$out .= '	</figure>';					
					$out .= '</div>';
				endwhile;	
			$out .= '</div>';
		endif;
		
		wp_reset_postdata();

		return $out;
	}

	function dt_sc_infinite_portfolios( $attrs, $content = null ) {

		global $post;
		$tpl_default_settings = get_post_meta( $post->ID, '_tpl_default_settings', TRUE );
		$tpl_default_settings = is_array( $tpl_default_settings ) ? $tpl_default_settings  : array();
		$page_layout  = array_key_exists( "layout", $tpl_default_settings ) ? $tpl_default_settings['layout'] : "content-full-width";
		$show_sidebar = false;
		$container_class = $post_class = $out = "";

		if( $page_layout == "content-full-width" ) {
			$post_class = 'dt-sc-infinite-portfolio without-sidebar';
		} else {
			$post_class = 'dt-sc-infinite-portfolio with-sidebar';
		}

		extract( shortcode_atts( array(
			'portfolio_entries' => '',
			'posts_per_page' => '-1',
			'display_style' => 'all',
			'warning' => '',
			'paged' => '1',
			'ajax_call' => 'no'
		), $attrs ) );

		#Query arg
		$args = array( 
			'post_type' => 'dt_portfolios',
			'orderby' => 'ID',
			'order' => 'ASC',
			'posts_per_page' => $posts_per_page,
			'paged' => $paged
		);

		if( !empty( $portfolio_entries ) ) {

			$categories = array_filter( explode(",",$portfolio_entries) );
			$args = array( 
				'post_type' => 'dt_portfolios',
				'orderby' => 'ID',
				'order' => 'ASC',
				'posts_per_page' => $posts_per_page,
				'paged' => $paged,				
				'tax_query' => array(
					array(
						'taxonomy' => 'portfolio_entries',
						'field' => 'id',
						'operator' => 'IN',
						'terms' => $categories
					)
				)
			);
		}
		#Query arg
		
		$the_query = new WP_Query($args);
		if($the_query->have_posts()) :
			$out .=  ( $ajax_call == 'no' ) ? '<div class="dt-sc-infinite-portfolio-container" data-paged="'.$paged.'">' : '';
			$out .= ( $ajax_call == 'no' ) ? '<div class="message hidden">'.$warning.'</div>' : '';
			while( $the_query->have_posts() ) :
				$the_query->the_post();
				$the_id = get_the_ID();
				$title = get_the_title($the_id);
				$permalink = get_permalink($the_id);

				#setting up images					
					$portfolio_item_meta = get_post_meta($the_id,'_portfolio_settings',TRUE);
					$portfolio_item_meta = is_array($portfolio_item_meta) ? $portfolio_item_meta  : array();
					$items = false;

					if( array_key_exists('items_name', $portfolio_item_meta) ) {
						$items = true;
						$item =  $portfolio_item_meta['items_name'][0];
						$popup = $portfolio_item_meta['items'][0];

						if( "video" === $item ) {
							$x = array_diff( $portfolio_item_meta['items_name'] , array("video") );

							if( !empty($x) ) {
								$image = $portfolio_item_meta['items'][key($x)];
							} else {
								$image = 'http://place-hold.it/1170X902.jpg&text=Video';
							}
						} else {
							if( sizeof($portfolio_item_meta['items']) > 1 ){
								$popup = $portfolio_item_meta['items'][0];
							}

							$image = $portfolio_item_meta['items'][0];
						}
					}

					if( has_post_thumbnail( $the_id ) ){
						$image = wp_get_attachment_image_src(get_post_thumbnail_id( $the_id ), 'full', false);
						$image = $popup = $image[0];

						if( !$items ){
							$popup = $image;
						} 
					}elseif( $items ) {
						$image = $image;
						$popup = $popup;
					}else{
						$image = $popup = 'http://place-hold.it/1170X902.jpg&text='.$title;
					}				
				#setting up image end

				$masonry = array_key_exists("masonry-size",$portfolio_item_meta) ? $portfolio_item_meta['masonry-size'] : 'grid-sizer-default';
				$tempclass = $post_class.' '.$masonry;
				$out .= '<div id="dt_portfolios-'.esc_attr($the_id).'" class="'.esc_attr(trim($tempclass)).'">';
				$out .= '<a title="'.esc_attr($title).'" href="'.esc_url($permalink).'">';
				$out .= '	<figure><img src="'.esc_url($image).'" alt="'.esc_attr($title).'" title="'.esc_attr($title).'"/></figure>';
				$out .= '</a>';
				$out .= '</div>';
			endwhile;
			$out .=  ( $ajax_call == 'no' ) ? '</div>' : '';

			if( $ajax_call == 'no' ) :

				if( $display_style == 'load-more' || $display_style == 'lazy' ) :
					$label = ( $display_style == 'load-more' ) ? __('Load More', 'veda-core' ) : __('Scroll To Load More','veda-core');
					$out .= '<a href="javascript:void(0)" class="dt-sc-infinite-portfolio-load-more" data-style="'.$display_style.'" data-per-page="'.esc_attr($posts_per_page).'" data-term="'.esc_attr($portfolio_entries).'">'.$label.'</a>';
				endif;
			endif;
		endif;

		return $out;
	}

	function dt_ajax_infinite_portfolios(){

		echo do_shortcode('[dt_sc_infinite_portfolios paged ="'.( $_REQUEST['paged'] + 1 ).'" ajax_call="yes" portfolio_entries="'.$_REQUEST['term'].'" posts_per_page="'.$_REQUEST['per_page'].'" display_style="'.$_REQUEST['style'].'"/]' );
		die(1);
	}
	
	/**
	 * event lists
	 * @return string
	 */
	function dt_sc_events_list( $attrs, $content = null ){
		extract( shortcode_atts( array( 
			'title' => '',
			'limit' => 3,
			'categories' => ''
		) , $attrs ) );

		global $post; $out = "";

		// select categories
		if(empty($categories)) {
			$cats = get_categories('taxonomy=tribe_events_cat&hide_empty=1');
			$cats = get_terms( array('tribe_events_cat'), array('fields' => 'ids'));
		} else {
			$cats = explode(',', $categories);
		}

		$out = '<div class="dt-sc-events-list-wrapper">';

			if(!empty($title))	$out .= "<h3>{$title}</h3>";

				$events = tribe_get_events( array( 'eventDisplay' => 'list', 'posts_per_page' => $limit,
													'tax_query'=> array( array( 'taxonomy' => 'tribe_events_cat', 'field' => 'id', 'terms' => $cats ) ) ));
													
			if($events):							
				foreach($events as $post):
					setup_postdata($post);
					$out .= '<div class="dt-sc-events-list">';
						$out .= '<div class="dt-sc-event-date">';
							$out .= '<h2> <strong>'.tribe_get_start_date($post->ID, false, 'd').'</strong> '.tribe_get_start_date($post->ID, false, 'M').'</h2>';
							$out .= '<p> <span>'.tribe_get_start_date($post->ID, false, 'l').'</span> - '.tribe_get_start_time($post->ID, false, 'h:i').' - '.tribe_get_end_time($post->ID, false, 'h:i').' </p>';
						$out .= '</div>';
						$out .= '<div class="dt-sc-event-title">';
							$out .= '<h5> <a title="'.get_the_title().'" href="'.get_permalink($post->ID).'"> <small> '.tribe_get_organizer($post->ID).' </small> '.get_the_title().' </a> </h5>';
						$out .= '</div>';
						$out .= '<div class="dt-sc-event-duration">';
							$out .= '<h6>'.round((get_post_meta($post->ID, '_EventDuration', true) / 3600), 2).' hrs</h6>';
						$out .= '</div>';
					$out .= '</div>';
				endforeach;
			else:
				$out .= '<div class="dt-sc-warning-box">'.esc_html__('No Events Found','veda-core').'</div>';
			endif;	
			wp_reset_postdata();

		$out .= '</div>';

		return $out;
	}

	/**
	 * special events list
	 * @return string
	 */
	function dt_sc_special_events_list( $attrs, $content = null ){
		extract( shortcode_atts( array( 
			'type' => 'type1',
			'limit' => -1,
			'categories' => ''
		) , $attrs ) );

		global $post; $out = "";

		// select categories
		if(empty($categories)) {
			$cats = get_categories('taxonomy=tribe_events_cat&hide_empty=1');
			$cats = get_terms( array('tribe_events_cat'), array('fields' => 'ids'));
		} else {
			$cats = explode(',', $categories);
		}

		$events = tribe_get_events( array( 'eventDisplay' => 'list', 'posts_per_page' => $limit, 'tax_query'=> array( array( 'taxonomy' => 'tribe_events_cat', 'field' => 'id', 'terms' => $cats ) ) ));
		if($events): $i = 1;
		
			switch($type):
			
				case 'type1':
				default:
					foreach($events as $post):
						setup_postdata($post);
						$event_id = $post->ID;
		
						$temp_class = "";
						
						if($i == 1) $temp_class = " first";
						if($i == 3) $i = 1; else $i = $i + 1;
						
						$out .= '<div class="dt-sc-one-third column '.$temp_class.'">';
							$out .= '<div class="dt-sc-event type1">';
								 $title = ( strlen(get_the_title()) > 27 ) ? substr(get_the_title(),0,27)."..." : get_the_title();
								 $out .= '<h2 class="entry-title"><a href="'.get_permalink().'">'.$title.'</a></h2>';
								 $out .= '<div class="dt-sc-event-thumb">';
									if(has_post_thumbnail()):
										$attr = array('title' => get_the_title(), 'alt' => get_the_title());
										$out .= get_the_post_thumbnail($post->ID, 'event-list2', $attr);
									else:
										$out .= '<img src="http://place-hold.it/420x275&text='.get_the_title().'" alt="'.get_the_title().'" title="'.get_the_title().'" />';
									endif;
									$out .= '<p class="dt-sc-event-date"><span>'.tribe_get_start_date ( $event_id, true, 'd' ).'</span><br>'.tribe_get_start_date ( $event_id, true, 'M' ).'</p>';
								 $out .= '</div>';
								 $out .= '<div class="dt-sc-event-meta">';
									$out .= '<p class="event-timing"><span class="fa fa-clock-o"></span>'.tribe_get_start_time ( $event_id, 'h:i a' ).' - '.tribe_get_end_time ( $event_id, 'h:i a' ).'</p>';
									$venue = ( strlen(tribe_get_venue($event_id)) > 18 ) ? substr(tribe_get_venue($event_id),0,18)."..." : tribe_get_venue($event_id);
									$out .= '<p class="events-venue"><span class="fa fa-map-marker"></span>'.$venue.'</p>';
								 $out .= '</div>';
							$out .= '</div>';
						$out .= '</div>';

						if($i == 1) $out .= '<div class="dt-sc-hr-invisible-small"> </div>';

					endforeach;
				break;

				case 'type2':
					foreach($events as $post):
						setup_postdata($post);
						$event_id = $post->ID;

						$temp_class = "";

						if($i == 1) $temp_class = " first";
						if($i == 3) $i = 1; else $i = $i + 1;
						
						$out .= '<div class="dt-sc-one-third column '.$temp_class.'">';
							$out .= '<div class="dt-sc-event type2">';
								 $title = ( strlen(get_the_title()) > 27 ) ? substr(get_the_title(),0,27)."..." : get_the_title();
								 $out .= '<h2 class="entry-title"><a href="'.get_permalink().'">'.$title.'</a></h2>';
								 $out .= '<div class="dt-sc-event-thumb">';
									if(has_post_thumbnail()):
										$attr = array('title' => get_the_title(), 'alt' => get_the_title());
										$out .= get_the_post_thumbnail($post->ID, 'event-list2', $attr);
									else:
										$out .= '<img src="http://place-hold.it/420x275&text='.get_the_title().'" alt="'.get_the_title().'" title="'.get_the_title().'" />';
									endif;
								 $out .= '</div>';
								 $out .= '<div class="dt-sc-event-meta">';
								    $out .= '<p class="dt-sc-event-date"><span>'.tribe_get_start_date ( $event_id, true, 'd' ).'</span>'.tribe_get_start_date ( $event_id, true, 'F' ).'<br>'.tribe_get_start_date ( $event_id, true, 'Y' ).'</p>';
									$venue = ( strlen(tribe_get_venue($event_id)) > 18 ) ? substr(tribe_get_venue($event_id),0,18)."..." : tribe_get_venue($event_id);
									$out .= '<p class="event-timing">'.tribe_get_start_time ( $event_id, 'h:i a' ).' - '.tribe_get_end_time ( $event_id, 'h:i a' ).'<br>'.$venue.'</p>';
								 $out .= '</div>';
							$out .= '</div>';
						$out .= '</div>';

						if($i == 1) $out .= '<div class="dt-sc-hr-invisible-small"> </div>';

					endforeach;
				break;

				case 'type3':
					foreach($events as $post):
						setup_postdata($post);
						$event_id = $post->ID;

						$temp_class = "";

						if($i == 1) $temp_class = " first";
						if($i == 3) $i = 1; else $i = $i + 1;
						
						$out .= '<div class="dt-sc-one-third column '.$temp_class.'">';
							$out .= '<div class="dt-sc-event type3">';
								$out .= '<div class="dt-sc-event-thumb">';
									if(has_post_thumbnail()):
										$attr = array('title' => get_the_title(), 'alt' => get_the_title());
										$out .= get_the_post_thumbnail($post->ID, 'event-list2', $attr);
									else:
										$out .= '<img  src="http://place-hold.it/420x275&text='.get_the_title().'" alt="'.get_the_title().'" title="'.get_the_title().'" />';
									endif;
								    $out .= '<p class="dt-sc-event-date"><span>'.tribe_get_start_date ( $event_id, true, 'd' ).'</span> '.tribe_get_start_date ( $event_id, true, 'F' ).' '.tribe_get_start_date ( $event_id, true, 'Y' ).'</p>';
								$out .= '</div>';
								$out .= '<div class="dt-sc-event-meta">';
								    $out .= '<p class="event-timing"> '.tribe_get_start_time ( $event_id, 'h:i a' ).' - '.tribe_get_end_time ( $event_id, 'h:i a' ).' - '.tribe_get_venue($event_id).'</p>';
								$out .= '</div>';
								$out .= '<div class="dt-sc-clear"></div>';
								$out .= '<h2 class="entry-title"><a href="'.get_permalink().'">'.get_the_title().'</a></h2>';
							$out .= '</div>';
						$out .= '</div>';

						if($i == 1) $out .= '<div class="dt-sc-hr-invisible-small"> </div>';

					endforeach;
				break;

				case 'type4':
					foreach($events as $post):
						setup_postdata($post);
						$event_id = $post->ID;

						$temp_class = "";

						if($i == 1) $temp_class = " first";
						if($i == 3) $i = 1; else $i = $i + 1;
						
						$out .= '<div class="dt-sc-one-third column '.$temp_class.'">';
							$out .= '<div class="dt-sc-event type4">';
								$out .= '<div class="dt-sc-event-thumb">';
									if(has_post_thumbnail()):
										$attr = array('title' => get_the_title(), 'alt' => get_the_title());
										$out .= get_the_post_thumbnail($post->ID, 'event-list2', $attr);
									else:
										$out .= '<img src="http://place-hold.it/420x275&text='.get_the_title().'" alt="'.get_the_title().'" title="'.get_the_title().'" />';
									endif;
									$out .= '<h2 class="entry-title"><a href="'.get_permalink().'">'.get_the_title().'</a></h2>';
								$out .= '</div>';
								$out .= '<p class="dt-sc-event-date"><span>'.tribe_get_start_date ( $event_id, true, 'd' ).'</span> <i>'.tribe_get_start_date ( $event_id, true, 'F' ).', '.tribe_get_start_date ( $event_id, true, 'l' ).' - '.tribe_get_start_time ( $event_id, 'h:i a' ).' - '.tribe_get_end_time ( $event_id, 'h:i a' ).'</i> <br>'.tribe_get_venue($event_id).'</p>';
							$out .= '</div>';
						$out .= '</div>';

						if($i == 1) $out .= '<div class="dt-sc-hr-invisible-small"> </div>';

					endforeach;
				break;

				case 'type5':
					foreach($events as $post):
						setup_postdata($post);
						$event_id = $post->ID;

						$temp_class = "";

						if($i == 1) $temp_class = " first";
						if($i == 2) $i = 1; else $i = $i + 1;
						
						$out .= '<div class="dt-sc-one-half column '.$temp_class.'">';
							$out .= '<div class="dt-sc-event type5">';
								$out .= '<div class="dt-sc-one-half column first">';
								   $out .= '<div class="dt-sc-event-thumb">';
									  if(has_post_thumbnail()):
										  $attr = array('title' => get_the_title(), 'alt' => get_the_title());
										  $out .= get_the_post_thumbnail($post->ID, 'event-list2', $attr);
									  else:
										  $out .= '<img src="http://place-hold.it/420x275&text='.get_the_title().'" alt="'.get_the_title().'" title="'.get_the_title().'" />';
									  endif;
								   $out .= '</div>';
								$out .= '</div>';
								$out .= '<div class="dt-sc-one-half column">';
								   $out .= '<div class="dt-sc-event-meta">';
										$out .= '<p class="dt-sc-event-date"><span>'.tribe_get_start_date ( $event_id, true, 'd' ).'</span> '.tribe_get_start_date ( $event_id, true, 'M' ).' - <i>'.tribe_get_start_time ( $event_id, 'h:i a' ).' - '.tribe_get_end_time ( $event_id, 'h:i a' ).'</i> </p>';
										$out .= '<p class="dt-sc-event-venue">'.tribe_get_venue($event_id).'</p>';
										$out .= '<div class="dt-sc-hr-invisible-xsmall"></div>';
										$title = ( strlen(get_the_title()) > 18 ) ? substr(get_the_title(),0,18)."..." : get_the_title();
										$out .= '<h2 class="entry-title"><a href="'.get_permalink().'">'.$title.'</a></h2>';
										$ecost = tribe_get_formatted_cost($event_id);
										if(!empty($ecost))
											$out .= '<div class="dt-sc-event-cost">'.$ecost.'</div>';
										$out .= '<a href="'.get_permalink().'" class="dt-sc-events-read-more">'.esc_html__('Find out more', 'veda-core').'</a>';
								   $out .= '</div>';
								$out .= '</div>';
							$out .= '</div>';
						$out .= '</div>';

						if($i == 1) $out .= '<div class="dt-sc-hr-invisible-small"> </div>';

					endforeach;
				break;
					
			endswitch;
		else:
			$out .= '<div class="dt-sc-warning-box">'.esc_html__('No Events Found','veda-core').'</div>';
		endif;	
		wp_reset_postdata();

		return $out;
	}

	/* Map Overlay */

	/**
	 * map overlay
	 * @return string
	 */
	function dt_sc_map_overlay($attrs, $content = null, $shortcodename = "") {
		extract ( shortcode_atts ( array (
			'class' => ''
		), $attrs ) );

		$out = "<div class='dt-sc-map-overlay {$class}'><div class='container'>";
			$out .= DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
		$out .= "</div></div>";

		return $out;
	}

	/**
	 * map code
	 * @return string
	 */
	function dt_sc_map($attrs, $content = null, $shortcodename = "") {
		extract ( shortcode_atts ( array (
			'class' => ''
		), $attrs ) );

		$out = "<div class='map {$class}'>";
			$out .= DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
		$out .= "</div>";

		return $out;
	}

	/* Coming Soon */

	/**
	 * down count
	 * @return string
	 */
	function dt_sc_down_count($attrs, $content = null) {
		extract ( shortcode_atts ( array (
			'class'  =>  ''
		), $attrs ) );

		$out = "";
		$type = veda_opts_get('comingsoon-style', 'type1');

		if( veda_option('pageoptions','disable-launchdate') ) return;

		$out .= '<div class="downcount '.$class.'" data-date="'.veda_opts_get('comingsoon-launchdate', date('m/d/Y')).'" data-offset="'.veda_opts_get('comingsoon-timezone', '0').'">';
			$out .= '<div class="dt-sc-counter-wrapper">';
				$out .= '<div class="counter-icon-wrapper">';
					$out .= '<div class="dt-sc-counter-number days">00</div>';
				$out .= '</div>';
				if($type == 'type2')
					$out .= '<h3 class="title">'.esc_html__('Days Left', 'veda-core').'</h3>';
				else
					$out .= '<h3 class="title">'.esc_html__('Days', 'veda-core').'</h3>';
			$out .= '</div>';
			$out .= '<div class="dt-sc-counter-wrapper">';
				$out .= '<div class="counter-icon-wrapper">';
					$out .= '<div class="dt-sc-counter-number hours">00</div>';
				$out .= '</div>';
				if($type == 'type2')
					$out .= '<h3 class="title">'.esc_html__('Hr.', 'veda-core').'</h3>';
				elseif($type == 'type5')
					$out .= '<h3 class="title">'.esc_html__('Hrs', 'veda-core').'</h3>';
				else
					$out .= '<h3 class="title">'.esc_html__('Hours', 'veda-core').'</h3>';
			$out .= '</div>';
			$out .= '<div class="dt-sc-counter-wrapper">';
				$out .= '<div class="counter-icon-wrapper">';
					$out .= '<div class="dt-sc-counter-number minutes">00</div>';
				$out .= '</div>';
				if($type == 'type2')
					$out .= '<h3 class="title">'.esc_html__('Min.', 'veda-core').'</h3>';
				elseif($type == 'type5')
					$out .= '<h3 class="title">'.esc_html__('Mins', 'veda-core').'</h3>';
				else
					$out .= '<h3 class="title">'.esc_html__('Minutes', 'veda-core').'</h3>';
			$out .= '</div>';
			$out .= '<div class="dt-sc-counter-wrapper last">';
				$out .= '<div class="counter-icon-wrapper">';
					$out .= '<div class="dt-sc-counter-number seconds">00</div>';
				$out .= '</div>';
				if($type == 'type2')
					$out .= '<h3 class="title">'.esc_html__('Sec.', 'veda-core').'</h3>';
				elseif($type == 'type5')
					$out .= '<h3 class="title">'.esc_html__('Secs', 'veda-core').'</h3>';
				else
					$out .= '<h3 class="title">'.esc_html__('Seconds', 'veda-core').'</h3>';
			$out .= '</div>';
		$out .= '</div>';

		return $out;
	}

	/* Horizontal Time Line */
	function dt_sc_horizontal_timeline( $attrs, $content = null ) {
		extract ( shortcode_atts ( array (
			'type' => 'type1',
			'column' => '3',
			'class' => ''
		), $attrs ) );

		$entries = array();
		preg_match_all("'\[dt_sc_hr_timeline_entry (.*?)\[/dt_sc_hr_timeline_entry\]'si", $content, $matches);
		if( isset( $matches[1] ) ) {
			$entries = $matches[1];
		}

		if (!function_exists('dt_sc_arr_map')){
			function dt_sc_arr_map($value){ 
				return '[dt_sc_hr_timeline_entry '.$value.'[/dt_sc_hr_timeline_entry]'; 
			}
	    }
	    $entries = array_map("dt_sc_arr_map", $entries);
		#$entries = array_map(function($value){ return '[dt_sc_hr_timeline_entry '.$value.'[/dt_sc_hr_timeline_entry]'; }, $entries);

		$column_class = "";

		switch( $column ):

			case '2':
				$column_class = "column dt-sc-one-half";
			break;

			case '3':
				$column_class = "column dt-sc-one-third";
			break;

			case '4':
				$column_class = "column dt-sc-one-fourth";
			break;									
		endswitch;
		
		$out = "<div class='dt-sc-hr-timeline-section {$type} {$class}'>";
			$out .= '<div class="dt-sc-hr-timeline-wrapper">';

			$i = 1;

			foreach( $entries as $key => $entry ):
				$temp_class = "";
				if($i == 1) $temp_class = $column_class." first"; else $temp_class = $column_class;
				if($i == $column) $i = 1; else $i = $i + 1;

				$out .= '<div class="'.$temp_class.'">';
				$out .= do_shortcode( $entry );
				$out .= '</div>';
			endforeach;

			$out .= '</div>';
		$out .= '</div>';
		return $out;
	}

	function dt_sc_hr_timeline_entry( $attrs, $content = null ){
		extract ( shortcode_atts ( array (
			'title' => '',
			'subtitle' => '',
			'url' => '',
			'icon_type' => 'icon', #VC
			'iconclass' => '',
			'icon' => 'fa fa-info-circle', #VC
			'icon_css_class' => '', #VC
			'class' => ''
		), $attrs ) );

		$out = "<div class='dt-sc-hr-timeline {$class}'>";
			$out .= '<div class="dt-sc-hr-timeline-content">';

				$iconspan = "";
				if( !empty( $icon_type ) ) {
					$icon = "";
					if( $icon_type == 'fontawesome' )
						$icon = $iconclass;
					if( $icon_type == 'css_class' )
						$icon = $icon_css_class;
					if( !empty( $icon ) )
						$iconspan =  "<span class='{$icon}'> </span>";			
				}

				if($class == 'bottom'):
					$out .= $iconspan;
					$out .= "<h3>{$title}</h3>";
					$out .= DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
				endif;
					
				if(!empty($url)):
					$image = wpb_getImageBySize( array( 'attach_id' => $url, 'thumb_size' => 'full' ));
					$image = $image['thumbnail'];					
					$out .= '<div class="dt-sc-hr-timeline-thumb">';
					$out .= $image;							
					$out .= '</div>';
				endif;

				if($class != 'bottom'):
					$out .= "<h3>{$title}</h3>";
					$out .= DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
					$out .= $iconspan;
				endif;

				if(!empty($subtitle)):
					$out .= "<h4>{$subtitle}</h4>";
				endif;
				
			$out .= '</div>';
		$out .= '</div>';
		
		return $out;
	}	

	/* Vertical Time Line */

	/**
	 * vertical timeline
	 * @return string
	 */
	function dt_sc_vertical_timeline($attrs, $content = null) {
		extract ( shortcode_atts ( array (
			'type' => 'type1',
			'class' => ''
		), $attrs ) );

		$out = "<div class='dt-sc-timeline-section {$type} {$class}'>";
			$out .= DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
		$out .= '</div>';

		return $out;
	}

	/**
	 * vertical timeline entry
	 * @return string
	 */
	function dt_sc_vc_timeline_entry( $attrs,$content = null ){
		extract ( shortcode_atts ( array (
			'title' => '',
			'subtitle' => '',
			'icon_type' => '',
			'icon_class' => '',
			'font_icon' => '',
			'image' => '',
			'link' => '',
			'hover_text' => '',
			'class' => ''
		), $attrs ) );

		$out = "<div class='dt-sc-timeline {$class}'>";
			$out .= '<div class="column dt-sc-one-half">';
				$out .= '<div class="dt-sc-timeline-content">';

					if( $icon_type == 'fontawesome' && !empty($font_icon) )
						$out .= '<div class="dt-sc-timeline-icon-wrapper"> <span class="'.$font_icon.'"> </span> </div>';

					if( $icon_type == 'icon_class' && !empty($icon_class) )
						$out .= '<div class="dt-sc-timeline-icon-wrapper"> <span class="'.$icon_class.'"> </span> </div>';

					if($icon_type == 'image' && !empty($image)):

						//parse link by vc
						$link = ( '||' === $link ) ? '' : $link;
						$link = vc_build_link( $link );
						$a_href = $link['url'];
						$a_title = $link['title'];
						$a_target = $link['target'];

						$image = wpb_getImageBySize( array( 'attach_id' => $image, 'thumb_size' => 'full' ));
						$image = $image['thumbnail'];

						$out .= '<div class="dt-sc-timeline-image-wrapper">';
						$out .= !empty($a_href) ? "<a href='".$a_href."' title='".$a_title."' target='".$a_target."'>".$image."</a>": $image;
								if(!empty($hover_text)):
									$out .= '<div class="dt-sc-timeline-thumb-overlay">';
										$out .= "<h5>{$hover_text}</h5>";
									$out .= '</div>';
								endif;
						$out .= '</div>';
					endif;

					$out .= '<h2><span>'.$title.'</span>';

					if($subtitle)
						$out .= '<br>'.$subtitle;
					$out .= '</h2>';

					if($content != '')
						$out .= DTCoreShortcodesDefination::dtShortcodeHelper ( $content );

				$out .= '</div>';
			$out .= '</div>';
		$out .= '</div>';
		
		return $out;
	}

	/**
	 * break tag
	 * @return string
	 */
	function dt_sc_br($attrs, $content = null) {
		extract ( shortcode_atts ( array (
			'br' => '1'
		), $attrs ) );

		$br = intval( $br );

		$out = "";

		for( $i = 1; $i <= $br; $i++ ) {
			$out .= '<br>';
		}

		return $out;
	}

	/**
	 * menu
	 * @return string
	 */
	function dt_theme_sc_wp_menu() {
		echo '<ul class="menu-links">';
		$args = array(
			'depth' 		=> 0,
			'title_li' 		=> '',
			'echo' 			=> 0,
			'post_type' 	=> 'page',
			'post_status' 	=> 'publish'
		);
		$pages = wp_list_pages($args);
		if ($pages)
			echo $pages;
		echo '</ul>';
	}

	function dt_sc_custom_menu($attrs, $content = null) {
		extract ( shortcode_atts ( array (
			'class'  =>  ''
		), $attrs ) );

		$out = "";

		$args = array(
			'container' 		=> false,
			'menu_id'         	=> false,
			'menu_class'		=> 'menu-links '.$class,
			'fallback_cb'		=> 'DTCoreShortcodesDefination::dt_theme_sc_wp_menu',
			'theme_location'	=> 'shortcode-menu',
			'echo'				=> false,
			'depth' 			=> 0
		);
		$out .= wp_nav_menu( $args ); 

		return $out;
	}

	/**
	 * sociable
	 * @return string
	 */
	function dt_sc_sociable($attrs, $content = null) {
		extract ( shortcode_atts ( array (
			'class'  =>  ''
		), $attrs ) );

		$socials = veda_option('social');
		$out = "";

		if(!empty($socials)):
			$out .= "<ul class='dt-sc-sociable {$class}'>";
				foreach($socials as $social):
					$out .= "<li> <a class='fa ".$social['icon']."' title='".ucfirst(substr($social['icon'], 3))."' href='".$social['link']."'> </a> </li>";
				endforeach;	
			$out .= "</ul>";
		endif;

		return $out;
	}

	/**
	 * social
	 * @return string
	 */
	function dt_sc_social($attrs, $content = null) {
		extract ( shortcode_atts ( array (
			'class' => ''
		), $attrs ) );

		$sociables = array('fa-dribbble' => 'dribble', 'fa-flickr' => 'flickr', 'fa-github' => 'github', 'fa-pinterest' => 'pinterest','fa-twitter' => 'twitter', 'fa-youtube' => 'youtube', 'fa-android' => 'android', 'fa-dropbox' => 'dropbox', 'fa-instagram' => 'instagram', 'fa-windows' => 'windows', 'fa-apple' => 'apple', 'fa-facebook' => 'facebook', 'fa-google-plus' => 'google', 'fa-linkedin' => 'linkedin', 'fa-skype' => 'skype', 'fa-tumblr' => 'tumblr', 'fa-vimeo-square' => 'vimeo', 'fa-behance' => 'behance');

		$s = "";
		foreach ( $sociables as $key => $value ) {
			if(is_array($attrs) && array_key_exists($value, $attrs) && $attrs[$value] != '')
				$s .= '<li><a class="fa '.$key.'" href="'.$attrs[$value].'" title="'.ucfirst($value).'"></a></li>';
		}
		$s = ! empty ( $s ) ? "<ul class='dt-sc-team-social {$class}'>$s</ul>" : "";
		$out .= $s;

		return $out;
	}

	function dt_sc_video_manager($attrs, $content = null ){
		extract( shortcode_atts( array(
		), $attrs ) );
		
		if(empty($content))
			return '';
			
		preg_match_all( '/dt_sc_video_item([^\]]+)/i', $content, $matches, PREG_OFFSET_CAPTURE );
		$first = $matches[0][0][0];
		$first = str_replace("dt_sc_video_item","dt_sc_video_first_item",$first);
		
		$out = '<div class="wpb_column vc_col-sm-8 rs_col-sm-12 vc_col-md-12 vc_col-lg-8">';
		$out .= DTCoreShortcodesDefination::dtShortcodeHelper ('['.$first.'/]');
		$out .= '</div>';
		
		$out .= '<div class="wpb_column vc_col-sm-4 rs_col-sm-12 vc_col-md-12 vc_col-lg-4 dt-sc-video-manager-right">';
		$out .= DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
		$out .= '</div>';
		
		return $out;		
	}
	
	function dt_sc_video_item($attrs, $content = null ){
		extract( shortcode_atts( array(
			'title' => '',
			'subtitle' => '',
			'link' => '',
			'image' => ''
		), $attrs ) );
		
		$full = wp_get_attachment_image_src( $image, 'full' );
		$full = $full[0];	
		
		$image = wp_get_attachment_image_src( $image, 'thumbnail' );
		$image = $image[0];
					
		$image = !empty($image) ? '<img src="'.esc_url($image).'" data-full="'.esc_attr($full).'"/>' : '<img src="http://place-hold.it/136x81"/>';
		
		$out = '<div class="dt-sc-video-item" data-link="'.esc_attr($link).'">';
		$out .= '	<div class="dt-sc-vitem-thumb">'.$image.'</div>';
		$out .= '	<div class="dt-sc-vitem-detail">';
		$out .= '		<h2>'.esc_html($title).'</h2>';
		$out .= '		<p>'.esc_html($subtitle).'</p>';		
		$out .= '	</div>';		
		$out .= '</div>';
		return $out;
	}

	function dt_sc_video_first_item($attrs, $content = null ){
		extract( shortcode_atts( array(
			'title' => '',
			'subtitle' => '',
			'link' => '',
			'image' => ''
		), $attrs ) );
		
		$image = wp_get_attachment_image_src( $image, 'full' );
		$image = $image[0];
		
		$image = !empty($image) ? '<img src="'.esc_url($image).'"/>' : '<img src="http://place-hold.it/1040x500"/>';		
		
		$out = '<div class="dt-sc-video-wrapper">';
		$out .=		$image;
		$out .= '	<div class="video-overlay">';
		$out .= '		<div class="video-overlay-inner">';
		$out .= '			<a href="'.esc_url($link).'"><span class="icon icon-play"></span></a>';
		$out .= '			<h2>'.esc_html($title).'</h2>';
		$out .= '			<p>'.esc_html($subtitle).'</p>';		
		$out .= '		</div>';
		$out .= '	</div>';				
		$out .= '</div>';
		return $out;
	}

	function dt_sc_gitem_post_format( $atts ) {
		return '{{ dt_post_format:' . http_build_query( (array) $atts ) . ' }}';
	}

	function dt_sc_gitem_post_tag( $atts ) {
		return '{{ dt_post_tag:' . http_build_query( (array) $atts ) . ' }}';
	}

	function dt_sc_gitem_post_comment( $atts ) {
		return '{{ dt_post_comment:' . http_build_query( (array) $atts ) . ' }}';
	}

	function dt_sc_gitem_post_category( $atts ) {

		return '{{ dt_post_category:' . http_build_query( (array) $atts ) . ' }}';
	}

}
new DTCoreShortcodesDefination();?>