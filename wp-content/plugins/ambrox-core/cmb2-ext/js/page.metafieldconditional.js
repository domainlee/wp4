(function($){
    "use strict";
    
    let $ambrox_page_breadcrumb_area      = $("#_ambrox_page_breadcrumb_area");
    let $ambrox_page_settings             = $("#_ambrox_page_breadcrumb_settings");
    let $ambrox_page_breadcrumb_image     = $("#_ambrox_breadcumb_image");
    let $ambrox_page_title                = $("#_ambrox_page_title");
    let $ambrox_page_title_settings       = $("#_ambrox_page_title_settings");

    if( $ambrox_page_breadcrumb_area.val() == '1' ) {
        $(".cmb2-id--ambrox-page-breadcrumb-settings").show();
        if( $ambrox_page_settings.val() == 'global' ) {
            $(".cmb2-id--ambrox-breadcumb-image").hide();
            $(".cmb2-id--ambrox-page-title").hide();
            $(".cmb2-id--ambrox-page-title-settings").hide();
            $(".cmb2-id--ambrox-custom-page-title").hide();
            $(".cmb2-id--ambrox-page-breadcrumb-trigger").hide();
        } else {
            $(".cmb2-id--ambrox-breadcumb-image").show();
            $(".cmb2-id--ambrox-page-title").show();
            $(".cmb2-id--ambrox-page-breadcrumb-trigger").show();
    
            if( $ambrox_page_title.val() == '1' ) {
                $(".cmb2-id--ambrox-page-title-settings").show();
                if( $ambrox_page_title_settings.val() == 'default' ) {
                    $(".cmb2-id--ambrox-custom-page-title").hide();
                } else {
                    $(".cmb2-id--ambrox-custom-page-title").show();
                }
            } else {
                $(".cmb2-id--ambrox-page-title-settings").hide();
                $(".cmb2-id--ambrox-custom-page-title").hide();
    
            }
        }
    } else {
        $ambrox_page_breadcrumb_area.parents('.cmb2-id--ambrox-page-breadcrumb-area').siblings().hide();
    }


    // breadcrumb area
    $ambrox_page_breadcrumb_area.on("change",function(){
        if( $(this).val() == '1' ) {
            $(".cmb2-id--ambrox-page-breadcrumb-settings").show();
            if( $ambrox_page_settings.val() == 'global' ) {
                $(".cmb2-id--ambrox-breadcumb-image").hide();
                $(".cmb2-id--ambrox-page-title").hide();
                $(".cmb2-id--ambrox-page-title-settings").hide();
                $(".cmb2-id--ambrox-custom-page-title").hide();
                $(".cmb2-id--ambrox-page-breadcrumb-trigger").hide();
            } else {
                $(".cmb2-id--ambrox-breadcumb-image").show();
                $(".cmb2-id--ambrox-page-title").show();
                $(".cmb2-id--ambrox-page-breadcrumb-trigger").show();
        
                if( $ambrox_page_title.val() == '1' ) {
                    $(".cmb2-id--ambrox-page-title-settings").show();
                    if( $ambrox_page_title_settings.val() == 'default' ) {
                        $(".cmb2-id--ambrox-custom-page-title").hide();
                    } else {
                        $(".cmb2-id--ambrox-custom-page-title").show();
                    }
                } else {
                    $(".cmb2-id--ambrox-page-title-settings").hide();
                    $(".cmb2-id--ambrox-custom-page-title").hide();
        
                }
            }
        } else {
            $(this).parents('.cmb2-id--ambrox-page-breadcrumb-area').siblings().hide();
        }
    });

    // page title
    $ambrox_page_title.on("change",function(){
        if( $(this).val() == '1' ) {
            $(".cmb2-id--ambrox-page-title-settings").show();
            if( $ambrox_page_title_settings.val() == 'default' ) {
                $(".cmb2-id--ambrox-custom-page-title").hide();
            } else {
                $(".cmb2-id--ambrox-custom-page-title").show();
            }
        } else {
            $(".cmb2-id--ambrox-page-title-settings").hide();
            $(".cmb2-id--ambrox-custom-page-title").hide();

        }
    });

    //page settings
    $ambrox_page_settings.on("change",function(){
        if( $(this).val() == 'global' ) {
            $(".cmb2-id--ambrox-breadcumb-image").hide();
            $(".cmb2-id--ambrox-page-title").hide();
            $(".cmb2-id--ambrox-page-title-settings").hide();
            $(".cmb2-id--ambrox-custom-page-title").hide();
            $(".cmb2-id--ambrox-page-breadcrumb-trigger").hide();
        } else {
            $(".cmb2-id--ambrox-breadcumb-image").show();
            $(".cmb2-id--ambrox-page-title").show();
            $(".cmb2-id--ambrox-page-breadcrumb-trigger").show();
    
            if( $ambrox_page_title.val() == '1' ) {
                $(".cmb2-id--ambrox-page-title-settings").show();
                if( $ambrox_page_title_settings.val() == 'default' ) {
                    $(".cmb2-id--ambrox-custom-page-title").hide();
                } else {
                    $(".cmb2-id--ambrox-custom-page-title").show();
                }
            } else {
                $(".cmb2-id--ambrox-page-title-settings").hide();
                $(".cmb2-id--ambrox-custom-page-title").hide();
    
            }
        }
    });

    // page title settings
    $ambrox_page_title_settings.on("change",function(){
        if( $(this).val() == 'default' ) {
            $(".cmb2-id--ambrox-custom-page-title").hide();
        } else {
            $(".cmb2-id--ambrox-custom-page-title").show();
        }
    });
    
})(jQuery);