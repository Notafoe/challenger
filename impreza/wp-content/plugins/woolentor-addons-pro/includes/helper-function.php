<?php

// Exit if accessed directly
if( ! defined( 'ABSPATH' ) ) exit();

/**
* Options return
*/
function woolentor_get_option_pro( $option, $section, $default = '' ){
    $options = get_option( $section );
    if ( isset( $options[$option] ) ) {
        return $options[$option];
    }
    return $default;
}

function woolentor_get_option_text( $option, $section, $default = '' ){
    $options = get_option( $section );
    if ( isset( $options[$option] ) ) {
        if( !empty($options[$option]) ){
            return $options[$option];
        }
        return $default;
    }
    return $default;
}

/**
* Woocommerce Product last order id return
*/
function woolentor_get_last_order_id(){
    global $wpdb;
    $statuses = array_keys(wc_get_order_statuses());
    $statuses = implode( "','", $statuses );

    // Getting last Order ID (max value)
    $results = $wpdb->get_col( "
        SELECT MAX(ID) FROM {$wpdb->prefix}posts
        WHERE post_type LIKE 'shop_order'
        AND post_status IN ('$statuses')" 
    );
    return reset($results);
}


/**
* Add Inline CSS.
*/
function woolentor_styles_inline() {

    $containerwid = get_option( 'elementor_container_width', '1140' );
    if( $containerwid == 0 ){ $containerwid = '1140'; }

    $emptycartcss = $checkoutpagecss = $noticewrap = '';
    
    if ( class_exists( 'WooCommerce' ) ) {
        if ( WC()->cart->is_empty() ) {
            $emptycartcss = "
                .woolentor-page-template .woocommerce{
                    margin: 0 auto;
                    width: {$containerwid}px;
                }
            ";
        }
        if( is_checkout() ){
            $checkoutpagecss = "
               .woolentor-woocommerce-checkout .woocommerce-NoticeGroup, .woocommerce-error{
                    margin: 0 auto;
                    width: {$containerwid}px;
                } 
            ";
        }
    }

    $noticewrap = "
        .woocommerce-notices-wrapper{
            margin: 0 auto;
            width: {$containerwid}px;
        }
    ";

    $custom_css = "
        $emptycartcss
        $checkoutpagecss
        $noticewrap
        ";
    wp_add_inline_style( 'woolentor-widgets-pro', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'woolentor_styles_inline' );