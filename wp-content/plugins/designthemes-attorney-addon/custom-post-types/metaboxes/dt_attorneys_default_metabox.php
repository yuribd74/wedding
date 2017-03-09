<?php
global $post;
$post_settings = get_post_meta ( $post->ID, '_custom_settings', TRUE );
$post_settings = is_array ( $post_settings ) ? $post_settings : array ();
echo '<input type="hidden" name="dt_theme_attorney_meta_nonce" value="'.wp_create_nonce('dt_theme_attorney_nonce').'" />';?>

<!-- 0. Sub Title -->
<div class="sub-title custom-box">
    <div class="column one-sixth"><?php esc_html_e( 'Title Background','veda-attorney');?></div>
    <div class="column five-sixth last">
        <div class="two-third column image-preview-container" style="width:60%;">
            <?php $subtitlebg = array_key_exists ( 'sub-title-bg', $post_settings ) ? $post_settings ['sub-title-bg'] : '';?>
            <input name="sub-title-bg" type="text" class="uploadfield medium" readonly="readonly" value="<?php echo esc_attr($subtitlebg);?>"/>
            <input type="button" value="<?php esc_attr_e('Upload','veda-attorney');?>" class="upload_image_button show_preview" />
            <input type="button" value="<?php esc_attr_e('Remove','veda-attorney');?>" class="upload_image_reset" />
            <?php if( !empty($subtitlebg) ) veda_adminpanel_image_preview($subtitlebg );?>
            <p class="note"><?php esc_html_e('Upload an image for the sub title background','veda-attorney');?></p>
        </div>
        <div class="one-eighth column"></div>
        <div class="one-third column last">
            <label><?php esc_html_e('Opacity','veda-attorney');?></label>
            <?php $opacity =  array_key_exists ( "sub-title-opacity", $post_settings ) ? $post_settings ['sub-title-opacity'] : ''; ?>
            <select name="sub-title-opacity">
                <option value=""><?php esc_html_e("Select",'veda-attorney');?></option>
                <?php foreach( array('1','0.1','0.2','0.3','0.4','0.5','0.6','0.7','0.8','0.9') as $option): ?>
                       <option value="<?php echo esc_attr($option);?>" <?php selected($option,$opacity);?>><?php echo esc_attr($option);?></option>
                <?php endforeach;?>
            </select>
            <p class="note"><?php esc_html_e('Select background color opacity','veda-attorney');?></p>
        </div>    
    </div>
</div>

<div class="sub-title custom-box">
    <div class="column one-sixth"></div>
    <div class="column five-sixth last">
        <div class="column one-third">
            <label><?php esc_html_e('Background Repeat','veda-attorney');?></label>
            <?php $bgrepeat =  array_key_exists ( "sub-title-bg-repeat", $post_settings ) ? $post_settings ['sub-title-bg-repeat'] : ''; ?>
            <div class="clear"></div>
            <select class="dt-chosen-select" name="sub-title-bg-repeat">
                <option value=""><?php esc_html_e("Select",'veda-attorney');?></option>
                <?php foreach( array('repeat','repeat-x','repeat-y','no-repeat') as $option): ?>
                       <option value="<?php echo esc_attr($option);?>" <?php selected($option,$bgrepeat);?>><?php echo esc_attr($option);?></option>
                <?php endforeach;?>
            </select>
            <p class="note"><?php esc_html_e('Select how would you like to repeat the background image','veda-attorney');?></p>
        </div>

        <div class="column one-third">
            <label><?php esc_html_e('Background Position','veda-attorney');?></label>
            <?php $bgposition =  array_key_exists ( "sub-title-bg-position", $post_settings ) ? $post_settings ['sub-title-bg-position'] : ''; ?>
            <div class="clear"></div>
            <select class="dt-chosen-select" name="sub-title-bg-position">
                <option value=""><?php esc_html_e('Select','veda-attorney');?></option>
                <?php foreach( array('top left','top center','top right','center left','center center','center right','bottom left','bottom center','bottom right') as $option): ?>
                    <option value="<?php echo esc_attr($option);?>" <?php selected($option,$bgposition);?>> <?php echo esc_attr($option);?></option>
                <?php endforeach;?>
            </select>
            <p class="note"><?php esc_html_e('Select how would you like to position the background','veda-attorney');?></p>
        </div>

        <div class="column one-third last">
        <?php $label = 		esc_html__('Background Color','veda-attorney');
              $name  =		'sub-title-bg-color';
              $value =  	array_key_exists ( 'sub-title-bg-color', $post_settings ) ? $post_settings ['sub-title-bg-color'] : '';
              $tooltip = 	esc_html__('Select background color for sub title section e.g. #f2d607','veda-attorney'); ?>
              <label><?php echo esc_html($label);?></label>
              <div class="clear"></div>
              <?php veda_admin_color_picker("",$name,$value,'');?>
              <p class="note"><?php echo $tooltip;?></p>
        </div>
    </div>
