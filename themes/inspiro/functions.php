<?php
/**
 * Inspiro functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Inspiro
 * @since Inspiro 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Define Constants
 */
define( 'INSPIRO_THEME_VERSION', '1.8.5' );
define( 'INSPIRO_THEME_DIR', trailingslashit( get_template_directory() ) );
define( 'INSPIRO_THEME_URI', trailingslashit( esc_url( get_template_directory_uri() ) ) );
define( 'INSPIRO_THEME_ASSETS_URI', INSPIRO_THEME_URI . 'dist' );

// This theme requires WordPress 5.3 or later.
if ( version_compare( $GLOBALS['wp_version'], '5.3', '<' ) ) {
	require INSPIRO_THEME_DIR . 'inc/back-compat.php';
}

/**
 * Recommended Plugins
 */
require INSPIRO_THEME_DIR . 'inc/classes/class-tgm-plugin-activation.php';

/**
 * Setup helper functions.
 */
require INSPIRO_THEME_DIR . 'inc/common-functions.php';

/**
 * Setup theme media.
 */
require INSPIRO_THEME_DIR . 'inc/theme-media.php';

/**
 * Enqueues scripts and styles
 */
require INSPIRO_THEME_DIR . 'inc/classes/class-inspiro-enqueue-scripts.php';

/**
 * Functions and definitions.
 */
require INSPIRO_THEME_DIR . 'inc/classes/class-inspiro-after-setup-theme.php';

/**
 * Handle SVG icons.
 */
require INSPIRO_THEME_DIR . 'inc/classes/class-inspiro-svg-icons.php';

/**
 * Implement the Custom Header feature.
 */
require INSPIRO_THEME_DIR . 'inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require INSPIRO_THEME_DIR . 'inc/template-tags.php';

/**
 * Additional features to allow styling of the templates.
 */
require INSPIRO_THEME_DIR . 'inc/template-functions.php';

/**
 * Customizer additions.
 */
require INSPIRO_THEME_DIR . 'inc/classes/class-inspiro-font-family-manager.php';
require INSPIRO_THEME_DIR . 'inc/classes/class-inspiro-fonts-manager.php';
require INSPIRO_THEME_DIR . 'inc/customizer-functions.php';
require INSPIRO_THEME_DIR . 'inc/customizer/class-inspiro-customizer-control-base.php';
require INSPIRO_THEME_DIR . 'inc/customizer/class-inspiro-customizer.php';

/**
 * SVG icons functions and filters.
 */
require INSPIRO_THEME_DIR . 'inc/icon-functions.php';

/**
 * Theme admin notices and info page
 */
if ( is_admin() ) {
	require INSPIRO_THEME_DIR . 'inc/admin-notice.php';
	require INSPIRO_THEME_DIR . 'inc/theme-info-page.php';

	if ( current_user_can( 'manage_options' ) ) {
		require INSPIRO_THEME_DIR . 'inc/classes/class-inspiro-notices.php';
		require INSPIRO_THEME_DIR . 'inc/classes/class-inspiro-notice-review.php';
	}
}

/**
 * Theme Upgrader
 */
require INSPIRO_THEME_DIR . 'inc/classes/class-inspiro-theme-upgrader.php';

/**
 * Inline theme css generated dynamically
 */
require INSPIRO_THEME_DIR . 'inc/dynamic-css/body.php';
require INSPIRO_THEME_DIR . 'inc/dynamic-css/logo.php';
require INSPIRO_THEME_DIR . 'inc/dynamic-css/headings.php';
require INSPIRO_THEME_DIR . 'inc/dynamic-css/hero-header-title.php';
require INSPIRO_THEME_DIR . 'inc/dynamic-css/hero-header-desc.php';
require INSPIRO_THEME_DIR . 'inc/dynamic-css/hero-header-button.php';
require INSPIRO_THEME_DIR . 'inc/dynamic-css/main-menu.php';
require INSPIRO_THEME_DIR . 'inc/dynamic-css/mobile-menu.php';

/**
 * Enqueues the local Font Awesome stylesheet.
 */
function inspiro_enqueue_font_awesome_icons() {
	$font_awesome_path = WP_CONTENT_DIR . '/plugins/nextgen-gallery/static/FontAwesome/css/all.min.css';
	$font_awesome_url  = content_url( 'plugins/nextgen-gallery/static/FontAwesome/css/all.min.css' );

	if ( file_exists( $font_awesome_path ) ) {
		wp_enqueue_style(
			'inspiro-font-awesome-local',
			$font_awesome_url,
			array(),
			filemtime( $font_awesome_path )
		);
	}
}
add_action( 'wp_enqueue_scripts', 'inspiro_enqueue_font_awesome_icons', 20 );

/**
 * Returns the Font Awesome markup for a footer social icon.
 *
 * @param string $network Social network name.
 * @return string
 */
function inspiro_get_footer_social_icon_svg( $network ) {
	$icons = array(
		'facebook'  => '<i class="fa-brands fa-facebook-f" aria-hidden="true"></i>',
		'instagram' => '<i class="fa-brands fa-instagram" aria-hidden="true"></i>',
	);

	return isset( $icons[ $network ] ) ? $icons[ $network ] : '';
}

/**
 * Adds the custom footer styles.
 *
 * @param string $css Inline theme CSS.
 * @return string
 */
