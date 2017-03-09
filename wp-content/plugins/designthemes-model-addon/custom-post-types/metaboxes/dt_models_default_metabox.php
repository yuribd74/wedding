<?php
global $post;
$post_settings = get_post_meta ( $post->ID, '_custom_settings', TRUE );
$post_settings = is_array ( $post_settings ) ? $post_settings : array ();
	
echo '<input type="hidden" name="dt_theme_model_meta_nonce" value="'.wp_create_nonce('dt_theme_model_nonce').'" />';?>	

<!-- 0. Sub Title -->
<div class="sub-title custom-box">
    <div class="column one-sixth"><?php esc_html_e( 'Title Background','veda-model');?></div>
    <div class="column five-sixth last">
        <div class="two-third column image-preview-container" style="width:60%;">
            <?php $subtitlebg = array_key_exists ( 'sub-title-bg', $post_settings ) ? $post_settings ['sub-title-bg'] : '';?>
            <input name="sub-title-bg" type="text" class="uploadfield medium" readonly="readonly" value="<?php echo esc_attr($subtitlebg);?>"/>
            <input type="button" value="<?php esc_attr_e('Upload','veda-model');?>" class="upload_image_button show_preview" />
            <input type="button" value="<?php esc_attr_e('Remove','veda-model');?>" class="upload_image_reset" />
            <?php if( !empty($subtitlebg) ) veda_adminpanel_image_preview($subtitlebg );?>
            <p class="note"><?php esc_html_e('Upload an image for the sub title background','veda-model');?></p>
        </div>
        <div class="one-eighth column"></div>
        <div class="one-third column last">
            <label><?php esc_html_e('Opacity','veda-model');?></label>
            <?php $opacity =  array_key_exists ( "sub-title-opacity", $post_settings ) ? $post_settings ['sub-title-opacity'] : ''; ?>
            <select name="sub-title-opacity">
                <option value=""><?php esc_html_e("Select",'veda-model');?></option>
                <?php foreach( array('1','0.1','0.2','0.3','0.4','0.5','0.6','0.7','0.8','0.9') as $option): ?>
                       <option value="<?php echo esc_attr($option);?>" <?php selected($option,$opacity);?>><?php echo esc_attr($option);?></option>
                <?php endforeach;?>
            </select>
            <p class="note"><?php esc_html_e('Select background color opacity','veda-model');?></p>
        </div>    
    </div>
</div>

<div class="sub-title custom-box">
    <div class="column one-sixth"></div>
    <div class="column five-sixth last">
        <div class="column one-third">
            <label><?php esc_html_e('Background Repeat','veda-model');?></label>
            <?php $bgrepeat =  array_key_exists ( "sub-title-bg-repeat", $post_settings ) ? $post_settings ['sub-title-bg-repeat'] : ''; ?>
            <div class="clear"></div>
            <select class="dt-chosen-select" name="sub-title-bg-repeat">
                <option value=""><?php esc_html_e("Select",'veda-model');?></option>
                <?php foreach( array('repeat','repeat-x','repeat-y','no-repeat') as $option): ?>
                       <option value="<?php echo esc_attr($option);?>" <?php selected($option,$bgrepeat);?>><?php echo esc_attr($option);?></option>
                <?php endforeach;?>
            </select>
            <p class="note"><?php esc_html_e('Select how would you like to repeat the background image','veda-model');?></p>
        </div>

        <div class="column one-third">
            <label><?php esc_html_e('Background Position','veda-model');?></label>
            <?php $bgposition =  array_key_exists ( "sub-title-bg-position", $post_settings ) ? $post_settings ['sub-title-bg-position'] : ''; ?>
            <div class="clear"></div>
            <select class="dt-chosen-select" name="sub-title-bg-position">
                <option value=""><?php esc_html_e('Select','veda-model');?></option>
                <?php foreach( array('top left','top center','top right','center left','center center','center right','bottom left','bottom center','bottom right') as $option): ?>
                    <option value="<?php echo esc_attr($option);?>" <?php selected($option,$bgposition);?>> <?php echo esc_attr($option);?></option>
                <?php endforeach;?>
            </select>
            <p class="note"><?php esc_html_e('Select how would you like to position the background','veda-model');?></p>
        </div>

        <div class="column one-third last">
        <?php $label = 		__('Background Color','veda-model');
              $name  =		'sub-title-bg-color';
              $value =  	array_key_exists ( 'sub-title-bg-color', $post_settings ) ? $post_settings ['sub-title-bg-color'] : '';
              $tooltip = 	__('Select background color for sub title section e.g. #f2d607','veda-model'); ?>
              <label><?php echo esc_html($label);?></label>
              <div class="clear"></div>
              <?php veda_admin_color_picker("",$name,$value,'');?>
              <p class="note"><?php echo $tooltip;?></p>
        </div>
    </div>
</div><!-- 0. Sub title End-->

