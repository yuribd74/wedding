<?php get_header();
	$menu_settings = get_post_meta ( $post->ID, '_custom_settings', TRUE );
	$menu_settings = is_array ( $menu_settings ) ? $menu_settings : array ();

	$page_layout  = array_key_exists( "layout", $menu_settings ) ? $menu_settings['layout'] : "content-full-width";
	$show_sidebar = $show_left_sidebar = $show_right_sidebar = false;
	$sidebar_class = "";
	
	switch ( $page_layout ) {
		case 'with-left-sidebar':
			$page_layout = "page-with-sidebar with-left-sidebar";
			$show_sidebar = $show_left_sidebar = true;
			$sidebar_class = "secondary-has-left-sidebar";
		break;

		case 'with-right-sidebar':
			$page_layout = "page-with-sidebar with-right-sidebar";
			$show_sidebar = $show_right_sidebar	= true;
			$sidebar_class = "secondary-has-right-sidebar";
		break;
		
		case 'with-both-sidebar':
			$page_layout = "page-with-sidebar with-both-sidebar";
			$show_sidebar = $show_left_sidebar = $show_right_sidebar	= true;
			$sidebar_class = "secondary-has-both-sidebar";
		break;

		case 'content-full-width':
		default:
			$page_layout = "content-full-width";
		break;
	}
	if ( $show_sidebar ):
		if ( $show_left_sidebar ): ?>
			<!-- Secondary Left -->
			<section id="secondary-left" class="secondary-sidebar <?php echo esc_attr( $sidebar_class );?>"><?php get_sidebar('left');?></section><?php
		endif;
	endif;?>

	<section id="primary" class="<?php echo esc_attr( $page_layout );?>">
        <article id="post-<?php the_ID();?>" <?php post_class('dt-sc-chef-single');?>><?php
			if( have_posts() ):
				while( have_posts() ):
					the_post();
					the_content();
				endwhile;
			 endif;?>
        </article>
	</section><!-- **Primary - End** --><?php

	if ( $show_sidebar ):
		if ( $show_right_sidebar ): ?>
			<!-- Secondary Right -->
			<section id="secondary-right" class="secondary-sidebar <?php echo esc_attr( $sidebar_class );?>"><?php get_sidebar('right');?></section><?php
		endif;
	endif;
get_footer();?>