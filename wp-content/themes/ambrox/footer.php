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
    *
    * Hook for Footer Content
    *
    * Hook ambrox_footer_content
    *
    * @Hooked ambrox_footer_content_cb 10
    *
    */
    do_action( 'ambrox_footer_content' );


    wp_footer();
    ?>
</body>
</html>