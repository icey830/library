<?php
/*
 * Plugin Name: Easy Digital Downloads - Download Archive Purchase Buttons
 * Description: Output purchase button below the content on download archive pages.
 * Author: EDD Team
 * Version: 1.0
 */

// remove original filter that adds purchase button below download content
remove_filter( 'the_content', 'edd_after_download_content' );

// add adjusted filter that includes "is_archive()"
function custom_edd_after_download_content( $content ) {
	global $post;

	if ( $post && $post->post_type == 'download' && ( is_singular( 'download' ) || is_archive( 'download' ) ) && is_main_query() && !post_password_required() ) {
		ob_start();
		do_action( 'edd_after_download_content', $post->ID );
		$content .= ob_get_clean();
	}
	return $content;
}
add_filter( 'the_content', 'custom_edd_after_download_content' );