<?php
/**
 * Displays top navigation
 *
 * @package Inspiro
 * @subpackage Inspiro_Lite
 * @since Inspiro 1.0.0
 * @version 1.0.0
 */

$search_show        = inspiro_get_theme_mod( 'header_search_show' );
$search_display     = $search_show ? 'block' : 'none';

$header_layout_type = inspiro_get_theme_mod( 'header-layout-type' );
$header_menu_style  = inspiro_get_theme_mod( 'header-menu-style' );

?>
<div id="site-navigation" class="navbar">
	<div class="header-inner inner-wrap <?php echo sanitize_html_class( $header_layout_type ); ?> <?php echo sanitize_html_class( $header_menu_style ); ?>">

		<div class="header-logo-wrapper">
			<?php inspiro_custom_logo(); ?>
		</div>
		
		<?php if ( has_nav_menu( 'primary' ) ) : ?>
			<div class="header-navigation-wrapper">
				<nav class="primary-menu-wrapper navbar-collapse collapse" aria-label="<?php echo esc_attr_x( 'Top Horizontal Menu', 'menu', 'inspiro' ); ?>" role="navigation">
					<?php
						wp_nav_menu(
							array(
								'menu_class'     => 'nav navbar-nav dropdown sf-menu',
								'theme_location' => 'primary',
								'container'      => '',
							)
						);
					?>
				</nav>
			</div>
		<?php endif ?>
		
		<div class="header-widgets-wrapper">
			<div class="header_social" aria-label="<?php esc_attr_e( 'Social links', 'inspiro' ); ?>">
				<a
					class="header_social__link header_social__link--facebook"
					href="https://www.facebook.com/Vennestraat"
					target="_blank"
					rel="noopener noreferrer"
					aria-label="<?php esc_attr_e( 'Facebook', 'inspiro' ); ?>"
				>
					<i class="fa-brands fa-facebook-f" aria-hidden="true"></i>
				</a>
				<a
					class="header_social__link header_social__link--instagram"
					href="https://www.instagram.com/vennestraat_genk/"
					target="_blank"
					rel="noopener noreferrer"
					aria-label="<?php esc_attr_e( 'Instagram', 'inspiro' ); ?>"
				>
					<i class="fa-brands fa-instagram" aria-hidden="true"></i>
				</a>
			</div>

			<div id="sb-search" class="sb-search" style="display: <?php echo esc_attr( $search_display ); ?>;">
				<?php get_template_part( 'template-parts/header/search', 'form' ); ?>
			</div>

			<?php if ( has_nav_menu( 'primary' ) || is_active_sidebar( 'sidebar' ) ) : ?>
				<button type="button" class="navbar-toggle">
					<span class="screen-reader-text"><?php esc_html_e( 'Toggle sidebar &amp; navigation', 'inspiro' ); ?></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			<?php endif ?>
		</div>
	</div><!-- .inner-wrap -->
</div><!-- #site-navigation -->
