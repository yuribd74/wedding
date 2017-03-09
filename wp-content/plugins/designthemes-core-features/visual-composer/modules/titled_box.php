<?php add_action( 'vc_before_init', 'dt_sc_titled_box_vc_map' );
function dt_sc_titled_box_vc_map() {

	global $variations;

	vc_map( array(
		"name" => esc_html__( "Title boxes", 'veda-core' ),
    "base" => "dt_sc_titled_box",
		"icon" => "dt_sc_titled_box",
		"category" => DT_VC_CATEGORY,
		"params" => array(

      # Types
      array(
        'type' => 'dropdown',
        'heading' => esc_html__('Type', 'veda-core'),
        'param_name' => 'type',
        'admin_label' => true,
        'value' => array(
          esc_html__('Titled Box','veda-core')  => 'titled-box',
          esc_html__('Error Box','veda-core')  => 'error-box',
          esc_html__('Warning Box','veda-core')  => 'warning-box',
          esc_html__('Success Box','veda-core')  => 'success-box',
          esc_html__('Info Box','veda-core')  => 'info-box'
        ),
        'std' => 'titled-box'
      ),

      #Title      
      array(
        "type" => "textfield",
        "heading" => esc_html__( "Title", 'veda-core' ),
        "param_name" => "title",
        "value" => 'Lorem ipsum dolor sit amet',
        "description" => esc_html__( "Enter title", 'veda-core' ),
        "dependency" => array( 'element' => 'type', 'value' => 'titled-box')
      ),

      # Icon Type
      array(
        'type' => 'dropdown',
        'heading' => esc_html__('Icon Type','veda-core'),
        'param_name' => 'icon_type',
        'dependency' => array( 'element' => 'type', 'value' => 'titled-box' ),            
        'value' => array( 
          esc_html__('Font Awesome', 'veda-core' ) => 'fontawesome' ,
          esc_html__('Class','veda-core') => 'css_class'
        ),
        'std' => 'fontawesome'
      ),

      # Font Awesome
      array(
        'type' => 'iconpicker',
        'heading' => esc_html__( 'Font Awesome', 'veda-core' ),
        'param_name' => 'icon',
        'value' => 'fa fa-info-circle',
        'settings' => array( 'emptyIcon' => false, 'iconsPerPage' => 4000 ),
        'dependency' => array( 'element' => 'icon_type', 'value' => 'fontawesome' ),
        'description' => esc_html__( 'Select icon from library', 'veda-core' ),
      ),

      # Custom Class
      array(
        'type' => 'textfield',
        'heading' => esc_html__( 'Custom class', 'veda-core' ),
        'param_name' => 'icon_css_class',
        'dependency' => array( 'element' => 'icon_type', 'value' => 'css_class')
      ),

      # Content
      array(
        'type' => 'textarea_html',
        'heading' => esc_html__( 'Content', 'veda-core' ),
        'param_name' => 'content',
        'value' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi hendrerit elit turpis, a porttitor tellus sollicitudin at. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.'
      ),            

      # Content Color      
      array(
        "type" => "colorpicker",
        "heading" => esc_html__( "Content color", 'veda-core' ),
        "param_name" => "textcolor",
        'dependency' => array( 'element' => 'type', 'value' => 'titled-box' ),            
        "description" => esc_html__( "Select text color", 'veda-core' ),
      ),

      # Variation
      array(
        'type' => 'dropdown',
        'heading' => esc_html__( 'Color', 'veda-core' ),
        'param_name' => 'variation',
        'value' => $variations,
        'dependency' => array( 'element' => 'type', 'value' => 'titled-box' ),            
        'description' => esc_html__( 'Select button color', 'veda-core' ),
      ),

      # BG Color     
      array(
        "type" => "colorpicker",
        "heading" => esc_html__( "Background color", 'veda-core' ),
        "param_name" => "bgcolor",
        'dependency' => array( 'element' => 'type', 'value' => 'titled-box' ),            
        "description" => esc_html__( "Select background color", 'veda-core' ),
        "dependency" => array( 'element' => 'variation', 'value' =>'-' )
      ),

      # Extra class name
      array(
        'type' => 'textfield',
        'heading' => esc_html__( 'Extra class name', 'veda-core' ),
        'param_name' => 'class',
        'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS', 'veda-core' )
      )                
		)
	) );
}?>