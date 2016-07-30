<?php

//point to the css file of the parent theme
add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );

function enqueue_parent_styles() {
   wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}

//for overriding the original checkout.js of woocommerce
add_action('wp_enqueue_scripts', 'override_woo_frontend_scripts');

function override_woo_frontend_scripts() {
    wp_deregister_script('wc-checkout');
    wp_enqueue_script('wc-checkout', get_stylesheet_directory_uri() . '/woocommerce/js/checkout.js');
}

/**

* Add new register fields for WooCommerce registration.

*

* @return string Register fields HTML.

*/

function wooc_extra_register_fields() {

       ?>

       <p class="form-row form-row-first">

       <label for="reg_billing_first_name"><?php _e( 'First name', 'woocommerce' ); ?><span class="required">*</span></label>

       <input type="text" class="input-text" name="billing_first_name" id="reg_billing_first_name" value="<?php if ( ! empty( $_POST['billing_first_name'] ) ) esc_attr_e( $_POST['billing_first_name'] ); ?>" />

       </p>

       <p class="form-row form-row-last">

       <label for="reg_billing_last_name"><?php _e( 'Last name', 'woocommerce' ); ?><span class="required">*</span></label>

       <input type="text" class="input-text" name="billing_last_name" id="reg_billing_last_name" value="<?php if ( ! empty( $_POST['billing_last_name'] ) ) esc_attr_e( $_POST['billing_last_name'] ); ?>" />

       </p>

       <?php

}

add_action( 'woocommerce_register_form_start', 'wooc_extra_register_fields' );

/**

* Validate the extra register fields.

*

* @param string $username         Current username.

* @param string $email             Current email.

* @param object $validation_errorsWP_Error object.

*

* @return void

*/

function wooc_validate_extra_register_fields($username, $email, $validation_errors) {

       if ( isset( $_POST['billing_first_name'] ) && empty( $_POST['billing_first_name'] ) ) {

              $validation_errors->add( 'billing_first_name_error', __( '<strong>Error</strong>: First name is required!', 'woocommerce' ) );
       }


       if ( isset( $_POST['billing_last_name'] ) && empty( $_POST['billing_last_name'] ) ) {

              $validation_errors->add( 'billing_last_name_error', __( '<strong>Error</strong>: Last name is required!.', 'woocommerce' ) );

       }

}

add_action( 'woocommerce_register_post', 'wooc_validate_extra_register_fields', 10, 3);

// Add the code below to your theme's functions.php file to add a confirm password field on the register form under My Accounts.
add_filter('woocommerce_registration_errors', 'registration_errors_validation', 10,3);

function registration_errors_validation($reg_errors, $sanitized_user_login, $user_email) {
	global $woocommerce;
	extract( $_POST );
	if ( strcmp( $password, $password2 ) !== 0 ) {
		unset($_POST['password2']);
		return new WP_Error( 'registration-error', __( 'Passwords do not match.', 'woocommerce' ) );
	}
	return $reg_errors;
}
add_action( 'woocommerce_register_form', 'wc_register_form_password_repeat' );

function wc_register_form_password_repeat() {
	?>
	<p class="form-row form-row-wide">
		<label for="reg_password2"><?php _e( 'Confirm Password', 'woocommerce' ); ?> <span class="required">*</span></label>
		<input type="password" class="input-text" name="password2" id="reg_password2" value="<?php if ( ! empty( $_POST['password2'] ) ) echo esc_attr( $_POST['password2'] ); ?>" />
	</p>
	<?php
}

// this is just to prevent the user log in automatically after register
function wc_registration_redirect( $redirect_to ) {
        wp_logout();
        wp_redirect(get_site_url() . '/my-account/');
        
        //exit;
}
// when user login, we will check whether this guy email is verify
function wp_authenticate_user( $userdata ) {
        $isActivated = get_user_meta($userdata->ID, 'is_activated', true);
        if ( !$isActivated ) {
                $userdata = new WP_Error(
                                'inkfool_confirmation_error',
                                __( '<strong>ERROR:</strong> Your account has to be activated before you can login. You can resend by clicking <a href="/sign-in/?u='.$userdata->ID.'">here</a>', 'inkfool' )
                                );
        }
        return $userdata;
}
// when a user register we need to send them an email to verify their account
function my_user_register($user_id) {
        // get user data
        $user_info = get_userdata($user_id);
        // create md5 code to verify later
        $code = md5(time());
        // make it into a code to send it to user via email
        $string = array('id'=>$user_id, 'code'=>$code);
        // create the activation code and activation status
        update_user_meta($user_id, 'is_activated', 0);
        update_user_meta($user_id, 'activationcode', $code);
        // create the url
        $url = get_site_url() . '/my-account/?p=' . base64_encode( serialize($string));
        // basically we will edit here to make this nicer
        $html = 'Please click the following links <br/><br/> <a href="'.$url.'">'.$url.'</a>';
        // send an email out to user
        wc_mail($user_info->user_email, __('Please activate your account'), $html);
}
// we need this to handle all the getty hacks i made
function my_init(){
        // check whether we get the activation message
        if(isset($_GET['p'])){
                $data = unserialize(base64_decode($_GET['p']));
                $code = get_user_meta($data['id'], 'activationcode', true);
                // check whether the code given is the same as ours
                if($code == $data['code']){
                        // update the db on the activation process
                        update_user_meta($data['id'], 'is_activated', 1);
                        wc_add_notice( __( '<strong>Success:</strong> Your account has been activated! ', 'inkfool' )  );
                }else{
                        wc_add_notice( __( '<strong>Error:</strong> Activation fails, please contact our administrator. ', 'inkfool' )  );
                }
        }
        if(isset($_GET['q'])){
                wc_add_notice( __( '<strong>Error:</strong> Your account has to be activated before you can login. Please check your email.', 'inkfool' ) );
        }
        if(isset($_GET['u'])){
                my_user_register($_GET['u']);
                wc_add_notice( __( '<strong>Success:</strong> Your activation email has been resend. Please check your email.', 'inkfool' ) );
        }
}
// hooks handler
/**add_action( 'init', 'my_init' );
add_filter('woocommerce_registration_redirect', 'wc_registration_redirect');
add_filter('wp_authenticate_user', 'wp_authenticate_user',10,2);
add_action('user_register', 'my_user_register',10,2);
**/


//for removing fonts
function remove_fonts() {
	wp_dequeue_style('garfunkel-googleFonts' );
}
add_action('wp_print_styles', 'remove_fonts', 11);

add_filter( 'woocommerce_short_description', 'A2A_SHARE_SAVE_add_to_content', 98 );