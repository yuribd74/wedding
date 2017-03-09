<?php 
$atts = array();
parse_str( $data, $atts );
extract( shortcode_atts( array(
	'el_class' => ''
), $atts ) );

$commenttext = "";
if((wp_count_comments($post->ID)->approved) == 0):
	$commenttext = '0 ';
else:
	$commenttext = wp_count_comments($post->ID)->approved;
endif;

$link = get_permalink( $post->ID );

$out  = '<div class="comments">';
$out .= '<a class="comments" href="'.esc_url($link).'/#respond">';
$out .= '	<i class="pe-icon pe-chat"></i>'.esc_html($commenttext);
$out .= '</a>';
$out .= '</div>';
return $out;