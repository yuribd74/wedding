<?php add_action( 'vc_before_init', 'dt_sc_tabs_vc_map' );
function dt_sc_tabs_vc_map() {

	$tab_id_1 = 'def' . time() . '-1-' . rand( 0, 100 );
	$tab_id_2 = 'def' . time() . '-2-' . rand( 0, 100 );

	vc_map( array(
		"name" => esc_html__( "Tabs", 'veda-core' ),
		"base" => "dt_sc_tabs",
		"icon" => "dt_sc_tabs",
		"category" => DT_VC_CATEGORY,
		'is_container' => true,
		'show_settings_on_create' => false,
		'description' => esc_html__( 'Tabbed content', 'veda-core' ),
		'admin_enqueue_js' =>  plugins_url('designthemes-core-features').'/visual-composer/js/dt-sc-tabs-view.js',
		'params' => array(
			// Type
			array(
				'type' => 'dropdown',
				'param_name' => 'type',
      			'admin_label' => true,
				'value' => array(
					esc_html__( 'Horizontal', 'veda-core' ) => 'horizontal',
					esc_html__( 'Vertical', 'veda-core' ) => 'vertical',
				),
				'std' => 'horizontal',
				'heading' => esc_html__( 'Type', 'veda-core' ),
				'description' => esc_html__( 'Select tabs type display', 'veda-core' )
			),

			// Style
			array(
				'type' => 'dropdown',
				'param_name' => 'style',
				'value' => array(
					esc_html__( 'Default', 'veda-core' ) => 'default',
					esc_html__( 'Frame', 'veda-core' ) => 'frame',
				),
      			'admin_label' => true,
      			'std' => 'default',
				'heading' => esc_html__( 'Style', 'veda-core' ),
				'description' => esc_html__( 'Select tabs display style', 'veda-core' )
			),

			# Class
      		array(
      			"type" => "textfield",
      			"heading" => esc_html__( "Extra class name", 'veda-core' ),
      			"param_name" => "class",
      			'description' => esc_html__('Style particular icon box element differently - add a class name and refer to it in custom CSS','veda-core')
      		)			
		),
		'custom_markup' => '<div class="wpb_tabs_holder wpb_holder vc_container_for_children">
			<ul class="tabs_controls"></ul>%content%</div>',
		'default_content' =>'[dt_sc_tab title="' . esc_html__( 'Tab 1', 'veda-core' ) . '" tab_id="' . $tab_id_1 . '"][/dt_sc_tab]
			[dt_sc_tab title="' . esc_html__( 'Tab 2', 'veda-core' ) . '" tab_id="' . $tab_id_2 . '"][/dt_sc_tab]',
		'js_view' => 'DTTabsView'
	) );

	class WPBakeryShortCode_DT_SC_TABS extends WPBakeryShortCode {

		static $filter_added = false;

		protected $controls_css_settings = 'out-tc vc_controls-content-widget';
		protected $controls_list = array('edit', 'clone', 'delete');

		public function __construct( $settings ) {
			parent::__construct( $settings );

			if ( ! self::$filter_added ) {
				$this->addFilter( 'vc_inline_template_content', 'setCustomTabId' );
				self::$filter_added = true;
			}
		}

		public function contentAdmin( $atts, $content = null ) {
			$width = $custom_markup = '';
			$shortcode_attributes = array( 'width' => '1/1' );

			foreach ( $this->settings['params'] as $param ) {
				if ( $param['param_name'] != 'content' ) {
					if ( isset( $param['value'] ) && is_string( $param['value'] ) ) {
						$shortcode_attributes[$param['param_name']] = $param['value'];
					} elseif ( isset( $param['value'] ) ) {
						$shortcode_attributes[$param['param_name']] = $param['value'];
					}
				} else if ( $param['param_name'] == 'content' && $content == NULL ) {
					$content = $param['value'];
				}
			}

			extract( shortcode_atts( $shortcode_attributes , $atts ) );

			// Extract tab titles
			preg_match_all( '/dt_sc_tab title="([^\"]+)"(\stab_id\=\"([^\"]+)\"){0,1}/i', $content, $matches, PREG_OFFSET_CAPTURE );
			$output = '';
			$tab_titles = array();

			if ( isset( $matches[0] ) ) {
				$tab_titles = $matches[0];
			}

			$tmp = '';
			if ( count( $tab_titles ) ) {
				$tmp .= '<ul class="clearfix tabs_controls">';
				foreach ( $tab_titles as $tab ) {
					preg_match( '/title="([^\"]+)"(\stab_id\=\"([^\"]+)\"){0,1}/i', $tab[0], $tab_matches, PREG_OFFSET_CAPTURE );
					if ( isset( $tab_matches[1][0] ) ) {
						$tmp .= '<li><a href="#tab-' . ( isset( $tab_matches[3][0] ) ? $tab_matches[3][0] : sanitize_title( $tab_matches[1][0] ) ) . '">' . $tab_matches[1][0]. '</a></li>';
					}
				}
				$tmp .= '</ul>' . "\n";
			} else {
				$output .= do_shortcode( $content );
			}

			$elem = $this->getElementHolder( $width );
			$iner = '';

			foreach ( $this->settings['params'] as $param ) {
				$custom_markup = '';
				$param_value = isset( $$param['param_name'] ) ? $$param['param_name'] : '';

				if ( is_array( $param_value ) ) {
					reset( $param_value );
					$first_key = key( $param_value );
					$param_value = $param_value[$first_key];
				}

				$iner .= $this->singleParamHtmlHolder( $param, $param_value );
			}

			if ( isset( $this->settings["custom_markup"] ) && $this->settings["custom_markup"] != '' ) {
				if ( $content != '' ) {
					$custom_markup = str_ireplace( "%content%", $tmp . $content, $this->settings["custom_markup"] );
				} else if ( $content == '' && isset( $this->settings["default_content_in_template"] ) && $this->settings["default_content_in_template"] != '' ) {
						$custom_markup = str_ireplace( "%content%", $this->settings["default_content_in_template"], $this->settings["custom_markup"] );
				} else {
					$custom_markup = str_ireplace( "%content%", '', $this->settings["custom_markup"] );
				}
				$iner .= do_shortcode( $custom_markup );
			}

			$elem = str_ireplace( '%wpb_element_content%', $iner, $elem );
			$output = $elem;

			return $output;
		}

		public function getTabTemplate() {
			return '<div class="wpb_template">' . do_shortcode( '[dt_sc_tab title="Tab" tab_id=""][/dt_sc_tab]' ) . '</div>';
		}

		public function setCustomTabId( $content ) {
			return preg_replace( '/tab\_id\=\"([^\"]+)\"/', 'tab_id="$1-' . time() . '"', $content );
		}
	}
}?>