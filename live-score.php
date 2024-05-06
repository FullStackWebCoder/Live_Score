<?php
/*
 * Plugin Name: Live Score
 * Description: This ia a Employee Management System
 * Plugin URI: https://example.com/
 * Author: User
 * Author URI: https://example.com/
 * Version: 1.0
 * Requires at least: 6.3.2
 * Requires PHP: 7.4
*/

define("EMS_PLUGIN_PATH",plugin_dir_path(__FILE__));

add_action("admin_menu","cp_add_admin_menu");

function cp_add_admin_menu(){
    add_menu_page("Employee Management System","Live Score","manage_options","ems-live-score","ems_live_score","dashicons-admin-home",23);

    add_submenu_page("ems-system","Live Score","Live Score","manage_options","ems-live-score","ems_live_score");
}

function ems_live_score(){
    include_once(EMS_PLUGIN_PATH."pages/live_score.php");
}