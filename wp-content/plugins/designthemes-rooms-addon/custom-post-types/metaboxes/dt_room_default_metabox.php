<?php
global $post;
$post_settings = get_post_meta ( $post->ID, '_custom_settings', TRUE );
$post_settings = is_array ( $post_settings ) ? $post_settings : array ();
echo '<input type="hidden" name="dt_theme_room_meta_nonce" value="'.wp_create_nonce('dt_theme_room_nonce').'" />'; ?>

<!-- Special Fields -->
<div class="custom-box meta-fields">
    <div class="column one-seventh">  
        <label><?php esc_html_e('No.of Beds','veda-room');?></label>
    </div>
    <div class="column one-third">  
        <?php $v = array_key_exists("no_beds",$post_settings) ?  $post_settings['no_beds'] : '';?>
        <input id="no_beds" name="_no_beds" class="large" type="text" value="<?php echo $v;?>" placeholder="2" style="width:100%;" />
        <p class="note"> <?php esc_html_e("You can given no.of beds in room.",'veda-room');?> </p>
    </div>

    <div class="column one-seventh">  
        <label><?php esc_html_e('No.of Peoples','veda-room');?></label>
    </div>
    <div class="column one-third">  
        <?php $v = array_key_exists("no_peoples",$post_settings) ?  $post_settings['no_peoples'] : '';?>
        <input id="no_peoples" name="_no_peoples" class="large" type="text" value="<?php echo $v;?>" placeholder="4" style="width:100%;" />
        <p class="note"> <?php esc_html_e("You can given no.of peoples in room.",'veda-room');?> </p>
    </div>
	<div class="hr_invisible"></div>
	
    <div class="column one-seventh">
        <label><?php esc_html_e('Room Size','veda-room');?></label>
    </div>
    <div class="column one-third">  
        <?php $v = array_key_exists("room_size",$post_settings) ?  $post_settings['room_size'] : '';?>
        <input id="room_size" name="_room_size" class="large" type="text" value="<?php echo $v;?>" placeholder="1200 sqf" style="width:100%;" />
        <p class="note"> <?php esc_html_e("You can given size of room.",'veda-room');?> </p>
    </div>

    <div class="column one-seventh">  
        <label><?php esc_html_e('AC / Non AC','veda-room');?></label>
    </div>
    <div class="column one-third">  
        <?php $v = array_key_exists("ac_nonac",$post_settings) ?  $post_settings['ac_nonac'] : '';?>
        <input id="ac_nonac" name="_ac_nonac" class="large" type="text" value="<?php echo $v;?>" placeholder="<?php esc_attr_e('Split AC', 'veda-room');?>" style="width:100%;" />
        <p class="note"> <?php esc_html_e("You can given ac / non-ac of room.",'veda-room');?> </p>
    </div>
	<div class="hr_invisible"></div>
    
    <div class="column one-seventh">
        <label><?php esc_html_e('Price / Ngt','veda-room');?></label>
    </div>
    <div class="column one-third">  
        <?php $v = array_key_exists("price",$post_settings) ?  $post_settings['price'] : '';?>
        <input id="price" name="_price" class="large" type="text" value="<?php echo $v;?>" placeholder="$60.00" style="width:100%;" />
        <p class="note"> <?php esc_html_e("You can given room price.",'veda-room');?> </p>
    </div>

    <div class="column one-seventh">
        <label><?php esc_html_e('Offer Text','veda-room');?></label>
    </div>
    <div class="column one-third">
        <?php $v = array_key_exists("offer",$post_settings) ?  $post_settings['offer'] : '';?>
        <input id="offer" name="_offer" class="large" type="text" value="<?php echo $v;?>" placeholder="<?php esc_attr_e('20% off', 'veda-room');?>" style="width:100%;" />
        <p class="note"> <?php esc_html_e("You can given room offer.",'veda-room');?> </p>
    </div>
	<div class="hr_invisible"></div>
</div><!-- Special Fields End -->

