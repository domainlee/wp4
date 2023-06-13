<?php
// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
    exit( );
}
/**
 * @Packge    : ambrox
 * @version   : 1.0
 * @Author    : Ambrox
 * @Author URI: https://themeforest.net/user/domainlee/portfolio
 */

// demo import file
function ambrox_import_files() {

	$demoImg = '<img src="'. CRTHEME_DEMO_DIR_URI  .'screen-image.jpg" alt="'.esc_attr__('Demo Preview Imgae','ambrox').'" />';

    return array(
        array(
            'import_file_name'             => esc_html__('Ambrox Demo','ambrox'),
            'local_import_file'            =>  CRTHEME_DEMO_DIR_PATH  . 'ambrox-demo.xml',
            'local_import_widget_file'     =>  CRTHEME_DEMO_DIR_PATH  . 'ambrox-widgets-demo.json',
            'local_import_redux'           => array(
                array(
                    'file_path'   =>  CRTHEME_DEMO_DIR_PATH . 'redux_options_demo.json',
                    'option_name' => 'ambrox_opt',
                ),
            ),
            'import_notice' => $demoImg,
        ),
    );
}
add_filter( 'pt-ocdi/import_files', 'ambrox_import_files' );

// demo import setup
function ambrox_after_import_setup() {
	// Assign menus to their locations.
	$main_menu   = get_term_by( 'name', 'Main Menu', 'nav_menu' );
	$footer_menu   = get_term_by( 'name', 'Footer Menu', 'nav_menu' );

	set_theme_mod( 'nav_menu_locations', array(
			'primary-menu'   	=> $main_menu->term_id,
			'footer-menu'   	=> $footer_menu->term_id,
		)
	);

	// Assign front page and posts page (blog page).
	$front_page_id 	= get_page_by_title( 'Portfolio Light' );
	$blog_page_id  	= get_page_by_title( 'Blog' );

	update_option( 'show_on_front', 'page' );
	update_option( 'page_on_front', $front_page_id->ID );
	update_option( 'page_for_posts', $blog_page_id->ID );
}
add_action( 'pt-ocdi/after_import', 'ambrox_after_import_setup' );


//disable the branding notice after successful demo import
add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );

//change the location, title and other parameters of the plugin page
function ambrox_import_plugin_page_setup( $default_settings ) {
	$default_settings['parent_slug'] = 'themes.php';
	$default_settings['page_title']  = esc_html__( 'Ambrox Demo Import' , 'ambrox' );
	$default_settings['menu_title']  = esc_html__( 'Import Demo Data' , 'ambrox' );
	$default_settings['capability']  = 'import';
	$default_settings['menu_slug']   = 'ambrox-demo-import';

	return $default_settings;
}
add_filter( 'pt-ocdi/plugin_page_setup', 'ambrox_import_plugin_page_setup' );

// Enqueue scripts
function ambrox_demo_import_custom_scripts(){
	if( isset( $_GET['page'] ) && $_GET['page'] == 'ambrox-demo-import' ){
		// style
		wp_enqueue_style( 'ambrox-demo-import', CRTHEME_DEMO_DIR_URI.'css/ambrox.demo.import.css', array(), '1.0', false );
	}
}
add_action( 'admin_enqueue_scripts', 'ambrox_demo_import_custom_scripts' );