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
    	<div id="post-<?php the_ID();?>" <?php post_class(array('dt-sc-yoga-program-single'));?>><?php
    		while( have_posts() ) {

    			the_post(); ?>

    			<div class="entry-thumb-wrapper"><?php
    				if( has_post_thumbnail() ){?>
    					<div class="entry-thumb">
    						<a href="<?php the_permalink();?>" title="<?php printf(esc_attr__('%s'),the_title_attribute('echo=0'));?>"><?php the_post_thumbnail("full", array('class'=>'aligncenter'));?></a>
    					</div><?php
    				}?>

	    			<div class="dt-sc-one-third column first">
	    				<ul class="yoga-single-meta">
	    					<?php if( array_key_exists('duration', $settings) ) : ?>
	    						<li><span><?php echo esc_html__('Duration','veda-yoga');?></span>: <i class="fa fa-clock-o"></i> <?php echo $settings['duration'];?></li>
	    					<?php endif;
	    					$styles = get_post_meta( $post->ID ,'_styles', TRUE );
	    					$styles = is_array ( $styles ) ? $styles : array ();

	    					if( !empty($styles) ) :
	    						$styles_label =  esc_html__('styles', 'veda-yoga');
	    					if( function_exists( 'veda_opts_get' ) ) {
	    						$styles_label = veda_opts_get( 'plural-style-name', $styles_label );
	    					}?>
	    						<li class="yoga-styles"><span><?php echo esc_html($styles_label);?></span>: <i class="fa fa-odnoklassniki"></i> <?php
	    							foreach( $styles as $cstyle ) {
	    								echo '<a href="'.get_permalink( $cstyle ).'" title="'.get_the_title( $cstyle ).'">'. get_the_title( $cstyle ).'</a>';
	    							}
	    						?></li><?php
	    					endif;?>
	    				</ul>
	    			</div>
	    			<div class="dt-sc-one-third column">
	    				<ul class="yoga-single-meta"><?php
	    					$level = wp_get_object_terms( $post->ID , 'dt_yoga_student_level');
	    					if( !empty( $level ) ) {
	    						$levels_label = esc_html__('Student Levels', 'veda-yoga');

	    						if( function_exists( 'veda_opts_get' ) ) {
	    							$levels_label = veda_opts_get( 'plural-level-name', $levels_label  );
	    						}?>
	    						<li>
	    							<span><?php echo esc_html($levels_label);?></span>:
	    							<i class="fa fa-bar-chart"></i>
	    							<?php echo get_the_term_list($post->ID, 'dt_yoga_student_level', '', ', ','');?>
	    						</li><?php
	    					}

	    					$teachers = get_post_meta( $post->ID ,'_teachers', TRUE );
	    					$teachers = is_array ( $teachers ) ? $teachers : array ();
	    					if( !empty($teachers) ) {
	    						$teachers_label =  esc_html__('Teachers', 'veda-yoga');
	    						if( function_exists( 'veda_opts_get' ) ) {
	    							$teachers_label = veda_opts_get( 'plural-pose-name', $teachers_label );
	    						}?>
	    						<li class="yoga-teacher"><span><?php echo esc_html($teachers_label);?></span>: <i class="fa fa-user"></i><?php
	    							foreach( $teachers as $cteacher ) {
	    								echo '<a href="'.get_permalink( $cteacher ).'" title="'.get_the_title( $cteacher ).'">'. get_the_title( $cteacher ).'</a>';
	    							}
	    					}?>
	    				</ul>    			
	    			</div>
	    			<div class="dt-sc-one-third column">
	    				<ul class="yoga-single-meta"><?php
	    					$categories = wp_get_object_terms( $post->ID , 'dt_yoga_program_categories');
	    					if( !empty( $categories ) ) {

	    						$categories_label = esc_html__('Categories', 'veda-yoga');

	    						if( function_exists( 'veda_opts_get' ) ) {
	    							$categories_label = veda_opts_get( 'plural-program-category-name', $categories_label  );
	    						} ?>
	    						<li>
	    							<span><?php echo esc_html($categories_label);?></span>:
	    							<i class="fa fa-gg"></i>
	    							<?php echo get_the_term_list($post->ID, 'dt_yoga_program_categories', '', ', ','');?>
	    						</li><?php
	    					}
	    					?>
	    				</ul>    			
	    			</div>
	    		</div>

    			<div class="dt-sc-hr-invisible-small"> </div> 
    			<div class="dt-sc-clear"></div>
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