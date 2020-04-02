<?php defined( 'ABSPATH' ) OR die( 'This script cannot be accessed directly.' );

/**
 * Shortcode attributes
 *
 * @var $el_class
 * @var $css_animation
 * @var $css
 * @var $content - shortcode content
 * Shortcode class
 * @var $this WPBakeryShortCode_VC_Column_text
 * @var $classes string Extend class names
 */

$classes = isset( $classes ) ? $classes : '';

// When text color is set in Design Options, add the specific class
if ( us_design_options_has_property( $css, 'color' ) ) {
	$classes .= ' has_text_color';
}

if ( ! empty( $el_class ) ) {
	$classes .= ' ' . $el_class;
}

$el_id_string = '';
if ( $el_id != '' ) {
	$el_id_string = ' id="' . esc_attr( $el_id ) . '"';
}

// Output the element
$output = '<div class="wpb_text_column' . $classes . '"' . $el_id_string . '>';
$output .= '<div class="wpb_wrapper">' . apply_filters( 'widget_text_content', $content ) . '</div>';
$output .= '</div>';

echo $output;
