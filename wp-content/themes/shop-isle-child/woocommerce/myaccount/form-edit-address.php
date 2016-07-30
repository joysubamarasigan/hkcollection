<?php
/**
 * Edit address form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-edit-address.php.
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

$load_address = ($load_address == '') ? 'billing' : $load_address;

$customer_id = get_current_user_id();

if ( ! wc_ship_to_billing_address_only() && wc_shipping_enabled() ) {
	$get_addresses = apply_filters( 'woocommerce_my_account_get_addresses', array(
		'billing' => __( 'Billing Address', 'woocommerce' ),
		'shipping' => __( 'Shipping Address', 'woocommerce' )
	), $customer_id );
} else {
	$get_addresses = apply_filters( 'woocommerce_my_account_get_addresses', array(
		'billing' =>  __( 'Billing & Shipping Address', 'woocommerce' )
	), $customer_id );
}

$page_title = ( $load_address === 'billing' ) ? __( 'Billing Address', 'woocommerce' ) : __( 'Shipping Address', 'woocommerce' );

do_action( 'woocommerce_before_edit_account_address_form' ); ?>

	<form method="post">
	
	<div class="u-columns col1-set" id="customer_details">
		<div class="u-column col-1" id="personal_div">

		<?php

			foreach($get_addresses as $name => $title):

				$address = WC()->checkout()->checkout_fields[$name];
			
		?>
			<fieldset>
				<legend>
					<?php echo apply_filters( 'woocommerce_my_account_edit_address_title', $page_title ); ?>
				</legend>

			<?php do_action( "woocommerce_before_edit_address_form_{$load_address}" ); ?>

			<?php 
				
				foreach ($address as $key => $field ) :

				if(!isset($field['value'])){
				
					$address[$key]['value'] = get_user_meta( $customer_id, $key, true);

				}
				
				woocommerce_form_field( $key, $field, ! empty( $_POST[ $key ] ) ? wc_clean( $_POST[$key] ) : $address[$key]['value']); ?>

			<?php endforeach;?>

			</fieldset>

		<?php endforeach; ?>

			<?php do_action( "woocommerce_after_edit_address_form_{$load_address}" ); ?>

				<p style="text-align:center;">
					<input type="submit" class="button" name="save_address" value="<?php esc_attr_e( 'Save Address', 'woocommerce' ); ?>" style="float: none; margin: 20px auto;"/>
					<?php wp_nonce_field( 'woocommerce-edit_address' ); ?>
					<input type="hidden" name="action" value="edit_address" />
				</p>
		</div>
	</div>
	</form>

<?php do_action( 'woocommerce_after_edit_account_address_form' ); ?>
