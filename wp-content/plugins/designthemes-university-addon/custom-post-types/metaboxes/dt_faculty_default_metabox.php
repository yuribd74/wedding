<?php global $post;
	$post_settings = get_post_meta ( $post->ID, '_custom_settings', TRUE );
	$post_settings = is_array ( $post_settings ) ? $post_settings : array ();

    echo '<input type="hidden" name="dt_theme_faculty_meta_nonce" value="'.wp_create_nonce('dt_theme_faculty_nonce').'" />'; ?>
<!-- Layout -->
<div id="page-layout" class="custom-box">
    <div class="column one-sixth"><label><?php esc_html_e('Layout','veda-university');?> </label></div>
    <div class="column five-sixth last">
        <ul class="bpanel-layout-set"><?php
			$layouts = array(
				'content-full-width'=>'without-sidebar',
				'with-left-sidebar'=>'left-sidebar',
				'with-right-sidebar'=>'right-sidebar',
				'with-both-sidebar'=>'both-sidebar');

			$v =  array_key_exists("layout",$post_settings) ?  $post_settings['layout'] : 'content-full-width';

			foreach($layouts as $key => $value) :
				$class = ($key == $v) ? " class='selected' " : "";
				echo "<li><a href='#' rel='{$key}' {$class}><img src='" . plugin_dir_url ( __FILE__ ) . "images/columns/{$value}.png' /></a></li>";
			endforeach;?>
        </ul>
        <input id="page-layout" name="layout" type="hidden"  value="<?php echo esc_attr($v);?>"/>
        <p class="note"> <?php esc_html_e("You can choose between a left, right or no sidebar layout.",'veda-university');?> </p>
    </div>
