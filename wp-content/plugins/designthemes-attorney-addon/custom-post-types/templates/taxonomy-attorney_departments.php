<?php get_header(); 
  $page_layout = veda_option('pageoptions','attorneys-archives-page-layout');
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
  	$post_layout = veda_option('pageoptions','attorney-post-layout');
  	$columns = 2;

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

  	if( have_posts() ) :
  		$i = 1;
  		while( have_posts() ) :

  			the_post();
  			$the_id = get_the_ID();

  			$temp_class =  ( $i == 1 )  ? $columnclass.' first' : $columnclass;
  			if($i == $columns) $i = 1; else $i = $i + 1;

        $settings = get_post_meta ( $the_id, '_custom_settings', TRUE );
        $settings = is_array ( $settings ) ? $settings : array ();?>
        <div class="<?php echo esc_attr( $temp_class );?>">
          <div class="dt-sc-team">
            <div class="dt-sc-team-thumb">
              <a href="<?php the_permalink();?>" title="<?php printf(esc_attr__('%s'),the_title_attribute('echo=0'));?>"><?php
                if( has_post_thumbnail() ) {
                  the_post_thumbnail("full");
                } else {?>
                  <img src="http://placehold.it/311X367.jpg&text=DesignThemes" title="<?php printf(esc_attr__('%s'),the_title_attribute('echo=0'));?>" alt="<?php printf(esc_attr__('%s'),the_title_attribute('echo=0'));?>"/><?php
                }?>
              </a>
            </div>
            <div class="dt-sc-team-details">
              <h4><a href="<?php the_permalink();?>" title="<?php printf(esc_attr__('%s'),the_title_attribute('echo=0'));?>"><?php
                the_title();?></a></h4>
              <?php if( array_key_exists('role', $settings) ) :?>
                      <h5>
                        <a href="<?php the_permalink();?>" title="<?php printf(esc_attr__('%s'),the_title_attribute('echo=0'));?>">
                          <?php echo $settings['role'];?>
                        </a>
                      </h5>
              <?php endif;

                $social = array_key_exists("social",$settings) ? $settings['social'] : '';
                if( !empty($social) ){
                  $social = do_shortcode($social);
                  echo $social;
                }?>
            </div>
          </div>
        </div><?php
  		endwhile;
  	else:?>
  		<div class="column dt-sc-one-column">
  			<h2><?php esc_html_e("Nothing Found.", "veda-attorney");?></h2>
  			<p><?php esc_html_e("Apologies, but no results were found for the request.", "veda-attorney");?></p>
  		</div><?php
  	endif;?>

  	<!-- **Pagination** -->
  	<div class="pagination blog-pagination">
  		<?php echo veda_pagination($the_query); ?>
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