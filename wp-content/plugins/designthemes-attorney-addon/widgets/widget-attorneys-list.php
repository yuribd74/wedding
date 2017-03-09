<?php
class DT_Attorneys_Widget extends WP_Widget {

	#1.constructor
	function DT_Attorneys_Widget() {
		$widget_options = array( 'classname' => 'widget_attroney widget_attorney_people', 'description'=>__('To list out Attorneys', 'veda-attorney') );
		parent::__construct(false,THEME_NAME.esc_html__(' Attorneys','veda-attorney'), $widget_options);
	}

	#2.widget input form in back-end
	function form($instance) {
		$instance = wp_parse_args( (array) $instance, array('title'=>'','post_count'=>'' , 'type' => '' ) );

		$title = strip_tags($instance['title']);
		$post_count = !empty($instance['post_count']) ? strip_tags($instance['post_count']) : "5";
		$type = !empty($instance['type']) ? strip_tags($instance['type']) : "random";?>
		<!-- Form -->
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>">
				<?php esc_html_e('Title:','veda-attorney');?>
				<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
			</label>
        </p>

	    <p>
	    	<label for="<?php echo $this->get_field_id('post_count'); ?>">
	    		<?php esc_html_e('No.of posts to show:','veda-attorney');?>
		 		<input type="text" class="widefat" id="<?php echo $this->get_field_id('post_count'); ?>" name="<?php echo $this->get_field_name('post_count'); ?>" value="<?php echo esc_attr($post_count);?>" />
		 	</label>
	   	</p>

	   	<p>
	   		<label for="<?php echo $this->get_field_id('type'); ?>"><?php esc_html_e('Show:','veda-attorney');?></label>
	   		<select class="widefat" id="<?php echo $this->get_field_id('type'); ?>" name="<?php echo $this->get_field_name('type'); ?>">
	   			<option value="random" <?php selected( $type, 'random');?>><?php esc_html_e('Random','veda-attorney');?></option>
	   			<option value="recent" <?php selected( $type, 'recent');?>><?php esc_html_e('Recent','veda-attorney');?></option>
	   		</select>
	   	</p>
		<!-- Form end--><?php
	}

	#3.processes & saves the twitter widget option
	function update( $new_instance,$old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['post_count'] = strip_tags($new_instance['post_count']);
		$instance['type'] = strip_tags($new_instance['type']);
		return $instance;
	}

	#4.output in front-end
	function widget($args, $instance) {
		extract($args);
		global $post;
		
		$title = empty($instance['title']) ? '' : strip_tags($instance['title']);
		$post_count = empty($instance['post_count']) ? '' : strip_tags($instance['post_count']);
		$type = empty($instance['type']) ? '' : strip_tags($instance['type']);

		$arg = array('posts_per_page' => $post_count ,'post_type' => 'dt_attorneys', 'orderby' => 'rand');

		if( $type == 'recent' ){
			$arg = array('posts_per_page' => $post_count ,'post_type' => 'dt_attorneys', 'orderby' => 'ID');
		}

		echo $before_widget;
			if ( !empty( $title ) )
				echo $before_title.$title.$after_title;
			echo '<div class="attorney-people-widget">';
				echo '<ul>';
				$the_query = new WP_Query($arg);
				if($the_query->have_posts()) :
					while($the_query->have_posts()):

						$the_query->the_post();
						$title = get_the_title($post->ID);
						$permalink = get_permalink($post->ID);

						$settings = get_post_meta ( $post->ID, '_custom_settings', TRUE );
						$settings = is_array ( $settings ) ? $settings : array ();

						$image =  has_post_thumbnail($post->ID) ? get_the_post_thumbnail($post->ID,'thumbnail') : '<img src="http://place-hold.it/280x280&text='.esc_html($title).'" alt="'.esc_attr($title).'" title="'.esc_attr($title).'"/>';

						echo '<li>';
						echo '	<div class="attorney-thumb">';
						echo '		<a href="'.esc_url($permalink).'">'.$image.'</a>';
						echo '	</div>';
						echo '	<div class="attorney-title">';
									echo '<h4><a href="'.esc_url($permalink).'">'.$title.'</a></h4>';
									if( array_key_exists('role', $settings) ) :
										echo '<p>'.$settings['role'].'</p>';
									endif;
						echo '	</div>';
						echo '</li>';
					endwhile;
				else:
					echo "<li>".esc_html__('No Programs found','veda-attorney')."</li>";
				endif;
				wp_reset_postdata();
				echo '</ul>';
			echo '</div>';
		echo $after_widget;
	}
}?>