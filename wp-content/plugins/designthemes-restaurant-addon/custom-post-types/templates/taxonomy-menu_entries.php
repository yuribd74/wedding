<?php get_header(); 
  $page_layout = veda_option('pageoptions','menu-archives-page-layout');
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
    $post_layout = veda_option('pageoptions','menu-archives-post-layout');
    $post_layout = isset( $post_layout ) ? $post_layout : 'one-half-column';

    switch($post_layout):
      case 'one-third-column':
        $post_class = $show_sidebar ? " dt-sc-menu type2 column dt-sc-one-third with-sidebar" : " dt-sc-menu type2 column dt-sc-one-third";
        $columns = 3;
      break;
      
      default:
      case 'one-half-column':
        $post_class = $show_sidebar ? " dt-sc-menu type2 column dt-sc-one-half with-sidebar" : " dt-sc-menu type2 column dt-sc-one-half";
        $columns = 2;
      break;
    endswitch;

    if( have_posts() ) : ?>
      <div class="dt-sc-menu-container"><?php
        while( have_posts() ):
          the_post();
		  $PID = get_the_ID(); $t_class = '';

		  if(!has_post_thumbnail()) $t_class .= ' no-menu-thumb'; ?>

          <div class="<?php echo $post_class.$t_class; ?>"><?php
              $menu_settings = get_post_meta($PID, '_custom_settings', true);
              $menu_settings = is_array ( $menu_settings ) ? $menu_settings : array ();
              if(has_post_thumbnail()): ?>
                  <figure><?php
					  $attr = array('title' => get_the_title(), 'alt' => get_the_title());
					  the_post_thumbnail('menu-type2', $attr);				  
                      if(array_key_exists('veg_type', $menu_settings)):
                          $vtype = $menu_settings['veg_type'];
                          if($vtype == 'veg')
                              echo '<div class="dt-sc-menu-variety"><span>'.esc_html__('Vegetarian', 'veda-restaurant').'</span></div>';
                          elseif($vtype == 'non-veg')
                              echo '<div class="dt-sc-menu-variety non-veg"><span>'.esc_html__('Non-Veg', 'veda-restaurant').'</span></div>';
                      endif; ?>
                  </figure><?php
              endif; ?>
              <div class="dt-sc-menu-details">
                  <h6><?php the_title(); ?></h6><?php
                  if(array_key_exists('price', $menu_settings)) ?>
                      <span class="dt-sc-menu-price"><?php echo esc_html( $menu_settings['price']); ?></span><?php
                  if(array_key_exists('details', $menu_settings)) ?>
                      <p><?php echo esc_html($menu_settings['details']); ?></p>
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