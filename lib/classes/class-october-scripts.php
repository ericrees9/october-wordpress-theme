<?php
/**
 * October Scripts Class
 *
 * Handles enqueuing of scripts and styles.
 */

if ( ! class_exists( 'October_Scripts' ) ) :

class October_Scripts {

    /**
     * Register scripts and styles
     */
    public function register() {
        add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
        add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_scripts' ) );
        add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_custom_ajax_navigation') );
        // add_filter( 'body_class', array( $this, 'add_page_slug_body_class' ) );
    }

    /**
     * Enqueue frontend scripts and styles
     */
    public function enqueue_scripts() {
        // Enqueue additional frontend styles from /dist
        wp_enqueue_style( 'october-frontend-style', get_template_directory_uri() . '/dist/scripts.css', array(), filemtime( get_template_directory() . '/dist/scripts.css' ) );

        // Enqueue additional frontend scripts from /dist
        wp_enqueue_script( 'october-frontend-script', get_template_directory_uri() . '/dist/scripts.js', array(), filemtime( get_template_directory() . '/dist/scripts.js' ), true );
    }

    /**
     * Enqueue admin-specific scripts and styles
     */
    public function enqueue_admin_scripts() {
        // Example: Enqueue admin styles
        // wp_enqueue_style( 'october-admin-style', get_template_directory_uri() . '/dist/scripts.css', array(), filemtime( get_template_directory() . '/dist/scripts.css' ) );

        // Example: Enqueue admin scripts
        // wp_enqueue_script( 'october-admin-script', get_template_directory_uri() . '/dist/scripts.js', array(), filemtime( get_template_directory() . '/dist/scripts.js' ), true );
    }

    /**
     * Register Block Assets
     */
    public function register_block_assets() {
        // Path to blocks directory
        $blocks_dir = get_template_directory() . '/lib/blocks/';

        // Iterate through each block folder
        $blocks = glob( $blocks_dir . '*/individual-block.php' );

        if ( $blocks ) {
            foreach ( $blocks as $block ) {
                include_once $block;
            }
        }
    }

    public function enqueue_custom_ajax_navigation() {
        // wp_enqueue_script('ajax-page-load', get_template_directory_uri() . '/lib/js/ajax-scripts.js', array(), null, true);
    }

    // public function add_page_slug_body_class( $classes ) {
    //     global $post;
    //     if ( isset( $post ) ) {
    //         $classes[] =  $post->post_name;
    //     }
    //     return $classes;
    // }

}

endif; // End if class_exists check
