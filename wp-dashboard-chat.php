<?php
/*
Plugin Name: WP Dashboard Chat
Plugin URI: http://nicholasbosch.com/wp-dashboard-chat
Description: WP Dashboard Chat is a Twitter inspired widget, which displays on the admin dashboard. It allows for quick communication between users and admins.
Version: 1.1
Author: Nicholas Bosch
Author URI: http://nicholasbosch.com/
License: GPLv2 or Later

	Copyright 2011  Nicholas Bosch  (email : nick@boschdesign.com.au)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

require_once( "inc/settings.php" );
require_once( "inc/core.php" );

class WPDashboardChat {
	
	function __construct() {
	
		register_activation_hook(__FILE__, array('WPDashboardChatInit', 'activate'));	
		register_deactivation_hook(__FILE__, array('WPDashboardChatInit', 'deactivate'));	
		register_uninstall_hook(__FILE__, array('WPDashboardChatInit', 'uninstall'));	
	
		add_action('wp_dashboard_setup', array('WPDashboardChat', 'widget'));
		add_action('wp_ajax_dashboard_chat', array('WPDashboardChat', 'ajax'));
		
	}

	public static function activate() {
		
	}
	
	public static function deactivate() {
		
	}
	
	public static function uninstall() {
		
	}
	
	public static function widget() {
		new WPDashboardChatCore;
	}
	
	public static function ajax() {
		new WPDashboardChatCore(true);
	}
}

new WPDashboardChat;
new WPDashboardChatOptions;

?>