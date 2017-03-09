<?php get_header();
	$settings = get_post_meta ( $post->ID, '_custom_settings', TRUE );
	$settings = is_array ( $settings ) ? $settings : array ();

	$page_layout  = array_key_exists( "layout", $settings ) ? $settings['layout'] : "content-full-width";
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

		case 'fullwidth-container':
			$page_layout = 'content-full-width';
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
    	<div id="post-<?php the_ID();?>" <?php post_class(array('dt-sc-yoga-style-single'));?>><?php
    		while( have_posts() ) {
    			the_post();

    			if( has_post_thumbnail() ){?>
    				<div class="entry-thumb">
    					<a href="<?php the_permalink();?>" title="<?php printf(esc_attr__('%s'),the_title_attribute('echo=0'));?>"><?php the_post_thumbnail("full", array('class'=>'aligncenter'));?></a>
    				</div><?php
    			}?>

    			<div class="dt-sc-hr-invisible-xsmall"> </div>

   				<h4><a href="<?php the_permalink();?>" title="<?php printf( esc_attr__('%s'), the_title_attribute('echo=0'));?>"><?php the_title(); ?></a></h4>
				<?php the_content();
				
				edit_post_link( esc_html__( ' Edit ','veda-yoga' ) );
    		}?>
    	</div>
	</section><!-- **Primary - End** --><?php
	
	if ( $show_sidebar ):
		if ( $show_right_sidebar ): ?>
			<!-- Secondary Right -->
			<section id="secondary-right" class="secondary-sidebar <?php echo esc_attr( $sidebar_class );?>"><?php get_sidebar('right');?></section><?php
		endif;
	endif;
get_footer();?>	