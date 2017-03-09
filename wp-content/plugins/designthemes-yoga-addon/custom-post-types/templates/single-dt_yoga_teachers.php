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
		if ( $show_left_sidebar ):?>
			<!-- Secondary Left -->
			<section id="secondary-left" class="secondary-sidebar <?php echo esc_attr( $sidebar_class );?>"><?php get_sidebar('left');?></section><?php
		endif;
	endif;?>

	<section id="primary" class="<?php echo esc_attr( $page_layout );?>">
    	<div id="post-<?php the_ID();?>" <?php post_class(array('dt-sc-yoga-teacher-single'));?>><?php
			if( have_posts() ):
				while( have_posts() ):
					the_post();?>
					<div class="dt-sc-yoga-teacher-wrapper">
						<div class="dt-sc-yoga-teacher-thumb">
							<a href="<?php the_permalink();?>" title="<?php printf(esc_attr__('%s'),the_title_attribute('echo=0'));?>"><?php
								if( has_post_thumbnail() ) {
									the_post_thumbnail("full");
								} else { ?>
									<img src="http://placehold.it/311X367.jpg&text=DesignThemes" title="<?php printf(esc_attr__('%s'),the_title_attribute('echo=0'));?>" alt="<?php printf(esc_attr__('%s'),the_title_attribute('echo=0'));?>"/><?php   
								}
							?></a>
						</div>
						<div class="dt-sc-yoga-teacher-details">
							<h5><a href="<?php the_permalink();?>" title="<?php printf(esc_attr__('%s'),the_title_attribute('echo=0'));?>"><?php
								the_title();?></a></h5>
							<?php if( array_key_exists('phone', $settings) )	: ?>
									<h5><?php echo $settings['phone'];?></h5>
							<?php endif;
							$social = array_key_exists("social",$settings) ? $settings['social'] : '';
							if( !empty($social) ) {
								$social = do_shortcode($social);
								$social = str_replace('dt-sc-team-social', 'dt-sc-sociable', $social);
								echo $social;
							}?>								
						</div>
					</div>
					<div class="dt-sc-yoga-teacher-single-details">
						<?php the_content(); ?>
						<ul class="dt-sc-yoga-teacher-single-meta"><?php
							foreach( $settings['meta_title'] as $key => $title ) {

								$value = $settings['meta_value'][$key];

								if( filter_var($value ,FILTER_VALIDATE_URL) ){
									$value = "<a href='".esc_url($value)."'>".esc_html($value)."</a>";
								} elseif( is_email($value) ){
									$email = sanitize_email($value);
									$value = "<a href='mailto:".antispambot($email,1)."'>".antispambot($value)."</a>";
								}

								if( !empty($value) ) {
									echo '<li> <span>'.esc_html($title).'</span><p>'.$value.'</p> </li>';
								}
							}?>
						</ul>
					</div><?php
				endwhile;
			endif;?>
    	</div>
	</section><!-- **Primary - End** --><?php
	
	if ( $show_sidebar ):
		if ( $show_right_sidebar ): ?>
			<!-- Secondary Right -->
			<section id="secondary-right" class="secondary-sidebar <?php echo esc_attr( $sidebar_class );?>"><?php get_sidebar('right');?></section><?php
		endif;
	endif;
get_footer();?>	