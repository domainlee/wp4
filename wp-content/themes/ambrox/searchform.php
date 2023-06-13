<?php
/**
 * @Packge     : CRTheme
 * @Version    : 1.0
 * @Author     : CRTheme
 * @Author URI : https://themeforest.net/user/domainlee/portfolio
 *
 */

    // Block direct access
    if( !defined( 'ABSPATH' ) ){
        exit();
    }
?>

<form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>" class="search-form">
    <input name="s" required value="<?php echo esc_html( get_search_query() ); ?>" type="search" class="form-control" placeholder="<?php echo esc_attr__( 'Search Here', 'ambrox' ); ?>">
    <button type="submit" class="submit-btn"><i class="fal fa-search"></i></button>
</form>