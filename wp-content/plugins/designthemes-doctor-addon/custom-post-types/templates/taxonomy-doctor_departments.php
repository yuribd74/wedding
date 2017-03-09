<?php get_header(); 
  $page_layout = veda_option('pageoptions','doctors-archives-page-layout');
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
  	$post_layout = veda_option('pageoptions','doctor-post-layout');
  	$style = 'style-1';
  	$columns = 2;

  	switch ( $post_layout ) {
  		case '1':
  		default:
  			$style = 'style-1';
  			$columns = 2;
  			$columnclass = 'column dt-sc-one-half';
  		break;

  		case '2':
  			$style = 'style-1';
  			$columns = 3;
  			$columnclass = 'column dt-sc-one-third';
  		break;

  		case '3':
  			$style = 'style-2';
  			$columns = 2;
  			$columnclass = 'column dt-sc-one-half';
  		break;

  		case '4':
  			$style = 'style-2';
  			$columns = 3;
  			$columnclass = 'column dt-sc-one-third';
  		break;

  		case '5':
  			$style = 'style-2';
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
			$settings = is_array ( $settings ) ? $settings : array ();

			$social = array_key_exists("social",$settings) ? $settings['social'] : '';
			if( !empty($social) ){
				$social = str_replace('[dt_sc_social', '[dt_sc_social class="rounded-square" ', $social);
				$social = do_shortcode($social);
			}?>
  			<div class="<?php echo esc_attr($temp_class);?>"><?php
  				if( $style == 'style-1') :
  					$title = array_key_exists("prefix",$settings) ? $settings['prefix'].$title : $title;
  					$postfix = array_key_exists("postfix",$settings) ? $settings['postfix'] : '';?>
  					<div id="<?php echo esc_attr( $the_id );?>" class="dt-sc-doctors">
  						<div class="dt-sc-doctors-thumb">
  							<a href="<?php the_permalink();?>"><?php
  								if( has_post_thumbnail($the_id) ) {
  									the_post_thumbnail('full');
  								} else {
  									echo '<img src="http://placehold.it/300X367.jpg&text=DesignThemes"/>';
  								}?>
  							</a>
  							<a href="<?php the_permalink();?>" class="dt-sc-doctors-thumb-overlay">
  								<?php esc_html_e('View Doctor Details','veda-doctor');?>
  							</a>
  						</div>
  						<div class="dt-sc-doctors-details">
  							<h5><a href="<?php the_permalink();?>"><?php
  								if( array_key_exists("prefix",$settings) ) {
  									echo $settings['prefix'];
  								}
  								
  								the_title();?></a></h5>
  							<h6><?php the_terms( $the_id, 'doctor_departments', '',' ',''); echo esc_html($postfix);?></h6>
  							<?php if( array_key_exists("summary",$settings) )
  									echo $settings['summary'];?>
  							<ul class="dt-sc-doctors-meta"><?php
  								if( array_key_exists("telno",$settings) ) {
  									echo '<li><span>'.esc_html__('Phone:','veda-doctor').'</span>'.$settings['telno'].'</li>';
  								}
  								if( array_key_exists("email",$settings) ) {
  									echo '<li><span>'.esc_html__('E-mail:','veda-doctor').'</span><a href="mailto:'.$settings['email'].'">'.$settings['email'].'</a></li>';
  								}?>
  							</ul>
  							<?php echo $social;?>
  						</div>
  					</div><?php
  				else:?>
  					<div id="<?php echo esc_attr( $the_id );?>">
  						<div class="dt-sc-team hide-social-show-on-hover">
  							<div class="dt-sc-team-thumb"><?php
  								if( has_post_thumbnail($the_id) ) {
  									the_post_thumbnail('full');
  								} else {
  									echo '<img src="http://placehold.it/300X367.jpg&text=DesignThemes"/>';
  								}?>
  							</div>
  							<div class="dt-sc-team-details">
  								<h4><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h4>
  								<?php the_terms( $the_id, 'doctor_departments', "<h5>",' ','</h5>');?>
  								<?php echo $social;?>
  							</div>
  						</div>
  					</div><?php
  				endif;?>
  			</div><?php
  		endwhile;
  	else:?>
  		<div class="column dt-sc-one-column">
  			<h2><?php esc_html_e("Nothing Found.", "veda-doctor");?></h2>
  			<p><?php esc_html_e("Apologies, but no results were found for the request.", "veda-doctor");?></p>
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