function inspiro_custom_footer_css( $css ) {
	$css .= '
		.site-footer {
			background: #242424;
			color: #ffffff;
		}

		.home .site-footer {
			border-top: none;
		}

		.site-footer .inner-wrap {
			padding-top: 34px;
			padding-bottom: 26px;
		}

		.header_social {
			display: flex;
			align-items: center;
			gap: 14px;
			margin: 0 0 0 10px;
			float: none;
			text-align: right;
		}

		.header_social__link {
			display: inline-flex;
			align-items: center;
			justify-content: center;
			width: 18px;
			height: 18px;
			color: #ffffff;
			opacity: 0.95;
			text-decoration: none;
			transition: opacity 0.2s ease, color 0.2s ease;
		}

		.header_social__link:hover {
			color: #d7d7d7;
			opacity: 0.7;
		}

		.header_social__link i {
			display: block;
			font-size: 18px;
			line-height: 1;
		}

		.zoom-social-icons-list {
			display: flex;
			align-items: center;
			flex-wrap: wrap;
			gap: 14px;
			margin: 0;
			padding: 0;
		}

		.zoom-social_icons-list__item {
			margin: 0;
		}

		.zoom-social_icons-list__label,
		.zoom-social-icons-widget .widget-title,
		.zoom-social-icons-widget .title {
			display: none;
		}

		.zoom-social_icons-list__link {
			display: inline-flex;
			align-items: center;
			justify-content: center;
			color: #ffffff;
			opacity: 0.95;
			text-decoration: none !important;
			transition: opacity 0.2s ease, color 0.2s ease;
		}

		.zoom-social_icons-list__link:hover {
			color: #d7d7d7;
			opacity: 0.7;
		}

		.zoom-social_icons-list-span,
		.socicon,
		.dashicons,
		.genericon,
		.academicons,
		.fa {
			background: transparent !important;
			background-color: transparent !important;
			color: currentColor !important;
			padding: 0 !important;
			border-radius: 0 !important;
			font-size: 20px !important;
			line-height: 1 !important;
			width: auto !important;
			height: auto !important;
			box-shadow: none !important;
		}

		.wp-block-social-links {
			display: flex;
			align-items: center;
			flex-wrap: wrap;
			gap: 14px;
			padding-left: 0;
		}

		.wp-block-social-links .wp-social-link {
			background: transparent !important;
			color: #242424 !important;
			margin: 0 !important;
			border-radius: 0 !important;
		}

		.wp-block-social-links .wp-social-link a {
			display: inline-flex;
			align-items: center;
			justify-content: center;
			padding: 0 !important;
			color: currentColor !important;
			text-decoration: none !important;
			transition: opacity 0.2s ease, color 0.2s ease;
		}

		.wp-block-social-links .wp-social-link a:hover {
			color: #6a6a6a !important;
			opacity: 0.7;
		}

		.wp-block-social-links .wp-social-link svg {
			display: none;
		}

		.wp-block-social-links .wp-social-link a::before {
			display: block;
			font-family: "Font Awesome 6 Brands";
			font-size: 22px;
			line-height: 1;
		}

		.wp-block-social-links .wp-social-link-facebook a::before {
			content: "\f39e";
		}

		.wp-block-social-links .wp-social-link-instagram a::before {
			content: "\f16d";
		}

		.site-footer .wp-block-social-links .wp-social-link,
		.has-header-footer-background-color .wp-block-social-links .wp-social-link,
		.has-black-background-color .wp-block-social-links .wp-social-link,
		.has-primary-background-color .wp-block-social-links .wp-social-link {
			color: #ffffff !important;
		}

		.site-footer .wp-block-social-links .wp-social-link a:hover,
		.has-header-footer-background-color .wp-block-social-links .wp-social-link a:hover,
		.has-black-background-color .wp-block-social-links .wp-social-link a:hover,
		.has-primary-background-color .wp-block-social-links .wp-social-link a:hover {
			color: #d7d7d7 !important;
		}

		.site-info a {
			color: #ffffff;
			transition: color 0.2s ease, opacity 0.2s ease;
		}

		.site-info a:hover {
			color: #d7d7d7;
			opacity: 0.8;
		}

		.site-info {
			padding: 0;
			text-align: center;
		}

		.site-info__social {
			margin-bottom: 18px;
		}

		.site-info__social .widget {
			margin: 0;
		}

		.site-info__social-links {
			display: flex;
			justify-content: center;
			align-items: center;
			flex-wrap: wrap;
			gap: 18px;
			margin: 0;
			padding: 0;
		}

		.site-info__social-link {
			display: inline-flex;
			align-items: center;
			justify-content: center;
			width: 22px;
			height: 22px;
			color: #ffffff;
			opacity: 0.95;
			text-decoration: none;
			transition: opacity 0.2s ease, color 0.2s ease;
		}

		.site-info__social-link:hover {
			color: #d7d7d7;
			opacity: 0.7;
		}

		.site-info__social-link svg {
			display: block;
			width: 100%;
			height: 100%;
			fill: currentColor;
		}

		.site-info__social-link i {
			display: block;
			font-size: 22px;
			line-height: 1;
		}

		.site-info__credits {
			margin: 0;
			font-family: \"Montserrat\", sans-serif;
			font-size: 0.95rem;
			font-weight: 600;
			line-height: 1.8;
			color: #ffffff;
		}

		.site-info__separator {
			display: inline-block;
			margin: 0 10px;
			opacity: 0.8;
		}

		@media screen and (max-width: 40em) {
			.site-footer .inner-wrap {
				padding-top: 28px;
				padding-bottom: 22px;
			}

			.site-info__social {
				margin-bottom: 14px;
			}

			.site-info__social .zoom-social-icons-list {
				gap: 14px;
			}

			.site-info__social-links {
				gap: 14px;
			}

			.site-info__credits {
				font-size: 0.82rem;
				line-height: 1.9;
			}

			.site-info__separator {
				margin: 0 6px;
			}
		}
	';

	return $css;
}
add_filter( 'inspiro/dynamic_theme_css', 'inspiro_custom_footer_css' );
