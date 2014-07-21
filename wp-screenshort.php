<?php
/*
Plugin Name: Web Screenshort 
Plugin URI: http://www.wp-developer.net/web-screenshort
Description: Easily take dynamic screenshots of a website
Author: Aijaz Mohammad
Version: 1.0
Author URI: http://www.wp-developer.net
Tags: mshots, pagepix, shrink the web, snapshot, stw, thumbshot, webshot, website preview, website screenshot, website thumbnail, websnapr
*/

/*
/*[web-screenshort url="http://www.facebook.com/" width="500" height="400" alt="Aijaz an exprience Wordpress Developer"]
*/
function wp_dev_shortcode( $atts ) {

	// Attributes
	extract( shortcode_atts(
		array(
			'url' => 'http://www.wp-developer.net/',
			'width' => '500',
			'height' => '400',
			'alt' => 'Aijaz an exprience Wordpress Developer',
		), $atts )
	);

	// Code
		 return '<img src="http://api.webthumbnail.org?width='.$width.'&height='.$height.'&screen=1024&url='.$url.'" alt="'.$alt.'" />';
}
add_shortcode( 'web-screenshort', 'wp_dev_shortcode' );


add_action( 'admin_head', 'wp_add_tinymce' );
function wp_add_tinymce() {
    global $typenow;

    // only on Post Type: post and page
    if( ! in_array( $typenow, array( 'post', 'page' ) ) )
        return ;

    add_filter( 'mce_external_plugins', 'wp_add_tinymce_plugin' );
    // Add to line 1 form WP TinyMCE
    add_filter( 'mce_buttons', 'wp_add_tinymce_button' );
}

// inlcude the js for tinymce
function wp_add_tinymce_plugin( $plugin_array ) {

    $plugin_array['wp_test'] = plugins_url( '/plugin.js', __FILE__ );
    // Print all plugin js path
    //var_dump( $plugin_array );
    return $plugin_array;
}

// Add the button key for address via JS
function wp_add_tinymce_button( $buttons ) {

    array_push( $buttons, 'wp_test_button_key' );
    // Print all buttons
   //var_dump( $buttons );
    return $buttons;
}