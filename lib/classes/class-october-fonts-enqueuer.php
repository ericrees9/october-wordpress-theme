<?php
/**
 * Class October_Fonts_Enqueuer
 *
 * Enqueues multiple Google Fonts for both front-end and editor,
 * with support for specifying italic variants.
 */
class October_Fonts_Enqueuer {
    /**
     * An array of fonts to include.
     *
     * Each font should be an associative array with a 'family' key and
     * either a 'variants' key (for advanced control) or a 'weights' key.
     *
     * Example using variants:
     * [
     *    [
     *      'family'   => 'Roboto',
     *      'variants' => [
     *          [ 'weight' => '400', 'italic' => false ],
     *          [ 'weight' => '400', 'italic' => true  ],
     *          [ 'weight' => '700', 'italic' => false ],
     *          [ 'weight' => '700', 'italic' => true  ],
     *      ],
     *    ],
     *    // ... other fonts
     * ]
     *
     * Example using weights (backwards-compatible; non-italic only):
     * [
     *    [
     *      'family'  => 'Open Sans',
     *      'weights' => [ '300', '400' ],
     *    ],
     * ]
     *
     * @var array
     */
    protected $fonts = [];

    /**
     * The handle used for the enqueued style.
     *
     * @var string
     */
    protected $handle = 'google-fonts';

    /**
     * Constructor.
     *
     * @param array  $fonts  Array of fonts.
     * @param string $handle Optional handle for the enqueued style.
     */
    public function __construct( array $fonts = [], $handle = 'google-fonts' ) {
        $this->fonts  = $fonts;
        $this->handle = $handle;

        // Hook into front-end and block editor.
        add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_fonts' ] );
        add_action( 'enqueue_block_editor_assets', [ $this, 'enqueue_fonts' ] );
        
        // Optionally, to load fonts in other admin pages (e.g., the Classic Editor)
        // add_action( 'admin_enqueue_scripts', [ $this, 'enqueue_fonts' ] );
    }

    /**
     * Build the Google Fonts URL and enqueue it.
     */
    public function enqueue_fonts() {
        if ( empty( $this->fonts ) ) {
            return;
        }

        $families = array();

        foreach ( $this->fonts as $font ) {
            if ( empty( $font['family'] ) ) {
                continue;
            }

            // Replace spaces with plus signs.
            $family = str_replace( ' ', '+', trim( $font['family'] ) );

            // Check if 'variants' key exists.
            if ( ! empty( $font['variants'] ) && is_array( $font['variants'] ) ) {
                $variants_parts = array();

                foreach ( $font['variants'] as $variant ) {
                    // Set italic flag (1 for true, 0 for false). Default to false.
                    $italic = ! empty( $variant['italic'] ) ? 1 : 0;

                    // Use provided weight or default to 400.
                    $weight = isset( $variant['weight'] ) ? $variant['weight'] : '400';

                    $variants_parts[] = $italic . ',' . $weight;
                }
                // Remove any duplicate variant entries.
                $variants_parts = array_unique( $variants_parts );
                // Optionally sort the variants.
                sort( $variants_parts );
                $variant_str = implode( ';', $variants_parts );
                // Build the family query using the new CSS2 endpoint syntax.
                $family_query = "family={$family}:ital,wght@{$variant_str}";
            }
            // Fallback: if 'weights' is provided, assume non-italic for each weight.
            elseif ( ! empty( $font['weights'] ) && is_array( $font['weights'] ) ) {
                $variants_parts = array();

                foreach ( $font['weights'] as $weight ) {
                    $variants_parts[] = '0,' . $weight;
                }
                $variants_parts = array_unique( $variants_parts );
                sort( $variants_parts );
                $variant_str = implode( ';', $variants_parts );
                $family_query = "family={$family}:ital,wght@{$variant_str}";
            } else {
                // If no variants or weights are provided, just add the family.
                $family_query = "family={$family}";
            }

            $families[] = $family_query;
        }

        if ( empty( $families ) ) {
            return;
        }

        // Build the complete query by joining multiple families.
        // Each family should be added as a separate "family" parameter.
        $family_query_str = implode('&', $families);

        // Build the full Google Fonts URL using the CSS2 endpoint.
        $google_fonts_url = 'https://fonts.googleapis.com/css2?' . $family_query_str . '&display=swap';

        // Enqueue the style.
        wp_enqueue_style( $this->handle, $google_fonts_url, array(), null );
    }
}
