<?php
/*
Plugin Name: Privacy Notice
Plugin URI: http://geekoutwith.me/check-yoself
Description: This plugin simply adds a notice in the admin bar if search engines are not enabled. This plugin helps you check yo'self before you wreck yo'self. If the label is orange, change it before you launch that site!
Version: 1.0
Author: Joseph Hinson
Author URI: http://geekoutwith.me

    Copyright 2012 - Joseph Hinson  (email : josephhinson@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

*/

// adds the very simple alert text to the admin bar, with a link to the 
function robots_notice_admin_bar_render() {
	global $wp_admin_bar;
	if (get_option('blog_public') == 0) {
		$wp_admin_bar->add_menu( array(
			'parent' => false, // use 'false' for a root menu, or pass the ID of the parent menu
			'id' => 'robots-alert', // link ID, defaults to a sanitized title value
			'title' => __('This site is invisible to search engines.'), // link title
			'href' => admin_url( 'options-privacy.php' ), // name of file
		));
	}
}
add_action( 'wp_before_admin_bar_render', 'robots_notice_admin_bar_render' );

// adding the styles to both the front-end and back-end.
add_action('wp_head', 'robots_notice_css');
add_action('admin_head', 'robots_notice_css');

// this function creates the uber-simple CSS that ONLY targets the robots alert link
function robots_notice_css() { ?>
<style type="text/css" media="screen">
	#wp-admin-bar-robots-alert a {
	    color: #CCA300 !important;
	    text-transform: uppercase;
	    text-shadow: 1px 1px 0 #000;
	}
</style>
<? } ?>