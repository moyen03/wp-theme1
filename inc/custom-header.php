<?php
/**
 * Sample implementation of the Custom Header feature.
 *
 * You can add an optional custom header image to header.php like so ...
 *
	<?php if ( get_header_image() ) : ?>
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
		<img src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="">
	</a>
	<?php endif; // End header image check. ?>
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package underscore-moyen
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses underscore_moyen_header_style()
 */
function underscore_moyen_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'underscore_moyen_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => 'ffffff',
		'width'                  => 1280,
		'height'                 => 300,
		'flex-height'            => false,
		'wp-head-callback'       => 'underscore_moyen_header_style',
		'admin-head-callback'    => 'underscore_moyen_admin_header_style',
		'admin-preview-callback' => 'underscore_moyen_admin_header_image',
	) ) );
}
add_action( 'after_setup_theme', 'underscore_moyen_custom_header_setup' );

if ( ! function_exists( 'underscore_moyen_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog.
 *
 * @see underscore_moyen_custom_header_setup().
 */
function underscore_moyen_header_style() {
	$header_text_color = get_header_textcolor();

	/*
	 * If no custom options for text are set, let's bail.
	 * get_header_textcolor() options: Any hex value, 'blank' to hide text. Default: HEADER_TEXTCOLOR.
	 */
	if ( HEADER_TEXTCOLOR === $header_text_color ) {
		return;
	}

	// If we get this far, we have custom styles. Let's do this.
	?>
	<style type="text/css">
	<?php
		// Has the text been hidden?
		if ( ! display_header_text() ) :
	?>
		.site-title,
		.site-description,
		.site-branding {
			position: absolute;
			clip: rect(1px, 1px, 1px, 1px);
		}
	<?php
		// If the user has set a custom color for the text use that.
		else :
	?>
		.site-title a,
		.site-description {
			color: #<?php echo esc_attr( $header_text_color ); ?>;
		}
	<?php endif; ?>
	</style>
	<?php
}
endif;
