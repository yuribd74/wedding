<?php get_header();
	$portfolio_settings = get_post_meta ( $post->ID, '_portfolio_settings', TRUE );
	$portfolio_settings = is_array ( $portfolio_settings ) ? $portfolio_settings : array ();

	$page_layout  = array_key_exists( "layout", $portfolio_settings ) ? $portfolio_settings['layout'] : "content-full-width";
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
   <section id="primary" class="<?php echo esc_attr( $page_layout );?>"><?php
		if( have_posts() ):
			while( have_posts() ):
				the_post();?>
				<article id="post-<?php the_ID();?>" <?php post_class(array('dt-portfolio-single'));?>><?php
					$portfolio_layout = array_key_exists("portfolio-layout", $portfolio_settings) ? $portfolio_settings['portfolio-layout'] : "full-width-portfolio";
					$container_start =  $container_middle =  $container_end = "";
					
					switch ($portfolio_layout) {
						
						case 'full-width-portfolio':
							$container_start = $container_middle = $container_end = "";
						break;
						
						case 'with-left-portfolio':
							$container_start	 =	'<div class="column dt-sc-two-third first">';
							$container_middle	 =	'</div>';
							$container_middle  .=	'<div class="column dt-sc-one-third last">'; 
							$container_end	 =	'</div>';
						break;
						
						case 'with-right-portfolio':
							$container_start	 =	'<div class="column dt-sc-two-third right-gallery first">';
							$container_middle	 =	'</div>';
							$container_middle  .=	'<div class="column dt-sc-one-third last">'; 
							$container_end	 =	'</div>';
						break;
					}?>
                    
                    <?php echo !empty( $container_start ) ? $container_start : ''; ?>
                    
                    	<div class="dt-portfolio-single-slider-wrapper">
                        	<!-- Slider -->
                            <ul class="dt-portfolio-single-slider">
                            	<?php if( has_post_thumbnail() ){ ?>
                                		<li><?php the_post_thumbnail("full");?></li>
                                <?php }  ?>
                                <?php if( array_key_exists("items_name",$portfolio_settings) ) {
									
										foreach( $portfolio_settings["items_name"] as $key => $item ){
											
											$current_item = $portfolio_settings["items"][$key];
											if( "video" === $item ) {
												echo "<li>".wp_oembed_get( $current_item )."</li>";
											} else {
												echo "<li> <img src='".esc_url($current_item)."' alt='' title='' /></li>";
											}
										}
                                	  } ?>
                            </ul><!-- Slider Ends -->
                            
                            <?php if( array_key_exists("items_name",$portfolio_settings) ) { ?>
                            		<!-- Pager -->
                            		<div id="bx-pager">
                                    	<?php if( has_post_thumbnail() ){ ?>
                                        		<a data-slide-index="0" href=""><?php the_post_thumbnail("full");?></a>
                                        <?php } ?>
                                        <?php if( array_key_exists("items_name",$portfolio_settings) ) {
												foreach( $portfolio_settings["items_name"] as $key => $item ) {
													 
													$current_item = $portfolio_settings["items"][$key];
													$i = $key+1;
													
													echo "<a data-slide-index='".esc_attr($i)."' href=''>";													
													if( "video" === $item ) {
														echo "<img src='". plugin_dir_url ( __FILE__ )."images/video-thumbnail.jpg'/>";
													} else {
														echo "<img src='".esc_url($current_item)."'/>";
													}
													echo "</a>";											
												}
                                        	  } ?>
                           			</div><!-- Pager Ends -->
                            <?php } ?>
                        </div>
                     
                    <?php echo !empty( $container_middle ) ? $container_middle : '';?>
                        
                        <div class="dt-portfolio-single-details">
                        	<div class="column dt-sc-three-fourth first">
                            	<?php the_title('<h3>','</h3>'); ?>                                
                            	<?php the_content(); ?>
                                <?php echo get_the_term_list($post->ID, 'portfolio_entries', '<p class="portfolio-categories"> <i class="pe-icon pe-network"> </i> ', ', ', '</p> '); ?>
                            </div>
                            <div class="column dt-sc-one-fourth">
                            <?php if( array_key_exists('meta_title', $portfolio_settings) ): ?>
                            		<h3><?php esc_html_e('Project Details','veda-core');?></h3>
                                	<ul class="project-details">
                                		<?php foreach( $portfolio_settings['meta_title'] as $key => $title ):
                                				$value = $portfolio_settings['meta_value'][$key];
                                				if( filter_var($value ,FILTER_VALIDATE_URL) ){
                                					$value = "<a href='".esc_url($value)."'>".esc_html($value)."</a>";
                                				} elseif( is_email($value) ){
                                						$email = sanitize_email($value);
                                					$value = "<a href='mailto:".antispambot($email,1)."'>".antispambot($value)."</a>";
                                				}?>
                                    		<li> <span><?php echo esc_html($title);?> : </span> <?php echo $value;?> </li>
                                    	<?php endforeach;?>
                                    </ul>
                            <?php endif;?>
                            </div>
                        </div>
                    
                    <?php echo !empty( $container_end ) ? $container_end : '';?>
				</article><?php				
			endwhile;
		endif;?>
        
        <!-- **Post Nav** -->
        <div class="post-nav-container">
        	<div class="post-prev-link"><?php previous_post_link('%link','<i class="fa fa-angle-double-left"> </i>'.esc_html__('Prev Entry','veda-core') );?> </div>
            <div class="post-next-link"><?php next_post_link('%link',esc_html__('Next Entry','veda-core').'<i class="fa fa-angle-double-right"> </i>');?></div>
        </div><!-- **Post Nav - End** --> 
        
        <?php # Related Portfolio
			  $related_post = veda_option('pageoptions','single-portfolio-related');
			  $terms = wp_get_object_terms( get_the_ID() ,'portfolio_entries' ,array('fields' => 'ids') );	
			 if( isset($related_post) && $terms ) :?>
        		<div class="dt-sc-hr-invisible"></div>
                <div class="dt-sc-clear"></div>
                
                <div class="related-portfolios">
                    <h3 class=""><span><?php esc_html_e('Related Projects','veda-core');?></span></h3><?php
					
					$post_class = "portfolio column dt-sc-one-third";
					$post_style = veda_option('pageoptions','single-portfolio-related-style');
					
					if( $show_sidebar ){
						$post_class = "portfolio column dt-sc-one-third with-sidebar";
					}
					
					$sc = "[dt_sc_portfolio_related_post post_class='".$post_class."' post_style='".$post_style."' id='".get_the_ID()."'/]";
					echo do_shortcode($sc);	?>                    
                </div>
        <?php endif;?>
        
        <?php #Portfolio Comments
			$post_comment = veda_option('pageoptions','single-portfolio-comments');
			if( isset($post_comment) ):?>
            	<div class="dt-sc-hr"></div>
                <div class="dt-sc-clear"></div>
                
                <!-- ** Comment Entries ** -->
                <section class="commententries">
                	<?php  comments_template('', true); ?>
                </section><?php 
			endif;?>
   </section><!-- **Primary - End** --><?php
	
	if ( $show_sidebar ):
		if ( $show_right_sidebar ): ?>
			<!-- Secondary Right -->
			<section id="secondary-right" class="secondary-sidebar <?php echo esc_attr( $sidebar_class );?>"><?php get_sidebar('right');?></section><?php
		endif;
	endif;
get_footer();?>