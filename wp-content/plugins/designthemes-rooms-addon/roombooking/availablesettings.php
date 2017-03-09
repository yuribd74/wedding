<?php
function veda_room_hb_available_page() { ?>

    <div id="wrapper" class="wrap">
    	<h2><?php esc_html_e('Rooms Available Settings', 'veda-room'); ?></h2>
        <div class="updated settings-error dt-update-notice" id="setting-error-settings_updated" style="display:none;"><p><strong></strong></p></div>
        
        <form id="frmavailablesettings" name="frmavailablesettings" method="post" action="<?php echo get_admin_url()."admin.php?page=availablesettings"; ?>">
        	<?php $hb_available_settings = get_option('hb_available_settings'); ?>
        	<table class="form-table">
				<tbody>
					<tr>
						<th scope="row"><label for="roomtype"><?php esc_html_e('Select Room', 'veda-room'); ?></label></th>
						<td><select id="roomtype" name="roomtype">
                        		<option value=""><?php esc_html_e('Choose Room', 'veda-room'); ?></option><?php
								$args = array('post_type' => 'dt_rooms', 'posts_per_page' => -1, 'order' => 'ASC');
								$the_query = new WP_Query($args);
								if($the_query->have_posts()):
									while($the_query->have_posts()): $the_query->the_post();
										?><option value="<?php the_ID(); ?>"><?php the_title(); ?></option><?php
									endwhile;
								endif;
								wp_reset_query($the_query); ?>
                        </select>&nbsp;&nbsp;<a href="javascript:void(0);" title="<?php esc_attr_e('Clear Unavailable Dates', 'veda-room'); ?>" class="clear-unavailable"><?php esc_html_e('Clear Dates', 'veda-room'); ?></a></td>
					</tr>
                    <tr>
						<th scope="row"><label for="dpformat"><?php esc_html_e('Set Unavailable Dates for above Room', 'veda-room'); ?></label></th>
						<td><div id="rangeInlinePicker"></div><textarea id="txtseldates" name="txtseldates" style="display:none;"></textarea></td>
                    </tr>
				</tbody>
			</table>
            <p class="submit"><input type="submit" value="<?php esc_attr_e('Save Changes', 'veda-room'); ?>" class="button button-primary save-unavailable" id="submit" name="submit"></p>
        </form>
    </div><?php

}?>