<?php
/**
 * October Widgets Class
 *
 * Handles widget registrations and custom widgets.
 */

if ( ! class_exists( 'October_Widgets' ) ) :

class October_Widgets {

    /**
     * Register widgets
     */
    public function register() {
        add_action( 'widgets_init', array( $this, 'register_widget_areas' ) );

        // Register custom widgets if any
        // require_once get_template_directory() . '/lib/classes/widgets/class-october-custom-widget.php';
        // register_widget( 'October_Custom_Widget' );
    }

    /**
     * Register widget areas
     */
    public function register_widget_areas() {
        register_sidebar( array(
            'name'          => __( 'Header Widget Area', 'october' ),
            'id'            => 'header-1',
            'description'   => __( 'Add widgets here to appear in your header.', 'october' ),
            'before_widget' => '<div id="%1$s" class="header-widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h2 class="header-widget-title">',
            'after_title'   => '</h2>',
        ) );

        // Add more widget areas as needed
    }

}

endif; // End if class_exists check
