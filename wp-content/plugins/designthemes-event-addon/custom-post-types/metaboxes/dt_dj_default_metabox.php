<?php
global $post;
$post_settings = get_post_meta ( $post->ID, '_custom_settings', TRUE );
$post_settings = is_array ( $post_settings ) ? $post_settings : array ();
echo '<input type="hidden" name="dt_theme_dj_meta_nonce" value="'.wp_create_nonce('dt_theme_dj_nonce').'" />'; ?>

<!-- Special Fields -->
<div class="custom-box meta-fields">
    <div class="column one-seventh">
        <label><?php esc_html_e('Role','veda-event');?></label>
    </div>
    <div class="column one-third">
        <?php $v = array_key_exists("role",$post_settings) ?  $post_settings['role'] : '';?>
        <input id="role" name="_role" class="large" type="text" value="<?php echo esc_attr($v);?>" style="width:100%;" placeholder="<?php esc_attr_e('Turnable master', 'veda-event'); ?>" />
        <p class="note"> <?php esc_html_e("You can given role of dj.",'veda-event');?> </p>
    </div>

    <div class="column one-seventh">
        <label><?php esc_html_e('Since','veda-event');?></label>
    </div>
    <div class="column one-third">
        <?php $v = array_key_exists("since",$post_settings) ?  $post_settings['since'] : '';?>
        <input id="since" name="_since" class="large" type="text" value="<?php echo esc_attr($v);?>" style="width:100%;" placeholder="2002" />
        <p class="note"> <?php esc_html_e("You can given since of dj.",'veda-event');?> </p>
    </div>
	<div class="hr_invisible"></div>

    <div class="column one-seventh">
        <label><?php esc_html_e('No.of Events','veda-event');?></label>
    </div>
    <div class="column one-third">
        <?php $v = array_key_exists("no_events",$post_settings) ?  $post_settings['no_events'] : '';?>
        <input id="no_events" name="_no_events" class="large" type="text" value="<?php echo esc_attr($v);?>" style="width:100%;" placeholder="1576" />
        <p class="note"> <?php esc_html_e("You can given no.of events for dj.",'veda-event');?> </p>
    </div>

    <div class="column one-seventh">
        <label><?php esc_html_e('Latest Audio','veda-event');?></label>
    </div>
    <div class="column one-third">
        <?php $v = array_key_exists("latest_audio",$post_settings) ?  $post_settings['latest_audio'] : '';?>
        <input id="latest_audio" name="_latest_audio" class="large" type="text" value="<?php echo esc_attr($v);?>" style="width:100%;" placeholder="11:30" />
        <p class="note"> <?php esc_html_e("You can given latest audio for dj.",'veda-event');?> </p>
    </div>
</div><!-- Special Fields End -->

<!-- Additional Fields --><?php
// checking meta files from back-end
$fields = veda_opts_get( 'dj-custom-fields', array() );
$fields = array_unique(array_filter($fields));

if(!empty($fields)) : ?>
    <div class="custom-box">
        <div class="column one-sixth">
            <label><?php esc_html_e('Additional Fields','veda-event');?></label>
        </div>
        <div class="column five-sixth last">
            <div class="meta-fields">
				<div class="column one-fourth" style="text-align:center;">
                	<strong><?php esc_html_e('Title','veda-event');?></strong>
                </div>
                <div class="column three-fourth last">
                	<strong><?php esc_html_e('Value','veda-event');?></strong>
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
                        <input type="text" name="dttheme-meta-title[<?php echo esc_attr($metaslug); ?>]" class="medium" style="width:auto; box-shadow:none; background-color:whitesmoke;" 
                        	value="<?php echo esc_attr($t); ?>">
                    </div>
                    <div class="column three-fourth last"><?php
                        $v = '';
                        if(isset($post_settings['meta_value'])):
                            $v = array_key_exists($metaslug, $post_settings['meta_value']) ?  $post_settings['meta_value'][$metaslug] : '';
                        endif;?>
                        <input name="dttheme-meta-value[<?php echo esc_attr($metaslug); ?>]" class="large" type="text" value="<?php echo esc_attr($v);?>" />
                    </div>
                    <div class="hr_invisible"></div><?php
                endforeach; ?>
            </div>
            <p class="note"> <?php esc_html_e("Here you can change Additional field title & values for this item.",'veda-event');?> </p>
        </div>
    </div><?php
endif; ?><!-- Additional Fields End -->