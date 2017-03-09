<?php get_header();
	$settings = get_post_meta ( $post->ID, '_custom_settings', TRUE );
	$settings = is_array ( $settings ) ? $settings : array ();

	$teachers = get_post_meta( $post->ID ,'_teachers', TRUE );

	$level = wp_get_object_terms( $post->ID, 'dt_yoga_student_level');
	if( !empty( $level ) ) {
		$levels_label = esc_html__('Student Levels', 'veda-yoga');
		if( function_exists( 'veda_opts_get' ) ) {
			$levels_label = veda_opts_get( 'plural-level-name', $levels_label  );
		}

		$level = '<li> <i class="fa fa-bar-chart"></i> ';
		$level .= esc_html( $levels_label ).' : ';
		$level .= get_the_term_list($post->ID, 'dt_yoga_student_level', '', ', ','');
		$level .= '</li>';
	} else {
		$level = '';
	}

	$duration = wp_get_object_terms( $post->ID, 'dt_yoga_video_durations');
	if( !empty( $duration) ) {
		$durations_label = esc_html__('Durations', 'veda-yoga');
		if( function_exists( 'veda_opts_get' ) ) {
			$durations_label = veda_opts_get( 'plural-video-duration-name', $durations_label );
		}

		$duration = '<li> <i class="fa fa-clock-o"></i> ';
		$duration .= esc_html( $durations_label ).' : ';
		$duration .= get_the_term_list($post->ID ,'dt_yoga_video_durations', '', ', ','');
		$duration .= '</li>';					
	} else {
		$duration = '';
	}

	$styles = get_post_meta( $post->ID ,'_styles', TRUE );
	$styles = is_array ( $styles ) ? $styles : array ();
	$style = '';
	if( !empty($styles) ) {
		$styles_label =  esc_html__('styles', 'veda-yoga');
		if( function_exists( 'veda_opts_get' ) ) {
			$styles_label = veda_opts_get( 'plural-style-name', $styles_label );
		}

		$style .= '<li class="yoga-style"> <i class="fa fa-odnoklassniki"></i> ';
		$style .= esc_html( $styles_label ).' : ';
		foreach( $styles as $cstyle ) {
			$style .= '<a href="'.get_permalink( $cstyle ).'" title="'.get_the_title( $cstyle ).'">'. get_the_title( $cstyle ).'</a>';
		}
		$style .= '</li>';				
	} else {
		$style = '';
	}		

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
    	<div id="post-<?php the_ID();?>" <?php post_class(array('dt-sc-yoga-video-single'));?>><?php
    		while( have_posts() ) {
    			the_post();?>
    			<div class="entry-thumb-wrapper">

	    			<div class="dt-sc-yoga-single-video-container"><?php
						if( is_user_logged_in() ) {
							echo wp_oembed_get($settings['video-url']);
						} else {
							# Free Course
							if( !array_key_exists('is-premium-video', $settings) ) {
								if( array_key_exists('video-url',$settings) ) {
									echo wp_oembed_get($settings['video-url']);
								} else if(  has_post_thumbnail() ) {?>
									<div class="entry-thumb">
										<a href="<?php the_permalink();?>" title="<?php printf(esc_attr__('%s'),the_title_attribute('echo=0'));?>"><?php 
											the_post_thumbnail("full", array('class'=>'aligncenter'));?></a>
									</div><?php
								}
							} elseif( array_key_exists('is-premium-video', $settings) ) {
								$text = trim(stripslashes(veda_option('pageoptions','premium-video-text')));?>
									<div class="dt-sc-yoga-premium-video-overlay">
										<div class="dt-sc-yoga-premium-video-overlay-message">
											<?php echo do_shortcode($text); ?>
										</div>
									</div><?php
								if( has_post_thumbnail() ) {?>
									<div class="entry-thumb">
										<a href="<?php the_permalink();?>" title="<?php printf(esc_attr__('%s'),the_title_attribute('echo=0'));?>"><?php 
											the_post_thumbnail("full", array('class'=>'aligncenter'));?></a>
									</div><?php
								}
							}
						}?>                    		    				
	    			</div>

   					<ul class="yoga-video-meta-detail">
   						<?php echo $level.$duration.$style; ?>
   					</ul>
	    		</div>

    			<div class="dt-sc-hr-invisible-medium"> </div>

   				<div class="dt-sc-three-fourth column first">
   					<h4><a href="<?php the_permalink();?>" title="<?php printf( esc_attr__('%s'), the_title_attribute('echo=0'));?>"><?php the_title(); ?></a></h4>
   					<?php the_content(); ?>
   				</div>
   				<div class="dt-sc-one-fourth column"><?php
   					$teachers = is_array ( $teachers ) ? $teachers : array ();

					$teachers_label =  esc_html__('Teachers', 'veda-yoga');
					if( function_exists( 'veda_opts_get' ) ) {
						$teachers_label = veda_opts_get( 'plural-pose-name', $teachers_label );
					}

					if( !empty($teachers) ) {
						echo '<h4>'.$teachers_label.'</h4>';
					}

   					foreach( $teachers as $teacher ) {
   						$title = get_the_title($teacher);
   						$permalink = get_permalink($teacher);?>
   						<div class="dt-sc-yoga-video-author dt-sc-team hide-social-show-on-hover rounded">
   							<div class="dt-sc-team-thumb"><?php
   								if( has_post_thumbnail( $teacher ) ) {
   									echo get_the_post_thumbnail($teacher,'full');
   								} else {
   									echo '<img src="http://placehold.it/170X170.jpg&text='.esc_html($title).'" alt="'.esc_attr($title).'" title="'.esc_attr($title).'"/>';

   								}?>   								
   							</div>
   							<div class="dt-sc-team-details">
   								<h4><a href="<?php echo esc_url($permalink);?>"><?php echo esc_html($title); ?></a></h4>
   								<h5><a href="<?php echo esc_url($permalink);?>"><?php esc_html_e('View Profile');?></a></h5>
   							</div>
   						</div><?php
   					}?>
   				</div><?php
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