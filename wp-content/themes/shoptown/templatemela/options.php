<?php
/** Adding TM Menu in admin panel. */
function shoptown_theme_setting_menu() {	
	add_theme_page( esc_html__('Theme Settings','shoptown'), esc_html__('TM Theme Settings','shoptown'), 'manage_options', 'tm_theme_settings', 'shoptown_theme_settings_page' );		
	add_theme_page( esc_html__('Hook Manager','shoptown'), esc_html__('TM Hook Manager','shoptown'), 'manage_options', 'tm_hook_manage', 'shoptown_hook_manage_page');	
}
?>