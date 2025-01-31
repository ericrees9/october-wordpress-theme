<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @package october
 */
?>

        </div><!-- #content -->

        <footer id="colophon" class="site-footer" role="contentinfo">
            <div class="container">
                <div class="site-info">
                    <?php
                    /**
                     * Fires before the footer text for additional content.
                     */
                    do_action( 'your_theme_footer_before' );
                    ?>

                    <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'your-theme-textdomain' ) ); ?>">
                        <?php printf( esc_html__( 'Proudly powered by %s', 'your-theme-textdomain' ), 'WordPress' ); ?>
                    </a>

                    <?php
                    // Display the current year and site name
                    printf(
                        esc_html__( ' | &copy; %1$s %2$s. All rights reserved.', 'your-theme-textdomain' ),
                        date( 'Y' ),
                        '<a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html( get_bloginfo( 'name' ) ) . '</a>'
                    );
                    ?>

                    <?php
                    /**
                     * Fires after the footer text for additional content.
                     */
                    do_action( 'your_theme_footer_after' );
                    ?>
                </div><!-- .site-info -->

                <div class="footer-widgets">
                    <?php
                    if ( is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' ) ) : ?>
                        <div class="footer-widgets-container">
                            <?php
                            if ( is_active_sidebar( 'footer-1' ) ) :
                                dynamic_sidebar( 'footer-1' );
                            endif;

                            if ( is_active_sidebar( 'footer-2' ) ) :
                                dynamic_sidebar( 'footer-2' );
                            endif;

                            if ( is_active_sidebar( 'footer-3' ) ) :
                                dynamic_sidebar( 'footer-3' );
                            endif;
                            ?>
                        </div><!-- .footer-widgets-container -->
                    <?php endif; ?>
                </div><!-- .footer-widgets -->
            </div><!-- .container -->
        </footer><!-- #colophon -->

    </div><!-- #page -->

    <?php wp_footer(); ?>

    </body>
    </html>
