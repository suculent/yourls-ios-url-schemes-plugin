<?php
/*
Plugin Name: iOS URL Schemes
Plugin URI: https://github.com/suculent/yourls-ios-url-schemes-plugin
Description: Support for itms-services URL scheme for linking to iOS Enterprise App Installation Manifest
Version: 1.3.1
Author: Suculent
Author URI: http://www.github.com/suculent/
*/

// No direct call
if( !defined( 'YOURLS_ABSPATH' ) ) die();

/* Filter hook
 * 
 * This plugin hooks as a is_allowed_protocol filter. 
 */

yourls_add_filter( 'is_allowed_protocol', 'suculent_itms_protocols' );

/* Filter implementation
 * 
 * This applies for both iOS protocols, apps for iTunes listing and services for installation. When the
 * $url contains (e.g. starts with) supported protocol string. Returns true for supported protocols.
 */

function suculent_itms_protocols( $args, $url ) {
	/* List of protocols added by this plugin */
	$protocols = array( 'itms-services://', 'itms-apps://', 'http://', 'https://');
	
	/* Walk through the list and check if URL starts with one of known protocols. */
	foreach ( $protocols as $protocol ) {	
		if ( suculent_starts_with( $url, $protocol ) === TRUE ) return true;
	}
	
	/* None of protocols supported by this plugin has been found in the URL */
	return false;
} 

/* Convenience function
 * 
 * Returns true if $haystack starts with $needle. Funny name comes from naming conventions.
 */

function suculent_starts_with( $haystack, $needle )
{
    return !strncmp( $haystack, $needle, strlen( $needle ) );
}
?>
