<?php get_header();
	$model_settings = get_post_meta ( $post->ID, '_custom_settings', TRUE );
	$model_settings = is_array ( $model_settings ) ? $model_settings : array ();

	$page_layout  = array_key_exists( "layout", $model_settings ) ? $model_settings['layout'] : "content-full-width";
	$show_sidebar = $show_left_sidebar = $show_right_sidebar = false;
	$sidebar_class = "";
	$container = 'container';
	
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

		<div class="section-wrapper">
			<div class="container">
				<div class="dt-sc-hr-invisible-small"> </div>
				<div class="column dt-sc-three-sixth no-space">
                    <div class="dt-sc-clear"> </div>
                    <h2><?php echo the_title();?></h2>
                    <div class="dt-sc-double-border-separator"> </div>
                    <div class="dt-sc-hr-invisible-xsmall"> </div>
                    <div class="dt-sc-clear"> </div>
				</div>
			</div>
		</div>

		<div class="section-wrapper">
			<div class="container">
				<article id="post-<?php the_ID();?>" <?php post_class(array('dt-sc-model-single'));?>>
					<div class="model-nav-container">
						<div class="model-prev-link">
							<?php previous_post_link('%link',__('Previous','veda-model') );?>
						</div>
						<div class="model-next-link">
							<?php next_post_link('%link',__('Next','veda-model'));?>
						</div>
					</div>
				</article>
			</div>
		</div>
        
        <div class="<?php echo esc_attr( $container );?>">
        	<article id="post-<?php the_ID();?>" <?php post_class(array('dt-sc-model-single'));?>><?php
				if( have_posts() ):
					while( have_posts() ):
						the_post();
						the_content();
					endwhile;
				 endif;?>
	        </article>
       </div>
	</section><!-- **Primary - End** --><?php
	
	if ( $show_sidebar ):
		if ( $show_right_sidebar ): ?>
			<!-- Secondary Right -->
			<section id="secondary-right" class="secondary-sidebar <?php echo esc_attr( $sidebar_class );?>"><?php get_sidebar('right');?></section><?php
		endif;
	endif;
get_footer();?>