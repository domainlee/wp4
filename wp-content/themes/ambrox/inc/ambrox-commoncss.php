<?php
// Block direct access
if( !defined( 'ABSPATH' ) ){
    exit();
}
/**
 * @Packge     : CRTheme
 * @Version    : 1.0
 * @Author     : CRTheme
 * @Author URI : https://themeforest.net/user/domainlee/portfolio
 *
 */

// enqueue css
function ambrox_common_custom_css(){
	wp_enqueue_style( 'ambrox-color-schemes', get_template_directory_uri().'/assets/css/color.schemes.css' );

    $CustomCssOpt  = crtheme_opt( 'ambrox_css_editor' );
    $preloader_display  =  crtheme_opt('ambrox_display_preloader');
	if( $CustomCssOpt ){
		$CustomCssOpt = $CustomCssOpt;
	}else{
		$CustomCssOpt = '';
	}

    $customcss = "";
    
    if( get_header_image() ){
        $ambrox_header_bg =  get_header_image();
    }else{
        if( ambrox_meta( 'page_breadcrumb_settings' ) == 'page' && is_page() ){
            if( ! empty( ambrox_meta( 'breadcumb_image' ) ) ){
                $ambrox_header_bg = ambrox_meta( 'breadcumb_image' );
            }
        }
    }
    
    if( !empty( $ambrox_header_bg ) ){
        $customcss .= ".breadcrumb-area{
            background:url('{$ambrox_header_bg}')!important;
            background-position: center center !important;
            background-size: cover !important;
        }";
    }



    if( ! empty( ambrox_meta( 'page_bg_image' ) ) ){
        $page_bg_image = ambrox_meta( 'page_bg_image' );
    }

    if( !empty( $page_bg_image ) ){
        $customcss .= ".custom-page-bg{
            background:url('{$page_bg_image}')!important;
            background-attachment: fixed !important;
            background-position: center center !important;
            background-size: cover !important;
        }";
    }

    if( !empty( $preloader_display ) ){
        $ambrox_pre_img = crtheme_opt( 'ambrox_preloader_img','url' );
        if( ! empty( crtheme_opt( 'ambrox_preloader_img','url' ) ) ){
            $customcss .= ".se-pre-con{
                background:url('{$ambrox_pre_img}')!important;
                text-align: center;
                position: absolute;
                left: 50%;
                top: 50%;
                -webkit-transform: translate(-50%, -50%);
                transform: translate(-50%, -50%);
                text-align: center;
                line-height: 1;
                width: 96px;
                height: 48px;
                display: inline-block;
                position: relative;
                background: #fff;
                border-radius: 48px 48px 0 0;
                -webkit-box-sizing: border-box;
                box-sizing: border-box;
                overflow: hidden;
                            }";
        }
    }
    
	// theme color
	$ambroxthemecolor = crtheme_opt('ambrox_theme_color');

    list($r, $g, $b) = sscanf( $ambroxthemecolor, "#%02x%02x%02x");

    $ambrox_real_color = $r.','.$g.','.$b;
	if( !empty( $ambroxthemecolor ) ) {
		$customcss .= ":root {
		  --color-primary: rgb({$ambrox_real_color});
		}";
	}

	if( !empty( $CustomCssOpt ) ){
		$customcss .= $CustomCssOpt;
	}

    wp_add_inline_style( 'ambrox-color-schemes', $customcss );
}
add_action( 'wp_enqueue_scripts', 'ambrox_common_custom_css', 100 );