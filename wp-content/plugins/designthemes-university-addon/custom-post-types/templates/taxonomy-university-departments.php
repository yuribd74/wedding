<?php get_header(); 
  $page_layout = veda_option('pageoptions','udepartment-archives-page-layout');
  $page_layout  = !empty( $page_layout ) ? $page_layout : "content-full-width";
  
  $show_sidebar = $show_left_sidebar = $show_right_sidebar = false;
  $divider = $sidebar_class = "";
  
  switch ( $page_layout ) {
    case 'with-left-sidebar':
      $page_layout = "page-with-sidebar with-left-sidebar";
      $show_sidebar = $show_left_sidebar = true;
      $sidebar_class = "secondary-has-left-sidebar";
    break;

    case 'with-right-sidebar':
      $page_layout = "page-with-sidebar with-right-sidebar";
      $show_sidebar = $show_right_sidebar = true;
      $sidebar_class = "secondary-has-right-sidebar";
    break;
    
    case 'with-both-sidebar':
      $page_layout = "page-with-sidebar with-both-sidebar";
      $show_sidebar = $show_left_sidebar = $show_right_sidebar  = true;
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
      <section id="secondary-left" class="secondary-sidebar <?php echo esc_attr( $sidebar_class );?>"><?php get_sidebar('left');?></section>
      <!-- Secondary Left --><?php
    endif;
  endif;?>
  <section id="primary" class="<?php echo esc_attr( $page_layout );?>"><?php

  	$post_layout = veda_option('pageoptions','udepartment-post-layout');
  	$columns = 2;
  	$columnclass = 'column dt-sc-one-half';

  	switch ( $post_layout ) {

  		case '2':
  		default:
  			$columns = 2;
  			$columnclass = 'column dt-sc-one-half';
  		break;

  		case '3':
  			$columns = 3;
  			$columnclass = 'column dt-sc-one-third';
  		break;

  		case '4':
  			$columns = 4;
  			$columnclass = 'column dt-sc-one-fourth';
  		break;	  		
  	}

  	$post_type = veda_option('pageoptions','udepartment-post');
  	switch( $post_type ){

  		case '2':
  			$faculty_post = true;
  			$course_post = false;
  		break;

  		case '3':
  			$course_post = true;
  			$faculty_post = false;
  		break;

  		case '4':
  			$faculty_post = $course_post = true;
  			$divider = '<div class="dt-sc-hr-invisible-small"> </div>';
  		break;
  	}

  	$ucourse =	veda_opts_get( 'plural-ucourse-name', esc_html__('Courses', 'veda-university') );
  	$ufaculty = veda_opts_get( 'plural-ufaculty-name', esc_html__('Faculties', 'veda-university') );

  	$term = get_queried_object();

  	if( $faculty_post ) :?>

  		<div class="aligncenter">
  			<h2><?php echo esc_html( $ufaculty );?></h2>
  			<div class="dt-sc-small-separator bottom"> </div>
  		</div>
  		<div class="dt-sc-hr-invisible-small "> </div>
	  	<!-- Faculties --><?php 
	  	$fpaged = 1;
	  	if ( get_query_var('paged') ) { 
	  		$fpaged = get_query_var('paged');
	  	} elseif ( get_query_var('page') ) {
	  		$fpaged = get_query_var('page');
	  	}

	  	$faculties = array( 
	  		'post_type' => 'dt_faculties',
	  		'departments' => $term->slug,
	  		'suppress_filters' => false,
	  		'posts_per_page' => get_option('posts_per_page'),
	  		'paged' => $fpaged);

	  	$wp_query = new WP_Query();
	  	$wp_query->query( $faculties );
	  	if( $wp_query->have_posts() ) {
	  		$i = 1;
	  		while( $wp_query->have_posts() ) {
	  			$wp_query->the_post();
	  			$the_id = get_the_ID();
	  			$temp_class = $columnclass;

	  			if($i == 1){
	  				$temp_class .= " first";
	  			}

	  			if($i == $columns) $i = 1; else $i = $i + 1;?>

	  			<div class="<?php echo esc_attr( $temp_class);?>"><?php
	  				$sc = '[dt_sc_university_faculty_item id="'.$the_id.'"/]';
	  				echo do_shortcode($sc);?>
	  			</div><?php
			}				
	  	} else { ?>
	  		<div class="column dt-sc-one-column">
	  			<h2><?php esc_html_e("Nothing Found.", "veda-university");?></h2>
	  			<p><?php esc_html_e("Apologies, but no results were found for the request.", "veda-university");?></p>
	  		</div><?php
	  	}

	  	$pagination = veda_pagination();
	  	if( strlen($pagination) > 0 ) {?>
	  		<!-- **Pagination** -->
	  			<div class="pagination blog-pagination"><?php echo $pagination;?></div>
	  		<!-- **Pagination** --><?php
	  	}
	  	wp_reset_postdata();	  	
	endif;

	echo $divider;

	if( $course_post ) :?>
	  	<!-- Courses -->
	  	<div class="aligncenter">
	  		<h2><?php echo esc_html( $ucourse );?></h2>
	  		<div class="dt-sc-small-separator bottom"> </div>
  		</div>
  		<div class="dt-sc-hr-invisible-small "> </div><?php

  		$cpaged = 1;
  		if ( get_query_var('paged') ) { 
  			$cpaged = get_query_var('paged');
  		} elseif ( get_query_var('page') ) {
  			$cpaged = get_query_var('page');
	  	}

	  	$courses = array( 
	  		'post_type' => 'dt_courses',
	  		'departments' => $term->slug,
	  		'suppress_filters' => false,
	  		'posts_per_page' => get_option('posts_per_page'),
	  		'paged' => $cpaged,
	  		'order_by' => 'date',
	  		'order' => 'DESC' );

	  	$wp_query = new WP_Query();
	  	$wp_query->query( $courses );
	  	if( $wp_query->have_posts() ) {
	  		$i = 1;
	  		while( $wp_query->have_posts() ) {
	  			$wp_query->the_post();
	  			$the_id = get_the_ID();
	  			$temp_class = $columnclass;

	  			if($i == 1){
	  				$temp_class .= " first";
				}

				if($i == $columns) $i = 1; else $i = $i + 1;?>
				<div class="<?php echo esc_attr( $temp_class);?>"><?php
					$sc = '[dt_sc_university_course_item id="'.$the_id.'" type="with-image"/]';
					echo do_shortcode($sc);?>
				</div><?php
			}
	  	} else { ?>
	  		<div class="column dt-sc-one-column">
	  			<h2><?php esc_html_e("Nothing Found.", "veda-university");?></h2>
	  			<p><?php esc_html_e("Apologies, but no results were found for the request.", "veda-university");?></p>
	  		</div><?php
	  	}

	  	$pagination = veda_pagination();
	  	if( strlen($pagination) > 0 ) {?>
	  		<!-- **Pagination** -->
	  		<div class="pagination blog-pagination"><?php echo $pagination; ?></div>
	  		<!-- **Pagination** --><?php
	  	}
		wp_reset_postdata();
	endif;?>
  </section><!-- **Primary - End** --><?php
  if ( $show_sidebar ):
    if ( $show_right_sidebar ): ?>
      <!-- Secondary Right -->
      <section id="secondary-right" class="secondary-sidebar <?php echo esc_attr( $sidebar_class );?>"><?php get_sidebar('right');?></section>
      <!-- Secondary Right --><?php
    endif;
  endif;
get_footer();?>  