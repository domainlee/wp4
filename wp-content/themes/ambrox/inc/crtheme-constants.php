<?php
/**
 * @Packge     : CRTheme
 * @Version    : 1.0
 * @Author     : CRTheme
 * @Author URI : https://themeforest.net/user/domainlee/portfolio
 *
 */

// Block direct access
if ( !defined( 'ABSPATH' ) ) {
    exit;
}

/**
 *
 * Define constant
 *
 */

// Base URI
if ( ! defined( 'CRTHEME_DIR_URI' ) ) {
    define('CRTHEME_DIR_URI', get_parent_theme_file_uri().'/' );
}

// Assist URI
if ( ! defined( 'CRTHEME_DIR_ASSIST_URI' ) ) {
    define( 'CRTHEME_DIR_ASSIST_URI', get_theme_file_uri('/assets/') );
}


// Css File URI
if ( ! defined( 'CRTHEME_DIR_CSS_URI' ) ) {
    define( 'CRTHEME_DIR_CSS_URI', get_theme_file_uri('/assets/css/') );
}

// Skin Css File
if ( ! defined( 'CRTHEME_DIR_SKIN_CSS_URI' ) ) {
    define( 'CRTHEME_DIR_SKIN_CSS_URI', get_theme_file_uri('/assets/css/skins/') );
}


// Js File URI
if (!defined('CRTHEME_DIR_JS_URI')) {
    define('CRTHEME_DIR_JS_URI', get_theme_file_uri('/assets/js/'));
}


// External PLugin File URI
if (!defined('CRTHEME_DIR_PLUGIN_URI')) {
    define('CRTHEME_DIR_PLUGIN_URI', get_theme_file_uri( '/assets/plugins/'));
}

// Base Directory
if (!defined('CRTHEME_DIR_PATH')) {
    define('CRTHEME_DIR_PATH', get_parent_theme_file_path() . '/');
}

//Inc Folder Directory
if (!defined('CRTHEME_DIR_PATH_INC')) {
    define('CRTHEME_DIR_PATH_INC', CRTHEME_DIR_PATH . 'inc/');
}

//AMBROX framework Folder Directory
if (!defined('CRTHEME_DIR_PATH_FRAM')) {
    define('CRTHEME_DIR_PATH_FRAM', CRTHEME_DIR_PATH_INC . 'crtheme-framework/');
}

//Classes Folder Directory
if (!defined('CRTHEME_DIR_PATH_CLASSES')) {
    define('CRTHEME_DIR_PATH_CLASSES', CRTHEME_DIR_PATH_INC . 'classes/');
}

//Hooks Folder Directory
if (!defined('CRTHEME_DIR_PATH_HOOKS')) {
    define('CRTHEME_DIR_PATH_HOOKS', CRTHEME_DIR_PATH_INC . 'hooks/');
}

//Demo Data Folder Directory Path
if( !defined( 'CRTHEME_DEMO_DIR_PATH' ) ){
    define( 'CRTHEME_DEMO_DIR_PATH', CRTHEME_DIR_PATH_INC.'demo-data/' );
}
    
//Demo Data Folder Directory URI
if( !defined( 'CRTHEME_DEMO_DIR_URI' ) ){
    define( 'CRTHEME_DEMO_DIR_URI', CRTHEME_DIR_URI.'inc/demo-data/' );
}