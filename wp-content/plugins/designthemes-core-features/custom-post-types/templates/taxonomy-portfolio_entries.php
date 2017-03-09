<?php get_header(); 
  $page_layout = veda_option('pageoptions','portfolio-archives-page-layout');
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

      $post_layout = veda_option('pageoptions','portfolio-archives-post-layout');
      $post_layout = isset( $post_layout ) ? $post_layout : 'one-half-column';

      $post_style = veda_option('pageoptions','portfolio-archives-post-style');
      $post_style = isset( $post_style ) ? $post_style : 'type1';

      $allow_space = veda_option('pageoptions','portfolio-allow-grid-space');
      $allow_space = isset( $allow_space ) ? "with-space" : "no-space";

      switch($post_layout):
        case 'one-fourth-column':
          $post_class = $show_sidebar ? " portfolio column dt-sc-one-fourth with-sidebar" : " portfolio column dt-sc-one-fourth";
          $columns = 4;
        break;

        case 'one-third-column':
          $post_class = $show_sidebar ? " portfolio column dt-sc-one-third with-sidebar" : " portfolio column dt-sc-one-third";
          $columns = 3;
        break;
        
        default:
        case 'one-half-column':
          $post_class = $show_sidebar ? " portfolio column dt-sc-one-half with-sidebar" : " portfolio column dt-sc-one-half";
          $columns = 2;
        break;
      endswitch;

      if( have_posts() ) :
        $i = 1;?>
        <div class="dt-sc-portfolio-container <?php echo esc_attr($allow_space);?>"><?php
          while( have_posts() ):
            the_post();
            $the_id = get_the_ID();

            $temp_class = $post_style.' '.$allow_space;
            if($i == 1) $temp_class .= $post_class." first"; else $temp_class .= $post_class;
            if($i == $columns) $i = 1; else $i = $i + 1;

            #setting up images
              $portfolio_item_meta = get_post_meta($the_id,'_portfolio_settings',TRUE);
              $portfolio_item_meta = is_array($portfolio_item_meta) ? $portfolio_item_meta  : array();
              $items = false;

              if( array_key_exists('items_name', $portfolio_item_meta) ) {

                $items = true;
                $item =  $portfolio_item_meta['items_name'][0];
                $popup = $portfolio_item_meta['items'][0];

                if( "video" === $item ) {

                  $x = array_diff( $portfolio_item_meta['items_name'] , array("video") );

                  if( !empty($x) ) {
                    $image = $portfolio_item_meta['items'][key($x)];
                  } else {
                    $image = 'http://placehold.it/1170X902.jpg&text=Video';
                  }
                } else {
                  if( sizeof($portfolio_item_meta['items']) > 1 ){
                    $popup = $portfolio_item_meta['items'][1];
                  }
                  $image = $portfolio_item_meta['items'][0];
                }
              }

              if( has_post_thumbnail() ){
                $post_thumb = wp_get_attachment_image_src(get_post_thumbnail_id( $the_id ), 'full', false);

                if( $post_thumb ) {
                  $image = $post_thumb[0];
                  if( !$items ){
                    $popup = $image;
                  }
                }elseif( $items ){
                    $image = $image;
                    $popup = $popup;
                } else {
                  $image = $popup = 'http://placehold.it/1170X902.jpg&text='.get_the_title($the_id);  
                } 
              }elseif( $items ) {
                $image = $image;
                $popup = $popup;
              }else{
                $image = $popup = 'http://placehold.it/1170X902.jpg&text='.get_the_title($the_id);
              }
            #setting up images end ?>
            <div id="dt_portfolios-<?php echo esc_attr($the_id);?>" class="<?php echo esc_attr( trim($temp_class));?>">
              <figure>
                <img src="<?php echo esc_url($image); ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                <div class="image-overlay">
                  <?php if($post_style == "type3" ):?>
                          <div class="links">
                            <a title="<?php the_title();?>" href="<?php the_permalink();?>"><?php the_title();?></a>
                          </div>
                  <?php elseif( $post_style == "type4" || $post_style == "type6" ):?>
                          <div class="links">
                            <a title="<?php the_title();?>" href="<?php the_permalink();?>"> <span class="icon icon-linked"> </span> </a>
                            <a title="<?php the_title();?>" data-gal="prettyPhoto[gallery]" href="<?php echo esc_url($popup);?>">
                              <span class="icon icon-search"> </span> </a>
                          </div>
                  <?php elseif( $post_style == "type1" || $post_style == "type2" || $post_style == "type5" || $post_style == "type7" || $post_style == "type8"):?>
                          <div class="links">
                            <a title="<?php the_title();?>" href="<?php the_permalink();?>"> <span class="icon icon-linked"> </span> </a>
                            <a title="<?php the_title();?>" data-gal="prettyPhoto[gallery]" href="<?php echo esc_url($popup);?>">
                              <span class="icon icon-search"> </span> </a>
                          </div>
                          <div class="image-overlay-details">
                            <?php if( $post_style != "type2"):
                                    if( $post_style == "type7" ):
                                      the_terms( $post->ID, 'portfolio_entries', "<p class='categories'>",' ','</p>');
                                    else:
                                      the_terms( $post->ID, 'portfolio_entries', "<p class='categories'>",', ','</p>');
                                    endif;
                                  endif;?>
                                  <h2><a href="<?php the_permalink();?>" title="<?php printf( esc_attr__('%s'), the_title_attribute('echo=0'));?>"><?php
                                    the_title();?></a></h2>
                          </div>
                  <?php elseif( $post_style == "type9" ):?>
                          <div class="links">
                            <a title="<?php the_title();?>" data-gal="prettyPhoto[gallery]" href="<?php echo esc_url($popup);?>">
                              <span class="pe-icon pe-plus"> </span> </a>
                          </div>
                  <?php endif;?>
                </div>
              </figure>
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