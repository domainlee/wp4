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
if( class_exists( 'ReduxFramework' ) ){
    get_template_part( 'templates/blog-style-one' );
}else{
    get_template_part( 'templates/blog-style-one' );
}