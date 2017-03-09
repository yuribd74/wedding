<?php
global $post;
$post_settings = get_post_meta ( $post->ID, '_custom_settings', TRUE );
$post_settings = is_array ( $post_settings ) ? $post_settings : array ();
echo '<input type="hidden" name="dt_theme_menu_meta_nonce" value="'.wp_create_nonce('dt_theme_menu_nonce').'" />'; ?>

<!-- Special Fields -->
<div class="custom-box meta-fields">
	<div class="column one-fifth">
    	<label><?php esc_html_e('Menu Details','veda-restaurant');?></label>
    </div>
    <div class="column four-fifth last">
        <?php $v = array_key_exists("details",$post_settings) ?  $post_settings['details'] : '';?>
        <textarea cols="90" rows="3" name="_details" placeholder="<?php esc_attr_e('Any Content...', 'veda-restaurant'); ?>"><?php echo esc_attr($v);?></textarea>
    </div>
	<div class="hr_invisible_large"></div>

    <div class="column one-seventh">
        <label><?php esc_html_e('Price','veda-restaurant');?></label>
    </div>
    <div class="column one-third">  
        <?php $v = array_key_exists("price",$post_settings) ?  $post_settings['price'] : '';?>
        <input id="price" name="_price" class="large" type="text" value="<?php echo esc_attr($v);?>" style="width:100%;" placeholder="<?php esc_attr_e('$12.95', 'veda-restaurant'); ?>" />
        <p class="note"> <?php esc_html_e("You can given menu price.",'veda-restaurant');?> </p>
    </div>

    <div class="column one-seventh">
        <label><?php esc_html_e('Veg (or) Non-Veg','veda-restaurant');?></label>
    </div>
    <div class="column one-third">
        <select name="_veg_type" class="dt-chosen-select">
            <?php $selected = array_key_exists("veg_type",$post_settings) ?  $post_settings['veg_type'] : ''; ?>
            <?php $types =  array(
                      '' => esc_html__('General','veda-restaurant'),
                      'veg' => esc_html__('Vegetarian','veda-restaurant'),
                      'non-veg' => esc_html__('Non-Veg','veda-restaurant')
                  );
                  foreach( $types as $es => $bv ):
                      echo "<option value='{$es}'".selected($selected,$es,false).">{$bv}</option>";
                  endforeach;?>
        </select>
        <p class="note"> <?php esc_html_e("Your menu show at most selected type.",'veda-restaurant');?> </p>
    </div>
	<div class="hr_invisible"></div>
</div><!-- Special Fields End -->

<!-- Additional Fields --><?php
// checking meta files from back-end
$fields = veda_opts_get( 'menu-custom-fields', array() );
$fields = array_unique(array_filter($fields));

if(!empty($fields)) : ?>
    <div class="custom-box">
        <div class="column one-sixth">
            <label><?php esc_html_e('Additional Fields','veda-restaurant');?></label>
        </div>
        <div class="column five-sixth last">
            <div class="meta-fields">
				<div class="column one-fourth" style="text-align:center;">
                	<strong><?php esc_html_e('Title','veda-restaurant');?></strong>
                </div>
                <div class="column three-fourth last">
                	<strong><?php esc_html_e('Value','veda-restaurant');?></strong>
                </div>
				<div class="hr_invisible"></div><?php
                // getting filed values
                foreach($fields as $field):
                    $metaslug = strtolower(str_replace(' ', '-', $field)); ?>
                    <div class="column one-fourth"><?php
                        if(isset($post_settings['meta_title'])):
                            $t = array_key_exists($metaslug, $post_settings['meta_title']) ? 
                                        (!empty($post_settings['meta_title'][$metaslug]) ? $post_settings['meta_title'][$metaslug] : $field) : $field;
                        else:
                            $t = $field;				
                        endif;?>
                        <input type="text" name="dttheme-meta-title[<?php echo $metaslug; ?>]" class="medium" style="width:auto; box-shadow:none; background-color:whitesmoke;" value="<?php echo esc_attr($t); ?>">
                    </div>
                    <div class="column three-fourth last"><?php
                        $v = '';
                        if(isset($post_settings['meta_value'])):
                            $v = array_key_exists($metaslug, $post_settings['meta_value']) ?  $post_settings['meta_value'][$metaslug] : '';
                        endif;?>
                        <input name="dttheme-meta-value[<?php echo $metaslug; ?>]" class="large" type="text" value="<?php echo esc_attr($v);?>" />
                    </div>
                    <div class="hr_invisible"></div><?php
                endforeach; ?>
            </div>
            <p class="note"> <?php esc_html_e("Here you can change Additional field title & values for this item.",'veda-restaurant');?> </p>
        </div>
    </div><?php
endif; ?><!-- Additional Fields End -->