</div><!-- Layout End-->
<?php $sb_layout = array_key_exists("layout",$post_settings) ? $post_settings['layout'] : 'content-full-width';
$sidebar_both = $sidebar_left = $sidebar_right = '';
if($sb_layout == 'content-full-width' ) {
	$sidebar_both = 'style="display:none;"'; 
} elseif($sb_layout == 'with-left-sidebar') {
	$sidebar_right = 'style="display:none;"';
} elseif($sb_layout == 'with-right-sidebar') {
	$sidebar_left = 'style="display:none;"'; 
}?>
<div id="widget-area-options" <?php echo $sidebar_both;?>>
	<div id="left-sidebar-container" class="page-left-sidebar" <?php echo $sidebar_left; ?>>
		<!-- 2. Standard Sidebar Left Start -->
		<div id="page-commom-sidebar" class="sidebar-section custom-box">
			<div class="column one-sixth"><label><?php esc_html_e('Show Standard Left Sidebar','veda-university');?></label></div>
			<div class="column five-sixth last"><?php 
				$switchclass = array_key_exists("show-standard-sidebar-left",$post_settings) ? 'checkbox-switch-on' :'checkbox-switch-off';
				$checked = array_key_exists("show-standard-sidebar-left",$post_settings) ? ' checked="checked"' : '';?>
				
				<div data-for="dttheme-show-standard-sidebar-left" class="checkbox-switch <?php echo esc_attr($switchclass);?>"></div>
				<input id="dttheme-show-standard-sidebar-left" class="hidden" type="checkbox" name="show-standard-sidebar-left" value="true" <?php echo $checked;?>/>
				<p class="note"> <?php esc_html_e('Yes! to show standard left sidebar on this page.','veda-university');?> </p>
			 </div>
		</div><!-- Standard Sidebar Left End-->

		<!-- 3. Choose Widget Areas Start -->
		<div id="page-sidebars" class="sidebar-section custom-box page-widgetareas">
			<div class="column one-sixth"><label><?php esc_html_e('Choose Widget Area - Left Sidebar','veda-university');?></label></div>
			<div class="column five-sixth last"><?php
				$widgetareas = array_key_exists("widget-area-left",$post_settings) ? array_unique($post_settings["widget-area-left"]) : array();
				$widgets = veda_option('widgetarea','custom');?>
				<select class="dt-chosen-select" name="dttheme[widgetareas-left][]" multiple="multiple" data-placeholder="<?php esc_attr_e('Select Widget Area', 'veda-university');?>"><?php
					echo "<option value=''></option>";
					foreach ( $widgets as $widget ) :
						$id = mb_convert_case($widget, MB_CASE_LOWER, "UTF-8");
						$id = str_replace(" ", "-", $id);
						$selected = in_array( $id , $widgetareas ) ? " selected='selected' " : "";
						echo "<option value='{$id}' {$selected}>{$widget}</option>";
					endforeach;?>
				</select>
			</div>
		</div><!-- Choose Widget Areas End -->
	</div>
	<div id="right-sidebar-container" class="page-right-sidebar" <?php echo $sidebar_right; ?>>
		<!-- 3. Standard Sidebar Right Start -->
		<div id="page-commom-sidebar" class="sidebar-section custom-box page-right-sidebar">
			<div class="column one-sixth"><label><?php esc_html_e('Show Standard Right Sidebar','veda-university');?></label></div>
			<div class="column five-sixth last"><?php 
				$switchclass = array_key_exists("show-standard-sidebar-right",$post_settings) ? 'checkbox-switch-on' :'checkbox-switch-off';
				$checked = array_key_exists("show-standard-sidebar-right",$post_settings) ? ' checked="checked"' : '';?>
				
				<div data-for="dttheme-show-standard-sidebar-right" class="checkbox-switch <?php echo esc_attr($switchclass);?>"></div>
				<input id="dttheme-show-standard-sidebar-right" class="hidden" type="checkbox" name="show-standard-sidebar-right" value="true" <?php echo $checked;?>/>
				<p class="note"> <?php esc_html_e('Yes! to show standard right sidebar on this page.','veda-university');?> </p>
			 </div>
		</div><!-- Standard Sidebar Right End-->

		<!-- 3. Choose Widget Areas Start -->
		<div id="page-sidebars" class="sidebar-section custom-box page-widgetareas">
			<div class="column one-sixth"><label><?php esc_html_e('Choose Widget Area - Right Sidebar','veda-university');?></label></div>
			<div class="column five-sixth last"><?php
				$widgetareas = array_key_exists("widget-area-right",$post_settings) ? array_unique($post_settings["widget-area-right"]) : array();
				$widgets = veda_option('widgetarea','custom');?>
				<select class="dt-chosen-select" name="dttheme[widgetareas-right][]" multiple="multiple" data-placeholder="<?php esc_attr_e('Select Widget Area', 'veda-university');?>"><?php
					echo "<option value=''></option>";
					foreach ( $widgets as $widget ) :
						$id = mb_convert_case($widget, MB_CASE_LOWER, "UTF-8");
						$id = str_replace(" ", "-", $id);
						$selected = in_array( $id , $widgetareas ) ? " selected='selected' " : "";
						echo "<option value='{$id}' {$selected}>{$widget}</option>";
					endforeach;?>
				</select>
			</div>
		</div><!-- Choose Widget Areas End -->
	</div>
</div>

<div class="custom-box">
	<div class="column one-sixth">
		<label><?php esc_html_e('Social Profile','veda-university');?> </label>
	</div>
	<div class="column five-sixth last">
	    <?php $v = array_key_exists("social",$post_settings) ?  $post_settings['social'] : '';?>
        <input id="social" name="social" class="large" type="text" value="<?php echo $v;?>" style="width:100%;" />
    	<p class="note"> <?php esc_html_e("You can given social shortcode. eg: [dt_sc_social facebook='#' twitter='#'/]",'veda-university');?> </p>
    </div>
</div>

