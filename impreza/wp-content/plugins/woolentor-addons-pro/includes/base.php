<?php

namespace WooLentorPro;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
* Base
*/
class Base {

    private static $_instance = null;
    public static function instance() {
        if ( is_null( self::$_instance ) ) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function __construct() {
        if ( ! function_exists('is_plugin_active')){ include_once( ABSPATH . 'wp-admin/includes/plugin.php' ); }
        add_action( 'init', [ $this, 'i18n' ] );
        add_action( 'plugins_loaded', [ $this, 'init' ] );
        
        // Register Plugin Active Hook
        register_activation_hook( WOOLENTOR_ADDONS_PL_ROOT_PRO, [ $this, 'plugin_activate_hook'] );

    }

    /*
    * Load Text Domain
    */
    public function i18n() {
        load_plugin_textdomain( 'woolentor-pro', false, dirname( plugin_basename( WOOLENTOR_ADDONS_PL_ROOT_PRO ) ) . '/languages/' );
    }

    /*
    * Init Hook in Init
    */
    public function init() {

        // Check WooLentor Free version
        if( !is_plugin_active('woolentor-addons/woolentor_addons_elementor.php') ){
            add_action( 'admin_notices', [ $this, 'admin_notice_missing_main_plugin' ] );
            return;
        }

        // Include File
        $this->include_files();

        // After Active Plugin then redirect to setting page
        $this->plugin_redirect_option_page();

    }

    /**
     * Admin notice.
     * For missing elementor.
     */
    public function admin_notice_missing_main_plugin() {
        if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );
        $woolentor = 'woolentor-addons/woolentor_addons_elementor.php';
        if( $this->is_plugins_active( $woolentor ) ) {
            if( ! current_user_can( 'activate_plugins' ) ) {
                return;
            }
            $activation_url = wp_nonce_url( 'plugins.php?action=activate&amp;plugin=' . $woolentor . '&amp;plugin_status=all&amp;paged=1&amp;s', 'activate-plugin_' . $woolentor );
            $message = sprintf( __( '%1$sWooLentor Addons Pro%2$s requires WooLentor plugin to be active. Please activate WooLentor to continue.', 'woolentor-pro' ), '<strong>', '</strong>' );
            $button_text = esc_html__( 'Activate WooLentor', 'woolentor-pro' );
        } else {
            if( ! current_user_can( 'activate_plugins' ) ) {
                return;
            }
            $activation_url = wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=woolentor-addons' ), 'install-plugin_woolentor-addons' );
            $message = sprintf( __( ' %1$sWooLentor Addons Pro %2$s requires %1$s"WooLetor Addons"%2$s plugin to be installed and activated. Please install WooLentor to continue.', 'woolentor-pro' ), '<strong>', '</strong>' );
            $button_text = esc_html__( 'Install WooLentor', 'woolentor-pro' );
        }
        $button = '<p><a href="' . $activation_url . '" class="button-primary">' . $button_text . '</a></p>';
        printf( '<div class="error"><p>%1$s</p>%2$s</div>', $message, $button );

    }

    /*
    * Check Plugins is Installed or not
    */
    public function is_plugins_active( $pl_file_path = NULL ){
        $installed_plugins_list = get_plugins();
        return isset( $installed_plugins_list[$pl_file_path] );
    }

    /* 
    * Plugins After Install
    * Redirect Setting page
    */
    public function plugin_activate_hook() {
        add_option('woolentor_do_activation_redirect', TRUE);
    }
    public function plugin_redirect_option_page() {
        if ( get_option( 'woolentor_do_activation_redirect', FALSE ) ) {
            delete_option('woolentor_do_activation_redirect');
            if( !isset( $_GET['activate-multi'] ) ){
                wp_redirect( admin_url("admin.php?page=woolentor-pro") );
            }
        }
    }

    /*
    * Include File
    */
    public function include_files(){
        require( WOOLENTOR_ADDONS_PL_PATH_PRO.'includes/helper-function.php' );
        require( WOOLENTOR_ADDONS_PL_PATH_PRO.'classes/class.assest_management.php' );
        require( WOOLENTOR_ADDONS_PL_PATH_PRO.'classes/class.widgets_control.php' );
        require( WOOLENTOR_ADDONS_PL_PATH_PRO.'classes/class.my_account.php' );
        require( WOOLENTOR_ADDONS_PL_PATH_PRO.'includes/licence/WooLentorPro.php' );

        // Admin Setting file
        if( is_admin() ){
            require( WOOLENTOR_ADDONS_PL_PATH_PRO.'includes/custom-metabox.php' );
        }

        // Builder File
        if( woolentor_get_option_pro( 'enablecustomlayout', 'woolentor_woo_template_tabs', 'on' ) == 'on' ){
            include( WOOLENTOR_ADDONS_PL_PATH_PRO.'includes/wl_woo_shop.php' );
            if( !is_admin() && woolentor_get_option_pro( 'enablerenamelabel', 'woolentor_rename_label_tabs', 'off' ) == 'on' ){
                include( WOOLENTOR_ADDONS_PL_PATH_PRO.'includes/rename_label.php' );
            }
        }

        // Sale Notification
        if( woolentor_get_option_pro( 'enableresalenotification', 'woolentor_sales_notification_tabs', 'off' ) == 'on' ){
            if( woolentor_get_option_pro( 'notification_content_type', 'woolentor_sales_notification_tabs', 'actual' ) == 'fakes' ){
                include( WOOLENTOR_ADDONS_PL_PATH_PRO. 'includes/class.sale_notification_fake.php' );
            }else{
                include( WOOLENTOR_ADDONS_PL_PATH_PRO. 'includes/class.sale_notification.php' );
            }
        }

        // Single Product Sticky Add to Cart
        if( woolentor_get_option_pro( 'single_product_sticky_add_to_cart', 'woolentor_others_tabs', 'off' ) == 'on' ){
            require( WOOLENTOR_ADDONS_PL_PATH_PRO.'classes/class.extension.php' );
        }

    }


}