<?php
/*
 * Plugin Name: Easy Digital Downloads - Remove Product Notes For Specific Downloads
 * Description: Remove a download's product notes from showing on the purchase confirmation page, the admin email and also customer’s purchase receipt.
 * Author: Andrew Munro
 * Version: 1.0
 */

function sumobi_edd_remove_product_notes( $notes, $download_id ) {
	
	// enter the download IDs you'd like to exclude into this array 
	$downloads_to_exclude = array( 509, 104, 435 );

	if ( in_array( $download_id, $downloads_to_exclude ) ) {
		return false;
	}

	return $notes;
}
add_filter( 'edd_product_notes', 'sumobi_edd_remove_product_notes', 10, 2 );