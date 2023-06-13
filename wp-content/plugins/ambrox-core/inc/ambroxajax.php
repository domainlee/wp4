<?php
/**
 * @Packge     : CRTheme
 * @Version    : 1.0
 * @Author     : CRTheme
 * @Author URI : https://themeforest.net/user/domainlee/portfolio
 *
 */


// Blocking direct access
if( ! defined( 'ABSPATH' ) ) {
    exit;
}

function ambrox_core_essential_scripts( ) {
    wp_enqueue_script('ambrox-ajax',AMBROX_PLUGDIRURI.'assets/js/ambrox.ajax.js',array( 'jquery' ),'1.0',true);
    wp_localize_script(
    'ambrox-ajax',
    'ambroxajax',
        array(
            'action_url' => admin_url( 'admin-ajax.php' ),
            'nonce'	     => wp_create_nonce( 'ambrox-nonce' ),
        )
    );
}

add_action('wp_enqueue_scripts','ambrox_core_essential_scripts');


// ambrox Section subscribe ajax callback function
add_action( 'wp_ajax_ambrox_subscribe_ajax', 'ambrox_subscribe_ajax' );
add_action( 'wp_ajax_nopriv_ambrox_subscribe_ajax', 'ambrox_subscribe_ajax' );

function ambrox_subscribe_ajax( ){
  $apiKey = crtheme_opt('ambrox_subscribe_apikey');
  $listid = crtheme_opt('ambrox_subscribe_listid');
   if( ! wp_verify_nonce($_POST['security'], 'ambrox-nonce') ) {
    echo '<div class="alert alert-danger mt-2" role="alert">'.esc_html__('You are not allowed.', 'ambrox').'</div>';
   }else{
       if( !empty( $apiKey ) && !empty( $listid )  ){
           $MailChimp = new DrewM\MailChimp\MailChimp( $apiKey );

           $result = $MailChimp->post("lists/{$listid}/members",[
               'email_address'    => esc_attr( $_POST['sectsubscribe_email'] ),
               'status'           => 'subscribed',
           ]);
           if ($MailChimp->success()) {
               if( $result['status'] == 'subscribed' ){
                   echo '<div class="alert alert-success mt-2" role="alert">'.esc_html__('Thank you, you have been added to our mailing list.', 'ambrox').'</div>';
               }
           }elseif( $result['status'] == '400' ) {
               echo '<div class="alert alert-danger mt-2" role="alert">'.esc_html__('This Email address is already exists.', 'ambrox').'</div>';
           }else{
               echo '<div class="alert alert-danger mt-2" role="alert">'.esc_html__('Sorry something went wrong.', 'ambrox').'</div>';
           }
        }else{
           echo '<div class="alert alert-danger mt-2" role="alert">'.esc_html__('Apikey Or Listid Missing.', 'ambrox').'</div>';
        }
   }

   wp_die();

}