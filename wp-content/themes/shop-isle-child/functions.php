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
    wp_enqueue_script('wc-checkout', get_template_directory_uri() . '/woocommerce/js/checkout.js');
}

 
