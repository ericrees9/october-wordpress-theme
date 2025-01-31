<?php
/**
 * Theme Functions File
 *
 * Sets up theme defaults, enqueues scripts and styles, and initializes the October class.
 */

/**
 * Theme Setup
 */
function october_setup() {
    // Make theme available for translation
    load_theme_textdomain( 'october', get_template_directory() . '/languages' );

    // Add default posts and comments RSS feed links to head
    add_theme_support( 'automatic-feed-links' );

    // Let WordPress manage the document title
    add_theme_support( 'title-tag' );

    // Enable support for Post Thumbnails on posts and pages
    add_theme_support( 'post-thumbnails' );

    // Register a primary menu location
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'october' ),
    ) );

    // Switch default core markup for search form, comment form, etc., to output valid HTML5
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ) );

    // Enable support for Post Formats
    add_theme_support( 'post-formats', array(
        'aside',
        'image',
        'video',
        'quote',
        'link',
    ) );

    // Set up the WordPress core custom background feature
    add_theme_support( 'custom-background', apply_filters( 'october_custom_background_args', array(
        'default-color' => 'ffffff',
        'default-image' => '',
    ) ) );

    // Add support for custom logo
    add_theme_support( 'custom-logo', array(
        'height'      => 250,
        'width'       => 250,
        'flex-width'  => true,
        'flex-height' => true,
    ) );

    // Add support for selective refresh for widgets
    add_theme_support( 'customize-selective-refresh-widgets' );

    // Add support for responsive embeds
    add_theme_support( 'responsive-embeds' );

    // Add support for editor styles
    add_theme_support( 'editor-styles' );
    add_editor_style( 'css/editor-style.css' );
}
add_action( 'after_setup_theme', 'october_setup' );

/**
 * Register Widget Areas
 */
function october_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Sidebar', 'october' ),
        'id'            => 'sidebar-1',
        'description'   => __( 'Add widgets here to appear in your sidebar.', 'october' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer Area', 'october' ),
        'id'            => 'footer-1',
        'description'   => __( 'Add widgets here to appear in your footer.', 'october' ),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="footer-widget-title">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'october_widgets_init' );

/**
 * Register Custom Image Sizes
 */
function october_image_sizes() {
    add_image_size( 'october-featured', 800, 600, true );
    add_image_size( 'october-thumbnail', 300, 200, true );
}
add_action( 'after_setup_theme', 'october_image_sizes' );

/**
 * Enqueue Scripts and Styles
 *
 * Note: This can also be handled by the October class for better modularization.
 */
// function october_enqueue_scripts() {
//     // Enqueue main stylesheet from /dist
//     wp_enqueue_style( 'october-style', get_template_directory_uri() . '/dist/scripts.css', array(), filemtime( get_template_directory() . '/dist/scripts.css' ) );

//     // Enqueue main JavaScript from /dist
//     wp_enqueue_script( 'october-script', get_template_directory_uri() . '/dist/scripts.js', array(), filemtime( get_template_directory() . '/dist/scripts.js' ), true );

//     // Enqueue Google Fonts or other external styles/scripts if needed
//     wp_enqueue_style( 'october-google-fonts', 'https://fonts.googleapis.com/css?family=Open+Sans:400,700&display=swap', false );
// }
// add_action( 'wp_enqueue_scripts', 'october_enqueue_scripts' );

/**
 * Initialize the October Class
 *
 * Checks if the October class exists and initializes it to modularize theme functions.
 */
function october_initialize_october() {
    if ( class_exists( 'October' ) ) {
        // Instantiate the October class
        $october = new October();

        // Optionally, make it globally accessible
        global $october;
        $october = new October();
    } else {
        // Handle the case where the October class doesn't exist
        add_action( 'admin_notices', 'october_october_missing_notice' );
    }
}
add_action( 'init', 'october_initialize_october' );

/**
 * Optional: Admin Notice if October Class is Missing
 */
function october_october_missing_notice() {
    ?>
    <div class="notice notice-error">
        <p><?php esc_html_e( 'The October class is missing. Please ensure that it is included properly.', 'october' ); ?></p>
    </div>
    <?php
}

/**
 * Include the October Class File
 *
 * Ensure that the October class is included before attempting to initialize it.
 */
require_once get_template_directory() . '/lib/classes/class-october.php';

/**
 * Additional Theme Support and Customizations
 *
 * You can add more theme-specific functions below or within the October class.
 */

/**
 * Example: Custom Excerpt Length
 */
function october_custom_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'october_custom_excerpt_length', 999 );

/**
 * Example: Disable Gutenberg Block Editor
 */
function october_disable_gutenberg() {
    add_filter( 'use_block_editor_for_post', '__return_false', 10 );
}
add_action( 'init', 'october_disable_gutenberg' );

/**
 * Example: Register Custom Post Types
 */
function october_register_custom_post_types() {
    register_post_type( 'portfolio', array(
        'labels' => array(
            'name'          => __( 'Portfolios', 'october' ),
            'singular_name' => __( 'Portfolio', 'october' ),
        ),
        'public'        => true,
        'has_archive'   => true,
        'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
        'menu_icon'     => 'dashicons-portfolio',
        'rewrite'       => array( 'slug' => 'portfolios' ),
    ) );
}
add_action( 'init', 'october_register_custom_post_types' );

/**
 * Example: Custom Navigation Walker
 *
 * If your theme requires a custom walker for navigation menus, you can include it here or within the October class.
 */
// require_once get_template_directory() . '/lib/classes/class-october-nav-walker.php';

/**
 * Example: Theme Customizer Options
 *
 * You can add customizer settings and controls here or delegate them to the October class.
 */
// require_once get_template_directory() . '/lib/classes/customizer.php';

?>
