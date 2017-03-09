<?php 
$atts = array();
parse_str( $data, $atts );
extract( shortcode_atts( array(
	'el_class' => ''
), $atts ) );

$out = '';
$tags = wp_get_post_tags($post->ID);

if( !empty($tags) ):
	$count = count($tags);
	$out .= '<p class="tags vc_gitem-post-tags">';
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

return $out;