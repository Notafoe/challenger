<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Woolentor_Universal_Cross_Sell_Product_Layout_Widget extends Widget_Base {

    public function get_name() {
        return 'woolentor-cross-sell-product-custom';
    }
    
    public function get_title() {
        return __( 'WL: Cross Sell Product layout ( Custom ) ', 'woolentor-pro' );
    }

    public function get_icon() {
        return 'eicon-cart-light';
    }
    
    public function get_categories() {
        return [ 'woolentor-addons-pro' ];
    }

    public function get_script_depends() {
        return [
            'slick',
            'countdown-min',
            'woolentor-widgets-scripts',
        ];
    }

    protected function _register_controls() {

        // Product Content
        $this->start_controls_section(
            'woolentor-products-layout-setting',
            [
                'label' => esc_html__( 'Layout Settings', 'woolentor-pro' ),
            ]
        );
            
            $this->add_control(
                'cross_sell_product_title',
                [
                    'label' => __( 'Title', 'woolentor-pro' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => __( 'You may be interested in…', 'woolentor-pro' ),
                    'placeholder' => __( 'Type your title here', 'woolentor-pro' ),
                ]
            );

            $this->add_control(
                'product_layout_style',
                [
                    'label'   => __( 'Layout', 'woolentor-pro' ),
                    'type'    => Controls_Manager::SELECT,
                    'default' => 'default',
                    'options' => [
                        'slider'   => __( 'Slider', 'woolentor-pro' ),
                        'tab'      => __( 'Tab', 'woolentor-pro' ),
                        'default'  => __( 'Default', 'woolentor-pro' ),
                    ]
                ]
            );

            $this->add_control(
                'woolentor_product_grid_column',
                [
                    'label' => esc_html__( 'Columns', 'woolentor-pro' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => '4',
                    'options' => [
                        '1' => esc_html__( '1', 'woolentor-pro' ),
                        '2' => esc_html__( '2', 'woolentor-pro' ),
                        '3' => esc_html__( '3', 'woolentor-pro' ),
                        '4' => esc_html__( '4', 'woolentor-pro' ),
                        '5' => esc_html__( '5', 'woolentor-pro' ),
                        '6' => esc_html__( '6', 'woolentor-pro' ),
                    ],
                    'condition' => [
                        'product_layout_style!' => 'slider',
                    ]
                ]
            );

            $this->add_control(
                'woolentor_product_grid_column_tablet',
                [
                    'label' => esc_html__( 'Tablet Columns', 'woolentor-pro' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => '2',
                    'options' => [
                        '1' => esc_html__( '1', 'woolentor-pro' ),
                        '2' => esc_html__( '2', 'woolentor-pro' ),
                        '3' => esc_html__( '3', 'woolentor-pro' ),
                        '4' => esc_html__( '4', 'woolentor-pro' ),
                        '5' => esc_html__( '5', 'woolentor-pro' ),
                        '6' => esc_html__( '6', 'woolentor-pro' ),
                    ],
                    'condition' => [
                        'product_layout_style!' => 'slider',
                    ]
                ]
            );

            $this->add_control(
                'woolentor_product_grid_column_mobile',
                [
                    'label' => esc_html__( 'Mobile Columns', 'woolentor-pro' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => '1',
                    'options' => [
                        '1' => esc_html__( '1', 'woolentor-pro' ),
                        '2' => esc_html__( '2', 'woolentor-pro' ),
                        '3' => esc_html__( '3', 'woolentor-pro' ),
                        '4' => esc_html__( '4', 'woolentor-pro' ),
                        '5' => esc_html__( '5', 'woolentor-pro' ),
                        '6' => esc_html__( '6', 'woolentor-pro' ),
                    ],
                    'condition' => [
                        'product_layout_style!' => 'slider',
                    ]
                ]
            );

        $this->end_controls_section();

        $this->start_controls_section(
            'woolentor-products',
            [
                'label' => esc_html__( 'Query Settings', 'woolentor-pro' ),
            ]
        );

            $this->add_control(
              'woolentor_product_grid_products_count',
                [
                    'label'   => __( 'Product Limit', 'woolentor-pro' ),
                    'type'    => Controls_Manager::NUMBER,
                    'default' => 3,
                    'step'    => 1,
                ]
            );

            $this->add_control(
                'orderby',
                [
                    'label' => esc_html__( 'Orderby', 'woolentor-pro' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => 'none',
                    'options' => [
                        'none'          => esc_html__('None','woolentor-pro'),
                        'ID'            => esc_html__('ID','woolentor-pro'),
                        'date'          => esc_html__('Date','woolentor-pro'),
                        'name'          => esc_html__('Name','woolentor-pro'),
                        'title'         => esc_html__('Title','woolentor-pro'),
                        'comment_count' => esc_html__('Comment count','woolentor-pro'),
                        'rand'          => esc_html__('Random','woolentor-pro'),
                    ]
                ]
            );

        $this->end_controls_section();

        // Product Content
        $this->start_controls_section(
            'woolentor-products-content-setting',
            [
                'label' => esc_html__( 'Content Settings', 'woolentor-pro' ),
            ]
        );
            
            $this->add_control(
                'product_content_style',
                [
                    'label'   => __( 'Style', 'woolentor-pro' ),
                    'type'    => Controls_Manager::SELECT,
                    'default' => '1',
                    'options' => [
                        '1'  => __( 'Style One', 'woolentor-pro' ),
                        '2'  => __( 'Style Two', 'woolentor-pro' ),
                        '3'  => __( 'Style Three', 'woolentor-pro' ),
                        '4'  => __( 'Style Four', 'woolentor-pro' ),
                    ]
                ]
            );

            $this->add_control(
                'hide_product_title',
                [
                    'label'     => __( 'Title Hide', 'woolentor-pro' ),
                    'type'      => Controls_Manager::SWITCHER,
                    'selectors' => [
                        '{{WRAPPER}} .ht-product-inner .ht-product-title' => 'display: none !important;',
                    ],
                ]
            );

            $this->add_control(
                'hide_product_price',
                [
                    'label'     => __( 'Price Hide', 'woolentor-pro' ),
                    'type'      => Controls_Manager::SWITCHER,
                    'selectors' => [
                        '{{WRAPPER}} .ht-product-inner .ht-product-price' => 'display: none !important;',
                    ],
                ]
            );

            $this->add_control(
                'hide_product_category',
                [
                    'label'     => __( 'Category Hide', 'woolentor-pro' ),
                    'type'      => Controls_Manager::SWITCHER,
                    'selectors' => [
                        '{{WRAPPER}} .ht-product-inner .ht-product-categories' => 'display: none !important;',
                    ],
                ]
            );

            $this->add_control(
                'hide_product_ratting',
                [
                    'label'     => __( 'Ratting Hide', 'woolentor-pro' ),
                    'type'      => Controls_Manager::SWITCHER,
                    'selectors' => [
                        '{{WRAPPER}} .ht-product-inner .ht-product-ratting-wrap' => 'display: none !important;',
                    ],
                ]
            );

            $this->add_control(
                'show_product_excerpt',
                [
                    'label'     => __( 'Show Short Description', 'woolentor-pro' ),
                    'type'      => Controls_Manager::SWITCHER,
                ]
            );

            $this->add_control(
                'title_length',
                [
                    'label' => __( 'Title Length', 'woolentor-pro' ),
                    'type' => Controls_Manager::NUMBER,
                    'min' => 0,
                    'max' => 1000,
                    'step' => 1,
                    'default' => 3,
                    'condition' =>[
                        'hide_product_title!'=>'yes',
                    ]
                ]
            );

            $this->add_control(
                'excerpt_length',
                [
                    'label' => __( 'Description Length', 'woolentor-pro' ),
                    'type' => Controls_Manager::NUMBER,
                    'min' => 0,
                    'max' => 1000,
                    'step' => 1,
                    'default' => 15,
                    'condition' =>[
                        'show_product_excerpt'=>'yes',
                    ]
                ]
            );

        $this->end_controls_section();

        // Product Action Button
        $this->start_controls_section(
            'woolentor-products-action-button',
            [
                'label' => esc_html__( 'Action Button Settings', 'woolentor-pro' ),
            ]
        );
            
            $this->add_control(
                'show_action_button',
                [
                    'label' => __( 'Action Button', 'woolentor-pro' ),
                    'type' => Controls_Manager::SWITCHER,
                    'label_on' => __( 'Show', 'woolentor-pro' ),
                    'label_off' => __( 'Hide', 'woolentor-pro' ),
                    'return_value' => 'yes',
                    'default' => 'yes',
                ]
            );

            $this->add_control(
                'show_quickview_button',
                [
                    'label' => __( 'Quick View Button Hide', 'woolentor-pro' ),
                    'type' => Controls_Manager::SWITCHER,
                    'condition'=>[
                        'show_action_button'=>'yes',
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .ht-products .ht-product .ht-product-inner .ht-product-action ul li:nth-child(1)' => 'display: none !important;',
                    ],
                ]
            );

            $this->add_control(
                'show_wishlist_button',
                [
                    'label' => __( 'Wishlist Button Hide', 'woolentor-pro' ),
                    'type' => Controls_Manager::SWITCHER,
                    'condition'=>[
                        'show_action_button'=>'yes',
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .ht-products .ht-product .ht-product-inner .ht-product-action ul li:nth-child(2)' => 'display: none !important;',
                    ],
                ]
            );

            $this->add_control(
                'show_compare_button',
                [
                    'label' => __( 'Compare Button Hide', 'woolentor-pro' ),
                    'type' => Controls_Manager::SWITCHER,
                    'condition'=>[
                        'show_action_button'=>'yes',
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .ht-products .ht-product .ht-product-inner .ht-product-action ul li a.compare' => 'display: none !important;',
                    ],
                ]
            );

            $this->add_control(
                'show_addtocart_button',
                [
                    'label' => __( 'Shopping Cart Button Hide', 'woolentor-pro' ),
                    'type' => Controls_Manager::SWITCHER,
                    'condition'=>[
                        'show_action_button'=>'yes',
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .ht-products .ht-product .ht-product-inner .ht-product-action ul li.woolentor-cart' => 'display: none !important;',
                    ],
                ]
            );

            $this->add_control(
                'action_button_style',
                [
                    'label'   => __( 'Style', 'woolentor-pro' ),
                    'type'    => Controls_Manager::SELECT,
                    'default' => '1',
                    'options' => [
                        '1'   => __( 'Style One', 'woolentor-pro' ),
                        '2'   => __( 'Style Two', 'woolentor-pro' ),
                        '3'   => __( 'Style Three', 'woolentor-pro' ),
                    ],
                    'condition'=>[
                        'show_action_button'=>'yes',
                    ]
                ]
            );

            $this->add_control(
                'action_button_show_on',
                [
                    'label'   => __( 'Show On', 'woolentor-pro' ),
                    'type'    => Controls_Manager::SELECT,
                    'default' => 'normal',
                    'options' => [
                        'hover'   => __( 'Hover', 'woolentor-pro' ),
                        'normal'  => __( 'Normal', 'woolentor-pro' ),
                    ],
                    'condition'=>[
                        'show_action_button'=>'yes',
                    ]
                ]
            );

            $this->add_control(
                'action_button_position',
                [
                    'label'   => __( 'Position', 'woolentor-pro' ),
                    'type'    => Controls_Manager::CHOOSE,
                    'options' => [
                        'left' => [
                            'title' => __( 'Left', 'woolentor-pro' ),
                            'icon'  => 'eicon-h-align-left',
                        ],
                        'right' => [
                            'title' => __( 'Right', 'woolentor-pro' ),
                            'icon'  => 'eicon-h-align-right',
                        ],
                        'middle' => [
                            'title' => __( 'Middle', 'woolentor-pro' ),
                            'icon'  => 'eicon-v-align-middle',
                        ],
                        'bottom' => [
                            'title' => __( 'Bottom', 'woolentor-pro' ),
                            'icon'  => 'eicon-v-align-bottom',
                        ],
                        'contentbottom' => [
                            'title' => __( 'Content Bottom', 'woolentor-pro' ),
                            'icon'  => 'eicon-v-align-bottom',
                        ],
                    ],
                    'default'     => is_rtl() ? 'left' : 'right',
                    'toggle'      => false,
                    'condition'=>[
                        'show_action_button'=>'yes',
                    ]
                ]
            );

        $this->end_controls_section();

        // Product Image Setting
        $this->start_controls_section(
            'woolentor-products-thumbnails-setting',
            [
                'label' => esc_html__( 'Image Settings', 'woolentor-pro' ),
            ]
        );

            $this->add_control(
                'thumbnails_style',
                [
                    'label'   => __( 'Thumbnails Style', 'woolentor-pro' ),
                    'type'    => Controls_Manager::SELECT,
                    'default' => '1',
                    'options' => [
                        '1'   => __( 'Single Image', 'woolentor-pro' ),
                        '2'  => __( 'Image Slider', 'woolentor-pro' ),
                        '3'  => __( 'Gallery Tab', 'woolentor-pro' ),
                    ]
                ]
            );

            $this->add_control(
                'image_navigation_bg_color',
                [
                    'label' => __( 'Arrows Color', 'woolentor-pro' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default' =>'#444444',
                    'selectors' => [
                        '{{WRAPPER}} .ht-products .ht-product .ht-product-inner .ht-product-image-wrap .ht-product-image .ht-product-image-slider .slick-arrow' => 'color: {{VALUE}} !important;',
                    ],
                    'condition'=>[
                        'thumbnails_style'=>'2',
                    ]
                ]
            );

            $this->add_control(
                'image_dots_normal_bg_color',
                [
                    'label' => __( 'Dots Background Color', 'woolentor-pro' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default' =>'#cccccc',
                    'selectors' => [
                        '{{WRAPPER}} .ht-products .ht-product .ht-product-inner .ht-product-image-wrap .ht-product-image .ht-product-image-slider .slick-dots li button' => 'background-color: {{VALUE}} !important;',
                    ],
                    'condition'=>[
                        'thumbnails_style'=>'2',
                    ]
                ]
            );

            $this->add_control(
                'image_dots_hover_bg_color',
                [
                    'label' => __( 'Dots Active Background Color', 'woolentor-pro' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'condition'=>[
                        'thumbnails_style'=>'2',
                    ],
                    'default' =>'#666666',
                    'selectors' => [
                        '{{WRAPPER}} .ht-products .ht-product .ht-product-inner .ht-product-image-wrap .ht-product-image .ht-product-image-slider .slick-dots li.slick-active button' => 'background-color: {{VALUE}} !important;',
                    ],
                ]
            );

            $this->add_control(
                'image_tab_menu_border_color',
                [
                    'label' => __( 'Border Color', 'woolentor-pro' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default' =>'#737373',
                    'selectors' => [
                        '{{WRAPPER}} .ht-products .ht-product .ht-product-inner .ht-product-image-wrap .ht-product-image .ht-product-cus-tab-links li a' => 'border-color: {{VALUE}};',
                    ],
                    'condition'=>[
                        'thumbnails_style'=>'3',
                    ]
                ]
            );

            $this->add_control(
                'image_tab_menu_active_border_color',
                [
                    'label' => __( 'Active Border Color', 'woolentor-pro' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default' =>'#ECC87B',
                    'selectors' => [
                        '{{WRAPPER}} .ht-products .ht-product .ht-product-inner .ht-product-image-wrap .ht-product-image .ht-product-cus-tab-links li a.htactive' => 'border-color: {{VALUE}} !important;',
                    ],
                    'condition'=>[
                        'thumbnails_style'=>'3',
                    ]
                ]
            );

        $this->end_controls_section();

        // Product countdown
        $this->start_controls_section(
            'woolentor-products-countdown-setting',
            [
                'label' => esc_html__( 'Offer Price Counter Settings', 'woolentor-pro' ),
            ]
        );
            
            $this->add_control(
                'show_countdown',
                [
                    'label' => __( 'Show Countdown Timer', 'woolentor-pro' ),
                    'type' => Controls_Manager::SWITCHER,
                    'label_on' => __( 'Show', 'woolentor-pro' ),
                    'label_off' => __( 'Hide', 'woolentor-pro' ),
                    'return_value' => 'yes',
                    'default' => 'no',
                ]
            );

            $this->add_control(
                'show_countdown_gutter',
                [
                    'label' => __( 'Gutter', 'woolentor-pro' ),
                    'type' => Controls_Manager::SWITCHER,
                    'label_on' => __( 'Yes', 'woolentor-pro' ),
                    'label_off' => __( 'No', 'woolentor-pro' ),
                    'return_value' => 'yes',
                    'default' => 'yes',
                    'condition' =>[
                        'show_countdown' => 'yes',
                    ]
                ]
            );

            $this->add_control(
                'product_countdown_position',
                [
                    'label'   => __( 'Position', 'woolentor-pro' ),
                    'type'    => Controls_Manager::CHOOSE,
                    'options' => [
                        'left' => [
                            'title' => __( 'Left', 'woolentor-pro' ),
                            'icon'  => 'eicon-h-align-left',
                        ],
                        'right' => [
                            'title' => __( 'Right', 'woolentor-pro' ),
                            'icon'  => 'eicon-h-align-right',
                        ],
                        'middle' => [
                            'title' => __( 'Middle', 'woolentor-pro' ),
                            'icon'  => 'eicon-v-align-middle',
                        ],
                        'bottom' => [
                            'title' => __( 'Bottom', 'woolentor-pro' ),
                            'icon'  => 'eicon-v-align-bottom',
                        ],
                        'contentbottom' => [
                            'title' => __( 'Content Bottom', 'woolentor-pro' ),
                            'icon'  => 'eicon-v-align-bottom',
                        ],
                    ],
                    'default'     => 'bottom',
                    'toggle'      => false,
                    'label_block' => true,
                    'condition' =>[
                        'show_countdown' => 'yes',
                    ]
                ]
            );

            $this->add_control(
                'custom_labels',
                [
                    'label'        => __( 'Custom Label', 'woolentor-pro' ),
                    'type'         => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'condition'   => [
                        'show_countdown' => 'yes',
                    ]
                ]
            );

            $this->add_control(
                'customlabel_days',
                [
                    'label'       => __( 'Days', 'woolentor-pro' ),
                    'type'        => Controls_Manager::TEXT,
                    'placeholder' => __( 'Days', 'woolentor-pro' ),
                    'condition'   => [
                        'custom_labels!' => '',
                        'show_countdown' => 'yes',
                    ]
                ]
            );

            $this->add_control(
                'customlabel_hours',
                [
                    'label'       => __( 'Hours', 'woolentor-pro' ),
                    'type'        => Controls_Manager::TEXT,
                    'placeholder' => __( 'Hours', 'woolentor-pro' ),
                    'condition'   => [
                        'custom_labels!' => '',
                        'show_countdown' => 'yes',
                    ]
                ]
            );

            $this->add_control(
                'customlabel_minutes',
                [
                    'label'       => __( 'Minutes', 'woolentor-pro' ),
                    'type'        => Controls_Manager::TEXT,
                    'placeholder' => __( 'Minutes', 'woolentor-pro' ),
                    'condition'   => [
                        'custom_labels!' => '',
                        'show_countdown' => 'yes',
                    ]
                ]
            );

            $this->add_control(
                'customlabel_seconds',
                [
                    'label'       => __( 'Seconds', 'woolentor-pro' ),
                    'type'        => Controls_Manager::TEXT,
                    'placeholder' => __( 'Seconds', 'woolentor-pro' ),
                    'condition'   => [
                        'custom_labels!' => '',
                        'show_countdown' => 'yes',
                    ]
                ]
            );

        $this->end_controls_section();

        // Product slider setting
        $this->start_controls_section(
            'woolentor-products-slider',
            [
                'label' => esc_html__( 'Slider Option', 'woolentor-pro' ),
                'condition' => [
                    'product_layout_style' => 'slider',
                ]
            ]
        );

            $this->add_control(
                'slitems',
                [
                    'label' => esc_html__( 'Slider Items', 'woolentor-pro' ),
                    'type' => Controls_Manager::NUMBER,
                    'min' => 1,
                    'max' => 10,
                    'step' => 1,
                    'default' => 3
                ]
            );

            $this->add_control(
                'slarrows',
                [
                    'label' => esc_html__( 'Slider Arrow', 'woolentor-pro' ),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default' => 'yes',
                ]
            );

            $this->add_control(
                'sldots',
                [
                    'label' => esc_html__( 'Slider dots', 'woolentor-pro' ),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default' => 'no'
                ]
            );

            $this->add_control(
                'slpause_on_hover',
                [
                    'type' => Controls_Manager::SWITCHER,
                    'label_off' => __('No', 'woolentor-pro'),
                    'label_on' => __('Yes', 'woolentor-pro'),
                    'return_value' => 'yes',
                    'default' => 'yes',
                    'label' => __('Pause on Hover?', 'woolentor-pro'),
                ]
            );

            $this->add_control(
                'slautolay',
                [
                    'label' => esc_html__( 'Slider auto play', 'woolentor-pro' ),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'separator' => 'before',
                    'default' => 'no'
                ]
            );

            $this->add_control(
                'slautoplay_speed',
                [
                    'label' => __('Autoplay speed', 'woolentor-pro'),
                    'type' => Controls_Manager::NUMBER,
                    'default' => 3000,
                    'condition' => [
                        'slautolay' => 'yes',
                    ]
                ]
            );


            $this->add_control(
                'slanimation_speed',
                [
                    'label' => __('Autoplay animation speed', 'woolentor-pro'),
                    'type' => Controls_Manager::NUMBER,
                    'default' => 300,
                    'condition' => [
                        'slautolay' => 'yes',
                    ]
                ]
            );

            $this->add_control(
                'slscroll_columns',
                [
                    'label' => __('Slider item to scroll', 'woolentor-pro'),
                    'type' => Controls_Manager::NUMBER,
                    'min' => 1,
                    'max' => 10,
                    'step' => 1,
                    'default' => 3,
                ]
            );

            $this->add_control(
                'heading_tablet',
                [
                    'label' => __( 'Tablet', 'woolentor-pro' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'after',
                ]
            );

            $this->add_control(
                'sltablet_display_columns',
                [
                    'label' => __('Slider Items', 'woolentor-pro'),
                    'type' => Controls_Manager::NUMBER,
                    'min' => 1,
                    'max' => 8,
                    'step' => 1,
                    'default' => 2,
                ]
            );

            $this->add_control(
                'sltablet_scroll_columns',
                [
                    'label' => __('Slider item to scroll', 'woolentor-pro'),
                    'type' => Controls_Manager::NUMBER,
                    'min' => 1,
                    'max' => 8,
                    'step' => 1,
                    'default' => 2,
                ]
            );

            $this->add_control(
                'sltablet_width',
                [
                    'label' => __('Tablet Resolution', 'woolentor-pro'),
                    'description' => __('The resolution to tablet.', 'woolentor-pro'),
                    'type' => Controls_Manager::NUMBER,
                    'default' => 750,
                ]
            );

            $this->add_control(
                'heading_mobile',
                [
                    'label' => __( 'Mobile Phone', 'woolentor-pro' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'after',
                ]
            );

            $this->add_control(
                'slmobile_display_columns',
                [
                    'label' => __('Slider Items', 'woolentor-pro'),
                    'type' => Controls_Manager::NUMBER,
                    'min' => 1,
                    'max' => 4,
                    'step' => 1,
                    'default' => 1,
                ]
            );

            $this->add_control(
                'slmobile_scroll_columns',
                [
                    'label' => __('Slider item to scroll', 'woolentor-pro'),
                    'type' => Controls_Manager::NUMBER,
                    'min' => 1,
                    'max' => 4,
                    'step' => 1,
                    'default' => 1,
                ]
            );

            $this->add_control(
                'slmobile_width',
                [
                    'label' => __('Mobile Resolution', 'woolentor-pro'),
                    'description' => __('The resolution to mobile.', 'woolentor-pro'),
                    'type' => Controls_Manager::NUMBER,
                    'default' => 480,
                ]
            );

        $this->end_controls_section(); // Slider Option end

        // Section Heading Style
        $this->start_controls_section(
            'universal_product_section_title_style_section',
            [
                'label' => __( 'Section Heading', 'woolentor-pro' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
            
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'section_title_typography',
                    'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} h2.wlcross_sell_product_title',
                ]
            );

            $this->add_control(
                'section_title_color',
                [
                    'label' => __( 'Title Color', 'woolentor-pro' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default' =>'#444444',
                    'selectors' => [
                        '{{WRAPPER}} h2.wlcross_sell_product_title' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'section_title_margin',
                [
                    'label' => __( 'Margin', 'woolentor-pro' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} h2.wlcross_sell_product_title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

        $this->end_controls_section(); // Section Heading Style End

        // Style Default tab section
        $this->start_controls_section(
            'universal_product_style_section',
            [
                'label' => __( 'Style', 'woolentor-pro' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_responsive_control(
                'product_inner_padding',
                [
                    'label' => __( 'Padding', 'woolentor-pro' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .woocommerce div.product.mb-30' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'product_inner_margin',
                [
                    'label' => __( 'Margin', 'woolentor-pro' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .woocommerce div.product.mb-30' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_control(
                'product_inner_border_color',
                [
                    'label' => __( 'Border Color', 'woolentor-pro' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default' =>'#f1f1f1',
                    'selectors' => [
                        '{{WRAPPER}} .ht-products .ht-product .ht-product-inner' => 'border-color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Box_Shadow::get_type(),
                [
                    'name' => 'product_inner_box_shadow',
                    'label' => __( 'Hover Box Shadow', 'woolentor-pro' ),
                    'selector' => '{{WRAPPER}} .ht-products .ht-product .ht-product-inner:hover',
                ]
            );

            $this->add_control(
                'product_content_area_heading',
                [
                    'label' => __( 'Content area', 'woolentor-pro' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );

            $this->add_responsive_control(
                'product_content_area_padding',
                [
                    'label' => __( 'Padding', 'woolentor-pro' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .ht-products .ht-product .ht-product-inner .ht-product-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_control(
                'product_content_area_bg_color',
                [
                    'label' => __( 'Background Color', 'woolentor-pro' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default' =>'#ffffff',
                    'selectors' => [
                        '{{WRAPPER}} .ht-products .ht-product .ht-product-inner .ht-product-content' => 'background-color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'product_content_area_border',
                    'label' => __( 'Border', 'woolentor-pro' ),
                    'selector' => '{{WRAPPER}} .ht-products .ht-product .ht-product-inner .ht-product-content',
                ]
            );

            $this->add_control(
                'product_badge_heading',
                [
                    'label' => __( 'Product Badge', 'woolentor-pro' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );

            $this->add_control(
                'product_badge_color',
                [
                    'label' => __( 'Badge Color', 'woolentor-pro' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default' =>'#444444',
                    'selectors' => [
                        '{{WRAPPER}} .ht-products .ht-product .ht-product-inner .ht-product-image-wrap .ht-product-label' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'product_badge_typography',
                    'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .ht-products .ht-product .ht-product-inner .ht-product-image-wrap .ht-product-label',
                ]
            );

            // Product Category
            $this->add_control(
                'product_category_heading',
                [
                    'label' => __( 'Product Category', 'woolentor-pro' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'product_category_typography',
                    'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .ht-products .ht-product .ht-product-inner .ht-product-content .ht-product-content-inner .ht-product-categories a',
                ]
            );

            $this->add_control(
                'product_category_color',
                [
                    'label' => __( 'Category Color', 'woolentor-pro' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default' =>'#444444',
                    'selectors' => [
                        '{{WRAPPER}} .ht-products .ht-product .ht-product-inner .ht-product-content .ht-product-content-inner .ht-product-categories a' => 'color: {{VALUE}};',
                        '{{WRAPPER}} .ht-products .ht-product .ht-product-inner .ht-product-content .ht-product-content-inner .ht-product-categories::before' => 'background-color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'product_category_hover_color',
                [
                    'label' => __( 'Category Hover Color', 'woolentor-pro' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default' =>'#dc9a0e',
                    'selectors' => [
                        '{{WRAPPER}} .ht-products .ht-product .ht-product-inner .ht-product-content .ht-product-content-inner .ht-product-categories a:hover' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'product_category_margin',
                [
                    'label' => __( 'Margin', 'woolentor-pro' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .ht-products .ht-product .ht-product-inner .ht-product-content .ht-product-content-inner .ht-product-categories' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            // Product Title
            $this->add_control(
                'product_title_heading',
                [
                    'label' => __( 'Product Title', 'woolentor-pro' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'product_title_typography',
                    'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .ht-products .ht-product .ht-product-inner .ht-product-content .ht-product-content-inner .ht-product-title a',
                ]
            );

            $this->add_control(
                'product_title_color',
                [
                    'label' => __( 'Title Color', 'woolentor-pro' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default' =>'#444444',
                    'selectors' => [
                        '{{WRAPPER}} .ht-products .ht-product .ht-product-inner .ht-product-content .ht-product-content-inner .ht-product-title a' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'product_title_hover_color',
                [
                    'label' => __( 'Title Hover Color', 'woolentor-pro' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default' =>'#dc9a0e',
                    'selectors' => [
                        '{{WRAPPER}} .ht-products .ht-product .ht-product-inner .ht-product-content .ht-product-content-inner .ht-product-title a:hover' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'product_title_margin',
                [
                    'label' => __( 'Margin', 'woolentor-pro' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .ht-products .ht-product .ht-product-inner .ht-product-content .ht-product-content-inner .ht-product-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            // Product Description
            $this->add_control(
                'product_description_heading',
                [
                    'label' => __( 'Product Description', 'woolentor-pro' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'before',
                    'condition'=>[
                        'show_product_excerpt'=>'yes'
                    ]
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'product_description_typography',
                    'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .ht-products .ht-product .ht-product-inner .ht-product-content .ht-product-content-inner .woolentor-short-desc',
                    'condition'=>[
                        'show_product_excerpt'=>'yes'
                    ]
                ]
            );

            $this->add_control(
                'product_description_color',
                [
                    'label' => __( 'Description Color', 'woolentor-pro' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default' =>'#444444',
                    'selectors' => [
                        '{{WRAPPER}} .ht-products .ht-product .ht-product-inner .ht-product-content .ht-product-content-inner .woolentor-short-desc' => 'color: {{VALUE}};',
                    ],
                    'condition'=>[
                        'show_product_excerpt'=>'yes'
                    ]
                ]
            );

            $this->add_responsive_control(
                'product_description_margin',
                [
                    'label' => __( 'Margin', 'woolentor-pro' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .ht-products .ht-product .ht-product-inner .ht-product-content .ht-product-content-inner .woolentor-short-desc' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'condition'=>[
                        'show_product_excerpt'=>'yes'
                    ]
                ]
            );

            // Product Price
            $this->add_control(
                'product_price_heading',
                [
                    'label' => __( 'Product Price', 'woolentor-pro' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );

            $this->add_control(
                'product_sale_price_color',
                [
                    'label' => __( 'Sale Price Color', 'woolentor-pro' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default' =>'#444444',
                    'selectors' => [
                        '{{WRAPPER}} .ht-products .ht-product .ht-product-inner .ht-product-content .ht-product-content-inner .ht-product-price span' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'product_sale_price_typography',
                    'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .ht-products .ht-product .ht-product-inner .ht-product-content .ht-product-content-inner .ht-product-price span',
                ]
            );

            $this->add_control(
                'product_regular_price_color',
                [
                    'label' => __( 'Regular Price Color', 'woolentor-pro' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'separator' => 'before',
                    'default' =>'#444444',
                    'selectors' => [
                        '{{WRAPPER}} .ht-products .ht-product .ht-product-inner .ht-product-content .ht-product-content-inner .ht-product-price span del span,{{WRAPPER}} .ht-products .ht-product .ht-product-inner .ht-product-content .ht-product-content-inner .ht-product-price span del' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'product_regular_price_typography',
                    'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .ht-products .ht-product .ht-product-inner .ht-product-content .ht-product-content-inner .ht-product-price span del span',
                ]
            );

            $this->add_responsive_control(
                'product_price_margin',
                [
                    'label' => __( 'Margin', 'woolentor-pro' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .ht-products .ht-product .ht-product-inner .ht-product-content .ht-product-content-inner .ht-product-price' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            // Product Rating
            $this->add_control(
                'product_rating_heading',
                [
                    'label' => __( 'Product Rating', 'woolentor-pro' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );

            $this->add_control(
                'product_rating_color',
                [
                    'label' => __( 'Empty Rating Color', 'woolentor-pro' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default' =>'#aaaaaa',
                    'selectors' => [
                        '{{WRAPPER}} .ht-products .ht-product .ht-product-inner .ht-product-content .ht-product-content-inner .ht-product-ratting-wrap .ht-product-ratting i' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'product_rating_give_color',
                [
                    'label' => __( 'Rating Color', 'woolentor-pro' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default' =>'#dc9a0e',
                    'selectors' => [
                        '{{WRAPPER}} .ht-products .ht-product .ht-product-inner .ht-product-content .ht-product-content-inner .ht-product-ratting-wrap .ht-product-ratting .ht-product-user-ratting i' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'product_rating_margin',
                [
                    'label' => __( 'Margin', 'woolentor-pro' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .ht-products .ht-product .ht-product-inner .ht-product-content .ht-product-content-inner .ht-product-ratting-wrap' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

        $this->end_controls_section(); // Style Default End

        // Style Action Button tab section
        $this->start_controls_section(
            'universal_product_action_button_style_section',
            [
                'label' => __( 'Action Button Style', 'woolentor-pro' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_group_control(
                Group_Control_Background::get_type(),
                [
                    'name' => 'product_action_button_background_color',
                    'label' => __( 'Background', 'woolentor-pro' ),
                    'types' => [ 'classic', 'gradient' ],
                    'selector' => '{{WRAPPER}} .ht-products .ht-product .ht-product-inner .ht-product-image-wrap .ht-product-action ul',
                ]
            );

            $this->add_group_control(
                Group_Control_Box_Shadow::get_type(),
                [
                    'name' => 'product_action_button_box_shadow',
                    'label' => __( 'Box Shadow', 'woolentor-pro' ),
                    'selector' => '{{WRAPPER}} .ht-products .ht-product .ht-product-inner .ht-product-image-wrap .ht-product-action ul',
                ]
            );

            $this->add_control(
                'product_tooltip_heading',
                [
                    'label' => __( 'Tooltip', 'woolentor-pro' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );

                $this->add_control(
                    'product_tooltip_color',
                    [
                        'label' => __( 'Tool Tip Color', 'woolentor-pro' ),
                        'type' => Controls_Manager::COLOR,
                        'scheme' => [
                            'type' => Scheme_Color::get_type(),
                            'value' => Scheme_Color::COLOR_1,
                        ],
                        'default' =>'#ffffff',
                        'selectors' => [
                            '{{WRAPPER}} .ht-products .ht-product .ht-product-inner .ht-product-image-wrap .ht-product-action ul li a .ht-product-action-tooltip,{{WRAPPER}} span.woolentor-tip' => 'color: {{VALUE}};',
                        ],
                    ]
                );

                $this->add_group_control(
                    Group_Control_Background::get_type(),
                    [
                        'name' => 'product_action_button_tooltip_background_color',
                        'label' => __( 'Background', 'woolentor-pro' ),
                        'types' => [ 'classic', 'gradient' ],
                        'selector' => '{{WRAPPER}} .ht-products .ht-product .ht-product-inner .ht-product-image-wrap .ht-product-action ul li a .ht-product-action-tooltip,{{WRAPPER}} span.woolentor-tip',
                    ]
                );

            $this->start_controls_tabs('product_action_button_style_tabs');

                // Normal
                $this->start_controls_tab(
                    'product_action_button_style_normal_tab',
                    [
                        'label' => __( 'Normal', 'woolentor-pro' ),
                    ]
                );
                    
                    $this->add_control(
                        'product_action_button_normal_color',
                        [
                            'label' => __( 'Color', 'woolentor-pro' ),
                            'type' => Controls_Manager::COLOR,
                            'scheme' => [
                                'type' => Scheme_Color::get_type(),
                                'value' => Scheme_Color::COLOR_1,
                            ],
                            'default' =>'#000000',
                            'selectors' => [
                                '{{WRAPPER}} .ht-products .ht-product .ht-product-inner .ht-product-image-wrap .ht-product-action ul li a' => 'color: {{VALUE}};',
                            ],
                        ]
                    );

                    $this->add_responsive_control(
                        'product_action_button_font_size',
                        [
                            'label' => __( 'Font Size', 'woolentor-pro' ),
                            'type' => Controls_Manager::SLIDER,
                            'size_units' => [ 'px', '%' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 200,
                                    'step' => 1,
                                ],
                                '%' => [
                                    'min' => 0,
                                    'max' => 100,
                                ],
                            ],
                            'default' => [
                                'unit' => 'px',
                                'size' => 20,
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .ht-products .ht-product .ht-product-inner .ht-product-action ul li a i' => 'font-size: {{SIZE}}{{UNIT}};',
                                '{{WRAPPER}} .woolentor-compare.compare::before,{{WRAPPER}} .ht-product-action ul li.woolentor-cart a::before' => 'font-size: {{SIZE}}{{UNIT}};',
                            ],
                        ]
                    );

                    $this->add_responsive_control(
                        'product_action_button_line_height',
                        [
                            'label' => __( 'Line Height', 'woolentor-pro' ),
                            'type' => Controls_Manager::SLIDER,
                            'size_units' => [ 'px', '%' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 200,
                                    'step' => 1,
                                ],
                                '%' => [
                                    'min' => 0,
                                    'max' => 100,
                                ],
                            ],
                            'default' => [
                                'unit' => 'px',
                                'size' => 30,
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .ht-products .ht-product .ht-product-inner .ht-product-action ul li a i' => 'line-height: {{SIZE}}{{UNIT}};',
                                '{{WRAPPER}} .woolentor-compare.compare::before,{{WRAPPER}} .ht-product-action ul li.woolentor-cart a::before' => 'line-height: {{SIZE}}{{UNIT}};',
                            ],
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Background::get_type(),
                        [
                            'name' => 'product_action_button_normal_background_color',
                            'label' => __( 'Background', 'woolentor-pro' ),
                            'types' => [ 'classic', 'gradient' ],
                            'selector' => '{{WRAPPER}} .ht-products .ht-product .ht-product-inner .ht-product-image-wrap .ht-product-action ul li',
                        ]
                    );

                    $this->add_responsive_control(
                        'product_action_button_normal_padding',
                        [
                            'label' => __( 'Padding', 'woolentor-pro' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .ht-products .ht-product .ht-product-inner .ht-product-image-wrap .ht-product-action ul li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ]
                    );

                    $this->add_responsive_control(
                        'product_action_button_normal_margin',
                        [
                            'label' => __( 'Margin', 'woolentor-pro' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .ht-products .ht-product .ht-product-inner .ht-product-image-wrap .ht-product-action ul li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name' => 'product_action_button_normal_button_border',
                            'label' => __( 'Border', 'woolentor-pro' ),
                            'selector' => '{{WRAPPER}} .ht-products .ht-product .ht-product-inner .ht-product-image-wrap .ht-product-action ul li',
                        ]
                    );

                    $this->add_responsive_control(
                        'product_action_button_border_radius',
                        [
                            'label' => __( 'Border Radius', 'woolentor-pro' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .ht-products .ht-product .ht-product-inner .ht-product-image-wrap .ht-product-action ul li' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ]
                    );

                    $this->add_responsive_control(
                        'product_action_button_width',
                        [
                            'label' => __( 'Width', 'woolentor-pro' ),
                            'type' => Controls_Manager::SLIDER,
                            'size_units' => [ 'px', '%' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 200,
                                    'step' => 1,
                                ],
                                '%' => [
                                    'min' => 0,
                                    'max' => 100,
                                ],
                            ],
                            'default' => [
                                'unit' => 'px',
                                'size' => 30,
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .ht-products .ht-product .ht-product-inner .ht-product-action ul li a' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                        ]
                    );

                    $this->add_responsive_control(
                        'product_action_button_height',
                        [
                            'label' => __( 'Height', 'woolentor-pro' ),
                            'type' => Controls_Manager::SLIDER,
                            'size_units' => [ 'px', '%' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 200,
                                    'step' => 1,
                                ],
                                '%' => [
                                    'min' => 0,
                                    'max' => 100,
                                ],
                            ],
                            'default' => [
                                'unit' => 'px',
                                'size' => 30,
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .ht-products .ht-product .ht-product-inner .ht-product-action ul li a' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                        ]
                    );

                $this->end_controls_tab();

                // Hover
                $this->start_controls_tab(
                    'product_action_button_style_hover_tab',
                    [
                        'label' => __( 'Hover', 'woolentor-pro' ),
                    ]
                );
                    
                    $this->add_control(
                        'product_action_button_hover_color',
                        [
                            'label' => __( 'Color', 'woolentor-pro' ),
                            'type' => Controls_Manager::COLOR,
                            'scheme' => [
                                'type' => Scheme_Color::get_type(),
                                'value' => Scheme_Color::COLOR_1,
                            ],
                            'default' =>'#dc9a0e',
                            'selectors' => [
                                '{{WRAPPER}} .ht-products .ht-product .ht-product-inner .ht-product-image-wrap .ht-product-action ul li:hover a' => 'color: {{VALUE}};',
                                '{{WRAPPER}} .ht-product-action .yith-wcwl-wishlistaddedbrowse a, .ht-product-action .yith-wcwl-wishlistexistsbrowse a' => 'color: {{VALUE}} !important;',
                            ],
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Background::get_type(),
                        [
                            'name' => 'product_action_button_hover_background_color',
                            'label' => __( 'Background', 'woolentor-pro' ),
                            'types' => [ 'classic', 'gradient' ],
                            'selector' => '{{WRAPPER}} .ht-products .ht-product .ht-product-inner .ht-product-image-wrap .ht-product-action ul li:hover',
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name' => 'product_action_button_hover_button_border',
                            'label' => __( 'Border', 'woolentor-pro' ),
                            'selector' => '{{WRAPPER}} .ht-products .ht-product .ht-product-inner .ht-product-image-wrap .ht-product-action ul li:hover',
                        ]
                    );

                $this->end_controls_tab();

            $this->end_controls_tabs();

        $this->end_controls_section();

        // Style Countdown tab section
        $this->start_controls_section(
            'universal_product_counter_style_section',
            [
                'label' => __( 'Offer Price Counter', 'woolentor-pro' ),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition'=>[
                    'show_countdown'=>'yes',
                ]
            ]
        );

            $this->add_control(
                'product_counter_color',
                [
                    'label' => __( 'Color', 'woolentor-pro' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default' =>'#ffffff',
                    'selectors' => [
                        '{{WRAPPER}} .ht-products .ht-product .ht-product-inner .ht-product-countdown-wrap .ht-product-countdown .cd-single .cd-single-inner h3' => 'color: {{VALUE}};',
                        '{{WRAPPER}} .ht-products .ht-product .ht-product-inner .ht-product-countdown-wrap .ht-product-countdown .cd-single .cd-single-inner p' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Background::get_type(),
                [
                    'name' => 'product_counter_background_color',
                    'label' => __( 'Counter Background', 'woolentor-pro' ),
                    'types' => [ 'classic', 'gradient' ],
                    'selector' => '{{WRAPPER}} .ht-products .ht-product .ht-product-inner .ht-product-countdown-wrap .ht-product-countdown .cd-single .cd-single-inner,{{WRAPPER}} .ht-products .ht-product.ht-product-countdown-fill .ht-product-inner .ht-product-countdown-wrap .ht-product-countdown',
                ]
            );

            $this->add_responsive_control(
                'product_counter_space_between',
                [
                    'label' => __( 'Space', 'woolentor-pro' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .ht-products .ht-product .ht-product-inner .ht-product-countdown-wrap .ht-product-countdown .cd-single' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            
        $this->end_controls_section();

        // Slider Button style
        $this->start_controls_section(
            'products-slider-controller-style',
            [
                'label' => esc_html__( 'Slider Controller Style', 'woolentor-pro' ),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'product_layout_style' => 'slider',
                ]
            ]
        );

            $this->start_controls_tabs('product_sliderbtn_style_tabs');

                // Slider Button style Normal
                $this->start_controls_tab(
                    'product_sliderbtn_style_normal_tab',
                    [
                        'label' => __( 'Normal', 'woolentor-pro' ),
                    ]
                );

                    $this->add_control(
                        'button_style_heading',
                        [
                            'label' => __( 'Navigation Arrow', 'woolentor-pro' ),
                            'type' => Controls_Manager::HEADING,
                        ]
                    );

                    $this->add_responsive_control(
                        'nvigation_position',
                        [
                            'label' => __( 'Position', 'woolentor-pro' ),
                            'type' => Controls_Manager::SLIDER,
                            'size_units' => [ 'px', '%' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 1000,
                                    'step' => 5,
                                ],
                                '%' => [
                                    'min' => 0,
                                    'max' => 100,
                                ],
                            ],
                            'default' => [
                                'unit' => '%',
                                'size' => 50,
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .product-slider .slick-arrow' => 'top: {{SIZE}}{{UNIT}};',
                            ],
                        ]
                    );

                    $this->add_control(
                        'button_color',
                        [
                            'label' => __( 'Color', 'woolentor-pro' ),
                            'type' => Controls_Manager::COLOR,
                            'scheme' => [
                                'type' => Scheme_Color::get_type(),
                                'value' => Scheme_Color::COLOR_1,
                            ],
                            'default' =>'#dddddd',
                            'selectors' => [
                                '{{WRAPPER}} .product-slider .slick-arrow' => 'color: {{VALUE}};',
                            ],
                        ]
                    );

                    $this->add_control(
                        'button_bg_color',
                        [
                            'label' => __( 'Background Color', 'woolentor-pro' ),
                            'type' => Controls_Manager::COLOR,
                            'scheme' => [
                                'type' => Scheme_Color::get_type(),
                                'value' => Scheme_Color::COLOR_1,
                            ],
                            'default' =>'#ffffff',
                            'selectors' => [
                                '{{WRAPPER}} .product-slider .slick-arrow' => 'background-color: {{VALUE}} !important;',
                            ],
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name' => 'button_border',
                            'label' => __( 'Border', 'woolentor-pro' ),
                            'selector' => '{{WRAPPER}} .product-slider .slick-arrow',
                        ]
                    );

                    $this->add_responsive_control(
                        'button_border_radius',
                        [
                            'label' => esc_html__( 'Border Radius', 'woolentor-pro' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'selectors' => [
                                '{{WRAPPER}} .product-slider .slick-arrow' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                            ],
                        ]
                    );

                    $this->add_responsive_control(
                        'button_padding',
                        [
                            'label' => __( 'Padding', 'woolentor-pro' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .product-slider .slick-arrow' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                            ],
                        ]
                    );

                    $this->add_control(
                        'button_style_dots_heading',
                        [
                            'label' => __( 'Navigation Dots', 'woolentor-pro' ),
                            'type' => Controls_Manager::HEADING,
                        ]
                    );

                        $this->add_responsive_control(
                            'dots_position',
                            [
                                'label' => __( 'Position', 'woolentor-pro' ),
                                'type' => Controls_Manager::SLIDER,
                                'size_units' => [ 'px', '%' ],
                                'range' => [
                                    'px' => [
                                        'min' => 0,
                                        'max' => 1000,
                                        'step' => 5,
                                    ],
                                    '%' => [
                                        'min' => 0,
                                        'max' => 100,
                                    ],
                                ],
                                'default' => [
                                    'unit' => '%',
                                    'size' => 50,
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .product-slider .slick-dots' => 'left: {{SIZE}}{{UNIT}};',
                                ],
                            ]
                        );

                        $this->add_control(
                            'dots_bg_color',
                            [
                                'label' => __( 'Background Color', 'woolentor-pro' ),
                                'type' => Controls_Manager::COLOR,
                                'scheme' => [
                                    'type' => Scheme_Color::get_type(),
                                    'value' => Scheme_Color::COLOR_1,
                                ],
                                'default' =>'#ffffff',
                                'selectors' => [
                                    '{{WRAPPER}} .product-slider .slick-dots li button' => 'background-color: {{VALUE}} !important;',
                                ],
                            ]
                        );

                        $this->add_group_control(
                            Group_Control_Border::get_type(),
                            [
                                'name' => 'dots_border',
                                'label' => __( 'Border', 'woolentor-pro' ),
                                'selector' => '{{WRAPPER}} .product-slider .slick-dots li button',
                            ]
                        );

                        $this->add_responsive_control(
                            'dots_border_radius',
                            [
                                'label' => esc_html__( 'Border Radius', 'woolentor-pro' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'selectors' => [
                                    '{{WRAPPER}} .product-slider .slick-dots li button' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                                ],
                            ]
                        );

                $this->end_controls_tab();// Normal button style end

                // Button style Hover
                $this->start_controls_tab(
                    'product_sliderbtn_style_hover_tab',
                    [
                        'label' => __( 'Hover', 'woolentor-pro' ),
                    ]
                );


                    $this->add_control(
                        'button_style_arrow_heading',
                        [
                            'label' => __( 'Navigation', 'woolentor-pro' ),
                            'type' => Controls_Manager::HEADING,
                        ]
                    );

                    $this->add_control(
                        'button_hover_color',
                        [
                            'label' => __( 'Color', 'woolentor-pro' ),
                            'type' => Controls_Manager::COLOR,
                            'scheme' => [
                                'type' => Scheme_Color::get_type(),
                                'value' => Scheme_Color::COLOR_1,
                            ],
                            'default' =>'#23252a',
                            'selectors' => [
                                '{{WRAPPER}} .product-slider .slick-arrow:hover' => 'color: {{VALUE}};',
                            ],
                        ]
                    );

                    $this->add_control(
                        'button_hover_bg_color',
                        [
                            'label' => __( 'Background', 'woolentor-pro' ),
                            'type' => Controls_Manager::COLOR,
                            'scheme' => [
                                'type' => Scheme_Color::get_type(),
                                'value' => Scheme_Color::COLOR_1,
                            ],
                            'default' =>'#ffffff',
                            'selectors' => [
                                '{{WRAPPER}} .product-slider .slick-arrow:hover' => 'background-color: {{VALUE}} !important;',
                            ],
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name' => 'button_hover_border',
                            'label' => __( 'Border', 'woolentor-pro' ),
                            'selector' => '{{WRAPPER}} .product-slider .slick-arrow:hover',
                        ]
                    );

                    $this->add_responsive_control(
                        'button_hover_border_radius',
                        [
                            'label' => esc_html__( 'Border Radius', 'woolentor-pro' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'selectors' => [
                                '{{WRAPPER}} .product-slider .slick-arrow:hover' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                            ],
                        ]
                    );


                    $this->add_control(
                        'button_style_dotshov_heading',
                        [
                            'label' => __( 'Navigation Dots', 'woolentor-pro' ),
                            'type' => Controls_Manager::HEADING,
                        ]
                    );

                        $this->add_control(
                            'dots_hover_bg_color',
                            [
                                'label' => __( 'Background Color', 'woolentor-pro' ),
                                'type' => Controls_Manager::COLOR,
                                'scheme' => [
                                    'type' => Scheme_Color::get_type(),
                                    'value' => Scheme_Color::COLOR_1,
                                ],
                                'default' =>'#282828',
                                'selectors' => [
                                    '{{WRAPPER}} .product-slider .slick-dots li button:hover' => 'background-color: {{VALUE}} !important;',
                                    '{{WRAPPER}} .product-slider .slick-dots li.slick-active button' => 'background-color: {{VALUE}} !important;',
                                ],
                            ]
                        );

                        $this->add_group_control(
                            Group_Control_Border::get_type(),
                            [
                                'name' => 'dots_border_hover',
                                'label' => __( 'Border', 'woolentor-pro' ),
                                'selector' => '{{WRAPPER}} .product-slider .slick-dots li button:hover',
                            ]
                        );

                        $this->add_responsive_control(
                            'dots_border_radius_hover',
                            [
                                'label' => esc_html__( 'Border Radius', 'woolentor-pro' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'selectors' => [
                                    '{{WRAPPER}} .product-slider .slick-dots li button:hover' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                                ],
                            ]
                        );

                $this->end_controls_tab();// Hover button style end

            $this->end_controls_tabs();

        $this->end_controls_section(); // Tab option end

    }

    protected function render( $instance = [] ) {

        $settings           = $this->get_settings_for_display();
        $per_page           = $this->get_settings_for_display('woolentor_product_grid_products_count');
        $custom_order_ck    = $this->get_settings_for_display('woolentor_custom_order');
        $orderby            = $this->get_settings_for_display('orderby');
        $order              = $this->get_settings_for_display('order');
        $tabuniqid          = $this->get_id();
        $columns            = $this->get_settings_for_display('woolentor_product_grid_column');

        $cross_sell = '';
        if ( !$cross_sell = WC()->cart->get_cross_sells() ) {
            return;
        }else{
            $cross_sell = WC()->cart->get_cross_sells();
        }

        // Query Argument
        $args = array(
            'post_type'              => 'product',
            'ignore_sticky_posts'    => 1,
            'no_found_rows'          => 1,
            'posts_per_page'         => $per_page,
            'orderby'                => $orderby,
            'post__in'               => $cross_sell,
        );

        $products  = new \WP_Query( $args );

        // Calculate Column
        $collumval = ( $settings['product_layout_style'] == 'slider' ) ? 'ht-product mb-30 product ht-col-xs-12' : 'ht-product ht-col-lg-4 ht-col-md-6 ht-col-sm-6 ht-col-xs-12 mb-30 product';
        if( $columns !='' ){
            if( $columns == 5 ){
                $collumval = 'ht-product cus-col-5 ht-col-md-6 ht-col-sm-6 ht-col-xs-12 mb-30 product';
            }else{
                $colwidth = round( 12 / $columns );
                $colwidthtablate = round( 12 / $settings['woolentor_product_grid_column_tablet'] );
                $colwidthmobile = round( 12 / $settings['woolentor_product_grid_column_mobile'] );
                $collumval = 'ht-product ht-col-lg-'.$colwidth.' ht-col-md-'.$colwidthtablate.' ht-col-sm-'.$colwidthtablate.' ht-col-xs-'.$colwidthmobile.' mb-30 product';
            }
        }

        // Action Button Style
        if( $settings['action_button_style'] == 2 ){
            $collumval .= ' ht-product-action-style-2';
        }elseif( $settings['action_button_style'] == 3 ){
            $collumval .= ' ht-product-action-style-2 ht-product-action-round';
        }else{
            $collumval = $collumval;
        }

        // Position Action Button
        if( $settings['action_button_position'] == 'right' ){
            $collumval .= ' ht-product-action-right';
        }elseif( $settings['action_button_position'] == 'bottom' ){
            $collumval .= ' ht-product-action-bottom';
        }elseif( $settings['action_button_position'] == 'middle' ){
            $collumval .= ' ht-product-action-middle';
        }elseif( $settings['action_button_position'] == 'contentbottom' ){
            $collumval .= ' ht-product-action-bottom-content';
        }else{
            $collumval = $collumval;
        }

        // Show Action
        if( $settings['action_button_show_on'] == 'hover' ){
            $collumval .= ' ht-product-action-on-hover';
        }

        // Content Style
        if( $settings['product_content_style'] == 2 ){
            $collumval .= ' ht-product-category-right-bottom';
        }elseif( $settings['product_content_style'] == 3 ){
            $collumval .= ' ht-product-ratting-top-right';
        }elseif( $settings['product_content_style'] == 4 ){
            $collumval .= ' ht-product-content-allcenter';
        }else{
            $collumval = $collumval;
        }

        // Position countdown
        if( $settings['product_countdown_position'] == 'left' ){
            $collumval .= ' ht-product-countdown-left';
        }elseif( $settings['product_countdown_position'] == 'right' ){
            $collumval .= ' ht-product-countdown-right';
        }elseif( $settings['product_countdown_position'] == 'middle' ){
            $collumval .= ' ht-product-countdown-middle';
        }elseif( $settings['product_countdown_position'] == 'bottom' ){
            $collumval .= ' ht-product-countdown-bottom';
        }elseif( $settings['product_countdown_position'] == 'contentbottom' ){
            $collumval .= ' ht-product-countdown-content-bottom';
        }else{
            $collumval = $collumval;
        }

        // Countdown Gutter 
        if( $settings['show_countdown_gutter'] != 'yes' ){
           $collumval .= ' ht-product-countdown-fill'; 
        }

        // Countdown Custom Label
        if( $settings['show_countdown'] == 'yes' ){
            $data_customlavel = [];
            $data_customlavel['daytxt'] = ! empty( $settings['customlabel_days'] ) ? $settings['customlabel_days'] : 'Days';
            $data_customlavel['hourtxt'] = ! empty( $settings['customlabel_hours'] ) ? $settings['customlabel_hours'] : 'Hours';
            $data_customlavel['minutestxt'] = ! empty( $settings['customlabel_minutes'] ) ? $settings['customlabel_minutes'] : 'Min';
            $data_customlavel['secondstxt'] = ! empty( $settings['customlabel_seconds'] ) ? $settings['customlabel_seconds'] : 'Sec';
        }

        // Slider Options
        $is_rtl = is_rtl();
        $direction = $is_rtl ? 'rtl' : 'ltr';
        $slider_settings = [
            'arrows' => ('yes' === $settings['slarrows']),
            'dots' => ('yes' === $settings['sldots']),
            'autoplay' => ('yes' === $settings['slautolay']),
            'autoplay_speed' => absint($settings['slautoplay_speed']),
            'animation_speed' => absint($settings['slanimation_speed']),
            'pause_on_hover' => ('yes' === $settings['slpause_on_hover']),
            'rtl' => $is_rtl,
        ];

        $slider_responsive_settings = [
            'product_items' => $settings['slitems'],
            'scroll_columns' => $settings['slscroll_columns'],
            'tablet_width' => $settings['sltablet_width'],
            'tablet_display_columns' => $settings['sltablet_display_columns'],
            'tablet_scroll_columns' => $settings['sltablet_scroll_columns'],
            'mobile_width' => $settings['slmobile_width'],
            'mobile_display_columns' => $settings['slmobile_display_columns'],
            'mobile_scroll_columns' => $settings['slmobile_scroll_columns'],

        ];
        $slider_settings = array_merge( $slider_settings, $slider_responsive_settings );

        ?>
            <?php
                if( $settings['cross_sell_product_title'] !='' ){
                    echo '<div class="ht-row"><div class="ht-col-lg-12 ht-col-md-12 ht-col-sm-12 ht-col-xs-12"><h2 class="wlcross_sell_product_title">'.esc_html__( $settings['cross_sell_product_title'], 'woolentor-pro' ).'</h2></div></div>';
                }
            ?>

            <?php if( $settings['product_layout_style'] == 'slider' ){ echo '<div class="ht-row">'; } ?>
                <div class="ht-products woocommerce <?php if( $settings['product_layout_style'] == 'slider' ){ echo esc_attr( 'product-slider' ); } else{ echo 'ht-row'; } ?>" dir="<?php echo $direction; ?>" data-settings='<?php if( $settings['product_layout_style'] == 'slider' ){ echo wp_json_encode( $slider_settings ); } ?>'>

                    <?php
                        if( $products->have_posts() ):

                            while( $products->have_posts() ): $products->the_post();

                                // Sale Schedule
                                $offer_start_date_timestamp = get_post_meta( get_the_ID(), '_sale_price_dates_from', true );
                                $offer_start_date = $offer_start_date_timestamp ? date_i18n( 'Y/m/d', $offer_start_date_timestamp ) : '';
                                $offer_end_date_timestamp = get_post_meta( get_the_ID(), '_sale_price_dates_to', true );
                                $offer_end_date = $offer_end_date_timestamp ? date_i18n( 'Y/m/d', $offer_end_date_timestamp ) : '';

                                // Gallery Image
                                global $product;
                                $gallery_images_ids = $product->get_gallery_image_ids() ? $product->get_gallery_image_ids() : array();
                                if ( has_post_thumbnail() ){
                                    array_unshift( $gallery_images_ids, $product->get_image_id() );
                                }

                    ?>

                        <!--Product Start-->
                        <div class="<?php echo $collumval; ?>">
                            <div class="ht-product-inner">

                                <div class="ht-product-image-wrap">
                                    <?php
                                        if( class_exists('WooCommerce') ){ 
                                            woolentor_custom_product_badge(); 
                                            woolentor_sale_flash();
                                        }
                                    ?>
                                    <div class="ht-product-image">
                                        <?php  if( $settings['thumbnails_style'] == 2 && $gallery_images_ids ): ?>
                                            <div class="ht-product-image-slider ht-product-image-thumbnaisl-<?php echo $tabuniqid; ?>" data-slick='{"rtl":<?php if( is_rtl() ){ echo 'true'; }else{ echo 'false'; } ?> }'>
                                                <?php
                                                    foreach ( $gallery_images_ids as $gallery_attachment_id ) {
                                                        echo '<a href="'.esc_url( get_the_permalink() ).'" class="item">'.wp_get_attachment_image( $gallery_attachment_id, 'woocommerce_thumbnail' ).'</a>';
                                                    }
                                                ?>
                                            </div>

                                        <?php elseif( $settings['thumbnails_style'] == 3 && $gallery_images_ids ) : $tabactive = ''; ?>
                                            <div class="ht-product-cus-tab">
                                                <?php
                                                    $i = 0;
                                                    foreach ( $gallery_images_ids as $gallery_attachment_id ) {
                                                        $i++;
                                                        if( $i == 1 ){ $tabactive = 'htactive'; }else{ $tabactive = ' '; }
                                                        echo '<div class="ht-product-cus-tab-pane '.$tabactive.'" id="image-'.$i.get_the_ID().'"><a href="#">'.wp_get_attachment_image( $gallery_attachment_id, 'woocommerce_thumbnail' ).'</a></div>';
                                                    }
                                                ?>
                                            </div>
                                            <ul class="ht-product-cus-tab-links">
                                                <?php
                                                    $j = 0;
                                                    foreach ( $gallery_images_ids as $gallery_attachment_id ) {
                                                        $j++;
                                                        if( $j == 1 ){ $tabactive = 'htactive'; }else{ $tabactive = ' '; }
                                                        echo '<li><a href="#image-'.$j.get_the_ID().'" class="'.$tabactive.'">'.wp_get_attachment_image( $gallery_attachment_id, 'woocommerce_gallery_thumbnail' ).'</a></li>';
                                                    }
                                                ?>
                                            </ul>

                                        <?php else: ?>
                                            <a href="<?php the_permalink();?>"> 
                                                <?php woocommerce_template_loop_product_thumbnail(); ?> 
                                            </a>
                                        <?php endif; ?>
                                    </div>

                                    <?php if( $settings['show_countdown'] == 'yes' && $settings['product_countdown_position'] != 'contentbottom' && $offer_end_date != '' ):

                                        if( $offer_start_date_timestamp && $offer_end_date_timestamp && current_time( 'timestamp' ) > $offer_start_date_timestamp && current_time( 'timestamp' ) < $offer_end_date_timestamp
                                        ): 
                                    ?>
                                        <div class="ht-product-countdown-wrap">
                                            <div class="ht-product-countdown" data-countdown="<?php echo esc_attr( $offer_end_date ); ?>" data-customlavel='<?php echo wp_json_encode( $data_customlavel ) ?>'></div>
                                        </div>
                                    <?php endif; endif; ?>

                                    <?php if( $settings['show_action_button'] == 'yes' ){ if( $settings['action_button_position'] != 'contentbottom' ): ?>
                                        <div class="ht-product-action">
                                            <ul>
                                                <li>
                                                    <a href="javascript:void(0);" class="woolentorquickview" data-quick-id="<?php the_ID();?>" >
                                                        <i class="sli sli-magnifier"></i>
                                                        <span class="ht-product-action-tooltip"><?php esc_html_e('Quick View','woolentor'); ?></span>
                                                    </a>
                                                </li>
                                                <?php
                                                    if ( class_exists( 'YITH_WCWL' ) ) {
                                                        echo '<li>'.woolentor_add_to_wishlist_button('<i class="sli sli-heart"></i>','<i class="sli sli-heart"></i>', 'yes').'</li>';
                                                    }
                                                    if( class_exists('TInvWL_Public_AddToWishlist') ){
                                                        echo '<li>';
                                                            \TInvWL_Public_AddToWishlist::instance()->htmloutput();
                                                        echo '</li>';
                                                    }
                                                ?>
                                                <?php
                                                    if( function_exists('woolentor_compare_button') && class_exists('YITH_Woocompare_Frontend') ){
                                                        echo '<li>';
                                                            woolentor_compare_button(2);
                                                        echo '</li>';
                                                    }
                                                ?>
                                                <li class="woolentor-cart"><?php woocommerce_template_loop_add_to_cart(); ?></li>
                                            </ul>
                                        </div>
                                    <?php endif; }?>

                                </div>

                                <div class="ht-product-content">
                                    <div class="ht-product-content-inner">
                                        <div class="ht-product-categories"><?php woolentor_get_product_category_list(); ?></div>
                                        <h4 class="ht-product-title"><a href="<?php the_permalink(); ?>"><?php echo wp_trim_words( get_the_title(), $settings['title_length'], '' ); ?></a></h4>
                                        <div class="ht-product-price"><?php woocommerce_template_loop_price();?></div>
                                        <div class="ht-product-ratting-wrap"><?php echo woolentor_wc_get_rating_html(); ?></div>

                                        <?php if( $settings['show_action_button'] == 'yes' ){ if( $settings['action_button_position'] == 'contentbottom' ): ?>
                                            <div class="ht-product-action">
                                                <ul>
                                                    <li>
                                                        <a href="javascript:void(0);" class="woolentorquickview" data-quick-id="<?php the_ID();?>" >
                                                            <i class="sli sli-magnifier"></i>
                                                            <span class="ht-product-action-tooltip"><?php esc_html_e('Quick View','woolentor'); ?></span>
                                                        </a>
                                                    </li>
                                                    <?php
                                                        if ( class_exists( 'YITH_WCWL' ) ) {
                                                            echo '<li>'.woolentor_add_to_wishlist_button('<i class="sli sli-heart"></i>','<i class="sli sli-heart"></i>', 'yes').'</li>';
                                                        }
                                                        if( class_exists('TInvWL_Public_AddToWishlist') ){
                                                            echo '<li>';
                                                                \TInvWL_Public_AddToWishlist::instance()->htmloutput();
                                                            echo '</li>';
                                                        }
                                                    ?>
                                                    <?php
                                                        if( function_exists('woolentor_compare_button') && class_exists('YITH_Woocompare_Frontend') ){
                                                            echo '<li>';
                                                                woolentor_compare_button(2);
                                                            echo '</li>';
                                                        }
                                                    ?>
                                                    <li class="woolentor-cart"><?php woocommerce_template_loop_add_to_cart(); ?></li>
                                                </ul>
                                            </div>
                                        <?php endif; } ?>

                                        <?php 
                                            if( $settings['show_product_excerpt'] == 'yes' ){
                                                echo '<div class="woolentor-short-desc">'.wp_trim_words( get_the_excerpt(), $settings['excerpt_length'], '' ).'</div>';
                                            }
                                        ?>

                                    </div>
                                    <?php 
                                        if( $settings['show_countdown'] == 'yes' && $settings['product_countdown_position'] == 'contentbottom' && $offer_end_date != ''  ):

                                            if( $offer_start_date_timestamp && $offer_end_date_timestamp && current_time( 'timestamp' ) > $offer_start_date_timestamp && current_time( 'timestamp' ) < $offer_end_date_timestamp
                                            ):
                                    ?>
                                        <div class="ht-product-countdown-wrap">
                                            <div class="ht-product-countdown" data-countdown="<?php echo esc_attr( $offer_end_date ); ?>" data-customlavel='<?php echo wp_json_encode( $data_customlavel ) ?>'></div>
                                        </div>
                                    <?php endif; endif; ?>
                                </div>

                            </div>
                        </div>
                        <!--Product End-->

                    <?php endwhile; wp_reset_query(); wp_reset_postdata(); endif; ?>
                </div>
            <?php if( $settings['product_layout_style'] == 'slider' ){ echo '</div>'; } ?>

            <?php if ( Plugin::instance()->editor->is_edit_mode() ) { ?>
                <script>
                    jQuery(document).ready(function($) {
                        'use strict';
                        $(".ht-product-image-thumbnaisl-<?php echo $tabuniqid; ?>").slick({
                            dots: true,
                            arrows: true,
                            prevArrow: '<button class="slick-prev"><i class="sli sli-arrow-left"></i></button>',
                            nextArrow: '<button class="slick-next"><i class="sli sli-arrow-right"></i></button>',
                        });
                    });
                </script>
            <?php } ?>

        <?php

    }

}

Plugin::instance()->widgets_manager->register_widget_type( new Woolentor_Universal_Cross_Sell_Product_Layout_Widget() );