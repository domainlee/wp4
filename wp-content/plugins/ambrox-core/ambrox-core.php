<?php

// Blocking direct access
if( ! defined( 'ABSPATH' ) ) {
   exit();
}

/**
 * Plugin Name: Ambrox Core
 * Description: This is a helper plugin of ambrox theme
 * Version:     1.0
 * Author:      Validthemes
 * Author URI:  https://themeforest.net/user/domainlee/portfolio
 * License:     GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Domain Path: /languages
 * Text Domain: ambrox
 */

// Define Constant
define( 'AMBROX_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'AMBROX_PLUGIN_INC_PATH', plugin_dir_path( __FILE__ ) . 'inc/' );
define( 'AMBROX_PLUGIN_CMB2EXT_PATH', plugin_dir_path( __FILE__ ) . 'cmb2-ext/' );
define( 'AMBROX_PLUGIN_WIDGET_PATH', plugin_dir_path( __FILE__ ) . 'inc/widgets/' );
define( 'AMBROX_PLUGDIRURI', plugin_dir_url( __FILE__ ) );
define( 'AMBROX_ADDONS', plugin_dir_path( __FILE__ ) .'addons/' );
define( 'AMBROX_CORE_PLUGIN_TEMP', plugin_dir_path( __FILE__ ) .'ambrox-template/' );

// load textdomain
load_plugin_textdomain( 'ambrox', false, basename( dirname( __FILE__ ) ) . '/languages' );

//include file.
require_once AMBROX_PLUGIN_INC_PATH .'ambroxcore-functions.php';
require_once AMBROX_PLUGIN_INC_PATH . 'MCAPI.class.php';
require_once AMBROX_PLUGIN_INC_PATH .'ambroxajax.php';
require_once AMBROX_PLUGIN_INC_PATH .'builder/builder.php';

require_once AMBROX_PLUGIN_CMB2EXT_PATH . 'cmb2ext-init.php';

//Widget
require_once AMBROX_PLUGIN_WIDGET_PATH . 'recent-post-widget.php';
// require_once AMBROX_PLUGIN_WIDGET_PATH . 'gallery-widget.php';
require_once AMBROX_PLUGIN_WIDGET_PATH . 'ambrox-about-widget.php';
require_once AMBROX_PLUGIN_WIDGET_PATH . 'ambrox-contact-widget.php';
require_once AMBROX_PLUGIN_WIDGET_PATH . 'ambrox-download-button-widget.php';
require_once AMBROX_PLUGIN_WIDGET_PATH . 'ambrox-cta-widget.php';

//addons
require_once AMBROX_ADDONS . 'addons.php';