<?php
/**
 * Rooms Booking Core Functions.
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Get full list of currency codes.
 * @return array
 */
function get_veda_hb_currencies() {
	return array_unique(
		apply_filters( 'veda_hb_currencies',
			array(
				'AED' => esc_html__( 'United Arab Emirates Dirham', 'veda-room' ),
				'AUD' => esc_html__( 'Australian Dollars', 'veda-room' ),
				'BDT' => esc_html__( 'Bangladeshi Taka', 'veda-room' ),
				'BRL' => esc_html__( 'Brazilian Real', 'veda-room' ),
				'BGN' => esc_html__( 'Bulgarian Lev', 'veda-room' ),
				'CAD' => esc_html__( 'Canadian Dollars', 'veda-room' ),
				'CLP' => esc_html__( 'Chilean Peso', 'veda-room' ),
				'CNY' => esc_html__( 'Chinese Yuan', 'veda-room' ),
				'COP' => esc_html__( 'Colombian Peso', 'veda-room' ),
				'CZK' => esc_html__( 'Czech Koruna', 'veda-room' ),
				'DKK' => esc_html__( 'Danish Krone', 'veda-room' ),
				'EUR' => esc_html__( 'Euros', 'veda-room' ),
				'HKD' => esc_html__( 'Hong Kong Dollar', 'veda-room' ),
				'HRK' => esc_html__( 'Croatia kuna', 'veda-room' ),
				'HUF' => esc_html__( 'Hungarian Forint', 'veda-room' ),
				'ISK' => esc_html__( 'Icelandic krona', 'veda-room' ),
				'IDR' => esc_html__( 'Indonesia Rupiah', 'veda-room' ),
				'INR' => esc_html__( 'Indian Rupee', 'veda-room' ),
				'ILS' => esc_html__( 'Israeli Shekel', 'veda-room' ),
				'JPY' => esc_html__( 'Japanese Yen', 'veda-room' ),
				'KRW' => esc_html__( 'South Korean Won', 'veda-room' ),
				'MYR' => esc_html__( 'Malaysian Ringgits', 'veda-room' ),
				'MXN' => esc_html__( 'Mexican Peso', 'veda-room' ),
				'NGN' => esc_html__( 'Nigerian Naira', 'veda-room' ),
				'NOK' => esc_html__( 'Norwegian Krone', 'veda-room' ),
				'NZD' => esc_html__( 'New Zealand Dollar', 'veda-room' ),
				'PHP' => esc_html__( 'Philippine Pesos', 'veda-room' ),
				'PLN' => esc_html__( 'Polish Zloty', 'veda-room' ),
				'GBP' => esc_html__( 'Pounds Sterling', 'veda-room' ),
				'RON' => esc_html__( 'Romanian Leu', 'veda-room' ),
				'RUB' => esc_html__( 'Russian Ruble', 'veda-room' ),
				'SGD' => esc_html__( 'Singapore Dollar', 'veda-room' ),
				'ZAR' => esc_html__( 'South African rand', 'veda-room' ),
				'SEK' => esc_html__( 'Swedish Krona', 'veda-room' ),
				'CHF' => esc_html__( 'Swiss Franc', 'veda-room' ),
				'TWD' => esc_html__( 'Taiwan New Dollars', 'veda-room' ),
				'THB' => esc_html__( 'Thai Baht', 'veda-room' ),
				'TRY' => esc_html__( 'Turkish Lira', 'veda-room' ),
				'USD' => esc_html__( 'US Dollars', 'veda-room' ),
				'VND' => esc_html__( 'Vietnamese Dong', 'veda-room' ),
			)
		)
	);
}

/**
 * Get Currency symbol.
 * @param string $currency (default: '')
 * @return string
 */
