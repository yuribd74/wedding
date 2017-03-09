<?php
class DT_Rooms_Widget extends WP_Widget {
	#1.constructor
	function DT_Rooms_Widget() {
		$widget_options = array("classname"=>'widget_popular_entries', 'description'=>esc_html__('To list out rooms', 'veda-room'));
		parent::__construct(false,THEME_NAME.esc_html__(' Room','veda-room'),$widget_options);
	}

	#2.widget input form in back-end
	function form($instance) {
		$instance = wp_parse_args( (array) $instance,array('title'=>'','_post_count'=>'') );
		$title = strip_tags($instance['title']);
		$_post_count = !empty($instance['_post_count']) ? strip_tags($instance['_post_count']) : "-1";?>

        <!-- Form -->
        <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_html_e('Title:','veda-room');?>
		   <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>"
            type="text" value="<?php echo esc_attr($title); ?>" /></label></p>

	    <p><label for="<?php echo $this->get_field_id('_post_count'); ?>"><?php esc_html_e('No.of posts to show:','veda-room');?></label>
		   <input id="<?php echo $this->get_field_id('_post_count'); ?>" name="<?php echo $this->get_field_name('_post_count'); ?>" value="<?php echo esc_attr($_post_count);?>" /></p>
        <!-- Form end-->
<?php
	}
	#3.processes & saves the twitter widget option
	function update( $new_instance,$old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['_post_count'] = strip_tags($new_instance['_post_count']);
		return $instance;
	}
	
	#4.output in front-end
	function widget($args, $instance) {
		extract($args);
		global $post;
		$title = empty($instance['title']) ?'' : apply_filters('widget_title', $instance['title']);
		$_post_count = (int) $instance['_post_count'];
		$arg = array('posts_per_page' => $_post_count ,'post_type' => 'dt_rooms');

		echo $before_widget;
		if ( !empty( $title ) ) echo $before_title.$title.$after_title;		
		echo "<div class='recent-room-widget'><ul>";
			 $the_query = new WP_Query($arg);
			 if($the_query->have_posts()) :
				 while($the_query->have_posts()):
					$the_query->the_post();

					echo "<li>";
						$image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'thumbnail',false);
						$image = ( $image != false)? $image[0] : THEME_URI . '/images/dummy-images/post-thumb.jpg';
						echo "<a href='".get_permalink()."' class='thumb'>";
							echo "<img src='{$image}' alt='{$title}'/>";
						echo "</a>";

						echo "<h3><a href='".get_permalink()."'>".get_the_title()."</a></h3>";
						$pmeta = get_post_meta($post->ID, '_room_settings', TRUE);
						if(array_key_exists("role", $pmeta))
							echo '<span>'.$pmeta['role'].'</span>';
					echo "</li>";

				 endwhile;
			 else:
			 	echo "<li>".esc_html__('No Rooms found','veda-room')."</li>";
			 endif;
			 wp_reset_postdata();
	 	echo "</ul></div>";			 
		echo $after_widget;
	}
}?>