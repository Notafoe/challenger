<?php
/**
 * Empty Cart Page 
 */

// Exit if accessed directly
if( ! defined( 'ABSPATH' ) ) exit();

?>
<div class="woocommerce woolentor-elementor-empty-cart">
    <?php
        do_action( 'woolentor_cartempty_content_build' );
    ?>
</div>