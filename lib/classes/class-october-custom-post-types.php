<?php
/**
 * October Custom Post Types Class
 *
 * Handles registration of custom post types.
 */

if ( ! class_exists( 'October_Custom_Post_Types' ) ) :

class October_Custom_Post_Types {

    /**
     * Register custom post types
     */
    public function register() {
        add_action( 'init', array( $this, 'register_portfolio_post_type' ) );
        // Register more custom post types as needed
    }

    /**
     * Register Portfolio Post Type
     */
    public function register_portfolio_post_type() {
        register_post_type( 'portfolio', array(
            'labels' => array(
                'name'          => __( 'Portfolios', 'october' ),
                'singular_name' => __( 'Portfolio', 'october' ),
                'add_new_item'  => __( 'Add New Portfolio', 'october' ),
                'edit_item'     => __( 'Edit Portfolio', 'october' ),
                'new_item'      => __( 'New Portfolio', 'october' ),
                'view_item'     => __( 'View Portfolio', 'october' ),
                'search_items'  => __( 'Search Portfolios', 'october' ),
                'not_found'     => __( 'No portfolios found', 'october' ),
                'not_found_in_trash' => __( 'No portfolios found in Trash', 'october' ),
            ),
            'public'        => true,
            'has_archive'   => true,
            'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
            'menu_icon'     => 'dashicons-portfolio',
            'rewrite'       => array( 'slug' => 'portfolios' ),
        ) );
    }

}

endif; // End if class_exists check