function get_veda_hb_currency_symbol( $currency = '' ) {
	if ( ! $currency ) {
		$currency = get_option('veda_hb_currency');
	}

	switch ( $currency ) {
		case 'AED' :
			$currency_symbol = 'د.إ';
			break;
		case 'BDT':
			$currency_symbol = '&#2547;&nbsp;';
			break;
		case 'BRL' :
			$currency_symbol = '&#82;&#36;';
			break;
		case 'BGN' :
			$currency_symbol = '&#1083;&#1074;.';
			break;
		case 'AUD' :
		case 'CAD' :
		case 'CLP' :
		case 'MXN' :
		case 'NZD' :
		case 'HKD' :
		case 'SGD' :
		case 'USD' :
			$currency_symbol = '&#36;';
			break;
		case 'EUR' :
			$currency_symbol = '&euro;';
			break;
		case 'CNY' :
		case 'RMB' :
		case 'JPY' :
			$currency_symbol = '&yen;';
			break;
		case 'RUB' :
			$currency_symbol = '&#1088;&#1091;&#1073;.';
			break;
		case 'KRW' : $currency_symbol = '&#8361;'; break;
		case 'TRY' : $currency_symbol = '&#84;&#76;'; break;
		case 'NOK' : $currency_symbol = '&#107;&#114;'; break;
		case 'ZAR' : $currency_symbol = '&#82;'; break;
		case 'CZK' : $currency_symbol = '&#75;&#269;'; break;
		case 'MYR' : $currency_symbol = '&#82;&#77;'; break;
		case 'DKK' : $currency_symbol = 'kr.'; break;
		case 'HUF' : $currency_symbol = '&#70;&#116;'; break;
		case 'IDR' : $currency_symbol = 'Rp'; break;
		case 'INR' : $currency_symbol = 'Rs.'; break;
		case 'ISK' : $currency_symbol = 'Kr.'; break;
		case 'ILS' : $currency_symbol = '&#8362;'; break;
		case 'PHP' : $currency_symbol = '&#8369;'; break;
		case 'PLN' : $currency_symbol = '&#122;&#322;'; break;
		case 'SEK' : $currency_symbol = '&#107;&#114;'; break;
		case 'CHF' : $currency_symbol = '&#67;&#72;&#70;'; break;
		case 'TWD' : $currency_symbol = '&#78;&#84;&#36;'; break;
		case 'THB' : $currency_symbol = '&#3647;'; break;
		case 'GBP' : $currency_symbol = '&pound;'; break;
		case 'RON' : $currency_symbol = 'lei'; break;
		case 'VND' : $currency_symbol = '&#8363;'; break;
		case 'NGN' : $currency_symbol = '&#8358;'; break;
		case 'HRK' : $currency_symbol = 'Kn'; break;
		default    : $currency_symbol = ''; break;
	}

	return $currency_symbol;
}

/**
 * Get Unavailable Dates.
 * @param string room_id
 * @return string
 */
add_action("wp_ajax_veda_hbroom_unavailable_dates", "veda_hbroom_unavailable_dates");
function veda_hbroom_unavailable_dates() {
	$roomid = $_REQUEST['room_id'];
	
	if($roomid != NULL) {
		$availableoptions = get_option('hb_available_settings');
		$udates = $availableoptions[$roomid];
		
		if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
			echo $udates;
		} 
		else {
			header("Location: ".$_SERVER["HTTP_REFERER"]);
		}
		die(1);
	}
}

/**
 * Set Unavailable Dates.
 * @param string room_id & sel_dates
 * @return string
 */
add_action("wp_ajax_veda_hbroom_set_unavailable", "veda_hbroom_set_unavailable");
function veda_hbroom_set_unavailable() {
	$roomid = $_REQUEST['room_id'];
	$sdates = $_REQUEST['sdates'];
	
	if($roomid != NULL && $sdates != NULL) {
		$availableoptions = get_option('hb_available_settings');
		$udates = $availableoptions[$roomid];
		$udates = $udates.','.$sdates;
		$udates = explode(',', $udates);
		$udates = array_filter($udates);
		$udates = implode(',', $udates);
		$availableoptions[$roomid] = $udates;
		update_option('hb_available_settings', $availableoptions);
		
		if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
			echo $udates;
		} 
		else {
			header("Location: ".$_SERVER["HTTP_REFERER"]);
		}
		die(1);
	}
}

/**
 * Clear Unavailable Dates.
 * @param string room_id
 * @return string
 */
add_action("wp_ajax_veda_hbroom_clear_unavailable", "veda_hbroom_clear_unavailable");
function veda_hbroom_clear_unavailable() {
	$roomid = $_REQUEST['room_id'];
	
	if($roomid != NULL) {
		$alldates = get_option('hb_available_settings');
		unset($alldates[$roomid]);
		update_option('hb_available_settings', $alldates);
		
		if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
			echo '';
		} 
		else {
			header("Location: ".$_SERVER["HTTP_REFERER"]);
		}
		die(1);
	}
} ?>