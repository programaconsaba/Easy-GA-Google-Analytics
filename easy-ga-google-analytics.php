<?php
/*
 * Plugin Name: Easy GA Google Analytics
 * Plugin URI: http://www.programaconsaba.com/easy-ga-google-analytics
 * Description: Copy&Paste your Google Analytics code snippet and enables google analytics on all pages. Only Anonymous users have analytics.
 * Version: 1.0.0-SNAPSHOT
 * Author: Jose Antonio Sabalete
 * Author URI: http://www.programaconsaba.com/quienes-somos/
 * License: GNU Affero General Public License v3.0
 * License URI: https://www.gnu.org/licenses/agpl-3.0.html
 * Text Domain: easy-ga
 * Domain Path: /languages
 * Tags: google analytics, analytics, ga, google 
 */

/**
 * Funci�n que a�ade una nueva opci�n en el submen� de manage_options (Settings/Ajustes)
 */
function easy_ga_init () {
	add_options_page( 'Easy GA Google Analytics', 'Easy Google Analytics', 'manage_options', 'easy_ga_admin', 'easy_ga_load_page');
}

/**
 * Esta funci�n es invocada desde add_options_page y carga una p�gina dentro del panel de administraci�n
 */
function easy_ga_load_page () {
	$page = filter_input( INPUT_GET, 'page' );

	require_once( plugin_dir_path( __FILE__ ) . 'admin/' . $page . '.php');
}

// Se utiliza el hook admin_menu para a�adir men�s y submen�s extra en el panel de administraci�n.
add_action( 'admin_menu', 'easy_ga_init' );