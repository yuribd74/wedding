<?php get_header(); 
  $page_layout = veda_option('pageoptions','program-archives-page-layout');
  $page_layout  = !empty( $page_layout ) ? $page_layout : "content-full-width";
  
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
    $post_layout = veda_option('pageoptions','program-archives-post-layout');
    $post_layout = isset( $post_layout ) ? $post_layout : 'one-half-column';

    switch($post_layout):
      case 'one-third-column':
        $post_class = $show_sidebar ? " dt-sc-fitness-program column dt-sc-one-third with-sidebar" : " dt-sc-fitness-program column dt-sc-one-third";
        $columns = 3;
      break;
      
      default:
      case 'one-half-column':
        $post_class = $show_sidebar ? " dt-sc-fitness-program column dt-sc-one-half with-sidebar" : " dt-sc-fitness-program column dt-sc-one-half";
        $columns = 2;
      break;
    endswitch;

    if( have_posts() ) : ?>
      <div class="dt-sc-fitness-program-container"><?php
        while( have_posts() ):
          the_post();
		  $PID = get_the_ID(); ?>
		  <div class="<?php echo $post_class; ?>">
			  <figure>
				  <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php
					  if(has_post_thumbnail()):
						  $attr = array('title' => get_the_title(), 'alt' => get_the_title());
						  the_post_thumbnail('full', $attr);
					  else:
						  echo '<img src="https://placeholdit.imgix.net/~text?txtsize=45&txt='.get_the_title().'&w=573&h=291" alt="'.get_the_title().'" title="'.get_the_title().'" />';
					  endif; ?>
				  </a>
				  <figcaption><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><h4><?php the_title(); ?></h4></a></figcaption>
			  </figure>
			  <div class="dt-sc-fitness-program-details">
				  <?php echo veda_excerpt(35); ?>
				  <div class="dt-sc-fitness-program-meta"><?php
					  $program_settings = get_post_meta($PID, '_custom_settings', true);
					  $program_settings = is_array ( $program_settings ) ? $program_settings : array ();
					  if(array_key_exists('levels', $program_settings))
						  echo '<p>'.esc_html($program_settings['levels']).'</p>';
					  if(array_key_exists('timing', $program_settings))
						  echo '<p>'.esc_html($program_settings['timing']).'</p>';
					  if(array_key_exists('duration', $program_settings))
						  echo '<p>'.esc_html($program_settings['duration']).'</p>';

					  if(array_key_exists('price', $program_settings))
						  echo '<div class="dt-sc-fitness-program-price"> <sup>'.esc_html($program_settings['pre_price']).'</sup> '.esc_html($program_settings['price']).' / <sub> '.esc_html($program_settings['post_price']).' </sub> </div>'; ?>
				  </div>
			  </div>
		  </div><?php
        endwhile;?>
      </div><?php
    endif;?>
    <!-- **Pagination** -->
    <div class="pagination blog-pagination">
      <?php echo veda_pagination(); ?>
    </div><!-- **Pagination** -->
  </section><!-- **Primary - End** --><?php

  if ( $show_sidebar ):
    if ( $show_right_sidebar ): ?>
      <!-- Secondary Right -->
      <section id="secondary-right" class="secondary-sidebar <?php echo esc_attr( $sidebar_class );?>"><?php get_sidebar('right');?></section>
      <!-- Secondary Right --><?php
    endif;
  endif;
get_footer();?>