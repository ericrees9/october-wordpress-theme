<?php
/**
 * October Class
 *
 * Modularizes theme functionality.
 */

if ( ! class_exists( 'October' ) ) :

class October {

    /**
     * Constructor
     */
    public function __construct() {
        $this->load_dependencies();
        $this->init_hooks();
    }

    /**
     * Load required dependencies
     */
    private function load_dependencies() {
        // Include modular class files
        require_once get_template_directory() . '/lib/classes/class-october-scripts.php';
        require_once get_template_directory() . '/lib/classes/class-october-widgets.php';
        require_once get_template_directory() . '/lib/classes/class-october-custom-post-types.php';
        require_once get_template_directory() . '/lib/classes/class-october-blocks.php';
        require_once get_template_directory() . '/lib/classes/class-october-fonts-enqueuer.php';
    }

    /**
     * Initialize hooks
     */
    private function init_hooks() {
        // Initialize scripts and styles
        $october_scripts = new October_Scripts();
        $october_scripts->register();

        // Initialize widgets
        $october_widgets = new October_Widgets();
        $october_widgets->register();

        // Initialize custom post types
        $october_cpt = new October_Custom_Post_Types();
        $october_cpt->register();

        // Initialize blocks    
        $october_blocks = new October_Blocks();

        // Initialize fonts enqueuer
        $fonts_to_load = [
            [
                'family'   => 'Karla',
                'variants' => [
                    [ 'weight' => '400', 'italic' => false ],
                    [ 'weight' => '600', 'italic' => false  ],
                    [ 'weight' => '800', 'italic' => false  ],
                ],
            ],
            [
                'family'   => 'Inconsolata',
                'variants' => [
                    [ 'weight' => '200', 'italic' => true ],
                    [ 'weight' => '400', 'italic' => true ],
                    [ 'weight' => '600', 'italic' => true  ],
                    [ 'weight' => '900', 'italic' => true  ],
                ],
            ],
        ];
        $october_fonts = new October_Fonts_Enqueuer( $fonts_to_load );
    }

    // Add more methods to handle different functionalities

}

endif; // End if class_exists check
