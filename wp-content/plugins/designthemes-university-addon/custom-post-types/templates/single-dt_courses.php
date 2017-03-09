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
    	<div id="post-<?php the_ID();?>" <?php post_class(array('dt-sc-course dt-sc-course-single'));?>><?php
			if( have_posts() ):
				while( have_posts() ):
					the_post();?>
					<div class="dt-sc-course with-image">
						<div class="dt-sc-course-thumb">
							<a href="<?php the_permalink();?>" title="<?php printf(esc_attr__('%s'),the_title_attribute('echo=0'));?>"><?php
								if( has_post_thumbnail() ) {
									the_post_thumbnail("full");
								} else { ?>
									<img src="http://placehold.it/311X367.jpg&text=DesignThemes" title="<?php printf(esc_attr__('%s'),the_title_attribute('echo=0'));?>" alt="<?php printf(esc_attr__('%s'),the_title_attribute('echo=0'));?>"/><?php   
								}?>
							</a>							
						</div>
					</div>

					<div class="dt-sc-course-details">
						<h5><a href="<?php the_permalink();?>" title="<?php printf(esc_attr__('%s'),the_title_attribute('echo=0'));?>"><?php
								the_title();?></a></h5>
					</div>

					<div class="dt-sc-course-single-details">
						<?php the_content(); ?>
						<div class="dt-sc-course-meta"><?php
							$i = 0;
							$custom_field_icons = veda_option("pageoptions","ucourse-custom-field-icons");
							$custom_field_icons = is_array($custom_field_icons) ? array_filter($custom_field_icons) : array();
							$custom_field_icons = array_unique( $custom_field_icons);

							if( array_key_exists('meta_title', $settings) ) {

								foreach( $settings['meta_title'] as $key => $title ) {

								$value = $settings['meta_value'][$key];

								if( filter_var($value ,FILTER_VALIDATE_URL) ) {
									$value = "<a href='".esc_url($value)."'>".esc_html($value)."</a>";
								}elseif( is_email($value) ) {
									$email = sanitize_email($value);
									$value = "<a href='mailto:".antispambot($email,1)."'>".antispambot($value)."</a>";
								}

								if( !empty($value) ) {

									$icon = $custom_field_icons[$i];
									$icon = !empty( $icon )	? '<i class="fa '.$icon.'"> </i>':'';
									echo '<p>'.$icon.'<span>'.esc_html($title).': </span>'.veda_wp_kses($value).'</p>';
								}

								$i++;
								}
							}?>
						</div>
					</div><?php
				endwhile;
			endif;?>

			<!-- **Post Nav** -->
			<div class="post-nav-container">
				<div class="post-prev-link"><?php previous_post_link('%link','<i class="fa fa-angle-double-left"> </i>'.esc_html__('Prev Entry','veda-university') );?> </div>
				<div class="post-next-link"><?php next_post_link('%link',__('Next Entry','veda-university').'<i class="fa fa-angle-double-right"> </i>');?></div>
			</div><!-- **Post Nav - End** -->
    	</div>
	</section><!-- **Primary - End** --><?php
	
	if ( $show_sidebar ):
		if ( $show_right_sidebar ): ?>
			<!-- Secondary Right -->
			<section id="secondary-right" class="secondary-sidebar <?php echo esc_attr( $sidebar_class );?>"><?php get_sidebar('right');?></section><?php
		endif;
	endif;
get_footer();?>	