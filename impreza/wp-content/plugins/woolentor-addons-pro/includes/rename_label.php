<?php
/*
* Shop Page
*/

// Add to Cart Button Text
add_filter( 'woocommerce_product_add_to_cart_text', 'woolentor_custom_add_cart_button_shop_page', 99, 2 );
function woolentor_custom_add_cart_button_shop_page( $label ) {
   return __( woolentor_get_option_text( 'wl_shop_add_to_cart_txt', 'woolentor_rename_label_tabs', 'Add to Cart' ), 'woolentor-pro' );
}

/*
* Product Details Page
*/

// Add to Cart Button Text
add_filter( 'woocommerce_product_single_add_to_cart_text', 'woolentor_custom_add_cart_button_single_product' );
function woolentor_custom_add_cart_button_single_product( $label ) {
   return __( woolentor_get_option_text( 'wl_add_to_cart_txt', 'woolentor_rename_label_tabs', 'Add to Cart' ), 'woolentor-pro' );
}

//Description tab
add_filter( 'woocommerce_product_description_tab_title', 'woolentor_rename_description_product_tab_label' );
function woolentor_rename_description_product_tab_label() {
    return __( woolentor_get_option_text( 'wl_description_tab_menu_title', 'woolentor_rename_label_tabs', 'Description' ), 'woolentor-pro' );
}

add_filter( 'woocommerce_product_description_heading', 'woolentor_rename_description_tab_heading' );
function woolentor_rename_description_tab_heading() {
    return __( woolentor_get_option_text( 'wl_description_tab_menu_title', 'woolentor_rename_label_tabs', 'Description' ), 'woolentor-pro' );
}

//Additional Info tab
add_filter( 'woocommerce_product_additional_information_tab_title', 'woolentor_rename_additional_information_product_tab_label' );
function woolentor_rename_additional_information_product_tab_label() {
    return __( woolentor_get_option_text( 'wl_additional_information_tab_menu_title', 'woolentor_rename_label_tabs','Additional Information' ), 'woolentor-pro' );
}

add_filter( 'woocommerce_product_additional_information_heading', 'woolentor_rename_additional_information_tab_heading' );
function woolentor_rename_additional_information_tab_heading() {
    return __( woolentor_get_option_text( 'wl_additional_information_tab_menu_title', 'woolentor_rename_label_tabs','Additional Information' ), 'woolentor-pro' );
}

//Reviews Info tab
add_filter( 'woocommerce_product_reviews_tab_title', 'woolentor_rename_reviews_product_tab_label' );
function woolentor_rename_reviews_product_tab_label() {
    return __( woolentor_get_option_text( 'wl_reviews_tab_menu_title', 'woolentor_rename_label_tabs','Reviews' ), 'woolentor-pro');
}


/*
* Checkout Page
*/

// Field Name change
add_filter( 'woocommerce_default_address_fields' , 'woolentor_rename_field_name', 9999 );
function woolentor_rename_field_name( $fields ) {
    $fields['first_name']['label'] = __( woolentor_get_option_text( 'wl_checkout_firstname_label', 'woolentor_rename_label_tabs', 'First name' ), 'woolentor-pro' );
    $fields['last_name']['label'] = __( woolentor_get_option_text( 'wl_checkout_lastname_label', 'woolentor_rename_label_tabs', 'Last name' ), 'woolentor-pro');
    $fields['company']['label'] = __( woolentor_get_option_text( 'wl_checkout_company_label', 'woolentor_rename_label_tabs', 'Company name' ),'woolentor-pro');
    $fields['address_1']['label'] = __( woolentor_get_option_text( 'wl_checkout_address_1_label', 'woolentor_rename_label_tabs', 'Street address' ),'woolentor-pro');
    $fields['address_2']['label'] = __( woolentor_get_option_text( 'wl_checkout_address_2_label', 'woolentor_rename_label_tabs', 'Address Optional' ),'woolentor-pro');
    $fields['city']['label'] = __( woolentor_get_option_text( 'wl_checkout_city_label', 'woolentor_rename_label_tabs', 'Town / City' ),'woolentor-pro');
    $fields['postcode']['label'] = __( woolentor_get_option_text( 'wl_checkout_postcode_label', 'woolentor_rename_label_tabs', 'Postcode / ZIP' ),'woolentor-pro');
    $fields['state']['label'] = __( woolentor_get_option_text( 'wl_checkout_state_label', 'woolentor_rename_label_tabs', 'State' ),'woolentor-pro');

    return $fields;
}
// Change Phone and Email
add_filter( 'woocommerce_checkout_fields' , 'woolentor_checkout_fields' );
function woolentor_checkout_fields ( $fields ) {
    $fields['billing']['billing_phone']['label'] = __( woolentor_get_option_text( 'wl_checkout_phone_label', 'woolentor_rename_label_tabs', 'Phone' ),'woolentor-pro');
    $fields['billing']['billing_email']['label'] = __( woolentor_get_option_text( 'wl_checkout_email_label', 'woolentor_rename_label_tabs', 'Email address' ),'woolentor-pro');
    $fields['billing']['billing_country']['label'] = __( woolentor_get_option_text( 'wl_checkout_country_label', 'woolentor_rename_label_tabs', 'Country' ),'woolentor-pro');
    $fields['billing']['billing_state']['label'] = __( woolentor_get_option_text( 'wl_checkout_state_label', 'woolentor_rename_label_tabs', 'State' ),'woolentor-pro');
    $fields['shipping']['shipping_country']['label'] = __( woolentor_get_option_text( 'wl_checkout_country_label', 'woolentor_rename_label_tabs', 'Country' ),'woolentor-pro');
    $fields['shipping']['shipping_state']['label'] = __( woolentor_get_option_text( 'wl_checkout_state_label', 'woolentor_rename_label_tabs', 'State' ),'woolentor-pro');
    $fields['order']['order_comments']['label'] = __( woolentor_get_option_text( 'wl_checkout_ordernote_label', 'woolentor_rename_label_tabs', 'Order notes' ),'woolentor-pro');

    return $fields;
}

add_filter( 'woocommerce_order_button_text', 'woolentor_rename_place_order_button' );
function woolentor_rename_place_order_button() {
   return __( woolentor_get_option_text( 'wl_checkout_placeorder_btn_txt', 'woolentor_rename_label_tabs','Place order' ), 'woolentor-pro');
}