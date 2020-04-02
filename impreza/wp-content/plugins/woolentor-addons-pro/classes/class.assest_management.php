<?php

namespace WooLentorPro;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
* Assest Management
*/
class Assets_Management{
    
    private static $instance = null;
    public static function instance() {
        if ( is_null( self::$instance ) ) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    function __construct(){
        $this->init();
    }

    public function init() {

        // Register Scripts
        add_action( 'wp_enqueue_scripts', [ $this, 'register_scripts' ] );

        // Frontend Scripts
        add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_frontend_scripts' ] );

    }
    
    // Register frontend scripts
    public function register_scripts(){
        
        // Register Css file
        wp_register_style(
            'woolentor-widgets-pro',
            WOOLENTOR_ADDONS_PL_URL_PRO . 'assets/css/woolentor-widgets-pro.css',
            array(),
            WOOLENTOR_VERSION_PRO
        );

        // Register JS file
        wp_register_script(
            'woolentor-widgets-scripts-pro',
            WOOLENTOR_ADDONS_PL_URL_PRO . 'assets/js/woolentor-widgets-active-pro.js',
            array('jquery'),
            WOOLENTOR_VERSION_PRO,
            TRUE
        );

    }

    // Enqueue frontend scripts
    public function enqueue_frontend_scripts() {
        
        // CSS File
        wp_enqueue_style( 'woolentor-widgets-pro' );
        wp_enqueue_style( 'woolentor-animate', WOOLENTOR_ADDONS_PL_URL_PRO . 'assets/css/animate.css', WOOLENTOR_VERSION_PRO );

        // JS File
        wp_enqueue_script( 'woolentor-mainjs', WOOLENTOR_ADDONS_PL_URL_PRO . 'assets/js/main.js', array('jquery'), WOOLENTOR_VERSION_PRO, TRUE );

    }


}

Assets_Management::instance();