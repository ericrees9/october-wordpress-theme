

        </div>

        <footer id="colophon" class="site-footer" role="contentinfo">
            <div class="container">
                <div class="site-info">
                    <?php
                    /**
                     * Fires before the footer text for additional content.
                     */
                    do_action( 'your_theme_footer_before' );
                    ?>

                    <?php
                    /**
                     * Fires after the footer text for additional content.
                     */
                    do_action( 'your_theme_footer_after' );
                    ?>
                </div>

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
                </div>
            </div>
        </footer>

    </div>
    <?php wp_footer(); ?>

    </body>
    </html>
