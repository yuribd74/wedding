<?php 
$atts = array();
parse_str( $data, $atts );
extract( shortcode_atts( array(
	'el_class' => ''
), $atts ) );


$format = get_post_format( $post->ID );
$format = !empty( $format ) ? $format : "image";

$link = get_post_format_link( $format );
$link = !empty( $link ) ? $link : "#";


$out  = '<div class="entry-format '.esc_attr($el_class).'">';
$out .= '<a class="ico-format format-'.$format.'" href="'.esc_url($link).'"></a>';
$out .= '</div>';

return $out;