<!-- Layout -->
<div id="page-layout" class="custom-box">
    <div class="column one-sixth"><label><?php esc_html_e('Layout','veda-room');?> </label></div>
    <div class="column five-sixth last">
        <ul class="bpanel-layout-set"><?php
			$post_layout = array( 'content-full-width'=>'without-sidebar', 'with-left-sidebar'=>'left-sidebar',
								  'with-right-sidebar'=>'right-sidebar' , 'with-both-sidebar'=>'both-sidebar'  );
			$v =  array_key_exists("layout",$post_settings) ?  $post_settings['layout'] : 'content-full-width';
			foreach($post_layout as $key => $value):
				$class = ($key == $v) ? " class='selected' " : "";
				echo "<li><a href='#' rel='{$key}' {$class}><img src='" . plugin_dir_url ( __FILE__ ) . "images/columns/{$value}.png' /></a></li>";
			endforeach;?>
        </ul>
        <input id="dttheme-page-layout" name="layout" type="hidden"  value="<?php echo esc_attr($v);?>"/>
        <p class="note"> <?php esc_html_e("You can choose between a left, right or no sidebar layout.",'veda-room');?> </p>
    </div>
</div><!-- Layout End-->

<?php
 $sb_layout = array_key_exists("layout",$post_settings) ? $post_settings['layout'] : 'content-full-width';
 $sidebar_both = $sidebar_left = $sidebar_right = '';
 if($sb_layout == 'content-full-width') {
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
			<div class="column one-sixth"><label><?php esc_html_e('Disable Standard Left Sidebar','veda-room');?></label></div>
			<div class="column five-sixth last"><?php 
				$switchclass = array_key_exists("disable-standard-sidebar-left",$post_settings) ? 'checkbox-switch-on' :'checkbox-switch-off';
				$checked = array_key_exists("disable-standard-sidebar-left",$post_settings) ? ' checked="checked"' : '';?>
				
				<div data-for="dttheme-disable-standard-sidebar-left" class="checkbox-switch <?php echo esc_attr($switchclass);?>"></div>
				<input id="dttheme-disable-standard-sidebar-left" class="hidden" type="checkbox" name="disable-standard-sidebar-left" value="true" <?php echo $checked;?>/>
				<p class="note"> <?php esc_html_e('Yes! to hide "Standard Left Sidebar" on this page.','veda-room');?> </p>
			 </div>
		</div><!-- Standard Sidebar Left End-->

		<!-- 3. Choose Widget Areas Start -->
		<div id="page-sidebars" class="sidebar-section custom-box page-widgetareas">
			<div class="column one-sixth"><label><?php esc_html_e('Choose Widget Area - Left Sidebar','veda-room');?></label></div>
			<div class="column five-sixth last"><?php
				$widgetareas = array_key_exists("widget-area-left",$post_settings) ? array_unique($post_settings["widget-area-left"]) : array();
				$widgets = veda_option('widgetarea','custom');?>
				<select class="dt-chosen-select" name="dttheme[widgetareas-left][]" multiple="multiple" data-placeholder="<?php esc_attr_e('Select Widget Area', 'veda-room');?>"><?php
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
			<div class="column one-sixth"><label><?php esc_html_e('Disable Standard Right Sidebar','veda-room');?></label></div>
			<div class="column five-sixth last"><?php 
				$switchclass = array_key_exists("disable-standard-sidebar-right",$post_settings) ? 'checkbox-switch-on' :'checkbox-switch-off';
				$checked = array_key_exists("disable-standard-sidebar-right",$post_settings) ? ' checked="checked"' : '';?>
				
				<div data-for="dttheme-disable-standard-sidebar-right" class="checkbox-switch <?php echo esc_attr($switchclass);?>"></div>
				<input id="dttheme-disable-standard-sidebar-right" class="hidden" type="checkbox" name="disable-standard-sidebar-right" value="true" <?php echo $checked;?>/>
				<p class="note"> <?php esc_html_e('Yes! to hide "Standard Right Sidebar" on this page.','veda-room');?> </p>
			 </div>
		</div><!-- Standard Sidebar Right End-->

		<!-- 3. Choose Widget Areas Start -->
		<div id="page-sidebars" class="sidebar-section custom-box page-widgetareas">
			<div class="column one-sixth"><label><?php esc_html_e('Choose Widget Area - Right Sidebar','veda-room');?></label></div>
			<div class="column five-sixth last"><?php
				$widgetareas = array_key_exists("widget-area-right",$post_settings) ? array_unique($post_settings["widget-area-right"]) : array();
				$widgets = veda_option('widgetarea','custom');?>
				<select class="dt-chosen-select" name="dttheme[widgetareas-right][]" multiple="multiple" data-placeholder="<?php esc_attr_e('Select Widget Area', 'veda-room');?>"><?php
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

<!-- Medias -->
<div class="custom-box">
	<div class="column one-sixth">
		<label><?php esc_html_e('Images','veda-room');?> </label>
	</div>
	<div class="column five-sixth last">
		<div class="dt-media-btns-container">
			<a href="#" class="dt-open-media button button-primary"><?php esc_html_e( 'Click Here to Add Images', 'veda-room' );?> </a>
			<a href="#" class="dt-add-video button button-primary"><?php esc_html_e( 'Click Here to Add Video', 'veda-room' );?> </a>
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

<!-- Additional Fields --><?php
// checking meta files from back-end
$fields = veda_opts_get( 'room-custom-fields', array() );
$fields = array_unique(array_filter($fields));

if(!empty($fields)) : ?>
    <div class="custom-box">
        <div class="column one-sixth">
            <label><?php esc_html_e('Additional Fields','veda-room');?></label>
        </div>
        <div class="column five-sixth last">
            <div class="meta-fields">
				<div class="column one-fifth" style="text-align:center;">
                	<strong><?php esc_html_e('Title','veda-room');?></strong>
                </div>
				<div class="column one-sixth">
                	<strong><?php esc_html_e('Icon','veda-room');?></strong>
                </div>
                <div class="column three-fifth last">
                	<strong><?php esc_html_e('Value','veda-room');?></strong>
                </div>
				<div class="hr_invisible"></div><?php
                // getting filed values
                foreach($fields as $field):
                    $metaslug = strtolower(str_replace(' ', '-', $field)); ?>
                    <div class="column one-fifth"><?php
                        if(isset($post_settings['meta_title'])):
                            $t = array_key_exists($metaslug, $post_settings['meta_title']) ? 
                                        (!empty($post_settings['meta_title'][$metaslug]) ? $post_settings['meta_title'][$metaslug] : $field) : $field;
                        else:
                            $t = $field;				
                        endif;?>
                        <input type="text" name="dttheme-meta-title[<?php echo $metaslug; ?>]" class="medium" style="width:98%; box-shadow:none; background-color:whitesmoke;" value="<?php echo esc_attr($t); ?>">
                    </div>
                    <div class="column one-sixth"><?php
                        $v = '';
                        if(isset($post_settings['meta_class'])):
                            $v = array_key_exists($metaslug, $post_settings['meta_class']) ?  $post_settings['meta_class'][$metaslug] : '';
                        endif;?>
                        <input name="dttheme-meta-class[<?php echo $metaslug; ?>]" class="medium" style="width:98%;" type="text" value="<?php echo esc_attr($v);?>" />
                    </div>
                    <div class="column three-fifth last"><?php
                        $v = '';
                        if(isset($post_settings['meta_value'])):
                            $v = array_key_exists($metaslug, $post_settings['meta_value']) ?  $post_settings['meta_value'][$metaslug] : '';
                        endif;?>
                        <input name="dttheme-meta-value[<?php echo $metaslug; ?>]" class="large" type="text" value="<?php echo esc_attr($v);?>" />
                    </div>
                    <div class="hr_invisible"></div><?php
                endforeach; ?>
            </div>
            <p class="note"> <?php esc_html_e("Here you can change Additional field title & values for this item.",'veda-room');?> </p>
        </div>
    </div><?php
endif; ?><!-- Additional Fields End -->