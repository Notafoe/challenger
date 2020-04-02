<?php
/**
 * Login Form
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>
<div class="woocommerce woolentor-woocommerce-myaccount-login-page">
	<?php do_action( 'woocommerce_before_customer_login_form' ); ?>
    	<div id="customer_login">
    	   <?php do_action( 'woolentor_woocommerce_account_content_form_login' ); ?>
    	</div>
	<?php do_action( 'woocommerce_after_customer_login_form' ); ?>
</div>
