<?php
/**
 * October Blocks Class
 *
 * Handles registration of all custom blocks.
 */

if ( ! class_exists( 'October_Blocks' ) ) :

class October_Blocks {

    /**
     * Constructor
     */
    public function __construct() {
        add_action( 'init', array( $this, 'register_blocks' ) );
    }

    /**
     * Register all custom blocks
     */
    public function register_blocks() {
        // Path to blocks directory
        $blocks_dir = get_template_directory() . '/lib/blocks/';

        // Get all individual block directories
        $blocks = glob( $blocks_dir . '*/', GLOB_ONLYDIR );

        foreach ( $blocks as $block_dir ) {
            // Extract the directory name
            $block_name = basename( $block_dir );

            // Construct the path to the block's PHP file
            $block_php = trailingslashit( $block_dir ) . $block_name . '.php';
            
            if ( file_exists( $block_php ) ) {
                include_once $block_php;
                // error_log('Loading block file: ' . $block_php);
            }
        }
    }
}

endif; // End if class_exists check