</div><!-- 0. Sub title End-->

<!-- Layout -->
<div id="page-layout" class="custom-box">
    <div class="column one-sixth"><label><?php esc_html_e('Layout','veda-attorney');?> </label></div>
    <div class="column five-sixth last">
        <ul class="bpanel-layout-set"><?php
			$post_layout = array( 'content-full-width'=>'without-sidebar',
				'with-left-sidebar'=>'left-sidebar',
				'with-right-sidebar'=>'right-sidebar',
				'with-both-sidebar'=>'both-sidebar');
			$v =  array_key_exists("layout",$post_settings) ?  $post_settings['layout'] : 'content-full-width';
			foreach($post_layout as $key => $value):
				$class = ($key == $v) ? " class='selected' " : "";
				echo "<li><a href='#' rel='{$key}' {$class}><img src='" . plugin_dir_url ( __FILE__ ) . "images/columns/{$value}.png' /></a></li>";
			endforeach;?>
        </ul>
        <input id="dttheme-page-layout" name="layout" type="hidden"  value="<?php echo esc_attr($v);?>"/>
        <p class="note"> <?php esc_html_e("You can choose between a left, right or no sidebar layout.",'veda-attorney');?> </p>
    </div>
</div><!-- Layout End-->
<?php 
 $sb_layout = array_key_exists("layout",$post_settings) ? $post_settings['layout'] : 'content-full-width';
 $sidebar_both = $sidebar_left = $sidebar_right = '';
 if($sb_layout == 'content-full-width' || $sb_layout == 'fullwidth-container' ) {
	$sidebar_both = 'style="display:none;"'; 
 } elseif($sb_layout == 'with-left-sidebar') {
	$sidebar_right = 'style="display:none;"'; 
 } elseif($sb_layout == 'with-right-sidebar') {
	$sidebar_left = 'style="display:none;"'; 
 } 
?>
<div id="widget-area-options" <?php echo $sidebar_both;?>>
	<div id="left-sidebar-container" class="page-left-sidebar" <?php echo $sidebar_left; ?>>
		<!-- 2. Standard Sidebar Left Start -->
		<div id="page-commom-sidebar" class="sidebar-section custom-box">
			<div class="column one-sixth"><label><?php esc_html_e('Show Standard Left Sidebar','veda-attorney');?></label></div>
			<div class="column five-sixth last"><?php 
				$switchclass = array_key_exists("show-standard-sidebar-left",$post_settings) ? 'checkbox-switch-on' :'checkbox-switch-off';
				$checked = array_key_exists("show-standard-sidebar-left",$post_settings) ? ' checked="checked"' : '';?>
				
				<div data-for="dttheme-show-standard-sidebar-left" class="checkbox-switch <?php echo esc_attr($switchclass);?>"></div>
				<input id="dttheme-show-standard-sidebar-left" class="hidden" type="checkbox" name="show-standard-sidebar-left" value="true" <?php echo $checked;?>/>
				<p class="note"> <?php esc_html_e('Yes! to show standard left sidebar on this page.','veda-attorney');?> </p>
			 </div>
		</div><!-- Standard Sidebar Left End-->

		<!-- 3. Choose Widget Areas Start -->
		<div id="page-sidebars" class="sidebar-section custom-box page-widgetareas">
			<div class="column one-sixth"><label><?php esc_html_e('Choose Widget Area - Left Sidebar','veda-attorney');?></label></div>
			<div class="column five-sixth last"><?php
				$widgetareas = array_key_exists("widget-area-left",$post_settings) ? array_unique($post_settings["widget-area-left"]) : array();
				$widgets = veda_option('widgetarea','custom');?>
				<select class="dt-chosen-select" name="dttheme[widgetareas-left][]" multiple="multiple" data-placeholder="<?php esc_attr_e('Select Widget Area', 'veda-attorney');?>"><?php
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
			<div class="column one-sixth"><label><?php esc_html_e('Show Standard Right Sidebar','veda-attorney');?></label></div>
			<div class="column five-sixth last"><?php 
				$switchclass = array_key_exists("show-standard-sidebar-right",$post_settings) ? 'checkbox-switch-on' :'checkbox-switch-off';
				$checked = array_key_exists("show-standard-sidebar-right",$post_settings) ? ' checked="checked"' : '';?>
				
				<div data-for="dttheme-show-standard-sidebar-right" class="checkbox-switch <?php echo esc_attr($switchclass);?>"></div>
				<input id="dttheme-show-standard-sidebar-right" class="hidden" type="checkbox" name="show-standard-sidebar-right" value="true" <?php echo $checked;?>/>
				<p class="note"> <?php esc_html_e('Yes! to show standard right sidebar on this page.','veda-attorney');?> </p>
			 </div>
		</div><!-- Standard Sidebar Right End-->

		<!-- 3. Choose Widget Areas Start -->
		<div id="page-sidebars" class="sidebar-section custom-box page-widgetareas">
			<div class="column one-sixth"><label><?php esc_html_e('Choose Widget Area - Right Sidebar','veda-attorney');?></label></div>
			<div class="column five-sixth last"><?php
				$widgetareas = array_key_exists("widget-area-right",$post_settings) ? array_unique($post_settings["widget-area-right"]) : array();
				$widgets = veda_option('widgetarea','custom');?>
				<select class="dt-chosen-select" name="dttheme[widgetareas-right][]" multiple="multiple" data-placeholder="<?php esc_attr_e('Select Widget Area', 'veda-attorney');?>"><?php
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
		<label><?php esc_html_e('Social Profile','veda-attorney');?> </label>
	</div>
	<div class="column five-sixth last">
	    <?php $v = array_key_exists("social",$post_settings) ?  $post_settings['social'] : '';?>
        <input id="social" name="social" class="large" type="text" value="<?php echo $v;?>" style="width:100%;" />
    	<p class="note"> <?php esc_html_e("You can given social shortcode. eg: [dt_sc_social facebook='#' twitter='#'/]",'veda-attorney');?> </p>
    </div>
