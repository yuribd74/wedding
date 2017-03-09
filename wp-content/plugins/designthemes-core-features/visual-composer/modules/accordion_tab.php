<?php add_action( 'vc_before_init', 'dt_sc_accordion_tab_vc_map' );
function dt_sc_accordion_tab_vc_map() {
	vc_map( array(
		"name" => esc_html__( "Section", 'veda-core' ),
		"base" => "dt_sc_accordion_tab",
		'allowed_container_element' => 'vc_row',
		'is_container' => true,
		'content_element' => false,
		"params" => array(
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Title', 'veda-core' ),
				'param_name' => 'title',
				'value' => esc_html__( 'Section', 'veda-core' ),
				'description' => esc_html__( 'Enter accordion section title', 'veda-core' )
			)
		),
		'admin_enqueue_js' =>  plugins_url('designthemes-core-features').'/visual-composer/js/dt-sc-accordion-tabs-view.js',
		'js_view' => 'DTAccordionTabView'
	) );

	class WPBakeryShortCode_DT_SC_ACCORDION_TAB extends WPBakeryShortCode_DT_SC_TAB {

		protected $controls_css_settings = 'tc vc_control-container';
		protected $controls_list = array( 'add', 'edit', 'clone', 'delete' );
		protected $predefined_atts = array(
			'title' => ''
		);

		public function contentAdmin( $atts, $content = null ) {
			$width = $el_class = $title = '';
			extract( shortcode_atts( $this->predefined_atts, $atts ) );
			$output = '';

			$column_controls = $this->getColumnControls( $this->settings( 'controls' ) );
			$column_controls_bottom = $this->getColumnControls( 'add', 'bottom-controls' );

			if ( $width === 'column_14' || $width === '1/4' ) {
				$width = array( 'vc_col-sm-3' );
			} else if ( $width === 'column_14-14-14-14' ) {
				$width = array( 'vc_col-sm-3', 'vc_col-sm-3', 'vc_col-sm-3', 'vc_col-sm-3' );
			} else if ( $width === 'column_13' || $width === '1/3' ) {
				$width = array( 'vc_col-sm-4' );
			} else if ( $width === 'column_13-23' ) {
				$width = array( 'vc_col-sm-4', 'vc_col-sm-8' );
			} else if ( $width === 'column_13-13-13' ) {
				$width = array( 'vc_col-sm-4', 'vc_col-sm-4', 'vc_col-sm-4' );
			} else if ( $width === 'column_12' || $width === '1/2' ) {
				$width = array( 'vc_col-sm-6' );
			} else if ( $width === 'column_12-12' ) {
				$width = array( 'vc_col-sm-6', 'vc_col-sm-6' );
			} else if ( $width === 'column_23' || $width === '2/3' ) {
				$width = array( 'vc_col-sm-8' );
			} else if ( $width === 'column_34' || $width === '3/4' ) {
				$width = array( 'vc_col-sm-9' );
			} else if ( $width === 'column_16' || $width === '1/6' ) {
				$width = array( 'vc_col-sm-2' );
			} else {
				$width = array( '' );
			}
			for ( $i = 0; $i < count( $width ); $i ++ ) {
				$output .= '<div class="group wpb_sortable">';
				$output .= '<h3><span class="tab-label"><%= params.title %></span></h3>';
				$output .= '<div ' . $this->mainHtmlBlockParams( $width, $i ) . '>';
				$output .= str_replace( "%column_size%", wpb_translateColumnWidthToFractional( $width[ $i ] ), $column_controls );
				$output .= '<div class="wpb_element_wrapper">';
				$output .= '<div ' . $this->containerHtmlBlockParams( $width, $i ) . '>';
				$output .= do_shortcode( shortcode_unautop( $content ) );
				$output .= '</div>';
				if ( isset( $this->settings['params'] ) ) {
					$inner = '';
					foreach ( $this->settings['params'] as $param ) {
						$param_value = isset( $$param['param_name'] ) ? $$param['param_name'] : '';
						if ( is_array( $param_value ) ) {
							// Get first element from the array
							reset( $param_value );
							$first_key = key( $param_value );
							$param_value = $param_value[ $first_key ];
						}
						$inner .= $this->singleParamHtmlHolder( $param, $param_value );
					}
					$output .= $inner;
				}
				$output .= '</div>';
				$output .= str_replace( "%column_size%", wpb_translateColumnWidthToFractional( $width[ $i ] ), $column_controls_bottom );
				$output .= '</div>';
				$output .= '</div>';
			}

			return $output;
		}

		public function mainHtmlBlockParams( $width, $i ) {
			return 'data-element_type="' . $this->settings["base"] . '" class=" wpb_' . $this->settings['base'] . '"' . $this->customAdminBlockParams();
		}

		public function containerHtmlBlockParams( $width, $i ) {
			return 'class="wpb_column_container vc_container_for_children"';
		}

		public function contentAdmin_old( $atts, $content = null ) {
			$width = $el_class = $title = '';
			extract( shortcode_atts( $this->predefined_atts, $atts ) );
			$output = '';
			$column_controls = $this->getColumnControls( $this->settings( 'controls' ) );
			for ( $i = 0; $i < count( $width ); $i ++ ) {
				$output .= '<div class="group wpb_sortable">';
				$output .= '<div class="wpb_element_wrapper">';
				$output .= '<div class="vc_row-fluid wpb_row_container">';
				$output .= '<h3><a href="#">' . $title . '</a></h3>';
				$output .= '<div data-element_type="' . $this->settings["base"] . '" class=" wpb_' . $this->settings['base'] . ' wpb_sortable">';
				$output .= '<div class="wpb_element_wrapper">';
				$output .= '<div class="vc_row-fluid wpb_row_container">';
				$output .= do_shortcode( shortcode_unautop( $content ) );
				$output .= '</div>';
				if ( isset( $this->settings['params'] ) ) {
					$inner = '';
					foreach ( $this->settings['params'] as $param ) {
						$param_value = isset( $$param['param_name'] ) ? $$param['param_name'] : '';
						if ( is_array( $param_value ) ) {
							// Get first element from the array
							reset( $param_value );
							$first_key = key( $param_value );
							$param_value = $param_value[ $first_key ];
						}
						$inner .= $this->singleParamHtmlHolder( $param, $param_value );
					}
					$output .= $inner;
				}
				$output .= '</div>';
				$output .= '</div>';
				$output .= '</div>';
				$output .= '</div>';
				$output .= '</div>';
			}

			return $output;
		}

		protected function outputTitle( $title ) {
			return '';
		}

		public function customAdminBlockParams() {
			return '';
		}
	}		
}?>