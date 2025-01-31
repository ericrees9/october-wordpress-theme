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
            // Construct the path to the individual block's PHP file
            $block_php = trailingslashit( $block_dir ) . 'individual-block.php';
            
            if ( file_exists( $block_php ) ) {
                include_once $block_php;
            }
        }
    }
}

endif; // End if class_exists check