<!-- Layout -->
<div id="page-layout" class="custom-box">
    <div class="column one-sixth"><label><?php esc_html_e('Layout','veda-model');?> </label></div>
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
        <p class="note"> <?php esc_html_e("You can choose between a left, right or no sidebar layout.",'veda-model');?> </p>
    </div>
</div><!-- Layout End-->
<?php 
 $sb_layout = array_key_exists("layout",$post_settings) ? $post_settings['layout'] : 'content-full-width';
 $sidebar_both = $sidebar_left = $sidebar_right = '';
 if($sb_layout == 'content-full-width' ) {
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
			<div class="column one-sixth"><label><?php esc_html_e('Show Standard Left Sidebar','veda-model');?></label></div>
			<div class="column five-sixth last"><?php 
				$switchclass = array_key_exists("show-standard-sidebar-left",$post_settings) ? 'checkbox-switch-on' :'checkbox-switch-off';
				$checked = array_key_exists("show-standard-sidebar-left",$post_settings) ? ' checked="checked"' : '';?>
				
				<div data-for="dttheme-show-standard-sidebar-left" class="checkbox-switch <?php echo esc_attr($switchclass);?>"></div>
				<input id="dttheme-show-standard-sidebar-left" class="hidden" type="checkbox" name="show-standard-sidebar-left" value="true" <?php echo $checked;?>/>
				<p class="note"> <?php esc_html_e('Yes! to show standard left sidebar on this page.','veda-model');?> </p>
			 </div>
		</div><!-- Standard Sidebar Left End-->

		<!-- 3. Choose Widget Areas Start -->
		<div id="page-sidebars" class="sidebar-section custom-box page-widgetareas">
			<div class="column one-sixth"><label><?php esc_html_e('Choose Widget Area - Left Sidebar','veda-model');?></label></div>
			<div class="column five-sixth last"><?php
				$widgetareas = array_key_exists("widget-area-left",$post_settings) ? array_unique($post_settings["widget-area-left"]) : array();
				$widgets = veda_option('widgetarea','custom');?>
				<select class="dt-chosen-select" name="dttheme[widgetareas-left][]" multiple="multiple" data-placeholder="<?php esc_html_e('Select Widget Area', 'veda-model');?>"><?php
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
			<div class="column one-sixth"><label><?php esc_html_e('Show Standard Right Sidebar','veda-model');?></label></div>
			<div class="column five-sixth last"><?php 
				$switchclass = array_key_exists("show-standard-sidebar-right",$post_settings) ? 'checkbox-switch-on' :'checkbox-switch-off';
				$checked = array_key_exists("show-standard-sidebar-right",$post_settings) ? ' checked="checked"' : '';?>
				
				<div data-for="dttheme-show-standard-sidebar-right" class="checkbox-switch <?php echo esc_attr($switchclass);?>"></div>
				<input id="dttheme-show-standard-sidebar-right" class="hidden" type="checkbox" name="show-standard-sidebar-right" value="true" <?php echo $checked;?>/>
				<p class="note"> <?php esc_html_e('Yes! to show standard right sidebar on this page.','veda-model');?> </p>
			 </div>
		</div><!-- Standard Sidebar Right End-->

		<!-- 3. Choose Widget Areas Start -->
		<div id="page-sidebars" class="sidebar-section custom-box page-widgetareas">
			<div class="column one-sixth"><label><?php esc_html_e('Choose Widget Area - Right Sidebar','veda-model');?></label></div>
			<div class="column five-sixth last"><?php
				$widgetareas = array_key_exists("widget-area-right",$post_settings) ? array_unique($post_settings["widget-area-right"]) : array();
				$widgets = veda_option('widgetarea','custom');?>
				<select class="dt-chosen-select" name="dttheme[widgetareas-right][]" multiple="multiple" data-placeholder="<?php esc_attr_e('Select Widget Area', 'veda-model');?>"><?php
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
		<label><?php esc_html_e('Sub Title','veda-model');?> </label>
	</div>
	<div class="column five-sixth last">
	    <?php $v = array_key_exists("subtitle",$post_settings) ?  $post_settings['subtitle'] : '';?>
        <input id="social" name="_subtitle" class="large" type="text" value="<?php echo $v;?>" style="width:100%;" />
    	<p class="note"> <?php esc_html_e("You can given sub title here, this will be shown above additional fileds",'veda-model');?> </p>
    </div>
</div>

<!-- Allow Full Width -->
<div class="custom-box">
	<div class="column one-sixth">
    	<label><?php esc_html_e('Allow Full Width','veda-model');?></label>
    </div>
    <div class="column five-sixth last">
    	<?php $switchclass = array_key_exists("fullwidth",$post_settings) ? 'checkbox-switch-on' :'checkbox-switch-off';
			$checked = array_key_exists("fullwidth",$post_settings) ? ' checked="checked"' : '';?>
        <div data-for="fullwidth" class="checkbox-switch <?php echo esc_attr($switchclass);?>"></div>
        <input id="fullwidth" class="hidden" type="checkbox" name="fullwidth" value="true" <?php echo $checked;?>/>
        <p class="note"> <?php esc_html_e('Allow Full Width model layout','veda-model');?> </p>
    </div>
</div><!-- Allow Full Width -->


<!-- Medias -->
<div class="custom-box">
	<div class="column one-sixth">
		<label><?php esc_html_e('Images','veda-model');?> </label>
	</div>
	<div class="column five-sixth last">
		<div class="dt-media-btns-container">
			<a href="#" class="dt-open-media button button-primary"><?php esc_html_e( 'Click Here to Add Images', 'veda-model' );?> </a>
			<a href="#" class="dt-add-video button button-primary"><?php esc_html_e( 'Click Here to Add Video', 'veda-model' );?> </a>
		</div>
		<div class="clear"></div>

		<div class="dt-media-container">
			<ul class="dt-items-holder"><?php
			if (array_key_exists ( "items", $post_settings )) {
				foreach ( $post_settings ["items_thumbnail"] as $key => $thumbnail ) {
					$item = $post_settings ['items'] [$key];
					$out = "";
					$name = "";
					$foramts = array (
							'jpg',
							'jpeg',
							'gif',
							'png' 
					);
					$parts = explode ( '.', $item );
					$ext = strtolower ( $parts [count ( $parts ) - 1] );
					if (in_array ( $ext, $foramts )) {
						$name = $post_settings ['items_name'] [$key];
						$out .= "<li>";
						$out .= "<img src='{$thumbnail}' alt='' />";
						$out .= "<span class='dt-image-name'>{$name}</span>";
						$out .= "<input type='hidden' name='items[]' value='{$item}' />";
					} else {
						$name = "video";
						$out .= "<li>";
						$out .= "<span class='dt-video'></span>";
						$out .= "<input type='text' name='items[]' value='{$item}' />";
					}
					
					$out .= "<input class='dt-image-name' type='hidden' name='items_name[]' value='{$name}' />";
					$out .= "<input type='hidden' name='items_thumbnail[]' value='{$thumbnail}' />";
					$out .= "<span class='my_delete'></span>";
					$out .= "</li>";
					echo $out;
				}
			}
			?></ul>
		</div>
	</div>
</div><!-- Medias End -->

<div class="custom-box">
	<div class="column one-sixth">
		<label><?php esc_html_e('Social Profile','veda-model');?> </label>
	</div>
	<div class="column five-sixth last">
	    <?php $v = array_key_exists("social",$post_settings) ?  $post_settings['social'] : '';?>
        <input id="social" name="_social" class="large" type="text" value="<?php echo $v;?>" style="width:100%;" />
    	<p class="note"> <?php esc_html_e("You can given social shortcode. eg: [dt_sc_social facebook='#' twitter='#'/]",'veda-model');?> </p>
    </div>
</div>

<!-- Additional Fields -->
<?php	// checking meta files from back-end
	$fields = veda_opts_get( 'model-custom-fields', array() );
	$fields = array_unique(array_filter($fields));
	
	if(!empty($fields)) : ?>
		<div class="custom-box">
        	<div class="column one-sixth">
            	<label><?php esc_html_e('Additional Fields','veda-model');?></label>
            </div>
            <div class="column five-sixth last">
            	<div class="meta-fields">
                	<div class="column one-fourth">
                    	<strong><?php esc_html_e('Title','veda-model');?></strong>
                    </div>
                    <div class="column three-fourth last">
	                	<strong><?php esc_html_e('Value','veda-model');?></strong>
                    </div>
					<div class="hr_invisible"></div><?php
                	// getting filed values
					foreach($fields as $field):
						$metaslug = strtolower(str_replace(' ', '-', $field));?>
                        <div class="column one-fourth"><?php
							if(isset($post_settings['meta_title'])):
								$t = array_key_exists($metaslug, $post_settings['meta_title']) ? 
									(!empty($post_settings['meta_title'][$metaslug]) ? $post_settings['meta_title'][$metaslug] : $field) : $field;
							else:
								$t = $field;
							endif;?>
                            <input type="text" name="dttheme-meta-title[<?php echo $metaslug;?>]" class="medium" style="width:auto;box-shadow:none;background-color:whitesmoke;" value="<?php echo esc_attr($t);?>">
                        </div>
                        <div class="column three-fourth last"><?php
							$v = '';
							if(isset($post_settings['meta_value'])):
								$v = array_key_exists($metaslug, $post_settings['meta_value']) ?  $post_settings['meta_value'][$metaslug] : '';
							endif;?>
                            <input name="dttheme-meta-value[<?php echo $metaslug; ?>]" class="large" type="text" value="<?php echo esc_attr($v);?>" />
                        </div>
                        <div class="hr_invisible"></div><?php
					endforeach;?>
                   </div>
                <p class="note"> <?php esc_html_e("Here you can change Additional field title & values for this item. First two fields will be shown in hover",'veda-model');?> </p>
            </div>        
		</div><?php 
	endif;?><!-- Additional Fields End -->