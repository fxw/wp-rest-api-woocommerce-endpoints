<?php
/*
Plugin Name: WP REST API (V2) Woocommerce endpoints
Description: WP REST API (V2) Modifications for Woocommerce endpoints.
Author: Fx Wiplier
Version: 1.1
Author URI: http://www.wiplier.com
*/


add_action( 'rest_api_init', 'bs_add_custom_rest_fields' );

function bs_add_custom_rest_fields() {
    // schema for the bs_author_name field
    $bs_author_name_schema = array(
        'description'   => 'Name of the post author',
        'type'          => 'string',
        'context'       =>   array( 'view' )
    );

    // registering the bs_author_name field
    register_rest_field(
        'post',
        'bs_author_name',
        array(
            'get_callback'      => 'bs_get_author_name',
            'update_callback'   => null,
            'schema'            => $bs_author_name_schema
        )
    );
}

/**
 * Callback for retrieving author name
 * @param  array            $object         The current post object
 * @param  string           $field_name     The name of the field
 * @param  WP_REST_request  $request        The current request
 * @return string                           The name of the author
 */
function bs_get_author_name( $object, $field_name, $request ) {
    return get_the_author_meta( 'display_name', $object['author'] );
}

//if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

add_action( 'rest_api_init', 'slug_register_fields' );
function slug_register_fields() {
    foreach( array( 'starship', 'warship' ) as $field ) {
        register_rest_field( 'post',
            $field,
            array(
                'get_callback'    => 'slug_get_starship',
                'update_callback' => null,
                'schema'          => null,
            )
        );
    }
}

/**
 * Get the value of the "starship" field
 *
 * @param array $object Details of current post.
 * @param string $field_name Name of field.
 * @param WP_REST_Request $request Current request
 *
 * @return mixed
 */
function slug_get_starship( $object, $field_name, $request ) {
    return get_post_meta( $object[ 'id' ], $field_name, true );
}



        if ( ! function_exists ( 'wp_rest_is_shop_init' ) ) :

            /**
             * Init JSON REST API is_shop endpoint.
             *
             * @since 1.0.0
             */
            function wp_rest_is_shop_init() {
                register_rest_field(
                    'page',
                    'is_shop',
                    array(
                        'get_callback' => 'wp_rest_is_shop',
                    )
                );
            }

            /**
             * Handler for updating page data with is_shop.
             *
             * @since 1.0.0
             *
             * @param array $object The object from the response
             * @param string $field_name Name of field
             * @param WP_REST_Request $request Current request
             *
             * @return bool
             */
            function wp_rest_is_shop( $object, $field_name, $request ) {
                return wc_get_page_id( 'shop' ) === $object['id'];
            }

            add_action( 'rest_api_init', 'wp_rest_is_shop_init' );

        endif;

        if ( ! function_exists ( 'wp_rest_is_cart_init' ) ) :

            /**
             * Init JSON REST API is_cart endpoint.
             *
             * @since 1.0.0
             */
            function wp_rest_is_cart_init() {
                register_rest_field(
                    'page',
                    'is_cart',
                    array(
                        'get_callback' => 'wp_rest_is_cart',
                    )
                );
            }

            /**
             * Handler for updating page data with is_cart.
             *
             * @since 1.0.0
             *
             * @param array $object The object from the response
             * @param string $field_name Name of field
             * @param WP_REST_Request $request Current request
             *
             * @return bool
             */
            function wp_rest_is_cart( $object, $field_name, $request ) {
                return wc_get_page_id( 'cart' ) === $object['id'];
            }

            add_action( 'init', 'wp_rest_is_cart_init' );

        endif;

        if ( ! function_exists ( 'wp_rest_is_checkout_init' ) ) :

            /**
             * Init JSON REST API is_checkout endpoint.
             *
             * @since 1.0.0
             */
            function wp_rest_is_checkout_init() {
                register_rest_field(
                    'page',
                    'is_checkout',
                    array(
                        'get_callback' => 'wp_rest_is_checkout',
                    )
                );
            }

            /**
             * Handler for updating page data with is_checkout.
             *
             * @since 1.0.0
             *
             * @param array $object The object from the response
             * @param string $field_name Name of field
             * @param WP_REST_Request $request Current request
             *
             * @return bool
             */
            function wp_rest_is_checkout( $object, $field_name, $request ) {
                return wc_get_page_id( 'checkout' ) === $object['id'];
            }

            add_action( 'init', 'wp_rest_is_checkout_init' );

        endif;

        if ( ! function_exists ( 'wp_rest_is_account_page_init' ) ) :

            /**
             * Init JSON REST API is_account_page endpoint.
             *
             * @since 1.0.0
             */
            function wp_rest_is_account_page_init() {
                register_rest_field(
                    'page',
                    'is_account_page',
                    array(
                        'get_callback' => 'wp_rest_is_account_page',
                    )
                );
            }

            /**
             * Handler for updating page data with is_account_page.
             *
             * @since 1.0.0
             *
             * @param array $object The object from the response
             * @param string $field_name Name of field
             * @param WP_REST_Request $request Current request
             *
             * @return bool
             */
            function wp_rest_is_account_page( $object, $field_name, $request ) {
                return wc_get_page_id( 'myaccount' ) === $object['id'];
            }

            add_action( 'init', 'wp_rest_is_account_page_init' );

        endif;


