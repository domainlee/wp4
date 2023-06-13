<?php
/**
 * @Packge     : CRTheme
 * @Version    : 1.0
 * @Author     : CRTheme
 * @Author URI : https://themeforest.net/user/domainlee/portfolio
 *
 */

// Block direct access
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Include File
 *
 */

// Constants
require_once get_parent_theme_file_path() . '/inc/crtheme-constants.php';

//theme setup
require_once CRTHEME_DIR_PATH_INC . 'theme-setup.php';

//essential scripts
require_once CRTHEME_DIR_PATH_INC . 'essential-scripts.php';

//NavWalker
require_once CRTHEME_DIR_PATH_INC . 'crtheme-navwalker.php';

// plugin activation
require_once CRTHEME_DIR_PATH_FRAM . 'plugins-activation/crtheme-active-plugins.php';

// meta options
require_once CRTHEME_DIR_PATH_FRAM . 'crtheme-meta/crtheme-config.php';

// page breadcrumbs
require_once CRTHEME_DIR_PATH_INC . 'crtheme-breadcrumbs.php';

// sidebar register
require_once CRTHEME_DIR_PATH_INC . 'crtheme-widgets-reg.php';

//essential functions
require_once CRTHEME_DIR_PATH_INC . 'ambrox-functions.php';

// theme dynamic css
require_once CRTHEME_DIR_PATH_INC . 'ambrox-commoncss.php';

// helper function
require_once CRTHEME_DIR_PATH_INC . 'wp-html-helper.php';

// Demo Data
require_once CRTHEME_DEMO_DIR_PATH . 'demo-import.php';

// ambrox options
require_once CRTHEME_DIR_PATH_FRAM . 'ambrox-options/ambrox-options.php';

// hooks
require_once CRTHEME_DIR_PATH_HOOKS . 'hooks.php';

// hooks funtion
require_once CRTHEME_DIR_PATH_HOOKS . 'hooks-functions.php';