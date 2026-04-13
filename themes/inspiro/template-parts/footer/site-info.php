<?php
/**
 * The template for displaying footer site info.
 *
 * @package Inspiro
 * @subpackage Inspiro_Lite
 * @since Inspiro 1.0.0
 * @version 1.0.0
 */
?>

<div class="site-info">
	<div class="site-info__social" aria-label="<?php esc_attr_e( 'Social links', 'inspiro' ); ?>">
		<div class="site-info__social-links">
			<a
				class="site-info__social-link site-info__social-link--facebook"
				href="https://www.facebook.com/Vennestraat"
				target="_blank"
				rel="noopener noreferrer"
				aria-label="<?php esc_attr_e( 'Facebook', 'inspiro' ); ?>"
			>
				<?php echo inspiro_get_footer_social_icon_svg( 'facebook' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
			</a>

			<a
				class="site-info__social-link site-info__social-link--instagram"
				href="https://www.instagram.com/vennestraat_genk/"
				target="_blank"
				rel="noopener noreferrer"
				aria-label="<?php esc_attr_e( 'Instagram', 'inspiro' ); ?>"
			>
				<?php echo inspiro_get_footer_social_icon_svg( 'instagram' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
			</a>
		</div>
	</div>

	<p class="site-info__credits">
		<span>&copy; <?php echo esc_html__( 'Vennestraat', 'inspiro' ); ?></span>
		<span class="site-info__separator">|</span>
		<span>
			<?php echo esc_html__( 'Created by', 'inspiro' ); ?>
			<a href="https://illminds.be" target="_blank" rel="noopener noreferrer">Illminds</a>
		</span>
	</p>
</div>
