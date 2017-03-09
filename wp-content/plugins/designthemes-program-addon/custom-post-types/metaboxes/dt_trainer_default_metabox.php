<?php
global $post;
$post_settings = get_post_meta ( $post->ID, '_custom_settings', TRUE );
$post_settings = is_array ( $post_settings ) ? $post_settings : array ();
echo '<input type="hidden" name="dt_theme_trainer_meta_nonce" value="'.wp_create_nonce('dt_theme_trainer_nonce').'" />'; ?>

<!-- Special Fields -->
<div class="custom-box meta-fields">
    <div class="column one-seventh">
        <label><?php esc_html_e('Role','veda-program');?></label>
    </div>
    <div class="column one-third">
        <?php $v = array_key_exists("role",$post_settings) ?  $post_settings['role'] : '';?>
        <input id="role" name="_role" class="large" type="text" value="<?php echo esc_attr($v);?>" style="width:100%;" placeholder="<?php esc_attr_e('Fitness Instructor', 'veda-program'); ?>" />
        <p class="note"> <?php esc_html_e("You can given role of trainer.",'veda-program');?> </p>
    </div>

    <div class="column one-seventh">
        <label><?php esc_html_e('Skills','veda-program');?></label>
    </div>
    <div class="column one-third">
        <?php $v = array_key_exists("skills",$post_settings) ?  $post_settings['skills'] : '';?>
        <input id="skills" name="_skills" class="large" type="text" value="<?php echo esc_attr($v);?>" style="width:100%;" placeholder="<?php esc_attr_e('Fitness, Yoga, Body Building', 'veda-program'); ?>" />
        <p class="note"> <?php esc_html_e("You can given skills of trainer.",'veda-program');?> </p>
    </div>
	<div class="hr_invisible"></div>

    <div class="column one-seventh">
        <label><?php esc_html_e('Qualification','veda-program');?></label>
    </div>
    <div class="column one-third">  
        <?php $v = array_key_exists("qualify",$post_settings) ?  $post_settings['qualify'] : '';?>
        <input id="qualify" name="_qualify" class="large" type="text" value="<?php echo esc_attr($v);?>" style="width:100%;" placeholder="<?php esc_attr_e('ETA National Certificate in Fitness', 'veda-program'); ?>" />
        <p class="note"> <?php esc_html_e("You can given qualification of trainer.",'veda-program');?> </p>
    </div>
    
    <div class="column one-seventh">
        <label><?php esc_html_e('Experience','veda-program');?></label>
    </div>
    <div class="column one-third">
        <?php $v = array_key_exists("experience",$post_settings) ?  $post_settings['experience'] : '';?>
        <input id="experience" name="_experience" class="large" type="text" value="<?php echo esc_attr($v);?>" style="width:100%;" placeholder="<?php esc_attr_e('2+ Years as Trainer', 'veda-program'); ?>" />
        <p class="note"> <?php esc_html_e("You can given experience of trainer.",'veda-program');?> </p>
    </div>
	<div class="hr_invisible"></div>

    <div class="column one-seventh">
        <label><?php esc_html_e('Social Shortcode','veda-program');?></label>
    </div>
    <div class="column four-fifth">  
        <?php $v = array_key_exists("social",$post_settings) ?  $post_settings['social'] : '';?>
        <input id="social" name="_social" class="large" type="text" value="<?php echo esc_attr($v);?>" style="width:100%;" />
        <p class="note"> <?php esc_html_e("You can given social shortcode. eg: [dt_sc_social facebook='#' twitter='#'/]",'veda-program');?> </p>
    </div>
</div><!-- Special Fields End -->

<!-- Additional Fields --><?php
// checking meta files from back-end
$fields = veda_opts_get( 'trainer-custom-fields', array() );
$fields = array_unique(array_filter($fields));

if(!empty($fields)) : ?>
    <div class="custom-box">
        <div class="column one-sixth">
            <label><?php esc_html_e('Additional Fields','veda-program');?></label>
        </div>
        <div class="column five-sixth last">
            <div class="meta-fields">
				<div class="column one-fourth" style="text-align:center;">
                	<strong><?php esc_html_e('Title','veda-program');?></strong>
                </div>
                <div class="column three-fourth last">
                	<strong><?php esc_html_e('Value','veda-program');?></strong>
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
                        <input type="text" name="dttheme-meta-title[<?php echo esc_attr($metaslug);?>]" class="medium" style="width:auto;box-shadow:none;background-color:whitesmoke;" value="<?php echo esc_attr($t); ?>">
                    </div>
                    <div class="column three-fourth last"><?php
                        $v = '';
                        if(isset($post_settings['meta_value'])):
                            $v = array_key_exists($metaslug, $post_settings['meta_value']) ?  $post_settings['meta_value'][$metaslug] : '';
                        endif;?>
                        <input name="dttheme-meta-value[<?php echo esc_attr($metaslug);?>]" class="large" type="text" value="<?php echo esc_attr($v);?>" />
                    </div>
                    <div class="hr_invisible"></div><?php
                endforeach; ?>
            </div>
            <p class="note"> <?php esc_html_e("Here you can change Additional field title & values for this item.",'veda-program');?> </p>
        </div>
    </div><?php
endif; ?><!-- Additional Fields End -->