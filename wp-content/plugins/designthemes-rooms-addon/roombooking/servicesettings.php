<?php
function veda_room_hb_service_page() {
	
	if(isset($_REQUEST['submit']) == 'Save Changes') {
		
		$a = array('hb-service-name' => $_REQUEST['servicename'], 'hb-service-des' => $_REQUEST['description'], 'hb-service-price' => $_REQUEST['sprice']);
		$opts = get_option('hb_service_settings');
		
		if($opts == NULL) {
			$hb_service_settings[1] = $a;
			update_option('hb_service_settings', $hb_service_settings);
		} else {
			array_push($opts, $a);
			update_option('hb_service_settings', $opts);
		}
		
		$text = esc_html__('Settings saved.', 'veda-room');
	}
	
	if(isset($_REQUEST['delete']) == 'Delete') {
		
		$sids = $_REQUEST['service'];
		if($sids != ""):
			$opts = get_option('hb_service_settings');
			foreach($sids as $sid):
				unset($opts[$sid]);
			endforeach;
			update_option('hb_service_settings', $opts);
			
			$text = esc_html__('Settings deleted.', 'veda-room');
		endif;			
	} ?>
    
    <div id="wrapper" class="wrap">
    	<h2><?php esc_html_e('Rooms Additional Services', 'veda-room'); ?></h2>
        <?php if(!empty($text)) echo '<div class="updated settings-error" id="setting-error-settings_updated"><p><strong>'.$text.'</strong></p></div>'; ?>
        
        <form id="frmservicesettings" name="frmservicesettings" method="post" action="<?php echo get_admin_url()."admin.php?page=servicesettings";?>">
        	<table class="form-table">
				<tbody>
					<tr>
						<th scope="row"><label for="servicename"><?php esc_html_e('Service Name', 'veda-room'); ?></label></th>
						<td><input type="text" id="servicename" name="servicename" class="regular-text" required="required" placeholder="<?php esc_attr_e('ex: Swimming Pool', 'veda-room'); ?>" /></td>
					</tr>
					<tr>
						<th scope="row"><label for="description"><?php esc_html_e('Description', 'veda-room'); ?></label></th>
						<td><textarea id="description" name="description" class="medium-text code" cols="40"></textarea></td>
					</tr>
                	<tr>
						<th scope="row"><label for="sprice"><?php esc_html_e('Price', 'veda-room'); ?>&nbsp;(<?php echo veda_currecy_symbol(); ?>)</label></th>
						<td><input type="text" id="sprice" name="sprice" class="regular-text" required="required" placeholder="120.99" /></td>
					</tr>
				</tbody>
			</table>
            <p class="submit"><input type="submit" value="<?php esc_attr_e('Save Changes','veda-room'); ?>" class="button button-primary" id="submit" name="submit"></p>
        </form>
        
        <form method="post" action="" class="dt-sort-table">
            <h3><?php esc_html_e('Available Services', 'veda-room'); ?></h3>
            <label for="quicksearch"></label><input type="text" id="quicksearch" name="quicksearch" placeholder="<?php esc_attr_e('Type to search', 'veda-room'); ?>..." />
            <table class="wp-list-table widefat fixed tablesorter dt-sc-tbl-services" style="width:80%" cellspacing="1">
                <thead>
                    <tr>
                        <th class="manage-column column-cb check-column" id="cb" scope="col">
                            <label for="cb-select-all-1" class="screen-reader-text"><?php esc_html_e('Select All', 'veda-room'); ?></label>
                            <input type="checkbox" id="cb-select-all-1">
                        </th>
                        <th scope="col">
                            <span><?php esc_html_e('Service Name', 'veda-room'); ?></span>
                        </th>
                        <th scope="col">
                            <span><?php esc_html_e('Description', 'veda-room'); ?></span>
                        </th>
                        <th scope="col">
                            <span><?php esc_html_e('Price', 'veda-room'); ?></span>
                        </th>
                    </tr>
                </thead>
                <tbody data-wp-lists="list:service" id="the-list">
                <?php
                    $service_opts = get_option('hb_service_settings');
                    if($service_opts != NULL):
                        foreach($service_opts as $key => $service): ?>
                            <tr class="alternate">
                                <th class="check-column" scope="row">
                                    <label for="cb-select-<?php echo $key; ?>" class="screen-reader-text"><?php esc_html_e('Select Service', 'veda-room'); ?></label>
                                    <input type="checkbox" value="<?php echo $key; ?>" class="administrator" id="service_<?php echo $key; ?>" name="service[]">
                                </th>
                                <td><?php echo $service['hb-service-name']; ?></td>
                                <td><?php echo $service['hb-service-des']; ?></td>
                                <td><?php echo $service['hb-service-price']; ?></td>
                            </tr><?php
                        endforeach;
					else:
						?><tr class="no-items"><td colspan="4" class="colspanchange"><?php esc_html_e('No Services found.', 'veda-room'); ?></td></tr><?php
                    endif; ?>
                </tbody>
            </table>
            <p class="submit"><input type="submit" value="<?php esc_attr_e('Delete', 'veda-room'); ?>" class="button button-primary" id="delete" name="delete"></p>
            <div id="pager" class="dt-theme-pager">
                <a href="#" class="first"></a>
                <a href="#" class="prev"></a>
                <input type="text" class="pagedisplay"/>
                <a href="#" class="next"></a>
                <a href="#" class="last"></a>
                <select class="pagesize">
                    <option selected="selected"  value="5">5</option>
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="30">30</option>
                    <option  value="40">40</option>
                </select>
            </div>
		</form>
    </div>
    <?php

}?>