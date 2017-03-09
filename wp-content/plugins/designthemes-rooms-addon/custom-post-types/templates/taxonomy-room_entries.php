<?php get_header(); 
  $page_layout = veda_option('pageoptions','room-archives-page-layout');
  $page_layout  = !empty( $page_layout ) ? $page_layout : "content-full-width";
  
  $show_sidebar = $show_left_sidebar = $show_right_sidebar = false;
  $sidebar_class = $tempcls = "";
  
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
    $post_layout = veda_option('pageoptions','room-archives-post-layout');
    $post_layout = isset( $post_layout ) ? $post_layout : 'thumb';

    switch($post_layout):
      case 'one-half-column':
        $post_class = $show_sidebar ? " dt-sc-one-half column with-sidebar" : " dt-sc-one-half column";
      break;

      case 'one-third-column':
        $post_class = $show_sidebar ? " dt-sc-one-third column with-sidebar" : " dt-sc-one-third column";
      break;

      case 'one-fourth-column':
        $post_class = $show_sidebar ? " dt-sc-one-fourth column with-sidebar" : " dt-sc-one-fourth column";
      break;

      default:
      case 'thumb':
        $post_class = $show_sidebar ? " dt-sc-one-column column with-sidebar" : " dt-sc-one-column column";
		$tempcls = "dt-sc-hotel-room-list-view";
      break;
    endswitch;

    if( have_posts() ) : ?>
      <div class="dt-sc-rooms-container"><?php
        while( have_posts() ):
          the_post();
		  $PID = get_the_ID(); ?>

		  <div class="<?php echo $post_class; ?>">
			  <div class="dt-sc-hotel-room <?php echo $tempcls; ?>"><?php

				  $room_settings = get_post_meta($PID, '_custom_settings', true);
				  $room_settings = is_array ( $room_settings ) ? $room_settings : array ();

				  if(has_post_thumbnail()): ?>
					  <div class="dt-sc-hotel-room-thumb"><?php
						  $attr = array('title' => get_the_title(), 'alt' => get_the_title());
						  the_post_thumbnail('full', $attr);

						  if(array_key_exists('price', $room_settings)): ?>
							  <div class="dt-sc-hotel-room-thumb-overlay">
								  <div><?php esc_html_e('Starts From', 'veda-room'); ?><p>
                                  	<span class="price"><?php echo $room_settings['price']; ?></span>
                                    <span class="splitter"> / </span><?php esc_html_e('Per Night', 'veda-room'); ?></p>
                                  </div>
							  </div><?php
						  endif; ?>
					  </div><?php
				  endif; ?>

				  <div class="dt-sc-hotel-room-details">
					  <div class="dt-sc-hotel-room-content">
						  <h4><?php the_title(); ?></h4><?php
						  the_excerpt(); ?>
					  </div>
					  <ul><?php
						  if(array_key_exists('no_beds', $room_settings)) ?>
							  <li> <i class="fa fa-bed"> </i> <span><?php esc_html_e('No. of Beds', 'veda-room'); ?></span> : <?php echo esc_html( $room_settings['no_beds'] ); ?></li><?php
						  if(array_key_exists('no_peoples', $room_settings)) ?>
							  <li> <i class="fa fa-user"> </i> <span><?php esc_html_e('No. of Peoples', 'veda-room'); ?></span> : <?php echo esc_html( $room_settings['no_peoples'] ); ?></li><?php
						  if(array_key_exists('room_size', $room_settings)) ?>
							  <li> <i class="fa fa-expand"> </i> <span><?php esc_html_e('Room size', 'veda-room'); ?></span> : <?php echo esc_html( $room_settings['room_size'] ); ?></li><?php
						  if(array_key_exists('ac_nonac', $room_settings)) ?>
							  <li> <i class="fa fa-spinner"> </i> <span><?php esc_html_e('AC / Non AC', 'veda-room'); ?></span> : <?php echo esc_html( $room_settings['ac_nonac'] ); ?></li><?php

						  if( array_key_exists('meta_title', $room_settings) ):
							  foreach( $room_settings['meta_title'] as $key => $title ):
								  $icon = $room_settings['meta_class'][$key];
								  $value = $room_settings['meta_value'][$key];
								  if( !empty($value) ):
									  echo '<li> <i class="'.$icon.'"> </i> <span>'.esc_html($title).'</span> : '.veda_wp_kses($value).'</li>';
								  endif;
							  endforeach;
						  endif; ?>
					  </ul>
					  <div class="dt-sc-hotel-room-buttons">
						  <a href="#booknow_wrapper" title="<?php the_title(); ?>" class="dt-sc-button medium filled btn-book"><?php esc_html_e('Book a Stay', 'veda-room'); ?></a>
						  <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php esc_html_e('View Details', 'veda-room'); ?><span class="fa fa-angle-right"> </span> </a>
					  </div>
				  </div>
			  </div>
		  </div><?php

        endwhile;?>
      </div>
      <div style="display:none;">
         <div id="booknow_wrapper" class="booknow-container">
            <div id="ajax_message"> </div>
            <form name="frmbooknow" class="booknow-frm" action="<?php echo plugins_url ('designthemes-rooms-addon'); ?>/shortcodes/booknow.php" method="post">
                <p><input type="text" name="txtfname" required="required" placeholder="<?php esc_attr_e('Name (required)', 'veda-room'); ?>" /></p>
                <p><input type="email" name="txtemail" required="required" placeholder="<?php esc_attr_e('Email (required)', 'veda-room'); ?>" /></p>
                <p><input type="text" id="txtarrivedate" name="txtdate" required="required" placeholder="<?php esc_attr_e('Date of Arrival (required)', 'veda-room'); ?>" /></p>
                <p><input type="text" name="txtphone" placeholder="<?php esc_attr_e('Phone', 'veda-room'); ?>" /></p>
                <p><textarea name="txtmessage" rows="2" cols="32" placeholder="<?php esc_attr_e('Message', 'veda-room'); ?>"></textarea></p>
                <p><input type="submit" name="subsend" value="<?php esc_attr_e('Send', 'veda-room'); ?>" /></p>
                <input type="hidden" name="hidbookadminemail" value="<?php get_bloginfo('admin_email'); ?>" />
                <input type="hidden" name="hidbooksuccess" value="<?php esc_attr_e('Thanks for Booking us, We will call back to you soon.', 'veda-room'); ?>" />
                <input type="hidden" name="hidbookerror" value="<?php esc_attr_e('Sorry your message not sent, Try again Later.', 'veda-room'); ?>" />
                <input type="hidden" id="hidroomname" name="hidroomname" />
            </form>
         </div>
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