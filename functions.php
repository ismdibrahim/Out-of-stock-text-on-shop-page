<?php

/**
 * Change add to cart button text to Out of stock
*/
add_filter( 'woocommerce_product_add_to_cart_text', 'archive_custom_cart_button_text' );
  
function archive_custom_cart_button_text( $text ) {
   global $product;       
   if ( $product && ! $product->is_in_stock() ) {           
      return 'Out of stock';
   } 
   return $text;
}

/**
 * Change price to Out of stock text
*/

add_filter('woocommerce_get_price_html', 'change_sold_out_product_price_html', 100, 2 );
function change_sold_out_product_price_html( $price_html, $product ) {
    if ( ! $product->is_in_stock() ) {
        $price_html = __("Out of stock", "woocommerce");
    }
    return $price_html;
}

/**
 * How to change woocommerce product stock status text
*/
function puri_woocommerce_get_availability_text( $text, $product ) {
    if (!$product->is_in_stock()) {
        $text = 'SOLD OUT';
    } else {
    // You can add more conditions here. e.g if product is available.
    // $text = 'Available right now';
    }
    return $text;
}

add_filter( 'woocommerce_get_availability_text', 'puri_woocommerce_get_availability_text', 999, 2);
