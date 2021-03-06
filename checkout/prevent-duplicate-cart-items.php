<?php

/*
 * Plugin Name: Easy Digital Downloads - Prevent Duplciate Cart Items
 * Description: Prevents the same item from being added to the cart multiple times.
 * Author: EDD Team
 * Version: 1.0
 */

function pw_edd_prevent_duplicate_cart_items( $download_id, $options ) {
	if( edd_item_in_cart( $download_id, $options ) ) {
		if( edd_is_ajax_enabled() && defined('DOING_AJAX') && DOING_AJAX ) {
			die('1');
		} else {
			wp_redirect( edd_get_checkout_uri() ); exit;
		}
	}
}
add_action( 'edd_pre_add_to_cart', 'pw_edd_prevent_duplicate_cart_items', 10, 2 );
