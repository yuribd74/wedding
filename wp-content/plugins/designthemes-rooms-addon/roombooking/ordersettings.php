<?php
function veda_room_hb_order_page() {
	
	if(isset($_REQUEST['delete']) == 'Delete') {
		
		$oids = $_REQUEST['order'];
		if($oids != ""):
			$orders = get_option('hb_order_settings');
			foreach($oids as $oid):
				unset($orders[$oid]);
			endforeach;
			update_option('hb_order_settings', $orders);
			
			$text = esc_html__('Orders deleted.', 'veda-room');
		endif;			
	} ?>
    
    <div id="wrapper" class="wrap">
    	<h2><?php esc_html_e('Rooms Order Details', 'veda-room'); ?></h2>
        <?php if(!empty($text)) echo '<div class="updated settings-error" id="setting-error-settings_updated"><p><strong>'.$text.'</strong></p></div>'; ?>
        
        <form method="post" action="" class="dt-sort-table" style="margin-top:20px;">
            <label for="quicksearch"><?php esc_html_e('Submitted Orders', 'veda-room'); ?>: </label><input type="text" id="quicksearch" name="quicksearch" placeholder="<?php esc_attr_e('Type to search', 'veda-room'); ?>..." />
            <table class="wp-list-table widefat fixed tablesorter dt-sc-tbl-orders" style="width:100%" cellspacing="1">
                <thead>
                    <tr>
                        <th class="manage-column column-cb check-column" id="cb" scope="col">
                            <label for="cb-select-all-1" class="screen-reader-text"><?php esc_html_e('Select All', 'veda-room'); ?></label>
                            <input type="checkbox" id="cb-select-all-1">
                        </th>
                        <th scope="col"><span><?php esc_html_e('Payer ID', 'veda-room'); ?></span></th>
                        <th scope="col"><span><?php esc_html_e('First Name', 'veda-room'); ?></span></th>
                        <th scope="col"><span><?php esc_html_e('Last Name', 'veda-room'); ?></span></th>
                        <th scope="col"><span><?php esc_html_e('Email', 'veda-room'); ?></span></th>
                        <th scope="col" style="width:6%;"><span><?php esc_html_e('Country', 'veda-room'); ?></span></th>
                        <th scope="col" style="width:6%;"><span><?php esc_html_e('Amount', 'veda-room'); ?></span></th>
                        <th scope="col"><span><?php esc_html_e('Room', 'veda-room'); ?></span></th>
                        <th scope="col"><span><?php esc_html_e('Service IDs', 'veda-room'); ?></span></th>
                        <th scope="col"><span><?php esc_html_e('Check In', 'veda-room'); ?></span></th>
                        <th scope="col"><span><?php esc_html_e('Check Out', 'veda-room'); ?></span></th>
                        <th scope="col" style="width:6%;"><span><?php esc_html_e('Adults', 'veda-room'); ?></span></th>
                        <th scope="col" style="width:6%;"><span><?php esc_html_e('Childs', 'veda-room'); ?></span></th>
						<th scope="col" style="width:6%;"><span><?php esc_html_e('Deposit (%)', 'veda-room'); ?></span></th>
						<th scope="col" style="width:6%;"><span><?php esc_html_e('Net Amount', 'veda-room'); ?></span></th>
                    </tr>
                </thead>
                <tbody data-wp-lists="list:service" id="the-list">
                <?php
                    $order_details = get_option('hb_order_settings');
                    if($order_details != NULL):
                        foreach($order_details as $key => $order): ?>
                            <tr class="alternate">
                                <th class="check-column" scope="row">
                                    <label for="cb-select-<?php echo $key; ?>" class="screen-reader-text"><?php esc_html_e('Select Order', 'veda-room'); ?></label>
                                    <input type="checkbox" value="<?php echo $key; ?>" class="administrator" id="order_<?php echo $key; ?>" name="order[]">
                                </th>
                                <td><?php echo $order['Payer_ID']; ?></td>
                                <td><?php echo $order['First_Name']; ?></td>
                                <td><?php echo $order['Last_Name']; ?></td>
                                <td><?php echo $order['Email']; ?></td>
                                <td><?php echo $order['Country']; ?></td>
                                <td><?php echo $order['Amount']; ?></td>
                                <td><?php echo get_the_title($order['Room_ID']); ?></td>
                                <td><?php echo $order['Service_IDs']; ?></td>
                                <td><?php echo $order['Check_In']; ?></td>
                                <td><?php echo $order['Check_Out']; ?></td>
                                <td><?php echo $order['Adults']; ?></td>
								<td><?php echo $order['Childs']; ?></td>
								<td><?php echo $order['Deposit_Due']; ?></td>
								<td><?php echo $order['Net_Amount']; ?></td>
                            </tr><?php
                        endforeach;
					else:
						?><tr class="no-items"><td colspan="15" class="colspanchange"><?php esc_html_e('No Orders found.', 'veda-room'); ?></td></tr><?php
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