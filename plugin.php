<?php
/*
Plugin Name: Install iPhone Apps
Plugin URI: http://www.github.com/suculent/
Description: Support for itms-services URL scheme for linking to iOS Enterprise App Installation Manifest
Version: 1.1
Author: Suculent
Author URI: http://www.github.com/suculent/yourls_ios_protocols
*/

// No direct call
if( !defined( 'YOURLS_ABSPATH' ) ) die();

// Hook our custom function into the 'is_allowed_protocol' event
yourls_add_filter( 'is_allowed_protocol', 'suculent_itms_protocols' );

// This applies for both iOS protocols, apps for iTunes listing and services for installation
function suculent_itms_protocols( $args ) {
	return array('itms-apps://', 'itms-services://');
}
