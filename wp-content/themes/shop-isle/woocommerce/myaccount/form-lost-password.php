<?php
/**
 * Lost password form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-lost-password.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

wc_print_notices(); ?>

<form method="post" class="woocommerce-ResetPassword lost_reset_password">
	<div class="forgot_password_div">
		<p class="woocommerce-FormRow form-row">
		<?php echo apply_filters( 'woocommerce_lost_password_message', __( 'Lost your password? Please enter your username or email address. You will receive a link to create a new password via email.', 'woocommerce' ) ); ?>
		</p>

		<p class="woocommerce-FormRow form-row">
			<label for="user_login"><?php _e( 'Email', 'woocommerce' ); ?></label>
			<input class="woocommerce-Input woocommerce-Input--text input-text" type="text" name="user_login" id="user_login"/>
		</p>

		<?php do_action( 'woocommerce_lostpassword_form' ); ?>

		<p class="woocommerce-FormRow form-row" style="text-align:center;">
			<input type="hidden" name="wc_reset_password" value="true" />
			<input type="submit" class="woocommerce-Button button" value="<?php esc_attr_e( 'Reset Password', 'woocommerce' ); ?>" style="float:none; margin:auto;"/>
		</p>

		<?php wp_nonce_field( 'lost_password' ); ?>
	</div>
</form>