<div class="custom-box meta-fields">
	<div class="column one-sixth">
		<label><?php esc_html_e('Phone No','veda-university');?> </label>
	</div>
	<div class="column five-sixth last">
	    <?php $v = array_key_exists("phone",$post_settings) ?  $post_settings['phone'] : '';?>
        <input id="phone" name="phone" class="large" type="text" value="<?php echo $v;?>"/>
    </div>
</div>

<div class="custom-box meta-fields">
	<div class="column one-sixth">
		<label><?php esc_html_e('Role','veda-university');?> </label>
	</div>
	<div class="column five-sixth last">
	    <?php $v = array_key_exists("role",$post_settings) ?  $post_settings['role'] : '';?>
        <input id="role" name="role" class="large" type="text" value="<?php echo $v;?>"/>
    </div>
</div>
<!-- Additional Fields -->
<?php	// checking meta files from back-end
	$fields = veda_opts_get( 'ufaculty-custom-fields', array() );
	$fields = array_unique(array_filter($fields));
	
	if(!empty($fields)) : ?>
		<div class="custom-box">
        	<div class="column one-sixth">
            	<label><?php esc_html_e('Additional Fields','veda-university');?></label>
            </div>
            <div class="column five-sixth last">
            	<div class="meta-fields">
            		<div class="column one-fourth">
						<strong><?php esc_html_e('In Detail?','veda-university');?></strong>&nbsp;&nbsp;&nbsp;
                    	<strong><?php esc_html_e('Title','veda-university');?></strong>
                    </div>
                    <div class="column three-fourth last">
	                	<strong><?php esc_html_e('Value','veda-university');?></strong>
                    </div>
					<div class="hr_invisible"></div><?php
                	// getting filed values
					foreach($fields as $field):
						$metaslug = strtolower(str_replace(' ', '-', $field));
						$checked = array_key_exists('meta_show', $post_settings) and array_key_exists($metaslug, $post_settings['meta_show']) ? " checked='checked'" : "";?>
                        <div class="column one-fourth"><?php
							if(array_key_exists('meta_show', $post_settings)):
								$t = array_key_exists($metaslug, $post_settings['meta_show']) ? 
									(!empty($post_settings['meta_show'][$metaslug]) ? $post_settings['meta_show'][$metaslug] : $field) : $field;
							else:
								$t = $field;
							endif;
							
							$checked = "";
                            if( array_key_exists('meta_show', $post_settings ) ){
                                if( array_key_exists($metaslug, $post_settings['meta_show']) ) {
                                    $checked = "checked='checked'";
                                }
                            }?>
                            <input type="checkbox" name="dttheme-meta-show[<?php echo $metaslug;?>]" class="medium" style="width:auto;" 
	                            value="<?php echo esc_attr($t);?>" <?php echo $checked;?>><?php
							if( array_key_exists('meta_title', $post_settings ) ):
								$t = array_key_exists($metaslug, $post_settings['meta_title']) ? 
									(!empty($post_settings['meta_title'][$metaslug]) ? $post_settings['meta_title'][$metaslug] : $field) : $field;
							else:
								$t = $field;
							endif;?>
                            <input type="text" name="dttheme-meta-title[<?php echo $metaslug;?>]" class="medium" style="width:86%;box-shadow:none;background-color:whitesmoke;" value="<?php echo esc_attr($t);?>">
                        </div>
                        <div class="column three-fifth last"><?php
							$v = '';
							if(isset($post_settings['meta_value'])):
								$v = array_key_exists($metaslug, $post_settings['meta_value']) ?  $post_settings['meta_value'][$metaslug] : '';
							endif;?>
                            <input name="dttheme-meta-value[<?php echo $metaslug; ?>]" class="large" type="text" value="<?php echo esc_attr($v);?>" style="width:100%;" />
                        </div>
                        <div class="hr_invisible"></div><?php
					endforeach;?>
                   </div>
                <p class="note"> <?php esc_html_e("Here you can change Additional field title & values for this item. First two fields will be shown in hover",'veda-university');?> </p>
            </div>        
		</div><?php 
	endif;?><!-- Additional Fields End -->