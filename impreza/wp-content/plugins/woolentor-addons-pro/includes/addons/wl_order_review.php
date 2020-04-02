<?php
namespace Elementor;


if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class WL_Checkout_Order_Review_Element extends Widget_Base {

    public function get_name() {
        return 'wl-checkout-order-review';
    }
    
    public function get_title() {
        return __( 'WL: Checkout Order Review', 'woolentor-pro' );
    }

    public function get_icon() {
        return 'eicon-table';
    }

    public function get_categories() {
        return array( 'woolentor-addons-pro' );
    }

    protected function _register_controls() {

        // Heading
        $this->start_controls_section(
            'form_heading_style',
            array(
                'label' => __( 'Heading', 'woolentor-pro' ),
                'tab' => Controls_Manager::TAB_STYLE,
            )
        );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                array(
                    'name'      => 'form_heading_typography',
                    'label'     => __( 'Typography', 'woolentor-pro' ),
                    'selector'  => '{{WRAPPER}} #order_review_heading',
                )
            );

            $this->add_control(
                'form_heading_color',
                [
                    'label' => __( 'Color', 'woolentor-pro' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} #order_review_heading' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_responsive_control(
                'form_heading_margin',
                [
                    'label' => __( 'Margin', 'woolentor-pro' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', 'em', '%' ],
                    'selectors' => [
                        '{{WRAPPER}} #order_review_heading' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'form_heading_align',
                [
                    'label'        => __( 'Alignment', 'woolentor-pro' ),
                    'type'         => Controls_Manager::CHOOSE,
                    'options'      => [
                        'left'   => [
                            'title' => __( 'Left', 'woolentor-pro' ),
                            'icon'  => 'fa fa-align-left',
                        ],
                        'center' => [
                            'title' => __( 'Center', 'woolentor-pro' ),
                            'icon'  => 'fa fa-align-center',
                        ],
                        'right'  => [
                            'title' => __( 'Right', 'woolentor-pro' ),
                            'icon'  => 'fa fa-align-right',
                        ],
                        'justify' => [
                            'title' => __( 'Justified', 'woolentor-pro' ),
                            'icon' => 'fa fa-align-justify',
                        ],
                    ],
                    'default'   => 'left',
                    'selectors' => [
                        '{{WRAPPER}} #order_review_heading' => 'text-align: {{VALUE}}',
                    ],
                ]
            );

        $this->end_controls_section();

        // Table Heading
        $this->start_controls_section(
            'checkout_order_table_heading_style',
            array(
                'label' => __( 'Table Heading', 'woolentor-pro' ),
                'tab' => Controls_Manager::TAB_STYLE,
            )
        );
            
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                array(
                    'name'      => 'checkout_order_table_heading_typography',
                    'label'     => __( 'Typography', 'woolentor-pro' ),
                    'selector'  => '{{WRAPPER}} .woocommerce-checkout-review-order-table th',
                )
            );

            $this->add_control(
                'checkout_order_table_heading_color',
                [
                    'label' => __( 'Color', 'woolentor-pro' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .woocommerce-checkout-review-order-table th' => 'color: {{VALUE}}',
                    ],
                ]
            );

        $this->end_controls_section();

        // Table Content
        $this->start_controls_section(
            'checkout_order_table_content_style',
            array(
                'label' => __( 'Table Content', 'woolentor-pro' ),
                'tab' => Controls_Manager::TAB_STYLE,
            )
        );
            
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                array(
                    'name'      => 'checkout_order_table_content_typography',
                    'label'     => __( 'Typography', 'woolentor-pro' ),
                    'selector'  => '{{WRAPPER}} .woocommerce-checkout-review-order-table td, {{WRAPPER}} .woocommerce-checkout-review-order-table td strong',
                )
            );

            $this->add_control(
                'checkout_order_table_content_color',
                [
                    'label' => __( 'Color', 'woolentor-pro' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .woocommerce-checkout-review-order-table td' => 'color: {{VALUE}}',
                        '{{WRAPPER}} .woocommerce-checkout-review-order-table td strong' => 'color: {{VALUE}}',
                    ],
                ]
            );

        $this->end_controls_section();

        // Price
        $this->start_controls_section(
            'checkout_order_table_price_style',
            array(
                'label' => __( 'Price', 'woolentor-pro' ),
                'tab' => Controls_Manager::TAB_STYLE,
            )
        );
            
            $this->add_control(
                'checkout_order_table_price_heading',
                [
                    'label' => __( 'Price', 'woolentor-pro' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'after',
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                array(
                    'name'      => 'checkout_order_table_price_typography',
                    'label'     => __( 'Typography', 'woolentor-pro' ),
                    'selector'  => '{{WRAPPER}} .woocommerce-checkout-review-order-table td.product-total',
                )
            );

            $this->add_control(
                'checkout_order_table_price_color',
                [
                    'label' => __( 'Color', 'woolentor-pro' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .woocommerce-checkout-review-order-table td.product-total' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_control(
                'checkout_order_table_totalprice_heading',
                [
                    'label' => __( 'Total Price', 'woolentor-pro' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'after',
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                array(
                    'name'      => 'checkout_order_table_totalprice_typography',
                    'label'     => __( 'Typography', 'woolentor-pro' ),
                    'selector'  => '{{WRAPPER}} .woocommerce-checkout-review-order-table tr.cart-subtotal td .amount, {{WRAPPER}} .woocommerce-checkout-review-order-table tr.order-total td .amount',
                )
            );

            $this->add_control(
                'checkout_order_table_totalprice_color',
                [
                    'label' => __( 'Color', 'woolentor-pro' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .woocommerce-checkout-review-order-table tr.cart-subtotal td .amount' => 'color: {{VALUE}}',
                        '{{WRAPPER}} .woocommerce-checkout-review-order-table tr.order-total td .amount' => 'color: {{VALUE}}',
                    ],
                ]
            );

        $this->end_controls_section();

    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        if ( Plugin::instance()->editor->is_edit_mode() ) {
            ?>
                <h3 id="order_review_heading"><?php esc_html_e( 'Your order', 'woolentor-pro' ); ?></h3>
            <?php
            woocommerce_order_review();
        }else{
            if( is_checkout() ){
                ?>
                    <h3 id="order_review_heading"><?php esc_html_e( 'Your order', 'woolentor-pro' ); ?></h3>
                <?php
                woocommerce_order_review();
            }
        }
    }

}

Plugin::instance()->widgets_manager->register_widget_type( new WL_Checkout_Order_Review_Element() );