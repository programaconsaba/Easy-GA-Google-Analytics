<?php
/*
 * Plugin Name: Easy GA Google Analytics
 * Plugin URI: http://www.programaconsaba.com/easy-ga-google-analytics
 * Description: Copy&Paste your Google Analytics code snippet and enables google analytics on all pages. Only Anonymous users have analytics.
 * Version: 1.1.0
 * Author: Jose Antonio Sabalete
 * Author URI: http://www.programaconsaba.com/quienes-somos/
 * License: GNU Affero General Public License v3.0
 * License URI: https://www.gnu.org/licenses/agpl-3.0.html
 * Text Domain: easy-ga-google-analytics
 * Domain Path: /languages
 * Tags: google analytics, analytics, ga, google 
 */

if ( ! defined( 'WPINC' ) ) {
	exit();
}

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

/**
 * Esta funci�n escribe el script de Google Analytics guardado en Wordpress y lo coloca en la cabecera. 
 * Si el usuaior logado es un usuario con perfil administrador, el script no se a�ade por lo tanto la 
 * anal�tica no registra la visita.
 */
function easy_ga_custom() {
    global $current_user;
    $isAdmin = false;

    $user_roles = $current_user->roles;
    $user_role = array_shift($user_roles);

    if($user_role === "administrator"){
        $isAdmin = true;
    }

    if (!$isAdmin){
		echo stripslashes(get_option ( 'easy-ga-script-option' ) );
    }
}

// Se utiliza el hook wp_head para insertar c�digo en las etiquetas <head></head> de la plantilla del usuario
add_action('wp_head', 'easy_ga_custom');

function easy_ga_uninstall_hook() {
	delete_option ( 'easy-ga-script-option' );
	delete_site_option ( 'easy-ga-script-option' );
}

register_uninstall_hook (__FILE__, 'easy_ga_uninstall_hook');


// Internacionalizaci�n del plugin
function my_plugin_load_plugin_textdomain() {
	load_plugin_textdomain( 'easy-ga-google-analytics', FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );
}

add_action( 'plugins_loaded', 'my_plugin_load_plugin_textdomain' );