</div>

<div class="custom-box meta-fields">
	<div class="column one-sixth">
		<label><?php esc_html_e('Summary Title','veda-attorney');?> </label>
	</div>
	<div class="column five-sixth last">
	    <?php $v = array_key_exists("summary-title",$post_settings) ?  $post_settings['summary-title'] : '';?>
        <input id="summary-title" name="summary-title" class="large" type="text" value="<?php echo $v;?>" style="width:100%;" />
    </div>
</div>

<div class="custom-box meta-fields">
	<div class="column one-sixth">
		<label><?php esc_html_e('Summary','veda-attorney');?> </label>
	</div>
	<div class="column five-sixth last">
	    <?php $v = array_key_exists("summary",$post_settings) ?  $post_settings['summary'] : '';?>
	    <textarea id="summary" name="summary" class="large" style="width:100%"><?php echo $v;?></textarea>
    </div>
</div>

<div class="custom-box meta-fields">
	<div class="column one-sixth">
		<label><?php esc_html_e('Phone No','veda-attorney');?> </label>
	</div>
	<div class="column five-sixth last">
	    <?php $v = array_key_exists("phone",$post_settings) ?  $post_settings['phone'] : '';?>
        <input id="phone" name="phone" class="large" type="text" value="<?php echo $v;?>"/>
    </div>
</div>

<div class="custom-box meta-fields">
	<div class="column one-sixth">
		<label><?php esc_html_e('Role','veda-attorney');?> </label>
	</div>
	<div class="column five-sixth last">
	    <?php $v = array_key_exists("role",$post_settings) ?  $post_settings['role'] : '';?>
        <input id="role" name="role" class="large" type="text" value="<?php echo $v;?>"/>
    </div>
</div>

<!-- Additional Fields -->
<?php	// checking meta files from back-end
	$fields = veda_opts_get( 'attorney-custom-fields', array() );
	$fields = array_unique(array_filter($fields));
	
	if(!empty($fields)) : ?>
		<div class="custom-box">
        	<div class="column one-sixth">
            	<label><?php esc_html_e('Additional Fields','veda-attorney');?></label>
            </div>
            <div class="column five-sixth last">
            	<div class="meta-fields">
            		<div class="column one-fourth">
						<strong><?php esc_html_e('In Detail?','veda-attorney');?></strong>&nbsp;&nbsp;&nbsp;
                    	<strong><?php esc_html_e('Title','veda-attorney');?></strong>
                    </div>
                    <div class="column three-fourth last">
	                	<strong><?php esc_html_e('Value','veda-attorney');?></strong>
                    </div>
					<div class="hr_invisible"></div><?php
                	// getting filed values
					foreach($fields as $field):
						$metaslug = strtolower(str_replace(' ', '-', $field));
						$meta_show = isset( $post_settings['meta_show'] ) ? $post_settings['meta_show'] : array();

						$checked = array_key_exists($metaslug, $meta_show) ? " checked='checked'" : "";?>
                        <div class="column one-fourth"><?php
							if(isset($post_settings['meta_show'])):
								$t = array_key_exists($metaslug, $post_settings['meta_show']) ? 
									(!empty($post_settings['meta_show'][$metaslug]) ? $post_settings['meta_show'][$metaslug] : $field) : $field;
							else:
								$t = $field;
							endif;?>
                            <input type="checkbox" name="dttheme-meta-show[<?php echo $metaslug;?>]" class="medium" style="width:auto;" 
	                            value="<?php echo esc_attr($t);?>" <?php echo $checked;?>><?php
							if(isset($post_settings['meta_title'])):
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
                <p class="note"> <?php esc_html_e("Here you can change Additional field title & values for this item. First two fields will be shown in hover",'veda-attorney');?> </p>
            </div>        
		</div><?php 
	endif;?><!-- Additional Fields End -->